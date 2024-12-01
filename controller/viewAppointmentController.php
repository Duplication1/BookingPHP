<?php 
include '../model/db.php';

$sql = "SELECT appointments.id, CONCAT(user.First_name, ' ', user.Last_name) AS username, appointments.branch, appointments.date, appointments.time, appointments.description 
        FROM appointments 
        JOIN user ON appointments.uid = user.uid 
        WHERE appointments.status = 'pending'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $formattedDate = (new DateTime($row['date']))->format('M d, Y');  // Format the date as "Nov 30, 2024"
        $formattedTime = (new DateTime($row['time']))->format('g:i A'); 
        echo "<tr>
                <td>" . htmlspecialchars($row['id']) . "</td>
                <td>" . htmlspecialchars($row['username']) . "</td>
                <td>" . htmlspecialchars($row['branch']) . "</td>
                <td>" . $formattedDate . "</td>
                <td>" . $formattedTime . "</td>
                <td>" . htmlspecialchars($row['description']) . "</td>
                <td>
                    <button class='btn btn-success accept-appointment' data-id='" . htmlspecialchars($row['id']) . "'><i class='bi bi-check2-circle'></i></button>
                    <button class='btn btn-danger reject-appointment' data-bs-toggle='modal' data-bs-target='#exampleModal' data-id='" . htmlspecialchars($row['id']) . "'><i class='bi bi-trash'></i></button>
                </td>
              </tr>";
    }
} else {
  
}

$conn->close();
?>
