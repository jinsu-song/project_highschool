<?php 
    include_once $_SERVER['DOCUMENT_ROOT']."./project_highschool/common/db/db_conn.php";

    $id = $_POST["id"];
    $pass = $_POST["pass"];

    $sql="select * from members where id = '$id' && password='$pass'";
    $result = mysqli_query($con, $sql);

    $num_row = mysqli_num_rows($result);

    if(!$num_row){
        echo("
            <script>
                alert('등록되지 않은 아이디와 비밀번호 입니다.');
                history.go(-1);
            </script>
        ");
    }else{
        $row = mysqli_fetch_array($result);

        session_start();
        $_SESSION["user_id"] = $row["id"];
        $_SESSION["user_name"] = $row["name"];
        $_SESSION["user_level"] = $row["level"];
        $_SESSION["user_point"] = $row["point"];

        mysqli_close($con);
        unset($id);
        unset($pass);
        unset($sql);
        unset($result);
        unset($num_row);

        echo("
            <script>
                alert('로그인 되었습니다.');
                location.href = 'http://{$_SERVER["HTTP_HOST"]}/project_highschool/index.php';
            </script>
        ");
    }

?>