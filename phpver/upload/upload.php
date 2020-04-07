<?php
  header("Access-Control-Allow-Origin:http://127.0.0.1:8080");
  set_error_handler(function($eno,$estr){
    echo $estr;
    exit;
  });
  foreach($_FILES as $file){
    $tmp=$file["tmp_name"];
    $name=$file["name"];
    $ref="./".str_replace("_","/",$name);
    if(is_uploaded_file($tmp)){
      if(move_uploaded_file($tmp,$ref))echo $ref."をアップロードしました";
      else echo "fail";
    }
  }
?>
