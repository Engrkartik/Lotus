@extends('layouts.defaultmain')
@section('content')
<!-- content -->
<div class="content ">

    <!-- <div class="row">
        <div class="col-8">
            <div class="mb-4 contentheading">
                <h3 class="f_s_25 f_w_700 dark_text mr_30">Add Product</h3>
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="#">
                                <i class="bi bi-globe2 small me-2"></i> Dashboard
                            </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Products</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="col-4">
            <button class="btn btn-primary btn-icon float-end">
                <i class="bi bi-plus-circle"></i> Add Product
            </button>
        </div>
    </div> -->
    <div class="row">
        <div class="col-8">
            <div class="mb-2 mt-2 contentheading">
                <h3 class="f_s_25 f_w_700 dark_text mr_30">Add Product</h3>
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="#">
                                <i class="bi bi-globe2 small me-2"></i> Dashboard
                            </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Products</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="col-4">
            <button class="btn btn-primary btn-icon float-end mt-4">
                <i class="bi bi-plus-circle"></i> Add Product
            </button>
        </div>
    </div>

    <div class="contentborder">
        <form class="row g-3" autocomplete="off">
            <div class="row">
                <div class="col-4">
                    <div class="mb-4">
                        <div class="d-sm-flex flex-row flex-wrap text-center text-sm-left align-items-center">
                            <a href="#" class="productimgicon mainprodimg" style="width: 143px;height: 143px;">
                                <label for="firstproductimg"><i class="bi bi-plus"></i>
                                    <input class="form-control" type="file" name="" id="firstproductimg"
                                        style="display:none; visibility:none;">
                                </label>

                            </a>
                            <div class="ml-sm-3 ml-md-0 ml-lg-3 mt-2 mt-sm-0 mt-md-2 mt-lg-0" style="
    padding-left: 12px;
">
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
                        <ul style="
    padding-left: 0px;
