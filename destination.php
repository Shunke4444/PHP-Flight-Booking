<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type='image/png' href="assets/ICON.png">
    <title>Destination</title>
    <link rel="stylesheet" href="styles/destination.css" />
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
 <div class="container">
        <h1 class="page-title">Where do you want to stay?</h1>
        <div class="search-bar">
    <input type="text" id="search-input" placeholder="Search hotels by name or amenities...">
    <i class="fas fa-search"></i>
</div>

        <div class="hotel-cards">
        </div>
    </div>

    <!-- Modal Structure -->
    <main id="hotelModal" class="modal">
        <div class="modal-content">
            <span class="close-modal">&times;</span>
            <div class="modal-header">
                <h2 id="modal-hotel-name"></h2>
                <div class="modal-rating" id="modal-rating"></div>
                <div class="modal-distance" id="modal-distance"></div>
            </div>
            <div class="modal-body">
                <img id="modal-hotel-image" src="" alt="" class="modal-image">
                <div class="modal-details">
                    <h3>About This Hotel</h3>
                    <p id="modal-description"></p>
                    <div class="amenities">
                        <h4>Popular Amenities:</h4>
                        <ul id="modal-amenities"></ul>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="price-container">
                    <span id="modal-price"></span>
                    <span class="price-period">per night</span>
                </div>
                <a href="#" id="book-now-btn" class="btn-primary">Book Now</a>
            </div>
        </div>
    </main>
  <script src="destination.js"></script>
  
</body>
</html>