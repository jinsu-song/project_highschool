<?php
    include_once $_SERVER["DOCUMENT_ROOT"]."/project_highschool/common/db/db_conn.php";
    $id = $_POST["id"];

    $sql = "delete from members where id='$id'";
    $value = mysqli_query($con, $sql) or die('error : ' . mysqli_error($con));
    if($value){
        echo "<script>
                    alert('회원탈퇴가 완료되었습니다.');
                    history.go(-2);
              </script>";
              include_once $_SERVER['DOCUMENT_ROOT'] . "/project_highschool/login/logout.php";
    }
?>






