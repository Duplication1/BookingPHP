<?php
// Include session start if necessary
session_start();
include '../controller/resetPasswordController.php';
if (isset($_SESSION['user_id'])) {
    // Redirect to the login page
    header("Location: dashboard.php");
    exit();
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poly:ital@0;1&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poly:ital@0;1&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
<?php 
    if (isset($_SESSION['role']) && $_SESSION['role'] === 'user') {
    include 'components/userHeader.php';
    } else if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
    include 'components/adminHeader.php';
    } else {
    include 'components/header.php';
      }
    include 'components/logoutModal.html';
    include 'components/chatWithUs.html';
    ?>
    
    <section class="sections" id="registrationSection">
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
                    <input type="password" name="password" placeholder="New Password" class="form-control" required id="password"/>
                    <button class="eye-btn" type="button" id="togglePassword">
                      <i class="bi bi-eye-slash" id="toggleIcon"></i>
                    </button>
                </div>
            </div>

            <div class="login-registration-row row mt-3">
                <div class="col name-col">
                    <label for="confirm_password"><img src="../images/password-icon.png" alt="confirm password" /></label>
                    <input type="password" name="confirm_password" placeholder="Confirm Password" class="form-control" required id="repeatPassword"/>
                    <button class="eye-btn" type="button" id="toggleRepeatPassword">
                      <i class="bi bi-eye-slash" id="toggleRepeatIcon" ></i>
                  </button>
                </div>
            </div>

            <div class="row">
                <input type="submit" value="Reset Password" class="btn btn-primary register-btn" />
            </div>
        </form>
    </section>
    
    <?php include 'components/footer.html'; ?>
    <script src="js/resetPassword.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
    <script>
      new WOW().init();
    </script> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="js/domLoaded.js"></script>
    <script src="js/iconLinks.js"></script>
</html>
