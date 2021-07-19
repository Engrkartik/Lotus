@extends('layouts.default')
@section('content')

<!-- main container  -->
<div class="main_content_iner ">
    <div class="container-fluid p-0">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="white_card card_height_100 mb_30">
                    <div class="white_card_header">
                        @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                        @endif
                        @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif
                        <div class="row">
                            <div class="col">
                                <h4 class="page-title">Category List</h4>
                            </div>
                            <div class="col-auto text-right">
                            <a href="" data-toggle="modal" data-target="#add_category" class="btn_1"
                                            style="border: 1px solid #036cf5;background: linear-gradient(to bottom right, #0076FE 0%, #172AB4 100%);"><i
                                                class="fas fa-plus" style="padding-right:10px;"></i><span>Add
                                                Category</span></a>&nbsp;&nbsp;
                            <a href="" data-toggle="modal" data-target="#add_subcategory" class="btn_1"
                            style="border: 1px solid #036cf5;background: linear-gradient(to bottom right, #0076FE 0%, #172AB4 100%);"><i
                                class="fas fa-plus" style="padding-right:10px;"></i><span>Add
                                Sub-Category</span></a>
                            </div>
                        </div>
                    </div>
                    <div class="white_card_body">
                        <div class="QA_section">
                            <div class="QA_table mb_30">
                                <!-- table-responsive -->
                                <table class="table lms_table_active ">
                                    <thead>
                                        <tr>
                                            <th scope="col">SNo.</th>
                                            <th scope="col">Category Image</th>
                                            <th scope="col">Category Name</th>
                                            <th scope="col">Sub-Category Name</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       @foreach ($category as $item=>$value)
                                       <tr>
                                        <td>{{ ++$item }}</td>
                                        <th scope="row"> <a href="#" class="question_content"> <img
                                                    style="width:100px;height:100px;"
                                                    src="{{ asset('public/'.$value->img) }}"></a>
                                        </th>
                                        <td>{{ $value->title }} &nbsp;&nbsp;<a href="#" data-toggle="modal" data-target="#edit_category{{ $value->id }}"
                                            class="action_btn mr_10"> <i class="far fa-edit"></i> 
                                        </a>   </td>
                                        <td>
                                            @php 
                                                $sub_category=App\Http\Controllers\CategoryController::sub_cat($value->id) 
                                                // $sub_category=json_decode($sub_category);
                                            @endphp
                                            {{ str_replace('[','',str_replace('"','',str_replace(']','',$sub_category))) }}                                            
                                            &nbsp;&nbsp;<a href="#" data-toggle="modal" data-target="#edit_subcategory{{ $value->id }}"
                                                class="action_btn mr_10" onclick="gen_sub({{ $value->id }})"> <i class="far fa-edit" onclick="gen_sub({{ $value->id }})"></i> 
                                            </a>
                                        </td>
                                        <td class="f_s_14 f_w_400 color_text_3">
                                            <a href="#" class="badge_active">{{ $value->status=='A'?'Active':'In-Active' }}</a>
                                        </td>
                                        <td>
                                            <div class="action_btns d-flex">
                                                
                                                <a href="{{ url('/delete/'.$value->id.'/categories/category') }}" onclick="return confirm('Are you sure?')" class="action_btn"> <i class="fas fa-trash"></i> </a>
                                            </div>
                                        </td>
