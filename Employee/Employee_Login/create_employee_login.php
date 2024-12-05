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
// Hash the input password using SHA-256

$sql = "SELECT * FROM employees WHERE username = '$inputUsername' ";
$result = mysqli_query($conn, $sql);

// Check if a matching user was found
if (mysqli_num_rows($result) > 0) {
    echo "Choose another username! ";
// Button to go home
echo '<form action="../Employee/Employee_Login/employee_login.php">';
echo '<input class="button" type="submit" value="Home">';
echo '</form>';
} else {
    $sql = "INSERT INTO employees (username, password_hash, first_name, last_name) VALUES ('$inputUsername',  SHA2('$inputPassword', 256), '$firstName', '$lastName');";
    $result = mysqli_query($conn, $sql);
setcookie('employee_logged_in', $inputUsername, time() + 86400, "/");
header('Location: ../employee_dashboard.php');

}



// Close the database connection
mysqli_close($conn);
?>
