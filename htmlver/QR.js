(()=>{
  "use strict";
  const doc=document;
  if(!navigator.cookieEnabled)return alert("Cookieを有効にしてください");
  doc.cookie="test=test;max-age=60;";
  const cookie=(doc.cookie||"").split("; ").reduce((res,txt)=>{
    txt=txt.split("=");
    res[txt[0]]=txt[1];
  },{});
  if(cookie[test]!=="test")return alert("Cookieを有効にしてください");
  let QR_id=loacation.search.slice(1);
  if(!QR_id.startsWith("qr_id="))return alert("不正です");
  QR_id=QR_id.replace("qr_id=","");
  
})();
