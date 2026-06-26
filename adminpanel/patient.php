<?php
$conn = mysqli_connect("localhost","root","","dermabridgex");

if(!$conn){
    die("Connection Failed");
}

/* DELETE */
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    mysqli_query($conn,"DELETE FROM book_appointment WHERE `book-appointment_ID`='$id'");
    header("Location: ?");
}

/* UPDATE */
if(isset($_POST['update'])){
    $id = $_POST['id'];

    mysqli_query($conn,"UPDATE book_appointment SET
    Doctor='$_POST[doctor]',
    Full_Name='$_POST[name]',
    Email='$_POST[email]',
    Gender='$_POST[gender]',
    Age='$_POST[age]',
    Skin_type='$_POST[skin]',
    Medical_history='$_POST[history]',
    appointment_date='$_POST[date]',
    appointment_time='$_POST[time]',
    appointment_type='$_POST[type]',
    payment_method='$_POST[payment]'
    WHERE `book-appointment_ID`='$id'");

    header("Location: ?");
}

/* FETCH */
$editData = null;

if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $res = mysqli_query($conn,"SELECT * FROM book_appointment WHERE `book-appointment_ID`='$id'");
    $editData = mysqli_fetch_assoc($res);
}
?>

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
color:white;
padding:15px;
text-align:center;
border-radius:10px;
margin-bottom:20px;
}

/* CONTAINER */
.container{
background:white;
padding:20px;
border-radius:10px;
box-shadow:0 5px 15px rgba(0,0,0,0.1);
}

/* FORM */
.form-box{
margin-top:15px;
}

input,
select,
textarea{
padding:10px;
margin:5px;
width:23%;
border:1px solid #ccc;
border-radius:5px;
}

textarea{
width:98%;
height:80px;
resize:none;
}

/* BUTTON */
.add-btn{
background:#2563eb;
color:white;
padding:10px 15px;
border:none;
cursor:pointer;
border-radius:6px;
transition:0.3s;
}

.add-btn:hover{
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
color:white;
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
color:white;
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

/* RESPONSIVE */
@media(max-width:900px){

input,
select,
textarea{
width:100%;
}

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

<a href="dashboard.php">🏠 Dashboard</a>
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

<div class="header">
<h2>Admin Panel - patients </h2>
</div>

<?php if($editData){ ?>

<div class="container">

<h2 style="margin-bottom:15px;">Update Appointment</h2>

<form method="POST">

<div class="form-box">

<input type="hidden" name="id"
value="<?php echo $editData['book-appointment_ID']; ?>">

<input type="text" name="doctor"
value="<?php echo $editData['Doctor']; ?>" required>

<input type="text" name="name"
value="<?php echo $editData['Full_Name']; ?>" required>

<input type="email" name="email"
value="<?php echo $editData['Email']; ?>" required>

<select name="gender">
<option <?php if($editData['Gender']=="Male") echo "selected"; ?>>Male</option>
<option <?php if($editData['Gender']=="Female") echo "selected"; ?>>Female</option>
</select>

<input type="number" name="age"
value="<?php echo $editData['Age']; ?>">

<input type="text" name="skin"
value="<?php echo $editData['Skin_type']; ?>">

<textarea name="history"><?php echo $editData['Medical_history']; ?></textarea>

<input type="date" name="date"
value="<?php echo $editData['appointment_date']; ?>">

<input type="time" name="time"
value="<?php echo $editData['appointment_time']; ?>">

<select name="type">
<option <?php if($editData['appointment_type']=="online") echo "selected"; ?>>online</option>
<option <?php if($editData['appointment_type']=="physical") echo "selected"; ?>>physical</option>
</select>

<select name="payment">
<option <?php if($editData['payment_method']=="cash") echo "selected"; ?>>cash</option>
<option <?php if($editData['payment_method']=="jazzcash") echo "selected"; ?>>jazzcash</option>
</select>

<br><br>

<button class="add-btn" name="update">
Update Appointment
</button>

</div>

</form>

</div>

<?php } else { ?>

<div class="container">

<h2>Appointments Record</h2>

<table>

<tr>
<th>ID</th>
<th>Doctor</th>
<th>Name</th>
<th>Email</th>
<th>Gender</th>
<th>Age</th>
<th>Skin</th>
<th>Medical History</th>
<th>Payment</th>
<th>Date</th>
<th>Time</th>
<th>Type</th>
<th>Action</th>
</tr>

<?php

$result = mysqli_query($conn,
"SELECT * FROM book_appointment ORDER BY `book-appointment_ID` ");

while($row = mysqli_fetch_assoc($result)){

?>

<tr>

<td><?php echo $row['book-appointment_ID']; ?></td>
<td><?php echo $row['Doctor']; ?></td>
<td><?php echo $row['Full_Name']; ?></td>
<td><?php echo $row['Email']; ?></td>
<td><?php echo $row['Gender']; ?></td>
<td><?php echo $row['Age']; ?></td>
<td><?php echo $row['Skin_type']; ?></td>
<td><?php echo $row['Medical_history']; ?></td>
<td><?php echo $row['payment_method']; ?></td>
<td>
<?php echo date("d/m/Y", strtotime($row['appointment_date'])); ?>
</td>
<td><?php echo $row['appointment_time']; ?></td>
<td><?php echo $row['appointment_type']; ?></td>

<td>

<a class="edit"
href="?edit=<?php echo $row['book-appointment_ID']; ?>">
Edit
</a>

<a class="delete"
href="?delete=<?php echo $row['book-appointment_ID']; ?>"
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