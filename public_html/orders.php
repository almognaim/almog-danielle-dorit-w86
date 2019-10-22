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
                <h1>רשימת הזמנות</h1>
            </div>
        </div>
        <div class="row" id="newclientBtn">
            <div class="col-12">
                <a class="btn btn-danger" href="newOrder.php">הזמנה חדשה</a>
            </div>
        </div>
        <div class="row" id="clients-wrap">

            <table class="table text-center" id="clients">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">מספר הזמנה</th>
                        <th scope="col">ספק</th>
                        <th scope="col">פריטים</th>
                        <th scope="col">סטטוס</th>
                        <th scope="col">אשר קבלת סחורה</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT orders.id, c.vendor, b.total, orders.status FROM `orders` inner join 
                    (SELECT order_id, count(order_id) as total FROM order_items group by order_id) b on orders.id = b.order_id
                    inner join (select vendors.id, vendors.name as vendor from vendors) c on orders.vendor_id = c.id
                    ";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
          
                        while ($row = mysqli_fetch_assoc($result)) {
                            $html = "<tr><th scope='row' onclick='redirectToOrder(".$row['id'].")'>" . $row['id'] . "</th><td>" . $row['vendor'] . "</td><td>" . $row['total'] . "</td><td class='status".$row['id']."'>";
                            if ($row['status'] == 0) {
                                $html = $html."פתוח</td><td class='click".$row['id']."'><a class='bg-dark p-2 text-white rounded' onclick='acceptOrder(". $row['id'] .")'>אשר</a></td></tr>";
                            }else {
                                $html = $html."נתקבל</td><td></td></tr>";
                            }
                            echo $html;
                        }
                    } else {
                        echo "0 results";
                    } ?>
              
                </tbody>
            </table>
            <!-- onclick='acceptOrder(". $row['id'] .")' -->

        </div>
    </div>

</main>

<!-- Main End -->

<?php include 'inc/footer/footer.php'; ?>
<script>
    function redirectToOrder(id) {
        location.href = 'order.php?id='+id;
    }
    function acceptOrder(id) {
        $.ajax({
                type: "post",
                url: "handle/acceptOrder.php",
                data: "id="+id,
                success: function(response) {
                    console.log(response);
                    
                    Swal.fire(
                        'סחורה התקבלה!',
                        'מעדכן מלאי',
                        'success'
                    ).then(function() {
                        $(".click"+id).html("");
                        $(".status"+id).html("נתקבל");
                    });
                }
            });
    }
</script>