">
                            <div class="row">
                                <div class="col-xl-3 col-md-4">
                                    <li class="mb-2">
                                        <a href="#">
                                            <label for="firstproductimg"><i class="bi bi-plus productimgicon"></i>
                                                <input class="form-control" type="file" name="" id="firstproductimg"
                                                    style="display:none; visibility:none;">
                                            </label>
                                        </a>
                                    </li>
                                    <li>
                                        <label for="secondproductimg"><i class="bi bi-plus productimgicon"></i>
                                            <input class="form-control" type="file" name="" id="secondproductimg"
                                                style="display:none; visibility:none;">
                                        </label>
                                    </li>
                                </div>
                                <div class="col-xl-3 col-md-4">
                                    <li class="mb-2">
                                        <label for="thirdproductimg"><i class="bi bi-plus productimgicon"></i>
                                            <input class="form-control" type="file" name="" id="thirdproductimg"
                                                style="display:none; visibility:none;">
                                        </label>
                                    </li>
                                    <li>
                                        <label for="fourthproductimg"><i class="bi bi-plus productimgicon"></i>
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
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="form-floating">
                                <select class="form-select" id="formcategory"
                                    aria-label="Floating label select example">
                                    <option value="">Select Category</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                                <label for="formcategory">Category</label>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-floating">
                                <select autocomplete="off" class="form-select" id="formsubcategory"
                                    aria-label="Floating label select example">
                                    <option value="">Select Sub-Category</option>
                                    <option value="1">af</option>
                                    <option value="2">sdga</option>
                                    <option value="3">aga</option>
                                </select>
                                <label for="formsubcategory">Sub-Category</label>
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="floatingPassword" placeholder="Password">
                                <label for="floatingPassword">Product Title</label>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-floating">
                                <input type="password" class="form-control" id="floatingPrice" placeholder="Password">
                                <label for="floatingPrice">Price</label>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-floating">
                                <select class="form-select" id="formdiscount"
                                    aria-label="Floating label select example">
                                    <option value="">Select Discount</option>
                                    <option value="Exempt">Exempt</option>
                                    <option value="3%">3%</option>
                                    <option value="5%">5%</option>
                                    <option value="12%">12%</option>
                                    <option value="18%">18%</option>
                                    <option value="28%">28%</option>
                                    <option value="3%">3%</option>
                                    <option value="5%">5%</option>
                                    <option value="12%">12%</option>
                                    <option value="18%">18%</option>
                                    <option value="28%">28%</option>
                                    <option value="3%">3%</option>
                                    <option value="5%">5%</option>
                                    <option value="12%">12%</option>
                                    <option value="18%">18%</option>
                                    <option value="28%">28%</option>
                                </select>
                                <label for="formdiscount">Discount</label>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="form-floating">
                                <select class="form-select" id="gst" aria-label="Floating label select example">
                                    <option value="">Select GST %</option>
                                    <option value="Exempt">Exempt</option>
                                    <option value="3%">3%</option>
                                    <option value="5%">5%</option>
                                    <option value="12%">12%</option>
                                    <option value="18%">18%</option>
                                    <option value="28%">28%</option>
                                </select>
                                <label for="gst">GST %</label>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="form-floating">
                                <select class="form-select" id="gsttype" aria-label="Floating label select example">
                                    <option selected>HSN</option>
                                    <option value="002">Clothes</option>
                                    <option value="003">Watches</option>
                                </select>
                                <label for="gsttype">HSN Code</label>
                            </div>
                        </div>

                        <div class="col-md-12 mb-3">
                            <div class="form-floating">
                                <select class="form-select" id="country" aria-label="Floating label select example">
                                    <option value="">Select Country</option>
                                    <option value="india">India</option>
                                    <option value="bangladesh">Bangladesh</option>
                                    <option value="russia">Russia</option>

                                    
                                    <!-- <option value="Exempt">Exempt</option>
                                    <option value="3%">3%</option>
                                    <option value="5%">5%</option>
                                    <option value="12%">12%</option>
                                    <option value="18%">18%</option>
                                    <option value="28%">28%</option> -->
                                </select>
                                <label for="country">Country Of Origin</label>
                            </div>
                        </div>

                        <hr size="5" width="100%" class="hrborder">
                        <div class="row">
                            <div class="col-6">
                                <h5 class="" id="customized-demo">Stock</h5>
                            </div>
                            <div class="col-6">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#stockmodal"
                                    class="btn btn-primary add-button float-end"><i class="bi bi-plus"></i>
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
                                        <td rowspan="3" style="width: 138px;">
                                            <div class="mb-2" style="display: flex;justify-content: center;">
                                                <div class="colorcircle"></div>
                                            </div>
                                            <div class="stockcoldel">
                                                <a style="color: blue;" class="edit" data-bs-toggle="modal"
                                                    data-bs-target="#editproductcolour">
                                                    <span class="nav-link-icon">
                                                        <i class="bi bi-pencil"></i>
                                                    </span>
                                                </a>
                                                <a style="color: red;">
                                                    <span class="nav-link-icon">
                                                        <a href="#" onclick="stockdelconfirmation(event)"
                                                            class="delete text-danger" title="Delete"><i
                                                                class="bi bi-trash"></i></a>
                                                    </span>
                                                </a>
                                            </div>
                                        </td>
                                        <td>S</td>
                                        <td style="width: 150px;"><input type="text" class="form-control stockcheck"
                                                id="floatingPrice" placeholder="Stock"></td>
                                        <td style="width: 150px;"><input type="text" class="form-control stockcheck"
                                                id="floatingPrice" placeholder="Price"></td>
                                    </tr>
                                    <tr>

                                        <td>M</td>
                                        <td>148</td>
                                        <td>800</td>
                                    </tr>
                                    <tr>

                                        <td colspan="3" style="text-align: left;">
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#editproductsize"
                                                class="btn btn-primary btn-icon btn-sm "><i
                                                    class="bi bi-plus-circle"></i>
                                                Add/Edit Size</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td rowspan="4" style="width: 138px;">
                                            <div class="mb-2" style="display: flex;justify-content: center;">
                                                <div class="colorcircle" style="background-color: #f55305;"></div>
                                            </div>
                                            <div class="stockcoldel">
                                                <a style="color: blue;" class="edit" data-bs-toggle="modal"
                                                    data-bs-target="#editproductcolour">
                                                    <span class="nav-link-icon">
                                                        <i class="bi bi-pencil"></i>
                                                    </span>
                                                </a>
                                                <a style="color: red;">
                                                    <span class="nav-link-icon">
                                                        <a href="#" onclick="stockdelconfirmation(event)"
                                                            class="delete text-danger" title="Delete"><i
                                                                class="bi bi-trash"></i></a>
                                                    </span>
                                                </a>
                                            </div>
                                        </td>
                                        <td>M</td>
                                        <td>148</td>
                                        <td>800</td>
                                    </tr>
                                    <tr>
                                        <td>L</td>
                                        <td>148</td>
                                        <td>800</td>
                                    </tr>
                                    <tr>
                                        <td>S</td>
                                        <td>148</td>
                                        <td>800</td>
                                    </tr>
                                    <tr>

                                        <td colspan="3" style="text-align: left;">
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#editproductsize"
                                                class="btn btn-primary btn-icon btn-sm "><i
                                                    class="bi bi-plus-circle"></i>
                                                Add/Edit Size</a>
                                        </td>
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
                                    <!-- <tr>

                                        <td colspan="4" style="
    text-align: left;
