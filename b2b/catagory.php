 <?php
 include('includes/header2.php');
 $id=$_GET['id'];
$chk=mysqli_query($con,"SELECT * FROM `category` WHERE id='$id'");
$row=mysqli_fetch_assoc($chk);
 ?>   

    <div class="page-content-wrapper">
      <!-- Catagory Single Image-->
      <div class="pt-3">
        <div class="container">
          <div class="catagory-single-img pt-3" style="background-image: url('img/bg-img/5.jpg')"></div>
        </div>
      </div>
      <!-- Product Catagories-->
      <div class="product-catagories-wrapper py-3">
        <div class="container">
          <div class="section-heading">
            <h6>Sub Category</h6>
          </div>
          <div class="product-catagory-wrap">
            <div class="row g-3">
            	 <?php 
              $chk2=mysqli_query($con,"SELECT * FROM `category` WHERE parent_id='$id' and (aid='$admin_id' or aid='0')");
              while ($row2=mysqli_fetch_assoc($chk2)) {
                
              ?>
              <!-- Single Catagory Card-->
              <div class="col-4">
                <div class="card catagory-card">
                  <div class="card-body"><a class="text-danger" href="sub-catagory.php"><svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-heart mb-2" viewBox="0 0 16 16">
<path fill-rule="evenodd" d="M8 2.748l-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
</svg><span><?php echo $row2["sub_cat"];?></span></a></div>
                </div>
              </div>
          <?php } ?>
              <!-- Single Catagory Card-->
            </div>
          </div>
        </div>
      </div>
      <!-- Top Products-->
      <div class="top-products-area pb-3">
        <div class="container">
          <div class="section-heading d-flex align-items-center justify-content-between">
            <h6>Catagory Products</h6>
          </div>
          <div class="row g-3">
            <!-- Single Top Product Card-->
            <div class="col-6 col-md-4 col-lg-3">
              <div class="card top-product-card">
                <div class="card-body"><span class="badge badge-success">Sale</span><a class="wishlist-btn" href="#"><i class="lni lni-heart"></i></a><a class="product-thumbnail d-block" href="single-product.php"><img class="mb-2" src="img/product/11.png" alt=""></a><a class="product-title d-block" href="single-product.php">Beach Cap</a>
                  <p class="sale-price">$13<span>$42</span></p>
                 <a class="btn btn-success btn-sm" href="#"><i class="lni lni-plus"></i></a>
                </div>
              </div>
            </div>
            <!-- Single Top Product Card-->
            <div class="col-6 col-md-4 col-lg-3">
              <div class="card top-product-card">
                <div class="card-body"><span class="badge badge-primary">New</span><a class="wishlist-btn" href="#"><i class="lni lni-heart"></i></a><a class="product-thumbnail d-block" href="single-product.php"><img class="mb-2" src="img/product/5.png" alt=""></a><a class="product-title d-block" href="single-product.php">Wooden Sofa</a>
                  <p class="sale-price">$74<span>$99</span></p>
                  <a class="btn btn-success btn-sm" href="#"><i class="lni lni-plus"></i></a>
                </div>
              </div>
            </div>
            <!-- Single Top Product Card-->
            <div class="col-6 col-md-4 col-lg-3">
              <div class="card top-product-card">
                <div class="card-body"><span class="badge badge-success">Sale</span><a class="wishlist-btn" href="#"><i class="lni lni-heart"></i></a><a class="product-thumbnail d-block" href="single-product.php"><img class="mb-2" src="img/product/6.png" alt=""></a><a class="product-title d-block" href="single-product.php">Roof Lamp</a>
                  <p class="sale-price">$99<span>$113</span></p>
                 <a class="btn btn-success btn-sm" href="#"><i class="lni lni-plus"></i></a>
                </div>
              </div>
            </div>
            <!-- Single Top Product Card-->
            <div class="col-6 col-md-4 col-lg-3">
              <div class="card top-product-card">
                <div class="card-body"><span class="badge badge-danger">-15%</span><a class="wishlist-btn" href="#"><i class="lni lni-heart"></i></a><a class="product-thumbnail d-block" href="single-product.php"><img class="mb-2" src="img/product/9.png" alt=""></a><a class="product-title d-block" href="single-product.php">Sneaker Shoes</a>
                  <p class="sale-price">$87<span>$92</span></p>
                  <a class="btn btn-success btn-sm" href="#"><i class="lni lni-plus"></i></a>
                </div>
              </div>
            </div>
            <!-- Single Top Product Card-->
            <div class="col-6 col-md-4 col-lg-3">
              <div class="card top-product-card">
                <div class="card-body"><span class="badge badge-danger">-11%</span><a class="wishlist-btn" href="#"><i class="lni lni-heart"></i></a><a class="product-thumbnail d-block" href="single-product.php"><img class="mb-2" src="img/product/8.png" alt=""></a><a class="product-title d-block" href="single-product.php">Wooden Chair</a>
                  <p class="sale-price">$21<span>$25</span></p>
                 <a class="btn btn-success btn-sm" href="#"><i class="lni lni-plus"></i></a>
                </div>
              </div>
            </div>
            <!-- Single Top Product Card-->
            <div class="col-6 col-md-4 col-lg-3">
              <div class="card top-product-card">
                <div class="card-body"><span class="badge badge-warning">Hot</span><a class="wishlist-btn" href="#"><i class="lni lni-heart"></i></a><a class="product-thumbnail d-block" href="single-product.php"><img class="mb-2" src="img/product/4.png" alt=""></a><a class="product-title d-block" href="single-product.php">Polo Shirts</a>
                  <p class="sale-price">$38<span>$41</span></p>
                  <a class="btn btn-success btn-sm" href="#"><i class="lni lni-plus"></i></a>
                </div>
              </div>
            </div>
            <!-- Single Top Product Card-->
            <div class="col-6 col-md-4 col-lg-3">
              <div class="card top-product-card">
                <div class="card-body"><span class="badge badge-success">Sale</span><a class="wishlist-btn" href="#"><i class="lni lni-heart"></i></a><a class="product-thumbnail d-block" href="single-product.php"><img class="mb-2" src="img/product/11.png" alt=""></a><a class="product-title d-block" href="single-product.php">Beach Cap</a>
                  <p class="sale-price">$13<span>$42</span></p>
                  <a class="btn btn-success btn-sm" href="#"><i class="lni lni-plus"></i></a>
                </div>
              </div>
            </div>
            <!-- Single Top Product Card-->
            <div class="col-6 col-md-4 col-lg-3">
              <div class="card top-product-card">
                <div class="card-body"><span class="badge badge-primary">New</span><a class="wishlist-btn" href="#"><i class="lni lni-heart"></i></a><a class="product-thumbnail d-block" href="single-product.php"><img class="mb-2" src="img/product/5.png" alt=""></a><a class="product-title d-block" href="single-product.php">Wooden Sofa</a>
                  <p class="sale-price">$74<span>$99</span></p>
                 <a class="btn btn-success btn-sm" href="#"><i class="lni lni-plus"></i></a>
                </div>
              </div>
            </div>
            <!-- Single Top Product Card-->
            <div class="col-6 col-md-4 col-lg-3">
              <div class="card top-product-card">
                <div class="card-body"><span class="badge badge-success">Sale</span><a class="wishlist-btn" href="#"><i class="lni lni-heart"></i></a><a class="product-thumbnail d-block" href="single-product.php"><img class="mb-2" src="img/product/6.png" alt=""></a><a class="product-title d-block" href="single-product.php">Roof Lamp</a>
                  <p class="sale-price">$99<span>$113</span></p>
                <a class="btn btn-success btn-sm" href="#"><i class="lni lni-plus"></i></a>
                </div>
              </div>
            </div>
            <!-- Single Top Product Card-->
            <div class="col-6 col-md-4 col-lg-3">
              <div class="card top-product-card">
                <div class="card-body"><span class="badge badge-danger">-15%</span><a class="wishlist-btn" href="#"><i class="lni lni-heart"></i></a><a class="product-thumbnail d-block" href="single-product.php"><img class="mb-2" src="img/product/9.png" alt=""></a><a class="product-title d-block" href="single-product.php">Sneaker Shoes</a>
                  <p class="sale-price">$87<span>$92</span></p>
                  <a class="btn btn-success btn-sm" href="#"><i class="lni lni-plus"></i></a>
                </div>
              </div>
            </div>
            <!-- Single Top Product Card-->
            <div class="col-6 col-md-4 col-lg-3">
              <div class="card top-product-card">
                <div class="card-body"><span class="badge badge-danger">-11%</span><a class="wishlist-btn" href="#"><i class="lni lni-heart"></i></a><a class="product-thumbnail d-block" href="single-product.php"><img class="mb-2" src="img/product/8.png" alt=""></a><a class="product-title d-block" href="single-product.php">Wooden Chair</a>
                  <p class="sale-price">$21<span>$25</span></p>
                 <a class="btn btn-success btn-sm" href="#"><i class="lni lni-plus"></i></a>
                </div>
              </div>
            </div>
            <!-- Single Top Product Card-->
            <div class="col-6 col-md-4 col-lg-3">
              <div class="card top-product-card">
                <div class="card-body"><span class="badge badge-warning">Hot</span><a class="wishlist-btn" href="#"><i class="lni lni-heart"></i></a><a class="product-thumbnail d-block" href="single-product.php"><img class="mb-2" src="img/product/4.png" alt=""></a><a class="product-title d-block" href="single-product.php">Polo Shirts</a>
                  <p class="sale-price">$38<span>$41</span></p>
               <a class="btn btn-success btn-sm" href="#"><i class="lni lni-plus"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php 
    include('includes/footer.php');
    ?>