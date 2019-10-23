<?php
session_start();
include 'config.php';
include 'inc/header/header.php';
$user_id = $_GET['identity_card'];
?>


<!-- Main Start -->

<main class="page-content">
    <div class="container-fluid">
        <div class="row" id="page-title">
            <div class="col-12">
                <h1>חשבוניות</h1>
            </div>
        </div>
        <div class="row" id="clients-wrap">
            <table class="table text-center" id="clients">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">מספר</th>
                        <th scope="col">מספר תיקון</th>
                        <th scope="col">מספר הזמנה</th>
                        <th scope="col">זהות משלם paypal</th>
                        <th scope="col">מחיר</th>
                        <th scope="col">תאריך</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "select * from receipts where identity_card = ".$user_id;
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr onclick='redirectFix(" . $row['fix_id'] . ")'><th scope='row'>" . $row['id'] . "</th><td>" . $row['fix_id'] . "</td><td>" . $row['order_id'] . "</td><td>" . $row['payer_id'] . "</td>
                                <td>" . $row['amount'] . "</td> <td>" . $row['date'] . "</td></tr>";
                        }
                    } else {
                        echo "0 results";
                    } ?>

                </tbody>
            </table>
        </div>
    </div>
    <script>
        function redirectFix (id) {
            window.location = "fix.php?id="+id;
        }
    </script>
</main>
 
<?php include 'inc/footer/footer.php'; ?>