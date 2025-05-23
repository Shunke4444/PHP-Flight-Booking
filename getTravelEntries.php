<?php
session_start();
header('Content-Type: application/json');

if (!isset($_SESSION["user_id"])) {
    echo json_encode([]);
    exit;
}
$servername = "localhost";
$username = "root";
$password = "";
$dbname = " accounts"; // Make sure this matches your database name

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die(json_encode(['error' => 'Database connection failed']));
}

$user_id = $_SESSION['user_id'];
$travel_logs = [];

// Get travel logs
$stmt = $conn->prepare("SELECT * FROM travel_logs WHERE user_id = ? ORDER BY travel_date DESC");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

while ($log = $result->fetch_assoc()) {
    // Get images for each log
    $stmt2 = $conn->prepare("SELECT id, image_type FROM travel_log_images WHERE log_id = ?");
    $stmt2->bind_param("i", $log['id']);
    $stmt2->execute();
    $images_result = $stmt2->get_result();
    
    $log['images'] = [];
    while ($image = $images_result->fetch_assoc()) {
        $log['images'][] = $image;
    }
    
    $travel_logs[] = $log;
    $stmt2->close();
}

$stmt->close();
$conn->close();

echo json_encode($travel_logs);
?>