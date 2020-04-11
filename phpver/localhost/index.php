<!DOCTYPE html>
<html lang="ja">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>かえで祭　ファイルアップロード</title>
	<link rel="stylesheet" href="/common.css">
	<link rel="stylesheet" href="./index.css">
</head>
<body>
		<?php
			$whiteList=Array("./index.js","./index.php","./index.css","./php");
			$error=false;
			function mkRef($ref,$indent){
				global $table;
				global $whiteList;
				global $error;
				$tmp_table="";
				$res="";
				$arr=glob($ref);
				$l=count($arr);
				foreach($arr as $i=>$file){
					if(!preg_match("/^[a-zA-Z0-9\/\.]+$/",$file)){
						echo "<h2>ファイル名は英数字のみ有効です<br>at : ${file}</h2>";
						$error=true;
					}
					$name=basename($file);
					if(in_array($file,$whiteList,true))
						continue;
					elseif(is_file($file)){
						$tmp_table.=$indent.($i===$l-1?"\u{2514}":"\u{251c}").$name."<br>";
						$res.=","."\"$file\"";
					}elseif(is_dir($file)){
						if($i===$l-1){
							$tmp_res=mkRef($file."/*",$indent."　");
							$tmp_table.=$indent."\u{2514}".$name."<br>".$tmp_res[1];
						}else{
							$tmp_res=mkRef($file."/*",$indent."\u{2502}");
							$tmp_table.=$indent."\u{251c}".$name."<br>".$tmp_res[1];
							$res.=$tmp_res[0];
						}
					}
				}
				return Array($res,$tmp_table);
			}
			$result=mkRef("./*","");
			if($error)exit;
			$result[0]=preg_replace("/,$/","",preg_replace("/,,+/",",",preg_replace("/^,/","",$result[0])));
			echo "<script>//const fileRefs=[".$result[0]."];</script>";
		?>
<main>
	<div id="log">
		<h2>読み込むファイル</h2>
		<?=$result[1]?>
		<br><br>
		<label><input type="checkbox" id="check">確認</label><br>
		<button type="button" id="upload">ファイルをアップロード</button>
	</div>
</main>

<script src="./index.js"></script>
</body>
</html>
