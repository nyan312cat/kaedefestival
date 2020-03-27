<?php
//post元が違うときにlogin.phpへ
//if($_SERVER['HTTP_REFERER']!="")header("Location: ./login.php?false");

if($_POST["user"]=="KaedeFestivalStaff"&&$_POST["pass"]=="StaffPass")
  echo <<<EOM
  <form action="./upload.php" method="post" name="form">
    <input type="hidden" name="logined" value="true">
  </form>
  <script>
    document.form.submit();
  </script>
  EOM;
else
  header("Location: ./login.php?false");

exit;
?>
