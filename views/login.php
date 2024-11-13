<?php
include('../model/db.php');
include('../controller/loginController.php');
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
        <div class="login-logo-container"><img src="../images/logo.png" />
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
                <img id="togglePassword" class="eye-icon" src="../images/closed_eye.png" alt="Toggle Password Visibility">
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
            this.src = type === 'password' ? '../images/closed_eye.png' : '../images/remove_red_eye.png';
        });
    </script>

    <?php include 'footer.php'; ?>
</body>

</html>