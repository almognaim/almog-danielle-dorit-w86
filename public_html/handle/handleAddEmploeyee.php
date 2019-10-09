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


// $sql = "INSERT INTO workers(fullName,phone,email,seniority,identity_card,address,startDate,speciality)
// VALUES ('$fullName','$phone','$email','$fullName','$seniority','$identity_card','$address','$startDate','$speciality')";

                    $sql = "INSERT INTO workers(userName,password,fullName,phone,email,seniority,identity_card,address,startDate,speciality,admin)
                     VALUES ('$userName','$password','$fullName','$phone','$email','$seniority','$identity_card','$address','$startDate','$speciality',$admin)";

                    
                    if ($conn->query($sql) === TRUE) {
                        echo "New record created successfully";
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
 } 

 /*    if(isset($_POST['clockLogIn'])){

        $fullName = $_POST['fullName'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $identity_card = $_POST['identity'];
        $address = $_POST['address'];
        $loginHour = $_POST['loginHour'];
        $logoutHour = $_POST['logoutHour'];
        $logInDate = $_POST['logInDate'];
        $logOutDate = $_POST['logOutDate'];
        $status = $_POST['status'];
        

$sql = "INSERT INTO clock(fullName,phone,email,identity_card,loginHour)
VALUES ('$fullName','$phone','$email','$identity_card','$address','$startDate','$loginHour','$logoutHour','$logInDate','$logOutDate','$status')";

$result = mysqli_query($conn, $sql);

                    if ($conn->query($sql) === TRUE) {
                        echo "New record created successfully";
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
    } */
                    