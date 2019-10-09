<?php
session_start();
if( !$_SESSION['user_id'] ){
    header('location: login.php');
}
include 'config.php';
include 'inc/header/header.php'; ?>

<style>
    .col-12.btn-wrapper {
        display: flex;
        justify-content: space-between;
    }
    main#addEmployee div#newclientBtn {
    padding-top: 0;
    padding-bottom: 0;
}
</style>

<!-- Main Start -->

<main class="page-content" id="addEmployee">
    <div class="container-fluid">
        <div class="row" id="page-title">
            <div class="col-12">
                <h1>עובדים</h1>
            </div>
        </div>
    </div>

    <div class="row" id="newclientBtn">
        <div class="col-12 btn-wrapper">
            <a class=" text-white btn btn-warning" href="clock.php?user_id=<?php echo $_SESSION['user_id'];?>"> שעון נוכחות <i class="fas fa-user-clock"></i></a>
            <a class="text-white btn btn-success" href="addEmployee.php"> הוסף עובד <span><i class="fas fa-plus"></i></span></a>

        </div>
    </div>
    <div class="row" id="clients-wrap">

        <table class="table text-center" id="clients">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">שם עובד</th>
                    <th scope="col">ת.זהות</th>
                    <th scope="col">ותק</th>
                    <th scope="col">טלפון</th>
                    <th scope="col">קבצים מצורפים</th>
                </tr>
            </thead>

            <tbody>

                <?php

                $sql = "SELECT fullName, phone , identity_card, seniority FROM `workers`";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {

                    // output data of each row

                    while ($row = mysqli_fetch_assoc($result)) {

                        echo "<tr><th scope='row'>" . $row['fullName'] . "</th><td>" . $row['identity_card'] . "</td>
                        <td>" . $row['seniority'] . "</td>
                        <td>" . $row['phone'] . "</td>
                        <td><a class='bg-dark p-2 text-white rounded' href='emploeyeeFiles.php?user_id=" . $row['identity_card'] . "'>חוזי העסקה <i class='fas fa-arrow-left'></i></a></td>
                        </tr>";

                    }
                } else {

                    echo "0 results";

                } 
                
                ?>

            </tbody>
        </table>


    </div>
</main>

<!-- Main End -->

<?php include 'inc/footer/footer.php'; ?>