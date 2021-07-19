	<?php 
  include ('include/db.php');
  $size_type=$_POST['size_type'];
  if($size_type!='')
  {
                	$size=mysqli_query($con,"SELECT * FROM `sizemaster` where aid='$admin_id' and size_type='$size_type' GROUP BY type");
                  echo '<div class="row">
                    <div class="col-md-12">

            
            <div class="row">
            <div class="col-md-7"></div>
            <div class="col-md-2">
            <button type="button" class="btn btn-info" onclick="nexttab(\'v-pills-colour\');">Back</button>
            </div>
            <div class="col-md-2">
            <button type="button" class="btn btn-success" onclick="info2();nexttab(\'v-pills-price\');show_temp_table(\'with_price\',\'myTable3\');">Next</button>
            </div>
            
            </div>
            <div class="row" style="margin-left:10px;margin-top:5px;">
              <div class="col-md-7">
                <label style="vertical-align: middle;">Minimum Size To Choose By Customer</label>
              </div>
              <div class="col-md-3">
                <input type="number" id="min_size" class="form-control" oninput="max_color_size(\'size[]\',\'min_size\',\'erro2\')">
                <p id="erro2" style="color:red;"></p>
              </div>
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
             <input type="button" class="btn btn-success" onclick="new_size_row2(\'new_size_\',\'none\')" value="Save">
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
                			 $s_size=mysqli_query($con,"SELECT * FROM `sizemaster` where aid='$admin_id' and type='$type' and size_type='$size_type'");
                			 while ($run2=mysqli_fetch_assoc($s_size)) {
                			 	$s_row=$run2["size_name"];
                        $set_id=$_POST['set_id'];
                        $item2=mysqli_query($con,"SELECT * FROM `set_details_whole` WHERE set_id='$set_id' and size='$s_row'");
                        
                			 	echo '
                        <div class="radio-toolbar">
                        <label class="GFG"><input type="checkbox" style="cursor: pointer;" class="OPTION'.$run['type'].'" value="'.$run2['size_name'].'" name="size[]" onchange="count_color_size(this.name,\'min_size\');size_select('.$run['type'].','.$r.')"';if(mysqli_num_rows($item2)>0){echo "checked='checked'";}echo '/>&nbsp;&nbsp;'.$run2['size_name'].'&nbsp;&nbsp;</label></div>
                			 ';}
                			
                	echo '</div></div>';
                }
                  echo '</div></div>';
  }else
  {
    $size=mysqli_query($con,"SELECT * FROM `sizemaster` where aid='$admin_id' GROUP BY type");
                  echo '<div class="row">
                    <div class="col-md-12">

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
             <input type="button" class="btn btn-success" onclick="new_size_row2(\'new_size_\',\'none\')" value="Save">
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
                       $s_size=mysqli_query($con,"SELECT * FROM `sizemaster` where aid='$admin_id' and type='$type' and size_type='$size_type'");
                       while ($run2=mysqli_fetch_assoc($s_size)) {
                        $s_row=$run2["size_name"];
                        $item2=mysqli_query($con,"SELECT * FROM `set_details_whole` WHERE pid='$pid' and size='$s_row'");
                        
                        echo '
                        <div class="radio-toolbar">
                        <label class="GFG"><input type="checkbox" style="cursor: pointer;" class="OPTION'.$run['type'].'" value="'.$run2['size_name'].'" name="size[]" onchange="count_color_size(this.name,\'min_size\');size_select('.$run['type'].','.$r.')"/>&nbsp;&nbsp;'.$run2['size_name'].'&nbsp;&nbsp;</label></div>
                       ';}
                      
                  echo '</div></div>';
                }
                  echo '</div></div>';
  }

 ?>