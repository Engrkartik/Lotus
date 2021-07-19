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
                                <h4 class="page-title">Discount List</h4>
                            </div>
                            <div class="col-auto text-right">
                            <a href="javascript:;" data-toggle="modal" data-target="#add_discount" class="btn_1"
                                            style="border: 1px solid #036cf5;background: linear-gradient(to bottom right, #0076FE 0%, #172AB4 100%);"><i
                                                class="fas fa-plus" style="padding-right:10px;"></i><span>Add
                                                Discount</span></a>&nbsp;&nbsp;
                           
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
                                            <th scope="col">Discount Name</th>
                                            <th scope="col">Start Date</th>
                                            <th scope="col">End Date</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       @foreach ($discount as $item=>$value)
                                       <tr>
                                        <td>{{ ++$item }}</td>
                                        <td>{{ $value->disc_name }}</td>
                                        <td>{{ date('d-M-Y',strtotime($value->from_dt)) }}</td>
                                        <td>{{ date('d-M-Y',strtotime($value->to_dt)) }}</td>
                                        <td class="f_s_14 f_w_400 color_text_3">
                                            
                                                @if ($value->from_dt<=date('Y-m-d') && $value->to_dt>=date('Y-m-d'))
                                                <a href="#" class="badge_active">Active</a>
                                                @else
                                                    @if ($value->from_dt>=date('Y-m-d') && $value->to_dt>=date('Y-m-d'))
                                                    <a href="#" class="badge_active2">Upcoming</a>
                                                    @else
                                                    <a href="#" class="badge_active3">Expired</a>
                                                    @endif
                                                @endif
                                            </a>
                                        </td>
                                        <td>
                                            <div class="action_btns d-flex">
                                                <a href="#" data-toggle="modal" data-target="#edit_discount{{ $value->disc_id }}"
                                                    class="action_btn mr_10"> <i class="far fa-edit"></i> 
                                                </a>   
                                                <a href="{{ url('/delete2/'.$value->disc_id.'/discount/discount') }}" onclick="return confirm('Are you sure?')" class="action_btn"> <i class="fas fa-trash"></i> </a>
                                            </div>
                                        </td>
<!-- Edit Discount Name Modal -->
<div class="modal custom-modal fade" id="edit_discount{{ $value->disc_id }}" role="dialog" data-backdrop="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title font-weight-bold">Edit Discount</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="javascript:;" method="POST" onsubmit="form_submit1(this.id);" id="{{ $value->disc_id }}">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-12">
                            <label for="discount_name{{ $value->disc_id }}">Discount Name</label>
                            <input type="text" class="form-control" name="discount_name{{ $value->disc_id }}" id="discount_name{{ $value->disc_id }}" value="{{ $value->disc_name }}" required>
                           </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-6">
                            <label for="disc_type">Discount Type</label>
                            <select name="disc_type{{ $value->disc_id }}" id="disc_type{{ $value->disc_id }}" class="form-control" required>
                                <option value="" selected disabled>Select Option</option>
                                <option value="P" @if ($value->disc_type=='P') selected="selected" @endif>Percentage (%)</option>
                                <option value="A" @if ($value->disc_type=='A') selected="selected" @endif>Amount (₹)</option>
                            </select>
                            </div>
                            <div class="form-group col-6">
                                <label for="disc{{ $value->disc_id }}">Discount</label>
                                <input type="number" name="disc{{ $value->disc_id }}" id="disc{{ $value->disc_id }}" class="form-control" value="{{ $value->disc }}" required>
                                </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-6">
                            <label for="start_dt{{ $value->disc_id }}">Applicable From</label>
                            <input type="date" name="start_dt{{ $value->disc_id }}" id="start_dt{{ $value->disc_id }}" class="form-control" value="{{ $value->from_dt }}" required>
                        </div>
                        <div class="form-group col-6">
                            <label for="end_dt{{ $value->disc_id }}">Expired On</label>
                            <input type="date" name="end_dt{{ $value->disc_id }}" id="end_dt{{ $value->disc_id }}" class="form-control" value="{{ $value->to_dt }}" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-2">
                            <a href="javascript:;" data-toggle="modal" data-target="#add_discountP{{ $value->disc_id }}" class="btn_1"
                            style="border: 1px solid #426fa8;background: linear-gradient(to bottom right, #0076FE 0%, #426fa8 100%);"><i
                                class="fas fa-plus" style="padding-right:10px;"></i><span>Add Product</span></a>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <input type="hidden" name="selected_item" id="selected_item{{ $value->disc_id }}">
                        </div>
                        {{-- <div class="form-group" id="prod_count{{ $value->disc_id }}">
                            <p><b>{{ $value->item_count }} Product has been selected.</b></p>
                        </div> --}}
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            @if ($value->pid==NULL)
                                
                            @else
                                <div class="col-md-12" id="table{{ $value->disc_id }}">
                                    @php
                                    $prev='';
                                    $item=App\Http\Controllers\DiscountController::get_item($value->disc_id);
                                    $item_ar=json_decode($item);
                                    // echo $item;
                                    @endphp
                                    @foreach ($item_ar as $items=>$values)
                                    <div class="row" >
                                        <div class="col-md-12">
                                            <label for=""><b>{{ $values->cat }}</b></label>                              
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="">{{ str_replace('[','',str_replace('"','',str_replace(']','',$values->item))) }}</label>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                @endif
                            </div>
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
<!-- /Edit Discount Name Modal  -->

