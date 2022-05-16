
<?php
include('include/header.php');
?>


<div class="row">
          <div class="col-12">
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Edit New Arrival Item</h3>
              </div><br>
                <h3 class="card-title">
                  
                  &nbsp;&nbsp;<button class="btn btn-success" onclick="save_data()">Save</button>

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
                          <th style="display: none;">Your Selection</th>
                          <th>DESIGN NUMBER</th>
                          
                        </tr>
                      </thead>
                       <?php 
                          $fetch_cust = mysqli_query($con,"SELECT product.*,product_order.new as f_id FROM product_order LEFT JOIN product on product.scode=product_order.pid WHERE product.new = 'Y' and product_order.new != 0 and product_order.status = 'A' ORDER BY product_order.new asc");
                          while($row = mysqli_fetch_array($fetch_cust)){
                            $sn++;
                            
                      ?>
                    <tbody>
                      <tr >
                        <td id="row_no"><?php echo $sn;?></td>
                        <td style="display: none;"><?php echo $row['f_id'];?></td>
                
                        <td><select id="new_pid" class="form-control select" onchange="product_change((this.value),'<?=$row["f_id"]?>');">
                          <?php 
                          $prev='';
                          $fetch_cust1 = mysqli_query($con,"SELECT product.*,product_order.pid FROM `product` LEFT JOIN product_order on product_order.pid=product.scode WHERE product.new = 'Y' group by product_order.pid ORDER BY product_order.new asc");
                          while($row1 = mysqli_fetch_array($fetch_cust1)){
                            ?>
                          <option value="<?=$row1['scode']?>" <?php if(($row1['new']=='Y') and ($row1['pid']==$row['scode'])){ echo 'selected="selected"';}?>><?=$row1['party']?>/<?=$row1['art']?></option>
                          <?php 

                        }?></select></td>
                        
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
function product_change(str1,str2) {
    // var new_pid=document.getElementById('new_pid').value;
    console.log(str1,str2);
    var type='NC'
   // alert(str2);
    $.ajax({
      type:'POST',
      url:'save_edit_feature.php',
      data:{'row':str2,'pid':str1,'type':type},
      success:function(res)
      {
        // alert(res);
        window.location.href='new.php';
      }
    });
  }
  
  function save_data() {
    var tableInfo=tableToJson(document.getElementById('myTable'));
    var mydata = JSON.stringify(tableInfo);
    var type="N";
    // alert(mydata);
    $.ajax({

      type:'POST',
      url:'save_edit_feature.php',
      data:{'mydata':mydata,'type':type},
      success:function(res) {
       alert(res.substr(0,16));
        if(res.substr(0,16)=="Success")
        {
          window.location.href="new_arrival.php";
        }
      }
    });
  }

  function tableToJson(table) {
       var result = [];
       var i;
       for (i = 1; i < table.rows.length; i++) {
         var myCells = table.rows.item(i).cells;
          var resu = {};
        resu["order"] = myCells['0'].firstChild.data.trimLeft().trimRight();
        resu["feature"] = myCells['1'].firstChild.data.trimLeft().trimRight();
        resu["pid"] = myCells['2'].firstChild.value.trimLeft().trimRight();
        // resu["type"]='F';
        result.push(resu);  
        // alert(resu);
        }
        
     return result;
   }
  
        </script>
<?php
include('include/footer.php');
?>