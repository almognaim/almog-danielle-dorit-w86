<?php
session_start();
if( !$_SESSION['user_id'] ){
    header('location: login.php');
}
include 'config.php';

$target_dir = "uploads/";
$user_id = $_GET['user_id'];

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {

    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if(empty($check)){
        echo 'this is emptyyyyy';
    }
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
         $sql = "INSERT INTO emploeyee_doc(identity_card,url_file) VALUES('$user_id','$target_file')";
        mysqli_query($conn, $sql);
        header('Location: https://daniellebn.mtacloud.co.il/emploeyeeFiles.php?user_id='.$user_id.'');
exit;
    } else {
        $error =  "Sorry, there was an error uploading your file.";
        header('Location: https://daniellebn.mtacloud.co.il/emploeyeeFiles.php?user_id='.$user_id.'');
    }
}

