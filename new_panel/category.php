<?php
include('include/header.php');
?>

<div class="page has-sidebar-left height-full">
  <header class="blue accent-3 relative nav-sticky">
    <div class="container-fluid text-white">
      <div class="row p-t-b-10 ">
        <div class="col">
       <h4><i class="icon-th-list"></i> Categories</h4>
       </div>
      </div>
        <div class="row justify-content-between">
          <ul class="nav nav-material nav-material-white responsive-tab" id="v-pills-tab" role="tablist">
          <li><a class="nav-link active" id="v-pills-all-tab" data-toggle="pill" href="category.php"
           role="tab" aria-controls="v-pills-all"><i class="icon icon-list-alt"></i> Categories</a></li>
          <li class="float-right"><a class="nav-link"  href="parent_cat.php" ><i class="icon icon-user-plus"></i> Add Parent Category</a></li>
          </ul>
       </div>
    </div>
</header>
<div class="container-fluid animatedParent animateOnce">
  <!-- modal -->
<div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #33B5E5;">
        <h3 class="modal-title" id="exampleModalScrollableTitle" style="font-size: 20px; font-weight: 600;color: #fff;">Add Sub-Category</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-6">
              <label style="font-size: 18px;">Sub-Category Name</label>
              <input type="text" id="sub_cat" class="form-control">
            </div>
            <div class="col-md-6">
              <label style="font-size: 18px;">Parent Category</label>
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
          <br>
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
  <div class="tab-content my-3" id="v-pills-tabContent">
    <div class="tab-pane animated fadeInUpShort show active" id="v-pills-all" role="tabpanel" aria-labelledby="v-pills-all-tab">
      <div class="row">
                    <div class="col-md-5">
                  <div class="input-group">
                    <h3 class="card-title"><button class="btn btn-primary" data-toggle="modal" data-target="#exampleModalScrollable"> Add Sub-Category</button></h3>
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
                      <th>CATEGORY IMAGE</th>
                      <?php if(!empty($_GET['id'])){?> <th>PARENT CATEGORY NAME</th><?php }?>
                      <th>CATEGORY NAME</th>
                      <th>STATUS</th>
                      <th>ACTION</th>

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
    </td><td><a class="icon-edit" href="edit_cat.php?id=<?=$row['id']?>"></a>&nbsp;
      <?php if(mysqli_num_rows($chk3)>0){?>
      <a href="category.php?id=<?=$row['id']?>" class="icon-eye"></a>
      <?php }?>&nbsp;<a class="icon-delete" style="cursor:pointer;color: #04a9f4;" onclick="del('<?=$row["id"]?>')"></a>&nbsp;
      <?php ?>

    </td>
  </tr>
<?php }?>
             </tbody>
          </table>
          </div>
        </div>
      </div>
      </div>
    </div>
    </div>
  </div>
</div>

   <script type="text/javascript">
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
                  window.location.href="category.php";
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
                window.location.href="category.php";
              }
            });
          }
        }  

</script>

<?php
include('include/footer.php');
?>