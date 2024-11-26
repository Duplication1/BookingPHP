<?php
$errors = []; // Initialize an array for errors

if (isset($_POST["login"])) {
    $email = $_POST["Email"];
    $password = $_POST["password"];

    // Validate email and password
    if (empty($email) || empty($password)) {
        $errors[] = "Both fields are required.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }

    if (empty($errors)) {
        // Connect to the database
        require_once "../model/db.php";

        $sql = "SELECT * FROM user WHERE email = ?";
        $stmt = mysqli_stmt_init($conn);

        if (mysqli_stmt_prepare($stmt, $sql)) {
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if ($row = mysqli_fetch_assoc($result)) {
                if (password_verify($password, $row['password'])) {
                    session_start();
                    $_SESSION['user_id'] = $row['uid'];
                    $_SESSION['email'] = $row['email'];
                    header("Location: dashboard.php");
                    exit();
                } else {
                    $errors[] = "Incorrect password.";
                }
            } else {
                $errors[] = "No account found with that email.";
            }
        } else {
            $errors[] = "Database query failed.";
        }
    }
}

// Return errors to be displayed in the form
return $errors;
