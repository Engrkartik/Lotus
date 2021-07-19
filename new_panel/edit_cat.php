<?php
include('include/header.php');
$id=$_GET['id'];
$chk=mysqli_query($con,"SELECT * FROM `category` WHERE id='$id'");
$row=mysqli_fetch_assoc($chk);
?>

<div class="page has-sidebar-left  height-full">
<header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon-clipboard-edit2"></i>
                        Edit Category
                    </h4>
                </div>
            </div>
        </div>
    </header>
<div class="container-fluid animatedParent animateOnce">
<div class="animated fadeInUpShort">
    <div class="row my-3">
      <div class="card-body">
        <h2 class="card-title" style="text-decoration: underline;">Category</h2>
         <form role="form" action="javascript:;" method="POST">
              <div class="form-row">
              <div class="col-md-12" style="border: 2px solid lightgrey;margin-bottom: 38px; padding: 22px 20px 34px; box-shadow: 5px 5px 5px #888888;">
                 <div class="row">
                    <div class="col-md-4">
                      <div class="form-group m-0">
                        <label style="font-size: 18px;">Category Name</label>
                        <input type="text" class="form-control" id="cat_name" value="<?=$row['title']?>" placeholder="Enter Category Name" required="">
                      </div>
                    </div>

                    <div class="col-md-4" style="margin:auto;">
                      <!-- text input -->
                      <div class="form-group m-0">
                        <label style="font-size: 18px;">Category Image</label>
                        <br>
                       <img src="<?=$row['img']?>" id="cat_img" style="width: 100px;height: 100px;" required="">
                        <!-- <i class="fa fa-edit" onclick="show_img()"></i> -->

                      </div>
                    </div>
                  </div>
                  <div class="row" id="row_img">
                    <div class="col-md-4">
                    <div class="form-group m-0">
                      <input type="file" id="img<?=$row['id']?>" class="form-control" onchange="new1('<?=$row['id']?>','cat_img');">
                    </div>
                    </div>
                  </div>
                </div>
              </div>
              <br>
                   <?php 
              $chk2=mysqli_query($con,"SELECT * FROM `category` WHERE parent_id='$id' and (aid='$admin_id' or aid='0')");
              while ($row2=mysqli_fetch_assoc($chk2)) {
                
              ?>
              <div class="form-row">
            <h2 class="card-title" style="text-decoration: underline;">Sub Category</h2>
                <br>
              <div class="col-md-12" style="border: 2px solid lightgrey;margin-bottom: 38px; padding: 22px 20px 34px; box-shadow: 5px 5px 5px #888888;">
                 <div class="row">
                    <div class="col-md-4">
                      <div class="form-group m-0">
                        <label style="font-size: 18px;">Sub Category Name</label>
                        <input type="text" class="form-control" id="<?=$row2['id']?>" name="sub_cat_name[]" value="<?=$row2['title']?>" placeholder="Enter Sub Category Name" required="">
                      </div>
                    </div>

                    <div class="col-md-4" style="margin:auto;">
                      <!-- text input -->
                      <div class="form-group m-0">
                        <label style="font-size: 18px;">Sub Category Image</label>
                        <br>
                        <img src="<?=$row2['img']?>" id="sub_cat<?=$row2['id']?>" style="width: 100px;height: 100px;" required="">
                        <!-- <i class="fa fa-edit" onclick="show_img()"></i> -->

                      </div>
                    </div>
                  </div>
                  <div class="row" id="row_img">
                    <div class="col-md-4">
                    <div class="form-group m-0">
                        <!-- <i class="fa fa-times-circle" onclick="show_img2()" id="can"></i> -->

                      <input type="file" id="img<?=$row2['id']?>" class="form-control" onchange="new1('<?=$row2['id']?>','sub_cat'+'<?=$row2['id']?>');">
                    </div>
                    </div>
                  </div>
                </div>
              </div>
                <?php }?>                                
                    <div class="card-body">
                    <button onclick="save_data()" class="btn btn-primary btn-lg">Save</button>
                  </div>
                  </form>
                  </div>
                </div>
             </div>
           </div>
         </div>

<script>
function show_img() {
  document.getElementById('row_img').style.display="";
  document.getElementById('can').style.display="";

}
 function show_img2() {
  document.getElementById('row_img').style.display="none";
  document.getElementById('can').style.display="none";

}
var img;
function new1(id,print){
  // alert(print);

        var fd = new FormData();
        var files = $('#img'+id+'')[0].files[0];
        fd.append('file',files);
        fd.append('id',id);
       // alert(fd);
        $.ajax({
            url: 'save_cat.php',
            type: 'post',
            data: fd,
            contentType: false,
            processData: false,
             async: false,
            success: function(response){
              // alert(response);
              document.getElementById(print).src=response;
                // img=response;
                }
        });
      }


  function save_data() {
    // alert("Hello");
    var sub_cat_arr = [];
    var cat_name=document.getElementById('cat_name').value;
    var sub_cat=document.getElementsByName('sub_cat_name[]');
    for (var i =0; i<sub_cat.length; i++) {
      var temp=sub_cat[i].value+'~'+sub_cat[i].id;
      sub_cat_arr.push(temp);
    }
    // var cat_type=document.getElementById('cat_type').value;
    // new1();
    console.log(sub_cat_arr);
    // alert(img);

    // alert(img);

    var id='<?=$id?>';
    var type="up_cat";
    var admin='<?=$admin_id?>';
    $.ajax({
      type:'POST',
      data:{'cat_name':cat_name,'id':id,'type':type,'admin':admin,'sub_cat':JSON.stringify(sub_cat_arr)},
      url:'save_cat.php',
      success:function(res) {
        alert(res);
        window.location.href="category.php";
      }
    });
   
}
</script>
    <?php
    include('include/footer.php');
    ?>