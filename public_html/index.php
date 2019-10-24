 <?php
	// SESSION START - TO ACTIVATE USING SESSIONS
	session_start();
	// COOCKIES - CLIENT
	// SESSION - server
	if (!$_SESSION['user_id']) {
		// echo $_SESSION['user_id'];
		header('location: login.php');
		die;
	} else {
		// echo $_SESSION['user_id'];
	}
	include 'config.php';
	include 'inc/header/header.php';

	?>

 <!-- Main Start -->
 <main class="page-content">
 	<div class="container-fluid">
 		<div class="row" id="page-title">
 			<div class="col-12">
 				<h1>לוח בקרה</h1>
 			</div>
 		</div>
 	</div>
 	<div class="container-fluid">
 		<div class="row">
 			<div class="col-lg-3 col-12">
 				<div class="box-part text-center">
 					<a href="papers.php">
 						<i class="far fa-file-alt"></i>
 						<div class="title">
 							<h4>דוחות</h4>
 						</div>
 					</a>
 				</div>
 			</div>
 			<div class="col-lg-3 col-12">
 				<div class="box-part text-center">
 					<a href="clients.php">
 						<i class="fas fa-users"></i>
 						<div class="title">
 							<h4>לקוחות</h4>
 						</div>
 					</a>
 				</div>
 			</div>
 			<div class="col-lg-3 col-12">
 				<div class="box-part text-center">
 					<a href="inventory.php">
 						<i class="fas fa-dolly-flatbed"></i>
 						<div class="title">
 							<h4>מלאי</h4>
 						</div>
 					</a>
 				</div>
 			</div>
 			<div class="col-lg-3 col-12">
 				<div class="box-part text-center">
 					<a href="employee.php">
 						<i class="fas fa-people-carry"></i>
 						<div class="title">
 							<h4>עובדים</h4>
 						</div>
 					</a>
 				</div>
 			</div>
 		</div>
 	</div>
 </main>

 <!-- Main End -->

 <?php include 'inc/footer/footer.php' ?>