{{-- Add Product In Multi Discount Start --}}

<div class="modal fade" id="add_discountP{{ $value->disc_id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="false">
    <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Product List</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        @foreach ($cat_prod as $items=>$values)
                        <div class="row">
                            <div class="col-md-12">
                                <label for=""><b>{{ $values->title }}</b></label>                              
                                <input type="hidden" name="cat{{ $value->disc_id }}[]"  value="{{ $values->title }}">
                            </div>
                        </div>
                        <div class="row">
                            @php
                                $prod=App\Http\Controllers\DiscountController::cat_prod($values->id,$value->disc_id);
                            @endphp
                            @if (sizeof($prod)>0)
                            @foreach ($prod as $key=>$data)
                            <div class="col-md-2">
                                    <label for="{{ $data->item_name }}" style="cursor: pointer;">
                                        <input type="checkbox" name="item{{ $values->title }}{{ $value->disc_id }}[]" id="{{ $data->item_name }}" value="{{ $data->item_id }}" @if ($data->avl_disc=='Yes') checked="checked" @endif>{{ $data->item_name }}
                                    </label>
                            </div>
                            @endforeach
                            @else
                            <div class="col-md-12">
                                <p>No Product Listed</p>
                            </div>
                            @endif
                            
                        </div>
                        @endforeach
                        <div class="row">
                            <input type="hidden" id="selected_item{{ $value->disc_id }}" name="selected_item">
                        </div>
                    </div>
                </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="pro_sub{{ $value->disc_id }}" onclick="save_item('pro_sub{{ $value->disc_id }}','item{{ $values->title }}{{ $value->disc_id }}[]','prod_count{{ $value->disc_id }}','selected_item{{ $value->disc_id }}','{{ $value->disc_id }}');">Save</button>
                </div>
            </div>
    </div>
</div>
{{-- Add Product In Discount End --}}


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

<!-- Add Discount Name Modal -->
<div class="modal custom-modal fade" id="add_discount" role="dialog" data-backdrop="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title font-weight-bold">Add Discount</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="javascript:;" method="POST" onsubmit="form_submit(this.id);" id="myForm">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-12">
                            <label for="discount_name">Discount Name</label>
                            <input type="text" class="form-control" name="discount_name" id="discount_name" required>
                           </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-6">
                            <label for="disc_type">Discount Type</label>
                            <select name="disc_type" id="disc_type" class="form-control" required>
                                <option value="">Select Option</option>
                                <option value="P">Percentage (%)</option>
                                <option value="A">Amount (₹)</option>
                            </select>
                            </div>
                            <div class="form-group col-6">
                                <label for="disc">Discount</label>
                                <input type="number" name="disc" id="disc" class="form-control" required>
                                </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-6">
                            <label for="start_dt">Applicable From</label>
                            <input type="date" name="start_dt" id="start_dt" class="form-control" required>
                        </div>
                        <div class="form-group col-6">
                            <label for="end_dt">Expired On</label>
                            <input type="date" name="end_dt" id="end_dt" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-2">
                            <a href="javascript:;" data-toggle="modal" data-target="#add_discountP" class="btn_1"
                            style="border: 1px solid #426fa8;background: linear-gradient(to bottom right, #0076FE 0%, #426fa8 100%);"><i
                                class="fas fa-plus" style="padding-right:10px;"></i><span>Add Product</span></a>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <input type="hidden" name="selected_item" id="selected_item">
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                    <div class="col-md-12" id="table">
                                    </div>
                                </div>
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
<!-- /Add Discount Name Modal -->

{{-- Add Product In Single Discount Start --}}

