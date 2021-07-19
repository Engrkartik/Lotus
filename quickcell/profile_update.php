<?php
include('include/header.php');
$query=mysqli_query($con,"SELECT * FROM `admin` WHERE id='$admin_id'");
$row=mysqli_fetch_assoc($query);
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>
<style type="text/css">
  input[type="file"] {
  display: block;
}
.imageThumb {
  max-height: 75px;
  border: 2px solid;
  padding: 1px;
  cursor: pointer;
}
.pip {
  display: inline-block;
  margin: 10px 10px 0 0;
}
.remove {
   cursor: pointer;
}
.remove:hover {
  background: white;
  color: grey;
}
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
/*vvvv*/
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
input[type=number]::-webkit-inner-spin-button, 
input[type=number]::-webkit-outer-spin-button {  

   opacity: 1;

}
</style>
 <div id="load" class="se-pre-con"></div>

 <div class="col-md-12">
 
            <!-- general form elements disabled -->
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Profile Update</h3>
              </div>
          </div>
              <!-- /.card-header -->
              <div class="row" >
                <div class="col-md-12">
                <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">General</h3>
              </div>
          </div>
        </div>
      </div>
              <div class="card-body">
                <form role="form" action="profile_update.php" method="POST" enctype="multipart/form-data">
                <div class="row" >
                 
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Name</label>
                     <input type="text" id="username" class="form-control" value="<?=$row['username']?>">
                  </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                      <div class="field">
                        <label>Email-ID</label>
                        <input type="text" id="email" class="form-control" value="<?=$row['email']?>">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                    <div class="col-sm-6" >
                      <div class="form-group">
                        <div class="field">
                        <label>Phone Number</label>
                        <input type="number" id="mob_no" class="form-control" value="<?=$row['mobile']?>"><br>
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModal">Change Number</button>
                      </div>
                      </div>
                    </div>
                    <div class="col-sm-6" >
                      <div class="form-group">
                        <div class="field">
                        <label>Business Type</label>
                        <select class="form-control" id="b_type">
                        	<option value="00" selected="" disabled="">Select Option</option>
                          <option value="W" <?php if($row['business_type']=='W'){ echo 'selected="selected"';}?> >Wholesale</option>
                          <option value="R" <?php if($row['business_type']=='R'){ echo 'selected="selected"';}?> >Retailer</option>
                        </select>
                      </div>
                      </div>
                    </div>
                 </div>
                 <div class="row">
                    <div class="col-sm-6" >
                      <div class="form-group">
                        <div class="field">
                        <label>Who Can See Your Listed Product ?</label>
                        <select class="form-control" id="access">
                          <option value="00" selected="" disabled="">Select Option</option>
                          <option value="All" <?php if($row['access']=='All'){ echo 'selected="selected"';}?> >Open To All</option>
                          <option value="Register" <?php if($row['access']=='Register'){ echo 'selected="selected"';}?> >Register Customers only</option>
                        </select>
                      </div>
                      </div>
                    </div>
                 </div>
             </form>
         </div>
         <div class="row">
          <div class="col-md-12">
                <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Inventory</h3>
              </div>
          </div>
        </div>
      </div>
              <div class="card-body">
                
                <div class="row">
                    <div class="col-sm-12" >
                      <div class="form-group">
                        <div class="field">
                        <label>Auto stock reduce qty</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="checkbox" data-toggle="toggle" class="form-control" id="auto_stock" onchange="auto_stock_fun()" >
                      </div>
                      </div>
                    </div>
                    
                 </div>
             
         </div>
           <div class="row">
            <div class="col-md-12">
                <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Order</h3>
              </div>
          </div>
        </div>
      </div>
              <div class="card-body">
                
                <div class="row">
                    <div class="col-sm-6" >
                      <div class="form-group">
                        <div class="field">
                        <label>New Order placed notification</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="checkbox" data-toggle="toggle" class="form-control" id="notification" <?php if($row['notification']=='on'){ echo 'checked="checked"';}?> >
                      </div>
                      </div>
                    </div> 
                 </div><br>
                 <div class="row">
                    <div class="col-sm-6" >
                      <div class="form-group">
                        <div class="field">
                        <label>Ask for shipping address</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="checkbox" data-toggle="toggle" class="form-control" id="shipping_add" <?php if($row['shipping']=='on'){ echo 'checked="checked"';}?>>
                      </div>
                      </div>
                    </div> 
                 </div><br>
                 <div class="row">
                    <div class="col-sm-6" >
                      <div class="form-group">
                        <div class="field">
                        <label>Ask for payment details</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="checkbox" data-toggle="toggle" class="form-control" id="payment_det"  <?php if($row['payment_det']=='on'){ echo 'checked="checked"';}?>>
                      </div>
                      </div>
                    </div> 
                 </div><br>
                 <div class="row">
                    <div class="col-sm-12" >
                      <div class="form-group">
                        <div class="field">
                        	<button class="btn btn-primary" type="button" onclick="save_updation()">Save</button>
                        	<a href="profile_update.php"><button class="btn btn-secondary" type="button">Reset</button></a>
                      </div>
                      </div>
                    </div> 
                 </div><br>
         </div>

     </div>
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Change Number</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-6">
                <label>New Number</label>
                <input type="number" id="new_number" class="form-control">
              </div>
              <div class="col-md-3" style="margin-top: 22px;">
                <button class="btn btn-success" type="button" onclick="generate_otp()" id="g_otp">Generate OTP</button>
                <p id="timeLeft" style="color: red;"></p>
              </div>
            </div><br>
            <div class="row" style="display: none;" id="otp_row">
              <div class="col-md-6">
                <label>OTP</label>
                <input type="number" id="otp" class="form-control">
              </div>
              <div class="col-md-3" style="margin-top: 22px;">
                <button class="btn btn-success" type="button" onclick="verify_otp()">Update Number</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!-- ////////////////////////////////////////////////////////////////////////////////////// -->
