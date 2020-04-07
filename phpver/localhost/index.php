<!DOCTYPE html>
<html lang="ja">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>かえで祭　ホームページ</title>
	<link rel="stylesheet" href="/common.css">
	<link rel="stylesheet" href="./index.css">
</head>
<body>
		<?php
			$whiteList=Array("./index.js","./index.php","./index.css");
			function mkRef($ref){
				global $whiteList;
				return array_reduce(glob($ref), function($res,$file){
					global $whiteList;
					if(in_array($file,$whiteList,true))
						return $res;
					elseif(is_file($file))
						return $res.","."\"$file\"";
					elseif(is_dir($file))
						return $res.mkRef($file."/*");
					else
						return $res;
				},"");
			}
			echo "<script>const fileRefs=[".mkRef('./*')."];</script>";
		?>
<main>
	<div id="log">
		<h2>読み込むファイル</h2>
		<?php
			function mkTable($ref,$indent){
				global $whiteList;
				$res="";
				$l=count(glob($ref));
				foreach (glob($ref) as $i => $file) {
					$name=basename($file);
					if(in_array($file,$whiteList,true))
						continue;
					elseif(is_file($file)){
						$res.=$indent.($i===$l-1?"\u{2514}":"\u{251c}").$name."<br>";
					}elseif(is_dir($file)){
						if($i===$l-1)
							$res.=$indent."\u{2514}".$name."<br>".mkTable($file."/*",$indent."　");
						else
							$res.=$indent."\u{251c}".$name."<br>".mkTable($file."/*",$indent."\u{2502}");
					}
				}
				return $res;
			}
			echo mkTable("./*","");
		?>
		<br><br>
		<label><input type="checkbox" id="check">確認</label><br>
		<button type="button" id="upload">ファイルをアップロード</button>
	</div>
</main>

<script src="./index.js"></script>
</body>
</html>
