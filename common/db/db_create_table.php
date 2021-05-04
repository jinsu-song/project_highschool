<?php
    // include_once "db_connect.php";
    include_once $_SERVER['DOCUMENT_ROOT']."/project_highschool/common/db/db_conn.php";

    function create_table($con, $table_name)
    {
        $flag = false;

        // DB에 있는 테이블명들을 모두 가져옴
        $query = "show tables from highschool_db;";

        // DB커넥터와 쿼리문을 인수로 보냄
        $result = mysqli_query($con, $query) or die('error : ' . mysqli_error($con));

        while ($row = mysqli_fetch_row($result)) {
            if ($row[0] === $table_name) {
                $flag = true;
                break;
            }
        }
        
        //해당 테이블명이 없으면 해당 테이블명을 찾아서 데이블 생성 쿼리문을 작성한다.
        if ($flag === false) {
            switch ($table_name) {
                case 'message':
                    $query = "CREATE TABLE IF NOT EXISTS `message` (
                              `num` int(11) NOT NULL AUTO_INCREMENT,
                              `send_id` char(20) NOT NULL,
                              `rv_id` char(20) NOT NULL,
                              `subject` char(200) NOT NULL,
                              `content` text NOT NULL,
                              `regist_day` char(20) DEFAULT NULL,
                              PRIMARY KEY (`num`)
                            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
                    ";
                    break;
                case 'board':
                    $query = "CREATE TABLE IF NOT EXISTS `board` (
                                  `num` int NOT NULL AUTO_INCREMENT,
                                  `id` varchar(15) NOT NULL,
                                  `name` varchar(15) NOT NULL,
                                  `subject` varchar(200) NOT NULL,
                                  `content` text NOT NULL,
                                  `regist_day` date NOT NULL,
                                  PRIMARY KEY (`num`)
                                ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
                    ";
                    break;
                case 'notice_home':
                    $query = "CREATE TABLE IF NOT EXISTS `notice_home` (
                                  `num` int NOT NULL AUTO_INCREMENT,
                                `id` VARCHAR(15) NOT NULL,
                                `name` varchar(15) NOT NULL,
                                `subject` varchar(200) NOT NULL,
                                `content` text NOT NULL,
                                `regist_day` datetime NOT NULL,
                                PRIMARY KEY (`num`)
                                ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
                    ";
                    break;
                case 'notice_highschool':
                    $query = "CREATE TABLE IF NOT EXISTS `notice_highschool` (
                                    `num` int NOT NULL AUTO_INCREMENT,
                                `id` VARCHAR(15) NOT NULL,
                                `name` varchar(15) NOT NULL,
                                `subject` varchar(200) NOT NULL,
                                `content` text NOT NULL,
                                `regist_day` datetime NOT NULL,
                                PRIMARY KEY (`num`)
                                ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
                    ";
                    break;
                case 'image_board':
                    $query = "CREATE TABLE IF NOT EXISTS `image_board` (
                                  `num` int NOT NULL AUTO_INCREMENT,
                                  `id` char(15) NOT NULL,
                                  `name` char(10) NOT NULL,
                                  `subject` char(200) NOT NULL,
                                  `content` text NOT NULL,
                                  `regist_day` char(20) NOT NULL,
                                  `hit` int NOT NULL, 
                                  `file_name` char(40) NOT NULL,
                                  `file_type` char(40) NOT NULL,
                                  `file_copied` char(40) NOT NULL,
                                  PRIMARY KEY (`num`)
                                ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
                    ";
                    break;
                case 'image_board_ripple':
                    $query = "CREATE TABLE IF NOT EXISTS `image_board_ripple` (
                          `num` int(11) NOT NULL AUTO_INCREMENT,
                          `parent` int(11) NOT NULL,
                          `id` char(15) NOT NULL,
                          `name` char(10) NOT NULL,
                          `nick` char(10) NOT NULL,
                          `content` text NOT NULL,
                          `regist_day` char(20) DEFAULT NULL,
                          PRIMARY KEY (`num`)
                        ) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
                    ";
                    break;
                case 'free':
                    $query = "CREATE TABLE IF NOT EXISTS `free` (
                          `num` int(11) NOT NULL AUTO_INCREMENT,
                          `id` char(15) NOT NULL,
                          `name` char(10) NOT NULL,
                          `nick` char(10) NOT NULL,
                          `subject` varchar(100) NOT NULL,
                          `content` text NOT NULL,
                          `regist_day` char(20) DEFAULT NULL,
                          `hit` int(11) DEFAULT NULL,
                          `is_html` char(1) DEFAULT NULL,
                          `file_name_0` char(40) DEFAULT NULL,
                          `file_copied_0` char(30) DEFAULT NULL,
                          `file_type_0` char(30) DEFAULT NULL,
                          PRIMARY KEY (`num`)
                        ) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8;
                    ";
                    break;
                case 'free_ripple':
                    $query = "CREATE TABLE IF NOT EXISTS `free_ripple` (
                          `num` int(11) NOT NULL AUTO_INCREMENT,
                          `parent` int(11) NOT NULL,
                          `id` char(15) NOT NULL,
                          `name` char(10) NOT NULL,
                          `nick` char(10) NOT NULL,
                          `content` text NOT NULL,
                          `regist_day` char(20) DEFAULT NULL,
                          PRIMARY KEY (`num`)
                        ) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
                    ";
                    break;

                    case 'members':
                        $query = "CREATE TABLE IF NOT EXISTS `members` (
                            `num` int(11) NOT NULL AUTO_INCREMENT,
                            `id` char(15) NOT NULL,
                            `pass` char(15) NOT NULL,
                            `name` char(10) NOT NULL,
                            `email` char(80) DEFAULT NULL,
                            `regist_day` char(20) DEFAULT NULL,
                            `level` int(11) DEFAULT NULL,
                            `point` int(11) DEFAULT NULL,
                            PRIMARY KEY (`num`)
                          ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
                      ";
                        break;

                        case 'members_delete':
                            $query = "CREATE TABLE IF NOT EXISTS `members_delete` (
                                `num` int(11) NOT NULL AUTO_INCREMENT,
                                `id` char(15) NOT NULL,
                                `pass` char(15) NOT NULL,
                                `name` char(10) NOT NULL,
                                `email` char(80) DEFAULT NULL,
                                `regist_day` char(20) DEFAULT NULL,
                                `level` int(11) DEFAULT NULL,
                                `point` int(11) DEFAULT NULL,
                                PRIMARY KEY (`num`)
                              ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
                          ";
                            break;

                default :
                    echo "<script>alert('해당테이블명이 없습니다 . ')</script>";
                    break;

            }   // end of switch
            if (mysqli_query($con, $query)) {
                echo "<script>alert('{$table_name} 테이블이 생성되엇습니다. ')</script>";
            } else {
                echo "<script>alert('{$table_name} 테이블 생성 실패 : '." . mysqli_error($con) . ")</script>";
            }
        }

    }

?>