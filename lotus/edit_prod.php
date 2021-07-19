<?php
include('include/header.php');
$pid=$_GET['pid'];
$query=mysqli_query($con,"SELECT product.*,category.title as cat_name,(SELECT set_details.size FROM set_details WHERE set_details.aid=product.aid AND set_details.pid=product.id AND set_details.set_id=product.set_id LIMIT 1) as size_f FROM `product` LEFT JOIN category ON category.id=product.cat_id WHERE product.aid='$admin_id' and product.id='$pid'");
$row=mysqli_fetch_assoc($query);
?>
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
 border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
}

.myimg:hover {opacity: 0.7;}

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
                <h3 class="card-title">Edit Item Detail</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form role="form" action="add_product.php" method="POST" enctype="multipart/form-data">
                  <div class="row" style="margin-left: 10px;">
                    <?php 
                    $prod_img=$row['img'];
                    $pro_img=mysqli_query($con,"SELECT * FROM `prod_img` WHERE img_id='$prod_img' and aid='$admin_id'");
                    while($r_img=mysqli_fetch_assoc($pro_img))
                      {?>
                    <img class="myimg" id="<?=$r_img['img_url']?>" src="<?=$r_img['img_url']?>" style="width: 100px;height: 100px;" onclick="imagezoom('<?=$r_img['img_url']?>')">&nbsp;&nbsp;
                    <i class="fa fa-trash" style="cursor: pointer;" onclick="delete_img('<?=$r_img['img_url']?>')"></i>
                  <?php }?>
                  </div>
                  <div id="imagezoom" class="modal1">
  <span class="close1 close">&times;</span>
  <img class="modal-content1" id="img01">
  <div id="caption1"></div>
