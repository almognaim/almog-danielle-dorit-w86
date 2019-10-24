<?php
session_start();
if( !$_SESSION['user_id'] ){
    header('location: login.php');
}
include 'config.php';
include 'inc/header/header.php';
$user_id = $_GET['user_id'];
?>
<main class="page-content">
    <div class="container-fluid">
        <div class="row" id="page-title">
            <div class="col-12">
                <h1>חוזי העסקה</h1>
            </div>
        </div>
    </div>
    <div class="container-fluid">
    <div class="row border-bottom pb-3">
                <div class="col-12">
                    <a href="employee.php" class="btn btn-primary">חזרה לרשימת העובדים <span><i class="fas fa-arrow-left"></i></span></a>
                </div>
            </div>
    <div class="row">
         <div class="col-12">
                <form class="bg-danger text-center text-white  p-3" action="upload.php?user_id=<?php echo $user_id; ?>" method="post" enctype="multipart/form-data">
                    <label class="d-block text-center text-white" for="">בחרו חוזה העסקה לעלות</label>
                    <input type="file" name="fileToUpload" id="fileToUpload">
                    <input type="submit" value="Upload Image" name="submit">
                </form>
            </div>
    </div>
        <div class="row mt-3">
            <?php
            $sql = "SELECT url_file FROM emploeyee_doc WHERE identity_card = '$user_id'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="col-md-3 col-6" id="documentImage">
                    <a href="' . $row['url_file'] . '" data-toggle="lightbox"
                     data-gallery="example-gallery">
                     <img src="' . $row['url_file'] . '" class="img-fluid">
                            </a>
                          </div>';
                }
            } else {
                echo "0 results";
            }
            ?>
        </div>
    </div>
</main>
<?php include 'inc/footer/footer.php' ?>
<script>
    // lightBox for files to open
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
        event.preventDefault();
        $(this).ekkoLightbox();

    });

$(document).ready(function(){
    $("#documentImage").hover(function(){
  $(this).css("background-color", "yellow");
  }, function(){
  $(this).css("background-color", "pink");
});
})

</script>