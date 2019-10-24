<?php
    include '../config.php';


    // handle for add new worker

    $username = $_POST['username'];
    $password = $_POST['password'];
    $fullname = $_POST['fullname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $identity_card = $_POST['identity_card'];
    $address = $_POST['address'];
    $startDate = date("Y-m-d"); //$_POST['startDate'];
    $speciality = $_POST['speciality'];
    $admin = $_POST['admin'];

    $sql = "INSERT INTO workers(username, password, fullname, phone, email, identity_card, address, startDate, speciality, admin) VALUES ('$username', '$password', '$fullname', '$phone', '$email', '$identity_card', '$address', '$startDate', '$speciality', '$admin')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
?>
