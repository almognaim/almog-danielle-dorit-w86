<?php
session_start();
if( !$_SESSION['user_id'] ){
    header('location: login.php');
}
include 'inc/header/header.php';
?>
<main class="page-content" id="page-content-papers">
    <div class="container-fluid">
        <div class="row" id="page-title">
            <div class="col-12">
                <h1>דוחות ומסמכים</h1>
            </div>
        </div>
    </div>
    <div class="container-fluid">
    </div>
</main>
<?php include 'inc/footer/footer.php' ?>