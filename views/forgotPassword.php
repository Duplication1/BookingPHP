<?php
 include '../sessions/session_start.php';
 include '../controller/forgotPasswordController.php'
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <?php include 'components/header.php'; ?>
    
    <section class="sections" id="forgotPasswordSection">
        <form action="forgotPassword.php" method="POST" class="container login-container">
            <div class="row">
                <h2>Forgot Your Password?</h2>
                <p>Enter your email address below and we'll send you a link to reset your password.</p>
            </div>

            <div class="error-container">
                <?php
                if (!empty($errors)) {
                    foreach ($errors as $error) {
                        echo "<div class='alert alert-danger'>$error</div>";
                    }
                }
                ?>
            </div>
            
            <?php if ($successMessage): ?>
            <div class="alert alert-success"><?php echo $successMessage; ?></div>
            <?php endif; ?>

            <div class="login-registration-row row mt-5">
                <div class="col name-col">
                    <label for="email"><img src="../images/email-icon.png" alt="email" /></label>
                    <input type="email" name="email" placeholder="Enter your email" class="form-control" required />
                </div>
            </div>

            <div class="row">
                <input type="submit" value="Send Reset Link" class="btn btn-primary register-btn" />
            </div>
            
            <div class="row mt-3 text-center">
                <a href="login.php">Back to Login</a>
            </div>
        </form>
    </section>
    
    <?php include 'components/footer.html'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
