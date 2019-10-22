<?php
include '../config.php';


$id = $_POST['id'];
// echo $id;

$sql = "UPDATE orders, order_items
        SET Orders.status = 1,
            order_items.received = 1
        WHERE
            orders.id = " . $id . 
            " AND order_items.order_id = ". $id;

            // echo $sql;

if ($conn->query($sql) === TRUE) {
    echo "Record was updated successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
