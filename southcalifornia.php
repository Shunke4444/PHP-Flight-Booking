<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Partying in California</title>
    <link rel="stylesheet" href="styles/sc.css">
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
                    <h1>Summertime in Southern California</h1>
                    <p class="subtitle">Sun, Surf, and Scenic Rides Along the Coast</p>
        <div class="stats-container">
    <div class="stat">
        <span class="stat-number">1,200+</span>
        <span class="stat-label">Miles of Coastal Routes</span>
    </div>
    <div class="stat">
        <span class="stat-number">15°C</span>
        <span class="stat-label">To 35°C Summer Range</span>
    </div>
    <div class="stat">
        <span class="stat-number">284</span>
        <span class="stat-label">Sunny Days a Year</span>
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
                    <h2>Southern California Summer Vibes</h2>
                    <p class="intro-text">From lively beach parties to rooftop sunsets, Southern California is the ultimate summer playground with endless fun under the sun and stars.</p>
                    
                    <div class="features-grid">
                        <div class="feature-card">
                            <div class="feature-icon">
                            <i class="fa-solid fa-umbrella-beach"></i>     
                       </div>
                            <h3>Beach Bash</h3>
                            <p>Join the hottest beach parties along Venice, Santa Monica, and Huntington Beach, where sun, sand, and music come alive.</p>
                        </div>
                        
                        <div class="feature-card">
                            <div class="feature-icon">
                                <i class="fas fa-music"></i>
                            </div>
                            <h3>Live Music & Festivals</h3>
                            <p>Experience iconic summer music festivals and live shows, from Coachella vibes to underground LA beats.</p>
                        </div>
                        
                        <div class="feature-card">
                            <div class="feature-icon">
                                <i class="fas fa-cocktail"></i>
                            </div>
                            <h3>Nightlife & Rooftops</h3>
                            <p>Party under the stars at rooftop bars and trendy clubs across downtown LA and coastal hotspots.</p>
                        </div>
                    </div>
                </div>
            </section>
        <section class="gallery-section">
            <h2>Nature Trails</h2>
            <div class="gallery-grid">
                <div class="gallery-item tall" style="background-image: url('assets/cali1.jpg')"></div>
                <div class="gallery-item" style="background-image: url('assets/cali2.jpg')"></div>
                <div class="gallery-item" style="background-image: url('assets/cali3.webp')"></div>
                <div class="gallery-item wide" style="background-image: url('assets/cali4.jpg')"></div>
            </div>
        </section>

        <section class="preparation-section">
            <div class="container">
                <h2>Summer Party Prep</h2>
                <div class="preparation-steps">
                    <div class="step">
                        <div class="step-number">1</div>
                        <div class="step-content">
                            <h3>Party Essentials</h3>
                            <p>Pack your favorite summer outfits, sunscreen, sunglasses, portable speakers, and a refillable water bottle to stay hydrated all day and night.</p>
                        </div>
                    </div>
                    <div class="step">
                        <div class="step-number">2</div>
                        <div class="step-content">
                            <h3>Stay Active & Energized</h3>
                            <p>Keep your energy up with light exercise and hydration. Be ready to dance, swim, or chill from beach bonfires to rooftop gatherings.</p>
                        </div>
                    </div>
                    <div class="step">
                        <div class="step-number">3</div>
                        <div class="step-content">
                            <h3>Getting There & Around</h3>
                            <p>Fly into LAX, John Wayne, or San Diego airports. Use rideshares, bike rentals, or public transit to hop between beaches, festivals, and nightlife hotspots.</p>
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