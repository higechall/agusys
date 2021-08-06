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
	<style>
		/* 写真登録 */
		div.imgarea {
			margin-top: 10px;
			margin-bottom: 10px;
		}

		/* 写真表示サイズ */
		img {
			max-width: 290px;
			max-height: 290px;
		}
	</style>
</head>

<body>
	<div class="applreadmain">
		<p class="msg">&emsp;ログインID: <?= $_SESSION['staffname'] ?>
			&emsp;&emsp;
			<a href="admin_logout.php" class="linkstyle">ログアウト</a> /
			<!-- <a href="admin_login.php" class="linkstyle">管理者ログイン</a> / -->
			<!-- <a href="staff_register.php" class="linkstyle">アカウント登録</a> /  -->
			<a href="damagelist_read.php" class="linkstyle">申請一覧</a> /
			<a href="damagephoto_read.php" class="linkstyle">写真一覧</a> /
			<a href="indiv_input.php" class="linkstyle">申請登録</a> /
			<!-- <a href="indiv_photo_form.php" class="linkstyle">写真登録</a> / -->
			<a href="damagemap.php" class="linkstyle">地図表示</a>
		</p>
		<p class="adminpagetitle">写真登録</p>
		<div class="appllistwrap">　
			<div class="appllistinnerwrap">
				<form enctype="multipart/form-data" action="indiv_photo_upload.php" method="POST">
					<fieldset>
						<!-- <legend>■ 被害状況がわかる写真</legend> -->
						<div class="wrapForm">
							<div class="imgarea">
								<input type="hidden" name="MAX_FILE_SIZE" value="3145728" />
								<input name="img" type="file" accept="image/*" />
							</div>
							<div>
								<textarea name="caption" placeholder="メモ： 氏名・ほ場住所など（140文字以下）" id="caption"></textarea>
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