</div>
                  <div class="row">
                    <div class="col-sm-11" style="margin-left: 10px;">
                  <div class="form-group">
                    <div class="field" >
                      <label>Product Images</label>
                      <input type="file" class="form-control" id="files" name="files[]" onchange="store_img()" multiple  />
                    </div>
                  </div>
                  </div>
                  <!-- <div class="col-sm-"> -->
                  <div class="form-group gallery" >
                   
                  <!-- </div> -->
                  </div>
                </div>
                <div class="row">
                  <?php 
                    
                      ?>
                 <div class="col-sm-5">
                      <div class="form-group">
                        <label>Product Name</label>
                        <input type="text" id="new_id" onchange="getval()" value="<?=$row['item_name']?>" class="form-control" style="text-align: center;" readonly="">
                      
                      </div>
                    </div>
                    <div class="col-sm-5">
                      <div class="form-group">
                        <label>Product Title</label>
                        <input type="text" id="new_id" value="<?=$row['title']?>" class="form-control" style="text-align: center;" readonly="">
                      
                      </div>
                    </div>
                  </div>
                <!-- </div> -->
                <div class="row">
                    <div class="col-sm-5" style="margin-left: 10px;">
                      <div class="form-group">
                        <div class="field">
                        <label>Category</label>
                        <select class="form-control" name="category" id="category" onchange="show_att(this.value)">
                        	<!-- <option value="00">Select Category</option> -->
                        	<?php
                        	$cat=mysqli_query($con,"SELECT * FROM `category` WHERE aid='$admin_id'");
                        	while($row2=mysqli_fetch_assoc($cat))
                        	{
                        	?>
                        	<option value="<?=$row2['id']?>" <?php if($row['cat_id']==$row2['id']){echo  'selected="selected"';}?> > <?php echo $row2['title'];?></option>
                        <?php }?>
                        </select>
                      </div>
                      </div>
                    </div>
                     <div class="col-sm-5">
                      <div class="form-group">
                        <label>Discount</label>
                        <input type="text" id="discount" class="form-control" readonly="" value="<?=$row['discount']?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                  	<div class="col-sm-5" style="margin-left: 10px;">
                  		<div class="form-group">
                  			<div class="field">
                  				<label>GST %</label>
                  				<input type="text" id="gst" class="form-control" readonly="" value="<?=$row['tax']?>">
                  			</div>
                  		</div>
                  	</div>
                  	<div class="col-sm-5" >
                  		<div class="form-group">
                  			<div class="field">
                  				<label>GST Type</label>
                  				<input type="text" id="gst_type" class="form-control" readonly="" value="INCLUDED">
                  			</div>
                  		</div>
                  	</div>
                  </div>
                  <div class="row">
                    <div class="col-sm-5" style="margin-left: 10px;">
                      <div class="form-group">
                        <label>Description</label>
                        <textarea type="text" class="form-control" id="dscrpt"  rows="2"><?php echo $row['desc'];?></textarea> 
                      </div>
                    </div>
                    <div class="col-sm-5">
                      <div class="form-group">
                        <!-- <label>Minimun set to order</label>
                        <input type="text" class="form-control" id="min_order" placeholder="Enter ..." > -->
                        <label>Brand</label>
                        <select class="form-control" id="brand">
                          <option disabled="true">Select Brand</option>
                          <?php
                          $brand=mysqli_query($con,"SELECT * FROM `brand` WHERE aid='$admin_id'");
                          while ($row_b=mysqli_fetch_assoc($brand)) {
                            
                          ?>
                          <option value="<?=$row_b['name']?>" <?php if($row['brand']==$row_b['name']){echo  'selected="selected"';}?> ><?php echo $row_b['name'];?></option>
                        <?php }?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-5" style="margin-left: 10px;">
                      <div class="form-group">
                       <!--  <label>Wholesale Price</label>
                        <input type="number" class="form-control" id="price" placeholder="Enter ..."> -->
                        <a href="#myModal" role="button" class="btn btn-primary" data-toggle="modal">Set Details</a>
                      </div>
                    </div>
                  </div>
                  <div class="row" style="margin-top: -10px;">
                  <!-- <div class="col-md-3"></div> -->
                    <div class="col-sm-5"><label>Set Details</label><br>
                      <div class="form-group" id="myTable">
                        <table class="table table-bordered" style="border:2px solid black;">
                          <thead>
                            <tr>
                              <th>S.No</th>
                              <th>COLOR</th>
                              <th>SIZE</th>
                              <th>QTY</th>
                              <TH>RATE/-</TH>
                            </tr>
                          </thead>
                          <tbody>
                            <?php 
                            $set_id=$row['set_id'];
                             $sn=0;
                            $set=mysqli_query($con,"SELECT * FROM `set_details` WHERE set_id='$set_id' and aid='$admin_id'");
                            while($chk=mysqli_fetch_assoc($set))
                              {
                            $sum_q=$sum_q + $chk['qty'];

                                $sn++;?>
                            <tr>
                              <td><?php echo $sn;?></td>
                              <td><?php echo str_replace('_',' ',$chk['color']);?></td>
                              <td><?php echo $chk['size'];?></td>
                              <td><input type="number" id="sum_qty" onchange="sum()" readonly name="set_qty[]" value="<?=$chk['qty']?>" step="<?=$chk['qty']?>"></td>
                              <td id="price"><?php echo $row['sale_price']."/-";?></td>

                            </tr>
                          <?php }?>
                          <tr style="border-top: 1px solid black;">
                            <td colspan="3">Total Set</td>
                            <td id="total_qty"><?php echo $sum_q." (in pcs) = 1 Set";?></td>
                            <td id="total_price"><?php echo ($sum_q*$row['sale_price']).".00/-";?></td>

                          </tr>
                          </tbody>
                        </table>
                       
                      </div>
                    </div>
                  <div class="col-md-3"></div>

                  </div>
                  <div class="row">
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
                    <input type="number" name="" class="form-control col-md-6" id="sale_price" readonly="" value="<?=$row['sale_price']?>"><label class="col-md-3">/pc</label>
                  </div>
                  <div class="col-md-6">
                    <label>MRP</label><br>
                    <input type="number" name="" class="form-control col-md-6" id="mrp" readonly="" value="<?=$row['mrp']?>"><label class="col-md-3">/pc</label>
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
                    <input type="checkbox" name="size[]" id="my_size" checked style="display:none;" value="<?=$row['size_f']?>"/>			                
                    <?php }?>
                    <!-- <a href="#myModal2" role="button" class="btn btn-primary" data-toggle="modal">Select Size</a> -->
                      
                  </div>
                </div><br>
                <div class="row">
                  <div class="col-md-6">
                    <label>Available Stock Qty(in Pcs)</label>
                    <input type="number" class="form-control" id="avail_qty" readonly="" value="<?=$row['avail_qty']?>">
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
                  </div>
                  <div class="row">
                    <div class="col-sm-5" style="margin-left: 10px;">
                      <div class="form-group">
                        <a href="" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Attributes</a>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                  <!-- <div class="col-md-2"></div> -->
                    <div style="border: 1px solid lightgrey; padding: 40px" class="col-md-12" style="width: 50%">
                      <div class="form-group" id="myTable2">

                       
                      </div>
                    </div>
                  <div class="col-md-2"></div>

                  </div>
                  <div class="row">
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Make Your Selection</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>&nbsp;&nbsp;&nbsp;
        <button type="button" class="btn btn-primary" onclick="info3()" data-dismiss="modal">Save</button>
          
        </button>
      </div>
      <div class="modal-body">
       <div class="col-md-12" id="att">
              <?php
              $cat_id=$row['cat_id'];
              $attribute_id=$row['att_id'];
              // echo $cat_id;
              $att=mysqli_query($con,"SELECT * FROM `attributes` WHERE cat_id='$cat_id' and att_id='0' and aid='$admin_id'");
                while($row3=mysqli_fetch_assoc($att))
                {
                  $att_id=$row3['id'];
                ?>
                  <div class="row">
                  <div class="col-md-12">
                  <label><?php echo $row3["att_name"];?></label>
                  </div>
                </div>
                  <div class="row">
                    <?php
                $att2=mysqli_query($con,"SELECT * FROM `attributes` WHERE cat_id='$cat_id' and att_id='$att_id'");
                while($row4=mysqli_fetch_assoc($att2))
                {
                  $att_name=$row4['att_name'];
                    $Matt_name=$row3['att_name'];

                    $att3=mysqli_query($con,"SELECT * FROM `prod_attribute` WHERE att_id='$attribute_id' and attribute='$att_name'");
                ?><div class="col-md-6">
                    <label class="GFG">
                    <input type="checkbox" class="my_categories" name="att[]" value="<?=$row4['att_name'].'~'.$row3['att_name'].'~'.$row4['id'];?>" <?php
                    
                     if(mysqli_num_rows($att3)>0){echo "checked='checked'";}
                     ?> >&nbsp;<?php echo str_replace('_',' ',$row4["att_name"]);?></label>
                  </div>
                <?php }?>
                </div>

              <?php }?>
        
        </div>
       </div>
      <!-- </div> -->
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>
                  </div>
               <!-- Modal -->