"><button class="btn btn-primary btn-icon btn-sm ">
                                                <i class="bi bi-plus-circle"></i> Add Colour
                                            </button>
                                        </td>

                                    </tr> -->
                                </tbody>
                            </table>
                        </div>

                        <hr size="5" width="100%" class="hrborder">
                        <div class="row mb-4">
                            <div class="col-6">
                                <h5 class="mb-3" id="customized-demo">Attributes</h5>
                            </div>
                            <div class="col-6">

                                <a href="#" data-bs-toggle="modal" data-bs-target="#add_attributes"
                                    class="btn btn-primary add-button float-end"><i class="bi bi-plus"></i>
                                </a>

                            </div>
                        </div>
                        <div class="col-12">
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
                                            <td class="atttextleft">
                                                <!-- <div class="atttablespan">Cutout <span class="spandel bi bi-x"></span></div>
                                                <div class="atttablespan">Check <span class="bi bi-x"></span></div>
                                                <div class="atttablespan">Point <span class="bi bi-x"></span></div>
                                                <div class="atttablespan">Basic <span class="bi bi-x"></span></div>
                                                <div class="atttablespan">Att <span class="bi bi-x"></span></div>
                                                <div class="atttablespan">Colo <span class="bi bi-x"></span></div>
                                                <div class="atttablespan">Neri <span class="bi bi-x"></span></div>
                                                <div class="atttablespan">Cutout <span class="bi bi-x"></span></div>
                                                <div class="atttablespan">Check <span class="bi bi-x"></span></div>
                                                <div class="atttablespan">Point <span class="bi bi-x"></span></div>
                                                <div class="atttablespan">Basic <span class="bi bi-x"></span></div>
                                                <div class="atttablespan">Att <span class="bi bi-x"></span></div>
                                                <div class="atttablespan">Colo <span class="bi bi-x"></span></div>
                                                <div class="atttablespan">Neri <span class="bi bi-x"></span></div>
                                                <div class="atttablespan">Cutout <span class="bi bi-x"></span></div>
                                                <div class="atttablespan">Check <span class="bi bi-x"></span></div>
                                                <div class="atttablespan">Point <span class="bi bi-x"></span></div>
                                                <div class="atttablespan">Basic <span class="bi bi-x"></span></div>
                                                <div class="atttablespan">Att <span class="bi bi-x"></span></div>
                                                <div class="atttablespan">Colo <span class="bi bi-x"></span></div>
                                                <div class="atttablespan">Neri <span class="bi bi-x"></span></div> -->

                                                <select id="modalpopupatt" class="form-control" multiple="multiple">
                                                    <option value="0" disabled>Select All</option>
                                                    <option value="Os1" data-badge="">Option1</option>
                                                    <option value="Os2" data-badge="">Option2</option>
                                                    <option value="Os3" data-badge="">Option3</option>
                                                    <option value="Os4" data-badge="">Option4</option>
                                                    <option value="O5s" data-badge="">Option5</option>
                                                    <option value="O6s" data-badge="">Option6</option>
                                                    <option value="O7s" data-badge="">Option7</option>
                                                    <option value="O8s" data-badge="">Option8</option>
                                                    <option value="O9s" data-badge="">Option9</option>
                                                    <option value="O1s0" data-badge="">Option10</option>
                                                    <option value="O1s1" data-badge="">Option11</option>
                                                    <option value="O1s2" data-badge="">Option12</option>
                                                    <option value="O13s" data-badge="">Option13</option>
                                                </select>
                                            </td>


                                            <td>

                                                <!-- <a href="#" class="editatt" title="Edit"><i
                                                        class="bi bi-pencil"></i></a> -->
                                                <a href="#" onclick="attdelconfirmation(event)"
                                                    class="delete text-danger" title="Delete"><i
                                                        class="bi bi-trash"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>Occassion</b></td>
                                            <td class="atttextleft">
                                                <div class="atttablespan">Cutout <span class="bi bi-x"></span></div>
                                                <div class="atttablespan">Check <span class="bi bi-x"></span></div>
                                                <div class="atttablespan">Point <span class="bi bi-x"></span></div>
                                                <div class="atttablespan">Basic <span class="bi bi-x"></span></div>
                                                <div class="atttablespan">Att <span class="bi bi-x"></span></div>
                                                <div class="atttablespan">Colo <span class="bi bi-x"></span></div>
                                                <div class="atttablespan">Neri <span class="bi bi-x"></span></div>
                                                <div class="atttablespan">Cutout <span class="bi bi-x"></span></div>
                                                <div class="atttablespan">Check <span class="bi bi-x"></span></div>
                                                <div class="atttablespan">Point <span class="bi bi-x"></span></div>
                                                <div class="atttablespan">Basic <span class="bi bi-x"></span></div>
                                                <div class="atttablespan">Att <span class="bi bi-x"></span></div>
                                                <div class="atttablespan">Colo <span class="bi bi-x"></span></div>
                                                <div class="atttablespan">Neri <span class="bi bi-x"></span></div>
                                                <div class="atttablespan">Cutout <span class="bi bi-x"></span></div>
                                                <div class="atttablespan">Check <span class="bi bi-x"></span></div>
                                                <div class="atttablespan">Point <span class="bi bi-x"></span></div>
                                                <div class="atttablespan">Basic <span class="bi bi-x"></span></div>
                                                <div class="atttablespan">Att <span class="bi bi-x"></span></div>
                                                <div class="atttablespan">Colo <span class="bi bi-x"></span></div>
                                                <div class="atttablespan">Neri <span class="bi bi-x"></span></div>
                                            </td>

                                            <td>

                                                <!-- <a href="#" class="edit " title="Edit"><i class="bi bi-pencil"></i></a> -->
                                                <a href="#" onclick="attdelconfirmation(event)"
                                                    class="delete text-danger" title="Delete"><i
                                                        class="bi bi-trash"></i></a>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>


                        <hr size="5" width="100%" class="hrborder">


                        <div class="col-12 mt-3">
                            <div class="form-group">
                                <h5 class="mb-3" id="customized-demo">Product Description</h5>
                                <textarea class="form-control" placeholder="Product Description" name="productdesc"
                                    value="" cols="100" id="productdesc" style="width: 100%;"></textarea>
                            </div>
                        </div>








                        <!-- <div class="col-12">
                            <button type="submit" class="btn btn-primary">Sign in</button>
                        </div> -->
                    </div>
                </div>
            </div>

        </form>
    </div>
