<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cycling in New Zealand</title>
    <link rel="stylesheet" href="styles/nz.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">
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

    <header class="hero">
        <div class="hero-content">
            <h1>Cycling in New Zealand</h1>
            <p class="subtitle">From Peaks to Pacific, Powered by Pedals</p>
          <div class="stats-container">
                <div class="stat">
                    <span class="stat-number">23,000+</span>
                    <span class="stat-label">km of Trails</span>
                </div>
                <div class="stat">
                    <span class="stat-number">-10°C</span>
                    <span class="stat-label">To +30°C</span>
                </div>
                <div class="stat">
                    <span class="stat-number">9,000+</span>
                    <span class="stat-label">Native Species</span>
                </div>
            </div>
        </div>
        <div class="scroll-indicator">
            <i class="fas fa-chevron-down"></i>
        </div>
    </header>

    <main>
       <section class="overview-section">
                <div class="container">
                    <h2>New Zealand Cycling Adventures</h2>
                    <p class="intro-text">From the alpine trails of the South Island to the coastal routes of the North, New Zealand offers an unparalleled cycling experience through landscapes shaped by volcanoes, fjords, and Maori heritage.</p>
                    
                    <div class="features-grid">
                        <div class="feature-card">
                            <div class="feature-icon">
                                <i class="fas fa-mountain"></i>
                            </div>
                            <h3>Alpine to Ocean</h3>
                            <p>Ride through diverse terrain—from snow-capped peaks to surf-lined shores—on trails like the Alps 2 Ocean Cycle Trail and The Great Lake Trail.</p>
                        </div>
                        
                        <div class="feature-card">
                            <div class="feature-icon">
                                <i class="fas fa-biking"></i>
                            </div>
                            <h3>Epic Trails</h3>
                            <p>Explore over 23,000 km of well-maintained cycling paths, including the New Zealand Cycle Trail network, offering routes for every skill level.</p>
                        </div>
                        
                        <div class="feature-card">
                            <div class="feature-icon">
                                <i class="fas fa-leaf"></i>
                            </div>
                            <h3>Natural Wonders</h3>
                            <p>Cycle past geothermal springs, ancient forests, and glowworm caves—New Zealand's biodiversity makes every journey a discovery.</p>
                        </div>
                    </div>
                </div>
            </section>
        <section class="gallery-section">
            <h2>Nature Trails</h2>
            <div class="gallery-grid">
                <div class="gallery-item tall" style="background-image: url('assets/cycling1.jpg')"></div>
                <div class="gallery-item" style="background-image: url('assets/cycling22.jpg')"></div>
                <div class="gallery-item" style="background-image: url('assets/cycling3.jpg')"></div>
                <div class="gallery-item wide" style="background-image: url('assets/cycling4.jpg')"></div>
            </div>
        </section>

        <section class="preparation-section">
                <div class="container">
                    <h2>Cycling Preparation</h2>
                    <div class="preparation-steps">
                        <div class="step">
                            <div class="step-number">1</div>
                            <div class="step-content">
                                <h3>Gear Essentials</h3>
                                <p>A quality mountain or gravel bike, helmet, padded cycling shorts, rain jacket, repair kit, and hydration pack. We provide recommended gear lists tailored to each trail.</p>
                            </div>
                        </div>
                        <div class="step">
                            <div class="step-number">2</div>
                            <div class="step-content">
                                <h3>Fitness & Training</h3>
                                <p>Improve cardio endurance and leg strength. Practice on mixed terrain to prepare for New Zealand’s hills, gravel paths, and coastal winds.</p>
                            </div>
                        </div>
                        <div class="step">
                            <div class="step-number">3</div>
                            <div class="step-content">
                                <h3>Travel Logistics</h3>
                                <p>Fly into Auckland, Wellington, or Queenstown. Shuttles to trailheads, bike rentals, and trail passes can be arranged in advance for a hassle-free journey.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
    </main>
        <div class="book-now-container" style="display: flex; justify-content: center; align-items: center; padding: 3rem 0;">
        <a href="booking.php" class="book-now-btn">Book Now</a>
    </div>

</body>
</html>