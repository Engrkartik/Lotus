@extends('layouts.default')
@section('content')

  <div class="page-content-wrapper bg-white">
 <div class="container-fluid pt-2">
    <div class="row">
        <div class="col-md-12">
            <div class="cart-wrapper-area blank py-3">
                
                <div class="card-body cart">
                    <div class="col-sm-12 empty-cart-cls text-center">
                        <h5>No Products here..!!</h5>
                        <br>
                        <p>Your Wishlist is empty.</p>
                       
                          <p>Any product you like or you plan to shop later,you can add them here.</p>
                        
                          <p>Move them to Bag with a single click.</p>
                          <a href="home" class="btn btn-primary cart-btn-transform m-3" data-abc="true">Browse Products</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

  </div>



@stop