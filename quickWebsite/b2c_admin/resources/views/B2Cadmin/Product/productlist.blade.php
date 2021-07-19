@extends('layouts.defaultmain')
@section('content')

<div class="content ">
    <div class="row">
        <div class="col-8">
            <div class="mb-2 mt-2 contentheading">
                <h3 class="f_s_25 f_w_700 dark_text mr_30">Product List</h3>
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="#">
                                <i class="bi bi-globe2 small me-2"></i> Dashboard
                            </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Product List</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="col-4">
            <a href="{{url('add')}}" class="btn btn-primary btn-icon float-end mt-4">
                <i class="bi bi-plus-circle"></i> Add Product
            </a>
        </div>
    </div>

    <div class="contentborder">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-md-flex gap-4 align-items-center">
                                <!-- <div class="d-none d-md-flex">All Orders</div> -->
                                <div class="d-md-flex gap-4 align-items-center">
                                    <form class="mb-3 mb-md-0">
                                        <div class="row g-3">
                                            <div class="col-md-3">
                                                <select class="form-select">
                                                    <option>Sort by</option>
                                                    <option value="desc">Desc</option>
                                                    <option value="asc">Asc</option>
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <select class="form-select">
                                                    <option value="10">10</option>
                                                    <option value="20">20</option>
                                                    <option value="30">30</option>
                                                    <option value="40">40</option>
                                                    <option value="50">50</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <input type="text" class="form-control"
                                                        placeholder="Search Products">
                                                    <button class="btn btn-outline-light" type="button">
                                                        <i class="bi bi-search"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="dropdown ms-auto">
                                    <a href="#" data-bs-toggle="dropdown" class="btn btn-primary dropdown-toggle"
                                        aria-haspopup="true" aria-expanded="false">Actions</a>
                                    <div class="dropdown-menu dropdown-menu-end" style="margin: 0px;">
                                        <a href="#" onclick="allproductdelconfirmation(event)"
                                            class="dropdown-item">Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive mt-4" tabindex="1" style="overflow: hidden; outline: none;">
                        <table class="table table-custom table-lg mb-0 p-3 tables" id="customers">
                            <thead>
                                <tr>
                                    <th>
                                        <input class="form-check-input select-all" type="checkbox"
                                            data-select-all-target="#customers" id="defaultCheck1">
                                    </th>
                                    <th>SNo.</th>
                                    <th>Product SNo.</th>
                                    <th>Product Image</th>
                                    <th>Product Name</th>
                                    <th>Product Price</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <input class="form-check-input" type="checkbox">
                                    </td>
                                    <td>
                                        <div class="avatar avatar-info">
                                            <span class="avatar-text rounded-circle">1</span>
                                        </div>
                                    </td>
                                    <td><strong>srt-1001</strong></td>
                                    <td>
                                        <a href="#">
                                            <img src="{{ asset('public/img/products/img-1.png') }}" class="rounded"
                                                width="80" alt="...">
                                        </a>
                                    </td>
                                    <td>Shoes</td>
                                    <td><strong>&#8377 500/-</strong></td>
                                    <td>
                                        <span class="badge_active">Active</span>
                                    </td>
                                    <td class="text-end">
                                        <div class="d-flex">
                                            <div class="dropdown ms-auto">
                                                <a href="#" data-bs-toggle="dropdown" class="btn btn-floating"
                                                    aria-haspopup="true" aria-expanded="false">
                                                    <i class="bi bi-three-dots"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a href="#" class="dropdown-item">Show</a>
                                                    <a href="#" data-bs-toggle="modal"
                                                        data-bs-target="#edit_subcategory"
                                                        class="dropdown-item">Edit</a>
                                                    <a href="#" onclick="productdelconfirmation(event)"
                                                        class="dropdown-item">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input class="form-check-input" type="checkbox">
                                    </td>
                                    <td>
                                        <div class="avatar avatar-info">
                                            <span class="avatar-text rounded-circle">2</span>
                                        </div>
                                    </td>
                                    <td><strong>srt-1002</strong></td>
                                    <td>
                                        <a href="#">
                                            <img src="{{ asset('public/img/products/02.png') }}" class="rounded"
                                                width="80" alt="...">
                                        </a>
                                    </td>
                                    <td>Shoes</td>
                                    <td><strong>&#8377 500/-</strong></td>
                                    <td>
                                        <span class="badge_inactive">Inactive</span>
                                    </td>
                                    <td class="text-end">
                                        <div class="d-flex">
                                            <div class="dropdown ms-auto">
                                                <a href="#" data-bs-toggle="dropdown" class="btn btn-floating"
                                                    aria-haspopup="true" aria-expanded="false">
                                                    <i class="bi bi-three-dots"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a href="#" class="dropdown-item">Show</a>
                                                    <a href="#" data-bs-toggle="modal"
                                                        data-bs-target="#edit_subcategory"
                                                        class="dropdown-item">Edit</a>
                                                    <a href="#" onclick="productdelconfirmation(event)"
                                                        class="dropdown-item">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <nav class="mt-4" aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true">«</span>
                                </a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true">»</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- Add Sub Category Name Modal -->
<div class="modal fade " id="add_subcategory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Sub Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form autocomplete="off">
                    <div class="col-md-12 mb-3">
                        <div class="form-floating">
                            <select class="form-select" id="catname" aria-label="Floating label select example">
                                <option selected="">Select Category Name</option>
                                <option value="002">Clothes</option>
                                <option value="002">Shoes</option>
                                <option value="003">Watches</option>
                            </select>
                            <label for="catname">Category Name</label>
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control form-control-sm" id="subcat"
                            placeholder="Create New Sub Category">
                        <label for="subcat">Sub Category Name</label>
                    </div>
                    <div class="form-group col-12">
                        <!-- <label>Category Image</label> -->
                        <input class="form-control" type="file" name="category_image" id="subcategory_image"
                            data-bv-field="subcategory_image">
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
<!-- /Add Sub Category Name Modal -->

<!-- Edit Sub Category Name Modal -->
<div class="modal fade " id="edit_subcategory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Sub Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form autocomplete="off">
                    <div class="col-md-12 mb-3">
                        <div class="form-floating">
                            <select class="form-select" id="catname" aria-label="Floating label select example">
                                <option selected="">Select Category Name</option>
                                <option value="002">Clothes</option>
                                <option value="002">Shoes</option>
                                <option value="003">Watches</option>
                            </select>
                            <label for="catname">Category Name</label>
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control form-control-sm" id="subcat"
                            placeholder="Create New Sub Category">
                        <label for="subcat">Sub Category Name</label>
                    </div>
                    <div class="form-group col-12">
                        <!-- <label>Category Image</label> -->
                        <input class="form-control" type="file" name="category_image" id="subcategory_image"
                            data-bv-field="subcategory_image">
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
<!-- Edit Sub Category Name Modal -->


@stop