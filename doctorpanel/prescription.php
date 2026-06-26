<?php
// 🔹 DATABASE CONNECTION
$conn = mysqli_connect("localhost", "root", "", "dermabridgex");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// 🔹 INSERT LOGIC
if (isset($_POST['medicine_name'])) {

    $medicine = $_POST["medicine_name"];
    $details  = $_POST["prescription_details"];
    $contact  = $_POST["patient_contact"];
    $notes    = $_POST["additional_notes"];

    $q = "INSERT INTO prescription 
    (Medicine_Name, Prescription_Details, `Send To Patient (Email / ID)`, Additional_Notes)
    VALUES ('$medicine', '$details', '$contact', '$notes')";

    $result = mysqli_query($conn, $q);

    if ($result) {
        echo "<script>alert('✅ Inserted Successfully');</script>";
    } else {
        echo "❌ Error: " . mysqli_error($conn);
    }
}

// 🔹 GET DATA FROM URL
$id = $_GET['id'] ?? '';
$patient = $_GET['name'] ?? 'Patient';
?>

<!DOCTYPE html>
<html>
<head>
<title>Prescription</title>

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Segoe UI';
}

body{
background:linear-gradient(white);
display:flex;
justify-content:center;
align-items:center;
min-height:100vh;
padding:30px;
}

/* CONTAINER */
.container{
width:600px;
background:white;
padding:35px;
border-radius:25px;
box-shadow:0 15px 40px rgba(0,0,0,0.15);
animation:fadeIn 0.7s ease;
position:relative;
overflow:hidden;
}

/* TOP DESIGN */
.container::before{
content:"";
position:absolute;
width:250px;
height:250px;
background:rgba(37,99,235,0.08);
border-radius:50%;
top:-120px;
right:-120px;
}

/* TITLE */
h2{
text-align:center;
color:#0c3440;
margin-bottom:18px;
font-size:32px;
}

/* BADGE */
.badge{
display:inline-block;
padding:10px 16px;
background:#e0f2fe;
color:#0c3440;
border-radius:25px;
margin-bottom:20px;
font-size:14px;
font-weight:600;
}

/* LABELS */
label{
font-size:15px;
color:#0c3440;
font-weight:600;
margin-top:12px;
display:block;
}

/* INPUTS */
input,
textarea{
width:100%;
padding:14px;
margin:10px 0 18px 0;
border:1px solid #d1d5db;
border-radius:14px;
font-size:15px;
transition:0.3s;
background:#f9fafb;
}

input:focus,
textarea:focus{
outline:none;
border-color:#2563eb;
box-shadow:0 0 10px rgba(37,99,235,0.2);
background:white;
}

textarea{
height:120px;
resize:none;
}

/* BUTTON */
button{
width:100%;
padding:14px;
border:none;
border-radius:14px;
background:linear-gradient(135deg,#0c3440,#145374);
color:white;
font-size:17px;
font-weight:600;
cursor:pointer;
transition:0.3s;
box-shadow:0 8px 20px rgba(0,0,0,0.15);
}

button:hover{
transform:translateY(-3px);
background:linear-gradient(135deg,#145374,#0c3440);
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
@media(max-width:700px){

.container{
width:100%;
padding:25px;
}

h2{
font-size:26px;
}

}

</style>

</head>
<body>

<div class="container">

<h2>Prescription 💊</h2>

<div class="badge">
Appointment ID: <?php echo $id; ?> | Patient: <?php echo $patient; ?>
</div>

<form method="POST" action="">

<label>🩺 Medicine Name</label>
<input type="text" name="medicine_name" placeholder="Enter medicine name" required>

<label>📋 Prescription Details</label>
<textarea name="prescription_details" placeholder="Write prescription details..." required></textarea>

<label>📩 Send To Patient</label>
<input type="text" name="patient_contact" placeholder="Enter patient email or ID" required>

<label>📝 Additional Notes</label>
<textarea name="additional_notes" placeholder="Additional notes..."></textarea>

<button type="submit">Send Prescription</button>

</form>

</div>

</body>
</html>