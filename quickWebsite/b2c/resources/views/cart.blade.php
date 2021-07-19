@extends('layouts.cartLayout')
@section('content')
 
   <div class="page-content-wrapper">
    @if($countcart>0)
 
      <div class="container">
        @foreach($getaddcart as $key=>$value)
    <div class="weekly-best-seller-area pt-3">
        
        <div class="row g-3">
            <div class="col-12 col-md-12">
             
              <div class="card weekly-product-card" id="cart-card">
                 
                <div class="card-body d-flex align-items-center">
                  <div class="product-thumbnail-side" id="image-side">
                    <a class="remove-product" href="removeCart/{{$value->cart_id}}"><i class="fa fa-times-circle"></i></a>
                    <a class="product-thumbnail d-block" href="category/shop-product/single-product/{{$value->id}}" id="cart-img">
                      <img src="http://34.72.9.224/quickWebsite/b2c_admin/{{$value->img_url}}" alt=""></a>
                      <h5 id="cart-h5">Available</h5>
                      <!-- if product is out of stock-->
                      <!-- <h5 id="stockOut-h5">OUT OF STOCK</h5> -->
                  </div>
                  <div class="product-description" id="cartDescription">
                    <a class="product-title d-block" href="category/shop-product/single-product/{{$value->id}}">{{$value->item_name}}</a>
                    <p class="sale-price" id="{{ $value->sale_price.'_data' }}" data-price="{{$value->sale_price}}">₹{{$value->sale_price * $value->qty}}<span style="color: #777474;" id="{{ $value->mrp.'_data' }}" data-price="{{$value->mrp}}">₹{{$value->mrp * $value->qty}}</span></p>
                    <div class="container d-flex align-items-center justify-content" id="cart-container">
                      <!-- Choose Color-->
                      <div class="choose-color-wrapper">
                       <!--  <p class="mb-1 font-weight-bold">Color</p> -->
                        <div class="choose-color-radio d-flex align-items-center" id="cart-color">
                          <!-- Single Radio Input-->
                          <div class="mb-0">
                            <span id="colorLabel">Color: </span>
                            <input class="form-check-input" style="background-color: {{$value->color}}" value="{{$value->color}}" id="color" type="radio" name="colorRadio">
                            <!-- <input class="btn btn-sm" style="background-color: {{$value->color}}"  id="color" type="button" name="colorRadio"> -->
                          </div>              
                        </div>
                      </div>
                  <!-- Choose Size-->
                  <div class="choose-size-wrapper" id="sizeWrapper">
                    <!-- <p class="mb-1 font-weight-bold">Size</p> -->
                    <div class="choose-size-radio d-flex align-items-center" style="text-align: center;">
                      <div class="mb-0">
                       <span id="colorLabel">Size:</span>
                        <label class="form-check-label" for="sizeRadio3" id="size">{{$value->size}}</label>
                      </div>
                    </div>
                  </div>
             </div>

             <div class="container">
            <form class="cart-form" action="#" method="" id="myform">
              <div class="order-plus-minus d-flex align-items-center">
                <h6 id="cart-qty">Qty-</h6>
                <div class="quantity-button-handler qtyminus" onclick="decrementValue('{{$value->sale_price}}')">-</div>
                <input class="form-control cart-quantity-input number" id="{{$value->sale_price}}" type="text" step="1" name="quantity" value="{{$value->qty}}">
                <div class="quantity-button-handler qtyplus" onclick="incrementValue('{{$value->sale_price}}')">+</div>
              </div>
                            
            </form>
          </div>
          <br>
          <p id="cart-p">Expected Delivery – In 7 Days</p>
          <!-- if out of stock-->
            <!-- <p id="stockOut-p">Cannot Be Delivered</p> -->
          <a href="" id="cart-btn">MOVE TO WISHLIST</a>
          </div>
        </div>         
      </div>   
    </div>
  </div>
  <!-- row end-->

</div>
 @endforeach
</div>
    
@else
        <!-- desktop view end-->
      <!-- if cart is empty -->
<div class="container-fluid pt-2">
    <div class="row">
        <div class="col-md-12">
            <div class="cart-wrapper-area py-3">
                
                <div class="card-body cart">
                    <div class="col-sm-12 empty-cart-cls text-center"> <img src="https://i.imgur.com/dCdflKN.png" width="130" height="130" class="img-fluid mb-4 mr-3">
                        <h3><strong>Your Cart is Empty</strong></h3>
                        <h4>Add something to make me happy :)</h4> <a href="home" class="btn btn-primary cart-btn-transform m-3" data-abc="true">continue shopping</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- end-->
@endif

</div>
<script>
  function checkout(){
    var totqty = [];
    var totpro = [];
    var totalpro = document.getElementsByName("product_id");
    var totalqty = document.getElementsByName("quantity");
    for(var i=0; i<totalpro.length; i++){
      totqty.push(totalqty[i].value);
      totpro.push(totalpro[i].value);
    }
    // alert(totpro+totqty);
    // die();
    // var token = '{{csrf_token()}}';
    $.ajax({
      type: 'POST',
      url: '/quickWebsite/b2c/public/updateCheck',
      data:{'totqty':totqty,'totpro':totpro},
      headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success:function(data){
              if(data=='Success'){
                // alert(data);
                window.location.href = "http://34.72.9.224/quickWebsite/b2c/public/checkout";
              }
      }
    });
  }
  /* Assign actions */
$('.quantity-button-handler input').change( function() {
  updateQuantity(this);
});

$('.card-link-secondary button').click( function() {
  removeItem(this);
});

function incrementValue(ht)
{
    var value = document.getElementById(ht).value;
    value = isNaN(value) ? 0 : value;
    value++;
    if(value<1){
      value = 1;
    }
    // document.getElementById('number').value = value;
    productpagetotal(ht,value);
    // console.log(value);
}
function decrementValue(ht)
{
    var value = document.getElementById(ht).value;
    value = isNaN(value) ? 0 : value;
    value--;
    if(value<1){
      value = 1;
    }
    // document.getElementById('number').value = value;
    productpagetotal(ht,value);
    // console.log(value);

}
var totalPrice=0;
function productpagetotal(th,val) {
  var tot=0;
  var sum = th * val;
  // sum = Math.round(sum * 100) / 100;
  document.getElementById(th+"_data").innerHTML = "₹"+sum;
  document.getElementById(th+"_input").value=sum; 
  // }
  var totalPrice = document.getElementsByName("prototal");
  // var totalPrice = document.getElementsByName("prototal")[0].value;
  for(var i=0; i<totalPrice.length; i++){
    // totalPrice = totalPrice.length;
    tot += parseInt(totalPrice[i].value);
    // totalPrice = document.getElementsByName("prototal")[1];
  }
  document.getElementById("gtotal").innerHTML=tot;
  console.log(tot);
  console.log(sum);
}
</script>
@stop