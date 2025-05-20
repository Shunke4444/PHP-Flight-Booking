<?php
// session_start();
// if (!isset(₱_SESSION["user_id"]) || !isset(₱_SESSION["username"])) {
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
          <a href="#" class="nav-link travel-planner-btn"><i class="fa-solid fa-route"></i><span class="nav-text">Travel Planner</span></a>
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
      <p>Special places for your special self.</p>
    </div>
  </section>

  <section class="world-loc">
    <article class="world-loc-content">
      <span class="world-loc-text">
        <h1>Explore World Destinations</h1>
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
          <a href="#" class="book-btn">More Information</a>
        </footer>
      </div>
      <div class="travel-card">
        <img src="../PHP-Flight-Booking/assets/Hiking.jpeg" alt="Paris" />
        <h2>Hiking</h2>
        <p>Explore the beauty of nature within Greenland!</p>
        <footer class="card-footer">
          <span class="price">₱6000</span>
          <a href="#" class="book-btn">More Information</a>
        </footer>
      </div>
      <div class="travel-card">
        <img src="../PHP-Flight-Booking/assets/Cycling.webp" alt="London" />
        <h2>Cycling in New Zealand</h2>
        <p>Shred NZ’s scenery, mountains, and hidden trails suited for adrenaline-fueled riders.</p>
        <footer class="card-footer">
          <span class="price">₱3500</span>
          <a href="#" class="book-btn">More Information</a>
        </footer>
      </div>
      <div class="travel-card">
        <img src="../PHP-Flight-Booking/assets/DrinkingParty.webp" alt="London" />
        <h2>Summertime in South California</h2>
        <p>An energetic party with your loved ones!</p>
        <footer class="card-footer">
          <span class="price">₱3500</span>
          <a href="#" class="book-btn">More Information</a>
        </footer>
      </div>    
    </article>
  </section>

  <footer class="footer">
    <div class="footer-top">
      <div class="footer-column">
        <span class="foot-logo">
          <img src="../PHP-Flight-Booking//assets/LOGO.png" alt="">
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
        <p>GABRIEL VINCULADO</p>
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

  <!-- Modal Structure -->
  <main class="modal" id="bookingModal">
    <section class="modal-content">
      <span class="close-btn">&times;</span>
      <h1>DESTINATION</h1>
      <form id="bookingForm">
        <div class="form-row">
          <div class="form-group">
            <label>City or closest major city</label>
            <input type="text" id="city" name="city" required>
          </div>
          <div class="form-group">
            <label>Country or Region</label>
            <input type="text" id="country" name="country" required>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group">
            <label>Travel Date</label>
            <input type="date" id="travel-date" name="travel-date" required>
          </div>
          <div class="form-group">
            <label>Group Size</label>
            <select id="group-size" name="group-size" required>
              <option value="solo">Solo</option>
              <option value="couple">Couple</option>
              <option value="family">Family (3-5)</option>
              <option value="group">Group (6+)</option>
            </select>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group">
            <label>Number of Members</label>
            <input type="number" id="members" name="members" min="1" max="20" value="1" required>
          </div>
          <div class="form-group">
            <label>Budget (₱)</label>
            <input type="number" id="budget" name="budget" min="0" placeholder="Estimated budget">
          </div>
        </div>
        <h2>ACTIVITY</h2>
        <div class="checkbox-group">
          <div class="checkbox-option">
            <input type="checkbox" id="hiking" name="activity" value="hiking">
            <label for="hiking">Hiking</label>
          </div>
          <div class="checkbox-option">
            <input type="checkbox" id="mountain-biking" name="activity" value="mountain-biking">
            <label for="mountain-biking">Mountain Biking</label>
          </div>
          <div class="checkbox-option">
            <input type="checkbox" id="kayaking" name="activity" value="kayaking">
            <label for="kayaking">Kayaking</label>
          </div>
          <div class="checkbox-option">
            <input type="checkbox" id="skiing" name="activity" value="skiing">
            <label for="skiing">Skiing</label>
          </div>
          <div class="checkbox-option">
            <input type="checkbox" id="fishing" name="activity" value="fishing">
            <label for="fishing">Fishing</label>
          </div>
          <div class="checkbox-option">
            <input type="checkbox" id="surfing" name="activity" value="surfing">
            <label for="surfing">Surfing</label>
          </div>
        </div>
        <div class="divider"></div>
        <h1>INFORMATION</h1>
        <div class="checkbox-group">
          <div class="checkbox-option">
            <input type="checkbox" id="transportation" name="info" value="transportation">
            <label for="transportation">Transportation</label>
          </div>
          <div class="checkbox-option">
            <input type="checkbox" id="health" name="info" value="health">
            <label for="health">Health</label>
          </div>
          <div class="checkbox-option">
            <input type="checkbox" id="weather" name="info" value="weather">
            <label for="weather">Weather</label>
          </div>
          <div class="checkbox-option">
            <input type="checkbox" id="gear" name="info" value="gear">
            <label for="gear">Gear</label>
          </div>
          <div class="checkbox-option">
            <input type="checkbox" id="political-info" name="info" value="political-info">
            <label for="political-info">Political Info</label>
          </div>
          <div class="checkbox-option">
            <input type="checkbox" id="activity-specific" name="info" value="activity-specific">
            <label for="activity-specific">Activity Specific</label>
          </div>
        </div>
        <button type="submit" class="submit-btn">SUBMIT</button>
      </form>
    </section>
  </main>


  <!-- confirmation modal -->
<section class="modal" id="confirmationModal">
  <article class="modal-content">
    <span class="close-btn">&times;</span>
    <h2>Confirm Your Trip Details</h2>
    
    <div id="confirmationDetails" class="confirmation-details">
    </div>
    
    <div class="confirmation-actions">
      <button id="editBtn" class="edit-btn">Edit Details</button>
      <button id="confirmBtn" class="confirm-btn">Confirm Booking</button>
    </div>
  </article>
</section>

  <script src="travelPlanner.js"></script>    
</body>
</html>