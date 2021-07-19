<?php
include('includes/header2.php');

?>

 <div class="page-content-wrapper">
      <!-- Top Products-->
      <div class="top-products-area py-3">
        <div class="container">
          <div class="section-heading d-flex align-items-center justify-content-between">
            <h6>Featured Products</h6>
          </div>
          <div class="row g-3">
             <?php 
              $fetch_cust = mysqli_query($con,"SELECT product_order.*, product.item_name FROM `product_order` left JOIN product on product_order.pid = product.id WHERE product_order.feature != 0 and product_order.status='A' and product.aid='$admin_id' ORDER BY product_order.feature asc");
              while($row = mysqli_fetch_array($fetch_cust)){
                            
              ?>
            <!-- Featured Product Card-->
            <div class="col-6 col-md-4 col-lg-3">
              <div class="card featured-product-card">
                <div class="card-body"><span class="badge badge-warning custom-badge"><i class="lni lni-star"></i></span>
                  <div class="product-thumbnail-side"><a class="wishlist-btn" href="#"><i class="lni lni-heart"></i></a><a class="product-thumbnail d-block" href="single-product.php"><img src="img/product/14.png" alt=""></a></div>
                  <div class="product-description"><a class="product-title d-block" href="single-product.php"><?php echo $row["item_name"];?></a>
                    <p class="sale-price">$discount price<span>$price</span></p>
                  </div>
                </div>
              </div>
            </div>
          <?php } ?>
           
          </div>
        </div>
      </div>
    </div>

<?php

include('includes/footer.php');
?>