<?php
include '../config.php';


$id = $_POST['id'];
// echo $id;

    $sql = "UPDATE clients_fixes
        SET status = 1
        WHERE id = ". $id;

if ($conn->query($sql) === TRUE) {
    echo "Record was updated successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
