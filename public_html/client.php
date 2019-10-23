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

    select#selectStatus {
        width: 100%;
        max-width: 100%;
    }

    .input-group.mt-3 {
        width: 100% max-content;
        max-width: 100%;
        width: 100%;
    }
    .historical-fixed-note-wrapper {
        margin-bottom: 10px;
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
                <a class="btn btn-danger" href="reciepts.php?identity_card=<?php echo $user_id; ?>">חשבוניות</a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <?php
                $sql = "SELECT clients_car.*,  clients.first_name, clients.last_name, clients.phone, clients.email, clients.address FROM clients_car left join clients on clients_car.identity_card = clients.identity_card WHERE clients_car.identity_card = $user_id";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    echo ' <nav>
                        <div class="nav nav-tabs row" id="nav-tab" role="tablist">';
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '
                                <a class="nav-item nav-link" id="nav-' . $row['car_number'] . '-tab" data-toggle="tab" href="#nav-' . $row['car_number'] . '" role="tab" aria-controls="nav-' . $row['car_number'] . '" aria-selected="true">' . $row['car_number'] . '</a>';
                    }
                    echo '</div>
                        </nav>';
                } else {
                    echo '<p class="text-center">אין נתונים על משתמש זה נא פנו למנהל המערכת</p>
                    ';
                }
                $result->data_seek(0);
                if (mysqli_num_rows($result) > 0) {
                    echo ' <div class="tab-content row" id="nav-tabContent-clients" >';
                    while ($row = mysqli_fetch_assoc($result)) {
                        $sql_fixed = "SELECT * FROM `clients_fixes` WHERE `car_number` =" . "'" . $row['car_number'] . "'";
                        $fixes = mysqli_query($conn, $sql_fixed);
                        echo '
                        <div class="tab-pane fade" id="nav-' . $row['car_number'] . '" role="tabpanel" aria-labelledby="nav-' . $row['car_number'] . '">
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
                                                <input disabled type="text" class="form-control" value="' . $row['address'] . '">
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
                                <div class="col-md-5 col-12 mt-3">
                                    <h4 class="historical-fixses bg-dark text-white p-2 rounded text-center">היסטוריית תיקונים</h4>
                      ';

                        //fixes print
                        if (mysqli_num_rows($fixes) > 0) {
                            while ($fix = mysqli_fetch_assoc($fixes)) {
                                echo '
                                <div class="historical-fixed-note-wrapper text-center">
                                    <div class="card text-center">
                                        <div class="card-header">
                                            <div class="row">
                                                <div class="col-md-6 col-12">
                                                    <div class="d-flex flex-column text-right">
                                                        <span>נפתח ע״י: ' . $fix['openedBy'] . '</span>
                                                        <span>תאריך: ' . $fix['date'] . '</span>
                                                        <span>בשעה: ' . $fix['hour'] . '</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="d-flex flex-row justify-content-end text-left">
                                                        
                                                        <span>סטטוס תיקון: ';
                                                        if ($fix['status'] == 'open') {
                                                            echo 'בטיפול';
                                                        } elseif ($fix['status'] == 'closed') {
                                                            echo 'סגור';
                                                        }
                                                        echo '</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title">' . $fix['fixAbout'] . '</h5>
                                            <p class="card-text">' . $fix['fixDescription'] . '
                                            </p>
                                            <p class="card-text">
                                                <div class="row">
                                                    <div class="col-12 text-right">חלקים שהוחלפו</div>
                                                </div>
                                            </p>
                                        </div>
                                    </div>
                            </div>
                                ';
                            }
                            echo '<div class="load-moe mt-2 text-center">
                            <a class=" text-white btn btn-danger" data-toggle="modal" data-target="#addFixModal">הוסיפו תיקון</a>
                        </div>';
                        } else {
                            echo ' 
                            <div class="row">
                               <div class="col-12 text-center">
                                   <p class="text-center">אין נתונים על משתמש זה נא פנו למנהל המערכת</p>
                                   <a class=" text-white btn btn-danger" data-toggle="modal" data-target="#addFixModal">הוסיפו תיקון</a>
                               </div>
                            </div>
                        </div>
                            ';
                        }
                        echo '</div>
                        </div>
                    </div>
                    ';
                    }
                    echo '
                        </div>
                    ';
                }
                ?>
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
                <form method="post" id="addFixForm">
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="form-group text-right" id="aboutForm-wrapper">
                                <label for="fixAbout">מהות התקלה</label>
                                <textarea id="fixAbout" class="form-control" name="fixAbout" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-3 col-3">
                            <div class="fform-group text-right">
                                <label for="status">סטטוס</label>
                                <select id="status" class="form-control" name="status">
                                    <option value="open">בטיפול</option>
                                    <option value="closed">סגור</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="form-group text-right" id="descriptionForm-wrapper">
                                <label for="fixDescription">תיאור התקלה</label>
                                <textarea id="fixDescription" class="form-control" name="fixDescription" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="container-fluid" id="container-wrapper-for-add-newFields">
                            <div class="wrapper-for-add-newFields row">
                                <div class="col-lg-9 col-12">
                                    <div class="form-group text-right" id="partsChnage-wrapper">
                                        <label for="item0">חלקים שהוחלפו</label>
                                        <select name="item0" id="item0" class="custom-select" name="item0">
                                            <option value="">בחר מוצר</option>
                                            <?php
                                            $sql = "SELECT * FROM `inventory`";
                                            $result = mysqli_query($conn, $sql);

                                            if (mysqli_num_rows($result) > 0) {
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    echo "<option value='" . $row['id'] . "' >" . $row['name'] . "</option>";
                                                }
                                            } else {
                                                echo "0 results";
                                            } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-1 col-12">
                                    <div class="form-group text-right">
                                        <label for="example-number-input" class="">כמות</label>
                                        <input class="form-control text-center" name="quantity0" type="number" value="1" id="number-input">
                                    </div>
                                </div>

                            </div>
                            <div id="items-inputs">

                            </div>
                        </div>
                        <div class="col-12 text-center">
                            <div onclick="addItem()" class="btn btn-success" id="addNewItem">הוסיפו פריט <span><i class="fas fa-plus"></i></span></div>
                        </div>
                    </div>
                    <div>
                        <input id="addFix" class="btn btn-success" type="submit" name="addFix" value="הוסף תיקון">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include 'inc/footer/footer.php'; ?>

