<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer (use Composer autoload if installed via Composer)
require '../vendor/autoload.php';

// Start session to store error messages
session_start();

if (isset($_POST["submit"])) {
    // Retrieve form data
    $LastName = $_POST["LastName"];
    $FirstName = $_POST["FirstName"];
    $email = $_POST["Email"];
    $phoneNumber = $_POST["PhoneNumber"];
    $password = $_POST["password"];
    $RepeatPassword = $_POST["repeat_password"];
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
    $errors = array();

    // Validation
    if (empty($LastName) || empty($FirstName) || empty($email) || empty($phoneNumber) || empty($password) || empty($RepeatPassword)) {
        array_push($errors, "All fields are required.");
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        array_push($errors, "Email is not valid.");
    }

    if (!preg_match('/^\d{11}$/', $phoneNumber)) {
        array_push($errors, "Phone number must be 11 digits.");
    }

    if (strlen($password) < 8) {
        array_push($errors, "Password must be at least 8 characters long.");
    }

    if ($password != $RepeatPassword) {
        array_push($errors, "Passwords do not match.");
    }

    require_once "../model/db.php";
    $sql = "SELECT * FROM user WHERE email = '$email' OR phone_number = '$phoneNumber'";
    $result = mysqli_query($conn, $sql);
    $rowCount = mysqli_num_rows($result);
    if ($rowCount > 0) {
        array_push($errors, "Email or Phone Number already exists.");
    }

    // Store errors in session if any
    if (count($errors) > 0) {
        $_SESSION['errors'] = $errors; // Save errors to session
        header("Location: registration.php"); // Redirect back to registration page
        exit();
    } else {
        // Generate OTP
        $otp = rand(100000, 999999);
        $_SESSION["otp"] = $otp;
        $_SESSION["email"] = $email;
        $_SESSION["user_data"] = [
            "LastName" => $LastName,
            "FirstName" => $FirstName,
            "email" => $email,
            "phoneNumber" => $phoneNumber,
            "passwordHash" => $passwordHash,
        ];

        // Send OTP email using PHPMailer
        $mail = new PHPMailer(true);

        try {
            // Server settings
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; // SMTP server (e.g., Gmail)
            $mail->SMTPAuth = true;
            $mail->Username = 'gamot.kim.fernandez@gmail.com'; // Your SMTP username (Gmail address)
            $mail->Password = 'hqxs cqod evkz qmda'; // Your SMTP password (App Password for Gmail)
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Encryption (STARTTLS)
            $mail->Port = 587; // Port for STARTTLS (465 for SSL)

            // Recipients
            $mail->setFrom('gamot.kim.fernandez@gmail.com', 'Wilerich Optical Clinic'); // Sender email and name
            $mail->addAddress($email, "$FirstName $LastName"); // Recipient email and name

            // Email content
            $mail->isHTML(true);
            $mail->Subject = 'Your OTP Code';
            $mail->Body = "
                <h1>Welcome, $FirstName!</h1>
                <p>Your One-Time Password (OTP) is: <b>$otp</b></p>
                <p>This code is valid for 10 minutes.</p>
            ";

            $mail->send();
            header("Location: verifyOTP.php"); // Redirect to OTP verification page
            exit();
        } catch (Exception $e) {
            $_SESSION['errors'] = ["Error sending OTP email: {$mail->ErrorInfo}"]; // Capture PHPMailer errors
            header("Location: registration.php");
            exit();
        }
    }
}
?>
