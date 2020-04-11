<?php
  header("Access-Control-Allow-Origin:http://localhost:8080");//------------urlを本番に変更する
  function throw_error($code){
    echo $code;
    exit;
  }
/*  set_error_handler(function($eno,$estr){
    throw_error("*");
  },E_ALL);
  set_exception_handler(function($e){
    throw_error("*");
  });
*/
  $mime=array("image/gif"=>"gif","image/jpeg"=>"jpg","image/png"=>"png","text/plain"=>"txt");
  if($_SERVER["REQUEST_METHOD"]!=="POST")
    throw_error("1");
  if(!isset($_POST)||!isset($_FILES))
    throw_error("2");
  if(!isset($_POST["key"]))
    throw_error("3");
  if($_POST["key"]!=="a")//-----keyを確認
    throw_error("4");
  foreach($_FILES as $name=>$file){//エラーチェックのforeach
    $tmp=$file["tmp_name"];
    $name=str_replace("_",".",$name);
    $ref="./".str_replace("|","/",$name);
    if(!isset($file["error"])||!is_int($file["error"]))
      throw_error("5");
    switch($file["error"]){
      case UPLOAD_ERR_OK:
        break;
      case UPLOAD_ERR_NO_FILE:
        throw_error("6");
      case UPLOAD_ERR_INI_SIZE:
      case UPLOAD_ERR_FORM_SIZE:
        throw_error("7,".$file);
      default:
        throw_error("8");
    }
    if(!preg_match("/^[a-zA-Z0-9\|\.]+$/",$name))
      throw_error("9");
    if($name!==$file["name"])
      throw_error("10");
    if(substr_count($name,".")!==1)
      throw_error("11");
    if(!file_exists(str_replace(basename($ref),"",$ref)))
      throw_error("12");
    if(!isset($mime[mime_content_type($tmp)]))
      throw_error("13");
    if(!preg_match("/".$mime[mime_content_type($tmp)]."$/",$name))
      throw_error("*");
    if(!is_uploaded_file($tmp))
      throw_error("14");
    if(mime_content_type($tmp)==="image/jpg"){
      $gd=imagecreatefromjpeg($tmp);
      $w=imagesx($gd);
      $h=imagesy($gd);
      $gd_out=imagecreatetruecolor($w,$h);
      imagecopyresampled($gd_out,$gd,0,0,0,0,$w,$h,$w,$h);
      imagejpeg($gd_out,$tmp);
      imagedestroy($gd);
    }
  }
  foreach ($_FILES as $name=>$file){//ファイルを保存するforeach
    $name=str_replace("_",".",$name);
    $ref="./".str_replace("|","/",$name);
    if(!move_uploaded_file($file["tmp_name"],$ref))
      throw_error("15,".$file);
    if(!chmod($ref,0606))
      throw_error("16,".$file);
    echo $name.",";
  }
?>
