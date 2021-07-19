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
$disc_name=$_GET['disc_name'];
$chk2=mysqli_query($con,"SELECT * FROM `discount` LEFT JOIN product on product.id=discount.pid WHERE discount.disc_id='$disc_name' and product.aid='$admin_id'");
$row=mysqli_fetch_assoc($chk2);
$ddd=date('Y-m-d');
?>

<div class="page has-sidebar-left  height-full">
<header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon-percent"></i>
                        Edit Discount
                    </h4>
                </div>
            </div>
        </div>
    </header>
<div class="container-fluid animatedParent animateOnce">
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
                          <button class="btn btn-info" type="button" onclick="info1()" data-dismiss="modal">Save</button>

                          <button class="btn btn-default" data-dismiss="modal" data-dismiss="modal" aria-hidden="true">Cancel</button>
                      </div>

                  </div>
              </div>
          </div>
        </div></div>
      </div>
        <div class="animated fadeInUpShort">
            <div class="row my-3">
                  <div class="card-body">
                    <h2 class="card-title" style="text-decoration: underline;">Add Discount</h2>
                     <form>
                                <div class="form-row">
                                  <div class="col-md-4">
                                        <div class="form-group m-0">
                                            <label class="col-form-label s-6">Discount Name</label>
                                            <input  id="disc_name" placeholder="Enter Discount name" class="form-control r-0 light s-6 " type="text"value="<?=$row['disc_name']?>" <?php if($row['from_dt']<$ddd){echo "disabled";}?>>
                                        </div>
                                      </div>
                                      <div class="col-md-4">
                                            <div class="form-group m-0">
                                            <label class="col-form-label s-6">Discount Type</label>
                                           <select class="form-control" id="disc_type" <?php if($row['from_dt']<=$ddd){echo "disabled";}?>>
                                            <option value="00" selected="selected" disabled="true">Select Category Type</option>
                                            <option <?php if($row['disc_type']=='P'){echo "selected";}?> value="P">Percentage</option>
                                            <option <?php if($row['disc_type']=='A'){echo "selected";}?> value="A">Amount</option>                                        
                                          </select>
                                        </div> 
                                        </div>
                                        </div>
                                        <br>
                                        <div class="form-row">
                                        <div class="col-md-4">
                                        <div class="form-group m-0">
                                            <label class="col-form-label s-6">Applicable From Date</label>
                                            <input type="date" class="form-control" data-date="" data-date-format="DD MMMM YYYY" id="from_dt" value="<?=$row['from_dt']?>" <?php if($row['from_dt']<=$ddd){echo "disabled";}?> min='<?=$ddd?>' onchange="from_date()">
                                        </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group m-0">
                                            <label class="col-form-label s-6">Discount</label>
                                           <input  id="disc" placeholder="Enter Discount Amount" class="form-control r-0 light s-6 " type="number"value="<?=$row['disc']?>" <?php if($row['from_dt']<$ddd){echo "disabled";}?>>
                                        </div> 
                                        </div>
                                        </div>
                                        <div class="form-row">
                                        <div class="col-md-4">
                                        <div class="form-group m-0">
                                            <label class="col-form-label s-6">Applicable To Date</label>
                                            <input type="date" data-date="" data-date-format="DD MMMM YYYY" onchange="from_date()" id="to_dt" class="form-control" value="<?=$row['to_dt']?>" min="<?=$row['from_dt']?>">
                                        </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group m-0">
                                            <label class="col-form-label s-6">Category</label>
                                            <button type="button" class="btn btn-warning form-control" data-toggle="modal" data-target="#myModal" onclick="refreshModal()">Choose Category</button>
                                        </div> 
                                        </div>
                                        </div>
                                        <div class="form-row">
                                        <div class="col-md-4">
                                        <div class="form-group m-0">
                                            <label class="col-form-label s-6">Product Name</label>
                                            <?php 
                     // $query=mysqli_query($con,"SELECT product.*,category.title FROM `product` LEFT JOIN category on category.id=product.cat_id ORDER BY product.`id` ASC");
                        $query=mysqli_query($con,"SELECT product.*,category.title FROM `product` LEFT JOIN category on category.id=product.cat_id WHERE product.id NOT IN (SELECT prod FROM disc_tran) and product.status='A' and product.aid='$admin_id' ORDER BY product.`id` ASC");
                        ?>
                        <select class="form-control" id="item" onchange="pushRules()" onclick="refreshV('<?=$admin_id?>')" required="">
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
                                        <br>
                                        <div class="form-row">
                                          <div class="col-md-6">
                                            <div class="form-group m-0">
                                              <label>Selected Product</label>
                                              <div id="list2" style="border: 1px solid lightgrey; padding: 40px" class="col-md-12" style="width: 50%">
                                              <div class="row" id="myTable2">
                                                <!-- data shown in table -->
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>

                                
                                <div class="card-body">
                                <button onclick="saveval()" class="btn btn-primary btn-lg">Save</button>
                                <a href="create_disc.php"><button class="btn btn-default" type="reset">Clear</button></a>
                               </div>
                              </form>
                  </div>
                </div>
             </div>
           </div>
         </div>

