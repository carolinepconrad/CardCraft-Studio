<?php
if (isset($_COOKIE['employee_logged_in'])) {
  header('Location: ../employee_dashboard.php');

}else {
  header('Location: ../Employee_Login/employee_login.php');
}
  exit;
?>
    