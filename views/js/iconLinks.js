
document.addEventListener("DOMContentLoaded", function () {
    const spanLinks = document.querySelectorAll(".main-header span"); // Select all spans
    const iconLinks = document.querySelectorAll(".main-header .icon"); // Select SVG icons
    const currentPage = window.location.pathname.split("/").pop(); // Get current file name
  
    // Function to add or remove 'target' class based on data-page values
    function updateTargetClass(elements) {
      elements.forEach(element => {
        const pages = element.getAttribute("data-page"); // Get the data-page attribute
        if (pages) {
          const pagesArray = pages.split(","); // Split the pages into an array
          if (pagesArray.includes(currentPage)) {
            element.classList.add("target"); // Add 'target' class if current page matches any in the list
          } else {
            element.classList.remove("target"); // Remove 'target' class otherwise
          }
        }
      });
    }
  
    // Apply the function to both span and icon elements
    updateTargetClass(spanLinks);
    updateTargetClass(iconLinks);
  });