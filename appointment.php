<?php
$conn = mysqli_connect("localhost","root","","dermabridgex");
if(!$conn){ die("Connection Failed"); }

/* CANCEL APPOINTMENT */
if(isset($_GET['cancel'])){
    $id = $_GET['cancel'];

    mysqli_query($conn,"DELETE FROM book_appointment 
    WHERE `book-appointment_ID`='$id'");

    header("Location: appointment.php");
    exit();
}

/* FETCH */
$result = mysqli_query($conn,"SELECT * FROM book_appointment ORDER BY `book-appointment_ID` DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Appointments</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="CSS/appointment.css">
</head>
<body>


<!-- NAVBAR -->
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
<div id="notification" class="floating-notification">

    <div class="notify-icon">🔔</div>

    <div class="notify-content">
        <h4>Appointment Reminder</h4>
        <p>Check your appointments regularly so you don't miss any consultation.</p>
    </div>

    <span class="close-btn" onclick="closeNotification()">✕</span>

</div>
<!-- HEADER -->
<div class="header">
    <h1>My Appointment Dashboard</h1>
    <p>Manage your dermatology consultations easily</p>
</div>

<!-- APPOINTMENTS -->
<div class="container">

<?php while($row = mysqli_fetch_assoc($result)) { ?>

<?php
$status = $row['appointment_type'];

if($status == "physical"){
    $class = "confirmed";
    $text = "Confirmed";
}
elseif($status == "rejected"){
    $class = "rejected";
    $text = "Rejected";
}
else{
    $class = "pending";
    $text = "Pending";
}
?>

<div class="card">

<h3><?php echo $row['Doctor']; ?></h3>

<p><b>Name:</b> <?php echo $row['Full_Name']; ?></p>
<p><b>Date:</b> <?php echo date ("d/m/y" , strtotime($row['appointment_date'])); ?></p>
<p><b>Time:</b> <?php echo $row['appointment_time']; ?></p>

<span class="status <?php echo $class; ?>">
<?php echo $text; ?>
</span>

<br>

<a class="cancel"
href="?cancel=<?php echo $row['book-appointment_ID']; ?>"
onclick="return confirm('Cancel appointment?')">
Cancel
</a>

</div>

<?php } ?>

</div>
<!-- FOOTER -->
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

<script>

function closeNotification(){

    let box = document.getElementById("notification");

    box.style.transition = "0.5s";
    box.style.opacity = "0";
    box.style.transform = "translateX(100%)";

    setTimeout(()=>{
        box.style.display = "none";
    },500);
}

/* Notification 20 seconds tak screen par rahegi */
setTimeout(()=>{
    closeNotification();
},20000);

function openModal(id){
document.getElementById("modal").style.display="flex";
document.getElementById("appId").value=id;
}

function closeModal(){
document.getElementById("modal").style.display="none";
}
</script>

</body>
</html>