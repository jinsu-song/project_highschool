<?php
    include_once $_SERVER['DOCUMENT_ROOT']."/project_highschool/common/db/db_conn.php";
    $id = $_POST["id"];

    $pass = $_POST["pass"];
    $name = $_POST["name"];
    $email1 = $_POST["email1"];
    $email2 = $_POST["email2"];

    $email = $email1 . "@" . $email2;

    $sql = "update members set pass='$pass', name='$name' , email='$email'";
    $sql .= " where id='$id'";
    $value = mysqli_query($con, $sql) or die('error : ' . mysqli_error($con));
    if ($value) {
        
        session_start(); // 세션값을 변경하거나 삭제했을때 session을 다시 시작하는 것
        $_SESSION["user_name"] = $name;

    } else {
        echo "<script>
                    alert('정보 수정 실패');
                    history.go(-1);
              </script>";
    }

    // connection 반환
    mysqli_close($con);


    echo "
	      <script>
	      alert('수정 완료');
	          location.href = 'http://{$_SERVER['HTTP_HOST']}/project_highschool/index.php';
	      </script>
	  ";
?>

   