</div>
<!-- ./ content -->


<!-- Stock Modal -->
<div class="modal fade " id="stockmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Make Your Stock</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="#">

                    <div id="wizard1">
                        <h3>Add Product Colour</h3>
                        <section class="text-center card card-body border mb-0">
                            <!-- <h5>Personal Information</h5> -->
                            <!-- <input class="text-center" id="picker" value='#276cb8' /> -->
                            <div class="form-group">
                                <div class="row">
                                    <div id="coloradd" class="col-lg-8">
                                        <input type="text" class="form-control form-control-sm" id="picker"
                                            value="#276cb8" onClick='addItem(this)'>
                                        <!-- <input type="text" id="picker" value="#276cb8" /> -->
                                    </div>
                                    <div class="col-lg-4 selectedcolor">
                                        <h3> Selected Colour </h3>
                                        <div id="yourcolordummy" class="mb-5 yourcolordummy">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="row">
                                <div class="col-lg-8">
                                    <div class="card mb-4">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between align-items-center"
                                                data-bs-toggle="collapse" aria-expanded="true"
                                                data-bs-target="#colorsCollapseExample" role="button">
                                                <div>Colors</div>
                                                <div class="bi bi-chevron-down"></div>
                                            </div>
                                            <div class="mt-4 collapse show" id="colorsCollapseExample" style="">
                                                <div class="color-filter-group d-flex gap-3">
                                                    <input class="form-check-input" type="checkbox" value="#1fa0c6"
                                                        aria-label="..." style="background-color: rgb(31, 160, 198);">
                                                    <input class="form-check-input" type="checkbox" checked=""
                                                        value="green" aria-label="..." style="background-color: green;">
                                                    <input class="form-check-input" type="checkbox" checked=""
                                                        value="#c61faa" aria-label="..."
                                                        style="background-color: rgb(198, 31, 170);">
                                                    <input class="form-check-input" type="checkbox" value="#1fc662"
                                                        aria-label="..." style="background-color: rgb(31, 198, 98);">
                                                    <input class="form-check-input" type="checkbox" value="#9dc61f"
                                                        aria-label="..." style="background-color: rgb(157, 198, 31);">
                                                    <input class="form-check-input" type="checkbox" checked=""
                                                        value="#c67b1f" aria-label="..."
                                                        style="background-color: rgb(198, 123, 31);">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                        </section>
                        <h3>Add Product Size</h3>
                        <section class="card card-body border mb-0">
                            <div class="sizeoptions createsize mb-3">
                                <div class="row g-3">
                                    <div class="col-8 mb-3">
                                        <div class="form-floating">
                                            <input type="text" class="form-control form-control-sm" id="modalnewsize"
                                                placeholder="Create New Size">
                                            <label for="modalnewsize">Create New Size</label>
                                        </div>
                                    </div>
                                    <div class="col-4 mt-4 text-center">

                                        <button type="button" class="btn btn-primary">
                                            Add Size
                                        </button>
                                    </div>

                                    <div class="col-4 ">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                            id="inlineRadio1" value="option1">
                                        <label class="form-check-label" for="inlineRadio1">Option 1</label>
                                    </div>
                                    <div class="col-4 ">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                            id="inlineRadio2" value="option2">
                                        <label class="form-check-label" for="inlineRadio2">Option 2</label>
                                    </div>
                                    <div class="col-4 ">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                            id="inlineRadio3" value="option3">
                                        <label class="form-check-label" for="inlineRadio3">Custom</label>
                                    </div>
                                </div>
                            </div>

                            <!-- <hr size="5" width="100%" class="hrborder">  -->
                            <div class="sizeoptions">
                                <div class="row g-3">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" id="gridCheck">
                                                    <label class="form-check-label" for="gridCheck">
                                                        Option 1
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-9">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1"
                                                        value="option1">
                                                    <label class="form-check-label" for="inlineCheckbox1">26</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2"
                                                        value="option2">
                                                    <label class="form-check-label" for="inlineCheckbox2">28</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2"
                                                        value="option2">
                                                    <label class="form-check-label" for="inlineCheckbox2">30</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2"
                                                        value="option2">
                                                    <label class="form-check-label" for="inlineCheckbox2">32</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2"
                                                        value="option2">
                                                    <label class="form-check-label" for="inlineCheckbox2">34</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2"
                                                        value="option2">
                                                    <label class="form-check-label" for="inlineCheckbox2">36</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2"
                                                        value="option2">
                                                    <label class="form-check-label" for="inlineCheckbox2">38</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2"
                                                        value="option2">
                                                    <label class="form-check-label" for="inlineCheckbox2">40</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2"
                                                        value="option2">
                                                    <label class="form-check-label" for="inlineCheckbox2">42</label>
                                                </div>
                                                <!-- <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox3"
                                                value="option3" disabled>
                                            <label class="form-check-label" for="inlineCheckbox3">3 (disabled)</label>
                                        </div> -->
                                            </div>
                                        </div>
                                        <hr class="hrborder2">
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" id="gridCheck">
                                                    <label class="form-check-label" for="gridCheck">
                                                        Option 2
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-9">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1"
                                                        value="option1">
                                                    <label class="form-check-label" for="inlineCheckbox1">S</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2"
                                                        value="option2">
                                                    <label class="form-check-label" for="inlineCheckbox2">M</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2"
                                                        value="option2">
                                                    <label class="form-check-label" for="inlineCheckbox2">L</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2"
                                                        value="option2">
                                                    <label class="form-check-label" for="inlineCheckbox2">XL</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2"
                                                        value="option2">
                                                    <label class="form-check-label" for="inlineCheckbox2">XXL</label>
                                                </div>


                                            </div>
                                        </div>
                                        <hr class="hrborder2">
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" id="gridCheck">
                                                    <label class="form-check-label" for="gridCheck">
                                                        Custom
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-9">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1"
                                                        value="option1">
                                                    <label class="form-check-label" for="inlineCheckbox1">Custom
                                                        1</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2"
                                                        value="option2">
                                                    <label class="form-check-label" for="inlineCheckbox2">Custom
                                                        2</label>
                                                </div>
                                                <!-- <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox3"
                                                value="option3" disabled>
                                            <label class="form-check-label" for="inlineCheckbox3">3 (disabled)</label>
                                        </div> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- <h3>Payment Details</h3>
                        <section class="card card-body border mb-0">
                            <h5>Payment Details</h5>
                            <p>The next and previous buttons help you to navigate through your content.</p>
                        </section> -->
                    </div>
                </form>




            </div>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div> -->
        </div>
    </div>
