<?php
include('includes/header.php');
$pid=$_GET['pid'];
$today=date('Y-m-d');
$query=mysqli_query($con,"SELECT product.* FROM `product` WHERE product.aid='$admin_id' and product.id='$pid'");
$row=mysqli_fetch_assoc($query);
$s_id=$row['set_id'];
$a_id=$row['att_id'];
$chk_size=mysqli_query($con,"SELECT * FROM `set_details_whole` WHERE s_id='$s_id' and aid='$admin_id'");
$row_chk=mysqli_fetch_assoc($chk_size);
?>
<style>
  .accordion {
  background-color: #00A79D;
  color: #fff;
  cursor: pointer;
  padding: 15px;
  width: 100%;
  border: none;
  text-align: center;
  outline: none;
  font-size: 18px;
  transition: 0.4s;
 
}

.panel {
  padding: 0 18px;
  display: none;
  background-color: white;
  overflow: hidden;
}

</style>
  <div class="page-content-wrapper">
      <!-- Product Slides-->
      <div class="product-slides owl-carousel">
        <!-- Single Hero Slide-->
        <div class="single-product-slide" style="background-image: url('img/bg-img/6.jpg')"></div>
        <!-- Single Hero Slide-->
        <div class="single-product-slide" style="background-image: url('img/bg-img/10.jpg')"></div>
        <!-- Single Hero Slide-->
        <div class="single-product-slide" style="background-image: url('img/bg-img/11.jpg')"></div>
      </div>
      <div class="product-description pb-3">
        <!-- Product Title & Meta Data-->
        <div class="product-title-meta-data bg-white mb-3 py-3">
          <div class="container d-flex justify-content-between">
            <div class="p-title-price">
              <h6 class="mb-1"><?echo $row['item_name'];?></h6>
              <p class="sale-price mb-0">$38<span>$41</span></p>
            </div>
           
          </div>
          <!-- Ratings-->
         
        </div>
        <!-- Flash Sale Panel->
      <div class="flash-sale-panel bg-white mb-3 py-3">
          <div class="container">
         
            <div class="sales-offer-content d-flex align-items-end justify-content-between">
             <div class="sales-volume text-end">
                <p class="mb-1 font-weight-bold">82% Sold Out</p>
                <div class="progress" style="height: 6px;">
                  <div class="progress-bar bg-warning" role="progressbar" style="width: 82%;" aria-valuenow="82" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
            </div>
          </div>
        </div> -->
        <!-- Selection Panel-->
        <div class="selection-panel bg-white mb-3 py-3">
          <div class="container d-flex align-items-center justify-content-between">
            <!-- Choose Color-->
            <div class="choose-color-wrapper">
              <h5 class="mb-1 font-weight-bold">Colors selected</h5>
              <div class="choose-color-radio d-flex align-items-center">
                <p>Red, Green, Blue</p>
            
              </div>
            </div>
            <!-- Choose Size-->
            <div class="choose-size-wrapper text-end">
              <h5 class="mb-1 font-weight-bold">Sizes selected</h5>
              <div class="choose-size-radio d-flex align-items-center">
                <p>S, M, L, XL, 24,28,30,32</p>
          
              </div>
            </div>
          </div>
        </div>
        <!-- Add To Cart-->
        <div class="cart-form-wrapper bg-white mb-3 py-3">
          <div class="container">
            <form class="cart-form" action="#" method="">
              <div class="order-plus-minus d-flex align-items-center">
                <div class="quantity-button-handler">-</div>
                <input class="form-control cart-quantity-input" type="text" step="1" name="quantity" value="3">
                <div class="quantity-button-handler">+</div>
              </div>
              <button class="btn btn-danger ms-3" type="submit">Add To Cart</button>
            </form>
          </div>
        </div>
        <!-- Product Specification-->
        <div class="p-specification bg-white mb-3 py-3">
          <div class="container">
            <h6>Specifications</h6>
            <p>Description about the product</p>
            <ul class="mb-3 ps-3">
              <li><i class="lni lni-checkmark-circle"> </i> 100% Good Reviews</li>
              <li><i class="lni lni-checkmark-circle"> </i> 7 Days Returns</li>
              <li> <i class="lni lni-checkmark-circle"> </i> Warranty not Applicable</li>
              <li> <i class="lni lni-checkmark-circle"> </i> 100% Brand New Product</li>
            </ul>
            <p class="mb-0">some details about the products..</p>
          </div>
        </div>
        <!-- Rating & Review Wrapper-->
         <button class="accordion" id="btn_panel" onclick="panelHeading()">View Details</button>
        <div class="panel">
    <!--     <div class="rating-and-review-wrapper bg-white py-3 mb-3">
           <?php 
                // $s_id=$row['set_id'];
               $query1=mysqli_query($con,"SELECT * FROM `set_details_whole` WHERE s_id='$s_id' and pid='$pid' and aid='$admin_id' group by set_id");
                    while ($rows=mysqli_fetch_assoc($query1)) 
                    {
                      
                        $set_id=$rows['set_id'];
                        $query2=mysqli_query($con,"SELECT * FROM `set_details_whole` WHERE set_id='$set_id' and s_id='$s_id' and pid='$pid' and aid='$admin_id'");                 
                        $query3=mysqli_query($con,"SELECT COUNT(DISTINCT(color)) as color,min_color FROM `set_details_whole` WHERE set_id='$set_id' and aid='$admin_id'");
                        $row3=mysqli_fetch_assoc($query3);
                        $query4=mysqli_query($con,"SELECT COUNT(DISTINCT(size)) as size,min_size FROM `set_details_whole` WHERE set_id='$set_id' and aid='$admin_id'");
                        $row4=mysqli_fetch_assoc($query4);
                        
                        if(($row3['min_color']==$row3['color']) && ($row4['min_size']==$row4['size']))
                      {
                        ?>
          <div class="container">  
            <table class="table-responsive">
                <thead>
              <tr> 
              <th>Colors</th>
              <th>Sizes</th>
            </tr>
            </thead>
            <?php 
              
                $wsp=0;
                    while($row2=mysqli_fetch_assoc($query2))
                    {
                     ?>
            <tr style="border-top: 2px solid #e1e8ee;">
              <td><?php echo str_replace('_', ' ',$row2['color']);?></td>
              <td><?php echo $row2['size']; } ?></td>
            </tr>
            
            </table>
          </div>
              <div class="container">
            <div class="row">
              <div class="col-6">
            <p>Prices per set in rupees</p>
           </div>
           <div class="col-6">
            <p><?php echo ($wsp).'.00/-';?></p>
           </div>
         </div>
          </div>
           <?php
            
            }
            else
              {
                  ?>
               <div class="container">
            
            <table class="table-responsive">
              
              <thead>
              <tr> 
              <th>Colors</th>
              <th>Sizes</th>
            </tr>
            </thead>
            <tr>
              <td><?php  
                  $set_id=$rows['set_id'];
                  $query5=mysqli_query($con,"SELECT DISTINCT(color) FROM `set_details_whole` WHERE set_id='$set_id' and s_id='$s_id' and aid='$admin_id'");
                  $sno='';
                  while($row5=mysqli_fetch_assoc($query5))
                  {
                   
                   echo $sno." ".str_replace('_', ' ',$row5['color']);
                $sno=',';
                }?></td>
              <td><?php 
                $query6=mysqli_query($con,"SELECT DISTINCT(size),wsp FROM `set_details_whole` WHERE set_id='$set_id' and s_id='$s_id' and aid='$admin_id'");
                $sno='';
                while($row6=mysqli_fetch_assoc($query6))
                {
                 
                 echo $sno." ".$row6['size'];
                $sno=',';
                $wsp=$row6['wsp'];
              }?></td>
            </tr>
            
            </table>
          </div>
                <div class="container">
            <div class="row">
              <div class="col-6">
            <p>Prices per set in rupees</p>
           </div>
           <div class="col-6">
            <p><?php echo ($wsp).'.00/- (per pcs)';?></p>
           </div>
         </div>
          </div>
          <?php
        } 
      }
      ?>
          
        </div>-->
        <div class="rating-and-review-wrapper bg-white py-3 mb-3">
          <table class="table">
              <thead>
              <tr> 
              <th>Colors</th>
              <th>Sizes</th>
              <th>Qty.</th>
            </tr>
            </thead>
            <tr style="border-top: 2px solid #e1e8ee;">
              <td>green</td>
              <td>S, M, L, XL</td>
              <td>20</td>
            </tr>
             <tr style="border-top: 2px solid #e1e8ee;">
              <td>red</td>
              <td>24, 28, 30, 32</td>
              <td>50</td>
            </tr>
             <tr style="border-top: 2px solid #e1e8ee;">
              <td>blue</td>
              <td>S, M, L</td>
              <td>32</td>
            </tr>
          </table>
        </div>
      </div>
       
      </div>
    </div>

    <script>
      var acc = document.getElementsByClassName("accordion");
      var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}
function panelHeading() {
  var x = document.getElementById("btn_panel");
  if (x.innerHTML === "View Details") {
    x.innerHTML = "Hide Details";
  } else {
    x.innerHTML = "View Details";
  }
}


    </script>

<?php
include('includes/footer.php');
?>