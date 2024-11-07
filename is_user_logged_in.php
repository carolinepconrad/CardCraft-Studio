<?php
if (isset($_COOKIE['logged_in'])) {
  header('Location: ../User_Preferences/User_Preferences.php');

}else {
  header('Location: ../Login/login_page.php');
}
  exit;
?>
    