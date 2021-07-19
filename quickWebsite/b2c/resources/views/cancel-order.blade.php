@extends('layouts.default')
@section('content')

<div class="page-content-wrapper">

  <div class="pb-3 pt-3">
    <div class="container">
      <div class="section-heading d-flex align-items-center justify-content-between">
            <h6>Cancel Order</h6>
      </div>
      <div class="card w-100">
        <div class="row g-3">
            <div class="col-12 col-md-12">
              <div class="card weekly-product-card" style="background-color: #d0d0d040;">
                
                <div class="card-body d-flex align-items-center">
                  
                  <div class="col-md-3">
                    <a class="product-thumbnail d-block" href="order-details"><img src="http://34.72.9.224/quickWebsite/b2c_admin/{{$data->img_url}}" alt="" style="width: 56%;"></a>
                  </div>
                  <div class="product-description">
                    <a class="product-title d-block">{{$data->item_name}}</a>
                    <br>
                    <span>{{$data->descrpt}}</span>
                    <br>
                   <span>Product color</span>&nbsp;&nbsp;<input class="form-check-input" style="background-color: {{$product->color}}" value="{{$product->color}}" id="color" type="radio" name="colRadio">
                   <br>
                   <span>Size: {{$product->size}}</span>
                   <br>                
              </div>

                </div> 
              </div>                
              </div>
            </div>
        </div>
  
        <div class="card w-100 mt-2">
           <div class="row g-3">
            <!-- Single Weekly Product Card-->
            <div class="col-12 col-md-12">
              <div class="card weekly-product-card">
                
             <div class="card-body d-flex align-items-center">

                  <div class="product-thumbnail-side">
                     <span>Eligible for cancellation.</span>
                  </div>
                  <div class="product-description">
                    <a class="product-title d-block" href="" style="text-align: end;">View Policy </a>
              </div>
                </div>
              </div>
            </div>
           
          </div>
        </div>
       
      <div class="cart-table card mt-2 mb-2">
      	<div class="row">
        <div class="col-lg-12">
           <div class="p-4">
            <strong >Reason for cancellation</strong>
            <br>
            <span class="text-muted">Please tell us correct reason for the cancellation. This information is only used to improve our services. </span>
          
          </div>
      </div>
      </div>
  </div>
      
  <div class="card w-100">
  <div class="card-body p-4">
  <p>Select Reason</p>
  <input type="radio" id="1" name="reason" value="1">
  <label for="1">Incorrect size ordered</label><br>
  <input type="radio" id="2" name="reason" value="2">
  <label for="2">Product not required anymore</label><br>
  <input type="radio" id="3" name="reason" value="3">
  <label for="3">Cash Issue</label><br>
  <input type="radio" id="4" name="reason" value="4">
  <label for="4">Ordered by mistake</label><br>
  <input type="radio" id="5" name="reason" value="5">
  <label for="5">Wants to change color/style</label><br>
  <input type="radio" id="6" name="reason" value="6">
  <label for="6">Delayed delivery cancellation</label><br>
  <input type="radio" id="7" name="reason" value="7">
  <label for="7">Duplicate order</label>
  
  <textarea class="form-control" placeholder="Additional comments" style="margin-top: 22px;"></textarea>
  <br>
       <div class="card w-100">
           <div class="row g-3">
            <!-- Single Weekly Product Card-->
            <div class="col-12 col-md-12">
              <div class="card weekly-product-card">
                
             <div class="card-body d-flex align-items-center">

                  <div class="product-thumbnail-side">
                     <h6 class="strong">Refund Details</h6>
                  
                     <p>{{$data->sale_price}}</p>
                  </div>
                  <div class="product-description" style="text-align: end;">
                  <a class="btn btn-success btn-lg" href="/quickWebsite/b2c/public/cancel-order-confirm/{{$product->id}}">Cancel</a>
              </div>
                </div>
              </div>
            </div>
           
          </div>
        </div>
             
     </div>
          </div>
        </div>   

    </div>
  </div>

@stop