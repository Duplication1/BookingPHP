<?php
 include '../model/db.php'; 

 $sql = "SELECT * FROM appointments";  
 $result = $conn->query($sql);

 if ($result->num_rows > 0) {
     while ($row = $result->fetch_assoc()) {
         echo "<tr>
                 <td>" . htmlspecialchars($row['id']) . "</td>
                 <td>" . htmlspecialchars($row['branch']) . "</td>
                 <td>" . htmlspecialchars($row['date']) . "</td>
                 <td>" . htmlspecialchars($row['time']) . "</td>
                 <td>" . htmlspecialchars($row['description']) . "</td>
                 <td>" . htmlspecialchars($row['status']) . "</td>
               </tr>";
     }
 } else {

     echo "<tr><td colspan='6'>No appointments available</td></tr>";
 }
 $conn->close();
?>
