<?php
include '../config.php';


// handle for add new client

$name = $_POST['firstName'];
$lastName = $_POST['lastName'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$identity = $_POST['identity'];
$address = $_POST['address'];
$carNumber = $_POST['carNumber'];
$manufacture = $_POST['manufacture'];
$model = $_POST['model'];
$engine = $_POST['engine'];
$color = $_POST['color'];
$chassie = $_POST['chassie'];
$lastTreatment = $_POST['lastTreatment'];
$nextTreatment = $_POST['nextTreatment'];


                    $sql = "INSERT INTO clients_car(first_name, last_name, phone, email, identity_card, adress, car_number, manufacturer, model, engine, color,chassis_number, last_treatment, next_treatment) VALUES ('$name', '$lastName', '$phone', '$email','$identity','$address','$carNumber','$manufacture','$model','$engine','$color','$chassie','$lastTreatment','$nextTreatment' )";

                    
                    if ($conn->query($sql) === TRUE) {
                        echo "New record created successfully";
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                    
                    $sql = "INSERT INTO clients(first_name, last_name, phone, email, identity_card, adress, car_number, manufacturer, model, engine, color,chassis_number, last_treatment, next_treatment) VALUES ('$name', '$lastName', '$phone', '$email','$identity','$address','$carNumber','$manufacture','$model','$engine','$color','$chassie','$lastTreatment','$nextTreatment' )";

                    if ($conn->query($sql) === TRUE) {
                        echo "New record created successfully";
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }  
?>
