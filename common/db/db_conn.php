<?php
    date_default_timezone_set("Asia/Seoul");
    $server_name = "localhost";
    $user_name = "root";
    $pass = "123456";
    $db_name = "highschool_db";

    $con = mysqli_connect($server_name, $user_name, $pass);
    $query = "create database if not exists highschool_db";
    // die는 쿼리에 에러가 있으면 프로그램을 멈추고 에러메세지 출력함
    // $con->query($query) : 쿼리문 실행
    $result = $con->query($query) or die($con->error);

    // DB 선택
    $con->select_db($db_name) or die($con->error);

    // 결과가 잘못 되었을 경우 경고해주고 뒤로가라
    function alert_back($message){
        echo("
			<script>
			alert('$message');
			history.go(-1)
			</script>
			");
    }

    function input_set($data){
        $data = trim($data);    // 빈공간 없애기
        $data = stripslashes($data);    // 슬래쉬 없애기
        $data = htmlspecialchars($data);    // 특수문자 예< > 등을 &lt; &gt; 엔티티로 바꿈
        return $data;
    }
?>