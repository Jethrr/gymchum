<?php

include 'connect.php';


if(isset($_POST['btnDelete'])){
    $firstname = $_POST['firstname'];
    // Perform the delete operation
    $myquery = "UPDATE tblappointments SET status = 'Cancelled' WHERE appointmentId = '$firstname'"; 
    $myresult = mysqli_query($connection,$myquery); 

    if($myresult){
        echo json_encode(array("status" => "success"));
    } else {
        echo json_encode(array("status" => "error", "message" => "Failed to delete appointment."));
    }
    exit(); 
}



?>