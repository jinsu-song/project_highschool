<?php include_once $_SERVER['DOCUMENT_ROOT']."/project_highschool/common/main_img_bar.php";?>

<div class="main_content">

	<div class="notice">
        <div class="notice_name">
            <span style="font-size:20px;font-weight:600;">교내 공지사항</span>

            
            <button onclick="location.href='http://<?=$_SERVER['HTTP_HOST']?>/project_highschool/notice/notice_list.php?notice_Btn=<?='1'?>'">
                more
            </button>
            
        </div>
        <hr>
		<ul>
            <li class="notice_title">
                <p>제목&nbsp;</p>
                <p>작성자&nbsp;&nbsp;&nbsp;&nbsp;</p>
                <p>등록일</p>
            </li>
			<!-- 최근 게시 글 DB에서 불러오기 -->
            <?php

                $sql = "select * from notice_highschool order by num desc limit 5;";
                $result = mysqli_query($con, $sql);
                
                if (!$result){

                    echo "<li><span>아직 게시글이 없습니다!</span></li>";
                }
                else {
                    // result set 에서 첫번째 포인트 레코드를 $row라는 연관배열로 가져와라
                    while ($row = mysqli_fetch_array($result)) {
                        $num = $row["num"];
                        $regist_day = substr($row["regist_day"], 0, 10);
                        ?>
						<li>

                                <p><?= $row["subject"] ?>&nbsp;</p>
                                <p><?= $row["name"] ?>&nbsp;&nbsp;&nbsp;&nbsp;</p>
                                <p><?= $regist_day ?></p>
						</li>
                        <?php
                    }
                }
            ?>
            
		</ul>
	</div>

	<div class="notice">
        <div class="notice_name">
            <span style="font-size:20px;font-weight:600;">가정통신문</span>

            
            <button onclick="location.href='http://<?=$_SERVER['HTTP_HOST']?>/project_highschool/notice/notice_list.php?notice_Btn=<?='2'?>'">
                more
            </button>

        </div>
        <hr>
		<ul>
            <li class="notice_title">
                <p>제목&nbsp;</p>
                <p>작성자&nbsp;&nbsp;&nbsp;&nbsp;</p>
                <p>등록일</p>
            </li>
            <?php
            

                $sql = "select * from notice_home order by num desc limit 5;";
                $result = mysqli_query($con, $sql);

                if (!$result)
                    echo "<li><span>아직 게시글이 없습니다!</span></li>";
                else {
                    while ($row = mysqli_fetch_array($result)) {
                        $regist_day = substr($row["regist_day"], 0, 10);
                        ?>
						<li>
							<p><?= $row["subject"] ?></p>
							<p><?= $row["name"] ?></p>
							<p><?= $regist_day ?></p>
						</li>
                        <?php
                    }

                    // 다 썼으면 connection 닫기
                  
                }
                mysqli_close($con);
            ?>
            
		</ul>
	</div>
    
</div>