
<?php
include('include/header.php');
?>
 <style type="text/css">


.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

    .dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: blue;}
  </style>
<div class="row">
          <div class="col-12">
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Top Selling Item</h3>
              </div><br>
                <h3 class="card-title">
                  <a href="feature.php"><button class="btn btn-primary">Feature Item</button></a>
                  <!-- <a href="top_selling.php" active><button class="btn btn-info">Top Selling Item</button></a> -->
                  <a href="new_arrival.php"><button class="btn btn-success">New Arrival Item</button></a>
                  <!-- <a href="cust_detail.php"><button class="btn btn-default">Add</button></a> -->
                  <a href="add_feature_item.php?key=t"><button class="btn btn-default">Add</button></a>

                </h3><br>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <!-- <input type="text" name="table_search" class="form-control float-right" id="myInput" onkeyup="myFunction()" placeholder="Search"> -->

                    <div class="input-group-append">
                      <!-- <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button> -->
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card">
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap" id="myTable">
                  <thead>
                    <tr>
                                        <th>VIEW ORDER</th>
                                        <th>DESIGN NUMBER</th>
                                        <th>ACTION</th>
                    </tr>
                 </thead>
                      <?php 
                          $fetch_cust = mysqli_query($con,"SELECT product.*,product_order.top as f_id FROM product_order LEFT JOIN product on product.scode=product_order.pid WHERE product.top = 'Y' and product_order.top != 0 and product_order.status = 'A' ORDER BY product_order.top asc");
                          while($row = mysqli_fetch_array($fetch_cust)){
                            $sn++;
                            
                      ?>
                    <tbody>
                      <tr>
                        <td><?php echo $sn;?></td>
                        <td><?=$row['party']?>/<?=$row['art']?></td>
                        <td><a class="fa fa-edit" style="color: green" aria-hidden="true" href="edit_top.php"></a> &nbsp; <a class="fa fa-trash" style="color: green" aria-hidden="true" onclick="product_del('<?=$row["scode"]?>')"></a></td>
                      </tr>
                    </tbody>
                      <?php } ?>
                  </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <script type="text/javascript">
        


function product_del(id) {
  var type="deleteTop";
  var confirmation = confirm("Are you sure you want to delete?");
  if (confirmation) {
     $.ajax({
      type:'POST',
      url:'save_edit_feature.php',
      data:{'id':id,'type':type},
      success:function(res) {
        alert(res);
        window.location.href='top_selling.php';
      
      }
    });
   }
  }
   
        </script>
<?php
include('include/footer.php');
?>