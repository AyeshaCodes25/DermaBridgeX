<?php
session_start();

// DATABASE CONNECTION
$conn = mysqli_connect("localhost", "root", "", "dermabridgex");

if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}

/* =========================
   SIGNUP
========================= */
if (isset($_POST['signup'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $role = $_POST['role'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // CHECK EMAIL
    $check = $conn->prepare("SELECT Email FROM signup WHERE Email=?");
    $check->bind_param("s", $email);
    $check->execute();
    $check->store_result();

    if ($check->num_rows > 0) {

        echo "<script>alert('User already registered!');</script>";

    } else {

        // INSERT USER
        $stmt = $conn->prepare("INSERT INTO signup (Name, Email, Password, Role) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $email, $password, $role);

        if ($stmt->execute()) {

            echo "<script>
                    alert('Signup Successful! Please Login');
                    window.onload = function(){
                        showLogin();
                    }
                  </script>";

        } else {

            echo "Error: " . $stmt->error;
        }
    }
}

/* =========================
   LOGIN
========================= */
if (isset($_POST['login'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    // PREPARED STATEMENT
    $stmt = $conn->prepare("SELECT * FROM signup WHERE Email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {

        $row = $result->fetch_assoc();

        // PASSWORD VERIFY
        if (password_verify($password, $row['Password'])) {

            $_SESSION['user'] = $row['Name'];

            // ADMIN
            if ($row['Role'] == "admin") {

                header("Location: adminpanel/dashboard.php");
                exit();
            }

            // DOCTOR
            elseif ($row['Role'] == "doctor") {

                header("Location: doctorpanel/dashboard.php");
                exit();
            }

            // USER
            else {

                header("Location: Bookappointment.php");
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
<link rel="stylesheet" href="CSS/logsig.css">
<title>Signup & Login</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial, sans-serif;
}

body{
    background:#f2f2f2;
    display:flex;
    justify-content:center;
    align-items:center;
    min-height:100vh;
}

.container{
    width:400px;
    background:white;
    padding:40px;
    border-radius:12px;
    box-shadow:0 0 15px rgba(0,0,0,0.1);
}

h2{
    text-align:center;
    margin-bottom:25px;
    color:#0d3b45;
}

.input-group{
    margin-bottom:18px;
}

.input-group label{
    display:block;
    margin-bottom:6px;
    font-size:14px;
}

.input-group input,
.input-group select{
    width:100%;
    padding:12px;
    border:1px solid #ccc;
    border-radius:6px;
    font-size:14px;
}

button{
    width:100%;
    padding:12px;
    background:#0d3b45;
    color:white;
    border:none;
    border-radius:6px;
    font-size:16px;
    cursor:pointer;
}

button:hover{
    background:#145563;
}

.toggle{
    text-align:center;
    margin-top:18px;
}

.toggle a{
    color:#0d3b45;
    text-decoration:none;
    font-weight:bold;
}

.error{
    background:#ffdddd;
    color:red;
    padding:10px;
    margin-bottom:15px;
    border-radius:5px;
    text-align:center;
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
.background-icons span:nth-child(1){
    top:10%;
    left:15%;
}

.background-icons span:nth-child(2){
    top:25%;
    left:75%;
}

.background-icons span:nth-child(3){
    top:55%;
    left:10%;
}

.background-icons span:nth-child(4){
    top:70%;
    left:80%;
}

.background-icons span:nth-child(5){
    top:40%;
    left:50%;
}

.background-icons span:nth-child(6){
    top:85%;
    left:35%;
}

/* FLOAT ANIMATION */
@keyframes float{

    0%{
        transform:translateY(0px);
    }

    50%{
        transform:translateY(-20px);
    }

    100%{
        transform:translateY(0px);
    }
}

</style>

</head>

<body>
<!-- 🔹 BACKGROUND -->
<div class="background-icons">
    <span>⚕️</span>
    <span>💊</span>
    <span>🩺</span>
    <span>🧬</span>
    <span>🧪</span>
    <span>🏥</span>
</div>
<div class="container">

    <!-- =====================
         SIGNUP FORM
    ====================== -->
    <form id="signupForm" method="POST">

        <h2>Create Account</h2>

        <div class="input-group">
            <label>Full Name</label>
            <input type="text" name="name" required>
        </div>

        <div class="input-group">
            <label>Email</label>
            <input type="email" name="email" required>
        </div>

        <div class="input-group">

            <label>Role</label>

            <select name="role" required>
                <option value="">Select Role</option>
                <option value="doctor">Doctor</option>
                <option value="admin">Admin</option>
                <option value="user">User</option>
            </select>

        </div>

        <div class="input-group">
            <label>Password</label>
            <input type="password" name="password" required>
        </div>

        <button type="submit" name="signup">
            Sign Up
        </button>

        <div class="toggle">
            Already have an account?
            <a href="#" onclick="showLogin()">Login</a>
        </div>

    </form>

    <!-- =====================
         LOGIN FORM
    ====================== -->
    <form id="loginForm" method="POST" style="display:none;">

        <h2>Login</h2>

        <?php
        if(isset($error)){
            echo "<div class='error'>$error</div>";
        }
        ?>

        <div class="input-group">
            <label>Email</label>
            <input type="email" name="email" required>
        </div>

        <div class="input-group">
            <label>Password</label>
            <input type="password" name="password" required>
        </div>

        <button type="submit" name="login">
            Login
        </button>

        <div class="toggle">
            Don't have an account?
            <a href="#" onclick="showSignup()">Signup</a>
        </div>

    </form>

</div>

<script>

// SHOW LOGIN
function showLogin(){

    document.getElementById("signupForm").style.display = "none";
    document.getElementById("loginForm").style.display = "block";
}

// SHOW SIGNUP
function showSignup(){

    document.getElementById("signupForm").style.display = "block";
    document.getElementById("loginForm").style.display = "none";
}

</script>

</body>
</html>