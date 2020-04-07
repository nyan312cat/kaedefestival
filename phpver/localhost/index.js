  const doc=document;
  const mime={"jpg":"image/jpeg","jpeg":"image/jpeg","png":"image/png","gif":"image/gif","txt":"text/plain"};
  const log=doc.getElementById("log");
  const uploadFile=fileRefs=>(async ()=>
      await Promise.all(fileRefs.map(ref=>new Promise((resolve,reject)=>{
        const xhr=new XMLHttpRequest();
        xhr.open("get",ref);
        xhr.onload=()=>{
          if(xhr.status===200){
            resolve({name:ref,data:xhr.response});
          }else reject({code:xhr.status,status:xhr.statusText,ref:ref});
        };
        xhr.responseType="blob";
        xhr.send();
      })))
    )().then(async fileDatas=>
      await(new Promise((resolve,reject)=>{
        const form=new FormData();
        fileDatas.forEach(fileData=>{
          const name=fileData["name"].replace("./","").replace(/\//g,"_"),
            mimeType=name.match(/\.(.+)$/)[1],
            file=new File([fileData["data"]], name, {type:mime[mimeType]});
          if(!mime[mimeType])
            throw new Error(mimeType+
              "には非対応です\njpg, jpeg, png, gif, txtのどれかにしてください\nファイル : ./"+
              name.replace(/_/g,"/")
            );
          form.append(name,file);
        });
        const xhr=new XMLHttpRequest();
        xhr.open("post","http://127.0.0.1:3333/upload.php");
        xhr.onload=()=>resolve(xhr.response);
        xhr.send(form);
      }))
    );
  doc.getElementById("upload").addEventListener("click",()=>{
    if(!doc.getElementById("check").checked)return;
    (async ()=>
      Promise.all(Array(Math.ceil(fileRefs.length/10)).fill().map((v,i)=>
        uploadFile(fileRefs.slice(i*10,i*10+10).filter(v=>v))
      ))
    )().then(res=>{
      console.log(res);
      if(Array.isArray(res))
        log.innerHTML=res.reduce((r,val)=>r+val+"<br>","");
      else
        log.innerHTML=res;
    });
  });
