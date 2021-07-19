<?php
include('include/db.php');
$type= $_POST["type"];
$val= $_POST["val"];
$cat_id= $_POST["cat_id"];

if($type=="variant")
{
     $query=mysqli_query($con,"SELECT id FROM `attributes` WHERE att_id='0' and (aid='$admin_id' or aid='0') and att_name='$val' and cat_id='$cat_id'");
     while ($row=mysqli_fetch_assoc($query)) {
     	$att_id=$row['id'];
     $query1=mysqli_query($con,"SELECT DISTINCT(att_name) FROM `attributes` WHERE att_id='$att_id' and  (aid='$admin_id' or aid='0') and cat_id='$cat_id'");
     while($row1=mysqli_fetch_assoc($query1))
     {
     	$att=$row1['att_name'];
     	// $sub_cat=$row['att_name'];
     	$chk=mysqli_query($con,"SELECT prod_attribute.* FROM `prod_attribute` LEFT JOIN category on category.title=prod_attribute.cat_id WHERE prod_attribute.aid='$admin_id' and prod_attribute.attribute='$att' and prod_attribute.sub_cat='$val' and category.id='$cat_id'");
     	if(mysqli_num_rows($chk)>0)
     	{

     	}else{
     echo '<option>'.str_replace('_',' ',$row1['att_name']).'</option>';
 		}
     }
 	}
 	// echo $options;
}elseif($type=="subcat")
{
    $query=mysqli_query($con,"SELECT id,title,img FROM `category` WHERE parent_id='0' and (aid='$admin_id' or aid='0') and title='$val'");
     while ($row=mysqli_fetch_assoc($query)) {
     	$parent_id=$row['id'];
     $query1=mysqli_query($con,"SELECT title,img FROM `category` WHERE (parent_id='$parent_id' and parent_id!='0') and aid='$admin_id'");
     while($row1=mysqli_fetch_assoc($query1))
     {
     	
     echo '<option style="cursor: pointer;" id="'.$row1['img'].'" value="'.$row1['title'].'">'.$row1['title'].'</option>';
 		
     }
 	}
 	// echo $options;
}
// if($type=='new_size')
// {
//     $new_size=$_POST['new_size'];
//     $size_type=$_POST['size_type'];
//     $tb=$_POST['tb'];
//     $set_id=$_POST['set_id'];

//     $chk=mysqli_query($con,"SELECT add_type,type FROM `sizemaster` WHERE (aid='$admin_id' OR aid='0') and size_type='$size_type' ORDER BY type DESC LIMIT 1");
//     $chk_r=mysqli_fetch_assoc($chk);
//     if($chk_r['add_type']==1)
//     {
//     $type=$chk_r['type']+1;
//     }else
//     {
//     $type=$chk_r['type'];

//     }
//     $chk2=mysqli_query($con,"SELECT * FROM `sizemaster` WHERE (aid='$admin_id' or aid='0') and size_type='$size_type' and size_name='$new_size'");
//     if(mysqli_num_rows($chk2)>0)
//     {
//         echo 0;
//     }
//     else
//     {
//         $insert=mysqli_query($con,"INSERT INTO `sizemaster`(`aid`, `type`, `size_name`, `qty`, `date`, `status`, `remark`,`size_type`,`add_type`) VALUES ('$admin_id','$type','$new_size','1','$dj','A','','$size_type','2')");
//         if($insert)
//         {
//                 $size=mysqli_query($con,"SELECT * FROM `sizemaster` where (aid='$admin_id' or aid='0') and size_type='$size_type' and type!='3' and type!='5' GROUP BY type");
//                   echo '<div class="row">
//                     <div class="col-md-12">

            
//             <div class="row">
//             <div class="col-md-7"></div>
//             <div class="col-md-2">
//             <button type="button" class="btn btn-info" onclick="nexttab2(\'v-pills-colour_'.$set_id.'\');">Back</button>
//             </div>
//             <div class="col-md-2" >
//             <button type="button" class="btn btn-warning" onclick="info2();nexttab2(\'v-pills-price_'.$set_id.'\');show_temp_table3(\'with_price\',\'myTable3_'.$set_id.'\');">Next</button>
//             </div>
            
