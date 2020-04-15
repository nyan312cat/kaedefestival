(()=>{
  "use strict";
  const doc=document;
  window.loadEnd=(newest,oldest)=>{
    const f=doc.createDocumentFragment();
    for(let i=oldest;i<newest;i++){
      const li=doc.createElement("li");
      li.innerHTML="<a href='/eachYear.html?year="+i+"'>"+i+"年度</a>";
      f.appendChild(li);
    }
    doc.getElementById("eachYearMain").appendChild(f);
  };
})();
