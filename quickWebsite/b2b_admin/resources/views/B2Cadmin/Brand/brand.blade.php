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
                                <h4 class="page-title">Brand List</h4>
                            </div>
                            <div class="col-auto text-right">
                            <a href="" data-toggle="modal" data-target="#add_brand" class="btn_1"
                                            style="border: 1px solid #036cf5;background: linear-gradient(to bottom right, #0076FE 0%, #172AB4 100%);"><i
                                                class="fas fa-plus" style="padding-right:10px;"></i><span>Add
                                                Brand</span></a>&nbsp;&nbsp;
                           
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
                                            <th scope="col">Brand Image</th>
                                            <th scope="col">Brand Name</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       @foreach ($brand as $item=>$value)
                                       <tr>
                                        <td>{{ ++$item }}</td>
                                        <th scope="row"> <a href="#" class="question_content"> 
                                           
                                            <img src="{{ 'public/'.$value->img_url }}" alt="{{ asset('public/no_image.jpg') }}" style="width:100px;height:100px;margin:5px;border:2px solid grey;box-shadow:5px 5px 5px grey">
                                                </a>
                                        </th>
                                        <td>{{ $value->name }}</td>
                                        <td class="f_s_14 f_w_400 color_text_3">
                                            <a href="#" class="badge_active">{{ $value->status=='A'?'Active':'In-Active' }}</a>
                                        </td>
                                        <td>
                                            <div class="action_btns d-flex">
                                                <a href="#" data-toggle="modal" data-target="#edit_brand{{ $value->id }}"
                                                    class="action_btn mr_10"> <i class="far fa-edit"></i> 
                                                </a>   
                                                <a href="{{ url('/delete/'.$value->id.'/brand/brand') }}" onclick="return confirm('Are you sure?')" class="action_btn"> <i class="fas fa-trash"></i> </a>
                                            </div>
                                        </td>
<!-- Edit Brand Name Modal -->
<div class="modal custom-modal fade" id="edit_brand{{ $value->id }}" role="dialog" tabindex="-1" role="dialog" aria-labelledby="edit_brandLabel" data-backdrop="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title font-weight-bold">Edit Brand</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('/update_brand/'.$value->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-12">
                            <label>Brand Name</label>
                            <input type="text" class="form-control" name="brand_name" id="brand_name" value="{{ $value->name }}" required>
                            </div>
                        <div class="form-group col-12">
                            <label>Brand Image</label>
                            <input class="form-control" type="file" name="brand_image[]" id="brand_image" data-bv-field="brand_image" onchange="imagesPreview(this,'.gallery','sub2')">
                            </div>
                    </div>
                    <div class="form-row">
                        <div class="gallery">
                           <img src="{{ 'public/'.$value->img_url }}" alt="{{ asset('public/no_image.jpg') }}" style="width:100px;height:100px;margin:5px;border:2px solid grey;box-shadow:5px 5px 5px grey">
                            </div>
                    </div>
                    <div class="submit-section">
                        <div class="row">
                            <div class="col-6">
                                <button class="btn btn-primary submit-btn" id="sub2">Submit</button>
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
<!-- /Edit Brand Name Modal  -->

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

<!-- Add Brand Name Modal -->
<div class="modal custom-modal fade" id="add_brand" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title font-weight-bold">Add Brand</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('/add_brand') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-12">
                            <label>Brand Name</label>
                            <input type="text" class="form-control" name="brand_name" id="brand_name" required>
                           </div>
                        <div class="form-group col-12">
                            <label>Brand Image</label>
                            <input class="form-control" type="file" name="brand_image[]" id="brand_image1"
                                data-bv-field="brand_image" onchange="imagesPreview(this,'.gallery1','sub1')" required>
                            </div>
                    </div>
                    <div class="form-row">
                        <div class="gallery1"></div>
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
<!-- /Add Brand Name Modal -->


<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
<script type="text/javascript">

    function imagesPreview(input, placeToInsertImagePreview,sub) {
        $(placeToInsertImagePreview).text('');
        if (input.files) {
            var filesAmount = input.files.length;
            console.log(input.files[0].size);
          for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();
                reader.onload = function(event) {
                   $($.parseHTML('<img>')).attr('src', event.target.result).css({"width":"100px", "height":"100px","margin":"5px","border":"2px solid grey","box-shadow":"5px 5px 5px grey"}).appendTo(placeToInsertImagePreview);
                    }
                reader.readAsDataURL(input.files[i]);
            }
        }

    }

</script>
@stop