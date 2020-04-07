<?php
  header("Access-Control-Allow-Origin:http://127.0.0.1:8080");//------------urlを本番に変更する
  set_error_handler(function($eno,$estr){
    exit(254);
  },E_ALL);
  set_exception_handler(function($e){
    exit(254);
  });
  $whiteList=array("gif"=>"image/gif","jpg"=>"image/jpeg","png"=>"image/png","txt"=>"text/plain");
  foreach($_FILES as $name=>$file){//エラーチェックのforeach
    $tmp=$file["tmp_name"];
    $ref="./".str_replace("_","/",$name);
    if(!isset($file["error"])||!is_int($file["error"]))
      exit();
    switch($file["error"]){
      case UPLOAD_ERR_OK:
        break;
      case UPLOAD_ERR_NO_FILE:
        exit();
      case UPLOAD_ERR_INI_SIZE:
      case UPLOAD_ERR_FORM_SIZE:
        exit();
      default:
        exit();
    }
    if(preg_match("/[\/\.]/",pathinfo($name,PATHINFO_DIRNAME))))
      exit();
    if(!file_exists(str_replace(basename($ref),"",$ref)))
      exit();
    if(!($ext=array_search(mime_content_type($_FILES['upfile']['tmp_name']),$whiteList,true) and $ext===pathinfo($ref,PATHINFO_EXTENSION)))
      exit();
    if(!is_uploaded_file($tmp))
      exit(254);
  }
  foreach ($_FILES as $name=>$file){//ファイルを保存するforeach
    $ref="./".str_replace($name);
    $tmp=$file["tmp_name"];
    if(mime_content_type($_FILES['upfile']['tmp_name']==="image/jpg"){
      $gd=imagecreatefromjpeg($tmp);
      $w=imagesx($gd);
      $h=imagesy($gd);
      $gd_out=imagecreatetruecolor($w,$h);
      imagecopyresampled($gd_out,$gd,0,0,0,0,$w,$h,$w,$h);
      imagejpeg($gd_out,$ref);
      imagedestroy($gd);
    }elseif(!move_uploaded_file($tmp,$ref))
      exit();
    if(!chmod($ref,0606))
      exit();
  }
?>
