<?php
session_start();
if (!$_SESSION['user_id']) {
    header('location: login.php');
}
include 'config.php';
include 'inc/header/header.php'; ?>

<!-- Main Start -->
<style>
    form#addNewOrderForm .input-group.mt-4 {
        display: flex;
        flex-direction: row;
        direction: ltr;
    }

    form#addNewOrderForm .input-group.mt-4 input {
        order: 2;
    }

    form#addNewOrderForm label {
        order: 3;
        width: 100%;
    }

    .input-group-append {
        order: 2;
    }
</style>
<main class="page-content">
    <div class="container-fluid">
        <div class="row" id="page-title">
            <div class="col-12">
                <h1>הזמנה חדשה</h1>
            </div>
        </div>
        <div class="container">
            <div class="row" id="addNewOrder-Wrapper">
                <div class="col-12">
                    <button class="btn btn-success" id="addNewItem" disabled="true" onclick="addItem()">הוסיפו פריט <span><i class="fas fa-plus"></i></span></button>
                    <form method="post" action="" id="addNewOrderForm" class="row text-right">
                        <div class="col-md-12 col-12">
                            <div class="input-group mt-4" style="direction: ltr;">
                                <select name="vendor" class="form-control" id="vendor">
                                    <option value="">בחר ספק</option>
                                    <?php
                                    $sql = "SELECT * FROM `vendors`";
                                    $result = mysqli_query($conn, $sql);

                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo "<option value='" . $row['id'] . "' >" . $row['name'] . "</option>";
                                        }
                                    } else {
                                        echo "0 results";
                                    } ?>
                                </select>
                                <div class="input-group-append">
                                    <span class="input-group-text">ספק</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-12">
                            <div class="row" >
                                <div class="col-md-6 col-12">
                                    <div class="input-group mt-4" style="direction: ltr;" id="single-item">
                                        <select name="item0" disabled="true" class="form-control" id="item0">
                                        </select>
                                        <span class="input-group-text">מוצר</span>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="input-group mt-4" style="direction: ltr;">
                                        <input name="quantity0" type="number" class="form-control" value="1" min="1">
                                        <div class="input-group-append">
                                            <span class="input-group-text">כמות</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" id="items-inputs"></div>
                            <div class="form-group mt-4">
                                <input id="sendOrder" class="form-control btn btn-success" type="submit" name="sendOrder" value="שלח הזמנה">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Main End -->

<?php include 'inc/footer/footer.php'; ?>

<script>
    var itemsArray = [];
    var inputIndex = 0;

    function addItem() {
        inputIndex++
        var html = `
            <div class="col-md-6 col-12">
                <div class="input-group mt-4" style="direction: ltr;" id="single-item">
                    <select name="item` + inputIndex + `" disabled="false" class="form-control" id="item` + inputIndex + `">
                    </select>
                    <span class="input-group-text">מוצר</span>
                </div>
            </div>
            <div class="col-md-6 col-12">
                <div class="input-group mt-4" style="direction: ltr;">
                    <input name="quantity` + inputIndex + `" type="number" class="form-control" value="1" min="1">
                    <div class="input-group-append">
                        <span class="input-group-text">כמות</span>
                    </div>
                </div>
            </div>
            `
        $("#items-inputs").append(html)
        itemsArray.forEach(function(element, i) {
            $("#item" + inputIndex)
                .prop('disabled', false)
                .append($("<option></option>")
                    .attr("value", element.id)
                    .text(element.name))
        })
    }
    $("#addNewOrderForm").validate({
        rules: {
            vendor: {
                required: true
            }

        },
        messages: {
            vendor: {
                required: "אנא בחרו ספק"
            },

        },
        submitHandler: function(form) {

            var data = $("#addNewOrderForm").serialize();
            data = data + "&itemsTotal="+(inputIndex+1);
            
            $.ajax({
                type: "post",
                url: "handle/addOrder.php",
                data: data,
                success: function(response) {

                    Swal.fire(
                        'הזמנה חדשה נוצר!',
                        'אתם מועברים לרשימת ההזמנות',
                        'success'
                    ).then(function() {
                        window.location = "orders.php";
                    });
                }

            });
        }
    });

    $(document).ready(function() {
        $("#vendor").change(function() {
            var vendor = $(this).val();
            var dataString = "vendorId=" + vendor;
            $.ajax({
                type: "POST",
                url: "handle/getVendorItems.php",
                data: dataString,
                success: function(result) {
                    if (inputIndex > 0) {
                       $("#items-inputs").empty()
                       inputIndex = 0;
                    }
                    itemsArray = JSON.parse(result);
                    if (itemsArray.length > 0) {
                        var selectInput = $('#item0')
                        selectInput
                            .find('option')
                            .remove()
                            .end()
                        itemsArray.forEach(function(element, i) {
                            selectInput
                                .prop('disabled', false)
                                .append($("<option></option>")
                                    .attr("value", element.id)
                                    .text(element.name))
                        });
                        $("#addNewItem").prop('disabled', false);
                    } else {
                        $('#item0')
                            .find('option')
                            .remove()
                            .end()
                            .prop('disabled', true)
                            .append($("<option></option>")
                                .attr("value", "")
                                .text("אין מוצרים לספק זה"));
                    }

                }
            });

        });
    });
</script>