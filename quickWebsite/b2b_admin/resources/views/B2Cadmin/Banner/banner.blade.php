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
                                <h4 class="page-title">Banner List</h4>
                            </div>
                            <div class="col-auto text-right">
                            <a href="" data-toggle="modal" data-target="#add_banner" class="btn_1"
                                            style="border: 1px solid #036cf5;background: linear-gradient(to bottom right, #0076FE 0%, #172AB4 100%);"><i
                                                class="fas fa-plus" style="padding-right:10px;"></i><span>Add
                                                Banner</span></a>&nbsp;&nbsp;
                           
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
                                            <th scope="col">Banner Image</th>
                                            <th scope="col">Banner Name</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       @foreach ($banner as $item=>$value)
                                       <tr>
                                        <td>{{ ++$item }}</td>
                                        <th scope="row"> <a href="#" class="question_content"> 
                                            @php
                                             $img=json_decode($value->img);
                                            @endphp
                                            @if (pathinfo($img[0], PATHINFO_EXTENSION)=='mp4')
                                            <video src="{{ $img[0] }}" controls="controls" preload="metadata" style="width:150px;height:150px;" ></video>
                                            @else
                                            <img src="{{ $img[0] }}" alt="{{ asset('public/no_image.jpg') }}" style="width:100px;height:100px;margin:5px;border:2px solid grey;box-shadow:5px 5px 5px grey">
                                            @endif
                                                </a>
                                        </th>
                                        <td>{{ $value->title }}</td>
                                        <td class="f_s_14 f_w_400 color_text_3">
                                            <a href="#" class="badge_active">{{ $value->status=='A'?'Active':'In-Active' }}</a>
                                        </td>
                                        <td>
                                            <div class="action_btns d-flex">
                                                <a href="#" data-toggle="modal" data-target="#edit_banner{{ $value->id }}"
                                                    class="action_btn mr_10"> <i class="far fa-edit"></i> 
                                                </a>   
                                                <a href="{{ url('/delete/'.$value->id.'/banner/banner') }}" onclick="return confirm('Are you sure?')" class="action_btn"> <i class="fas fa-trash"></i> </a>
                                            </div>
                                        </td>