//             </div>
//              <div class="row" style="margin-left:10px;margin-top:5px;">
//             <div class="col-md-12">
//             <input type="search" class="form-control" onkeyup="myFunction3(\'Search2'.$set_id.'\',\'target2'.$set_id.'\')" id="Search2'.$set_id.'" placeholder="Search for Size..." data-clear-btn="true">
//             </div>
//             </div>
//             <div class="row" style="margin-left:10px;margin-top:5px;">
              
//             </div>
//             <div class="row" style="margin-left:10px;">
//             <div class="col-md-12">
//             <button type="button" class="btn btn-primary" onclick="new_size_row(\'new_size\')">Add Size &nbsp;<i class="fa fa-plus-circle" style="cursor:pointer" ></i></button>
//             </div></div>
//             <div class="row" id="new_size" style="margin-left:10px;display:none;">
//             <div class="col-md-2">
//             <label>New Size</label>
//             </div>
//             <div class="col-md-3">
//             <input type="text" class="form-control" id="new_size_">
//             </div>
//             <div class="col-md-7">
//              <input type="button" class="btn btn-success" onclick="new_size_row2(\'new_size_\',\'none\',\'size_'.$set_id.'\',\'_'.$set_id.'\')" value="Save">
//               <input type="button" class="btn btn-secondary"onclick="" value="Cancel">
//             </div>
//             </div>';
//                     $r=mysqli_num_rows($size);
//                     while($run=mysqli_fetch_assoc($size))
//                     {
//                     $sno++;
                    
//                     echo '
//                     <div class="row" style="margin-left:10px;">
//                     <div class="col-md-12" >
//                         <br><label class="GFG">
//                     <input type="radio" name="sz" style="cursor: pointer;" onchange="size_select('.$run['type'].','.$r.')" value="'.$run['type'].'">
//                     &nbsp;&nbsp;OPTION&nbsp;'.$sno.'
//                     </label>&nbsp;</div></div>
                    
//                     <div class="row" style="margin-left:10px;">
//                     <div class="col-md-12" >';
//                             $type=$run['type'];
//                              $s_size=mysqli_query($con,"SELECT * FROM `sizemaster` where (aid='$admin_id' or aid='0') and type='$type' and size_type='$size_type'");
//                              while ($run2=mysqli_fetch_assoc($s_size)) {
//                                 $s_row=$run2["size_name"];
//                         // $set_id=$_POST['set_id'];
//                         $item2=mysqli_query($con,"SELECT * FROM `set_details_whole` WHERE aid='$admin_id' and set_id='$set_id' and size='$s_row'");
                        
//                                 echo '
//                         <label class="GFG target2'.$set_id.'"><input type="checkbox" style="cursor: pointer;" class="OPTION'.$run['type'].'" value="'.$run2['size_name'].'" name="size[]" onchange="size_select('.$run['type'].','.$r.');count_color_size(this.name,\'min_size_'.$set_id.'\');"';if(mysqli_num_rows($item2)>0){echo "checked='checked'";}echo '/>&nbsp;&nbsp;'.$run2['size_name'].'&nbsp;&nbsp;</label>
//                              ';}
                            
//                     echo '</div></div>';
//                 }
//                   echo '</div></div>';
//         }else {
//             echo mysqli_error($con);
//         }
//     }
// }
// $cat_name=$_POST['cat_name'];
// $query1=mysqli_query($con,"SELECT id FROM `category` WHERE parent_id='0' and (aid='$admin_id' or aid='0')");
// $row1=mysqli_fetch_assoc($query1);
// $cat_id=$row1['id'];
// // echo '<datalist id="sub_cats">';
//             $query=mysqli_query($con,"SELECT title FROM `category` WHERE parent_id='$cat_id' and (aid='$admin_id' or aid='0')");

//               while ($row3=mysqli_fetch_assoc($query)) {
//               // echo '<option style="cursor: pointer;" id="'.$row3['img'].'" value="'.$row3['title'].'">'.$row3['title'].'</option>';
//                 $data[]=$row3;
//               }
//               echo $data;
      // echo '</datalist>';
?>