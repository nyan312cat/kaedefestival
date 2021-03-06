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
				<li/><a href="/index.html">企画一覧</a>
				<li/><a href="/contents/grade/zenki.html">前期生</a>
				<li/><a href="/contents/grade/kouki4.html">４年次</a>
				<li/><a href="/contents/grade/kouki5.html">５年次</a>
				<li/><a href="/contents/grade/kouki6.html">６年次</a>
				<li/><a href="/contents/place/gym.html">体育館</a>
				<li/><a href="/contents/place/hall.html">生徒ホール</a>
				<li/><a href="/contents/place/music.html">音楽室</a>
				<li/><a href="/contents/oother/club.html">部活動</a>
				<li/><a href="/contents/oother/volunteer.html">有志企画</a>
			</ul>
		<li><a href="/map/map.html">校内地図</a></li>
		<li><a href="/schedule.html">スケジュール</a></li>
		<li><a>過年度の様子</a>
			<ul id="eachYearMenu">
				<?php
					$dir=glob("./img/eachYear/*");
					rsort($dir);
					echo array_reduce($dir, function($res,$dir){
						if(!is_dir($dir))return $res;
						$year=basename($dir);
						return "${res}<li><a href='/eachYear.php?year=${year}'>${year}年度</a></li>";
					},"")
				?>
			</ul>
		</li>
		<li><a>並木中等HP</a>
			<ul>
				<li/><a href="http://www.namiki-cs.ibk.ed.jp/" target="_blank">ホームページ</a>
				<li/><a href="http://www.namiki-cs.ibk.ed.jp/?page_id=447" target="_blank">アクセスマップ</a>
			</ul>
		</li>
	</ul>
	<!-- ==========メニュー終わり========== -->
</header>
