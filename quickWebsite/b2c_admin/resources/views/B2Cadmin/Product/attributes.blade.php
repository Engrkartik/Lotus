@extends('layouts.default')
@section('content')

<!-- main container  -->
<div class="main_content_iner ">
    <div class="container-fluid p-0">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="white_card card_height_100 mb_30">
                    <!-- <div class="white_card_header">
                      <div class="row">
                            <div class="col">
                                <h4 class="page-title">Category List</h4>
                            </div>
                            <div class="col-auto text-right">
                            <a href="" data-toggle="modal" data-target="#add_category" class="btn_1"
                                            style="border: 1px solid #036cf5;background: linear-gradient(to bottom right, #0076FE 0%, #172AB4 100%);"><i
                                                class="fas fa-plus" style="padding-right:10px;"></i><span>Add
                                                Category</span></a>
                            </div>
                        </div> 
                        
                    </div> -->
                    <div class="row px-5">
                        <div class="col">
                            <div class="page_title_box d-flex flex-wrap align-items-center justify-content-between">
                                <div class="page_title_left d-flex align-items-center">
                                    <h3 class="f_s_25 f_w_700 dark_text mr_30">Attributes List</h3>
                                    <ol class="breadcrumb page_bradcam mb-0">
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                                        <li class="breadcrumb-item active">Attributes List</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto text-right">
                            <a href="" data-toggle="modal" data-target="#add_category" class="btn_1"
                                style="border: 1px solid #036cf5;background: linear-gradient(to bottom right, #0076FE 0%, #172AB4 100%);"><i
                                    class="fas fa-plus" style="padding-right:10px;"></i><span>Add
                                    Attribute</span></a>
                        </div>
                    </div>
                    <div class="body v2newborder">
                        <div class="white_card_body ">
                            <div class="QA_section">
                                <div class="QA_table mb_30">
                                    <!-- table-responsive -->
                                    <table class="table lms_table_active ">
                                        <thead>
                                            <tr>
                                                <th scope="col">SNo.</th>
                                                <th scope="col">Attribute Title</th>
                                                <th scope="col">Attributes</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>OCAetjtrjejsee
                                                    <div class="action_btns d-flex">
                                                        <a href="#" data-toggle="modal"
                                                            data-target="#rename_type"
                                                            class="action_btn mr_10"
                                                            >
                                                            <i class="far fa-edit"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                                <td>Shirts,Shirts,Shirts,Shirts</td>
                                                <td class="f_s_14 f_w_400 color_text_3">
                                                    <a href="#" class="badge_active">Active</a>
                                                </td>
                                                <td>
                                                    <div class="action_btns d-flex">
                                                        <a href="#" data-toggle="modal" data-target="#edit_category"
                                                            class="action_btn mr_10"> <i class="far fa-edit"></i> </a>
                                                        <a href="#" class="action_btn"> <i class="fas fa-trash"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                                <div class="modal custom-modal fade" id="rename_type" role="dialog" data-backdrop="false">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title font-weight-bold">Edit Attribute</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-12">
                                <label for="attribute_name">Attribute Type</label>
                                <select class="form-control" name="attribute_name" id="attribute_nameD">
                                <option value="">Select Option</option>
                               
                                    <option value="">dzgsd</option>
                               
                            </select>
                            </div>
                            <div class="form-group col-12">
                                <label for="rename">Rename Attribute</label>
                                <input type="text" class="form-control" id="rename_attD" name="rename_attD">
                            </div>
                        </div>
                        <div class="submit-section">
                            <div class="row">
                                <div class="col-6">
                                    <button class="btn btn-primary submit-btn" id="sub1">Submit</button>
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
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>



                </div>
            </div>
            <div class="col-12">

            </div>
        </div>
    </div>
</div>
<!-- main container  -->

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

<!-- Edit Category Name Modal -->
<div class="modal custom-modal fade" id="edit_category" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title font-weight-bold">Edit Category</h4>
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
<!-- /Edit Category Name Modal -->
@stop