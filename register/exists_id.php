<?php
    include_once $_SERVER['DOCUMENT_ROOT']."/project_highschool/common/db/db_conn.php";

    $id = $_GET["id"];
    if(!$id){
        echo ("<script>
            alert('아이디를 먼저 입력해 주세요');
        </script>");
    }else{

        
        $sql = "select '$id' from members where id = '$id'";
        
        $insert_result = mysqli_query($con,$sql);
        $get_record=mysqli_num_rows($insert_result);
        
        if($get_record){
            echo "<li>'이미 존재하는 아이디 입니다.'</li>";
        }else{
            echo "<li>'사용 가능한 아이디 입니다.'</li>";
            
            unset($id);
        }
        mysqli_close($con);
        
    }
        



?>