<script>
window.onload=pushRules();
window.onload=to_date();
var arr = [];
var size = [];
var att1 = [];
var new_att=[];

function from_date() {
  // alert("Hello");
  document.getElementById('to_dt').min=document.getElementById('from_dt').value;
}
 function to_date() {
  document.getElementById('from_dt').max=document.getElementById('to_dt').value;
}
function check(cls) {
           if($('.'+cls).prop('checked')){
        $('.'+cls).prop('checked',true);
    }
    else{
        $('.'+cls).prop('checked',false);
    }
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
function info() {
  // alert("Hello");
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
var type="att3";
var admin='<?=$admin_id?>';
// var table= document.getElementById('list');
// var cat_id=document.getElementById('myselect').value;
$.ajax({
type:'POST',
url:'add_disc.php',
data:{'att':(JSON.stringify(arr)),'type':type,'admin':admin},
success:function(res)
{
  // alert(res);
 // table.style.display='none';
 // document.getElementById('list2').style.display='';
  $('#myTable2').html(res);
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
    var type="update";
    var admin_id='<?php echo $admin_id;?>';
// alert(att1.length);
disc_id='<?=$disc_name?>';

    $.ajax({
      type:'POST',
      url:'add_disc.php',
      data:{'disc':disc,'disc_name':disc_name,'type':type,'admin_id':admin_id,'disc_type':disc_type,'from_dt':from_dt,'to_dt':to_dt,'disc_id':disc_id},
      success:function(res) {
        // alert(res);
        if(res==1)
        {
         alert("Error..!!");
        }
        else if(res==0){
              // alert(res);
              window.location.href = 'discount.php';
        }else{
              alert(res+" already added in another discount slab");
          
        }
      }
    });
  }

  function pushRules(){
    info();
    var i;
  var item=document.getElementById('item').value;

  var type="att4";
var admin='<?=$admin_id?>';
// var cat_id=document.getElementById('myselect').value;
$.ajax({
type:'POST',
url:'add_disc.php',
data:{'type':type,'admin':admin,'item':item},
async:true,
success:function(res)
{
  // alert(res);
  $('#myTable2').html(res);
   $("#item option:selected").remove();
  // alert(item);
  $(":checkbox").filter(function() {
  return this.value == item;
}).prop("checked","true");

}
});
}
// function delete1(did) {
//   var type="delete1";
//   alert(did);
//   $.ajax({
// type:'POST',
// url:'add_disc.php',
// data:{'type':type,'d_id':did},
// success:function(res)
// {
//   window.location.href="edit_disc.php?disc_name=<?=$disc_name?>";
// }
//   });
// }

function delete2(pid,cid) {
  var type="delete2";
  // alert(pid);
  var disc_id='<?=$disc_name?>';
  var tid='<?=$_SESSION["t_id"]?>';
  var aid='<?=$_SESSION["admin_id"]?>';

  $.ajax({
type:'POST',
url:'add_disc.php',
data:{'type':type,'p_id':pid,'did':disc_id,'t_id':tid,'aid':aid},
success:function(res)
{
  $('#myTable2').html(res);

  // window.location.href="edit_disc.php?disc_name=<?=$disc_name?>";
  $(":checkbox").filter(function() {
  return this.value == cid+'~'+pid;
}).prop("checked",false);

  // pushRules();

}
  });
}

</script>
    <?php
    include('include/footer.php');
    ?>