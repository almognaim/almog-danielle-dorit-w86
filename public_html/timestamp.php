<?php
session_start();
if( !$_SESSION['user_id'] ){
    header('location: login.php');
}
  date_default_timezone_set('YOUR TIMEZONE');
  echo $timestamp = date('H:i:s');