</div>
<!-- Stock Modal -->

<!-- Edit Product Colour Modal -->
<div class="modal fade " id="editproductcolour" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Your Stock</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="#">
                    <div id="editproductcolour">
                        <h3>Edit Product Colour</h3>
                        <section class="text-center card card-body border mb-0">
                            <div class="form-group">
                                <div class="row">
                                    <div id="coloradd" class="col-lg-8">
                                        <input type="text" class="form-control form-control-sm" id="editpicker"
                                            value="#276cb8" onClick='addItem(this)'>
                                    </div>
                                    <div class="col-lg-4 selectedcolor">
                                        <h3> Selected Colour </h3>
                                        <div id="yourcolordummy" class="mb-5 yourcolordummy">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button> -->
                <button class="btn btn-primary submit-btn" type="button" id="sub_btn_sz"
                    onclick="save_size()">Save</button>
                <a href="javascript:void(0);" data-bs-dismiss="modal" class="btn cancel-btn">Cancel</a>
            </div>
        </div>
    </div>
</div>
<!-- Edit Product Colour Modal -->

<!-- Edit Product Size Modal -->
<div class="modal fade " id="editproductsize" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Your Stock</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="#">
                    <div id="editproductsize">
                        <h3>Edit Product Size</h3>
                        <section class="card card-body border mb-0">
                            <div class="sizeoptions createsize mb-3">
                                <div class="row g-3">
                                    <div class="col-8 mb-3">
                                        <div class="form-floating">
                                            <input type="text" class="form-control form-control-sm" id="modalnewsize"
                                                placeholder="Create New Size">
                                            <label for="modalnewsize">Create New Size</label>
                                        </div>
                                    </div>
                                    <div class="col-4 mt-4 text-center">
                                        <button type="button" class="btn btn-primary">
                                            Add Size
                                        </button>
                                    </div>

                                    <div class="col-4 ">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                            id="inlineRadio1" value="option1">
                                        <label class="form-check-label" for="inlineRadio1">Option 1</label>
                                    </div>
                                    <div class="col-4 ">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                            id="inlineRadio2" value="option2">
                                        <label class="form-check-label" for="inlineRadio2">Option 2</label>
                                    </div>
                                    <div class="col-4 ">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                            id="inlineRadio3" value="option3">
                                        <label class="form-check-label" for="inlineRadio3">Custom</label>
                                    </div>
                                </div>
                            </div>

                            <!-- <hr size="5" width="100%" class="hrborder">  -->
                            <div class="sizeoptions">
                                <div class="row g-3">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" id="gridCheck">
                                                    <label class="form-check-label" for="gridCheck">
                                                        Option 1
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-9">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1"
                                                        value="option1">
                                                    <label class="form-check-label" for="inlineCheckbox1">26</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2"
                                                        value="option2">
                                                    <label class="form-check-label" for="inlineCheckbox2">28</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2"
                                                        value="option2">
                                                    <label class="form-check-label" for="inlineCheckbox2">30</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2"
                                                        value="option2">
                                                    <label class="form-check-label" for="inlineCheckbox2">32</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2"
                                                        value="option2">
                                                    <label class="form-check-label" for="inlineCheckbox2">34</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2"
                                                        value="option2">
                                                    <label class="form-check-label" for="inlineCheckbox2">36</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2"
                                                        value="option2">
                                                    <label class="form-check-label" for="inlineCheckbox2">38</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2"
                                                        value="option2">
                                                    <label class="form-check-label" for="inlineCheckbox2">40</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2"
                                                        value="option2">
                                                    <label class="form-check-label" for="inlineCheckbox2">42</label>
                                                </div>
                                                <!-- <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox3"
                                                value="option3" disabled>
                                            <label class="form-check-label" for="inlineCheckbox3">3 (disabled)</label>
                                        </div> -->
                                            </div>
                                        </div>
                                        <hr class="hrborder2">
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" id="gridCheck">
                                                    <label class="form-check-label" for="gridCheck">
                                                        Option 2
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-9">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1"
                                                        value="option1">
                                                    <label class="form-check-label" for="inlineCheckbox1">S</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2"
                                                        value="option2">
                                                    <label class="form-check-label" for="inlineCheckbox2">M</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2"
                                                        value="option2">
                                                    <label class="form-check-label" for="inlineCheckbox2">L</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2"
                                                        value="option2">
                                                    <label class="form-check-label" for="inlineCheckbox2">XL</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2"
                                                        value="option2">
                                                    <label class="form-check-label" for="inlineCheckbox2">XXL</label>
                                                </div>


                                            </div>
                                        </div>
                                        <hr class="hrborder2">
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" id="gridCheck">
                                                    <label class="form-check-label" for="gridCheck">
                                                        Custom
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-9">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1"
                                                        value="option1">
                                                    <label class="form-check-label" for="inlineCheckbox1">Custom
                                                        1</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2"
                                                        value="option2">
                                                    <label class="form-check-label" for="inlineCheckbox2">Custom
                                                        2</label>
                                                </div>
                                                <!-- <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox3"
                                                value="option3" disabled>
                                            <label class="form-check-label" for="inlineCheckbox3">3 (disabled)</label>
                                        </div> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button> -->
                <button class="btn btn-primary submit-btn" type="button" id="sub_btn_sz"
                    onclick="save_size()">Save</button>
                <a href="javascript:void(0);" data-bs-dismiss="modal" class="btn cancel-btn">Cancel</a>
            </div>
        </div>
    </div>
