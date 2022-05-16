<?php
include('include/header.php');
session_start();
  mysqli_query($con,"DELETE FROM `disc_tran` WHERE aid='$admin_id'");

$chk_row=mysqli_query($con,"SELECT * FROM `disc_tran` WHERE aid='$admin_id' GROUP by t_id");
$t_id=mysqli_num_rows($chk_row)+1;
if(empty($_SESSION['t_id']))
{
$_SESSION['t_id']=$t_id;
}else
{
}
?>
<head>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/moment.min.js"></script>
	<style type="text/css">
 #from_dt {
    position: relative;
    /*width: 150px; height: 20px;*/
    color: white;
} 

#from_dt:before {
    position: absolute;
    /*top: 3px; left: 3px;*/
    content: attr(data-date);
    display: inline-block;
    color: black;
}

#from_dt::-webkit-datetime-edit, #dat::-webkit-inner-spin-button, #dat::-webkit-clear-button {
    display: none;
}

#from_dt::-webkit-calendar-picker-indicator {
    position: absolute;
    top: 3px;
    right: 0;
    color: black;
    opacity: 1;
}
/*//////////////////////////////////////////////////////////////////////////////////////*/
 #to_dt {
    position: relative;
    /*width: 150px; height: 20px;*/
    color: white;
} 

#to_dt:before {
    position: absolute;
    /*top: 3px; left: 3px;*/
    content: attr(data-date);
    display: inline-block;
    color: black;
}

#to_dt::-webkit-datetime-edit, #dat::-webkit-inner-spin-button, #dat::-webkit-clear-button {
    display: none;
}

