<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>진수고등학교</title>

        <?php include_once $_SERVER['DOCUMENT_ROOT']."/project_highschool/common/head.php";?>
		<!-- <link rel="stylesheet" type="text/css" href="http://<?=$_SERVER["HTTP_HOST"]?>/project_highschool/css/main.css"> -->
		<link rel="stylesheet" type="text/css" href="./register.css">

		
		<script src="js/member_modify.js"></script>
		<!-- <script src="http://<?=$_SERVER["HTTP_HOST"]?>/project_highschool/js/main_img_bar.js" defer></script> -->
	</head>
	<body>
		<header>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/project_highschool/common/header.php"; ?>
		</header>
		<section>
			<div id="main_content">
				<div id="join_box">
					<h2>정말로 회원탈퇴를 하시겠습니까?</h2>
					<form name="member_form" method="post" action="register_delete.php">
						<input type="hidden" name="id" value="<?=$userid?>">
						<br><br>
						<div>
							<input style="width:60px; height:45px;" type="submit" value="확인">
						</div>
					</form>
				</div> <!-- join_box -->
			</div> <!-- main_content -->
		</section>
		<footer>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/project_highschool/common/footer.php"; ?>
		</footer>
	</body>
</html>

