(()=>{
  "use strict";
  const doc=document;
  const heads=doc.getElementsByClassName("head"),
    headsL=heads.length;
  const tar=doc.getElementById("index");
  const f=doc.createDocumentFragment();
  for(let i=0;i<headsL;i++){
    const a=doc.createElement("a");
    a.textContent=heads[i].textContent;
    f.appendChild(a);
  }
  tar.appendChild(f);
  const placeLink=doc.getElementsByClassName("place_link"),
    placeLinkL=placeLink.length;
  for(let i=0;i<placeLinkL;i++)
    placeLink[i].addEventListener("click",function(){
      const data=this.dataset,
        floor=data.floor,
        room=encodeURI(data.room);
      window.open("/map/map.html?floor="+floor+"&room="+room,"kaedefestival_map");
    });
})();
