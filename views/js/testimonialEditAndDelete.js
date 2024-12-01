$(document).ready(function () {
    var testimonialIdToEdit = null; // Store the ID of the testimonial to edit

    // When the edit button is clicked
    $(document).on('click', '.edit-btn', function () {
        // Get the ID, name, and testimonial to edit
        testimonialIdToEdit = $(this).data('id');
        var name = $(this).data('name');
        var testimonial = $(this).data('testimonial');
        
        // Set the modal fields with the current testimonial data
        $('#editTestimonialId').val(testimonialIdToEdit);
        $('#editName').val(name);
        $('#editTestimonial').val(testimonial);

        // Show the edit modal
        $('#editModal').modal('show');
    });

    // When the delete button is clicked
    $(document).on('click', '.delete-btn', function () {
        // Get the ID of the testimonial to delete
        var testimonialIdToDelete = $(this).data('id');
        
        // Set the ID in the delete modal button to be used later
        $('#deleteTestimonialId').val(testimonialIdToDelete);

        // Show the delete confirmation modal
        $('#deleteModal').modal('show');
    });

    // Handle the form submission for editing the testimonial
   // Open the Edit Modal and populate it with the current testimonial data
$('.edit-btn').click(function () {
    var testimonialId = $(this).data('id');  // Get the ID of the testimonial
    var testimonialName = $(this).data('name');  // Get the name
    var testimonialText = $(this).data('testimonial');  // Get the testimonial text

    // Set the data into the modal fields
    $('#editId').val(testimonialId);
    $('#editName').val(testimonialName);
    $('#editTestimonial').val(testimonialText);

    // Show the modal
    $('#editModal').modal('show');
});

// Submit the edited testimonial form via AJAX
$('#editForm').submit(function (event) {
    event.preventDefault();  // Prevent the default form submission

    var formData = $(this).serialize();  // Serialize the form data

    $.ajax({
        url: '../controller/editTestimonial.php',  // Backend script to update the testimonial
        type: 'POST',
        data: formData,
        success: function (response) {
            $('#editModal').modal('hide');
            $('#successModal1').modal('show');  // Close the edit modal
            setTimeout(function () {
                location.reload(); // Reload the page to see the updated list
            }, 2000);   // Reload the page to reflect changes
        },
        error: function () {
            alert('Error updating testimonial.');
        }
    });
});


    // Handle the delete action
    $('#deleteTestimonialButton').click(function () {
        var testimonialIdToDelete = $('#deleteTestimonialId').val();
    
        // Send a delete request via AJAX to deleteTestimonial.php
        $.ajax({
            url: '../controller/deleteTestimonial.php',
            type: 'POST',
            data: { id: testimonialIdToDelete },
            success: function (response) {
                // Show success modal
                $('#successModal').modal('show');
    
                // Optionally, you can close the delete modal before showing the success modal
                $('#deleteModal').modal('hide');
    
                // Optionally reload the page after some delay
                setTimeout(function () {
                    location.reload(); // Reload the page to see the updated list
                }, 2000); // Delay of 2 seconds before reloading
            },
            error: function () {
                alert('There was an error deleting the testimonial.');
            }
        });
    });
    
});
