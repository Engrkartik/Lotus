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
$wsp=$_POST['wsp'];

$new_color=json_decode($color);
$size=$_POST['size'];
$new_size=json_decode($size);
$length= sizeof($new_color);
$length_size= sizeof($new_size);

echo '<table class="table table-bordered" style="border:2px solid black;">
	<thead>
	<tr>
		<th>S.No</th>
		<th>COLOR</th>
		<th>SIZE</th>
		<th>QTY(in pcs)</th>
		<th>RATE/-</th>
		</tr>
<tbody>';
// echo $new_color[0];
for ($i=0; $i <$length ; $i++) { 
	$cc=str_replace('_', ' ',$new_color[$i]);
	echo '<tr>
		<td>'.($i+1).'</td>
		<td>'.$cc.'</td><td>';
// for ($j=0; $j <$length_size ; $j++) { 
		echo $new_size[0];
		$ss=$new_size[0];
		$query=mysqli_query($con,"SELECT * FROM `sizemaster` WHERE size_name='$ss'");
		$run=mysqli_fetch_assoc($query);
		if($_POST['admin']!='2')
		{
		if($length==1)
		{
		$qty=$_POST['avail_qty'];
		$cond="disabled";
		}else {
			$qty='1';
			$cond="";
		}
	}else {
		$qty=$run['qty'];
	}
		$sum_q=$sum_q+$qty;
	// }
	if($qty<2){
	echo '</td><td>
    <input type="number" id="sum_qty" readonly value='.$qty.' min="0"/ name="set_qty[]" onchange="sum()" '.$cond.'>   </td>
		<td>'.$wsp.'/-</td>

	</tr>';
	}else{
	echo '</td><td>
    <input type="number" id="sum_qty" readonly value='.$qty.' min="0"/ name="set_qty[]" onchange="sum()" onkeydown="return false" '.$cond.'>   </td>
		<td>'.$wsp.'/-</td>

	</tr>';
	}
}
echo '<tr>
<td colspan="3">Total Set</td>
<td id="total_qty">'.$sum_q.'(in pcs) = 1 Set
</td>
<td id="total_price">'.($sum_q*$wsp).'.00/-</td></tr></tbody>
	</thead>
</table>';
}
?>