<!-- Edit Category Name Modal -->
<div class="modal custom-modal fade" id="edit_category{{ $value->id }}" role="dialog" tabindex="-1" role="dialog" aria-labelledby="edit_categoryLabel" data-backdrop="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title font-weight-bold">Edit Category</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('/update_cat/'.$value->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-12">
                            <label>Category Name</label>
                            <input class="form-control" type="text" name="category_name" id="category_name"
                                data-bv-field="category_name" value="{{ $value->title }}">
                            </div>
                        <div class="form-group col-12">
                            <label>Category Image</label>
                            <input class="form-control" type="file" name="category_image" id="category_image"
                                data-bv-field="category_image" onchange="imagesPreview(this,'.gallery')">
                            </div>
                    </div>
                    <div class="form-row">
                        <div class="gallery">
                            <img src="{{ 'public/'.$value->img }}" alt="public/no_image.jpg" style="width:100px;height:100px;margin:5px;border:2px solid grey;box-shadow:5px 5px 5px grey">
                        </div>
                    </div>
                    <div class="submit-section">
                        <div class="row">
                            <div class="col-6">
                                <button class="btn btn-primary submit-btn">Submit</button>
                            </div>
                            <div class="col-6">
                                <a href="javascript:void(0);" data-dismiss="modal" class="btn cancel-btn">Cancel</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Edit Category Name Modal -->

<!-- Edit Sub-Category Name Modal -->
<div class="modal custom-modal fade" id="edit_subcategory{{ $value->id }}" role="dialog" tabindex="-1" role="dialog" aria-labelledby="edit_categoryLabel" data-backdrop="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title font-weight-bold">Edit Sub-Category</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('/update_subcat') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-12">
                            <label>Category Name</label>
                            <input class="form-control" type="text" name="category_name" id="category_name"
                                data-bv-field="category_name" value="{{ $value->title }}" readonly>
                        </div>
                        <div class="form-group col-12">
                            <label>Sub-Category Name</label>
                            <select name="subcategory_name" id="subcategory_name{{ $value->id }}" class="form-control" onchange="get_subImg(this.value,'gallery2{{ $value->id }}',this.id,{{ $value->id }});" required>
                                <option value="">Select Option</option>
                            </select>
                        </div>
                        <div class="form-group col-12">
                            <label>New Sub-Category Name</label>
                            <input class="form-control" type="text" name="new_subcategory_name" id="new_subcategory_name{{ $value->id }}"
                                data-bv-field="new_subcategory_name">
                        </div>
                        <div class="form-group col-12">
                            <label>Category Image</label>
                            <input class="form-control" type="file" name="category_image" id="category_image"
                                data-bv-field="category_image" onchange="imagesPreview(this,'.gallery2{{ $value->id }}')">
                            </div>
                    </div>
                    <div class="form-row">
                        <div class="gallery2{{ $value->id }}">
                            <img src="{{ asset('public/no_image.jpg') }}" alt="{{ asset('public/no_image.jpg') }}" style="width:100px;height:100px;margin:5px;border:2px solid grey;box-shadow:5px 5px 5px grey">
                        </div>
                    </div>
                    <div class="submit-section">
                        <div class="row">
                            <div class="col-6">
                                <button class="btn btn-primary submit-btn">Submit</button>
                            </div>
                            <div class="col-6">
                                <a href="javascript:void(0);" data-dismiss="modal" class="btn cancel-btn">Cancel</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Edit Sub-Category Name Modal -->
                                    </tr>

                                       @endforeach
                                    </tbody>
                                </table>
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
                <form action="{{ url('/add_category') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-12">
                            <label>Category Name</label>
                            <input class="form-control" type="text" name="category_name" id="category_name"
                                data-bv-field="category_name" required>
                            <small style="color: red;" id="error_cat"></small></div>
                        <div class="form-group col-12">
                            <label>Category Image</label>
                            <input class="form-control" type="file" name="category_image[]" id="category_image1"
                                data-bv-field="category_image" onchange="imagesPreview(this,'.gallery1')" required>
                            </div>
                    </div>
                    <div class="form-row">
                        <div class="gallery1"></div>
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
<!-- Add Sub-Category Name Modal -->
<div class="modal custom-modal fade" id="add_subcategory" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title font-weight-bold">Add Sub- Category</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('/add_subcategory') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-12">
                            <label>Main Category Name</label>
                            <select name="main_cat" class="form-control" required>
                                <option value="" disabled selected>Select Option</option>
                                @foreach ($category as $item=>$value)
                                    <option value="{{ $value->id }}">{{ $value->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-12">
                            <label>Sub-Category Name</label>
                            <input class="form-control" type="text" name="subcategory_name" id="subcategory_name"
                                data-bv-field="subcategory_name" required>
                            <small style="color: red;" id="error_cat"></small>
                        </div>
                        <div class="form-group col-12">
                            <label>Category Image</label>
                            <input class="form-control" type="file" name="subcategory_image[]" id="subcategory_image"
                                data-bv-field="subcategory_image" onchange="imagesPreview(this,'.gallery3')" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="gallery3"></div>
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
<!-- /Add Sub-Category Name Modal -->



<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
<script type="text/javascript">

    function imagesPreview(input, placeToInsertImagePreview) {
        $(placeToInsertImagePreview).text('');
        if (input.files) {
            var filesAmount = input.files.length;
            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();
                reader.onload = function(event) {
                    $($.parseHTML('<img>')).attr('src', event.target.result).css({"width":"100px", "height":"100px","margin":"5px","border":"2px solid grey","box-shadow":"5px 5px 5px grey"}).appendTo(placeToInsertImagePreview);
                }

                reader.readAsDataURL(input.files[i]);
            }
        }

    }

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
            console.log(res.html);
            $('#subcategory_name'+main_cat).html(res.html);
            $('#subcategory_name'+main_cat).focus();
            
        }
    });
}
function get_subImg(sub_cat,print,id,cat) {
    // console.log(main_cat);
    var token='{{ csrf_token() }}';
    // console.log(token);
    $.ajax({
        type:'POST',
        url:'{{ url('get_subcatImg') }}',
        data:{'cat':sub_cat,'_token':token},
        success:function(res)
        {
            console.log(res.html);
            document.getElementById('new_subcategory_name'+cat).value=$("#"+id+" option:selected").text();
            $('.'+print).text('');
            $('.'+print).append('<img src="public/'+res.html+'" style="width:100px;height:100px;margin:5px;border:2px solid grey;box-shadow:5px 5px 5px grey">');
        }
    });
}
</script>
@stop