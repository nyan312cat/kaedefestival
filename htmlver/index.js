(()=>{
  "use strict";
  const doc=document;
  const tar=doc.getElementById("currentEvents");
  const noEvents=()=>{
    const li=doc.createElement("li");
    li.textContent="現在のイベントはありません";
    tar.appendChild(li);
  };
  window.loadEnd=async nenndo=>{
    const db=firebase.firestore().collection("kaedefestival").doc("kaede"+nenndo).collection("timeTest");//本番で変更
    const nowHour=new Date().getHours();
    const currentEvents=await db.where("time","==",nowHour).get();
    if(currentEvents.empty)
      return noEvents();
    const datasRef=await currentEvents.docs[0].ref.collection("datas").get();
    if(datasRef.empty)
      return noEvents();
    const f=doc.createDocumentFragment();
    const places={"gym":"体育館","music":"音楽室","hall":"生徒ホール","other":"ロータリーなど"};
    datasRef.docs.forEach(doc=>{
      const data=doc.data();
      const li=doc.createElement("li");
      li.innerHTML=data.name+"<br>"+data.start+"～"+data.end+"<br>場所 : "+(places[data.place]||data.place);
      f.appendChild(li);
    });
    tar.appendChild(f);
  };
})();
