<?php
session_start();
if (!$_SESSION['user_id']) {
    header('location: login.php');
}
include '../config.php';
include '../inc/header/header.php'; ?>
<!-- Main Start -->

<main class="page-content">
    <div class="container-fluid">
        <div class="row" id="page-title">
            <div class="col-12">
                <h1>ספקים</h1>
            </div>
        </div>
        <div class="row" >
            <div class="col-12">
                <a class="btn btn-danger" href="/newSupplier.php">הוספת ספק</a>
            </div>
        </div>
        <div class="row w100" id="suppliers-wrap">

            <table class="table text-center" id="suppliers">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">שם</th>
                        <th scope="col">כתובת</th>
                        <th scope="col">טלפון</th>
                        <th scope="col">אימייל</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT name, address, phone,mail FROM `vendors`";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        // output data of each row
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr><th scope='row'>" . $row['name'] . "</th><td>" . $row['address'] . "</td><td id='phone'>" . $row['phone'] . "</td><td>" . $row['mail'] . "</td></tr>";
                        }
                    } else {
                        echo "0 results";
                    } ?>

                </tbody>
            </table>


            <!-- id	name	address	phone	mai -->
        </div>
    </div>

</main>
<!-- 


<main class="page-content">
    <div class="container-fluid">
        <div class="row" id="page-title">
            <div class="col-12">
                <h1>לקוחות</h1>
            </div>
        </div>
        <div class="row" id="newclientBtn">
            <div class="col-12">
                <a class="btn btn-danger" href="/newSupplier.php">הוספת ספק</a>
            </div>
        </div>
        <div class="row" id="clients-wrap">

            <table class="table text-center" id="clients">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">שם</th>
                        <th scope="col">כתובת</th>
                        <th scope="col">טלפון</th>
                        <th scope="col">אימייל</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $sql = "SELECT name, address, phone,mail FROM `vendors`";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        // output data of each row
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr><th scope='row'>" . $row['name'] . "</th><td>" . $row['address'] . "</td><td id='phone'>" . $row['phone'] . "</td><td>" . $row['mail'] . "</td></tr>";
                        }
                    } else {
                        echo "0 results";
                    } ?>
                </tbody>
            </table>


        </div>
    </div>

</main>

 -->

<!-- Main End -->

<?php include '../inc/footer/footer.php'; ?>


<script>
$(document).ready( function () {
    $('#suppliers').DataTable(
        {
            "language": {
                "lengthMenu": "הצג _MENU_",
                "zeroRecords": "Nothing found - sorry",
                "info": "",
                "infoEmpty": "No records available",
                "search": "חיפוש:",
                "infoFiltered": "(filtered from _MAX_ total records)",
                "paginate": {
                    "previous": "הקודם",
                    "next": "הבא"
                  }
            }
        } 
    );
} );

</script>