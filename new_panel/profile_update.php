<?php

include('include/header.php');
$query=mysqli_query($con,"SELECT * FROM `admin` WHERE id='$admin_id'");
$row=mysqli_fetch_assoc($query);
?>

<div class="page has-sidebar-left  height-full">
<header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon-user"></i>
                        User Profile
                    </h4>
                </div>
            </div>   
        </div>
    </header>
<div class="container-fluid animatedParent animateOnce">
        <div class="animated fadeInUpShort">
            <div class="row my-3">
                <div class="col-md-7  offset-md-2">
                    <form action="profile_update.php" method="POST" enctype="multipart/form-data">
                        <div class="card no-b  no-r">
                            <div class="card-body">
                                <h2 class="card-title" style="text-decoration: underline;">General</h2>
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <div class="form-row">
                                            <div class="form-group col-6 m-0">
                                            <label for="name" class="col-form-label s-6">Name</label>
                                            <input type="text" id="username" class="form-control r-0 light s-6 " value="<?=$row['username']?>"> 
                                        </div>
                                              <div class="form-group col-6 m-0">
                                            <label for="name" class="col-form-label s-6">Email</label>
                                            <input type="email" id="email" class="form-control r-0 light s-6" value="<?=$row['email']?>">
                                        </div>
                                        </div>
                                        <br>

                                        <div class="form-row">
                                            <div class="form-group col-6 m-0">
                                                <label for="mobile" class="col-form-label s-12"><i class="icon-mobile-phone mr-2"></i>Mobile Number</label>
                                                <input type="number" id="mob_no" class="form-control r-0 light s-6" value="<?=$row['mobile']?>">
                                                <br>
                                                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">Change Number</button>
                                            </div>
                                            <div class="form-group col-6 m-0">
                                                <label class="col-form-label s-12"><i class="icon-business_center mr-2"></i>Business Type</label>
                                                <select class="form-control r-0 light s-12" id="b_type">
                                                	<option value="00" selected="" disabled="">Select Option</option>
                                                	<option value="W" <?php if($row['business_type']=='W'){ echo 'selected="selected"';}?> >Wholesale</option>
                                                	<option value="R" <?php if($row['business_type']=='R'){ echo 'selected="selected"';}?> >Retailer</option>
                                                </select>
                                                
                                            </div>
                                        </div>
                                        <br>                                        
                                    </div>
                                </div>

                               
                                <div class="form-row">
                                    <div class="form-group col-8 m-0">
                                        <label for="address"  class="col-form-label s-12"><i class="icon-map-marker mr-2"></i>Who Can See Your Listed Product ?</label>
                                        <select class="form-control r-0 light s-12" id="access">
                                        <option value="00" selected="" disabled="">Select Option</option>
                                        <option value="All" <?php if($row['access']=='All'){ echo 'selected="selected"';}?> >Open To All</option>
                                        <option value="Register" <?php if($row['access']=='Register'){ echo 'selected="selected"';}?> >Register Customers only</option>
                                    </select>                                       
                                    </div>
                                </div>
                                <br>
                                
                            </div>
                            <hr>
                            <div class="card-body" style="display: inline-flex;">
                                
                                <div class="form-row">
                                	<div class="form-group col-6 m-0">
                                        <label class="col-form-label s-12">Auto stock reduce</label>
                                        <label class="switch">
                                        <input type="checkbox" data-toggle="toggle" class="form-control r-0 light s-12" id="auto_stock" onchange="auto_stock_fun()" ><span class="slider round"></span></label>
                                    </div>
                                    
                                </div>
                                  <div class="form-row">
                                    <div class="form-group col-6 m-0">
                                        <label class="col-form-label s-12">New Order placed notification</label>
                                        <label class="switch">
                                        <input type="checkbox" data-toggle="toggle" class="form-control r-0 light s-12" id="notification" <?php if($row['notification']=='on'){ echo 'checked="checked"';}?> ><span class="slider round"></span></label>
                                    </div>
                                    
                                </div>
                                
                                  <div class="form-row">
                                    <div class="form-group col-6 m-0">
                                        <label class="col-form-label s-12">Ask for shipping address</label>
                                        <label class="switch">
                                        <input type="checkbox" data-toggle="toggle" class="form-control r-0 light s-12" id="shipping_add" <?php if($row['shipping']=='on'){ echo 'checked="checked"';}?> ><span class="slider round"></span></label>
                                    </div>
                                    
                                </div>
                                
                                  <div class="form-row">
                                    <div class="form-group col-6 m-0">
                                        <label class="col-form-label s-12">Ask for payment details</label>
                                        <label class="switch">
                                        <input type="checkbox" data-toggle="toggle" class="form-control r-0 light s-12" id="payment_det"  <?php if($row['payment_det']=='on'){ echo 'checked="checked"';}?> ><span class="slider round"></span></label>
                                    </div>
                                    
                                </div>
                                
                            </div>
                            <br>
                            
                            <hr>
                            <div class="card-body">
                                <button type="submit" class="btn btn-primary btn-lg" onclick="save_updation()"><i class="icon-save mr-2"></i>Save</button>
                                <a href="profile_update.php"><button type="button" class="btn btn-secondary btn_lg">Reset</button></a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
    </div>

    </div>
    <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: #33B5E5;">
        <h3 class="modal-title" style="color: #fff;">Change Number</h3>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-6">
                <label style="font-size: 20px;">New Number</label>
                <input type="number" id="new_number" class="form-control">
              </div>
              <div class="col-md-3" style="margin-top: 22px;">
                <button class="btn btn-success" type="button" onclick="generate_otp2()" id="g_otp">Generate OTP</button>
                <p id="timeLeft" style="color: red;"></p>
              </div>
            </div><br>
            <div class="row" style="display: none;" id="otp_row">
              <div class="col-md-6">
                <label>OTP</label>
                <input type="number" id="otp" class="form-control">
              </div>
              <div class="col-md-3" style="margin-top: 22px;">
                <button class="btn btn-success" type="button" onclick="verify_otp2()">Update Number</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
</div>
<script>
    function generate_otp2() {
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
 
 function verify_otp2() {
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
</script>


    <?php
    include('include/footer.php');
    ?>