<?php
session_start();
// INCLUDE - includes php scripts
// config = DATABASE configorations
include 'config.php';
include 'inc/header/header-login.php';
 if(isset($_SESSION['user_id']) && $_SESSION['user_id'] ){
    header('location: index.php');
}
// login authrizication

 if( isset($_POST['submit']) ){
     // echo "string";
    $email = $_POST['email'];

    $password = $_POST['password'];
    $sql = 'SELECT * FROM `workers` WHERE `email` = "'.$email.'"';
    $result = mysqli_query($conn, $sql);
    // echo mysqli_num_rows($result);
    if ($result) {
      if (mysqli_num_rows($result) > 0) {
        // GETTING ASSOCAITIVE ARRAY FROM DB
          while ($row = mysqli_fetch_assoc($result)) {
            if( $password == $row['password']){
                $_SESSION['user_id'] = $row['identity_card'];
                $_SESSION['fullName'] = $row['fullName'];
                $_SESSION['admin'] = $row['admin'];
                header('location: index.php');
            }else{
                $error = 'שגיאה! אנא מלאו פרטים מלאים';
            }
          }
      } else {

          // echo 'cant get query';
          $error = 'שגיאה! אנא מלאו פרטים מלאים';
      }
    }
}
?>

<style>
    .login-page#login-wrapper .row .col-12 form .form-group label {
        color: #000;
        font-size: 16px;
        font-weight: 400;
    }

div#login-wrapper .row {
    margin: 0;
}
</style>
<div class="container-fluid login-page" id="login-wrapper" style="background-image: url('asset/images/back.jpg')">
<div class="row">
    <div class="col-12 text-center text-white">
        <h1>ברוכים הבאים</h1>

       <h5>Drive2Success </h5>
    </div>
</div>
    <div class="row">
        <div class="col-12">
            <div class="container">
                <div class="row">
                    <div class="col-12 pt-5 pb-5">
                        <form method="post" action="">
                            <div class="form-group">

                                <label for="userName">אימייל:</label>
                                <div class="input-group mt-2" style="direction: ltr;">

                                    <input id="userName" type="text" class="form-control" name="email">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fas fa-user-lock"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="userName">סיסמה:</label>
                                <div class="input-group mt-2" style="direction: ltr;">

                                    <input id="password" type="password" class="form-control" name="password">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="התחבר" name="submit" class="btn btn-primary" style="width: 100%;">
                            </div>
                        </form>
                        <div class="error" class="text-center">
                            <p class="text-danger text-center"><?php echo isset($error) ? $error : '';?></p>
                        </div>
                        <div class="row">
                            <div class="col-12 text-center">
                                <a href="forgotPassword.php" class="text-success ">שכחת סיסמה?</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'inc/footer/footer.php'; ?>
