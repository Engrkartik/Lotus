<?php 
include('includes/header2.php');
?>

    <div class="page-content-wrapper">
      <!-- Top Products-->
      <div class="top-products-area py-3">
        <div class="container">
          <div class="section-heading d-flex align-items-center justify-content-between">
            <h6>All Products</h6>
            <!-- Select Product Catagory-->
            <div class="select-product-catagory">
              <select class="form-select" id="selectProductCatagory" name="selectProductCatagory" aria-label="Default select example">
                <option selected>Sort by</option>
                <option value="1">price</option>
                <option value="2">newest</option>
                
              </select>
            </div>
          </div>
          <div class="product-catagories">
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
              <!-- Single Catagory-->
              <div class="col-4"><a class="shadow-sm" href="#"><img src="img/product/5.png" alt=""><?php echo $row["title"];?></a></div>
            <?php } ?>
            </div>
          </div>
       
          <div class="row g-3">
               <?php
              $query=mysqli_query($con,"SELECT product.*,category.title AS CAT_NAME FROM `product` LEFT JOIN category ON category.id=product.cat_id WHERE product.aid='$admin_id' and  product.status!='R' order by id desc");
              while ($row=mysqli_fetch_assoc($query)) {
                $item_img=$row['img'];
                  $img=mysqli_query($con,"SELECT img_url FROM `prod_img` WHERE img_id='$item_img' and aid='$admin_id' GROUP BY img_id");
                  $row2=mysqli_fetch_assoc($img);
            
          ?>
            <!-- Single Weekly Product Card-->
            <div class="col-12 col-md-6">
              <div class="card weekly-product-card">
                <div class="card-body d-flex align-items-center">
                  <div class="product-thumbnail-side"><span class="badge badge-success">Sale</span><a class="wishlist-btn" href="wishlist-list.php"><i class="lni lni-heart"></i></a><a class="product-thumbnail d-block" href="single-product.php"><img src="<?=$row2['img_url']?>" alt=""></a></div>
                  <div class="product-description"><a class="product-title d-block" href="single-product.php"><?php echo $row['item_name'];?></a>
                    <p class="sale-price"><i class="lni lni-rupee"></i><?php echo $row['sale_price']." /pc"; ?></p>
                    <a class="btn btn-danger btn-sm" href="cart.php"><i class="me-1 lni lni-cart"></i>Buy Now</a>
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