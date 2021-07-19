@extends('layouts.paymentLayout')
@section('content')

    <div class="page-content-wrapper">
      <div class="container">
        <!-- Checkout Wrapper-->
        <div class="checkout-wrapper-area py-3">
          <!-- Choose Payment Method-->
          <div class="choose-payment-method">
            <h6 class="mb-3 text-center">Choose Payment Method</h6>
            <div class="row justify-content-center g-3">
              <!-- Single Payment Method-->
              <div class="col-6 col-md-5">
                <div class="single-payment-method"><a class="credit-card">
                  <!-- <div class="credit-card"> -->
                  <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-credit-card-2-front mb-2 text-dark" viewBox="0 0 16 16">
<path d="M14 3a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h12zM2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2z"/>
<path d="M2 5.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1zm0 3a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z"/>
</svg>                          
                                <form action="/quickWebsite/b2c/public/pay" method="POST" >
                                <!-- <form action="{{ route('razorpay.payment.store') }}" method="POST" > -->
                                    @csrf
                                    <script src="https://checkout.razorpay.com/v1/checkout.js"
                                            data-key="{{ env('RAZORPAY_KEY') }}"
                                            data-amount="{{Session::get('data.amount')}}"
                                            data-buttontext="Pay Online"
                                            data-name="ssssybertech.com"
                                            data-description="Rozerpay"
                                            data-order_id="{{Session::get('data.order_id')}}"
                                            data-prefill.email="{{Session::get('data.email')}}"
                                            data-prefill.contact="{{Session::get('data.mobile')}}"
                                            data-theme.color="#ff7529">
                                    </script>
                                </form>
                    <!-- <h6>Pay Online</h6> -->
                  </a></div><!-- </div> -->
              </div>
              <!-- Single Payment Method-->
              <!-- <div class="col-6 col-md-5">
                <div class="single-payment-method"><a class="bank" href="checkout-bank"><svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-building mb-2 text-dark" viewBox="0 0 16 16">
<path fill-rule="evenodd" d="M14.763.075A.5.5 0 0 1 15 .5v15a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V14h-1v1.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V10a.5.5 0 0 1 .342-.474L6 7.64V4.5a.5.5 0 0 1 .276-.447l8-4a.5.5 0 0 1 .487.022zM6 8.694L1 10.36V15h5V8.694zM7 15h2v-1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5V15h2V1.309l-7 3.5V15z"/>
<path d="M2 11h1v1H2v-1zm2 0h1v1H4v-1zm-2 2h1v1H2v-1zm2 0h1v1H4v-1zm4-4h1v1H8V9zm2 0h1v1h-1V9zm-2 2h1v1H8v-1zm2 0h1v1h-1v-1zm2-2h1v1h-1V9zm0 2h1v1h-1v-1zM8 7h1v1H8V7zm2 0h1v1h-1V7zm2 0h1v1h-1V7zM8 5h1v1H8V5zm2 0h1v1h-1V5zm2 0h1v1h-1V5zm0-2h1v1h-1V3z"/>
</svg>
                    <h6>Bank</h6></a></div>
              </div>
 -->              <!-- Single Payment Method-->
              <!-- <div class="col-6 col-md-5">
                <div class="single-payment-method"><a class="paypal" href="checkout-paypal"><svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-wallet2 mb-2 text-dark" viewBox="0 0 16 16">
<path d="M12.136.326A1.5 1.5 0 0 1 14 1.78V3h.5A1.5 1.5 0 0 1 16 4.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 13.5v-9a1.5 1.5 0 0 1 1.432-1.499L12.136.326zM5.562 3H13V1.78a.5.5 0 0 0-.621-.484L5.562 3zM1.5 4a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z"/>
</svg>
                    <h6>PayPal</h6></a></div>
              </div> -->
              <!-- Single Payment Method-->
              <div class="col-6 col-md-5">
                <div class="single-payment-method"><a class="cash" href="checkout-cash"><svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-cash mb-2 text-dark" viewBox="0 0 16 16">
<path d="M8 10a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/>
<path d="M0 4a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V4zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V6a2 2 0 0 1-2-2H3z"/>
</svg>
                    <h6>Cash on Delivery</h6></a></div>
              </div>
            </div>
          </div>
          <br>
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
          <br>
          <div class="payNow">
              <a class="btn btn-success w-50" href="#">PAY NOW</a>
            </div>
        </div>
      </div>
    </div>
   
   @stop