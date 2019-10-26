<?php
session_start();
if( !$_SESSION['user_id'] ){
    header('location: login.php');
}
include 'config.php';
include 'inc/header/header.php'; ?>
<main class="page-content">
    <div class="container-fluid">
        <div class="row" id="page-title">
            <div class="col-12">
                <h1>טבלת נוכחות</h1>
            </div>
        </div>
        <div class="row" id="newclientBtn">
            <div class="col-12">
                <a class="btn btn-danger" href="newClient.php">לקוח חדש</a>
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
                    <th scope="col">כניסה</th>
                    <th scope="col">יציאה</th>
                    <th scope="col">זמן סה"כ</th>
                </tr>
            </thead>

            <tbody>

                <?php

                $sql = "SELECT fullName, loginHour, logoutHour, TIMESTAMPDIFF(minute, loginHour, logoutHour) as diff FROM clock where logoutHour  IS NOT NULL";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {

                    // output data of each row

                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr><th scope='row'>" . $row['fullName'] . "</th><td>" . $row['loginHour'] . "</td>
                        <td>" . $row['logoutHour'] . "</td><td>" .intdiv($row['diff'], 60).":". ($row['diff'] % 60) . "</td>
                        
                        </tr>";

                    }
                } else {

                    echo "0 results";

                } 
                
                ?>

            </tbody>
        </table>


    </div>
  
    </div>
</main>
<?php include 'inc/footer/footer.php'; ?>
<script>
 /*    $('#clients tr').click(function(){
        var identity_card = $( this ).find( '#identity_card' ).text();
        var data = identity_card;
        $.ajax({
            type: "GET",
            url: "client.php",
            data: data,
            success: function (response) {
                location.href = 'client.php?identity_card='+identity_card;
            }
        });
    });  */
</script>