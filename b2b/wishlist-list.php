<?php
include('includes/header.php');

?>

 <div class="page-content-wrapper">
      <!-- Top Products-->
      <div class="top-products-area py-3">
        <div class="container">
          <div class="section-heading d-flex align-items-center justify-content-between">
            <h6>Your Wishlist (4)</h6>
            <!-- Layout Options-->
            <div class="layout-options"><a href="wishlist-grid.php"><i class="lni lni-grid-alt"></i></a><a class="active" href="wishlist-list.php"><i class="lni lni-radio-button"></i></a></div>
          </div>
          <div class="row g-3">
            <!-- Single Weekly Product Card-->
            <div class="col-12 col-md-6">
              <div class="card weekly-product-card">
                <div class="card-body d-flex align-items-center">
                  <div class="product-thumbnail-side"><span class="badge badge-success">Sale</span>
                    <a class="product-thumbnail d-block" href="single-product.php"><img src="img/product/10.png" alt=""></a></div>
                  <div class="product-description"><a class="product-title d-block" href="single-product.php">Modern Red Sofa</a>
                    <p class="sale-price"><i class="lni lni-dollar"></i>$64<span>$89</span></p>
                    <a class="btn btn-success btn-sm" href="#"><i class="me-1 lni lni-cart"></i>Buy Now</a>
                  </div>
                </div>
              </div>
            </div>
            <!-- Single Weekly Product Card-->
            <div class="col-12 col-md-6">
              <div class="card weekly-product-card">
                <div class="card-body d-flex align-items-center">
                  <div class="product-thumbnail-side"><span class="badge badge-primary">Sale</span>
                    <a class="product-thumbnail d-block" href="single-product.php"><img src="img/product/7.png" alt=""></a></div>
                  <div class="product-description"><a class="product-title d-block" href="single-product.php">Office Chair</a>
                    <p class="sale-price"><i class="lni lni-dollar"></i>$100<span>$160</span></p>
                    <a class="btn btn-success btn-sm" href="#"><i class="me-1 lni lni-cart"></i>Buy Now</a>
                  </div>
                </div>
              </div>
            </div>
            <!-- Single Weekly Product Card-->
            <div class="col-12 col-md-6">
              <div class="card weekly-product-card">
                <div class="card-body d-flex align-items-center">
                  <div class="product-thumbnail-side"><span class="badge badge-danger">-10%</span>
                    <a class="product-thumbnail d-block" href="single-product.php"><img src="img/product/12.png" alt=""></a></div>
                  <div class="product-description"><a class="product-title d-block" href="single-product.php">Sun Glasses</a>
                    <p class="sale-price"><i class="lni lni-dollar"></i>$24<span>$32</span></p>
                    <a class="btn btn-success btn-sm" href="#"><i class="me-1 lni lni-cart"></i>Buy Now</a>
                  </div>
                </div>
              </div>
            </div>
            <!-- Single Weekly Product Card-->
            <div class="col-12 col-md-6">
              <div class="card weekly-product-card">
                <div class="card-body d-flex align-items-center">
                  <div class="product-thumbnail-side"><span class="badge badge-warning">New</span>
                    <a class="product-thumbnail d-block" href="single-product.php"><img src="img/product/13.png" alt=""></a></div>
                  <div class="product-description"><a class="product-title d-block" href="single-product.php">Wall Clock</a>
                    <p class="sale-price"><i class="lni lni-dollar"></i>$31<span>$47</span></p>
                    <a class="btn btn-success btn-sm" href="#"><i class="me-1 lni lni-cart"></i>Buy Now</a>
                  </div>
                </div>
              </div>
            </div>
            <!-- Select All Products-->
            <div class="col-12">
              <div class="select-all-products-btn">
              	<a class="btn btn-danger w-100" href="cart.php">
                  Add All To Cart</a></div>
            </div>
          </div>
        </div>
      </div>
    </div>
<?php
include('includes/footer.php');
?>