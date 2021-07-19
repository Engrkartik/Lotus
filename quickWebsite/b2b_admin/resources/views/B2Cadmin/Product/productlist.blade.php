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
                            <div class="box_header m-0">
                                <div class="main-title">
                                    <h3 class="m-0">Products List</h3>
                                </div>
                            </div>
                        </div>
                        <div class="white_card_body">
                            <div class="QA_section">
                                <div class="white_box_tittle list_header">
                                    <!-- <h4>Table</h4> -->
                                    <div class="box_right d-flex lms_block">
                                        <div class="serach_field_2">
                                            <div class="search_inner">
                                                <form Active="#">
                                                    <div class="search_field">
                                                        <input type="text" placeholder="Search Products here...">
                                                    </div>
                                                    <button type="submit"> <i class="ti-search"></i> </button>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="add_button ml-10">
                                            <a href="#"  data-toggle="modal" data-target="#filter" class="btn_1" style="border: 1px solid #036cf5;background: linear-gradient(to bottom right, #0076FE 0%, #172AB4 100%);"><i class="fas fa-filter" style="padding-right:0px;"></i></a>
                                        </div>
                                        <div class="add_button ml-10">
                                            <a href="{{url('add_product')}}"  class="btn_1" style="border: 1px solid #036cf5;background: linear-gradient(to bottom right, #0076FE 0%, #172AB4 100%);"><i class="fas fa-plus" style="padding-right:10px;"></i><span>Add Product</span></a>
                                        </div>
                                        <div class="add_button ml-10">
                                            <a href="javascript:;" data-toggle="modal" data-target="#exampleModal"  class="btn_1" style="border: 1px solid #036cf5;background: linear-gradient(to bottom right, #0076FE 0%, #172AB4 100%);"><i class="fas fa-plus" style="padding-right:10px;"></i><span>Create Set</span></a>
                                        </div>
                                    </div>
                                </div>

            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="false">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <form action="javascript:;" method="POST" onsubmit="form_submit(this.id);" id="myForm">
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Create Set</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <select name="product" id="product" class="form-control" onchange="show_colorSize(this.value);" required>
                                                                <option value="">Select Product</option>
                                                                @foreach ($item as $items=>$data)
                                                                    <option value="{{ $data->id }}">{{ $data->item_name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row"><p></p></div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <label for="tax">GST %</label>
                                                            <select name="tax" id="tax" class="form-control">
                                                                <option value="Exempt">Exempt</option>
                                                                <option value="3%">3%</option>
                                                                <option value="5%">5%</option>
                                                                <option value="12%">12%</option>
                                                                <option value="18%">18%</option>
                                                                <option value="28%">28%</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="price">Price</label>
                                                                <input class="form-control" type="number" placeholder="Price"
                                                                    name="price" id="price" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="qty_set">Quantity <i>(No. of set)</i></label>
                                                                <input class="form-control" type="number"
                                                                    name="qty_set" id="qty_set" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                                <!-- COLOUR PART -->
                                                        <hr size="18" width="100%"
                                                            style="margin-top: 1rem;margin-bottom: 1rem;border: 0;border-top: 5px solid rgb(84 83 83 / 10%);">
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <label for=""
                                                                    style="position: static;color: #797a7c;font-weight: 600;font-size: 16px;">Colour</label>
                                                            </div>
                                                        </div>
                                                        <div class="row d-inline">
                                                            <div class="col-2 d-inline" id="after_color_save">
                                                                <p>Select Product..!!</p>
                                                            </div>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <label for=""
                                                                    style="position: static;color: #797a7c;font-weight: 600;font-size: 16px;">Size</label>
                                                            </div>
                                                        </div>
                                                        <div class="row d-inline">
                                                            <div class="col-2 d-inline" id="after_size_save">
                                                                <p>Select Product..!!</p>
                                                            </div>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                        <div class="row d-inline">
                                                            <div class="col-12 d-inline" id="myTable">
                                                            </div>
                                                        </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Save</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </form>
                </div>
                </div>
        
                                <div class="QA_table mb_30">
                                    <!-- table-responsive -->
                                    <table class="table lms_table_active">
                                        <thead>
                                            <tr>
                                               <th scope="col">#</th>
                                               <th scope="col">Product Title.</th>
                                               <th scope="col">Product Image</th>
                                                <th scope="col">Product Name</th>
                                                <th scope="col">Product Price</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($item as $key=>$value)
                                            <tr>
                                                <td>{{ ++$key }}</td>
                                                <td>{{ $value->title }}</td>
                                                <th scope="row"> <a href="#" class="question_content" > <img style="width:100px;height:100px;" src="{{ asset($value->img_url) }}"></a></th>
                                                <td>{{ $value->item_name }}</td>
                                                <td>500 Rs/-</td>
                                                <td class="f_s_14 f_w_400 color_text_3">
                                                        {{-- <a href="#" class="badge_active">{{ $value->status=='A'?'Active':'Deactive' }}</a> --}}
                                                        <select class="form-control" onchange="if(confirm('Are you sure..?')){change_status(this.value,'{{ $value->id }}');}else{return false;}">
                                                            <option value="A" @if ($value->status=='A') selected="selected" @endif>Active</option>
                                                            <option value="D" @if ($value->status=='D') selected="selected" @endif>De-Active</option>
                                                        </select>
                                                    </td>
                                                <td>
                                                        <div class="action_btns d-flex">
                                                            <a href="{{ url('/edit_product/'.$value->id.'/'.$value->img) }}" class="action_btn mr_10"> <i class="far fa-edit"></i> </a>
                                                            <a href="{{ url('/delete/'.$value->id.'/product_list/product') }}" class="action_btn" onclick="return confirm('Are you sure?');"> <i class="fas fa-trash"></i> </a>
                                                        </div>
                                                    </td>
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

<div class="modal fade" id="filter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form action="" method="POST">
      @csrf
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><label>Product List Filter</label></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-6">
              <label>Status</label>
				<select class="form-control" name="status">
					<option value="" selected="selected">All</option>
					<option value="1">Active</option>
					<option value="0">Inactive</option>
				</select>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Filter</button>
      </div>
    </div>
  </form>
  </div>
</div>
<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
<script type="text/javascript">
function show_colorSize(id) {
    console.log(id);
    $.ajax({
        type:'POST',
        url:'{{ url('/show_colorSize') }}',
        data:{'item_id':id,'_token':'{{ csrf_token() }}'},
        success:function(res)
        {
            console.log(res.color);
            console.log(res.size);
            console.log(res.table);
            $('#after_color_save').html(res.color);
            $('#after_size_save').html(res.size);
            $('#myTable').html(res.table);
            // console.log(res.size);
        }
    });
}
function form_submit(id) {
    // console.log(document.getElementsByName('size[]').length);
    if(document.getElementsByName('size[]').length>0 && document.getElementsByName('color[]').length>0)
    {
        var qty=document.getElementsByName('qty[]');
        var st=false;
        for (let i = 0; i < qty.length; i++) {
            if(qty[i].value!=0)
            {
                st=true;
            }
        }
        if(st==true)
        {
        document.getElementById(id).action="{{ url('/create_set') }}";
        document.getElementById(id).submit();
        }else
        {
            alert('Increase Quantity of combination to add in the set..!!');
        }
    }else
    {
        alert("No Color & Size added in the set..");
    }
}

function change_status(st,product_id) {
    console.log(st);
    $.ajax({
        type:'POST',
        url:'{{ url('change_status') }}',
        data:{'st':st,'product_id':product_id,'_token':'{{ csrf_token() }}'},
        success:function(res)
        {
            console.log(res);
            alert(res.data);
        }
    });
}
</script>
@stop