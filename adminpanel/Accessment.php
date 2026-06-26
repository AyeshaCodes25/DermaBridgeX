<?php
include("connection.php");

/* DELETE */
if(isset($_GET['delete'])){
    $id = $_GET['delete'];

    mysqli_query($conn,"DELETE FROM skin_assessment WHERE `skin-assessment_ID`='$id'");

    header("Location: Accessment.php");
    exit();
}

/* DATA */
$data = mysqli_query($conn,"SELECT * FROM skin_assessment");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Admin - Skin Assessment</title>

<style>

/* RESET */
*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:Segoe UI;
}

/* BODY */
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
text-decoration:none;
padding:12px;
font-size:17px;
margin:8px 0;
border-radius:8px;
transition:0.3s;
}

.sidebar a:hover{
background:white;
color:rgb(12,52,61);
transform:translateX(5px);
}

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
padding:15px;
text-align:center;
border-radius:10px;
}

/* 🔥 ADDED ACCESSMENT CARD */
.accessment-card{
margin-top:15px;
background:white;
padding:15px;
border-radius:10px;
box-shadow:0 5px 15px rgba(0,0,0,0.1);
text-align:center;
border-left:5px solid rgb(12,52,61);
}

.accessment-card h3{
color:rgb(12,52,61);
margin-bottom:8px;
}

.accessment-card p{
font-size:28px;
font-weight:bold;
color:rgb(12,52,61);
}

/* CONTAINER */
.container{
margin-top:20px;
background:#fff;
padding:20px;
border-radius:10px;
box-shadow:0 5px 15px rgba(0,0,0,0.1);
}

/* TABLE */
table{
width:100%;
border-collapse:collapse;
margin-top:20px;
}

th{
background:#e2e8f0;
padding:12px;
text-align:center;
}

td{
padding:12px;
border-bottom:1px solid #ddd;
text-align:center;
}


/* DELETE BUTTON */
.delete-btn{
background:#ef4444;
color:white;
padding:6px 12px;
border-radius:8px;
text-decoration:none;
font-size:13px;
}

.delete-btn:hover{
background:#dc2626;
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
<h2>Skin Assessment Records</h2>
</div>

<!-- ✅ ONLY ACCESSMENT CARD ADDED -->
<div class="accessment-card">
<h3>Total Accessments</h3>
<p><?php echo mysqli_num_rows($data); ?></p>
</div>

<div class="container">

<table>

<tr>
<th>ID</th>
<th>Name</th>
<th>Gender</th>
<th>Age</th>
<th>Skin Type</th>
<th>Water Intake</th>
<th>Concern</th>
<th>Lifestyle</th>
<th>Action</th>
</tr>

<?php while($row = mysqli_fetch_assoc($data)){ ?>

<tr>
<td><?= $row['skin-assessment_ID'] ?></td>
<td><?= $row['Name'] ?></td>
<td><?= $row['gender'] ?></td>
<td><?= $row['age_group'] ?></td>
<td><?= $row['skin_type'] ?></td>
<td><?= $row['water_intake'] ?></td>
<td><?= $row['skin_concern'] ?></td>
<td><?= $row['lifestyle'] ?></td>

<td>
<a class="delete-btn"
href="?delete=<?= $row['skin-assessment_ID']; ?>"
onclick="return confirm('Are you sure you want to delete this record?')">
Delete
</a>
</td>

</tr>

<?php } ?>

</table>

</div>

</div>

</body>
</html>