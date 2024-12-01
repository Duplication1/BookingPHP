<?php
// Include the database connection
include '../model/db.php';

header('Content-Type: application/json');

// Get the data from the POST request
$input = json_decode(file_get_contents('php://input'), true);
$cancel_id = $input['cancel_id'] ?? null;

// Check if cancel_id is provided
if ($cancel_id) {
    // Prepare SQL statement to delete the appointment
    $delete_sql = "DELETE FROM appointments WHERE id = ?";
    
    if ($stmt = $conn->prepare($delete_sql)) {
        $stmt->bind_param("i", $cancel_id); // Bind the cancel_id as an integer
        
        if ($stmt->execute()) {
            // Return success message
            echo json_encode(["success" => true]);
        } else {
            // Return error message
            echo json_encode(["success" => false]);
        }
        
        $stmt->close();
    } else {
        // SQL preparation error
        echo json_encode(["success" => false]);
    }
} else {
    // No cancel_id provided
    echo json_encode(["success" => false]);
}

$conn->close();
?>
