@extends('layouts.default')
@section('content')

    <div class="page-content-wrapper">
      <!-- Top Products-->
      <div class="top-products-area py-3">
        <div class="container">
          <div class="section-heading d-flex align-items-center justify-content-between">
            @if($total==1)
              <h6>Your Wishlist have {{$total}} item only</h6>
            @else
              <h6>Your Wishlist have {{$total}} items only</h6>
            @endif
            <!-- Layout Options-->
           <!--  <div class="layout-options"><a class="active" href="wishlist-grid"><i class="lni lni-grid-alt"></i></a><a href="wishlist-list"><i class="lni lni-radio-button"></i></a></div> -->
          </div>
          <div class="row g-3">
            <!-- Single Top Product Card-->
            @foreach($getaddwish as $key=>$value)
            <div class="col-6 col-md-4 col-lg-3">
              <div class="card top-product-card">
                <div class="card-body"><span class="badge badge-success">-{{$value->discount}}%</span>
                  <a class="wishlist-btn" onclick="removeWishlist('{{$value->id}}')"><i class="lni lni-trash"></i></a>
                  <a class="product-thumbnail d-block" href="category/shop-product/single-product/{{$value->id}}"><img class="mb-2" src="http://34.72.9.224/quickWebsite/b2c_admin/{{$value->img_url}}" alt=""></a>
                  <a class="product-title d-block" href="category/shop-product/single-product/{{$value->id}}">{{$value->item_name}}</a>

                  <p class="sale-price"><i class="lni lni-rupee"></i>{{$value->sale_price}}</p>
                <button class="btn btn-warning ms-3" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="showModal('{{$value->id}}')" name=""><i class="me-1 lni lni-cart"></i></button>
                </div>
              </div>
            </div>
            @endforeach
            <!-- Single Top Product Card-->
            <!-- <div class="col-6 col-md-4 col-lg-3">
              <div class="card top-product-card">
                <div class="card-body"><span class="badge badge-primary">New</span>
                  <a class="product-thumbnail d-block" href="single-product.php"><img class="mb-2" src="img/product/5.png" alt=""></a>
                  <a class="product-title d-block" href="single-product.php">Wooden Sofa</a>
                  <p class="sale-price"><i class="lni lni-rupee"></i>74</p>
                  
                </div>
              </div>
            </div> -->
            <!-- Single Top Product Card-->
            <!-- <div class="col-6 col-md-4 col-lg-3">
              <div class="card top-product-card">
                <div class="card-body"><span class="badge badge-success">Sale</span>
                  <a class="product-thumbnail d-block" href="single-product.php"><img class="mb-2" src="img/product/6.png" alt=""></a>
                  <a class="product-title d-block" href="single-product.php">Roof Lamp</a>
                  <p class="sale-price"><i class="lni lni-rupee"></i>99</p>
                 
                </div>
              </div>
            </div> -->
            <!-- Single Top Product Card-->
            <!-- <div class="col-6 col-md-4 col-lg-3">
              <div class="card top-product-card">
                <div class="card-body"><span class="badge badge-danger">-15%</span>
                  <a class="product-thumbnail d-block" href="single-product.php"><img class="mb-2" src="img/product/9.png" alt=""></a>
                  <a class="product-title d-block" href="single-product.php">Sneaker Shoes</a>
                  <p class="sale-price"><i class="lni lni-rupee"></i>87</p>
                 
                </div>
              </div>
            </div> -->
            <!-- Single Top Product Card-->
            <!-- <div class="col-6 col-md-4 col-lg-3">
              <div class="card top-product-card">
                <div class="card-body"><span class="badge badge-danger">-11%</span>
                  <a class="product-thumbnail d-block" href="single-product.php"><img class="mb-2" src="img/product/8.png" alt=""></a>
                  <a class="product-title d-block" href="single-product.php">Wooden Chair</a>
                  <p class="sale-price"><i class="lni lni-rupee"></i>21</p>
                  
                </div>
              </div>
            </div> -->
            <!-- Single Top Product Card-->
            <!-- <div class="col-6 col-md-4 col-lg-3">
              <div class="card top-product-card">
                <div class="card-body"><span class="badge badge-warning">Hot</span>
                  <a class="product-thumbnail d-block" href="single-product.php"><img class="mb-2" src="img/product/4.png" alt=""></a>
                  <a class="product-title d-block" href="single-product.php">Polo Shirts</a>
                  <p class="sale-price"><i class="lni lni-rupee"></i>38</p>
                 
                </div>
              </div>
            </div> -->
            <!-- Select All Products-->
            <!-- <div class="col-12">
              <div class="select-all-products-btn">
              	<a class="btn btn-danger w-100" href="cart.php">
                  Add All To Cart</a></div>
            </div> -->
          </div>
        </div>
      </div>
    </div>
    <!-- Modal -->
