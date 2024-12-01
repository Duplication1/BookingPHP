<?php
include '../model/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $testimonial = $_POST['testimonial'];
    $imagePath = "";

    if (!empty($_FILES['image']['name'])) {
        $targetDir = "uploads/";
        $imagePath = $targetDir . basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath);
    }

    $sql = "INSERT INTO testimonials (name, testimonial, image) VALUES ('$name', '$testimonial', '$imagePath')";
    $conn->query($sql);

    header("Location: ../views/testimonials.php");
}
?>
