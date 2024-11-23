// Add the 'show' class to trigger animation when dropdown is opened
const dropdownButton = document.querySelector('#dropdownMenuButton');
dropdownButton.addEventListener('click', function() {
  const dropdown = dropdownButton.closest('.dropdown');
  dropdown.classList.toggle('show');
});

// animation 

