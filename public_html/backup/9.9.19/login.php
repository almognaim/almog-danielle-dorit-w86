<?php include 'inc/header/header-login.php'; ?>

<div class="container-fluid login-page" id="login-wrapper" style="background-image: url('asset/images/back.jpg')">
    <div class="row">
        <div class="col-12">
            <div class="container">
                <div class="row">
                    <div class="col-12 p-5">
                        <form method="get" action="">
                            <div class="form-group">
                                <label for="user-name">שם משתמש :</label>
                                <input id="user-name" class="form-control" type="email" name="user-name">
                            </div>
                            <div class="form-group">
                                <label for="password">סיסמה :</label>
                                <input id="password" class="form-control" type="password" name="password">
                            </div>
                            <div class="form-group">
                                <input type="submit" value="התחבר" class="btn btn-primary" style="width: 100%;">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'inc/footer/footer.php'; ?>