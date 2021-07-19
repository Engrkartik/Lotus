<?php
include('include/header.php');
?>
<style>
  .add_btn {
    float: right;
  font-size: 14px;
  text-transform: uppercase;
  letter-spacing: 5.3px;
  font-weight: 600;
  color: #fff;
background: linear-gradient(90deg, rgb(41 121 255) 0%, rgb(41 121 255) 100%);
  border: none;
  border-radius: 1000px;
  box-shadow: 3px 3px 9px rgb(41 121 255);
  cursor: pointer;
  outline: none;
  position: relative;
  padding: 10px;
  }


</style>

<div class="page has-sidebar-left height-full">
    <header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon-local_mall"></i>
                        All Products
                    </h4>
                </div>
            </div>
            <div class="row justify-content-between">
                <ul class="nav nav-material nav-material-white responsive-tab" id="v-pills-tab" role="tablist">
                    <li>
                        <a class="nav-link active" id="v-pills-all-tab" data-toggle="pill" href="products.php"
                           role="tab" aria-controls="v-pills-all"><i class="icon icon-list"></i> All Products</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <div class="container-fluid animatedParent animateOnce">
        <div class="tab-content my-3" id="v-pills-tabContent">
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #33B5E5;">
        <h3 class="modal-title" id="exampleModalLabel" style="font-size: 20px; font-weight: 600;color: #fff;"><label>PRODUCT IMAGES</label></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form action="javascript:;" method="POST" onsubmit="upload_img();">
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            
            <div class="row">
              <div class="col-md-12" style="margin-bottom: 12px;">
                 <label>Upload Images</label>
                 <br>
                  <input type="file" id="files" name="files[]" multiple style="border: dashed black 2px;padding: 30px;">
                  <p>Drag your files here or click in this area.</p>
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
        <button class="btn btn-primary" type="submit">Upload</button>
      </div>
    </form>
    </div>
  </div>
</div>
        <div class="tab-pane animated fadeInUpShort show active" id="v-pills-all" role="tabpanel" aria-labelledby="v-pills-all-tab">
          <div class="row">
               <div class="col-md-4">
                  <select class="form-control" onchange="myFunction2()" id="input2">
                    <option selected="" disabled="">Status Filter</option>
                    <option value="e">All</option>
                    <option value="active">Active</option>
                    <option value="remove">Remove</option>
                  </select>
                </div>
                <div class="col-md-4">
              <div class="input-group">
               
                <input type="text" name="table_search" class="form-control float-right" id="myInput" onkeyup="myFunction3()" placeholder="Search">

                <!-- <div class="input-group-append"> -->
                  <!-- <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button> -->
                </div>
              </div>
              <div class="col-md-4">
                <button class="add_btn" data-target="#exampleModal" data-toggle="modal"><i class="icon icon-user-plus"></i> Add New Products</button>
              </div>
            </div>
            <div class="row my-3">
                <div class="col-md-12">
                    <div class="card r-0 shadow">
                        <div class="table-responsive">
                          <form>
                <table class="table table-striped table-hover r-0" id="myTable1">
                  <thead>
                     <tr class="no-b">
                        <th style="width: 2px;">S.NO</th>
                           <th>IMAGE</th>
                              <th>NAME</th>
                                <th>CATEGORY NAME</th>
                                 <th>DISCOUNT</th>
                                   <th>SALE PRICE</th>
                                    <th>AVAIL QTY</th>
                                    <th>STATUS</th>
                                    <th>ACTION</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                               <?php
                                    $query=mysqli_query($con,"SELECT product.*,category.title AS CAT_NAME FROM `product` LEFT JOIN category ON category.id=product.cat_id WHERE product.aid='$admin_id' and  product.status!='R' order by id desc");
                                    while ($row=mysqli_fetch_assoc($query)) {
                                      $item_img=$row['img'];
                                        $img=mysqli_query($con,"SELECT img_url FROM `prod_img` WHERE img_id='$item_img' and aid='$admin_id' GROUP BY img_id");
                                        $row2=mysqli_fetch_assoc($img);
                                    $sn++;
                                ?>
                                <tr <?php if($row['avail_qty']<1){echo 'style="color:red;"';}?>>
                                    <td scope="row" style="text-align: center;"><?php echo $sn;?></td>
                                    <td style="text-align: center;"><img src="<?=$row2['img_url']?>" style="width:80px;height: 60px;" onclick="imagezoom('<?=$row['img']?>')" id="<?=$row['img']?>"></td>
                                    
                                    <td style="text-align: center;"><?php if($row['item_name']==null){echo '<--No Detail-->';}else{echo $row['item_name'];}?></td>
                                    <td style="text-align: center;"><?php if($row['CAT_NAME']==null){echo '<--No Detail-->';}else{echo $row['CAT_NAME'];}?></td>
                                    <!-- <td><?php echo $row['brand'];?></td> -->
                                    <td style="text-align: center;"><?php if($row['discount']==null){echo '<--No Detail-->';}else{ echo $row['discount'];}?></td>
                                    <td style="text-align: center;"><?php if($row['sale_price']==null){echo '<--No Detail-->';}else{ echo $row['sale_price']." /pc";}?></td>
                                    <td style="text-align: center;"><?php if($row['avail_qty']==null){echo '<--No Detail-->';}else{ if($row['avail_qty']>0){echo $row['avail_qty'];}else{echo "Out Of Stock";}}?></td>
                                  <?php //}?>
                                   <td style="text-align: center;"><?php if($row['status']=='A')
                                   {
                                    ?>
                                    <button class="btn btn-primary" onclick="act('D','<?=$row["id"]?>')">Active&nbsp;<i class="icon-keyboard_arrow_down s-18 pull-right"></i></button>
                                   <?php }else
                                   {?>
                                    <button class="btn btn-danger" onclick="act('A','<?=$row["id"]?>')">Remove&nbsp;<i class="icon-keyboard_arrow_down s-18 pull-right"></i></button>

                                   <?php }?></td>
                                   <td style="display: none;"><?php if($row['status']=='A')
                                   {
                                    ?>
                                   Active
                                   <?php }else
                                   {?>
                                    Remove

                                   <?php }?></td>
                                    <td>
                                       
                                          <?php 
                                          $chk=mysqli_query($con,"SELECT * FROM admin WHERE id='$admin_id'");
                                          $chk_row=mysqli_fetch_assoc($chk);
                                          if($chk_row['business_type']=='R')
                                          {


                                          ?>
                                            <a href="edit_prod.php?pid=<?=$row['id']?>" onclick="javascript:sessionStorage.clear();
                                            ">&nbsp;<i class="icon-edit"></i></a>
                                          <?php }else{?>
                                            <a href="add_products.php?pid=<?=$row['id']?>" >&nbsp;<i class="icon-edit"></i></a>
                                          <?php }?>
                                            <!-- <a href="view_prod.php?id=<?=$row['id']?>">&nbsp;<i class="fa fa-eye"></i></a> -->
                                            <a href="#">&nbsp;<i class="icon-delete" onclick="del('<?=$row["id"]?>')"></i></a>

                                        <!-- </div> -->
                                    </td>
                                
                                </tr>
                                <?php }?>
                            </tbody>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
    <div id="imagezoom" class="modal1">
      <span class="closea1" data-dismiss="modal">&times;</span>
      <img class="modal-content1" id="img01">
      <div id="caption1"></div>
    </div>
    <!--Add New Message Fab Button-->
    <a href="#" data-target="#exampleModal" data-toggle="modal" class="btn-fab btn-fab-md fab-right fab-right-bottom-fixed shadow btn-primary"><i
            class="icon-add"></i></a>

   <script type="text/javascript">
        //clickable
 function imagezoom(img_id) {
  // body...
var modal = document.getElementById("imagezoom");
// alert(img_id);
// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById(img_id);
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption1");
img.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("closea1")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
  modal.style.display = "none";
}
}

  function del(pid) {
       var r = confirm("Are you sure.?");
       var type="Del";
if (r == true) {
 $.ajax({
    type:'POST',
    url:'save_item.php',
    data:{'type':type,'pid':pid},
    success:function(res) {
        // alert(res);
        window.location.href="products.php";

    }
 });
}
    }
     function act(status,pid) {
       var r = confirm("Are you sure.?");
       var type="act";
if (r == true) {
 $.ajax({
    type:'POST',
    url:'save_item.php',
    data:{'type':type,'pid':pid,'status':status},
    success:function(res) {
        // alert(res);
        window.location.href="products.php";

    }
 });
}
    }

