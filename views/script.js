// Add the 'show' class to trigger animation when dropdown is opened
const dropdownButton = document.querySelector('#dropdownMenuButton');
dropdownButton.addEventListener('click', function() {
  const dropdown = dropdownButton.closest('.dropdown');
  dropdown.classList.toggle('show');
});

// animation 

window.addEventListener('scroll', function() {
  var header = document.querySelector('.main-header');
  // Check if page has scrolled down by 100vh
  if (window.scrollY >= window.innerHeight) {
    header.classList.add('scrolled');
  } else {
    header.classList.remove('scrolled');
  }
});