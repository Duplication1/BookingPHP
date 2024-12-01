<?php session_start();
  include '../controller/createTestimonialController.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Testimonials</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poly:ital@0;1&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css">
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
    ?>
    <section class="sections" id="createTestimonialSection">
    <?php 
    include 'components/imaginary-header.html';
    include 'components/createTestimonials-header.html';
    include 'components/modalTestimonials.html';
    include 'components/deleteConfirmationModal.html';
    include 'components/successfulModalTestimony.html';
    include 'components/updateTestimonialModal.html';
    ?>
       <div class="container mt-5">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="testimonial" class="form-label">Testimonial</label>
                <textarea class="form-control" id="testimonial" name="testimonial" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Upload Picture (optional)</label>
                <input type="file" class="form-control" id="image" name="image" accept="image/*">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>  
    </div>
    <div class="container mt-5">
    <table id="testimonialsTable" class="hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Testimonial</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
              include '../controller/showTestimonialController.php';
             ?>
        </tbody>
    </table>
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
    <script>
      $(document).ready(function () {
    $('#testimonialsTable').DataTable({
        columnDefs: [
            {
                targets: '_all', // Apply to all columns
                className: 'text-center align-middle ellipsis', // Center-align and truncate text
                width: '150px' // Fixed width for columns
            }
        ],
        rowCallback: function (row, data, index) {
            var fullText = data[2]; // Assuming 3rd column has the full text
            if (fullText && fullText.length > 50) { // Limit to 100 characters
                // Truncate the content in the 3rd column (index 2)
                $('td:eq(2)', row).text(fullText.substring(0, 50) + '...'); 
            }
        },
        order: [[0, 'desc']], // Sort by the first column in descending order
        language: {
            search: "<i class='bi bi-search'></i>", // Custom search field
       
        }
    });
});

    </script>
    <script src="js/testimonialEditAndDelete.js"></script>


</body>
</html>
