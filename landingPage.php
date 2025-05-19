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
  <title>Golobe Travel</title>
  <link rel="stylesheet" href="styles/landingPage.css" />
  <script src="https://kit.fontawesome.com/5756001ff6.js" crossorigin="anonymous"></script>
</head>
<body>
  <header class="nav-header">
    <nav class="navbar">
      <div class="nav-left">
        <a href="#" class="nav-link"> <i class="fa-solid fa-plane"></i> Find Flight</a>
        <a href="#" class="nav-link">Find Stays</a>
      </div>

      <p class="logo">Compass</p>
      <div class="nav-right">
        <button class="logout">Logout</button>
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
  
  <script src="script.js"></script>
</body>
</html>

