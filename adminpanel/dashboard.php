<?php
include("connection.php");

/* =========================
   COUNTS
========================= */

// Patients
$patients = mysqli_fetch_assoc(mysqli_query($conn,
"SELECT COUNT(*) as total FROM book_appointment"))['total'];

// Doctors
$doctors = mysqli_fetch_assoc(mysqli_query($conn,
"SELECT COUNT(*) as total FROM doctor"))['total'];

// Appointments
$appointments = mysqli_fetch_assoc(mysqli_query($conn,
"SELECT COUNT(*) as total FROM appointment"))['total'];

// Feedback
$feedback = mysqli_fetch_assoc(mysqli_query($conn,
"SELECT COUNT(*) as total FROM patientfeedback"))['total'];

// Skin Assessment (ADDED)
$accessment = mysqli_fetch_assoc(mysqli_query($conn,
"SELECT COUNT(*) as total FROM skin_assessment"))['total'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>DermaBridgeX Admin Dashboard</title>

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:Segoe UI;
}

body{
display:flex;
min-height:100vh;
background:white;
}

/* SIDEBAR */
.sidebar{
width:250px;
background:rgb(12,52,61);
color:white;
padding:20px;

}

.sidebar h2{
text-align:center;
margin-bottom:30px;
color:white;
}

.sidebar a{
display:block;
color:white;
font-size:17px;
text-decoration:none;
padding:12px;
margin:8px 0;
border-radius:8px;
transition:0.3s;
}

.sidebar a:hover{
background:white;
color:rgb(12,52,61);
transform:translateX(5px);
}

/* LOGOUT BUTTON */
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
flex:1;
padding:20px;
}

/* HEADER */
.header{
background:rgb(12,52,61);
color:white;
padding:18px;
border-radius:10px;
margin-bottom:25px;
display:flex;
justify-content:space-between;
align-items:center;
box-shadow:0 5px 15px rgba(0,0,0,0.1);
}

.header h2{
font-size:28px;
}

.header span{
font-size:19px;
color:white;
}

/* CARDS */
.cards{
display:grid;
grid-template-columns:repeat(auto-fit,minmax(220px,1fr));
gap:20px;
}

.card{
background:white;
padding:25px;
border-radius:14px;
box-shadow:0 10px 25px rgba(0,0,0,0.08);
border-left:5px solid rgb(12,52,61);
transition:0.3s;
text-align:center;
}
.cards a{
   text-decoration:none;
}
.card:hover{
transform:translateY(-6px);
}

.card h3{
color:rgb(12,52,61);
margin-bottom:12px;
font-size:17px;
}

.card p{
font-size:30px;
font-weight:bold;
color:rgb(12,52,61);
}

@media(max-width:900px){
.header{
flex-direction:column;
gap:10px;
text-align:center;
}
}

</style>

</head>

<body>

<!-- SIDEBAR -->
<div class="sidebar">

<h2>DermaBridgeX</h2>

<a href="#">🏠 Dashboard</a>
<a href="patient.php">👤 Patients</a>
<a href="doctor.php">👨‍⚕️ Doctors</a>
<a href="appointment.php">📅 Appointments</a>
<a href="patientfeedback.php">💬 Feedback</a>
<a href="accessment.php">🧾 Accessment</a>

<a href="logout.php" class="logout">Logout</a>

</div>

<!-- MAIN -->
<div class="main">

<div class="header">

<h2>Admin Dashboard</h2>
<span>Welcome Admin</span>

</div>

<div class="cards">

<a href="patient.php"><div class="card">
<h3>👨‍⚕️ Total Patients</h3>
<p><?php echo $patients; ?></p>
</div></a>

<a href="doctor.php"><div class="card">
<h3>🩺 Total Doctors</h3>
<p><?php echo $doctors; ?></p>
</div></a>

<a href="appointment.php"><div class="card">
<h3>📅 Appointments</h3>
<p><?php echo $appointments; ?></p>
</div></a>

<a href="patientfeedback.php"><div class="card">
<h3>💬 Feedback</h3>
<p><?php echo $feedback; ?></p>
</div></a>

<!-- ADDED ACCESSMENT CARD -->
<a href="Accessment.php"><div class="card">
<h3>🧴 Accessment</h3>
<p><?php echo $accessment; ?></p>
</div></a>

</div>

</div>

</body>
</html>