<!DOCTYPE html>
<html>
	<head>
        <?php include_once $_SERVER['DOCUMENT_ROOT']."/project_highschool/common/head.php";?>
		<link rel="stylesheet" href="http://<?=$_SERVER["HTTP_HOST"]?>/project_highschool/register/register.css">
        <script src="./js/register.js"></script>
	</head>
	<body>
		<header>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/project_highschool/common/header.php"; ?>
		</header>
		<section>
			<!-- 회원가입 폼 -->
			<div id="main_content">
				<div id="join_box">
					<h2>회원 가입</h2>
					<form name="member_form" method="post" action="./register_insert.php">
						<table>
							<tr>
								<th>사용자 ID</th>
								<td>
                                    <input type="text" name="id">
									<input type="button" value="중복 확인" onclick="check_id()">
                                </td>
							</tr>

							<tr>
								<th>비밀번호</th>
								<td><input type="password" name="pass"></td>
							</tr>

							<tr>
								<th>비밀번호 확인</th>
								<td colspan="2"><input type="password" name="pass_confirm"></td>
							</tr>
							<tr>
								<th>성명</th>
								<td><input type="text" name="name">
								</td>
							</tr>
							<tr>
								<th>E-mail</th>
								<td><input type="text" name="email1">@<input type="text" name="email2"></td>
							</tr>
						</table>
						<br>
						<div>
							<input type="button" value="회원가입" onclick='check_input()'>
							<input type="button" value="초기화" onclick='reset_form()'>
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

