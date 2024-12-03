<?php 
session_start();
 include '../controller/loginController.php';
  if (isset($_SESSION['user_id'])) {
    // Redirect to the login page
    header("Location: dashboard.php");
    exit();
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
    ?>
    <section class="sections" id="registrationSection">
        <form action="login.php" method="post" class="container login-container">
            <div class="row login-signup-row">
                <a href="login.php" class="col login-col">LOGIN</a>
                <a href="registration.php" class="col signup-col">SIGN UP</a>
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
          
            <div class="login-registration-row row mt-5">
                <div class="col name-col">
                    <label for="email"><img src="../images/email-icon.png" /></label>
                    <input type="email" name="Email" placeholder="Email: " class="form-control"
                        value="<?php echo isset($_POST['Email']) ? htmlspecialchars($_POST['Email']) : ''; ?>" />
                </div>
            </div>
            <div class="login-registration-row row">
                <div class="col name-col">
                    <label for="password"><img src="../images/password-icon.png" /></label>
                    <input type="password" class="form-control" id="loginPassword" placeholder="Password" name="password" />
                    <button class="eye-btn" type="button" id="loginButtonPassword">
                        <i class="bi bi-eye-slash" id="toggleLoginRepeatIcon"></i>
                    </button>
                </div>
            </div>

            <!-- Forgot Password Link -->
            <div class="row mt-3">
                <div class="col login-col2">
                   <input type="checkbox" name="remember" id="rememberMe" class="form-check-input stay-logged-in-input"/>
                  <label for="rememberMe" class="stay-logged-in-label">Stay Logged In?</label>
                </div>
                <div class="col login-col2">
                    <a href="forgotPassword.php" class="forgot-password-link">Forgot Password?</a>
                </div>
            </div>

            <div class="row">
                <input type="submit" name="login" value="LOGIN" class="btn btn-primary register-btn" />
            </div>
        </form>
    </section>
    <?php include 'components/footer.html'; ?>
    <script src="js/script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
    <script>
      new WOW().init();
    </script> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="js/domLoaded.js"></script>
    <script src="js/iconLinks.js"></script>
</body>
</html>
