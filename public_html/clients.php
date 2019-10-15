<?php
session_start();
include 'config.php';
include 'inc/header/header.php'; 
?>


<!-- Main Start -->

<main class="page-content">
    <div class="container-fluid">
        <div class="row" id="page-title">
            <div class="col-12">
                <h1>לקוחות</h1>
            </div>
        </div>
        <div class="row" id="newclientBtn">
            <div class="col-12">
                <a class="btn btn-danger" href="newClient.php">לקוח חדש</a>
            </div>
        </div>
        <div class="row" id="clients-wrap">

            <table class="table text-center" id="clients">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">שם פרטי</th>
                        <th scope="col">שם משפחה</th>
                        <th scope="col">תעודת זהות</th>
                        <th scope="col">אימייל</th>
                        <th scope="col">טלפון</th>
                        <th scope="col">כתובת</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT first_name, last_name,email,phone, identity_card, address FROM clients";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        // output data of each row
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr><th scope='row'>" . $row['first_name'] . "</th><td>" . $row['last_name'] . "</td><td id='identity_card'>" . $row['identity_card'] . "</td><td>" . $row['email'] . "</td>
                                <td>" . $row['phone'] . "</td>
                                <td>" . $row['address'] . "</td></tr>";
                        }
                    } else {
                        echo "0 results";
                    } ?>
              
                </tbody>
            </table>


        </div>
    </div>

</main>

<!-- Main End -->

<?php include 'inc/footer/footer.php'; ?>
<script>
    $('#clients tr').click(function(){
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
        


    });
        
</script>