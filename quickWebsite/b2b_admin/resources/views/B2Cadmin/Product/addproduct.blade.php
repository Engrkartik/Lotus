@extends('layouts.default')
@section('content')

<div class="main_content_iner overly_inner ">
    <div class="container-fluid p-0 ">
        <!-- PAGE TITLE -->
        <div class="row">
            <div class="col-12">
                <div class="page_title_box d-flex flex-wrap align-items-center justify-content-between">
                    <div class="page_title_left d-flex align-items-center">
                        <h3 class="f_s_25 f_w_700 dark_text mr_30">Add Product</h3>
                        <ol class="breadcrumb page_bradcam mb-0">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                            <li class="breadcrumb-item active">Add Product</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page Title Ends -->
        <!-- Form Started -->
        <form action="{{ url('/add_pro') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row white_card" style="padding: 21px;">
                <input type="hidden" name="tab_ctrl" id="tab_ctrl" value="1">
                <div class="col-3">
                    <div class="widget settings-menu">
                            <div class="row">
                                <div class="ml-sm-3 ml-md-0 ml-lg-3 mt-2 mt-sm-0 mt-md-2 mt-lg-0">
                                    <h6 class="mb-0">Upload Image</h6>
                                </div>
                                <div class="col-xl-3 col-md-4">
                                   
                                        <a href="#">
                                            <label for="firstproductimg"><i class="fas fa-plus productimgicon"></i>
                                                <input class="form-control" type="file" name="firstproductimg[]" id="firstproductimg"
                                                    style="display:none; visibility:none;" multiple>
                                            </label>
                                        </a>
                                    
                                </div>
                            </div>
                        <div class="row">
                            <div class="gallery"></div>
                        </div>
                    </div>
                </div>
                <div class="col-9">
                    <div class="white_card card_height_100 mb_30">
                        <div class="white_card_body">
                            {{-- <input type="hidden" name="_token" value="6Z0Q7SMgsxNNBoppNqCCGuoGNkrN8sT2dLbcSwSt"> --}}
                            <!-- <div class="form-row">
                                <span class="btn-text">Upload Image</span>
                                <input class="form-control upload" name="multprodimg[]" type="file" id="multprodimg"
                                    multiple="">
                            </div> -->
                            <div class="form-row">
                                <div class="card filter-card" style="padding: 27px;">
                                    <div class="card-body pb-0">
                                        <div class="row filter-row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="">Category</label>
                                                    <select name="category" id="category" class="form-control"
                                                        required="" onchange="gen_sub(this.value);">
                                                        <option value="">Select Category</option>
                                                        @foreach ($category as $item=>$value)
                                                            <option value="{{ $value->id }}">{{ $value->title }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="">Sub-Category</label>
                                                    <select name="subcategory" id="subcategory" class="form-control"
                                                        required="">
                                                        <option value="">Select Main-Category First</option>
                                                       
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="">Product Title</label>
                                                    <input class="form-control" type="text" placeholder="Product Name"
                                                        name="productname" id="productname">
                                                </div>
                                            </div>
                                            {{-- <div class="col-6">
                                                <div class="form-group">
                                                    <label for="">Price</label>
                                                    <input class="form-control" type="text" placeholder="Price"
                                                        name="price" value="" id="price">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="gst_type">GST Type</label>

                                                    <select name="gst_type" id="gst_type" class="custom-select"
                                                        required="">
                                                        <option value="">Select Option</option>
                                                        <option value="INCLUDED">INCLUDED</option>
                                                        <option value="EXCLUDED">EXCLUDED</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-6 mt-2">
                                                <div class="form-group">
                                                    <label for="">GST %</label>
                                                    <select name="gst" id="gst" class="form-control" required="">
                                                        <option value="">Select Option</option>
                                                        <option value="Exempt">Exempt</option>
                                                        <option value="3%">3%</option>
                                                        <option value="5%">5%</option>
                                                        <option value="12%">12%</option>
                                                        <option value="18%">18%</option>
                                                        <option value="28%">28%</option>
                                                    </select>
                                                </div>
                                            </div> --}}
                                            <div class="col-6 mt-2">
                                                <div class="form-group">
                                                    <label for="brand">Brand</label>
                                                    <select name="brand" id="brand" class="form-control">
                                                        <option value="">Select Brand</option>
                                                        @foreach ($brand as $item=>$value)
                                                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <!-- COLOUR PART -->
                                            <div class="col-12">
                                                <hr size="18" width="100%"
                                                    style="margin-top: 1rem;margin-bottom: 1rem;border: 0;border-top: 5px solid rgb(84 83 83 / 10%);">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <label for=""
                                                            style="position: static;color: #797a7c;font-weight: 600;font-size: 16px;">Colour</label>

                                                    </div>
                                                    <div class="col-6">
                                                        <a href="" data-toggle="modal" data-backdrop="false"
                                                            data-target="#add_colour"
                                                            class="btn btn-primary add-button float-right"><i
                                                                class="fas fa-plus"></i>
                                                        </a>
                                                    </div>
                                                </div>


                                                <!-- <p>Select Colour,Size and Quantity here of the stock you wish to upload
                                                    for sale.</p> -->
                                                <div class="row d-inline">
                                                    <div class="col-2 d-inline" id="after_color_save">
                                                        
                                                    </div>
                                                </div>
                                                <!-- <hr size="18" width="100%"
                                                    style="margin-top: 1rem;margin-bottom: 1rem;border: 0;border-top: 5px solid rgb(84 83 83 / 10%);"> -->
                                            </div>
                                            <!-- COLOUR PART END -->


                                            <!-- SIZES PART -->
                                            <div class="col-12">
                                                <hr size="18" width="100%"
                                                    style="margin-top: 1rem;margin-bottom: 1rem;border: 0;border-top: 5px solid rgb(84 83 83 / 10%);">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <label for=""
                                                            style="position: static;color: #797a7c;font-weight: 600;font-size: 16px;">SIZES</label>

                                                    </div>
                                                    <div class="col-6">
                                                        <a href="" data-toggle="modal" data-backdrop="false"
                                                            data-target="#add_sizes"
                                                            class="btn btn-primary add-button float-right"><i
                                                                class="fas fa-plus"></i>
                                                        </a>
                                                    </div>
                                                </div>


                                                <!-- <p>Select Colour,Size and Quantity here of the stock you wish to upload
                                                    for sale.</p> -->
                                                <div class="row d-inline">
                                                    <div class="col-2 d-inline" id="after_save_size">
                                                    </div>
                                                </div>
                                                <!-- <hr size="18" width="100%"
                                                    style="margin-top: 1rem;margin-bottom: 1rem;border: 0;border-top: 5px solid rgb(84 83 83 / 10%);"> -->
                                            </div>
                                            <!-- SIZES PART END -->
                                            <!-- Attributes Part Start -->
                                            <div class="col-12">
                                                <label
                                                    style="position: static;color: #797a7c;font-weight: 600;font-size: 16px;">Attributes</label>
                                                <div style="display: flex;margin-top: 12px;">
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <label for="">Type</label>
                                                            <select name="att_type" id="att_type" class="form-control"
                                                                 onchange="sub_att(this.value);">
                                                                <option value="">Select Category First</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <label for="">Sub-Type</label>
                                                            <select name="att_subtype" id="att_subtype"
                                                                class="form-control">
                                                                <option value="">Select Attribute Type First</option>
                                                                </select>
                                                        </div>
                                                    </div>
                                                        <div class="col-4">
                                                            <div class="form-group">
                                                                <button class="btn btn-primary add-button" type="button" onclick="save_att();">Add</button>
                                                            </div>
                                                        </div>
                                                   </div>
                                                <div class="attributestable mt-3">
                                                    <table class="table table-bordered">
                                                        <thead style="background-color: #e7f4ff;">
                                                            <tr>
                                                                <th>Attribute Type</th>
                                                                <th>Attribute Sub-Type</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="myTable">
                                                            
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <!-- Attributes Part End -->
                                            <div class="col-12 mt-3">
                                                <hr size="18" width="100%"
                                                    style="margin-top: 1rem;margin-bottom: 1rem;border: 0;border-top: 5px solid rgb(84 83 83 / 10%);">
                                                <div class="form-group">
                                                    <label class="mb-3" for=""
                                                        style="position: static;color: #797a7c;font-weight: 600;font-size: 16px;">Product
                                                        Description</label>
                                                    <textarea class="form-control" placeholder="Product Description"
                                                        name="productdesc" value="" cols="50"
                                                        id="productdesc"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-12 mt-3">
                                                <input type="hidden" name="color" id="color" value="">
                                                <input type="hidden" name="size" id="size" value="">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group text-right">
                                                <button class=" addnew-hover color-9 " name="form_submit" value="submit"
                                                    type="submit">Add Product</button>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>


                        </div>
                    </div>


                </div>

        </form>
        <!-- Form Ends -->
    </div>
</div>




<!-- Add Colour List Modal -->
<div class="modal fade" id="add_colour" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold">Add Colour</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#">
                    <div class="form-row mb-4">
                        <div class="form-group" style="display: contents;">
                            <div class="col-md-12 colormid">
                                <h3 for="favcolor"
                                    style="position: static;color: #797a7c;font-weight: 600;font-size: 16px;">Select
                                    Colour from the Swatch box:</h3>
                                <input type="color" id="favcolor" name="favcolor" value="#0d0d0d"
                                    style="width: 114px;height:114px;box-radius:25%;">&nbsp;&nbsp;
                                <button type="button" onclick="add_color(document.getElementById('favcolor').value);"
                                    class="btn btn-primary" style="padding-left: 30px;padding-right: 30px;">Add
                                    Colour</button><br>
                            </div>
                        </div>

                    </div>
                    <div class="row d-inline">
                        <div class="col-2 d-inline" id="add_color_modal">
                           
                        </div>
                    </div>
                    <br>
            </div>
            <div class="submit-section" style="padding: 12px;margin-top: -45px;">
                <div class="row">
                    <div class="col-6">
                        <button class="btn btn-primary submit-btn" type="button" id="sub_btn"
                            onclick="save_color();">Save</button>
                    </div>
                    <div class="col-6">
                        <a href="javascript:void(0);" data-dismiss="modal" class="btn  cancel-btn">Cancel</a>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
</div>
<!-- /Add Colour List Modal -->

<!-- Add Size List Modal -->
<div class="modal custom-modal fade" id="add_sizes" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title font-weight-bold">Add Size</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#">
                    <div class="form-row ">
                        <div class="form-group">
                            <div class="col-md-12"><label for="favcolor">Add
                                    size of your Product:</label> <input type="text" class="d-inline form-control"
                                    id="prosize" name="prosize"><button type="button"
                                    onclick="add_size(document.getElementById('prosize').value);"
                                    class=" mt-2 btn btn-primary" style="margin-top: -31px;">Add Size</button><br>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row d-inline">
                        <div class="col-2 d-inline" id="add_size_modal">
                            
                        </div>
                    </div>
            </div>
            <div class="submit-section">
                <div class="row">
                    <div class="col-6">
                        <button class="btn btn-primary submit-btn" type="button" id="sub_btn_sz"
                            onclick="save_size()">Save</button>
                    </div>
                    <div class="col-6">
                        <a href="javascript:void(0);" data-dismiss="modal" class="btn  cancel-btn">Cancel</a>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
</div>
<!-- /Add Size List Modal -->


<!-- Add Category Name Modal -->
<div class="modal custom-modal fade" id="add_category" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title font-weight-bold">Add Category</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#">
                    <div class="form-row">
                        <div class="form-group col-12">
                            <label>Category Name</label>
                            <input class="form-control" type="text" name="category_name" id="category_name"
                                data-bv-field="category_name">
                            <small class="help-block" data-bv-validator="remote" data-bv-for="category_name"
                                data-bv-result="NOT_VALIDATED" style="display: none;">This category name is already
                                exist</small><small class="help-block" data-bv-validator="notEmpty"
                                data-bv-for="category_name" data-bv-result="NOT_VALIDATED" style="display: none;">Please
                                enter category name</small></div>
                        <div class="form-group col-12">
                            <label>Category Image</label>
                            <input class="form-control" type="file" name="category_image" id="category_image"
                                data-bv-field="category_image">
                            <small class="help-block" data-bv-validator="file" data-bv-for="category_image"
                                data-bv-result="NOT_VALIDATED" style="display: none;">The selected file is not valid.
                                Only allowed jpeg,jpg,png files</small><small class="help-block"
                                data-bv-validator="notEmpty" data-bv-for="category_image" data-bv-result="NOT_VALIDATED"
                                style="display: none;">Please upload category image</small></div>
                    </div>
                    <div class="submit-section">
                        <div class="row">
                            <div class="col-6">
                                <button class="btn btn-primary submit-btn">Submit</button>
                            </div>
                            <div class="col-6">
                                <a href="javascript:void(0);" data-dismiss="modal" class="btn  cancel-btn">Cancel</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Add Category Name Modal -->




<!-- Add Sub Category Name Modal -->
<div class="modal custom-modal fade" id="add_subcategory" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title font-weight-bold">Add Sub Category</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#">
                    <div class="form-row">
                        <div class="form-group col-12">
                            <label>Category Name</label>
                            <select name="category_name" id="category_name" class="form-control" required="">
                                <option value="">Select Category</option>
                                <option value="Exempt">Men</option>
                                <option value="3%">Women</option>
                                <option value="5%">Kids</option>
                            </select>
                        </div>
                        <div class="form-group col-12">
                            <label>Sub Category Name</label>
                            <input class="form-control" type="text" name="subcategory_name" id="subcategory_name"
                                data-bv-field="subcategory_name">
                            <small class="help-block" data-bv-validator="remote" data-bv-for="category_name"
                                data-bv-result="NOT_VALIDATED" style="display: none;">This category name is already
                                exist</small><small class="help-block" data-bv-validator="notEmpty"
                                data-bv-for="category_name" data-bv-result="NOT_VALIDATED" style="display: none;">Please
                                enter category name</small>
                        </div>
                        <div class="form-group col-12">
                            <label>Sub Category Image</label>
                            <input class="form-control" type="file" name="subcategory_image" id="subcategory_image"
                                data-bv-field="subcategory_image">
                            <small class="help-block" data-bv-validator="file" data-bv-for="subcategory_image"
                                data-bv-result="NOT_VALIDATED" style="display: none;">The selected file is not valid.
                                Only allowed jpeg,jpg,png files</small><small class="help-block"
                                data-bv-validator="notEmpty" data-bv-for="category_image" data-bv-result="NOT_VALIDATED"
                                style="display: none;">Please upload category image</small></div>
                    </div>
                    <div class="submit-section">
                        <div class="row">
                            <div class="col-6">
                                <button class="btn btn-primary submit-btn">Submit</button>
                            </div>
                            <div class="col-6">
                                <a href="javascript:void(0);" data-dismiss="modal" class="btn  cancel-btn">Cancel</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Add Sub Category Name Modal -->


<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
<script type="text/javascript">
window.onload=gen_sub('');
function gen_sub(main_cat) {
    // console.log(main_cat);
    var token='{{ csrf_token() }}';
    // console.log(token);
    $.ajax({
        type:'POST',
        url:'{{ url('gen_subcat') }}',
        data:{'cat':main_cat,'_token':token},
        success:function(res)
        {
            console.log(res);
            $('#subcategory').html(res.html);
            $('#att_type').html(res.type_html);
        }
    });
}
var color= new Array();
function add_color(clr) {
    // console.log(clr);
    var len=color.length;
    // console.log(len);
    if(!color.includes(clr))
    {
        var s_div="div_"+len+"";
        console.log(s_div);
    $('#add_color_modal').append('<div class="colorcircle mr-2 '+s_div+'" style="background-color:'+clr+';">'+
                                '<input type="hidden" id='+s_div+' value='+clr+'>'+
                                '<span class="fa fa-minus colorcircleicon" onclick="delete_clr('+len+');"></span>'+
                            '</div>');
    color.push(clr);
    }else
    {
        alert("Color already selected..!!");
    }
    // console.log(color);
}

function save_color() {
    if(color.length>0)
    {
        $('#after_color_save').text('');
    for (let i = 0; i < color.length; i++) {
        var clr_val = color[i];
        var s2_div="save_clr_div_"+i+"";
        $('#after_color_save').append('<div class="colorcircle mr-2 '+s2_div+'" style="background-color:'+clr_val+';">'+
                                '<input type="hidden" id='+s2_div+' value='+color[i]+'>'+
                                '<span class="fa fa-minus colorcircleicon" onclick="delete_clr1('+i+');"></span>'+
                            '</div>');
        
    }
    document.getElementById('color').value=JSON.stringify(color);
    $('#sub_btn').attr('data-dismiss','modal');
    }else{
        alert('No Color Added..!!');
    }
}
function delete_clr(id) {
    console.log(id);
    var del_clr=document.getElementById('div_'+id).value;
    $('.div_'+id).remove();
    const index = color.indexOf(del_clr);
    if (index > -1) {
        color.splice(index, 1);
        }
    console.log(color);
}
function delete_clr1(id) {
    console.log(id);
    var del_clr=document.getElementById('save_clr_div_'+id).value;
    $('.save_clr_div_'+id).remove();
    const index = color.indexOf(del_clr);
    if (index > -1) {
        color.splice(index, 1);
        }
    document.getElementById('color').value=JSON.stringify(color);
    console.log(color);
}
function delete_size(id) {
    console.log(id);
    var del_clr=document.getElementById('div_sz_'+id).value;
    $('.div_sz_'+id).remove();
    const index = size.indexOf(del_clr);
    if (index > -1) {
        size.splice(index, 1);
        }
    console.log(size);
}
function delete_size1(id) {
    console.log(id);
    var del_clr=document.getElementById('save_size_div_'+id).value;
    $('.save_size_div_'+id).remove();
    const index = size.indexOf(del_clr);
    if (index > -1) {
        size.splice(index, 1);
        }
    document.getElementById('size').value=JSON.stringify(size);
    console.log(size);
}
var size=new Array();
function add_size(sz) {
    console.log(sz);
    var len=size.length;
    var s_div="div_sz_"+len+"";
    if(sz.trim().length>0)
    {
    if(!size.includes(sz))
    {
    $('#add_size_modal').append('<div class="sizecircle '+s_div+'">'+
                                '<p class="sizecirclep">'+sz+'</p>'+
                                '<input type="hidden" id='+s_div+' value='+sz+'>'+
                                '<span class="fa fa-minus colorcircleicon" onclick="delete_size('+len+');"></span>'+
                            '</div>');
    size.push(sz);
    document.getElementById('prosize').value='';
    document.getElementById('prosize').focus();
    }else
    {
        alert("Size Already Selected..!!");
        document.getElementById('prosize').focus();

    }
    }else
    {
        alert("Size Must Entered..!!");
        document.getElementById('prosize').value='';
        document.getElementById('prosize').focus();
    }
}
function save_size() {
    if(size.length>0)
    {
        $('#after_save_size').text('');
    for (let i = 0; i < size.length; i++) {
        var clr_val = size[i];
        var s2_div="save_size_div_"+i+"";
        $('#after_save_size').append('<div class="sizecircle '+s2_div+'">'+
                                '<p class="sizecirclep">'+clr_val+'</p>'+
                                '<input type="hidden" id='+s2_div+' value='+size[i]+'>'+
                                '<span class="fa fa-minus colorcircleicon" onclick="delete_size1('+i+');"></span>'+
                            '</div>');
        
    }
    document.getElementById('size').value=JSON.stringify(size);
    $('#sub_btn_sz').attr('data-dismiss','modal');
    }else{
        alert('No Size Added..!!');
    }
}
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
                    $($.parseHTML('<img>')).attr('src', event.target.result).attr('name','firstproductimg[]').attr('class','img_'+dd).css({"width":"100px", "height":"100px","margin":"5px","border":"2px solid grey","box-shadow":"5px 5px 5px grey"}).appendTo(placeToInsertImagePreview);
                }

                reader.readAsDataURL(input.files[i]);
            }
        }

    };

    $('#firstproductimg').on('change', function() {
        imagesPreview(this, 'div.gallery');
    });
});
function save_att() {
    var attribute=new Array();
    var sub_attribute=new Array();
    var sel=document.getElementById('att_type');
    var att=sel.options[sel.selectedIndex].text;
    var sel1=document.getElementById('att_subtype');
    var sub_att=sel1.options[sel1.selectedIndex].text;
    if((att!='') && (sub_att!=''))
    {
        console.log(att,sub_att);
        var temp=false;
        var prev_att=document.getElementsByName('att[]');
        var prev_sub_att=document.getElementsByName('sub_att[]');
        console.log(prev_att.length);
        for (let i = 0; i < prev_att.length; i++) {
            if(prev_att[i].value==att)
            {
                if(prev_sub_att[i].value==sub_att)
                {
                    temp=true;
                }
            }
            
        }
        if(temp==false)
        {
        $('#myTable').append('<tr class="att_'+prev_att.length+'"">'+
                                '<td><input type="hidden" name="att[]" value="'+att+'">'+att+'</td>'+
                                '<td><input type="hidden" name="sub_att[]" value="'+sub_att+'">'+sub_att+'</td>'+
                                '<td>'+
                                // '<a href="javascript:;" class="edit" title="Edit" data-toggle="tooltip"><i class="fas fa-edit"></i></a>'+
                                '<a href="javascript:;" class="delete text-danger" title="Delete" data-toggle="tooltip"><i class="fas fa-trash" onclick="delete_att('+prev_att.length+');"></i></a>'+
                                '</td>'+
                            '</tr>');
        }
        else{
            alert('Already Added..!!');
        }
        // attribute[]=Array('Att'=>att,
        //                 'Sub_att'=>sub_att);
        //                 console.log(attribute);
            // console.log(attribute);
    }else
    {
        console.log(att,sub_att);
    }
}
function delete_att(id) {
    console.log(id);
    $('.att_'+id).remove();
}

function sub_att(type) {
    // console.log(main_cat);
    var token='{{ csrf_token() }}';
    var cat=document.getElementById('category').value;
    console.log(cat);
    $.ajax({
        type:'POST',
        url:'{{ url('sub_att') }}',
        data:{'type':type,'_token':token,'cat':cat},
        success:function(res)
        {
            console.log(res.type_html);
            $('#att_subtype').html(res.type_html);
            // $('#att_type').html(res.type_html);
        }
    });
}
 </script>
@stop