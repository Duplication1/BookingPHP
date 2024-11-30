document.addEventListener("DOMContentLoaded", function() {
    var sidebarLinks = document.querySelectorAll(".list-group-item");
    var sections = document.querySelectorAll("section");

    // Function to remove 'active' class from all sidebar items
    function removeActiveClass() {
        sidebarLinks.forEach(function(link) {
            link.classList.remove("active");
        });
    }

    // Set up IntersectionObserver to watch each section
    var observer = new IntersectionObserver(function(entries) {
        entries.forEach(function(entry) {
            var target = entry.target;
            var link = document.querySelector(`a[data-target="#${target.id}"]`);

            if (entry.isIntersecting) {
                // Add 'active' class to the corresponding sidebar item
                removeActiveClass();
                link.classList.add("active");
            }
        });
    }, {
        threshold: 0.5 // 50% of the section is in view before triggering
    });

    // Observe each section
    sections.forEach(function(section) {
        observer.observe(section);
    });
});