@extends('layouts.orderSummaryLayout')
@section('content')

<style>
.register-form span{
  padding-left: 0px;
}
</style>
  
  <div class="page-content-wrapper">
      <div class="container">
        <div class="card bg-white" style="margin-top: 4rem;">
            <div class="card-body d-flex align-items-center">
              <div class="row" style="width: 100%;">
                <div class="col-10">
              <div class="user-info">
                <p class="mb-0"><strong style="color: #00A79D;">Priya Saraogi</strong>  (Default)</p>
                <p class="mb-0">Office No : 914, 9th Floor I-Thum Tower-A, Sector 62, Noida, Uttar Pradesh</p>
                <p>Mobile: <strong style="color: #00A79D;">8860283929</strong></p>
              </div>
            </div>
            <div class="col-2">
                 <ul class="donate-now">
                  <li>
                    <input type="radio" id="home" name="address">
                    <label for="home">Office</label>
                  </li> 
                </ul>
            </div>
            </div>
            </div>
            <div class="edit-profile-btn">
              <a class="btn" href="#">ADD/EDIT ADDRESS</a>
            </div>
          </div>

    <div class="weekly-best-seller-area pt-3 pb-2">
        
        <div class="row g-3">
            <div class="col-12 col-md-12">
             
              <div class="card weekly-product-card" id="cart-card">
                 
                <div class="card-body d-flex align-items-center">
                  <div class="product-thumbnail-side" id="image-side">
                   
                    <a class="product-thumbnail d-block" href="category/shop-product/single-product/1" id="cart-img">
                      <img src="http://34.72.9.224/quickWebsite/b2c_admin/public/images/item/levi.jpeg.webp" alt=""></a>
                     
                  </div>
                  <div class="product-description">
                    <a class="product-title d-block" href="category/shop-product/single-product/1">Levi's Jeans</a>
                    
                    <div class="container d-flex align-items-center justify-content" id="cart-container">
                  <!-- Choose Size-->
                   <div class="choose-size-wrapper" style="padding-right: 9%;">
                    <div class="choose-size-radio d-flex align-items-center">
                      <div class="mb-0">
                       <span id="colorLabel">Qty:</span>
                        <label class="form-check-label" for="sizeRadio3" id="size">1</label>
                      </div>
                    </div>
                  </div>
                  <div class="choose-size-wrapper">
                    <div class="choose-size-radio d-flex align-items-center">
                      <div class="mb-0">
                       <span id="colorLabel">Size:</span>
                        <label class="form-check-label" for="sizeRadio3" id="size">bv</label>
                      </div>
                    </div>
                  </div>
             </div>

          <p class="sale-price" id="1100_data" data-price="1100">₹1100<span style="color: #777474;">₹1500</span></p>
         <span style="color:#5a5656;font-size: 11px;"> Delivery by <strong style="color:#000;">28 jul 2021</strong></span>
          </div>
        </div>         
      </div>   
    </div>
  </div>
  <!-- row end-->

  </div>

           <div class="card cart-amount-area">
             <div class="card-body d-flex align-items-center justify-content-between">
              <h6 class="total-price mb-0"><span>Price Details(1 item)</span></h6>
            </div>
            <div class="card-body d-flex align-items-center justify-content-between">
              <p class="total-price mb-0"><span>Total MRP</span></p><p class="total-price mb-0">₹<span class="counter">1100</span></p>
            </div>
            <div class="card-body d-flex align-items-center justify-content-between">
              <p class="total-price mb-0"><span>Discount on MRP</span></p><p class="total-price mb-0" style="color:#00a79d;">-₹<span class="counter">300</span></p>
            </div>
              <div class="card-body d-flex align-items-center justify-content-between">
              <p class="total-price mb-0"><span>Shipping Charges</span></p><p class="total-price mb-0" style="color:#00a79d;"><span>Free</span></p>
            </div>
            <hr>
               <div class="card-body d-flex align-items-center justify-content-between">
              <h6 class="total-price mb-0"><span>Total Amount</span></h6><h6 class="total-price mb-0">₹<span class="counter">900</span></h6>
            </div>
          </div>

      </div>
    </div>


@stop