@extends('layouts.default')
@section('content')

    <div class="page-content-wrapper">
      <div class="container">
        <!-- Profile Wrapper-->
        <div class="profile-wrapper-area py-3">
          <!-- User Information-->
          <div class="card user-info-card">
            <div class="card-body p-4 d-flex align-items-center">
              <div class="user-profile me-3"><img src="img/bg-img/9.jpg" alt=""></div>
              <div class="user-info">
                <p class="mb-0 text-white">username</p>
                <h5 class="mb-0">{{$name}}</h5>
              </div>
            </div>
          </div>
          <!-- User Meta Data-->
          <div class="card user-data-card">
            <div class="card-body">
             @foreach($user as $key=>$value)
              <div class="single-profile-data d-flex align-items-center justify-content-between">
                <div class="title d-flex align-items-center"><i class="lni lni-user"></i><span>Full Name</span></div>
                <div class="data-content">{{$value->name}}</div>
              </div>
              <div class="single-profile-data d-flex align-items-center justify-content-between">
                <div class="title d-flex align-items-center"><i class="lni lni-phone"></i><span>Phone</span></div>
                <div class="data-content">{{$value->mobile}}</div>
              </div>
              <div class="single-profile-data d-flex align-items-center justify-content-between">
                <div class="title d-flex align-items-center"><i class="lni lni-envelope"></i><span>Email Address</span></div>
                <div class="data-content">{{$value->email}}</div>
              </div>
              <div class="single-profile-data d-flex align-items-center justify-content-between">
                <div class="title d-flex align-items-center"><i class="lni lni-map-marker"></i><span>Address</span></div>
                <div class="data-content">{{$value->address}}</div>
              </div>
              <!-- <div class="single-profile-data d-flex align-items-center justify-content-between">
                <div class="title d-flex align-items-center"><i class="lni lni-map-marker"></i><span>State</span></div>
                <div class="data-content">New Delhi</div>
              </div>
              <div class="single-profile-data d-flex align-items-center justify-content-between">
                <div class="title d-flex align-items-center"><i class="lni lni-pin"></i><span>Pin Code</span></div>
                <div class="data-content">110001</div>
              </div>
              <div class="single-profile-data d-flex align-items-center justify-content-between">
                <div class="title d-flex align-items-center"><i class="lni lni-star"></i><span>My Orders</span></div>
                <div class="data-content"><a class="btn btn-danger btn-sm" href="orders"><i class="lni lni-eye me-2"></i>View</a></div>
              </div> -->
              @endforeach
              <!-- Edit Profile-->
              <div class="edit-profile-btn mt-3"><a class="btn w-100" href="edit-profile" style="background-color: #00a79d;"><i class="lni lni-pencil me-2"></i>Edit Profile</a></div>
            </div>
          </div>
        </div>
      </div>
    </div>

@stop