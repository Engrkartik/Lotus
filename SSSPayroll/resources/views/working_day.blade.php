@extends('include.header')
@section('content')
@if (session('alert'))
    <div class="alert alert-danger">
        {{ session('alert') }}
    </div>
@endif
<div class="card">
              <div class="card-header">
                <h3 class="card-title"><b>List Of Woking Days</b></h3>
                <button type="button" class="btn btn-primary" style="float: right;" data-toggle="modal" data-target="#exampleModal">Add Working Day</button>
              </div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <form >
    @csrf
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Working Day</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-12">
                <label for="name">Name</label>
                <input class="form-control" type="text" name="name" id="name" placeholder="Department Name">
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <label for="name">Week 1</label><br>
                <button type="button" class="btn btn-outline-success" id="mon1" name="week_1[]" value="Monday" onclick="active_btn(this.id);save_week1(this.id,'week_1',this.value)">Monday</button>
                <button type="button" class="btn btn-outline-success" id="tue1" name="week_1[]" value="Tuesday" onclick="active_btn(this.id);save_week1(this.id,'week_1',this.value)">Tuesday</button>
                <button type="button" class="btn btn-outline-success" id="wed1" name="week_1[]" value="Wednesday" onclick="active_btn(this.id);save_week1(this.id,'week_1',this.value)">Wednesday</button>
                <button type="button" class="btn btn-outline-success" id="thu1" name="week_1[]" value="Thursday" onclick="active_btn(this.id);save_week1(this.id,'week_1',this.value)">Thursday</button>
                <button type="button" class="btn btn-outline-success" id="fri1" name="week_1[]" value="Friday" onclick="active_btn(this.id);save_week1(this.id,'week_1',this.value)">Friday</button>
                <button type="button" class="btn btn-outline-success" id="sat1" name="week_1[]" value="Saturday" onclick="active_btn(this.id);save_week1(this.id,'week_1',this.value)">Saturday</button>
                <button type="button" class="btn btn-outline-success" id="sun1" name="week_1[]" value="Sunday" onclick="active_btn(this.id);save_week1(this.id,'week_1',this.value)">Sunday</button>
              </div>
            </div>
             <div class="row">
              <div class="col-md-12">
                <label for="name">Week 2</label><br>
                <button type="button" class="btn btn-outline-success" id="mon2" name="week_2[]" value="Monday" onclick="active_btn(this.id);save_week1(this.id,'week_2',this.value)">Monday</button>
                <button type="button" class="btn btn-outline-success" id="tue2" name="week_2[]" value="Tuesday" onclick="active_btn(this.id);save_week1(this.id,'week_2',this.value)">Tuesday</button>
                <button type="button" class="btn btn-outline-success" id="wed2" name="week_2[]" value="Wednesday" onclick="active_btn(this.id);save_week1(this.id,'week_2',this.value)">Wednesday</button>
                <button type="button" class="btn btn-outline-success" id="thu2" name="week_2[]" value="Thursday" onclick="active_btn(this.id);save_week1(this.id,'week_2',this.value)">Thursday</button>
                <button type="button" class="btn btn-outline-success" id="fri2" name="week_2[]" value="Friday" onclick="active_btn(this.id);save_week1(this.id,'week_2',this.value)">Friday</button>
                <button type="button" class="btn btn-outline-success" id="sat2" name="week_2[]" value="Saturday" onclick="active_btn(this.id);save_week1(this.id,'week_2',this.value)">Saturday</button>
                <button type="button" class="btn btn-outline-success" id="sun2" name="week_2[]" value="Sunday" onclick="active_btn(this.id);save_week1(this.id,'week_2',this.value)">Sunday</button>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <label for="name">Week 3</label><br>
                 <button type="button" class="btn btn-outline-success" id="mon3" name="week_3[]" value="Monday" onclick="active_btn(this.id);save_week1(this.id,'week_3',this.value)">Monday</button>
                <button type="button" class="btn btn-outline-success" id="tue3" name="week_3[]" value="Tuesday" onclick="active_btn(this.id);save_week1(this.id,'week_3',this.value)">Tuesday</button>
                <button type="button" class="btn btn-outline-success" id="wed3" name="week_3[]" value="Wednesday" onclick="active_btn(this.id);save_week1(this.id,'week_3',this.value)">Wednesday</button>
                <button type="button" class="btn btn-outline-success" id="thu3" name="week_3[]" value="Thursday" onclick="active_btn(this.id);save_week1(this.id,'week_3',this.value)">Thursday</button>
                <button type="button" class="btn btn-outline-success" id="fri3" name="week_3[]" value="Friday" onclick="active_btn(this.id);save_week1(this.id,'week_3',this.value)">Friday</button>
                <button type="button" class="btn btn-outline-success" id="sat3" name="week_3[]" value="Saturday" onclick="active_btn(this.id);save_week1(this.id,'week_3',this.value)">Saturday</button>
                <button type="button" class="btn btn-outline-success" id="sun3" name="week_3[]" value="Sunday" onclick="active_btn(this.id);save_week1(this.id,'week_3',this.value)">Sunday</button>
              </div>
            </div>
           <div class="row">
              <div class="col-md-12">
                <label for="name">Week 4</label><br>
                 <button type="button" class="btn btn-outline-success" id="mon4" name="week_4[]" value="Monday" onclick="active_btn(this.id);save_week1(this.id,'week_4',this.value)">Monday</button>
                <button type="button" class="btn btn-outline-success" id="tue4" name="week_4[]" value="Tuesday" onclick="active_btn(this.id);save_week1(this.id,'week_4',this.value)">Tuesday</button>
                <button type="button" class="btn btn-outline-success" id="wed4" name="week_4[]" value="Wednesday" onclick="active_btn(this.id);save_week1(this.id,'week_4',this.value)">Wednesday</button>
                <button type="button" class="btn btn-outline-success" id="thu4" name="week_4[]" value="Thursday" onclick="active_btn(this.id);save_week1(this.id,'week_4',this.value)">Thursday</button>
                <button type="button" class="btn btn-outline-success" id="fri4" name="week_4[]" value="Friday" onclick="active_btn(this.id);save_week1(this.id,'week_4',this.value)">Friday</button>
                <button type="button" class="btn btn-outline-success" id="sat4" name="week_4[]" value="Saturday" onclick="active_btn(this.id);save_week1(this.id,'week_4',this.value)">Saturday</button>
                <button type="button" class="btn btn-outline-success" id="sun4" name="week_4[]" value="Sunday" onclick="active_btn(this.id);save_week1(this.id,'week_4',this.value)">Sunday</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="add_working()">Save changes</button>
      </div>
    </div>
  </div>
