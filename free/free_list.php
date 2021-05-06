<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . "/project_highschool/common/db/db_conn.php";
    include_once $_SERVER['DOCUMENT_ROOT'] . "/project_highschool/common/db/db_create_table.php";

    create_table($con, 'free');//자유게시판테이블생성
    create_table($con, 'free_ripple');//자유게시판덧글테이블생성

    //상수 지정
    define('SCALE', 10);	// 계시판에 보이는 글 수
    $memo_content = "";

    if (isset($_POST["mode"]) && $_POST["mode"] == "search") {
        //제목, 내용, 아이디
        $find = input_set($_POST["find"]);
        $search = input_set($_POST["search"]);
        //보안을 위해 사용 injection 방지
        $q_search = mysqli_real_escape_string($con, $search);

		// q_search가 들어간 글자는 모두 찾아라
        $sql = "SELECT * from `free` where $find like '%$q_search%' order by num desc;";
    } else {
        $sql = "SELECT * from `free` order by num desc";
    }

	// 쿼리 결과물을 result set 저장
    $result = mysqli_query($con, $sql);
    $total_record = mysqli_num_rows($result);

    $total_page = ($total_record % SCALE == 0) ? ($total_record / SCALE) : (ceil($total_record / SCALE));

    //2.페이지가 없으면 디폴트 페이지 1페이지
    if (empty($_GET['page'])) {
        $page = 1;
    } else {
        $page = $_GET['page'];
    }

    $start = ($page - 1) * SCALE;

	// 번호순서 5,4,3,2,1 번째 게시물
    $number = $total_record - $start;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once $_SERVER['DOCUMENT_ROOT']."/project_highschool/common/head.php"?>
    <link rel="stylesheet" type="text/css"
		      href="http://<?= $_SERVER['HTTP_HOST'] ?>/project_highschool/free/css/free.css">
    <script></script>

</head>
<body>
    <header>
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/project_highschool/common/header.php"; ?>
    </header>

    <section>
        <div class="free_content">
            <div class="free_title">
                <h3>답변형 게시판 > 목록보기</h3>
            </div>

            <form name="board_form" action="free_list.php" method="post">
            <input type="hidden" name="mode" value="search">
                <div class="free_search">
                    <div>총<?=$total_record?>개의 게시물이 있습니다.</div>

                    <div class="free_search_right">
                        <div><img src="./img/select_search.gif"></div>
                        <div>
                            <select name="find" >
                                <option value="subject">제목</option>
                                <option value="content">내용</option>
                                <option value="name">이름</option>
                                <option value="id">아이디</option>
                            </select>
                        </div>
                        <div><input type="text" name="search"></div>
                        <div><input type="image" src="./img/list_search_button.gif"></div>
                    </div>
                
                </div>
            </form>

            <div class="free_subject">
                <!-- <ul>
                    <li><img src="./img/list_title1.gif" alt=""></li>
                    <li><img src="./img/list_title2.gif" alt=""></li>
                    <li><img src="./img/list_title3.gif" alt=""></li>
                    <li><img src="./img/list_title4.gif" alt=""></li>
                    <li><img src="./img/list_title5.gif" alt=""></li>
                </ul> -->
                <div class="free_board_num">
                    <span><img src="./img/list_title1.gif" alt="공지번호"></span>
                </div>
                <div class="free_board_title">
                    <span><img src="./img/list_title2.gif" alt="공지제목"></span>
                </div>
                <div>
                    <ul>
                        <li><img src="./img/list_title3.gif" alt="작성자"></li>
                        <li><img src="./img/list_title4.gif" alt="작성일"></li>
                        <li><img src="./img/list_title5.gif" alt="조회"></li>
                    </ul>
                </div>


            </div>

            <div class="free_list">
                <?php
                    for ($i = $start; $i < $start + SCALE && $i < $total_record; $i++) {
                        mysqli_data_seek($result, $i);
                        $row = mysqli_fetch_array($result);
                        $num = $row['num'];
                        $id = $row['id'];
                        $name = $row['name'];
                        $nick = $row['nick'];
                        $hit = $row['hit'];
                        $date = substr($row['regist_day'], 0, 10);
                        $subject = $row['subject'];
                        $subject = str_replace("\n", "<br>", $subject);
                        $subject = str_replace(" ", "&nbsp;", $subject);
                        if ($row["file_name_0"])
                            $file_image = "<img src='./img/file.gif'>";
                        else
                            $file_image = " ";
                    ?>
                    <div class="free_board_num_title">

                        
                        <div class="free_board_num">
                            <div><?=$number?></div>
                        </div><!-- free_board_num -->
                        
                        <div class="free_board_title">
                            <div>
                                <a href="./view.php?num=<?= $num ?>&page=<?= $page ?>&hit=<?= $hit + 1 ?>"><?= $subject ?></a>
                            </div>
                        </div><!-- free_board_title -->
                        
                        <div>
                            <ul>
                                <li><?=$file_image?><?=$name?></li>
                                <li><?=$date?></li>
                                <li><?=$hit?></li>
                            </ul>
                        </div>
                    </div>

                        
                        <?php 
                        $number--;
                    }   // end of for
                    ?>
            </div>
            
            <div class="free_bottom">
                <div class="page_num">이전◀ &nbsp;&nbsp;&nbsp;&nbsp;
                    <?php
                        for ($i = 1; $i <= $total_page; $i++) {
                            if ($page == $i) {
                                echo "<b>&nbsp;$i&nbsp;</b>";
                            } else {
                                echo "<a href='./list.php?page=$i'>&nbsp;$i&nbsp;</a>";
                            }
                        }
                    ?>
                    &nbsp;&nbsp;&nbsp;&nbsp;▶ 다음
                </div>

                <div class="write_button">
                    <a href="./free_list.php?page=<?= $page ?>"> 
                        <img src="./img/list.png" alt="목록">
                    </a>
                    <?php //세션아디가 있으면 글쓰기 버튼을 보여줌.
                        if (!empty($_SESSION['user_id'])) {
                            echo '<a href="write_edit_form.php"><img src="./img/write.png"></a>';
                        }
                    ?>
                </div>
            </div>


            

        </div>

    </section>

    <footer>
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/project_highschool/common/footer.php"; ?>
    </footer>
    
</body>
</html>