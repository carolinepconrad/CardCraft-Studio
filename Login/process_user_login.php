<?php 

    
// Get the username and password from the form
$inputUsername = $_POST['username'];
$inputPassword = $_POST['password'];
//setcookie('logged_in', $inputUsername, time() + 86400, "/");

require 'db_login_connect.php';



if (!isset($_POST['login_try'])) { 
// Kill the site and display an error message 
die("Error: Required POST variables are not set."); 
}



// Hash the input password using SHA-256
$hashedPassword = hash("sha256", $inputPassword);

// Query to check the user's credentials
$sql = "SELECT * FROM users WHERE username = '$inputUsername' AND password_hash = '$hashedPassword'";
$result = mysqli_query($conn, $sql);

// Check if a matching user was found
if (mysqli_num_rows($result) > 0) {
    setcookie('logged_in', $username, time() + 86400, "/");
    header('Location: ../index.php');

} else {
    echo "Invalid username or password.";
// Button to go home

echo '<form action="../Login/login_page.php">';
echo '<input class="button" type="submit" value="Home">';
echo '</form>';

}

// Close the database connection
mysqli_close($conn);
?>
