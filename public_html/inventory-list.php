<?php
session_start();
include 'config.php';
include 'inc/header/header.php';
?>

<style>
    .modal-header .close {
        margin: -1rem -1rem -1rem -1rem;
    }
</style>
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
                        <!-- <th scope="col">כמות מינימאלית במלאי</th> -->
                        <th scope="col">ספק</th>
                        <th scope="col">ערוך כמות</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "
                        SELECT inventory.id,   
                        inventory.name, inventory.price, inventory.min_quantity, vendors.name AS vendor,
                        Sum(inventory.quantity + ( CASE  WHEN item.quan IS NULL THEN 0 ELSE item.quan end )) AS quantity  
                        FROM   inventory 
                        LEFT JOIN vendors ON inventory.vendor = vendors.id 
                        LEFT JOIN (SELECT item_id, Sum(quantity) AS quan FROM `order_items` WHERE received = 1 GROUP  BY item_id) AS item ON inventory.id = item.item_id 
                        GROUP  BY inventory.id 
                    ";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {

                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr><th scope='row'>" . $row['name'] . "</th><td>" . $row['quantity'] . "</td><td id='identity_card'>" . $row['price'] . "</td>
                                <td>" . $row['vendor'] . "</td><td onclick='editQuantity(\"".$row['name']."\",". $row['id'] .",". $row['quantity'] ." )' ><i class='fas fa-pencil-alt'></i></td></tr>";
                        }
                    } else {
                        echo "0 results";
                    } ?>

                </tbody>
            </table>


        </div>
    </div>

    <!-- Modal -->
    
<div class="modal fade" id="editQuantityModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">ערוך כמות עבור <span class="itemName"></span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="editQuantityForm">
                    <div class="row">
                        <div class="col-lg-12 col-12">
                            <div class="input-group mt-3" style="direction: ltr;">
                                <input type="number" name="quantity" class="form-control quantityInput" aria-label="" value="">
                                <div class="input-group-append">
                                    <span class="input-group-text">כמות</span>
                                </div>
                            </div>
                            <div class="input-group mt-3" style="direction: ltr; visibility: hidden;">
                                <input type="number" name="id" class="form-control idInput" aria-label="" value="">
                                <input type="number" name="originalQuantity" class="form-control originalQuantity" aria-label="" value="">
                            </div>
                        </div>
                    </div>
                    <input id="changeQuantity" class="btn btn-success" type="submit" name="" value="עדכן">
                </form>
            </div>
        </div>
    </div>
</div>
</main>

<!-- Main End -->

<?php include 'inc/footer/footer.php'; ?>


<script>
    function editQuantity(name, id, quantity) {
        $(".itemName").html(name);
        $(".quantityInput").val(quantity);
        $(".originalQuantity").val(quantity);
        $(".idInput").val(id);
        $("#editQuantityModal").modal("show")
    }
    $(document).ready( function () {
        $('#editQuantityForm').submit(function(e){
            e.preventDefault();

            var datastring = $("#editQuantityForm").serialize();
            console.log(datastring);
            
            $.ajax({
                type: "post",
                url: "handle/editQuanity.php",
                data: datastring,
                success: function(response) {

                    Swal.fire(
                        'כמות מלאי עודכנה!',
                        'אתם מועברים לרשימת המלאי',
                        'success'
                    ).then(function() {
                        window.location = "inventory-list.php";
                    });
                }
            })
        })
    })
</script>
