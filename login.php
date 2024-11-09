<?php

// Include the database connection
include('db.php');
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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poly:ital@0;1&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>

<body>
    <div class="login-body">
        <div class="login-logo-container"><img src="images/logo.png" />
            <p>DENTAL CLINIC</p>
        </div>
        <form class="login-form" method="POST" action="">
            <h1 class="sign-in-label">Login</h1>

            <!-- Display error message if login fails -->
            <?php if ($error): ?>
                <p style="color:red;"><?= htmlspecialchars($error) ?></p>
            <?php endif; ?>

            <label for="username" class="login-label">Username</label>
            <input type="text" id="username" name="username" class="login-input-username" placeholder="Username" required />

            <label for="password" class="login-label-password">Password</label>
            <div class="password-container">
                <input type="password" id="password" name="password" class="login-input-password" placeholder="Password" required />
                <img id="togglePassword" class="eye-icon" src="images/closed_eye.png" alt="Toggle Password Visibility">
            </div>
            <button class="login-button" type="submit">Login</button>
            <p>No Account yet? <a href="#">Sign Up</a></p>
        </form>
    </div>
    <!-- JavaScript for password visibility toggle -->
    <script>
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('password');

        togglePassword.addEventListener('click', function() {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            this.src = type === 'password' ? 'images/closed_eye.png' : 'images/remove_red_eye.png';
        });
    </script>

    <?php include 'footer.php'; ?>
</body>

</html>