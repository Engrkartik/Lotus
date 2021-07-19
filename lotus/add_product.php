<?php
include('include/header.php');
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
#myimg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal1 {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content1 {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
}

/* Caption of Modal Image */
#caption1 {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
  text-align: center;
  color: #ccc;
  padding: 10px 0;
  height: 150px;
}

/* Add Animation */
.modal-content1, #caption1 {  
  -webkit-animation-name: zoom;
  -webkit-animation-duration: 0.6s;
  animation-name: zoom;
  animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
  from {-webkit-transform:scale(0)} 
  to {-webkit-transform:scale(1)}
}

@keyframes zoom {
  from {transform:scale(0)} 
  to {transform:scale(1)}
}

/* The Close Button */
.close1 {
  position: absolute;
  top: 50px;
  right: 80px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close1:hover,
.close1:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}
</style>
 <div id="load" class="se-pre-con"></div>

 <div class="col-md-12">
 
            <!-- general form elements disabled -->
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Add New Product</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form role="form" action="add_product.php" method="POST" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-sm-12" >
                  <div class="form-group">
                    <div class="field" >
                      <label>Product Images</label><label style="color: red">*</label>
                      <input type="file" class="form-control" id="files" name="files[]" onchange="store_img()" multiple  />
                    </div>
                  </div>
                  </div>
                  <!-- <div class="col-sm-"> -->
                  <div class="form-group gallery" id="myimg">
                   
                  <!-- </div> -->
                  </div>
                 
                  </div>
 <div id="imagezoom" class="modal1">
  <span class="close1 close">&times;</span>
  <img class="modal-content1" id="img01">
  <div id="caption1"></div>
</div>
                <!-- </div> -->
                <div class="row" >
                 
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Product Name</label><label style="color: red">*</label>
                    <select class="form-control js-example-basic-multiple" id="new_id" onchange="getval()">
                      <option disabled="true" selected="selected" value="">Fetching Products.....</option>
                    </select>
                     <!-- <select id="new_id" onchange="getval()" class="form-control multi-select" style="text-align: center;" >
                      
                      <option disabled="true" selected="selected" value="">Fetching Products.....</option>
                      
                    </select> -->
                  </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                      <div class="field">
                        <label>Product Title</label>
                        <input type="text" id="title" class="form-control">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                    <div class="col-sm-6" >
                      <div class="form-group">
                        <div class="field">
                        <label>Category</label><label style="color: red">*</label>
                        <select class="form-control" name="category" id="category" onchange="show_att(this.value)">
                        	<option disabled="true" selected="selected" value="00">Select Category</option>
                        	<?php
                        	$cat=mysqli_query($con,"SELECT * FROM `category` WHERE aid='$admin_id'");
                        	while($row=mysqli_fetch_assoc($cat))
                        	{
                        	?>
                        	<option value="<?=$row['id']?>"><?php echo $row['title'];?></option>
                        <?php }?>
                        </select>
                      </div>
                      </div>
                    </div>
                      <div class="col-sm-6">
                      <div class="form-group">
                        <!-- <label>Minimun set to order</label>
                        <input type="text" class="form-control" id="min_order" placeholder="Enter ..." > -->
                        <label>Brand</label><label style="color: red">*</label>
                        <select class="form-control" id="brand">
                          <option disabled="true" selected="selected" value="00">Select Brand</option>
                          <?php
                          $brand=mysqli_query($con,"SELECT * FROM `brand` WHERE aid='$admin_id'");
                          while ($row=mysqli_fetch_assoc($brand)) {
                            
                          ?>
                          <option value="<?=$row['name']?>"><?php echo $row['name'];?></option>
                        <?php }?>
                        </select>
                      </div>
                    </div>
                    <!--  <div class="col-sm-5">
                      <div class="form-group">
                        <label>Discount</label>
                        <input type="text" id="discount" class="form-control" readonly="">
                      </div>
                    </div> -->
                  <!-- </div>
                  <div class="row"> -->
                  	<div class="col-sm-6" >
                  		<div class="form-group">
                  			<div class="field">
                  				<label>GST %</label>
                  				<input type="text" id="gst" class="form-control" readonly="">
                  			</div>
                  		</div>
                  	</div>
                  <!-- </div>
                  <div class="row"> -->
                  	<div class="col-sm-6">
                  		<div class="form-group">
                  			<div class="field">
                  				<label>GST Type</label>
                  				<input type="text" id="gst_type" class="form-control" readonly="">
                          <input type="hidden" id="qtyratio" class="form-control">
                  			</div>
                  		</div>
                  	</div>
                   
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                       <!--  <label>Wholesale Price</label>
                        <input type="number" class="form-control" id="price" placeholder="Enter ..."> -->
                        <a href="#myModal" id="btnfo" role="button" class="btn btn-primary" data-toggle="modal">Set Details&nbsp;<label style="color: red">*</label></a>
               <!-- Modal -->
