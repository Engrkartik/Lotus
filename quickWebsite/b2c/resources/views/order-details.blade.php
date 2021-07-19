@extends('layouts.default')
@section('content')

<div class="page-content-wrapper">

  <div class="pb-3 pt-3">
    <div class="container">
         <div class="card w-100">
  <div class="card-body p-4">
   <!-- Single Order Status-->
            <div class="single-order-status active">
              <div class="order-icon shadow-sm"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cart-check" viewBox="0 0 16 16">
<path d="M11.354 6.354a.5.5 0 0 0-.708-.708L8 8.293 6.854 7.146a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z"/>
<path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
</svg>
              </div>
              <div class="order-text">
                <h6>Order Confirm</h6>
              </div>
            </div>
          </div>
        </div>
        <br>
        <div class="row g-3">
        <div class="col-12">
          @foreach($detail_order as $key=>$value)
              <div class="card top-product-card">
                <div class="card-body">
                	<a class="product-thumbnail d-block" href=""><img class="mb-2" src="http://34.72.9.224/quickWebsite/b2c_admin/{{$value->img_url}}" alt="" style="width: 60%;"></a>
                	<div style="text-align: center;">
                	<a class="product-title d-block">{{$value->item_name}}</a>
                	<span class="text-muted">{{$value->descrpt}}</span>
                	<br>
                  <span class="text-muted">Size: {{$value->size}}</span>
                	<span class="text-muted">Qty: {{$value->qty}}</span>
                  <input class="form-check-input" style="background-color: {{$value->color}}" value="{{$value->color}}" id="color" type="radio" name="colRadio">
                </div>
                 
                </div>
              </div>
              @endforeach
            </div>
        </div>
        <br>
         <!--  <div class="cart-table card mb-3">
            <div class="table-responsive card-body">
              <table class="table mb-0">
                <tbody>
                  <tr>
                   
                    <td><img src="img/product/11.png" alt=""></td>
                    <td><a href="#">Levis Jeans<span>$12.10 × 2</span></a></td>
                    <td>
                      <div class="quantity">
                        <input class="qty-text" type="text" value="2">
                      </div>
                    </td>
                  </tr>
                  <tr>
                   
                    <td><img src="img/product/14.png" alt=""></td>
                    <td><a href="#">Bluetooth Speaker<span>$49.87 × 1</span></a></td>
                    <td>
                      <div class="quantity">
                        <input class="qty-text" type="text" value="1">
                      </div>
                    </td>
                  </tr>
                  <tr>
                  
                    <td><img src="img/product/10.png" alt=""></td>
                    <td><a href="#">Puma Shoes<span>$20 × 1</span></a></td>
                    <td>
                      <div class="quantity">
                        <input class="qty-text" type="text" value="1">
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
      -->

      <div class="cart-table card mb-3">
      	<div class="row">
        <div class="col-lg-12">
           <div class="p-4">
            <strong class="text-muted">Delivery Address</strong>

                <p>Phone: {{$user_det->mobile}}</p>
                <span class="text-muted">{{$user_det->address}}</span>

          </div>
      </div>
      <br>
      <div class="col-lg-6">
           <div class="p-4">
            <h5 class="font-weight-bold">Total Order Price</h5>
              
             <span class="text-muted">You saved <i class="lni lni-rupee"></i>{{$orderPrice->disc_amt}} on this order.</span>
          
          </div>
      </div>
      <div class="col-lg-6">
           <div class="p-4">
            <h5 class="font-weight-bold"><i class="lni lni-rupee">{{$findorderId->amount}}</i></h5>
            <span class="text-muted">View Breakup</span>
          
          </div>
      </div>
      <br>
      <div class="col-lg-12">
           <div class="p-4">
            <h5 class="font-weight-bold">Updates sent to</h5>
             <span class="text-muted"><i class="lni lni-phone"></i>{{$user_det->mobile}}</span>
             <br>
             <span class="text-muted"><i class="lni lni-mail"></i>{{$user_det->email}}</span>
             <br>
             <span class="text-muted">Order Id #{{$findorderId->order_id}}</span>
            
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
 <!-- Modal -->
<div class="modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" role="dialog">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModal">Select Products</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          
         <div class="cart-table card mb-3">
            <div class="table-responsive card-body">
              <table class="table mb-0">
                <tbody>
                  <tr>
                   <td> <input type="checkbox" id="product1" name="product1" value=""></td>
                    <td><img src="img/product/11.png" alt=""></td>
                    <td><a href="#">Levis Jeans<span>30 inch, Blue</span></a></td>
                    
                  </tr>
                  <tr>
                    <td><input type="checkbox" id="product2" name="product2" value=""></td>
                    <td><img src="img/product/14.png" alt=""></td>
                    <td><a href="#">Bluetooth Speaker<span>JBL, Black</span></a></td>
                   
                  </tr>
                  <tr>
                   <td><input type="checkbox" id="product3" name="product3" value=""></td>
                    <td><img src="img/product/10.png" alt=""></td>
                    <td><a href="#">Puma Shoes<span>7 US Size, White</span></a></td>
                   
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
      </div>
      <div class="modal-footer">
       
        <a href="replace-order"><button type="button" class="btn btn-primary">Continue</button></a>
      </div>
    </div>
  </div>
</div>

@stop