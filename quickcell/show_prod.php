
<?php
include('include/header.php');
// include('include/db.php');
?>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>
   <div class="se-pre-con"></div>

   
<div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header" style="position: fixed;margin-top: -23px;width: 100%;height: 53px;margin-left: -9px;">
                <!-- <div class="row"> -->
                <table class="table table-responsive">
                  <thead>
                    <tr>
                      <!-- <td><a href="add_product.php"><button class="btn btn-primary">Add Product</button></a></td> -->
                      <td> <select class="form-control" onchange="myFunction2()" id="input2">Filter
                        <option selected="" disabled="">Choose Option</option>
                        <option value="e">All</option>
                        <option value="Active">Active</option>
                        <option value="Remove">Remove</option>
                      </select></td>
                      <td>
                    <input type="text" name="table_search" class="form-control" id="myInput" onkeyup="myFunction()" placeholder="Search..">
                        
                      </td>
                    </tr>
                   
                  </thead>
                </table>
              
            </div>
          </div>
        <!-- </div> -->
              <!-- /.card-header -->
              <!-- <div class="card"> -->
              <!-- <div class="card-body table-responsive"> -->
                <table class="table table-hover table-responsive text-nowrap p-0" id="myTable" style="margin-top: 30px;">
                  <thead style="background-color: lightgrey;position: fixed;width: 100%;">
                    <tr>
                      <th style="width: 20px;border-right: 1px solid black;border-left: 1px solid black;text-align: center;">S.NO</th>
                      <th style="text-align: center;width: 100px;border-right: 1px solid black;border-left: 1px solid black;">IMAGE</th>
                      <th style="text-align: center;width: 250px;border-right: 1px solid black;border-left: 1px solid black;">NAME</th>
                      <th style="width: 230px;text-align: center;border-right: 1px solid black;border-left: 1px solid black;">CATEGORY NAME</th>
                      <th style="width: 80px;text-align: center;border-right: 1px solid black;border-left: 1px solid black;">DISCOUNT</th>
                      <th style="text-align: center;width: 100px;border-right: 1px solid black;border-left: 1px solid black;">SALE PRICE</th>
                      <th style="text-align: center;width: 100px;border-right: 1px solid black;border-left: 1px solid black;">AVAIL QTY</th>
                      <th style="text-align: center;width: 100px;border-right: 1px solid black;border-left: 1px solid black;">STATUS</th>
                      <th style="text-align: center;width: 20px;border-right: 1px solid black;border-left: 1px solid black;">ACTION</th>
                    </tr>
                  </thead>
                </table>
                <table class="table table-responsive table-hover text-nowrap p-0" id="myTable1" style="margin-top: 20px;width: 100%;margin-left: 10px;">

                  <tbody>
                    <tr><td colspan="8"></td></tr>
                    <tr><td colspan="8"></td></tr>
                                    <?php
                                        $query=mysqli_query($con,"SELECT product.*,category.title AS CAT_NAME FROM `product` LEFT JOIN category ON category.id=product.cat_id WHERE product.aid='$admin_id' and  product.status!='R' order by id desc");
                                        while ($row=mysqli_fetch_assoc($query)) {
                                          $item_img=$row['img'];
                                            $img=mysqli_query($con,"SELECT img_url FROM `prod_img` WHERE img_id='$item_img' and aid='$admin_id' GROUP BY img_id");
                                            $row2=mysqli_fetch_assoc($img);
                                        $sn++;
                                    ?>
                                    <tr <?php if($row['avail_qty']<1){echo 'style="color:red;"';}?>>
                                        <td scope="row" style="text-align: center;width: 30px;"><?php echo $sn;?></td>
                                        <td style="width: 100px;text-align: center;"><img src="<?=$row2['img_url']?>" style="width:80px;height: 60px;" onclick="imagezoom('<?=$row['img']?>')" id="<?=$row['img']?>"></td>
                                        
                                        <td style="width: 210px;text-align: center;"><?php if($row['item_name']==null){echo '<--No Detail-->';}else{echo $row['item_name'];}?></td>
                                        <td style="width: 280px;text-align: center;"><?php if($row['CAT_NAME']==null){echo '<--No Detail-->';}else{echo $row['CAT_NAME'];}?></td>
                                        <!-- <td><?php echo $row['brand'];?></td> -->
                                        <td style="width: 70px;text-align: center;"><?php if($row['discount']==null){echo '<--No Detail-->';}else{ echo $row['discount'];}?></td>
                                        <td style="width: 120px;text-align: center;"><?php if($row['sale_price']==null){echo '<--No Detail-->';}else{ echo $row['sale_price']." /pc";}?></td>
                                        <td style="width: 100px;text-align: center;"><?php if($row['avail_qty']==null){echo '<--No Detail-->';}else{ if($row['avail_qty']>0){echo $row['avail_qty'];}else{echo "Out Of Stock";}}?></td>
                                      <?php //}?>
                                       <td style="width: 20px;text-align: center;"><?php if($row['status']=='A')
                                       {
                                        ?>
                                        <button class="btn btn-primary" style="width: 80px;" onclick="act('D','<?=$row["id"]?>')">Active&nbsp;<i class="fa fa-angle-down"></i></button>
                                       <?php }else
                                       {?>
                                        <button class="btn btn-danger" style="width: 80px;" onclick="act('A','<?=$row["id"]?>')">Remove&nbsp;<i class="fa fa-angle-down"></i></button>

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
                                            <!-- <div class=""> -->
                                              <?php 
                                              $chk=mysqli_query($con,"SELECT * FROM admin WHERE id='$admin_id'");
                                              $chk_row=mysqli_fetch_assoc($chk);
                                              if($chk_row['business_type']=='R')
                                              {


                                              ?>
                                                <a href="edit_prod.php?pid=<?=$row['id']?>" onclick="javascript:sessionStorage.clear();
                                                ">&nbsp;<i class="fa fa-edit"></i></a>
                                              <?php }else{?>
                                                <a href="edit_prod_w.php?pid=<?=$row['id']?>" onclick="javascript:sessionStorage.clear();
                                                ">&nbsp;<i class="fa fa-edit"></i></a>
                                              <?php }?>
                                                <!-- <a href="view_prod.php?id=<?=$row['id']?>">&nbsp;<i class="fa fa-eye"></i></a> -->
                                                <a href="#">&nbsp;<i class="fa fa-trash" onclick="del('<?=$row["id"]?>')"></i></a>

                                            <!-- </div> -->
                                        </td>
                                    
                                    </tr>
                                    <?php }?>
                                </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            <!-- </div> -->
            <!-- /.card -->
          </div>
        </div>
      </div>
      <div id="imagezoom" class="modal1">
  <span class="closea1" data-dismiss="modal">&times;</span>
  <img class="modal-content1" id="img01">
  <div id="caption1"></div>
</div>
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
        window.location.href="show_prod.php";

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
        window.location.href="show_prod.php";

    }
 });
}
    }

function myFunction() {
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