<div class="modal fade" id="add_discountP" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Product List</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        @foreach ($cat_prod as $item=>$value)
                        <div class="row">
                            <div class="col-md-12">
                                <label for=""><b>{{ $value->title }}</b></label>                              
                                <input type="hidden" name="cat[]"  value="{{ $value->title }}">
                            </div>
                        </div>
                        <div class="row">
                            @php
                                $prod=App\Http\Controllers\DiscountController::cat_prod($value->id,'');
                            @endphp
                            @if (sizeof($prod)>0)
                            @foreach ($prod as $key=>$data)
                            <div class="col-md-2">
                                    <label for="items{{ $data->item_id }}" style="cursor: pointer;">
                                        <input type="checkbox" name="item{{ $value->title }}[]" id="items{{ $data->item_id }}" value="{{ $data->item_id }}">{{ $data->item_name }}
                                    </label>
                            </div>
                            @endforeach
                            @else
                            <div class="col-md-12">
                                <p>No Product Listed</p>
                            </div>
                            @endif
                            
                        </div>
                        @endforeach
                      
                    </div>
                </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="pro_sub" onclick="save_item('pro_sub','item[]','prod_count','selected_item','');">Save</button>
                </div>
            </div>
    </div>
  </div>
{{-- Add Product In Single  End --}}

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
    var selected_item=new Array();
    var selected_itemT=new Array();
    function save_item(btn,items,print,select_item,disc) {
        // console.log(disc,items);
        selected_item=[];
        obj=[];
        $('#'+print).text('');
        var obj=new Array();
        var cat=document.getElementsByName('cat'+disc+'[]');
        for (let j = 0; j < cat.length; j++) 
        {
            var item=document.getElementsByName('item'+cat[j].value+disc+'[]');
            selected_itemT=[];
            obj[j]=new Array();
            for (let i = 0; i < item.length; i++) {
                if(item[i].checked)
                {
                    selected_item.push(item[i].value);
                    selected_itemT.push(item[i].id);
                    // console.log(item[i]);
                }
            }
            obj[j][0]=cat[j].value;
            obj[j][1]=selected_itemT;
        }
        // console.log(JSON.stringify(selected_item),obj);
       $('#table'+disc).text('');
       if(selected_item.length>0)
       {
       $('#table'+disc).append('<div class="col-md-12" id="table'+disc+'">');
       for (let k = 0; k < obj.length; k++) {
           var str=obj[k][1];
        //    console.log(str);
           $('#table'+disc).append('<div class="row" >'+
                                        '<div class="col-md-12">'+
                                            '<label for=""><b>'+obj[k][0]+'</b></label>'+
                                        '</div>'+
                                    '</div>'+
                                    '<div class="row">'+
                                        '<div class="col-md-12">'+
                                            '<label for="">'+str+'</label>'+
                                        '</div>'+
                                    '</div>');
       }
       $('#table'+disc).append('</div>');
       }
       $('#'+btn).attr('data-dismiss','modal');
        document.getElementById(select_item).value=JSON.stringify(selected_item);
        console.log(document.getElementById(select_item).value);
    }

    function form_submit(id) 
    {
        // var item=document.getElementById('selected_item').value;
        // console.log(item);
        var start_dt=document.getElementById('start_dt').value;
        var end_dt=document.getElementById('end_dt').value;
        console.log(selected_item);
        $.ajax({
        type:'POST',
        url:'{{ url('check_discount') }}',
        data:{'item':selected_item,'start_dt':start_dt,'end_dt':end_dt,'_token':'{{ csrf_token() }}','type':'add'},
        success:function(res)
        {
            console.log(res.status);
            console.log(res.data);
            if(res.status==true)
            {
                $('#add_discountP').modal('show');
                alert("* "+res.data+" * item already exist for the given period..!!");
                console.log(res.data);
            }else
            {
                document.getElementById(id).action='{{ url('/add_discount') }}';
                document.getElementById(id).submit();
            }
        }
    });
    }
    function form_submit1(id) 
    {
        var start_dt=document.getElementById('start_dt'+id).value;
        var end_dt=document.getElementById('end_dt'+id).value;
        if(selected_item.length==0)
        {
               $('#pro_sub'+id).click();
        }
        console.log(selected_item);
        $.ajax({
        type:'POST',
        url:'{{ url('check_discount') }}',
        data:{'item':selected_item,'start_dt':start_dt,'end_dt':end_dt,'disc':id,'_token':'{{ csrf_token() }}','type':'edit'},
        success:function(res)
        {
            console.log(res.status);
            console.log(res.data);
            if(res.status==true)
            {
                $('#add_discountP'+id).modal('show');
                alert("* "+res.data+" * item already exist for the given period..!!");
                console.log(res.data);
            }else
            {
                document.getElementById(id).action="update_discount/"+id;
                document.getElementById(id).submit();
            }
        }
    });
    }
</script>
@stop