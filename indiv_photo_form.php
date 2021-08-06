<?php
session_start();
include("functions.php");
check_session_id();
?>

<!DOCTYPE html>
<html lang="ja">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>職員画面:写真登録</title>
	<link rel="stylesheet" href="staffpage.css">
</head>

<body>
	<div class="applreadmain">
		<p class="msg">&emsp;ログインID: <?= $_SESSION['staffname'] ?>
			&emsp;&emsp;
			<a href="admin_login.php" class="linkstyle">管理者ログイン画面</a> /
			<a href="staff_register.php" class="linkstyle">アカウント登録画面</a> /
			<a href="damagelist_read.php" class="linkstyle">申請一覧画面</a> /
			<a href="damagephoto_read.php" class="linkstyle">写真一覧画面</a> /
			<a href="indiv_input.php" class="linkstyle">申請入力画面</a> /
			<a href="admin_logout.php" class="linkstyle">ログアウト</a>
		</p>
		<p class="adminpagetitle">写真登録</p>
		<div class="appllistwrap">　
			<div class="appllistinnerwrap">
				<form enctype="multipart/form-data" action="./photo_upload.php" method="POST">
					<fieldset>
						<!-- <legend>■ 被害状況がわかる写真</legend> -->
						<div class="wrapForm">
							<div class="imgarea">
								<input type="hidden" name="MAX_FILE_SIZE" value="3145728" />
								<input name="img" type="file" accept="image/*" />
							</div>
							<div>
								<textarea name="caption" placeholder="キャプション： 氏名・ほ場住所など（140文字以下）" id="caption"></textarea>
							</div>
							<div class="loginbtnwrap">
								<button class="loginbtn" type="button" onclick="submit()">トウロク</button>
							</div>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script>
		$(function() {
			$('input[type=file]').after('<span></span>');
			// アップロードするファイルを選択
			$('input[type=file]').change(function() {
				var file = $(this).prop('files')[0];
				// 画像表示
				var reader = new FileReader();
				reader.onload = function() {
					var img_src = $('<img>').attr('src', reader.result);
					$('span').html(img_src);
				}
				reader.readAsDataURL(file);
			});
		});
	</script>
</body>

</html>