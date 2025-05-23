<?php
// session_start();
// if (!isset($_SESSION["user_id"]) || !isset($_SESSION["username"])) {
//     header("Location: login.php");
//     exit;
// }

// if (isset($_POST['logout'])) {
//     session_unset();
//     session_destroy();
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
          <a href="travelLog.php" class="nav-link"><i class="fa-solid fa-bookmark"></i><span class="nav-text">Travel Logs</span></a>
        </span>
        <span class="icon">
          <a href="travelPlanner.php" class="nav-link travel-planner-btn"><i class="fa-solid fa-route"></i><span class="nav-text">Travel Planner</span></a>
        </span>
        <span class="icon">
          <a href="destination.php" class="nav-link"><i class="fa-solid fa-globe"></i><span class="nav-text">Destination</span></a>
        </span>
      </div>  
      <div class="logo">
        <a href="../PHP-Flight-Booking/landingPage.php">
          <img src="../PHP-Flight-Booking/assets/LOGO.png" alt="">
        </a>
      </div>
      <div class="nav-right">
        <form method="post">
          <button type="submit" name="logout" class="logout">
            <i class="fa-solid fa-right-from-bracket"></i>
            <span class="nav-text">Logout</span>
          </button>
        </form>
      </div>
    </nav>
  </header>

  <section class="hero">
    <div class="hero-overlay"></div>
    <div class="hero-text">
      <h1>Make your travel wishlist, we'll do the rest.</h1>
      <p>Special places for your special self.</p>
    </div>
  </section>

  <section class="world-loc">
    <article class="world-loc-content">
      <span class="world-loc-text">
        <h1>Explore the world with Compass!</h1>
        <p>Discover new places with our smart travel planner.</p>
      </span>
      <span class="btn-container">
        <a href="#" class="explore-btn">Book now!</a>
      </span>
    </article>
    <aside class="world-banner"></aside>
  </section>

  <section class="travel">
    <article class="travel-text">
      <span class="travel-text-content">
        <h1>Enjoy our exclusive destinations!</h1>
        <p>We are here to make your travel experience unforgettable.</p>
      </span>
      <span class="travel-btn-container">
        <a href="#" class="travel-btn">Book now</a>
      </span>
    </article>

    <article class="travel-cards-container">
      <div class="travel-card">
        <img src="../PHP-Flight-Booking/assets/ScalingMountain.jpg" alt="Melbourne" />
        <h2>Climbing Myongming's Devil Tower</h2>
        <p>Explore the highest peaks, challenge and conquer them!</p>
        <footer class="card-footer">
          <span class="price">₱7000</span>
          <a href="../PHP-Flight-Booking/myongming.php" class="book-btn">More Information</a>
        </footer>
      </div>
      <div class="travel-card">
        <img src="../PHP-Flight-Booking/assets/Hiking.jpeg" alt="Paris" />
        <h2>Hiking the rich Greenland</h2>
        <p>Explore the beauty of nature within Greenland!</p>
        <footer class="card-footer">
          <span class="price">₱6000</span>
          <a href="../PHP-Flight-Booking/greenland.php" class="book-btn">More Information</a>
        </footer>
      </div>
      <div class="travel-card">
        <img src="../PHP-Flight-Booking/assets/Cycling.webp" alt="London" />
        <h2>Cycling in New Zealand</h2>
        <p>Shred NZ’s scenery, mountains, and hidden trails suited for adrenaline-fueled riders.</p>
        <footer class="card-footer">
          <span class="price">₱3500</span>
          <a href="../PHP-Flight-Booking/newzealand.php" class="book-btn">More Information</a>
        </footer>
      </div>
      <div class="travel-card">
        <img src="../PHP-Flight-Booking/assets/DrinkingParty.webp" alt="London" />
        <h2>Summertime in South California</h2>
        <p>An energetic party with your loved ones!</p>
        <footer class="card-footer">
          <span class="price">₱3500</span>
          <a href="../PHP-Flight-Booking/southcalifornia.php" class="book-btn">More Information</a>
        </footer>
      </div>    
    </article>
  </section>

  <footer class="footer">
    <div class="footer-top">
      <div class="footer-column">
        <span class="foot-logo">
          <img src="../PHP-Flight-Booking/assets/LOGO.png" alt="">
        </span>
      </div>
      <div class="footer-column">
        <p><strong>SERVICES</strong></p>
        <p>Final Requirment, Compass Website</p>
      </div>
      <div class="footer-column">
        <p><strong>GROUP 9</strong></p>
        <p>WIDGETKIT</p>
        <p>SUPPORT</p>
      </div>
      <div class="footer-column">
        <p><strong>ABOUT US</strong></p>
        <p>JIHAD TEJAM</p>
        <p>ARON VINCULADO</p>
        <p>PATRICK SANTIAGO</p>
        <p>MARK SANTOS</p>
        <p>ASHLEY VASCO</p>
      </div>
    </div>
    <hr>
    <div class="footer-bottom">
      <div class="social-icons">
        <a href="#"><i class="fab fa-facebook-f"></i></a>
        <a href="#"><i class="fab fa-twitter"></i></a>
        <a href="#"><i class="fab fa-rss"></i></a>
        <a href="#"><i class="fab fa-google-plus-g"></i></a>
        <a href="#"><i class="fab fa-flickr"></i></a>
      </div>
      <p>&copy; Copyright. All rights reserved.</p>
    </div>
  </footer>
  
</body>
</html>