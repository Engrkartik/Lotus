@extends('layouts.default')
@section('content')

<div class="main_content_iner overly_inner ">
    <div class="container-fluid p-0 ">
        <!-- PAGE TITLE -->
        <div class="row">
            <div class="col-12">
                <div class="page_title_box d-flex flex-wrap align-items-center justify-content-between">
                    <div class="page_title_left d-flex align-items-center">
                        <h3 class="f_s_25 f_w_700 dark_text mr_30">Edit Product</h3>
                        <ol class="breadcrumb page_bradcam mb-0">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                            <li class="breadcrumb-item active">Edit Product</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page Title Ends -->
        <!-- Form Started -->
        <form>
            <div class="row white_card" style="padding: 21px;">
                <input type="hidden" name="tab_ctrl" id="tab_ctrl" value="1">
                <div class="col-3">

                    <div class="mb-4">
                        <div class="d-sm-flex flex-row flex-wrap text-center text-sm-left align-items-center">
                            <a href="#" class="productimgicon" style="width: 150px;height: 150px;">
                                <label for="firstproductimg"><i class="fas fa-image"></i>
                                    <input class="form-control" type="file" name="" id="firstproductimg"
                                        style="display:none; visibility:none;">
                                </label>

                            </a>
                            <div class="ml-sm-3 ml-md-0 ml-lg-3 mt-2 mt-sm-0 mt-md-2 mt-lg-0">
                                <h6 class="mb-0">Upload Image</h6>
                                <p class="text-muted mb-0">JPG or PNG format only.</p>
                                <br>
                                <br>
                                <p class="text-muted mb-0">Upto 5 Images.</p>
                            </div>
                        </div>
                    </div>
                    <div class="widget settings-menu">
                        <ul>
                            <div class="row">
                                <div class="col-xl-3 col-md-4">
                                    <li>
                                        <a href="#">
                                            <label for="firstproductimg"><i class="fas fa-plus productimgicon"></i>
                                                <input class="form-control" type="file" name="" id="firstproductimg"
                                                    style="display:none; visibility:none;">
                                            </label>
                                        </a>
                                    </li>
                                    <li>
                                        <label for="secondproductimg"><i class="fas fa-plus productimgicon"></i>
                                            <input class="form-control" type="file" name="" id="secondproductimg"
                                                style="display:none; visibility:none;">
                                        </label>
                                    </li>
                                </div>
                                <div class="col-xl-3 col-md-4">
                                    <li>
                                        <label for="thirdproductimg"><i class="fas fa-plus productimgicon"></i>
                                            <input class="form-control" type="file" name="" id="thirdproductimg"
                                                style="display:none; visibility:none;">
                                        </label>
                                    </li>
                                    <li>
                                        <label for="fourthproductimg"><i class="fas fa-plus productimgicon"></i>
                                            <input class="form-control" type="file" name="" id="fourthproductimg"
                                                style="display:none; visibility:none;">
                                        </label>
                                    </li>
                                </div>

                            </div>
                        </ul>
                    </div>
                </div>
                <div class="col-8">
                    <div class="white_card card_height_100 mb_30">
                        <div class="white_card_body">
                            <input type="hidden" name="_token" value="6Z0Q7SMgsxNNBoppNqCCGuoGNkrN8sT2dLbcSwSt">
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
                                                    <select name="category" id="category" class="form-control" required="">
                                                        <option value="">Select Category</option>
                                                        <option value="Exempt">Men</option>
                                                        <option value="3%">Women</option>
                                                        <option value="5%">Kids</option>
                                                    </select>
                                                </div>
                                                <a href="" data-toggle="modal" data-backdrop="false" data-target="#add_category" class="btn btn-primary add-button" style="
    border-radius: 39px;
    position: absolute;
    top: -37px;
    right: -4%;
    font-size: 12px;
">
                                                                    <i class="fas fa-plus">
                                                                    </i>
                                                                </a>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="">Sub-Category</label>
                                                    <select name="subcategory" id="subcategory" class="form-control" required="">
                                                        <option value="">Select Sub-Category</option>
                                                        <option value="Exempt">All Clothing</option>
                                                        <option value="3%">Top Wear</option>
                                                        <option value="5%">Suits & Blazers</option>
                                                        <option value="12%">Accessories</option>
                                                    </select>
                                                </div>
                                                <a href="" data-toggle="modal" data-backdrop="false" data-target="#add_subcategory" class="btn btn-primary add-button" style="
    border-radius: 39px;
    position: absolute;
    top: -37px;
    right: -4%;
    font-size: 12px;
