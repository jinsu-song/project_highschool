<meta charset="utf-8">
<?php
    include_once $_SERVER['DOCUMENT_ROOT']."/project_highschool/common/db/db_conn.php";

    //세션값확인
    session_start();
    // 유효한 접근자인가
    if (isset($_SESSION["user_id"])) $userid = $_SESSION["user_id"];
    else $userid = "";
    if (isset($_SESSION["user_name"])) $username = $_SESSION["user_name"];
    else $username = "";

    // 유효한 접근자가 아닐 경우
    if (!$userid) {
        echo("
		<script>
		alert('게시판 글쓰기는 로그인 후 이용해 주세요!');
		history.go(-1)
		</script>    
        ");
        exit;
    }

    $subject = $_POST["subject"];
    $content = $_POST["content"];

    // 교내 공지사항을 눌렀냐, 가정통신문을 눌렀냐
    // $notice_Btn = input_set($_POST["notice_Btn"]);

    // GET 방식으로 데이터를 가져옴
    // $notice_Btn =isset( $_GET["notice_Btn"]) ? $_GET['notice_Btn'] :"";

    
    // $subject = htmlspecialchars($subject, ENT_QUOTES);
    // $content = htmlspecialchars($content, ENT_QUOTES);
    $subject = input_set($subject);
    $content = input_set($content);
    
    $regist_day = date("Y-m-d (H:i)");  // 현재의 '년-월-일-시-분'을 저장

    $notice_Btn =isset( $_POST["notice_Btn"]) ? $_POST['notice_Btn'] :"";

    include_once $_SERVER['DOCUMENT_ROOT'] . "/project_highschool/notice/notice_method.php";

    // $sql = "insert into notice_home (id, name, subject, content, regist_day) ";
    // $sql .= "values('$userid', '$username', '$subject', '$content', '$regist_day');";

    
    $sql = insertQueryHandler($notice_Btn, $subject, $content,$regist_day);

    $insert_result = mysqli_query($con, $sql);  // $sql 에 저장된 명령 실행
    

    // 포인트 부여하기
    $point_up = 100;

    $sql = "select point from members where id='$userid'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);
    $new_point = $row["point"] + $point_up;

    $sql = "update members set point='$new_point' where id='$userid'";
    mysqli_query($con, $sql);

    mysqli_close($con);                // DB 연결 끊기

    if($insert_result == true){
        echo "
   <script>
    location.href = 'notice_list.php';
    alert('글쓰기 성공');
   </script>
    ";
    }else{
        echo "
   <script>
    location.href = 'notice_list.php';
    alert('글쓰기 실패');
   </script>
    ";
    }
    
    // alert_back("글쓰기 완료");
?>