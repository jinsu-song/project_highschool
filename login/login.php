<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once $_SERVER['DOCUMENT_ROOT']."/project_highschool/common/head.php";?>
    <script src="http://<?=$_SERVER['HTTP_HOST']?>/project_highschool/login/js/login.js"></script>
</head>
<body>
    <header>
        <?php include $_SERVER['DOCUMENT_ROOT']."./project_highschool/common/header.php";?>
    </header>
    <section>
        <div class="main_content">
            <div class="login_title">

            </div>
            <form class="login_form" name="login_form" action="login_request.php" method="post">
                <ul>
                    <li><input type="text" class="login_id" name="id" placeholder="아이디"></li>
                    <li><input type="password" class="login_password" name="pass" placeholder="비밀번호"></li>
                </ul>   
                <div class="login_btn">
                    <a href="#"><img src="http://<?=$_SERVER['HTTP_HOST']?>/project_highschool/common/img/login.png" onclick="check_input()"></a>
                </div>
            </form>
            </div>
    </section>
    <footer>
        <?php include $_SERVER['DOCUMENT_ROOT']."./project_highschool/common/footer.php";?>
    </footer>
</body>
</html>