(()=>{
  "use strict";
  const doc=document;
  //各年度へのリンク作成・追加　始まり　（最新からスタート）
  const f=doc.createDocumentFragment(),start=2020,end=2030;
  for(let i=end;i>=start;i--){
  	const li=doc.createElement("li");
  	li.innerHTML="<a href='/eachYear.html?year="+i+"'>"+i+"年度</a>"+"<img src='/img/eachYear/"+i+"/0.jpg'><img src='/img/eachYear/"+i+"/1.jpg'>";
  	f.appendChild(li);
  }
  doc.getElementById("eachYearMain").appendChild(f);
  //各年度へのリンク作成・追加　終わり
})();
