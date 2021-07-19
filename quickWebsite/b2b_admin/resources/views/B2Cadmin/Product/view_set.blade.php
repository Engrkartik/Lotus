@extends('layouts.default')
@section('content')

<div class="main_content_iner overly_inner ">
    <div class="container-fluid p-0 ">
        <!-- PAGE TITLE -->
        <div class="row">
            <div class="col-12">
                <div class="page_title_box d-flex flex-wrap align-items-center justify-content-between">
                    <div class="page_title_left d-flex align-items-center">
                        <h3 class="f_s_25 f_w_700 dark_text mr_30">Set View</h3>
                        <ol class="breadcrumb page_bradcam mb-0">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                            <li class="breadcrumb-item active">Set View</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page Title Ends -->
        <!-- Form Started -->

            <div class="row" style="padding: 21px;">
                <div class="col-md-12">
                    <div class="card white_card" style="padding: 27px;">
                       <div class="white_card_body">
                        <div class="row ">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        @foreach ($set as $item=>$value)
                                        <div class="row">
                                            <div class="col-md-12">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Product Name: <u>{{ $value->item_name }}</u></th>
                                                            <th>Product Price: <u>{{ $value->wsp }}</u></th>
                                                            <th>Product Tax: <u>{{ $value->gst }}</u></th>
                                                            <th class="hours_entered">Product Quantity: <u>{{ $value->qty }}</u><i class="fas fa-edit status-icon" data-toggle="modal" data-target="#exampleModal{{ $value->set_id }}" style="cursor: pointer;"></i></th>
                                                        </tr>
                                                        @php
                                                            $set_part=App\Http\Controllers\ProductController::get_set_detail($value->set_id,$value->s_id);
                                                            $j=1;
                                                        @endphp
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Color</th>
                                                            <th>Size</th>
                                                            <th>Quantity</th>
                                                        </tr>
                                                        @for ($i = 0; $i < sizeof($set_part); $i++)
                                                        <tr>
                                                            <td>{{ $j++ }}</td>
                                                            <td><div class="colorcircle mr-2" style="background-color:{{ $set_part[$i]->color}}"></td>
                                                            <td>{{ $set_part[$i]->size}}</td>
                                                            <td>{{ $set_part[$i]->qty}}</td>
                                                        </tr>    
                                                        @endfor
                                                    </thead>
                                                </table>
                                            </div>
                                        </div>
<div class="modal fade" id="exampleModal{{ $value->set_id }}" role="dialog" data-backdrop="false">
    <div class="modal-dialog" role="document">
        <form action="{{ url('/update_set/'.$value->set_id.'/'.request()->id) }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Set Detail</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Product Name: <u>{{ $value->item_name }}</u></th>
                                                    <th>Product Price: <u>{{ $value->wsp }}</u></th>
                                                    <th>Product Tax: <u>{{ $value->gst }}</u></th>
                                                    <th>Product Quantity: <u>{{ $value->qty }}</u></th>
                                                </tr>
                                                @php
                                                    $set_part=App\Http\Controllers\ProductController::get_set_detail($value->set_id,$value->s_id);
                                                    $j=1;
                                                @endphp
                                                <tr>
                                                    <th>#</th>
                                                    <th>Color</th>
                                                    <th>Size</th>
                                                    <th>Quantity</th>
                                                </tr>
                                                @for ($i = 0; $i < sizeof($set_part); $i++)
                                                <tr>
                                                    <td>{{ $j++ }}</td>
                                                    <td><div class="colorcircle mr-2" style="background-color:{{ $set_part[$i]->color}}"></div><input type="hidden" value="{{ $set_part[$i]->color}}" name="color[]"></td>
                                                    <td>{{ $set_part[$i]->size}} <input type="hidden" value="{{ $set_part[$i]->size}}" name="size[]"></td>
                                                    <td><input type="number" class="form-control" value="{{ $set_part[$i]->qty}}" name="qty[]"></td>
                                                </tr>    
                                                @endfor
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </form>
    </div>
</div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                       </div>
                    </div>
                </div> 
        <!-- Form Ends -->
        </div>
    </div>
</div>

<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
<script type="text/javascript">

 </script>
@stop