<div id="myModal" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
             
                <h4 class="modal-title">SET DETAILS</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>
            <div class="modal-body">

            	<div class="col-md-12">
            		<div class="row">
            			<div class="col-md-6">
            				<label>Wholesale Price</label><br>
            				<input type="text" name="" class="form-control col-md-6" id="sale_price" readonly=""><label class="col-md-3">/pc</label>
            			</div>
            			<div class="col-md-6">
            				<label>MRP</label><br>
            				<input type="text" name="" class="form-control col-md-6" id="mrp" readonly=""><label class="col-md-3">/pc</label>
            			</div>
            		</div><br>
            		<div class="row">
            			<div class="col-md-6">
			                <a href="#myModal1" role="button" class="btn btn-primary" data-toggle="modal">Select Color</a>
            			</div>
            			<div class="col-md-6">
                    <?php
                    if($admin_id=='2')
                    {?>
                		<a href="#myModal2" role="button" class="btn btn-primary" data-toggle="modal">Select Size</a>
                    <?php }else {
                      ?>
                    <input type="checkbox" name="size[]" id="my_size" checked style="display:none;"/>			                
                    <?php }?>
            			</div>
            		</div><br>
            		<div class="row">
            			<div class="col-md-6">
            				<label>Available Stock Qty(in Pcs)</label>
            				<input type="text" class="form-control" id="avail_qty" readonly="">
            			</div>
            		</div>
            	</div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-info" type="button" onclick="save_data()" data-dismiss="modal">Save</button>

            </div>
        </div>
    </div>
</div>

<div id="myModal1" class="modal modal-child" data-backdrop-limit="1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-modal-parent="#myModal">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" style="float: left">SELECT COLOR</h4>
                <button type="button" class="close" data-dismiss="modal">&times;&nbsp;&nbsp;&nbsp;&nbsp;</button>
                <button class="btn btn-info" type="button" style="float: right;" onclick="info()" data-dismiss="modal">Save</button>

            </div>
            <div class="modal-body">
            	
            	<input type="text" class="form-control" onkeyup="myFunction()" id="Search" placeholder="Search for color...">
              <?php

               
                  $color_2=mysqli_query($con,"SELECT * FROM `color` WHERE aid='$admin_id' and color_type='2' order by date desc");
                  $sn++;
                ?>
                <br><div class="col-md-12" id="my-categories">
                  <label class="GFG">OPTION 1&nbsp;&nbsp;<input type="radio" name="chk" onchange="disable_option('option2')"></label></div><br>
                <?php 
                while($run=mysqli_fetch_assoc($color_2))
                  {?>

                <div class="col-md-4 target">
                  <label class="GFG"><input type="radio" value="<?=$run['c_name']?>" name="clr[]" class="option1" onchange="disable_option('option2')"/>&nbsp;<?php echo str_replace('_', ' ',$run['c_name']);?></label></div>
            
            <?php }
                  $color_2=mysqli_query($con,"SELECT * FROM `color` WHERE aid='$admin_id' and color_type='1' order by c_name asc");
                  $sn++;
                ?>
                <br><div class="col-md-12">
                  <label class="GFG">OPTION 2&nbsp;&nbsp;<input type="radio" name="chk" onchange="disable_option('option1')"></label></div><br>
                <?php 
                while($run=mysqli_fetch_assoc($color_2))
                  {?>

                <div class="col-md-4 target">
                  <label class="GFG"><input type="checkbox" class="my_categories option2" id="option2" value="<?=$run['c_name']?>" name="clr[]" onchange="disable_option('option1')" />&nbsp;<?php echo str_replace('_', ' ',$run['c_name']);?></label></div>
            
            <?php }?>
    
            </div>
            <div class="modal-footer">
                
                <button class="btn btn-default" data-dismiss="modal" data-dismiss="modal" aria-hidden="true">Cancel</button>
            </div>

        </div>
    </div>
