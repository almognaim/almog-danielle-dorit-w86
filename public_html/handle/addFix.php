<?php
include '../config.php';
session_start();

    // echo $_POST['fixAbout'];
    $fullname = $_SESSION['fullName'];
    $date = date('Y-m-d');
    $time = date('H:i');
    $car = $_POST['car_number'];
    $status = $_POST['status'];
    $about = $_POST['fixAbout'];
    $desc = $_POST['fixDescription'];
    $identity_card = $_POST['identity_card'];
    $sql = "INSERT INTO clients_fixes (identity_card ,openedBy, date, hour, car_number, status, fixAbout, fixDescription, carNumber) 
        VALUES ('$identity_card','$fullname','$date','$time','$car','$status', '$about','$desc','$car')";
    // echo $sql;
    if ($conn->query($sql) === TRUE) {
        $last_id = $conn->insert_id;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    if ($_POST['itemsTotal'] > 0) {

        $itemsSql = "INSERT INTO order_items (order_id, fix_id, item_id, quantity, received)
        VALUES ";
        
        for ($x = 0; $x < $_POST['itemsTotal']; $x++) {
    
            $itemsSql = $itemsSql . "(0 ,". $last_id . "," . $_POST['item'.$x] . ", -" . $_POST['quantity'.$x] . ",1)";
            if ($x+1 != $_POST['itemsTotal']) {
                $itemsSql = $itemsSql . ",";
            }
        }
        echo $itemsSql;
        if ($conn->query($itemsSql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $itemsSql . "<br>" . $conn->error;
        }
    }else {
        echo "New record created successfully";
    }

?>