<div id="myModal1" class="modal modal-child" data-backdrop-limit="1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-modal-parent="#myModal">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">SELECT COLOR</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>&nbsp;&nbsp;&nbsp;
                <button class="btn btn-info" type="button" onclick="info()" data-dismiss="modal">Save</button>


            </div>
            <div class="modal-body">
            	
<input type="text" class="form-control" onkeyup="myFunction()" id="Search" placeholder="Search for color...">
              <?php

               
                  $color_2=mysqli_query($con,"SELECT * FROM `color` WHERE aid='$admin_id' and color_type='2' order by date desc");
                  $sn++;
                ?>
                <br><div class="col-md-12">
                  <label class="GFG">OPTION 1&nbsp;&nbsp;<input type="radio" name="chk" onchange="disable_option('option2')"></label></div><br>
                <?php 
                while($run=mysqli_fetch_assoc($color_2))
                  {
$c_name=$run['c_name'];

                    ?>

                <div class="col-md-4 target">
                  <label class="GFG"><input type="radio" value="<?=$run['c_name']?>" name="clr[]" class="option1" <?php $item=mysqli_query($con,"SELECT * FROM `set_details` WHERE pid='$pid' and color='$c_name' and aid='$admin_id'");
                // $run=mysqli_fetch_assoc($item);
                if(mysqli_num_rows($item)>0){echo "checked='checked'";}?>/>&nbsp;<?php echo str_replace('_', ' ',$run['c_name']);?></label></div>
            
            <?php }
                  $color_2=mysqli_query($con,"SELECT * FROM `color` WHERE aid='$admin_id' and color_type='1' order by c_name asc");
                  $sn++;
                ?>
                <br><div class="col-md-12">
                  <label class="GFG">OPTION 2&nbsp;&nbsp;<input type="radio" name="chk" onchange="disable_option('option1')"></label></div><br>
                <?php 
                while($run=mysqli_fetch_assoc($color_2))
                  {
$c_name=$run['c_name'];
                    ?>

                <div class="col-md-4 target">
                  <label class="GFG"><input type="checkbox" id="option2" value="<?=$run['c_name']?>" name="clr[]" onchange="disable_option('option1')" class="option2" <?php $item=mysqli_query($con,"SELECT * FROM `set_details` WHERE pid='$pid' and color='$c_name' and aid='$admin_id'");
                // $run=mysqli_fetch_assoc($item);
                if(mysqli_num_rows($item)>0){echo "checked='checked'";}?> />&nbsp;<?php echo str_replace('_',' ',$run['c_name']);?></label></div>
            
            <?php }?>
    


    
            </div>
            <div class="modal-footer">

                <button class="btn btn-default" data-dismiss="modal" data-dismiss="modal" aria-hidden="true">Cancel</button>
            </div>

        </div>
    </div>
