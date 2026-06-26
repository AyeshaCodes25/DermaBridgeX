<?php

/* ================= DATABASE CONNECTION ================= */

$conn = mysqli_connect("localhost","root","","dermabridgex");

if(!$conn){
    die("Connection Failed : " . mysqli_connect_error());
}

/* ================= INSERT FEEDBACK ================= */

if(isset($_POST['submit_feedback'])){

    $name       = mysqli_real_escape_string($conn, $_POST['name']);
    $email      = mysqli_real_escape_string($conn, $_POST['email']);
    $visit      = mysqli_real_escape_string($conn, $_POST['visit_type']);
    $overall    = mysqli_real_escape_string($conn, $_POST['overall']);
    $doctor     = mysqli_real_escape_string($conn, $_POST['doctor']);
    $message    = mysqli_real_escape_string($conn, $_POST['message']);

    $query = "INSERT INTO patientfeedback
    (Name, Email, Visit, Overall_rating, Doctor_rating, Feedback_message)

    VALUES

    ('$name','$email','$visit','$overall','$doctor','$message')";

    $run = mysqli_query($conn,$query);

    if($run){
        echo "<script>alert('Feedback Submitted Successfully');</script>";
    }
    else{
        echo "Error : " . mysqli_error($conn);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Patient Feedback</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<link rel="stylesheet" href="CSS/feedback.css">

</head>

<body>

<!-- ================= NAVBAR ================= -->

<nav class="navbar navbar-expand-lg fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand me-auto" href="index.php">
    <img src="Images/logo3.png" alt="DermaBridgeX Logo" height="50">
</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Logo</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-center flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link mx-lg-2" href="about.php">Our Story</a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link mx-lg-2" href="blogs.php">Insights</a>
          </li>
          <li class="nav-item">
            <a class="nav-link mx-lg-2" href="appointment.php">My Appointments</a>
          </li>
          <li class="nav-item">
            <a class="nav-link mx-lg-2" href="feedback.php">Feedback</a>
          </li>
            </ul>
      </div>
    </div>

   <a href="signup.php" class="Signup-button" >Get Started</a>
  <button class="navbar-toggler pe-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
  <a href="login.php" class="login-button" >Login</a>
  <button class="navbar-toggler pe-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    </div>
</nav>


<!-- ================= FEEDBACK FORM ================= -->

<div class="feedback-container">

<h1>Patient Feedback</h1>

<form method="POST">

<label>Full Name</label>
<input type="text" name="name" required>

<label>Email</label>
<input type="email" name="email" required>

<label>Visit Type</label>

<select name="visit_type" required>

<option value="Online Consultation">Online Consultation</option>

<option value="In-Clinic Appointment">In-Clinic Appointment</option>

<option value="Website Experience">Website Experience</option>

</select>

<label>Overall Experience</label>

<select name="overall" required>

<option value="Excellent">Excellent</option>

<option value="Good">Good</option>

<option value="Average">Average</option>

<option value="Poor">Poor</option>

<option value="Very Poor">Very Poor</option>

</select>

<label>Doctor Communication</label>

<select name="doctor" required>

<option value="Excellent">Excellent</option>

<option value="Good">Good</option>

<option value="Average">Average</option>

<option value="Poor">Poor</option>

<option value="Very Poor">Very Poor</option>

</select>

<label>Your Feedback</label>

<textarea name="message" rows="5" required></textarea>

<button type="submit" name="submit_feedback">
Submit Feedback
</button>

</form>

</div>

<!-- ================= FOOTER ================= -->

<footer class="footer">

    <div class="footer-container">

        <!-- Left -->
        <div class="footer-left">
            <h2>Get in Touch</h2>
            <p>derma@email.com</p>
            <p>+1 (123) 111 22 00</p>
            <p>+1 (123) 333 44 01</p>
        </div>

        <!-- Center -->
        <div class="footer-center">
            <img src="images/logo3.png" alt="Clinic Logo" class="footer-logo">
            <p class="footer-text">
                DermaBridgeX where healthy skin meets lasting radiance.
            </p>

            <div class="social-icons">
                <i class="fab fa-facebook-f"></i>
                <i class="fab fa-instagram"></i>
                <i class="fab fa-twitter"></i>
                <i class="fab fa-youtube"></i>
            </div>
        </div>

        <!-- Right -->
        <div class="footer-right">
            <h2>Information</h2>
            <ul>
        <li><a href="about.php">Our Story</a></li>
        <li><a href="blogs.php">Insights</a></li>
        <li><a href="appointment.php">My Appointments</a></li>
        <li><a href="feedback.php">Feedback</a></li>
            </ul>
        </div>

    </div>

</footer>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>