</div>
<!-- Edit Product Size Modal -->


<!-- Add Category Name Modal -->
<div class="modal fade " id="add_category" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form autocomplete="off">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control form-control-sm" id="modalnewsize"
                            placeholder="Create New Size">
                        <label for="modalnewsize">Create New Size</label>
                    </div>
                    <div class="form-group col-12">
                        <!-- <label>Category Image</label> -->
                        <input class="form-control" type="file" name="category_image" id="category_image"
                            data-bv-field="category_image">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button> -->
                <button class="btn btn-primary submit-btn" type="button" id="sub_btn_sz"
                    onclick="save_size()">Save</button>
                <a href="javascript:void(0);" data-bs-dismiss="modal" class="btn cancel-btn">Cancel</a>
            </div>
        </div>
    </div>
</div>
<!-- /Add Category Name Modal -->


<!-- Add Sub Category Name Modal -->
<div class="modal fade " id="add_subcategory" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Sub-Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form autocomplete="off">
                    <div class="form-floating  mb-3">
                        <select class="form-select" id="modalcategory" aria-label="Floating label select example">
                            <option value="">Select Category</option>
                            <option value="1">Onwgwee</option>
                            <option value="2">Tgwgwwo</option>
                            <option value="3">Thgweree</option>
                        </select>
                        <label for="modalcategory">Category Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control form-control-sm" id="subcatname"
                            placeholder="Create New Size">
                        <label for="subcatname">Sub Category Name</label>
                    </div>
                    <div class="form-group col-12">
                        <!-- <label>Category Image</label> -->
                        <input class="form-control" type="file" name="subcategory_image" id="subcategory_image"
                            data-bv-field="subcategory_image">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary submit-btn" type="button" id="sub_btn_sz"
                    onclick="save_size()">Save</button>
                <a href="javascript:void(0);" data-bs-dismiss="modal" class="btn cancel-btn">Cancel</a>
            </div>
        </div>
    </div>
