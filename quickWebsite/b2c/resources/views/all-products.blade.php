@extends('layouts.products_layout')
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
            <div class="card cart-amount-area" style="width: 50%;" id="sortCard" onclick="sorting()">
            <div class="card-body d-flex align-items-center justify-content-center">
             <i class="fa fa-sort" id="sortIcons"></i>
           <!--  <p style="font-size: 15px;">Sort</p> -->
           <select id="sort" style="appearance:none;">
          <option>Sort</option>
          <option value="1">Price – High to Low</option>
          <option value="2">Price – Low to High</option>
          <option value="3">Discount</option>
          <option value="4">New </option>
          <option value="5">Popular</option>
          <option value="6">Relevance</option>
        </select>
             </div>
           </div>

           <div class="card cart-amount-area" style="width: 49%;">
            <div class="card-body d-flex align-items-center justify-content-center" id="suhaNavbarToggler">
              <i class="fa fa-filter" id="sortIcons"></i>
            <p style="font-size: 15px;">Filter</p>
             </div>
           </div>
     
          </div>
      
          <div class="product-catagories">
            <div class="row g-3">
              
            </div>
          </div>
          <div  id="error" class="alert" style="display: none;">Already exist in wishlist</div>
          <div id="insert" class="alert success" style="display: none;">Added in wishlist</div>
          <div class="row g-3">
            <!-- Single Top Product Card-->
            <div class="col-6 col-md-4 col-lg-3">
              <div class="card top-product-card">
                <div class="card-body"><span class="badge badge-success">Sale</span><a class="wishlist-btn" href="#"><i class="lni lni-heart"></i></a><a class="product-thumbnail d-block" href="single-product.html"><img class="mb-2" src="img/product/11.png" alt=""></a><a class="product-title d-block" href="single-product.html">Beach Cap</a>
                  <p class="sale-price">₹13<span>₹42</span></p>
                  <div class="product-rating"><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i></div>
                </div>
              </div>
            </div>
            <!-- Single Top Product Card-->
            <div class="col-6 col-md-4 col-lg-3">
              <div class="card top-product-card">
                <div class="card-body"><span class="badge badge-primary">New</span><a class="wishlist-btn" href="#"><i class="lni lni-heart"></i></a><a class="product-thumbnail d-block" href="single-product.html"><img class="mb-2" src="img/product/5.png" alt=""></a><a class="product-title d-block" href="single-product.html">Wooden Sofa</a>
                  <p class="sale-price">₹74<span>₹99</span></p>
                  <div class="product-rating"><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i></div>
                </div>
              </div>
            </div>
            <!-- Single Top Product Card-->
        <div class="col-6 col-md-4 col-lg-3">
              <div class="card top-product-card">
                <div class="card-body"><span class="badge badge-success">Sale</span><a class="wishlist-btn" href="#"><i class="lni lni-heart"></i></a><a class="product-thumbnail d-block" href="single-product.html"><img class="mb-2" src="img/product/11.png" alt=""></a><a class="product-title d-block" href="single-product.html">Beach Cap</a>
                  <p class="sale-price">₹13<span>₹42</span></p>
                  <div class="product-rating"><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i></div>
                </div>
              </div>
            </div>
            <!-- Single Top Product Card-->
            <div class="col-6 col-md-4 col-lg-3">
              <div class="card top-product-card">
                <div class="card-body"><span class="badge badge-primary">New</span><a class="wishlist-btn" href="#"><i class="lni lni-heart"></i></a><a class="product-thumbnail d-block" href="single-product.html"><img class="mb-2" src="img/product/5.png" alt=""></a><a class="product-title d-block" href="single-product.html">Wooden Sofa</a>
                  <p class="sale-price">₹74<span>₹99</span></p>
                  <div class="product-rating"><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i></div>
                </div>
              </div>
            </div>
             <div class="col-6 col-md-4 col-lg-3">
              <div class="card top-product-card">
                <div class="card-body"><span class="badge badge-success">Sale</span><a class="wishlist-btn" href="#"><i class="lni lni-heart"></i></a><a class="product-thumbnail d-block" href="single-product.html"><img class="mb-2" src="img/product/11.png" alt=""></a><a class="product-title d-block" href="single-product.html">Beach Cap</a>
                  <p class="sale-price">₹13<span>₹42</span></p>
                  <div class="product-rating"><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i></div>
                </div>
              </div>
            </div>
            <!-- Single Top Product Card-->
            <div class="col-6 col-md-4 col-lg-3">
              <div class="card top-product-card">
                <div class="card-body"><span class="badge badge-primary">New</span><a class="wishlist-btn" href="#"><i class="lni lni-heart"></i></a><a class="product-thumbnail d-block" href="single-product.html"><img class="mb-2" src="img/product/5.png" alt=""></a><a class="product-title d-block" href="single-product.html">Wooden Sofa</a>
                  <p class="sale-price">₹74<span>₹99</span></p>
                  <div class="product-rating"><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i></div>
                </div>
              </div>
            </div>
          </div>

          </div>
        </div>
      </div>
   
     <script>
         function myfunction() {
          var val1=document.getElementById('selectProductCatagory').value;
          var id=document.getElementById('hide').value;
            $.ajax({
               type:'POST',
               url:'/quickWebsite/b2c/public/sort/{val1}/{id}',
               data: {val1:val1,id:id},
              //  beforeSend: function (request) {
              //     return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
              // },
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              // data:'_token = <?php echo csrf_token() ?>',
               success:function(result) {
                  $("#msg").html(result);

                  // console.log(val1);
                  console.log(result);
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
    // }else{
    //   alert("First select Size");

    // }
  // }

function sorting(){
    $("#sortCard").on('click', function() {
        var $target = $("#sort");
        var $clone = $target.clone().removeAttr('id');
        $clone.val($target.val()).css({
            overflow: "auto",
            position: 'absolute',
            'z-index': 999,
            left: $target.offset().left,
            top: $target.offset().top + $target.outerHeight(),
            width: $target.outerWidth()
        }).attr('size', $clone.find('option').length > 10 ? 10 : $clone.find('option').length).change(function() {
            $target.val($clone.val());
        }).on('click blur keypress',function(e) {
         if(e.type !== "keypress" || e.which === 13)
            $(this).remove();
        });
        $('body').append($clone);
        $clone.focus();
    });
  }
      </script>
@stop