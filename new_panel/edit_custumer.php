<?php
include('include/header.php');
$c_id=$_GET['cust_id'];
$query=mysqli_query($con,"SELECT * FROM `company_reg` WHERE id='$c_id'");
$row=mysqli_fetch_assoc($query);
$querys=mysqli_query($con,"SELECT * FROM `admin` WHERE id='$admin_id'");
$rows=mysqli_fetch_assoc($querys);
$name=explode(' ',$row['OWNER_NAME']);
$f_name=$name[0];
$l_name=$name[1];
$image=$row['image'];
?>

<div class="page has-sidebar-left  height-full">
<header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon-group"></i>
                       Edit Customer Details
                    </h4>
                </div>
            </div>
        </div>
    </header>
<div class="container-fluid animatedParent animateOnce">
        <div class="animated fadeInUpShort">
            <div class="row my-3">
                <div class="col-md-7  offset-md-2">
                    <form role="form" action="javascript:;" onsubmit="new1()" method="POST">
                        <div class="card no-b  no-r">
                            <div class="card-body">
                                <h2 class="card-title" style="text-decoration: underline;">Customer Details</h2>
                                <div class="form-row">
                                    <div class="col-md-8">
                                        <div class="form-group m-0">
                                            <label class="col-form-label s-6">Owner First Name</label>
                                            <input id="first_name" placeholder="Enter First Name" class="form-control r-0 light s-6 " type="text" value="<?=$f_name?>" required="">
                                        </div>
                                        <br>
                                            <div class="form-group m-0">
                                            <label class="col-form-label s-6">Owner Last Name</label>
                                            <input id="last_name" placeholder="Enter Last Name" class="form-control r-0 light s-6 " type="text" value="<?=$l_name?>">
                                        </div>
                                        <br>

                                        <div class="form-row">
                                            <div class="form-group col-6 m-0">
                                                <label class="col-form-label s-12"><i class="icon-mobile-phone mr-2"></i>Mobile Number</label>
                                                <input id="mob_no" class="form-control r-0 light s-6" type="text" maxlength="10" minlength="10" value="<?=$row['CONTACT_NO']?>" required="">
                                            </div>
                                            <div class="form-group col-6 m-0">
                                                <label class="col-form-label s-12"><i class="icon-phone2 mr-2"></i>Alternate Mobile number</label>
                                                <input id="alt_mob" class="form-control r-0 light s-6" maxlength="10" value="<?=$row['ALT_NO']?>" type="text">
                                            </div>
                                        </div>
                                        <br>                                        
                                    </div>
                                    <div class="col-md-3 offset-md-1">
                                        <input hidden name="file" id="img" />
                                        <img src="<?=$row['image']?>" >
                                      
                                    </div>

                                </div>

                               
                                <div class="form-row">
                                    <div class="form-group col-8 m-0">
                                        <label class="col-form-label s-12"><i class="icon-map-marker mr-2"></i> Address</label>
                                        <textarea id="address" class="form-control r-0 light s-12" required=""><?php echo $row['ADDRESS'];?></textarea>
                                        
                                    </div>

                                    <div class="form-group col-4 m-0">
                                        <label class="col-form-label s-12">City</label>
                                        <input type="text" class="form-control r-0 light s-12" id="city"  value="<?=$row['CITY']?>" required="">
                                    </div>
                                </div>
                                <br>
                                 <div class="form-row">
                                   <div class="form-group col-4 m-0">
                                        <label class="col-form-label s-12"><i class="icon-map-marker mr-2"></i>State</label>
                                        
                                        <select class="form-control" id="state" onchange="dist(this.value)">
                                          <option value="00">Select State</option>
                                          <?php
                          $chk=mysqli_query($con,"SELECT state FROM `districts` GROUP BY state ORDER BY state ASC");

                          while($row1=mysqli_fetch_assoc($chk)) {
                            
                          
                          ?>
                          <option value="<?=$row1['state']?>" <?php if($row['STATE']==$row1['state']){echo 'selected';}?> ><?php echo $row1['state'];?></option>
                        <?php }?>
                                        </select>
                                    </div>
                                 	<div class="form-group col-4 m-0">
                                        <label for="district" class="col-form-label s-12"><i class="icon-map-marker mr-2"></i>District</label>

                                        <select class="form-control" id="district">
                                        <?php
                          $state=$row['STATE'];
                          $chk=mysqli_query($con,"SELECT district FROM `districts` where state='$state' ORDER BY district ASC");

                          while($row1=mysqli_fetch_assoc($chk)) {
                            
                          
                          ?>
                          <option value="<?=$row1['district']?>" <?php if($row['DISTRICT']==$row1['district']){echo 'selected';}?> ><?php echo $row1['district'];?></option>
                        <?php }?>
                                        </select>
                                    </div>
                                   
                                    <div class="form-group col-4 m-0">
                                        <label class="col-form-label s-12"><i class="icon-fiber_pin mr-2"></i>Pin Code</label>
                                        <input id="pin_code" required="" class="form-control r-0 light s-12 " type="number"  value="<?=$row['PIN_CODE']?>">
                                        <br>
                                    </div>
                                    
                                    <div class="form-group col-6 m-0">
                                        <label class="col-form-label s-12"><i class="icon-envelope-o mr-2"></i>Email Id</label>
                                        <input id="email" class="form-control r-0 light s-12 " type="email" value="<?=$row['EMAIL_ID']?>">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="card-body">
                                <h5 class="card-title">Business Details</h5>
                                <div class="form-row">
                                	<div class="form-group col-6 m-0">
                                        <label class="col-form-label s-12">Firm Name</label>
                                        <input id="firm_name" value="<?=$row['FIRM_NAME']?>" class="form-control" type="text" required="">
                                    </div>
                                    <div class="form-group col-6 m-0">
                                        <label class="col-form-label s-12">GSTIN/UIN Number</label>
                                        <input id="gst_no" class="form-control r-0 light s-12 " type="text" value="<?=$row['GSTIN_NO']?>">
                                    </div>
                                    
                                </div>
                                <br>
                                 <div class="form-row">
                                   <div class="form-group col m-0">
                                        <label class="col-form-label s-12">Business Type*</label>
                                        <select class="form-control" id="bus_type" required="">
                          <option value="W" <?php if($row['BUSINESS']=='W'){echo 'selected';}?> >Wholesale</option>
                          <option value="R" <?php if($row['BUSINESS']=='R'){echo 'selected';}?> >Retail</option>
                          </select>
                                    </div> 
                                </div>

                                
                            </div>
                            
                            <hr>
                            <div class="card-body">
                                <button type="submit" class="btn btn-primary btn-lg">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
    </div>
    </div>
