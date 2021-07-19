@extends('layouts.orderLayout')
@section('content')

 <div class="page-content-wrapper">
      <!-- Top Products-->
      <div class="top-products-area py-3">
        <div class="container">
             
          <div class="section-heading d-flex align-items-center justify-content">
           <div class="card cart-amount-area" style="width:34%;">
            <div class="card-body d-flex align-items-center justify-content-center">
            
            <p>Showing: <strong>All Orders</strong></p>
             </div>
           </div>
             <div class="card cart-amount-area" style="width:35%;">
            <div class="card-body d-flex align-items-center justify-content-center">
              <p>Within:<strong>Last 6 Months</strong></p>
             </div>
           </div>

           <div class="card cart-amount-area" style="width:30%;">
            <div class="card-body d-flex align-items-center justify-content-center" id="suhaNavbarToggler">
              <i class="fa fa-filter" id="sortIcons"></i>
            <p style="font-size: 15px;">Filter</p>
             </div>
           </div>
          </div>
        @foreach($data as $key=>$val)

        @if($val['status']=="Confirm")
         <div class="card w-100">
    <!--   <div class="weeklybest card-body">

          	
           
            <div class="single-order-status active">
              <div class="order-text">
                <h6>Order {{$val['status']}}</h6>
                <span>Order-no {{$val['order_id']}} </span>
              </div>
   
            </div>
          
          </div> -->
                @foreach($val['order_details'] as $key=>$value)
          <div class="row g-3">
           
            <div class="col-12 col-md-12">
              <div class="card weekly-product-card" style="background-color: #d0d0d040;">
                <div class="card-body d-flex align-items-center">
                	
                  <div class="col-md-3">
                  	<a class="product-thumbnail d-block" href="order-details"><img src="http://34.72.9.224/quickWebsite/b2c_admin/{{$value->img_url}}" alt="" style="width: 56%;"></a>
                  </div>
                  <div class="product-description">
                  	<a class="product-title d-block">{{$value->item_name}}</a>
                  	<br>
                  	<span>{{$value->descrpt}}</span>
                  	<br>
                   <span>Product color </span><input class="form-check-input" style="background-color: {{$value->color}}" value="{{$value->color}}" id="color" type="radio" name="colRadio">
                   <br>
                   <span>Size: {{$value->size}}</span>
                   <br>                
                   <span>Qty: {{$value->qty}}</span>
              </div>

                </div>
              </div>
               <div class="card weekly-product-card" style="background-color: #d0d0d040;">
              	
                <div class="card-body d-flex align-items-center">
                @if($value->status=="Confirm")
                <a class="btn btn-success product-thumbnail d-block" href="cancel-order/{{$value->id}}"><i class="me-1 lni lni-close"></i>Cancel</a>
                @else
                <button class="btn btn-danger">Cancelled</button>
                @endif
                <a class="btn btn-success" href="" style="margin-left: 4%;"><i class="me-1 lni lni-help"></i>Help</a>
                
                  </div>
              
                </div>
                
              </div>
            
            </div>
                @endforeach
         
          </div>
        <br>
        @elseif($val['status']=="Delivered")
              <div class="card w-100">
          <div class="row g-3">
            <!-- Single Weekly Product Card-->
            <div class="col-12 col-md-12">
              <div class="card weekly-product-card">
              	
             <div class="card-body d-flex align-items-center">
                  
                  <div class="product-thumbnail-side"><a class="product-thumbnail d-block" href="order-details"><img src="img/product/10.png" alt=""></a></div>
                  <div class="product-description"><a class="product-title d-block">Product name </a>
                   <span>Product color</span>
                   <span>Size: S</span>
                   <br>
                   <a class="btn btn-success btn-sm" href="cancel-order"><i class="me-1 lni lni-close"></i>Cancel</a>
                   <a class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="me-1 lni lni-map-marker"></i>Track</a>
                
              </div>
                </div>
              </div>
            </div>
           
          </div>

        </div>
        <br>
        @elseif($val['status']=="Pending")
           <div class="card w-100">
          <div class="card-body p-4">
       
            <div class="single-order-status active">
       <div class="order-icon shadow-sm"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-box" viewBox="0 0 16 16">
