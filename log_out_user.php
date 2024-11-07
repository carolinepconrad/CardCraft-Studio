<?php
  setcookie('logged_in', "0", time() - 86400, "/");
  header('Location: Login/login_page.html');
  exit;
?>
    