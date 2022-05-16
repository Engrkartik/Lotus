<?php
include('include/header.php');
?>
<style>
/*/////////////////////////////loader/////////////////////////////////////////////////////*/
.no-js #loader { display: none;  }
.js #loader { display: block; position: absolute; left: 100px; top: 0; }
.se-pre-con {
  position: fixed;
  left: 0px;
  top: 0px;
  width: 100%;
  height: 100%;
  z-index: 9999;
  background: url(images/Preloader_2.gif) center no-repeat #fff;
}
/*/////////////////////////////End loader/////////////////////////////////////////////////////*/
  </style>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>
   <div class="se-pre-con" id="load"></div>
 <div class="col-md-12">
            <!-- general form elements disabled -->
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Customer Detail</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form role="form" action="javascript:;" onsubmit="new1()" method="POST">
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Owner First Name</label><label style="color: red">*</label>
                        <input type="text" class="form-control" id="first_name" placeholder="Enter ..." required="">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Owner Last Name</label>
                        <input type="text" class="form-control" id="last_name" placeholder="Enter ...">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Mobile Number</label><label style="color: red">*</label>
                        <input type="number" class="form-control" id="mob_no" onKeyPress="if(this.value.length==10) return false;" placeholder="Enter ..." onkeydown="javascript: return event.keyCode === 8 || event.keyCode === 46 ? true : !isNaN(Number(event.key))"  required="">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Alternate Mobile number</label>
                        <input type="number" class="form-control" id="alt_mob" onKeyPress="if(this.value.length==10) return false;" placeholder="Enter ..." onkeydown="javascript: return event.keyCode === 8 || event.keyCode === 46 ? true : !isNaN(Number(event.key))">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Firm Name</label><label style="color: red">*</label>
                        <input type="text" class="form-control" id="firm_name" placeholder="Enter ..." required="">
                      </div>
                    </div>
                   <!--  <div class="col-sm-6">
                      <div class="form-group">
                        <label>Country</label><label style="color: red">*</label>
                        <input type="text" class="form-control" id="country" placeholder="Enter ..." required="">
                      </div>
                    </div>
                  </div>
                  <div class="row"> -->
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Address</label><label style="color: red">*</label>
                        <textarea class="form-control" rows="3" id="address" placeholder="Enter ..." required=""></textarea>
                      </div>
                      
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>City</label><label style="color: red">*</label>
                        <input type="text" class="form-control" id="city" placeholder="Enter ..." required="">
                      </div>
                    </div>
                 <!--  </div>
                  <div class="row">
                    -->
                    <div class="col-sm-6">
                      <!-- textarea -->
                      <div class="form-group">
                        <label>State</label><label style="color: red">*</label>
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
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>District</label><label style="color: red">*</label>
                        <select class="form-control" id="district">
                          <option value="00">Select District</option>
                        </select>
                      </div>
                    </div>
                  <!-- </div>
                  <div class="row"> -->
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Email-Id</label>
                        <input type="email" class="form-control email" id="email" placeholder="Enter ...">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Pin Code</label><label style="color: red">*</label>
                        <input type="number" onKeyPress="if(this.value.length==6) return false;" class="form-control" id="pin_code" placeholder="Enter ..." required="">
                      </div>
                    </div>
                  <!-- </div>

                  <div class="row"> -->
                    <div class="col-sm-6">
                      <!-- select -->
                      <div class="form-group">
                        <label>Business Type</label><label style="color: red">*</label>
                        <select class="form-control" id="bus_type" required="">
                          <option value="W" selected="">Wholesale</option>
                          <option value="R">Retail</option>
                          </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>GSTIN/UIN Number</label>
                        <input type="text" class="form-control gst_no" id="gst_no" placeholder="Enter ..." onchange="valid(this.value)">
                      </div>
                    </div>
                  <!-- </div> -->
                  <div class="col-sm-6">
                  <div class="form-group">
                    <!-- <label for="customFile">Custom File</label> -->
                    <label>Profile Picture</label>

                    <!-- <div class="form-group"> -->
                      <input type="file" class="form-control"  id="img">
                      <!-- <label>Choose file</label> -->
                    <!-- </div> -->
                  </div>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group">
                    <div class="col-sm-12">
                      <button type="submit" class="btn btn-primary">Save</button>
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
                    // loader.style.display='none';
                    window.location.href="cust.php";
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
  ////////////////////////loader///////////////////////////////////////////////////

  /////////////////////////////////end loader////////////////////////////////////
</script>
<?php
  include ('include/footer.php');
?>