<?php 
  $errors = include '../controller/loginController.php';
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
    <?php include 'components/header.php'; ?>
    <section class="sections" id="loginSection">
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
                <div class="col">
                   <input type="checkbox" name="remember" id="rememberMe" class="form-check-input"/>
                  <label for="rememberMe">Stay Logged In?</label>
                </div>
                <div class="col">
                    <a href="forgotPassword.php" class="forgot-password-link">Forgot Password?</a>
                </div>
            </div>

            <div class="row">
                <input type="submit" name="login" value="Login" class="btn btn-primary register-btn" />
            </div>
        </form>
    </section>
    <?php include 'components/footer.html'; ?>
    <script src="script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
    <script>
      new WOW().init();
    </script> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="domLoaded.js"></script>
    <script>
     document.addEventListener("DOMContentLoaded", function () {
  const spanLinks = document.querySelectorAll(".main-header span"); // Select all spans
  const iconLinks = document.querySelectorAll(".main-header .icon"); // Select SVG icons
  const currentPage = window.location.pathname.split("/").pop(); // Get current file name

  // Function to add or remove 'target' class based on data-page values
  function updateTargetClass(elements) {
    elements.forEach(element => {
      const pages = element.getAttribute("data-page"); // Get the data-page attribute
      if (pages) {
        const pagesArray = pages.split(","); // Split the pages into an array
        if (pagesArray.includes(currentPage)) {
          element.classList.add("target"); // Add 'target' class if current page matches any in the list
        } else {
          element.classList.remove("target"); // Remove 'target' class otherwise
        }
      }
    });
  }

  // Apply the function to both span and icon elements
  updateTargetClass(spanLinks);
  updateTargetClass(iconLinks);
});
    </script>
</body>
</html>
