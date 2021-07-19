@extends('layouts.default2')
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
    <div class="page-content-wrapper">
      <!-- Top Products-->
      <div class="top-products-area py-3">
        <div class="container">
          <div class="section-heading d-flex align-items-center justify-content-between">
            <h6>Top Products</h6>
            <!-- Select Product Catagory-->
            <div class="select-product-catagory">
              <select class="form-select" id="selectProductCatagory" name="selectProductCatagory" aria-label="Default select example">
                <option selected>Sort by</option>
                <option value="1">Newest</option>
                <option value="2">Popular</option>
                <option value="3">Ratings</option>
              </select>
            </div>
          </div>
          <div  id="error1" class="alert" style="display: none;">Removed from wishlist</div>
          <div id="insert1" class="alert success" style="display: none;">Added in wishlist</div>
          <div class="row g-3" id="oldT">
            <!-- Featured Product Card-->
            @foreach($top as $key=>$top)
            <div class="col-6 col-md-4 col-lg-3">
              <div class="card featured-product-card">
                <div class="card-body"><span class="badge badge-warning custom-badge"><i class="lni lni-star"></i></span>
                  <div class="product-thumbnail-side">
                    @if(session()->has('uid'))
                    
                      @if($top->wishlist=="false")
                        <a class="wishlist-btn" onclick="addtowish('{{$top->id}}')"><i class="lni lni-heart"></i></a>
                      @else
                        <a class="wishlist-btn" onclick="removetowish('{{$top->id}}','top')"><i class="lni lni-heart-filled"></i></a>
                      @endif
                    @else
                      <a class="wishlist-btn" onclick="addtowish('{{$top->id}}')"><i class="lni lni-heart"></i></a>
                    @endif
                    <a class="product-thumbnail d-block" href="category/shop-product/single-product/{{$top->id}}"><img src="http://34.72.9.224/quickWebsite/b2c_admin/{{$top->img_url}}" alt=""></a>
                  </div>
                  <div class="product-description">
                    <a class="product-title d-block" href="category/shop-product/single-product/{{$top->id}}">{{$top->item_name}}</a>
                    <p class="sale-price">₹{{$top->sale_price}}<span>₹{{$top->mrp}}</span></p>
                  </div>
                
                </div>
              </div>
            </div>
            @endforeach
           
          </div>
          <div class="row g-3" id="newT">
          </div>
            <!-- Single Top Product Card-->
            <!-- <div class="col-6 col-md-4 col-lg-3">
              <div class="card top-product-card">
                <div class="card-body"><span class="badge badge-primary">New</span><a class="wishlist-btn" href="#"><i class="lni lni-heart"></i></a><a class="product-thumbnail d-block" href="single-product"><img class="mb-2" src="img/product/5.png" alt=""></a><a class="product-title d-block" href="single-product">Wooden Sofa</a>
                  <p class="sale-price">$74<span>$99</span></p>
                  <div class="product-rating"><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i></div>
                </div>
              </div>
            </div> -->
            <!-- Single Top Product Card-->
            <!-- <div class="col-6 col-md-4 col-lg-3">
              <div class="card top-product-card">
                <div class="card-body"><span class="badge badge-success">Sale</span><a class="wishlist-btn" href="#"><i class="lni lni-heart"></i></a><a class="product-thumbnail d-block" href="single-product"><img class="mb-2" src="img/product/6.png" alt=""></a><a class="product-title d-block" href="single-product">Roof Lamp</a>
                  <p class="sale-price">$99<span>$113</span></p>
                  <div class="product-rating"><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i></div>
                </div>
              </div>
            </div> -->
            <!-- Single Top Product Card-->
            <!-- <div class="col-6 col-md-4 col-lg-3">
              <div class="card top-product-card">
                <div class="card-body"><span class="badge badge-danger">-15%</span><a class="wishlist-btn" href="#"><i class="lni lni-heart"></i></a><a class="product-thumbnail d-block" href="single-product"><img class="mb-2" src="img/product/9.png" alt=""></a><a class="product-title d-block" href="single-product">Sneaker Shoes</a>
                  <p class="sale-price">$87<span>$92</span></p>
                  <div class="product-rating"><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i></div>
                </div>
              </div>
            </div>
 -->            <!-- Single Top Product Card-->
            <!-- <div class="col-6 col-md-4 col-lg-3">
              <div class="card top-product-card">
                <div class="card-body"><span class="badge badge-danger">-11%</span><a class="wishlist-btn" href="#"><i class="lni lni-heart"></i></a><a class="product-thumbnail d-block" href="single-product"><img class="mb-2" src="img/product/8.png" alt=""></a><a class="product-title d-block" href="single-product">Wooden Chair</a>
                  <p class="sale-price">$21<span>$25</span></p>
                  <div class="product-rating"><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i></div>
                </div>
              </div>
            </div> -->
          </div>
        </div>
      </div>
    </div>
<script type="text/javascript">
      function removetowish(ht,typ){
      // alert(typ);
      $.ajax({
            type:'POST',
            url:'/quickWebsite/b2c/public/removeWishlistview',
            data: {'ht':ht,'typ':typ},
              //  beforeSend: function (request) {
              //     return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
              // },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success:function(data){
              // if(data=='Successfully Removed from wishlist'){
                if(!data){
                // removeWishlist(id);
                alert(data);
                // window.location.href = "http://34.72.9.224/quickWebsite/b2c/public/wishlist-grid"; 
              }
              else{
                  $("#oldT").hide();
                  $("#newT").html(data);
                  console.log(data);
                  
                  $("#error1").show();

                  setTimeout(function(){
                    $("#error1").hide();
                  }, 1500);
              }
            }
      });
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
              // document.getElementById("success").innerHTML = data;

              setTimeout(function(){
                $("#insert").hide();
                  // document.getElementById("success").innerHTML = '';
              }, 1500);
              location.reload();
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
  </script>
@stop