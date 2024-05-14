<?php
session_start();
include 'connect.php';

if(isset($_POST['update'])) {
    $currentUser = $_POST['userId']; 
    $firstname = mysqli_real_escape_string($connection, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($connection, $_POST['lastname']);
    $gender = mysqli_real_escape_string($connection, $_POST['gender']);

    $updateUser = "UPDATE `tbluserprofile` SET firstname = '$firstname', lastname = '$lastname', gender = '$gender' WHERE userId = '$currentUser'";
    $updateQuery = mysqli_query($connection, $updateUser);

    if($updateQuery){
        echo json_encode(array("status" => "success"));
    } else {
        echo json_encode(array("status" => "error", "message" => "Failed to update user information."));
    }
    exit(); 
}
?>
