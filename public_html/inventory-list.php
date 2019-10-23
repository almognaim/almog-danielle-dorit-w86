<?php
session_start();
include 'config.php';
include 'inc/header/header.php'; 
?>


<!-- Main Start -->

<main class="page-content">
    <div class="container-fluid">
        <div class="row" id="page-title">
            <div class="col-12">
                <h1>רשימת מלאי</h1>
            </div>
        </div>
        <div class="row" id="newclientBtn">
            <div class="col-12">
                <a class="btn btn-danger" href="newItem.php">הוספת פריט חדש</a>
            </div>
        </div>
        <div class="row" id="clients-wrap">

            <table class="table text-center" id="clients">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">שם פריט</th>
                        <th scope="col">כמות במלאי</th>
                        <th scope="col">מחיר ליחידה כולל מע"מ</th>
                        <th scope="col">כמות מינימאלית במלאי</th>
                        <th scope="col">ספק</th>
                        <th scope="col"></th>

                       
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM `inventory`";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
          
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr><th scope='row'>" . $row['name'] . "</th><td>" . $row['quantity'] . "</td><td id='identity_card'>" . $row['price'] . "</td><td>" . $row['min_quantity'] . "</td>
        <td>" . $row['vendor'] . "</td><td><div ><a href='/item.php?id=".$row['id']."'>עריכה</a></div></td></tr>";
                            
                        }
                    } else {
                        echo "0 results";
                    } ?>
              
                </tbody>
            </table>


        </div>
    </div>

</main>

<!-- Main End -->

<?php include 'inc/footer/footer.php'; ?>
