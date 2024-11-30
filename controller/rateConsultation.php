<?php 
// rateConsultation.php
if (isset($_POST['appointment_id']) && isset($_POST['rating'])) {
    $appointment_id = $_POST['appointment_id'];
    $rating = $_POST['rating'];

    include '../model/db.php';

    // Insert the rating into the database
    $sql = "UPDATE appointments SET rating = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ii', $rating, $appointment_id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "<script>alert('Thank you for your rating!');</script>";
    } else {
        echo "<script>alert('Failed to submit rating');</script>";
    }

    $stmt->close();
    $conn->close();

    // Redirect back to the appointment page
    header('Location: ../views/myBook.php');
    exit();
}

?>