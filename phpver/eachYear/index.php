<!DOCTYPE html>
<html lang="ja">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0">
	<title>かえで祭　ホームページ</title>
	<link rel="stylesheet" href="/common.css">
	<link rel="stylesheet" href="./index.css">
</head>
<body>
<?=file_get_contents($_SERVER["DOCUMENT_ROOT"]."/header.html")?>
<main>
	<h2>かえで祭とは</h2>
	<p>　年に一度、茨城県立並木中等教育学校で行われる文化祭。<br class="noneIfpc">６月上旬に開かれ、１～６年次生や一般の方々が参加し、盛り上がる。</p>
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
