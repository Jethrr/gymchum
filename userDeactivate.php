<?php
include 'connect.php';

if(isset($_POST['deactivate'])){
    $currentUser = $_POST['userId']; 

    $deactUser = "UPDATE `tbluserprofile` SET status = 'Inactive' WHERE userId = '$currentUser'";
    $deactQuery = mysqli_query($connection, $deactUser);

    if($deactQuery){
        echo json_encode(array("status" => "success"));
    } else {
        echo json_encode(array("status" => "error", "message" => "Failed to deactivate account."));
    }
    exit(); 
}
?>
