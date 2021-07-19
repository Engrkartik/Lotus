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
$sno=1;
echo '<div class="row">
<div class="col-md-12" style="flex-basis:97%;">
<div class="row">
<div class="col-12">
  <div class="card no-b" style="height:400px; overflow-y:auto;">
<div class="card-header bg-primary text-white">
<h4>Set Details</h4>
<div class="row justify-content-end">
</div>
</div>
<div class="card-body no-p">
<div class="tab-content">
<div class="tab-pane fade active show" id="v-pills-tab1" role="tabpanel" aria-labelledby="v-pills-tab1">
<div class="table-responsive">
    <table class="table table-hover earning-box">';
     if($type!='with_price')
		 {
		 if(($min_color==$length ) && ($min_size==$length_size) )
		 {
     echo '  <thead class="no-b">
     <tr>
			<th>S.No</th>
			<th>COLOR</th>
			<th>SIZE</th>
			<th>QTY(in pcs)</th>
			<th>RATE/-</th>
			</tr>
			</thead>
	<tbody>';
	// echo $new_color[0];
	$sno=0;
	$ss=0;
	for ($j=0; $j <$length_size ; $j++) { 
	for ($i=0; $i <$length ; $i++) { 
		$sno1++;
		if($new_size[$j]==$ss)
		{
		echo '<tr>';
		}else
		{
		echo '<tr style="border-top:2px solid grey;">';

		}
			echo '<td>'.($sno1).'</td>
			<td>'.str_replace('_', ' ',$new_color[$i]).'</td><td>';
			echo $new_size[$j];
			$ss=$new_size[$j];
			$query=mysqli_query($con,"SELECT * FROM `sizemaster` WHERE size_name='$ss'");
			$run=mysqli_fetch_assoc($query);
			$qty=$run['qty'];
			$sum_q=$sum_q+$qty;
			$total_sum+=($new_sum_amt[$sno]*$qty);
		if($qty<2){
	  echo '</td><td>
	    <input type="number" id="sum_qty_i" value="'.$qty.'" step="'.$qty.'" min="0" name="set_qty[]" onchange="sum(\'i\');cal_qty_pcs(document.getElementById(\'avail_qty_set\').value)" style="width:72%;"> </td>
	    <td><input type="number" id="sum_amt_i" value="'.($new_sum_amt[$sno]).'"  readonly="" style="width:72%;"></td>

	  </tr>';
	  }else{ echo '
	  </td><td><input type="number" id="sum_qty_i" value="'.$qty.'" step="'.$qty.'" min="0" name="set_qty[]" onchange="sum(\'i\');cal_qty_pcs(document.getElementById(\'avail_qty_set\').value)" style="width:72%;"> </td>
	    <td><input id="sum_amt_i" type="number" value="'.($new_sum_amt[$sno]).'"  readonly="" style="width:72%;"></td>
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
	<th>PRICE</th>
	<td id="total_price">'.($wsp).'.00/- (per pcs)</td></tr>';
	}
	echo '</table></table></div></div>
	</div>
	</div>
	</div>
	</div>
	';
	}else
	{
		if(($min_color==$length ) && ($min_size==$length_size) )
	{
		$ss=0;
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
		echo '<tr style="border-top:2px solid grey;">';

		}
		echo '<td>'.($sno).'</td>
			<td>'.str_replace('_', ' ',$new_color[$i]).'</td><td>';
			echo $new_size[$j];
			$ss=$new_size[$j];
			$query=mysqli_query($con,"SELECT * FROM `sizemaster` WHERE size_name='$ss'");
			$run=mysqli_fetch_assoc($query);
			$qty=$run['qty'];
			$sum_q=$sum_q+$qty;
			// $t_wsp+=$wsp;
		if($qty<2){
	  echo '</td><td>
	    <input type="number" id="sum_qty_p" value="'.$qty.'" step="'.$qty.'" min="0" readonly="" style="width:72%;"> </td>
	    <td><input type="number" id="sum_amt_p" name="sum_amt[]" value="'.$wsp.'" onchange="sum(\'p\');" style="width:72%;"></td>

	  </tr>';
	  }else{ echo '
	  </td><td><input type="number" id="sum_qty_p" value="'.$qty.'" step="'.$qty.'" min="0" readonly="" style="width:72%;"> </td>
	    <td><input id="sum_amt_p" name="sum_amt[]" type="number" value="'.$wsp.'" onchange="sum(\'p\');" style="width:72%;"></td>
	  </tr>';
	  }
		$sno++;
		}
		}
	echo '<tr>
	<td colspan="3">Total Set</td>
	<td id="total_qty_p">'.$sum_q.'(in pcs)
	</td>
	<td id="total_price_p">'.($sum_q*$wsp).'.00/-</td></tr></tbody>';
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
	<th>PRICE</th>
	<td id="total_price">'.($wsp).'.00/- (per pcs)</td></tr>
	<tr>
	<td colspan="2"></td></tr>
	<tr><th style="width:35%;">Min Colour To Choose</th><th>Min Size To Choose</th></tr>
	<tr><td>'.$min_color.'</td><td>'.$min_size.'</td></tr>
	';
	}
	                              echo '      </table>
	                                </div>
	                            </div>
	                           
	                        </div>
	                    </div>
	                </div>
	            </div>

	</div>
	</div>
	</div>
	</div>
	';
	}

?>