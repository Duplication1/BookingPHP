<?php
include '../model/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];

    // Prepare SQL query to delete the testimonial from the database
    $sql = "DELETE FROM testimonials WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);

    if ($stmt->execute()) {
        echo "Testimonial deleted successfully!";
    } else {
        echo "Error deleting testimonial.";
    }

    $stmt->close();
}

$conn->close();
?>
