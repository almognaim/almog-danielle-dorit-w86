<?php
session_start();

include 'config.php';
include 'inc/header/header.php';

$user_id = $_GET['identity_card'];
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
                <h3>פרטי לקוח: </h3>
            </div>
        </div>

        <div class="row" id="newclientBtn">
            <div class="col-12 text-right">
                <a class="btn btn-danger" href="client.php?identity_card=<?php echo $user_id; ?>">פרטי לקוח</a>
                <a class="btn btn-danger" href="newClient.php">חשבוניות</a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">


                <?php


                $sql = "SELECT * FROM `clients_car` WHERE `identity_card` = $user_id";
                $result = mysqli_query($conn, $sql);


                if (mysqli_num_rows($result) > 0) {
                    // output data of each row[]
                    echo ' <nav>
                        <div class="nav nav-tabs row" id="nav-tab" role="tablist">';
                    while ($row = mysqli_fetch_assoc($result)) {
                        //print_r($row);
                        echo '
                                <a class="nav-item nav-link" id="nav-' . $row['car_number'] . '-tab" data-toggle="tab" href="#nav-' . $row['car_number'] . '" role="tab" aria-controls="nav-' . $row['car_number'] . '" aria-selected="true">' . $row['car_number'] . '</a>';
                    }
                    echo '</div>
                        </nav>';
                } else {
                    echo "אין נתונים על משתמש זה נא פנו למנהל המערכת";
                } ?>

                <?php
                $sql = "SELECT * FROM `clients_car` WHERE `identity_card` = $user_id";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    // output data of each row[]
                    echo ' <div class="tab-content row" id="nav-tabContent-clients" >';
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<div class="tab-pane fade" id="nav-' . $row['car_number'] . '" role="tabpanel" aria-labelledby="nav-' . $row['car_number'] . '">
                                <div class="row">
                                    <div class="col-md-7 col-12">
                                    <div class="row">
                                
                                    <div class="col-md-6 col-12">
                                        <div class="input-group mt-3">
                                            <input disabled type="text" class="form-control" aria-label="" value="' . $row['first_name'] . '">
                                            <div class="input-group-append">
                                                <span class="input-group-text">שם פרטי </span>
                                            </div>
                                        </div>
                                        <div class="input-group mt-3">
                                            <input disabled type="text" class="form-control" value="' . $row['last_name'] . '">
                                            <div class="input-group-append">
                                                <span class="input-group-text">שם משפחה </span>
                                            </div>
                                        </div>
                                        <div class="input-group mt-3">
                                            <input disabled type="text" class="form-control" value="' . $row['phone'] . '">
                                            <div class="input-group-append">
                                                <span class="input-group-text">טלפון</span>
                                            </div>
                                        </div>
                                        <div class="input-group mt-3">
                                            <input disabled type="text" class="form-control" aria-label="" value="' . $row['email'] . '">
                                            <div class="input-group-append">
                                                <span class="input-group-text">אימייל </span>
                                            </div>
                                        </div>
                                        <div class="input-group mt-3">
                                            <input disabled type="text" class="form-control" value="' . $row['identity_card'] . '">
                                            <div class="input-group-append">
                                                <span class="input-group-text">מ.זהות </span>
                                            </div>
                                        </div>
                                        <div class="input-group mt-3">
                                            <input disabled type="text" class="form-control" value="' . $row['adress'] . '">
                                            <div class="input-group-append">
                                                <span class="input-group-text">כתובת</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="input-group mt-3">
                                            <input disabled type="text" class="form-control" aria-label="" value="' . $row['car_number'] . '">
                                            <div class="input-group-append">
                                                <span class="input-group-text">מ. רכב</span>
                                            </div>
                                        </div>
                                        <div class="input-group mt-3">
                                            <input disabled type="text" class="form-control" value="' . $row['manufacturer'] . '">
                                            <div class="input-group-append">
                                                <span class="input-group-text">יצרן</span>
                                            </div>
                                        </div>
                                        <div class="input-group mt-3">
                                            <input disabled type="text" class="form-control" value="' . $row['model'] . '">
                                            <div class="input-group-append">
                                                <span class="input-group-text">דגם</span>
                                            </div>
                                        </div>
                                        <div class="input-group mt-3">
                                            <input disabled type="text" class="form-control" aria-label="" value="' . $row['engine'] . '">
                                            <div class="input-group-append">
                                                <span class="input-group-text">נפח מנוע </span>
                                            </div>
                                        </div>
                                        <div class="input-group mt-3">
                                            <input disabled type="text" class="form-control" value="' . $row['color'] . '">
                                            <div class="input-group-append">
                                                <span class="input-group-text">צבע </span>
                                            </div>
                                        </div>
                                        <div class="input-group mt-3">
                                            <input disabled type="text" class="form-control" value="' . $row['chassis_number'] . '">
                                            <div class="input-group-append">
                                                <span class="input-group-text">מ.שלדה</span>
                                            </div>
                                        </div>
                                        <div class="input-group mt-3">
                                            <input disabled type="text" class="form-control" value="' . $row['last_treatment'] . '">
                                            <div class="input-group-append">
                                                <span class="input-group-text">טיפול אחרון</span>
                                            </div>
                                        </div>
                                        <div class="input-group mt-3">
                                            <input disabled type="text" class="form-control" value="' . $row['next_treatment'] . '">
                                            <div class="input-group-append">
                                                <span class="input-group-text">טיפול הבא</span>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                                    </div> 
                        ';
                    }
                    echo ' <div class="col-md-5 col-12 mt-3">
                            <h4 class="historical-fixses bg-dark text-white p-2 rounded text-center">היסטוריית תיקונים</h4>';



                    $sql_fixed = "SELECT * FROM `clients_fixes` WHERE `identity_card` = $user_id";
                    $result = mysqli_query($conn, $sql_fixed);


                    if (mysqli_num_rows($result) > 0) {
                        // output data of each row[]

                        while ($row = mysqli_fetch_assoc($result)) {
                            //print_r($row);
                            echo '<div class="historical-fixed-note-wrapper text-center">
                                    <div class="card text-center">
                                        <div class="card-header">
                                            <div class="row">
                                                <div class="col-md-6 col-12">
                                                    <div class="d-flex flex-column text-right">
                                                        <span>נפתח ע״י: ' . $row['openedBy'] . '</span>
                                                        <span>תאריך: ' . $row['date'] . '</span>
                                                        <span>בשעה: ' . $row['hour'] . '</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="d-flex flex-row justify-content-end text-left">
                                                        <span class="ml-2"><a href="#"><i class="fas fa-pencil-alt"></i></a></span>
                                                        <span>סטטוס תיקון: ';
                            if ($row['status'] == 'true') {
                                echo 'בטיפול';
                            } else {
                                echo 'סגור';
                            }
                            echo '</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title">' . $row['fixAbout'] . '</h5>
                                            <p class="card-text">' . $row['fixDescription'] . '
                                            </p>
                                            <p class="card-text">
                                                <div class="row">
                                                    <div class="col-12 text-right">חלקים שהוחלפו</div>
                
                                                </div>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="load-moe mt-2">
                                        <a class=" text-white btn btn-danger" data-toggle="modal" data-target="#addFixModal">הוסיפו תיקון</a>
                                    </div>
                                </div>';
                        }
                    } else {
                        echo ' <div class="row">
                               <div class="col-12 text-center">
                                   <p class="text-center">אין נתונים על משתמש זה נא פנו למנהל המערכת</p>
                                   <a class=" text-white btn btn-danger" data-toggle="modal" data-target="#addFixModal">הוסיפו תיקון</a>
                               </div>
                               </div>';
                    }













                    echo '</div>
    </div></div></div>';
                } ?>
            </div>
        </div>

    </div>

