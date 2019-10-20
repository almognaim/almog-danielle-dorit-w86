<?php
include '../config.php';


$vendorId = $_POST['vendorId'];

$sql = "SELECT * FROM `inventory` WHERE vendor = ". $vendorId;
// echo $sql;
$result = mysqli_query($conn, $sql);

$rows =array();

while ($r = mysqli_fetch_assoc($result)) {
    $rows[] = $r;
}
print json_encode($rows, JSON_UNESCAPED_UNICODE );
// if (mysqli_num_rows($result) > 0) {
//     echo json_encode($result);
// }else {
//     echo 'no results'; 
// }


// if ($conn->query($sql) === TRUE) {
//     echo "New record created successfully";
// } else {
//     echo "Error: " . $sql . "<br>" . $conn->error;
// }
