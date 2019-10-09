
<?php
session_start();
if( !$_SESSION['user_id'] ){
    header('location: login.php');
}
include 'inc/header/header.php' ?>
<style>

main#page-content-papers .container .row .col-md-6.col-12 {height: 100%;}

main#page-content-papers .container .row .col-md-6.col-12 .box-part.text-center {
    background: #dc3545;
    padding: 150px 20px;
    color: #fff;
}

main#page-content-papers .container .row .col-md-6.col-12 .box-part.text-center a i {
    font-size: 50px;
}
main#page-content-papers .container .row .col-md-6.col-12 .box-part.text-center a .title h4 {
    font-size: 35px;
    padding: 10px 0;
    
}

main#page-content-papers .container .row .col-md-6.col-12 .box-part.text-center:hover {
    background: #fff;
    transition: all .3s ease;
    cursor: pointer;
    color: #000;
}

main#page-content-papers .container .row .col-md-6.col-12 .box-part.text-center:hover a {
    color: #000;
}
</style>
<!-- Main Start -->

<main class="page-content" id="page-content-papers">
    <div class="container-fluid">
        <div class="row" id="page-title">
            <div class="col-12">
                <h1>דוחות ומסמכים</h1>
            </div>
        </div>
    </div>
    <div class="container" style="max-width: 900px;">
        <div class="row">

            <div class="col-md-6 col-12">


                <div class="box-part text-center">
                    <a href="documents.php">
                        <i class="far fa-file-alt"></i>

                        <div class="title">
                            <h4>דוחות</h4>
                        </div>

                        <div class="text">
                          
                        </div>

                        <a href="#">Learn More</a>
                    </a>
                </div>

            </div>

            <div class="col-md-6 col-12">



                <div class="box-part text-center">
                    <a href="clients.php">
                        <i class="fas fa-users"></i>

                        <div class="title">
                            <h4>חשבוניות </h4>
                        </div>

                        <div class="text">
                           
                        </div>

                        <a href="#">Learn More</a>
                    </a>
                </div>

            </div>



        </div>
    </div>

</main>

<!-- Main End -->

<?php include 'inc/footer/footer.php' ?>