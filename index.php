<?php include_once $_SERVER['DOCUMENT_ROOT']."./project_highschool/common/db/db_conn.php";?>
<?php include_once $_SERVER['DOCUMENT_ROOT']."./project_highschool/common/db/db_create_table.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once $_SERVER['DOCUMENT_ROOT']."/project_highschool/common/head.php";?>
    <?php
        

        create_table($con,'message');
        create_table($con,'board');
        create_table($con,'notice_home');
        create_table($con,'notice_highschool');
        create_table($con,'image_board');
        create_table($con,'image_board_ripple');
        create_table($con,'free');
        create_table($con,'free_ripple');
        create_table($con,'members');
        create_table($con,'members_delete');
        // mysqli_close($con);

    ?>
    
</head>
<body onload="slide_func()">
    <header>
        <?php include $_SERVER['DOCUMENT_ROOT']."/project_highschool/common/header.php";?>
    </header>
    <section>
        <?php include $_SERVER['DOCUMENT_ROOT']."/project_highschool/common/main.php";?>
    </section>
    <footer>
        <?php include $_SERVER['DOCUMENT_ROOT']."/project_highschool/common/footer.php";?>
    </footer>
</body>
</html>