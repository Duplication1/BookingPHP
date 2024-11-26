<?php 
    if (!isset($_SESSION['user_id'])) {
        // Redirect to the login page
        header("Location: login.php");
        exit();
    }
?>