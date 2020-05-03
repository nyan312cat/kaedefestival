(()=>{
  "use strict";
  const doc=document;
  window.name="kaedefes-map";
  (()=>{
    const params=location.search.slice(1).split("&").reduce((res,val)=>(
        val.includes("=")?(val=val.split("="),res[val[0]]=val[1]):res[val]=true,res
      ),{});

  })();
  (()=>{
    const URLdata={
      "club":"club/club.html",
      "vol":"club/volunteer.html",
      "kouki4":"grade/kouki4.html",
      "kouki5":"grade/kouki5.html",
      "kouki6":"grade/kouki6.html",
      "zenki":"grade/zennki.html",
      "gym":"place/gym.html",
      "hall":"place/hall.html",
      "music":"place/music.html",
      "other":"place/other.html",
      "jissenn":"foods/jissennshitu.html",
      "kougishitu":"kougishitu.html"
    };
    function click(){
      if(!this.id||!this.dataset.page)return;
      
    }
    doc.querySelectorAll(".map>*").forEach(elem=>elem.addEventListener("click",click));
  })();
})();
