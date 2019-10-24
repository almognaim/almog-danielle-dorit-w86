<?php
session_start();
if (!$_SESSION['user_id']) {
    header('location: login.php');
}
include 'config.php';
include 'inc/header/header.php';
$user_id = $_SESSION['user_id'];
// check if worker's clock is in 0 or 1

$sqlFirst = "SELECT MAX(id) FROM clock WHERE identity_card = '$user_id' having max(id) is not null";

$sqlFirstResult = mysqli_query($conn, $sqlFirst);
    
if (mysqli_num_rows($sqlFirstResult) > 0) {
    foreach ($sqlFirstResult as $e) {
        $maxId =  $e['MAX(id)'];
    
        $sqlCheckStatus = "SELECT status FROM clock WHERE id = '$maxId'";
        $sqlCheckResult = mysqli_query($conn, $sqlCheckStatus);
        foreach ($sqlCheckResult as $c) {
    
    
            switch ($c['status']) {
                case '1':
                    $logBtn = '  <input id="clockEnterIn" name="clockEnterIn" class="btn btn-success" type="submit" value="כניסה">';
                    break;
                case '0':
                    $logBtn = '<input id="clockEnterOut" name="clockEnterOut" class="btn btn-danger" type="submit" value="יציאה">';
                    break;
                default:
                    $logBtn = '  <input id="clockEnterIn" name="clockEnterIn" class="btn btn-success" type="submit" value="כניסה">';
            }
        };
    }
    
}else {
    $logBtn = '  <input id="clockEnterIn" name="clockEnterIn" class="btn btn-success" type="submit" value="כניסה">';
}






if (isset($_POST['clockEnterIn'])) {
    //    echo '<script>alert("work")</script>';

    $user_id = $_SESSION['user_id'];
    $fullName = $_SESSION['fullName'];
    $timestamp = $_POST['timestamp'];
    echo $timestamp;
    $sql_ENterIn = "INSERT INTO clock(fullName, identity_card, loginHour, status) VALUES ('$fullName','$user_id', CURRENT_TIMESTAMP(),'0')";
    mysqli_query($conn, $sql_ENterIn);

    $logBtn = '<input id="clockEnterOut" name="clockEnterOut" class="btn btn-danger" type="submit" value="יציאה">';
}

if (isset($_POST['clockEnterOut'])) {
    //    echo '<script>alert("work")</script>';

    $user_id = $_SESSION['user_id'];
    $fullName = $_SESSION['fullName'];
    $timestamp = $_POST['timestamp'];
    echo $timestamp;
    $sql_Out = "UPDATE clock
        SET logoutHour = CURRENT_TIMESTAMP(), status= '1'
        WHERE identity_card = $user_id AND status = '0'";
    mysqli_query($conn, $sql_Out);

    $logBtn = '  <input id="clockEnterIn" name="clockEnterIn" class="btn btn-success" type="submit" value="כניסה">';
}
?>
        <style>
            div#timestamp-wrapper {
                max-width: 600px;
                /* height: 300px; */
                background: #000;
                text-align: center;
                display: flex;
                justify-content: center;
                margin: 0 auto;
                align-items: center;
            }

            div#timestamp-wrapper .col-12 {
                height: 100%;
            }

            div#timestamp-wrapper .col-12 .row {

                text-align: center;
            }

            div#timestamp-wrapper .col-12 .row .col-12 {
                color: #fff;
                font-weight: bold;
                letter-spacing: 5px;
                display: flex;
                justify-content: center;
                padding-top: 30px;
            }

            div#timestamp-wrapper .col-12 .row .col-12 button.btn {
                width: 100%;
                display: flex;
                border-radius: 0;
                justify-content: center;
                padding-top: 10px;
                padding-bottom: 10px;
            }

            div#timestamp-wrapper form {
                display: flex;
                flex-direction: column;
            }

            div#accessOutIns .col-12 {
                padding-right: 0;
                padding-left: 0;
                width: 100%;
                flex-direction: column;
            }

            .col-6 {}

            div#timestamp-wrapper form input {
                background: transparent;
                border: none;
                color: #fff;
                text-align: center;
            }

            div#timestamp-wrapper .col-12 .row .col-6 input {
                font-size: 20px;
            }

            div#timestamp-wrapper .col-12 .row .col-12 input#timestamp {
                font-size: 50px;
                font-weight: bold;
                letter-spacing: 5px;
                margin-bottom: 20px;
            }

            div#timestamp-wrapper .col-12 .row .col-12 {
                padding-top: 0;
            }

            div#clock-btns {
                display: flex;
                justify-content: space-between;
                padding-right: 0;
                padding-left: 0;
            }

            .col-12 input#clockEnterIn {
                background: green;
                border-bottom-right-radius: 5px;
                border-bottom-left-radius: 5px;
            }

            div#timestamp-wrapper {
                border-radius: 10px;
            }
        </style>
        <main class="page-content">
            <div class="container-fluid">
                <div class="row" id="page-title">
                    <div class="col-12">
                        <h1>שעון נוכחות</h1>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row border-bottom pb-3">
                    <div class="col-12 btn-wrapper" id="clock-btns">
                        <a class=" text-white btn btn-warning" href="workersTable.php"> טבלת נוכחות <i class="fas fa-user-clock"></i></a>
                        <a href="employee.php" class="btn btn-primary">חזרה לרשימת העובדים <span><i class="fas fa-arrow-left"></i></span></a>
                    </div>
                </div>
                <div class="row mt-3" id="timestamp-wrapper">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12">
                                <form action="#" method="post" id="timestamp-wrapper-id">
                                    <div class="row pt-2">
                                        <div class="col-6">
                                            <input id="timestamp-name" class="form-control" type="text" name="timestamp-name" disabled value="<?php echo $_SESSION['fullName'] ?>">
                                            <input id="timestamp-id" class="form-control" type="hidden" name="timestamp-id" disabled value="<?php echo $_SESSION['fullName'] ?>">
                                        </div>
                                        <div class="col-6">
                                            <input id="date" class="form-control" type="text" name="date" disabled value="<?php echo date("d-m-Y"); ?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <input id="timestamp" class="form-control" type="text" name="timestamp">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="extra">הערות נוספות</label>
                                                <textarea id="extra" class="form-control" name="extra" rows="3">כתבו כאן</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" id="accessOutIns">
                                        <div class="col-12">
                                            <?php echo $logBtn; ?>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <?php include 'inc/footer/footer.php'; ?>
        <script>
            // $(document).ready(function() {
            //     setInterval(timestamp_3, 1000);
            // });

            function timestamp_3() {
                $.ajax({
                    url: 'timestamp.php',
                    success: function(data) {
                        $('#timestamp').val(data);
                    },
                });
            };
        </script>
