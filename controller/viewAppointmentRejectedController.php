<?php 
include '../model/db.php';

$sql = "SELECT appointments.id, CONCAT(user.First_name, ' ', user.Last_name) AS username, appointments.branch, appointments.date, appointments.time, appointments.description 
        FROM appointments 
        JOIN user ON appointments.uid = user.uid 
        WHERE appointments.status = 'rejected'";
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
              </tr>";
    }
} else {
    echo "<tr><td colspan='7'>No pending appointments available</td></tr>";
}

$conn->close();
?>
