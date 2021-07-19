@extends('layouts.default')
@section('content')

<div class="page-content-wrapper">

  <div class="pb-3 pt-3">
    <div class="container">
      <div class="section-heading d-flex align-items-center justify-content-between">
            <h6>Exchange Item</h6>
          </div>
           <div class="card w-100">
          <div class="row g-3">
            <!-- Single Weekly Product Card-->
            <div class="col-12 col-md-12">
              <div class="card weekly-product-card">
                
             <div class="card-body d-flex align-items-center">

                  <div class="product-thumbnail-side"><a class="product-thumbnail d-block" href=""><img src="img/product/10.png" alt=""></a></div>
                  <div class="product-description"><a class="product-title d-block">Product name </a>
                   <span>Product color</span>
                   <span>Size: 26</span>
                  
              </div>
                </div>
              </div>
            </div>
           
          </div>

        </div>
        <br>
        <div class="card w-100">
           <div class="row g-3">
            <!-- Single Weekly Product Card-->
            <div class="col-12 col-md-12">
              <div class="card weekly-product-card">
                
             <div class="card-body d-flex align-items-center">

                  <div class="product-thumbnail-side">
                     <span>Eligibility for exchange till 10 june.</span>
                  </div>
                  <div class="product-description">
                    <a class="product-title d-block" href="" style="text-align: end;">View Policy </a>
              </div>
                </div>
              </div>
            </div>
           
          </div>
        </div>
        <br>

      <div class="cart-table card mb-3">
      	<div class="row">
        <div class="col-lg-12">
           <div class="p-4">
            <strong >Select Replacement size</strong>
            <br>
            <span class="text-muted">Original size:M</span>
          
          </div>
      </div>
      </div>
  </div>
   <!--     <div class="cart-table card mb-3">
        <div class="row">
        <div class="col-lg-12">
           <div class="p-4">
            
          </div>
      </div>
      </div>
  </div> -->
      
  <div class="card w-100">
  <div class="card-body p-4">
    <h5>Why are you exchanging ?</h5>
  <p>Please choose the correct reason for return. This information is only used to improve our service.</p>
  <hr>
  <p>Select reason</p>
  <input type="radio" id="1" name="reason" value="1">
  <label for="1">I recieved a defective / Wrong product</label><br>
  <input type="radio" id="2" name="reason" value="2">
  <label for="2">Size is too large</label><br>
  <input type="radio" id="3" name="reason" value="3">
  <label for="3">Size is too small</label><br>
</div>
</div>
      <div class="cart-table card mb-3">
        <div class="row">
        <div class="col-lg-12">
           <div class="p-4">
            <input type="checkbox" id="check1" name="check1" value="">
  <label for="check1"> I confirm that the product is unused with the original tags intact.</label>
  <br>
      
 <a class="btn btn-success btn-sm" href="address-selection">Select Address</a>
          </div>
      </div>
      </div>
  </div>

</div>
</div>

</div>

@stop