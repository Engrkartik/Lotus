@extends('layouts.home_layout')
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
      <div class="container">
        <div class="pt-3">
          <!-- Hero Slides-->
          <div class="hero-slides owl-carousel">
            <!-- Single Hero Slide-->
            <!-- there will be 5-6 banners-->
            <a href="single-product">
            <div class="single-hero-slide" style="background-image: url('img/bg-img/1.jpg')">
              <div class="slide-content h-100 d-flex align-items-center">
                <div class="slide-text">
                  <h4 class="text-white mb-0" data-animation="fadeInUp" data-delay="100ms" data-wow-duration="1000ms">Amazon Echo</h4>
                  <p class="text-white" data-animation="fadeInUp" data-delay="400ms" data-wow-duration="1000ms">3rd Generation, Charcoal</p>
                </div>
              </div>
            </div>
            </a>
               <!-- Single Hero Slide-->
            <div class="single-hero-slide" style="background-image: url('img/bg-img/3.jpg')">
              <div class="slide-content h-100 d-flex align-items-center">
                <div class="slide-text">
                  <h4 class="text-white mb-0" data-animation="fadeInUp" data-delay="100ms" data-wow-duration="1000ms">Dummy Text</h4>
                  <p class="text-white" data-animation="fadeInUp" data-delay="400ms" data-wow-duration="1000ms">Dummy Text</p>
                </div>
              </div>
            </div>
            <!-- Single Hero Slide-->
            <div class="single-hero-slide" style="background-image: url('img/bg-img/2.jpg')">
              <div class="slide-content h-100 d-flex align-items-center">
                <div class="slide-text">
                  <h4 class="text-white mb-0" data-animation="fadeInUp" data-delay="100ms" data-wow-duration="1000ms">Light Candle</h4>
                  <p class="text-white" data-animation="fadeInUp" data-delay="400ms" data-wow-duration="1000ms">Now only $22</p>
                </div>
              </div>
            </div>
            <!-- Single Hero Slide-->
            <div class="single-hero-slide" style="background-image: url('img/bg-img/3.jpg')">
              <div class="slide-content h-100 d-flex align-items-center">
                <div class="slide-text">
                  <h4 class="text-white mb-0" data-animation="fadeInUp" data-delay="100ms" data-wow-duration="1000ms">Best Furniture</h4>
                  <p class="text-white" data-animation="fadeInUp" data-delay="400ms" data-wow-duration="1000ms">3 years warranty</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
   
      <!-- Product Catagories-->
      <div class="product-catagories-wrapper py-3">
        <div class="container">
          <div class="section-heading">
            <h6>Product Categories</h6>
          </div>
          <div class="product-catagory-wrap">
            
            <div class="row g-3">
            
              <!-- Single Catagory Card-->
              @foreach($data as $key=>$value)
              <div class="col-4">
                <div class="card top-product-card">
                <a class="product-thumbnail d-block" href="category/{{$value->id}}">
                  <img class="mb-2" id="cat" src="http://34.72.9.224/quickcell/{{$value->img}}" alt="">
                  <span id="catSpan">{{$value->title}}</span>
                </a>
                  
                </div>
        
              </div>
              @endforeach
  
              <!-- end -- >
            </div>            
          </div>
        </div>
      </div>
          
   <!-- New Arrivals Products--><!-- newly added-->
      <div class="top-products-area clearfix py-3">
        <div class="container">
          <div class="section-heading d-flex align-items-center justify-content-between">
            <h6>New Arrivals</h6><a class="btn btn-success btn-sm" href="new-arrivals">View All</a>
          </div>

          <div  id="error" class="alert" style="display: none;">Removed from wishlist</div>
          <div id="insert" class="alert success" style="display: none;">Added in wishlist</div>
          <div class="row g-3" id="oldF">
            <!-- Single new Arrival Product Card-->
            <!-- if 1 or 2 products uploaded then this layout will be activated -->
            <!-- <div class="col-12 col-md-6" style="display: none;">
              <div class="card weekly-product-card">
                <div class="card-body d-flex align-items-center">
                  <div class="product-thumbnail-side">
                    <span class="badge badge-blue">New</span>
                    <a class="wishlist-btn" href="#"><i class="lni lni-heart"></i></a>
                    <a class="product-thumbnail d-block" href="single-product">
                      <img src="img/product/12.png" alt=""></a>
                    </div>
                  <div class="product-description">
                    <a class="product-title d-block" href="single-product">Sun Glasses</a>
                    <p class="sale-price">₹240<span>₹320</span></p>
                         <div class="product-rating">
            <i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled" id="emptyStar"></i><i class="lni lni-star-filled" id="emptyStar"></i>
          </div>
                  </div>
                </div>
              </div>
            </div> -->
          @foreach($feature as $key=>$val2)
           
            <div class="col-6 col-md-4 col-lg-3">
              <div class="card top-product-card">
                <div class="card-body">
                  <span class="badge badge-blue">New</span>
                  
                    @if(session()->has('uid'))
                    
                      @if($val2->wishlist=="false")
                        <a class="wishlist-btn" onclick="addtowish('{{$val2->id}}')"><i class="lni lni-heart"></i></a>
                      @else
                        <a class="wishlist-btn" onclick="removetowish('{{$val2->id}}','feature')"><i class="lni lni-heart-filled"></i></a>
                      @endif
                    @else
                      <a class="wishlist-btn" onclick="addtowish('{{$val2->id}}')"><i class="lni lni-heart"></i></a>
                    @endif
                    <a class="product-thumbnail d-block" href="category/shop-product/single-product/{{$val2->id}}"><img src="http://34.72.9.224/quickWebsite/b2c_admin/{{$val2->img_url}}" alt=""></a>
                 
                  <div class="product-description">
                    <a class="product-title d-block" href="category/shop-product/single-product/{{$val2->id}}">{{$val2->item_name}}</a>
                    <p class="sale-price">₹{{$val2->sale_price}}<span>₹{{$val2->mrp}}</span></p>
                  </div>
                  <div class="weekly-product-card">
            <div class="product-description">
              <div class="product-rating">
            <i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled" id="emptyStar"></i><i class="lni lni-star-filled" id="emptyStar"></i>
          </div>
         
            </div>
        </div>
                
                </div>
              </div>
            </div>
          @endforeach
           </div>
          <div class="row g-3" id="newF"> 
          </div>
        </div>
      </div>
      <!-- video banner-->
      <div class="cta-area">
        <div class="container">
          <!-- @foreach($video as $key=>$val1)
            <video width="100%" height="240" autoplay style="border:solid black 1px;">
              <source src="http://34.72.9.224/quickcell/{{$val1->img}}" type="video/mp4">
            </video>
          @endforeach -->
          @foreach($video as $key=>$val1)
           <!--  <iframe src="http://34.72.9.224/quickWebsite/b2c_admin/{{$val1->img}}" frameborder="0" height="240" width="100%" controls></iframe> -->
         
           <video src="http://34.72.9.224/quickWebsite/b2c_admin/{{$val1->img}}" controls disablepictureinpicture controlslist="nodownload" id="my_video" frameborder="0" height="240" width="100%" style="border: 1px solid black;"></video>
      
          @endforeach
        </div>
      </div>
          
         <!-- Top Products-->
      <div class="top-products-area clearfix py-3">
        <div class="container">
          <div class="section-heading d-flex align-items-center justify-content-between">
            <h6>Featured Products</h6><a class="btn btn-success btn-sm" href="featured-products">View All</a>
          </div>

          <div  id="error" class="alert" style="display: none;">Removed from wishlist</div>
          <div id="insert" class="alert success" style="display: none;">Added in wishlist</div>
          <div class="row g-3" id="oldF">
            <!-- Single Top Product Card-->
          @foreach($feature as $key=>$val2)
           
            <div class="col-6 col-md-4 col-lg-3">
              <div class="card featured-product-card">
                <div class="card-body"><span class="badge badge-warning custom-badge"><i class="lni lni-star"></i></span>
                   <div class="product-thumbnail-side">
                    @if(session()->has('uid'))
                    
                      @if($val2->wishlist=="false")
                        <a class="wishlist-btn" onclick="addtowish('{{$val2->id}}')"><i class="lni lni-heart"></i></a>
                      @else
                        <a class="wishlist-btn" onclick="removetowish('{{$val2->id}}','feature')"><i class="lni lni-heart-filled"></i></a>
                      @endif
                    @else
                      <a class="wishlist-btn" onclick="addtowish('{{$val2->id}}')"><i class="lni lni-heart"></i></a>
                    @endif
                    <a class="product-thumbnail d-block" href="category/shop-product/single-product/{{$val2->id}}"><img src="http://34.72.9.224/quickWebsite/b2c_admin/{{$val2->img_url}}" alt=""></a>
                  </div>
                 
                  <div class="product-description">
                    <a class="product-title d-block" href="category/shop-product/single-product/{{$val2->id}}">{{$val2->item_name}}</a>
                    <p class="sale-price">₹{{$val2->sale_price}}<span>₹{{$val2->mrp}}</span></p>
                  </div>
                <div class="weekly-product-card">
            <div class="product-description">
              <div class="product-rating">
            <i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled" id="emptyStar"></i><i class="lni lni-star-filled" id="emptyStar"></i>
          </div>
         
            </div>
        </div>
                </div>
              </div>
            </div>
          @endforeach
           </div>
          <div class="row g-3" id="newF"> 
          </div>
        </div>
      </div>

           <!-- discount banner-->
           <a href="discount-products">
          <div class="cta-area">
        <div class="container">
         @foreach($discount as $key=>$val3)
           <div class="cta-text p-4 p-lg-5" style="background-image: url(http://34.72.9.224/quickWebsite/b2c_admin/{{$val3->img}})">
          @endforeach  
            <h4>End of season sale</h4>
            <p>For a multibrand, creative &amp; <br>modern products</p><a class="btn btn-danger" href="shop-list">Shop Today</a>
          </div>
        </div>
      </div>
      </a>
    
            <!-- Weekly Best Sellers-->
      
      <div class="top-products-area clearfix py-3">
        <div class="container">
          <div class="section-heading d-flex align-items-center justify-content-between">
            <h6>Best Sellers</h6><a class="btn btn-success btn-sm" href="weekly-best">View All</a>
          </div>

          <div  id="error" class="alert" style="display: none;">Removed from wishlist</div>
          <div id="insert" class="alert success" style="display: none;">Added in wishlist</div>
          <div class="row g-3" id="oldF">
            <!-- Single Top Product Card-->
          @foreach($feature as $key=>$val2)
           
            <div class="col-6 col-md-4 col-lg-3">
              <div class="card top-product-card">
                <div class="card-body"><span class="badge badge-yellow">Hot</span>
                
                    @if(session()->has('uid'))
                    
                      @if($val2->wishlist=="false")
                        <a class="wishlist-btn" onclick="addtowish('{{$val2->id}}')"><i class="lni lni-heart"></i></a>
                      @else
                        <a class="wishlist-btn" onclick="removetowish('{{$val2->id}}','feature')"><i class="lni lni-heart-filled"></i></a>
                      @endif
                    @else
                      <a class="wishlist-btn" onclick="addtowish('{{$val2->id}}')"><i class="lni lni-heart"></i></a>
                    @endif
                    <a class="product-thumbnail d-block" href="category/shop-product/single-product/{{$val2->id}}"><img src="http://34.72.9.224/quickWebsite/b2c_admin/{{$val2->img_url}}" alt=""></a>
               
                  <div class="product-description">
                    <a class="product-title d-block" href="category/shop-product/single-product/{{$val2->id}}">{{$val2->item_name}}</a>
                    <p class="sale-price">₹{{$val2->sale_price}}<span>₹{{$val2->mrp}}</span></p>
                  </div>
               <div class="weekly-product-card">
            <div class="product-description">
              <div class="product-rating">
            <i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled" id="emptyStar"></i><i class="lni lni-star-filled" id="emptyStar"></i>
          </div>
         
            </div>
        </div>
                
                </div>
              </div>
            </div>
          @endforeach
           </div>
          <div class="row g-3" id="newF"> 
          </div>
        </div>
      </div>
 
      <!-- Featured Products Wrapper-->
