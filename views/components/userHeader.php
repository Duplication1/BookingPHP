<header class="main-header">
  <div class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-light">
      <a class="navbar-brand d-flex align-items-center" href="dashboard.php">
        <img src="../images/logo.png" alt="Dental Clinic Logo" height="50">
        <span class="ms-2 fw-bold logo-span"><span class="ms-2 fw-bold logo-span"><?php echo strtoupper($_SESSION['firstname']); ?>'S DASHBOARD</span>

      </a>
      <button class="navbar-toggler button" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link color-white fw-bold" href="aboutUs.php">ABOUT US</a>
          </li>
          <li class="nav-item">
            <a class="nav-link color-white fw-bold" href="testimonials.php">TESTIMONIALS</a>
          </li>
          <li class="nav-item">
            <a class="nav-link color-white fw-bold" href="contactUs.php">CONTACT US</a>
          </li>
          <li class="nav-item">
            <a class="nav-link color-white fw-bold" href="myBook.php">MY BOOK</a>
          </li>
        </ul>
        <div class="d-flex gap-2 align-items-center right-side-nav">
          <a class="btn book-an-appointment-btn button button-pulse" href="bookAppointment.php">
          <svg class="icon"  data-page="bookAppointment.php" width="20" height="20" viewBox="0 0 20 20"  xmlns="http://www.w3.org/2000/svg">
<path d="M4.16667 18.3337C3.70833 18.3337 3.31597 18.1705 2.98958 17.8441C2.66319 17.5177 2.5 17.1253 2.5 16.667V5.00033C2.5 4.54199 2.66319 4.14963 2.98958 3.82324C3.31597 3.49685 3.70833 3.33366 4.16667 3.33366H5V1.66699H6.66667V3.33366H13.3333V1.66699H15V3.33366H15.8333C16.2917 3.33366 16.684 3.49685 17.0104 3.82324C17.3368 4.14963 17.5 4.54199 17.5 5.00033V16.667C17.5 17.1253 17.3368 17.5177 17.0104 17.8441C16.684 18.1705 16.2917 18.3337 15.8333 18.3337H4.16667ZM4.16667 16.667H15.8333V8.33366H4.16667V16.667ZM4.16667 6.66699H15.8333V5.00033H4.16667V6.66699ZM10 11.667C9.76389 11.667 9.56597 11.5871 9.40625 11.4274C9.24653 11.2677 9.16667 11.0698 9.16667 10.8337C9.16667 10.5975 9.24653 10.3996 9.40625 10.2399C9.56597 10.0802 9.76389 10.0003 10 10.0003C10.2361 10.0003 10.434 10.0802 10.5938 10.2399C10.7535 10.3996 10.8333 10.5975 10.8333 10.8337C10.8333 11.0698 10.7535 11.2677 10.5938 11.4274C10.434 11.5871 10.2361 11.667 10 11.667ZM6.66667 11.667C6.43056 11.667 6.23264 11.5871 6.07292 11.4274C5.91319 11.2677 5.83333 11.0698 5.83333 10.8337C5.83333 10.5975 5.91319 10.3996 6.07292 10.2399C6.23264 10.0802 6.43056 10.0003 6.66667 10.0003C6.90278 10.0003 7.10069 10.0802 7.26042 10.2399C7.42014 10.3996 7.5 10.5975 7.5 10.8337C7.5 11.0698 7.42014 11.2677 7.26042 11.4274C7.10069 11.5871 6.90278 11.667 6.66667 11.667ZM13.3333 11.667C13.0972 11.667 12.8993 11.5871 12.7396 11.4274C12.5799 11.2677 12.5 11.0698 12.5 10.8337C12.5 10.5975 12.5799 10.3996 12.7396 10.2399C12.8993 10.0802 13.0972 10.0003 13.3333 10.0003C13.5694 10.0003 13.7674 10.0802 13.9271 10.2399C14.0868 10.3996 14.1667 10.5975 14.1667 10.8337C14.1667 11.0698 14.0868 11.2677 13.9271 11.4274C13.7674 11.5871 13.5694 11.667 13.3333 11.667ZM10 15.0003C9.76389 15.0003 9.56597 14.9205 9.40625 14.7607C9.24653 14.601 9.16667 14.4031 9.16667 14.167C9.16667 13.9309 9.24653 13.733 9.40625 13.5732C9.56597 13.4135 9.76389 13.3337 10 13.3337C10.2361 13.3337 10.434 13.4135 10.5938 13.5732C10.7535 13.733 10.8333 13.9309 10.8333 14.167C10.8333 14.4031 10.7535 14.601 10.5938 14.7607C10.434 14.9205 10.2361 15.0003 10 15.0003ZM6.66667 15.0003C6.43056 15.0003 6.23264 14.9205 6.07292 14.7607C5.91319 14.601 5.83333 14.4031 5.83333 14.167C5.83333 13.9309 5.91319 13.733 6.07292 13.5732C6.23264 13.4135 6.43056 13.3337 6.66667 13.3337C6.90278 13.3337 7.10069 13.4135 7.26042 13.5732C7.42014 13.733 7.5 13.9309 7.5 14.167C7.5 14.4031 7.42014 14.601 7.26042 14.7607C7.10069 14.9205 6.90278 15.0003 6.66667 15.0003ZM13.3333 15.0003C13.0972 15.0003 12.8993 14.9205 12.7396 14.7607C12.5799 14.601 12.5 14.4031 12.5 14.167C12.5 13.9309 12.5799 13.733 12.7396 13.5732C12.8993 13.4135 13.0972 13.3337 13.3333 13.3337C13.5694 13.3337 13.7674 13.4135 13.9271 13.5732C14.0868 13.733 14.1667 13.9309 14.1667 14.167C14.1667 14.4031 14.0868 14.601 13.9271 14.7607C13.7674 14.9205 13.5694 15.0003 13.3333 15.0003Z" />
</svg>
            Book An Appointment
          </a>
          <div class="white-vertical-lines"></div>
          
          <a class="btn color-white" href="mapLocation.php">
            <span class="search-span" data-page="mapLocation.php">MAP</span>
            <svg  class="icon" data-page="mapLocation.php" width="21" height="30" viewBox="0 0 21 30" xmlns="http://www.w3.org/2000/svg">
