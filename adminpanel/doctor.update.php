<!DOCTYPE html>
<html>
<head>
<title>Update Doctor</title>

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
input{
    width:100%;
    padding:12px;
    margin:10px 0;
    border-radius:8px;
    border:1px solid #cbd5e1;
    outline:none;
    transition:0.3s;
}

input:focus{
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

<h2>Update Doctor</h2>

<?php
include("connection.php");

// STEP 1: Data fetch
if(isset($_GET['id'])){
    $id = $_GET['id'];

    $query = "SELECT * FROM doctor WHERE Doctor_id = '$id'";
    $r = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($r);
}

// STEP 2: Update
if(isset($_POST['update'])){

    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $spec = $_POST['spec'];
    $phone = $_POST['phone'];

    $update = "UPDATE doctor
               SET Name='$name', Email='$email', Specialization='$spec', phone='$phone'
               WHERE Doctor_id='$id'";

    $res = mysqli_query($conn, $update);

    if($res){
        header("Location: doctor.php");
    }
}
?>

<form method="POST">
    
<input type="hidden" name="id" value="<?php echo $row['Doctor_id']; ?>">

<input type="text" name="name" value="<?php echo $row['Name']; ?>" placeholder="Doctor Name" required>

<input type="email" name="email" value="<?php echo $row['Email']; ?>" placeholder="Email" required>

<input type="text" name="spec" value="<?php echo $row['Specialization']; ?>" placeholder="Specialization" required>

<input type="text" name="phone" value="<?php echo $row['phone']; ?>" placeholder="Phone" required>

<button type="submit" name="update">Update Doctor</button>

</form>

</div>

</body>
</html>