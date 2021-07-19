<?php
include('include/header.php');
$type=$_GET['key'];
?>


<div class="page has-sidebar-left height-full">
  <header class="blue accent-3 relative nav-sticky">
    <div class="container-fluid text-white">
      <div class="row p-t-b-10 ">
        <div class="col">
       <h4><i class="icon-image"></i> Featured Items</h4>
       </div>
      </div>
    </div>
</header>
<div class="container-fluid animatedParent animateOnce">
  <div class="tab-content my-3" id="v-pills-tabContent">
    <div class="tab-pane animated fadeInUpShort show active" id="v-pills-all" role="tabpanel" aria-labelledby="v-pills-all-tab">
      <div class="row">
          <div class="col-md-12">
        <a href="section.php"><button type="button" class="btn btn-success btn-lg">Featured Items</button></a>
          <a href="" data-toggle="modal" data-target="#exampleModal" data-backdrop="static" data-keyboard="false"><button type="button" class="btn btn-success btn-lg" style="width: 122px;float: right;"><i class="icon-plus"></i> Add</button></a>
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
                      <th>VIEW ORDER</th>
                      <th>PRODUCT</th>
                      <th>ACTION</th>
                    </tr>
                   </thead>
                    <?php 
                          $fetch_cust = mysqli_query($con,"SELECT product_order.*, product.item_name FROM `product_order` left JOIN product on product_order.pid = product.id WHERE product_order.feature != 0 and product_order.status='A' and product.aid='$admin_id' ORDER BY product_order.feature asc");
                          while($row = mysqli_fetch_array($fetch_cust)){
                            $sn++;
                            
                      ?>
                    <tbody>
                      <tr>
                        <td><?php echo $sn;?></td>
                        <td><?=$row['item_name']?></td>
                        <td><a class="icon-edit" aria-hidden="true" href="edit_feature.php"></a> &nbsp; <a class="icon-trash" style="color:#03a9f4;cursor: pointer;" aria-hidden="true" onclick="product_del('<?=$row["id"]?>','<?=$row["pid"]?>')"></a></td>
                      </tr>
                    </tbody>
                      <?php } ?>
                </table>
                </div>
              </div>
            </div>
            </div>
             <!-- /////////////////////////////Top banner modal start//////////////////////////////////////////// -->
       <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header" style="background-color: #33B5E5;">
                          <h5 class="modal-title" id="exampleModalLabel" style="font-size: 20px; font-weight: 600;color: #fff;">Top Banner</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">

                        <div class="col-md-12">
                          <!-- <div class="row">
                          <div class="col-md-12">
                            <label>Banner Type</label>
                            <select class="form-control" id="slider">
                              <option value="Top Banner">Top Slider</option>
                              <option value="Middle Banner">Middle Slider</option>
                              <option value="Last Banner">Last Slider</option>
                            </select>
                          </div>
                        </div> -->
                        <div class="row">
                          <div class="col-md-12">
                            <select id="new_id" class="form-control" style="text-align: center;">
                     <option disabled="true" selected="selected">Select Product</option>
                     
                      <?php
                        // $query1=mysqli_query($con,"SELECT * FROM `product` where `aid`='$admin_id'");
                        $query1=mysqli_query($con,"SELECT id, item_name FROM product WHERE id NOT IN (SELECT pid FROM product_order WHERE feature !=0 AND status = 'A') and status='A' and product.aid='$admin_id'");
                        while ($row1=mysqli_fetch_assoc($query1)) {
                          // $item1 = $row1['item_name'];
                      ?>
                      <option value="<?=$row1['id']?>"><?=$row1['item_name']?></option>      

                     <?php }?>
                     </select>
                     <br>
                      <button type="button" class="btn btn-primary" onclick="save_data();">Add</button>
                  <a href="section.php" ><button type="button" class="btn btn-primary">Back</button></a>
                          </div>  
                          </div>
                          <!-- <div class="row">
                          <div class="col-md-12">
                            <label>Banner Priority</label>
                            <select class="form-control" id="priority">
                              <option value="1">High</option>
                              <option value="2">Midium</option>
                              <option value="3">Low</option>
                            </select>
                          </div>
                        </div> -->
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
          </div>
        </div>

   <script type="text/javascript">
    
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
 for (i = 0; i < tr.length; i++) {
  td = tr[i].getElementsByTagName("td")[1];
 
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
          }
    else {
         td = tr[i].getElementsByTagName("td")[4];
 
    if (td) {
        txtValue = td.textContent || td.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          }
    // else {
    //        td = tr[i].getElementsByTagName("td")[6];
 
    // if (td) {
    //     txtValue = td.textContent || td.innerText;
    //       if (txtValue.toUpperCase().indexOf(filter) > -1) {
    //         tr[i].style.display = "";
    //       }
    else {
         tr[i].style.display = "none";
         }
       }       
    }
         }
    //    }       
    // }  
}
}
}
}

function act(str,o_id) {
       var r = confirm("Are you sure.?");
       var type="Order";
       // alert(o_id);
if (r == true) {
 $.ajax({
    type:'POST',
    url:'save_data.php',
    data:{'type':type,'do':str,'o_id':o_id},
    success:function(res) {
        alert(res);
        window.location.href="feature.php";

    }
 });
}
}

function product_del(id,td) {
  var type="deleteF";
  var confirmation = confirm("Are you sure you want to delete?");
  if (confirmation) {
     $.ajax({
      type:'POST',
      url:'delete_section.php',
      data:{'id':id,'pid':td,'type':type},
      success:function(res) {
        if(res=="Success"){
          alert(res);
          window.location.href='section.php';
        }
        else{
          alert(res);
        }
      }
    });
   }
  }

  function save_data() {
    var new_id=document.getElementById('new_id').value;
    var type='Feature';
    var aid = '<?php echo $admin_id;?>';

    // var res = new_id.split("~");
    // var scode = res[0];
    // var code = res[1];
    // var partyname = res[2];
    // var designcatcode = res[3];

    // alert(new_id);
   $.ajax({

      type:'POST',
      url:'save_section.php',
      // url:'save_feature.php',
      data:{'new_id':new_id,'type':type},
      success:function(res) {
        // alert(res);
        if(res=="Success")
        {
          alert(res);
        window.location.href='section.php';            
         
      }else{
        alert(res);
      }
      }
    });
  }

</script>

<?php
include('include/footer.php');
?>