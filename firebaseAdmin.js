var admin = require("firebase-admin");
var serviceAccount = require("./kaedefestival-firebase-adminsdk.json");//ダウンロードしたjsonファイルの名前
admin.initializeApp({
  credential: admin.credential.cert(serviceAccount),
  databaseURL: "https://kaedefestival.firebaseio.com"//firebaseのキーを生成したページからコピーしてくる
});
admin.auth().createUser({
  email:"",//ユーザー名　email形式（文字列@文字列.文字列）
  password:""//パスワード　英数字推奨
}).then(function(userRecord){
    console.log('Successfully created new user:', userRecord.uid);
}).catch(function(error){
    console.log('Error creating new user:', error);
});
