<?php
include '../model/db.php';

// Check if a cancellation request has been submitted
if (isset($_POST['cancel_id'])) {
    $cancel_id = $_POST['cancel_id'];
    
    // Ensure that the cancellation ID is valid
    if (!empty($cancel_id)) {
        // Delete the appointment from the database
        $delete_sql = "DELETE FROM appointments WHERE id = ?";
        
        // Prepare the statement to avoid SQL injection
        if ($stmt = $conn->prepare($delete_sql)) {
            $stmt->bind_param("i", $cancel_id); // Bind the cancel_id as an integer
            if ($stmt->execute()) {
                echo "<div class='alert alert-success'>Appointment canceled successfully.</div>";
            } else {
                echo "<div class='alert alert-danger'>Failed to cancel the appointment. Please try again.</div>";
            }
            $stmt->close();
        } else {
            echo "<div class='alert alert-danger'>Error preparing the query.</div>";
        }
    }
}

// Ensure the session is started and the user is logged in
if (!isset($_SESSION['user_id'])) {
    echo "<div class='alert alert-danger'>User not logged in.</div>";
    exit();
}

// Fetch the appointments from the database
$user_id = $_SESSION['user_id']; // Sanitize the user input (use parameterized queries)
$sql = "SELECT id, branch, date, time, description, status, rating FROM appointments WHERE uid = ?";
if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param("i", $user_id); // Bind the user ID as an integer
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . htmlspecialchars($row['id']) . "</td>
                    <td>" . htmlspecialchars($row['branch']) . "</td>
                    <td>" . htmlspecialchars($row['date']) . "</td>
                    <td>" . htmlspecialchars($row['time']) . "</td>
                    <td>" . htmlspecialchars($row['description']) . "</td>
                    <td>" . htmlspecialchars($row['status']) . "</td>
                    <td>";

            // If the appointment status is 'Pending', show the 'Cancel' button
            if ($row['status'] == 'Pending') {
                echo "<button type='button' class='btn btn-danger' onclick='showCancelModal(" . $row['id'] . ")'>Cancel</button>";
            } elseif ($row['status'] == 'Consulted') {
                // If the appointment status is 'Consulted', show the star rating form
                echo "<form method='POST' action='../controller/rateConsultation.php' id='ratingForm_" . $row['id'] . "'>
                        <input type='hidden' name='appointment_id' value='" . $row['id'] . "'>
                        <label for='rating'>Rate the consultation:</label><br>
                        <div class='star-rating'>
                            <input type='radio' id='star5_" . $row['id'] . "' name='rating' value='5' " . ($row['rating'] == 5 ? 'checked' : '') . " onchange='submitRatingForm(" . $row['id'] . ")'>
                            <label for='star5_" . $row['id'] . "'>&#9733;</label>
                            <input type='radio' id='star4_" . $row['id'] . "' name='rating' value='4' " . ($row['rating'] == 4 ? 'checked' : '') . " onchange='submitRatingForm(" . $row['id'] . ")'>
                            <label for='star4_" . $row['id'] . "'>&#9733;</label>
                            <input type='radio' id='star3_" . $row['id'] . "' name='rating' value='3' " . ($row['rating'] == 3 ? 'checked' : '') . " onchange='submitRatingForm(" . $row['id'] . ")'>
                            <label for='star3_" . $row['id'] . "'>&#9733;</label>
                            <input type='radio' id='star2_" . $row['id'] . "' name='rating' value='2' " . ($row['rating'] == 2 ? 'checked' : '') . " onchange='submitRatingForm(" . $row['id'] . ")'>
                            <label for='star2_" . $row['id'] . "'>&#9733;</label>
                            <input type='radio' id='star1_" . $row['id'] . "' name='rating' value='1' " . ($row['rating'] == 1 ? 'checked' : '') . " onchange='submitRatingForm(" . $row['id'] . ")'>
                            <label for='star1_" . $row['id'] . "'>&#9733;</label>
                        </div>
                    </form>";
            }
            echo "</td></tr>";
        }
    } else {
        echo "<tr><td colspan='7'>No appointments available</td></tr>";
    }

    $stmt->close();
} else {
    echo "<div class='alert alert-danger'>Error fetching appointments. Please try again later.</div>";
}

$conn->close();
?>
