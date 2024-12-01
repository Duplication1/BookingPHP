<?php
// Include database connection
include '../model/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the form data
    $id = $_POST['id'];  // The testimonial ID
    $name = $_POST['name'];  // The new name
    $testimonial = $_POST['testimonial'];  // The new testimonial

    // Validate the input data
    if (!empty($id) && !empty($name) && !empty($testimonial)) {
        // Prepare the SQL update query
        $sql = "UPDATE testimonials SET name = ?, testimonial = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ssi', $name, $testimonial, $id);

        // Execute the query and check for success
        if ($stmt->execute()) {
            echo "Testimonial updated successfully.";
        } else {
            echo "Error updating testimonial: " . $conn->error;
        }
    } else {
        echo "Invalid input.";
    }

    $stmt->close();
    $conn->close();
}
?>
