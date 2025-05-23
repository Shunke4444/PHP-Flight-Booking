<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = " accounts";

if (isset($_GET['id'])) {
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $id = (int)$_GET['id'];
    $stmt = $conn->prepare("SELECT image_data, image_type FROM travel_log_images WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($image_data, $image_type);
        $stmt->fetch();
        
        header("Content-Type: " . $image_type);
        echo $image_data;
        exit;
    }
    
    $stmt->close();
    $conn->close();
}

// Default image if not found
header("Content-Type: image/png");
readfile('path/to/default-image.png');