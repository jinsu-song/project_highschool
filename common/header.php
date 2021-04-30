<?php
    // 세션값은 로그인에서 딱 한번 주고, 로그아웃에서 해제시키다.
    // header에서 모든 페이지에 session을 start해주고 있다.
    session_start();
    if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
    else $userid = "";
    if (isset($_SESSION["username"])) $username = $_SESSION["username"];
    else $username = "";
    if (isset($_SESSION["userlevel"])) $userlevel = $_SESSION["userlevel"];
    else $userlevel = "";
    if (isset($_SESSION["userpoint"])) $userpoint = $_SESSION["userpoint"];
    else $userpoint = "";
?>
<div class="header_group">
    
        <div class="header_sign_in_up">
            
            <?php
                if(!$userid) {
                    ?>
                    <ul>
                        <li><a href="http://<?=$_SERVER['HTTP_HOST'];?>/project_highschool/register/member_form.php">회원 가입</a> </li>
                        <li> | </li>
                        <li><a href="http://<?=$_SERVER['HTTP_HOST'];?>/project_highschool/login/login.php">로그인</a></li>
                    </ul>
                    <?php
                } else {
                    $logged = $username."(".$userid.")님[Level:".$userlevel.", Point:".$userpoint."]";
                    ?>
                    <ul>
                        <li><?=$logged?> </li>
                        <li> | </li>
                        <li><a href="http://<?=$_SERVER['HTTP_HOST'];?>/project_highschool/login/logout.php">로그아웃</a> </li>
                        <li> | </li>
                        <li><a href="http://<?=$_SERVER['HTTP_HOST'];?>/project_highschool/register/register_modify_form.php">정보 수정</a></li>
                        <li> | </li>
                        <li><a href="http://<?=$_SERVER['HTTP_HOST'];?>/project_highschool/register/register_delete_form.php">회원 탈퇴</a></li>
                        
                        <?php 
                        if($userlevel == 1){
                            ?>
                            <li> | </li>
                            <li><a href="http://<?=$_SERVER['HTTP_HOST'];?>/project_highschool/admin/admin.php">관리자모드</a></li>
                            <?php 
                        }
                        ?>
                    </ul>
                    <?php
                }
                ?>
    </div>