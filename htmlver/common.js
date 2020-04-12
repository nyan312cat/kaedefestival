(async ()=>{
	"use strict";
	const doc=document;
	//各年度へのリンク作成・追加　始まり　（最新からスタート）
	if(!doc.getElementById("eachYearMenu"))return loadEnd();
	doc.cookie="test=test;max-age=60";
	if(!doc.cookie.includes("test=test"))alert("cookieを有効化してください");
	const cookie=(doc.cookie?doc.cookie.split("; "):[]).reduce((res,val)=>{
		if(!/.+=.+/.test(val))return res;
		val=val.split("=");
		res[val[0]]=val[1];
		return res;
	},{});
	let start,end;
	if(cookie.start_year===undefined||cookie.end_year===undefined){
		const db=firebase.firestore().collection("kaedefestival").orderBy("year"),
			sQS=await db.limit(2).get(),eQS=await db.limitToLast(1).get();
		if(sQS.empty||eQS.empty||!sQS.docs[1]||!eQS.docs[0])return loadEnd();
		start=sQS.docs[1].data().year;
		end=eQS.docs[0].data().year;
		doc.cookie="start_year="+start+";path=/;max-age=60*60*24";
		doc.cookie="end_year="+end+";path=/;max-age=60*60*24";
	}else{
		start=cookie.start_year;
		end=cookie.end_year;
	}
	const f=doc.createDocumentFragment();
	for(let i=end;i>=start;i--){
		const li=doc.createElement("li");
		li.innerHTML="<a href='/eachYear.html?year="+i+"'>"+i+"年度</a>";
		f.appendChild(li);
	}
	doc.getElementById("eachYearMenu").appendChild(f);
	//各年度へのリンク作成・追加　終わり
	const date=new Date()
	date.setMonth(date.getMonth()-3);
	window.nenndo=date.getFullYear();
	return loadEnd();
})();
