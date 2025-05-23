<?php
session_start();
header('Content-Type: application/json');

if (!isset($_SESSION["user_id"]) || !isset($_POST['id'])) {
    echo json_encode(['success' => false, 'message' => 'Unauthorized']);
    exit;
}
$servername = "localhost";
$username = "root";
$password = "";
$dbname = " accounts"; // Make sure this matches your database name

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    echo json_encode(['success' => false, 'message' => 'Database connection failed']);
    exit;
}

$log_id = (int)$_POST['id'];
$user_id = (int)$_SESSION['user_id'];

// Verify the log belongs to the user
$stmt = $conn->prepare("SELECT id FROM travel_logs WHERE id = ? AND user_id = ?");
$stmt->bind_param("ii", $log_id, $user_id);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows === 0) {
    echo json_encode(['success' => false, 'message' => 'Entry not found or not authorized']);
    exit;
}

// Delete the log (images will be deleted automatically due to foreign key constraint)
$stmt = $conn->prepare("DELETE FROM travel_logs WHERE id = ?");
$stmt->bind_param("i", $log_id);

if ($stmt->execute()) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => $conn->error]);
}
    
$stmt->close();
$conn->close();
?>