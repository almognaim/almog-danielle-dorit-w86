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
                <h1>דו"ח טיפולים</h1>
            </div>
        </div>
        <div class="row" id="clients-wrap">
            <table class="table text-center" id="clients">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">נפתח ע"י</th>
                        <th scope="col">תאריך</th>
                        <th scope="col">מספר רכב</th>
                        <th scope="col">שם</th>
                        <th scope="col">תיאור</th>
                        <th scope="col">סטטוס</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "select * from clients_fixes";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $fix = "<tr><th scope='row'>" . $row['openedBy'] . "</th><td>" . $row['date'] . "</td><td>" . $row['car_number'] . "</td><td>" . $row['fixAbout'] . "</td>
                                <td>" . $row['fixDescription'] . "</td> <td class='status".$row['id']."'>";
                                if ($row['status'] == 'paid') {
                                    $fix = $fix . '<a class="bg-dark p-2 text-white rounded" onclick="payFix('. $row['id'] .')">צפה</a></td></tr>';
                                } elseif($row['status'] == 'open') {
                                    $fix = $fix . '<a class="bg-dark p-2 text-white rounded" onclick="closeFix('. $row['id'] .')">סגור</a></td></tr>';
                                }else {
                                    $fix = $fix . '<a class="bg-dark p-2 text-white rounded" onclick="payFix('. $row['id'] .')">שלם</a></td></tr>';
                                }
                                
                            echo $fix; 
                        }
                    } else {
                        echo "0 results";
                    } ?>

                </tbody>
            </table>
        </div>
    </div>
    <script>
        function closeFix (id) {
            $.ajax({
                type: "post",
                url: "handle/closeFix.php",
                data: "id="+id,
                success: function(response) {
                    console.log(response);
                    
                    Swal.fire(
                        'תיקון עודכן!',
                        'ניתן לשלם',
                        'success'
                    ).then(function() {
                        var html = '<a class="bg-dark p-2 text-white rounded" onclick="payFix('+id+')">שלם</a>'
                        $(".status"+id).html(html);
                    });
                }
            });        
        }
        function payFix (id) {
            location.href = 'fix.php?id='+id;
        }
    </script>
</main>
 
<?php include 'inc/footer/footer.php'; ?>