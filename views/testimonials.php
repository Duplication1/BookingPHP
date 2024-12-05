<?php session_start();
    include '../controller/testimonialController.php';
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Testimonials</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poly:ital@0;1&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poly:ital@0;1&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<?php 
    if (isset($_SESSION['role']) && $_SESSION['role'] === 'user') {
    include 'components/userHeader.php';
    include 'components/chatWithUs.html';
    } else if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
    include 'components/adminHeader.php';
    } else {
    include 'components/header.php';
      }
    include 'components/logoutModal.html';
    include 'components/goUp.html';
    if (!isset($_SESSION['user_id']) || $_SESSION['role'] === 'user'){
      include 'components/chatWithUs.html';
    }
    ?>
    <section class="sections" id="testimonialSection">
    <?php 
    include 'components/imaginary-header.html';
    include 'components/testimonial-header.html'?>
    <div class="container testimonials-main-container mt-5">
        <div class="row">
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="col-12 col-md-4 mb-5">
                    <div class="testimonial-card-v2 wow animate__fadeIn animate__animated " data-wow-delay="0.2s">
                    <img src="../images/apostrophe.png" w/>
                        <p class="testimonial-card-paragraph-v2">
                            <?php echo htmlspecialchars($row['testimonial']); ?>
                        </p>
                        <div class="landing-testimonial-picture-container-v2">
                            <?php if ($row['image']): ?>
                                <img src="<?php echo htmlspecialchars($row['image']); ?>" class="testimonial-picture mb-2" alt="Picture" width ="70px" height="70px" style="border-radius: 50%;">
                            <?php endif; ?>
                            <p class="blue-card-p"><?php echo htmlspecialchars($row['name']); ?></p>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>

    </section>
    <?php include 'components/footer.html'?>
    <script src="js/script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
    <script>
      new WOW().init();
    </script> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="js/domLoaded.js"></script>
    <script src="js/links.js"></script>
</body>
</html>
