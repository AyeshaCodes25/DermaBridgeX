<!DOCTYPE html>
<html>
<head>
<title>Update Appointment</title>

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Segoe UI', sans-serif;
}

body{
    background: linear-gradient(to right, #e0f2fe, #f0f9ff);
    display:flex;
    justify-content:center;
    align-items:center;
    min-height:100vh;
}

/* CARD */
.container{
    width:420px;
    background:white;
    padding:30px;
    border-radius:15px;
    box-shadow:0 10px 25px rgba(0,0,0,0.1);
}

/* TITLE */
.container h2{
    text-align:center;
    margin-bottom:20px;
    color:#0f172a;
}

/* INPUT FIELDS */
input, select{
    width:100%;
    padding:12px;
    margin:10px 0;
    border-radius:8px;
    border:1px solid #cbd5e1;
    outline:none;
    transition:0.3s;
}

input:focus, select:focus{
    border-color:#0ea5e9;
    box-shadow:0 0 5px rgba(14,165,233,0.3);
}

/* BUTTON */
button{
    width:100%;
    padding:12px;
    background:#0ea5e9;
    color:white;
    border:none;
    border-radius:8px;
    font-size:16px;
    cursor:pointer;
    transition:0.3s;
}

button:hover{
    background:#0284c7;
}
</style>

</head>
<body>

<div class="container">

<h2>Update Appointment</h2>

<?php
include("connection.php");

/* FETCH DATA */
$editData = [];

if(isset($_GET['id'])){

    $id = $_GET['id'];

    $query = "SELECT * FROM book_appointment 
              WHERE `book-appointment_ID`='$id'";

    $result = mysqli_query($conn, $query);

    if($result && mysqli_num_rows($result) > 0){
        $editData = mysqli_fetch_assoc($result);
    } else {
        echo "<p style='color:red;'>Appointment not found!</p>";
    }
}

/* UPDATE DATA */
if(isset($_POST['update'])){

    $id = $_POST['id'];
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

    $update = "UPDATE book_appointment SET

    Doctor='$doctor',
    Full_Name='$name',
    Email='$email',
    Gender='$gender',
    Age='$age',
    Skin_type='$skin',
    Medical_history='$history',
    appointment_date='$date',
    appointment_time='$time',
    appointment_type='$type',
    payment_method='$payment'

    WHERE `book-appointment_ID`='$id'";

    $run = mysqli_query($conn, $update);

    if($run){
        echo "<script>
                alert('Appointment Updated Successfully');
                window.location.href='appointment.php';
              </script>";
    } else {
        echo "<p style='color:red;'>Update Failed!</p>";
    }
}
?>

<form method="POST">

<input type="hidden" name="id"
value="<?php echo $editData['book-appointment_ID'] ?? ''; ?>">

<input type="text" name="name"
value="<?php echo $editData['Full_Name'] ?? ''; ?>"
placeholder="Patient Name" required>

<input type="text" name="doctor"
value="<?php echo $editData['Doctor'] ?? ''; ?>"
placeholder="Doctor Name" required>






<input type="date" name="date"
value="<?php echo $editData['appointment_date'] ?? ''; ?>"
required>

<input type="time" name="time"
value="<?php echo $editData['appointment_time'] ?? ''; ?>"
required>





</select>

<button type="submit" name="update">
Update Appointment
</button>

</form>

</div>

</body>
</html>