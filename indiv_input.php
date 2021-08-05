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
	<title>職員画面:申請入力</title>
	<link rel="stylesheet" href="staffpage.css">
</head>

<body>
	<div class="applreadmain">
		<p class="msg">&emsp;ログインID: <?= $_SESSION['staffname'] ?>
			&emsp;&emsp;
			<a href="admin_login.php" class="linkstyle">管理者ログイン画面</a> /
			<a href="staff_register.php" class="linkstyle">アカウント登録画面</a> /
			<!-- <a href="shinsei_graph.php" class="linkstyle">申請一覧画面</a> / -->
			<a href="damagephoto_read.php" class="linkstyle">写真一覧画面</a> /
			<a href="admin_logout.php" class="linkstyle">ログアウト</a>
		</p>
		<p class="adminpagetitle">申請入力</p>
		<div class="appllistwrap">
			<div class="appllistinnerwrap">
				<form action=" indiv_create.php" method="POST" onsubmit="return false;">
					<!-- Enterキーでの誤送信を防ぐ(1) onsubmit="return false";でsubmitを中止 -->
					<fieldset>
						<div class="wrapForm">
							<div class="inputboxIv">
								り災原因: <input type="date" name="cause" value="2020-07-06">の大雨/台風によるもの
							</div>
							<div class="inputboxIv">
								地区: <select name="jaBranch" id="jaBranch">
									<option hidden>--- ※ 地区を選択 ---</option>
									<option value="東部">東部</option>
									<option value="西部">西部</option>
									<option value="南部">南部</option>
									<option value="北部">北部</option>
								</select>
							</div>
							<div class="inputboxIv">
								氏名: <input type="text" name="reqName" id="reqName">
							</div>
							<div class="inputboxIv">
								ふりがな: <input type="text" name="kana" id="kana">
							</div>
							<div class="inputboxIv">
								生年月日: <input type="date" name="birth" value="1970-01-01">
							</div>
							<div class="inputboxIv">
								<!-- ▼郵便番号入力フィールド(7桁) -->
								郵便番号: <input type="text" name="zip" onKeyUp="AjaxZip3.zip2addr(this,'','addr','addr');" id="zip" placeholder="8300000">
							</div>
							<div class="inputboxIv">
								<!-- ▼住所入力フィールド(都道府県+以降の住所) -->
								住所: <textarea name="addr" id="addr" rows="1"></textarea>
							</div>
							<div class="inputboxIv">
								TEL: <input type="tel" name="tel">
							</div>
							<div class="inputboxIv">
								<!-- あとで正規表現を追加 -->
								Eメール: <input type="email" name="email" placeholder="foo@example.com">
							</div>
							<div class="inputboxIv">
								品目: <select name="item">
									<option hidden>--- ※ 品目を選択 ---</option>
									<option value="小松菜">小松菜</option>
									<option value="サラダ菜">サラダ菜</option>
									<option value="リーフレタス">リーフレタス</option>
									<option value="ほうれんそう">ほうれんそう</option>
									<option value="その他軟弱">その他軟弱野菜</option>
									<option value="いちご">いちご</option>
									<option value="トマト">トマト</option>
									<option value="きゅうり">きゅうり</option>
									<option value="その他軟弱">その他野菜</option>
									<option value="菊">菊</option>
									<option value="その他花卉">その他花卉花木</option>
									<option value="その他園芸">その他園芸作物</option>
								</select>
							</div>
							<div class="inputboxIv">
								圃場住所: <input type="text" name="fieldAddr" value="久留米市">
							</div>
							<div class="inputboxIv">
								面積: <input type="number" min="0" step="0.01" name="fieldArea">a
							</div>
							<div class="inputboxIv">
								浸水深: <input type="number" min="0" step="0.01" name="fieldArea">a
							</div>
							<div class="inputboxIv">
								被害項目: <select name="damages">
									<option hidden>--- ※ 項目を選択 ---</option>
									<option value="作物">作物</option>
									<option value="ハウス">ハウス</option>
									<option value="附帯施設">附帯施設</option>
									<option value="機械">農業用機械</option>
									<option value="その他">その他</option>
								</select>
							</div>
							<div class="inputboxIv">
								被害額: <input type="number" min="0" step="1" name="amounts">円
							</div>
							<div class="inputboxIv">
								状況詳細: <textarea name="memo" rows="1"></textarea>
							</div>
							<div class="loginbtnwrap">
								<button class="loginbtn" type="button" onclick="submit()">トウロク</button>
								<!-- Enterキーでの誤送信を防ぐ(2) type=”submit”だと送信されてしまうのでtype=”button”に変更。
            onclick=”submit();”でボタンを押した時だけsubmitさせる -->
							</div>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js">
	</script>
	<!-- ふりがなのスクリプト -->
	<script src="jquery.autoKana.js" type="text/javascript"></script>
	<!-- 郵便番号のスクリプト -->
	<script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
	<script>
		$(function() {
			$.fn.autoKana('#reqName', '#kana');
		});
	</script>
</body>

</html>