	<?php 
  include ('include/db.php');
  $size_type=$_POST['size_type'];
  $set_id=$_POST['set_id'];
  $val=$_POST['val'];
  $prev_color=json_decode($_POST['prev_color']);
  if($_POST['type']=="new_size_add")
  {
    $new_size=$_POST['new_size'];
    $size_type=$_POST['size_type'];
    $tb=$_POST['tb'];
    $set_id=$_POST['set_id'];

    $chk=mysqli_query($con,"SELECT add_type,type FROM `sizemaster` WHERE (aid='$admin_id' OR aid='0') and size_type='$size_type' ORDER BY type DESC LIMIT 1");
    $chk_r=mysqli_fetch_assoc($chk);
    if($chk_r['add_type']==1)
    {
    $type=$chk_r['type']+1;
    }else
    {
    $type=$chk_r['type'];

    }
    $chk2=mysqli_query($con,"SELECT * FROM `sizemaster` WHERE (aid='$admin_id' or aid='0') and size_type='$size_type' and size_name='$new_size'");
    if(mysqli_num_rows($chk2)>0)
    {
        echo 0;
    }
    else
    {
        $insert=mysqli_query($con,"INSERT INTO `sizemaster`(`aid`, `type`, `size_name`, `qty`, `date`, `status`, `remark`,`size_type`,`add_type`) VALUES ('$admin_id','$type','$new_size','1','$dj','A','','$size_type','2')");
  }
}
                	$size=mysqli_query($con,"SELECT * FROM `sizemaster` where (aid='$admin_id' or aid='0') and size_type='$size_type' and type!='3' and type!='5' GROUP BY type");
                  echo '<div class="row">
                    <div class="col-md-12">

            
            <div class="row">
            <div class="col-md-7"></div>
            <div class="col-md-2">
            <button type="button" class="btn btn-info" onclick="nexttab2(\'v-pills-colour_'.$set_id.'\');">Back</button>
            </div>
            <div class="col-md-2" >
            <button type="button" class="btn btn-warning" onclick="info2();nexttab2(\'v-pills-price_'.$set_id.'\');show_temp_table3(\'with_price\',\'myTable3_'.$set_id.'\');">Next</button>
            </div>
            
            </div>
             <div class="row" style="margin-left:10px;margin-top:5px;">
            <div class="col-md-12">
            <input type="search" class="form-control" onkeyup="myFunction3(\'Search2'.$set_id.'\',\'target2'.$set_id.'\')" id="Search2'.$set_id.'" placeholder="Search for Size..." data-clear-btn="true">
            </div>
            </div>
            <div class="row" style="margin-left:10px;margin-top:5px;">
              
            </div>
            <div class="row" style="margin-left:10px;">
            <div class="col-md-12">
            <button type="button" class="btn btn-primary" onclick="new_size_row(\'new_size\')">Add Size &nbsp;<i class="fa fa-plus-circle" style="cursor:pointer" ></i></button>
            </div></div>
            <div class="row" id="new_size" style="margin-left:10px;display:none;">
            <div class="col-md-2">
            <label>New Size</label>
            </div>
            <div class="col-md-3">
            <input type="text" class="form-control" id="new_size_">
            </div>
            <div class="col-md-7">
             <input type="button" class="btn btn-success" onclick="new_size_row2(\'new_size_\',\'none\',\'size_'.$set_id.'\','.$set_id.')" value="Save">
              <input type="button" class="btn btn-secondary"onclick="" value="Cancel">
            </div>
            </div>';
                    $r=mysqli_num_rows($size);
                	while($run=mysqli_fetch_assoc($size))
                	{
                    $sno++;
                	
                	echo '
                    <div class="row" style="margin-left:10px;">
                    <div class="col-md-12" >
                		<br><label class="GFG">
                    <input type="radio" name="sz" style="cursor: pointer;" onchange="size_select('.$sno.','.$r.')" value="'.$run['type'].'">
                    &nbsp;&nbsp;OPTION&nbsp;'.$sno.'
                    </label>&nbsp;</div></div>
                    
                    <div class="row" style="margin-left:10px;">
                    <div class="col-md-12" >';
                			$type=$run['type'];
                			 $s_size=mysqli_query($con,"SELECT * FROM `sizemaster` where (aid='$admin_id' or aid='0') and type='$type' and size_type='$size_type'");
                			 while ($run2=mysqli_fetch_assoc($s_size)) {
                			 	$s_row=$run2["size_name"];
                        // $set_id=$_POST['set_id'];
                        $item2=mysqli_query($con,"SELECT * FROM `set_details_whole` WHERE aid='$admin_id' and set_id='$set_id' and size='$s_row'");
                        
                			 	echo '
                        <label class="GFG target2'.$set_id.'"><input type="checkbox" style="cursor: pointer;" ';if($run['add_type']==1){ echo 'class="OPTION'.$sno.'"';} echo 'value="'.$run2['size_name'].'" name="size[]" onchange="';if($run['add_type']==1){ echo 'size_select('.$sno.','.$r.');';} echo'count_color_size(this.name,\'min_size_'.$set_id.'\');"';if(sizeof($prev_color)>0){for($i=0;$i<sizeof($prev_color);$i++){if((mysqli_num_rows($item2)>0) or ($run2['size_name']==$new_size) or($prev_color[$i]==$run2['size_name'])){echo "checked='checked'";}}}else{if((mysqli_num_rows($item2)>0) or ($run2['size_name']==$new_size)){echo "checked='checked'";}}echo '/>&nbsp;&nbsp;'.$run2['size_name'].'&nbsp;&nbsp;</label>
                			 ';}
                			
                	echo '</div></div>';
                }
                  echo '</div></div>';
  

 ?>