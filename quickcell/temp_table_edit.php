<?php
include('include/db.php');
$color=$_POST['color'];
$sum_amt=$_POST['sum_amt'];
$wsp=$_POST['wsp'];
$new_color=json_decode($color);
$new_sum_amt=json_decode($sum_amt);
$size=$_POST['size'];
$new_size=json_decode($size);
$length= sizeof($new_color);
$length_aum_amt= sizeof($new_sum_amt);
$length_size= sizeof($new_size);
$min_color=$_POST['min_color'];
$min_size=$_POST['min_size'];
$type=$_POST['type'];
$set_id=$_POST['set_id'];
$sno=1;
echo '<div class="row" style="margin-left:10px;">
<div class="col-md-12">
<div class="row">
<div class="col-md-12">

<br><table class="table table-bordered table-responsive" style="border:2px solid grey;">';
if($type=='not_with_price')
{
if(($min_color==$length ) && ($min_size==$length_size) )
{
	$qty=1;

echo '<thead>
	<tr>
		<th>S.No</th>
		<th>COLOR</th>
		<th>SIZE</th>
		<th>QTY(in pcs)</th>
		<th>RATE/-</th>
		</tr></thead>
<tbody>';
// echo $new_color[0];
$sno=0;
for ($j=0; $j <$length_size ; $j++) { 
for ($i=0; $i <$length ; $i++) { 
	$sno1++;
if($new_size[$j]==$ss)
	{
	echo '<tr>';
	}else
	{
	echo '<tr style="border-top:2px solid black;">';

	}
		echo '<td>'.($sno1).'</td>
		<td>'.str_replace('_', ' ',$new_color[$i]).'</td><td>';
		echo $new_size[$j];
		$ss=$new_size[$j];
		$cc=$new_color[$i];
		$query=mysqli_query($con,"SELECT * FROM `sizemaster` WHERE size_name='$ss'");
		$run=mysqli_fetch_assoc($query);
		// $qty=$qty*$run['qty'];
		$query1=mysqli_query($con,"SELECT qty FROM `set_details_whole` WHERE size='$ss' and color='$cc' and set_id='$set_id' and aid='$admin_id'");
		$run1=mysqli_fetch_assoc($query1);
		if(mysqli_num_rows($query1)>0)
		{
			$sum_q=$sum_q+$run1['qty'];
			$qty=$run1['qty'];
		$total_sum+=($new_sum_amt[$sno]*$run1['qty']);
		}else
		{
			$qty=$run['qty'];
		$sum_q=$sum_q+$run['qty'];
		$total_sum+=($new_sum_amt[$sno]*$run['qty']);
		}

	if($qty<2){
  echo '</td><td>
    <input type="number" onkeydown="javascript: return event.keyCode === 8 ||
event.keyCode === 46 ? true : !isNaN(Number(event.key))" id="sum_qty_i" value="'.$qty.'" step="'.$qty.'" min="0" name="set_qty[]" onchange="sum(\'i\');cal_qty_pcs(document.getElementById(\'avail_qty_set_'.$set_id.'\').value,\'avail_qty_pcs_'.$set_id.'\');" oninput="step_qty('.$qty.',this.value,\'error_qty_'.$sno1.'_'.$set_id.'\');"> 
<p id="error_qty_'.$sno1.'_'.$set_id.'" style="color:red;"></p></td>
    <td><input type="number" onkeydown="javascript: return event.keyCode === 8 ||
event.keyCode === 46 ? true : !isNaN(Number(event.key))" id="sum_amt_i" value="'.($new_sum_amt[$sno]).'"  readonly=""></td>

  </tr>';
  }else{ echo '
  </td><td><input type="number" onkeydown="javascript: return event.keyCode === 8 ||
event.keyCode === 46 ? true : !isNaN(Number(event.key))" id="sum_qty_i" value="'.$qty.'" step="'.$qty.'" min="0" name="set_qty[]" onchange="sum(\'i\');cal_qty_pcs(document.getElementById(\'avail_qty_set_'.$set_id.'\').value,\'avail_qty_pcs_'.$set_id.'\');" oninput="step_qty('.$qty.',this.value,\'error_qty_'.$sno1.'_'.$set_id.'\');"> 
<p id="error_qty_'.$sno1.'_'.$set_id.'" style="color:red;"></p></td>
    <td><input id="sum_amt_i" type="number" onkeydown="javascript: return event.keyCode === 8 ||
event.keyCode === 46 ? true : !isNaN(Number(event.key))" value="'.($new_sum_amt[$sno]).'"  readonly=""></td>
  </tr>';
  }
	$sno++;
	}
	// $sno++;
	}
echo '<tr>
<td colspan="3">Total Set</td>
<td id="total_qty_i">'.$sum_q.'(in pcs)
</td>
<td id="total_price_i">'.($total_sum).'.00/-</td></tr></tbody>';
}else
{
	echo '<tr>
	<th>COLOR</th>
	<td>';
	$sno='';
	for ($i=0; $i <$length ; $i++) 
	{
	 echo $sno.str_replace('_', ' ',$new_color[$i]);

	 $sno=', ';
	}
	echo '</td></tr>
	<tr>
	<th>SIZE</th>
	<td>';
	$sno='';
	for ($j=0; $j <$length_size ; $j++)
	{
	
		echo $sno.$new_size[$j];
	 	$sno=', ';
	}
	echo '</td></tr>
	<tr>
<td colspan="1">Price</td>
<td id="total_price">'.($wsp).'.00/- (per pcs)</td></tr>';
}
echo '</table></div></div>

</div>
</div>
';
}elseif($type=="with_price")
{
	if(($min_color==$length ) && ($min_size==$length_size) )
{
	$t_wsp=0;
	$qty=1;

echo '<thead>
	<tr>
		<th>S.No</th>
		<th>COLOR</th>
		<th>SIZE</th>
		<th>QTY(in pcs)</th>
		<th>RATE/-</th>
		</tr></thead>
<tbody>';
// echo $new_color[0];
for ($j=0; $j <$length_size ; $j++) { 
for ($i=0; $i <$length ; $i++) { 
	if($new_size[$j]==$ss)
	{
	echo '<tr>';
	}else
	{
	echo '<tr style="border-top:2px solid black;">';

	}
		echo '<td>'.($sno).'</td>
		<td>'.str_replace('_', ' ',$new_color[$i]).'</td><td>';  
		echo $new_size[$j];
		$ss=$new_size[$j];
		$cc=$new_color[$i];
		$query=mysqli_query($con,"SELECT * FROM `sizemaster` WHERE size_name='$ss'");
		$run=mysqli_fetch_assoc($query);
		// $qty=$qty*$run['qty'];
		$sum_q=$sum_q+$run['qty'];
		// if($wsp=="")
		// {
           $item2=mysqli_query($con,"SELECT wsp,qty FROM `set_details_whole` WHERE set_id='$set_id' and size='$ss' and color='$cc' and aid='$admin_id'");
           $row=mysqli_fetch_assoc($item2);
           if(mysqli_num_rows($item2)>0)
           {
           $wsp=$row['wsp'];
           $t_wsp+=$wsp*$run['qty'];
           $qty=$row['qty'];
           }
           else{
           	$wsp=0;
           	$t_wsp+=$wsp*$run['qty'];
            $qty=$run['qty'];

           }

		// }
		// $t_wsp+=$wsp;
	if($qty<2){
  echo '</td><td>
    <input type="number" onkeydown="javascript: return event.keyCode === 8 ||
event.keyCode === 46 ? true : !isNaN(Number(event.key))" id="sum_qty_p" value="'.$qty.'" step="'.$qty.'" min="0" readonly="" name="sum_qty[]"> </td>
    <td><input type="number" onkeydown="javascript: return event.keyCode === 8 ||
event.keyCode === 46 ? true : !isNaN(Number(event.key))" id="sum_amt_p" name="sum_amt[]" value="'.$wsp.'" onchange="sum(\'p\');"></td>

  </tr>';
  }else{ echo '
  </td><td><input type="number" onkeydown="javascript: return event.keyCode === 8 ||
event.keyCode === 46 ? true : !isNaN(Number(event.key))" id="sum_qty_p" value="'.$qty.'" step="'.$qty.'" min="0" readonly="" name="sum_qty[]"> </td>
    <td><input id="sum_amt_p" name="sum_amt[]" type="number" onkeydown="javascript: return event.keyCode === 8 ||
event.keyCode === 46 ? true : !isNaN(Number(event.key))" value="'.$wsp.'" onchange="sum(\'p\');"></td>
  </tr>';
  }
	$sno++;
	}
	}
echo '<tr>
<td colspan="3">Total Set</td>
<td id="total_qty_p">'.$sum_q.'(in pcs)
</td>
<td id="total_price_p">'.($t_wsp).'.00/-</td></tr></tbody>';
}else
{
	echo '<tr>
	<th>COLOR</th>
	<td>';
	$sno='';
	for ($i=0; $i <$length ; $i++) 
	{
	 echo $sno.str_replace('_', ' ',$new_color[$i]);
	 $sno=', ';
	}
	echo '</td></tr>
	<tr>
	<th>SIZE</th>
	<td>';
	$sno='';
	for ($j=0; $j <$length_size ; $j++)
	{
	
		echo $sno.$new_size[$j];
	 	$sno=', ';
	}
	echo '</td></tr>
	<tr>
<td colspan="1">Price</td>
<td id="total_price">'.($wsp).'.00/- (per pcs)</td></tr>
<tr>
<td colspan="2"></td></tr>
<tr><th style="width:40%;">Min Colour To Choose</th><th>Min Size To Choose</th></tr>
<tr><td>'.$min_color.'</td><td>'.$min_size.'</td></tr>
';
}
echo '</table></div></div>

</div>
</div>
';
}elseif($type=="with_price_w")
{
	if(($min_color==$length ) && ($min_size==$length_size) )
{
	$t_qty=1;
echo '<thead>
	<tr>
		<th>S.No</th>
		<th>COLOR</th>
		<th>SIZE</th>
		<th>QTY(in pcs)</th>
		<th>RATE/-</th>
		</tr></thead>
<tbody>';
// echo $new_color[0];
for ($j=0; $j <$length_size ; $j++) { 
for ($i=0; $i <$length ; $i++) { 
	echo '<tr>
		<td>'.($sno).'</td>
		<td>'.str_replace('_', ' ',$new_color[$i]).'</td><td>';  
		echo $new_size[$j];
		$ss=$new_size[$j];
		$cc=$new_color[$i];
		$query=mysqli_query($con,"SELECT * FROM `sizemaster` WHERE size_name='$ss'");
		$run=mysqli_fetch_assoc($query);
		$qty=$run['qty'];
		$sum_q=$sum_q+$qty;
		$t_wsp+=$wsp*$run['qty'];
		 $item2=mysqli_query($con,"SELECT qty FROM `set_details_whole` WHERE set_id='$set_id' and size='$ss' and color='$cc' and aid='$admin_id'");
           $row=mysqli_fetch_assoc($item2);
           if(mysqli_num_rows($item2)>0)
           {
           
           $qty=$row['qty'];
           }
           else{
           
            $qty=$run['qty'];

           }

	if($qty<2){
  echo '</td><td>
    <input type="number" onkeydown="javascript: return event.keyCode === 8 ||
event.keyCode === 46 ? true : !isNaN(Number(event.key))" id="sum_qty_p" value="'.$qty.'" step="'.$qty.'" min="0" readonly=""> </td>
    <td><input type="number" onkeydown="javascript: return event.keyCode === 8 ||
event.keyCode === 46 ? true : !isNaN(Number(event.key))" id="sum_amt_p" name="sum_amt[]" value="'.$wsp.'" onchange="sum(\'p\');"></td>

  </tr>';
  }else{ echo '
  </td><td><input type="number" onkeydown="javascript: return event.keyCode === 8 ||
event.keyCode === 46 ? true : !isNaN(Number(event.key))" id="sum_qty_p" value="'.$qty.'" step="'.$qty.'" min="0" readonly=""> </td>
    <td><input id="sum_amt_p" name="sum_amt[]" type="number" onkeydown="javascript: return event.keyCode === 8 ||
event.keyCode === 46 ? true : !isNaN(Number(event.key))" value="'.$wsp.'" onchange="sum(\'p\');"></td>
  </tr>';
  }
	$sno++;
	}
	}
echo '<tr>
<td colspan="3">Total Set</td>
<td id="total_qty_p">'.$sum_q.'(in pcs)
</td>
<td id="total_price_p">'.($t_wsp).'.00/-</td></tr></tbody>';
}else
{
	echo '<tr>
	<th>COLOR</th>
	<td>';
	$sno='';
	for ($i=0; $i <$length ; $i++) 
	{
	 echo $sno.str_replace('_', ' ',$new_color[$i]);
	 $sno=', ';
	}
	echo '</td></tr>
	<tr>
	<th>SIZE</th>
	<td>';
	$sno='';
	for ($j=0; $j <$length_size ; $j++)
	{
	
		echo $sno.$new_size[$j];
	 	$sno=', ';
	}
	echo '</td></tr>
	<tr>
<td colspan="1">Price</td>
<td id="total_price">'.($wsp).'.00/- (per pcs)</td></tr>
<tr>
<td colspan="2"></td></tr>
<tr><th style="width:40%;">Min Colour To Choose</th><th>Min Size To Choose</th></tr>
<tr><td>'.$min_color.'</td><td>'.$min_size.'</td></tr>
';
}
echo '</table></div></div>

</div>
</div>
';
}

?>