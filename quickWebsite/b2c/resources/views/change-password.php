<?php
include('includes/header.php');

?>
  <div class="page-content-wrapper">
      <div class="container">
        <!-- Profile Wrapper-->
        <div class="profile-wrapper-area py-3">
          <!-- User Information-->
          <div class="card user-info-card">
            <div class="card-body p-4 d-flex align-items-center">
              <div class="user-profile me-3"><img src="img/bg-img/9.jpg" alt=""></div>
              <div class="user-info">
                <p class="mb-0 text-white">Username</p>
                <h5 class="mb-0">Supplier's Name</h5>
              </div>
            </div>
          </div>
          <!-- User Meta Data-->
          <div class="card user-data-card">
            <div class="card-body">
              <form action="#" method="">
                <div class="mb-3">
                  <div class="title mb-2"><i class="lni lni-key"></i><span>Old Password</span></div>
                  <input class="form-control" type="password">
                </div>
                <div class="mb-3">
                  <div class="title mb-2"><i class="lni lni-key"></i><span>New Password</span></div>
                  <input class="form-control" type="password">
                </div>
                <div class="mb-3">
                  <div class="title mb-2"><i class="lni lni-key"></i><span>Repeat New Password</span></div>
                  <input class="form-control" type="password">
                </div>
                <button class="btn btn-success w-100" type="submit">Update Password</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
<?php
include('includes/footer.php');
?>