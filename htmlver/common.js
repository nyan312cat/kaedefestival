(async ()=>{
	"use strict";
	const doc=document;
	//各年度へのリンク作成・追加　始まり　（最新からスタート）
	if(!doc.getElementById("eachYearMenu"))return loadEnd();
	const db=firebase.firestore().collection("kaedefestival").orderBy("year"),
		sQS=await db.limit(1).get(),eQS=await db.limitToLast(1).get(),
		start=sQS.docs[0].data().year,
		end=eQS.docs[0].data().year,
		f=doc.createDocumentFragment();
	for(let i=end;i>=start;i--){
		const li=doc.createElement("li");
		li.innerHTML="<a href='/eachYear.html?year="+i+"'>"+i+"年度</a>";
		f.appendChild(li);
	}
	doc.getElementById("eachYearMenu").appendChild(f);
	//各年度へのリンク作成・追加　終わり
	return loadEnd();
})();
