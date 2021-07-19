<?php
include("include/header.php");
$today=date('Y-m-d');
$tomo = date("Y-m-d", time() + 86400);
?>

<div class="page has-sidebar-left height-full">
  <header class="blue accent-3 relative nav-sticky">
    <div class="container-fluid text-white">
      <div class="row p-t-b-10 ">
        <div class="col">
       <h4><i class="icon-image"></i> Discount Banners</h4>
       </div>
      </div>
    </div>
</header>
<div class="container-fluid animatedParent animateOnce">
  <div class="tab-content my-3" id="v-pills-tabContent">
    <div class="tab-pane animated fadeInUpShort show active" id="v-pills-all" role="tabpanel" aria-labelledby="v-pills-all-tab">
      <div class="row">
          <div class="col-md-3">
           <a href="" data-toggle="modal" data-target="#exampleModal2" data-backdrop="static" data-keyboard="false"><button type="button" class="btn btn-primary">Edit</button></a>
                 </div>
                 <div class="col-md-6">
                 	
          <?php 
            $query1=mysqli_query($con,"SELECT * FROM `banner` WHERE aid='$admin_id' and title='Discount Banner' and status!='R' order by remark desc");
            $row1=mysqli_fetch_assoc($query1);
          ?>
          <img src="<?=$row1['img']?>" style="width:400px;height:200px;" >
                 	
                 </div>
                </div>
              </div>
      <div class="row my-3">
        <div class="col-md-12">
          <div class="card r-0 shadow">
            <div class="table-responsive">
               <table class="table table-striped table-hover r-0" id="myTable">
                 <thead>
                 	<tr>
                     <th>S.NO</th>
		                <th>Discount Name</th>
		                  <th>No of Products</th>
		                  <th>Action</th>
		                  </tr>
		                </thead>
					<?php

					$query = mysqli_query($con,"SELECT *,COUNT(pid) as ct FROM `discount` WHERE ap = 'A' GROUP BY disc_id");
					while($fetch = mysqli_fetch_array($query)){
					$snn++;
					$logo=$fetch["disc_name"];
					?>
									<tbody>
					                    <td><?php echo $snn;?></td>
					                    <td><?php echo $logo;?></td>
					                    <td><?php echo $fetch['ct'] ?></td>
					                    <td>&nbsp;&nbsp;<button onclick="del(<?=$fetch['disc_id']?>)"><i class="icon-trash" style="cursor: pointer;"></i></button>
					                    <!-- <a href="" class="dropdown-item" data-toggle="modal" data-target="#exampleModal2" data-backdrop="static" data-keyboard="false"><button><i class="fa fa-plus"></i></button></a> -->
					                  </td>                           
					                </tbody>
					<?php } ?>
          </table>
          </div>
        </div>
      </div>
      </div>
      <!-- /////////////////////////////Discount banner//////////////////////////////////////////// -->
          <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header" style="background-color: #33B5E5;">
                          <h5 class="modal-title" id="exampleModalLabel" style="font-size: 20px; font-weight: 600;color: #fff;">Discount Banner</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                        
                        <div class="row">
                          <div class="col-md-12">
                            <div class="card-body table-responsive p-0">
                              <table class="table table-hover text-nowrap" id="myTable">
                                <thead>
                                  <tr>
                                    <th>S.NO</th>
                                    <th>Discount Name</th>
                                    <th>Select</th>
                                  </tr>
                                </thead>
                                <?php
                                  $chk1=mysqli_query($con,"SELECT discount.id,discount.disc_id,COUNT(*) as item,discount.pid,discount.disc_type,discount.disc_name,discount.disc,discount.from_dt as from_dt,discount.to_dt as to_dt,discount.status FROM `discount` where discount.aid='$admin_id' AND ((discount.from_dt>='$today' or discount.from_dt<='$today') and (discount.to_dt>='$today')) and ap != 'A' group by disc_id order by id desc");
                                 while ($row1=mysqli_fetch_assoc($chk1)) {
                                  $snn++;
                                  $logo=$row1["disc_name"];
                                  $disc_id=$row1['disc_id'];
                                ?>
                                <tbody>
                                  <td><?php echo $snn;?></td>
                                  <td><?php echo $logo;?></td>
                                  <td><input type="checkbox" id="check" name="chk[]" value="<?=$disc_id?>"></td>                           
                                </tbody>
                                <?php } ?>
                              </table>
                            </div>
                          </div>
                        </div>
                        <br>
                        <div class="col-md-12">
                          <div class="row" id="vid">
                            <div class="col-md-12">
                              <label>Upload Image</label>
                              <input type="file" id="file1" class="form-control" value="Upload" multiple="" >
                            </div>  
                          </div>
                        </div>
                      </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-primary" onclick="save_disc1()">Upload</button>
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>
<!-- ///////////////////////////// end discount banner//////////////////////////////////////////// -->
    </div>
    </div>
  </div>
  <script type="text/javascript">

function del(td){
  // alert(td);
  var check = confirm("Want to delete?");
  var id = td;
  var type = "bannerdel";

  if(check){
  $.ajax({
    url:'save_banner.php',
    type:'POST',
    data:{'id':id,'type':type},
    success:function(res){
      // alert(res);
      if(res==0){
        // alert("success");
        window.location.href = "http://34.72.9.224/new_panel/edit_banner_discount.php";
        $("#success-alert").show(10000, 500).slideUp(500, function(){
        $("#success-alert").slideUp(500);
        });
      }
      else{
        tempAlert("error",3000);
      }
    }
  });
}
}
function save_disc1(){
  var form_data = new FormData();
     var totalfiles = document.getElementById('file1').files.length;
       for (var index = 0; index < totalfiles; index++) {
          form_data.append("file1[]", document.getElementById('file1').files[index]);
        }
        // alert(totalfiles);
        if(totalfiles>0)
        {
        $.ajax({
            url: 'update_banner.php',
            type: 'post',
            data: form_data,
            contentType: false,
            processData: false,
             async: true,
            success: function(response){
              check(response);
                }
        });
      }
    else{
      // alert('Select Image');
      check('err');
}
}

var chk = [];
function check(loc){
  // var check = document.getElementById('check').value;
chk=[];

var checkboxes = document.getElementsByName('chk[]');
// var vals = "";
for (var i=0, n=checkboxes.length;i<n;i++) 
{
    if (checkboxes[i].checked) 
    {
        chk.push(checkboxes[i].value);
    }
}
  // alert(chk);
var slider="Discount Banner";
var type="att";
var admin='<?=$admin_id?>';
// var cat_id=document.getElementById('category').value;
$.ajax({
type:'POST',
url:'update_banner.php',
data:{'chk':JSON.stringify(chk),'type':type,'admin':admin,'slider':slider,'loc':loc},
success:function(res)
{
  if(res==1){
    alert("success");
    window.location.href="edit_banner_discount.php";
  }
}
});

}
</script>
<?php
include("include/footer.php");
?>
