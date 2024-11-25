<?php
if(isset($_POST["submit"])) {
    // Retrieve form data
    $LastName = $_POST["LastName"];
    $FirstName = $_POST["FirstName"];
    $email = $_POST["Email"];
    $phoneNumber = $_POST["PhoneNumber"];
    $password = $_POST["password"];
    $RepeatPassword = $_POST["repeat_password"];
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
    $errors = array();

    // Check for missing fields
    if(empty($LastName) || empty($FirstName) || empty($email) || empty($phoneNumber) || empty($password) || empty($RepeatPassword)) {
        array_push($errors, "All fields are required.");
    }

    // Validate email
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        array_push($errors, "Email is not valid.");
    }

    // Validate phone number (optional check for numeric and length)
    if(!preg_match('/^\d{10}$/', $phoneNumber)) {
        array_push($errors, "Phone number must be 10 digits.");
    }

    // Check password length
    if(strlen($password) < 8) {
        array_push($errors, "Password must be at least 8 characters long.");
    }

    // Check if passwords match
    if($password != $RepeatPassword) {
        array_push($errors, "Passwords do not match.");
    }

    // Database connection
    require_once "../model/db.php";
    $sql = "SELECT * FROM user WHERE email = '$email' OR phone_number = '$phoneNumber'";
    $result = mysqli_query($conn, $sql);
    $rowCount = mysqli_num_rows($result);
    if($rowCount > 0) {
        array_push($errors, "Email or Phone Number already exists.");
    }

    // If there are errors, display them
    if(count($errors) > 0) {
        foreach($errors as $error) {
            echo "<div class='alert alert-danger'>$error</div>";
        }
    } else {
        // Insert into database if no errors
        $sql = "INSERT INTO user (Last_Name, First_Name, email, phone_number, password) VALUES (?, ?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);
        $preparestmt = mysqli_stmt_prepare($stmt, $sql);
        if($preparestmt) {
            mysqli_stmt_bind_param($stmt, "sssss", $LastName, $FirstName, $email, $phoneNumber, $passwordHash);
            mysqli_stmt_execute($stmt);
            echo "<div class='alert alert-success'>You are registered successfully!</div>";
        } else {
            die("Something went wrong with the registration.");
        }
    }
}
?>
