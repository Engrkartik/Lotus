<?php
include('include/header.php');
?>

<div class="page has-sidebar-left  height-full">
<header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon-group"></i>
                        Customers
                    </h4>
                </div>
            </div>
            <div class="row justify-content-between">
                <ul class="nav nav-material nav-material-white responsive-tab" id="v-pills-tab" role="tablist">
                    <li>
                        <a class="nav-link" id="v-pills-all-tab" href="custumers.php"><i class="icon icon-people"></i>All Customers</a>
                    </li>
                    <li class="float-right">
                        <a class="nav-link active"  href="add_cust.php" ><i class="icon icon-user-plus"></i> Add New Customer</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
<div class="container-fluid animatedParent animateOnce">
        <div class="animated fadeInUpShort">
            <div class="row my-3">
                <div class="col-md-7  offset-md-2">
                    <div class="card no-b  no-r">
                            <div class="card-body">
                                <h2 class="card-title" style="text-decoration: underline;">Customer Details</h2>
                                <form role="form" action="javascript:;" onsubmit="new1()" method="POST">
                                <div class="form-row">
                                    <div class="col-md-8">
                                        <div class="form-group m-0">
                                            <label class="col-form-label s-6">Owner First Name</label>
                                            <input id="first_name" placeholder="Enter First Name" class="form-control r-0 light s-6 " type="text" required="">
                                        </div>
                                        <br>
                                            <div class="form-group m-0">
                                            <label class="col-form-label s-6">Owner Last Name</label>
                                            <input id="last_name" placeholder="Enter Last Name" class="form-control r-0 light s-6 " type="text">
                                        </div>
                                        <br>

                                        <div class="form-row">
                                            <div class="form-group col-6 m-0">
                                                <label class="col-form-label s-12"><i class="icon-mobile-phone mr-2"></i>Mobile Number</label>
                                                <input id="mob_no" placeholder="Enter Mobile Number" class="form-control r-0 light s-6" type="number" onKeyPress="if(this.value.length==10) return false;" required="">
                                            </div>
                                            <div class="form-group col-6 m-0">
                                                <label class="col-form-label s-12"><i class="icon-phone2 mr-2"></i>Alternate Mobile number</label>
                                                <input id="alt_mob" placeholder="Enter Alternate Mobile Number" class="form-control r-0 light s-6" onKeyPress="if(this.value.length==10) return false;" type="number">
                                            </div>
                                        </div>
                                        <br>                                        
                                    </div>
                                    <div class="col-md-3 offset-md-1">
                                        <input hidden name="file" id="img" />
                                        <div class="dropzone dropzone-file-area pt-4 pb-4" id="fileUpload">
                                            <div class="dz-default dz-message">
                                                <span>Drop an image of Customer.</span>
                                                <div>(You can also click to open file browser.)</div>
                                            </div>
                                        </div>
                                    </div>

                                </div>                               
                                <div class="form-row">
                                    <div class="form-group col-8 m-0">
                                        <label class="col-form-label s-12"><i class="icon-map-marker mr-2"></i> Address</label>
                                        <textarea placeholder="Enter Address..." required="" id="address" class="form-control r-0 light s-12" required=""></textarea>  
                                    </div>
                                    <div class="form-group col-4 m-0">
                                        <label class="col-form-label s-12">City</label>
                                        <input type="select" class="form-control r-0 light s-12" id="city" required="">
                                    </div>
                                </div>
                                <br>
                                 <div class="form-row mt-1">
                                   <div class="form-group col-4 m-0">
                                        <label class="col-form-label s-12"><i class="icon-map-marker mr-2"></i>State</label>
                                        
                                        <select class="form-control" id="state" onchange="dist(this.value)">
                                          <option value="00">Select State</option>
                                          <?php
                                          $chk=mysqli_query($con,"SELECT state FROM `districts` GROUP BY state ORDER BY state ASC");
                                          while($row=mysqli_fetch_assoc($chk)) {
                                            ?>
                                            <option value="<?=$row['state']?>"><?php echo $row['state'];?></option>
                                          <?php }?>
                                        </select>
                                    </div>
                                 	<div class="form-group col-4 m-0">
                                        <label class="col-form-label s-12"><i class="icon-map-marker mr-2"></i>District</label>
                                        <select class="form-control" id="district">
                                          <option value="00">Select District</option>
                                        </select>
                                    </div>
                                   
                                    <div class="form-group col-4 m-0">
                                        <label class="col-form-label s-12"><i class="icon-fiber_pin mr-2"></i>Pin Code</label>
                                        <input  onKeyPress="if(this.value.length==6) return false;" id="pin_code" placeholder="Enter Pin code" required="" class="form-control r-0 light s-12 " type="number">
                                        <br>
                                    </div>
                                    
                                    <div class="form-group col-6 m-0">
                                        <label class="col-form-label s-12"><i class="icon-envelope-o mr-2"></i>Email Id</label>
                                        <input id="email" placeholder="user@email.com" class="form-control r-0 light s-12 " type="email">
                                    </div>
                                </div>
                            <hr>
                            <div class="card-body">
                                <h5 class="card-title">Business Details</h5>
                                <div class="form-row">
                                	<div class="form-group col-6 m-0">
                                        <label class="col-form-label s-12">Firm Name</label>
                                        <input id="firm_name" placeholder="Enter Firm Name" class="form-control r-0 light s-12 " type="text" required="">
                                    </div>
                                   
                                </div>
                              
                            </div>
                            <hr>
                            <div class="card-body">
                                <button type="submit" class="btn btn-primary btn-lg"><i class="icon-save mr-2"></i>Save</button>
                            </div>
                             </form>
                                </div>
                            </div>
                        </div>
                </div>
                </div>
            </div>
        </div>
