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
      <header>
    <h1>BlueBook</h1>
    <nav>
      <a href="#stays">Stays</a>
      <a href="#flights">Flights</a>
    </nav>
  </header>

  <main>
    <section id="search">
      <h2>Find your next destination</h2>
      <form action="search.php" method="GET">
        <input type="text" name="location" placeholder="Where to?" required />
        <input type="date" name="date" required />
        <select name="type">
          <option value="stays">Stays</option>
          <option value="flights">Flights</option>
        </select>
        <button type="submit">Search</button>
      </form>
    </section>

    <section id="results"></section>
  </main>

  <footer>
    <p>&copy; 2025 BlueBook. All rights reserved.</p>
  </footer>
    
  <script src="destination.js"></script>
  
</body>
</html>