<?php


$servername = "localhost";
$username = "web192";
$password = "gGM7NHPd2%";
$dbname = "usr_web192_1";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


?>
