<?php
$conn = mysqli_connect("localhost","root","","dermabridgex");

if(!$conn){
    die("Connection Failed");
}

/* TOTAL PATIENTS */
$patient_query = mysqli_query($conn,"
SELECT COUNT(DISTINCT Full_Name) AS total_patients 
FROM book_appointment
");

$patient_data = mysqli_fetch_assoc($patient_query);
$total_patients = $patient_data['total_patients'];

/* TOTAL APPOINTMENTS */
$appointment_query = mysqli_query($conn,"
SELECT COUNT(*) AS total_appointments 
FROM book_appointment
");

$appointment_data = mysqli_fetch_assoc($appointment_query);
$total_appointments = $appointment_data['total_appointments'];

/* PENDING APPOINTMENTS */
$pending_query = mysqli_query($conn,"
SELECT COUNT(*) AS total_pending 
FROM book_appointment
WHERE appointment_type != 'physical'
");

$pending_data = mysqli_fetch_assoc($pending_query);
$total_pending = $pending_data['total_pending'];
?>

<!DOCTYPE html>
<html>
<head>
<title>Dashboard</title>

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Segoe UI';
}

body{
display:flex;
background:linear-gradient(white);
min-height:100vh;
overflow-x:hidden;
}

/* SIDEBAR */
.sidebar{
width:250px;
height:100vh;
background:linear-gradient(180deg,#0c3440,#06252d);
color:white;
padding:20px;
position:fixed;
left:0;
top:0;
box-shadow:5px 0 25px rgba(0,0,0,0.2);
}

.sidebar h2{
text-align:center;
margin-bottom:30px;
font-size:24px;
 animation: fadeDown 1s ease;
}

.sidebar a{
display:block;
padding:12px;
margin:10px 0;
text-decoration:none;
color:white;
border-radius:12px;
font-size:17px;
transition:0.3s;
}

.sidebar a:hover{
background:white;
color:rgb(12,52,61);
transform:translateX(5px)
}
/* LOGOUT BUTTON STYLE */
.logout{
background:#ef4444;
text-align:center;
font-weight:600;
}

.logout:hover{
background:#dc2626;
}

/* MAIN */
.main{
margin-left:260px;
flex:1;
padding:35px;
animation:fadeIn 1s ease;
}

/* HEADER */
.dashboard-title{
font-size:40px;
font-weight:bold;
color:#0c3440;
margin-bottom:10px;
}

.welcome{
font-size:18px;
color:white;
margin-bottom:35px;
}

/* DOCTOR BOX */
.doctor-box{
display:flex;
gap:20px;
flex-wrap:wrap;
margin-bottom:30px;
}

.doctor-card{
background:white;
padding:18px 25px;
border-radius:18px;
box-shadow:0 10px 25px rgba(0,0,0,0.1);
font-size:20px;
font-weight:600;
color:rgb(12,52,61);
transition:0.4s;
}

.doctor-card:hover{
transform:translateY(-5px);
box-shadow:0 15px 35px rgba(0,0,0,0.2);
}

/* STAT CARDS */
.cards{
display:grid;
grid-template-columns:repeat(auto-fit,minmax(250px,1fr));
gap:25px;
}

.card{
background:white;
padding:30px;
border-radius:22px;
position:relative;
overflow:hidden;
box-shadow:0 10px 30px rgba(0,0,0,0.12);
transition:0.4s;
}

.card:hover{
transform:translateY(-8px) scale(1.03);
box-shadow:0 20px 45px rgba(0,0,0,0.2);
}

/* Glow Effect */
.card::before{
content:"";
position:absolute;
width:250px;
height:250px;
background:rgba(37,99,235,0.08);
border-radius:50%;
top:-120px;
right:-120px;
}

.card h3{
font-size:20px;
margin-bottom:12px;
color:rgb(12,52,61);
}

.card p{
font-size:38px;
font-weight:bold;
color:rgb(12,52,61);
}
.cards a{
    text-decoration:none;
}

/* DIFFERENT CARD COLORS */
.card1{
border-left:8px solid #2563eb;
}

.card2{
border-left:8px solid #10b981;
}

.card3{
border-left:8px solid #f59e0b;
}

/* ANIMATION */
@keyframes fadeIn{
from{
opacity:0;
transform:translateY(20px);
}
to{
opacity:1;
transform:translateY(0);
}
}

/* RESPONSIVE */
@media(max-width:768px){

.sidebar{
width:100%;
height:auto;
position:relative;
}

.main{
margin-left:0;
padding:20px;
}

.dashboard-title{
font-size:30px;
}

.card p{
font-size:30px;
}



</style>

</head>

<body>

<!-- SIDEBAR -->
<div class="sidebar">

<h2>DermaBridgeX</h2>

<a href="dashboard.php">🏠 Dashboard</a>
<a href="appointments.php">📅 Appointments</a>
<a href="Accessment.php">🧾 Accessment</a>
<a href="prescription.php">💊 Prescription</a>
<a href="video.php">🎥 Video</a>

<!--  LOGOUT ADDED HERE -->
<a href="logout.php" class="logout">Logout</a>

</div>

<!-- MAIN -->
<div class="main">

<h1 class="dashboard-title">Doctor Dashboard</h1>

<p class="welcome">
Welcome back! Here’s your clinic overview today.
</p>

<!-- DOCTORS -->
<div class="doctor-box">

<div class="doctor-card">
👨‍⚕️ Dr. Ali Khan
</div>

<div class="doctor-card">
👩‍⚕️ Dr. Sarah Ahmed
</div>

</div>

<!-- DYNAMIC CARDS -->
<div class="cards">

<a href="appointments.php"><div class="card card1">
<h3>Total Patients</h3>
<p><?php echo $total_patients; ?></p>
</div></a>

<a href="appointments.php"><div class="card card2">
<h3>Total Appointments</h3>
<p><?php echo $total_appointments; ?></p>
</div></a>

<a href="appointments.php"><div class="card card3">
<h3>Pending Appointments</h3>
<p><?php echo $total_pending; ?></p>
</div></a>

</div>

</div>

</body>
</html>