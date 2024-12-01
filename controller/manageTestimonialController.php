<?php
include '../controller/db.php';

$sql = "SELECT testimonials.id, testimonials.name, testimonials.testimonial, testimonials.image 
        FROM testimonials";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Handle image if it exists
        $imageHTML = $row['image'] ?  htmlspecialchars($row['image']) . "' alt='Image' width='50'>" : "No Image";

        echo "<tr>
                <td>" . htmlspecialchars($row['id']) . "</td>
                <td>" . htmlspecialchars($row['name']) . "</td>
                <td>" . htmlspecialchars($row['testimonial']) . "</td>
                <td>" . $imageHTML . "</td>
                <td>
                    <button class='btn btn-warning edit-btn' data-id='" . htmlspecialchars($row['id']) . "' data-name='" . htmlspecialchars($row['name']) . "' data-testimonial='" . htmlspecialchars($row['testimonial']) . "'><i class='bi bi-pencil'></i> Edit</button>
                    <button class='btn btn-danger delete-btn' data-id='" . htmlspecialchars($row['id']) . "'><i class='bi bi-trash'></i> Delete</button>
                </td>
              </tr>";
    }
} else {
   
}

$conn->close();
?>
