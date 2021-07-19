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
                                <h4 class="page-title">Attribute List</h4>
                            </div>
                            <div class="col-auto text-right">
                            <a href="javascript:;" data-toggle="modal" data-target="#add_sub_attribute" class="btn_1"
                                            style="border: 1px solid #036cf5;background: linear-gradient(to bottom right, #0076FE 0%, #172AB4 100%);"><i
                                                class="fas fa-plus" style="padding-right:10px;"></i><span>Add Sub Attribute</span></a>&nbsp;&nbsp;
                            <a href="javascript:;" data-toggle="modal" data-target="#add_attribute" class="btn_1"
                            style="border: 1px solid #036cf5;background: linear-gradient(to bottom right, #0076FE 0%, #172AB4 100%);"><i
                                class="fas fa-plus" style="padding-right:10px;"></i><span>Add Attribute</span></a>&nbsp;&nbsp;
            
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
                                            <th scope="col">Attribute Title</th>
                                            <th scope="col">Attributes</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                   <tbody>
                                       @foreach ($attribute as $item=>$value)
                                           <tr>
                                            <td>{{ ++$item }}</td>
                                            <td>{{ $value->att_name }} <div class="action_btns d-flex">
                                                <a href="#" data-toggle="modal" data-target="#rename_type{{ $value->id }}"
                                                    class="action_btn mr_10" onclick="document.getElementById('rename_attD'+{{ $value->id }}).value='{{ $value->att_name }}'"> <i class="far fa-edit"></i> 
                                                </a>   
                                            </div>
                                        </td>
                                            @php
                                                $att=App\Http\Controllers\AttributeController::get_att($value->id);
                                                $res_att=str_replace('[','',str_replace('"','',str_replace(']','',$att)));
                                                $token = strtok($res_att, ",");
                                            @endphp
                                            <td>{{ $res_att }}</td>
                                            <td class="f_s_14 f_w_400 color_text_3">
                                                <a href="#" class="badge_active">{{ $value->status=='A'?'Active':'In-Active' }}</a>
                                            </td>
                                            <td>
                                                <div class="action_btns d-flex">
                                                    <a href="#" data-toggle="modal" data-target="#edit_attribute{{ $value->id }}"
                                                        class="action_btn mr_10" onclick="get_attribute({{ $value->id }})"> <i class="far fa-edit"></i> 
                                                    </a>   
                                                    {{-- <a href="#" onclick="return confirm('Are you sure?')" class="action_btn"> <i class="fas fa-trash"></i> </a> --}}
                                                </div>
                                            </td>
                                            <!-- Edit Attribute Name Modal -->
<div class="modal custom-modal fade" id="edit_attribute{{ $value->id }}" role="dialog" data-backdrop="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title font-weight-bold">Edit Attribute</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('/edit_attribute/'.$value->id.'/sub') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-12">
                            <label for="attribute_name">Attribute Type</label>
                            <select class="form-control" name="attribute_name" id="attribute_name" disabled>
                            <option value="">Select Option</option>
                            @foreach ($attribute as $items=>$values)
                                <option value="{{ $values->id }}" @if ($values->id==$value->id) selected="selected" @endif>{{ $values->att_name }}</option>
                            @endforeach
                        </select>
                        </div>
                        <div class="form-group col-12">
                            <label for="attribute{{ $value->id }}">Attribute</label>
                            <select class="form-control" name="attribute" id="attribute{{ $value->id }}" onchange="document.getElementById('rename_att'+{{ $value->id }}).value=this.value" required>
                                <option value="">Select Attribute</option>
                            </select>
                        </div>
                        <div class="form-group col-12">
                            <label for="rename">Rename Attribute</label>
                            <input type="text" class="form-control" id="rename_att{{ $value->id }}" name="rename_att">
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
<!-- /Edit Attribute Name Modal -->
      <!-- Edit Attribute Name Modal -->
      <div class="modal custom-modal fade" id="rename_type{{ $value->id }}" role="dialog" data-backdrop="false">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title font-weight-bold">Edit Attribute</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('/edit_attribute/'.$value->id.'/type') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-12">
                                <label for="attribute_name">Attribute Type</label>
                                <select class="form-control" name="attribute_name" id="attribute_nameD{{ $value->id }}">
                                <option value="">Select Option</option>
                                @foreach ($attribute as $items=>$values)
                                    <option value="{{ $values->id }}" @if ($values->id==$value->id) selected="selected" @endif>{{ $values->att_name }}</option>
                                @endforeach
                            </select>
                            </div>
                            <div class="form-group col-12">
                                <label for="rename">Rename Attribute</label>
                                <input type="text" class="form-control" id="rename_attD{{ $value->id }}" name="rename_attD">
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
    <!-- /Edit Attribute Name Modal -->
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
                {{-- {{ $attribute }} --}}
            </div>
        </div>
    </div>
</div>


<!-- main container  -->

<!-- Add Sub Attribute Name Modal -->
<div class="modal custom-modal fade" id="add_sub_attribute" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title font-weight-bold">Add Attribute</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('/add_attribute') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-12">
                            <label for="attribute_name">Attribute Name</label>
                            <select class="form-control" name="attribute_name" id="attribute_name" required>
                            <option value="">Select Option</option>
                            @foreach ($attribute as $item=>$value)
                                <option value="{{ $value->id }}">{{ $value->att_name }}</option>
                            @endforeach
                        </select>
                        </div>
                        <div class="form-group col-12">
                            <label for="attribute">Attribute</label>
                            <input class="form-control" type="text" name="attribute" id="attribute" required>
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
<!-- /Add Sub Attribute Name Modal -->

<!-- Add Attribute Name Modal -->
<div class="modal custom-modal fade" id="add_attribute" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title font-weight-bold">Add Attribute</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('/add_att') }}" method="POST">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-12">
                            <label for="attribute">Attribute</label>
                            <input class="form-control" type="text" name="attribute" id="attribute" required>
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
<!-- /Add Attribute Name Modal -->


<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
<script type="text/javascript">
function get_attribute(id)
{
    console.log(id);
    $.ajax({
        type:'POST',
        url:'{{ url('/get_attribute') }}',
        data:{'id':id,'_token':'{{ csrf_token() }}'},
        success:function(res)
        {
            console.log(res);
            $('#attribute'+id).html(res.att);
        }
    });
}
</script>
@stop