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

?>