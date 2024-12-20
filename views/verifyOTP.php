<?php
    include '../controller/verifyOTPController.php';
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
    <title>Verify OTP</title>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
      <script src="https://smtpjs.com/v3/smtp.js"></script>
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
    <section class="sections" id="verifyOTPContainer">
    <div class="container mt-5 verify-otp-container">
        <form method="POST" action="" class="verify-otp-form">
        <h2 class="text-center">OTP Verification</h2>
        <img src="../images/otp-verify.png" />
        <p>
        We sent verification code to
            <?php echo $_SESSION['user_data']['email']; ?>.
        To very your email address, please check your inbox and enter the code below
        </p>
        
                <input type="text" class="form-control verify-otp-input" id="otp" name="otp" placeholder="Enter 6-digit code" required>
            <button type="submit" class="btn btn-primary verify-otp-btn">Verify code</button>
        </form>
    </div>
</section>
    <?php include 'components/footer.html'?>
    <script src="js/script.js">
      </script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
      <script>
        new WOW().init();
      </script> 
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
      <script src="js/domLoaded.js"></script>
      <script src="js/iconLinks.js"></script>
</body>
</html>