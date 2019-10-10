<?php
    include '../config.php';

    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $mail = $_POST['mail'];

    $sql = "INSERT INTO vendors(name, address, phone, mail) VALUES ('$name' ,'$address' , '$phone', '$mail')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

?>
