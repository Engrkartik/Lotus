<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<?php
include('include/db.php');

$color=$_POST['color'];
$set_id=$_POST['set_id'];
$table=$_POST['table'];
$wsp=$_POST['wsp'];
$mrp=$_POST['mrp'];
$s_id=$_POST['s_id'];
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
$sum_avail_qty=$_POST['sum_avail_qty'];
$sum_avail_qty_arr=json_decode($sum_avail_qty);
$sno=1;
$del=mysqli_query($con,"DELETE FROM `set_details_whole` WHERE set_id='$set_id'");
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
   if(sizeof($sum_avail_qty_arr)>0)
    {

    $qty_pcs=$sum_avail_qty_arr[$sno1];
    }
		$insert_set=mysqli_query($con,"INSERT INTO `set_details_whole`(`aid`, `s_id`, `set_id`, `pid`, `color`, `size`,`size_type`, `qty`, `min_set_order`, `wsp`, `mrp`, `auto_stock_reduce`, `qty_set`, `qty_pcs`, `min_size`, `min_color`, `date`, `status`) VALUES ('$admin_id','$s_id','$set_id','$pid','$new_color[$i]','$new_size[$j]','$cate','$qty','$min_set_order','$sum_amtt','$mrp','$auto_reduce_val','$qty_set','$qty_pcs','$min_size','$min_color','$dj','A')");
    if($insert_set)
    {
      $upd=mysqli_query($con,"UPDATE `product` SET `auto_reduce_qty`='$auto_reduce_val' WHERE id='$pid'");
    }
    $sno++;
    $sno1++;
	}
}
if($insert_set)
{
  // echo 0;
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
     echo '<div class="row" style="margin-left: 10px;">
                  <div class="col-md-10" style="border: 2px solid black;">
                    <div class="row">   
                    <div class="col-md-10">
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
    <input type="number" onkeydown="javascript: return event.keyCode === 8 ||
event.keyCode === 46 ? true : !isNaN(Number(event.key))" id="sum_qty" value="'.$row2['qty'].'" step="'.$row2['qty'].'" min="0" name="set_qty[]" readonly="">   </td>
    <td><input id="sum_amt" type="number" onkeydown="javascript: return event.keyCode === 8 ||
event.keyCode === 46 ? true : !isNaN(Number(event.key))" value="'.$row2['wsp'].'" readonly=""></td>
  </tr>';
  }else{ echo '
  </td><td>
    <input type="number" onkeydown="javascript: return event.keyCode === 8 ||
event.keyCode === 46 ? true : !isNaN(Number(event.key))" id="sum_qty" value="'.$row2['qty'].'" step="'.$row2['qty'].'" min="0" name="set_qty[]" readonly="">   </td>
    <td><input id="sum_amt" type="number" onkeydown="javascript: return event.keyCode === 8 ||
event.keyCode === 46 ? true : !isNaN(Number(event.key))" value="'.$row2['wsp'].'" readonly=""></td>
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
              <i class="fa fa-trash" style="cursor: pointer;" onclick="delete_set('.$set_id.');"></i></div>';
    }else
    {

     echo '<div class="row" style="margin-left: 10px;" >
                    <div class="col-md-10" style="border: 2px solid black;">
                    <div class="row">
                      <div class="col-md-12"><br>
     <table class="table table-bordered table-responsive" style="border:1px solid black;margin-top:10px;">
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
        <input type="number" onkeydown="javascript: return event.keyCode === 8 ||
event.keyCode === 46 ? true : !isNaN(Number(event.key))" class="form-control" value="'.$row3['min_color'].'" readonly="">
      </div>
      <div class="col-md-6">
        <label>Min Size To Choose</label>
        <input type="number" onkeydown="javascript: return event.keyCode === 8 ||
event.keyCode === 46 ? true : !isNaN(Number(event.key))" class="form-control" value="'.$row4['min_size'].'" readonly="">
      </div>
    </div>
</div>
            
            </div>
            </div>
            <div class="col-md-2">
              <i class="fa fa-edit" style="cursor: pointer;" data-toggle="modal" data-target="#'.$set_id.'"></i>&nbsp;&nbsp;
              <i class="fa fa-trash" style="cursor: pointer;" onclick="delete_set('.$set_id.');"></i>
            </div>
            </div>'; 
    }
  }   
    // echo '</div><br>';

}
else{
  echo mysqli_error($con);
}

	

?>
</body>
</html>


  