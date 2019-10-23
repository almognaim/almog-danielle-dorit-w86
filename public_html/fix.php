<?php
session_start();

include 'config.php';
include 'inc/header/header.php';

$fixId = $_GET['id'];
?>


<style>
    .text-right {
        text-align: right;
    }

    .form-control:disabled {
        background: unset;
    }

    .dataTables_length,
    .dataTables_filter,
    .dataTables_paginate {
        display: none !important;
    }

    #paypal-button-container {
        margin: auto;
    }
</style>
<!-- Main Start -->

<main class="page-content">
    <script src="https://www.paypal.com/sdk/js?client-id=AVCZl-pF5AzP0QScG4lB1qbBYkzTQ74PWWKvdW_WTz9H-agRiFTTwi_aj5ciztU953sQpwl4zbRClGD9&currency=ILS">
    </script>
    <div class="container-fluid">
        <div class="row" id="page-title">
            <div class="col-12">
                <h4>פרטי טיפול: </h4>
            </div>
        </div>

        <div class="row">

            <?php
            $sql = "select clients.* , clients_fixes.fixAbout, clients_fixes.status ,clients_fixes.fixDescription from clients_fixes 
                left join clients on clients_fixes.identity_card = clients.identity_card
                where clients_fixes.id = $fixId";
            $status =
                $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                foreach (mysqli_fetch_assoc($result) as $key => $value) {
                    if ($key != 'id' && $key != 'fixAbout' && $key != 'fixDescription' && $key != 'status') {
                        $html  = '<div class="input-group mt-3 col-md-6">
                            
                            <div class="input-group-append">
                                <span class="input-group-text">';
                        switch ($key) {
                            case 'first_name':
                                $html = $html . 'שם פרטי';
                                break;
                            case 'last_name':
                                $html = $html . 'שם משפחה';
                                break;
                            case 'phone':
                                $html = $html . 'טלפון';
                                break;
                            case 'email':
                                $html = $html . 'מייל';
                                break;
                            case 'identity_card':
                                $html = $html . 'תעודת זהות';
                                $identity = $value;
                                break;
                            case 'address':
                                $html = $html . 'כתובת';
                                break;
                        }
                        $html = $html . '</span>
                                    </div>
                                    <input disabled type="text" class="form-control" aria-label="" value="' . $value . '">
                                </div>';
                        echo $html;
                    } elseif ($key == 'fixAbout' || $key == "fixDescription") {
                        $html  = '<div class="input-group mt-3 col-md-6">
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                    ';
                        if ($key == 'fixAbout') {
                            $html = $html . 'מהות התקלה';
                        } else {
                            $html = $html . 'תיאור התקלה';
                        };
                        $html = $html . '
                                            </span>
                                        </div>
                                        <textarea disabled type="text" class="form-control" >' . $value . '</textarea>
                                    </div>';
                        echo $html;
                    } elseif ($key == 'status') {
                        $status = $value;
                    }
                }
            } else {
                echo "אירעה תקלה";
            }
            ?>
                <h4 class="col-sm-12 text-right" style="margin: 1rem 0rem;"> חלפים:</h4>
                <table class="table text-center text-right col-sm-12" id="clients">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">מק"ט</th>
                            <th scope="col">שם</th>
                            <th scope="col">כמות</th>
                            <th scope="col">מחיר ליחידה</th>
                            <th scope="col">סה"כ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sumAll = 0;
                        $itemsSql = "select order_items.item_id, order_items.quantity, inventory.price, inventory.name from order_items
                    left join inventory on inventory.id = order_items.item_id
                    where order_items.fix_id =  $fixId";
                        $itemsRes = mysqli_query($conn, $itemsSql);

                        if (mysqli_num_rows($itemsRes) > 0) {
                            while ($row = mysqli_fetch_assoc($itemsRes)) {
                                $item = "<tr><th scope='row'>" . $row['item_id'] . "</th><td>" . $row['name'] . "</td><td>" . -$row['quantity'] . "</td><td>" . $row['price'] . "</td>
                            <td>" . ($row['price'] * -$row['quantity']) . "</td></tr>";
                                echo $item;
                                $sumAll = $sumAll + ($row['price'] * -$row['quantity']);
                            }
                            // echo $sumAll;
                            echo '</tbody><tfoot><tr><th scope="row"</th><td></td><td></td><td>מחיר סה"כ:</td><td class="totalSum">' . $sumAll . '</td></tr></tfoot>';
                        } else {
                            echo "0 results";
                        }
                        ?>
                </table>
                <div id="paypal-button-container"></div>
        </div>
    </div>
</main>
<?php include 'inc/footer/footer.php'; ?>
<script>
    var sumTotal = <?php echo $sumAll; ?>;
    var status = "<?php echo $status; ?>";
    var datastring = "fix_id=" + <?php echo $fixId; ?> + "&identity_card=" + <?php echo $identity; ?> + "&amount=" + sumTotal;
    console.log(datastring);

    if (status != 'paid') {
        paypal.Buttons({
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: sumTotal
                        }
                    }]
                });
            },
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(details) {


                    // alert('Transaction completed by ' + details.payer.name.given_name);
                    // Call your server to save the transaction
                    console.log(data);
                    console.log(details);
                    datastring = datastring + "&order_id=" + details.id + "&payer_id=" + details.payer.payer_id;
                    console.log(datastring);
                    
                    $.ajax({
                        type: "post",
                        url: "handle/paypal.php",
                        data: datastring,
                        success: function(response) {

                            Swal.fire(
                                'תשלום אושר!',
                                'אתם מועברים לרשימת הטיפולים',
                                'success'
                            ).then(function() {
                                window.location = "papers.php";
                            });
                        }
                    });
                });
            }
        }).render('#paypal-button-container');
    }
</script>