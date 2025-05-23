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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type='image/png' href="assets/ICON.png">
    <title>Travel Log</title>
    <link rel="stylesheet" href="styles/travellog.css" />
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
          <img src="../PHP-Flight-Booking/assets/WALOGO.png" alt="">
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

    <main>
        <section class="input-section">
            <h2>Add a New Trip</h2>
            <form id="travel-form">
                <label for="destination">Destination:</label>
                <input type="text" id="destination" placeholder="Where did you go?" required>
                
                <label for="date">Date of Travel:</label>
                <input type="date" id="date" required>
                
                <label for="notes">Notes:</label>
                <textarea id="notes" placeholder="What was the experience?" required></textarea>

                <label for="images">Upload Images:</label>
                <input type="file" id="images" multiple accept="image/*">
                <div id="image-preview" class="image-preview"></div>

                <button type="submit">Add Travel</button>
            </form>
        </section>

        <section class="travel-log">
            <h2>Your Travels</h2>
            <ul id="travel-list"></ul>
        </section>

        <template id="travel-entry-template">
          <li class="travel-entry">
            <button class="delete-btn" data-id=""><i class="fas fa-trash"></i></button>
            <h3 class="destination-title"></h3>
            <p class="date"></p>
            <p class="notes"></p>
            <div class="travel-images"></div>
          </li>
        </template>
    </main>

    <script src="travellog.js"></script>
</body>
</html>