function myFunction3() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable1");
  tr = table.getElementsByTagName("tr");
 for (i = 0; i < tr.length; i++) {
  td = tr[i].getElementsByTagName("td")[0];
 
    if (td) {
        txtValue = td.textContent || td.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          }
    else {    
  td = tr[i].getElementsByTagName("td")[1];
 
    if (td) {
        txtValue = td.textContent || td.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          }
    else {
         td = tr[i].getElementsByTagName("td")[2];
 
    if (td) {
        txtValue = td.textContent || td.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          }
    else {
           td = tr[i].getElementsByTagName("td")[3];
 
    if (td) {
        txtValue = td.textContent || td.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          }else {
           td = tr[i].getElementsByTagName("td")[4];
 
    if (td) {
        txtValue = td.textContent || td.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          }
          else {
           td = tr[i].getElementsByTagName("td")[5];
 
    if (td) {
        txtValue = td.textContent || td.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          }
          else {
           td = tr[i].getElementsByTagName("td")[7];
 
    if (td) {
        txtValue = td.textContent || td.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          }
    else {
         tr[i].style.display = "none";
         }
    
       }       
    }
         }
       }       
    }  
}
}
}
}
}
}
}
}
}
}

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
                window.location.href="products.php";
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

function myFunction2() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("input2");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable1");
  tr = table.getElementsByTagName("tr");
 for (i = 0; i < tr.length; i++) {
  td = tr[i].getElementsByTagName("td")[5];
 
    if (td) {
        txtValue = td.textContent || td.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
            console.log(txtValue);
          }
    else {
      td = tr[i].getElementsByTagName("td")[8];
 
    if (td) {
        txtValue = td.textContent || td.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
            console.log(txtValue);

          }
          else{
         tr[i].style.display = "none";
            console.log(txtValue);

         }
         }
         }
         } 
}
}
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
 $(document).ready(function(){
  $('form input').change(function () {
    $('form p').text(this.files.length + " file(s) selected");
  });
});

</script>

<?php
include('include/footer.php');
?>