<?php
include('include/header.php');
$id=$_GET['id'];
$chk=mysqli_query($con,"SELECT * FROM `category` WHERE id='$id'");
$row=mysqli_fetch_assoc($chk);
?>
 <div class="col-md-12">
            <!-- general form elements disabled -->
            <div class="card card-warning">
              <div class="card-header">
                <div class="col-md-12">
                  <div class="row">
                    <div class="col-md-3">
                <h3 class="card-title"> Category</h3>
              </div>
              
<!-- <div class="col-md-3">
  <h3><button onclick="goBack()" class="btn btn-secondary">Go Back</button></h3>
</div> -->
</div>

</div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form role="form" action="javascript:;" onsubmit="new1()" method="POST">
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Category Name</label><label style="color: red">*</label>
                        <input type="text" class="form-control" id="cat_name" value="<?=$row['title']?>" placeholder="Enter ..." disabled>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Category Image</label><label style="color: red">*</label>
                        <img src="<?=$row['img']?>" style="width: 100px;height: 100px;">
                        <!-- <i class="fa fa-edit" onclick="show_img()"></i> -->

                      </div>
                    </div>
                  </div>
                  <div class="row" id="row_img">
                    <div class="col-sm-6">
                    <div class="form-group">
                        <!-- <i class="fa fa-times-circle" onclick="show_img2()" id="can"></i> -->

                      <input type="file" id="img" class="form-control">
                    </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <button class="btn btn-success" type="button" onclick="save_data()">Save</button>
                      <!-- <button class="btn btn-default" type="reset">Clear</button> -->

                    </div>
                  </div>
                  
                </div>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            
              </div>
<script type="text/javascript">
function show_img() {
  document.getElementById('row_img').style.display="";
  document.getElementById('can').style.display="";

}
 function show_img2() {
  document.getElementById('row_img').style.display="none";
  document.getElementById('can').style.display="none";

}
var img;
function new1(){

        var fd = new FormData();
        var files = $('#img')[0].files[0];
        fd.append('file',files);
       // alert(fd);
        $.ajax({
            url: 'save_cat.php',
            type: 'post',
            data: fd,
            contentType: false,
            processData: false,
             async: false,
            success: function(response){
              
                img=response;
                }
        });
      }


  function save_data() {
    // alert("Hello");

    var cat_name=document.getElementById('cat_name').value;
    // var cat_type=document.getElementById('cat_type').value;
    new1();
    // alert(img);

    // alert(img);

    var id='<?=$id?>';
    var type="up_cat";
    var admin='<?=$admin_id?>';
    $.ajax({
      type:'POST',
      data:{'cat_name':cat_name,'id':id,'type':type,'loc':img,'admin':admin},
      url:'save_cat.php',
      success:function(res) {
        alert(res);
        window.location.href="show_cat.php";
      }
    });
   
}
</script>
          <?php
include ('include/footer.php');
          ?>