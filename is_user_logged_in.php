<?php
if (isset($_COOKIE['logged_in'])) {
  header('Location: User_Preferences/User_Preferences.html');

}else {
  header('Location: Login/login_page.html');
}
  exit;
?>
    