<!--       <div class="featured-products-wrapper py-3">
        <div class="container">
          <div class="section-heading d-flex align-items-center justify-content-between">
            <h6>Top Products</h6><a class="btn btn-warning btn-sm" href="top-products">View All</a>
          </div>
          <div  id="error1" class="alert" style="display: none;">Removed from wishlist</div>
          <div id="insert1" class="alert success" style="display: none;">Added in wishlist</div>
          <div class="row g-3" id="oldT">
          
            @foreach($top as $key=>$top)
            <div class="col-6 col-md-4 col-lg-3">
              <div class="card featured-product-card">
                <div class="card-body"><span class="badge badge-warning custom-badge"><i class="lni lni-star"></i></span>
                  <div class="product-thumbnail-side">
                    @if(session()->has('uid'))
                    
                      @if($top->wishlist=="false")
                        <a class="wishlist-btn" onclick="addtowish1('{{$top->id}}')"><i class="lni lni-heart"></i></a>
                      @else
                        <a class="wishlist-btn" onclick="removetowish('{{$top->id}}','top')"><i class="lni lni-heart-filled"></i></a>
                      @endif
                    @else
                      <a class="wishlist-btn" onclick="addtowish1('{{$top->id}}')"><i class="lni lni-heart"></i></a>
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
        </div>
      </div> -->
    </div>

