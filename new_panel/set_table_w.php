<?php
include('include/db.php');
if($_POST['type']=="att")
{
$att=$_POST['att'];
$new_att=json_decode($att);
$length_att= sizeof($new_att);
$cat_id=$_POST['cat_id'];
$n = 0;
echo '<div class="col-md-12" style="width:100%;"><div class="row" style="border:1px solid black;"><table class="table table-bordered table-responsive" style="border-collapse: collapse;">
	<thead>
	<tr>';
		for ($i=0; $i <$length_att ; $i++) { 
			
			$split=explode('~', $new_att[$i]);
			if(($prev==$split[1]))
			{
			echo "<td>".str_replace('_', ' ',$split[0])."</td>";

			}else{
				$n++;
			echo "<tr><th>".$n."</th><th>".str_replace('_', ' ',$split[1])."</th><td>".str_replace('_', ' ',$split[0])."</td>";
			$prev=$split[1];

		}

		}
		echo'</tr>
</thead></table></div></div>';
}
else
{
$color=$_POST['color'];
$table=$_POST['table'];
$wsp=$_POST['wsp'];
$mrp=$_POST['mrp'];
// $s_id=$_POST['s_id'];
$pid=$_POST['pid'];
$auto_reduce_val=$_POST['auto_reduce_val'];
$min_color=$_POST['min_color'];
$min_size=$_POST['min_size'];
$sum_amt=$_POST['sum_amt'];
$set_qty=$_POST['set_qty'];
$min_set_order=$_POST['min_set_order'];
$qty_pcs=$_POST['qty_pcs'];
$qty_set=$_POST['qty_set'];
$cate=$_POST['cate'];
$set_qty_array=json_decode($set_qty);
$sum_amt_array=json_decode($sum_amt);
$new_color=json_decode($color);
$size=$_POST['size'];
$new_size=json_decode($size);
$length= sizeof($new_color);
$length_size= sizeof($new_size);
$sno=1;
$chk=mysqli_query($con,"SELECT set_id FROM product WHERE id='$pid'");
$c_row=mysqli_fetch_assoc($chk);
$s_id=$c_row['set_id'];
if($s_id==0)
{  
$set1=mysqli_query($con,"SELECT s_id FROM `set_details_whole` WHERE aid='$admin_id' ORDER BY s_id desc LIMIT 1");
$set_row1=mysqli_fetch_assoc($set1);
$s_id=$set_row1['s_id']+1;
}

$set=mysqli_query($con,"SELECT * FROM `set_details_whole` WHERE aid='$admin_id' ORDER BY set_id desc LIMIT 1");
$set_row=mysqli_fetch_assoc($set);
$set_id=$set_row['set_id']+1;
$sno1=0;
for ($j=0; $j <$length_size ; $j++) { 
for ($i=0; $i <$length ; $i++) { 
		// $ss=$new_size[$j];
		// $query=mysqli_query($con,"SELECT * FROM `sizemaster` WHERE size_name='$ss'");
		// $run=mysqli_fetch_assoc($query);
		// $qty=$run['qty'];
  if(sizeof($sum_amt_array)<1)
  {
    $qty=0;
    $sum_amtt=$wsp;
  }
  else
  {
    $qty=$set_qty_array[$sno1];
    $sum_amtt=$sum_amt_array[$sno1];

  }
		$insert_set=mysqli_query($con,"INSERT INTO `set_details_whole`(`aid`, `s_id`, `set_id`, `pid`, `color`, `size`,`size_type`, `qty`, `min_set_order`, `wsp`, `mrp`, `auto_stock_reduce`, `qty_set`, `qty_pcs`, `min_size`, `min_color`, `date`, `status`) VALUES ('$admin_id','$s_id','$set_id','$pid','$new_color[$i]','$new_size[$j]','$cate','$qty','$min_set_order','$sum_amtt','$mrp','$auto_reduce_val','$qty_set','$qty_pcs','$min_size','$min_color','$dj','A')");
    if($insert_set)
    {
      $upd=mysqli_query($con,"UPDATE `product` SET `set_id`='$s_id' WHERE id='$pid'");
    }
    $sno++;
    $sno1++;
	}
}
if($insert_set)
{
  $query1=mysqli_query($con,"SELECT * FROM `set_details_whole` WHERE s_id='$s_id' group by set_id");
  // echo '<div class="col-md-12">';
    while ($rows=mysqli_fetch_assoc($query1)) 
    {
      $set_id=$rows['set_id'];
      $query2=mysqli_query($con,"SELECT * FROM `set_details_whole` WHERE set_id='$set_id' and s_id='$s_id'");
    $query3=mysqli_query($con,"SELECT COUNT(DISTINCT(color)) as color,min_color FROM `set_details_whole` WHERE set_id='$set_id'");
    $row3=mysqli_fetch_assoc($query3);
    $query4=mysqli_query($con,"SELECT COUNT(DISTINCT(size)) as size,min_size FROM `set_details_whole` WHERE set_id='$set_id'");
    $row4=mysqli_fetch_assoc($query4);
    $qtyy=0;
    $min=0;
    if(($row3['min_color']==$row3['color']) && ($row4['min_size']==$row4['size']))
      {
     echo '<div class="row" style="margin-left: 10px; margin-top:15px;">
                  <div class="col-md-10" style="border: 2px solid black;">
                    <div class="row">   
                    <div class="col-md-12">
     <table class="table table-bordered" style="border:1px solid black;margin-top:10px;">';
  echo '<thead>
  <tr>
    <th>S.No</th>
    <th>COLOR</th>
    <th>SIZE</th>
    <th>QTY(in pcs)</th>
    <th>RATE/-</th>
    </tr> 
    </thead>
<tbody>';
  $sno=0;
  $sum_q=0;
  $wsp=0;
  $prev=0;
      while($row2=mysqli_fetch_assoc($query2))
      {
  $sno++;
       
       echo '<tr';if($prev==$row2['size']){}else{ echo 'style="border-top: 2px solid black;"';} echo '>
    <td>'.$sno.'</td>
    <td>';echo str_replace('_', ' ',$row2['color']);
    echo '</td>
    <td>'; echo $row2['size'];
    
    $sum_q+=$row2['qty'];
    $wsp+=$row2['wsp'];

  if($qty<2){
  echo '</td><td>
    <input type="number" id="sum_qty" value="'.$row2['qty'].'" step="'.$row2['qty'].'" min="0" name="set_qty[]" readonly="">   </td>
    <td><input id="sum_amt" type="number" value="'.$row2['wsp'].'" readonly=""></td>
  </tr>';
  }else{ echo '
  </td><td>
    <input type="number" id="sum_qty" value="'.$row2['qty'].'" step="'.$row2['qty'].'" min="0" name="set_qty[]" readonly="">   </td>
    <td><input id="sum_amt" type="number" value="'.$row2['wsp'].'" readonly=""></td>
  </tr>';
  }

     $prev=$row2['size'];
      }
       echo '<tr>
<td colspan="3">Total Set</td>
<td>'. $sum_q.'(in pcs)
</td>
<td id="total_price_amt">'.($sum_q*$wsp).'.00/-</td>
</tr>
</tbody></table></div>
            
            </div>
            </div>
            <div class="col-md-2" style="float: left;">
              <i class="fa fa-edit" style="cursor: pointer;" data-toggle="modal" data-target="#'.$set_id.'"></i>&nbsp;&nbsp;
              <i class="fa fa-trash" style="cursor: pointer;" onclick="delete_set('.$set_id.');"></i></div></div>';
              echo '<div class="modal fade" id="'.$set_id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Set</h5>
        <button type="button" class="close" onclick="reset_val(\'close1_\''.$set_id.')" id="close1_'.$set_id.'" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <div class="row" style="margin-top: -15px;"> 
            <div class="col-md-12">
              <div class="row"> 
                <div class="col-2" style="background-color: lightgrey;">
                  <ul class="nav nav-tabs" id="myTab2" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" id="v-pills-category-tab_'.$set_id.'" data-toggle="tab" href="#v-pills-category_'.$set_id.'" role="tab" aria-controls="v-pills-category" aria-selected="true" style="pointer-events: none;"><label>CATEGORY</label></a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" id="v-pills-colour-tab_'.$set_id.'" data-toggle="tab" href="#v-pills-colour_'.$set_id.'" role="tab" aria-controls="v-pills-colour" aria-selected="true" style="pointer-events: none;"><label>COLOUR</label></a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" id="v-pills-size-tab_'.$set_id.'" data-toggle="tab" href="#v-pills-size_'.$set_id.'" role="tab" aria-controls="v-pills-size" aria-selected="false" style="pointer-events: none;"><label>SIZE</label></a></li>
                    <li class="nav-item">
                    <a class="nav-link" id="v-pills-price-tab_'.$set_id.'" data-toggle="tab" href="#v-pills-price_'.$set_id.'" role="tab" aria-controls="v-pills-price" aria-selected="false" style="pointer-events: none;"><label>PRICE</label></a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" id="v-pills-inventory-tab_'.$set_id.'" data-toggle="tab" href="#v-pills-inventory_'.$set_id.'" role="tab" aria-controls="v-pills-inventory" aria-selected="false" style="pointer-events: none;"><label>INVENTORY</label></a>
                    </li>
                 </ul>
                </div>
                <div class="col-10">
                  <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane active" id="v-pills-category_'.$set_id.'" role="tabpanel" aria-labelledby="v-pills-category-tab_'.$set_id.'">
                          <!-- <div class="row"> -->
                            <div class="row">
                              <div class="col-md-12">
                                <div class="row">
                              <div class="col-md-2">
                              <button type="button" class="btn btn-success" onclick="nexttab2(\'v-pills-colour_\''.$set_id.');color_tab('.$set_id.');show_size2(document.getElementById(\'cate_\''.$set_id.').value,'.$set_id.');">Next</button>
                              </div>
                              <div class="col-md-10"></div>
                            </div>
                          </div>
                        </div>';
                              
                          $main_q=mysqli_query($con,"SELECT size_type FROM `set_details_whole` WHERE set_id='$set_id' and aid='$admin_id'");
                          $main_row=mysqli_fetch_assoc($main_q);
                          echo '
                          <div class="row">
                            <div class="col-md-12">
                              <label>SELECT CATEGORY</label>
                              <select class="form-control" id="cate_'.$set_id.'">
                                <option value="00" selected="" disabled="">Select Option</option>
                                <option value="M" <?php if($main_row[\'size_type\']==\'M\'){echo \'selected="selected"\';}?> >Mens Wear</option>
                                <option value="W" <?php if($main_row[\'size_type\']==\'W\'){echo \'selected="selected"\';}?> >Womens Wear</option>
                                <option value="K" <?php if($main_row[\'size_type\']==\'K\'){echo \'selected="selected"\';}?> >Kids Wear</option>
                              </select>
                            </div>
                          </div>
                        
                        </div>
                          <div class="tab-pane" id="v-pills-colour_'.$set_id.'" role="tabpanel" aria-labelledby="v-pills-colour-tab_'.$set_id.'">
                            <div class="row">
                              <div class="col-md-12"><br>
                                <div class="row">
                                <div class="col-md-2">
                                    <button type="button" class="btn btn-success" onclick="info();nexttab2(\'v-pills-size_\''.$set_id.');show_temp_table(\'no_with_price\',\'myTable3\')">Next</button></div>
                                    <div class="col-md-8"></div>
                                    <div class="col-md-2">
                                    <button type="button" class="btn btn-info" onclick="nexttab2(\'v-pills-category_\''.$set_id.');">Back</button>
                                    </div>
                                  </div>
                                
                                      
                                        <div class="row" id="color_tab_p_'.$set_id.'">
                                         
                                    </div>
                                    
                                  </div>
                                </div>
                              </div>
                              <div class="tab-pane" id="v-pills-size_'.$set_id.'" role="tabpanel" aria-labelledby="v-pills-size-tab_'.$set_id.'">
                            <div class="row" id="size_'.$set_id.'">
                              <div class="col-md-12" ></div>
                            </div>
                          </div>
                          <div class="tab-pane" id="v-pills-price_'.$set_id.'" role="tabpanel" aria-labelledby="v-pills-price-tab_'.$set_id.'">
                            <div class="row">
                              <div class="col-md-12">
                                <div class="row">
                    <!-- <div class="col-md-12"> -->
                    <!-- <div class="row"> -->
                    <div class="col-md-2">
                    <button type="button" class="btn btn-success" onclick="info5();show_temp_table4(\'not_with_price\',\'myTable4_\''.$set_id.');nexttab2(\'v-pills-inventory_\''.$set_id.')">Next</button>
                  </div>
                  <div class="col-md-7"></div>
                  <div class="col-md-2">
                    <button type="button" class="btn btn-info" onclick="nexttab2(\'v-pills-size_\''.$set_id.');">Back</button>

                    </div>
                    <!-- </div> -->
                    </div>
                    <!-- </div> -->
                                <div class="row">
                                  <div class="col-md-6">
                                    <label>Wholesale Price Per Pc</label>
                                    <input type="number" id="wsp_'.$set_id.'" class="form-control" oninput="show_temp_table3(\'with_price_w\',\'myTable3_\''.$set_id.');">
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-6">
                                    <label>MRP Per Pc</label>
                                    <input type="number" id="mrp_'.$set_id.'" class="form-control" >
                                  </div>
                                 <!--  <div class="col-md-3" style="margin-top: 20px;">
                                    <button type="button" class="btn btn-success" onclick="save_data(\'myTable3\')">View Set Table</button>
                                  </div> -->
                                </div>
                                <div class="row" style="margin-left: 10px;">
                                  <div class="col-md-12">
                                    <div class="row" id="temp_table_'.$set_id.'"></div>
                                  </div>
                                </div>
                                <div class="row" id="myTable3_'.$set_id.'"></div>
                              </div>
                            </div>
                          </div>
                          <div class="tab-pane" id="v-pills-inventory_'.$set_id.'" role="tabpanel" aria-labelledby="v-pills-inventory-tab_'.$set_id.'">
                            <div class="row">
                              <div class="col-md-12">
                    <div class="row">
                    <!-- <div class="col-md-2">
                    <button type="button" class="btn btn-warning" id="save_bt2" onclick="info4();save_data2(\'myTable\','.$set_id.');">Save</button>
                  </div> -->
                  <div class="col-md-9"></div>
                  <div class="col-md-2">
                    <button type="button" class="btn btn-info" onclick="nexttab2(\'v-pills-price_\''.$set_id.');">Back</button>
                    </div>
                    </div>
                                <div class="row">
                                  <div class="col-md-4">
                                    <label>Minimum Set To Order</label>
                                  </div>
                                  <div class="col-md-2">
                                    <input type="number" id="min_set_order_'.$set_id.'" class="form-control" min=\'1\' >
                                  </div>
                                </div>
                                <br>
                                <div class="row">
                                  <div class="col-md-12">
                                    <label>Auto Stock Reduce Qty</label>&nbsp;&nbsp;
                                    <input type="checkbox" id="auto_reduce_val_'.$set_id.'" data-toggle="toggle" onchange="show_avail_qty_row()">
                                  </div>
                                </div>
                                <br>
                                <div class="row" id="show_avail_row" style="display: none;">
                                  <div class="col-md-12">
                                  <div class="row">
                                  <div class="col-md-12" style="text-align: center;">
                                    <label >AVAILABLE STOCK QTY</label>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-3"></div>
                                  <div class="col-md-3" style="text-align: center;">
                                    <label >(IN SETS)</label>
                                    <input type="number" id="avail_qty_set_'.$set_id.'" class="form-control">
                                  </div>
                                  <div class="col-md-3" style="text-align: center;">
                                    <label>(IN PCS)</label>
                                    <input type="number" id="avail_qty_pcs_'.$set_id.'" class="form-control">
                                  </div>
                                  <div class="col-md-3"></div>

                                </div>
                                </div>
                                </div>
                                <!-- <div class="row">
                                  <div class="col-md-12">
                                    <button type="button" class="btn btn-primary" onclick="save_data(\'myTable4\')">View Set Table</button>
                                  </div>
                                </div> -->
                              </div>
                            </div>
                            <div class="row" id="myTable4_'.$set_id.'">
                              <div class="col-md-12"></div>
                            </div>
                          </div>
                      </div>
                    </div>
              </div>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="save_but" onclick="info4();save_data2(\'myTable\','.$set_id.');" data-dismiss="modal">Save changes</button>
        <button type="button" class="btn btn-secondary" onclick="reset_val(\'close21_\''.$set_id.')" id="close21_'.$set_id.'">Close</button>
      </div>
    </div>
  </div>
</div>';
    }else
    {

     echo '<div class="row" style="margin-left: 10px;" >
                    <div class="col-md-10" style="border: 2px solid black;">
                    <div class="row">
                      <div class="col-md-12"><br>
     <table class="table table-bordered" style="border:1px solid black;margin-top:10px;">
     <tbody>
    <tr>
    <th>COLOR</th>
    <td>'; 
      $set_id=$rows['set_id'];
      $query5=mysqli_query($con,"SELECT DISTINCT(color) FROM `set_details_whole` WHERE set_id='$set_id' and s_id='$s_id'");
      $sno='';
      while($row5=mysqli_fetch_assoc($query5))
      {
       
       echo $sno." ".str_replace('_', ' ',$row5['color']);
    $sno=',';
    }
    echo '</td></tr>
    <tr><th>SIZE</th><td>';
      $query6=mysqli_query($con,"SELECT DISTINCT(size),wsp FROM `set_details_whole` WHERE set_id='$set_id' and s_id='$s_id'");
      $sno='';
      $wsp=0;
      while($row6=mysqli_fetch_assoc($query6))
      {
       
       echo $sno." ".$row6['size'];
      $sno=',';
      $wsp=$row6['wsp'];
    }
    echo '</td></tr><tr>
<td colspan="1">Total Set</td>
<td id="total_price_amt">'.($wsp).'.00/-</td>
</tr>
   </tbody>';
    echo '</table>
    <div class="row" style="margin-left:10px;margin-bottom:10px;">
      <div class="col-md-6">
        <label>Min Color To Choose</label>
        <input type="number" class="form-control" value="'.$row3['min_color'].'" readonly="">
      </div>
      <div class="col-md-6">
        <label>Min Size To Choose</label>
        <input type="number" class="form-control" value="'.$row4['min_size'].'" readonly="">
      </div>
    </div>
</div>
            
            </div>
            </div>
            <div class="col-md-2">
              <i class="icon-edit" style="cursor: pointer;" data-toggle="modal" data-target="#'.$set_id.'"></i>&nbsp;&nbsp;
              <i class="icon-trash" style="cursor: pointer;" onclick="delete_set('.$set_id.');"></i>
            </div>
            </div>'; 
    }
  }   
    // echo '</div><br>';

}
else{
  echo mysqli_error($con);
}

	
}
?>

  