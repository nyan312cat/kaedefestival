(()=>{
"use strict";
const doc=document;
//各年度へのリンク作成・追加　始まり　（最新からスタート）
const f=doc.createDocumentFragment(),start=2020,end=2030;
for(let i=end;i>=start;i--){
	const li=doc.createElement("li");
	li.innerHTML="<a href='/eachYear.html?year="+i+"'>"+i+"年度</a>";
	f.appendChild(li);
}
doc.getElementById("eachYearMenu").appendChild(f);
//各年度へのリンク作成・追加　終わり
})();
