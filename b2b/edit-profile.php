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
              <div class="user-profile me-3"><img src="img/bg-img/9.jpg" alt="">
                <div class="change-user-thumb">
                  <form>
                    <input class="form-control-file" type="file">
                    <button><i class="lni lni-pencil"></i></button>
                  </form>
                </div>
              </div>
              <div class="user-info">
                <p class="mb-0 text-white">@UserName</p>
                <h5 class="mb-0">Suppliers Name</h5>
              </div>
            </div>
          </div>
          <!-- User Meta Data-->
          <div class="card user-data-card">
            <div class="card-body">
              <form action="" method="">
                <div class="mb-3">
                  <div class="title mb-2"><i class="lni lni-user"></i><span>Username</span></div>
                  <input class="form-control" type="text" value="designing-world">
                </div>
                <div class="mb-3">
                  <div class="title mb-2"><i class="lni lni-user"></i><span>Full Name</span></div>
                  <input class="form-control" type="text" value="Suha Jannat">
                </div>
                <div class="mb-3">
                  <div class="title mb-2"><i class="lni lni-phone"></i><span>Phone</span></div>
                  <input class="form-control" type="text" value="+880 000 111 222">
                </div>
                <div class="mb-3">
                  <div class="title mb-2"><i class="lni lni-envelope"></i><span>Email Address</span></div>
                  <input class="form-control" type="email" value="care@example.com">
                </div>
                <div class="mb-3">
                  <div class="title mb-2"><i class="lni lni-map-marker"></i><span>Shipping Address</span></div>
                  <input class="form-control" type="text" value="28/C Green Road, BD">
                </div>
                <button class="btn btn-success w-100" type="submit">Save All Changes</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
<?php
include('includes/footer.php');
?>