</div>
<!-- /Add Sub Category Name Modal -->


<!-- Add Discount Name Modal -->
<div class="modal fade " id="add_discount" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Discount</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form autocomplete="off">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control form-control-sm" id="subcatname"
                            placeholder="Create New Size">
                        <label for="subcatname">Discount Name</label>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-floating mb-3">
                                <input type="date" class="form-control form-control-sm" id="fromdate"
                                    placeholder="Create New Size">
                                <label for="fromdate">From Date</label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-floating mb-3">
                                <input type="date" class="form-control form-control-sm" id="todate"
                                    placeholder="Create New Size">
                                <label for="todate">To Date</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-floating  mb-3">
                                <select class="form-select" id="disctype" aria-label="Floating label select example">
                                    <option value="">Discount Type</option>
                                    <option value="1">Onwgwee</option>
                                    <option value="2">Tgwgwwo</option>
                                    <option value="3">Thgweree</option>
                                </select>
                                <label for="disctype">Category Name</label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control form-control-sm" id="disc"
                                    placeholder="Discount Type">
                                <label for="disc">Discount</label>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary submit-btn" type="button" id="sub_btn_sz"
                    onclick="save_size()">Save</button>
                <a href="javascript:void(0);" data-bs-dismiss="modal" class="btn cancel-btn">Cancel</a>
            </div>
        </div>
    </div>
