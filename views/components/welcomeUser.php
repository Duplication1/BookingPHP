<div class="modal fade" id="welcomeModalPopUp" tabindex="-1" aria-labelledby="welcomeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="welcomeModalLabel">Welcome!</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p id="welcomeMessage">You successfully logged in as an 
          <?php 
            if(isset($_SESSION['role']) && $_SESSION['role'] === 'user'){
              echo 'User, ' . ucfirst($_SESSION['firstname']); 
            }
            else if(isset($_SESSION['role']) && $_SESSION['role'] === 'admin'){
              echo 'Admin, ' . ucfirst($_SESSION['firstname']); 
            }
            else{
              echo 'Guest';
            }
          ?>!</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Got it</button>
      </div>
    </div>
  </div>
</div>
