<?php
include("connection.php");

$id = $_GET['id'];

$sql = "DELETE FROM doctor WHERE Doctor_id='$id'";

$result = mysqli_query($conn,$sql);

if(!$result){
    die(mysqli_error($conn));
}
else{
    header("Location: doctor.php");
    exit();
}
?>