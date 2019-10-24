<?php
session_start();
include 'config.php';
include 'inc/header/header.php';
$order_id = $_GET['id'];
?>


<!-- Main Start -->

<main class="page-content">
    <div class="container-fluid">
        <div class="row" id="page-title">
            <div class="col-12">
                <h1>הזמנה <?php echo $order_id ;?></h1>
            </div>
        </div>
        <div class="row" >
            <table class="table text-center" >
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">מק"ט</th>
                        <th scope="col">מוצר</th>
                        <th scope="col">כמות</th>
                        <th scope="col">מחיר</th>
                        <th scope="col">מחיר סה"כ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "select order_items.*, inventory.name, inventory.price from order_items 
                    left join inventory on order_items.item_id = inventory.id where order_id = ".$order_id;
                    $result = mysqli_query($conn, $sql);
                    $sumAll = 0;
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr><th scope='row'>" . $row['item_id'] . "</th><td>" . $row['name'] . "</td><td>" . $row['quantity'] . "</td><td>" . $row['price'] . "</td>
                                <td>" . ($row['price']*$row['quantity']) . "</td></tr>";
                                $sumAll = $sumAll + ($row['price'] * $row['quantity']);
                        }
                    } else {
                        echo "0 results";
                    } 
                    echo "</tbody><tfoot><tr><th scope='row'></th><td></td><td></td><td></td><td>" . $sumAll . "</td></tr></tfoot>";
                    ?>
            </table>
        </div>
    </div>
</main>
 
<?php include 'inc/footer/footer.php'; ?>