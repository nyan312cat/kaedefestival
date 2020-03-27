(()=>{
  "use strict";
  if(firebase.auth().currentUser)location.href="./login.html";
  const doc=document, form=doc.form;
  form.update.addEventListener("click",()=>
    firebase.firestore()
  );
})();