<!-- Edit Banner Name Modal -->
<div class="modal custom-modal fade" id="edit_banner{{ $value->id }}" role="dialog" tabindex="-1" role="dialog" aria-labelledby="edit_bannerLabel" data-backdrop="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title font-weight-bold">Edit Banner</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('/update_banner/'.$value->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-12">
                            <label>Banner Name</label>
                            <select class="form-control" name="banner_name" id="banner_name" required disabled>
                            <option value="" selected="selected" disabled>Select Option</option>
                            <option value="Middle Banner" @if ($value->title=='Middle Banner') selected="selected" @endif>Middle Banner</option>
                            <option value="Top Banner" @if ($value->title=='Top Banner') selected="selected" @endif>Top Banner</option>
                            <option value="Last Banner" @if ($value->title=='Last Banner') selected="selected" @endif>Last Banner</option>
                            <option value="Video Banner" @if ($value->title=='Video Banner') selected="selected" @endif>Video Banner</option>
                            <option value="Discount Banner" @if ($value->title=='Discount Banner') selected="selected" @endif>Discount Banner</option>
                        </select>
                            </div>
                        <div class="form-group col-12">
                            <label>Banner Image</label>
                            <input class="form-control" type="file" name="banner_image[]" id="banner_image" data-bv-field="banner_image" onchange="imagesPreview(this,'.gallery','sub2')" multiple>
                        </div>
                        @if ($value->title=='Discount Banner')
                        <div class="form-group col-12">
                            <label for="discount_slabs{{ $value->id }}">Discount Slab</label>
                            <select class="multi-select" name="discount_slabs[]" id="discount_slabs{{ $value->id }}" style="width: 100%;" multiple>
                              <option value="">Select Option</option>
                              @foreach ($discount as $item=>$disc)
                                  <option value="{{ $disc->disc_id }}" @if($disc->banner_id==$value->id) selected="selected" @endif>{{ $disc->disc_name }}</option>
                              @endforeach
                            </select>
                        </div>
                        @endif
                       
                    </div>
                    <div class="form-row">
                        <div class="gallery">
                            @php
                                $img=json_decode($value->img,TRUE);
                            @endphp
                            @for ($i = 0; $i < sizeof($img); $i++)
                                
                            @if (pathinfo($img[$i], PATHINFO_EXTENSION)=='mp4')
                            <video class="hours_entered{{ $i }}" src="{{ $img[$i] }}" controls="controls" preload="metadata" style="width:150px;height:150px;" >
                            <i class="fa fa-minus-circle status-icon"></i>
                            </video>
                            @else
                            <span class="hours_entered{{ $i }}">
                            <img src="{{ $img[$i] }}" alt="{{ asset('public/no_image.jpg') }}" id="img{{ $value->id }}_{{ $i }}" style="width:100px;height:100px;margin:5px;border:2px solid grey;box-shadow:5px 5px 5px grey">
                            <i class="fa fa-minus-circle status-icon" onclick="if(confirm('Are you sure ?')){delete_img('.hours_entered{{ $i }}','{{ $i }}','{{ $value->id }}')}"></i>
                            </span>

                            @endif
                            
                            @endfor
                        </div>
                    </div>
                    <div class="form-row">
                        <input type="hidden" name="deleted_img" id="deleted_img{{ $value->id }}">
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
<!-- /Edit Banner Name Modal  -->

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

<!-- Add Banner Name Modal -->
<div class="modal custom-modal fade" id="add_banner" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title font-weight-bold">Add Banner</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('/add_banner') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-12">
                            <label>Banner Name</label>
                            <select class="form-control" name="banner_name" id="banner_name" required onchange="if((this.value)=='Discount Banner'){document.getElementById('discount_slab').style.display='block';}
                            else{document.getElementById('discount_slab').style.display='none';
                            document.getElementById('discount_slabs').setAttribute('required','required');
                            document.getElementById('discount_slabs').value='';
                            }">
                            <option value="">Select Option</option>
                            <option value="Middle Banner">Middle Banner</option>
                            <option value="Top Banner">Top Banner</option>
                            <option value="Last Banner">Last Banner</option>
                            <option value="Video Banner">Video Banner</option>
                            <option value="Discount Banner">Discount Banner</option>
                        </select>
                        </div>
                        <div class="form-group col-12">
                            <label>Banner Image/Video</label>
                            <input class="form-control" type="file" name="banner_image[]" id="banner_image1" onchange="imagesPreview(this,'.gallery1','sub1')" required multiple>
                        </div>
                        <div class="form-group col-12" id="discount_slab" style="display: none;">
                            <label for="discount_slabs">Discount Slab</label>
                            <select class="multi-select" id="discount_slabs" name="discount_slab[]" style="width: 100%;" multiple>
                                <option value="">Select Option</option>
                                @foreach ($discount as $item=>$disc)
                                <option value="{{ $disc->disc_id }}">{{ $disc->disc_name }}</option>                                    
                                @endforeach
                            </select>
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
<!-- /Add Banner Name Modal -->


<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
<script type="text/javascript">

    function imagesPreview(input, placeToInsertImagePreview,sub) {
        $(placeToInsertImagePreview).text('');
        if (input.files) {
            var filesAmount = input.files.length;
            console.log(input.files[0].size);
            if(input.files[0].size>'2097152')
            {
                $($.parseHTML('<p>Size Should be less than 2048kb')).css({"color":"red"}).appendTo(placeToInsertImagePreview);
                $('#'+sub).attr('disabled','disabled');
            }else
            {
            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();
                reader.onload = function(event) {
                    var filename=input.files[0].name;
                    var ext=filename.split('.').pop();
                    console.log(ext);
                    if(ext=='mp4')
                    {
                        $($.parseHTML('<video>')).attr('src', event.target.result).attr('controls','controls').attr('preload','metadata').css({"width":"200px", "height":"200px","margin":"5px"}).appendTo(placeToInsertImagePreview);
                    }else
                    {
                    $($.parseHTML('<img>')).attr('src', event.target.result).css({"width":"100px", "height":"100px","margin":"5px","border":"2px solid grey","box-shadow":"5px 5px 5px grey"}).appendTo(placeToInsertImagePreview);
                    }
                }

                reader.readAsDataURL(input.files[i]);
                $('#'+sub).removeAttr('disabled');
            }
            }
        }

    }
    var imgg=new Array();
function delete_img(imgid,img,i) {
    console.log(imgid);
    var iimg=document.getElementById('img'+i+'_'+img);
    console.log(iimg.src);
    // for (let i = imgid; i < iimg.length; i++) {
        var split=(iimg.src).split("b2b_admin/"); //explode("http://34.72.9.224/quickWebsite/b2b_admin/public/images/banner/",iimg[i].src);
        imgg.push(decodeURIComponent(split[1]));
    // }
    console.log(imgg);
    $(imgid).remove();
    document.getElementById('deleted_img'+i).value=JSON.stringify(imgg);
    console.log(document.getElementById('deleted_img'+i).value);

}
</script>
@stop