<path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5 8 5.961 14.154 3.5 8.186 1.113zM15 4.239l-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z"></path>
</svg>
              </div>
              <div class="order-text">
                <h6>Delivered</h6><span>on fri, 20 april </span>
              </div>
             
            </div>
          
      </div>
          <div class="row g-3">
            <!-- Single Weekly Product Card-->
            <div class="col-12 col-md-12">
              <div class="card weekly-product-card">
                
             <div class="card-body d-flex align-items-center">
                  
                  <div class="product-thumbnail-side"><a class="product-thumbnail d-block" href="order-delcanc"><img src="img/product/10.png" alt=""></a></div>
                  <div class="product-description"><a class="product-title d-block">Product name </a>
                   <span>Product color</span>
                   <span>Size: S</span>
                   <br>
                    <span>Exchange/Return window closed on 10 may</span>
              </div>
                </div>
              </div>
            </div>
           
          </div>

        </div>
        <br>
        @elseif($val['status']=="Cancel")
           <div class="card w-100">
          <div class="card-body p-4">
       
            <div class="single-order-status active">
              <div class="order-text">
              <!-- <h6>Cancelled</h6><span>on Sun, 10 april as per your request.</span> -->
              <h6>Cancelled</h6><span>on {{ $val['updated_at']->format('D') }}, {{ $val['updated_at']->format('d M') }} as per your request.</span>
              </div>
             
            </div>
          
      </div>
      @foreach($val['order_details'] as $key=>$value)
          <div class="row g-3">
            <!-- Single Weekly Product Card-->
            <div class="col-12 col-md-12">
              <div class="card weekly-product-card">
                
             <div class="card-body d-flex align-items-center">
                  
                  <div class="product-thumbnail-side"><a class="product-thumbnail d-block" href="order-canc"><img src="http://34.72.9.224/quickWebsite/b2c_admin/{{$value->img_url}}" alt=""></a></div>
                  <div class="product-description"><a class="product-title d-block">{{$value->item_name}}</a>
                   <span>Product color</span><input class="form-check-input" style="background-color: {{$value->color}}" value="{{$value->color}}" id="color" type="radio" name="colRadio">
                   <br>
                   <span>Size: {{$value->size}}</span>
                   <br>                
                   <span>Qty: {{$value->qty}}</span>
                   <!-- <span>Size: S</span> -->
                  
              </div>
                </div>
              </div>
            </div>
           
          </div>
          @endforeach
        </div>
        <br>
        @endif
         <!-- <div class="card w-100">
          <div class="card-body p-4"> -->
            
            <!-- Single Order Status-->
            <!-- <div class="single-order-status active">
              <div class="order-icon shadow-sm"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-check" viewBox="0 0 16 16">
<path d="M11.354 6.354a.5.5 0 0 0-.708-.708L8 8.293 6.854 7.146a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z"/>
<path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
</svg>
              </div>
              <div class="order-text">
                <h6>Delivered</h6><span>On sun, 16 May</span>
              </div>
   
            </div>
          
      </div>
          <div class="row g-3"> -->
            <!-- Single Weekly Product Card-->
            <!-- <div class="col-12 col-md-12">
              <div class="card weekly-product-card">
                
                <div class="card-body d-flex align-items-center">
                  
                  <div class="product-thumbnail-side"><a class="product-thumbnail d-block" href="order-details-del"><img src="img/product/10.png" alt=""></a></div>
                  <div class="product-description"><a class="product-title d-block">Product name </a>
                   <span>Product color</span>
                   <span>Size: M</span>
                   <br>
                   <a class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#exchangeModal"><i class="me-1 lni lni-close"></i>Exchange</a>
                   <a class="btn btn-success btn-sm" href="order-status-del"><i class="me-1 lni lni-help"></i>Return</a>
                
              </div>
                </div>
                
              </div>
            </div> -->
            <!-- Single Weekly Product Card-->
           
            <!-- Select All Products-->
          <!--   
          </div>

        </div> -->
        @endforeach
        </div>
      </div>
    </div>

@stop