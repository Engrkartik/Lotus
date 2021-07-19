<?php
include('include/header.php');
?>
<style>
 

</style>


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
          
          <button type="button" class="btn btn-success btn-lg" onclick="save_data()">Save</button>
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
                        <th style="display: none;">Your Selection</th>
                        <th>DESIGN NUMBER</th>
                          
                        </tr>
                      </thead>
                      <?php 
                          $fetch_cust = mysqli_query($con,"SELECT product_order.*, product.item_name,product.id as iid FROM `product_order` left JOIN product on product_order.pid = product.id WHERE product_order.feature != 0 and product_order.status='A' ORDER BY product_order.feature asc");

                          while($row = mysqli_fetch_array($fetch_cust)){
                            $sn++;
                      ?>
                    <tbody>
                      <tr >
                        <td id="row_no"><?php echo $sn;?></td>
                  
                        <td style="display: none;"><?php echo $row['id'];?></td>
                        <td>
                        <select id="new_pid" class="form-control" onchange="product_change((this.value),'<?=$row["feature"]?>');">
                          <?php 
                          $prev='';
                          $fetch_cust1 = mysqli_query($con,"SELECT product_order.*, product.item_name,product.feature as F,product.id as iid FROM `product` left JOIN product_order on product.id = product_order.pid WHERE product.feature = 'Y' group by product_order.pid ORDER BY product_order.feature asc");
                          while($row1 = mysqli_fetch_array($fetch_cust1))
                            {
                           ?>
                          <option value="<?=$row1['iid']?>" <?php if(($row1['F']=='Y') and ($row1['pid']==$row['iid'])){ echo 'selected="selected"';}?> ><?php echo $row1['item_name'];?></option>
                          <?php 
                            }
                          ?>
                        </select></td>
                        
                      </tr>
                    </tbody>
                      <?php } ?>
             </tbody>
          </table>
          </div>
        </div>
      </div>
      </div>
    </div>
    </div>
  </div>

   <script type="text/javascript">
            
function product_change(str1,str2) {
    // var new_pid=document.getElementById('new_pid').value;
    // console.log(str1,str2);
  var type='C';
   // alert(str1); 
   // alert(str2); 
    $.ajax({
      type:'POST',
      url:'edit_section.php',
      data:{'row':str2,'pid':str1,'type':type},
      success:function(res)
      {
        // alert(res);
        window.location.href='edit_feature.php';
      }
    });
}
  
  function save_data() {
    var type="F";
    // alert(type);
    $.ajax({

      type:'POST',
      url:'edit_section.php',
      data:{'type':type},
      success:function(res) {
      alert(res.substr(0,16));
        if(res.substr(0,16)=="Success")
        {
          window.location.href="section.php";
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