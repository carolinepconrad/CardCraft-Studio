<?php
// Database configuration
$servername = "54.165.204.136";
$serverusername = "group3";
$serverpassword = "qux219jmV754[";
$dbname = "group3";

// Create a connection
$conn = mysqli_connect($servername, $serverusername, $serverpassword, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
