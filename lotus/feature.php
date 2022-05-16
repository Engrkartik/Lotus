
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
/*/////////////////////////////loader/////////////////////////////////////////////////////*/
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
            <div class="card card-warning">
                <h3 class="card-title">
                  <a href="feature.php"><button class="btn btn-primary">Featured Item</button></a>
                  <!-- <a href="top_selling.php"><button class="btn btn-info">Top Selling Item</button></a> -->
                  <a href="new_arrival.php"><button class="btn btn-success">New Arrival Item</button></a>
                  <a href="add_feature_item.php"><button class="btn btn-dark" style="width: 10%">Add</button></a>

                </h3>
              <br>
              <div class="card-header">
                <h3 class="card-title">Featured Item</h3>
              </div><br>

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
                                        <th>PRODUCT</th>
                                        <th>ACTION</th>
                    </tr>
                 </thead>
                      <?php 
                          $fetch_cust = mysqli_query($con,"SELECT DISTINCT(product.item_name) as item_name,product_order.*,product.aid FROM `product_order` left JOIN product on product_order.pid = product.id LEFT JOIN company_reg ON company_reg.aid=product.aid WHERE product_order.feature != 0 and product_order.status='A' and product.status='A' AND product.aid='$admin_id' ORDER BY product_order.feature asc");
                          while($row = mysqli_fetch_array($fetch_cust)){
                            $sn++;
                            
                      ?>
                    <tbody>
                      <tr>
                        <td><?php echo $sn;?></td>
                        <td><?=$row['item_name']?></td>
                        <td><a class="fa fa-edit" style="color: green" aria-hidden="true" href="edit_feature.php"></a> &nbsp; <a class="fa fa-trash" style="color: green" aria-hidden="true" onclick="product_del('<?=$row["id"]?>','<?=$row["pid"]?>')"></a></td>
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
        window.location.href="order.php";

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
          window.location.href='feature.php';
        }
        else{
          alert(res);
        }
      }
    });
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