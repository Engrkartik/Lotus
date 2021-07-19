<?php
include('includes/header.php');
$type=$_GET['key'];

 ?>

 <div class="page-content-wrapper">
      <div class="container">
        <div class="pt-3">
          <!-- Hero Slides-->
          <div class="hero-slides owl-carousel">
            <!-- Single Hero Slide-->
            <div class="single-hero-slide" style="background-image: url('img/bg-img/1.jpg')">
              <div class="slide-content h-100 d-flex align-items-center">
                <div class="slide-text">
                  <h4 class="text-white mb-0" data-animation="fadeInUp" data-delay="100ms" data-wow-duration="1000ms">Amazon Echo</h4>
                  <p class="text-white" data-animation="fadeInUp" data-delay="400ms" data-wow-duration="1000ms">3rd Generation, Charcoal</p><a class="btn btn-primary btn-sm" href="#" data-animation="fadeInUp" data-delay="800ms" data-wow-duration="1000ms">Buy Now</a>
                </div>
              </div>
            </div>
            <!-- Single Hero Slide-->
            <div class="single-hero-slide" style="background-image: url('img/bg-img/2.jpg')">
              <div class="slide-content h-100 d-flex align-items-center">
                <div class="slide-text">
                  <h4 class="text-white mb-0" data-animation="fadeInUp" data-delay="100ms" data-wow-duration="1000ms">Light Candle</h4>
                  <p class="text-white" data-animation="fadeInUp" data-delay="400ms" data-wow-duration="1000ms">Now only $22</p><a class="btn btn-success btn-sm" href="#" data-animation="fadeInUp" data-delay="500ms" data-wow-duration="1000ms">Buy Now</a>
                </div>
              </div>
            </div>
            <!-- Single Hero Slide-->
            <div class="single-hero-slide" style="background-image: url('img/bg-img/3.jpg')">
              <div class="slide-content h-100 d-flex align-items-center">
                <div class="slide-text">
                  <h4 class="text-white mb-0" data-animation="fadeInUp" data-delay="100ms" data-wow-duration="1000ms">Best Furniture</h4>
                  <p class="text-white" data-animation="fadeInUp" data-delay="400ms" data-wow-duration="1000ms">3 years warranty</p><a class="btn btn-danger btn-sm" href="#" data-animation="fadeInUp" data-delay="800ms" data-wow-duration="1000ms">Buy Now</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
   
      <!-- Product Catagories-->
      <div class="product-catagories-wrapper py-3">
        <div class="container">
          <div class="section-heading">
            <h6>Product Categories</h6>
          </div>
          <div class="product-catagory-wrap">
            
            <div class="row g-3">
               <?php
                     if(!empty($_GET['id']))
                     {
                      $id=$_GET['id'];
                      $chk=mysqli_query($con,"SELECT * FROM `category` WHERE aid='$admin_id' and status!='R' and parent_id='$id'");
                      $chk2=mysqli_query($con,"SELECT * FROM `category` WHERE aid='$admin_id' and status!='R' and id='$id'");
                      $run=mysqli_fetch_assoc($chk2);

                     }else
                     {
                      $chk=mysqli_query($con,"SELECT * FROM `category` WHERE aid='$admin_id' and status!='R' and parent_id='0'");
                    }
                     while ($row=mysqli_fetch_assoc($chk)) {
                      $sub_id=$row['id'];
                      $chk3=mysqli_query($con,"SELECT * FROM `category` WHERE aid='$admin_id' and status!='R' and parent_id='$sub_id'");

                      ?>
              <!-- Single Catagory Card-->
              <div class="col-4">
                <div class="card catagory-card">
                  <div class="card-body">
                   
                <a class="text-danger" href="catagory.php"><svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-heart mb-2" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M8 2.748l-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
                </svg><span><?php echo $row["title"];?></span></a></div>
                </div>
              </div>
              <?php } ?>
            </div>            
          </div>
        </div>
      </div>
      <!-- video banner-->
      <div class="cta-area">
        <div class="container">
            <video width="100%" height="240" autoplay="autoplay" style="border:solid black 1px;">
            <source src="img/video.mp4" type="video/mp4">
          </video>
        </div>
      </div>

       <!-- Top Products-->
      <div class="top-products-area clearfix py-3">
        <div class="container">
          <div class="section-heading d-flex align-items-center justify-content-between">
            <h6>Featured Products</h6><a class="btn btn-danger btn-sm" href="featured-products.php">View All</a>
          </div>
          <div class="row g-3">
            <?php 
              $fetch_cust = mysqli_query($con,"SELECT product_order.*, product.item_name FROM `product_order` left JOIN product on product_order.pid = product.id WHERE product_order.feature != 0 and product_order.status='A' and product.aid='$admin_id' ORDER BY product_order.feature asc");
              while($row = mysqli_fetch_array($fetch_cust)){
                            
              ?>
            <!-- Single Top Product Card-->
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
            <!-- Single Top Product Card-->
          </div>
        </div>
        <br>
           <!-- discount banner-->
          <div class="cta-area">
        <div class="container">
           <div class="cta-text p-4 p-lg-5" style="background-image: url(img/bg-img/24.jpg)">
            <h4>End of season sale</h4>
            <p>Suha is a multipurpose, creative &amp; <br>modern mobile template.</p><a class="btn btn-danger" href="shop-list.php">Shop Today</a>
          </div>
        </div>
      </div>
      </div>

            <!-- Flash Sale Slide-->
       <div class="flash-sale-wrapper py-5">
        <div class="container">
          <div class="section-heading d-flex align-items-center justify-content-between">
            <h6 class="me-1 d-flex align-items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-lightning me-1" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="M11.251.068a.5.5 0 0 1 .227.58L9.677 6.5H13a.5.5 0 0 1 .364.843l-8 8.5a.5.5 0 0 1-.842-.49L6.323 9.5H3a.5.5 0 0 1-.364-.843l8-8.5a.5.5 0 0 1 .615-.09zM4.157 8.5H7a.5.5 0 0 1 .478.647L6.11 13.59l5.732-6.09H9a.5.5 0 0 1-.478-.647L9.89 2.41 4.157 8.5z"/>
          </svg>Our Products</h6><a class="btn btn-danger btn-sm" href="shop-list.php">View All</a>
          </div>
          <!-- Flash Sale Slide-->
          <div class="flash-sale-slide owl-carousel">
            <?php
              $query=mysqli_query($con,"SELECT product.*,category.title AS CAT_NAME FROM `product` LEFT JOIN category ON category.id=product.cat_id WHERE product.aid='$admin_id' and  product.status!='R' order by id desc");
              while ($row=mysqli_fetch_assoc($query)) {
                $item_img=$row['img'];
                  $img=mysqli_query($con,"SELECT img_url FROM `prod_img` WHERE img_id='$item_img' and aid='$admin_id' GROUP BY img_id");
                  $row2=mysqli_fetch_assoc($img);
            ?>
            <!-- Single Flash Sale Card-->
            <div class="card flash-sale-card">
              <div class="card-body"><a href="single-product.php"><img src="<?=$row2['img_url']?>" alt=""><span class="product-title"><?php echo $row['item_name'];?></span>
                <p class="sale-price"><?php echo $row['sale_price']." /pc"; ?></p></a>
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