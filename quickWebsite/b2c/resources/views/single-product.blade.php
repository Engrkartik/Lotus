@extends('layouts.default')
@section('content')
<style>
.alert {
  padding: 20px;
  background-color: #f44336;
  color: white;
  opacity: 1;
  transition: opacity 0.6s;
  margin-bottom: 15px;
}

.alert.success {background-color: #04AA6D;}

.closebtn {
  margin-left: 15px;
  color: white;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
}

.closebtn:hover {
  color: black;
}

</style>

  <div class="page-content-wrapper bg-white">
  <!--Section: Block Content-->

  <main style="padding-top: 6px;">

    <div class="container">

      <!--Section: Block Content-->
      <section class="mt-3">

        <div class="row">
          <div class="col-md-5 mb-md-0">
           
            <div class="container">
        <div class="pt-3">
          <div  id="error" class="alert" style="display: none;">Already exist in wishlist</div>
          <div id="insert" class="alert success" style="display: none;">Added in wishlist</div>
          <!-- Hero Slides-->
          <div class="hero-slides owl-carousel">
            <!--  @foreach($pro_img as $key=>$val)
            <div class="view zoom z-depth-2 rounded">
              <img class="img-fluid w-100" src="http://34.72.9.224/quickWebsite/b2c_admin/{{$val->img_url}}" alt="Sample">
              <a href="#!">
                <div class="mask waves-effect waves-light"></div>
              </a>
            </div>  
             @endforeach -->
            <!-- Single Hero Slide-->
            @foreach($pro_img as $key=>$val)
              <!-- <div class="single-hero-slide" id="myImg" style="background-image: url('http://34.72.9.224/quickWebsite/b2c_admin/{{$val->img_url}}')"></div> -->
            <div class="product-slides owl-carousel">       
        <div class="single-product-slide" id="myImg" style="background-image: url('http://34.72.9.224/quickWebsite/b2c_admin/{{$val->img_url}}')"></div>
      </div>
            @endforeach 

          </div>
        </div>
      </div>
            
          
          </div>
          <div class="col-md-7 bg-white" style="padding-left: 9%;">
            @foreach($product as $key=>$value)
            <div class="row">
              <div class="col-9">
            <h5>{{$value->item_name}}</h5>
          </div>
          <div class="col-3">
            @if($value->wishlist=='false')
                <!-- <button class="btn btn-warning ms-3" onclick="addCart()">Add To Cart</button> -->

                <button id="wishlistbtn" class="btn btn-light" onclick="addtowish('{{$value->id}}')" value=""><i class="lni lni-heart" style="color: red;"></i></button>
              
              @elseif($value->wishlist=='true')

                <button id="wishlistbtn" class="btn btn-light" onclick="removeWishlist('{{$value->id}}')" value=""><i class="lni lni-heart-filled" style="color: red;"></i></button>
              
              @else
          
                <button  id="wishlistbtn" class="btn btn-light" onclick="addtowish('{{$value->id}}')" value=""><i class="lni lni-heart" style="color: red;"></i></button>
           
              <!--  <div class="p-wishlist-share" style="margin-left: 21px;">
                   <a href="" onclick="addCart()"><i class="lni lni-heart"></i></a>
                </div> -->
              @endif
            </div>
          </div>
            <!-- <p class="mb-2 text-muted text-uppercase small">{{$value->brand}}</p> -->
            <input type="text" id="product-id" value="{{$value->id}}" name="" hidden="">

            <!-- <h5><span class="mr-1"><strong>₹{{$value->sale_price}}</strong></span></h5> -->
            <div class="weekly-product-card">
            <div class="product-description">
            	 <p class="sale-price mb-0" style="font-size: 20px;">₹{{$value->sale_price}}
            	 	<span style="color: #777474;">₹{{$value->mrp}}</span>
            	 </p>
             <div class="row" style="width: 236%;">
              <div class="col-6">
               <div class="product-rating">
                 <i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled" id="emptyStar"></i><i class="lni lni-star-filled" id="emptyStar"></i>
                </div>
                </div>
               <div class="col-6">
               <span class="ps-3">View All Ratings</span>
              </div>
            </div>
            </div>
          </div>
            <hr>
              <div class="weekly-product-card">
            	   <div class="row" style="width: 127%;">
              <div class="col-6">
               <div class="product-rating">
                 <p>Return Policy</p>
                </div>
                </div>
               <div class="col-6">
               <p class="ps-3">30 Days Return</p>
              </div>
            </div>

        </div>
          <hr>
          <!-- Selection Panel-->
        <div class="selection-panel mb-3 py-3">
          <div class="container d-flex align-items-center justify-content-between">
            <!-- Choose Color-->
            <div class="choose-color-wrapper">
              <p class="mb-1 font-weight-bold">Select Color</p>
              <div class="choose-color-radio d-flex align-items-center">
                <!-- Single Radio Input-->
                @foreach($color as $key=>$col)
                <div class="form-check mb-0">
                  <input class="form-check-input" style="background-color: {{$col->color}}" value="{{$col->color}}" id="color" type="radio" name="colorRadio">
                  <!-- <input type="button" class="btn btn-sm" style="background-color: {{$col->color}}" name=""> -->
                  <label class="form-check-label" for="colorRadio1"></label>
                  <!-- for default checkbox -- add checked="checked" with input class= form-check-->
                </div>
                @endforeach
                <!-- Single Radio Input-->
                <!-- <div class="form-check mb-0">
                  <input class="form-check-input purple" id="colorRadio4" type="radio" name="colorRadio">
                  <label class="form-check-label" for="colorRadio4"></label>
                </div> -->
              </div>
            </div>
          </div>
          <br>
          <br>
          <div class="container d-flex align-items-center justify-content-start">
            <div class="choose-size-wrapper text-end" id="newColor">
            </div>
            <!-- Choose Size-->
            <div class="choose-size-wrapper text-end"  id="oldColor">
              <p class="mb-1 font-weight-bold" style="text-align: left;">Size</p>
              <div class="choose-size-radio d-flex align-items-center" style="margin-left: -20px;">
                
                @foreach($size as $key=>$siz)
                <div class="form-check mb-0 me-2">
            
                 <input class="form-check-input" id="size" value="{{$siz->size}}" type="radio" name="sizRadio">
                  <label class="form-check-label" for="sizeRadio1">{{$siz->size}}</label>
                 
                    </div>
                    <div class="form-check mb-0 me-2" style="display:none;">
            
                 <input class="form-check-input" id="size" value="{{$siz->size}}" type="radio" name="sizRadio" disabled="disabled">
                  
                  <label class="form-check-label cut-through" for="sizeRadio1">{{$siz->size}}</label>
                    </div>
                @endforeach
                  
              </div>
            </div>
          </div>
        </div>
        <div class="cart-form-wrapper mb-3 py-3">
          <div class="container">
            <h6>Qty</h6>
            <form class="cart-form" action="#" method="">
              <div class="order-plus-minus d-flex align-items-center">
                <div class="quantity-button-handler">-</div>
                <input class="form-control cart-quantity-input" id="qty" type="text" step="1" name="quantity" value="1">
                <div class="quantity-button-handler">+</div>
              </div> 
              <input type="button" class="btn btn-success ms-5" onclick="addCart()" value="Add To Bag" name="">
              <!-- @if($value->wishlist=='false')
                
                <input type="button" class="btn btn-warning ms-3" onclick="addCart()" value="Add To Bag" name="">&nbsp;&nbsp;
                <div class="right-inner-addon">
                  <i class="lni lni-heart" style="color: black;"></i>
                <input type="button" class="btn btn-light" onclick="addtowish('{{$value->id}}')" value="Wishlist" style="border: 1px solid; color: black">
              </div>
              @elseif($value->wishlist=='true')
                <input type="button" class="btn btn-warning ms-3" onclick="addCart()" value="Add To Bag" name="">
              &nbsp;&nbsp;<div class="right-inner-addon">
                <i class="lni lni-heart" style="color: white;"></i>
                <input type="button" class="btn btn-danger" onclick="removeWishlist('{{$value->id}}')" value="Wishlisted">
              </div>
              @else
              <input type="button" class="btn btn-warning ms-3" onclick="addCart()" value="Add To Bag" name="">
              &nbsp;&nbsp;<div class="right-inner-addon">
                  <i class="lni lni-heart" style="color: black;"></i>
                <input type="button" class="btn btn-light" onclick="addtowish('{{$value->id}}')" value="Wishlist" style="border: 1px solid; color: black">
              </div>
              
              @endif -->
            </form>
              <!-- <div id="new" style="display: none">
                  &nbsp;&nbsp;<div class="right-inner-addon">
                  <i class="lni lni-heart"></i>
                  <input type="button" class="btn btn-danger" onclick="removeWishlist('{{$value->id}}')" value="Wishlisted">
                </div>
              </div> -->
          </div>
        </div>
          
            <h6 style="text-decoration: underline;">Product Details</h6>
            <p class="pt-1">{{$value->descrpt}}</p>
      
        <hr>
        <div class="p-specification bg-white">
          <div class="container" style="padding-left: 2px;">
            <h6>Attributes</h6>
            <div class="table-responsive">
              <table class="table table-sm mb-0">
                <tbody>
                  <tr style="border-style: hidden;">
                    <th class="pl-0 w-25" scope="row" ><strong>Material</strong></th>
                    <td>Cotton</td>
                     <th class="pl-0" scope="row" style="width: 14%;"><strong>Type</strong></th>
                    <td>Stretchable</td>
                  </tr>
                  <tr style="border-style: hidden;">
                    <th class="pl-0" scope="row" style="width: 27%;"><strong>Wash type</strong></th>
                    <td>Machine</td>
                  </tr>
                 
                </tbody>
              </table>
            </div>
          </div>
        </div>
           
            @endforeach
     
          </div>
               
        </div>

      </section>
      <!--Section: Block Content-->

      <!--Section: New products-->
  <!--     <section>

        <h3 class="text-center pt-5 mb-0" style="text-decoration: underline;">Related Products</h3>
        <div class="row mt-5 mb-4">
          @foreach($relatedProduct as $key=>$related)
          <div class="col-md-6 col-lg-3 mb-4">
            <div class="">
              <a href="/quickWebsite/b2c/public/category/shop-product/single-product/{{$related->id}}">
              <div class="view zoom z-depth-2 rounded">
                <img class="img-fluid w-100" src="http://34.72.9.224/quickWebsite/b2c_admin/{{$related->img_url}}" alt="Sample" style="height: 265px;">
                  <div class="mask waves-effect waves-light"></div>
              </div>
              </a>

              <div class="text-center pt-4">

                <h5>{{$related->item_name}}</h5>
               
                <div class="weekly-product-card">
            <div class="product-description">
            	 <p class="sale-price mb-0" style="font-size: 20px;float: right;">₹{{$related->sale_price}}
            	 </p>
            </div>
          </div>

              </div>
            </div>
          </div>
          @endforeach
        </div>

      </section> -->
      <!--Section: New products-->
    </div>

  </main>
  <hr>
        <div class="rating-and-review-wrapper bg-white py-3 mb-3 px-3">
          <div class="container">
            <h6>Ratings &amp; Reviews</h6>
            <div class="rating-review-content">
              <ul class="ps-0">
                <li class="single-user-review d-flex">
                
                  <div class="rating-comment">
                    <div class="rating"><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i></div>
                    <p class="comment mb-0">Very good product. It's just amazing!</p><span class="name-date">Designing World 12 Dec 2021</span>
                  </div>
                </li>
                <li class="single-user-review d-flex">
                 
                  <div class="rating-comment">
                    <div class="rating"><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i></div>
                    <p class="comment mb-0">Very excellent product. Love it.</p><span class="name-date">Designing World 8 Dec 2021</span>
                  </div>
                </li>
                <li class="single-user-review d-flex">
                 
                  <div class="rating-comment">
                    <div class="rating"><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i></div>
                    <p class="comment mb-0">What a nice product it is. I am looking it's.</p><span class="name-date">Designing World 28 Nov 2021</span>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <hr>
        <div class="ratings-submit-form bg-white pt-2 pb-5 px-3">
          <div class="container">
            <h6>Submit A Review</h6>
            <form action="#" method="">
              <div class="stars mb-3">
                <input class="star-1" type="radio" name="star" id="star1">
                <label class="star-1" for="star1"></label>
                <input class="star-2" type="radio" name="star" id="star2">
                <label class="star-2" for="star2"></label>
                <input class="star-3" type="radio" name="star" id="star3">
                <label class="star-3" for="star3"></label>
                <input class="star-4" type="radio" name="star" id="star4">
                <label class="star-4" for="star4"></label>
                <input class="star-5" type="radio" name="star" id="star5">
                <label class="star-5" for="star5"></label><span></span>
              </div>
                <!-- <div class="rate">
                  <input type="radio" id="star5" name="rate" value="5" />
                  <label for="star5"></label>
                  <input type="radio" id="star4" name="rate" value="4" />
                  <label for="star4"></label>
                  <input type="radio" id="star3" name="rate" value="3" />
                  <label for="star3"></label>
                  <input type="radio" id="star2" name="rate" value="2" />
                  <label for="star2"></label>
                  <input type="radio" id="star1" name="rate" value="1" />
                  <label for="star1"></label>
                </div> -->
      
              <textarea class="form-control mb-3" id="comments" name="comment" cols="30" rows="10" data-max-length="200" placeholder="Write your review..."></textarea>
              <button class="btn btn-success" type="submit" style="float: right;">Save</button>
            </form>
          </div>
        </div>
 
    </div>
    <!-- The Modal -->
<!-- <div id="myModal" class="modal">
  <span class="close">&times;</span>
  <img class="modal-content" id="img01">
  <div id="caption"></div>
</div> -->

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>

</script>
<script type="text/javascript">

$(document).ready(function() {
    $('input:radio[name=colorRadio]').change(function() {

    var color = $('input[name="colorRadio"]:checked').val();
    var id = document.getElementById('product-id').value;
    // alert(color);
    $.ajax({
            type:'POST',
            url:'/quickWebsite/b2c/public/showColor',
            data: {'color':color,'id':id},
              //  beforeSend: function (request) {
              //     return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
              // },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success:function(data){
              $("#oldColor").hide();
              $("#newColor").show();
              $("#newColor").html(data);
              console.log(data);
            }
        });
        
    });
});
// $("input:radio[name=sizeRadio]").click(function() {
//    // var sku = $(this).val();
//    var sku = document.getElementById('size');
//    alert("sku");
// });
function removeWishlist(ht){
    // alert(ht);
    $.ajax({
            type:'POST',
            url:'/quickWebsite/b2c/public/removeWishlist',
            data: {'ht':ht},
              //  beforeSend: function (request) {
              //     return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
              // },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success:function(data){
              if(data=='Successfully Removed from wishlist'){
                // alert(data);
                // removeWishlist(id);
                location.reload();
              }
              else{
                alert(data);
              }
            }
      });
  }
  function addCart(){
    // alert('hello');
    var id = document.getElementById('product-id').value;
    var qty = document.getElementById('qty').value;
    // var color = document.getElementById('color').value;
    var color = $('input[name="colorRadio"]:checked').val();
    var size = $('input[name="sizeRadio"]:checked').val();
    // alert(color);
    // die();
    if($("input:radio[name='colorRadio']").is(":checked")){
      // alert(size);
      if($("input:radio[name='sizeRadio']").is(":checked")){

        $.ajax({
            type:'POST',
            url:'/quickWebsite/b2c/public/addtoCart',
            data: {'size':size,'id':id,'qty':qty,'color':color},
              //  beforeSend: function (request) {
              //     return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
              // },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success:function(data){
              if(data=="login"){
                window.location.href = "http://34.72.9.224/quickWebsite/b2c/public/login"; 
             }else{

                alert(data);

             }
            }
        });
      }else{
      alert("Please select Size also");

    }

    }else{
      alert("First choose Color");

    }
  }
  function addtowish(td){
    // alert(td);
      $.ajax({
            type:'POST',
            url:'/quickWebsite/b2c/public/wishlist',
            data: {'td':td},
              //  beforeSend: function (request) {
              //     return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
              // },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success:function(data){
              // alert(data);
              if(data=="login"){
                window.location.href = "http://34.72.9.224/quickWebsite/b2c/public/login"; 
             }
             else if(data=="success"){
              console.log(data);
              $("#insert").show();
              location.reload();
              // document.getElementById("success").innerHTML = data;

              setTimeout(function(){
                $("#insert").hide();
                  // document.getElementById("success").innerHTML = '';
              }, 1500);
            }
            else if(data=="exist"){
              console.log(data);
              $("#error").show();

              setTimeout(function(){
                $("#error").hide();
              }, 1500);
            }
          }
      });
    }
  // Get the modal
var modal = document.getElementById("myModal");

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById("myImg");
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal

</script>

@stop