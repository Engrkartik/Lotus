<?php
include('includes/header.php');
?>
<div class="page-content-wrapper">
      <div class="container">
        <!-- Checkout Wrapper-->
        <div class="checkout-wrapper-area py-3">
          <!-- Billing Address-->
          <div class="billing-information-card mb-3">
            <div class="card billing-information-title-card">
              <div class="card-body">
                <h6 class="text-center mb-0 text-white">Billing Information</h6>
              </div>
            </div>
            <div class="card user-data-card">
              <div class="card-body">                                   
                <div class="single-profile-data d-flex align-items-center justify-content-between">
                  <div class="title d-flex align-items-center"><i class="lni lni-user"></i><span>Full Name</span></div>
                  <div class="data-content">SUHA JANNAT</div>
                </div>
                <div class="single-profile-data d-flex align-items-center justify-content-between">
                  <div class="title d-flex align-items-center"><i class="lni lni-envelope"></i><span>Email Address</span></div>
                  <div class="data-content">care@example.com</div>
                </div>
                <div class="single-profile-data d-flex align-items-center justify-content-between">
                  <div class="title d-flex align-items-center"><i class="lni lni-phone"></i><span>Phone</span></div>
                  <div class="data-content">+880 000 111 222</div>
                </div>
                <div class="single-profile-data d-flex align-items-center justify-content-between">
                  <div class="title d-flex align-items-center"><i class="lni lni-map-marker"></i><span>Shipping Address</span></div>
                  <div class="data-content">28/C Green Road, BD</div>
                </div>
                <!-- Edit Address--><a class="btn btn-danger w-100" href="edit-profile.php">Edit Billing Information</a>
              </div>
            </div>
          </div>
          <!-- Shipping Method Choose-->
          <div class="shipping-method-choose mb-3">
            <div class="card shipping-method-choose-title-card bg-success">
              <div class="card-body">
                <h6 class="text-center mb-0 text-white">Shipping Method Choose</h6>
              </div>
            </div>
            <div class="card shipping-method-choose-card">
              <div class="card-body">
                <div class="shipping-method-choose">
                  <ul class="ps-0">
                    <li>
                      <input id="fastShipping" type="radio" name="selector" checked>
                      <label for="fastShipping">Fast Shipping<span>1 days delivery for $1.0</span></label>
                      <div class="check"></div>
                    </li>
                    <li>
                      <input id="normalShipping" type="radio" name="selector">
                      <label for="normalShipping">Regular<span>3-7 days delivery for $0.4</span></label>
                      <div class="check"></div>
                    </li>
                    <li>
                      <input id="courier" type="radio" name="selector">
                      <label for="courier">Courier<span>5-8 days delivery for $0.3</span></label>
                      <div class="check"></div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <!-- Cart Amount Area-->
          <div class="card cart-amount-area">
            <div class="card-body d-flex align-items-center justify-content-between">
              <h5 class="total-price mb-0">$<span class="counter">39.84</span></h5><a class="btn btn-warning" href="checkout-payment.php">Confirm &amp; Pay</a>
            </div>
          </div>
        </div>
      </div>
    </div>

<?php
include('includes/footer.php');
?>