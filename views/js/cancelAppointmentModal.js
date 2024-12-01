
document.addEventListener("DOMContentLoaded", function () {
    let appointmentId;

    // Capture the appointment ID when Cancel button is clicked
    document.querySelectorAll(".cancel-appointment").forEach((button) => {
        button.addEventListener("click", function () {
            appointmentId = this.getAttribute("data-id");
            // Set the appointment ID to the hidden input in the modal form
            document.getElementById("cancel_id").value = appointmentId;
        });
    });

    // Handle form submission inside the confirmation modal
    document.getElementById("cancelForm").addEventListener("submit", function (event) {
        event.preventDefault(); // Prevent the default form submission
        
        // Send the cancel request using AJAX
        const cancelId = document.getElementById("cancel_id").value;
        
        fetch("../controller/cancelAppointment.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify({
                cancel_id: cancelId // Send the appointment ID
            }),
        })
        .then(response => response.json())
        .then(data => {
            // Check if the cancellation was successful
            if (data.success) {
                // Hide the confirmation modal
                const cancelModal = new bootstrap.Modal(document.getElementById("cancelModal"));
                cancelModal.hide();

                // Show the success modal
                const successModal = new bootstrap.Modal(document.getElementById("successModal"));
                const successMessage = document.getElementById("successMessage");
                successMessage.textContent = "Appointment canceled successfully!";
                successMessage.style.color = "green";

                // Show the success modal
                successModal.show();

                // Optionally, reload the page after the success modal is closed
                successModal._element.addEventListener('hidden.bs.modal', function () {
                    location.reload(); // Reload the page after the modal is closed
                });
            } else {
                // Show the failure message
                const successModal = new bootstrap.Modal(document.getElementById("successModal"));
                const successMessage = document.getElementById("successMessage");
                successMessage.textContent = "Failed to cancel the appointment. Please try again.";
                successMessage.style.color = "red";
                successModal.show();
            }
        })
        .catch(error => {
            console.error("Error:", error);
            // Show error message
            const successModal = new bootstrap.Modal(document.getElementById("successModal"));
            const successMessage = document.getElementById("successMessage");
            successMessage.textContent = "An error occurred while trying to cancel the appointment.";
            successMessage.style.color = "red";
            successModal.show();
        });
    });
});

