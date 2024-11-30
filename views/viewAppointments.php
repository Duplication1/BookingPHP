<?php 
    session_start();
    include '../sessions/session_detection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View An Appointment</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css">
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
    
    ?>
    <div class="d-flex view-appointment-main-container">
    <!-- Sidebar -->
    <div class="bg-light border-end" id="sidebar-wrapper" style="width: 250px; height: 100vh;">
    <div class="sidebar-heading text-center py-4">Appointments</div>
    <div class="list-group list-group-flush">
    <a href="#pendingAppointments" class="list-group-item list-group-item-action bg-light" id="pendingAppointmentsLink" data-target="#pendingAppointments">Pending Appointments</a>
    <a href="#acceptedAppointments" class="list-group-item list-group-item-action bg-light" id="acceptedAppointmentsLink" data-target="#acceptedAppointments">Accepted Appointments</a>
    <a href="#consultedAppointments" class="list-group-item list-group-item-action bg-light" id="consultedAppointmentsLink" data-target="#consultedAppointments">Consulted Appointments</a>
    <a href="#rejectedAppointments" class="list-group-item list-group-item-action bg-light" id="rejectedAppointmentsLink" data-target="#rejectedAppointments">Rejected Appointments</a>
</div>

</div>

    <!-- Main Content -->
    <div class="container-fluid">
        <?php include 'components/rejectModal.php';
                include 'components/modalSuccess.html';
        ?>
        
        <section id="pendingAppointments" class="" style="height: 100vh; padding-top: 5% !important;">
            <h2>Pending Appointments</h2>
            <table id="viewAppointmentTable">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Branch</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php include '../controller/viewAppointmentController.php';?>
            </tbody>
        </table>
        </section>
        <section id="acceptedAppointments" class="" style="height: 100vh; padding-top: 5% !important;">
            <h2>Accepted Appointments</h2>
            <table id="viewAppointmentAcceptedTable">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Branch</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php include '../controller/viewAppointmentAcceptedController.php';?>
            </tbody>
        </table>
        </section>
        <section id="consultedAppointments" class="" style="height: 100vh; padding-top: 5% !important;" >
            <h2>Consulted Appointments</h2>
            <table id="viewAppointmentConsultedTable">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Branch</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Description</th>
                    <th>Rate</th>
                </tr>
            </thead>
            <tbody>
                <?php include '../controller/viewAppointmentConsultedController.php';?>
            </tbody>
        </table>
        </section>
        <section id="rejectedAppointments" class="" style="height: 100vh; padding-top: 5% !important;">
            <h2>Rejected Appointments</h2>
            <table id="viewAppointmentRejectedTable">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Branch</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                <?php include '../controller/viewAppointmentRejectedController.php';?>
            </tbody>
        </table>
        </section>
    </div>
</div>


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
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>
    <script>
      $(document).ready(function () {
        $('#viewAppointmentTable').DataTable({
  columnDefs: [{
    "defaultContent": "-",
    "targets": "_all"
  }],
  "order": [[0, 'desc']]
});
        $('#viewAppointmentAcceptedTable').DataTable({
  columnDefs: [{
    "defaultContent": "-",
    "targets": "_all"
  }],
  "order": [[0, 'desc']]
});
        $('#viewAppointmentConsultedTable').DataTable({
  columnDefs: [{
    "defaultContent": "-",
    "targets": "_all"
  }],
  "order": [[0, 'desc']]
});
        $('#viewAppointmentRejectedTable').DataTable({
  columnDefs: [{
    "defaultContent": "-",
    "targets": "_all"
  }],
  "order": [[0, 'desc']]
});
      });
    </script>
<script>
    function submitRatingForm(appointmentId) {
        var form = document.getElementById('ratingForm_' + appointmentId);
        form.submit();
    }
</script>
    <script src="js/modalRejection.js"></script>
    <script src="js/viewAppointment.js"></script>

</body>
</html>
