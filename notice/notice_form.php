<!DOCTYPE html>
<html>

<head>
	<?php include_once $_SERVER['DOCUMENT_ROOT']."/project_highschool/common/head.php"?>
	<!-- <meta charset="utf-8"> -->
	<!-- <title>진수 고등학교</title> -->
	<!-- <link rel="stylesheet" type="text/css" href="http://<?= $_SERVER['HTTP_HOST'] ?>/php_practice/0420homework/css/main.css"> -->
	<link rel="stylesheet" type="text/css" href="http://<?= $_SERVER['HTTP_HOST'] ?>/project_highschool/notice/notice_css/notice.css">
	<script src="http://<?= $_SERVER['HTTP_HOST'] ?>/project_highschool/notice/js/notice.js"></script>
	<!-- <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script> -->
</head>

<body>
	<header>
		<?php include_once  $_SERVER['DOCUMENT_ROOT'] . "/project_highschool/common/header.php"; ?>
	</header>
	<?php
	if (!$userid) {
		echo ("<script>
				alert('로그인 후 이용해주세요!');
				history.go(-1);
				</script>
			");
		exit;
	}
	?>
	<section>
		<div id="notice_box">
			<h3 id="notice_title">
				공지사항 > 글 쓰기
			</h3>
			<? 
				$notice_Btn =isset( $_POST["notice_Btn"]) ? $_POST['notice_Btn'] :"";
				echo "<script>alert(${notice_Btn});</script>";
			?>
			<form name="notice_form" method="post" action="notice_insert.php" enctype="multipart/form-data">
				<?
				if($notice_Btn ==1){	// 교내 공지사항 클릭시
					?>
					<input style="display: none;" type="text" name="notice_Btn" value="1">
				<?
				} else{		// 가정통신문 클릭시
					?>
					<input style="display: none;" type="text" name="notice_Btn" value="2">
				<?
				}
				?>
				<ul id="notice_form">
					<li>
						<span class="col1">이름 : </span>
						<span class="col2"><?= $username ?></span>
					</li>
					<li>
						<span class="col1">제목 : </span>
						<span class="col2"><input name="subject" type="text"></span>
					</li>
					<li id="text_area">
						<span class="col1">내용 : </span>
						<span class="col2">
							<textarea name="content"></textarea>
						</span>
					</li>

				</ul>
				<ul class="buttons">
					<li><button type="button" onclick="check_input()">완료</button></li>
					<li><button type="button" onclick="location.href='notice_list.php'">목록</button></li>
				</ul>
			</form>
		</div> <!-- notice_box -->
	</section>
	<footer>
		<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/project_highschool/common/footer.php"; ?>
	</footer>
</body>

</html>