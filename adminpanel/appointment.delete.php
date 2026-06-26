<?php
include("connection.php");

$id = $_GET['id'];

$sql = "DELETE FROM appointment WHERE Appointment_ID='$id'";

$result = mysqli_query($conn,$sql);

if(!$result){
    die(mysqli_error($conn));
}
else{
    header("Location: appointment.php");
    exit();
}
?>