</div>
<?php if ($admin_id=='2') {
  ?>
<div id="myModal2" class="modal modal-child" data-backdrop-limit="1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-modal-parent="#myModal">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                
                <h4 class="modal-title">SELECT SIZE</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>&nbsp;&nbsp;&nbsp;
                <button class="btn btn-info" onclick="info2()" type="button" data-dismiss="modal">Save</button>


            </div>
            <div class="modal-body">
                <div class="col-md-12">
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
                			 	<label class="GFG"><input type="checkbox" value="<?=$run2['size_name']?>" <?php 
                        $s_row=$run2["size_name"];
                        $item2=mysqli_query($con,"SELECT * FROM `set_details` WHERE pid='$pid' and size='$s_row'");
                        if(mysqli_num_rows($item2)>0){echo "checked='checked'";}
                        ?> name="size[]" class="chb"/>&nbsp;&nbsp;<?php echo $run2['size_name'];?>&nbsp;&nbsp;</label>
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
<!-- end modal -->
  <?php
}?>

                    <!--   </div>
                    </div>
                </div><br> -->
                
                  
                  <!-- <div class="row">
                  	<div class="col-sm-5" style="margin-left: 10px;">
                  		<div class="form-group">
                  			<div class="field">
                  				

                  			</div>
                  		</div>
                  	</div>
                  </div> -->
                  
                  <br>
                <div class="row">
                  <div class="form-group">
                    <div class="col-sm-12">
                      <button  class="btn btn-primary" type="button" onclick="new1()">Save</button>
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
  $(".chb").change(function()
                                  {
                                      $(".chb").prop('checked',false);
                                      $(this).prop('checked',true);
                                  });
  var loader=document.getElementById('load');
  var color = [];
 var size = [];
 var att = [];
window.onload=info3();
window.onload=info();
window.onload=info2();
window.onload=getval();

 function getval(){
  // var newid = document.getElementById('new_id').value;
  var admin='<?=$admin_id?>';
  var pid = '<?=$pid?>';

// alert(pid);
  // var split=newid.split('~');
 // document.getElementById('gst_type').value=split[0];
 // document.getElementById('mrp').value=split[1];
 // document.getElementById('sale_price').value=split[2];
 // document.getElementById('avail_qty').value=split[3];
 // document.getElementById('gst').value=split[4];
 if ('<?=$admin_id?>'!='2') {
//  document.getElementById('my_size').value=split[7];
 info2();
 }
var type="get";
// alert(split[5]);
  $.ajax({
    type:'POST',
    url: 'getdata.php',
    data: {'newid':pid,'admin':admin,'type':type,'sale_price':(document.getElementById('sale_price').value)},
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
            "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
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
  // document.getElementById('myTable2').style.border="1px solid black";
  $('#myTable2').html(res);
}
});
}

function save_data() {
  info();
  info2();
  info4();
var wsp=document.getElementById('sale_price').value;
var mrp=document.getElementById('mrp').value;
// alert("Hello");
info2();
info3();
  $.ajax({
    type:'POST',
    url:'set_table.php',
    data:{'size':JSON.stringify(size),'color':JSON.stringify(color),'mrp':mrp,'wsp':wsp},
    success:function(res) {
      $('#myTable').html(res);
    }
  })
}



