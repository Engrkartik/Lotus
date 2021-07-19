@extends('layouts.default')
@section('content')

<div class="main_content_iner overly_inner ">
    <div class="container-fluid p-0 ">
        <!-- page title  -->
        <div class="row">
            <div class="col-12">
                <div class="page_title_box d-flex flex-wrap align-items-center justify-content-between">
                    <div class="page_title_left d-flex align-items-center">
                        <h3 class="f_s_25 f_w_700 dark_text mr_30">Add New Product</h3>
                        <ol class="breadcrumb page_bradcam mb-0">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                            <li class="breadcrumb-item active">Add New Product</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="white_card card_height_100 mb_30">
                    <div class="white_card_body">
                        <form action="{{ url('save_product') }}" method="POST" id="filter_inputs" style="display: block;" class="mt-3">
                            @csrf
                            <div class="form-row">
                                <span class="btn-text">Upload Image</span>
                                <input class="form-control upload" name="multprodimg[]" type="file" id="multprodimg" multiple="">
                            </div>
                            <div class="form-row">
                                <div class="card filter-card">
                                    <div class="card-body pb-0">
                                        <div class="row filter-row">
                                            <div class="col-sm-6 col-md-3">
                                                <div class="form-group">
                                                    <label for="">Product Title</label>
                                                    <input class="form-control" type="text" placeholder="Product Name"
                                                        name="productname" id="productname">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-3">
                                                <div class="form-group">
                                                    <label for="">Product Description</label>
                                                    <textarea class="form-control" placeholder="Product Description" name="productdesc" value="" id="productdesc"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-3">
                                                <div class="form-group">
                                                    <label for="">Price</label>
                                                    <input class="form-control" type="text" placeholder="Price"
                                                        name="price" value="" id="price">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-3">
                                                <div class="form-group">
                                                    <label for="gst_type">GST Type</label>
                                                    {{-- <input type="text" id="gst_type" class="form-control" placeholder="GST Type" value="{{ $data->gst_type }}"> --}}
                                                    <select name="gst_type" id="gst_type" class="custom-select" required>
                                                      <option value="">Select Option</option>
                                                        <option value="INCLUDED">INCLUDED</option>
                                                        <option value="EXCLUDED">EXCLUDED</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-3">
                                                <div class="form-group">
                                                    <label for="">GST %</label>
                                                    <select name="gst" id="gst" class="form-control" required>
                                                        <option value="">Select Option</option>
                                                        <option value="Exempt">Exempt</option>
                                                        <option value="3%">3%</option>
                                                        <option value="5%">5%</option>
                                                        <option value="12%">12%</option>
                                                        <option value="18%">18%</option>
                                                        <option value="28%">28%</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-3">
                                                <div class="form-group">
                                                    <label for="">Discount %</label>
                                                    <input class="form-control" type="text" placeholder="Discount %"
                                                        name="discount" value="" id="discount">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-3">
                                                <div class="form-group">
                                                    <label for="">Quantity</label>
                                                    <input class="form-control" type="text"
                                                        placeholder="Number of Product" name="quantity" value=""
                                                        id="quantity">
                                                </div>
                                            </div>
                                            <div class="col-12 mt-1">
                                                <div class="form-group">
                                                    <div class="page-header">
                                                        <div class="row">
                                                            <div class="col">
                                                                <h4 class="page-title">Category</h4>
                                                            </div>
                                                            <div class="col-auto text-right">
                                                                <a href="" data-toggle="modal" data-backdrop="false"
                                                                    data-target="#add_category"
                                                                    class="btn btn-primary add-button">
                                                                    <i class="fas fa-plus">
                                                                    </i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <select class="form-control" name="category" onchange="show_sub();" id="main_cat">
                                                        <option value="" selected="selected">Select Category
                                                        </option>
                                                        @foreach ($category as $item=>$value)
                                                            <option value="{{ $value->id }}">{{ $value->title }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-12 mt-1">
                                                <div class="form-group">
                                                    <div class="page-header">
                                                        <div class="row">
                                                            <div class="col">
                                                                <h4 class="page-title">Sub-Category</h4>
                                                            </div>
                                                            <div class="col-auto text-right">
                                                                <a href="" data-toggle="modal" data-backdrop="false"
                                                                    data-target="#add_subcategory"
                                                                    class="btn btn-primary add-button">
                                                                    <i class="fas fa-plus">
                                                                    </i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <select class="form-control" name="category" id="sub_cat">
                                                        <option value="" selected="selected" >Select Sub-Category
                                                        </option>
                                                        <option value="1">Clear</option>
                                                        <option value="0">Unclear</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-12 mt-1">
                                                <div class="form-group">
                                                    <div class="page-header">
                                                        <div class="row">
                                                            <div class="col">
                                                                <h4 class="page-title">Colours</h4>
                                                            </div>
                                                            <div class="col-auto text-right">
                                                                <a href="" data-toggle="modal" data-backdrop="false"
                                                                    data-target="#add_colour"
                                                                    class="btn btn-primary add-button"><i
                                                                        class="fas fa-plus"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="bfr_show" class="form-group">
                                                    <div class="col">
                                                        <div id="bfr_show_ul">
                                                           
                                                        </div><br>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12 mt-1">
                                                <div class="form-group">
                                                    <div class="row mt-3 p-1">
                                                        <div class="col">
                                                            <h4 class="page-title">Add Size</h4>
                                                        </div>
                                                        <div class="col-auto text-right">
                                                            <a href="" data-toggle="modal" data-backdrop="false"
                                                                data-target="#add_sizes"
                                                                class="btn btn-primary add-button">
                                                                <i class="fas fa-plus">
                                                                </i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="cable-choose" id="add_size_ul1">
                                                
                                            </div>
                                        </div>
                                        <div class="col-12" id="tableM" style="display: none;">
                                            <div class="form-group">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Color</th>
                                                            <th>Size</th>
                                                            <th>Quantity</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="myTable">
                                                    
                                                    </tbody>
                                                </table>
                                            </div>
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
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
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
                    <div class="form-row ">
                        <div class="form-group">
                            <div class="col-md-12"><label for="favcolor">Add
                                    color of your Product:</label>
                                    <input type="color" id="favcolor" name="favcolor" value="#0d0d0d" style="width: 114px;height:114px;box-radius:25%;">&nbsp;&nbsp;<button
                                    type="button" onclick="add_color(document.getElementById('favcolor').value);" class="btn btn-primary"
                                    style="margin-top: -31px;">Add</button><br>
                            </div>
                        </div>
                    </div>
                        <br>
                        <div class="form-row">
                            <div id="bfr_show" class="form-row">
                                <div class="col">
                                    <div id="bfr_show_ul_d">
                                       
                                    </div><br>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="submit-section">
                        <div class="row">
                            <div class="col-6">
                                <button class="btn btn-primary submit-btn" type="button" id="sub_btn" onclick="save_color();">Submit</button>
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
                                    id="prosize" name="prosize"><button type="button" onclick="add_size(document.getElementById('prosize').value);"
                                    class=" mt-2 btn btn-primary" style="margin-top: -31px;">Add Size</button><br>
                            </div>
                        </div>
                    </div>
                        <br>
                        <div class="form-row">
                            <div class="cable-choose" id="add_size_ul">

                            </div>
                        </div>
                    </div>
                    <div class="submit-section">
                        <div class="row">
                            <div class="col-6">
                                <button class="btn btn-primary submit-btn" type="button" id="sub_btn_sz" onclick="save_size()">Submit</button>
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
                            <input class="form-control" type="text" name="category_name" id="category_name"
                                data-bv-field="category_name">
                            <small class="help-block" data-bv-validator="remote" data-bv-for="category_name"
                                data-bv-result="NOT_VALIDATED" style="display: none;">This category name is already
                                exist</small><small class="help-block" data-bv-validator="notEmpty"
                                data-bv-for="category_name" data-bv-result="NOT_VALIDATED" style="display: none;">Please
                                enter category name</small>
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
    $(document).ready(function() {
        if (window.File && window.FileList && window.FileReader) 
            {
                $("#multprodimg").on("change", function(e) 
                {
                var files = e.target.files,
                filesLength = files.length;
                for (var i = 0; i < filesLength; i++) 
                {
                    var f = files[i]
                    var fileReader = new FileReader();
                    fileReader.onload = (function(e) {
                        var file = e.target;
                        $("<span class=\"pip\">" +
                        "<img style='width:100px;height:100px;' class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
                        "<span class=\"remove fa fa-times\"></span>" +"</span>").insertAfter("#multprodimg");
                        $(".remove").click(function(){
                        $(this).parent(".pip").remove();
                        });
                        
                    });
                    fileReader.readAsDataURL(f);
                }
                });
            } 
            else 
            {
                alert("Your browser doesn't support to File API")
            }
        });
        var my_color= new Array();
        function add_color(color) {
            
            if(!my_color.includes(color))
            {
            var len=my_color.length;
            $('#bfr_show_ul_d').append('<div class="colorgap div'+len+'">'+
                                    '<span id="bfr_show_ul0" class="dot"'+
                                        'style="background-color:'+color+';"><i class="fa fa-minus circle-icon" onclick="delete_clr('+len+');"></i></span>'+
                                        '<input type="hidden" name="bfr_show_ul0" value="'+color+'">'+
                                        '</div>');
            var clr=document.getElementsByName('bfr_show_ul0');
            // console.log(clr.length);          
            for (let i = 0; i < clr.length; i++) 
            {
                if(!my_color.includes(clr[i].value))
                {
                my_color.push(clr[i].value);                   
                }
            }
            }else
            {
                alert('Color already added..!!');
            }
           
            // console.log(my_color);
        }

        function save_color() {
            // console.log(my_color);
            $('#bfr_show_ul').text('');
            var clr=my_color;
            for (let i = 0; i < clr.length; i++) 
            {   
                $('#bfr_show_ul').append('<div class="colorgap div'+i+'">'+
                                    '<span id="bfr_show_ul0" class="dot"'+
                                        'style="background-color:'+clr[i]+';"><i class="fa fa-minus circle-icon" onclick="delete_clr('+i+');"></i></span>'+
                                        '</div>');   
            }
            $('#sub_btn').attr('data-dismiss','modal');
            if(my_color.length>0 && my_size.length>0)
            {
            document.getElementById('tableM').style.display='block';
            $('#myTable').text('');
            for (let i = 0; i < my_color.length; i++) 
            {
                for (let j = 0; j < my_size.length; j++) 
                {
                    $('#myTable').append('<tr>'+
                                        '<td><span class="dot"'+
                                        'style="background-color:'+my_color[i]+';"></span>'+
                                        '<input type="hidden" value="'+my_color[i]+'" name="color[]">'+
                                        '</td>'+
                                        '<td>'+my_size[j]+
                                        '<input type="hidden" value="'+my_size[j]+'" name="size[]">'+
                                        '</td>'+
                                        '<td><input type="number" class="form-control" value="" name="qty[]" required=""></td>'+
                                        '</tr>');
                    
                }
                
            }
            
            }else
            {
            document.getElementById('tableM').style.display='none';
            }
        }

        function delete_clr(id) {
            console.log(id);
            my_color=[];
            $('.div'+id).remove();
            var clr=document.getElementsByName('bfr_show_ul0');
            // console.log(clr.length);            
            for (let i = 0; i < clr.length; i++) 
            {
                if(!my_color.includes(clr[i].value))
                {
                my_color.push(clr[i].value);                   
                }
            }
            if(my_color.length>0 && my_size.length>0)
            {
            document.getElementById('tableM').style.display='block';
            $('#myTable').text('');
            for (let i = 0; i < my_color.length; i++) 
            {
                for (let j = 0; j < my_size.length; j++) 
                {
                    $('#myTable').append('<tr>'+
                                        '<td><span class="dot"'+
                                        'style="background-color:'+my_color[i]+';"></span>'+
                                        '<input type="hidden" value="'+my_color[i]+'" name="color[]">'+
                                        '</td>'+
                                        '<td>'+my_size[j]+
                                        '<input type="hidden" value="'+my_size[j]+'" name="size[]">'+
                                        '</td>'+
                                        '<td><input type="number" class="form-control" value="" name="qty[]" required=""></td>'+
                                        '</tr>');
                    
                }
                
            }
            
            }else
            {
            document.getElementById('tableM').style.display='none';
            }
        }

        var my_size= new Array();
        function add_size(size) {
            console.log(my_size);
            if(!my_size.includes(size))
            {
            var len=my_size.length;
            console.log(len);
            if(size=='')
            {
            document.getElementById('prosize').focus();
            }else
            {
            $('#add_size_ul').append('<div class="cable-size div_sz'+len+'">'+
                                    '<span>'+size+'</span>'+
                                    '<input type="hidden" name="add_size_ul" value="'+size+'">'+
                                    '<i class="fa fa-minus circle-icon size-icon" onclick="delete_size('+len+')"></i>'+
                                    '</div>');
            
                var sz=document.getElementsByName('add_size_ul');
            // console.log(clr.length);            
            for (let i = 0; i < sz.length; i++) 
            {
                if(!my_size.includes(sz[i].value))
                {
                my_size.push(sz[i].value);                   
                }
            }
            document.getElementById('prosize').value='';
            }
            }else
            {
                alert('Size already added..!!');
            }
            
            // console.log(my_size);
        }
        
        function delete_size(id) {
            console.log(id);
            my_size=[];
            $('.div_sz'+id).remove();
            var sz=document.getElementsByName('add_size_ul');
            // console.log(sz.length);            
            for (let i = 0; i < sz.length; i++) 
            {
                if(!my_size.includes(sz[i].value))
                {
                my_size.push(sz[i].value);                   
                }
            }
            if(my_color.length>0 && my_size.length>0)
            {
            document.getElementById('tableM').style.display='block';
            $('#myTable').text('');
            for (let i = 0; i < my_color.length; i++) 
            {
                for (let j = 0; j < my_size.length; j++) 
                {
                    $('#myTable').append('<tr>'+
                                        '<td><span class="dot"'+
                                        'style="background-color:'+my_color[i]+';"></span>'+
                                        '<input type="hidden" value="'+my_color[i]+'" name="color[]">'+
                                        '</td>'+
                                        '<td>'+my_size[j]+
                                        '<input type="hidden" value="'+my_size[j]+'" name="size[]">'+
                                        '</td>'+
                                        '<td><input type="number" class="form-control" value="" name="qty[]" required=""></td>'+
                                        '</tr>');
                    
                }
                
            }
            
            }else
            {
            document.getElementById('tableM').style.display='none';
            }
        }
        function save_size() {
            // console.log(my_color);
            $('#add_size_ul1').text('');
            var sz=my_size;
            for (let i = 0; i < sz.length; i++) 
            {   
                $('#add_size_ul1').append('<div class="cable-size div_sz'+i+'">'+
                                    '<span>'+sz[i]+'</span>'+
                                    '<input type="hidden" name="add_size_ul" value="'+sz[i]+'">'+
                                    '<i class="fa fa-minus circle-icon size-icon" onclick="delete_size('+i+')"></i>'+
                                    '</div>');   
            }
            $('#sub_btn_sz').attr('data-dismiss','modal');
            if(my_color.length>0 && my_size.length>0)
            {
            document.getElementById('tableM').style.display='block';
            $('#myTable').text('');
            for (let i = 0; i < my_color.length; i++) 
            {
                for (let j = 0; j < my_size.length; j++) 
                {
                    $('#myTable').append('<tr>'+
                                        '<td><span class="dot"'+
                                        'style="background-color:'+my_color[i]+';"></span>'+
                                        '<input type="hidden" value="'+my_color[i]+'" name="color[]">'+
                                        '</td>'+
                                        '<td>'+my_size[j]+
                                        '<input type="hidden" value="'+my_size[j]+'" name="size[]">'+
                                        '</td>'+
                                        '<td><input type="number" class="form-control" value="" name="qty[]" required=""></td>'+
                                        '</tr>');
                    
                }
                
            }
            
            }else
            {
            document.getElementById('tableM').style.display='none';
            }
        }
    function show_sub() {
    var cat=document.getElementById('main_cat').value;
    var token='{{ csrf_token() }}';
    if(cat!='')
    {
    $.ajax({
      type:'POST',
      url:'{{ url('get_subcat') }}',
      data:{'_token':token,'cat':cat},
      async:true,
      success:function(res)
      {
        $('#sub_cat').html(res.html);
      }
    });
    }
  }
  
        </script>
@stop