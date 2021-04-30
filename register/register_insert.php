<?php
    include_once $_SERVER['DOCUMENT_ROOT']."/project_highschool/common/db/db_conn.php";

    $id = input_set($_POST["id"]);
    $pass = input_set($_POST["pass"]);
    $name = input_set($_POST["name"]);
    $email1 = input_set($_POST["email1"]);
    $email2 = input_set($_POST["email2"]);

    $email = $email1 ."@". $email2;
    $regist_day = date("Y-m-d (H:i)");

    $sql = "insert into members( id, pass, name, email, regist_day, level, point) ";
    $sql .= "values('$id','$pass','$name','$email','$regist_day',9 ,0)";

    $insert_result = mysqli_query($con, $sql);
    mysqli_close($con);

    if($insert_result === false){
        alert_back("회원가입 실패");
    }else{
        echo "
              <script>
                    alert('회원가입 완료');
                   location.href = 'http://{$_SERVER['HTTP_HOST']}/project_highschool/index.php';
              </script>
          ";
    }

?>