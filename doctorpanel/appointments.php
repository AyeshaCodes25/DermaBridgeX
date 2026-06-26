<?php
$conn = mysqli_connect("localhost","root","","dermabridgex");
if(!$conn){ die("Connection Failed"); }

/* ACCEPT */
if(isset($_GET['accept'])){
    $id = $_GET['accept'];

    mysqli_query($conn,"UPDATE book_appointment 
    SET appointment_type='physical'
    WHERE `book-appointment_ID`='$id'");

    header("Location: appointments.php");
    exit();
}

/* REJECT */
if(isset($_GET['reject'])){
    $id = $_GET['reject'];

    mysqli_query($conn,"UPDATE book_appointment 
    SET appointment_type='rejected'
    WHERE `book-appointment_ID`='$id'");

    header("Location: appointments.php");
    exit();
}

/* RESCHEDULE */
if(isset($_POST['reschedule'])){
    $id   = $_POST['id'];
    $date = $_POST['date'];
    $time = $_POST['time'];

    mysqli_query($conn,"UPDATE book_appointment SET
    appointment_date='$date',
    appointment_time='$time',
    appointment_type='physical'
    WHERE `book-appointment_ID`='$id'");

    header("Location: appointments.php");
    exit();
}

/* FETCH */
$result = mysqli_query($conn,"SELECT * FROM book_appointment ORDER BY `book-appointment_ID` DESC");
?>

<!DOCTYPE html>
<html>
<head>
<title>Doctor Appointments</title>

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
border-radius:12px;
font-size:17px;
transition:0.3s;
}

.sidebar a:hover{
background:white;
color:rgb(12,52,61);
transform:translateX(5px)
}

/* LOGOUT */
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
padding:25px;
}

.main h2{
margin-bottom:20px;
color:#0c3440;
}

/* TABLE */
table{
width:100%;
border-collapse:collapse;
background:white;
border-radius:15px;
overflow:hidden;
box-shadow:0 5px 20px rgba(0,0,0,0.1);
}

th{
background:rgb(12,52,61);
color:white;
padding:12px;
}

td{
padding:12px;
border:1px solid #ddd;
text-align:center;
}

/* STATUS */
.pending{
color:orange;
font-weight:bold;
}

.confirmed{
color:green;
font-weight:bold;
}

.rejected{
color:red;
font-weight:bold;
}

/* BUTTONS */
button,a.btn{
padding:8px 12px;
border:none;
cursor:pointer;
color:white;
text-decoration:none;
margin:2px;
border-radius:6px;
font-size:14px;
transition:0.3s;
}

.accept{
background:#16a34a;
}

.accept:hover{
background:#15803d;
}

.reject{
background:#dc2626;
}

.reject:hover{
background:#b91c1c;
}

.reschedule{
background:#2563eb;
}

.reschedule:hover{
background:#1d4ed8;
}

/* NEW BUTTONS */
.prescription{
background:#9333ea;
}

.prescription:hover{
background:#7e22ce;
}

.video{
background:#0ea5e9;
}

.video:hover{
background:#0284c7;
}

/* MODAL */
.modal{
display:none;
position:fixed;
top:0;
left:0;
width:100%;
height:100%;
background:rgba(0,0,0,0.5);
justify-content:center;
align-items:center;
}

.modal-box{
background:white;
padding:25px;
width:320px;
border-radius:12px;
}

.modal-box label{
display:block;
margin-top:10px;
font-weight:600;
}

.modal-box input{
width:100%;
padding:10px;
margin-top:5px;
border:1px solid #ccc;
border-radius:6px;
}

.modal-box button{
margin-top:15px;
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

<a href="logout.php" class="logout"> Logout</a>


</div>

<!-- MAIN -->
<div class="main">

<h2>Appointments Management</h2>

<table>

<tr>
<th>Doctor</th>
<th>Patient</th>
<th>Date</th>
<th>Time</th>
<th>Status</th>
<th>Actions</th>
</tr>

<?php while($row = mysqli_fetch_assoc($result)) { ?>

<?php
$status = $row['appointment_type'];

if($status == "physical"){
    $class="confirmed";
}
else if($status == "rejected"){
    $class="rejected";
}
else{
    $class="pending";
}
?>

<tr>

<td><?php echo $row['Doctor']; ?></td>

<td><?php echo $row['Full_Name']; ?></td>

<td><?php echo $row['appointment_date']; ?></td>

<td><?php echo $row['appointment_time']; ?></td>

<td class="<?php echo $class; ?>">
<?php echo ucfirst($class); ?>
</td>

<td>

<!-- CONFIRM -->
<a class="btn accept"
href="?accept=<?php echo $row['book-appointment_ID']; ?>">
Confirm
</a>

<!-- REJECT -->
<a class="btn reject"
href="?reject=<?php echo $row['book-appointment_ID']; ?>">
Reject
</a>

<!-- RESCHEDULE -->
<button class="btn reschedule"
onclick="openModal(<?php echo $row['book-appointment_ID']; ?>)">
Reschedule
</button>

<!-- PRESCRIPTION BUTTON -->
<a class="btn prescription"
href="prescription.php?id=<?php echo $row['book-appointment_ID']; ?>">
Prescription
</a>

<!-- VIDEO BUTTON -->
<a class="btn video"
href="video.php?id=<?php echo $row['book-appointment_ID']; ?>">
Video
</a>

</td>

</tr>

<?php } ?>

</table>

</div>

<!-- MODAL -->
<div class="modal" id="modal">

<div class="modal-box">

<h3>Reschedule Appointment</h3>

<form method="POST">

<input type="hidden" name="id" id="appId">

<label>Date</label>
<input type="date" name="date" required>

<label>Time</label>
<input type="time" name="time" required>

<button type="submit" name="reschedule"
style="background:#2563eb;color:white;padding:10px 15px;border:none;border-radius:6px;">
Update
</button>

<button type="button"
onclick="closeModal()"
style="background:#dc2626;color:white;padding:10px 15px;border:none;border-radius:6px;">
Close
</button>

</form>

</div>

</div>

<script>

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