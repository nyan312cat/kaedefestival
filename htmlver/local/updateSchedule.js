(()=>{
  const doc=document;
  const datas={gym:[],hall:[],music:[],other:[]};
  const timeReg=/^\d{0,2}:\d{0,2}$/;
  new Vue({
    el:"#vue",
    data:{
      datas:datas,
      places:{
        "gym":"体育館",
        "hall":"生徒ホール",
        "music":"音楽室",
        "other":"その他の場所"
      }
    },
    methods:{
      push:function(event){
        const form=event.target.parentNode,key=form.id.replace("form_",""),
          name=form.event.value,start=form.start.value,end=form.end.value;
        if(!name||!start||!end)return;
        if(!timeReg.test(start)){
          alert("開始時刻の値が正しくありません");
          form.start.value="";
          return;
        }
        if(!timeReg.test(end)){
          alert("終了時刻の値が正しくありません");
          form.end.value="";
          return;
        }
        form.event.value=form.start.value=form.end.value="";
        datas[key].push([name,start,end]);
      },
      resetStyle:function(key,i){
        doc.getElementById("div_"+key).getElementsByTagName("input")[i].style.backgroundColor="#fff";
      }
    }
  });
  const db=firebase.firestore().collection("/kaedefestival/kaede2020/scheduleTest")//本番で変更
  document.getElementById("upload").addEventListener("click",()=>{
    let error=false;
    const doError=(key,i)=>{
      error=true;
      doc.getElementById("div_"+key).getElementsByTagName("input")[i].style.backgroundColor="rgba(255,0,0,0.5)";
    };
    for(const key in datas){
      const data=datas[key],l=data.length;
      for(let i=0;i<l;i++){
        const v=data[i];
        if(!v[0])doError(key,i*3);
        if(!timeReg.test(v[1]))doError(key,i*3+1);
        if(!timeReg.test(v[2]))doError(key,i*3+2);
        const s=v[1].split(":"),e=v[2].split(":");
        if(s[0]>24||s[1]>59)doError(key,i*3+1);
        if(e[0]>24||e[1]>59)doError(key,i*3+2);
        if((+s[0])*60+(+s[1])>=(+e[0])*60+(+e[1])){
          error=true;
          const tar=doc.getElementById("div_"+key).getElementsByTagName("input");
          tar[i*3+1].style.backgroundColor="rgba(255,0,0,0.5)";
          tar[i*3+2].style.backgroundColor="rgba(255,0,0,0.5)";
        }
      }
    }
    if(error)return;
    const batch=firebase.firestore().batch();
    (async()=>
      await Promise.all(
        Object.keys(datas).map(async key=>{
          const dbRef=db.doc("/"+key).collection("/datas"),
            data=datas[key];
          const docSnps=await Promise.all(data.map(d=>dbRef.where("name","==",d[0]).get()));
          docSnps.forEach((docSnp,i)=>{
            const d=data[i];
            if(docSnp.empty)
              batch.set(dbRef.doc(),{name:d[0],start:d[1],end:d[2]});
            else
              batch.update(docSnp.docs[0].ref,{start:d[1],end:d[2]});
          });
        })
      )
    )().then(()=>
      batch.commit()
    ).then(res=>{
        console.log(res);
    }).catch(E=>console.log(E));
  });
})();
