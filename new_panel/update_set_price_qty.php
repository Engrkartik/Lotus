<?php
include('include/db.php');
$type=$_POST['type'];
$id=$_POST['id'];
$val=$_POST['val'];
if($type=='price')
	{
		$query=mysqli_query($con,"UPDATE `set_details_whole` SET `wsp`='$val' WHERE id='$id'");
	if($query)
	{
		echo 1;
	}
	else
	{
		echo "UPDATE `set_details_whole` SET `wsp`='$val' WHERE id='$id'";
	}
	}
elseif($type=='qty')
{
		$query=mysqli_query($con,"UPDATE `set_details_whole` SET `qty`='$val' WHERE id='$id'");
		if($query)
	{
		echo 1;
	}
	else
	{
		echo "UPDATE `set_details_whole` SET `wsp`='$val' WHERE id='$id'";
	}

}
elseif($type="set_qty")
{
	$size_name=$_POST['size_name'];
	// $vals=$_POST['vals'];
	$query=mysqli_query($con,"SELECT *  FROM `sizemaster` WHERE `size_name`='$size_name' ORDER BY `id` ASC LIMIT 1");
	$row=mysqli_fetch_assoc($query);
	$qty=$row['qty'];
	echo $qty;
}
elseif($type=='view')
{
	$s_id=$_POST['s_id'];
	$query1=mysqli_query($con,"SELECT * FROM `set_details_whole` WHERE s_id='$s_id' group by set_id");
	echo '<div class="col-md-12">';
    while ($rows=mysqli_fetch_assoc($query1)) 
  {
      $set_id=$rows['set_id'];
      $query2=mysqli_query($con,"SELECT * FROM `set_details_whole` WHERE set_id='$set_id' and s_id='$s_id'");
	 $query3=mysqli_query($con,"SELECT min_color FROM `set_details_whole` WHERE set_id='$set_id'");
		$row3=mysqli_fetch_assoc($query3);
		$query4=mysqli_query($con,"SELECT size,min_size FROM `set_details_whole` WHERE set_id='$set_id' group by set_id");
		$qtyy=0;
		$min=0;
		while($rows4=mysqli_fetch_assoc($query4))
		{
		$ss=$rows4['size'];
		$min=$rows4['min_size'];
		$query5=mysqli_query($con,"SELECT * FROM `sizemaster` WHERE size_name='$ss' LIMIT 1");
		$rows5=mysqli_fetch_assoc($query5);
		$qtyy+=$rows5['qty'];
		}
		if(($row3['min_color']==mysqli_num_rows($query3)) && ($min==$qtyy))
      {
     
     echo '<br><table class="table table-bordered" style="border:2px solid grey;">';
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
      while($row2=mysqli_fetch_assoc($query2))
      {
  $sno++;
       
       echo '<tr>
    <td>'.$sno.'</td>
    <td>';echo str_replace('_', ' ',$row2['color']);
    echo '</td>
    <td>'; echo $row2['size'];
    $ss=$row2['size'];
    $query=mysqli_query($con,"SELECT * FROM `sizemaster` WHERE size_name='$ss'");
    $run=mysqli_fetch_assoc($query);
    $qty=$run['qty'];
    $sum_q=$sum_q+$qty;
    $wsp=$row2['wsp'];
  if($table=="myTable4")
  {

    if($qty<2){
    echo '</td><td>
      <input type="number" id="sum_qty'.$set_id.'" value="'.$qty.'" step="'.$qty.'" min="0" name="set_qty[]" onchange="sum(\'amt\','.$set_id.','.$qty.');save_price_table('.$rows['id'].',this.value,\'qty\');" style="width:72%;">   </td>
      <td><input id="sum_amt'.$set_id.'" type="number" value="'.$row2['wsp'].'" readonly="" style="width:72%;"></td>
    </tr>';
    }else{ echo '
    </td><td>
      <input type="number" id="sum_qty'.$set_id.'" value="'.$qty.'" step="'.$qty.'" min="0" name="set_qty[]" onchange="sum(\'amt\','.$set_id.','.$qty.');save_price_table('.$rows['id'].',this.value,\'qty\');" onkeydown="return false" style="width:72%;" >   </td>
      <td><input id="sum_amt'.$set_id.'" type="number" value="'.$row2['wsp'].'" readonly="" style="width:72%;"></td>
    </tr>';
    }
    echo '<tr>
  <td colspan="3">Total Set</td>
  <td id="total_qty_amt'.$set_id.'">'. $sum_q.'(in pcs)
  </td>
  <td id="total_price_amt'.$set_id.'">'.($sum_q*$wsp).'.00/-</td>
  </tr>
  </tbody></table>';
  }
  else{
  if($qty<2){
    echo '</td><td>
      <input type="number" id="sum_qty1'.$set_id.'" value="'.$qty.'" step="'.$qty.'" min="0" name="set_qty[]" readonly="" style="width:72%;"> </td>
      <td><input type="number" id="sum_amt'.$set_id.'" value="'.$row2['wsp'].'" onchange="sum(\'amt\','.$set_id.','.$qty.');save_price_table('.$rows['id'].',this.value,\'price\');" style="width:72%;"></td>

    </tr>';
    }else{ echo '
    </td><td><input type="number" id="sum_qty1'.$set_id.'" value="'.$qty.'" step="'.$qty.'" min="0" name="set_qty[]" readonly="" style="width:72%;"> </td>
      <td><input id="sum_amt'.$set_id.'" type="number" value="'.$row2['wsp'].'" onchange="sum(\'amt\','.$set_id.','.$qty.');save_price_table('.$rows['id'].',this.value,\'price\')" style="width:72%;"></td>
    </tr>';
    }
    echo '<tr>
  <td colspan="3">Total Set</td>
  <td>'. $sum_q.'(in pcs)
  </td>
  <td id="total_price_amt'.$set_id.'">'.($sum_q*$wsp).'.00/-</td>
  </tr>
  </tbody></table>';
  }
        }echo '';
      }else
      {

       echo '<br><table class="table table-bordered" style="border:2px solid grey;">
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
        $query6=mysqli_query($con,"SELECT DISTINCT(size) FROM `set_details_whole` WHERE set_id='$set_id' and s_id='$s_id'");
        $sno='';
        while($row6=mysqli_fetch_assoc($query6))
        {
         
         echo $sno." ".$row6['size'];
        $sno=',';
      }
      echo '</td></tr>
     </tbody>';
    }

      echo '</table>'; 
      }
}
	
?>