</form>
</div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Week 1</th>
                    <th>Week 2</th>
                    <th>Week 3</th>
                    <th>Week 4</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($work_day as $key=>$value)
                  <tr>
                    <td>{{++$key}}</td>
                    <td>{{$value->name}}</td>
                    <td>
                      @php 
                $string = str_replace('[', '',$value->week1)
                @endphp
                @foreach(explode(',', $string) as $info) 
                  {{$info[1]}}
                @endforeach
                      </td>
                    <td>@php 
                $string = str_replace('[', '',$value->week2)
                @endphp
                @foreach(explode(',', $string) as $info) 
                  {{$info[1]}}
                @endforeach
                      </td>
                    <td>@php 
                $string = str_replace('[', '',$value->week3)
                @endphp
                @foreach(explode(',', $string) as $info) 
                  {{$info[1]}}
                @endforeach
                      </td>
                    <td>@php 
                $string = str_replace('[', '',$value->week4)
                @endphp
                @foreach(explode(',', $string) as $info) 
                  {{$info[1]}}
                @endforeach
                      </td>
                    <td>
                      <a class="fa fa-edit" style="cursor: pointer;" data-toggle="modal" data-target="#exampleModal_{{$value->id}}"></a>
                      &nbsp;&nbsp;
                      <a class="fa fa-trash" style="cursor: pointer;" href="{{url('delete1/'.$value->id.'/working_day')}}"></a></td>
