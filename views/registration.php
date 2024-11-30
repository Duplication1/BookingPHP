
  <?php 
        include '../controller/registrationController.php';
  ?>

  <!DOCTYPE html>
  <html lang="en">
  <head>
  <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Registration Form</title>
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
    ?>
      <section class="sections" id="registrationSection">
          <form action="registration.php" method="post" class="registration-container container">
              <div class="row login-signup-row">
                  <a href="login.php" class="col login-col-v2">LOGIN</a>
                  <a href="registration.php" class="col signup-col-v2">SIGN UP</a>
              </div>
              <div class="error-container"> 
              <?php
                if (isset($_SESSION['errors'])) {
                  foreach ($_SESSION['errors'] as $error) {
                   echo "<div class='alert alert-danger'>$error</div>";
                   }
                    unset($_SESSION['errors']);
                   }
                  ?>
              </div>
              <div class="login-registration-row row mt-5">
                <div class="col name-col">
                  <label for="Email"><img src="../images/email-icon.png" /></label>
                  <input type="email" name="Email" placeholder="Email: " class="form-control" id="email"/>
                </div>
              </div>
              <div class="login-registration-row row">
                <div class="col name-col">
                <label for="LastName"><img src="../images/user-icon.png" /></label>
                  <input type="text" name="LastName" placeholder="LastName: " class="form-control" />
                </div>
                <div class="col name-col">
                <label for="FirstName"><img src="../images/user-icon.png" /></label>
                <input type="text" name="FirstName" placeholder="FirstName: " class="form-control"/>
                </div>
              </div>
              <div class="row login-registration-row ">
                <div class="col name-col">
                <label for="PhoneNumberl"><img src="../images/phone-icon.png" /></label>
                  <input type="text" name="PhoneNumber" placeholder="Number: " class="form-control"/>
                </div>
              </div>
              <div class="login-registration-row row">
              <div class="col name-col">
                  <label for="password"><img src="../images/password-icon.png"/></label>
                  <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                    <button class="eye-btn" type="button" id="togglePassword">
                      <i class="bi bi-eye-slash" id="toggleIcon"></i>
                    </button>
                </div>
              </div>
              <div class="login-registration-row row">
                <div class="col name-col">
                  <label for="repeatPassword"><img src="../images/email-icon.png" /></label>
                  <input type="password" name="repeat_password" placeholder="Repeat Password: " class="form-control" id="repeatPassword"/>
                  <button class="eye-btn" type="button" id="toggleRepeatPassword">
                      <i class="bi bi-eye-slash" id="toggleRepeatIcon" ></i>
                  </button>
                </div>
              </div>
              
              <div class="login-registration-row row">
                  <input type="submit" name="submit" value="SIGN UP" placeholder="submit" class="btn btn-primary register-btn" onclick="sendOTP()"/>
              </div>
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