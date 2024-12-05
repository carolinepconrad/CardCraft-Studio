<?php
if (isset($_COOKIE['admin_logged_in'])) {
  header('Location: ../Admin_Login/admin_dashboard.php');

}else {
  header('Location: ../Employee_Login/employee_login.php');
}
  exit;
?>
    