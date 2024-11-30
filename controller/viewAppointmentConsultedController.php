<?php 
include '../model/db.php';

$sql = "SELECT appointments.id, CONCAT(user.First_name, ' ', user.Last_name) AS username, appointments.branch, appointments.date, appointments.time, appointments.description, appointments.rating
        FROM appointments 
        JOIN user ON appointments.uid = user.uid 
        WHERE appointments.status = 'consulted'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . htmlspecialchars($row['id']) . "</td>
                <td>" . htmlspecialchars($row['username']) . "</td>
                <td>" . htmlspecialchars($row['branch']) . "</td>
                <td>" . htmlspecialchars($row['date']) . "</td>
                <td>" . htmlspecialchars($row['time']) . "</td>
                <td>" . htmlspecialchars($row['description']) . "</td>
                <td>";

        // Check if a rating exists and display the stars accordingly
        if (!empty($row['rating'])) {
            // Display filled stars based on the rating value
            for ($i = 1; $i <= 5; $i++) {
                if ($i <= $row['rating']) {
                    echo "<span style='color: gold;'>&#9733;</span>"; // Filled star (gold)
                } else {
                    echo "<span>&#9733;</span>"; // Empty star
                }
            }
        } else {
          echo "no rate yet";
        }

        echo "</td></tr>";
    }
} else {
    echo "<tr><td colspan='7'>No consulted appointments available</td></tr>";
}

$conn->close();
?>