<path d="M10.5 30C7.85 30 5.6875 29.5813 4.0125 28.7438C2.3375 27.9062 1.5 26.825 1.5 25.5C1.5 24.9 1.68125 24.3438 2.04375 23.8312C2.40625 23.3188 2.9125 22.875 3.5625 22.5L5.925 24.7125C5.7 24.8125 5.45625 24.925 5.19375 25.05C4.93125 25.175 4.725 25.325 4.575 25.5C4.9 25.9 5.65 26.25 6.825 26.55C8 26.85 9.225 27 10.5 27C11.775 27 13.0063 26.85 14.1938 26.55C15.3813 26.25 16.1375 25.9 16.4625 25.5C16.2875 25.3 16.0625 25.1375 15.7875 25.0125C15.5125 24.8875 15.25 24.775 15 24.675L17.325 22.425C18.025 22.825 18.5625 23.2812 18.9375 23.7938C19.3125 24.3062 19.5 24.875 19.5 25.5C19.5 26.825 18.6625 27.9062 16.9875 28.7438C15.3125 29.5813 13.15 30 10.5 30ZM10.5375 21.75C13.0125 19.925 14.875 18.0938 16.125 16.2563C17.375 14.4188 18 12.575 18 10.725C18 8.175 17.1875 6.25 15.5625 4.95C13.9375 3.65 12.25 3 10.5 3C8.75 3 7.0625 3.65 5.4375 4.95C3.8125 6.25 3 8.175 3 10.725C3 12.4 3.6125 14.1437 4.8375 15.9562C6.0625 17.7687 7.9625 19.7 10.5375 21.75ZM10.5 25.5C6.975 22.9 4.34375 20.375 2.60625 17.925C0.86875 15.475 0 13.075 0 10.725C0 8.95 0.31875 7.39375 0.95625 6.05625C1.59375 4.71875 2.4125 3.6 3.4125 2.7C4.4125 1.8 5.5375 1.125 6.7875 0.675C8.0375 0.225 9.275 0 10.5 0C11.725 0 12.9625 0.225 14.2125 0.675C15.4625 1.125 16.5875 1.8 17.5875 2.7C18.5875 3.6 19.4062 4.71875 20.0438 6.05625C20.6812 7.39375 21 8.95 21 10.725C21 13.075 20.1313 15.475 18.3937 17.925C16.6562 20.375 14.025 22.9 10.5 25.5ZM10.5 13.5C11.325 13.5 12.0313 13.2063 12.6188 12.6188C13.2063 12.0313 13.5 11.325 13.5 10.5C13.5 9.675 13.2063 8.96875 12.6188 8.38125C12.0313 7.79375 11.325 7.5 10.5 7.5C9.675 7.5 8.96875 7.79375 8.38125 8.38125C7.79375 8.96875 7.5 9.675 7.5 10.5C7.5 11.325 7.79375 12.0313 8.38125 12.6188C8.96875 13.2063 9.675 13.5 10.5 13.5Z" />
</svg>
          </a>
          <div class="white-vertical-lines"></div>

          <a id="searchButton" class="btn color-white" href="searchPage.php">
            <span class="search-span" data-page="searchPage.php">SEARCH</span>
            <svg class="icon" data-page="searchPage.php"width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M27.6667 30L17.1667 19.5C16.3333 20.1667 15.375 20.6944 14.2917 21.0833C13.2083 21.4722 12.0556 21.6667 10.8333 21.6667C7.80556 21.6667 5.24306 20.6181 3.14583 18.5208C1.04861 16.4236 0 13.8611 0 10.8333C0 7.80556 1.04861 5.24306 3.14583 3.14583C5.24306 1.04861 7.80556 0 10.8333 0C13.8611 0 16.4236 1.04861 18.5208 3.14583C20.6181 5.24306 21.6667 7.80556 21.6667 10.8333C21.6667 12.0556 21.4722 13.2083 21.0833 14.2917C20.6944 15.375 20.1667 16.3333 19.5 17.1667L30 27.6667L27.6667 30ZM10.8333 18.3333C12.9167 18.3333 14.6875 17.6042 16.1458 16.1458C17.6042 14.6875 18.3333 12.9167 18.3333 10.8333C18.3333 8.75 17.6042 6.97917 16.1458 5.52083C14.6875 4.0625 12.9167 3.33333 10.8333 3.33333C8.75 3.33333 6.97917 4.0625 5.52083 5.52083C4.0625 6.97917 3.33333 8.75 3.33333 10.8333C3.33333 12.9167 4.0625 14.6875 5.52083 16.1458C6.97917 17.6042 8.75 18.3333 10.8333 18.3333Z" />
</svg>

          </a>
          <div class="white-vertical-lines"></div>

          
           <a class="btn color-white" href="#" onclick="logOutModalPopUp()">
            <span class="search-span" data-page="">LogOut</span>
            <svg class="icon" data-page="login.php,registration.php,verifyOTP.php"width="45" height="40" viewBox="5 0 50 40" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M9.375 35C8.34375 35 7.46094 34.6736 6.72656 34.0208C5.99219 33.3681 5.625 32.5833 5.625 31.6667V8.33333C5.625 7.41667 5.99219 6.63194 6.72656 5.97917C7.46094 5.32639 8.34375 5 9.375 5H22.5V8.33333H9.375V31.6667H22.5V35H9.375ZM30 28.3333L27.4219 25.9167L32.2031 21.6667H16.875V18.3333H32.2031L27.4219 14.0833L30 11.6667L39.375 20L30 28.3333Z"/>
</svg>
          </a> 
        </div>
      </div>
    </nav>
  </div>
</header>
