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
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poly:ital@0;1&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poly:ital@0;1&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <?php include 'header.php'; ?>
    <div class="login-body">
        <div class="login-logo-container"><img src="../images/logo.png" />
            <p>WILERICH OPT.CLINIC</p>
        </div>
        <form class="login-form container" method="POST" action="">
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
    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <?php include 'footer.php'; ?>
</body>

</html>