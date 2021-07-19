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
              <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">General</h3>
              </div>
          </div>
              <div class="card-body">
                <form role="form" action="profile_update.php" method="POST" enctype="multipart/form-data">
                <div class="row" >
                 
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Name</label><label style="color: red">*</label>
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
                        <label>Phone Number</label><label style="color: red">*</label>
                        <input type="number" id="mob_no" class="form-control" value="<?=$row['mobile']?>">
                      </div>
                      </div>
                    </div>
                 </div>
             </form>
         </div>
     </div>
    
<!-- ////////////////////////////////////////////////////////////////////////////////////// -->
<script type="text/javascript" src="jquery.js"></script>          
<script type="text/javascript">
    // Check if the page has loaded completely                                         

$(window).load(function() {
    // Animate loader off screen
    $(".se-pre-con").fadeOut("slow");
  });
</script>
<?php
  include ('include/footer.php');
?>