</main>

<!-- Main End -->

<div class="modal fade" id="addFixModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">הוספת תיקון</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post">
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <div class="input-group mt-3" style="direction: ltr;">
                                <input type="text" class="form-control" aria-label="" value="">
                                <div class="input-group-append">
                                    <span class="input-group-text">שם לקוח </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="input-group mt-3">
                                <div class="form-group">
                                    <select id="selectStatus" class="form-control" name="selectStatus">
                                        <option>בטיפול</option>
                                        <option>סגור</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group text-right" id="aboutForm-wrapper">
                                <label for="aboutForm">מהות התקלה</label>
                                <textarea id="aboutForm" class="form-control" name="about" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group text-right" id="descriptionForm-wrapper">
                                <label for="descriptionForm">תיאור התקלה</label>
                                <textarea id="descriptionForm" class="form-control" name="about" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="container-fluid" id="container-wrapper-for-add-newFields">
                            <div class="wrapper-for-add-newFields row">
                                <div class="col-lg-9 col-12">
                                    <div class="form-group text-right" id="partsChnage-wrapper">
                                        <label for="partsChnage">חלקים שהוחלפו</label>
                                        <select id="partsChnage" class="custom-select" name="partsChnage">
                                            <option>מוצר</option>
                                            <option>מוצר</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-12">
                                    <div class="form-group text-right">
                                        <label for="example-number-input" class="">כמות</label>
                                        <input class="form-control text-center" type="number" value="1" id="number-input">
                                    </div>
                                </div>
                                <div class="col-lg-1 col-12"></div>
                            </div>
                        </div>
                        <div class="col-12 text-center">
                            <button class="btn btn-success" id="addNewItem">הוסיפו פריט <span><i class="fas fa-plus"></i></span></button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="goToPay" class="btn btn-primary">המשך לתשלום</button>
            </div>
        </div>
    </div>
</div>
<?php include 'inc/footer/footer.php'; ?>

<script>
    $("div#nav-tab a:first").addClass("active");
    $("div#nav-tabContent-clients div:first").addClass("active");
    $("div#nav-tabContent-clients div:first").addClass("show");
</script>