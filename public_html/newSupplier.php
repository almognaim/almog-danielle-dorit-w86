<?php
session_start();
if (!$_SESSION['user_id']) {
    header('location: login.php');
}
include 'inc/header/header.php'; ?>

<!-- Main Start -->
<style>
    form#addSupplierForm .input-group.mt-4 {
        display: flex;
        flex-direction: row;
        direction: ltr;
    }

    form#addSupplierForm .input-group.mt-4 input {
        order: 2;
    }

    form#addSupplierForm label {
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
                <h1>הוספת ספק</h1>
            </div>
        </div>
        <div class="container">
            <div class="row" id="addNewSupplier-Wrapper">
                <div class="col-12">
                    <form method="post" action="" id="addSupplierForm" class="row text-right">
                        <div class="col-md-6 col-12">
                            <div class="input-group mt-4" style="direction: ltr;">
                                <input id="name" type="text" class="form-control" name="name">
                                <div class="input-group-append">
                                    <span class="input-group-text">שם *</span>
                                </div>
                            </div>
                            <div class="input-group mt-4" style="direction: ltr;">
                                <input id="phone" name="phone" type="text" class="form-control">
                                <div class="input-group-append">
                                    <span class="input-group-text">טלפון *</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="input-group mt-4" style="direction: ltr;">
                                <input id="address" name="address" type="text" class="form-control">
                                <div class="input-group-append">
                                    <span class="input-group-text">כתובת *</span>
                                </div>
                            </div>
                            <div class="input-group mt-4" style="direction: ltr;">
                                <input id="mail" name="mail" type="text" class="form-control">
                                <div class="input-group-append">
                                    <span class="input-group-text">מייל *</span>
                                </div>
                            </div>
                            <div class="form-group mt-4">
                                <input id="addNewSupplier" class="form-control btn btn-success" type="submit" name="addNewSupplier" value="הוסף ספק">
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
    $("#addSupplierForm").validate({
        rules: {
            name: {
                required: true
            },
            phone: {
                required: true
            },
            address: {
                required: true
            },
            mail: {
                required: true
            }
        },
        messages: {
            name: {
                required: "אנא רשמו שם פרטי מלא"
            },
            phone: {
                required: "אנא רשמו שם משפחה מלא"
            },
            address: {
                required: 'אנא רשמו מספר טלפון תקין'
            },
            mail: {
                required: 'אנא רשמו תעודת זהות תקינה'
            }
        },
        submitHandler: function(form) {

            var datastring = $("#addSupplierForm").serialize();


            $.ajax({
                type: "post",
                url: "handle/addSupplier.php",
                data: datastring,
                success: function(response) {
                    console.log(response);
                    Swal.fire(
                        'משתמש חדש נוצר!',
                        'אתם מועברים לדף לקוחות',
                        'success'
                    ).then(function() {
                         window.location = "suppliers.php";
                    });
                }

            });
        }
    });
</script>