@extends('layouts.default')
@section('content')

<div class="page-content-wrapper">

  <div class="pb-3 pt-3">
    <div class="container">
      <div class="card user-info-card">
            <div class="card-body p-4 d-flex align-items-center">
             
              <div class="user-info">
                <p class="mb-0 text-white">Order ID</p>
                <h5 class="mb-0">#12345678</h5>
              </div>
            </div>
          </div>
     
        <br>
          <div class="cart-table card mb-3">
            <div class="table-responsive card-body">
              <table class="table mb-0">
                <tbody>
                  <tr>
                   
                    <td><img src="img/product/11.png" alt=""></td>
                    <td><a href="#">Puma Shoes<span>7 US size, White</span></a></td>
                    <td>
                      <div class="quantity">
                        <input class="qty-text" type="text" value="1">
                      </div>
                    </td>
                  </tr>
                  
                </tbody>
              </table>
            </div>
          </div>
     

      <div class="cart-table card mb-3">
      	<div class="row">
        <div class="col-lg-6">
           <div class="p-4">
            <strong class="text-muted">Total</strong>
                <h5 class="font-weight-bold"><i class="lni lni-rupee"></i>400.00</h5>
                <span class="text-muted">Paid Online (Net Banking)</span>
            <br>
            <h5>Reason For Replacement</h5>
            <select class="form-select">
              <option>Quality not as expected</option>
              <option>Different Color</option>
              <option>Different Size</option>
            </select>
            <br>
            <textarea class="form-control" placeholder="Mention Your Issue"></textarea>
          </div>
      </div>
      </div>
      <a class="btn btn-success btn-lg" href="complaint-page">Place A Replacement</a>
  </div>

</div>
  </div>

</div>


@stop