#to_dt::-webkit-calendar-picker-indicator {
    position: absolute;
    top: 3px;
    right: 0;
    color: black;
    opacity: 1;
}
/*////////////////////////////////////////////////////////////////////////////////////////////////*/
		body {
    background: #e8cbc0;
    background: -webkit-linear-gradient(to right, #e8cbc0, #636fa4);
    background: linear-gradient(to right, #e8cbc0, #636fa4);
    min-height: 100vh;
}

.bootstrap-select .bs-ok-default::after {
    width: 0.3em;
    height: 0.6em;
    border-width: 0 0.1em 0.1em 0;
    transform: rotate(45deg) translateY(0.5rem);
}

.btn.dropdown-toggle:focus {
    outline: none !important;
}

	</style>
</head>
 <div class="col-md-12">
            <!-- general form elements disabled -->
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Add Discount</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Discount Name</label><label style="color: red">*</label>
                        <input type="text" class="form-control" id="disc_name" placeholder="Enter ...">
                      </div>
                    </div>

                  </div>
                  <div class="row">
                   <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Discount Type</label><label style="color: red">*</label>
                        <select class="form-control" id="disc_type">
                          <option disabled="true" selected="selected">Select Discount Type</option>
                          <option value="P">Percentage</option>
                          <option value="A">Amount</option>
                        </select>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Applicable From Date</label><label style="color: red">*</label>
                        <input type="date" class="form-control" data-date="" data-date-format="DD MMMM YYYY" id="from_dt"  value="<?php $dat=date('Y-m-d'); echo $dat;?>" min="<?=$dat?>" onchange="to_date()">
                      </div>
                        <!-- <div class="col-sm-6" style="position: absolute;margin-top: -40px;"> -->
                        <img src="images/cal.png" style="float: right;position: relative;margin-top: -40px;">
                    <!-- </div> -->
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Discount</label><label style="color: red">*</label>
                        <input type="number" class="form-control" id="disc" placeholder="Enter ...">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Applicable To Date</label><label style="color: red">*</label>
                       <input type="date" data-date="" data-date-format="DD MMMM YYYY" onchange="from_date()" id="to_dt" class="form-control" min="<?=$dat?>">
                      </div>
                        <img src="images/cal.png" style="float: right;position: relative;margin-top: -40px;">
                       
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Category</label><label style="color: red">*</label>
                        <button type="button" class="btn btn-warning form-control" data-toggle="modal" data-target="#myModal" onclick="refreshModal()">Choose Category</button>
                      
                      </div>
                    </div>
                     <div id="myModal" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" onload="reload();" >
					    <div class="modal-dialog">
					        <!-- Modal content-->
					        <div class="modal-content">
					            <div class="modal-header">
					                <h4 class="modal-title">SELECT PRODUCT</h4>
					                <button type="button" class="close" data-dismiss="modal">&times;</button>

					            </div>
					            <div class="modal-body">
					            
					            <div class="col-md-12">
							       	<div class="row" id="att">
       <?php  
                $chk=mysqli_query($con,"SELECT * FROM category where aid='$admin_id' and parent_id='0'");
  while($chk_r=mysqli_fetch_assoc($chk))
  {
  $cat_id=$chk_r['id'];
  // echo $admin;
  $query = mysqli_query($con,"SELECT product.* FROM `product` WHERE cat_id = '$cat_id' and status='A'");
  if(mysqli_num_rows($query)>0){
  ?>
  <!-- <div class="row"> -->
    <br><label><?php echo $chk_r["title"];?></label><label style="margin-left: 20px;margin-top: -3px;" class="GFG"><b>SELECT ALL</b>&nbsp;&nbsp;<input type="checkbox" class="<?=preg_replace('/\s+/', '_',$chk_r['title'])?>" onclick="check('<?=preg_replace('/\s+/', '_',$chk_r['title'])?>')"></label><br>
  

  <?php }
  while($fetch = mysqli_fetch_assoc($query)){

    $pname = $fetch['item_name'];
    
    // echo '<input type="button" id="btn" value="'.$pname.'"> &nbsp;&nbsp;';
    ?><div class="col-md-12">&nbsp;
      <label class="GFG">
      <input type="checkbox" id="att" name="att[]" class="<?=preg_replace('/\s+/', '_',$chk_r['title'])?>" value="<?=preg_replace('/\s+/', '_',($chk_r["id"])).'~'.preg_replace('/\s+/', '_',$fetch["id"])?>" <?php 
      $tid=$_SESSION['t_id'];

    $verify2=mysqli_query($con,"SELECT * FROM `disc_tran` WHERE aid='$admin_id' and prod='$pname' order by cat asc");
    if(mysqli_num_rows($verify2)>0){echo "checked='checked'";}
       ?> ><?php echo $fetch["item_name"];?>
    </label>
  </div>

  <?php }

  ?>
<!-- </div> -->
<?php }?>
					            <div class="modal-footer">
					                <button class="btn btn-info" type="button" onclick="info()" data-dismiss="modal">Save</button>

					                <button class="btn btn-default" data-dismiss="modal" data-dismiss="modal" aria-hidden="true">Cancel</button>
					            </div>

					        </div>
					    </div>
					</div>
        </div></div>
      </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Product Name</label><label style="color: red">*</label>
                        <?php 
                     // $query=mysqli_query($con,"SELECT product.*,category.title FROM `product` LEFT JOIN category on category.id=product.cat_id ORDER BY product.`id` ASC");
                        $query=mysqli_query($con,"SELECT product.*,category.title FROM `product` LEFT JOIN category on category.id=product.cat_id WHERE product.id NOT IN (SELECT prod FROM disc_tran) and product.status='A' and product.aid='$admin_id' ORDER BY product.`id` desc");
                        ?>
                        <select class="form-control" id="item" onchange="pushRules()" onclick="refreshV('<?=$admin_id?>')">
                          <option value="00" selected="selected">Select Design</option>
                          <?php 
                         	 while($values=mysqli_fetch_assoc($query)) {
                          ?>
                          <option value="<?=$values['cat_id'].'~'.$values['id']?>"><?php echo $values['item_name'];?></option>
          						  <?php 
          							   }
          						  ?>
                        </select>
                      </div>
                    </div>
                   </div>
                  
                <div class="row">
                  <!-- <div class="form-group" style="float: right;"> -->
                  	
                    <div class="col-sm-12">
                      <div class="form-group" >
                        <label>Selected Product</label>
                        <div id="list" style="border: 1px solid lightgrey; padding: 40px" class="col-md-12" style="width: 50%">
                          <!-- <table id="myTable" class="new_array">
                            <thead>
                             
                            </thead>
                            <tbody>
                              <tr>
                                <td></td>
                              </tr>
                            </tbody>
                          </table> -->
                            <div class="row" id="myTable">
                           
                         </div>
                        </div>
                      </div>
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-sm-6">
                      <button onclick="saveval()" class="form-control btn btn-primary">Save</button>
                    </div>
                      <div class="col-sm-6">
                      <a href="discount.php"><button type="reset" class="form-control btn btn-info">Clear</button></a>
                    </div>
                  </div>
                  <!-- </div> -->
                  <br>
                </div>
                 <div class="row">
                  <div class="form-group">
                    
                  </div><br>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            
              </div>
<script type="text/javascript">


var arr = [];
var size = [];
var att1 = [];
var new_att=[];

function to_date() {
  document.getElementById('to_dt').min=document.getElementById('from_dt').value;
}
 function from_date() {
  document.getElementById('from_dt').max=document.getElementById('to_dt').value;
}
 function check(cls) {
             // $('.checkAll').click(function(){
    if($('.'+cls).prop('checked')){
        $('.'+cls).prop('checked',true);
    }
    else{
        $('.'+cls).prop('checked',false);
    }
// });
        
    }

   
function pushcat(){

    var type = "showPro";
	// alert(w);
  var admin='<?=$admin_id?>';
  // alert(admin);
	$.ajax({
      type:'POST',
      url:'add_disc.php',
      data:{'type':type,'admin':admin},
      success:function(res) {
       
        	$('#att').html(res); 
        	// alert(res);        
      
 	 }
    });

}

function info() {
  arr=[];
  var checkboxes = document.getElementsByName('att[]');
var vals = "";
for (var i=0, n=checkboxes.length;i<n;i++) 
{
    if (checkboxes[i].checked) 
    {
        arr.push(checkboxes[i].value);
        
    }
}
// att1.push(att);
// alert(arr);
var type="att";
var admin='<?=$admin_id?>';
var i;
// var cat_id=document.getElementById('myselect').value;
$.ajax({
type:'POST',
url:'add_disc.php',
data:{'att':(JSON.stringify(arr)),'type':type,'admin':admin},
success:function(res)
{
  // alert(res);
  $('#myTable').html(res);
  for(i=0;i<arr.length;i++)
  {
   $("#item option[value='"+arr[i]+"']").remove();
}
}
});
}

  function saveval(){
    var disc=document.getElementById('disc').value;
    var disc_name=document.getElementById('disc_name').value;
    var disc_type=document.getElementById('disc_type').value;
    var from_dt=document.getElementById('from_dt').value;
    var to_dt=document.getElementById('to_dt').value;
    // var w = document.getElementById('item').value;
    var type="saveadd";
    var admin_id='<?php echo $admin_id;?>';
    var t_id='<?=$_SESSION["t_id"]?>';
    // alert(t_id);
   
    if(disc_name==""){
      alert('Discount Name Can not be empty..!!');
      document.getElementById('disc_name').focus();
      return false;
    }
    if(disc_type=="Select Discount Type")
    {
      alert('Select Discount Type..!!');
      document.getElementById('disc_type').focus();
      return false;
    }
    if(disc==""){
      alert('Enter Discount..!!');
      document.getElementById('disc').focus();
      return false;
    }
    if(to_dt=="")
    {
      alert('Select To Date..!!');
      document.getElementById('to_dt').focus();
      return false;
    }
    console.log(disc_name,disc_type,from_dt,to_dt);
  if(disc_type=="P")
  {
    disc=disc/100;
  }
    $.ajax({
      type:'POST',
      url:'add_disc.php',
      data:{'disc':disc,'disc_name':disc_name,'type':type,'admin_id':admin_id,'disc_type':disc_type,'from_dt':from_dt,'to_dt':to_dt,'t_id':t_id},
      success:function(res) {
        // alert(res);
        if(res==1)
        {
         alert("All Field are mandetory..!!");
        }
        else if(res==0){
          window.location.href = 'disc_show.php';
        }
        else {
              // alert(res);
              alert(res+" already added in another discount slab");
              
        }
      }
    });
  }

  function unique(array){
  return array.filter(function(el, index, arr) {
      return index == arr.indexOf(el);
  });
}
function refreshV(admin_id) {
	// alert("Hello");
	var type="refresh";
	$.ajax({
		type:"POST",
		url:'add_disc.php',
		data:{'type':type,'admin_id':admin_id},
		success:function(res) {
			$('#item').html(res);
		}
	});
}
  function pushRules(){
    var i;
  var item=document.getElementById('item').value;
  // arr.push(item);
  var type="att2";
var admin='<?=$admin_id?>';
// var cat_id=document.getElementById('myselect').value;
$.ajax({
type:'POST',
url:'add_disc.php',
data:{'type':type,'admin':admin,'item':item},
success:function(res)
{
  // alert(res);
  // $("#item-select option[value='" + item + "']").remove();
  $('#myTable').html(res);
  $("#item option:selected").remove();
  // alert(item);
  $(":checkbox").filter(function() {
  return this.value == item;
}).prop("checked","true");


}
});
}
$(function () {
    $('.selectpicker').selectpicker();
});


function delete2(pid,cid) {
	// alert(cid+'~'+pid);
  var type="delete";
  // alert(pid);
  var admin='<?=$admin_id?>';
  var tid='<?=$_SESSION["t_id"]?>';
  $.ajax({
type:'POST',
url:'add_disc.php',
data:{'type':type,'p_id':pid,'admin':admin,'tid':tid},
success:function(res)
{
  $('#myTable').html(res);
  $(":checkbox").filter(function() {
  return this.value == cid+'~'+pid;
}).prop("checked",false);


  // window.location.href="edit_disc.php?disc_name=<?=$disc_name?>";
  // pushRules();

}
  });
}

$("input").on("change", function() {
    this.setAttribute(
        "data-date",
        moment(this.value, "YYYY-MM-DD")
        .format( this.getAttribute("data-date-format") )
    )
}).trigger("change")
</script>
<?php
	include ('include/footer.php');
?>