</div>
<?php
if ($admin_id=='2') {
  ?>
<div id="myModal2" class="modal modal-child" data-backdrop-limit="1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-modal-parent="#myModal">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                
                <h4 class="modal-title">SELECT SIZE</h4>
                <button type="button" class="close" data-dismiss="modal">&times;&nbsp;&nbsp;&nbsp;&nbsp;</button>
                <button class="btn btn-info" onclick="info2()" type="button" data-dismiss="modal">Save</button>

            </div>
            <div class="modal-body">
                <div class="col-md-12" >
                	<?php 
                	$size=mysqli_query($con,"SELECT * FROM `sizemaster` where aid='$admin_id' GROUP BY type");
                	while($run=mysqli_fetch_assoc($size))
                	{
                	?>
                	<div class="row">
                		<div class="">

                			<label>OPTION&nbsp;<?=$run['type']?></label><br>

                			<?php
                			$type=$run['type'];
                			 $s_size=mysqli_query($con,"SELECT * FROM `sizemaster` where aid='$admin_id' and type='$type'");
                			 while ($run2=mysqli_fetch_assoc($s_size)) {
                			 	?>
                			 <label class="GFG">	<input class="my_categories chb" type="checkbox" value="<?=$run2['size_name']?>" name="size[]"/>&nbsp;&nbsp;<?php echo $run2['size_name'];?>&nbsp;&nbsp;&nbsp;&nbsp;</label>
                			 <?php }
                			?>
                		</div>
                	</div>
                <?php }?>
                </div>
            </div>
            <div class="modal-footer">

                <button class="btn btn-default" data-dismiss="modal" data-dismiss="modal" aria-hidden="true">Cancel</button>
            </div>

        </div>
    </div>
</div>
<?php }?>
<!-- end modal -->
                      </div>
                    </div>
                </div>
                <div class="row" id="set_det" style="margin-top: -10px;display: none;" >
                	<!-- <div class="col-md-3"></div> -->
                    <div class="col-sm-5"><label>Set Details</label><br>
                      <div class="form-group" id="myTable">

                       
                      </div>
                    </div>
                	<!-- <div class="col-md-3"></div> -->

                  </div>
                  <div class="row">
                    <div class="col-md-3" style="margin-top: 10px;">
                    <a href="" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Attributes</a> 
                  </div>
                  </div><br>
                  <div class="row">
                       
                	<div class="col-md-2"><label id="att_det" style="display: none;">Attribute Details</label></div><br>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group" id="myTable2">

                       
                      </div>
                    </div>
                	<div class="col-md-2"></div>

                  </div>
                  <div class="row">
                  	<div class="col-sm-5" style="margin-left: 10px;">
                  		<div class="form-group">
                  			<div class="field">
                  				
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Make Your Selection</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;&nbsp;&nbsp;&nbsp;</span>
        </button>
        <button type="button" class="btn btn-primary" onclick="info3()" data-dismiss="modal">Save</button>
      </div>
      <div class="modal-body">
       <div class="col-md-12">
       	<div class="row" id="att"><h4 style="color: red">Please Select Category</h4></div>
       </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>
                  			</div>
                  		</div>
                  	</div>
                  </div>
                  <div class="row">
                    <div class="col-sm-11" style="margin-left: 10px;">
                      <div class="form-group">
                        <label>Description</label>
                        <textarea type="text" class="form-control" id="dscrpt"  placeholder="Enter ..." rows="2"></textarea> 
                      </div>
                    </div>
                   
                  </div>

                <div class="row">
                  <div class="form-group">
                    <div class="col-sm-12">
                      <button  class="btn btn-primary" type="button" onclick="new1()">Save</button>
                      <button onclick="clear()" class="btn btn-info">Clear</button>
                    </div>
                  </div>
                </div><br>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            
              </div>
<!-- ////////////////////////////////////////////////////////////////////////////////////// -->
<script type="text/javascript" src="jquery.js"></script>          
<script type="text/javascript">
    // Check if the page has loaded completely      
    window.onload=curlF();
    function curlF() {
      console.log("start");
      $.ajax({
        type:'POST',
        url:'curl.php',
        data:{'aid':'<?=$admin_id?>'},
        success:function(res) {
          // console.log(res);
          $('#new_id').html(res);
          console.log(document.getElementById('new_id'));
          console.log("end");
        }
      });
    }                                   
    // $(document).ready( function() {
    //   console.log("start"); 
    //     $('#new_id').load('curl.php'); 
    //     console.log("end");
    // }); 
</script> 
<!-- ////////////////////////////////////////////////////////////////////////////////////////////////// -->
<script type="text/javascript">
  var color = [];
 var size = [];
 var att = [];
 
function imagezoom() {
  // body...
var modal = document.getElementById("imagezoom");

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById("myimg");
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
  modal.style.display = "none";
}
}

