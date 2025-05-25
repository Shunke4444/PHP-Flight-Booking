<?php
session_start();
if (!isset($_SESSION["user_id"]) || !isset($_SESSION["username"])) {
    header("Location: login.php");
    exit;
}

if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit;
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require_once 'vendor/autoload.php';
require 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = " accounts"; // Make sure this matches your database name
    
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        echo "<script>showError('Database connection failed');</script>";
        exit;
    }

    // Get form data
    $name = $_POST['name'];
    $contacts = $_POST['contacts'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    $travel_date = $_POST['travel-date'];
    $group_size = $_POST['group-size'];
    $members = (int)$_POST['members'];
    $budget = !empty($_POST['budget']) ? (int)$_POST['budget'] : NULL;
    $user_id = $_SESSION['user_id'];
    
    // 3. Main travel plan insert
    $stmt = $conn->prepare("INSERT INTO travel_plans 
                          (user_id, name, contacts, city, country_or_region, travel_date, group_size, num_members, budget) 
                          VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    
    $stmt->bind_param("issssssii", $user_id, $name, $contacts, $city, $country, 
                     $travel_date, $group_size, $members, $budget);

    if ($stmt->execute()) {
        $plan_id = $stmt->insert_id;
        
        // 4. Insert activities
        if (!empty($_POST['activity'])) {
            $activity_stmt = $conn->prepare("INSERT INTO travel_activities (plan_id, activity) VALUES (?, ?)");
            foreach ($_POST['activity'] as $activity) {
                $activity_stmt->bind_param("is", $plan_id, $activity);
                $activity_stmt->execute();
            }
        }
        
        // 5. Insert information requests
        if (!empty($_POST['info'])) {
            $info_stmt = $conn->prepare("INSERT INTO travel_information (plan_id, info) VALUES (?, ?)");
            foreach ($_POST['info'] as $info) {
                $info_stmt->bind_param("is", $plan_id, $info);
                $info_stmt->execute();
            }
        }
        $stmt = $conn->prepare("SELECT email FROM user_info WHERE ID = ?");
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $stmt->bind_result($email);
        $stmt->fetch();

        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = $_ENV['MAIL_USERNAME'];
            $mail->Password = $_ENV['MAIL_PASSWORD'];
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            $mail->setFrom($_ENV['MAIL_USERNAME'], $_ENV['MAIL_FROM_NAME']);
            $mail->addAddress($email); // User's email from form/session
            $mail->Subject = 'Your Travel Booking Confirmation';
            
            // Build the HTML email body with all booking details
            $mail->isHTML(true);
            $mail->Body = '
            <!DOCTYPE html>
            <html>
            <head>
                <style>
                    body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
                    .container { max-width: 600px; margin: 0 auto; padding: 20px; }
                    .header { background-color: #007bff; color: white; padding: 15px; text-align: center; }
                    .content { padding: 20px; border: 1px solid #ddd; }
                    .detail-row { margin-bottom: 10px; }
                    .detail-label { font-weight: bold; display: inline-block; width: 180px; }
                    .footer { margin-top: 20px; font-size: 12px; color: #777; text-align: center; }
                </style>
            </head>
            <body>
                <div class="container">
                    <div class="header">
                        <h2>Travel Booking Confirmation</h2>
                    </div>
                    <div class="content">
                        <p>Dear ' . htmlspecialchars($_POST['name']) . ',</p>
                        <p>Thank you for booking with us! Here are your travel details:</p>
                        
                        <div class="detail-row">
                            <span class="detail-label">Booking Reference:</span>
                            <span>' . htmlspecialchars($booking_reference) . '</span>
                        </div>
                        <div class="detail-row">
                            <span class="detail-label">Travel Date:</span>
                            <span>' . htmlspecialchars($_POST['travel-date']) . '</span>
                        </div>
                        <div class="detail-row">
                            <span class="detail-label">Destination:</span>
                            <span>' . htmlspecialchars($_POST['city']) . ', ' . htmlspecialchars($_POST['country']) . '</span>
                        </div>
                        <div class="detail-row">
                            <span class="detail-label">Group Size:</span>
                            <span>' . htmlspecialchars($_POST['group-size']) . ' (' . htmlspecialchars($_POST['members']) . ' people)</span>
                        </div>
                        <div class="detail-row">
                            <span class="detail-label">Budget:</span>
                            <span>₱' . number_format($_POST['budget'], 2) . '</span>
                        </div>';
            
            // Add activities if selected
            if (!empty($_POST['activity'])) {
                $mail->Body .= '
                        <div class="detail-row">
                            <span class="detail-label">Activities:</span>
                            <span>' . implode(', ', array_map('htmlspecialchars', $_POST['activity'])) . '</span>
                        </div>';
            }
            
            // Add information requested if selected
            if (!empty($_POST['info'])) {
                $mail->Body .= '
                        <div class="detail-row">
                            <span class="detail-label">Information Requested:</span>
                            <span>' . implode(', ', array_map('htmlspecialchars', $_POST['info'])) . '</span>
                        </div>';
            }
            
            $mail->Body .= '
                        <p>If you have any questions about your booking, please contact us at support@compasswebsite.com</p>
                    </div>
                    <div class="footer">
                        <p>© ' . date('Y') . ' Compass Website. All rights reserved.</p>
                    </div>
                </div>
            </body>
            </html>';
            
            // Plain text version for non-HTML email clients
            $mail->AltBody = "Travel Booking Confirmation\n\n" .
                "Dear " . $_POST['name'] . ",\n\n" .
                "Thank you for booking with us! Here are your travel details:\n\n" .
                "Booking Reference: " . $booking_reference . "\n" .
                "Travel Date: " . $_POST['travel-date'] . "\n" .
                "Destination: " . $_POST['city'] . ", " . $_POST['country'] . "\n" .
                "Group Size: " . $_POST['group-size'] . " (" . $_POST['members'] . " people)\n" .
                "Budget: ₱" . number_format($_POST['budget'], 2) . "\n" .
                (!empty($_POST['activity']) ? "Activities: " . implode(', ', $_POST['activity']) . "\n" : "") .
                (!empty($_POST['info']) ? "Information Requested: " . implode(', ', $_POST['info']) . "\n" : "") .
                "\nIf you have any questions about your booking, please contact us at support@yourtravelsite.com\n\n" .
                "© " . date('Y') . " Your Travel Company. All rights reserved.";

            $mail->send();
        } catch (Exception $e) {
            error_log("Email error: {$mail->ErrorInfo}");
            // You might want to handle this error differently in production
        }
        
        $conn->close();
        
        header("Location: landingPage.php");
    } else {
        // 7. Error handling
        echo "<script>alert('Error: ".$conn->error."')</script>";
    }
    
    $conn->close();
}
?>

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
  <form id="bookingForm" method="post">
    <!-- New: Personal Info -->
    <div class="form-row">
      <div class="form-group">
        <label for="full-name">Full Name</label>
        <input type="text" id="full-name" name="name" required />
      </div>
      <div class="form-group">
        <label for="contact-number">Contact Number</label>
        <input type="tel" id="contact-number" name="contacts" pattern="[0-9+ ]{7,15}" placeholder="e.g. +639123456789" required />
      </div>
    </div>
    <!-- Existing fields below -->
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
        <input type="checkbox" id="hiking" name="activity[]" value="hiking" />
        <label for="hiking">Hiking</label>
      </div>
      <div class="checkbox-option">
        <input type="checkbox" id="mountain-biking" name="activity[]" value="mountain-biking" />
        <label for="mountain-biking">Mountain Biking</label>
      </div>
      <div class="checkbox-option">
        <input type="checkbox" id="kayaking" name="activity[]" value="kayaking" />
        <label for="kayaking">Kayaking</label>
      </div>
      <div class="checkbox-option">
        <input type="checkbox" id="skiing" name="activity[]" value="skiing" />
        <label for="skiing">Skiing</label>
      </div>
      <div class="checkbox-option">
        <input type="checkbox" id="fishing" name="activity[]" value="fishing" />
        <label for="fishing">Fishing</label>
      </div>
      <div class="checkbox-option">
        <input type="checkbox" id="surfing" name="activity[]" value="surfing" />
        <label for="surfing">Surfing</label>
      </div>
    </div>
    <div class="divider"></div>
    <h1>INFORMATION</h1>
    <div class="checkbox-group">
      <div class="checkbox-option">
        <input type="checkbox" id="transportation" name="info[]" value="transportation" />
        <label for="transportation">Transportation</label>
      </div>
      <div class="checkbox-option">
        <input type="checkbox" id="health" name="info[]" value="health" />
        <label for="health">Health</label>
      </div>
      <div class="checkbox-option">
        <input type="checkbox" id="weather" name="info[]" value="weather" />
        <label for="weather">Weather</label>
      </div>
      <div class="checkbox-option">
        <input type="checkbox" id="gear" name="info[]" value="gear" />
        <label for="gear">Gear</label>
      </div>
      <div class="checkbox-option">
        <input type="checkbox" id="political-info" name="info[]" value="political-info" />
        <label for="political-info">Political Info</label>
      </div>
      <div class="checkbox-option">
        <input type="checkbox" id="activity-specific" name="info[]" value="activity-specific" />
        <label for="activity-specific">Activity Specific</label>
      </div>
    </div>
    <button type="submit" class="submit-btn" id="submitBtn">SUBMIT</button>
  </form>
</section>

    <!-- Modal popup for confirmation -->
    <div id="confirmationModal" class="modal" style="display:none;">
      <div class="modal-content">
        <h2>Confirm Your Trip Details</h2>
        <div id="confirmationDetails"></div>
        <div class="modal-actions">
          <button id="editBtn">Edit Details</button>
          <button type="submit" name="" id="confirmBtn">Confirm Booking</button>
        </div>
      </div>
    </div>
  </div>
  <script src="travelPlanner.js"></script>
</body>
</html>
