<?php
include("connection.php");



    $name = $_POST["name"];
    $email = $_POST["email"];
    $spec = $_POST["spec"];
    $phone = $_POST["phone"];

    $q = "INSERT INTO doctor (name, email, specialization, phone)
          VALUES('$name','$email','$spec','$phone')";

    $result = mysqli_query($conn, $q);

    if($result == true){
        header("location:doctor.php");
    }

?>