<?php
session_start();
if (!$_SESSION['user_id']) {
  header('location: login.php');
}
include 'inc/header/header.php'; ?>

<!-- Main Start -->

<main class="page-content" id="inventory">
  <div class="container-fluid">
    <div class="row" id="page-title">
      <div class="col-12">
        <h1>מלאי</h1>
      </div>
    </div>
    <div class="container" style="max-width: 900px;">
      <div class="row">
        <div class="col-md-6 col-12">
          <div class="box-part text-center">
            <a href="inventory/suppliers.php">
              <i class="far fa-file-alt"></i>

              <div class="title">
                <h4>רשימת ספקים</h4>
              </div>
            </a>
          </div>
        </div>
        <div class="col-md-6 col-12">
          <div class="box-part text-center">
            <a href="newOrder.php">
              <i class="fas fa-users"></i>
              <div class="title">
                <h4>הזמנה חדשה</h4>
              </div>
            </a>
          </div>
        </div>
        <div class="col-md-6 col-12">
          <div class="box-part text-center">
            <a href="inventory-list.php">
              <i class="fas fa-dolly-flatbed"></i>
              <div class="title">
                <h4>רשימת מלאי</h4>
              </div>
            </a>
          </div>
        </div>
        <div class="col-md-6 col-12">
          <div class="box-part text-center">
            <a href="orders.php">
              <i class="fas fa-people-carry"></i>
              <div class="title">
                <h4>קליטת סחורה</h4>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
<!-- Main End -->

<?php include 'inc/footer/footer.php'; ?>