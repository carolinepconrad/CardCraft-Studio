<?php
// Database configuration
$servername = "54.165.204.136";
$username = "group3";
$password = "qux219jmV754[";
$dbname = "group3";

// Create a connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
