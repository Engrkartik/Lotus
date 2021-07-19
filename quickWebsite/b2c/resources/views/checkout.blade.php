@extends('layouts.default')
@section('content')

<div class="page-content-wrapper">
      <div class="container">
        <!-- Checkout Wrapper-->
        <div class="checkout-wrapper-area py-3">
          <!-- Billing Address-->
          <div class="billing-information-card mb-3">
            <div class="card billing-information-title-card">
              <div class="card-body">
                <h6 class="text-center mb-0 text-white">Billing Information</h6>
              </div>
            </div>
            <div class="card user-data-card">
              <div class="card-body">                                   
                <div class="single-profile-data d-flex align-items-center justify-content-between">
                  <div class="title d-flex align-items-center"><i class="lni lni-user"></i><span>Full Name</span></div>
                  <div class="data-content">{{$userDetails->name}}</div>
                </div>
                <div class="single-profile-data d-flex align-items-center justify-content-between">
                  <div class="title d-flex align-items-center"><i class="lni lni-envelope"></i><span>Email Address</span></div>
                  <div class="data-content">{{$userDetails->email}}</div>
                </div>
                <div class="single-profile-data d-flex align-items-center justify-content-between">
                  <div class="title d-flex align-items-center"><i class="lni lni-phone"></i><span>Phone</span></div>
                  <div class="data-content">{{$userDetails->mobile}}</div>
                </div>
                <div class="single-profile-data d-flex align-items-center justify-content-between">
                  <div class="title d-flex align-items-center"><i class="lni lni-map-marker"></i><span>Shipping Address</span></div>
                  <div class="data-content">{{$userDetails->address}}</div>
                </div>
                <!-- Edit Address-->
                <a class="btn btn-danger w-100" href="edit-profile">Edit Billing Information</a>
              </div>
            </div>
          </div>
          <!-- Shipping Method Choose
          <div class="shipping-method-choose mb-3">
            <div class="card shipping-method-choose-title-card bg-success">
              <div class="card-body">
                <h6 class="text-center mb-0 text-white">Shipping Method Choose</h6>
              </div>
            </div>
            <div class="card shipping-method-choose-card">
              <div class="card-body">
                <div class="shipping-method-choose">
                  <ul class="ps-0">
                    <li>
                      <input id="fastShipping" type="radio" name="selector" checked>
                      <label for="fastShipping">Fast Shipping<span>1 days delivery for $1.0</span></label>
                      <div class="check"></div>
                    </li>
                    <li>
                      <input id="normalShipping" type="radio" name="selector">
                      <label for="normalShipping">Regular<span>3-7 days delivery for $0.4</span></label>
                      <div class="check"></div>
                    </li>
                    <li>
                      <input id="courier" type="radio" name="selector">
                      <label for="courier">Courier<span>5-8 days delivery for $0.3</span></label>
                      <div class="check"></div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>-->
          <!-- Cart Amount Area-->
          <div class="card cart-amount-area">
           @foreach($totalmrp as $key=>$tt)
            <div class="card-body d-flex align-items-center justify-content-between">
              <span>Billing Total:</span>
              <h5 class="total-price mb-0">₹<span class="counter">{{$tt->totalmrp}}</span></h5>
              
            </div>
            @endforeach
            <br>
            @foreach($totaldsc as $key=>$dsc)
            <div class="card-body d-flex align-items-center justify-content-between">
              <span>Billing Discount:</span>
              <h5 class="total-price mb-0">₹<span class="counter">{{$dsc->totaldsc}}</span></h5>
              
            </div>
            <br>
            @endforeach
            <div class="card-body d-flex align-items-center justify-content-between">
              <span>Delivery Charges:</span>
              <h5 class="total-price mb-0">₹<span class="counter">{{$charges}}</span></h5>
              
            </div>
          </div>
            <br>
          <!-- @foreach($totalamt as $key=>$val) -->
          <!-- @endforeach -->
          <div class="card cart-amount-area">
            <div class="card-body d-flex align-items-center justify-content-between">
              <h5 class="total-price mb-0"> Total Bill</h5>
              @if($totalamt->total==0)
                <h5 class="total-price mb-0">₹<span class="counter">{{$totalamt->total}}</span></h5>
              @elseif($totalamt->total>0)
                <!-- <h5 class="total-price mb-0">₹<span class="counter">{{$totalamt->total}}</span></h5> -->
                <h5 class="total-price mb-0">₹<span class="counter">{{$totalamt->total+$charges}}</span></h5>
              @endif
            </div>
          </div>
          <div class="card cart-amount-area">
            <div class="card-body d-flex align-items-center justify-content-between">
            
              <p>Expected Delivery, Tuesday 2 June.</p>
              <br>
              @if($totalamt->total==0)
                <input class="btn btn-warning" value="Confirm &amp; Pay">
              @elseif($totalamt->total>0)
                <a class="btn btn-warning" href="payment">Confirm &amp; Pay</a>
                <!-- <a class="btn btn-warning" href="">Confirm &amp; Pay</a> -->
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>

@stop