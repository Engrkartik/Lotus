<?php
include('includes/header.php');
?>

<div class="page-content-wrapper">
  <div class="pb-3">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 bg-white rounded shadow-sm mb-2">
        <div class="px-4 py-3 text-uppercase font-weight-bold">Order summary </div>

          <!-- Shopping cart table -->
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col" class="border-0 bg-light">
                    <div class="p-2 px-3 text-uppercase">Product</div>
                  </th>
                  <th scope="col" class="border-0 bg-light">
                    <div class="py-2 text-uppercase">Price</div>
                  </th>
                  <th scope="col" class="border-0 bg-light">
                    <div class="py-2 text-uppercase">Qty</div>
                  </th>
                 
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td scope="row">
                  	<img src="https://res.cloudinary.com/mhmd/image/upload/v1556670479/product-1_zrifhn.jpg" alt="" width="70" class="img-fluid rounded shadow-sm">
                      <div class="ml-3 d-inline-block align-middle">
                        <h5 class="mb-0"> <a href="#" class="text-dark d-inline-block">Timex Unisex Originals</a></h5><span class="text-muted font-weight-normal font-italic d-block">Category: Watches</span>
                      </div>
                  </td>
                  <td class="align-middle"><strong><i class="lni lni-rupee"></i> 79.00</strong></td>
                  <td class="align-middle" style="text-align: center;"><strong>3</strong></td>

                </tr>
                    
                <tr>
                  <td scope="row">
                    <div>
                      <img src="https://res.cloudinary.com/mhmd/image/upload/v1556670479/product-3_cexmhn.jpg" alt="" width="70" class="img-fluid rounded shadow-sm">
                      <div class="ml-3 d-inline-block align-middle">
                        <h5 class="mb-0"><a href="#" class="text-dark d-inline-block">Lumixx camera lenses</a></h5><span class="text-muted font-weight-normal font-italic">Category: Electronics</span>
                      </div>
                    </div>
                  </td>
                  <td class="align-middle"><strong><i class="lni lni-rupee"></i>79.00</strong></td>
                  <td class="align-middle" style="text-align: center;"><strong>3</strong></td>
                
                </tr>
                <tr>
                  <td scope="row">
                    <div>
                      <img src="https://res.cloudinary.com/mhmd/image/upload/v1556670479/product-2_qxjis2.jpg" alt="" width="70" class="img-fluid rounded shadow-sm">
                      <div class="ml-3 d-inline-block align-middle">
                        <h5 class="mb-0"> <a href="#" class="text-dark d-inline-block">Gray Nike running shoe</a></h5><span class="text-muted font-weight-normal font-italic">Category: Fashion</span>
                      </div>
                    </div></td>
                    <td class="align-middle"><strong><i class="lni lni-rupee"></i>79.00</strong></td>
                    <td class="align-middle" style="text-align: center;"><strong>3</strong></td>
              
                </tr>
              </tbody>
            </table>
          </div>
          <!-- End -->
        </div>
      </div>

      <div class="row py-5 p-4 bg-white rounded shadow-sm">
        <div class="col-lg-6">
      
          <div class="p-4">
            
            <ul class="list-unstyled mb-4">
              <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Order Subtotal </strong><strong><i class="lni lni-rupee"></i> 390.00</strong></li>
              <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Shipping and handling</strong><strong><i class="lni lni-rupee"></i>10.00</strong></li>
              <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Tax</strong><strong><i class="lni lni-rupee"></i>0.00</strong></li>
              <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Total</strong>
                <h5 class="font-weight-bold"><i class="lni lni-rupee"></i>400.00</h5>
              </li>
            </ul>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

<?php 
include('includes/footer.php');
?>