<!DOCTYPE html>
<html lang="ja">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>かえで祭　ホームページ</title>
	<link rel="stylesheet" href="./index.css">
	<link rel="stylesheet" href="/common.css">
</head>
<body>

<?=file_get_contents($_SERVER["DOCUMENT_ROOT"]."/header.html")?>

<main>
	<h2>各企画</h2>
	<ul class="main">
		<li><a href="/contents/grade/zenki.html">前期生の企画</a>
			<img　src="/img/contents/grede/1/0.jpg"><img src="/img/contents/grade/2/0.jpg"><img src="/img/contents/grade/3/0.jpg">
		</li>
		<li><a href="/contents/grade/kouki4.html">4年次生の企画</a>
			<img src="/img/contents/grade/4/0.jpg"><img src="/img/contents/grade/4/1.jpg">
		</li>
		<li><a href="/contents/grade/kouki5.html">5年次生の企画</a>
			<img src="/img/contents/grade/5/0.jpg"><img src="/img/contents/grade/5/1.jpg">
		</li>
		<li><a href="/contents/grade/kouki6.html">6年次生の企画</a>
			<img src="/img/contents/grade/6/0.jpg"><img src="/img/contents/grade/6/1.jpg">
		</li>
		<li><a href="/contents/place/gym.html">体育館の企画</a>
			<img src="/img/contents/place/gym/0.jpg"><img src="/img/contents/place/gym/1.jpg">
		</li>
		<li><a href="/contents/place/hall.html">生徒ホールの企画</a>
			<img src="/img/contents/place/hall/0.jpg"><img src="/img/contents/place/hall/1.jpg">
		</li>
		<li><a href="/contents/place/music.html">音楽室の企画</a>
			<img src="/img/contents/place/music/0.jpg"><img src="/img/contents/place/music/1.jpg">
		</li>
		<li><a href="/contents/other/club.html">部活動の企画</a>
			<img src="/img/contents/other/club/0.jpg"><img src="/img/contents/other/club/1.jpg">
		</li>
		<li><a href="/contents/other/volunteer.html">有志企画</a>
			<img src="/img/contents/other/volunteer/0.jpg"><img src="/img/contents/other/volunteer/1.jpg">
		</li>
	</ul>
	<h2>校内地図</h2>
	<ul class="main">
		<li><a href="/map/map.html">地図</a><img></li>
	</ul>
	<h2>スケジュール</h2>
	<ul class="main">
		<li><a href="/schedule.html">スケジュール</a><img></li>
	</ul>
</main>

<script src="/common.js"></script>
<script src="./index.js"></script>
</body>
</html>
