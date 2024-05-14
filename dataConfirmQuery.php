<?php

include 'connect.php';

if(isset($_POST['btnSave'])){
    // Retrieve form values
    $txtdate = mysqli_real_escape_string($connection, $_POST['booking-date']); 
    $txttime = mysqli_real_escape_string($connection, $_POST['booking-time']); 
    $txtservice = mysqli_real_escape_string($connection, $_POST['coaching-service']); 
    $appointmentId = mysqli_real_escape_string($connection, $_POST['appointmentId']);


    
    $myquery = "UPDATE tblappointments SET dates = '$txtdate', timee = '$txttime', services = '$txtservice', status = 'Pending' WHERE appointmentId = '$appointmentId'";
  
    
    $myresult = mysqli_query($connection, $myquery); 
  
    
    if($myresult){
        echo json_encode(array("status" => "success"));
    } else {
        echo json_encode(array("status" => "error", "message" => "Failed to update appointment."));
    }
    exit(); 
}

?>
