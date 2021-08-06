<?php
session_start();
include("functions.php");
check_session_id();
?>

<!DOCTYPE html>
<html lang="ja">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>農振図</title>
	<style>
		body {
			font-family: Roboto, "Yu Gothic Medium", "游ゴシック Medium", YuGothic, "游ゴシック体", "ヒラギノ角ゴ Pro W3", "メイリオ", sans-serif;
			padding: auto 0.5rem;
		}

		#noushinzu {
			border: 1px solid #666;
			border-radius: 8px;
			width: 98%;
			height: 700px;
			margin: auto;
		}
	</style>
</head>

<body>
	<header>
		<div>
			<p class="msg">&emsp;ログインID: <?= $_SESSION['staffname'] ?>
				&emsp;&emsp;
				<a href="admin_logout.php" class="linkstyle">ログアウト</a> /
				<!-- <a href="admin_login.php" class="linkstyle">管理者ログイン</a> / -->
				<a href="staff_register.php" class="linkstyle">アカウント登録</a> /
				<a href="damagelist_read.php" class="linkstyle">申請一覧</a> /
				<a href="damagephoto_read.php" class="linkstyle">写真一覧</a> /
				<a href="indiv_input.php" class="linkstyle">申請登録</a> /
				<a href="indiv_photo_form.php" class="linkstyle">写真登録</a> /
				<a href="damagemap.php" class="linkstyle">地図表示</a>
			</p>
		</div>
	</header>
	<main>
		<iframe id="noushinzu" title="noushinzu" src="noushinzu.pdf">
		</iframe>
	</main>
</body>

</html>