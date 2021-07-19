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
                                    <h3 class="m-0">Customer List</h3>
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
                                                        <input type="text" placeholder="Search Customers here...">
                                                    </div>
                                                    <button type="submit"> <i class="ti-search"></i> </button>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="add_button ml-10">
                                            <a href="#"  data-toggle="modal" data-target="#filter" class="btn_1" style="border: 1px solid #036cf5;background: linear-gradient(to bottom right, #0076FE 0%, #172AB4 100%);"><i class="fas fa-filter" style="padding-right:0px;"></i></a>
                                        </div>
                                        <div class="add_button ml-10">
                                            <a href="{{url('add_customer')}}"  class="btn_1" style="border: 1px solid #036cf5;background: linear-gradient(to bottom right, #0076FE 0%, #172AB4 100%);"><i class="fas fa-plus" style="padding-right:10px;"></i><span>Add Customer</span></a>
                                        </div>
                                    </div>
                                </div>
        
                                <div class="QA_table mb_30">
                                    <!-- table-responsive -->
                                    <table class="table lms_table_active">
                                        <thead>
                                            <tr>
                                               <th scope="col">#</th>
                                               <th scope="col">Profile Image</th>
                                               <th scope="col">Firm Name</th>
                                               {{-- <th scope="col">Owner Name</th> --}}
                                                <th scope="col">Business Type</th>
                                                <th scope="col">Contact Number</th>
                                                <th scope="col">Address</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($customer as $key=>$value)
                                            <tr>
                                                <td>{{ ++$key }}</td>
                                                <th scope="row"> <a href="#" class="question_content" > <img style="width:100px;height:100px;" src="{{ asset($value->image) }}"></a></th>
                                                <td>{{ $value->FIRM_NAME }}</td>
                                                {{-- <td>{{ $value->OWNER_NAME }}</td> --}}
                                                <td>{{ $value->BUSINESS=='R'?'Retail':'Wholesale' }}</td>
                                                <td>{{ $value->CONTACT_NO }}</td>
                                                <td>{{ $value->ADDRESS }}</td>
                                                <td class="f_s_14 f_w_400 color_text_3">
                                                        <a href="#" class="badge_active">{{ $value->STATUS=='A'?'Active':'Deactive' }}</a>
                                                    </td>
                                                <td>
                                                        <div class="action_btns d-flex">
                                                            <a href="{{ url('/edit_customer/'.$value->id) }}" class="action_btn mr_10"> <i class="far fa-edit"></i> </a>
                                                            <a href="{{ url('/delete/'.$value->id.'/customer/company_reg') }}" class="action_btn" onclick="return confirm('Are you sure?');"> <i class="fas fa-trash"></i> </a>
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
<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
<script type="text/javascript">
</script>
@stop