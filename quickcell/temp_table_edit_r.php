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
$sum_avail_qty=$_POST['sum_avail_qty'];
$auto_reduce_val=$_POST['auto_reduce_val'];
$avail_qty=$_POST['avail_qty'];
$sum_avail_qty_arr=json_decode($sum_avail_qty);
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
		<th style="display:none;">QTY(in pcs)</th>
		<th>RATE/-</th>
		';
		if($auto_reduce_val=='on')
		{
		echo '	
		<th>AVAIL QTY/-</th>';
		}
		echo '
		</tr></thead>
<tbody>';
// echo $new_color[0];
$sno=0;
$temp=0;
$min_amt=0;
for ($j=0; $j <$length_size ; $j++) { 
for ($i=0; $i <$length ; $i++) { 
	$sno1++;

	echo '<tr>
		<td>'.($sno1).'</td>
		<td>'.str_replace('_', ' ',$new_color[$i]).'</td><td>';
		echo $new_size[$j];
		$ss=$new_size[$j];
		$cc=$new_color[$i];
		$query=mysqli_query($con,"SELECT * FROM `sizemaster` WHERE size_name='$ss'");
		$run=mysqli_fetch_assoc($query);
		// $qty=$qty*$run['qty'];
		$sum_q=$sum_q+$run['qty'];
		$total_sum+=($new_sum_amt[$sno]*$run['qty']);
$min_amt=$new_sum_amt[$sno];

	 if(($min_amt < $temp) || ($temp==0))
	 {
	 	$temp=$min_amt;
	 }
		 $item2=mysqli_query($con,"SELECT qty_pcs FROM `set_details_whole` WHERE set_id='$set_id' and size='$ss' and color='$cc' and aid='$admin_id'");
		 $item1=mysqli_query($con,"SELECT qty_pcs FROM `set_details_whole` WHERE set_id='$set_id' and size='$ss' and color='$cc' and aid='$admin_id'");
           $row=mysqli_fetch_assoc($item2);
           while($rows=mysqli_fetch_assoc($item1))
           {
			$total_avail_qty+=$rows['qty_pcs'];
			// echo $total_avail_qty;
           }
	if($qty<2){
  echo '</td><td style="display:none;">'.$run['qty'].'
    <input type="number" onkeydown="javascript: return event.keyCode === 8 ||
event.keyCode === 46 ? true : !isNaN(Number(event.key))" id="sum_qty_i" value="'.$run['qty'].'" step="'.$run['qty'].'" min="0" name="set_qty[]" onchange="sum(\'i\');" readonly="" style="display:none;"> </td>
    <td><input type="number" onkeydown="javascript: return event.keyCode === 8 ||
event.keyCode === 46 ? true : !isNaN(Number(event.key))" id="sum_amt_i" value="'.($new_sum_amt[$sno]).'" name="sum_amt[]" readonly=""></td> ';
		if($auto_reduce_val=='on')
		{
		echo '
   <td><input type="number" onkeydown="javascript: return event.keyCode === 8 ||
event.keyCode === 46 ? true : !isNaN(Number(event.key))" id="avail_qty_e" value="'.($row['qty_pcs']).'"  name="avail_qty'.$set_id.'[]" onchange="sum2(this.id)"></td>';
		}
		echo '

  </tr>';
  }else{ echo '
  </td><td style="display:none;">'.$run['qty'].'<input type="number" onkeydown="javascript: return event.keyCode === 8 ||
event.keyCode === 46 ? true : !isNaN(Number(event.key))" id="sum_qty_i" value="'.$run['qty'].'" step="'.$run['qty'].'" min="0" name="set_qty[]" onchange="sum(\'i\');" readonly="" style="display:none;"> </td>
    <td><input id="sum_amt_i" type="number" onkeydown="javascript: return event.keyCode === 8 ||
event.keyCode === 46 ? true : !isNaN(Number(event.key))" value="'.($new_sum_amt[$sno]).'" name="sum_amt[]"  readonly=""></td>';
		if($auto_reduce_val=='on')
		{
		echo '
   <td><input type="number" onkeydown="javascript: return event.keyCode === 8 ||
event.keyCode === 46 ? true : !isNaN(Number(event.key))" id="avail_qty_e"  value="'.($row['qty_pcs']).'"  name="avail_qty'.$set_id.'[]" onchange="sum2(this.id)" ></td>';
		}
		echo '
  </tr>';
  }
	$sno++;
	}
	// $sno++;
	}
echo '<tr>
<td colspan="3">Total</td>
<td id="total_qty_i" style="display:none;">'.$sum_q.'(in pcs)
</td>
<td id="total_price_i">'.($temp).'.00/-</td>
';
if($auto_reduce_val=='on')
		{
		echo '
<td id="total_avail_qty">'.($total_avail_qty).'</td>';
}
echo '
</tr></tbody>';
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
	$temp=0;
	$min_amt=0;

echo '<thead>
	<tr>
		<th>S.No</th>
		<th>COLOR</th>
		<th>SIZE</th>
		<th style="display:none;">QTY(in pcs)</th>
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
		// $qty=$qty*$run['qty'];
		$sum_q=$sum_q+$run['qty'];
		// if($wsp=="")
		// {
           $item2=mysqli_query($con,"SELECT  wsp FROM `set_details_whole` WHERE set_id='$set_id' and size='$ss' and color='$cc' and aid='$admin_id'");
           $row=mysqli_fetch_assoc($item2);
           if(mysqli_num_rows($item2)>0)
           {
           $wsp=$row['wsp'];
           $min_amt=$wsp;

	 if(($min_amt < $temp) || ($temp==0))
	 {
	 	$temp=$min_amt;
	 }
           $t_wsp+=$wsp*$run['qty'];
           }
           else{
           	$wsp=0;
           	$t_wsp+=$wsp*$run['qty'];

           }

		// }
		// $t_wsp+=$wsp;
	if($qty<2){
  echo '</td><td style="display:none;">
    <input type="number" onkeydown="javascript: return event.keyCode === 8 ||
event.keyCode === 46 ? true : !isNaN(Number(event.key))" id="sum_qty_p" value="'.$run['qty'].'" step="'.$run['qty'].'" min="0" readonly=""> </td>
    <td><input type="number" onkeydown="javascript: return event.keyCode === 8 ||
event.keyCode === 46 ? true : !isNaN(Number(event.key))" id="sum_amt_p" name="sum_amt[]" value="'.$wsp.'" onchange="sum(\'p\');"></td>

  </tr>';
  }else{ echo '
  </td><td style="display:none;"><input type="number" onkeydown="javascript: return event.keyCode === 8 ||
event.keyCode === 46 ? true : !isNaN(Number(event.key))" id="sum_qty_p" value="'.$run['qty'].'" step="'.$run['qty'].'" min="0" readonly=""> </td>
    <td><input id="sum_amt_p" name="sum_amt[]" type="number" onkeydown="javascript: return event.keyCode === 8 ||
event.keyCode === 46 ? true : !isNaN(Number(event.key))" value="'.$wsp.'" onchange="sum(\'p\');"></td>
  </tr>';
  }
	$sno++;
	}
	}
echo '<tr>
<td colspan="3">Total Set</td>
<td id="total_qty_p" style="display:none;">'.$sum_q.'(in pcs)
</td>
<td id="total_price_p">'.($temp).'.00/-</td></tr></tbody>';
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
<tr><th>Min Colour To Choose</th><th>Min Size To Choose</th></tr>
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
		<th style="display:none;">QTY(in pcs)</th>
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
		// $t_qty=$t_qty*$run['qty'];
		// if($wsp=="")
		// {
           // $item2=mysqli_query($con,"SELECT wsp FROM `set_details_whole` WHERE set_id='$set_id' and size='$ss' and color='$cc'");
           // $row=mysqli_fetch_assoc($item2);
           // if(mysqli_num_rows($item2)>0)
           // {
           // $wsp=$row['wsp'];
           // }
           // else{
           // 	$wsp=0;
           // }

		// }
		// $t_wsp+=$wsp;
	if($qty<2){
  echo '</td><td style="display:none;">
    <input type="number" onkeydown="javascript: return event.keyCode === 8 ||
event.keyCode === 46 ? true : !isNaN(Number(event.key))" id="sum_qty_p" value="'.$run['qty'].'" step="'.$run['qty'].'" min="0" readonly=""> </td>
    <td><input type="number" onkeydown="javascript: return event.keyCode === 8 ||
event.keyCode === 46 ? true : !isNaN(Number(event.key))" id="sum_amt_p" name="sum_amt[]" value="'.$wsp.'" onchange="sum(\'p\');"></td>

  </tr>';
  }else{ echo '
  </td><td style="display:none;"><input type="number" onkeydown="javascript: return event.keyCode === 8 ||
event.keyCode === 46 ? true : !isNaN(Number(event.key))" id="sum_qty_p" value="'.$run['qty'].'" step="'.$run['qty'].'" min="0" readonly=""> </td>
    <td><input id="sum_amt_p" name="sum_amt[]" type="number" onkeydown="javascript: return event.keyCode === 8 ||
event.keyCode === 46 ? true : !isNaN(Number(event.key))" value="'.$wsp.'" onchange="sum(\'p\');"></td>
  </tr>';
  }
	$sno++;
	}
	}
echo '<tr>
<td colspan="3">Total Set</td>
<td id="total_qty_p" style="display:none;">'.$sum_q.'(in pcs)
</td>
<td id="total_price_p">'.($wsp).'.00/-</td></tr></tbody>';
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
<tr><th>Min Colour To Choose</th><th>Min Size To Choose</th></tr>
<tr><td>'.$min_color.'</td><td>'.$min_size.'</td></tr>
';
}
echo '</table></div></div>

</div>
</div>
';
}elseif($type=='with_avail_qty')
{
if(($min_color==$length ) && ($min_size==$length_size) )
{
	$qty=1;

echo '<thead>
	<tr>
		<th>S.No</th>
		<th>COLOR</th>
		<th>SIZE</th>
		<th style="display:none;">QTY(in pcs)</th>
		<th>RATE/-</th>	
		<th>AVAIL QTY/-</th>
		</tr></thead>
<tbody>';
// echo $new_color[0];
$sno=0;
$temp=0;
$min_amt=0;
for ($j=0; $j <$length_size ; $j++) { 
for ($i=0; $i <$length ; $i++) { 
	$sno1++;

	echo '<tr>
		<td>'.($sno1).'</td>
		<td>'.str_replace('_', ' ',$new_color[$i]).'</td><td>';
		echo $new_size[$j];
		$ss=$new_size[$j];
		$cc=$new_color[$i];
		$query=mysqli_query($con,"SELECT * FROM `sizemaster` WHERE size_name='$ss'");
		$run=mysqli_fetch_assoc($query);
		// $qty=$qty*$run['qty'];
		$sum_q=$sum_q+$run['qty'];
		$total_sum+=($new_sum_amt[$sno]*$run['qty']);
		$min_amt=$new_sum_amt[$sno];

	 if(($min_amt < $temp) || ($temp==0))
	 {
	 	$temp=$min_amt;
	 }
		 $item2=mysqli_query($con,"SELECT qty_pcs FROM `set_details_whole` WHERE set_id='$set_id' and size='$ss' and color='$cc' and aid='$admin_id'");
		 $item1=mysqli_query($con,"SELECT qty_pcs FROM `set_details_whole` WHERE set_id='$set_id' and size='$ss' and color='$cc' and aid='$admin_id'");
           $row=mysqli_fetch_assoc($item2);
           while($rows=mysqli_fetch_assoc($item1))
           {
			$total_avail_qty+=$rows['qty_pcs'];
			// echo $total_avail_qty;
           }
	if($qty<2){
  echo '</td><td style="display:none;">'.$run['qty'].'
    <input type="number" onkeydown="javascript: return event.keyCode === 8 ||
event.keyCode === 46 ? true : !isNaN(Number(event.key))" id="sum_qty_i" value="'.$run['qty'].'" step="'.$run['qty'].'" min="0" name="set_qty[]" onchange="sum(\'i\');" readonly="" style="display:none;"> </td>
    <td><input type="number" onkeydown="javascript: return event.keyCode === 8 ||
event.keyCode === 46 ? true : !isNaN(Number(event.key))" id="sum_amt_i" value="'.($new_sum_amt[$sno]).'" name="sum_amt[]" readonly=""></td>
   <td><input type="number" onkeydown="javascript: return event.keyCode === 8 ||
event.keyCode === 46 ? true : !isNaN(Number(event.key))" id="avail_qty_e" value="'.($avail_qty).'"  name="avail_qty'.$set_id.'[]" onchange="sum2(this.id)"></td>
  </tr>';
  }else{ echo '
  </td><td style="display:none;">'.$run['qty'].'<input type="number" onkeydown="javascript: return event.keyCode === 8 ||
event.keyCode === 46 ? true : !isNaN(Number(event.key))" id="sum_qty_i" value="'.$run['qty'].'" step="'.$run['qty'].'" min="0" name="set_qty[]" onchange="sum(\'i\');" readonly="" style="display:none;"> </td>
    <td><input id="sum_amt_i" type="number" onkeydown="javascript: return event.keyCode === 8 ||
event.keyCode === 46 ? true : !isNaN(Number(event.key))" value="'.($new_sum_amt[$sno]).'" name="sum_amt[]"  readonly=""></td>
   <td><input type="number" onkeydown="javascript: return event.keyCode === 8 ||
event.keyCode === 46 ? true : !isNaN(Number(event.key))" id="avail_qty_e"  value="'.($avail_qty).'"  name="avail_qty'.$set_id.'[]" onchange="sum2(this.id)" ></td></tr>';
  }
	$sno++;
	}
	// $sno++;
	}
echo '<tr>
<td colspan="3">Total</td>
<td id="total_qty_i" style="display:none;">'.$sum_q.'(in pcs)
</td>
<td id="total_price_i">'.($temp).'.00/-</td>
<td id="total_avail_qty">'.($total_avail_qty).'</td>
</tr></tbody>';
}
}elseif($type=='with_avail_qty_w')
{
if(($min_color==$length ) && ($min_size==$length_size) )
{
	$qty=1;

echo '<thead>
	<tr>
		<th>S.No</th>
		<th>COLOR</th>
		<th>SIZE</th>
		<th style="display:none;">QTY(in pcs)</th>
		<th>RATE/-</th>	
		<th>AVAIL QTY/-</th>
		</tr></thead>
<tbody>';
// echo $new_color[0];
$sno=0;
$temp=0;
$min_amt=0;
for ($j=0; $j <$length_size ; $j++) { 
for ($i=0; $i <$length ; $i++) { 
	$sno1++;

	echo '<tr>
		<td>'.($sno1).'</td>
		<td>'.str_replace('_', ' ',$new_color[$i]).'</td><td>';
		echo $new_size[$j];
		$ss=$new_size[$j];
		$cc=$new_color[$i];
		$query=mysqli_query($con,"SELECT * FROM `sizemaster` WHERE size_name='$ss'");
		$run=mysqli_fetch_assoc($query);
		// $qty=$qty*$run['qty'];
		$sum_q=$sum_q+$run['qty'];
		$total_sum+=($new_sum_amt[$sno]*$run['qty']);
		$min_amt=$new_sum_amt[$sno];

	 if(($min_amt < $temp) || ($temp==0))
	 {
	 	$temp=$min_amt;
	 }
		 // $item2=mysqli_query($con,"SELECT qty_pcs FROM `set_details_whole` WHERE set_id='$set_id' and size='$ss' and color='$cc' and aid='$admin_id'");
		 // $item1=mysqli_query($con,"SELECT qty_pcs FROM `set_details_whole` WHERE set_id='$set_id' and size='$ss' and color='$cc' and aid='$admin_id'");
   //         $row=mysqli_fetch_assoc($item2);
   //         while($rows=mysqli_fetch_assoc($item1))
   //         {
			$total_avail_qty+=$avail_qty;
			// echo $total_avail_qty;
           // }
	if($qty<2){
  echo '</td><td style="display:none;">'.$run['qty'].'
    <input type="number" onkeydown="javascript: return event.keyCode === 8 ||
event.keyCode === 46 ? true : !isNaN(Number(event.key))" id="sum_qty_i" value="'.$run['qty'].'" step="'.$run['qty'].'" min="0" name="set_qty[]" onchange="sum(\'i\');" readonly="" style="display:none;"> </td>
    <td><input type="number" onkeydown="javascript: return event.keyCode === 8 ||
event.keyCode === 46 ? true : !isNaN(Number(event.key))" id="sum_amt_i" value="'.($new_sum_amt[$sno]).'" name="sum_amt[]" readonly=""></td>
   <td><input type="number" onkeydown="javascript: return event.keyCode === 8 ||
event.keyCode === 46 ? true : !isNaN(Number(event.key))" id="avail_qty_e" value="'.($avail_qty).'"  name="avail_qty'.$set_id.'[]" onchange="sum2(this.id)"></td>
  </tr>';
  }else{ echo '
  </td><td style="display:none;">'.$run['qty'].'<input type="number" onkeydown="javascript: return event.keyCode === 8 ||
event.keyCode === 46 ? true : !isNaN(Number(event.key))" id="sum_qty_i" value="'.$run['qty'].'" step="'.$run['qty'].'" min="0" name="set_qty[]" onchange="sum(\'i\');" readonly="" style="display:none;"> </td>
    <td><input id="sum_amt_i" type="number" onkeydown="javascript: return event.keyCode === 8 ||
event.keyCode === 46 ? true : !isNaN(Number(event.key))" value="'.($new_sum_amt[$sno]).'" name="sum_amt[]"  readonly=""></td>
   <td><input type="number" onkeydown="javascript: return event.keyCode === 8 ||
event.keyCode === 46 ? true : !isNaN(Number(event.key))" id="avail_qty_e"  value="'.($avail_qty).'"  name="avail_qty'.$set_id.'[]" onchange="sum2(this.id)" ></td></tr>';
  }
	$sno++;
	}
	// $sno++;
	}
echo '<tr>
<td colspan="3">Total</td>
<td id="total_qty_i" style="display:none;">'.$sum_q.'(in pcs)
</td>
<td id="total_price_i">'.($temp).'.00/-</td>
<td id="total_avail_qty">'.($total_avail_qty).'</td>
</tr></tbody>';
}
}


?>