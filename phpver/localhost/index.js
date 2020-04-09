(()=>{
  const doc=document;
  const mime={"jpg":"image/jpeg","png":"image/png","gif":"image/gif","txt":"text/plain"};
  const log=doc.getElementById("log");
  const uploadFile=fileRefs=>
    (async ()=>
      await Promise.all(fileRefs.map(ref=>new Promise((resolve,reject)=>{
        const xhr=new XMLHttpRequest();
        xhr.open("get",ref);
        xhr.onload=()=>{
          if(xhr.status===200){
            resolve({name:ref,data:xhr.response});
          }else reject({at:"loadFile",code:xhr.status,status:xhr.statusText,ref:ref});
        };
        xhr.responseType="blob";
        xhr.send();
      })))
    )().then(async fileDatas=>
      await(new Promise((resolve,reject)=>{
        const form=new FormData();
        fileDatas.forEach(fileData=>{
          const name=fileData["name"].replace("./","").replace(/\//g,"_"),
            mimeType=name.match(/\.(.+)$/)[1],
            file=new File([fileData["data"]], name, {type:mime[mimeType]});
          if(!mime[mimeType])
            reject({at:"mimeCheck",mime:mimeType,ref:fileData["name"]});
          form.append(name,file);
        });
        const xhr=new XMLHttpRequest();
        xhr.open("post","http://127.0.0.1:3333/upload.php");//-----------------urlを本番に変更する
        xhr.onload=()=>resolve(xhr.response);
        xhr.send(form);
      }))
    );
  doc.getElementById("upload").addEventListener("click",()=>{
    if(!doc.getElementById("check").checked)return;
    const upload=fileNum=>(async ()=>
      Promise.all(Array(Math.ceil(fileRefs.length/fileNum)).fill().map((v,i)=>
        uploadFile(fileRefs.slice(i*10,i*10+10))
      ))
    )().then(res=>{
      console.log(res);
      log.innerHTML=res.reduce((r,val)=>r+val+"<br>","");
    }).catch(e=>{
      if(e.at==="loadFile"){
        e=e.code+" "+e.status+" : "+e.ref;
      }else if(e.at==="mimeCheck"){
        e=e.mime+"には非対応ですjpg,png,gif,txtのどれかにしてください\nat : "+e.ref;
      }
      log.innerHTML=e;
    });
    upload(10);//最初は10ファイルずつアップロード
  });
})();
