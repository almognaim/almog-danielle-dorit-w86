<?php
session_start();

include 'config.php';
include 'inc/header/header.php';

$item_id = $_GET['id'];
?>


<style>
    div#nav-tabContent-clients .input-group {
        direction: ltr;
    }

    .form-control:disabled {
        background: unset;
    }

    div#nav-tabContent-clients>div {
        width: 100%;
    }

    .modal-header .close {
        margin-right: auto;
        margin-left: 0;
    }

    div#addFixModal .modal-dialog.modal-dialog-centered {
        max-width: 990px;
    }

    div#addFixModal .modal-dialog.modal-dialog-centered .modal-content {
        height: 90vh;
    }

    select#selectStatus {
        width: 100%;
        max-width: 100%;
    }

    .input-group.mt-3 {
        width: 100% max-content;
        max-width: 100%;
        width: 100%;
    }
</style>
<!-- Main Start -->

<main class="page-content">
    <div class="container-fluid">
        <div class="row" id="page-title">
            <div class="col-12">
                <h3>עריכת פריט:</h3>
            </div>
        </div>


        <div class="row">
            <div class="col-12">
                <div class="container">
                    <div class="row" id="addNewClient-Wrapper">
                        <div class="col-12">
                            <form method="post" action="" id="addNewItemForm" class="row text-right">
                                <div class="col-md-6 col-12">

                                    <?php
                                    $sql = "SELECT name, quantity, price, min_quantity, vendor FROM `inventory` WHERE `id` = $item_id";
                                    $result = mysqli_query($conn, $sql);

                                    $vendorsql= "SELECT * FROM `vendors`";
                                    $vendor_result = mysqli_query($conn, $vendorsql);


                                    while ($row = mysqli_fetch_assoc($result)) {
                                        foreach ($row as $field => $value) {

                                            $html ='<div class="input-group mt-4" style="direction: ltr;">'
                                            ;
                                            if ($field=='vendor'){
                                                $html= $html.'<select>';
                                                while ($vendor_row = mysqli_fetch_assoc($vendor_result)) {
                                                    $html= $html.'<option value="'.$vendor_row["name"].'">'.$vendor_row["name"].'</option>';
                                                    
                                                }
                                               $html= $html.' </select><div class="input-group-append">
                                               <span class="input-group-text">';                                           
 
                                            }
                                           elseif (is_numeric($value)) {

                                                $html = $html . '<input type="number' . '" class="form-control" name="' . $field . '" value="' . $value . '">
                                                <div class="input-group-append">
                                                    <span class="input-group-text">';
                                            } else {
                                                $html = $html . '<input type="text' . '" class="form-control" name="' . $field . '" value="' . $value . '">
                                                <div class="input-group-append">
                                                    <span class="input-group-text">';
                                            }
                                            switch ($field) {
                                                case "name":
                                                    $html = $html . 'שם פריט';
                                                    break;
                                                case "quantity":
                                                    $html = $html . 'כמות';
                                                    break;
                                                case "price":
                                                    $html = $html . 'מחיר ליחידה בש"ח כולל מע"מ';
                                                    break;
                                                case "min_quantity":
                                                    $html = $html . 'כמות מינימאלית';
                                                    break;
                                                case "vendor":
                                                    $html = $html . 'ספק';
                                                    break;
                                            }
                                            $html = $html . '</span>
                                                        </div>
                                                    </div>';
                                            
                                                    echo $html;
                                        }
                                    }

                                    ?>
                                        <input id="addNewClient" class="form-control btn btn-success" type="submit" name="addNewClient" value="שמור">

                            </form>
                        </div>
                    </div>
                </div>


            </div>
        </div>

    </div>

</main>

<?php include 'inc/footer/footer.php'; ?>


<script>

$("#addNewItemForm").validate(
      {
        rules: 
        {
            name:{
            required: true
          },
          quantity:{
            required: true
          },
          price:{
            required: true
          },
          minquantity:{
            required: true
          },
          vendor:{
            required: true
          },
     
        },
        messages: 
        {
            name: 
          {
            required: "אנא הזינו שם פריט"
          },
          quantity: 
          {
            required: "אנא הזינו כמות במלאי"
          },
          price:{
            required: 'אנא הזינו מחיר בש"ח כולל מע"מ'
          },
          minquantity:{
            required: "אנא הזינו כמות מינימאלית במלאי"
          },
          vendor:{
            required: "אנא הזינו שם ספק"
          },
      
        },
        submitHandler: function(form) {
          
            var datastring = $("#addNewItemForm").serialize();
    

    $.ajax({
        type: "post",
        url: "handle/addItem.php",
        data: datastring,
        success: function (response) {
        
     Swal.fire(
           'פריט חדש נוצר!',
            'אתם מועברים לרשימת מלאי',
            'success'
            ).then(function() {
                 window.location = "inventory-list.php";
});
        }
        
    }); 
        }
      });	
</script>