<div class="modal fade" id="exampleModal_{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <form>
    @csrf
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Working Day</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-12">
                <label for="name">Name</label>
                <input class="form-control" type="text" name="name" id="up_name_{{$value->id}}" value="{{$value->name}}" placeholder="Department Name">
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <label for="name">Week 1</label><br>
               
                @php
                $info=json_decode($value->week1);
                $week=array("Monday", "Tuesday", "Wednesday","Thursday","Friday","Saturday","Sunday");
                $len=sizeof($week);
                $len1=sizeof($info);
                for($i=0;$i<$len;$i++)
                {
                  $active='';
                  for($j=0;$j<$len1;$j++)
                  {
                  if($week[$i]==$info[$j])
                  {
                    $active='active';
                    break;
                  }
                  }
                  @endphp
                <button type="button" class="btn btn-outline-success {{$active}}" id="{{$week[$i].'_1_'.$value->id}}" name="week1_{{$value->id}}_[]" value="{{$week[$i]}}" onclick="active_btn(this.id);save_week(this.id,'week1_{{$value->id}}_',this.value,'{{$value->id}}')">{{$week[$i]}}</button>
                  @php
                }
                @endphp
              </div>
            </div>
             <div class="row">
              <div class="col-md-12">
                <label for="name">Week 2</label><br>
                @php
                $info=json_decode($value->week2);
                $week=array("Monday", "Tuesday", "Wednesday","Thursday","Friday","Saturday","Sunday");
                $len=sizeof($week);
                $len1=sizeof($info);
                for($i=0;$i<$len;$i++)
                {
                  $active='';
                  for($j=0;$j<$len1;$j++)
                  {
                  if($week[$i]==$info[$j])
                  {
                    $active='active';
                    break;
                  }
                  }
                  @endphp
                <button type="button" class="btn btn-outline-success {{$active}}" id="{{$week[$i].'_2_'.$value->id}}" name="week2_{{$value->id}}_[]" value="{{$week[$i]}}" onclick="active_btn(this.id);save_week(this.id,'week2_{{$value->id}}_',this.value,'{{$value->id}}')">{{$week[$i]}}</button>
                  @php
                }
                @endphp
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <label for="name">Week 3</label><br>
                @php
                $info=json_decode($value->week3);
                $week=array("Monday", "Tuesday", "Wednesday","Thursday","Friday","Saturday","Sunday");
                $len=sizeof($week);
                $len1=sizeof($info);
                for($i=0;$i<$len;$i++)
                {
                  $active='';
                  for($j=0;$j<$len1;$j++)
                  {
                  if($week[$i]==$info[$j])
                  {
                    $active='active';
                    break;
                  }
                  }
                  @endphp
                <button type="button" class="btn btn-outline-success {{$active}}" id="{{$week[$i].'_3_'.$value->id}}" name="week3_{{$value->id}}_[]" value="{{$week[$i]}}" onclick="active_btn(this.id);save_week(this.id,'week3_{{$value->id}}_',this.value,'{{$value->id}}')">{{$week[$i]}}</button>
                  @php
                }
                @endphp
              </div>
            </div>
           <div class="row">
              <div class="col-md-12">
                <label for="name">Week 4</label><br>
                @php
                $info=json_decode($value->week4);
                $week=array("Monday", "Tuesday", "Wednesday","Thursday","Friday","Saturday","Sunday");
                $len=sizeof($week);
                $len1=sizeof($info);
                for($i=0;$i<$len;$i++)
                {
                  $active='';
                  for($j=0;$j<$len1;$j++)
                  {
                  if($week[$i]==$info[$j])
                  {
                    $active='active';
                    break;
                  }
                  }
                  @endphp
                <button type="button" class="btn btn-outline-success {{$active}}" id="{{$week[$i].'_4_'.$value->id}}" name="week4_{{$value->id}}_[]" value="{{$week[$i]}}" onclick="active_btn(this.id);save_week(this.id,'week4_{{$value->id}}_',this.value,'{{$value->id}}')">{{$week[$i]}}</button>
                  @php
                }
                @endphp
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="update_working('{{$value->id}}')">Save changes</button>
      </div>
    </div>
  </div>
</form>
</div>
                  </tr>
                  @endforeach
                  </tbody>
                 
                </table>
              </div>
              <!-- /.card-body -->
            </div>