<div class="modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" role="dialog">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModal">Select Attributes</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
       <form class="cart-form" action="#" method="">
              <div class="order-plus-minus d-flex align-items-center">
                <div class="quantity-button-handler">-</div>
                <input class="form-control cart-quantity-input" id="qty" type="text" step="1" name="quantity" value="1">
                <div class="quantity-button-handler">+</div>
              </div>
            </form>
      <button type="button" class="btn btn-primary" onclick="addCart()">Continue</button>
      </div>
    </div>
  </div>     
</div>
<script type="text/javascript">

  function showModal(td) {
    // $('#exampleModal').modal('hide');
    // alert(td);
    $.ajax({
               type:'POST',
               url:'/quickWebsite/b2c/public/wishlistAjax',
               data: {'td':td},
              //  beforeSend: function (request) {
              //     return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
              // },
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
               success:function(result) {
                $('.modal-body').html(result);
                //   $("#exampleModal").html(result);
                $('#exampleModal').modal('show');
                // $('#exampleModal').html(result).modal('show');
                  // console.log(val1);
                  // console.log(result);
               }
            });
}
$(document).ready(function() {
    $('input:radio[name=colorRadio]').change(function() {
    // $('.form-check-input').click(function(){
    var color = $('input[name="colorRadio"]:checked').val();
    // var id = document.getElementById('product-id').value;
    alert("id");
    console.log(color);
    // $.ajax({
    //         type:'POST',
    //         url:'/quickWebsite/b2c/public/showColor',
    //         data: {'size':size,'id':id},
    //           //  beforeSend: function (request) {
    //           //     return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
    //           // },
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         },
    //         success:function(data){
    //           $("#oldColor").hide();
    //           $("#newColor").show();
    //           $("#newColor").html(data);
    //           console.log(data);
    //         }
    //     });
        
    });
});
// function addCart(){
//     // alert('hello');
//     var id = document.getElementById('product-id').value;
//     var qty = document.getElementById('qty').value;
//     // var color = document.getElementById('color').value;
//     var color = $('input[name="colorRadio"]:checked').val();
//     var size = $('input[name="sizeRadio"]:checked').val();
//     // alert(color);
//     // die();
//     if($("input:radio[name='sizeRadio']").is(":checked")){
//       // alert(size);
//       $.ajax({
//             type:'POST',
//             url:'/quickWebsite/b2c/public/addtoCart',
//             data: {'size':size,'id':id,'qty':qty,'color':color},
//               //  beforeSend: function (request) {
//               //     return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
//               // },
//             headers: {
//                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//             },
//             success:function(data){
//               if(data=='Added in cart Successfully'){
//                 alert(data);
//                 removeWishlist(id);
//               }
//               else{
//                 alert(data);
//               }
//             }
//       });
//     }else{
//       alert("First select Size");

//     }
//   }
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
                window.location.href = "http://34.72.9.224/quickWebsite/b2c/public/wishlist-grid"; 
              }
              else{
                alert(data);
              }
            }
      });
  }
</script>
@stop