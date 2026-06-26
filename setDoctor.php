<?php
session_start();

if(isset($_GET['doctor'])){

    $_SESSION['doctor'] = $_GET['doctor'];

    // Redirect directly to signup/login
    header("Location: Signup.php");
    exit();
}
?>