window.loadEnd=async nenndo=>{
	"use strict";
	const doc=document;
	const getHour=time=>{
			time=time.split(":");
			return +time[0]+(+time[1])/60;
		};
	const height=+getComputedStyle(doc.getElementById("getHeight")).height.replace("px","");
	const plusHeight=+getComputedStyle(doc.getElementById("plusHeight")).height.replace("px","");
	const db=firebase.firestore().doc("kaedefestival/kaede"+nenndo+"/scheduleTest/datas");//本番で変更
	["gym","hall","music","other"].forEach(async place=>{
		const querySp=await db.collection(place).get();
		if(!querySp.empty){
			const f=querySp.docs.reduce((f,docRef)=>{
				const dbData=docRef.data();
				if(!dbData["name"])return f;
				const a=doc.createElement("a"),
					start=getHour(dbData.start),
					end=getHour(dbData.end),
					diff=end-start;
				a.innerHTML=dbData.name+"<br>"+dbData.start+"~"+dbData.end;
				a.style.height=diff*height+"px";
				a.style.top=plusHeight+(start-8)*height+"px";
				f.appendChild(a);
				return f;
			},doc.createDocumentFragment());
			doc.getElementById(place).append(f);
		}
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
	setInterval(()=>{//一分ごとに移動させる
		p.style.top=time+height/60+"px";
	},60000);
};
