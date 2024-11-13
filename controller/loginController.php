<?php 

session_start();

// Define error variable
$error = "";

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize the user input
    $username = mysqli_real_escape_string($conn, trim($_POST['username']));
    $password = mysqli_real_escape_string($conn, trim($_POST['password']));

    // Prepare query to fetch the user from the database using prepared statements
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? LIMIT 1");
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if user exists
    if ($result && mysqli_num_rows($result) > 0) {
        // Fetch the user record
        $user = mysqli_fetch_assoc($result);

        // Debugging: Print user data (Optional for troubleshooting)
        // print_r($user); exit();

        // Verify the password (no hashing, plain text comparison)
        if ($password === $user['password']) {
            // Start a session and save user information
            $_SESSION['username'] = $user['username'];
            $_SESSION['user_id'] = $user['id'];

            // Redirect the user to the dashboard or a different page
            header('Location: dashboard.php');
            exit();
        } else {
            $error = "Invalid username or password.";
        }
    } else {
        $error = "Invalid username or password.";
    }
}



?>