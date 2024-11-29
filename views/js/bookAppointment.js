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