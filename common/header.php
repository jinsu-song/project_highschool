<?php
    // 세션값은 로그인에서 딱 한번 주고, 로그아웃에서 해제시키다.
    // header에서 모든 페이지에 session을 start해주고 있다.
    session_start();
    if (isset($_SESSION["user_id"])) $userid = $_SESSION["user_id"];
    else $userid = "";
    if (isset($_SESSION["user_name"])) $username = $_SESSION["user_name"];
    else $username = "";
    if (isset($_SESSION["user_level"])) $userlevel = $_SESSION["user_level"];
    else $userlevel = "";
    if (isset($_SESSION["user_point"])) $userpoint = $_SESSION["user_point"];
    else $userpoint = "";
?>
<div class="header_group">
    
        <div class="header_sign_in_up">
            
            <?php
                if(!$userid) {
                    ?>
                    <ul>
                        <li><a href="http://<?=$_SERVER['HTTP_HOST'];?>/project_highschool/register/register_form.php">회원 가입</a> </li>
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

    <div class="header_logo_menu_group">
        
        <div class="header_logo">
            
            <div>
                <i class="fas fa-quidditch"></i>
                <span><a href="http://<?=$_SERVER['HTTP_HOST']?>/project_highschool/index.php">진수고등학교</a></span>
            </div>
        
        </div>
        
        <div class="header_menu">

            <div class="aa">
                    <a href="#" class="set_menu_pos">학교소개</a>
                    <div class="dropdown-content">
                        <a href="#">인사말씀</a>
                        <a href="#">학교상징</a>
                        <a href="#">학교연혁</a>
                    </div>
            </div>
                <div class="bb">
                    <a href="#">교육계획</a>
                    <div class="dropdown-content">
                        <a href="#">연간학사일정</a>
                        <a href="#">월간학사일정</a>
                        <a href="#">교육과정편제표</a>
                    </div>
                </div>
                <div class="cc">
                    <a href="#">학교혁신</a>
                    <div class="dropdown-content">
                        <a href="#">학교평가</a>
                        <a href="#">혁신학교</a>
                    </div>
                </div>
                <div class="dd">
                    <a href="#">교육과정</a>
                    <div class="dropdown-content">
                        <a href="#">교육과정편제표</a>
                        <a href="#">고교학점제 안내</a>
                    </div>
                </div>
                <div class="ee">
                    <a href="#">학생활동</a>
                    <div class="dropdown-content">
                        <a href="#">학생생활인권규정</a>
                        <a href="#">학교폭력신고함</a>
                        <a href="#">학생회</a>
                    </div>
                </div>
                <div class="ff">
                    <a href="#">진로진학</a>
                    <div class="dropdown-content">
                        <a href="#">진로소식지</a>
                        <a href="#">대학입시정보</a>
                    </div>
                </div>
                <div class="gg">
                    <a href="#">학부모마당</a>
                    <div class="dropdown-content">
                        <a href="#">학부모회</a>
                        <a href="#">학교운영위원회</a>
                    </div>
                </div>
                <div class="gg">
                    <a href="http://<?=$_SERVER['HTTP_HOST'];?>/project_highschool/free/list.php">자유계시판</a>
                    
                </div>
        </div>
    </div>
    
</div>