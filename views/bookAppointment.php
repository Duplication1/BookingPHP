<?php 
    session_start();
    include '../sessions/session_detection.php';
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
        if ($_SESSION['role'] === 'user') {
            include 'components/userHeader.php';
        } else if ($_SESSION['role'] === 'admin') {
            include 'components/adminHeader.php';
        }
        include 'components/logoutModal.html';
    ?>

    <section class="sections" id="bookAppointmentSection">
        <form class="container" action="bookAppointment.php" method="POST">
            <div class="row">
                <h1>Book Appointment</h1>
                <p>We also accept walk-ins</p>
            </div>
            <div class="error-container">
              <?php foreach ($messages as $message): ?>
                  <div class="alert <?php echo $message['type'] === 'success' ? 'alert-success' : 'alert-danger'; ?>">
              <?php echo htmlspecialchars($message['text']); ?>
                  </div>
              <?php endforeach; ?>
            </div>
            <div class="row">
              <div class="col">
                <label for="inline-calendar">Date</label>
                <input id="inline-calendar" class="big-calendar" type="text" name="calendar" />
              </div>
              <div class="col">
                <label for="branches">Branches</label>
                  <select id="branches" name="branches" required>
                    <option value="branch1">Branch 1</option>
                  </select>

                  <label for="time">Time</label>
                  <input id="time" type="text" name="time" required />
        
                <div id="availabilityStatus"></div> <!-- Add this div for visual feedback -->

              <label for="description">Description (optional)</label>
              <textarea id="description" name="description"></textarea>
        
              <div class="row">
              <input id="booking-overview" type="checkbox" name="booking-overview" required/>
                <label for="booking-overview">By ticking this box, you consent to the collection and processing of your personal data, and you confirm that you have read and understood our Privacy Notice.</label>
               </div>
        <button type="submit" class="btn-submit">Submit</button>
    </div>
</div>

        </form>
    </section>

    <?php include 'components/footer.html'; ?>

    <script src="script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
    <script>
        new WOW().init();
    </script> 
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="domLoaded.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const links = document.querySelectorAll(".main-header .button-pulse");
            const buttonLinks = document.querySelectorAll(".main-header .button");
            const iconLinks = document.querySelectorAll(".main-header .icon");
            const currentPage = window.location.pathname.split("/").pop();

            links.forEach(link => {
                if (link.getAttribute("href") === currentPage) {
                    link.classList.add("target");
                    link.classList.remove("button-pulse");
                } else {
                    link.classList.remove("target");
                }
            });

            buttonLinks.forEach(link => {
                if (link.getAttribute("href") === currentPage) {
                    link.classList.add("target");
                } else {
                    link.classList.remove("target");
                }
            });

            iconLinks.forEach(icon => {
                const page = icon.getAttribute("data-page");
                if (page === currentPage) {
                    icon.classList.add("target");
                } else {
                    icon.classList.remove("target");
                }
            });
        });
    </script>

<script>
 document.addEventListener("DOMContentLoaded", function () {
    // Initialize Flatpickr for date selection
    flatpickr("#inline-calendar", {
        inline: true,
        dateFormat: "Y-m-d",
        minDate: "today",  // Ensure that users cannot pick a past date
        disableMobile: true,
    });

    // Initialize Flatpickr for time selection
    flatpickr("#time", {
        enableTime: true,  // Enable time selection
        noCalendar: true,  // Disable the calendar part (only time selection)
        dateFormat: "H:i", // Set the time format (24-hour format)
        minTime: "08:00",  // Minimum allowed time
        maxTime: "18:30",  // Maximum allowed time
        minuteIncrement: 15,  // Allow 15-minute intervals
    });

    const timeInput = document.getElementById("time");

    timeInput.addEventListener('input', function () {
    const selectedDate = document.getElementById("inline-calendar").value;
    const selectedTime = timeInput.value;

    if (selectedDate && selectedTime) {
        // Split the selected time into hours and minutes
        const timeParts = selectedTime.split(":");
        const hours = parseInt(timeParts[0], 10);
        const minutes = parseInt(timeParts[1], 10);

        // Create a Date object with the selected time
        const startTime = new Date();
        startTime.setHours(hours, minutes, 0, 0);

        // Calculate the start and end times for conflict checking
        const conflictStartTime = new Date(startTime.getTime() - 15 * 60000); // 15 minutes before
        const conflictEndTime = new Date(startTime.getTime() + 15 * 60000); // 15 minutes after

        // Format both start and end times to "HH:MM"
        const startFormatted = conflictStartTime.toTimeString().slice(0, 5);
        const endFormatted = conflictEndTime.toTimeString().slice(0, 5);

        // Send the data to the backend to check for conflicts
        fetch('../controller/checkConflict.php', {
            method: 'POST',
            body: JSON.stringify({
                date: selectedDate,
                startTime: startFormatted,
                endTime: endFormatted,
            }),
            headers: {
                'Content-Type': 'application/json',
            },
        })
        .then(response => response.json())
        .then(data => {
            const feedbackElement = document.getElementById("availabilityStatus");

            if (data.conflict) {
                feedbackElement.textContent = "This time slot is already booked!";
                feedbackElement.style.color = "red";
                timeInput.setCustomValidity("This time slot is unavailable.");
            } else {
                feedbackElement.textContent = "This time slot is available!";
                feedbackElement.style.color = "green";
                timeInput.setCustomValidity(""); // Clear the custom validity
            }
        })
        .catch(error => console.error("Error checking conflict: ", error));
    }
});
 });
</script>

</body>
</html>
