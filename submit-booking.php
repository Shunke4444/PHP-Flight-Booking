<?php
session_start();
$conn = new mysqli("localhost", "root", "", " accounts");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$city = $_POST['city'];
$country = $_POST['country'];
$travelDate = $_POST['travelDate'];
$groupSize = $_POST['groupSize'];
$members = $_POST['members'];
$budget = $_POST['budget'];
$activities = explode(',', $_POST['activities']);
$information = explode(',', $_POST['information']);
$userId = $_SESSION["user_id"];

$stmt = $conn->prepare("INSERT INTO travel_plans (user_id, city, country, travel_date, group_size, members, budget) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("isssisi", $userId, $city, $country, $travelDate, $groupSize, $members, $budget);
$stmt->execute();
$travelPlanId = $stmt->insert_id;
$stmt->close();

if (!empty($activities[0])) {
    $stmt = $conn->prepare("INSERT INTO activities (travel_plan_id, activity) VALUES (?, ?)");
    foreach ($activities as $act) {
        $stmt->bind_param("is", $travelPlanId, trim($act));
        $stmt->execute();
    }
    $stmt->close();
}

if (!empty($information[0])) {
    $stmt = $conn->prepare("INSERT INTO information (travel_plan_id, info) VALUES (?, ?)");
    foreach ($information as $info) {
        $stmt->bind_param("is", $travelPlanId, trim($info));
        $stmt->execute();
    }
    $stmt->close();
}

echo "success";
$conn->close();
?>