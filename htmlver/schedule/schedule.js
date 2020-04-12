(async()=>{
	const doc=document;
	const getHour=time=>{
			time=time.split(":");
			return +time[0]+(+time[1])/60;
		};
	const height=+getComputedStyle(doc.getElementById("getHeight")).height.replace("px","");
	const plusHeight=+getComputedStyle(doc.getElementById("plusHeight")).height.replace("px","");
/*	const data={
			gym:[
				["女装コンテスト", "9:10", "9:35"],
				["吹奏楽部コンサート", "9:50", "10:50"],
				["Strings Concert2017", "11:05", "11:50"],
				["歌合戦決勝", "12:00", "12:30"],
				["前期生合唱", "12:50", "13:20"],
				["演劇部公演", "13:30", "14:00"],
				["ダンスプロジェクト", "14:10", "14:50"]
			],
			hall:[
				["クイズ⑤", "9:15", "9:45"],
				["クイズ⑥", "9:55", "10:25"],
				["大村先生による科学実験", "10:30", "11:00"],
				["イケボ大会", "11:05", "11:40"],
				["クイズ大会エキシビジョン", "11:45", "12:10"],
				["クイズ⑦", "12:15", "12:45"],
				["大喜利大会", "12:50", "13:35"],
				["クイズ⑧", "13:45", "14:15"]
			],
			music:[
				["まるすたいる", "9:00", "9:30"],
				["M²ark", "9:40", "10:00"],
				["オーメンズ　ポニートズ", "10:10", "10:30"],
				["ユカコs", "10:35", "10:50"],
				["Funky Monkey Teachers", "11:40", "12:30"],
				["Passione", "12:50", "13:35"],
				["Silent Beat", "13:50", "14:50"]
			],
			other:[]
		};*/
	const db=firebase.firestore().collection("kaedefestival/kaede2020/scheduleTest");
	const querySnap=await db.get();
	querySnap.docs.forEach(async queryDocSp=>{
		const place=queryDocSp.id,
			querySp=await queryDocSp.ref.collection("datas").get(),
			fragment=querySp.docs.reduce((res,docRef)=>{
				const dbData=docRef.data();
				if(!dbData["name"])return res;
				const a=doc.createElement("a"),
					start=getHour(dbData.start),
					end=getHour(dbData.end),
					diff=end-start;
				a.innerHTML=dbData.name+"<br>"+dbData.start+"~"+dbData.end;
				a.style.height=diff*height+"px";
				a.style.top=plusHeight+(start-8)*height+"px";
				res.appendChild(a);
				return res;
			},doc.createDocumentFragment());
		doc.getElementById(place).append(fragment);
	});
	let time=new Date();
	const hour=time.getHours();
	if(hour>=15||hour<8)return;
	time=hour-8+time.getMinutes()/60;
	time=time*height+plusHeight;
	const p=doc.createElement("p");
	p.id="now";
	p.style.top=time+"px";
	doc.getElementById("gym").appendChild(p);
	setInterval(()=>{
		p.style.top=time+height/60+"px";
	},60000);
})();
