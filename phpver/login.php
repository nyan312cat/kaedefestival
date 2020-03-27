<!DOCTYPE html>
<html lang="ja">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>かえで祭　ログイン</title>
	<link rel="stylesheet" href="/common.css">
	<link rel="stylesheet" href="./login.css">
</head>
<body>

<header></header>

<main>
	<form action="./checkUser.php" method="post" name="login">
		<label>ユーザー名<input type="text" name="user"></label>
		<label>パスワード<input type="password" name="pass"></label>
		<button type="submit">ログイン</button>
	</form>
</main>

<script src="./login.js"></script>
</body>
</html>
