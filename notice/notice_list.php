<!DOCTYPE html>
<html>
	<head>
        <?php include_once $_SERVER['DOCUMENT_ROOT']."/project_highschool/common/head.php"?>
		
		<link rel="stylesheet" type="text/css"
		      href="http://<?= $_SERVER['HTTP_HOST'] ?>/project_highschool/notice/notice_css/notice.css">

		<script src="http://<?= $_SERVER['HTTP_HOST'] ?>/project_highschool/notice/js/notice.js"></script>
	</head>
	<body>
		<header>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/project_highschool/common/header.php"; ?>
		</header>

        <?php include_once $_SERVER['DOCUMENT_ROOT'] . "/project_highschool/common/db/db_conn.php";
            include_once $_SERVER['DOCUMENT_ROOT'] . "/project_highschool/common/db/db_create_table.php";
            create_table($con,'notice_home');?>
		<section>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/project_highschool/common/main_img_bar.php"; ?>
			<div id="notice_box">
                <?
                $notice_Btn =isset( $_GET["notice_Btn"]) ? $_GET['notice_Btn'] :"";
                if($notice_Btn == 1 ){
                    ?>
				<h3>공지사항 > 목록</h3>
                <?
                } else{
                ?>
                <h3>가정통신문 > 목록</h3>
                <?
                }
                ?>
				<ul class="notice_list">
                    <li>
                        <span class="col1">번호</span>
						<span class="col2">제목</span>
						<span class="col3">글쓴이</span>
						<span class="col5">등록일</span>
						<!-- <span class="col6">조회</span> -->
					</li>
				</ul>
                
                <?php
                        include_once $_SERVER['DOCUMENT_ROOT'] . "/project_highschool/common/db/db_conn.php";
                        
                        // 공지사항 page 이동
                        // GET으로 넘어온 값이 없으면 page를 1로 한다.
                        if (isset($_GET["page"]))
                        $page = $_GET["page"];
                        else
                        $page = 1;
                        
                        $notice_Btn =isset( $_GET["notice_Btn"]) ? $_GET['notice_Btn'] :"";

                        
                        
                        // notice_home 테이블에서 내림차순으로 레코드를 가져온다.
                        include_once $_SERVER['DOCUMENT_ROOT'] . "/project_highschool/notice/notice_method.php";
                        
                        // POST로 넘어온 notice_Btn 값에 따라 sql에 적절한 query문이 들어간다.
                        $sql = methodTest($notice_Btn);
                        // echo "<script>alert('$sql');</script>";

                        $result = mysqli_query($con, $sql);
                        $total_record = mysqli_num_rows($result); // 전체 글 수

                        // 최대 10개의 레코드만 셋팅
                        $scale = 10;

                        // 전체 페이지 수($total_page) 계산
                        if (($total_record % $scale) == 0)
                            $total_page = floor($total_record / $scale);
                        else
                            $total_page = floor($total_record / $scale) + 1;

                        // 표시할 페이지($page)에 따라 $start 계산
                        $start = ($page - 1) * $scale;

                        // 전체 글 수 - 현재 페이지의 맨 위 글 
                        $number = $total_record - $start;
                        $notice_Btn = $_GET["notice_Btn"];

                        // $i < $total_record => 페이지에 보여질 개수가 scale 미만일 경우
                        for ($i = $start; $i < $start + $scale && $i < $total_record; $i++) {
                            
                            // 가져올 레코드로 위치(포인터) 이동
                            mysqli_data_seek($result, $i);

                            $row = mysqli_fetch_array($result);
                            // 하나의 레코드 가져오기
                            $num = $row["num"];
                            $id = $row["id"];
                            $name = $row["name"];
                            $subject = $row["subject"];
                            $regist_day = $row["regist_day"];
                        ?>


                        <ul class="notice_list">
                            <li>
                            
                                <span class="col1"><?= $number ?></span>
								<span class="col2"><a href="notice_view.php?num=<?= $num ?>&page=<?= $page ?>&notice_Btn=<?=$notice_Btn?>"><?= $subject ?></a></span>
								<span class="col3"><?= $name ?></span>
								<span class="col5"><?= $regist_day ?></span>
							</li>
                        </ul>
                        <?php
                            $number--;  // 바로 다음 글의 number
                        }
                        mysqli_close($con);

                        ?>
				<ul id="page_num">
                    <?php

                        // 전체페이지가 2이상이고, page가 2이상이면
                        if ($total_page >= 2 && $page >= 2) {
                            $new_page = $page - 1;
                            echo "<li><a href='notice_list.php?page=$new_page'>◀ 이전</a> </li>";
                        } else
                            echo "<li>&nbsp;</li>";

                        // 게시판 목록 하단에 페이지 링크 번호 출력
                        for ($i = 1; $i <= $total_page; $i++) {
                            if ($page == $i)     // 현재 페이지 번호 링크 안함
                            {
                                echo "<li><b> $i  </b></li>";
                            } else {
                                echo "<li><a href='notice_list.php?page=$i'> $i </a><li>";
                            }
                        }

                        // 전체페이지가 2이상이고, 마지막 페이지가 아니라면 실행
                        if ($total_page >= 2 && $page != $total_page) {
                            $new_page = $page + 1;
                            echo "<li> <a href='notice_list.php?page=$new_page'>다음 ▶</a> </li>";
                        } else
                            echo "<li>&nbsp;</li>";
                    ?>
				</ul> <!-- page -->
				<ul class="buttons">
					<li>
						<button onclick="location.href='notice_list.php'">목록</button>
					</li>
					<li>
                        <?php
                            // echo("<script>alert('$userid');</script>");
                            if (!empty($userid)) {
                                $notice_Btn =isset( $_GET["notice_Btn"]) ? $_GET['notice_Btn'] :"";
                                if($notice_Btn == 1){
                                ?>
                                <button onclick="location.href='http://<?=$_SERVER["HTTP_HOST"]?>/project_highschool/notice/notice_form.php?notice_Btn=<?='1'?>'">
                                    글쓰기
                                </button>
                                    
                                <?
                                } else{
                                ?>
                                    <button onclick="location.href='http://<?=$_SERVER["HTTP_HOST"]?>/project_highschool/notice/notice_form.php?notice_Btn=<?='2'?>'">
                                        글쓰기
                                    </button>
                                    
                                
                                <? } ?>
                                
                                <?php
                            } else {    // 로그인이 되어 있지 않다면
                                ?>
								<a href="javascript:alert('로그인 후 이용해 주세요!')">
									<button>글쓰기</button>
								</a>
                                <?php
                            }
                        ?>
					</li>
				</ul>
			</div> <!-- notice_box -->
		</section>
		<footer>
            <?php include_once $_SERVER['DOCUMENT_ROOT'] . "/project_highschool/common/footer.php"; ?>
		</footer>
	</body>
</html>
