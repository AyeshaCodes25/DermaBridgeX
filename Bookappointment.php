
<?php
session_start();

$doctor = "";

if(isset($_SESSION['doctor'])){
    $doctor = $_SESSION['doctor'];
}
?>

<?php
/* ================= CONNECTION ================= */
$conn = mysqli_connect("localhost","root","","dermabridgex");

if(!$conn){
    die("Database Connection Failed");
}

/* ================= INSERT APPOINTMENT ================= */
if(isset($_POST['submit'])){

    $doctor = $_POST['doctor'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $skin = $_POST['skin'];
    $history = $_POST['history'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $type = $_POST['type'];
    $payment = $_POST['payment'];

   mysqli_query($conn,"INSERT INTO book_appointment
(Doctor, Full_Name, Email, Gender, Age, Skin_type, Medical_history, appointment_date, appointment_time, appointment_type, payment_method)
VALUES
('$doctor','$name','$email','$gender','$age','$skin','$history','$date','$time','$type','$payment')");
    echo "<script>alert('Appointment Booked Successfully');</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Book Appointment</title>
<link rel="stylesheet" href="CSS/Bookappointment.css">
</head>

<body>

<div class="container">
<div class="form-box">

<h2>Book Appointment</h2>
<p class="subtitle">Your skin deserves expert care</p>

<form method="POST">

<!-- DOCTOR -->
 <div class="input-group">
<input type="text"
       name="doctor"
       value="<?php echo $doctor; ?>"
       readonly>
</div>
<!-- NAME -->
<div class="input-group">
<label>Full Name</label>
<input type="text" name="name" required>
</div>

<!-- EMAIL -->
<div class="input-group">
<label>Email</label>
<input type="email" name="email" required>
</div>

<!-- GENDER -->
<div class="input-group">
<label>Gender</label>
<select name="gender" required>
<option value="">Select</option>
<option>Male</option>
<option>Female</option>
<option>Other</option>
</select>
</div>

<!-- AGE -->
<div class="input-group">
<label>Age</label>
<input type="number" name="age" required>
</div>

<!-- SKIN TYPE -->
<div class="input-group">
<label>Skin Type</label>
<select name="skin" required>
<option value="">Select</option>
<option>Oily</option>
<option>Dry</option>
<option>Combination</option>
<option>Sensitive</option>
</select>
</div>

<!-- HISTORY -->
<div class="input-group">
<label>Medical History</label>
<textarea name="history"></textarea>
</div>

<!-- DATE -->
<div class="input-group">
<label>Appointment Date</label>
<input type="date" name="date" id="date" required>
</div>

<!-- TIME -->
<div class="input-group">
<label>Appointment Time</label>
<input type="time" name="time" required>
</div>

<!-- TYPE -->
<div class="input-group">
<label>Appointment Type</label>
<select name="type" id="appointmentType" required>
<option value="">Select</option>
<option value="online">Online</option>
<option value="physical">Physical</option>
</select>
</div>

<!-- PAYMENT -->
<div class="input-group">
<label>Payment Method</label>
<select name="payment" id="paymentMethod" required>
<option value="">Select</option>
<option value="jazzcash">JazzCash</option>
<option value="cash">Cash</option>
</select>
</div>

<button type="submit" name="submit">Confirm Appointment</button>

</form>

</div>
</div>

<script>


 


// MIN DATE = TODAY
const today = new Date().toISOString().split("T")[0];
document.getElementById("date").setAttribute("min", today);

// AUTO PAYMENT LOGIC
const appointmentType = document.getElementById("appointmentType");
const paymentMethod = document.getElementById("paymentMethod");

appointmentType.addEventListener("change", function () {

    if (this.value === "online") {

        paymentMethod.value = "jazzcash";

    } else if (this.value === "physical") {

        paymentMethod.value = "cash";
    }
});

</script>
</body>
</html>