<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DermaBridgeX</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

 <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
     <nav class="navbar navbar-expand-lg fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand me-auto" href="index.php">
    <img src="Images/logo3.png" alt="DermaBridgeX Logo" height="50">
</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Logo</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-center flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link mx-lg-2" href="about.php">Our Story</a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link mx-lg-2" href="blogs.php">Insights</a>
          </li>
          <li class="nav-item">
            <a class="nav-link mx-lg-2" href="appointment.php">My Appointments</a>
          </li>
          <li class="nav-item">
            <a class="nav-link mx-lg-2" href="feedback.php">Feedback</a>
          </li>
            </ul>
      </div>
    </div>

   <a href="signup.php" class="Signup-button" >Get Started</a>
  <button class="navbar-toggler pe-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
  <a href="login.php" class="login-button" >Login</a>
  <button class="navbar-toggler pe-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    </div>
</nav>
<section class="hero-section">
   <div class="hero-content">
        <h1 class="project-title">DermaBridgeX</h1>
        <p class="hero-slogan">
           “Because Every Skin Deserves Care”
        </p>
        <a href="skinassessment.php" class="hero-btn">Skin Assessment Quiz</a>
    </div>
</section>



    <section class="services-section">
    <div class="services-header">
        <h2>What I Can Offer to You</h2>
        <p>We provide expert solutions for your skin care needs.</p>
        <p>Explore our services below to take the best care of your skin.</p>
    </div>

    <div class="services-boxes">
        <!-- Skin Assessment -->
        <div class="service-box">
            <img src="Images/skin Assessment.jpg" alt="Skin Assessment Icon" class="service-icon">
            
            <h3 class="h">Skin Assessment</h3>
            <p>Get a detailed analysis of your skin using advanced AI-powered tools to understand your skin type and condition.</p>
        </div>

        <!-- Product Recommendations -->
        <div class="service-box">
            <img src="Images/pr.jpg" alt="Product Recommendations Icon" class="service-icon">
            <h3 class="h">Product Recommendations</h3>
            <p>Receive personalized skin care product suggestions and directly purchase them through our platform for convenience.</p>
        </div>

        <!-- Online Consultations -->
        <div class="service-box">
            <img src="Images/dr.jpg" alt="Online Consultation Icon" class="service-icon">
            <h3 class="h">Online Consultation</h3>
            <p>Connect with certified dermatologists via video call for expert advice and guidance on your skin care routine.</p>
        </div>
    </div>
</section>

<header>
    <h1 class="hh" id="doctor" >Top Doctors - DermaCare</h1>
</header>

<!-- Doctor 1 -->
<section class="doctor-section">
    <div class="doctor-image">
        <img src="images/dr male.jpg" alt="Dr Ali Khan">
    </div>

    <div class="doctor-info">
        <span class="small-heading">ABOUT DOCTOR</span>
        <h2>Hi, I am Dr. Ali Khan</h2>

        <p>
    I am a board-certified dermatologist specializing in the diagnosis 
    and treatment of various skin allergies and sensitive skin conditions.
</p>

<p>
    Experienced in treating eczema, contact dermatitis, urticaria (hives), 
    fungal infections, rashes, itching, and other allergic skin reactions.
</p>

<p>
    My goal is to accurately identify the root cause of skin allergies, 
    provide effective treatment plans, and help patients achieve healthy, 
    irritation-free skin.
</p>

       <a class="appointment-btn" href="setDoctor.php?doctor=Dr Ali Khan">
    Book Appointment
</a>
    </div>
</section>

<!-- Doctor 2 -->
<section class="doctor-section reverse">
    <div class="doctor-image">
       <img src="images/dr female.jpg" alt="Dr Sara">
    </div>

    <div class="doctor-info">
        <span class="small-heading">ABOUT DOCTOR</span>
        <h2>Hi, I am Dr. Sarah Ahmed</h2>

        <p>
    I am offering advanced acne treatment 
    solutions using modern dermatology technology.
</p>

<p>
    I specialize in treating mild to severe acne, acne scars, oily skin issues, 
    and hormonal breakouts with personalized care plans.
</p>

<p>
    My focus is on identifying the root cause of acne and providing safe, 
    effective treatments to help patients achieve clear, healthy, and 
    confident-looking skin.
</p>
 <a class="appointment-btn" href="setDoctor.php?doctor=Dr Sarah Ahmed">
    Book Appointment
</a>
    </div>
</section>

<!-- Quote -->
<section class="quote">
    <h3>
        "«No matter what shape or size you are,<br> you should feel confident in your own skin.<br> You should feel like a beautiful woman!»"<br>
    </h3>
</section>

<!-- blog section -->
<section class="blog-section">
  <div class="blog-container">

    <!-- Left Side -->
    <div class="blog-left">
      <span class="small-title">ARTICLES</span>
      <h1 class="bl">From My <br> Blog</h1>
      <p>Read articles about cosmetology and beauty tricks to preserve youth.</p>
      <a href="blogs.php" class="view-btn">View All</a>
    </div>

    <!-- Right Side -->
    <div class="blog-right">

      <div class="blog-card">
        <div class="img-container">
          <img src="images/blog1.jpg" alt="Acne Prevention">
        </div>
        <h2>The Ultimate Guide to Acne Prevention</h2>
        <a href="blogs.php#22">Read More →</a>
      </div>

      <div class="blog-card">
        <div class="img-container">
          <img src="images/blog2.jpg" alt="Guide to Balanced, Healthy Skin">
        </div>
        <h2>Your Guide to Balanced, Healthy Skin</h2>
        <a href="blogs.php#11">Read More →</a>
      </div>

    </div>

  </div>
</section>
</section>

<!-- Footer -->
<footer class="footer">

    <div class="footer-container">

        <!-- Left -->
        <div class="footer-left">
            <h2>Get in Touch</h2>
            <p>derma@email.com</p>
            <p>+1 (123) 111 22 00</p>
            <p>+1 (123) 333 44 01</p>
        </div>

        <!-- Center -->
        <div class="footer-center">
            <img src="images/logo3.png" alt="Clinic Logo" class="footer-logo">
            <p class="footer-text">
                DermaBridgeX where healthy skin meets lasting radiance.
            </p>

            <div class="social-icons">
                <i class="fab fa-facebook-f"></i>
                <i class="fab fa-instagram"></i>
                <i class="fab fa-twitter"></i>
                <i class="fab fa-youtube"></i>
            </div>
        </div>

        <!-- Right -->
        <div class="footer-right">
            <h2>Information</h2>
            <ul>
        <li><a href="about.php">Our Story</a></li>
        <li><a href="blogs.php">Insights</a></li>
        <li><a href="appointment.php">My Appointments</a></li>
        <li><a href="feedback.php">Feedback</a></li>
            </ul>
        </div>

    </div>

</footer>
<div class="chatbot-icon" id="chatbotBtn" onclick="toggleChatbot(event)">
    <img src="https://cdn-icons-png.flaticon.com/512/4712/4712109.png" alt="chatbot">
</div>

<div class="chatbot-box" id="chatbot">
    <div class="chat-header">
        <h3>DermaBridgeX Assistant 🤍</h3>
       
    </div>

    <div class="chat-body" id="chatBody"></div>
</div>

<!-- Only link file -->
<script src="Javascript/chatbot.js" defer></script>
<!-- Font Awesome CDN for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
</script>
</body>
</html>