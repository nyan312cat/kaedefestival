((doc)=>{
	"use strict";
//doc=document
//----------ヘッダーとメニューのスタイル始まり----------
	//mainをヘッダー分ずらす
	doc.getElementsByTagName("main")[0].style.paddingTop=getComputedStyle(doc.getElementById("head")).height;
	//menuの表示・非表示
	doc.getElementById("menuCheckBox").addEventListener("change",e=>{
		if(e.target.checked){
			const t=doc.getElementById("menubtns").style;
			t.display="block";
			t.top=getComputedStyle(doc.getElementById("head")).height;
		}else{
			doc.getElementById("menubtns").style.display="none";
		}
	},false);
//----------ヘッダーとメニューのスタイル終わり-----------
  const urlParam=location.search.slice(1).split("&").reduce((res,val)=>{val=val.split("=");res[val[0]]=val[1];return res;},{});
  const year=urlParam.year;
  doc.getElementById("year").textContent=year+"年度"
  const f=doc.createDocumentFragment(),g=doc.createDocumentFragment();
  for(let i=0;i<2;i++){
    const i1=doc.createElement("img"),i2=doc.createElement("img");
    i1.src="./img/booth/"+i+"jpg";
    i2.src="./img/day/"+i+"jpg";
    f.appendChild(i1);
    g.appendChild(i2);
  }
  doc.getElementById("booth").appendChild(f);
  doc.getElementById("day").appendChild(g);
})(document);
