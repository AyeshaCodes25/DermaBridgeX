<?php

$conn = mysqli_connect("localhost","root","","dermabridgex");

if(!$conn){
    die("Connection Failed");
}
/* DELETE */
if(isset($_GET['delete'])){
    $id = $_GET['delete'];

    mysqli_query($conn,"DELETE FROM skin_assessment WHERE `skin-assessment_ID`='$id'");

    header("Location: Accessment.php");
    exit();
}

$data = mysqli_query($conn,"SELECT * FROM skin_assessment");

?>

<!DOCTYPE html>
<html>
<head>
<title>Doctor Dashboard - Assessment</title>

<style>

/* RESET */
*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Segoe UI';
}

/* BODY */
body{
display:flex;
background:linear-gradient(white);
min-height:100vh;
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
    color:white;
    font-size:24px;
    animation: fadeDown 1s ease;
}

.sidebar a{
display:block;
padding:12px;
margin:10px 0;
text-decoration:none;
color:white;
font-size:17px;
transition:0.3s;
border-radius:12px;
}

.sidebar a:hover{
background:white;
color:rgb(12,52,61);
transform:translateX(5px)
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
margin-left:260px;
padding:35px;
width:100%;
animation:fadeIn 0.8s ease;
}

h2{
margin-bottom:20px;
color:#0c3440;
font-size:32px;
}

/* TABLE */
table{
width:100%;
border-collapse:collapse;
background:white;
border-radius:18px;
overflow:hidden;
box-shadow:0 10px 30px rgba(0,0,0,0.12);
}

th{
background:#0c3440;
color:white;
padding:14px;
text-align:left;
}

td{
padding:14px;
border-bottom:1px solid #eee;
}

tr:hover{
background:#f1f5f9;
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

/* ANIMATION */
@keyframes fadeIn{
from{opacity:0; transform:translateY(15px);}
to{opacity:1; transform:translateY(0);}
}

</style>

</head>

<body>

<!-- SIDEBAR -->
<div class="sidebar">

<h2>DermaBridgeX</h2>

<a href="dashboard.php">🏠 Dashboard</a>
<a href="appointments.php">📅 Appointments</a>
<a href="Accessment.php">🧾 Assessment</a>
<a href="prescription.php">💊 Prescription</a>
<a href="video.php">🎥 Video</a>
<a href="logout.php" class="logout">Logout</a>

</div>

<!-- MAIN -->
<div class="main">

<h2>Patient Assessment Records</h2>

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

<td><?= $row['skin-assessment_ID']; ?></td>
<td><?= $row['Name']; ?></td>
<td><?= $row['gender']; ?></td>
<td><?= $row['age_group']; ?></td>
<td><?= $row['skin_type']; ?></td>
<td><?= $row['water_intake']; ?></td>
<td><?= $row['skin_concern']; ?></td>
<td><?= $row['lifestyle']; ?></td>

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


</body>
</html>