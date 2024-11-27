<?php
// Include session start if necessary
include '../sessions/session_start.php';
include '../controller/resetPasswordController.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <?php include 'components/header.php'; ?>
    
    <section class="sections" id="resetPasswordSection">
        <form action="resetPassword.php?token=<?php echo htmlspecialchars($token); ?>" method="POST" class="container login-container">
            <div class="row">
                <h2>Reset Your Password</h2>
                <p>Enter a new password below.</p>
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
                    <label for="password"><img src="../images/password-icon.png" alt="password" /></label>
                    <input type="password" name="password" placeholder="New Password" class="form-control" required />
                </div>
            </div>

            <div class="login-registration-row row mt-3">
                <div class="col name-col">
                    <label for="confirm_password"><img src="../images/password-icon.png" alt="confirm password" /></label>
                    <input type="password" name="confirm_password" placeholder="Confirm Password" class="form-control" required />
                </div>
            </div>

            <div class="row">
                <input type="submit" value="Reset Password" class="btn btn-primary register-btn" />
            </div>
        </form>
    </section>
    
    <?php include 'components/footer.html'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
