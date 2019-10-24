<!DOCTYPE html>
<html lang="he">
<?php $serverBase = $_SERVER['HTTP_HOST']; ?>
<?php include 'head.php'; ?>

<body>
    <!-- wrapper -->
    <div class="page-wrapper chiller-theme toggled">
        <!-- header -->
        <header>
            <!-- btn close/open -->
            <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
                <i class="fas fa-bars"></i>
            </a>
            <!-- btn close/open end -->
            <!-- top navbar -->
            <nav class="navbar navbar-expand-lg navbar-light bg-light" id="first-navbar">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="img-thumbnail rounded-circle" src="https://daniellebn.mtacloud.co.il/asset/images/person.jpg" alt="" style="width: 60px;">
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="logout.php">יציאה
                                <i class="fa fa-power-off"></i>
                            </a>
                        </div>
                    </li>
                </ul>

            </nav>
            <!-- top navbar end -->

            <!-- left sidebar -->
            <nav id="sidebar" class="sidebar-wrapper">
                <div class="sidebar-content">
                    <div class="sidebar-brand">
                        <div id="close-sidebar">
                            <i class="fas fa-times"></i>
                        </div>
                        <a class="text-right" href="index.php">Drive2Success</a>

                    </div>
                    <div class="sidebar-header">
                        <div class="user-pic">
                            <img class="img-thumbnail rounded-circle" src="https://daniellebn.mtacloud.co.il/asset/images/person.jpg" alt="">
                        </div>
                        <div class="user-info">
                            <span class="user-name"><span style="display: block;">שלום,</span>

                                <strong><?php echo $_SESSION['fullName'] ?></strong>
                            </span>
                            <span class="user-role">
                                <?php
                                if ($_SESSION['admin'] == 1) {
                                    echo 'מנהל/אדמין';
                                } else {
                                    echo 'עובד';
                                }
                                ?>
                            </span>
                            <span id="timestamp_2"></span>
                            <span id="current-date"></span>
                        </div>

                    </div>

                    <div class="sidebar-menu">
                        <ul>
                            <li class="sidebar-dropdown">
                                <a href="index.php">
                                    <i class="fa fa-tachometer-alt"></i>
                                    <span>לוח בקרה</span>

                                </a>
                            </li>
                            <li class="sidebar-dropdown">
                                <a href="papers.php">
                                    <i class="far fa-file-alt"></i>
                                    <span>דוחות</span>

                                </a>
                            </li>
                            <li class="sidebar-dropdown">
                                <a href="clients.php">
                                    <i class="fas fa-users"></i>
                                    <span>לקוחות</span>

                                </a>
                            </li>
                            <li class="sidebar-dropdown">
                                <a href="inventory.php">
                                    <i class="fas fa-dolly-flatbed"></i>
                                    <span>מלאי</span>

                                </a>
                            </li>
                            <?php
                                if ($_SESSION['admin'] == 1) {
                                    echo '
                                    <li class="sidebar-dropdown">
                                        <a href="employee.php">
                                            <i class="fas fa-people-carry"></i>
                                            <span>עובדים</span>
        
                                        </a>
                                    </li>';
                                } else {
                                    // echo 'עובד';
                                }
                            ?>

                            
                        </ul>
                    </div>
                    <!-- sidebar-menu  -->
                </div>
                <!-- sidebar-content  -->
                <div class="sidebar-footer">
                    <a href="logout.php">
                        <i class="fa fa-power-off"></i>
                    </a>
                </div>
            </nav>
            <!-- left sidebar end -->

        </header>

        <!-- header end -->