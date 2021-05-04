<?php 
    include_once $_SERVER['DOCUMENT_ROOT']."./project_highschool/common/db/db_conn.php";

    // 전송된 post 데이터 체크
    $id = input_set($_POST["id"]);
    $pass = input_set($_POST["pass"]);

    //***************************************
    // CALL STORED PROCEDURE : ID, PASS CHECK
    //***************************************
    // 데이터 패턴체크 stored procedure call
    $sql = "call SIGNIN('$id','$pass',@resultCode)";
    $result = mysqli_query($con, $sql);
    // 해당 아이디와 패스워드가 맞지 않다면 result set은 없다. resultCode만 있다.

    $sql = "select @resultCode";
    $out_result = mysqli_query($con, $sql);

    // $out_row["@resultCode"] or $out_row[0] = 0 or -1 or -2 결과값을 가져온다.
    $out_row = mysqli_fetch_array($out_result);
    $resultCode = $out_row[0];

    if($resultCode == -1){
        alert_back("아이디 입력 에러");
        exit;
    }else if($resultCode == -2){
        alert_back("패스워드 입력 에러");
        exit;
    }else if($resultCode == 0){
        // $result에는 제대로된 result set이 들어있을 것이다.
        $row = mysqli_fetch_array($result);
        session_start();
        $_SESSION["user_id"] = $row["id"];
        $_SESSION["user_name"] = $row["name"];
        $_SESSION["user_level"] = $row["level"];
        $_SESSION["user_point"] = $row["point"];
        echo("
            <script>
                alert('로그인 되었습니다.');
                location.href = 'http://{$_SERVER["HTTP_HOST"]}/project_highschool/index.php';
            </script>
        ");
    }   // end of if



?>