<?php
session_start();
if (!$_SESSION['user_id']) {
    header('location: login.php');
}
include 'inc/header/header.php'; ?>

<!-- Main Start -->
<style>
    form#addNewWorkerForm .input-group.mt-4 {
        display: flex;
        flex-direction: row;
        direction: ltr;
    }

    form#addNewWorkerForm .input-group.mt-4 input {
        order: 2;
    }

    form#addNewWorkerForm label {
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
                <h1>הוספת עובד</h1>
            </div>
        </div>
        <div class="container">
            <div class="row" id="addNewClient-Wrapper">
                <div class="col-12">
                    <form method="post" action="" id="addNewWorkerForm" class="row text-right">
                        <div class="col-md-6 col-12">
                            <div class="input-group mt-4" style="direction: ltr;">
                                <input id="username" type="text" class="form-control" name="username">
                                <div class="input-group-append">
                                    <span class="input-group-text">שם משתמש</span>
                                </div>
                            </div>
                            <div class="input-group mt-4" style="direction: ltr;">
                                <input id="fullname" type="text" class="form-control" name="fullname">
                                <div class="input-group-append">
                                    <span class="input-group-text">שם מלא</span>
                                </div>
                            </div>
                            <div class="input-group mt-4" style="direction: ltr;">
                                <input id="email" type="text" class="form-control" name="email">
                                <div class="input-group-append">
                                    <span class="input-group-text">מייל</span>
                                </div>
                            </div>
                            <div class="input-group mt-4" style="direction: ltr;">
                                <input id="identity_card" type="text" class="form-control" name="identity_card">
                                <div class="input-group-append">
                                    <span class="input-group-text">תעודת זהות</span>
                                </div>
                            </div>
                            <div class="input-group mt-4" style="direction: ltr;">
                                <input id="speciality" type="text" class="form-control" name="speciality">
                                <div class="input-group-append">
                                    <span class="input-group-text">מומחיות</span>
                                </div>
                            </div>
                            <div class="input-group mt-4" style="direction: ltr;">
                                <input id="admin" type="checkbox" class="form-control" name="admin">
                                <div class="input-group-append">
                                    <span class="input-group-text">אדמין</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="input-group mt-4" style="direction: ltr;">
                                <input id="password" type="text" class="form-control" name="password">
                                <div class="input-group-append">
                                    <span class="input-group-text">סיסמה</span>
                                </div>
                            </div>
                            <div class="input-group mt-4" style="direction: ltr;">
                                <input id="phone" type="text" class="form-control" name="phone">
                                <div class="input-group-append">
                                    <span class="input-group-text">טלפון</span>
                                </div>
                            </div>
                            <div class="input-group mt-4" style="direction: ltr;">
                                <input id="seniority" type="text" class="form-control" name="seniority">
                                <div class="input-group-append">
                                    <span class="input-group-text">בכירות</span>
                                </div>
                            </div>
                            <div class="input-group mt-4" style="direction: ltr;">
                                <input id="address" type="text" class="form-control" name="address">
                                <div class="input-group-append">
                                    <span class="input-group-text">כתובת</span>
                                </div>
                            </div>
                            <div class="input-group mt-4" style="direction: ltr;">
                                <input id="startDate" type="text" class="form-control" name="startDate">
                                <div class="input-group-append">
                                    <span class="input-group-text">תחילת עבודה</span>
                                </div>
                            </div>
                            <div class="form-group mt-4">
                                <input id="addNewClient" class="form-control btn btn-success" type="submit" name="addNewClient" value="הוספת לקוח חדש">
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
    $("#addNewWorkerForm").validate({
        rules: {
            username: {
                required: true
            },
            password: {
                required: true
            },
            fullname: {
                required: true
            },
            phone: {
                required: true
            },
            email: {
                required: true
            },
            seniority: {
                required: true
            },
            identity_card: {
                required: true
            },
            address: {
                required: true
            },
            startDate: {
                required: true
            },
            speciality: {
                required: true
            },
            admin: {
                required: true
            }
        },
        messages: {
            username: {
                required: 'אנא בחרו שם משתמש תקין'
            },
            password: {
                required: 'אנא בחרו סיסמא בת 8 תוים לפחות'
            },
            fullname: {
                required: "אנא רשמו שם פרטי מלא"
            },
            phone: {
                required: 'אנא רשמו מספר טלפון תקין'
            },
            email: {
                required: 'אנא רשמו כתובת מייל תקינה'
            },
            seniority: {
                // required: true
            },
            identity_card: {
                required: 'אנא רשמו תעודת זהות תקינה'
            },
            address: {
                required: 'אנא רשמו כתובת'
            },
            startDate: {
                // required: true
            },
            speciality: {
                required: 'אנא רשמו תחום מומחיות'
            },
            admin: {
                // required: 'אנא רשמו תעודת זהות תקינה'
            }
        },
        submitHandler: function(form) {

            var datastring = $("#addNewWorkerForm").serialize();


            $.ajax({
                type: "post",
                url: "handle/addEmployee.php",
                data: datastring,
                success: function(response) {
                    console.log(response);
                    
                    Swal.fire(
                        'משתמש חדש נוצר!',
                        'אתם מועברים לדף לקוחות',
                        'success'
                    ).then(function() {
                        // window.location = "employee.php";
                    });
                }

            });
        }
    });
</script>