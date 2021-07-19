@extends('layouts.default')
@section('content')

<div class="page-content-wrapper">

  <div class="pb-3 pt-3">
    <div class="container">
      <div class="section-heading d-flex align-items-center justify-content-between">
            <h6>Cancel Order</h6>
          </div>
          <br>
          <div class="row g-3">
        <div class="col-12">
              <div class="card top-product-card">
                <div class="card-body">
                  <a class="product-thumbnail d-block" href=""><img class="mb-2" src="https://webstockreview.net/images/thumb-clipart-positive-behavior-4.png" alt="" style="width: 20%;"></a>
                  <div style="text-align: center;">
                  <a class="product-title d-block">Order Cancelled</a>
                 
                </div>
                 
                </div>
              </div>
            </div>
        </div>

           <div class="card w-100 mt-2">
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
             <div class="col-12 col-md-12">
            <div class="card weekly-product-card">
                <div class="card-body align-items-center">
             <h6>Refund Details</h6>
              <p>A refund is not applicable on this order as it is a pay on delivery order.</p>
              <br>
              <h6>Please Note</h6>
              <p>You will recieve an email/sms, confirming the cancellation of order shortly.</p>
          </div>
        </div>
        </div>
        </div>
        </div>
        </div>  

    </div>
  </div>

@stop