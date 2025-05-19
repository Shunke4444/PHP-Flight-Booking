<?php
// session_start();
// if (!isset($_SESSION["user_id"]) || !isset($_SESSION["username"])) {
//     header("Location: login.php");
//     exit;
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" type='image/png' href="assets/ICON.png">
  <title>Compass</title>
  <link rel="stylesheet" href="styles/landingPage.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Libre+Franklin:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/5756001ff6.js" crossorigin="anonymous"></script>
</head>
<body>
  <header class="nav-header">
    <nav class="navbar">
         <div class="nav-left">

        <span class="icon">
          <a href="#" class="nav-link">
            <i class="fa-solid fa-plane"></i>
            <span class="nav-text">Find Flight</span>
          </a>

        </span>
        <span class="icon">
          <a href="#" class="nav-link"><i class="fa-solid fa-map"></i><span class="nav-text">Find Stays</span></a>
        </span>
      </div>  

   <div class="logo">
      <img src="../PHP-Flight-Booking/assets/LOGO.png" alt="">
   </div>
    <div class="nav-right">
      <button class="logout">
        <i class="fa-solid fa-right-from-bracket"></i>
          <span class="nav-text">Logout</span>
        </button>
      </div>
    </nav>
  </header>

  <section class="hero">
    <div class="hero-overlay"></div>
    <div class="hero-text">
      <h1>Make your travel wishlist, we'll do the rest.</h1>
      <p>Special places for your special self.
      </p>
    
    </div>
  </section>

<section class="world-loc">
  <article class="world-loc-content">
    <span class="world-loc-text">
      <h1>Explore World Destinations</h1>
      <p>Discover new places with our smart travel planner.</p>
    </span>
  <span class="btn-container">
    <a class="explore-btn">Explore</a>
  </span>
  </article>
  <aside class="world-banner"></aside>

</section>



  <script src="script.js"></script>
</body>
</html>

