<?php
    include_once $_SERVER['DOCUMENT_ROOT']."/project_highschool/common/db/db_conn.php";

    // 입력 데이터 체크
    $id = input_set($_POST["id"]);
    $pass = input_set($_POST["pass"]);
    $name = input_set($_POST["name"]);
    $email1 = input_set($_POST["email1"]);
    $email2 = input_set($_POST["email2"]);

    $email = $email1 ."@". $email2;
    $regist_day = date("Y-m-d (H:i)");

    // 입력된 data 패턴채크(이름, 이메일)
    $pattern = "/[가-힣]+/"; // 한글 소리 마디

    if (!preg_match($pattern, $name)) {
        alert_back($name."은 형식에 맞지 않습니다.");
        exit;

    }

    // 이메일 패턴 매칭 함수
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        alert_back($email."은 형식에 맞지 않습니다.");
        exit;
    }

    // transaction - rollback, commit
    $success = true;    // 트랜젝션의 플래그선정
    $result = mysqli_query($con, "SET AUTOCOMMIT=0"); // 반드시 자동 커밋을 0으로 설정 해야한다. 자동커밋 방지
    $result = mysqli_query($con, "START TRANSACTION");          // 트랜잭션 시작

    // ==================
    $sql = "insert into members( id, pass, name, email, regist_day, level, point) ";
    $sql .= "values('$id','$pass','$name','$email','$regist_day',9 ,0)";
    // COMMIT 명령을 받아야만 정상적으로 실행됨
    $insert_result = mysqli_query($con, $sql);
    // ================== 트랜잭션 영역

    if(!$insert_result) $success = false;   // 오류 발생으로 flag값을 false로 선정

    if($success == false){  // 문제 발생
        $result = mysqli_query($con,"ROLLBACK");
        alert_back("insert error로 인한 ROLLBACK 됨");
    }else{
        mysqli_query($con, "COMMIT");
        echo "
              <script>
                    alert('회원가입 완료');
                   location.href = 'http://{$_SERVER['HTTP_HOST']}/project_highschool/index.php';
              </script>
          ";
    }


    $result = mysqli_query($con, "SET AUTOCOMMIT=1");   // 자동커밋 다시 설정하고 트랜잭션 해제


    // DB connect close
    mysqli_close($con);

    // if($insert_result === false){
    //     alert_back("회원가입 실패");
    // }else{
    //     echo "
    //           <script>
    //                 alert('회원가입 완료');
    //                location.href = 'http://{$_SERVER['HTTP_HOST']}/project_highschool/index.php';
    //           </script>
    //       ";
    // }

?>