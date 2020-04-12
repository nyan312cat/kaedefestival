<!DOCTYPE html>
<html lang="ja">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0">
	<title>かえで祭　毎年の様子</title>
	<link rel="stylesheet" href="/common.css">
	<link rel="stylesheet" href="./index.css">
</head>
<body>
<!-- ヘッダーを入れる -->
<main>
	<h2>毎年の様子</h2>
	<ul id="eachYearMain">
		<?=
			array_reduce(glob("../img/eachYear/*"), function($res,$dir){
				if(!is_dir($dir))return $res;
				$year=basename($dir);
				return "${res}<li><a href='/eachYear.php?year=${year}'>${year}年度</a>".array_reduce(glob($dir."/*"),function($r,$f){
					return "${r}<img src='${f}'>";
				},"")."</li>";
			},"")
		?>
	</ul>
</main>

<script src="/common.js"></script>
<script src="./index.js"></script>
</body>
</html>
