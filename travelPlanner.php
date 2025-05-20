<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="icon" type='image/png' href="assets/ICON.png">
  <title>Travel Planner</title>
  <link rel="stylesheet" href="styles/" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Libre+Franklin:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/5756001ff6.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
    <form>
      <!-- Section 1 -->
      <div class="section">
        <div class="section-header">1</div>
        <p>Either select a region on the map or type it into the fields below:</p>
        <label>City or closest major city:</label>
        <input type="text" name="city">
        <label>Country or Region:</label>
        <input type="text" name="country">
      </div>

      <!-- Section 2 -->
      <div class="section">
        <div class="section-header">2</div>
        <p>Tell us what kind of things you will be doing there:</p>
        <div class="checkbox-group">
          <label><input type="checkbox"> Hiking</label>
          <label><input type="checkbox"> Kayaking</label>
          <label><input type="checkbox"> Fishing</label>
          <label><input type="checkbox"> Mountain Biking</label>
          <label><input type="checkbox"> Skiing</label>
          <label><input type="checkbox"> Surfing</label>
        </div>
      </div>

      <!-- Section 3 -->
      <div class="section">
        <div class="section-header">3</div>
        <p>What kind of information do you want about this trip?</p>
        <div class="checkbox-group">
          <label><input type="checkbox"> Transportation</label>
          <label><input type="checkbox"> Weather</label>
          <label><input type="checkbox"> Political Info</label>
          <label><input type="checkbox"> Health</label>
          <label><input type="checkbox"> Gear</label>
          <label><input type="checkbox"> Activity Specific</label>
        </div>
      </div>

      <!-- Section 4 -->
      <div class="section">
        <div class="section-header">4</div>
        <button type="submit">Submit</button>
      </div>
    </form>
  </div>
</body>
</html>