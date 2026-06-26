<?php
// ================= DATABASE CONNECTION =================
$conn = mysqli_connect("localhost","root","","dermabridgex");

if(!$conn){
    die("Connection Failed: " . mysqli_connect_error());
}

// ================= INSERT LOGIC =================
if($_SERVER["REQUEST_METHOD"] == "POST"){

    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age_group = $_POST['age_group'];
    $skin_type = $_POST['skin_type'];
    $water_intake = $_POST['water_intake'];
    $skin_concern = $_POST['skin_concern'];
    $lifestyle = $_POST['lifestyle'];

    $sql = "INSERT INTO skin_assessment 
    (name, gender, age_group, skin_type, water_intake, skin_concern, lifestyle)

    VALUES
    ('$name','$gender','$age_group','$skin_type',
    '$water_intake','$skin_concern','$lifestyle')";

    if(mysqli_query($conn,$sql)){
        header("Location: result.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Skin Assessment</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="CSS/skinassessment.css">

</head>

<body>

<nav class="navbar navbar-expand-lg fixed-top">
  <div class="container-fluid">

    <a class="navbar-brand me-auto" href="#">
      <img src="Images/logo3.png" alt="DermaBridgeX Logo" height="50">
    </a>

    <button class="navbar-toggler" type="button" 
    data-bs-toggle="offcanvas" 
    data-bs-target="#offcanvasNavbar">

      <span class="navbar-toggler-icon"></span>

    </button>

    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar">

      <div class="offcanvas-header">
        <h5 class="offcanvas-title">Logo</h5>

        <button type="button" class="btn-close" 
        data-bs-dismiss="offcanvas"></button>
      </div>

      <div class="offcanvas-body">

        <ul class="navbar-nav justify-content-center flex-grow-1 pe-3">

          <li class="nav-item">
            <a class="nav-link active" href="index.php">Home</a>
          </li>

          <li class="nav-item">
            <a class="nav-link mx-lg-2" href="about.php">Our Story</a>
          </li>

          <li class="nav-item">
            <a class="nav-link mx-lg-2" href="blogs.php">Insights</a>
          </li>

          <li class="nav-item">
            <a class="nav-link mx-lg-2" href="appointment.php">
              My Appointments
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link mx-lg-2" href="feedback.php">Feedback</a>
          </li>

        </ul>
      </div>
    </div>

    <a href="signup.php" class="Signup-button">Get Started</a>

    <a href="login.php" class="login-button">Login</a>

  </div>
</nav>

<!-- Floating Background -->
<div class="background-animation">
  <span>💧</span>
  <span>✨</span>
  <span>🌿</span>
  <span>💧</span>
  <span>✨</span>
  <span>🌿</span>
</div>

<!-- Progress Bar -->
<div class="progress-container">
  <div class="progress-bar" id="progressBar"></div>
</div>

<div class="container">

<h1>DermabridgeX Skin Analysis</h1>

<form method="POST" id="assessmentForm">

<p class="subtitle">
Answer a few questions for your personalized routine
</p>

<div class="info-card">

  <div class="info-image">
    <img src="images/skinass.jpg" alt="Skin Assessment">
  </div>

  <div class="info-text">

    <h2>Why Skin Assessment Matters</h2>

    <p>
      A proper skin assessment helps identify your skin type,
      hydration level, and underlying concerns.
      This ensures that your skincare routine is effective,
      safe, and tailored to your unique needs.
    </p>

  </div>
</div>

<!-- NAME -->
<div class="quiz-card fade-slide question n1">

<h2>1. Your Name</h2>

<div class="options">

<input type="text"
name="name"
class="form-control p-3"
placeholder="Enter your full name"
required>

</div>

</div>

<!-- GENDER -->
<div class="quiz-card fade-slide question">

<h2>2. Gender</h2>

<div class="options">

<div class="option"
onclick="setValue(this,'gender','Male')">
Male
</div>

<div class="option"
onclick="setValue(this,'gender','Female')">
Female
</div>

<div class="option"
onclick="setValue(this,'gender','Other')">
Other
</div>

</div>

<input type="hidden" name="gender" id="gender">

</div>

<!-- AGE -->
<div class="quiz-card fade-slide question">

<h2>3. Age Group</h2>

<div class="options">

<div class="option"
onclick="setValue(this,'age_group','Under 18')">
Under 18
</div>

<div class="option"
onclick="setValue(this,'age_group','18-25')">
18-25
</div>

<div class="option"
onclick="setValue(this,'age_group','26-35')">
26-35
</div>

<div class="option"
onclick="setValue(this,'age_group','36+')">
36+
</div>

</div>

<input type="hidden" name="age_group" id="age_group">

</div>

<!-- SKIN TYPE -->
<div class="quiz-card fade-slide question">

<h2>4. Skin Type</h2>

<div class="options img-options">

<div class="option"
onclick="setValue(this,'skin_type','Dry')">

<img src="images/dry.jpg">
<p>Dry</p>

</div>

<div class="option"
onclick="setValue(this,'skin_type','Oily')">

<img src="images/oily.jpg">
<p>Oily</p>

</div>

<div class="option"
onclick="setValue(this,'skin_type','Combination')">

<img src="images/combination.jpg">
<p>Combination</p>

</div>

<div class="option"
onclick="setValue(this,'skin_type','Normal')">

<img src="images/normal.jpg">
<p>Normal</p>

</div>

</div>

<input type="hidden" name="skin_type" id="skin_type">

</div>

<!-- WATER -->
<div class="quiz-card fade-slide question">

<h2>5. Water Intake</h2>

<div class="options">

<div class="option"
onclick="setValue(this,'water_intake','1-3 glasses')">
1–3 glasses
</div>

<div class="option"
onclick="setValue(this,'water_intake','4-6 glasses')">
4–6 glasses
</div>

<div class="option"
onclick="setValue(this,'water_intake','7-9 glasses')">
7–9 glasses
</div>

<div class="option"
onclick="setValue(this,'water_intake','10+')">
10+
</div>

</div>

<input type="hidden" name="water_intake" id="water_intake">

</div>

<!-- CONCERN -->
<div class="quiz-card fade-slide question">

<h2>6. Skin Concern</h2>

<div class="options img-options">

<div class="option"
onclick="setValue(this,'skin_concern','Pimples')">

<img src="images/pimples.jpg">
<p>Pimples</p>

</div>

<div class="option"
onclick="setValue(this,'skin_concern','Dryness')">

<img src="images/dryness.jpg">
<p>Dryness</p>

</div>

<div class="option"
onclick="setValue(this,'skin_concern','Oiliness')">

<img src="images/oilyness.jpg">
<p>Oiliness</p>

</div>

<div class="option"
onclick="setValue(this,'skin_concern','Dark Spots')">

<img src="images/darkspots.jpg">
<p>Dark Spots</p>

</div>

<div class="option center-option"
onclick="setValue(this,'skin_concern','Open Pores')">

<img src="images/openpores.jpg">
<p>Open Pores</p>

</div>

</div>

<input type="hidden" name="skin_concern" id="skin_concern">

</div>

<!-- LIFESTYLE -->
<div class="quiz-card fade-slide question">

<h2>7. Lifestyle</h2>

<div class="options">

<div class="option"
onclick="setValue(this,'lifestyle','Healthy lifestyle')">
Healthy lifestyle
</div>

<div class="option"
onclick="setValue(this,'lifestyle','Moderate stress')">
Moderate stress
</div>

<div class="option"
onclick="setValue(this,'lifestyle','High stress & poor sleep')">
High stress & poor sleep
</div>

</div>

<input type="hidden" name="lifestyle" id="lifestyle">

</div>

<button type="submit" class="submit-btn">
Get My Routine
</button>

</form>
</div>
<script>

let answered = new Set();
const total = 6;
function setValue(el, field, value){
  /* REMOVE OLD SELECTED */
  let parent = el.parentElement;
  let options = parent.querySelectorAll(".option");
  options.forEach(opt=>{
    opt.classList.remove("selected");
  });

  /* ADD NEW SELECTED */
  el.classList.add("selected");

  /* SAVE VALUE */
  document.getElementById(field).value = value;
  answered.add(field);
  updateProgress();

  /* FIND CURRENT QUESTION */
  let currentQuestion = el.closest(".question");

  /* FIND ALL QUESTIONS */
  let allQuestions = document.querySelectorAll(".question");
  
  /* GET CURRENT INDEX */
  let currentIndex = Array.from(allQuestions)
  .indexOf(currentQuestion);

  /* NEXT QUESTION */
  let nextQuestion = allQuestions[currentIndex + 1];

  /* SCROLL */
  if(nextQuestion){

    setTimeout(()=>{

      nextQuestion.scrollIntoView({
        behavior:"smooth",
        block:"center"
      });

    },300);
  }
}
function updateProgress(){

  let percent = (answered.size / total) * 100;

  document.getElementById("progressBar").style.width =
  percent + "%";
}
document.getElementById("assessmentForm")
.addEventListener("submit", function(e){

  let requiredFields = [
    "gender",
    "age_group",
    "skin_type",
    "water_intake",
    "skin_concern",
    "lifestyle"
  ];

  for(let field of requiredFields){

    let value = document.getElementById(field).value;

    if(value === ""){

      e.preventDefault();

      alert("Please answer all questions.");

      return;
    }
  }
});

</script>

</body>
</html>