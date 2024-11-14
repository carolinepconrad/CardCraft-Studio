<?php 
//setcookie('logged_in', $inputUsername, time() + 86400, "/");

require 'db_login_connect.php';



if (!isset($_POST['create_login'])) { 
// Kill the site and display an error message 
die("Error: Required POST variables are not set."); 
}




// Get the username and password from the form
$firstName = $_POST['first_name'];
$lastName = $_POST['last_name'];
$inputUsername = $_POST['username'];
$inputPassword = $_POST['password'];
$address = $_POST['address'];
// Hash the input password using SHA-256

$sql = "SELECT * FROM users WHERE username = '$inputUsername' ";
$result = mysqli_query($conn, $sql);

// Check if a matching user was found
if (mysqli_num_rows($result) > 0) {
    echo "Choose another username! ";
// Button to go home
echo '<form action="../Login/login_page.php">';
echo '<input class="button" type="submit" value="Home">';
echo '</form>';
} else {
    $sql = "INSERT INTO users (username, password_hash, first_name, last_name, address) VALUES ('$inputUsername',  SHA2('$inputPassword', 256), '$firstName', '$lastName', '$address');";
    $result = mysqli_query($conn, $sql);
setcookie('logged_in', $username, time() + 86400, "/");
header('Location: ../index.php');

}



// Close the database connection
mysqli_close($conn);
?>
