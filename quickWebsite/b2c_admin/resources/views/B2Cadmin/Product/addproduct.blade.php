@extends('layouts.default')
@section('content')

<div class="main_content_iner overly_inner ">
    <div class="container-fluid p-0 ">
        <!-- PAGE TITLE -->
        <div class="row px-5">
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
        <form style="margin-left: 13px;">
            <div class="row white_card v2newborder" style="padding: 40px;">
                <input type="hidden" name="tab_ctrl" id="tab_ctrl" value="1">
                <div class="col-4">

                    <div class="mb-4">
                        <div class="d-sm-flex flex-row flex-wrap text-center text-sm-left align-items-center">
                            <a href="#" class="productimgicon" style="width: 163px;height: 163px;">
                                <label for="firstproductimg"><i class="fas fa-image"></i>
                                    <input class="form-control" type="file" name="" id="firstproductimg"
                                        style="display:none; visibility:none;">
                                </label>

                            </a>
                            <div class="ml-sm-3 ml-md-0 ml-lg-3 mt-2 mt-sm-0 mt-md-2 mt-lg-0">
                                <h6 class="mb-0" style="
    font-weight: 900;
">Upload Image</h6>
                                <p class="text-muted mb-0">JPG or PNG format only.</p>
                                <br>

                                <h6 class="mb-0" style="
    font-weight: 900;
    color: #000;
    font-size: 14px;
