<?php

$conn = mysqli_connect("localhost","root","","dermabridgex");

if(!$conn){
    die("Connection Failed");
}

/* DELETE */
if(isset($_GET['delete'])){

    $id = $_GET['delete'];

    mysqli_query($conn,
    "DELETE FROM patientfeedback
    WHERE Feedback_ID='$id'");

    header("Location: ?");
}

/* UPDATE */
if(isset($_POST['update'])){

    $id = $_POST['id'];

    mysqli_query($conn,"UPDATE patientfeedback SET

    Name='$_POST[name]',
    Email='$_POST[email]',
    Visit='$_POST[visit]',
    Overall_rating='$_POST[overall]',
    Doctor_rating='$_POST[doctor]',
    Feedback_message='$_POST[message]'

    WHERE Feedback_ID='$id'");

    header("Location: ?");
}

/* EDIT FETCH */
$editData = null;

if(isset($_GET['edit'])){

    $id = $_GET['edit'];

    $res = mysqli_query($conn,
    "SELECT * FROM patientfeedback
    WHERE Feedback_ID='$id'");

    $editData = mysqli_fetch_assoc($res);
}

?>

<!DOCTYPE html>
<html>
<head>

<title>Admin Panel - Feedback Management</title>

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

/* MAIN */
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

/* FORM */
input,
textarea,
select{
padding:10px;
margin:5px;
width:100%;
border:1px solid #ccc;
border-radius:5px;
}

textarea{
height:100px;
resize:none;
}

/* BUTTON */
button{
background:#2563eb;
color:#fff;
padding:10px 15px;
border:none;
cursor:pointer;
border-radius:6px;
width:100%;
font-size:16px;
transition:0.3s;
}

button:hover{
background:#1d4ed8;
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
font-size:14px;
}

tr:hover{
background:#f8fafc;
transition:0.3s;
}

/* ACTION BUTTONS */
.edit{
background:#22c55e;
color:#fff;
padding:6px 12px;
text-decoration:none;
border-radius:5px;
display:inline-block;
margin-right:10px;
transition:0.3s;
}

.edit:hover{
background:#16a34a;
}

.delete{
background:#ef4444;
color:#fff;
padding:6px 12px;
text-decoration:none;
border-radius:5px;
display:inline-block;
transition:0.3s;
}

.delete:hover{
background:#dc2626;
}

/* KEEP BUTTONS IN ONE LINE */
td:last-child{
white-space:nowrap;
}

/* HEADING */
.heading{
margin-top:20px;
margin-bottom:10px;
font-size:25px;
font-weight:bold;
color:#0f172a;
}

/* RESPONSIVE */
@media(max-width:900px){

table{
font-size:12px;
overflow:auto;
display:block;
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

<!--  LOGOUT ADDED HERE -->
<a href="logout.php" class="logout">Logout</a>

</div>

<!-- MAIN -->
<div class="main">

<!-- HEADER -->
<div class="header">
<h2>Admin Panel - Feedback Management</h2>
</div>

<?php if($editData){ ?>

<!-- UPDATE FORM -->
<div class="container">

<h2 class="heading">Update Feedback</h2>

<form method="POST">

<input type="hidden" name="id"
value="<?php echo $editData['Feedback_ID']; ?>">

<input type="text" name="name"
value="<?php echo $editData['Name']; ?>" required>

<input type="email" name="email"
value="<?php echo $editData['Email']; ?>" required>

<select name="visit">

<option <?php if($editData['Visit']=="Online Consultation") echo "selected"; ?>>
Online Consultation
</option>

<option <?php if($editData['Visit']=="In-Clinic Appointment") echo "selected"; ?>>
In-Clinic Appointment
</option>

<option <?php if($editData['Visit']=="Website Experience") echo "selected"; ?>>
Website Experience
</option>

</select>

<select name="overall">

<option>Excellent</option>
<option>Good</option>
<option>Average</option>
<option>Poor</option>
<option>Very Poor</option>

</select>

<select name="doctor">

<option>Excellent</option>
<option>Good</option>
<option>Average</option>
<option>Poor</option>
<option>Very Poor</option>

</select>

<textarea name="message"><?php echo $editData['Feedback_message']; ?></textarea>

<button name="update">
Update Feedback
</button>

</form>

</div>

<?php } else { ?>

<!-- TABLE -->
<div class="container">

<h2 class="heading">Feedback Records</h2>

<table>

<tr>
<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Visit</th>
<th>Overall</th>
<th>Doctor</th>
<th>Message</th>
<th>Action</th>
</tr>

<?php

$result = mysqli_query($conn,
"SELECT * FROM patientfeedback ORDER BY Feedback_ID DESC");

while($row = mysqli_fetch_assoc($result)){

?>

<tr>

<td><?php echo $row['Feedback_ID']; ?></td>
<td><?php echo $row['Name']; ?></td>
<td><?php echo $row['Email']; ?></td>
<td><?php echo $row['Visit']; ?></td>
<td><?php echo $row['Overall_rating']; ?></td>
<td><?php echo $row['Doctor_rating']; ?></td>
<td><?php echo $row['Feedback_message']; ?></td>

<td>

<!-- <a class="edit"
href="?edit=<?php echo $row['Feedback_ID']; ?>">
Edit
</a> -->

<a class="delete"
href="?delete=<?php echo $row['Feedback_ID']; ?>"
onclick="return confirm('Delete?')">
Delete
</a>

</td>

</tr>

<?php } ?>

</table>

</div>

<?php } ?>

</div>

</body>
</html>