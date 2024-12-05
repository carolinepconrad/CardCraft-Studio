<?php
  setcookie('employee_logged_in', "0", time() - 86400, "/");
  header('Location: ../../index');
  exit;
?>
    