var loader=document.getElementById('load');
$(".chb").change(function()
                                  {
                                      $(".chb").prop('checked',false);
                                      $(this).prop('checked',true);
                                  });
function clear(){
  window.location.href="add_product.php";
}


	$('.modal-child').on('show.bs.modal', function () {
    var modalParent = $(this).attr('data-modal-parent');
    $(modalParent).css('opacity', 0);
});
 
$('.modal-child').on('hidden.bs.modal', function () {
    var modalParent = $(this).attr('data-modal-parent');
    $(modalParent).css('opacity', 1);
});
 function getval(){
  var newid = document.getElementById('new_id').value;
  // alert(color);
  if(color!="")
  {
  $('.my_categories').prop('checked',false);
  document.getElementById('category').value='00';
  document.getElementById('brand').value='00';
  info();
  info2();
  info3();
 save_data();
}
  var admin='<?=$admin_id?>';
  var split=newid.split('~');
 document.getElementById('gst_type').value=split[0];
 document.getElementById('mrp').value=split[1];
 document.getElementById('sale_price').value=split[2];
 document.getElementById('avail_qty').value=split[3];
 document.getElementById('gst').value=split[4];
 document.getElementById('title').value=split[5];
 document.getElementById('qtyratio').value=split[6];
 if ('<?=$admin_id?>'!='2') {
 document.getElementById('my_size').value=split[7];
 info2();
 }
// console.log(document.getElementById('my_size').value);
var type="get";
// alert(newid);
  $.ajax({
    type:'POST',
    url: 'getdata.php',
    data: {'newid':split[5],'admin':admin,'type':type},
    success:function(res){
    	// alert(res);
    	document.getElementById('discount').value=res;
    }
  });

 }
// function save_item() {
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
            "<img id=\"myimg\" onclick=\"imagezoom()\" class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
            "<br/><span class=\"remove fa fa-times\"></span>" +"</span>").insertAfter("#files");
          $(".remove").click(function(){
            $(this).parent(".pip").remove();
          });
          
          // Old code here
          /*$("<img></img>", {
            class: "imageThumb",
            src: e.target.result,
            title: file.name + " | Click to remove"
          }).insertAfter("#files").click(function(){$(this).remove();});*/
          
        });
        fileReader.readAsDataURL(f);
      }
    });
  } else {
    alert("Your browser doesn't support to File API")
  }
});

 

function info() {
	color=[];
	var checkboxes = document.getElementsByName('clr[]');
var vals = "";
for (var i=0, n=checkboxes.length;i<n;i++) 
{
    if (checkboxes[i].checked) 
    {
        color.push(checkboxes[i].value);
    }
}
// alert(color);
// color_result=JSON.stringify(color);
	// alert(numArray);
}


function info2() {
	size=[];
	var checkboxes = document.getElementsByName('size[]');
var vals = "";
for (var i=0, n=checkboxes.length;i<n;i++) 
{
    if (checkboxes[i].checked) 
    {
        size.push(checkboxes[i].value);
    }
}
}

function info4() {
  set_qty=[];
  var checkboxes = document.getElementsByName('set_qty[]');
var vals = "";
for (var i=0, n=checkboxes.length;i<n;i++) 
{
        set_qty.push(checkboxes[i].value);
    
}
// alert(set_qty);
}

function info3() {
	att=[];
	var checkboxes = document.getElementsByName('att[]');
var vals = "";
for (var i=0, n=checkboxes.length;i<n;i++) 
{
    if (checkboxes[i].checked) 
    {
        att.push(checkboxes[i].value);
    }
}
// alert(att);
var type="att";
var admin='<?=$admin_id?>';
var cat_id=document.getElementById('category').value;
$.ajax({
type:'POST',
url:'set_table.php',
data:{'att':JSON.stringify(att),'type':type,'cat_id':cat_id,'admin':admin},
success:function(res)
{
  document.getElementById('att_det').style.display="";
  document.getElementById('myTable2').style="";
	$('#myTable2').html(res);
}
});
}

function save_data() {
var wsp=document.getElementById('sale_price').value;
var mrp=document.getElementById('mrp').value;
var avail_qty=document.getElementById('qtyratio').value;
// alert("Hello");
	$.ajax({
		type:'POST',
		url:'set_table.php',
		data:{'size':JSON.stringify(size),'color':JSON.stringify(color),'mrp':mrp,'wsp':wsp,'avail_qty':avail_qty},
		success:function(res) {
      document.getElementById('set_det').style.display="";
      document.getElementById('myTable').style.display="";
			$('#myTable').html(res);
		}
	})
}