">Upto 5 Images.</h6>
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
                                <div class="product_form">
                                    <div class="card-body p-0">
                                        <div class="row filter-row">
                                            <div class="col-6 ">
                                                <div class="form-row">
                                                    <label for="category"
                                                        class="col-sm-4 col-form-label form-new-col">Category</label>
                                                    <select name="category" id="" class="col-sm-8 form-control"
                                                        required="">
                                                        <option value="">Select Category</option>
                                                        <option value="AK">Men</option>
                                                        <option value="HI">Women</option>
                                                        <option value="HI">Child</option>
                                                        <option value="HI">Old</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-6 ">
                                                <div class="form-row">
                                                    <label for="subcategory"
                                                        class="col-sm-4 col-form-label form-new-col">Sub-Category</label>
                                                    <select name="subcategory" id="" class="col-sm-8 form-control"
                                                        required="">
                                                        <option value="">Select Sub-Category</option>
                                                        <option value="Exempt">All Clothing</option>
                                                        <option value="3%">Top Wear</option>
                                                        <option value="5%">Suits & Blazers</option>
                                                        <option value="12%">Accessories</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-row">
                                                    <label for="" class="col-sm-2 col-form-label form-new-col">Product
                                                        Title</label>
                                                    <input class="col-sm-10 form-control" type="text"
                                                        placeholder="Product Name" name="productname" id="productname">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-row">
                                                    <label for=""
                                                        class="col-sm-4 col-form-label form-new-col">Price</label>
                                                    <input class="col-sm-8 form-control" type="text" placeholder="Price"
                                                        name="price" value="" id="price">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-row">
                                                    <label for="gst_type"
                                                        class="col-sm-4 col-form-label form-new-col">GST Type</label>

                                                    <select name="gst_type" id="gst_type" class="col-sm-8 form-control"
                                                        required="">
                                                        <option value="">Select Option</option>
                                                        <option value="INCLUDED">INCLUDED</option>
                                                        <option value="EXCLUDED">EXCLUDED</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-6 ">
                                                <div class="form-row">
                                                    <label for="" class="col-sm-4 col-form-label form-new-col">GST
                                                        %</label>
                                                    <select name="gst" id="gst" class="col-sm-8 form-control"
                                                        required="">
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
                                            <div class="col-6 ">
                                                <div class="form-row">
                                                    <label for=""
                                                        class="col-sm-4 col-form-label form-new-col">Discount</label>
                                                    <select name="gst" id="gst" class="col-sm-8 form-control"
                                                        required="">
                                                        <option value="">Select Discount</option>
                                                        <option value="Exempt">Exempt</option>
                                                        <option value="3%">3%</option>
                                                        <option value="5%">5%</option>
                                                        <option value="12%">12%</option>
                                                        <option value="18%">18%</option>
                                                        <option value="28%">28%</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <!-- Stock Part Start -->
                                            <div class="col-12">
                                                <hr size="18" width="100%"
                                                    style="margin-top: 1rem;margin-bottom: 1rem;border: 0;border-top: 5px solid rgb(84 83 83 / 10%);">

                                                <div class="row mb-4">
                                                    <div class="col-6">
                                                        <label for=""
                                                            style="position: static;color: #797a7c;font-weight: 600;font-size: 16px;">Stock</label>
                                                    </div>
                                                    <div class="col-6">
                                                    <a  data-toggle="modal" data-backdrop="false"
                                                            data-target="#add_colour"
                                                            class="btn btn-primary add-button float-right"><i
                                                                class="fas fa-plus"></i>
                                                        </a>
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="attributestable mt-3">
                                                    <table class="table table-bordered">
                                                        <thead style="background-color: #e7f4ff;">
                                                            <tr>
                                                                <th>Colour</th>
                                                                <th>Size</th>
                                                                <th>Stock</th>
                                                                <th>Price</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <!-- <div class="colorcircle">
                                                                        <span
                                                                            class="fa fa-minus colorcircleicon"></span>
                                                                    </div> -->
                                                                    Green Colour
                                                                </td>
                                                                <td>S</td>
                                                                <td>148</td>
                                                                <td>800</td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Green Colour
                                                                </td>
                                                                <td>M</td>
                                                                <td>148</td>
                                                                <td>800</td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Red Colour
                                                                </td>
                                                                <td>M</td>
                                                                <td>148</td>
                                                                <td>800</td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Red Colour
                                                                </td>
                                                                <td>L</td>
                                                                <td>148</td>
                                                                <td>800</td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Blue Colour
                                                                </td>
                                                                <td>S</td>
                                                                <td>148</td>
                                                                <td>800</td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Blue Colour
                                                                </td>
                                                                <td>M</td>
                                                                <td>148</td>
                                                                <td>800</td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Blue Colour
                                                                </td>
                                                                <td>L</td>
                                                                <td>148</td>
                                                                <td>800</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <!-- Stock Part End -->

                                            <!-- Attributes Part Start -->
                                            <div class="col-12">
                                                <hr size="18" width="100%"
                                                    style="margin-top: 1rem;margin-bottom: 1rem;border: 0;border-top: 5px solid rgb(84 83 83 / 10%);">
                                                <div class="row mb-4">
                                                    <div class="col-6">
                                                        <label for=""
                                                            style="position: static;color: #797a7c;font-weight: 600;font-size: 16px;">Attributes</label>
                                                    </div>
                                                    <div class="col-6">
                                                        <a href="" data-toggle="modal" data-backdrop="false"
                                                            data-target="#add_attributes"
                                                            class="btn btn-primary add-button float-right"><i
                                                                class="fas fa-plus"></i>
                                                        </a>
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
                                                        <tbody>
                                                            <tr>
                                                                <td><b>Pattern</b></td>
                                                                <td>Check,Cotton-Check,Nylon</td>

                                                                <td>

                                                                    <!-- <a href="#" class="edit" title="Edit"
                                                                        data-toggle="tooltip"><i
                                                                            class="fas fa-edit"></i></a> -->
                                                                    <a href="#" class="delete text-danger"
                                                                        title="Delete" data-toggle="tooltip"><i
                                                                            class="fas fa-trash"></i></a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><b>Occassion</b></td>
                                                                <td>Casual,Party-wear,Religious</td>

                                                                <td>

                                                                    <!-- <a href="#" class="edit" title="Edit"
                                                                        data-toggle="tooltip"><i
                                                                            class="fas fa-edit"></i></a> -->
                                                                    <a href="#" class="delete text-danger"
                                                                        title="Delete" data-toggle="tooltip"><i
                                                                            class="fas fa-trash"></i></a>
                                                                </td>
                                                            </tr>

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
                                                        name="productdesc" value="" cols="100" id="productdesc"
                                                        style="width: 100%;"></textarea>
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
                            <div class="col-md-12"><label for="favcolor"
                                    style="position: static;color: #797a7c;font-weight: 600;font-size: 16px;">Name</label>
                                <input type="text" class="d-inline form-control" id="prosize"
                                    placeholder="Name Attribute Sub-Type" name="prosize">

                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12"><label for="favcolor"
                                    style="position: static;color: #797a7c;font-weight: 600;font-size: 16px;">Type</label>
                                <select name="att_type" id="att_type" class="form-control" required="">
                                    <option value="">Pattern</option>
                                    <option value="Exempt">Men</option>
                                    <option value="3%">Women</option>
                                    <option value="5%">Kids</option>
                                    <br>
                                    <br>

                                    <option value="5%"><a href="#" data-toggle="modal" data-backdrop="false"
                                            data-target="#add_olour">Create</a></option>


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
                <h5 class="modal-title font-weight-bold">Add Colour</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#">
                    <div class="form-row">
                        <div class="form-group">
                            <div class="col-md-12">
                                <h6 class="col-form-label">Select Default Colours</h6>
                                <select name="defcol" id="defcol" class="form-control" required="">
                                    <option value="">Select Colours</option>
                                    <option value="c1">Red</option>
                                    <option value="c2">Blue</option>
                                    <option value="c3">Green</option>
                                    <option value="c4">Yellow</option>
                                    <option value="c5">Violet</option>
                                </select>
                            </div>
                        </div>
                    </div>
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


                        <!-- <div class="form-group">
                            <div class="col-md-12"><label for="favcolor"
                                    style="position: static;color: #797a7c;font-weight: 600;font-size: 16px;">Add
                                    Size:</label> <input type="text" class="d-inline form-control" id="prosize"
                                    name="prosize">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12"><label for="favcolor"
                                    style="position: static;color: #797a7c;font-weight: 600;font-size: 16px;">Add
                                    Quantity:</label> <input type="text" class="d-inline form-control" id="prosize"
                                    name="prosize">
                            </div>
                        </div> -->
                    </div>
                    <div class="row d-inline">
                        <div class="col-2 d-inline">
                            <div class="colorcircle mr-2">
                                <span class="fa fa-minus colorcircleicon"></span>
                            </div>
                            <div class="colorcircle">
                                <span class="fa fa-minus colorcircleicon"></span>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="form-row mt-4">
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
                    <div class="form-row">
                        <!-- <div class="cable-choose" id="add_size_ul">

                        </div> -->
                        <div class="form-group">
                            <div class="col-md-12">
                                <h6 class="col-form-label">Select Default Sizes</h6>
                                <select name="defsize" id="defsize" class="form-control" required="">
                                    <option value="">Select Size</option>
                                    <option value="21">21</option>
                                    <option value="22">22</option>
                                    <option value="23">23</option>
                                    <option value="24">24</option>
                                    <option value="25">25</option>
                                </select>
                            </div>
                        </div>
                    </div>
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

                    <div class="form-row mb-3">
                        <div class="row d-inline">
                            <div class="col-2 d-inline">
                                <div class="sizecircle">
                                    <p class="sizecirclep">S</p>

                                </div>
                                <div class="sizecircle">
                                    <p class="sizecirclep">M</p>

                                </div>
                                <div class="sizecircle">
                                    <p class="sizecirclep">L</p>

                                </div>
                                <div class="sizecircle">
                                    <p class="sizecirclep">XL</p>

                                </div>
                                <div class="sizecircle">
                                    <p class="sizecirclep">XXL</p>

                                </div>
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
                            <select name="category_name1" id="category_name1" class="form-control" required="">
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


