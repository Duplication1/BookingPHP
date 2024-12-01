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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
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
<section class="sections">
<?php 
    include 'components/imaginary-header.html';
    include 'components/viewAppointment-header.html'?>
    <div class="container">
    <?php include 'components/rejectModal.php';
                include 'components/modalSuccess.html';
        ?>
    <!-- Tab Navigation -->
    <ul class="nav nav-tabs" id="appointmentTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active admin-tab" id="pending-tab" data-bs-toggle="tab" data-bs-target="#pendingAppointments" type="button" role="tab">Pending</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link admin-tab" id="accepted-tab" data-bs-toggle="tab" data-bs-target="#acceptedAppointments" type="button" role="tab">Accepted</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link admin-tab" id="consulted-tab" data-bs-toggle="tab" data-bs-target="#consultedAppointments" type="button" role="tab">Consulted</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link admin-tab" id="rejected-tab" data-bs-toggle="tab" data-bs-target="#rejectedAppointments" type="button" role="tab">Rejected</button>
        </li>
    </ul>

    <!-- Tab Content -->
    <div class="tab-content mt-4">
        
        <div class="tab-pane fade show active" id="pendingAppointments" role="tabpanel">
            <table id="viewAppointmentTable" class="hover">
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
                    <?php include '../controller/viewAppointmentController.php'; ?>
                </tbody>
            </table>
        </div>

        <div class="tab-pane fade" id="acceptedAppointments" role="tabpanel">
            <table id="viewAppointmentAcceptedTable" class="hover">
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
                    <?php include '../controller/viewAppointmentAcceptedController.php'; ?>
                </tbody>
            </table>
        </div>

        <div class="tab-pane fade" id="consultedAppointments" role="tabpanel">
            <table id="viewAppointmentConsultedTable" class="hover">
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
                    <?php include '../controller/viewAppointmentConsultedController.php'; ?>
                </tbody>
            </table>
        </div>

        <div class="tab-pane fade" id="rejectedAppointments" role="tabpanel">
            <table id="viewAppointmentRejectedTable" class="hover">
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
                    <?php include '../controller/viewAppointmentRejectedController.php'; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

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
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>
    <script src="js/viewAppointmentTable.js"></script>
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
