window.addEventListener('scroll', function() {
    var header = document.querySelector('.main-header');
    var goUp = document.querySelector('.go-up-link');
    // Check if page has scrolled down by 100vh
    if (window.scrollY >= window.innerHeight) {
      header.classList.add('scrolled');
      goUp.classList.add('appear');
    } else {
      header.classList.remove('scrolled');
      goUp.classList.remove('appear');
    }
  });