<?php
if (isset($_COOKIE['admin_logged_in'])) {
  header('Location: ..Employee/Admin_Login/admin_dashboard.php');

}else {
  header('Location: ../Admin_Login/admin_login.php');
}
  exit;
?>
    