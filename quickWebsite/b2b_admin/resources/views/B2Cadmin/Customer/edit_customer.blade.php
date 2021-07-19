@extends('layouts.default')
@section('content')

<div class="main_content_iner overly_inner ">
    <div class="container-fluid p-0 ">
        <!-- PAGE TITLE -->
        <div class="row">
            <div class="col-12">
                <div class="page_title_box d-flex flex-wrap align-items-center justify-content-between">
                    <div class="page_title_left d-flex align-items-center">
                        <h3 class="f_s_25 f_w_700 dark_text mr_30">Edit Customer</h3>
                        <ol class="breadcrumb page_bradcam mb-0">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                            <li class="breadcrumb-item active">Edit Customer</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page Title Ends -->
        <!-- Form Started -->
        <form action="{{ url('/edit_cust/'.request()->id) }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            @foreach ($customer as $key=>$row)                                        
            <div class="row white_card" style="padding: 21px;">
                <input type="hidden" name="tab_ctrl" id="tab_ctrl" value="1">
                <div class="col-3">
                    <div class="widget settings-menu">
                            <div class="row">
                                <div class="ml-sm-3 ml-md-0 ml-lg-3 mt-2 mt-sm-0 mt-md-2 mt-lg-0">
                                    <h6 class="mb-0">Upload Image</h6>
                                </div>
                                <div class="col-xl-3 col-md-4">
                                   
                                        <a href="#" style="cursor: pointer;">
                                            <label for="firstcustomerimg"><i class="fas fa-plus productimgicon"></i>
                                                <input class="form-control" type="file" name="firstcustomerimg[]" id="firstcustomerimg"
                                                    style="display:none; visibility:none;">
                                            </label>
                                        </a>
                                    
                                </div>
                            </div>
                        <div class="row">
                            <div class="gallery">
                                <img src="{{ asset($row->image) }}" alt="" style="width:100px;height:100px;margin:5px;border:2px solid grey;box-shadow:5px 5px 5px grey;">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-9">
                    <div class="white_card card_height_100 mb_30">
                        <div class="white_card_body">
                            <div class="form-row">
                                <div class="card filter-card" style="padding: 27px;">
                                    <div class="card-body pb-0">
                                        <div class="row filter-row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="customername">Customer Name</label>
                                                    <input class="form-control" type="text" placeholder="Customer Name" name="customername" id="customername" value="{{ $row->OWNER_NAME }}" required>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="firm_name">Firm Name</label>
                                                    <input class="form-control" type="text" placeholder="Firm Name" name="firm_name" id="firm_name" value="{{ $row->FIRM_NAME }}" required>
                                                </div>
                                            </div>
                                        </div> 
                                        <div class="row filter-row">
                                            <hr size="18" width="100%"
                                                    style="margin-top: 1rem;margin-bottom: 1rem;border: 0;border-top: 5px solid rgb(84 83 83 / 10%);">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="mobile">Mobile Number</label>
                                                    <input class="form-control" type="number" placeholder="Mobile" name="mobile" id="mobile" value="{{ $row->CONTACT_NO }}" required>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="alt_mobile">Alternate Number</label>
                                                    <input class="form-control" type="number" placeholder="Alternate Mobile Number" name="alt_mobile" id="alt_mobile" value="{{ $row->ALT_NO }}">
                                                </div>
                                            </div>
                                        </div> 
                                        <div class="row filter-row">
                                            <hr size="18" width="100%"
                                                style="margin-top: 1rem;margin-bottom: 1rem;border: 0;border-top: 5px solid rgb(84 83 83 / 10%);">
                                            <div class="col-6">
                                                <div class="form-group">
                                                <label for="email_id">Email-ID</label>
                                                <input class="form-control" type="email" placeholder="Email-ID" name="email_id" id="email_id" value="{{ $row->EMAIL_ID }}">    
                                            </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                <label for="business">Business</label>
                                                <select class="form-control" name="business" id="business" required>    
                                                    <option value="" selected disabled>Select Business</option>
                                                    <option value="W" @if ($row->BUSINESS=='W') selected="selected" @endif>Wholesale</option>
                                                    <option value="R" @if ($row->BUSINESS=='R') selected="selected" @endif>Retail</option>
                                                </select>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="row filter-row">
                                            <hr size="18" width="100%"
                                            style="margin-top: 1rem;margin-bottom: 1rem;border: 0;border-top: 5px solid rgb(84 83 83 / 10%);">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="address">Address</label>
                                                    <textarea name="address" id="address" class="form-control" rows="2">{{ $row->ADDRESS }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row filter-row">
                                            <hr size="18" width="100%"
                                                    style="margin-top: 1rem;margin-bottom: 1rem;border: 0;border-top: 5px solid rgb(84 83 83 / 10%);">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="state">State</label>
                                                    <select name="state" id="state" class="form-control" onchange="dist(this.value);">
                                                        <option value="" selected disabled>Select State</option>
                                                        @foreach ($state as $item=>$data)
                                                            <option value="{{ $data->state }}" @if ($row->STATE==$data->state) selected="selected" @endif>{{ $data->state }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="city">City</label>
                                                    <input class="form-control" type="text" placeholder="City" name="city" id="city" value="{{ $row->CITY }}" required>    
                                                </div>
                                            </div>
                                        </div> 
                                        <div class="row filter-row">
                                            <hr size="18" width="100%"
                                                    style="margin-top: 1rem;margin-bottom: 1rem;border: 0;border-top: 5px solid rgb(84 83 83 / 10%);">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="district">District</label>
                                                            <select class="form-control" type="text" placeholder="District" name="district" id="district" required>
                                                                <option value="{{$row->DISTRICT }}">Select District</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="pin_code">Pin-Code</label>
                                                    <input class="form-control" type="text" placeholder="Pin-Code" name="pin_code" id="pin_code" value="{{ $row->PIN_CODE }}" required>    
                                                </div>
                                            </div>
                                        </div>                                             
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group text-right">
                                                <button class=" addnew-hover color-9 " name="form_submit" value="submit"
                                                    type="submit">Edit Customer</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
        </form>
        <!-- Form Ends -->
    </div>
</div>

<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
<script type="text/javascript">
window.onload=dist(document.getElementById('state').value);
$(function() {
    // Multiple images preview in browser
    var imagesPreview = function(input, placeToInsertImagePreview) {

        if (input.files) {
            var filesAmount = input.files.length;
            var imgg=document.getElementsByName('img_[]');
            console.log(imgg.length);
            var len=imgg.length;
            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();
                var dd=len++;    
                reader.onload = function(event) {
                    $($.parseHTML('<img>')).attr('src', event.target.result).attr('name','firstcustomerimg[]').attr('class','img_'+dd).css({"width":"100px", "height":"100px","margin":"5px","border":"2px solid grey","box-shadow":"5px 5px 5px grey"}).appendTo(placeToInsertImagePreview);
                }

                reader.readAsDataURL(input.files[i]);
            }
        }
    };

    $('#firstcustomerimg').on('change', function() {
        $('.gallery').text('');
        imagesPreview(this, 'div.gallery');
    });
});
function dist(state) {
    var district=document.getElementById('district').value;
    console.log(district,state);
    $.ajax({
        type:'POST',
        url:'{{ url('district') }}',
        data:{'state':state,'_token':'{{ csrf_token() }}','district':district},
        success:function(res)
        {
            // console.log(res.html);
            $('#district').html(res.html);
        }
    });
}
 </script>
@stop