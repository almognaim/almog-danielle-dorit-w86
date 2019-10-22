<?php
include '../config.php';


// handle for add emploeyee

 if(isset($_POST['addNewClient'])){ 
$fullName = $_POST['fullName'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$seniority = $_POST['seniority'];
$identity_card = $_POST['identity'];
$address = $_POST['address'];
$startDate = $_POST['startDate'];
$userName = $_POST['userName'];
$password = $_POST['password'];
//echo $startDate;
$speciality = $_POST['speciality'];
$admin = $_POST['admin'];

    $sql = "INSERT INTO workers(userName,password,fullName,phone,email,seniority,identity_card,address,startDate,speciality,admin)
        VALUES ('$userName','$password','$fullName','$phone','$email','$seniority','$identity_card','$address','$startDate','$speciality',$admin)";

    
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
 } 
?>
 