">
                                                                    <i class="fas fa-plus">
                                                                    </i>
                                                                </a>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="">Product Title</label>
                                                    <input class="form-control" type="text" placeholder="Product Name"
                                                        name="productname" id="productname">
                                                </div>
                                            </div>
                                            <div class="col-6">
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
                                            <div class="col-6">
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
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="">Discount %</label>
                                                    <input class="form-control" type="text" placeholder="Discount %"
                                                        name="discount" value="" id="discount">
                                                </div>
                                            </div>
                                            <!-- STOCK PART -->
                                            <div class="col-12">
                                                <hr size="18" width="100%"
                                                    style="margin-top: 1rem;margin-bottom: 1rem;border: 0;border-top: 5px solid rgb(84 83 83 / 10%);">
                                                <label for=""
                                                    style="position: static;color: #797a7c;font-weight: 600;font-size: 16px;">Stock</label>

                                                <p>Select Colour,Size and Quantity here of the stock you wish to upload
                                                    for sale.</p>
                                                <div class="col-2">
                                                    <div class="card mx-auto mt-3"
                                                        style=" padding: 8px;border-radius: 25px;">
                                                        <div class="stockinner" style="background-color: #ffffff !important;border: 1px solid #F5F6FF !important;border-radius: 62px !important;
                                                              box-shadow: 1px 3px 6px #e6e6e6;">
                                                            <div class="card-body text-center "
                                                                style="margin: 0px;padding: 9px;">
                                                                <div class="cvp">
                                                                    <img src="{{ asset('public/img/paint-tray.png') }}"
                                                                        style="height: 50px;">
                                                                    <h5 class="card-title font-weight-bold mt-2">Size
                                                                    </h5>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <a href="#" data-toggle="modal" data-backdrop="false" data-target="#add_colour" class="btn cart px-auto mt-2"
                                                            style="border: 1px solid;border-radius: 27px;font-size: 12px;">ADD</a>
                                                    </div>
                                                </div>
                                                <hr size="18" width="100%"
                                                    style="margin-top: 1rem;margin-bottom: 1rem;border: 0;border-top: 5px solid rgb(84 83 83 / 10%);">
                                            </div>
                                            <!-- STOCK PART END -->

                                            <!-- Attributes Part Start -->
                                            <div class="col-12">
                                                <label
                                                    style="position: static;color: #797a7c;font-weight: 600;font-size: 16px;">Attributes</label>


                                                <div style="display: flex;margin-top: 12px;">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="">Type</label>
                                                            <select name="att_type" id="att_type" class="form-control"
                                                                required="">
                                                                <option value="">Select Type</option>
                                                                <option value="Exempt">Men</option>
                                                                <option value="3%">Women</option>
                                                                <option value="5%">Kids</option>
<br>
<br>

                                                                <option value="5%"><a href="#" data-toggle="modal" data-backdrop="false" data-target="#add_colour" >Create</a></option>  


                                                            </select>
                                                        </div>
                                                        <a href="" data-toggle="modal" data-backdrop="false" data-target="#add_category" class="btn btn-primary add-button" style="
    border-radius: 39px;
    position: absolute;
    top: -37px;
    right: -4%;
    font-size: 12px;
">
                                                                    <i class="fas fa-plus">
                                                                    </i>
                                                                </a>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="">Sub-Type</label>
                                                            <select name="att_subtype" id="att_subtype" class="form-control"
                                                                required="">
                                                                <option value="">Select Sub-Type</option>
                                                                <option value="Exempt">Men</option>
                                                                <option value="3%">Women</option>
                                                                <option value="5%">Kids</option>
                                                                <option value="5%"><a href="#" data-toggle="modal" data-backdrop="false" data-target="#add_colour" >Create</a></option>  

                                                            </select>
                                                        </div>
                                                        <a href="" data-toggle="modal" data-backdrop="false" data-target="#add_subtype" class="btn btn-primary add-button" style="
    border-radius: 39px;
    position: absolute;
    top: -37px;
    right: -4%;
    font-size: 12px;
