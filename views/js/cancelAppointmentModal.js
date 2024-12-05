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
                cancel_id: cancelId, // Send the appointment ID
            }),
        })
        .then((response) => response.json())
        .then((data) => {
            const successModal = new bootstrap.Modal(document.getElementById("successModal"));
            const successMessage = document.getElementById("successMessage");

            if (data.success) {
                // Hide the confirmation modal
                const cancelModal = new bootstrap.Modal(document.getElementById("cancelModal"));
                cancelModal.hide();

                // Show success message
                successMessage.textContent = "Appointment canceled successfully!";
                successModal.show();

                // Automatically hide success modal after 2 seconds
                setTimeout(() => {
                    successModal.hide();
                    location.reload(); // Optionally reload the page
                }, 2000);
            } else {
                // Show failure message
                successMessage.textContent = "Failed to cancel the appointment. Please try again.";
                successModal.show();

                // Automatically hide success modal after 2 seconds
                setTimeout(() => {
                    successModal.hide();
                }, 2000);
            }
        })
        .catch((error) => {
            console.error("Error:", error);

            // Show error message
            const successModal = new bootstrap.Modal(document.getElementById("successModal"));
            const successMessage = document.getElementById("successMessage");
            successMessage.textContent = "An error occurred while trying to cancel the appointment.";
            successModal.show();

            // Automatically hide success modal after 2 seconds
            setTimeout(() => {
                successModal.hide();
            }, 2000);
        });
    });
});