</div>
<!-- /Add Discount Name Modal -->

<!-- Add Attribute Modal Starts -->
<div class="modal fade" id="add_attributes" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title font-weight-bold">Add Attributes</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="#">
                    <div class="form-row mb-3 attaddbox">
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-12 d-flex justify-content-center">
                                    <button class="btn_1" id="addatt"
                                        style="padding: 10px; border-radius: 25px; border: 1px solid rgb(3, 108, 245); background: linear-gradient(to right bottom, rgb(0, 118, 254) 0%, rgb(23, 42, 180) 100%); color: rgb(255, 255, 255);"><i
                                            class="bi bi-plus"
                                            style="padding-right:10px;font-weight: 700;font-size: 15px;"></i><span>Add
                                            Attribute</span></button>
                                </div>
                                <div class="col-12 d-flex justify-content-center mt-3" id="atttext">
                                    <span class="text-danger">★ Note: Please add attributes here.</span>
                                </div>
                            </div>
                            <div class="attbox mt-3" style="display:none;">
                                <div class="row mt-3">
                                    <!-- disctype -->
                                    <div class="col-md-12 ">
                                        <div class="form-floating  mb-3">
                                            <select class="form-select" id="atttype"
                                                aria-label="Floating label select example">
                                                <option value="">Select Attribute Type</option>
                                                <option value="1">Onwgwee</option>
                                                <option value="2">Tgwgwwo</option>
                                                <option value="3">Thgweree</option>
                                            </select>
                                            <label for="atttype">Attribute Type</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-4">

                                        <select id="id_SelectElement" class="form-control" multiple="multiple">
                                            <option value="0" disabled>Select All</option>
                                            <option value="O1" data-badge="">Option1</option>
                                            <option value="O2" data-badge="">Option2</option>
                                            <option value="O3" data-badge="">Option3</option>
                                            <option value="O4" data-badge="">Option4</option>
                                            <option value="O5" data-badge="">Option5</option>
                                            <option value="O6" data-badge="">Option6</option>
                                            <option value="O7" data-badge="">Option7</option>
                                            <option value="O8" data-badge="">Option8</option>
                                            <option value="O9" data-badge="">Option9</option>
                                            <option value="O10" data-badge="">Option10</option>
                                            <option value="O11" data-badge="">Option11</option>
                                            <option value="O12" data-badge="">Option12</option>
                                            <option value="O13" data-badge="">Option13</option>
                                        </select>

                                    </div>

                                </div>
                                <div class="row text-center mb-4">
                                    <div class="col-6">
                                        <a href="javascript:void(0);" class="btn btn-primary attmodalclose "
                                            id="attclose">Close</a>
                                    </div>
                                    <div class="col-6">
                                        <button class="btn btn-primary attmodalsave">Save</button>
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
                            <div class="attributestable mt-3">
                                <table class="table table-bordered">
                                    <thead style="background-color: #e7f4ff;">
                                        <tr>
                                            <th>Attribute Type</th>
                                            <th>Attribute Sub-Type</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><b>Pattern</b></td>
                                            <td class="atttextleft">
                                                <div class="atttablespan">Cutout </div>
                                                <div class="atttablespan">Check </div>
                                                <div class="atttablespan">Point </div>
                                                <div class="atttablespan">Basic </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>Occassion</b></td>
                                            <td class="atttextleft">
                                                <div class="atttablespan">Cutout </div>
                                                <div class="atttablespan">Check </div>
                                                <div class="atttablespan">Point </div>
                                                <div class="atttablespan">Basic </div>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="modal-footer">
                <button class="btn btn-primary submit-btn" type="button" id="sub_btn_sz"
                    onclick="save_size()">Save</button>
                <a href="javascript:void(0);" data-bs-dismiss="modal" class="btn cancel-btn">Cancel</a>
            </div> -->
        </div>
    </div>
</div>
<!-- Add Attribute Modal Ends -->

@stop