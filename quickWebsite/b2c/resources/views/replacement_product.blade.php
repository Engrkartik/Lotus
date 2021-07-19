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
                   
                    <td><a href="#">Ciramic Pot Set<span>$12.10 × 1</span></a></td>
                    <td>
                      <div class="quantity">
                        <input class="qty-text" type="text" value="1">
                      </div>
                    </td>
                  </tr>
                   <tr>
                   <th>Complaint Type</th>
                    
                    <td><p>Material Defect</p></td>
                  </tr>
                  <tr>
                   <th>Reason For Replacement</th>
                    
                    <td><p>Quality not as expected</p></td>
                  </tr>
                  <tr>
                   <th>Issue</th>
                    
                    <td><p>Material Defect</p></td>
                  </tr>
                  <tr>
                   <th>Reply(From company)</th>
                    
                    <td><textarea class="form-control" style="height: auto; width: -webkit-fill-available;" disabled="disabled">Sorry for the inconvinience, Your order will be replaced soon.</textarea></td>
                  </tr>
                  
                </tbody>
              </table>
            </div>
          </div>
     

      <div class="cart-table card mb-3">
      
      <a class="btn btn-success btn-lg" href="#">Next Page</a>
  </div>

</div>
  </div>

</div>


@stop