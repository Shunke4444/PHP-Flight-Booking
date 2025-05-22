<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Greenland Hiking Adventures</title>
    <link rel="stylesheet" href="styles/greenlandd.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">
</head>
<body>
    <header class="nav-header">
        <nav class="navbar">
            <div class="nav-left">
                <span class="icon">
                    <a href="travelLog.php" class="nav-link"><i class="fa-solid fa-bookmark"></i><span class="nav-text">Adventure Logs</span></a>
                </span>
                <span class="icon">
                    <a href="#" class="nav-link travel-planner-btn"><i class="fa-solid fa-route"></i><span class="nav-text">Trip Planner</span></a>
                </span>
            </div>  
            <div class="logo">
                <a href="../PHP-Flight-Booking/landingPage.php">
                    <img src="../PHP-Flight-Booking/assets/LOGO.png" alt="Arctic Adventures">
                </a>
            </div>
            <div class="nav-right">
                <button class="logout">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    <span class="nav-text">Logout</span>
                </button>
            </div>
        </nav>
    </header>

    <header class="hero">
        <div class="hero-content">
            <h1>Greenland Hiking Expeditions</h1>
            <p class="subtitle">Where Ice Meets Adventure</p>
            <div class="stats-container">
                <div class="stat">
                    <span class="stat-number">500+</span>
                    <span class="stat-label">Trails</span>
                </div>
                <div class="stat">
                    <span class="stat-number">-30°C</span>
                    <span class="stat-label">To +15°C</span>
                </div>
                <div class="stat">
                    <span class="stat-number">24h</span>
                    <span class="stat-label">Midnight Sun</span>
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
                <h2>Arctic Wilderness Exploration</h2>
                <p class="intro-text">Greenland's untouched landscapes offer some of the most spectacular hiking in the world. From glacier treks to tundra walks beneath the midnight sun, experience nature on a scale you've never imagined.</p>
                
                <div class="features-grid">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-icicles"></i>
                        </div>
                        <h3>Glacial Trails</h3>
                        <p>Hike alongside ancient glaciers and iceberg-filled fjords, with routes ranging from gentle walks to challenging ice cap traverses.</p>
                    </div>
                    
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-igloo"></i>
                        </div>
                        <h3>Inuit Culture</h3>
                        <p>Experience traditional Greenlandic villages and learn survival techniques from local guides with generations of arctic knowledge.</p>
                    </div>
                    
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-sun"></i>
                        </div>
                        <h3>Midnight Sun</h3>
                        <p>Summer hikes under 24-hour daylight reveal landscapes transformed by the endless golden light of arctic summer.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="gallery-section">
            <h2>Arctic Landscapes</h2>
            <div class="gallery-grid">
                <div class="gallery-item tall" style="background-image: url('assets/greenland1.avif')"></div>
                <div class="gallery-item" style="background-image: url('assets/Greenland2.webp')"></div>
                <div class="gallery-item" style="background-image: url('assets/Greendland3.jpg')"></div>
                <div class="gallery-item wide" style="background-image: url('assets/Greendland4.jpg')"></div>
            </div>
        </section>

        <section class="preparation-section">
            <div class="container">
                <h2>Expedition Preparation</h2>
                <div class="preparation-steps">
                    <div class="step">
                        <div class="step-number">1</div>
                        <div class="step-content">
                            <h3>Gear Essentials</h3>
                            <p>Layered clothing system, insulated waterproof boots, crampons for ice, -20°C sleeping bag, and polar-rated tent. We provide detailed packing lists for each season.</p>
                        </div>
                    </div>
                    <div class="step">
                        <div class="step-number">2</div>
                        <div class="step-content">
                            <h3>Physical Readiness</h3>
                            <p>Build endurance with weighted pack training. Focus on core strength and balance for uneven terrain. Acclimate to cold weather hiking if possible.</p>
                        </div>
                    </div>
                    <div class="step">
                        <div class="step-number">3</div>
                        <div class="step-content">
                            <h3>Travel Logistics</h3>
                            <p>Flights to Kangerlussuaq or Nuuk, expedition permits, and mandatory safety briefings. We handle all logistics for guided expeditions.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-about">
                    <h3>Fun Greenland</h3>
                    <p>Greenland's premier hiking guide service, specializing in sustainable arctic adventures with expert local guides.</p>
                </div>
                <div class="footer-links">
                    <h3>Resources</h3>
                    <ul>
                        <li><a href="#">Trail Maps</a></li>
                        <li><a href="#">Packing Guides</a></li>
                        <li><a href="#">Expedition Calendar</a></li>
                        <li><a href="#">Safety Information</a></li>
                    </ul>
                </div>
                <div class="footer-social">
                    <h3>Follow Our Expeditions</h3>
                    <div class="social-icons">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
            <div class="copyright">
                <p>&copy; 2025 Greenland Arctic Adventures. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>