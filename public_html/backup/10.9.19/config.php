<?php
$servername = "localhost";
$username = "admin";
$password = "12345";
$dbname = 'yossigarage';

// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
?>