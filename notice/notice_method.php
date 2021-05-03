<?
function methodTest($notice_Btn){
                            
    if($notice_Btn == 1){
        
        $sql = "select * from notice_highschool order by num desc";
        return $sql;
    }
    else {
        
        $sql = "select * from notice_home order by num desc";
        return $sql;
    }
    
}

function insertQueryHandler($notice_Btn, $subject, $content,$regist_day){
    $userid = $_SESSION["user_id"];
    $username = $_SESSION["user_name"];
    if($notice_Btn == 1){
        
        $sql = "insert into notice_highschool (id, name, subject, content, regist_day) ";
        $sql .= "values('$userid', '$username', '$subject', '$content', '$regist_day');";
        // $sql = "insert into notice_home (id, name, subject, content, regist_day) ";
    // $sql .= "values('$userid', '$username', '$subject', '$content', '$regist_day');";
        return $sql;
    }
    else {
        
        $sql = "insert into notice_home (id, name, subject, content, regist_day) ";
        $sql .= "values('$userid', '$username', '$subject', '$content', '$regist_day');";
        return $sql;
    }
}
?>