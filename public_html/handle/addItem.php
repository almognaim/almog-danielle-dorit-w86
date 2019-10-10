<?php
include '../config.php';


$name = $_POST['name'];
$quantity = $_POST['quantity'];
$price = $_POST['price'];
$minquantity = $_POST['minquantity'];
$vendor = $_POST['vendor'];





$sql = "INSERT INTO `inventory`( `name`, `quantity`, `price`, `min_quantity`, `vendor`) 
                     VALUES ('$name',$quantity,$price,$minquantity,'$vendor')";


if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
