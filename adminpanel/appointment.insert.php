<?php
include("connection.php");

$patient = $_POST['patient'];
$doctor  = $_POST['doctor'];
$date    = $_POST['date'];
$time    = $_POST['time'];
$status  = $_POST['status'];

$q = "INSERT INTO appointment (Patient, Doctor, Date, Time, Status)
      VALUES ('$patient', '$doctor', '$date', '$time', '$status')";

$result=mysqli_query($conn,$q);
if($result == true){
    header("location:appointment.php");
}
?>