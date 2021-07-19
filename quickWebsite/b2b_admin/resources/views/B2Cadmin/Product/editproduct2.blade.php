@extends('layouts.default')
@section('content')

<div class="main_content_iner overly_inner ">
    <div class="container-fluid p-0 ">
        <!-- page title  -->
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
        <div class="row">
            <div class="col-12">
                <div class="white_card card_height_100 mb_30">
                    <div class="white_card_body">
                        <form action="" method="post" id="filter_inputs" style="display: block;" class="mt-3">
                            <div class="form-row">
                                <div class="form-group col-1">
                                    <div class="profile-img-wrap edit-img">
                                        <img class="inline-block" src="{{ asset('public/img/imgicon.ico') }}"
                                            alt="user">
                                        <div class="fileupload btn">
                                            <span class="btn-text">Upload Image</span>
                                            <input class="upload" class="form-control-file" name="multprodimg"
                                                type="file">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="login-title" style="margin-left: 12px;">
                                        <h5 class="text-left  mt-3" style="margin-bottom: 0; font-weight: bold;">Upload
                                            Image
                                        </h5>
                                        <p>JPEG or PNG Format Only</p>
                                        <span style="font-size: 12px;margin-top: 20px;">Upto 5 Images</span>
                                    </div>
                                </div>

                            </div>
                            <div class="form-row">
                                <div class="card filter-card">
                                    <div class="card-body pb-0">
                                        <div class="row filter-row">
                                            <div class="col-sm-6 col-md-3">
                                                <div class="form-group">
                                                    <label for="">Product Title</label>
                                                    <input class="form-control" type="text" placeholder="Product Name"
                                                        name="productname" value="" id="productname">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-3">
                                                <div class="form-group">
                                                    <label for="">Product Description</label>
                                                    <textarea class="form-control" type="textarea" placeholder="Product Description" name="productdesc" value="" id="productdesc"></textarea>
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
                                                    <label for="">GST %</label>
                                                    <input class="form-control" type="text" placeholder="GST %"
                                                        name="gst" value="" id="gst">
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
                                                    <select class="form-control" name="category">
                                                        <option value="" selected="selected">Select Category
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
                                                    <select class="form-control" name="category">
                                                        <option value="" selected="selected">Select Sub-Category
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
                                                            <div class="colorgap">
                                                                <span id="bfr_show_ul0" class="dot"
                                                                    style="background-color: rgb(243, 241, 241);">
                                                                    <i class="fa fa-minus circle-icon"></i></span>
                                                            </div>
                                                            <div class="colorgap">
                                                                <span id="bfr_show_ul0" class="dot"
                                                                    style="background-color: rgb(122, 92, 92);">
                                                                    <i class="fa fa-minus circle-icon"></i></span>
                                                            </div>
                                                            <div class="colorgap">
                                                                <span id="bfr_show_ul0" class="dot"
                                                                    style="background-color: rgb(232, 2, 2);">
                                                                    <i class="fa fa-minus circle-icon"></i></span>
                                                            </div>
                                                            <div class="colorgap">
                                                                <span id="bfr_show_ul0" class="dot"
                                                                    style="background-color: rgb(141, 98, 98);">
                                                                    <i class="fa fa-minus circle-icon"></i></span>
                                                            </div>
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
                                            <div class="cable-choose">
                                                <div class="cable-size">
                                                    <span>S</span>
                                                    <i class="fa fa-minus circle-icon size-icon"></i>
                                                </div>
                                                <div class="cable-size">
                                                    <span>M</span>
                                                    <i class="fa fa-minus circle-icon size-icon"></i>
                                                </div>
                                                <div class="cable-size">
                                                    <span>L</span>
                                                    <i class="fa fa-minus circle-icon size-icon"></i>
                                                </div>
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
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
</div>
</div>


<!-- Add Colour List Modal -->
<div class="modal custom-modal fade" id="add_colour" role="dialog">
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
                                    color of your Product:</label> <input type="color" id="favcolor" name="favcolor"
                                    value="#f3f1f1" style="width: 144px;height: 144px;">&nbsp;&nbsp;<button
                                    type="button" onclick="" class="btn btn-primary"
                                    style="margin-top: -31px;">Add</button><br>
                            </div>
                        </div>
                        <br>
                        <div class="form-row">
                            <div id="bfr_show" class="form-row">
                                <div class="col">
                                    <div id="bfr_show_ul">
                                        <div class="colorgap">
                                            <span id="bfr_show_ul0" class="dot"
                                                style="background-color: rgb(243, 241, 241);">
                                                <i class="fa fa-minus circle-icon"></i></span>
                                        </div>
                                        <div class="colorgap">
                                            <span id="bfr_show_ul0" class="dot"
                                                style="background-color: rgb(122, 92, 92);">
                                                <i class="fa fa-minus circle-icon"></i></span>
                                        </div>
                                        <div class="colorgap">
                                            <span id="bfr_show_ul0" class="dot"
                                                style="background-color: rgb(232, 2, 2);">
                                                <i class="fa fa-minus circle-icon"></i></span>
                                        </div>
                                        <div class="colorgap">
                                            <span id="bfr_show_ul0" class="dot"
                                                style="background-color: rgb(141, 98, 98);">
                                                <i class="fa fa-minus circle-icon"></i></span>
                                        </div>


                                    </div><br>
                                </div>
                            </div>
                        </div>
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
                                    id="prosize" name="prosize" value=""><button type="button" onclick=""
                                    class=" mt-2 btn btn-primary" style="margin-top: -31px;">Add Size</button><br>
                            </div>
                        </div>
                        <br>
                        <div class="form-row">
                            <div class="cable-choose">
                                <div class="cable-size">
                                    <span>S</span>
                                    <i class="fa fa-minus circle-icon size-icon"></i>
                                </div>
                                <div class="cable-size">
                                    <span>M</span>
                                    <i class="fa fa-minus circle-icon size-icon"></i>
                                </div>
                                <div class="cable-size">
                                    <span>L</span>
                                    <i class="fa fa-minus circle-icon size-icon"></i>
                                </div>
                            </div>
                        </div>
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
@stop