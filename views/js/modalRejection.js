document.addEventListener("DOMContentLoaded", function () {
    let appointmentId;

    // Capture the appointment ID when Reject is clicked
    document.querySelectorAll(".reject-appointment").forEach((button) => {
        button.addEventListener("click", function () {
            appointmentId = this.getAttribute("data-id");
        });
    });

    // Capture the appointment ID when Accept is clicked
    document.querySelectorAll(".accept-appointment").forEach((button) => {
        button.addEventListener("click", function () {
            appointmentId = this.getAttribute("data-id");
            updateAppointmentStatus(appointmentId, 'accepted');
        });
    });

    // Handle confirmation of rejection
    document.getElementById("confirmReject").addEventListener("click", function () {
        if (appointmentId) {
            updateAppointmentStatus(appointmentId, 'rejected');
        }
    });

    // Handle confirmation of consultation (this will change the status to 'consulted')
    document.querySelectorAll(".consulted-appointment").forEach((button) => {
        button.addEventListener("click", function () {
            appointmentId = this.getAttribute("data-id");
            updateAppointmentStatus(appointmentId, 'consulted');
        });
    });

    // Function to update appointment status
    function updateAppointmentStatus(id, status) {
        fetch("../controller/updateAppointmentStatus.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify({
                id: id,
                status: status,
            }),
        })
            .then((response) => response.json())
            .then((data) => {
                // Show modal with success/failure message
                const statusMessage = document.getElementById("statusMessage");
                const statusModal = new bootstrap.Modal(document.getElementById("statusModal"));
                if (data.success) {
                    statusMessage.textContent = "Appointment " + status + " successfully!";
                } else {
                    statusMessage.textContent = "Error updating appointment status.";
                }

                // Show the modal
                statusModal.show();
                
                // Hide the success message after 2 seconds
                setTimeout(function () {
                    statusMessage.textContent = "";  // Clear the message
                    statusModal.hide(); // Hide the modal
                }, 2000); // 2 seconds delay before hiding the message/modal

                // Optionally, reload after modal closes
                const modalElement = document.getElementById("statusModal");
                modalElement.addEventListener('hidden.bs.modal', function () {
                    location.reload();  // Reload the page after the modal is closed
                });
            })
            .catch((error) => console.error("Error:", error));
    }
});
