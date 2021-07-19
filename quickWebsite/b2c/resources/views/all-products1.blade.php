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
            <div class="card cart-amount-area" style="width: 48%;">
            <div class="card-body d-flex align-items-center justify-content-between">
              <i class="fa fa-sort"></i>
            <p>Sort</p>

             </div>
           </div>
           <div class="card cart-amount-area" style="width: 48%;">
            <div class="card-body d-flex align-items-center justify-content-between">
              <div id="suhaNavbarToggler">
              <i class="fa fa-filter"></i>
            <p>Filter</p>
            </div>

             </div>
           </div>
         @foreach($cat_img as $key=>$vl)
            <h6>{{$vl->title}}</h6>
            @endforeach 

         <!--    <div class="layout-options">
              <a class="active" href="#"><i class="lni lni-grid-alt"></i></a>
              <a href="shop-product/{{$value->id}}"><i class="lni lni-radio-button"></i></a>
            </div> -->
          </div>
          <div class="product-catagories">
            <div class="row g-3">
              
            </div>
          </div>
          <div  id="error" class="alert" style="display: none;">Already exist in wishlist</div>
          <div id="insert" class="alert success" style="display: none;">Added in wishlist</div>
          <div class="row g-3" id="msg">

             @foreach($data as $key=>$value)
            <!-- Single Top Product Card-->
            <div class="col-6 col-md-4 col-lg-3">
              <div class="card top-product-card">
                <div class="card-body"><span class="badge badge-success">Sale</span><a class="wishlist-btn" onclick="addtowish('{{$value->id}}')">
                  @if(session()->has('uid'))
                  
                  @if($value->wishlist=="false")<i class="lni lni-heart"></i>
                  @else<i class="lni lni-heart-filled"></i>@endif
                  @else<i class="lni lni-heart"></i>@endif
                </a><a class="product-thumbnail d-block" href="single-product/{{$value->id}}"><img src="http://34.72.9.224/quickWebsite/b2c_admin/{{$value->img_url}}" alt=""></a></div>
                     <div class="product-description"><a class="product-title d-block" href="single-product/{{$value->id}}">{{$value->item_name}}
                    <p class="sale-price"><i class="lni lni-rupee"></i>{{$value->sale_price}}&nbsp;&nbsp;<span>₹{{$value->mrp}}</span></p></a>
                    <input type="text" value="{{$value->id}}" id="product{{$value->id}}" name="product-id" hidden="">
                    <div class="product-rating"><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star"></i></div>
                   <!--  <button class="btn btn-danger btn-sm" data-index="{{$value->id}}" onclick="addtowish('{{$value->id}}')"><i class="lni lni-heart"></i>Wishlist</button> -->
                   
                  </div>
                </div>
              </div>
                @endforeach
            </div>

          </div>
        </div>
      </div>
   <div>
      @foreach($cat_img as $key=>$valu)
        <input type="hidden" name="" id="hide" value="{{$valu->id}}">
      @endforeach
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
      </script>
@stop