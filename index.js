((doc)=>{
	"use strict";
//doc=document

//各年度へのリンク作成・追加　始まり　（最新からスタート）
const f=doc.createDocumentFragment(),g=doc.createDocumentFragment(),start=2020,end=2030;
for(let i=end;i>=start;i--){
	const l1=doc.createElement("li"),l2=doc.createElement("li");
	l1.innerHTML="<a href='./eachYear.html?year="+i+"'>"+i+"年度</a>";
	l2.innerHTML="<a href='./eachYear.html?year="+i+"'>"+i+"年度</a>"+"<img src='./img/eachYear/"+i+"/0.jpg'>"+"<img src='./img/eachYear/"+i+"/1.jpg'>";
	f.appendChild(l1);
	g.appendChild(l2);
}
doc.getElementById("eachYearMenu").appendChild(f);
doc.getElementById("eachYearMain").appendChild(g);
//各年度へのリンク作成・追加　終わり
})(document);
