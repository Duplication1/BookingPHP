<?php 
   session_start();
  
   if (!isset($_SESSION['user_id'])) {
       header("Location: login.php");
       exit();
   } else {
       if ($_SESSION['role'] === 'admin') {
           $previousPage = $_SERVER['HTTP_REFERER'] ?? 'index.php'; 
           header("Location: $previousPage");
           exit();
       }
    
   }
    include '../controller/appointmentController.php'; // Fixed missing semicolon
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book An Appointment</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poly:ital@0;1&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
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
    include 'components/bookingSuccessModal.html';
    include 'components/bookingFailModal.html';
    include 'components/chatWithUs.html';
    ?>
    <section class="sections" id="bookAppointmentSection">
    <?php 
    include 'components/imaginary-header.html';
    include 'components/aboutUs-header.html'?>
        <form class="container" action="bookAppointment.php" method="POST">
            <div class="row book-appointment-title">
                <h1 class="book-appointment-h1">Book Appointment</h1>
                <p class="book-appointment-p">We also accept walk-ins</p>
            </div>
            <div class="row">
              <div class="col">
                <label for="inline-calendar" class="inline-date-calendar">Date</label>
                <input id="inline-calendar" class="big-calendar" type="text" name="calendar" />
              </div>
              <div class="col appointment-right-col">
                <label for="branches" class="book-appointment-branches">Branches</label>
                  <select id="branches" name="branches" class="branches-input" required>
                    <option value="82-B Visayas Ave, Tandang Sora, Quezon City, Metro Manila, Philippines">82-B Visayas Ave, Tandang Sora, Quezon City, Metro Manila, Philippines</option>
                  </select>

                  <label for="time" class="appointment-time">Time</label>
                  <input id="time" type="text" name="time" required class="input-time" />
        
                <div id="availabilityStatus"></div> <!-- Add this div for visual feedback -->

              <label for="description" class="appointment-description">Description (optional)</label>
              <textarea id="description" name="description" class="appointment-textarea"></textarea>
              <label for="booking-overview" class="booking-overview">Booking Overview</label> 
              <div class="row">
                <div class="col-1 col-checkbox-appointment">
                  <input id="booking-overview" type="checkbox" name="booking-overview" required class="checkbox-appointment form-check-input"/>
                </div>
                <div class="col-11">
                <p class="checkbox-appointment-p">By ticking this box, you consent to the collection and processing of your personal data, and you confirm that you have read and understood our Privacy Notice.</p>
                </div>
               </div>
        <button type="submit" class="btn btn-primary appointment-submit">Submit</button>
    </div>
</div>

        </form>
    </section>

    <?php include 'components/footer.html'; ?>

    <script src="js/script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
    <script>
        new WOW().init();
    </script> 
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="js/domLoaded.js"></script>
    <script src="js/bookAppointment.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        <?php if (!empty($messages)): ?>
            <?php foreach ($messages as $message): ?>
                <?php if ($message['type'] === 'success'): ?>
                    var successModal = new bootstrap.Modal(document.getElementById('successModal'));
                    successModal.show();
                <?php elseif ($message['type'] === 'error'): ?>
                    var errorModal = new bootstrap.Modal(document.getElementById('errorModal'));
                    errorModal.show();
                <?php endif; ?>
            <?php endforeach; ?>
        <?php endif; ?>
    });
</script>
</body>
</html>
