<?php 
require 'db_login_connect.php';
if (!isset($_POST['login_try'])) { 
// Kill the site and display an error message 
die("Error: Required POST variables are not set."); 
}

// Get the username and password from the form
$inputUsername = $_POST['username'];
$inputPassword = $_POST['password'];

// Hash the input password using SHA-256
$hashedPassword = hash("sha256", $inputPassword);

// Query to check the user's credentials
$sql = "SELECT * FROM users WHERE username = '$inputUsername' AND password_hash = '$hashedPassword'";
$result = mysqli_query($conn, $sql);

// Check if a matching user was found
if (mysqli_num_rows($result) > 0) {
    setcookie('username', $username, time() + 86400, "/");

} else {
    echo "Invalid username or password.";
}
// Buttn to go home
echo '<form action="http://localhost:3000/index.html">';
echo'<input class="button" type="submit" value="Home" name="login_try">';
echo '</form>';
// Close the database connection
mysqli_close($conn);
?>
