(()=>{
  const doc=document;
  doc.getElementById("login").addEventListener("click",()=>{
    const user=doc.getElementById("user"),
      pass=doc.getElementById("pass");
    firebase.auth().signInWithEmailAndPassword(user.value, pass.value).then(()=>{
      alert("ログインしました");
      location.href="./save.html"
    }).catch(e=>{
      console.log(e.code);
      if(/invalid-email|user-not-found/.test(e.code)){
        alert("ユーザー名が違います");
        user.value="";
      }else if(/password/.test(e.code)){
        alert("パスワードが違います");
        pass.value="";
      }else{
        alert("ユーザー名またはパスワードが違います");
        user.value="";pass.value="";
      }
    });
  });
})();
