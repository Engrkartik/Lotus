<style>
  .flip-card-front {
  background-color: white;
  color: black;
  background-image: url('dist/img/images1.jpg');
}
.se-pre-con {
  position: fixed;
  left: 0px;
  top: 0px;
  width: 100%;
  height: 100%;
  z-index: 9999;
  background: url(images/Preloader_2.gif) center no-repeat #fff;
}

</style>
<?php
include('include/header.php');
?>
<script type="text/javascript">
  var back=document.getElementById('back');
  back.style.display='none';
</script>
 <div id="load" class="se-pre-con"></div>


 <section class="content" style="margin-top: 45px;">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-md-5">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Customer's</span>
                <span class="info-box-number">
                  <small><?php $cust=mysqli_query($con,"SELECT * FROM `company_reg` WHERE STATUS!='R' AND aid='$admin_id'");
                  echo mysqli_num_rows($cust);?></small>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-5">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-dolly"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Products</span>
                <span class="info-box-number">41,410</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-md-5">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Sales</span>
                <span class="info-box-number">760</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-5">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">New Members</span>
                <span class="info-box-number">2,000</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>

  

    <!-- Main content -->
    <section class="content" style="margin-top: 30px;">
      <div class="container-fluid">
      	<div class="row">
      	<div class="col-md-12">
       <div class="row">
       	<div class="col-md-3">
       	<div class="flip-card">
  <div class="flip-card-inner">
    <div class="flip-card-front">
      <div class="col-md-12">
      	<div class="row">
      		<div class="col-md-12">
      		<h3 style="font-weight: 12px;color: white;text-align: center;">UPGRADE PLAN</h3>
      			
      		</div>
      	</div>
      </div>
    </div>
    <div class="flip-card-back">
      <h1>Hello</h1> 
      <p>Content</p> 
      <p>Something Here</p>
    </div>
  </div>
</div>
       </div>
       <div class="col-md-3">
       	<div class="flip-card">
  <div class="flip-card-inner2">
    <div class="flip-card-front">
      <div class="col-md-12">
      	<div class="row">
      		<div class="col-md-12">
      		<h3 style="font-weight: 12px;color: white;text-align: center;">PRODUCTS</h3>	
      		</div>

      	</div>
      	<div class="row" style="margin-top: 100px;">
      		<div class="col-md-12">
      			<button type="button" class="btn btn-success" id="add_btn" data-toggle="modal" data-target="#exampleModal" style="font-size: 20px;border-radius: 27px;"><span>Add Product</span></button>

      		</div>
      	</div>
      	
      </div>
    </div>
  </div>
</div>
      </div>
      <div class="col-md-3">
        <div class="flip-card">
  <div class="flip-card-inner2">
    <div class="flip-card-front">
      <div class="col-md-12">
        <div class="row">
          <div class="col-md-12">
          <h3 style="font-weight: 12px;color: white;text-align: center;">CUSTOMERS</h3> 
          </div>

        </div>
        <div class="row" style="margin-top: 100px;">
          <div class="col-md-12">
            <a href="cust.php"><button type="button" class="btn btn-success" id="add_btn" data-toggle="modal" style="font-size: 20px;border-radius: 27px;"><span>Customer's Details</span></button></a>

          </div>
        </div>
        
      </div>
    </div>
  </div>
</div>
      </div>
  </div>
</div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #ccc;">
        <h3 class="modal-title" id="exampleModalLabel" style=""><label>PRODUCT IMAGES</label></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form action="javascript:;" method="POST" onsubmit="upload_img()">
      <div class="modal-body">
      	<div class="row">
      		<div class="col-md-12">
      			
      			<div class="row">
      				<div class="col-md-12" style="margin-bottom: 12px;">
      					 <label>Upload Images</label>
        				<input type="file" id="files" name="files[]" class="form-control" multiple="">
      				</div>
      			</div>
            
      			<div class="row">
              <div class="col-md-12">
                <label style="cursor: pointer;"><input type="radio" id="type1" name="gen" value="1" required="required">&nbsp;All Images Belongs to same product</label><br>
                <label style="cursor: pointer;"><input type="radio" id="type2" name="gen" value="2" required="required">&nbsp;All Images Belongs to different product</label>

              </div>
            </div>
      		</div>
       	</div>	
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" style="background-color: red;">Close</button>
        <button class="btn btn-primary">Upload</button>
      </div>
    </form>
    </div>
  </div>
</div>
</div>
</section>



<script type="text/javascript">
	$(document).ready(function() {
  if (window.File && window.FileList && window.FileReader) {
    $("#files").on("change", function(e) {
      var files = e.target.files,
        filesLength = files.length;
      for (var i = 0; i < filesLength; i++) {
        var f = files[i]
        var fileReader = new FileReader();
        fileReader.onload = (function(e) {
          var file = e.target;
          $("<span class=\"pip\">" +
            "<img style='width:100px;height:100px;' class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
            "<span class=\"remove fa fa-times\"></span>" +"</span>").insertAfter("#files");
          $(".remove").click(function(){
            $(this).parent(".pip").remove();
          });
          
        });
        fileReader.readAsDataURL(f);
      }
    });
  } else {
    alert("Your browser doesn't support to File API")
  }
});
 var form_data = new FormData();

	function upload_img() {
   // Read selected files
   // alert("<?=$admin_id?>");
   var load=document.getElementById('load').style.display='';
   var img;
   var totalfiles = document.getElementById('files').files.length;
   var img1=document.getElementById('type1');
   var img2=document.getElementById('type2');

   if(img1.checked==true)
   {
    img_type=img1.value;
   }else if(img2.checked==true)
   {
    img_type=img2.value;
   }
if(totalfiles>0)
{
   // alert(totalfiles);
   for (var index = 0; index < totalfiles; index++) {
      form_data.append("files[]", document.getElementById('files').files[index]);
      form_data.append("img_type",img_type);

   }
   // alert(img_type);
   // console.log(form_data)
   if(img_type>0)
   {
    $.ajax({
            url: 'save_item_img.php',
            type: 'post',
            data: form_data,
            contentType: false,
            processData: false,
             async: true,
            success: function(response){
            	// alert(response);
            	if(response==1)
            	{
            		window.location.href="show_prod.php";
                load.style.display='none';

            	}
            	// final_data(response);
                }
        });
}
else
{
	alert("Choose Option..!!");
}
}else{
	alert("Select Images for Product..!!");
}
}
$(window).load(function() {
    // Animate loader off screen
    $(".se-pre-con").fadeOut("slow");
  });
</script>
 <?php
include ('include/footer.php');
 ?>