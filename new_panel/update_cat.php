<?php
include('include/db.php');
$type=$_POST['type'];
$today=date('Y-m-d'); 
if($type=='subcat')
{
if($_POST['cat_id']!="")
{
	$cat_id=$_POST['cat_id'];
	echo '<select class="form-control" name="category" id="sub_category" >
                        	<option value="00" disabled="">Select Sub Category</option>';
                        	$cat=mysqli_query($con,"SELECT * FROM `category` WHERE aid='$admin_id' and parent_id='$cat_id'");
                        	if(mysqli_num_rows($cat)>0)
                        	{
                        	while($row2=mysqli_fetch_assoc($cat))
                        	{
                        	echo '<option value='.$row2['id'].'>'.$row2['title'].'</option>';
                        }
                    }else
                    {
                        	echo '<option value="00" selected="selected">No Category</option>';

                    }
                        echo '</select>';
}
}
elseif($type=='cat'){
 echo '<select class="form-control" name="category" id="category" onchange="show_att(this.value)">
                        	<option value="00" disabled="">Select Category</option>';
                        	$cat=mysqli_query($con,"SELECT * FROM `category` WHERE aid='$admin_id' and parent_id='0'");
                        	while($row2=mysqli_fetch_assoc($cat))
                        	{
                        	echo '<option value='.$row2['id'].'>'.$row2['title'].'</option>';
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
    $chk=mysqli_query($con,"SELECT add_type,type FROM `sizemaster` WHERE aid='$admin_id' and size_type='$size_type' ORDER BY type DESC LIMIT 1");
    $chk_r=mysqli_fetch_assoc($chk);
    if($chk_r['add_type']==1)
    {
    $type=$chk_r['type']+1;
    }else
    {
    $type=$chk_r['type'];

    }
    $chk2=mysqli_query($con,"SELECT * FROM `sizemaster` WHERE aid='$admin_id' and size_type='$size_type' and size_name='$new_size'");
    if(mysqli_num_rows($chk2)>0)
    {
        echo 0;
    }
    else
    {
        $insert=mysqli_query($con,"INSERT INTO `sizemaster`(`aid`, `type`, `size_name`, `qty`, `date`, `status`, `remark`,`size_type`,`add_type`) VALUES ('$admin_id','$type','$new_size','1','$dj','A','','$size_type','2')");
        if($insert)
        {
                $size=mysqli_query($con,"SELECT * FROM `sizemaster` where aid='$admin_id' and size_type='$size_type' GROUP BY type");
                      echo '<div class="row">
                        <div class="col-md-12">

                
                <div class="row" >
                <div class="col-md-8">
                </div>
                
                <div class="col-md-2">
                <button type="button" class="btn btn-info" onclick="nexttab(\'v-pills-colour\');">Back</button>

                </div>
                <div class="col-md-2">
                <button type="button" class="btn btn-success" onclick="info2();nexttab(\'v-pills-price\');show_temp_table(\'with_price\',\'myTable3\');">Next</button>
                </div>
                </div><br><div class="row" style="margin-left:10px;">
                      <div class="col-md-12">
                      <div class="row">
                  <div class="col-md-7">
                    <label style="vertical-align: middle;">Minimum Size To Choose By Customer</label>
                  </div>
                  <div class="col-md-3">
                    <input type="number" id="min_size" class="form-control" oninput="max_color_size(\'size[]\',\'min_size\',\'erro2\')">
                    <p id="erro2" style="color:red;"></p>
                  </div>
                </div>
                
                </div>
                </div><br>
                <div class="row" style="margin-left:10px;">
                <div class="col-md-12">
                <button type="button" class="btn btn-primary">Add Size &nbsp;<i class="fa fa-plus-circle" style="cursor:pointer" onclick="new_size_row(\'new_size\')"></i></button>
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
                            
                            <label class="GFG"><input type="checkbox" style="cursor: pointer;" class="OPTION'.$run['type'].'" value="'.$run2['size_name'].'" name="size[]" onchange="count_color_size(this.name,\'min_size\');size_select('.$run['type'].','.$r.')"';if($new_size==$run2['size_name']) { echo "checked='checked'";}echo '/>&nbsp;&nbsp;'.$run2['size_name'].'&nbsp;&nbsp;</label>
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
    $category=$_POST['category'];
    $chk=mysqli_query($con,"SELECT * FROM `attributes` where cat_id='$category' and att_id='0' and att_name='$main_att' and aid='$admin_id'");
    if(mysqli_num_rows($chk)>0)
    {
    $row=mysqli_fetch_assoc($chk);
    $att_id=$row['id'];
    $chk_att=mysqli_query($con,"SELECT * FROM `attributes` WHERE att_id='$att_id' and att_name='$variant' and aid='$admin_id' ");
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

    $att=mysqli_query($con,"SELECT * FROM `attributes` WHERE cat_id='$cat_id' and att_id='0'");
    while($row=mysqli_fetch_assoc($att))
    {
        $att_id=$row['id'];
        echo '<div class="col-md-12"><div class="row" style="width: 100%">
        <div class="col-md-12">
        <label name="sub_cat[]" value='.str_replace('_', ' ',$row["att_name"]).'>'.str_replace('_', ' ',$row["att_name"]).'</label></div></div>
        <div class="row" style="margin_left:25px;"><br>';
    $att2=mysqli_query($con,"SELECT * FROM `attributes` WHERE cat_id='$cat_id' and att_id='$att_id' ORDER by att_name asc");
    while($row2=mysqli_fetch_assoc($att2))
    {
         $sub_att=$row['att_name'];
         $att_name=$row2['att_name'];
         $f_cat=mysqli_query($con,"SELECT title FROM `category` WHERE id='$cat_id' and aid='$admin_id'");
         $f_row=mysqli_fetch_assoc($f_cat);
         $Matt_name=$f_row['title'];

      $att3=mysqli_query($con,"SELECT * FROM `prod_attribute` WHERE  cat_id='$Matt_name' AND sub_cat='$sub_att' and attribute='$att_name'");
        echo '<div class="col-md-6">
            <label class="GFG">';
      // if(mysqli_num_rows($att3)>0)
      // {
      //   echo ' <input type="checkbox" class="my_categories" id="att" name="att[]" value="'.$row2["att_name"].'~'.$row["att_name"].'~'.$row2["id"].'" checked="checked">&nbsp;'.str_replace('_', ' ',$row2["att_name"]).'&nbsp;';
      // }else
      // {
        echo ' <input type="checkbox" class="my_categories" id="att" name="att[]" value="'.$row2["att_name"].'~'.$row["att_name"].'~'.$row2["id"].'"';
        if(mysqli_num_rows($att3)>0)
        {
            echo "checked='checked'";
        }
        echo '>&nbsp;'.str_replace('_', ' ',$row2["att_name"]).'&nbsp;';
      // }
           
            echo '</label></div>';
    }
        echo '</div></div>';
    

}
}
    else
    {
        echo mysqli_error($con);
    }
}elseif ($type=='discount') {
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
                          echo '<option value="'.$rows1['disc_id'].'">'.$rows1['disc_name'].' ('.$rows1['disc'].' '.$tt.')</option>';
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