<?php
include '../config.php';


$quantity = $_POST['quantity'];
$id = $_POST['id'];
$originalQuantity = $_POST['originalQuantity'];

$diff = $quantity - $originalQuantity;
// echo $diff;


// echo $id;

$sql = "UPDATE inventory
        SET quantity = quantity +".$diff." 
        WHERE inventory.id = ". $id;

            // echo $sql;

if ($conn->query($sql) === TRUE) {
    echo "Record was updated successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
// ?>