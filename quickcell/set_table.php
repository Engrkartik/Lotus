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
	<tr>
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
</table>';
}
?>