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
$hashedPassword = hash("sha256", $inputPassword);

// Query to check the user's credentials
$sql = "INSERT INTO users (username, password_hash, first_name, last_name, address) VALUES ($inputUsername, $hashedPassword, $firstName, $lastName, $address);";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    setcookie('logged_in', $username, time() + 86400, "/");
    header('Location: ../index.php');
} else {
    echo "Username or password already taken!";
    // Button to go home
echo '<form action="../Login/login_page.php">';
echo '<input class="button" type="submit" value="Home">';
echo '</form>';


}


// Close the database connection
mysqli_close($conn);
?>
