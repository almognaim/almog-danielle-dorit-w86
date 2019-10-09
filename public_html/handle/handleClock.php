
<?php
include '../config.php';
session_start();

// handle for add emploeyee
if ( isset($_POST['clockEnterIn']) ) {
    // $address = $_POST['address'];
    // $startDate = $_POST['startDate'];

    $user_id = $_SESSION['user_id'];
    $fullName = $_SESSION['fullName'];
    $date = $_POST['date'];
    $test = $_POST['test'];
    echo $test;
    echo $date;
    // $timestamp = $_POST['timestamp'];
 
 
    $sql = "INSERT INTO clock(fullName, identity_card,loginHour) 
                    VALUES ('$fullName','$user_id','$timestamp')";

    $result = mysqli_query($conn, $sql);

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        echo $date;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
