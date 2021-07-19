<?php
include('include/header.php');
$c_id=$_GET['cust_id'];
$query=mysqli_query($con,"SELECT * FROM `company_reg` WHERE id='$c_id'");
$row=mysqli_fetch_assoc($query);
$name=explode(' ',$row['OWNER_NAME']);
$f_name=$name[0];
$l_name=$name[1];
$image=$row['image'];
?>
   <div class="se-pre-con" id="load"></div>
 <div class="col-md-12">
            <!-- general form elements disabled -->
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Edit Customer Detail</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form role="form" action="javascript:;" onsubmit="new1()" method="POST">
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Profile Image</label><label style="color: red;">*</label>
                        <img src="<?=$row['image']?>" style="width: 50px;height: 50px;">
                      </div>
                    </div>
                   
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Owner First Name</label><label style="color: red;">*</label>
                        <input type="text" class="form-control" id="first_name" value="<?=$f_name?>" required="">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Owner Last Name</label>
                        <input type="text" class="form-control" id="last_name" value="<?=$l_name?>" >
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Mobile Number</label><label style="color: red;">*</label>
                        <input type="number" class="form-control" onKeyPress="if(this.value.length==10) return false;" id="mob_no" maxlength="10"  value="<?=$row['CONTACT_NO']?>"  required="" onkeydown="javascript: return event.keyCode === 8 ||
event.keyCode === 46 ? true : !isNaN(Number(event.key))">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Alternate Mobile number</label>
                        <input type="number" class="form-control" onKeyPress="if(this.value.length==10) return false;" id="alt_mob" value="<?=$row['ALT_NO']?>" onkeydown="javascript: return event.keyCode === 8 ||
event.keyCode === 46 ? true : !isNaN(Number(event.key))">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Firm Name</label><label style="color: red;">*</label>
                        <input type="text" class="form-control" id="firm_name" value="<?=$row['FIRM_NAME']?>"  required="">
                      </div>
                    </div>
                   <!--  <div class="col-sm-6">
                      <div class="form-group">
                        <label>Country</label>
                        <input type="text" class="form-control" id="country" value="<?=$row['COUNTRY']?>"  required="">
                      </div>
                    </div>
                  </div>
                  <div class="row"> -->
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Address</label><label style="color: red;">*</label>
                        <textarea class="form-control" rows="3" id="address" required=""><?php echo $row['ADDRESS'];?></textarea>
                      </div>
                      
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>City</label><label style="color: red;">*</label>
                        <input type="text" class="form-control" id="city" value="<?=$row['CITY']?>"  required="">
                      </div>
                    </div>
                  <!-- </div>
                  <div class="row">
                    -->
                    <div class="col-sm-6">
                      <!-- textarea -->
                      <div class="form-group">
                        <label>State</label><label style="color: red;">*</label>
                        <select class="form-control" id="state" onchange="dist(this.value)">
                          <option value="00">Select State</option>
                          <?php
                          $chk=mysqli_query($con,"SELECT state FROM `districts` GROUP BY state ORDER BY state ASC");

                          while($row1=mysqli_fetch_assoc($chk)) {
                            
                          
                          ?>
                          <option value="<?=$row['STATE']?>" <?php if($row['STATE']==$row1['state']){echo 'selected';}?> ><?php echo $row1['state'];?></option>
                        <?php }?>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>District</label><label style="color: red;">*</label>
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
                    </div>
                  <!-- </div>
                  <div class="row"> -->
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Email-Id</label>
                        <input type="email" class="form-control" id="email" value="<?=$row['EMAIL_ID']?>" >
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Pin Code</label><label style="color: red;">*</label>
                        <input type="text" class="form-control" id="pin_code" value="<?=$row['PIN_CODE']?>"  required="">
                      </div>
                    </div>
                  <!-- </div>

                  <div class="row"> -->
                    <div class="col-sm-6">
                      <!-- select -->
                      <div class="form-group">
                        <label>Business Type</label><label style="color: red;">*</label>
                        <select class="form-control" id="bus_type" required="">
                          <option value="W" <?php if($row['BUSINESS']=='W'){echo 'selected';}?> >Wholesale</option>
                          <option value="R" <?php if($row['BUSINESS']=='R'){echo 'selected';}?> >Retail</option>
                          </select>
                      </div>
                    </div>
                    <!-- <div class="col-sm-6">
                      <div class="form-group">
                        <label>GST Type</label>
                        <select class="form-control" id="gst_type" required="">
                          <option value="R" <?php if($row['GST_TYPE']=='R'){echo 'selected';}?> >Register</option>
                          <option value="U" <?php if($row['GST_TYPE']=='U'){echo 'selected';}?> >Un-Register</option>
                          </select>
                      </div>
                    </div> -->
                  <!-- </div>
                  <div class="row"> -->
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>GSTIN/UIN Number</label>
                        <input type="text" class="form-control gst_no" id="gst_no" value="<?=$row['GSTIN_NO']?>" >
                      </div>
                    </div>
                  <!-- </div> -->
                  <div class="col-sm-6">
                  <div class="form-group">
                    <!-- <label for="customFile">Custom File</label> -->
                    <label>Profile Picture</label>

                    <div class="custom-file">
                      <input type="file" class="form-control" id="img">
                      <!-- <label class="custom-file-label">Choose file</label> -->
                    </div>
                  </div>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group">
                    <div class="col-sm-12">
                      <button type="submit" class="btn btn-primary">Save Changes</button>
                      <button type="reset" class="btn btn-info">Clear</button>
                    </div>
                  </div>
                </div><br><br>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            
              </div>
<script type="text/javascript">
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
    if(gst_no!="")
{
    if (!gstinformat.test(gst_no)) {
        loader.style.display='none';

        alert('Please Enter Valid GSTIN Number');
        // $(".gst_no").val('');
        document.getElementById('gst_no').focus();
        return false;
      }
}

       $.ajax({
            type:'POST',
            url:'save_data.php',
            data:{'first_name':first_name,'last_name':last_name,'mob_no':mob_no,'email_id':email_id,'firm_name':firm_name,'address':address,'state':state,'city':city,'pin_code':pin_code,'gst_type':gst_type,'gst_no':gst_no,'bus_type':bus_type,'country':country,'type':type,'admin':admin,'district':district,'c_id':c_id,'alt_mob':alt_mob,'image':path},
            success:function(res) {    
                // alert(res);
                if(res=="User Register.")
                {
                    loader.style.display='none';
                    window.location.href="cust.php";

                }else{
                  alert(res);
                }
            }
        });
   
      
    
    
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

  ////////////////////////loader///////////////////////////////////////////////////
$(window).load(function() {
    // Animate loader off screen
    $(".se-pre-con").fadeOut("slow");;
  });
  /////////////////////////////////end loader////////////////////////////////////
</script>
          <?php
include ('include/footer.php');
          ?>