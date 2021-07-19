<?php
include('include/header.php');
?>
<style>
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
/*/////////////////////////////End loader/////////////////////////////////////////////////////*/
  </style>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>
   <div class="se-pre-con"></div>


<div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <div class="col-md-12">
                  <div class="row">
                    
                    <div class="col-md-2">

                <h3 class="card-title"><a href="category.php"><button class="btn btn-primary"> Add Parent Category</button></a></h3>
              </div>
              <div class="col-md-3">
   <h3 class="card-title"><button class="btn btn-primary" data-toggle="modal" data-target="#exampleModalScrollable"> Add Sub-Category</button></h3>
</div>
<!-- <div class="col-md-3">
  <h3><button onclick="goBack()" class="btn btn-secondary">Go Back</button></h3>
</div> -->
</div>




<!-- modal -->
<div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Add Sub-Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-6">
              <label>Sub-Category Name</label>
              <input type="text" id="sub_cat" class="form-control">
            </div>
            <div class="col-md-6">
              <label>Parent Category</label>
              <select class="form-control" id="main_cat">
              <option>Select Main Category</option>
              <?php 
              $query=mysqli_query($con,"SELECT * FROM `category` WHERE aid='$admin_id' and status!='R'");
                     while ($row2=mysqli_fetch_assoc($query)) {?>
                      <option value="<?=$row2['id']?>"><?php echo $row2['title'];?></option>
                     <?php }?>
                      </select>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <input type="file" id="img" class="form-control">
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" onclick="new1()" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>
                  </div>
                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                   <!--  <input type="text" name="table_search" class="form-control float-right" id="myInput" onkeyup="myFunction()" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div> -->
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="row">
                  <div class="col-md-12">
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card">
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap" id="myTable" style="width: 100%;">
                  <thead>
                   <thead>
                    <tr>
                      <th style="vertical-align: middle;">S.NO</th>
                      <th style="vertical-align: middle;">CATEGORY IMAGE</th>

                      <?php if(!empty($_GET['id'])){?> <th style="vertical-align: middle;">PARENT CATEGORY NAME</th><?php }?>
                      <th style="vertical-align: middle;">CATEGORY NAME</th>
                      <th style="vertical-align: middle;">STATUS</th>
                      <th style="vertical-align: middle;">ACTION</th>

                    </tr>
                    
                   </thead>
                   <tbody>
                     <?php
                     if(!empty($_GET['id']))
                     {
                      $id=$_GET['id'];
                      $chk=mysqli_query($con,"SELECT * FROM `category` WHERE aid='$admin_id' and status!='R' and parent_id='$id'");
                      $chk2=mysqli_query($con,"SELECT * FROM `category` WHERE aid='$admin_id' and status!='R' and id='$id'");
                      $run=mysqli_fetch_assoc($chk2);

                     }else
                     {
                      $chk=mysqli_query($con,"SELECT * FROM `category` WHERE aid='$admin_id' and status!='R' and parent_id='0'");
                    }
                     while ($row=mysqli_fetch_assoc($chk)) {
                      $sub_id=$row['id'];
                      $chk3=mysqli_query($con,"SELECT * FROM `category` WHERE aid='$admin_id' and status!='R' and parent_id='$sub_id'");

    $sn++;
    ?>
    <tr>
    <td value="<?=$row['id']?>" id="dd"><?php echo $sn;?></td>
    <td><img src="<?=$row['img']?>" style="width: 100px;height: 100px;"></td>
    <?php if(!empty($_GET['id'])){?><td><?php echo $run["title"];?></td><?php }?>
    <td><?php echo $row["title"];?></td>
    <td><?php
    if($row["status"]=="A")
      {?>
        <button class='btn btn-primary' disabled="">Active</button>
      <?php }
    else{ ?>
      <button class='btn btn-danger' disabled="">Inactive</button>
    <?php }
    ?>
    </td><td><a class="fa fa-edit" href="edit_cat.php?id=<?=$row['id']?>"></a>&nbsp;
      <?php //if(mysqli_num_rows($chk3)>0){?>
      <!-- <a href="show_cat.php?id=<?=$row['id']?>" class="fa fa-eye"></a> -->
      <?php// }?>&nbsp;<a class="fa fa-trash" style="cursor:pointer;" onclick="del('<?=$row["id"]?>')"></a>&nbsp;
      <?php ?>

    </td>
  </tr>
<?php }?>
                   </tbody>
                </table>
              </div>
              </div>
              <!-- /.card-body -->
            </div>
            
            <!-- /.card -->
          </div>
        </div>
        <script type="text/javascript">
          /*function show_disc(id) {
            var pre=document.getElementById('preview');
            var type="show";
                  $.ajax({
                    type:'POST',
                    url:'add_disc.php',
                    data:{'id':id,'type':type},
                    success:function(res)
                    {
                      pre.style.display='none';
                      $('#myTable').html(res);
                    }
                  });
                }*/

                function del(id) {
                       var r=confirm("You are no longer to access this category");
                       var type="del";
                       var admin='<?php echo $admin_id?>';
                       // alert(id);
                       if(r==true)
                       {
                        $.ajax({
                          type:'POST',
                          url:'save_cat.php',
                          data:{'id':id,'type':type,'admin':admin},
                          success:function(res) {
                            // alert(res);
                            window.location.href="show_cat.php";
                          }

                        });
                       }
                      }    
                    
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
             async: true,
            success: function(response){
              save_sub(response);
                }
        });
      }

                function save_sub(loc) {
                    var sub_cat=document.getElementById('sub_cat').value;
                    var main_cat=document.getElementById('main_cat').value;
                    var type="sub";
                    var admin='<?php echo $admin_id?>';

                    if(main_cat=='00')
                    {
                      alert("Select Parent Category...!!!");
                    }else{
                      $.ajax({
                        type:'post',
                        url:'save_cat.php',
                        data:{'type':type,'main_cat':main_cat,'sub_cat':sub_cat,'admin':admin,'loc':loc},
                        success:function(res) {
                          alert(res);
                          window.location.href="show_cat.php";
                        }
                      });
                    }
                  }  

function goBack() {
  window.history.back();
}
  ////////////////////////loader///////////////////////////////////////////////////
$(window).load(function() {
    // Animate loader off screen
    $(".se-pre-con").fadeOut("slow");;
  });
  /////////////////////////////////end loader////////////////////////////////////
        </script>
<?php
include('include/footer.php');
?>