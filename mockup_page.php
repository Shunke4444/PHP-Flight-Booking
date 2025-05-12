<?php
session_start();
if (!isset($_SESSION["user_id"]) || !isset($_SESSION["username"])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Flight Booking</title>
  <link rel="stylesheet" href="mockup.css" />
</head>
<body>

  <main class="booking-container">
    <h1>Book a Flight</h1>
    <form id="flightForm">
      <div class="form-row">
        <input type="text" placeholder="From" required />
        <input type="text" placeholder="To" required />
      </div>
      <div class="form-row">
        <input type="date" required />
        <input type="date" required />
      </div>
      <div class="form-row">
        <select>
          <option>1 Passenger</option>
          <option>2 Passengers</option>
          <option>3 Passengers</option>
          <option>4+ Passengers</option>
        </select>
        <select>
          <option>Economy</option>
          <option>Business</option>
          <option>First Class</option>
        </select>
      </div>
      <button type="submit" class="search-btn">Search Flights</button>
    </form>
  </main>


</body>
</html>
