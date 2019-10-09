<?php
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
            <div class="col-md-6 col-12">


                <?php


                $sql = "SELECT * FROM `clients_cars` WHERE `client_identity_card` = $user_id";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    // output data of each row[]
                    echo ' <nav>
                        <div class="nav nav-tabs row" id="nav-tab" role="tablist">';
                    while ($row = mysqli_fetch_assoc($result)) {

                        echo '
                                <a class="nav-item nav-link" id="nav-' . $row['car_number'] . '-tab" data-toggle="tab" href="#nav-' . $row['car_number'] . '" role="tab" aria-controls="nav-' . $row['car_number	'] . '" aria-selected="true">' . $row['car_number'] . '</a>';
                    }
                    echo '</div>
                        </nav>';
                } else {
                    echo "אין נתונים על משתמש זה נא פנו למנהל המערכת";
                } ?>

                <?php
                $sql = "SELECT * FROM `clients_cars` WHERE `client_identity_card` = $user_id";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    // output data of each row[]



                    echo ' <div class="tab-content row" id="nav-tabContent-clients" >';
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<div class="tab-pane fade" id="nav-' . $row['car_number'] . '" role="tabpanel" aria-labelledby="nav-' . $row['car_number'] . '">
                        <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="input-group mt-3">
                                <input disabled type="text" class="form-control" aria-label="" value="' . $row['client_name'] . '">
                                <div class="input-group-append">
                                    <span class="input-group-text">שם פרטי </span>
                                </div>
                            </div>
                            <div class="input-group mt-3">
                                <input disabled type="text" class="form-control" value="' . $row['client_last_name'] . '">
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
                                <input disabled type="text" class="form-control" value="' . $row['client_last_name'] . '">
                                <div class="input-group-append">
                                    <span class="input-group-text">מ.זהות </span>
                                </div>
                            </div>
                            <div class="input-group mt-3">
                                <input disabled type="text" class="form-control" value="' . $row['phone'] . '">
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
                                <input disabled type="text" class="form-control" value="' . $row['car_manufactory'] . '">
                                <div class="input-group-append">
                                    <span class="input-group-text">יצרן</span>
                                </div>
                            </div>
                            <div class="input-group mt-3">
                                <input disabled type="text" class="form-control" value="' . $row['car_model'] . '">
                                <div class="input-group-append">
                                    <span class="input-group-text">דגם</span>
                                </div>
                            </div>
                            <div class="input-group mt-3">
                                <input disabled type="text" class="form-control" aria-label="" value="' . $row['car_engine'] . '">
                                <div class="input-group-append">
                                    <span class="input-group-text">נפח מנוע </span>
                                </div>
                            </div>
                            <div class="input-group mt-3">
                                <input disabled type="text" class="form-control" value="' . $row['car_color'] . '">
                                <div class="input-group-append">
                                    <span class="input-group-text">צבע </span>
                                </div>
                            </div>
                            <div class="input-group mt-3">
                                <input disabled type="text" class="form-control" value="' . $row['chassis'] . '">
                                <div class="input-group-append">
                                    <span class="input-group-text">מ.שלדה</span>
                                </div>
                            </div>
                            <div class="input-group mt-3">
                                <input disabled type="text" class="form-control" value="' . $row['first_treatment'] . '">
                                <div class="input-group-append">
                                    <span class="input-group-text">טיפול אחרון</span>
                                </div>
                            </div>
                            <div class="input-group mt-3">
                                <input disabled type="text" class="form-control" value="' . $row['last_treatment'] . '">
                                <div class="input-group-append">
                                    <span class="input-group-text">טיפול הבא</span>
                                </div>
                            </div>
                        </div>
                    </div>
                        </div>';
                    }
                    echo '</div>';
                } ?>










            </div>






            <div class="col-md-6 col-12 text-center">
                <h4 class="historical-fixses bg-dark text-white p-2 rounded">היסטוריית תיקונים</h4>
                <div class="historical-fixed-note-wrapper">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="d-flex flex-column text-right">
                                        <span>נפתח ע״י: בוריס</span>
                                        <span>תאריך: 12-06-1993</span>
                                        <span>בשעה: 12:00</span>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="d-flex flex-row justify-content-end text-left">
                                        <span class="ml-2"><a href="#"><i class="fas fa-pencil-alt"></i></a></span>
                                        <span>סטטוס תיקון: בטיפול</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">מהות התקלה ומה בוצע</h5>
                            <p class="card-text">
                                רכב הגיע למוסך עם פגיעה בכנף ימין. בוצע החלפת כנף ע"י אלי.
                                רכב נמסר ללקוח ב6.4 לאחר תיקון

                                משתמשים מעורבים חלקים שהוחלפו

                            </p>
                            <p class="card-text">
                                <div class="row">
                                    <div class="col-12">חלקים שהוחלפו</div>

                                </div>
                            </p>
                        </div>
                    </div>
                    <div class="card">
                        <h5 class="card-header">Featured</h5>
                        <div class="card-body">
                            <h5 class="card-title">Special title treatment</h5>
                            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>

                    <div class="load-moe">
                        <a href="http://" class="btn btn-danger mt-2">טען עוד..</a>
                    </div>
                </div>
            </div>
        </div>

    </div>

</main>

<!-- Main End -->

<?php include 'inc/footer/footer.php'; ?>

<script>
    $("div#nav-tab a:first").addClass("active");
    $("div#nav-tabContent-clients div:first").addClass("active");
    $("div#nav-tabContent-clients div:first").addClass("show");
</script>