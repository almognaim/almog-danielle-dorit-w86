<?php
include '../config.php';

// fix_id=11&identity_card=30824102&amount=12&order_id=6F3586112T3823445&payer_id=DSYEUHU62G8CQ
$fix_id = $_POST['fix_id'];
$identity_card = $_POST['identity_card'];
$amount = $_POST['amount'];
$order_id = $_POST['order_id'];
$payer_id = $_POST['payer_id'];

$sql = "INSERT INTO `receipts`( `identity_card`, `fix_id`, `order_id`, `payer_id`, `amount`) 
                     VALUES ('$identity_card','$fix_id','$order_id','$payer_id','$amount')";

if ($conn->query($sql) === TRUE) {
    $updatesql = "update clients_fixes set status = 'paid' where id = ".$fix_id;
    
    if ($conn->query($updatesql) === TRUE) {
        echo "Record was updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>