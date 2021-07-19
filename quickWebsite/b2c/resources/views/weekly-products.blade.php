@extends('layouts.default2')
@section('content')

    <div class="page-content-wrapper">
      <!-- Top Products-->
      <div class="top-products-area py-3">
        <div class="container">
          <div class="section-heading d-flex align-items-center justify-content-between">
            <h6>Weekly Best Products</h6>
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
      <!--     <div class="product-catagories">
            <div class="row g-3">
             
              <div class="col-4"><a class="shadow-sm" href="#"><img src="img/product/5.png" alt="">mens</a></div>
             
              <div class="col-4"><a class="shadow-sm" href="#"><img src="img/product/9.png" alt="">womens</a></div>
             
              <div class="col-4"><a class="shadow-sm" href="#"><img src="img/product/4.png" alt="">kids</a></div>
            </div>
          </div> -->
           <div class="row g-3">
            <!-- Single Weekly Product Card-->
            <div class="col-12 col-md-6">
              <div class="card weekly-product-card">
                <div class="card-body d-flex align-items-center">
                  <div class="product-thumbnail-side"><span class="badge badge-success">Sale</span><a class="wishlist-btn" href="#"><i class="lni lni-heart"></i></a><a class="product-thumbnail d-block" href="single-product"><img src="img/product/10.png" alt=""></a></div>
                  <div class="product-description"><a class="product-title d-block" href="single-product">Modern Red Sofa</a>
                    <p class="sale-price">₹64<span>₹89</span></p>
                    <div class="product-rating"><i class="lni lni-star-filled"></i>4.88 (39)</div><a class="btn btn-danger btn-sm" href="#"><i class="me-1 lni lni-cart"></i>Buy Now</a>
                  </div>
                </div>
              </div>
            </div>
            <!-- Single Weekly Product Card-->
            <div class="col-12 col-md-6">
              <div class="card weekly-product-card">
                <div class="card-body d-flex align-items-center">
                  <div class="product-thumbnail-side"><span class="badge badge-primary">Sale</span><a class="wishlist-btn" href="#"><i class="lni lni-heart"></i></a><a class="product-thumbnail d-block" href="single-product"><img src="img/product/7.png" alt=""></a></div>
                  <div class="product-description"><a class="product-title d-block" href="single-product">Office Chair</a>
                    <p class="sale-price">₹100<span>₹160</span></p>
                    <div class="product-rating"><i class="lni lni-star-filled"></i>4.82 (125)</div><a class="btn btn-danger btn-sm" href="#"><i class="me-1 lni lni-cart"></i>Buy Now</a>
                  </div>
                </div>
              </div>
            </div>
            <!-- Single Weekly Product Card-->
            <div class="col-12 col-md-6">
              <div class="card weekly-product-card">
                <div class="card-body d-flex align-items-center">
                  <div class="product-thumbnail-side"><span class="badge badge-danger">-10%</span><a class="wishlist-btn" href="#"><i class="lni lni-heart"></i></a><a class="product-thumbnail d-block" href="single-product"><img src="img/product/12.png" alt=""></a></div>
                  <div class="product-description"><a class="product-title d-block" href="single-product">Sun Glasses</a>
                    <p class="sale-price">₹24<span>₹32</span></p>
                    <div class="product-rating"><i class="lni lni-star-filled"></i>4.79 (63)</div><a class="btn btn-danger btn-sm" href="#"><i class="me-1 lni lni-cart"></i>Buy Now</a>
                  </div>
                </div>
              </div>
            </div>
            <!-- Single Weekly Product Card-->
            <div class="col-12 col-md-6">
              <div class="card weekly-product-card">
                <div class="card-body d-flex align-items-center">
                  <div class="product-thumbnail-side"><span class="badge badge-warning">New</span><a class="wishlist-btn" href="#"><i class="lni lni-heart"></i></a><a class="product-thumbnail d-block" href="single-product"><img src="img/product/13.png" alt=""></a></div>
                  <div class="product-description"><a class="product-title d-block" href="single-product">Wall Clock</a>
                    <p class="sale-price">₹31<span>₹47</span></p>
                    <div class="product-rating"><i class="lni lni-star-filled"></i>4.99 (7)</div><a class="btn btn-danger btn-sm" href="#"><i class="me-1 lni lni-cart"></i>Buy Now</a>
                  </div>
                </div>
              </div>
            </div>
            <!-- Single Weekly Product Card-->
            <div class="col-12 col-md-6">
              <div class="card weekly-product-card">
                <div class="card-body d-flex align-items-center">
                  <div class="product-thumbnail-side"><span class="badge badge-success">Sale</span><a class="wishlist-btn" href="#"><i class="lni lni-heart"></i></a><a class="product-thumbnail d-block" href="single-product"><img src="img/product/10.png" alt=""></a></div>
                  <div class="product-description"><a class="product-title d-block" href="single-product">Modern Red Sofa</a>
                    <p class="sale-price">₹64<span>₹89</span></p>
                    <div class="product-rating"><i class="lni lni-star-filled"></i>4.88 (39)</div><a class="btn btn-danger btn-sm" href="#"><i class="me-1 lni lni-cart"></i>Buy Now</a>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
   
@stop