<!-- Add Discount List Modal -->
<div class="modal custom-modal fade" id="add_discount" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title font-weight-bold">Add Discount</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#">
                    <div class="form-row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Discount Name <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="discountname" id="discountname">
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>From Date</label>
                                    <input type="date" name="from_dt" class="form-control" required="">
                                </div>
                                <div class="col-md-6">
                                    <label>To Date</label>
                                    <input type="date" name="to_dt" class="form-control" required="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-md-6 ">
                                    <div class="form-group">
                                        <label class="col-form-label">Discount Type</label>
                                        <select name="disctype" id="disctype" class="form-control" required="">
                                            <option value="">Select Option</option>
                                            <option value="percentage">Percentage</option>
                                            <option value="amount">Amount</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Discount</label>
                                        <input class="form-control" type="number" name="discountnum" id="discountnum">
                                    </div>
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
<!-- /Add Discount List Modal -->

<!-- Add Attributes List Modal -->
<div class="modal custom-modal fade" id="add_attributes" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title font-weight-bold">Add Attributes</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#">
                    <div class="form-row mb-3 attaddbox">
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-12 d-flex justify-content-center">
                                    <button class="btn_1" id="addatt"
                                        style="padding: 10px 10px; border-radius: 25px;border: 1px solid #036cf5;background: linear-gradient(to bottom right, #0076FE 0%, #172AB4 100%);"><i
                                            class="fas fa-plus" style="padding-right:10px;"></i><span>Add
                                            Attribute</span></button>
                                </div>
                                <div class="col-12 d-flex justify-content-center mt-3" id="atttext">
                                    <span class="text-danger">★ Note: Please add attributes here.</span>
                                </div>
                            </div>
                            <div class="attbox" style="display:none;">
                                <div class="row">
                                    <div class="col-md-6 text-center">
                                        <div class="form-group">
                                            <h6 class="col-form-label">Attribute Type</h6>
                                            <select name="disctype" id="disctype" class="form-control" required="">
                                                <option value="">Select Option</option>
                                                <option value="percentage">At1</option>
                                                <option value="amount">At2</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 text-center">
                                        <div class="form-group">
                                            <h6 class="col-form-label">Attribute Variant</h6>
                                            <select name="av2" id="av2" class="form-control" required="">
                                                <option value="">Select Option</option>
                                                <option value="percentage">Av1</option>
                                                <option value="amount">Av2</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row text-center mb-4">
                                    <div class="col-6">
                                        <button class="btn btn-primary attmodalsave">Save</button>
                                    </div>
                                    <div class="col-6">
                                        <a href="javascript:void(0);" class="btn btn-primary attmodalclose "
                                            id="attclose">Close</a>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>

                </form>

                <div class="customattbox">
                    <div class="row">
                        <div class="col-12 text-center">
                            <h2><u class="mt-2">Added Attributes</u></h2>
                        </div>
                    </div>
                    <div class="row mt-3 attrow">
                        <div class="col-12">
                            <div class="atthead d-flex align-items-basline">
                                <label class="d-flex align-items-center " value="ocassion"> Occasion </label>
                                <i class="fas fa-trash attlgiconlg text-danger"></i>
                            </div>
                            <div class="row ">
                                <div class="col-md-6 d-flex align-items-baseline">
                                    <label class="d-flex align-items-center attlabel">
                                        <input type="checkbox" class="attcheckbox" id="attcheckbox" name="attcheckbox[]"
                                            value="Casual">Casual
                                    </label>
                                    <i class="fas fa-trash attlgiconsm"></i>
                                </div>
                                <div class="col-md-6 d-flex align-items-baseline">
                                    <label class="d-flex align-items-center attlabel">
                                        <input type="checkbox" class="attcheckbox" id="attcheckbox" name="attcheckbox[]"
                                            value="Casual">Festive
                                    </label>
                                    <i class="fas fa-trash attlgiconsm " style="font-size: 14px;"></i>
                                </div>
                                <div class="col-md-6 d-flex align-items-baseline">
                                    <label class="d-flex align-items-center attlabel">
                                        <input type="checkbox" class="attcheckbox" id="attcheckbox" name="attcheckbox[]"
                                            value="Casual"> holi season
                                    </label>
                                    <i class="fas fa-trash attlgiconsm"></i>
                                </div>
                                <div class="col-md-6">
                                    <label class="d-flex align-items-center attlabel">
                                        <input type="checkbox" class="attcheckbox" id="attcheckbox" name="attcheckbox[]"
                                            value="Casual">Party
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label class="d-flex align-items-center attlabel">
                                        <input type="checkbox" class="attcheckbox" id="attcheckbox" name="attcheckbox[]"
                                            value="Casual">Wedding
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label class="d-flex align-items-center attlabel">
                                        <input type="checkbox" class="attcheckbox" id="attcheckbox" name="attcheckbox[]"
                                            value="Casual">Religious
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label class="d-flex align-items-center attlabel">
                                        <input type="checkbox" class="attcheckbox" id="attcheckbox" name="attcheckbox[]"
                                            value="Casual">Religious 2
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label class="d-flex align-items-center attlabel">
                                        <input type="checkbox" class="attcheckbox" id="attcheckbox" name="attcheckbox[]"
                                            value="Casual">Casual 1
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label class="d-flex align-items-center attlabel">
                                        <input type="checkbox" class="attcheckbox" id="attcheckbox" name="attcheckbox[]"
                                            value="Casual">Wedding
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label class="d-flex align-items-center attlabel">
                                        <input type="checkbox" class="attcheckbox" id="attcheckbox" name="attcheckbox[]"
                                            value="Casual">Party
                                    </label>
                                </div>
                            </div>

                        </div>
                        <div class="col-12">
                            <div class="atthead">
                                <label class="d-flex align-items-center" value=""> Festive Season </label>
                            </div>
                            <div class="row ">
                                <div class="col-md-6">
                                    <label class="d-flex align-items-center attlabel">
                                        <input type="checkbox" class="attcheckbox" id="attcheckbox" name="attcheckbox[]"
                                            value="Casual">Casual
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label class="d-flex align-items-center attlabel">
                                        <input type="checkbox" class="attcheckbox" id="attcheckbox" name="attcheckbox[]"
                                            value="Casual">Festive
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label class="d-flex align-items-center attlabel">
                                        <input type="checkbox" class="attcheckbox" id="attcheckbox" name="attcheckbox[]"
                                            value="Casual"> holi season
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label class="d-flex align-items-center attlabel">
                                        <input type="checkbox" class="attcheckbox" id="attcheckbox" name="attcheckbox[]"
                                            value="Casual">Party
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label class="d-flex align-items-center attlabel">
                                        <input type="checkbox" class="attcheckbox" id="attcheckbox" name="attcheckbox[]"
                                            value="Casual">Wedding
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label class="d-flex align-items-center attlabel">
                                        <input type="checkbox" class="attcheckbox" id="attcheckbox" name="attcheckbox[]"
                                            value="Casual">Religious
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label class="d-flex align-items-center attlabel">
                                        <input type="checkbox" class="attcheckbox" id="attcheckbox" name="attcheckbox[]"
                                            value="Casual">Religious 2
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label class="d-flex align-items-center attlabel">
                                        <input type="checkbox" class="attcheckbox" id="attcheckbox" name="attcheckbox[]"
                                            value="Casual">Casual 1
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label class="d-flex align-items-center attlabel">
                                        <input type="checkbox" class="attcheckbox" id="attcheckbox" name="attcheckbox[]"
                                            value="Casual">Wedding
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label class="d-flex align-items-center attlabel">
                                        <input type="checkbox" class="attcheckbox" id="attcheckbox" name="attcheckbox[]"
                                            value="Casual">Party
                                    </label>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- Roew 2 -->

                </div>
                <div class="submit-section mt-3">
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
            </div>
        </div>
    </div>
</div>
<!-- /Add Attributes List Modal -->




<!-- Add Attributes -->

<!-- Add Attributes Ends -->



<!-- <script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script> -->


@stop