<script>
  $('#our-video')[0].volume = 1; // Sets volume, volume ranges from 0 to 1
  $('#our-video')[0].play(); // Play the video

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
    function addtowish1(td){
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
              $("#insert1").show();
              // document.getElementById("success").innerHTML = data;

              setTimeout(function(){
                $("#insert1").hide();
                  // document.getElementById("success").innerHTML = '';
              }, 1500);
              location.reload();
            }
            else if(data=="exist"){
              console.log(data);
              $("#error1").show();

              setTimeout(function(){
                $("#error1").hide();
              }, 1500);
            }
          }
      });
    }

    function removetowish(ht,typ){
      // alert(typ);
      $.ajax({
            type:'POST',
            url:'/quickWebsite/b2c/public/removeWishlisthome',
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
                  $("#newT").html(data.top);
                  // location.reload();
                  $("#oldF").hide();
                  $("#newF").html(data.feature);
                  // location.reload();
                if(typ=="top"){
                  console.log(data);
                  $("#error1").show();

                  setTimeout(function(){
                    $("#error1").hide();
                  }, 1500);
                }
                else if(typ=="feature"){
                  console.log(data);
                  $("#error").show();

                  setTimeout(function(){
                    $("#error").hide();
                  }, 1500);
                }
              }
            }
      });
    }

   

</script>
    @stop