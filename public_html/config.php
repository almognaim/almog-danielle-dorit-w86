<?php

// connection's properties
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "danielle_drive2success";

// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);
mysqli_set_charset($conn,"utf8");
// Check connection
 if (!$conn) {
     echo "error connecting";
    die("Connection failed: " . mysqli_connect_error());
}


?>
