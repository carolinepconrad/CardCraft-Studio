<?php
// db_connection.php
$servername = "localhost";
$username = "group3";
$password = "qux219jmV754[";
$dbname = "group3";

$db = new mysqli($servername, $username, $password, $dbname);

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
?>
