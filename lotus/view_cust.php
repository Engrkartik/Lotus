<?php
include('include/header.php');
$c_id=$_GET['id'];
$query=mysqli_query($con,"SELECT * FROM `company_reg` WHERE id='$c_id'");
$row=mysqli_fetch_assoc($query);
$name=explode(' ',$row['OWNER_NAME']);
$f_name=$name[0];
$l_name=$name[1];
?>
 <div class="col-md-12">
            <!-- general form elements disabled -->
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">View Customer Detail</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                 <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Customer Picture</label>
                        <img src="<?=$row['image']?>" style="width: 150px;height: 100px;">
                      </div>
                    </div>
                    
                  <!-- </div> -->
                <!-- <form role="form" action="javascript:;" method="POST"> -->
                  <!-- <div class="row"> -->
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Customer Name</label>
                        <input disabled type="text" class="form-control" id="first_name" value="<?=$row['OWNER_NAME']?>" required="">
                      </div>
                    </div>
                  </div>
                  <div class="row">                  
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Firm Name</label>
                        <input disabled type="text" class="form-control" id="last_name" value="<?=$row['FIRM_NAME']?>" >
                      </div>
                    </div>
                  <!-- </div> -->
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Mobile Number</label>
                        <input disabled type="text" class="form-control" id="mob_no" maxlength="10" minlength="10" value="<?=$row['CONTACT_NO']?>"  required="">
                      </div>
                    </div>
                  </div>
                  <div class="row">

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Alternate Mobile number</label>
                        <input disabled type="text" class="form-control" id="alt_mob" maxlength="10" minlength="10" value="<?=$row['ALT_NO']?>"  required="">
                      </div>
                    </div>
                  <!-- </div> -->
                  <!-- <div class="row"> -->
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Address</label>
                        <textarea class="form-control" rows="3" id="address" required="" disabled=""><?php echo $row['ADDRESS'];?></textarea>
                      </div>
                      
                    </div>
                  </div>
                  <div class="row">

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>City</label>
                        <input disabled type="text" class="form-control" id="city" value="<?=$row['CITY']?>"  required="">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Country</label>
                        <input disabled type="text" class="form-control" id="country" value="<?=$row['COUNTRY']?>"  required="">
                      </div>
                    </div>
                  </div>
                  
                  <div class="row">
                   
                    <div class="col-sm-6">
                      <!-- textarea -->
                      <div class="form-group">
                        <label>State</label>
                        <select class="form-control" id="state" onchange="dist(this.value)" disabled="">
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
<!--                   </div>
                  <div class="row">
 -->
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>District</label>
                        <select class="form-control" id="district" disabled="">
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
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Email-Id</label>
                        <input disabled type="text" class="form-control" id="email" value="<?=$row['EMAIL_ID']?>" >
                      </div>
                    </div>
<!--                   </div>
                  <div class="row">
 -->
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Pin Code</label>
                        <input disabled type="text" class="form-control" id="pin_code" value="<?=$row['PIN_CODE']?>"  required="">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-6">
                      <!-- select -->
                      <div class="form-group">
                        <label>Business Type</label>
                        <select class="form-control" id="bus_type" required="" disabled="">
                          <option value="W" <?php if($row['BUSINESS']=='W'){echo 'selected';}?> >Wholesale</option>
                          <option value="R" <?php if($row['BUSINESS']=='R'){echo 'selected';}?> >Retail</option>
                          </select>
                      </div>
                    </div>
<!--                   </div>
                  <div class="row">
 -->
                     <div class="col-sm-6">
                      <div class="form-group">
                        <label>GSTIN/UIN Number</label>
                        <input disabled type="text" class="form-control" id="gst_no" value="<?=$row['GSTIN_NO']?>" >
                      </div>
                    </div>
                    
                  </div>
                
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            
              </div>
              
          <?php
include ('include/footer.php');
          ?>