function show_att(cat_id) {
var type="att";	
var admin='<?=$admin_id?>';
// alert(cat_id);

$.ajax({
type:'POST',
url:'getdata.php',
data:{'type':type,'cat_id':cat_id,'admin':admin},
success:function(res)
{
	// alert(res);
	$('#att').html(res);
  document.getElementById('myTable2').innerHTML="";
}
});
}

function final_data(img_id) {
	// loader.style.display='';
	  info4();
	var item=document.getElementById('new_id').value;
	var cat_id=document.getElementById('category').value;
	var mrp=document.getElementById('mrp').value;
	var gst=document.getElementById('gst').value;
	var gst_type=document.getElementById('gst_type').value;
	var wsp=document.getElementById('sale_price').value;
	var dscrpt=document.getElementById('dscrpt').value;
	var brand=document.getElementById('brand').value;
	var avail_qty=document.getElementById('avail_qty').value;
  var title=document.getElementById('title').value;

	var type="add";
	var admin='<?=$admin_id?>';
  // alert(att);
  if(title=="")
  {
  loader.style.display='none';
    alert("Item Title should not be empty..!!");
    document.getElementById('title').focus();
    return false;
  }else{
$.ajax({
	type:'POST',
	url:'save_item.php',
	data:{'item':item,'cat_id':cat_id,'gst':gst,'gst_type':gst_type,'wsp':wsp,'dscrpt':dscrpt,'brand':brand,'admin':admin,'size':JSON.stringify(size),'color':JSON.stringify(color),'att':JSON.stringify(att),'img_id':img_id,'type':type,'qty':avail_qty,'set_qty':JSON.stringify(set_qty),'title':title,'mrp':mrp},
	success:function(res) {
		if(res=="Product is already added"){
  loader.style.display='none';
      alert(res);  
    }
    else{
    // alert(res);
	loader.style.display='none';
		window.location.href="show_prod.php";
	 }
  }
});
}
}

 var form_data = new FormData();

function store_img() {
   // Read selected files
   var totalfiles = document.getElementById('files').files.length;
   for (var index = 0; index < totalfiles; index++) {
      form_data.append("files[]", document.getElementById('files').files[index]);
   }
}
 function new1(){

  prod = document.getElementById("new_id");
  if(prod.value == "") {
    alert("Please select Product");
    prod.focus();
    return false;
}
  category = document.getElementById("category");
  if(category.value == "00") {
    alert("Please select Category");
    category.focus();
    return false;
} 
 brand = document.getElementById("brand");
  if(brand.value == "00") {
    alert("Please select Brand");
    brand.focus();
    return false;
}
if(size[0] == null){
    alert("Create set First");
    btnfo.focus();
    return false;
  }
 		var src=[];
        
        // alert(form_data);
        $.ajax({
            url: 'save_item_img.php',
            type: 'post',
            data: form_data,
            contentType: false,
            processData: false,
             async: true,
            success: function(response){
            	// alert(response);
              loader.style.display='';
            	final_data(response);
                }
        });
      }

     
function sum() {
 var total = 0;
var Price = $('input[id^=sum_qty]');
   $.each($(Price), function(){
      total += parseInt($(this).val());
   });
  var wsp=document.getElementById('sale_price').value;
var new_t=total+" (in pcs)";
   $('#total_qty').html(new_t);
   $('#total_price').html(total*wsp);

}

function myFunction() {
  var input = document.getElementById("Search");
  var filter = input.value.toLowerCase();
  var nodes = document.getElementsByClassName('target');

  for (i = 0; i < nodes.length; i++) {
    if (nodes[i].innerText.toLowerCase().includes(filter)) {
      nodes[i].style.display = "block";
    } else {
      nodes[i].style.display = "none";
    }
  }
}
function disable_option(str) {
  // alert(str);
  clr=[];
  if(str=="option1")
  {
      $("input.option1").attr("disabled", true);
      $("input.option2").removeAttr("disabled");
      $("input.option1").prop("checked", false);
      // $("input.option1").prop("checked", true);


  }else{

      $("input.option2").attr("disabled", true);
      $("input.option1").removeAttr("disabled");
      $("input.option2").prop("checked", false);
      // $("input.option2").prop("checked", true);


  }

  // document.getElementById(str).disabled="disabled";
}
$(window).load(function() {
    // Animate loader off screen
    $(".se-pre-con").fadeOut("slow");
  });
  $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
</script>
<?php
  include ('include/footer.php');
?>