<script type="text/javascript">
  function valid(str) {
 var gstinformat = new RegExp('^[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[1-9A-Z]{1}Z[0-9A-Z]{1}$');

    if (gstinformat.test(str)) {
     return true;
    } else {
        alert('Please Enter Valid GSTIN Number');
        $(".gst_no").val('');
        $(".gst_no").focus();
    }
}
  function new1(){

        var fd = new FormData();
        var files = $('#img')[0].files[0];
        fd.append('file',files);
        // alert(fd);
        $.ajax({
            url: 'save_cust.php',
            type: 'post',
            data: fd,
            contentType: false,
            processData: false,
             async: true,
            success: function(response){
              // alert(response);
              // var path=response;
              save_cust(response);
                }
        });
      }
  function save_cust(path) {
        // alert(path);
        var loader=document.getElementById('load');
        loader.style.display='';
        var first_name=document.getElementById('first_name').value;
        var last_name=document.getElementById('last_name').value;
        var mob_no=document.getElementById('mob_no').value;
        var bus_type=document.getElementById('bus_type').value;
        var email_id=document.getElementById('email').value;
        var firm_name=document.getElementById('firm_name').value;
        var address=document.getElementById('address').value;
        var state=document.getElementById('state').value;
        var city=document.getElementById('city').value;
        var pin_code=document.getElementById('pin_code').value;
        var alt_no=document.getElementById('alt_mob').value;
        var gst_type='U';
        var gst_no=document.getElementById('gst_no').value;
        var country="INDIA";
        var district=document.getElementById('district').value;
        var img=path;
        var admin='<?php echo $admin_id;?>';
        var type="Add";
//         var mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
//         if(!empty(email_id))
//         {
// if(email_id.match(mailformat))
// {
// alert("Valid email address!");
// $('.email').focus();
// return true;
// }
// else
// {
// alert("You have entered an invalid email address!");
// $('.email').focus();
// return false;
// }
// }
        if(state=='00')
        {

          loader.style.display='none';
        alert("Select State..!!");
      }else if(district=='00')
      {
          loader.style.display='none';

        alert("Select District..!!");

      }else{
        $.ajax({
            type:'POST',
            url:'save_cust.php',
            data:{'first_name':first_name,'last_name':last_name,'mob_no':mob_no,'email_id':email_id,'firm_name':firm_name,'address':address,'state':state,'city':city,'pin_code':pin_code,'gst_type':gst_type,'gst_no':gst_no,'bus_type':bus_type,'country':country,'type':type,'admin':admin,'district':district,'img':path,'alt_no':alt_no},
            success:function (res) {    
                // alert(res);

                if(res=="User Register.")
                {
                    loader.style.display='none';
                    window.location.href="custumers.php";
                }
            }
        });
    
    }
    }

function dist(state) {
  var type="dist";
  // alert(state);
  $.ajax({
    type:'POST',
    url:'save_data.php',
    data:{'type':type,'state':state},
    success:function(res)
    {
    $('#district').html(res);
    }
  });
}
 
</script>
    <?php
    include('include/footer.php');
    ?>