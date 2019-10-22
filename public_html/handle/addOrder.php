<?php
include '../config.php';

$sql = "INSERT INTO orders (vendor_id, description) 
VALUES (".$_POST['vendor'].", ' ')";

if ($conn->query($sql) === TRUE) {
    $last_id = $conn->insert_id;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$itemsSql = "INSERT INTO order_items (order_id, fix_id, item_id, quantity)
VALUES ";
   
for ($x = 0; $x < $_POST['itemsTotal']; $x++) {

    $itemsSql = $itemsSql . "(". $last_id. ",0," . $_POST['item'.$x] . "," . $_POST['quantity'.$x] . ")";
    if ($x+1 != $_POST['itemsTotal']) {
        $itemsSql = $itemsSql . ",";
    }
}
if ($conn->query($itemsSql) === TRUE) {
    $emailSql = "select order_items.*, inventory.name, vendors.mail from order_items
    inner join inventory on inventory.id = order_items.item_id
    inner join orders on orders.id = order_items.order_id
    inner join vendors on orders.vendor_id = vendors.id
    where order_id = ". $last_id;

    $result = mysqli_query($conn, $emailSql);
    if (mysqli_num_rows($result) > 0) {
        $msg = "אנא ספק לנו את המוצרים הבאים\n";
        $email = "";
        $subject = "הזמנה חדשה מס ". $last_id;
        while ($row = mysqli_fetch_assoc($result)) {
            if ($email == "") $email = $row['mail'];
            $msg = $msg . $row['name']. "כמות: ". $row['quantity'] . "\n";
        }
        mail($email,$subject,$msg);
        echo "New record created successfully, email sent";
    }else {
        echo "New record created successfully, no email sent";    
    }
} else {
    echo "Error: " . $itemsSql . "<br>" . $conn->error;
}