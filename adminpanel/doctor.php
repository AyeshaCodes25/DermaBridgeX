<?php include("connection.php")?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Admin - Doctors</title>

<style>
*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:Segoe UI;
}

/* BODY LAYOUT */
body{
display:flex;
min-height:100vh;
background:#f1f5f9;
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
/* LOGOUT BUTTON STYLE */
.logout{
background:#ef4444;
text-align:center;
font-weight:600;
}

.logout:hover{
background:#dc2626;
}

/* MAIN CONTENT */
.main{
flex:1;
padding:20px;
}

/* HEADER */
.header{
background:rgb(12,52,61);
color:#fff;
padding:15px;
text-align:center;
border-radius:10px;
}

/* CONTAINER */
.container{
margin-top:20px;
background:#fff;
padding:20px;
border-radius:10px;
box-shadow:0 5px 15px rgba(0,0,0,0.1);
}

/* BUTTON */
.add-btn{
background:rgb(12,52,61);
color:#fff;
padding:10px 15px;
border:none;
cursor:pointer;
border-radius:6px;
transition:0.3s;
}

.add-btn:hover{
background:#1d4ed8;
}

/* FORM */
.form-box{
margin-top:15px;
display:none;
animation:fade 0.3s ease;
}

@keyframes fade{
from{opacity:0;}
to{opacity:1;}
}

input{
padding:10px;
margin:5px;
width:22%;
border:1px solid #ccc;
border-radius:5px;
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
}

td{
padding:12px;
border-bottom:1px solid #ddd;
text-align:center;
}

/* ACTION BUTTONS */
.edit{
background:#22c55e;
color:#fff;
padding:5px 10px;
text-decoration:none;
border-radius:5px;
}

.delete{
background:#ef4444;
color:#fff;
padding:5px 10px;
text-decoration:none;
border-radius:5px;
}
</style>

<script>
function toggleForm(){
let form = document.getElementById("formBox");
form.style.display = form.style.display === "none" ? "block" : "none";
}
</script>

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


<!--  LOGOUT ADDED HERE -->
<a href="logout.php" class="logout">Logout</a>
</div>

<!-- MAIN CONTENT -->
<div class="main">

<div class="header">
<h2>Admin Panel - Manage Doctors</h2>
</div>

<div class="container">

<button class="add-btn" onclick="toggleForm()">+ Add Doctor</button>

<form method="POST" action="insert.doctor.php">
<div class="form-box" id="formBox">
<input type="text" name="name" placeholder="Doctor Name">
<input type="email" name="email" placeholder="Email">
<input type="text" name="spec" placeholder="Specialization">
<input type="text" name="phone" placeholder="Phone">
<button class="add-btn">Save</button>
</div>
</form>

<!-- TABLE -->
<table>
<tr>
<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Specialization</th>
<th>Phone</th>
<th>Actions</th>
</tr>

<?php 
$q="select * from doctor order by Doctor_id";
$r=mysqli_query($conn,$q);

while ($row=mysqli_fetch_array($r)){
?>

<tr>
<td><?php echo $row['Doctor_id'];?></td>
<td><?php echo $row['Name'];?></td>
<td><?php echo $row['Email'];?></td>
<td><?php echo $row['Specialization'];?></td>
<td><?php echo $row['phone'];?></td>
<td>
<a href="doctor.update.php?id=<?php echo $row['Doctor_id']; ?>" class="edit">Edit</a>
<a href="doctor.delete.php?id=<?php echo $row['Doctor_id']; ?>" class="delete">Delete</a>
</td>
</tr>

<?php } ?>

</table>

</div>
</div>

</body>
</html>