<script type="text/javascript">
    var week1=[];
    var week2=[];
    var week3=[];
    var week4=[];
    var final_list= new Array();

    // var final_list=[];
    var i;
  function active_btn(id,name) {
    console.log(id);
    var el=document.getElementById(id).classList.contains('active');
    console.log(el);
    if(el==true)
    {
    $('#'+id).removeClass('active');
    }else{
    $('#'+id).addClass('btn btn-outline-success active');
  }
}
function save_week(id,name,val,sid)
{
    var len=document.getElementsByName(name+'[]');
    console.log(name);
    if(name=='week1_'+sid+'_')
    {
      week1=[];
    for(i=0;i<len.length;i++)
    {
    var el2=document.getElementById(len[i].id).classList.contains('active');
    console.log(len[i].id);
      if(el2==true)
      {
        week1.push(len[i].value);
      }
    }
  }else if(name=='week2_'+sid+'_')
    {
      week2=[];
    for(i=0;i<len.length;i++)
    {
    var el2=document.getElementById(len[i].id).classList.contains('active');
      if(el2==true)
      {
        week2.push(len[i].value);
      }
    }
  } else if(name=='week3_'+sid+'_')
    {
      week3=[];
    for(i=0;i<len.length;i++)
    {
    var el2=document.getElementById(len[i].id).classList.contains('active');
      if(el2==true)
      {
        week3.push(len[i].value);
      }
    }
  } else if(name=='week4_'+sid+'_')
    {
      week4=[];
    for(i=0;i<len.length;i++)
    {
    var el2=document.getElementById(len[i].id).classList.contains('active');
      if(el2==true)
      {
        week4.push(len[i].value);
      }
    }
  }
  // final_list=[{week1:week1},{week2:week2},{week3:week3},{week4:week4}];
    console.log(week4);
  }
  function save_week1(id,name,val)
{
    var len=document.getElementsByName(name+'[]');
    if(name=='week_1')
    {
      week1=[];
    for(i=0;i<len.length;i++)
    {
    var el2=document.getElementById(len[i].id).classList.contains('active');
    // var cc=len[i].id;
      if(el2==true)
      {
        week1.push(len[i].value);
      }
    }
  }else if(name=='week_2')
    {
      week2=[];
    for(i=0;i<len.length;i++)
    {
    var el2=document.getElementById(len[i].id).classList.contains('active');
      if(el2==true)
      {
        week2.push(len[i].value);
      }
    }
  } else if(name=='week_3')
    {
      week3=[];
    for(i=0;i<len.length;i++)
    {
    var el2=document.getElementById(len[i].id).classList.contains('active');
      if(el2==true)
      {
        week3.push(len[i].value);
      }
    }
  } else if(name=='week_4')
    {
      week4=[];
    for(i=0;i<len.length;i++)
    {
    var el2=document.getElementById(len[i].id).classList.contains('active');
      if(el2==true)
      {
        week4.push(len[i].value);
      }
    }
  }
  // final_list=[{week1:week1},{week2:week2},{week3:week3},{week4:week4}];
    console.log(week1);
  }
function add_working() {
  var url = '{{ route("add_working")}}';
    var token = "{{ csrf_token()}}";
    console.log(week1);
    // console.log(JSON.stringify(final_list));
   $.ajax({
     type:"post",
     url: url,
     data:{'name':(document.getElementById('name').value),'week1':week1,'week2':week2,'week3':week3,'week4':week4,'_token':token},
     // dataType: 'json',
     success: function(response) {
      if(response.status==true)
      {
      console.log(response.msg);
      window.location.href='{{url('working_day')}}';
      }else{
        alert(response.msg);
      }
     }
   });
}

function update_working(id) {
  var url = '{{ route("update_workingday")}}';
    var token = "{{ csrf_token()}}";
    console.log(week1);
    // console.log(JSON.stringify(final_list));
   $.ajax({
     type:"post",
     url: url,
     data:{'name':(document.getElementById('up_name_'+id).value),'week1':week1,'week2':week2,'week3':week3,'week4':week4,'id':id,'_token':token},
     // dataType: 'json',
     success: function(response) {
      if(response.status==true)
      {
      console.log(response.msg);
      window.location.href='{{url('working_day')}}';
      }else{
        alert(response.msg);
      }
     }
   });
}
</script>
            @endsection