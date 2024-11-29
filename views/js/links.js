 document.addEventListener("DOMContentLoaded", function () {
    const links = document.querySelectorAll(".nav-link");
    const currentPage = window.location.pathname.split("/").pop(); // Get current file name
  
    links.forEach(link => {
      if (link.getAttribute("href") === currentPage) {
        link.classList.add("target");
      } else {
        link.classList.remove("target");
      }
    });
  });