">
                                                                    <i class="fas fa-plus">
                                                                    </i>
                                                                </a>
                                                    </div>
                                                    <hr size="18" width="100%"
                                                        style="margin-top: 1rem;margin-bottom: 1rem;border: 0;border-top: 5px solid rgb(84 83 83 / 10%);">
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
                                                        <tbody>
                                                            <tr>
                                                                <td>Pattern</td>
                                                                <td>Check</td>

                                                                <td>

                                                                <a href="#" class="edit" title="Edit"
                                                                        data-toggle="tooltip"><i
                                                                            class="fas fa-edit"></i></a>
                                                                    <a href="#" class="delete text-danger" title="Delete"
                                                                        data-toggle="tooltip"><i
                                                                            class="fas fa-trash"></i></a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Occassion</td>
                                                                <td>Casual</td>

                                                                <td>

                                                                    <a href="#" class="edit" title="Edit"
                                                                        data-toggle="tooltip"><i
                                                                            class="fas fa-edit"></i></a>
                                                                    <a href="#" class="delete text-danger" title="Delete"
                                                                        data-toggle="tooltip"><i
                                                                            class="fas fa-trash"></i></a>
                                                                </td>
                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <!-- Attributes Part End -->
                                            <div class="col-12 mt-3">
                                            <hr size="18" width="100%" style="margin-top: 1rem;margin-bottom: 1rem;border: 0;border-top: 5px solid rgb(84 83 83 / 10%);">
                                                <div class="form-group">
                                                    <label class="mb-3" for=""
                                                        style="position: static;color: #797a7c;font-weight: 600;font-size: 16px;">Product
                                                        Description</label>
                                                    <textarea class="form-control" placeholder="Product Description"
                                                        name="productdesc" value="" cols="50"
                                                        id="productdesc"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group text-right">
                                                <button class=" addnew-hover color-9 " name="form_submit" value="submit"
                                                    type="submit">Edit Product</button>
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


<!-- Add Attribute Type Modal -->
<div class="modal custom-modal fade" id="add_subtype" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title font-weight-bold">Create Attribute Sub-Type</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#">
                    <div class="form-row ">
                        <div class="form-group">
                            <div class="col-md-12"><label for="favcolor" style="position: static;color: #797a7c;font-weight: 600;font-size: 16px;">Name</label> <input type="text" class="d-inline form-control"
                                    id="prosize" placeholder="Name Attribute Sub-Type" name="prosize">
                                    
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12"><label for="favcolor" style="position: static;color: #797a7c;font-weight: 600;font-size: 16px;">Type</label>   <select name="att_type" id="att_type" class="form-control"
                                                                required="">
                                                                <option value="">Pattern</option>
                                                                <option value="Exempt">Men</option>
                                                                <option value="3%">Women</option>
                                                                <option value="5%">Kids</option>
<br>
<br>

                                                                <option value="5%"><a href="#" data-toggle="modal" data-backdrop="false" data-target="#add_colour" >Create</a></option>  


                                                            </select>
                                    
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
                        <button class="btn btn-primary submit-btn" type="button" id="sub_btn_sz"
                            onclick="save_size()">Submit</button>
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
<!-- /Add Attribute Type Modal -->


<!-- Add Colour List Modal -->
<div class="modal fade" id="add_colour" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold">Stock Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#">
                    <div class="form-row ">
                        <div class="form-group">
                            <div class="col-md-12"><label for="favcolor" style="position: static;color: #797a7c;font-weight: 600;font-size: 16px;">Add
                                    Colour:</label>
                                <input type="color" id="favcolor" name="favcolor" value="#0d0d0d"
                                    style="width: 114px;height:114px;box-radius:25%;">&nbsp;&nbsp;
                                    <!-- <button type="button"
                                    onclick="add_color(document.getElementById('favcolor').value);"
                                    class="btn btn-primary" style="margin-top: -31px;">Add</button><br> -->
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-md-12"><label for="favcolor" style="position: static;color: #797a7c;font-weight: 600;font-size: 16px;">Add
                                    Size:</label> <input type="text" class="d-inline form-control"
                                    id="prosize" name="prosize">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12"><label for="favcolor" style="position: static;color: #797a7c;font-weight: 600;font-size: 16px;">Add
                                    Quantity:</label> <input type="text" class="d-inline form-control"
                                    id="prosize" name="prosize">
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
            <div class="submit-section" style="padding: 12px;margin-top: -45px;">
                <div class="row">
                    <div class="col-6">
                        <button class="btn btn-primary submit-btn" type="button" id="sub_btn"
                            onclick="save_color();">Submit</button>
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
                    <div class="form-row">
                        <div class="cable-choose" id="add_size_ul">

                        </div>
                    </div>
            </div>
            <div class="submit-section">
                <div class="row">
                    <div class="col-6">
                        <button class="btn btn-primary submit-btn" type="button" id="sub_btn_sz"
                            onclick="save_size()">Submit</button>
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

@stop