<script type="text/javascript" src="jquery.js"></script>          
<script type="text/javascript">
  var load=document.getElementById('load');
    // Check if the page has loaded completely                                         
function generate_otp() {
  load.style.display='';
  var g_otp=document.getElementById('g_otp');
  var new_number=document.getElementById('new_number').value;
  var type="otp";
  if(new_number=="")
  {
  load.style.display='none';
    document.getElementById('new_number').focus();
    return false;
  }else{
  g_otp.style.display='none';
  document.getElementById('otp_row').style.display='';

  // alert(new_number);
  $.ajax({
    type:'POST',
    url:'update_profile.php',
    data:{'new_number':new_number,'type':type},
    success:function(res) {
      // alert(res);
  load.style.display='none';
  document.getElementById('otp').focus();
  return false;

    }
  });
  setTimeout (function(){
        g_otp.style.display='';
        },30000);

        var countdownNum = 30;
        incTimer();

        function incTimer(){
        setTimeout (function(){
            if(countdownNum != 0){
            countdownNum--;
            document.getElementById('timeLeft').innerHTML = 'Re-generate OTP after: ' + countdownNum + ' seconds';
            incTimer();
            } else {
            document.getElementById('timeLeft').innerHTML = '';
            g_otp.innerHTML="Re-generate OTP";
            g_otp.style.display='';

            }
        },1000);
        }
}
}
 
 function verify_otp() {
   var otp=document.getElementById('otp').value;
   var new_number=document.getElementById('new_number').value;
  load.style.display='';

   var type="verify";
   if(otp=="")
   {
    load.style.display='none';
    document.getElementById('otp').focus();
    return false;
   }else{
    $.ajax({
      type:'POST',
      url:'update_profile.php',
      data:{'new_number':new_number,'otp':otp,'type':type},
      success:function(res) {
        if(res!=1)
        {
        load.style.display='none';
        alert(res);
        document.getElementById('otp').focus();
        return false;
        }else{
        load.style.display='none';
        document.getElementById('mob_no').value=new_number;
        }
      }
    });
   }
 }
var auto_stock="";
function auto_stock_fun() {
	var r = confirm("This will reflect in all your product. Press 'OK' if you want to continue.");
	var type="auto_stock";
if (r == true) {
	var auto=document.getElementById('auto_stock');
	if(auto.checked)
	{
		auto_stock='on';
	}
	else
	{
		auto_stock='off';
	}
  	$.ajax({
 		type:'POST',
 		url:'update_profile.php',
 		data:{'type':type,'auto_stock':auto_stock},
 		success:function(res) {
 			
 		}
 	});
}
}

 function save_updation() {
 	var notification,shipping_add,payment_det;
 	var username=document.getElementById('username').value;
 	var email=document.getElementById('email').value;
 	var b_type=document.getElementById('b_type').value;
 	var access=document.getElementById('access').value;
 	var notif=document.getElementById('notification');
 	var ship_add=document.getElementById('shipping_add');
 	var pay_det=document.getElementById('payment_det');
 	var type="full_up";
 	
 	if(notif.checked)
 	{
 		notification='on';
 	}else{
 		notification='off';
 	}
 	if(ship_add.checked)
 	{
 		shipping_add='on';
 	}else{
 		shipping_add='off';
 	}
	if(pay_det.checked)
 	{
 		payment_det='on';
 	}else{
 		payment_det='off';
 	}
 	$.ajax({
 		type:'POST',
 		url:'update_profile.php',
 		data:{'type':type,'username':username,'email':email,'b_type':b_type,'access':access,'notification':notification,'shipping_add':shipping_add,'payment_det':payment_det},
 		success:function(res) {
 			if(res==1)
 			{
 			window.location.href="profile_update.php";
 			}else{
 				alert(res);
 			}
 		}
 	});
 }
$(window).load(function() {
    // Animate loader off screen
    $(".se-pre-con").fadeOut("slow");
  });
</script>
<?php
  include ('include/footer.php');
?>