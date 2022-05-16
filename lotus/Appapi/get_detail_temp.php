<?php 
include('db.php');
date_default_timezone_set('Asia/Kolkata');
$dj = date("Y-m-d H:i:s");
$today=date('Y-m-d');
if ($_SERVER['REQUEST_METHOD'] == "POST"){

$admin_id=$con->real_escape_string($_POST['admin_id']);
$cat_id=$con->real_escape_string($_POST['cat_id']);
$type_t=$_POST['type'];
if($type_t=="d")
{
$query=mysqli_query($con,"SELECT id,brand,product.cat_id FROM `product` WHERE aid='$admin_id' and product.id IN(SELECT pid from discount WHERE aid='$admin_id' and discount.from_dt<='$today' and discount.to_dt>='$today') GROUP BY brand");
$query2=mysqli_query($con,"SELECT set_details.set_id,set_details.size,set_details.id,product.aid as cat_id  FROM `set_details` LEFT JOIN product ON product.set_id=set_details.set_id WHERE  product.id IN(SELECT pid from discount WHERE aid='$admin_id' and discount.from_dt<='$today' and discount.to_dt>='$today') and set_details.aid='$admin_id' GROUP by product.cat_id,set_details.size ORDER BY set_details.size ASC ");
$query3=mysqli_query($con,"SELECT set_details.set_id,set_details.color,set_details.id,product.aid as cat_id FROM `set_details` LEFT JOIN product ON product.set_id=set_details.set_id WHERE  product.id IN(SELECT pid from discount WHERE aid='$admin_id' and discount.from_dt<='$today' and discount.to_dt>='$today') and set_details.aid='$admin_id' GROUP by product.cat_id,set_details.color ORDER BY set_details.color ASC ");
$query4=mysqli_query($con,"SELECT prod_attribute.sub_cat as Main_att,prod_attribute.attribute as Sub_att,prod_attribute.id,product.aid as cat_id  FROM `prod_attribute`  LEFT JOIN product ON product.att_id=prod_attribute.att_id WHERE  prod_attribute.sub_cat='FABRIC' and prod_attribute.aid='$admin_id' AND product.id IN (SELECT pid from discount WHERE aid='$admin_id' and discount.from_dt<='$today' and discount.to_dt>='$today') GROUP BY prod_attribute.attribute");
$query5=mysqli_query($con,"SELECT prod_attribute.sub_cat as Main_att,prod_attribute.attribute as Sub_att,prod_attribute.id,product.aid as cat_id  FROM `prod_attribute`  LEFT JOIN product ON product.att_id=prod_attribute.att_id WHERE  prod_attribute.sub_cat='PATTERN' and prod_attribute.aid='$admin_id' AND product.id IN (SELECT pid from discount WHERE aid='$admin_id' and discount.from_dt <='$today' and discount.to_dt>='$today') GROUP BY prod_attribute.attribute");
$query6=mysqli_query($con,"SELECT prod_attribute.sub_cat as Main_att,prod_attribute.attribute as Sub_att,prod_attribute.id,product.aid as cat_id  FROM `prod_attribute`  LEFT JOIN product ON product.att_id=prod_attribute.att_id WHERE  prod_attribute.sub_cat='OCCASION' and prod_attribute.aid='$admin_id' AND product.id IN (SELECT pid from discount WHERE aid='$admin_id' and discount.from_dt<='$today' and discount.to_dt>='$today') GROUP BY prod_attribute.attribute");
$query7=mysqli_query($con,"SELECT prod_attribute.sub_cat as Main_att,prod_attribute.attribute as Sub_att,prod_attribute.id,product.aid as cat_id  FROM `prod_attribute`  LEFT JOIN product ON product.att_id=prod_attribute.att_id WHERE  prod_attribute.sub_cat='TYPE' and prod_attribute.aid='$admin_id' AND product.id IN (SELECT pid from discount WHERE aid='$admin_id' and discount.from_dt<='$today' and discount.to_dt>='$today') GROUP BY prod_attribute.attribute");
$query8=mysqli_query($con,"SELECT prod_attribute.sub_cat as Main_att,prod_attribute.attribute as Sub_att,prod_attribute.id,product.aid as cat_id  FROM `prod_attribute`  LEFT JOIN product ON product.att_id=prod_attribute.att_id WHERE  prod_attribute.sub_cat='SLEEVES' and prod_attribute.aid='$admin_id' AND product.id IN (SELECT pid from discount WHERE aid='$admin_id' and discount.from_dt<='$today' and discount.to_dt>='$today') GROUP BY prod_attribute.attribute");
$query9=mysqli_query($con,"SELECT category.id,category.title FROM `category` LEFT JOIN product ON product.cat_id=category.id WHERE category.aid='$admin_id' and product.id IN(SELECT pid from discount WHERE aid='$admin_id' and discount.from_dt<='$today' and discount.to_dt>='$today') GROUP by category.title");
$query10=mysqli_query($con,"SELECT * FROM `discount` WHERE aid='$admin_id' and discount.from_dt<='$today' and discount.to_dt>='$today' GROUP BY disc_id");

}
else{
$query=mysqli_query($con,"SELECT id,brand,product.cat_id FROM `product` WHERE aid='$admin_id' and product.status='A' GROUP BY brand");

$query2=mysqli_query($con,"SELECT set_details.set_id,set_details.size,set_details.id,product.cat_id FROM `set_details` LEFT JOIN product ON product.set_id=set_details.set_id WHERE set_details.aid='$admin_id' and product.status='A' GROUP by product.cat_id,set_details.size ORDER BY set_details.size ASC ");
$query3=mysqli_query($con,"SELECT set_details.set_id,set_details.color,set_details.id,product.cat_id FROM `set_details` LEFT JOIN product ON product.set_id=set_details.set_id WHERE set_details.aid='$admin_id' and product.status='A' GROUP by product.cat_id,set_details.color ORDER BY set_details.color ASC ");
$query4=mysqli_query($con,"SELECT prod_attribute.sub_cat as Main_att,prod_attribute.attribute as Sub_att,prod_attribute.id,category.id as cat_id FROM `prod_attribute` LEFT JOIN category ON category.title=prod_attribute.cat_id  WHERE  prod_attribute.sub_cat='FABRIC' and prod_attribute.aid='$admin_id' AND prod_attribute.att_id IN (SELECT att_id FROM product WHERE product.att_id=prod_attribute.att_id and product.status='A') GROUP BY prod_attribute.attribute");
$query5=mysqli_query($con,"SELECT prod_attribute.sub_cat as Main_att,prod_attribute.attribute as Sub_att,prod_attribute.id,category.id as cat_id FROM `prod_attribute` LEFT JOIN category ON category.title=prod_attribute.cat_id  WHERE  prod_attribute.sub_cat='PATTERN' and prod_attribute.aid='$admin_id' AND prod_attribute.att_id IN (SELECT att_id FROM product WHERE product.att_id=prod_attribute.att_id and product.status='A' and product.aid='$admin_id') and category.aid='$admin_id' GROUP BY prod_attribute.attribute");
$query6=mysqli_query($con,"SELECT prod_attribute.sub_cat as Main_att,prod_attribute.attribute as Sub_att,prod_attribute.id,category.id as cat_id FROM `prod_attribute` LEFT JOIN category ON category.title=prod_attribute.cat_id WHERE  prod_attribute.sub_cat='OCCASION' and prod_attribute.aid='$admin_id' AND prod_attribute.att_id IN (SELECT att_id FROM product WHERE product.att_id=prod_attribute.att_id and product.status='A' and product.aid='$admin_id') and category.aid='$admin_id' GROUP BY prod_attribute.attribute");

$query7=mysqli_query($con,"SELECT prod_attribute.sub_cat as Main_att,prod_attribute.attribute as Sub_att,prod_attribute.id,category.id as cat_id FROM `prod_attribute` LEFT JOIN category ON category.title=prod_attribute.cat_id WHERE  prod_attribute.sub_cat='TYPE' and prod_attribute.aid='$admin_id' AND prod_attribute.att_id IN (SELECT att_id FROM product WHERE product.att_id=prod_attribute.att_id and product.status='A' and product.aid='$admin_id') and category.aid='$admin_id' GROUP BY prod_attribute.attribute");

$query8=mysqli_query($con,"SELECT prod_attribute.sub_cat as Main_att,prod_attribute.attribute as Sub_att,prod_attribute.id,category.id as cat_id FROM `prod_attribute` LEFT JOIN category ON category.title=prod_attribute.cat_id WHERE  prod_attribute.sub_cat='SLEEVES' and prod_attribute.aid='$admin_id' AND prod_attribute.att_id IN (SELECT att_id FROM product WHERE product.att_id=prod_attribute.att_id and product.status='A' and product.aid='$admin_id') and category.aid='$admin_id' GROUP BY prod_attribute.attribute");

}
    while($run = mysqli_fetch_assoc($query))
    {
    $brand[] =$run;
    }

    while ($row=mysqli_fetch_assoc($query2))
    {
      $size[]=$row;  
    }

    while ($row=mysqli_fetch_assoc($query3))
    {
      $color[]=array("c_id"=>$row['id'],
      				"cat_id"=>$row['cat_id'],
                    "set_id"=>$row['set_id'],
                    "color"=>str_replace('_',' ',$row['color']));  
    }
    while ($row=mysqli_fetch_assoc($query4))
    {
      $fabric[]=array("f_id"=>$row['id'],
      	      		"cat_id"=>$row['cat_id'],
                    'Main_att'=>$row['Main_att'],
                    'Sub_att'=>str_replace('_',' ',$row['Sub_att']));  
    }
    while ($row=mysqli_fetch_assoc($query5))
    {
      $pattern[]=array("p_id"=>$row['id'], 
        			"cat_id"=>$row['cat_id'],
                    'Main_att'=>$row['Main_att'],
                    'Sub_att'=>str_replace('_',' ',$row['Sub_att']));  
    }
    while ($row=mysqli_fetch_assoc($query6))
    {
      $occasion[]=array("o_id"=>$row['id'],
   	      				"cat_id"=>$row['cat_id'],
                        'Main_att'=>$row['Main_att'],
                    'Sub_att'=>str_replace('_',' ',$row['Sub_att']));  
    }
     while ($row=mysqli_fetch_assoc($query7))
    {
      $type[]=array("t_id"=>$row['id'],
      				"cat_id"=>$row['cat_id'],
                    'Main_att'=>$row['Main_att'],
                    'Sub_att'=>str_replace('_',' ',$row['Sub_att']));  
    }
     while ($row=mysqli_fetch_assoc($query8))
    {
      $sleeve[]=array("s_id"=>$row['id'],
  	      				"cat_id"=>$row['cat_id'],
                    'Main_att'=>$row['Main_att'],
                    'Sub_att'=>str_replace('_',' ',$row['Sub_att']));  
    }
     while($row=mysqli_fetch_assoc($query9))
    {
      $category[]=$row;  
    }
    while($row=mysqli_fetch_assoc($query10))
    {
      $disc[]=$row;  
    }



// if(is_null($brand))
// {
//    $json = array(
//       "status"=>false,
//       "brand"=>$brand,
//       "size"=>$size,
//       "color"=>$color,
//       "fabric"=>$fabric,
//       "pattern"=>$pattern,
//       "occasion"=>$occasion
//       "msg"=>"No Record"
//   );

// }else{
  $json = array(
      "status"=>true,
       "brand"=>($brand == null)?[]:$brand,
      "size"=>($size == null)?[]:$size,
      "color"=>($color == null)?[]:$color,
      "fabric"=>($fabric == null)?[]:$fabric,
      "pattern"=>($pattern==null)?[]:$pattern,
      "occasion"=>($occasion == null)?[]:$occasion,
      "type"=>($type == null)?[]:$type,
      "sleeve"=>($sleeve == null)?[]:$sleeve,
      "category"=>($category == null)?[]:$category,
      "discount"=>($disc == null)?[]:$disc,
      "msg"=>"Success"
  );
// }
    header('Content-Type: application/json');
    echo json_encode($json);
}
?>