<script>
    $("div#nav-tab a:first").addClass("active");
    $("div#nav-tabContent-clients div:first").addClass("active");
    $("div#nav-tabContent-clients div:first").addClass("show");

    var itemsArray = [];
    var inputIndex = 0;

    $(document).ready(function() {
        $.ajax({
            type: "GET",
            url: "handle/getItems.php",
            success: function(result) {
                itemsArray = JSON.parse(result);
            }
        });
        
        $('#addFixForm').submit(function(e){
            e.preventDefault();

            var datastring = $("#addFixForm").serialize();
            datastring = datastring + "&car_number=" + $(".nav-item.active").html()+ "&itemsTotal="+(inputIndex+1);
            console.log(datastring);
            
            $.ajax({
                type: "post",
                url: "handle/addFix.php",
                data: datastring,
                success: function(response) {
                    Swal.fire(
                        'משתמש חדש נוצר!',
                        'אתם מועברים לדף לקוחות',
                        'success'
                    ).then(function() {
                        // window.location = "clients.php";
                    });
                }
            })
        })
    })

    function addItem() {
        inputIndex++
        $(".remove-button").remove()
        var html = `
            <div class="wrapper-for-add-newFields row input` + inputIndex + ` ">
                <div class="col-lg-9 col-12">
                    <div class="form-group text-right" id="partsChnage-wrapper">
                        <select name="item` + inputIndex + `" id="item` + inputIndex + `" class="custom-select">
                            <option value="">בחר מוצר</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-1 col-12">
                    <div class="form-group text-right">
                        <input class="form-control text-center" type="number" name="quantity` + inputIndex + `" value="1" min="1">
                    </div>
                </div>
                <div class="col-lg-1 col-12 remove-button">
                    <div class="form-group text-right">
                        <div class="btn btn-danger" style="font-weight: bold;" onclick="removeInput(` + inputIndex + `)">X</div> 
                    </div>
                </div>
            </div>
            `
        $("#items-inputs").append(html)
        itemsArray.forEach(function(element, i) {
            $("#item" + inputIndex)
                .append($("<option></option>")
                    .attr("value", element.id)
                    .text(element.name))
        })
    }

    function removeInput(id) {
        $(".input" + id).remove();
        inputIndex--
        $(".input" + inputIndex).append(`<div class="col-lg-1 col-12 remove-button">
                    <div class="form-group text-right">
                        <div class="btn btn-danger" style="font-weight: bold;" onclick="removeInput(` + inputIndex + `)">X</div> 
                    </div>
                </div>`)
    }
</script>