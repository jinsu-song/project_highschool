<!DOCTYPE html>
<html>
	<head>
		<?php include_once $_SERVER['DOCUMENT_ROOT']."/project_highschool/common/head.php"?>
		<link rel="stylesheet" type="text/css" href="http://<?= $_SERVER['HTTP_HOST'] ?>/project_highschool/notice/notice_css/notice.css">

		<script src="http://<?=$_SERVER['HTTP_HOST'] ?>/project_highschool/notice/js/notice.js"></script>
	</head>
	<body>
		<header>
            <?php include  $_SERVER['DOCUMENT_ROOT'] . "/project_highschool/common/header.php"; ?>
		</header>
		<section>
            <?php include $_SERVER['DOCUMENT_ROOT']."/project_highschool/common/main_img_bar.php"; ?>
			<div id="notice_box">
				<h3 class="title">
					공지사항 > 내용보기
				</h3>
                <?php
                    include_once $_SERVER['DOCUMENT_ROOT'] . "/project_highschool/common/db/db_conn.php";
                    $num = $_GET["num"];
                    $page = $_GET["page"];
					$notice_Btn = $_GET["notice_Btn"];
					echo("<script>console.log('$notice_Btn');</script>");
					$sql = "";


					if($notice_Btn == 1){
						$sql = "select * from notice_highschool where num=$num";

					}else{
						$sql = "select * from notice_home where num=$num";
					}
                    $result = mysqli_query($con, $sql);

                    $row = mysqli_fetch_array($result);
                    $id = $row["id"];
                    $name = $row["name"];
                    $regist_day = $row["regist_day"];
                    $subject = $row["subject"];
                    $content = $row["content"];

                    $content = str_replace(" ", "&nbsp;", $content);
                    $content = str_replace("\n", "<br>", $content);

                ?>
				<ul id="view_content">
					<li>
						<span class="col1"><b>제목 :</b> <?= $subject ?></span>
						<span class="col2"><?= $name ?> | <?= $regist_day ?></span>
					</li>
					<li>
                        <?= $content ?>
					</li>
				</ul>
				<ul class="buttons">
					<li>
						<button onclick="location.href='notice_list.php?page=<?= $page ?>'">목록</button>
					</li>
					<li>
						<button onclick="location.href='notice_modify_form.php?num=<?= $num ?>&page=<?= $page ?>'">수정

						</button>
					</li>
					<li>
						<button onclick="location.href='notice_delete.php?num=<?= $num ?>&page=<?= $page ?>'">삭제</button>
					</li>
					<li>
						<button onclick="location.href='notice_form.php'">글쓰기</button>
					</li>
				</ul>
			</div> <!-- notice_box -->
		</section>
		<footer>
            <?php include  $_SERVER['DOCUMENT_ROOT'] . "/project_highschool/common/footer.php"; ?>
		</footer>
	</body>
</html>
