@extends('layouts.defaultmain')
@section('content')
<!-- content -->
<div class="content ">
    <div class="row">
        <div class="col-8">
            <div class="mb-2 mt-2 contentheading">
                <h3 class="f_s_25 f_w_700 dark_text mr_30">Orders</h3>
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{url('home')}}">
                                <i class="bi bi-globe2 small me-2"></i> Dashboard
                            </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Orders</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="col-4">
            <a href="#" data-bs-toggle="modal" data-bs-target="#filter" class="btn btn-primary float-end mt-4">
                <i class="bi bi-funnel"></i> Filter</a>
        </div>
    </div>
    <div class="contentborder pt-3">
        <div class="card sticky-top ">
            <div class="card-body ">
                <ul class="nav nav-pills d-flex justify-content-between" id="myTab" role="tablist">
                    <li class="nav-item" role="neworders">
                        <a class="nav-link active" id="neworders-tab" data-bs-toggle="tab" href="#neworders" role="tab"
                            aria-controls="neworders" aria-selected="true">New Orders</a>
                    </li>
                    <li class="nav-item" role="acceptedorders">
                        <a class="nav-link" id="accepted-tab" data-bs-toggle="tab" href="#accepted" role="tab"
                            aria-controls="acceptedorders" aria-selected="false">Accepted</a>
                    </li>
                    <li class="nav-item" role="readytoship">
                        <a class="nav-link" id="readytoship-tab" data-bs-toggle="tab" href="#readytoship" role="tab"
                            aria-controls="readytoship" aria-selected="false">Ready To Ship</a>
                    </li>
                    <li class="nav-item" role="shipped">
                        <a class="nav-link" id="shipped-tab" data-bs-toggle="tab" href="#shipped" role="tab"
                            aria-controls="shipped" aria-selected="false">Shipped</a>
                    </li>
                    <li class="nav-item" role="rejected">
                        <a class="nav-link" id="rejected-tab" data-bs-toggle="tab" href="#rejected" role="tab"
                            aria-controls="rejected" aria-selected="false">Rejected</a>
                    </li>
                    <li class="nav-item" role="completed">
                        <a class="nav-link" id="completed-tab" data-bs-toggle="tab" href="#completed" role="tab"
                            aria-controls="completed" aria-selected="false">Completed</a>
                    </li>
                    <li class="nav-item" role="cancelled">
                        <a class="nav-link" id="cancelled-tab" data-bs-toggle="tab" href="#cancelled" role="tab"
                            aria-controls="cancelled" aria-selected="false">Cancelled</a>
                    </li>
                    <li class="nav-item" role="returned">
                        <a class="nav-link" id="returned-tab" data-bs-toggle="tab" href="#returned" role="tab"
                            aria-controls="returned" aria-selected="false">Returned</a>
                    </li>
                    <li class="nav-item" role="complaints">
                        <a class="nav-link" id="complaints-tab" data-bs-toggle="tab" href="#complaints" role="tab"
                            aria-controls="complaints" aria-selected="false">Complaints</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Orders Tab Sections -->
        <div class="row flex-column-reverse flex-md-row mt-4">
            <div class="col-12">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="neworders" role="tabpanel"
                        aria-labelledby="password-tab">
                        <div class="row mb-4">
                            <div class="col-12 mb-3">
                                <div class="card">
                                    <div class="card-body d-flex flex-column gap-3">
                                        <div class="row ">
                                            <div class="col-xl-2 fw-bolder orderdivtitle">
                                                <p>By</p>
                                                <p>Delivery at</p>
                                                <p>Amount</p>
                                                <p>Ordered on</p>
                                                <p>Order ID</p>
                                            </div>
                                            <div class="col-xl-7">
                                                <div class="d-flex justify-content-between">
                                                    <!-- <p>Kartik Verma</p>
                                                    <span class="badge bg-primary badgenew">New</span> -->
                                                    <div class="d-flex justify-content-between mb-3">
                                                        <div class="d-flex align-items-center">
                                                            <div class="display-9 me-3"> Ishwinder Singh
                                                            </div>
                                                            <span class="badge bg-exchange badgenew">Exchange</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <p>B-34, Santa Calra Street, Sushant Lok-3, Sector 57, Gurugram-122003
                                                </p>
                                                <p><strong> &#8377; 3,225 </strong><small class="text-primary">Paid
                                                        Online (Net Banking)</small></p>
                                                <p>27,Jan,2021</p>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <p>OD10000026</p>
                                                    </div>
                                                    <div class="col-4 ">
                                                        <div
                                                            class="mb-2 d-flex justify-content-center gap-4 align-items-center">
                                                            <div>
                                                                <i class="bi bi-box-seam mr-2 text-primary me-1 "></i>
                                                                <span>Item(s): <a href="#">4 items</a></span>
                                                            </div>
                                                            <!-- <div>
                                                                <i class="bi bi-circle-fill mr-2 text-success me-1 small"></i>
                                                                <span>Order</span>
                                                            </div> -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- <strong>Total :</strong> -->
                                            </div>
                                            <!-- <div class="col-xl-1 text-center">
                                                <span class="badge bg-exchange badgenew">Exchange</span>
                                            </div> -->
                                            <div class="col-xl-3 fororderlgdevice orderrightbtn">
                                                <div>
                                                    <a class="btn float-start orderbtns">
                                                        <i class="bi bi-x-circle text-danger"></i> Reject
                                                    </a>
                                                    <a class="btn float-end orderbtns">
                                                        <i class="bi bi-check-circle text-success"></i> Accept
                                                    </a>
                                                </div>
                                                <div class="m-2">
                                                    <button class="float-end blankbtn">
                                                        <i class="bi bi-box-arrow-up-right text-primary p-2"></i>Linked
                                                        Retuned Order</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <div class="card">
                                    <div class="card-body d-flex flex-column gap-3">
                                        <div class="row ">
                                            <div class="col-xl-2 fw-bolder orderdivtitle">
                                                <p>By</p>
                                                <p>Delivery at</p>
                                                <p>Amount</p>
                                                <p>Ordered on</p>
                                                <p>Order ID</p>
                                            </div>
                                            <div class="col-xl-7">
                                                <div class="d-flex justify-content-between">
                                                    <div class="d-flex justify-content-between mb-3">
                                                        <div class="d-flex align-items-center">
                                                            <div class="display-9 me-3"> Ishwinder Singh </div>
                                                            <span class="badge bg-primary badgenew">New</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <p>B-34, Santa Calra Street, Sushant Lok-3, Sector 57, Gurugram-122003
                                                </p>
                                                <p><strong> &#8377; 3,225 </strong><small class="text-primary">Paid
                                                        Online (Net Banking)</small></p>
                                                <p>27,Jan,2021</p>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <p>OD10000026</p>
                                                    </div>
                                                    <div class="col-4 ">
                                                        <div
                                                            class="mb-2 d-flex justify-content-center gap-4 align-items-center">
                                                            <div>
                                                                <i class="bi bi-box-seam mr-2 text-primary me-1 "></i>
                                                                <span>Item(s): <a href="#">1 items</a></span>
                                                            </div>
                                                            <!-- <div>
                                                                <i class="bi bi-circle-fill mr-2 text-success me-1 small"></i>
                                                                <span>Order</span>
                                                            </div> -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- <strong>Total :</strong> -->
                                            </div>
                                            <!-- <div class="col-xl-1 text-center">
                                                <span class="badge bg-primary badgenew">New</span>
                                            </div> -->
                                            <div class="col-xl-3 fororderlgdevice orderrightbtn">
                                                <a class="btn float-start orderbtns">
                                                    <i class="bi bi-x-circle text-danger"></i> Reject
                                                </a>
                                                <a class="btn float-end orderbtns">
                                                    <i class="bi bi-check-circle text-success"></i> Accept
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <div class="card">
                                    <div class="card-body d-flex flex-column gap-3">
                                        <div class="row ">
                                            <div class="col-xl-2 fw-bolder orderdivtitle">
                                                <p>By</p>
                                                <p>Delivery at</p>
                                                <p>Amount</p>
                                                <p>Ordered on</p>
                                                <p>Order ID</p>
                                            </div>
                                            <div class="col-xl-7">
                                                <div class="d-flex justify-content-between">
                                                    <div class="d-flex justify-content-between mb-3">
                                                        <div class="d-flex align-items-center">
                                                            <div class="display-9 me-3"> Ramesh Singh </div>
                                                            <span class="badge bg-return badgenew">Return</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <p>B-34, Santa Calra Street, Sushant Lok-3, Sector 57, Gurugram-122003
                                                </p>
                                                <p><strong> &#8377; 3,225 </strong><small class="text-primary">Paid
                                                        Online (Net Banking)</small></p>
                                                <p>27,Jan,2021</p>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <p>OD10000026</p>
                                                    </div>
                                                    <div class="col-4 ">
                                                        <div
                                                            class="mb-2 d-flex justify-content-center gap-4 align-items-center">
                                                            <div>
                                                                <i class="bi bi-box-seam mr-2 text-primary me-1 "></i>
                                                                <span>Item(s): <a href="#">1 items</a></span>
                                                            </div>
                                                            <!-- <div>
                                                                <i class="bi bi-circle-fill mr-2 text-success me-1 small"></i>
                                                                <span>Order</span>
                                                            </div> -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- <strong>Total :</strong> -->
                                            </div>
                                            <!-- <div class="col-xl-1 text-center">
                                                <span class="badge bg-primary badgenew">New</span>
                                            </div> -->
                                            <div class="col-xl-3 fororderlgdevice orderrightbtn">
                                                <a class="btn float-start orderbtns">
                                                    <i class="bi bi-x-circle text-danger"></i> Reject
                                                </a>
                                                <a class="btn float-end orderbtns">
                                                    <i class="bi bi-check-circle text-success"></i> Accept
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="accepted" role="tabpanel" aria-labelledby="password-tab">
                        <div class="row mb-4">
                            <div class="col-12 mb-3">
                                <div class="card">
                                    <div class="card-body d-flex flex-column gap-3">
                                        <div class="row ">
                                            <div class="col-xl-2 fw-bolder orderdivtitle">
                                                <p>By</p>
                                                <p>Delivery at</p>
                                                <p>Amount</p>
                                                <p>Ordered on</p>
                                                <p>Order ID</p>
                                            </div>
                                            <div class="col-xl-7">
                                                <div class="d-flex justify-content-between">
                                                    <div class="d-flex justify-content-between mb-3">
                                                        <div class="d-flex align-items-center">
                                                            <div class="display-9 me-3"> Cahal Shrivastava </div>
                                                            <span class="badge bg-intransit badgenew">In Transit</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <p>B-34, Santa Calra Street, Sushant Lok-3, Sector 57, Gurugram-122003
                                                </p>
                                                <p><strong> &#8377; 3,225 </strong><small class="text-primary">Paid
                                                        Online (Net Banking)</small></p>
                                                <p>27,Jan,2021</p>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <p>OD10000026</p>
                                                    </div>
                                                    <div class="col-4 ">
                                                        <div
                                                            class="mb-2 d-flex justify-content-center gap-4 align-items-center">
                                                            <div>
                                                                <i class="bi bi-box-seam mr-2 text-primary me-1 "></i>
                                                                <span>Item(s): <a href="#">1 items</a></span>
                                                            </div>
                                                            <!-- <div>
                                                                <i class="bi bi-circle-fill mr-2 text-success me-1 small"></i>
                                                                <span>Order</span>
                                                            </div> -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- <strong>Total :</strong> -->
                                            </div>
                                            <!-- <div class="col-xl-1 text-center">
                                                <span class="badge bg-primary badgenew">New</span>
                                            </div> -->
                                            <div class="col-xl-3">
                                                <div class="row">
                                                    <label for="staticEmail" class="col-sm-4 col-form-label selectlabel">Status
                                                        :</label>
                                                    <div class="col-8">
                                                        <select id="selectstatus" class="form-select selectstatus">
                                                            <option selected="">Change Status</option>
                                                            <option value="intransit" class=" text-intransit">In Transit</option>
                                                            <option value="delivery" class="text-delivered">Delivery</option>
                                                            <option value="undelivered" class="text-undelivered">Undelivered</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <div class="card">
                                    <div class="card-body d-flex flex-column gap-3">
                                        <div class="row ">
                                            <div class="col-xl-2 fw-bolder orderdivtitle">
                                                <p>By</p>
                                                <p>Delivery at</p>
                                                <p>Amount</p>
                                                <p>Ordered on</p>
                                                <p>Order ID</p>
                                            </div>
                                            <div class="col-xl-7">
                                                <div class="d-flex justify-content-between">
                                                    <div class="d-flex justify-content-between mb-3">
                                                        <div class="d-flex align-items-center">
                                                            <div class="display-9 me-3"> Rakesh Kumar </div>
                                                            <span class="badge bg-delivered badgenew">Delivered</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <p>B-34, Santa Calra Street, Sushant Lok-3, Sector 57, Gurugram-122003
                                                </p>
                                                <p><strong> &#8377; 3,225 </strong><small class="text-primary">Paid
                                                        Online (Net Banking)</small></p>
                                                <p>27,Jan,2021</p>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <p>OD10000026</p>
                                                    </div>
                                                    <div class="col-4 ">
                                                        <div
                                                            class="mb-2 d-flex justify-content-center gap-4 align-items-center">
                                                            <div>
                                                                <i class="bi bi-box-seam mr-2 text-primary me-1 "></i>
                                                                <span>Item(s): <a href="#">1 items</a></span>
                                                            </div>
                                                            <!-- <div>
                                                                <i class="bi bi-circle-fill mr-2 text-success me-1 small"></i>
                                                                <span>Order</span>
                                                            </div> -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- <strong>Total :</strong> -->
                                            </div>
                                            <!-- <div class="col-xl-1 text-center">
                                                <span class="badge bg-primary badgenew">New</span>
                                            </div> -->
                                            <div class="col-xl-3">
                                                <div class="row">
                                                    <label for="staticEmail" class="col-sm-4 col-form-label selectlabel">Status
                                                        :</label>
                                                    <div class="col-8">
                                                        <select id="selectstatus" class="form-select selectstatus">
                                                            <option selected="">Change Status</option>
                                                            <option value="intransit" class=" text-intransit">In Transit</option>
                                                            <option value="delivery" class="text-delivered">Delivery</option>
                                                            <option value="undelivered" class="text-undelivered">Undelivered</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <div class="card">
                                    <div class="card-body d-flex flex-column gap-3">
                                        <div class="row ">
                                            <div class="col-xl-2 fw-bolder orderdivtitle">
                                                <p>By</p>
                                                <p>Delivery at</p>
                                                <p>Amount</p>
                                                <p>Ordered on</p>
                                                <p>Order ID</p>
                                            </div>
                                            <div class="col-xl-7">
                                                <div class="d-flex justify-content-between">
                                                    <div class="d-flex justify-content-between mb-3">
                                                        <div class="d-flex align-items-center">
                                                            <div class="display-9 me-3"> Rakesh Kumar </div>
                                                            <span
                                                                class="badge bg-undelivered badgenew">Undelivered</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <p>B-34, Santa Calra Street, Sushant Lok-3, Sector 57, Gurugram-122003
                                                </p>
                                                <p><strong> &#8377; 3,225 </strong><small class="text-primary">Paid
                                                        Online (Net Banking)</small></p>
                                                <p>27,Jan,2021</p>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <p>OD10000026</p>
                                                    </div>
                                                    <div class="col-4 ">
                                                        <div
                                                            class="mb-2 d-flex justify-content-center gap-4 align-items-center">
                                                            <div>
                                                                <i class="bi bi-box-seam mr-2 text-primary me-1 "></i>
                                                                <span>Item(s): <a href="#">1 items</a></span>
                                                            </div>
                                                            <!-- <div>
                                                                <i class="bi bi-circle-fill mr-2 text-success me-1 small"></i>
                                                                <span>Order</span>
                                                            </div> -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- <strong>Total :</strong> -->
                                            </div>
                                            <!-- <div class="col-xl-1 text-center">
                                                <span class="badge bg-primary badgenew">New</span>
                                            </div> -->
                                            <div class="col-xl-3">
                                                <div class="row">
                                                    <label for="selectstatus"  onchange="ChangedSelection()"  class="col-sm-4 col-form-label selectlabel">Status
                                                        :</label>
                                                    <div class="col-8">
                                                        <select id="selectstatus" class="form-select selectstatus">
                                                            <option selected="">Change Status</option>
                                                            <option value="intransit" class="text-intransit">In Transit</option>
                                                            <option value="delivery" class="text-delivered">Delivery</option>
                                                            <option value="undelivered" class="text-undelivered">Undelivered</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="readytoship" role="tabpanel" aria-labelledby="password-tab">
                        <div class="row mb-4">
                            <div class="col-12 mb-3">
                                <div class="card">
                                    <div class="card-body d-flex flex-column gap-3">
                                        <div class="row ">
                                            <div class="col-xl-2 fw-bolder orderdivtitle">
                                                <p>By</p>
                                                <p>Delivery at</p>
                                                <p>Amount</p>
                                                <p>Ordered on</p>
                                                <p>Order ID</p>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="d-flex justify-content-between">
                                                    <p>Kartik Verma</p>
                                                    <!-- <span
                                                        class="badge bg-primary badgenew">New</span> -->
                                                </div>
                                                <p>B-34, Santa Calra Street, Sushant Lok-3, Sector 57, Gurugram-122003
                                                </p>
                                                <p><strong> &#8377; 3,225 </strong><small class="text-primary">Paid
                                                        Online (Net Banking)</small></p>
                                                <p>27,Jan,2021</p>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <p>OD10000026</p>
                                                    </div>
                                                    <div class="col-4 ">
                                                        <div
                                                            class="mb-2 d-flex justify-content-center gap-4 align-items-center">
                                                            <div>
                                                                <i class="bi bi-box-seam mr-2 text-primary me-1 "></i>
                                                                <span>Item(s): <a href="#">4 items</a></span>
                                                            </div>
                                                            <!-- <div>
                                                                <i class="bi bi-circle-fill mr-2 text-success me-1 small"></i>
                                                                <span>Order</span>
                                                            </div> -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- <strong>Total :</strong> -->
                                            </div>
                                            <div class="col-xl-1 text-center">
                                                <span class="badge bg-exchange badgenew">Exchange</span>
                                            </div>
                                            <div class="col-xl-3 fororderlgdevice orderrightbtn">
                                                <a class="btn float-start orderbtns">
                                                    <i class="bi bi-x-circle text-danger"></i> Reject
                                                </a>
                                                <a class="btn float-end orderbtns">
                                                    <i class="bi bi-check-circle text-success"></i> Accept
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <div class="card">
                                    <div class="card-body d-flex flex-column gap-3">
                                        <div class="row ">
                                            <div class="col-xl-2 fw-bolder orderdivtitle">
                                                <p>By</p>
                                                <p>Delivery at</p>
                                                <p>Amount</p>
                                                <p>Ordered on</p>
                                                <p>Order ID</p>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="d-flex justify-content-between">
                                                    <p>Ishwinder Singh</p>
                                                    <!-- <span class="badge bg-primary badgenew">Exchange</span> -->
                                                </div>
                                                <p>B-34, Santa Calra Street, Sushant Lok-3, Sector 57, Gurugram-122003
                                                </p>
                                                <p><strong> &#8377; 3,225 </strong><small class="text-primary">Paid
                                                        Online (Net Banking)</small></p>
                                                <p>27,Jan,2021</p>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <p>OD10000026</p>
                                                    </div>
                                                    <div class="col-4 ">
                                                        <div
                                                            class="mb-2 d-flex justify-content-center gap-4 align-items-center">
                                                            <div>
                                                                <i class="bi bi-box-seam mr-2 text-primary me-1 "></i>
                                                                <span>Item(s): <a href="#">1 items</a></span>
                                                            </div>
                                                            <!-- <div>
                                                                <i class="bi bi-circle-fill mr-2 text-success me-1 small"></i>
                                                                <span>Order</span>
                                                            </div> -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- <strong>Total :</strong> -->
                                            </div>
                                            <div class="col-xl-1 text-center">
                                                <span class="badge bg-primary badgenew">New</span>
                                            </div>
                                            <div class="col-xl-3 fororderlgdevice orderrightbtn">
                                                <a class="btn float-start orderbtns">
                                                    <i class="bi bi-x-circle text-danger"></i> Reject
                                                </a>
                                                <a class="btn float-end orderbtns">
                                                    <i class="bi bi-check-circle text-success"></i> Accept
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <div class="card">
                                    <div class="card-body d-flex flex-column gap-3">
                                        <div class="row ">
                                            <div class="col-xl-2 fw-bolder orderdivtitle">
                                                <p>By</p>
                                                <p>Delivery at</p>
                                                <p>Amount</p>
                                                <p>Ordered on</p>
                                                <p>Order ID</p>
                                            </div>
                                            <div class="col-xl-7">
                                                <p>Kartik Verma</p>
                                                <p>B-34, Santa Calra Street, Sushant Lok-3, Sector 57, Gurugram-122003
                                                </p>
                                                <p>3,225</p>
                                                <p>27,Jan,2021</p>
                                                <p>OD10000026</p>
                                                <!-- <strong>Total :</strong> -->
                                            </div>
                                            <div class="col-xl-3 fororderlgdevice orderrightbtn">
                                                <a class="btn float-start orderbtns">
                                                    <i class="bi bi-x-circle text-danger"></i> Reject
                                                </a>
                                                <a class="btn float-end orderbtns">
                                                    <i class="bi bi-check-circle text-success"></i> Accept
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="shipped" role="tabpanel">
                        <div class="row mb-4">
                            <div class="col-12 mb-3">
                                <div class="card">
                                    <div class="card-body d-flex flex-column gap-3">
                                        <div class="row ">
                                            <div class="col-xl-2 fw-bolder orderdivtitle">
                                                <p>By</p>
                                                <p>Delivery at</p>
                                                <p>Amount</p>
                                                <p>Ordered on</p>
                                                <p>Order ID</p>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="d-flex justify-content-between">
                                                    <p>Kartik Verma</p>
                                                    <!-- <span
                                                        class="badge bg-primary badgenew">New</span> -->
                                                </div>
                                                <p>B-34, Santa Calra Street, Sushant Lok-3, Sector 57, Gurugram-122003
                                                </p>
                                                <p><strong> &#8377; 3,225 </strong><small class="text-primary">Paid
                                                        Online (Net Banking)</small></p>
                                                <p>27,Jan,2021</p>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <p>OD10000026</p>
                                                    </div>
                                                    <div class="col-4 ">
                                                        <div
                                                            class="mb-2 d-flex justify-content-center gap-4 align-items-center">
                                                            <div>
                                                                <i class="bi bi-box-seam mr-2 text-primary me-1 "></i>
                                                                <span>Item(s): <a href="#">4 items</a></span>
                                                            </div>
                                                            <!-- <div>
                                                                <i class="bi bi-circle-fill mr-2 text-success me-1 small"></i>
                                                                <span>Order</span>
                                                            </div> -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- <strong>Total :</strong> -->
                                            </div>
                                            <div class="col-xl-1 text-center">
                                                <span class="badge bg-exchange badgenew">Exchange</span>
                                            </div>
                                            <div class="col-xl-3 fororderlgdevice orderrightbtn">
                                                <a class="btn float-start orderbtns">
                                                    <i class="bi bi-x-circle text-danger"></i> Reject
                                                </a>
                                                <a class="btn float-end orderbtns">
                                                    <i class="bi bi-check-circle text-success"></i> Accept
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <div class="card">
                                    <div class="card-body d-flex flex-column gap-3">
                                        <div class="row ">
                                            <div class="col-xl-2 fw-bolder orderdivtitle">
                                                <p>By</p>
                                                <p>Delivery at</p>
                                                <p>Amount</p>
                                                <p>Ordered on</p>
                                                <p>Order ID</p>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="d-flex justify-content-between">
                                                    <p>Ishwinder Singh</p>
                                                    <!-- <span class="badge bg-primary badgenew">Exchange</span> -->
                                                </div>
                                                <p>B-34, Santa Calra Street, Sushant Lok-3, Sector 57, Gurugram-122003
                                                </p>
                                                <p><strong> &#8377; 3,225 </strong><small class="text-primary">Paid
                                                        Online (Net Banking)</small></p>
                                                <p>27,Jan,2021</p>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <p>OD10000026</p>
                                                    </div>
                                                    <div class="col-4 ">
                                                        <div
                                                            class="mb-2 d-flex justify-content-center gap-4 align-items-center">
                                                            <div>
                                                                <i class="bi bi-box-seam mr-2 text-primary me-1 "></i>
                                                                <span>Item(s): <a href="#">1 items</a></span>
                                                            </div>
                                                            <!-- <div>
                                                                <i class="bi bi-circle-fill mr-2 text-success me-1 small"></i>
                                                                <span>Order</span>
                                                            </div> -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- <strong>Total :</strong> -->
                                            </div>
                                            <div class="col-xl-1 text-center">
                                                <span class="badge bg-primary badgenew">New</span>
                                            </div>
                                            <div class="col-xl-3 fororderlgdevice orderrightbtn">
                                                <a class="btn float-start orderbtns">
                                                    <i class="bi bi-x-circle text-danger"></i> Reject
                                                </a>
                                                <a class="btn float-end orderbtns">
                                                    <i class="bi bi-check-circle text-success"></i> Accept
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <div class="card">
                                    <div class="card-body d-flex flex-column gap-3">
                                        <div class="row ">
                                            <div class="col-xl-2 fw-bolder orderdivtitle">
                                                <p>By</p>
                                                <p>Delivery at</p>
                                                <p>Amount</p>
                                                <p>Ordered on</p>
                                                <p>Order ID</p>
                                            </div>
                                            <div class="col-xl-7">
                                                <p>Kartik Verma</p>
                                                <p>B-34, Santa Calra Street, Sushant Lok-3, Sector 57, Gurugram-122003
                                                </p>
                                                <p>3,225</p>
                                                <p>27,Jan,2021</p>
                                                <p>OD10000026</p>
                                                <!-- <strong>Total :</strong> -->
                                            </div>
                                            <div class="col-xl-3 fororderlgdevice orderrightbtn">
                                                <a class="btn float-start orderbtns">
                                                    <i class="bi bi-x-circle text-danger"></i> Reject
                                                </a>
                                                <a class="btn float-end orderbtns">
                                                    <i class="bi bi-check-circle text-success"></i> Accept
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="rejected" role="tabpanel">
                        <div class="row mb-4">
                            <div class="col-12 mb-3">
                                <div class="card">
                                    <div class="card-body d-flex flex-column gap-3">
                                        <div class="row ">
                                            <div class="col-xl-2 fw-bolder orderdivtitle">
                                                <p>By</p>
                                                <p>Reason</p>
                                                <p>Delivery at</p>
                                                <p>Amount</p>
                                                <p>Ordered on</p>
                                                <p>Order ID</p>
                                            </div>
                                            <div class="col-xl-7">
                                                <div class="d-flex justify-content-between">
                                                    <!-- <p>Kartik Verma</p>
                                                    <span class="badge bg-primary badgenew">New</span> -->
                                                    <div class="d-flex justify-content-between mb-3">
                                                        <div class="d-flex align-items-center">
                                                            <div class="display-9 me-3"> Sonia Shrivastava
                                                            </div>
                                                            <span class="badge bg-primary badgenew">New</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <input type="text" class="form-control stockcheck p-0" id="rejection"
                                                    placeholder="Enter Reason For Rejection. (Optional)">
                                                <p>B-34, Santa Calra Street, Sushant Lok-3, Sector 57, Gurugram-122003
                                                </p>
                                                <p><strong> &#8377; 3,225 </strong><small class="text-primary">Paid
                                                        Online (Net Banking)</small></p>
                                                <p>27,Jan,2021</p>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <p>OD10000026</p>
                                                    </div>
                                                    <div class="col-4 ">
                                                        <div
                                                            class="mb-2 d-flex justify-content-center gap-4 align-items-center">
                                                            <div>
                                                                <i class="bi bi-box-seam mr-2 text-primary me-1 "></i>
                                                                <span>Item(s): <a href="#">4 items</a></span>
                                                            </div>
                                                            <!-- <div>
                                                                <i class="bi bi-circle-fill mr-2 text-success me-1 small"></i>
                                                                <span>Order</span>
                                                            </div> -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- <strong>Total :</strong> -->
                                            </div>
                                            <!-- <div class="col-xl-1 text-center">
                                                <span class="badge bg-exchange badgenew">Exchange</span>
                                            </div> -->
                                            <div class="col-xl-3 fororderlgdevice orderrightbtn">
                                                <div>
                                                    <a class="btn float-start orderbtns">
                                                        <i class="bi bi-x-circle text-danger"></i> Reject
                                                    </a>
                                                    <a class="btn float-end orderbtns">
                                                        <i class="bi bi-check-circle text-success"></i> Accept
                                                    </a>
                                                </div>
                                                <div class="m-2">
                                                    <button class="float-end blankbtn">
                                                        <i class="bi bi-box-arrow-up-right text-primary p-2"></i>Linked
                                                        Retuned Order</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <div class="card">
                                    <div class="card-body d-flex flex-column gap-3">
                                        <div class="row ">
                                            <div class="col-xl-2 fw-bolder orderdivtitle">
                                                <p>By</p>
                                                <p>Delivery at</p>
                                                <p>Amount</p>
                                                <p>Ordered on</p>
                                                <p>Order ID</p>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="d-flex justify-content-between">
                                                    <p>Kartik Verma</p>
                                                    <!-- <span
                                                        class="badge bg-primary badgenew">New</span> -->
                                                </div>
                                                <p>B-34, Santa Calra Street, Sushant Lok-3, Sector 57, Gurugram-122003
                                                </p>
                                                <p><strong> &#8377; 3,225 </strong><small class="text-primary">Paid
                                                        Online (Net Banking)</small></p>
                                                <p>27,Jan,2021</p>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <p>OD10000026</p>
                                                    </div>
                                                    <div class="col-4 ">
                                                        <div
                                                            class="mb-2 d-flex justify-content-center gap-4 align-items-center">
                                                            <div>
                                                                <i class="bi bi-box-seam mr-2 text-primary me-1 "></i>
                                                                <span>Item(s): <a href="#">4 items</a></span>
                                                            </div>
                                                            <!-- <div>
                                                                <i class="bi bi-circle-fill mr-2 text-success me-1 small"></i>
                                                                <span>Order</span>
                                                            </div> -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- <strong>Total :</strong> -->
                                            </div>
                                            <div class="col-xl-1 text-center">
                                                <span class="badge bg-exchange badgenew">Exchange</span>
                                            </div>
                                            <div class="col-xl-3 fororderlgdevice orderrightbtn">
                                                <a class="btn float-start orderbtns">
                                                    <i class="bi bi-x-circle text-danger"></i> Reject
                                                </a>
                                                <a class="btn float-end orderbtns">
                                                    <i class="bi bi-check-circle text-success"></i> Accept
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <div class="card">
                                    <div class="card-body d-flex flex-column gap-3">
                                        <div class="row ">
                                            <div class="col-xl-2 fw-bolder orderdivtitle">
                                                <p>By</p>
                                                <p>Delivery at</p>
                                                <p>Amount</p>
                                                <p>Ordered on</p>
                                                <p>Order ID</p>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="d-flex justify-content-between">
                                                    <p>Ishwinder Singh</p>
                                                    <!-- <span class="badge bg-primary badgenew">Exchange</span> -->
                                                </div>
                                                <p>B-34, Santa Calra Street, Sushant Lok-3, Sector 57, Gurugram-122003
                                                </p>
                                                <p><strong> &#8377; 3,225 </strong><small class="text-primary">Paid
                                                        Online (Net Banking)</small></p>
                                                <p>27,Jan,2021</p>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <p>OD10000026</p>
                                                    </div>
                                                    <div class="col-4 ">
                                                        <div
                                                            class="mb-2 d-flex justify-content-center gap-4 align-items-center">
                                                            <div>
                                                                <i class="bi bi-box-seam mr-2 text-primary me-1 "></i>
                                                                <span>Item(s): <a href="#">1 items</a></span>
                                                            </div>
                                                            <!-- <div>
                                                                <i class="bi bi-circle-fill mr-2 text-success me-1 small"></i>
                                                                <span>Order</span>
                                                            </div> -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- <strong>Total :</strong> -->
                                            </div>
                                            <div class="col-xl-1 text-center">
                                                <span class="badge bg-primary badgenew">New</span>
                                            </div>
                                            <div class="col-xl-3 fororderlgdevice orderrightbtn">
                                                <a class="btn float-start orderbtns">
                                                    <i class="bi bi-x-circle text-danger"></i> Reject
                                                </a>
                                                <a class="btn float-end orderbtns">
                                                    <i class="bi bi-check-circle text-success"></i> Accept
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <div class="card">
                                    <div class="card-body d-flex flex-column gap-3">
                                        <div class="row ">
                                            <div class="col-xl-2 fw-bolder orderdivtitle">
                                                <p>By</p>
                                                <p>Delivery at</p>
                                                <p>Amount</p>
                                                <p>Ordered on</p>
                                                <p>Order ID</p>
                                            </div>
                                            <div class="col-xl-7">
                                                <p>Kartik Verma</p>
                                                <p>B-34, Santa Calra Street, Sushant Lok-3, Sector 57, Gurugram-122003
                                                </p>
                                                <p>3,225</p>
                                                <p>27,Jan,2021</p>
                                                <p>OD10000026</p>
                                                <!-- <strong>Total :</strong> -->
                                            </div>
                                            <div class="col-xl-3 fororderlgdevice orderrightbtn">
                                                <a class="btn float-start orderbtns">
                                                    <i class="bi bi-x-circle text-danger"></i> Reject
                                                </a>
                                                <a class="btn float-end orderbtns">
                                                    <i class="bi bi-check-circle text-success"></i> Accept
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="completed" role="tabpanel">
                        <div class="row mb-4">
                            <div class="col-12 mb-3">
                                <div class="card">
                                    <div class="card-body d-flex flex-column gap-3">
                                        <div class="row ">
                                            <div class="col-xl-2 fw-bolder orderdivtitle">
                                                <p>By</p>
                                                <p>Delivery at</p>
                                                <p>Amount</p>
                                                <p>Ordered on</p>
                                                <p>Order ID</p>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="d-flex justify-content-between">
                                                    <p>Kartik Verma</p>
                                                    <!-- <span
                                                        class="badge bg-primary badgenew">New</span> -->
                                                </div>
                                                <p>B-34, Santa Calra Street, Sushant Lok-3, Sector 57, Gurugram-122003
                                                </p>
                                                <p><strong> &#8377; 3,225 </strong><small class="text-primary">Paid
                                                        Online (Net Banking)</small></p>
                                                <p>27,Jan,2021</p>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <p>OD10000026</p>
                                                    </div>
                                                    <div class="col-4 ">
                                                        <div
                                                            class="mb-2 d-flex justify-content-center gap-4 align-items-center">
                                                            <div>
                                                                <i class="bi bi-box-seam mr-2 text-primary me-1 "></i>
                                                                <span>Item(s): <a href="#">4 items</a></span>
                                                            </div>
                                                            <!-- <div>
                                                                <i class="bi bi-circle-fill mr-2 text-success me-1 small"></i>
                                                                <span>Order</span>
                                                            </div> -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- <strong>Total :</strong> -->
                                            </div>
                                            <div class="col-xl-1 text-center">
                                                <span class="badge bg-exchange badgenew">Exchange</span>
                                            </div>
                                            <div class="col-xl-3 fororderlgdevice orderrightbtn">
                                                <a class="btn float-start orderbtns">
                                                    <i class="bi bi-x-circle text-danger"></i> Reject
                                                </a>
                                                <a class="btn float-end orderbtns">
                                                    <i class="bi bi-check-circle text-success"></i> Accept
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <div class="card">
                                    <div class="card-body d-flex flex-column gap-3">
                                        <div class="row ">
                                            <div class="col-xl-2 fw-bolder orderdivtitle">
                                                <p>By</p>
                                                <p>Delivery at</p>
                                                <p>Amount</p>
                                                <p>Ordered on</p>
                                                <p>Order ID</p>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="d-flex justify-content-between">
                                                    <p>Ishwinder Singh</p>
                                                    <!-- <span class="badge bg-primary badgenew">Exchange</span> -->
                                                </div>
                                                <p>B-34, Santa Calra Street, Sushant Lok-3, Sector 57, Gurugram-122003
                                                </p>
                                                <p><strong> &#8377; 3,225 </strong><small class="text-primary">Paid
                                                        Online (Net Banking)</small></p>
                                                <p>27,Jan,2021</p>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <p>OD10000026</p>
                                                    </div>
                                                    <div class="col-4 ">
                                                        <div
                                                            class="mb-2 d-flex justify-content-center gap-4 align-items-center">
                                                            <div>
                                                                <i class="bi bi-box-seam mr-2 text-primary me-1 "></i>
                                                                <span>Item(s): <a href="#">1 items</a></span>
                                                            </div>
                                                            <!-- <div>
                                                                <i class="bi bi-circle-fill mr-2 text-success me-1 small"></i>
                                                                <span>Order</span>
                                                            </div> -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- <strong>Total :</strong> -->
                                            </div>
                                            <div class="col-xl-1 text-center">
                                                <span class="badge bg-primary badgenew">New</span>
                                            </div>
                                            <div class="col-xl-3 fororderlgdevice orderrightbtn">
                                                <a class="btn float-start orderbtns">
                                                    <i class="bi bi-x-circle text-danger"></i> Reject
                                                </a>
                                                <a class="btn float-end orderbtns">
                                                    <i class="bi bi-check-circle text-success"></i> Accept
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <div class="card">
                                    <div class="card-body d-flex flex-column gap-3">
                                        <div class="row ">
                                            <div class="col-xl-2 fw-bolder orderdivtitle">
                                                <p>By</p>
                                                <p>Delivery at</p>
                                                <p>Amount</p>
                                                <p>Ordered on</p>
                                                <p>Order ID</p>
                                            </div>
                                            <div class="col-xl-7">
                                                <p>Kartik Verma</p>
                                                <p>B-34, Santa Calra Street, Sushant Lok-3, Sector 57, Gurugram-122003
                                                </p>
                                                <p>3,225</p>
                                                <p>27,Jan,2021</p>
                                                <p>OD10000026</p>
                                                <!-- <strong>Total :</strong> -->
                                            </div>
                                            <div class="col-xl-3 fororderlgdevice orderrightbtn">
                                                <a class="btn float-start orderbtns">
                                                    <i class="bi bi-x-circle text-danger"></i> Reject
                                                </a>
                                                <a class="btn float-end orderbtns">
                                                    <i class="bi bi-check-circle text-success"></i> Accept
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="cancelled" role="tabpanel">
                        <div class="row mb-4">
                            <div class="col-12 mb-3">
                                <div class="card">
                                    <div class="card-body d-flex flex-column gap-3">
                                        <div class="row ">
                                            <div class="col-xl-2 fw-bolder orderdivtitle">
                                                <p>By</p>
                                                <p>Delivery at</p>
                                                <p>Amount</p>
                                                <p>Ordered on</p>
                                                <p>Order ID</p>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="d-flex justify-content-between">
                                                    <p>Kartik Verma</p>
                                                    <!-- <span
                                                        class="badge bg-primary badgenew">New</span> -->
                                                </div>
                                                <p>B-34, Santa Calra Street, Sushant Lok-3, Sector 57, Gurugram-122003
                                                </p>
                                                <p><strong> &#8377; 3,225 </strong><small class="text-primary">Paid
                                                        Online (Net Banking)</small></p>
                                                <p>27,Jan,2021</p>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <p>OD10000026</p>
                                                    </div>
                                                    <div class="col-4 ">
                                                        <div
                                                            class="mb-2 d-flex justify-content-center gap-4 align-items-center">
                                                            <div>
                                                                <i class="bi bi-box-seam mr-2 text-primary me-1 "></i>
                                                                <span>Item(s): <a href="#">4 items</a></span>
                                                            </div>
                                                            <!-- <div>
                                                                <i class="bi bi-circle-fill mr-2 text-success me-1 small"></i>
                                                                <span>Order</span>
                                                            </div> -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- <strong>Total :</strong> -->
                                            </div>
                                            <div class="col-xl-1 text-center">
                                                <span class="badge bg-exchange badgenew">Exchange</span>
                                            </div>
                                            <div class="col-xl-3 fororderlgdevice orderrightbtn">
                                                <a class="btn float-start orderbtns">
                                                    <i class="bi bi-x-circle text-danger"></i> Reject
                                                </a>
                                                <a class="btn float-end orderbtns">
                                                    <i class="bi bi-check-circle text-success"></i> Accept
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <div class="card">
                                    <div class="card-body d-flex flex-column gap-3">
                                        <div class="row ">
                                            <div class="col-xl-2 fw-bolder orderdivtitle">
                                                <p>By</p>
                                                <p>Delivery at</p>
                                                <p>Amount</p>
                                                <p>Ordered on</p>
                                                <p>Order ID</p>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="d-flex justify-content-between">
                                                    <p>Ishwinder Singh</p>
                                                    <!-- <span class="badge bg-primary badgenew">Exchange</span> -->
                                                </div>
                                                <p>B-34, Santa Calra Street, Sushant Lok-3, Sector 57, Gurugram-122003
                                                </p>
                                                <p><strong> &#8377; 3,225 </strong><small class="text-primary">Paid
                                                        Online (Net Banking)</small></p>
                                                <p>27,Jan,2021</p>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <p>OD10000026</p>
                                                    </div>
                                                    <div class="col-4 ">
                                                        <div
                                                            class="mb-2 d-flex justify-content-center gap-4 align-items-center">
                                                            <div>
                                                                <i class="bi bi-box-seam mr-2 text-primary me-1 "></i>
                                                                <span>Item(s): <a href="#">1 items</a></span>
                                                            </div>
                                                            <!-- <div>
                                                                <i class="bi bi-circle-fill mr-2 text-success me-1 small"></i>
                                                                <span>Order</span>
                                                            </div> -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- <strong>Total :</strong> -->
                                            </div>
                                            <div class="col-xl-1 text-center">
                                                <span class="badge bg-primary badgenew">New</span>
                                            </div>
                                            <div class="col-xl-3 fororderlgdevice orderrightbtn">
                                                <a class="btn float-start orderbtns">
                                                    <i class="bi bi-x-circle text-danger"></i> Reject
                                                </a>
                                                <a class="btn float-end orderbtns">
                                                    <i class="bi bi-check-circle text-success"></i> Accept
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <div class="card">
                                    <div class="card-body d-flex flex-column gap-3">
                                        <div class="row ">
                                            <div class="col-xl-2 fw-bolder orderdivtitle">
                                                <p>By</p>
                                                <p>Delivery at</p>
                                                <p>Amount</p>
                                                <p>Ordered on</p>
                                                <p>Order ID</p>
                                            </div>
                                            <div class="col-xl-7">
                                                <p>Kartik Verma</p>
                                                <p>B-34, Santa Calra Street, Sushant Lok-3, Sector 57, Gurugram-122003
                                                </p>
                                                <p>3,225</p>
                                                <p>27,Jan,2021</p>
                                                <p>OD10000026</p>
                                                <!-- <strong>Total :</strong> -->
                                            </div>
                                            <div class="col-xl-3 fororderlgdevice orderrightbtn">
                                                <a class="btn float-start orderbtns">
                                                    <i class="bi bi-x-circle text-danger"></i> Reject
                                                </a>
                                                <a class="btn float-end orderbtns">
                                                    <i class="bi bi-check-circle text-success"></i> Accept
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="returned" role="tabpanel">
                        <div class="row mb-4">
                            <div class="col-12 mb-3">
                                <div class="card">
                                    <div class="card-body d-flex flex-column gap-3">
                                        <div class="row ">
                                            <div class="col-xl-2 fw-bolder orderdivtitle">
                                                <p>By</p>
                                                <p>Delivery at</p>
                                                <p>Amount</p>
                                                <p>Ordered on</p>
                                                <p>Order ID</p>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="d-flex justify-content-between">
                                                    <p>Kartik Verma</p>
                                                    <!-- <span
                                                        class="badge bg-primary badgenew">New</span> -->
                                                </div>
                                                <p>B-34, Santa Calra Street, Sushant Lok-3, Sector 57, Gurugram-122003
                                                </p>
                                                <p><strong> &#8377; 3,225 </strong><small class="text-primary">Paid
                                                        Online (Net Banking)</small></p>
                                                <p>27,Jan,2021</p>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <p>OD10000026</p>
                                                    </div>
                                                    <div class="col-4 ">
                                                        <div
                                                            class="mb-2 d-flex justify-content-center gap-4 align-items-center">
                                                            <div>
                                                                <i class="bi bi-box-seam mr-2 text-primary me-1 "></i>
                                                                <span>Item(s): <a href="#">4 items</a></span>
                                                            </div>
                                                            <!-- <div>
                                                                <i class="bi bi-circle-fill mr-2 text-success me-1 small"></i>
                                                                <span>Order</span>
                                                            </div> -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- <strong>Total :</strong> -->
                                            </div>
                                            <div class="col-xl-1 text-center">
                                                <span class="badge bg-exchange badgenew">Exchange</span>
                                            </div>
                                            <div class="col-xl-3 fororderlgdevice orderrightbtn">
                                                <a class="btn float-start orderbtns">
                                                    <i class="bi bi-x-circle text-danger"></i> Reject
                                                </a>
                                                <a class="btn float-end orderbtns">
                                                    <i class="bi bi-check-circle text-success"></i> Accept
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <div class="card">
                                    <div class="card-body d-flex flex-column gap-3">
                                        <div class="row ">
                                            <div class="col-xl-2 fw-bolder orderdivtitle">
                                                <p>By</p>
                                                <p>Delivery at</p>
                                                <p>Amount</p>
                                                <p>Ordered on</p>
                                                <p>Order ID</p>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="d-flex justify-content-between">
                                                    <p>Ishwinder Singh</p>
                                                    <!-- <span class="badge bg-primary badgenew">Exchange</span> -->
                                                </div>
                                                <p>B-34, Santa Calra Street, Sushant Lok-3, Sector 57, Gurugram-122003
                                                </p>
                                                <p><strong> &#8377; 3,225 </strong><small class="text-primary">Paid
                                                        Online (Net Banking)</small></p>
                                                <p>27,Jan,2021</p>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <p>OD10000026</p>
                                                    </div>
                                                    <div class="col-4 ">
                                                        <div
                                                            class="mb-2 d-flex justify-content-center gap-4 align-items-center">
                                                            <div>
                                                                <i class="bi bi-box-seam mr-2 text-primary me-1 "></i>
                                                                <span>Item(s): <a href="#">1 items</a></span>
                                                            </div>
                                                            <!-- <div>
                                                                <i class="bi bi-circle-fill mr-2 text-success me-1 small"></i>
                                                                <span>Order</span>
                                                            </div> -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- <strong>Total :</strong> -->
                                            </div>
                                            <div class="col-xl-1 text-center">
                                                <span class="badge bg-primary badgenew">New</span>
                                            </div>
                                            <div class="col-xl-3 fororderlgdevice orderrightbtn">
                                                <a class="btn float-start orderbtns">
                                                    <i class="bi bi-x-circle text-danger"></i> Reject
                                                </a>
                                                <a class="btn float-end orderbtns">
                                                    <i class="bi bi-check-circle text-success"></i> Accept
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <div class="card">
                                    <div class="card-body d-flex flex-column gap-3">
                                        <div class="row ">
                                            <div class="col-xl-2 fw-bolder orderdivtitle">
                                                <p>By</p>
                                                <p>Delivery at</p>
                                                <p>Amount</p>
                                                <p>Ordered on</p>
                                                <p>Order ID</p>
                                            </div>
                                            <div class="col-xl-7">
                                                <p>Kartik Verma</p>
                                                <p>B-34, Santa Calra Street, Sushant Lok-3, Sector 57, Gurugram-122003
                                                </p>
                                                <p>3,225</p>
                                                <p>27,Jan,2021</p>
                                                <p>OD10000026</p>
                                                <!-- <strong>Total :</strong> -->
                                            </div>
                                            <div class="col-xl-3 fororderlgdevice orderrightbtn">
                                                <a class="btn float-start orderbtns">
                                                    <i class="bi bi-x-circle text-danger"></i> Reject
                                                </a>
                                                <a class="btn float-end orderbtns">
                                                    <i class="bi bi-check-circle text-success"></i> Accept
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="complaints" role="tabpanel">
                        <div class="row mb-4">
                            <div class="col-12 mb-3">
                                <div class="card">
                                    <div class="card-body d-flex flex-column gap-3">
                                        <div class="row ">
                                            <div class="col-xl-2 fw-bolder orderdivtitle">
                                                <p>By</p>
                                                <p>Delivery at</p>
                                                <p>Amount</p>
                                                <p>Ordered on</p>
                                                <p>Order ID</p>
                                            </div>
                                            <div class="col-xl-7">
                                                <div class="d-flex justify-content-between">
                                                    <p>Kartik Verma</p>
                                                    <span class="badge bg-primary badgenew">New</span>
                                                </div>
                                                <p>B-34, Santa Calra Street, Sushant Lok-3, Sector 57, Gurugram-122003
                                                </p>
                                                <p><strong> &#8377; 3,225 </strong><small class="text-primary">Paid
                                                        Online (Net Banking)</small></p>
                                                <p>27,Jan,2021</p>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <p>OD10000026</p>
                                                    </div>
                                                    <div class="col-4 ">
                                                        <div
                                                            class="mb-2 d-flex justify-content-center gap-4 align-items-center">
                                                            <div>
                                                                <i class="bi bi-box-seam mr-2 text-primary me-1 "></i>
                                                                <span>Item(s): <a href="#">4 items</a></span>
                                                            </div>
                                                            <!-- <div>
                                                                <i class="bi bi-circle-fill mr-2 text-success me-1 small"></i>
                                                                <span>Order</span>
                                                            </div> -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- <strong>Total :</strong> -->
                                            </div>
                                            <!-- <div class="col-xl-1 text-center">
                                                <span class="badge bg-exchange badgenew">Exchange</span>
                                            </div> -->
                                            <div class="col-xl-3 fororderlgdevice orderrightbtn">
                                                <a class="btn float-start orderbtns">
                                                    <i class="bi bi-x-circle text-danger"></i> Reject
                                                </a>
                                                <a class="btn float-end orderbtns">
                                                    <i class="bi bi-check-circle text-success"></i> Accept
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <div class="card">
                                    <div class="card-body d-flex flex-column gap-3">
                                        <div class="row ">
                                            <div class="col-xl-2 fw-bolder orderdivtitle">
                                                <p>By</p>
                                                <p>Delivery at</p>
                                                <p>Amount</p>
                                                <p>Ordered on</p>
                                                <p>Order ID</p>
                                            </div>
                                            <div class="col-xl-7">
                                                <div class="d-flex justify-content-between">
                                                    <p>Ishwinder Singh</p>
                                                    <span class="badge bg-exchange badgenew">Exchange</span>
                                                    <!-- <span class="badge bg-primary badgenew">Exchange</span> -->
                                                </div>
                                                <p>B-34, Santa Calra Street, Sushant Lok-3, Sector 57, Gurugram-122003
                                                </p>
                                                <p><strong> &#8377; 3,225 </strong><small class="text-primary">Paid
                                                        Online (Net Banking)</small></p>
                                                <p>27,Jan,2021</p>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <p>OD10000026</p>
                                                    </div>
                                                    <div class="col-4 ">
                                                        <div
                                                            class="mb-2 d-flex justify-content-center gap-4 align-items-center">
                                                            <div>
                                                                <i class="bi bi-box-seam mr-2 text-primary me-1 "></i>
                                                                <span>Item(s): <a href="#">1 items</a></span>
                                                            </div>
                                                            <!-- <div>
                                                                <i class="bi bi-circle-fill mr-2 text-success me-1 small"></i>
                                                                <span>Order</span>
                                                            </div> -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- <strong>Total :</strong> -->
                                            </div>
                                            <!-- <div class="col-xl-1 text-center">
                                                <span class="badge bg-primary badgenew">New</span>
                                            </div> -->
                                            <div class="col-xl-3 fororderlgdevice orderrightbtn">
                                                <a class="btn float-start orderbtns">
                                                    <i class="bi bi-x-circle text-danger"></i> Reject
                                                </a>
                                                <a class="btn float-end orderbtns">
                                                    <i class="bi bi-check-circle text-success"></i> Accept
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <div class="card">
                                    <div class="card-body d-flex flex-column gap-3">
                                        <div class="row ">
                                            <div class="col-xl-2 fw-bolder orderdivtitle">
                                                <p>By</p>
                                                <p>Delivery at</p>
                                                <p>Amount</p>
                                                <p>Ordered on</p>
                                                <p>Order ID</p>
                                            </div>
                                            <div class="col-xl-7">
                                                <p>Kartik Verma</p>
                                                <p>B-34, Santa Calra Street, Sushant Lok-3, Sector 57, Gurugram-122003
                                                </p>
                                                <p>3,225</p>
                                                <p>27,Jan,2021</p>
                                                <p>OD10000026</p>
                                                <!-- <strong>Total :</strong> -->
                                            </div>
                                            <div class="col-xl-3 fororderlgdevice orderrightbtn">
                                                <a class="btn float-start orderbtns">
                                                    <i class="bi bi-x-circle text-danger"></i> Reject
                                                </a>
                                                <a class="btn float-end orderbtns">
                                                    <i class="bi bi-check-circle text-success"></i> Accept
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Filter Modal Starts -->
<div class="modal fade " id="filter" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Orders Filter</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- <form autocomplete="off">
                    <div class="row">
                        <div class="col-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="categoryCheck1">
                                <label class="form-check-label" for="categoryCheck1">
                                    <span class="badge bg-primary badgenew">New</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="categoryCheck2">
                                <label class="form-check-label" for="categoryCheck2">
                                    <span class="badge bg-exchange badgenew">Exchange</span>
                                </label>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="categoryCheck3">
                                <label class="form-check-label" for="categoryCheck3">
                                    <span class="badge bg-return badgenew">Return</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="categoryCheck4">
                                <label class="form-check-label" for="categoryCheck4">
                                    <span class="badge bg-delivered badgenew">Delivered</span>
                                </label>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="categoryCheck5">
                                <label class="form-check-label" for="categoryCheck5">
                                    <span class="badge bg-undelivered badgenew">Undelivered</span>
                                </label>
                            </div>
                        </div>
                        <div class="col-3"></div>
                    </div>
                </form> -->
                <form autocomplete="off">
                    <div class="row">
                        <div class="col-3">
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="categoryCheck1">
                                <label class="form-check-label badge bg-primary badgenew" for="categoryCheck1">
                                    New
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="categoryCheck2">
                                <label class="form-check-label badge bg-exchange badgenew" for="categoryCheck2">
                                    Exchange
                                </label>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="categoryCheck3">
                                <label class="form-check-label badge bg-return badgenew" for="categoryCheck3">
                                    Return
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="categoryCheck4">
                                <label class="form-check-label badge bg-delivered badgenew" for="categoryCheck4">
                                    Delivered
                                </label>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="categoryCheck5">
                                <label class="form-check-label badge bg-undelivered badgenew" for="categoryCheck5">
                                    Undelivered
                                </label>
                            </div>
                        </div>
                        <div class="col-3"></div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <div class="row text-center ">
                    <div class="col-6">
                        <a href="javascript:void(0);" data-bs-dismiss="modal" class="btn btn-primary attmodalclose"
                            id="filterclose">Close</a>
                    </div>
                    <div class="col-6">
                        <button class="btn btn-primary attmodalsave">Save</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Filter Modal Ends-->
@stop