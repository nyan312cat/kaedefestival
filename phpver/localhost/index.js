(()=>{
  "use strict";
  const doc=document;
  const mime={"jpg":"image/jpeg","png":"image/png","gif":"image/gif","txt":"text/plain"};
  const log=doc.getElementById("log");
  const uploadFile=fileRefs=>
    (()=>
      Promise.all(fileRefs.map(ref=>new Promise((resolve,reject)=>{
        const xhr=new XMLHttpRequest();
        xhr.open("get",ref);
        xhr.onload=()=>{
          if(xhr.status===200){
            resolve({name:ref,data:xhr.response});
          }else reject({at:"loadFile",code:xhr.status,status:xhr.statusText,ref:ref});
        };
        xhr.onerror=e=>reject(e);
        xhr.responseType="blob";
        xhr.send();
      })))
    )().then(fileDatas=>
      new Promise((resolve,reject)=>{
        const form=new FormData();
        fileDatas.forEach(fileData=>{
          const name=fileData["name"].replace("./","").replace(/\//g,"|"),
            mimeType=name.match(/\.(.+)$/)[1],
            file=new File([fileData["data"]], name, {type:mime[mimeType]});
          if(!mime[mimeType])
            reject({at:"mimeCheck",mime:mimeType,ref:fileData["name"]});
          form.append(name.replace(".","_"),file);
        });
        form.append("key","a");//-------keyを設定
        const xhr=new XMLHttpRequest();
        xhr.open("post","http://127.0.0.1:3333/upload.php");//-----------------urlを本番に変更する
        xhr.onload=()=>resolve(xhr.response);
        xhr.onerror=e=>reject(e);
        xhr.send(form);
      })
    );
  const upload=(fileNum,start,end)=>(()=>
    Promise.allSettled(Array(end===-1?Math.ceil(fileRefs.length/fileNum):1).fill().map((v,i)=>{
      i=i*fileNum+start;
      console.log(i);
      return uploadFile(fileRefs.slice(i,i+fileNum));
    }))
  )().then(results=>{
    log.innerHTML="";
    results.forEach((result,i)=>{
      console.log(result);
      if(result.status==="fulfilled"){
        let res=result.value;
        if(res.startsWith("1")){
          upload(Math.ceil(fileNum),i*fileNum);
          upload(Math.floor(fileNum),i*fileNum);
        }else if(res==="*"){
          e="何かエラーが発生しました";
        }else{//成功時
          res=res.replace(/\|/g,"/").replace(/,/g,"<br>");
        }
        log.innerHTML+=res;
      }else{
        let e=result.reason;
        if(e.at==="loadFile"){
          e=e.code+" "+e.status+" : "+e.ref;
        }else if(e.at==="mimeCheck"){
          e=e.mime+"には非対応ですjpg,png,gif,txtのどれかにしてください\nat : "+e.ref;
        }
        log.innerHTML+=e;
      }
    });
  });
  doc.getElementById("upload").addEventListener("click",()=>{
    if(!doc.getElementById("check").checked)return;
    upload(10,0,-1);//最初は10ファイルずつアップロード
  });
})();
