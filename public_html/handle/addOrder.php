<?php
include '../config.php';

// echo $_POST['itemsTotal'];

// for ($x = 0; $x < $_POST['itemsTotal']; $x++) {
//     $_POST['name']
// }

$sql = "INSERT INTO orders (vendor_id, description) 
VALUES (".$_POST['vendor'].", ' ')";

if ($conn->query($sql) === TRUE) {
    $last_id = $conn->insert_id;
    echo "New record created successfully. Last inserted ID is: " . $last_id;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$itemsSql = "INSERT INTO order_items (order_id, item_id, quantity)
VALUES ";
   
for ($x = 0; $x < $_POST['itemsTotal']; $x++) {

    $itemsSql = $itemsSql . "(". $last_id. "," . $_POST['item'.$x] . "," . $_POST['quantity'.$x] . ")";
    if ($x+1 != $_POST['itemsTotal']) {
        $itemsSql = $itemsSql . ",";
    }
}
if ($conn->query($itemsSql) === TRUE) {
    
    echo "New record created successfully";
} else {
    echo "Error: " . $itemsSql . "<br>" . $conn->error;
}


// echo ($itemsSql);
// $name = $_POST['name'];
// $quantity = $_POST['quantity'];
// $price = $_POST['price'];
// $minquantity = $_POST['minquantity'];
// $vendor = $_POST['vendor'];





// $sql = "INSERT INTO `inventory`( `name`, `quantity`, `price`, `min_quantity`, `vendor`) 
//                      VALUES ('$name',$quantity,$price,$minquantity,'$vendor')";


// if ($conn->query($sql) === TRUE) {
//     echo "New record created successfully";
// } else {
//     echo "Error: " . $sql . "<br>" . $conn->error;
// }
