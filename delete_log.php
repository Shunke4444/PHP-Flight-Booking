<?php
session_start();

header('Content-Type: application/json');

if (!isset($_SESSION["user_id"]) || !isset($_POST['id'])) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Invalid request']);
    exit;
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = " accounts";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Database connection failed']);
    exit;
}

try {
    // Verify the log belongs to the user
    $log_id = (int)$_POST['id'];
    $user_id = (int)$_SESSION['user_id'];
    
    $stmt = $conn->prepare("SELECT user_id FROM travel_logs WHERE id = ?");
    $stmt->bind_param("i", $log_id);
    $stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows === 0) {
        http_response_code(404);
        echo json_encode(['success' => false, 'message' => 'Log not found']);
        exit;
    }
    
    $stmt->bind_result($log_user_id);
    $stmt->fetch();
    
    if ($log_user_id != $user_id) {
        http_response_code(403);
        echo json_encode(['success' => false, 'message' => 'Not authorized']);
        exit;
    }
    
    // Delete the log (foreign key will delete images automatically)
    $stmt = $conn->prepare("DELETE FROM travel_logs WHERE id = ?");
    $stmt->bind_param("i", $log_id);
    
    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        http_response_code(500);
        echo json_encode(['success' => false, 'message' => $conn->error]);
    }
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
} finally {
    $conn->close();
}