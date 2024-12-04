window.addEventListener('DOMContentLoaded', function() {
  var header = document.querySelector('.main-header');
  header.classList.add('scrolled');
});

// Add scroll event listener for the "go-up-link" visibility
window.addEventListener('scroll', function() {
  var goUp = document.querySelector('.go-up-link');

  if (window.scrollY >= window.innerHeight) {
      goUp.classList.add('appear');
  } else {
      goUp.classList.remove('appear');
  }
});