</div>
<script>
   function new1(){

        var fd = new FormData();
        var files = $('#img')[0].files[0];
        fd.append('file',files);
        var iimg='<?=$image?>';
        var count=document.getElementById('img').files.length;
        if(count>0)
        {
        // alert(document.getElementById('img').files.length);
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
      else{
              save_cust(iimg);

      }
      }
  function save_cust(path) {
        // alert("Hello");
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
        // var gst_type=document.getElementById('gst_type').value;
        var gst_type='U';
        
        var gst_no=document.getElementById('gst_no').value;
        var country="INDIA";
        var district=document.getElementById('district').value;
        var alt_mob=document.getElementById('alt_mob').value;

        var c_id='<?=$c_id?>';


        // alert(first_name);
        var admin='<?php echo $admin_id;?>';
        var type="up";
        var gstinformat = new RegExp('^[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[1-9A-Z]{1}Z[0-9A-Z]{1}$');

    if (gstinformat.test(gst_no)) {
       $.ajax({
            type:'POST',
            url:'save_data.php',
            data:{'first_name':first_name,'last_name':last_name,'mob_no':mob_no,'email_id':email_id,'firm_name':firm_name,'address':address,'state':state,'city':city,'pin_code':pin_code,'gst_type':gst_type,'gst_no':gst_no,'bus_type':bus_type,'country':country,'type':type,'admin':admin,'district':district,'c_id':c_id,'alt_mob':alt_mob,'image':path},
            success:function(res) {    
                // alert(res);
                if(res=="User Register.")
                {
                    loader.style.display='none';
                    window.location.href="custumers.php";

                }else{
                  alert(res);
                }
            }
        });
    } else {
        loader.style.display='none';

        alert('Please Enter Valid GSTIN Number');
        // $(".gst_no").val('');
        $(".gst_no").focus();
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