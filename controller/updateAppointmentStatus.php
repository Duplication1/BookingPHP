<?php
include '../model/db.php';

$data = json_decode(file_get_contents('php://input'), true);
$id = $data['id'];
$status = $data['status'];

// Fetch the date and time of the clicked appointment
if ($status === 'accepted') {
    $query = "SELECT date, time FROM appointments WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $appointment = $result->fetch_assoc();
        $appointmentDate = $appointment['date'];
        $appointmentTime = $appointment['time'];
        
        // Accept the clicked appointment
        $acceptQuery = "UPDATE appointments SET status = 'accepted' WHERE id = ?";
        $acceptStmt = $conn->prepare($acceptQuery);
        $acceptStmt->bind_param("i", $id);
        $acceptSuccess = $acceptStmt->execute();
        $acceptStmt->close();
        
        // Reject all other appointments with the same date and time
        $rejectQuery = "UPDATE appointments SET status = 'rejected' WHERE date = ? AND time = ? AND id != ?";
        $rejectStmt = $conn->prepare($rejectQuery);
        $rejectStmt->bind_param("ssi", $appointmentDate, $appointmentTime, $id);
        $rejectSuccess = $rejectStmt->execute();
        $rejectStmt->close();
        
        if ($acceptSuccess && $rejectSuccess) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'error' => $conn->error]);
        }
    } else {
        echo json_encode(['success' => false, 'error' => 'Appointment not found.']);
    }

    $stmt->close();
} else {
    // Handle other statuses like 'rejected' or 'consulted' as normal
    $query = "UPDATE appointments SET status = ? WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("si", $status, $id);
    
    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => $stmt->error]);
    }
    
    $stmt->close();
}

$conn->close();
?>
