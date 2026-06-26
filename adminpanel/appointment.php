<?php include("connection.php")?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Admin - Appointments</title>

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
background:#f1f5f5;
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

.header{
background:rgb(12,52,61);
color:#fff;
padding:15px;
text-align:center;
border-radius:10px;
}

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
background:white;
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

/* STATUS */
.status{
display:inline-block;
padding:6px 12px;
border-radius:20px;
font-size:13px;
font-weight:bold;
}

.pending{
background:orange;
color:white;
}

.confirmed{
background:green;
color:white;
}

.rejected{
background:red;
color:white;
}

/* ACTION */
.edit{
background:#22c55e;
color:white;
padding:6px 12px;
text-decoration:none;
border-radius:5px;
margin-right:8px;
}

.delete{
background:#ef4444;
color:white;
padding:6px 12px;
text-decoration:none;
border-radius:5px;
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
<h2>Admin Panel - Appointments</h2>
</div>

<div class="container">

<?php 
$q = "SELECT * FROM book_appointment ORDER BY `book-appointment_ID` ASC";
$r = mysqli_query($conn,$q);
?>

<table>

<tr>
<th>ID</th>
<th>Doctor</th>
<th>Patient</th>
<th>Date</th>
<th>Time</th>
<th>Status</th>
<th>Actions</th>
</tr>

<?php while($row = mysqli_fetch_assoc($r)) { ?>

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

<tr>

<td><?php echo $row['book-appointment_ID']; ?></td>

<td><?php echo $row['Doctor']; ?></td>

<td><?php echo $row['Full_Name']; ?></td>

<td>
<?php echo date("d/m/Y", strtotime($row['appointment_date'])); ?>
</td>

<td><?php echo $row['appointment_time']; ?></td>

<td>
<span class="status <?php echo $class; ?>">
<?php echo $text; ?>
</span>
</td>

<td>
<a href="appointment.update.php?id=<?php echo $row['book-appointment_ID']; ?>" class="edit">Edit</a>

<a href="appointment.delete.php?id=<?php echo $row['book-appointment_ID']; ?>" 
class="delete"
onclick="return confirm('Delete?')">
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