<!DOCTYPE html>
<html lang="en">

  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Adventure Booking System</title>
  <link rel="stylesheet" href="styles/travelPlanner.css" />
   <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Libre+Franklin:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/5756001ff6.js" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/@panzoom/panzoom/dist/panzoom.min.js"></script>
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


  <div class="adventure-booking-container">
    <div class="map-container">
      <?php include 'assets/world.svg'; ?>
    </div>

    <div class="country-status">
      <label>Hovering Over:</label>
      <input type="text" id="hovered-country" readonly placeholder="Hover over a country" />

      <label for="selected-country">Selected Country:</label>
      <input type="text" id="selected-country" readonly placeholder="Click a country to select" />
    </div>

    <!-- Booking Section -->
    <section class="booking-form">
      <h1>DESTINATION</h1>
      <form id="bookingForm">
        <div class="form-row">
          <div class="form-group">
            <label>City or closest major city</label>
            <input type="text" id="city" name="city" required />
          </div>
          <div class="form-group">
            <label>Country or Region</label>
            <input type="text" id="country" name="country" required />
          </div>
        </div>
        <div class="form-row">
          <div class="form-group">
            <label>Travel Date</label>
            <input type="date" id="travel-date" name="travel-date" required />
          </div>
          <div class="form-group">
            <label for="group-size">Group Size:</label>
            <select name="group-size" id="group-size" required>
              <option value="">Select Group Size</option>
              <option value="Solo">Solo</option>
              <option value="Couple">Couple</option>
              <option value="Group">Group</option>
            </select>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group">
            <label>Number of Members</label>
            <input type="number" id="members" name="members" min="1" max="20" value="1" required />
          </div>
          <div class="form-group">
            <label>Budget (₱)</label>
            <input type="number" id="budget" name="budget" min="0" placeholder="Estimated budget" />
          </div>
        </div>
        <h2>ACTIVITY</h2>
        <div class="checkbox-group">
          <div class="checkbox-option">
            <input type="checkbox" id="hiking" name="activity" value="hiking" />
            <label for="hiking">Hiking</label>
          </div>
          <div class="checkbox-option">
            <input type="checkbox" id="mountain-biking" name="activity" value="mountain-biking" />
            <label for="mountain-biking">Mountain Biking</label>
          </div>
          <div class="checkbox-option">
            <input type="checkbox" id="kayaking" name="activity" value="kayaking" />
            <label for="kayaking">Kayaking</label>
          </div>
          <div class="checkbox-option">
            <input type="checkbox" id="skiing" name="activity" value="skiing" />
            <label for="skiing">Skiing</label>
          </div>
          <div class="checkbox-option">
            <input type="checkbox" id="fishing" name="activity" value="fishing" />
            <label for="fishing">Fishing</label>
          </div>
          <div class="checkbox-option">
            <input type="checkbox" id="surfing" name="activity" value="surfing" />
            <label for="surfing">Surfing</label>
          </div>
        </div>
        <div class="divider"></div>
        <h1>INFORMATION</h1>
        <div class="checkbox-group">
          <div class="checkbox-option">
            <input type="checkbox" id="transportation" name="info" value="transportation" />
            <label for="transportation">Transportation</label>
          </div>
          <div class="checkbox-option">
            <input type="checkbox" id="health" name="info" value="health" />
            <label for="health">Health</label>
          </div>
          <div class="checkbox-option">
            <input type="checkbox" id="weather" name="info" value="weather" />
            <label for="weather">Weather</label>
          </div>
          <div class="checkbox-option">
            <input type="checkbox" id="gear" name="info" value="gear" />
            <label for="gear">Gear</label>
          </div>
          <div class="checkbox-option">
            <input type="checkbox" id="political-info" name="info" value="political-info" />
            <label for="political-info">Political Info</label>
          </div>
          <div class="checkbox-option">
            <input type="checkbox" id="activity-specific" name="info" value="activity-specific" />
            <label for="activity-specific">Activity Specific</label>
          </div>
        </div>
        <button type="submit" class="submit-btn">SUBMIT</button>
      </form>
    </section>

    <!-- Modal popup for confirmation -->
    <div id="confirmationModal" class="modal" style="display:none;">
      <div class="modal-content">
        <h2>Confirm Your Trip Details</h2>
        <div id="confirmationDetails"></div>
        <div class="modal-actions">
          <button id="editBtn">Edit Details</button>
          <button id="confirmBtn">Confirm Booking</button>
        </div>
      </div>
    </div>
  </div>

  <script src="travelPlanner.js"></script>
</body>
</html>
