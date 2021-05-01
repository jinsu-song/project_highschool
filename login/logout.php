<?php
  session_start();
  unset($_SESSION["user_id"]);
  unset($_SESSION["user_name"]);
  unset($_SESSION["user_level"]);
  unset($_SESSION["user_point"]);
  
  echo("
       <script>
          location.href = 'http://{$_SERVER['HTTP_HOST']}/project_highschool/index.php';
         </script>
       ");
?>
