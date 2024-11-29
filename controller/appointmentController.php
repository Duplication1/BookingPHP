<?php
 // Start the session to maintain session data

// Include database connection
include '../model/db.php';  // Make sure this file contains the correct DB connection

$messages = []; // Initialize an array for messages (both errors and success)

// Check if the form is submitted via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data
    $date = $_POST['calendar'];  // Date selected in the calendar
    $time = $_POST['time'];  // Time selected by the user
    $branch = $_POST['branches'];  // Branch selected by the user
    $description = isset($_POST['description']) ? $_POST['description'] : '';  // Description (optional)
    $user_id = $_SESSION['user_id']; 
    $status = 'pending'; // Assuming the user ID is stored in the session

    // Validate the date and time (ensure it's within the correct range)
    $minTime = "08:00";
    $maxTime = "18:30";

    if ($time < $minTime || $time > $maxTime) {
        $messages[] = ['type' => 'error', 'text' => "Invalid time. Please choose a time between 08:00 AM and 06:30 PM."];
    }

    // Optional: Validate that the date is a valid format
    $date = DateTime::createFromFormat('Y-m-d', $date);
    if (!$date) {
        $messages[] = ['type' => 'error', 'text' => "Invalid date format."];
    }

    // Define the duration of the appointment (e.g., 15 minutes)
    $appointmentDuration = 15; // Duration in minutes

    // Convert time to DateTime object for easier manipulation
    $timeObj = DateTime::createFromFormat('H:i', $time);
    if (!$timeObj) {
        $messages[] = ['type' => 'error', 'text' => "Invalid time format."];
    }

    // Check if there are any errors before proceeding
    if (empty($messages)) {
        // Calculate the start and end time for the appointment
        $startTime = $timeObj;
        $endTime = clone $startTime;
        $endTime->add(new DateInterval("PT{$appointmentDuration}M")); // Add 15 minutes for the appointment

        // Format times to 'HH:MM' format
        $startTimeFormatted = $startTime->format('H:i');
        $endTimeFormatted = $endTime->format('H:i');

        // Check if the selected time conflicts with an existing appointment
        $query = "SELECT * FROM appointments WHERE date = ? AND branch = ? AND (
                  (time >= ? AND time < ?) OR 
                  (DATE_ADD(time, INTERVAL 15 MINUTE) > ? AND time < ?)
                  )";

        // Prepare the statement to prevent SQL injection
        if ($stmt = $conn->prepare($query)) {
            $stmt->bind_param("ssssss", $date->format('Y-m-d'), $branch, $startTimeFormatted, $endTimeFormatted, $startTimeFormatted, $endTimeFormatted);

            // Execute the query
            $stmt->execute();
            $result = $stmt->get_result();
            
            // Check if any appointment already exists for the selected time
            if ($result->num_rows > 0) {
                $messages[] = ['type' => 'error', 'text' => "This time slot is already taken. Please choose a different time."];
            } else {
                // Prepare the SQL query to insert the appointment
                $insertQuery = "INSERT INTO appointments (uid, branch, date, time, description, status) 
                                VALUES (?, ?, ?, ?, ?, ?)";

                // Prepare the insert statement
                if ($insertStmt = $conn->prepare($insertQuery)) {
                    $insertStmt->bind_param("ssssss", $user_id, $branch, $date->format('Y-m-d'), $startTimeFormatted, $description, $status);

                    // Execute the statement
                    if ($insertStmt->execute()) {
                        $messages[] = ['type' => 'success', 'text' => "Appointment booked successfully!"];
                    } else {
                        $messages[] = ['type' => 'error', 'text' => "Error: " . $insertStmt->error];
                    }

                    // Close the insert statement
                    $insertStmt->close();
                } else {
                    $messages[] = ['type' => 'error', 'text' => "Error: " . $conn->error];
                }
            }

            // Close the statement
            $stmt->close();
        } else {
            $messages[] = ['type' => 'error', 'text' => "Error: " . $conn->error];
        }
    }

    // Close the database connection
    $conn->close();
}
?>

