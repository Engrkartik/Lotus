@extends('layouts.default')
@section('content')

<div class="page-content-wrapper">

  <div class="pb-3 pt-3">
    <div class="container">
        <div class="row g-3">
        <div class="col-12">
              <div class="card top-product-card">
                <div class="card-body">
                	<a class="product-thumbnail d-block" href=""><img class="mb-2" src="http://34.72.9.224/quickcell/public/images/item/lee2.jpg" alt="" style="width: 60%;"></a>
                	<div style="text-align: center;">
                	<a class="product-title d-block">Lee Jeans</a>
                	<span class="text-muted">Mens Blue Lee jeans </span>
                	<br>
                	<span class="text-muted">Size: 30</span>
                </div>
                 
                </div>
              </div>
            </div>
        </div>
        <br>
        <div class="card w-100">
  <div class="card-body p-4">
   <!-- Single Order Status-->
            <div class="single-order-status active">
             
               <div class="order-icon shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
  <path d="M1.293 1.293a1 1 0 0 1 1.414 0L8 6.586l5.293-5.293a1 1 0 1 1 1.414 1.414L9.414 8l5.293 5.293a1 1 0 0 1-1.414 1.414L8 9.414l-5.293 5.293a1 1 0 0 1-1.414-1.414L6.586 8 1.293 2.707a1 1 0 0 1 0-1.414z"/>
</svg>
              </div>
              <div class="order-text">
               <h6>Cancelled on Tue, 18 may</h6>
                <br>
                <p>as per your request</p>
              </div>
   
            </div>
          </div>
        </div>
        <br>

      <div class="cart-table card mb-3">
      	<div class="row">
        <div class="col-lg-12">
           <div class="p-4">
            <strong class="text-muted">Delivery Address</strong>
                <p>Phone: 9999999999</p>
                <span class="text-muted">Full Address of the customer</span>
          
          </div>
      </div>
      <br>
   
      <div class="col-lg-6">
           <div class="p-4">
            <h5 class="font-weight-bold">Total Order Price</h5>
              
             <span class="text-muted">You saved <i class="lni lni-rupee"></i> 500.00 on this order.</span>
          
          </div>
      </div>
      <div class="col-lg-6">
           <div class="p-4">
            <h5 class="font-weight-bold"><i class="lni lni-rupee">450.00</i></h5>
            <span class="text-muted">View Breakup</span>
          
          </div>
      </div>
      <br>
    
      <div class="col-lg-12">
           <div class="p-4">
            <h5 class="font-weight-bold">Updates sent to</h5>
             <span class="text-muted"><i class="lni lni-phone"></i>9999999999</span>
             <br>
             <span class="text-muted"><i class="lni lni-mail"></i>xyz@abc.com</span>
             <br>
             <span class="text-muted">Order Id #123456798</span>
            
          </div>
      </div>
   <!--    <div class="col-lg-6">
          <div class="p-4">
            <strong class="text-muted">Shipped To</strong>
           
            <p>Full Address....</p>

          </div>
          
        </div> -->
      </div>
  </div>
   

    </div>
  </div>

</div>


@stop