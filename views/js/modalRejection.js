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
                    statusMessage.style.color = "green";
                } else {
                    statusMessage.textContent = "Error updating appointment status.";
                    statusMessage.style.color = "red";
                }

                // Show the modal
                statusModal.show();

                // Wait for the modal to close before reloading the page
                const modalElement = document.getElementById("statusModal");
                modalElement.addEventListener('hidden.bs.modal', function () {
                    location.reload();  // Reload after the modal is closed
                });
            })
            .catch((error) => console.error("Error:", error));
    }
});
