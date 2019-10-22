<?php
include '../config.php';

    echo $_POST['fixAbout'];

// $sql = "INSERT INTO clients_fixes (openedBy, date, hour, car_number, status, fixAbout, fixDescription, carNumber) 
// VALUES ()";

// if ($conn->query($sql) === TRUE) {
//     $last_id = $conn->insert_id;
// } else {
//     echo "Error: " . $sql . "<br>" . $conn->error;
// }

// $itemsSql = "INSERT INTO order_items (order_id, fix_id, item_id, quantity)
// VALUES ";
   
// for ($x = 0; $x < $_POST['itemsTotal']; $x++) {

//     $itemsSql = $itemsSql . "(". $last_id. ",0," . $_POST['item'.$x] . ", -" . $_POST['quantity'.$x] . ")";
//     if ($x+1 != $_POST['itemsTotal']) {
//         $itemsSql = $itemsSql . ",";
//     }
// }
// if ($conn->query($itemsSql) === TRUE) {
//     echo "New record created successfully";
// } else {
//     echo "Error: " . $itemsSql . "<br>" . $conn->error;
// }
?>