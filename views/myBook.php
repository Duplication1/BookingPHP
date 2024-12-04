    <?php session_start();
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
    
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
    <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>My Book</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poly:ital@0;1&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="style.css" />
        <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Poly:ital@0;1&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
              include 'components/cancelModal.html';
              include 'components/errorModal.html';
              include 'components/myModalSuccess.html';
              include 'components/chatWithUs.html';
              ?>
          <section class="sections" id="myBookSection">
        <?php 
        
        include 'components/imaginary-header.html';
        include 'components/myBook-header.html' ?>

          <div class="my-table-container">
          <ul class="nav nav-tabs" role="tablist">
              <li class="nav-item" role="presentation">
                  <button class="nav-link admin-tab active" data-bs-toggle="tab" data-bs-target="#tab-table1">All</button>
              </li>
              <li class="nav-item" role="presentation">
                  <button class="nav-link admin-tab" data-bs-toggle="tab" data-bs-target="#tab-table5">Accepted</button>
              </li>
              <li class="nav-item" role="presentation">
                  <button class="nav-link admin-tab" data-bs-toggle="tab" data-bs-target="#tab-table2">Pending</button>
              </li>
              <li class="nav-item" role="presentation">
                  <button class="nav-link admin-tab" data-bs-toggle="tab" data-bs-target="#tab-table3">Consulted</button>
              </li>
              <li class="nav-item" role="presentation">
                  <button class="nav-link admin-tab" data-bs-toggle="tab" data-bs-target="#tab-table4">Rejected</button>
              </li>
          </ul>
              <div class="tab-content">
                  <div class="tab-pane show active fade" id="tab-table1">
                  <div class="overflow-x-table">
                      <table id="myTable" class="hover">
                          <thead class="table-head">
                              <tr>
                                  <th>No.</th>
                                  <th>Branch</th>
                                  <th>Date</th>
                                  <th>Time</th>
                                  <th>Description</th>
                                  <th>Status</th>
                                  <th>Actions</th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php include '../controller/myBookController.php'; ?>
                          </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="tab-table5">
                  <div class="overflow-x-table">
                  <table id="myTable5" class="hover">
                          <thead class="table-head">
                              <tr>
                                  <th>No.</th>
                                  <th>Branch</th>
                                  <th>Date</th>
                                  <th>Time</th>
                                  <th>Description</th>
                                  <th>Status</th>
                                  <th>Actions</th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php include '../controller/myBookController.php'; ?>
                          </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="tab-table2">
                  <div class="overflow-x-table">
                  <table id="myTable2" class="hover">
                          <thead class="table-head">
                              <tr>
                                  <th>No.</th>
                                  <th>Branch</th>
                                  <th>Date</th>
                                  <th>Time</th>
                                  <th>Description</th>
                                  <th>Status</th>
                                  <th>Actions</th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php include '../controller/myBookController.php'; ?>
                          </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="tab-table3">
                  <div class="overflow-x-table">
                  <table id="myTable3" class="hover">
                          <thead class="table-head">
                              <tr>
                                  <th>No.</th>
                                  <th>Branch</th>
                                  <th>Date</th>
                                  <th>Time</th>
                                  <th>Description</th>
                                  <th>Status</th>
                                  <th>Actions</th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php include '../controller/myBookController.php'; ?>
                          </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="tab-table4">
                  <div class="overflow-x-table">
                  <table id="myTable4" class="hover">
                          <thead class="table-head">
                              <tr>
                                  <th>No.</th>
                                  <th>Branch</th>
                                  <th>Date</th>
                                  <th>Time</th>
                                  <th>Description</th>
                                  <th>Status</th>
                                  <th>Actions</th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php include '../controller/myBookController.php'; ?>
                          </tbody>
                      </table>
                    </div>
                  </div>
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
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>
    <script src="js/dataTable.js"></script>
    <script src="js/cancelAppointmentModal.js"></script>
    <script>
  function showCancelModal(appointmentId) {
    // Set the appointment ID in the hidden input field of the form
    document.getElementById('cancel_id').value = appointmentId;
    // Show the modal
    new bootstrap.Modal(document.getElementById('cancelModal')).show();
  }
</script>
<script>
    function submitRatingForm(appointmentId) {
        var form = document.getElementById('ratingForm_' + appointmentId);
        form.submit();
    }
</script>
</body> 
</html>
