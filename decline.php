<?php 
 include 'connect.php';


// decline.php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["appointmentId"])) {
    $appointmentId = $_POST["appointmentId"];
    // Perform the update operation
    $updateQuery = "UPDATE tblappointments SET status = 'Decline' WHERE appointmentId = '$appointmentId'";
    $result = mysqli_query($connection, $updateQuery);
    if ($result) {
        echo json_encode(array("status" => "success"));
    } else {
        echo json_encode(array("status" => "error", "message" => "Failed to decline appointment."));
    }
    exit(); // Stop further execution
}


?>