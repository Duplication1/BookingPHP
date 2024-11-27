<?php 
// Include session start if necessary
$errors = [];
$successMessage = '';
$token = $_GET['token'] ?? '';

// Check if the token is provided
if (empty($token)) {
    $errors[] = "Invalid request. No token provided.";
} else {
    // Validate token
    include '../model/db.php';  // Include your database connection
    $sql = "SELECT * FROM password_resets WHERE token = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the token exists and is valid (not expired)
    if ($result->num_rows > 0) {
        $resetRequest = $result->fetch_assoc();
        $email = $resetRequest['email'];
        $expires = $resetRequest['expires'];

        if (time() > $expires) {
            // Token has expired
            $errors[] = "This password reset link has expired.";
        } else {
            // Token is valid, proceed with password reset
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $newPassword = $_POST['password'];
                $confirmPassword = $_POST['confirm_password'];

                // Validate password
                if (empty($newPassword) || empty($confirmPassword)) {
                    $errors[] = "Both password fields are required.";
                } elseif ($newPassword !== $confirmPassword) {
                    $errors[] = "Passwords do not match.";
                } else {
                    // Update the password in the database
                    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
                    $sql = "UPDATE user SET password = ? WHERE email = ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("ss", $hashedPassword, $email);
                    $stmt->execute();

                    // Delete the reset token from the database
                    $sql = "DELETE FROM password_resets WHERE token = ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("s", $token);
                    $stmt->execute();

                    $successMessage = "Your password has been successfully reset. You can now <a href='login.php'>login</a> with your new password.";
                }
            }
        }
    } else {
        $errors[] = "Invalid or expired token.";
    }
}
?>