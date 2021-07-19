	<?php 
  include ('include/db.php');
  $size_type=$_POST['size_type'];
  $set_id=$_POST['set_id'];
  $val=$_POST['val'];
  
                	$size=mysqli_query($con,"SELECT * FROM `sizemaster` where (aid='$admin_id' or aid='0') and size_type='$size_type' GROUP BY type");
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
              <div class="col-md-7">
                <label style="vertical-align: middle;">Minimum Size To Choose By Customer</label>
              </div>
              <div class="col-md-3">
                <input type="number" onkeydown="javascript: return event.keyCode === 8 ||
event.keyCode === 46 ? true : !isNaN(Number(event.key))" id="min_size_'.$set_id.'" value="'.$val.'" class="form-control" oninput="max_color_size(\'size'.$set_id.'[]\',\'min_size_'.$set_id.'\',\'erro2_'.$set_id.'\')">
                <p id="erro2_'.$set_id.'" style="color:red;"></p>
              </div>
            </div>
            <div class="row" style="margin-left:10px;">
            <div class="col-md-12">
            <button type="button" class="btn btn-primary" onclick="new_size_row(\'new_size'.$set_id.'\')">Add Size &nbsp;<i class="fa fa-plus-circle" style="cursor:pointer" ></i></button>
            </div></div>
            <div class="row" id="new_size'.$set_id.'" style="margin-left:10px;display:none;">
            <div class="col-md-2">
            <label>New Size</label>
            </div>
            <div class="col-md-3">
            <input type="text" class="form-control" id="new_size_'.$set_id.'">
            </div>
            <div class="col-md-7">
             <input type="button" class="btn btn-success" onclick="new_size_row3(\'new_size_'.$set_id.'\',\'none\','.$set_id.')" value="Save">
              <input type="button" class="btn btn-secondary"onclick="" value="Cancel">
            </div>
            </div>';
                    $r=mysqli_num_rows($size);
                	while($run=mysqli_fetch_assoc($size))
                	{
                	
                	echo '
                    <div class="row" style="margin-left:10px;">
                    <div class="col-md-12" >
                		<br><label class="GFG">
                    <input type="radio" name="sz" style="cursor: pointer;" onchange="size_select('.$run['type'].','.$r.')" value="'.$run['type'].'">
                    &nbsp;&nbsp;OPTION&nbsp;'.$run['type'].'
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
                        <label class="GFG"><input type="checkbox" onclick="temp_size_arr(\'\')" style="cursor: pointer;" ';if($run['add_type']==1){ echo 'class="OPTION'.$run['type'].'" ';} echo'value="'.$run2['size_name'].'" name="size'.$set_id.'[]" onchange="';if($run['add_type']==1){ echo 'size_select('.$run['type'].','.$r.');';} echo'count_color_size(this.name,\'min_size_'.$set_id.'\');"';if(mysqli_num_rows($item2)>0){echo "checked='checked'";}echo '/>&nbsp;&nbsp;'.$run2['size_name'].'&nbsp;&nbsp;</label>
                			 ';}
                			
                	echo '</div></div>';
                }
                  echo '</div></div>';
  

 ?>