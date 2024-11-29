<?php
// checkConflict.php
include '../model/db.php';
header('Content-Type: application/json');

// Get the posted data
$data = json_decode(file_get_contents('php://input'), true);
$date = $data['date'];
$startTime = $data['startTime'];
$endTime = $data['endTime'];

// Define clinic hours (8:00 AM to 6:30 PM)
$clinicStartTime = "07:45";
$clinicEndTime = "19:00";

// Convert the start and end times to timestamps (numeric values for comparison)
$startTimeTimestamp = strtotime($startTime);
$endTimeTimestamp = strtotime($endTime);
$clinicStartTimeTimestamp = strtotime($clinicStartTime);
$clinicEndTimeTimestamp = strtotime($clinicEndTime);

// Ensure the start time is not earlier than 8:00 AM and not later than 6:30 PM
// Also ensure the end time is not later than 6:30 PM
if ($startTimeTimestamp < $clinicStartTimeTimestamp || $endTimeTimestamp > $clinicEndTimeTimestamp) {
    echo json_encode(['conflict' => 'out_of_hours']);
    exit;
}

// Query to check if there's a conflict in the appointments table, considering only accepted appointments
$query = "SELECT * FROM appointments WHERE date = ? AND status = 'Accepted' AND time BETWEEN ? AND ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("sss", $date, $startTime, $endTime);
$stmt->execute();
$result = $stmt->get_result();

// Check if any records exist (conflict found)
if ($result->num_rows > 0) {
    echo json_encode(['conflict' => true]);
} else {
    echo json_encode(['conflict' => false]);
}

// Close connection
$stmt->close();
$conn->close();
?>
