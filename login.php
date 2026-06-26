<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "dermabridgex");

if (!$conn) {
    die("Connection Failed");
}

$error = "";

/* SHOW SESSION ERROR (SAFE) */
if(isset($_SESSION['login_error'])){
    $error = $_SESSION['login_error'];
    unset($_SESSION['login_error']);
}

/* ================= LOGIN PROCESS ================= */
if(isset($_POST['login'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

    // CHECK USER
    $query = mysqli_query($conn,
    "SELECT * FROM signup WHERE Email='$email'");

    if(mysqli_num_rows($query) > 0){

        $row = mysqli_fetch_assoc($query);

        // PASSWORD CHECK
        if(password_verify($password, $row['Password'])){

            $_SESSION['user'] = $row['Name'];

            // ADMIN LOGIN
            if($row['Role'] == "admin"){
                header("Location: adminpanel/dashboard.php");
                exit();
            }

            // DOCTOR LOGIN
            elseif($row['Role'] == "doctor"){
                header("Location: doctorpanel/dashboard.php");
                exit();
            }

            // NORMAL USER
            else{
                header("Location: index.php");
                exit();
            }

        } else {
            $error = "Wrong Password!";
        }

    } else {
        $error = "Email Not Found!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Login</title>

<style>

/* BODY */
body{
    margin:0;
    padding:0;
    font-family:Arial, sans-serif;
    background:#f4f7fb;
    overflow:hidden;
    position:relative;
}

/* 🔹 BACKGROUND ICONS */
.background-icons{
    position:fixed;
    width:100%;
    height:100%;
    top:0;
    left:0;
    z-index:-1;
}

.background-icons span{
    position:absolute;
    font-size:50px;
    opacity:0.08;
    animation:float 8s infinite ease-in-out;
}

/* ICON POSITIONS */
.background-icons span:nth-child(1){ top:10%; left:15%; }
.background-icons span:nth-child(2){ top:25%; left:75%; }
.background-icons span:nth-child(3){ top:55%; left:10%; }
.background-icons span:nth-child(4){ top:70%; left:80%; }
.background-icons span:nth-child(5){ top:40%; left:50%; }
.background-icons span:nth-child(6){ top:85%; left:35%; }

@keyframes float{
    0%{ transform:translateY(0px); }
    50%{ transform:translateY(-20px); }
    100%{ transform:translateY(0px); }
}

/* LOGIN BOX */
.container{
    width:100%;
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
}

/* FORM BOX */
.box{
    width:350px;
    background:white;
    padding:35px;
    border-radius:15px;
    box-shadow:0 0 20px rgba(0,0,0,0.1);
    position:relative;
    z-index:1;
}

h2{
    text-align:center;
    margin-bottom:25px;
    color:#0b3d4a;
}

.input-group{
    margin-bottom:18px;
}

label{
    display:block;
    margin-bottom:6px;
    font-weight:bold;
    color:#333;
}

input{
    width:100%;
    padding:12px;
    border:1px solid #ccc;
    border-radius:8px;
    outline:none;
    font-size:14px;
}

input:focus{
    border-color:#0b3d4a;
}

button{
    width:100%;
    padding:12px;
    border:none;
    border-radius:8px;
    background:#0b3d4a;
    color:white;
    font-size:16px;
    cursor:pointer;
    transition:0.3s;
}

button:hover{
    background:#14596b;
}

.error{
    color:red;
    text-align:center;
    margin-bottom:15px;
}

</style>

</head>

<body>

<!-- BACKGROUND -->
<div class="background-icons">
    <span>⚕️</span>
    <span>💊</span>
    <span>🩺</span>
    <span>🧬</span>
    <span>🧪</span>
    <span>🏥</span>
</div>

<div class="container">

    <div class="box">

        <h2>Login</h2>

        <?php if($error != ""): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>

        <form method="POST">

            <div class="input-group">
                <label>Email</label>
                <input type="email" name="email" required>
            </div>

            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password" required>
            </div>

            <button type="submit" name="login">Login</button>

        </form>

    </div>

</div>

</body>
</html>