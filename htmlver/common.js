(()=>{
	"use strict";
	const oldest=2020,newest=2020;//毎年更新する
		/*
			oldest:データがある最古の年度
			newest:データがある最新の年度
		*/
	const doc=document;
	//各年度へのリンク作成・追加　始まり　（最新からスタート）
	if(!doc.getElementById("eachYearMenu"))return loadEnd(newest,oldest);
	const f=doc.createDocumentFragment();
	for(let i=oldest;i<newest;i++){
		const li=doc.createElement("li");
		li.innerHTML="<a href='/eachYear.html?year="+i+"'>"+i+"年度</a>";
		f.appendChild(li);
	}
	doc.getElementById("eachYearMenu").appendChild(f);
	//各年度へのリンク作成・追加　終わり
	return loadEnd(newest,oldest);
})();
