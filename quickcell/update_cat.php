<?php
include('include/db.php');
$type=$_POST['type'];
$pid=$_POST['pid'];
$today=date('Y-m-d'); 
if($type=='subcat')
{
if($_POST['cat_id']!="")
{
	$cat_id=$_POST['cat_id'];
	echo '<select class="form-control" name="category" id="sub_category" >
                        	<option value="00" disabled="">Select Sub Category</option>';
                        	$cat=mysqli_query($con,"SELECT * FROM `category` WHERE (aid='$admin_id' or aid='0') and parent_id='$cat_id'  order by id desc");
                        	if(mysqli_num_rows($cat)>0)
                        	{
                        	while($row2=mysqli_fetch_assoc($cat))
                        	{
                                $sub_id=$row2['id'];
                                $chk=mysqli_query($con,"SELECT *  FROM `product` WHERE `id` ='$pid' and `sub_cat`='$sub_id' and `cat_id`='$cat_id' and aid='$admin_id'");
                        	echo '<option value='.$row2['id'].'';if(mysqli_num_rows($chk)>0) {echo ' selected="selected"';} echo '>'.$row2['title'].'</option>';
                        }
                    }else
                    {
                        	echo '<option value="00" selected="selected">No Category</option>';

                    }
                        echo '</select>';
}
}
elseif($type=='cat'){
    $cat_id=$_POST['cat'];
 echo '<select class="form-control" name="category" id="category" onchange="show_att(this.value)">
                        	<option value="00" disabled="">Select Category</option>';
                        	$cat=mysqli_query($con,"SELECT * FROM `category` WHERE (aid='$admin_id' or aid='0') and parent_id='0' order by id desc");
                        	while($row2=mysqli_fetch_assoc($cat))
                        	{

                        	echo '<option value='.$row2['id'].'';if($row2['id']==$cat_id){ echo ' selected="selected"';} echo '>'.$row2['title'].'</option>';
                        }
                        echo '</select>';

}elseif($type=='brand')
{
     echo '<select class="form-control" id="brand">
                          <option disabled="true">Select Brand</option>';
                          
                          $brand=mysqli_query($con,"SELECT * FROM `brand` WHERE aid='$admin_id' order by id desc");
                          while ($row_b=mysqli_fetch_assoc($brand)) {

                         echo '<option value="'.$row_b['name'].'">'.$row_b['name'].'</option>
                        ';}
                        echo '</select>';
}elseif($type=='new_size')
{
    $new_size=$_POST['new_size'];
    $size_type=$_POST['size_type'];
    $tb=$_POST['tb'];
    $prev_color=json_decode($_POST['prev_size']);

    $chk=mysqli_query($con,"SELECT add_type,type FROM `sizemaster` WHERE (aid='$admin_id' OR aid='0') and size_type='$size_type' ORDER BY type DESC LIMIT 1");
    $chk_r=mysqli_fetch_assoc($chk);
    if($chk_r['add_type']==1)
    {
    $type=$chk_r['type']+1;
    }else
    {
    $type=$chk_r['type'];

    }
    $chk2=mysqli_query($con,"SELECT * FROM `sizemaster` WHERE (aid='$admin_id' OR aid='0') and size_type='$size_type' and size_name='$new_size'");
    if(mysqli_num_rows($chk2)>0)
    {
        echo 0;
    }
    else
    {
        $insert=mysqli_query($con,"INSERT INTO `sizemaster`(`aid`, `type`, `size_name`, `qty`, `date`, `status`, `remark`,`size_type`,`add_type`) VALUES ('$admin_id','$type','$new_size','1','$dj','A','','$size_type','2')");
        if($insert)
        {
                $size=mysqli_query($con,"SELECT * FROM `sizemaster` where (aid='$admin_id' or aid='0') and size_type='$size_type' GROUP BY type");
                      echo '<div class="row">
                        <div class="col-md-12">

                
                <div class="row" >
                <div class="col-md-8">
                </div>
                
                <div class="col-md-2">
                <button type="button" class="btn btn-info" onclick="nexttab(\'v-pills-colour\');">Back</button>

                </div>
                <div class="col-md-2">
                <button type="button" class="btn btn-warning" onclick="info2();nexttab(\'v-pills-price\');show_temp_table(\'with_price\',\'myTable3\');">Next</button>
                </div>
                </div><br><div class="row" style="margin-left:10px;">
                      <div class="col-md-12">
                      <div class="row">
                  <div class="col-md-7">
                    <label style="vertical-align: middle;">Minimum Size To Choose By Customer</label>
                  </div>
                  <div class="col-md-3">
                    <input type="number" onkeydown="javascript: return event.keyCode === 8 ||
event.keyCode === 46 ? true : !isNaN(Number(event.key))" id="min_size" class="form-control" oninput="max_color_size(\'size[]\',\'min_size\',\'erro2\')">
                    <p id="erro2" style="color:red;"></p>
                  </div>
                </div>
                
                </div>
                </div><br>
                <div class="row" style="margin-left:10px;">
                <div class="col-md-12">
                <button type="button" class="btn btn-primary" style="cursor:pointer;" onclick="new_size_row(\'new_size_p\')">Add Size &nbsp;<i class="fa fa-plus-circle" ></i></button>
                </div></div>
                <div class="row" id="new_size_p" style="margin-left:10px;display:none;">
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
                                 $s_size=mysqli_query($con,"SELECT * FROM `sizemaster` where (aid='$admin_id' or aid='0') and type='$type' and size_type='$size_type'");
                                 while ($run2=mysqli_fetch_assoc($s_size)) {
                                    $s_row=$run2["size_name"];
                            $item2=mysqli_query($con,"SELECT * FROM `set_details_whole` WHERE pid='$pid' and size='$s_row'");
                            
                                    echo '
                            
                            <label class="GFG"><input type="checkbox" style="cursor: pointer;" ';if($run['add_type']==1){ echo 'class="OPTION'.$run['type'].'" ';} echo 'value="'.$run2['size_name'].'" name="size[]" onchange="count_color_size(this.name,\'min_size\');';if($run['add_type']==1){ echo 'size_select('.$run['type'].','.$r.')';} echo '"';for($i=0;$i<sizeof($prev_color);$i++){if(($new_size==$run2['size_name']) || ($prev_color[$i]==$run2['size_name'])) { echo "checked='checked'";}}echo '/>&nbsp;&nbsp;'.$run2['size_name'].'&nbsp;&nbsp;</label>
                                 ';}
                                
                        echo '</div></div>';
                    }
                      echo '</div></div>';
        }else {
            echo mysqli_error($con);
        }
    }
}elseif($type=='new_size2')
{
    $new_size=$_POST['new_size'];
    $size_type=$_POST['size_type'];
    $tb=$_POST['tb'];
    $set_id=$_POST['set_id'];
    $prev_color=json_decode($_POST['prev_size']);
    $pid=$_POST['pid'];
    $chk=mysqli_query($con,"SELECT add_type,type FROM `sizemaster` WHERE (aid='$admin_id' OR aid='0') and size_type='$size_type' ORDER BY type DESC LIMIT 1");
    $chk_r=mysqli_fetch_assoc($chk);
    if($chk_r['add_type']==1)
    {
    $type=$chk_r['type']+1;
    }else
    {
    $type=$chk_r['type'];

    }
    $chk2=mysqli_query($con,"SELECT * FROM `sizemaster` WHERE (aid='$admin_id' OR aid='0') and size_type='$size_type' and size_name='$new_size'");
    if(mysqli_num_rows($chk2)>0)
    {
        echo 0;
    }
    else
    {
        $insert=mysqli_query($con,"INSERT INTO `sizemaster`(`aid`, `type`, `size_name`, `qty`, `date`, `status`, `remark`,`size_type`,`add_type`) VALUES ('$admin_id','$type','$new_size','1','$dj','A','','$size_type','2')");
        if($insert)
        {
                $size=mysqli_query($con,"SELECT * FROM `sizemaster` where (aid='$admin_id' or aid='0') and size_type='$size_type' GROUP BY type");
                      echo '<div class="row">
                        <div class="col-md-12">

                
                <div class="row" >
                <div class="col-md-8">
                </div>
                
                <div class="col-md-2">
                <button type="button" class="btn btn-info" onclick="nexttab2(\'v-pills-colour_'.$set_id.'\');">Back</button>

                </div>
                <div class="col-md-2">
                <button type="button" class="btn btn-warning" onclick="info2();nexttab2(\'v-pills-price_'.$set_id.'\');show_temp_table3(\'with_price\',\'myTable3_'.$set_id.'\');">Next</button>
                </div>
                </div><br><div class="row" style="margin-left:10px;">
                      <div class="col-md-12">
                      <div class="row">
                  <div class="col-md-7">
                    <label style="vertical-align: middle;">Minimum Size To Choose By Customer</label>
                  </div>
                  <div class="col-md-3">
                    <input type="number" onkeydown="javascript: return event.keyCode === 8 ||
event.keyCode === 46 ? true : !isNaN(Number(event.key))" id="min_size_'.$set_id.'" class="form-control" oninput="max_color_size(\'size[]\',\'min_size_'.$set_id.'\',\'erro2_'.$set_id.'\')">
                    <p id="erro2_'.$set_id.'" style="color:red;"></p>
                  </div>
                </div>
                
                </div>
                </div><br>
                <div class="row" style="margin-left:10px;">
                <div class="col-md-12">
                <button type="button" class="btn btn-primary" style="cursor:pointer;" onclick="new_size_row(\'new_size'.$set_id.'\')">Add Size &nbsp;<i class="fa fa-plus-circle" ></i></button>
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
                            $item2=mysqli_query($con,"SELECT * FROM `set_details_whole` WHERE pid='$pid' and size='$s_row' and set_id='$set_id'");
                            
                                    echo '
                            
                            <label class="GFG"><input type="checkbox" style="cursor: pointer;" ';if($run['add_type']==1){ echo 'class="OPTION'.$run['type'].'" ';} echo'value="'.$run2['size_name'].'" name="size'.$set_id.'[]" onchange="count_color_size(this.name,\'min_size_'.$set_id.'\');';if($run['add_type']==1){ echo 'size_select('.$run['type'].','.$r.');';} echo '"';if((mysqli_num_rows($item2)>0) or ($new_size==$run2['size_name'])) { echo "checked='checked'";}echo '/>&nbsp;&nbsp;'.$run2['size_name'].'&nbsp;&nbsp;</label>
                                 ';}
                                
                        echo '</div></div>';
                    }
                      echo '</div></div>';
        }else {
            echo mysqli_error($con);
        }
    }
}
elseif($type=='attr')
{
    $main_att=str_replace(' ','_',$_POST['main_att']);
    $variant=str_replace(' ','_',$_POST['variant']);
    $prev_att=json_decode($_POST['prev_att']);

    $category=$_POST['category'];
    $chk=mysqli_query($con,"SELECT * FROM `attributes` where cat_id='$category' and att_id='0' and att_name='$main_att' and (aid='$admin_id' or aid='0')");
    if(mysqli_num_rows($chk)>0)
    {
    $row=mysqli_fetch_assoc($chk);
    $att_id=$row['id'];
    $chk_att=mysqli_query($con,"SELECT * FROM `attributes` WHERE att_id='$att_id' and att_name='$variant' and (aid='$admin_id' or aid='0') ");
    if(mysqli_num_rows($chk_att)>0)
    {
        echo 1;
    }
    else{
    $query=mysqli_query($con,"INSERT INTO `attributes`( `aid`, `cat_id`, `att_name`, `att_id`, `status`, `date`) VALUES ('$admin_id','$category','$variant','$att_id','A','$dj')");
    }
    }else
    {
    $query1=mysqli_query($con,"INSERT INTO `attributes`( `aid`, `cat_id`, `att_name`, `att_id`, `status`, `date`) VALUES ('$admin_id','$category','$main_att','0','A','$dj')");
    $att_id=mysqli_insert_id($con);
    $query=mysqli_query($con,"INSERT INTO `attributes`( `aid`, `cat_id`, `att_name`, `att_id`, `status`, `date`) VALUES ('$admin_id','$category','$variant','$att_id','A','$dj')");


    }
    if($query)
    {

   $cat_id=$category;
    $att_idd=$_POST['att_id'];
    $att=mysqli_query($con,"SELECT * FROM `attributes` WHERE cat_id='$cat_id' and att_id='0' and (aid='$admin_id' or aid='0')");
    while($row=mysqli_fetch_assoc($att))
    {
        $att_id=$row['id'];
        echo '<div class="col-md-12"><div class="row" style="width: 100%">
        <div class="col-md-12">
        <label name="sub_cat[]" value='.str_replace('_', ' ',$row["att_name"]).'>'.str_replace('_', ' ',$row["att_name"]).'</label></div></div>
        <div class="row" style="margin_left:25px;"><br>';
    $att2=mysqli_query($con,"SELECT * FROM `attributes` WHERE cat_id='$cat_id' and att_id='$att_id' and (aid='$admin_id' or aid='0') ORDER by att_name asc");
    while($row2=mysqli_fetch_assoc($att2))
    {
        $aa=$row2["att_name"];
        $ss=$row["att_name"];
            $sub_catt=mysqli_query($con,"SELECT prod_attribute.* FROM `prod_attribute` WHERE prod_attribute.att_id='$att_idd' and prod_attribute.aid='$admin_id' and prod_attribute.attribute='$aa' and prod_attribute.sub_cat='$ss'");

        echo '<div class="col-md-6">
            <label class="GFG">
            <input type="checkbox" class="my_categories" id="att" name="att[]" onclick="temp_att_arr();" value="'.$row2["att_name"].'~'.$row["att_name"].'~'.$row2["id"].'"';for($i=0;$i<sizeof($prev_att);$i++){if((mysqli_num_rows($sub_catt)>0) || ($variant==$aa) || ($prev_att[$i]==$row2["att_name"])){ echo "checked='chekced'";}} echo '>&nbsp;'.str_replace('_', ' ',$row2["att_name"]).'&nbsp;
            </label></div>';
    }
        echo '</div></div>';
    

}
}
    else
    {
        echo mysqli_error($con);
    }
}
elseif ($type=='discount') {
    $from_dt=$_POST['from_dt'];
    $to_dt=$_POST['to_dt'];
    $disc_type=$_POST['disc_type'];
    $disc=$_POST['disc'];
    $disc_name=$_POST['disc_name'];
    $chk=mysqli_query($con,"SELECT * FROM `discount` WHERE aid='$admin_id' and disc_name='$disc_name'");
if(mysqli_num_rows($chk)>0)
{
    echo 0;
}else{
    $query1=mysqli_query($con,"SELECT * FROM `discount` WHERE aid='$admin_id' ORDER BY disc_id DESC LIMIT 1");
    $row1=mysqli_fetch_assoc($query1);
    $disc_id=$row1['disc_id']+1;
    $query=mysqli_query($con,"INSERT INTO `discount`( `disc_id`, `aid`,`disc_name`, `disc_type`, `disc`, `from_dt`, `to_dt`, `status`, `created_on`) VALUES ('$disc_id','$admin_id','$disc_name','$disc_type','$disc','$from_dt','$to_dt','A','$dj')");
    if($query)
    {
        echo '<select class="form-control" id="discount">
                          <option value="00" selected="" disabled="">Select Option</option>';
                          $disc=mysqli_query($con,"SELECT * FROM `discount` WHERE aid='$admin_id' and to_dt>='$today' order by disc_id desc");
                          while($rows1=mysqli_fetch_assoc($disc))
                          {
                            if($rows1['disc_type']=='P')
                                {
                                    $tt='%';
                                }
                                else{
                                    $tt='₹';
                                }
                          echo '<option value="'.$rows1['disc_id'].'"';if($rows1['disc_id']==$disc_id){echo 'selected="selected"';} echo '>'.$rows1['disc_name'].' ('.$rows1['disc'].' '.$tt.')</option>';
                        }
                        echo '</select>';
    }
    else
    {
        echo mysqli_error($con);
    }
}
}

?>