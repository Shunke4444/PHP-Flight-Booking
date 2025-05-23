<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Climbing Myongming's Devil Tower</title>
    <link rel="stylesheet" href="styles/myong.css">
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
            <h1>Myongming's Devil Tower</h1>
            <p class="subtitle">The Ultimate Climbing Challenge</p>
            <div class="stats-container">
                <div class="stat">
                    <span class="stat-number">1,287m</span>
                    <span class="stat-label">Height</span>
                </div>
                <div class="stat">
                    <span class="stat-number">5.12d</span>
                    <span class="stat-label">Difficulty</span>
                </div>
                <div class="stat">
                    <span class="stat-number">72</span>
                    <span class="stat-label">Routes</span>
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
                <h2>The Legendary Climb</h2>
                <p class="intro-text">Myongming's Devil Tower, known locally as "Guǐ Tǎ" (Ghost Tower), is one of the most challenging and rewarding climbing destinations in Asia. This granite monolith rises dramatically from the surrounding landscape, offering climbers a true test of skill and endurance.</p>
                
                <div class="features-grid">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-mountain"></i>
                        </div>
                        <h3>Unique Geology</h3>
                        <p>The tower's distinctive hexagonal columns were formed by volcanic activity millions of years ago, creating perfect natural climbing routes.</p>
                    </div>
                    
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-route"></i>
                        </div>
                        <h3>Varied Routes</h3>
                        <p>From technical face climbs to challenging crack systems, Devil Tower offers routes for all skill levels, though most are for experienced climbers.</p>
                    </div>
                    
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-binoculars"></i>
                        </div>
                        <h3>Stunning Views</h3>
                        <p>At the summit, climbers are rewarded with panoramic views of the surrounding Myongming Valley and distant mountain ranges.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="gallery-section">
            <h2>Gallery</h2>
            <div class="gallery-grid">
                <div class="gallery-item tall" style="background-image: url('../PHP-Flight-Booking/assets/Devils_Tower_in_Wyoming.jpg')"></div>
                <div class="gallery-item" style="background-image: url('assets/TOWER.jpg')"></div>
                <div class="gallery-item" style="background-image: url('assets/tower2.jpg"></div>
                <div class="gallery-item wide" style="background-image: url('assets/tower3.jpg')"></div>
            </div>
        </section>

        <section class="preparation-section">
            <div class="container">
                <h2>Preparation Guide</h2>
                <div class="preparation-steps">
                    <div class="step">
                        <div class="step-number">1</div>
                        <div class="step-content">
                            <h3>Physical Training</h3>
                            <p>Build endurance with regular climbing sessions and cardio. Focus on finger strength and core stability for the technical sections.</p>
                        </div>
                    </div>
                    <div class="step">
                        <div class="step-number">2</div>
                        <div class="step-content">
                            <h3>Gear Checklist</h3>
                            <p>Double ropes (60m), 12-16 quickdraws, helmet, climbing shoes, harness, chalk bag, and weather-appropriate clothing.</p>
                        </div>
                    </div>
                    <div class="step">
                        <div class="step-number">3</div>
                        <div class="step-content">
                            <h3>Permits & Logistics</h3>
                            <p>Climbing permits required. Base camp facilities available 3km from the tower. Nearest town is Myongming (45 min drive).</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <div class="book-now-container" style="display: flex; justify-content: center; align-items: center; padding: 3rem 0;">
        <a href="travelPlanner.php" class="book-now-btn">Book Now</a>
    </div>
</body>
</html>