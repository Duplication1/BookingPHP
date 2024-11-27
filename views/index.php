
<?php include '../controller/loginController.php'; 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wilerich Optical Clinic</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

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
    <?php include 'components/header.php'; ?>
    <div class="dashboard-body">
        <?php include 'components/goUp.html' ?>
        <section class="sections" id="firstSection">
        <?php include 'components/hero.html'; ?>
        </section>
        <?php include 'components/services.html'; ?>
        <section class="sections" id="secondSection">
            <?php 
              include 'components/visionAndMission.html';
              include 'components/landingFrames.html';
              include 'components/ourDoctors.html';
              include 'components/howItWorks.html';
            ?>
        </section>
        <section class="sections" id="thirdSection">
            <?php 
              include 'components/landingTestimonials.html'; 
            ?>
        </section>
        <?php include 'components/footer.html'; ?>
        
    </div>
    <script src="script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
    <script>
      new WOW().init();
    </script> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
      window.addEventListener('scroll', function() {
  var header = document.querySelector('.main-header');
  var goUp = document.querySelector('.go-up-link');
  // Check if page has scrolled down by 100vh
  if (window.scrollY >= window.innerHeight) {
    header.classList.add('scrolled');
    goUp.classList.add('appear');
  } else {
    header.classList.remove('scrolled');
    goUp.classList.remove('appear');
  }
});
    </script>
    <script src="links.js">
    </script>
</body>

</html>