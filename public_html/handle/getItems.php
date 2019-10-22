<?php
include '../config.php';

$sql = "SELECT * FROM `inventory`";
// echo $sql;
$result = mysqli_query($conn, $sql);

$rows =array();

while ($r = mysqli_fetch_assoc($result)) {
    $rows[] = $r;
}
print json_encode($rows, JSON_UNESCAPED_UNICODE );

?>