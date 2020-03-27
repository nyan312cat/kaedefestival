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

<!-- ==========ヘッダーの始まり========== -->
<header>
	<div id="head">
		<img id="logo" src="/img/logo.png"/>
	</div>
	<!-- ==========メニュー始まり========== -->
	<label id="menubtn" for="menuCheckBox">
		<div>
		<div></div><div></div><div></div>
	</div>
	</label>
	<input type="checkbox" id="menuCheckBox">
	<label id="close" for="menuCheckBox"></label>
	<ul id="menu" ontouchstart="">
		<li/><a onclick="window.scroll(0,0)">先頭へ</a>
		<li/><a href="/index.html">ホームへ</a>
		<li/><a>今年の企画</a>
			<ul>
				<li/><a href="/contents/index.html">企画一覧</a>
				<li/><a href="/contents/zenki.html">前期生</a>
				<li/><a href="/contents/kouki.html?grade=4">４年次</a>
				<li/><a href="/contents/kouki.html?grade=5">５年次</a>
				<li/><a href="/contents/kouki.html?grade=6">６年次</a>
				<li/><a href="/contents/place.html?place=gym">体育館</a>
				<li/><a href="/contents/place.html?place=hall">生徒ホール</a>
				<li/><a href="/contents/place.html?place=music">音楽室</a>
				<li/><a href="/contents/club.html?type=club">部活動</a>
				<li/><a href="/contents/club.html?type=volunteer">有志企画</a>
			</ul>
		<li><a>過年度の様子</a>
			<ul>
				<?php
					echo array_reduce(glob(str_replace("\\","/",realpath(""))."/img/eachYear/*"), function($res, $dir){
						$year=basename($dir);
						return "$res<li><a href='/eachYear.html?year=$year'>${year}年度</a></li>";
					},"");
				?>
			</ul>
		</li>
		<li><a>並木中等HP</a>
			<ul>
				<li/><a href="http://www.namiki-cs.ibk.ed.jp/" target="_blank">ホームページ</a>
				<li/><a href="http://www.namiki-cs.ibk.ed.jp/?page_id=447" target="_blank">アクセス</a>
			</ul>
		</li>
	</ul>
	<!-- ==========メニュー終わり========== -->
</header>
<!-- ==========ヘッダーの終わり========== -->
<main>
	<h2>かえで祭とは</h2>
	<p>年に一度、茨城県立並木中等教育学校で行われる文化祭。<br class="noneIfpc">６月上旬に開かれ、１～６年次生や一般の方々が参加し、盛り上がる。</p>
	<h2>毎年の様子</h2>
	<ul id="eachYearMain">
		<?php
			echo array_reduce(glob("./img/eachYear/*"), function($res, $f){
				$year=basename($f);
				return "$res<li><a href='./eachYear.html?year=$year'>${year}年度</a>".array_reduce(glob("$f/*"),function($r,$img){
					return "$r<img src='$img'>";
				},"")."</li>";
			},"");
		?>
	</ul>
</main>

<!--<script src="./index.js"></script>-->
</body>
</html>