function show_att(cat_id) {
var type="att"; 
var admin='<?=$admin_id?>';
// alert(cat_id);
att=[];
 $('.my_categories').prop('checked',false);
 info3();
$.ajax({
type:'POST',
url:'getdata.php',
data:{'type':type,'cat_id':cat_id,'admin':admin},
success:function(res)
{
  // alert(res);
  $('#att').html(res);
}
});
}

function final_data(img_id) {
  info4();
  info3();
  info2();
  info();
  store_img();
  var item=document.getElementById('new_id').value;
  var cat_id=document.getElementById('category').value;
  var discount=document.getElementById('discount').value;
  var gst=document.getElementById('gst').value;
  var gst_type=document.getElementById('gst_type').value;
  var wsp=document.getElementById('sale_price').value;
  var dscrpt=document.getElementById('dscrpt').value;
  var brand=document.getElementById('brand').value;
  var avail_qty=document.getElementById('avail_qty').value;
  // var set_qty=document.getElementById('set_qty').value;
  var set_id='<?=$row["set_id"]?>';
  var att_id='<?=$row["att_id"]?>';
  var pid='<?=$row["id"]?>';

  var type="update";
  var admin='<?=$admin_id?>';
  // alert(att_id);
$.ajax({
  type:'POST',
  url:'save_item.php',
  data:{'item':item,'cat_id':cat_id,'discount':discount,'gst':gst,'gst_type':gst_type,'wsp':wsp,'dscrpt':dscrpt,'brand':brand,'admin':admin,'size':JSON.stringify(size),'color':JSON.stringify(color),'att':JSON.stringify(att),'img_id':img_id,'type':type,'qty':avail_qty,'set_qty':JSON.stringify(set_qty),'set_id':set_id,'att_id':att_id,'pid':pid},
  success:function(res) {
    // alert(res);
    loader.style.display='none';
    window.location.href="show_prod.php";
  }
});
}

 var form_data = new FormData();

function store_img() {
   // Read selected files
   var img_id='<?=$row["img"]?>';
   var pid='<?=$pid?>';
   var totalfiles = document.getElementById('files').files.length;
   for (var index = 0; index < totalfiles; index++) {
      form_data.append("files[]", document.getElementById('files').files[index]);
      form_data.append("iid",img_id);
      form_data.append("pid",pid);
   }
}
 function new1(){
prod = document.getElementById("new_id");
 // alert(color);
if(color==""){
    alert("Create set First");
    btnfo.focus();
    return false;
  }
    var src=[]; 
      if(document.getElementById("files").files.length == 0)
      {
        loader.style.display='';
        final_data('<?=$row["img"]?>');
      }else{
        $.ajax({
            url: 'update_item_img.php',
            type: 'POST',
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
    }
// function show_att(cat_id) {
// var type="att"; 
// var admin='<?=$admin_id?>';
// // alert(cat_id);
// $.ajax({
// type:'POST',
// url:'edit_table.php',
// data:{'type':type,'cat_id':cat_id,'admin':admin},
// success:function(res)
// {
//   // alert(res);
//   $('#att').html(res);
// }
// });
// }
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

function sum() {
 var total = 0;
var qty = $('input[id^=sum_qty]');
   $.each($(qty), function(){
      total += parseInt($(this).val());
   });
  var wsp=document.getElementById('sale_price').value;
var new_t=total+" (in pcs)";
var tt=total*wsp+".00/-";
   $('#total_qty').html(new_t);
   $('#total_price').html(tt);
}
function delete_img(str) {
  var type="img_del";
  // alert(str);
  $.ajax({
    type:'POST',
    url:'save_item.php',
    data:{'img_url':str,'type':type},
    success:function(res) {
      // alert(res);
      window.location.href="edit_prod.php?pid=<?=$pid?>";
    }
  });
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

// Get the modal
function imagezoom(img) {
  // body...
var modal = document.getElementById("imagezoom");

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById(img);
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
$(document).ready(function() {
    // Animate loader off screen
    $(".se-pre-con").fadeOut("slow");
  });
</script>
<?php
  include ('include/footer.php');
?>