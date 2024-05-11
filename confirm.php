<?php 
 include 'connect.php';

// confirm.php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["appointmentId"])) {
    $appointmentId = $_POST["appointmentId"];
    // Perform the update operation
    $updateQuery = "UPDATE tblappointments SET status = 'Confirmed' WHERE appointmentId = '$appointmentId'";
    $result = mysqli_query($connection, $updateQuery);
    if ($result) {
        echo json_encode(array("status" => "success"));
    } else {
        echo json_encode(array("status" => "error", "message" => "Failed to confirm appointment."));
    }
    exit(); // Stop further execution
}



?>