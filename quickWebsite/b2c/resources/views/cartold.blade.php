@extends('layouts.default')
@section('content')
 
   <div class="page-content-wrapper">
    @if($countcart>0)
      <div class="container">
        <!-- Cart Wrapper-->
        <div class="cart-wrapper-area py-3">
          <div class="cart-table card mb-3">
            <div class="table-responsive card-body">
              <table class="table mb-0">
                <tbody>
                  @foreach($getaddcart as $key=>$value)
                  <tr>
                    <th scope="row"><a class="remove-product" href="removeCart/{{$value->cart_id}}"><i class="lni lni-close"></i></a></th>
                    <input type="text" name="product_id" value="{{$value->cart_id}}" style="display: none">
                    <td><a href="category/shop-product/single-product/{{$value->id}}"><img src="http://34.72.9.224/quickWebsite/b2c_admin/{{$value->img_url}}" alt=""></a></td>
                    <td><a href="category/shop-product/single-product/{{$value->id}}">{{$value->item_name}}<span>₹{{$value->sale_price}} <!-- × {{$value->qty}} --></span></a></td>
                    <td><input class="btn btn-sm" style="background-color: {{$value->color}}"  id="color" type="button" name="colorRadio">&nbsp;&nbsp;&nbsp;<b>{{$value->size}}<b></td>
                    <!-- <td>
                      <div class="quantity">
                       {{$value->sale_price * $value->qty}} 
                        <input class="qty-text" type="text" value="{{$value->multi}}">
                      </div>
                    </td> -->
                    <td>
                    	<div class="container">
            <form class="cart-form" action="#" method="" id="myform">
              <div class="order-plus-minus d-flex align-items-center">
                <div class="quantity-button-handler qtyminus" onclick="decrementValue('{{$value->sale_price}}')">-</div>
                <input class="form-control cart-quantity-input number" id="{{$value->sale_price}}" type="text" step="1" name="quantity" value="{{$value->qty}}">
                <div class="quantity-button-handler qtyplus" onclick="incrementValue('{{$value->sale_price}}')">+</div>
              </div>
                            
            </form>
          </div>
                    </td>
                    <td>
            <span class="span product-total-price" id="{{ $value->sale_price.'_data' }}" data-price="{{$value->sale_price}}">₹{{$value->sale_price * $value->qty}}</span>
            <input type="text" class="product-total-price" id="{{ $value->sale_price.'_input' }}" value="{{$value->sale_price * $value->qty}}" name="prototal" size="5px" style="display: none;">
          </td>
                  </tr>@endforeach

<!-- <input type="button" onclick="decrementValue()" value="Increment Value" style="display: none;" />
   <input type="text" id="number" value="0" style="display: none" />
<input type="button" onclick="incrementValue()" value="Increment Value" style="display: none" />
  -->                 <!-- <tr>
                    <th scope="row"><a class="remove-product" href="#"><i class="lni lni-close"></i></a></th>
                    <td><img src="img/product/14.png" alt=""></td>
                    <td><a href="single-product.html">Bluetooth Speaker<span>$9.87 × 2</span></a></td>
                    <td>
                      <div class="quantity">
                        <input class="qty-text" type="text" value="2">
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row"><a class="remove-product" href="#"><i class="lni lni-close"></i></a></th>
                    <td><img src="img/product/10.png" alt=""></td>
                    <td><a href="single-product.html">Modern Gray Tops<span>$7 × 1</span></a></td>
                    <td>
                      <div class="quantity">
                        <input class="qty-text" type="text" value="1">
                      </div>
                    </td>
                  </tr> -->
                </tbody>
              </table>
            </div>
          </div>
          <!-- Coupon Area-->
        <!--   <div class="card coupon-card mb-3">
            <div class="card-body">
              <div class="apply-coupon">
                <h6 class="mb-0">Have a coupon?</h6>
                <p class="mb-2">Enter your coupon code here &amp; get awesome discounts!</p>
                <div class="coupon-form">
                  <form action="#">
                    <input class="form-control" type="text" placeholder="SUHA30">
                    <button class="btn btn-primary" type="submit">Apply</button>
                  </form>
                </div>
              </div>
            </div>
          </div> -->
          <!-- Cart Amount Area-->
          <div class="card cart-amount-area">
           <!--  @foreach($totalmrp as $key=>$tt)
            <div class="card-body d-flex align-items-center justify-content-between">
              <span>Bag Total:</span>
              <h5 class="total-price mb-0">₹<span class="counter">{{$tt->totalmrp}}</span></h5>
              
            </div>
            @endforeach
            <br>
            @foreach($totaldsc as $key=>$dsc)
            <div class="card-body d-flex align-items-center justify-content-between">
              <span>Bag Discount:</span>
              <h5 class="total-price mb-0">₹<span class="counter">{{$dsc->totaldsc}}</span></h5>
              
            </div>
            <br>
            @endforeach
            <div class="card-body d-flex align-items-center justify-content-between">
              <span>Delivery Charges:</span>
              <h5 class="total-price mb-0">₹<span class="counter">80</span></h5>
              
            </div>
            <br> -->
            @foreach($totalamt as $key=>$amt)
            <div class="card-body d-flex align-items-center justify-content-between">
              <span>Total Amount:</span>
              <!-- @if($amt->total==0)
                <h5 class="total-price mb-0">₹<span class="counter">{{$amt->total}}</span></h5>
              @elseif($amt->total>0)
                <h5 class="total-price mb-0">₹<span class="counter">{{$amt->total+80}}</span></h5>
              @endif -->  
              <h5 class="total-price mb-0">₹<span class="counter" id="gtotal">{{$amt->total}}</span></h5>
            </div>
            @endforeach
            <br>
            <!-- <a class="btn btn-warning" href="checkout">Checkout Now</a> -->
            <a class="btn btn-warning" onclick="checkout()">Checkout Now</a>
          </div>
        </div>
      </div>
@else
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