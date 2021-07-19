<?php
include('include/db.php');

$type=$_POST['type'];
if($type=="copy"){
$disc_id=$_POST['disc_id'];

// $item=$_POST['item'];
$disc=$_POST['disc'];
$disc_name=$_POST['disc_name'];
$del=mysqli_query($con,"SELECT * FROM `discount` WHERE disc_name='$disc_name'");
if(mysqli_num_rows($del)>0)
{
echo 2;
}else{
$disc_id=$_POST['disc_id'];

// $disc=$_POST['disc'];
// $disc_name=$_POST['disc_name'];
$admin_id=$_POST['admin_id'];
$disc_type=$_POST['disc_type'];
$to_dt=$_POST['to_dt'];
$from_dt=$_POST['from_dt'];
$tid=$_SESSION['t_id'];
// $split=explode('~', $prod);



// if($chk_count>0){
			$verify=mysqli_query($con,"SELECT * FROM `disc_tran` WHERE aid='$admin_id' and t_id='$tid'");
			if(mysqli_num_rows($verify)>0)
			{
				$disc_chk=mysqli_query($con,"SELECT * FROM `discount` order by disc_id desc limit 1");
$d_row=mysqli_fetch_assoc($disc_chk);
$disc_row=$d_row['disc_id']+1;

// -- $del=mysqli_query($con,"DELETE FROM `discount` WHERE disc_id='$disc_id'");

while($row=mysqli_fetch_assoc($verify))
{
$item=$row['prod'];
$cat=$row['cat'];
$insert=mysqli_query($con,"INSERT INTO `discount`(`disc_id`,`aid`,`pid`, `disc_name`, `disc_type`, `disc`, `from_dt`, `to_dt`, `status`, `created_on`,`cid`) VALUES ('$disc_row','$admin_id','$item','$disc_name','$disc_type','$disc','$from_dt','$to_dt','A','$dj','$cat')");

}

}else{
	$insert=mysqli_query($con,"UPDATE `discount` SET `disc_name`='$disc_name',`disc_type`='$disc_type',`disc`='$disc',`from_dt`='$from_dt',`to_dt`='$to_dt' WHERE disc_id='$disc_id'");

}

if($insert){
	$query=mysqli_query($con,"DELETE FROM `disc_tran` WHERE t_id='$tid'");

unset($_SESSION['t_id']);
	echo 0;
}else{
	echo mysqli_error($con);
}

}
}
if($type=="update"){
$disc_id=$_POST['disc_id'];

$disc=$_POST['disc'];
$disc_name=$_POST['disc_name'];
$admin_id=$_POST['admin_id'];
$disc_type=$_POST['disc_type'];
$to_dt=$_POST['to_dt'];
$from_dt=$_POST['from_dt'];
$tid=$_SESSION['t_id'];
// $split=explode('~', $prod);



// if($chk_count>0){
			$verify=mysqli_query($con,"SELECT * FROM `disc_tran` WHERE aid='$admin_id' and t_id='$tid'");
			if(mysqli_num_rows($verify)>0)
			{
				$disc_chk=mysqli_query($con,"SELECT * FROM `discount` order by disc_id desc limit 1");
$d_row=mysqli_fetch_assoc($disc_chk);
$disc_row=$d_row['disc_id']+1;

$del=mysqli_query($con,"DELETE FROM `discount` WHERE disc_id='$disc_id'");

while($row=mysqli_fetch_assoc($verify))
{
$item=$row['prod'];
$cat=$row['cat'];
$find_data = mysqli_query($con,"SELECT * FROM product WHERE id = '$item'");
	$getD = mysqli_fetch_assoc($find_data);
	$item_name= $getD['item_name'];

	$check1 = mysqli_query($con,"SELECT * FROM discount WHERE ((from_dt <= '$from_dt' AND to_dt >= '$from_dt') OR (from_dt <= '$to_dt' AND to_dt >= '$to_dt')) and pid = '$item'");
	$count_chk = mysqli_num_rows($check1);
	$count=$count+$count_chk;
	if($count>0)
	{
		$item_d=$item_name;
		goto a1;
	}
	}
if($count==0)
{
			$verify=mysqli_query($con,"SELECT * FROM `disc_tran` WHERE aid='$admin_id' and t_id='$tid'");

while($row=mysqli_fetch_assoc($verify))
	{
	$item=$row['prod'];
	$cat=$row['cat'];
$insert=mysqli_query($con,"INSERT INTO `discount`(`disc_id`,`aid`,`pid`, `disc_name`, `disc_type`, `disc`, `from_dt`, `to_dt`, `status`, `created_on`,`cid`) VALUES ('$disc_row','$admin_id','$item','$disc_name','$disc_type','$disc','$from_dt','$to_dt','A','$dj','$cat')");
}

}


}else{
	$insert=mysqli_query($con,"UPDATE `discount` SET `disc_name`='$disc_name',`disc_type`='$disc_type',`disc`='$disc',`from_dt`='$from_dt',`to_dt`='$to_dt' WHERE disc_id='$disc_id'");

}

if($insert){
	$query=mysqli_query($con,"DELETE FROM `disc_tran` WHERE t_id='$tid'");

unset($_SESSION['t_id']);
	echo 0;
}else{
	echo 1;
}
a1:if($count>0){
	echo $item_d;
}

}
if($type=="saveadd"){

// $prod=$_POST['item'];
$disc=$_POST['disc'];
$disc_name=$_POST['disc_name'];
$admin_id=$_POST['admin_id'];
$disc_type=$_POST['disc_type'];
$to_dt=$_POST['to_dt'];
$from_dt=$_POST['from_dt'];
$tid=$_SESSION['t_id'];
// $split=explode('~', $prod);
$disc_chk=mysqli_query($con,"SELECT * FROM `discount` order by disc_id desc limit 1");
$d_row=mysqli_fetch_assoc($disc_chk);
$disc_row=$d_row['disc_id']+1;


// if($chk_count>0){
$verify=mysqli_query($con,"SELECT * FROM `disc_tran` WHERE aid='$admin_id' and t_id='$tid'");
while($row=mysqli_fetch_assoc($verify))
	{
	$item=$row['prod'];
	$cat=$row['cat'];

	$find_data = mysqli_query($con,"SELECT * FROM product WHERE id = '$item'");
	$getD = mysqli_fetch_assoc($find_data);
	$item_name= $getD['item_name'];

	$check1 = mysqli_query($con,"SELECT * FROM discount WHERE ((from_dt <= '$from_dt' AND to_dt >= '$from_dt') OR (from_dt <= '$to_dt' AND to_dt >= '$to_dt')) and pid = '$item'");
	$count_chk = mysqli_num_rows($check1);
	$count=$count+$count_chk;
	if($count>0)
	{
		$item_d=$item_name;
		goto a;
	}
}
if($count==0)
{
	$verify=mysqli_query($con,"SELECT * FROM `disc_tran` WHERE aid='$admin_id' and t_id='$tid'");

while($row=mysqli_fetch_assoc($verify))
	{
	$item=$row['prod'];
	$cat=$row['cat'];
	$insert=mysqli_query($con,"INSERT INTO `discount`(`disc_id`,`aid`,`pid`, `disc_name`, `disc_type`, `disc`, `from_dt`, `to_dt`, `status`, `created_on`,`cid`) VALUES ('$disc_row','$admin_id','$item','$disc_name','$disc_type','$disc','$from_dt','$to_dt','A','$dj','$cat')");

	}
}

// a:if($count==0){
if($insert){
	echo 0;
	$query=mysqli_query($con,"DELETE FROM `disc_tran` WHERE t_id='$tid'");
unset($_SESSION['t_id']);

}else{
	echo 1;
}
// }
a:if($count>0){
	echo $item_d;
}
}

if($type=="deldata"){

	$del = $_POST['e1'];
	$delete = mysqli_query($con,"DELETE FROM `discount` WHERE `pname` = '$del'");

	if($delete){
		echo "Success";
	}
	else{
		echo mysqli_error($con);
	}
}
if($_POST['type']=="att")
{
$att=$_POST['att'];
$new_att=json_decode($att);
$length_att= sizeof($new_att);
// $cat_id=$_POST['cat_id'];
$admin=$_POST['admin'];

$trans_id=$_SESSION['t_id'];
mysqli_query($con,"DELETE FROM `disc_tran` WHERE t_id='$trans_id'");
		for ($i=0; $i <$length_att ; $i++) { 
			$split=explode('~', $new_att[$i]);
			$verify=mysqli_query($con,"SELECT * FROM `disc_tran` WHERE aid='$admin' and cat='$split[0]' and prod='$split[1]'");

			if($prev==$split[0])
			{
			// echo $split[1].',';
			if(mysqli_num_rows($verify)<1)
			{
			$insert1=mysqli_query($con,"INSERT INTO `disc_tran`(`aid`, `t_id`, `cat`, `prod`,`date`) VALUES ('$admin','$trans_id','$split[0]','$split[1]','$dj')");
		}
			echo mysqli_error($con);

			}else{
			// echo '<br><b>'.$split[0].'-></b>'.$split[1].',';
			if(mysqli_num_rows($verify)<1)
			{
			$insert1=mysqli_query($con,"INSERT INTO `disc_tran`(`aid`, `t_id`, `cat`, `prod`,`date`) VALUES ('$admin','$trans_id','$split[0]','$split[1]','$dj')");
			}
			$prev=$split[0];
			echo mysqli_error($con);

		}
		
}
$verify2=mysqli_query($con,"SELECT category.title as cat,product.item_name as prod,product.id as pid,product.cat_id as cid FROM `disc_tran` LEFT JOIN category on category.id=disc_tran.cat LEFT JOIN product on product.id=disc_tran.prod WHERE disc_tran.aid='$admin' and disc_tran.t_id='$trans_id' order by disc_tran.cat asc");
echo '<div class="col-md-12" style="width:100%;"><div class="row" style="border:1px solid black;"><table class="table table-bordered table-responsive" style="border-collapse: collapse;">
	<thead><tr><th>Category</th><th colspan="20">Products</th>
	';
		while($row=mysqli_fetch_assoc($verify2))
		{
			if($row['cat']==$prev2)
			{
			echo '<td>'.$row["prod"].'&nbsp;<i class="fa fa-trash" style="cursor:pointer;" onclick="delete2('.$row["pid"].','.$row["cid"].')"></i></td>';

			}else{
			echo '<tr style="border-top:1px solid lightgrey;text-align:center;vertical-align:middle;"><th>'.$row["cat"].'</th><td>'.$row["prod"].'&nbsp;<i class="fa fa-trash" style="cursor:pointer;" onclick="delete2('.$row["pid"].','.$row["cid"].')"></i></td>';
			$prev2=$row["cat"];
		}
		}

		// }
		echo'</tr></thead></table></div></div>';
}
if($_POST['type']=="att2")
{
$item=$_POST['item'];
$split=explode('~', $item);
$cat_id=$split[0];

$admin=$_POST['admin'];

$trans_id=$_SESSION['t_id'];
echo '<div class="col-md-12" style="width:100%;"><div class="row" style="border:1px solid black;"><table class="table table-bordered table-responsive" style="border-collapse: collapse;">
	<thead><tr><th>Category</th><th colspan="20">Products</th>
	';
			$verify=mysqli_query($con,"SELECT * FROM `disc_tran` WHERE aid='$admin' and cat='$cat_id' and prod='$split[1]'");
			if(mysqli_num_rows($verify)>0)
			{
				
			}
		else{
			$insert1=mysqli_query($con,"INSERT INTO `disc_tran`(`aid`, `t_id`, `cat`, `prod`,`date`) VALUES ('$admin','$trans_id','$cat_id','$split[1]','$dj')");
		}
			$verify2=mysqli_query($con,"SELECT category.title as cat,product.item_name as prod,product.id as pid,product.cat_id as cid FROM `disc_tran` LEFT JOIN category on category.id=disc_tran.cat LEFT JOIN product on product.id=disc_tran.prod WHERE disc_tran.aid='$admin' and disc_tran.t_id='$trans_id' order by disc_tran.cat asc");

		while($row=mysqli_fetch_assoc($verify2))
		{
			if($row['cat']==$prev)
			{
			echo '<td>'.$row["prod"].'&nbsp;<i class="fa fa-trash" style="cursor:pointer;" onclick="delete2('.$row["pid"].','.$row["cid"].')"></i></td>';

			}else{
			echo '<tr><th>'.$row["cat"].'</th><td>'.$row["prod"].'&nbsp;<i class="fa fa-trash" style="cursor:pointer;" onclick="delete2('.$row["pid"].','.$row["cid"].')"></i></td>';
			$prev=$row["cat"];
		}
		}
		

		
		echo'</tr></thead></table></div></div>';
}

if($_POST['type']=="att3")
{
$att=$_POST['att'];
$new_att=json_decode($att);
$length_att= sizeof($new_att);
// $cat_id=$_POST['cat_id'];
$admin=$_POST['admin'];

$trans_id=$_SESSION['t_id'];


		for ($i=0; $i <$length_att ; $i++) { 
			$split=explode('~', $new_att[$i]);
			$verify=mysqli_query($con,"SELECT * FROM `disc_tran` WHERE aid='$admin' and cat='$split[0]' and prod='$split[1]'");

			if($prev==$split[0])
			{
			// echo $split[1].',';
			if(mysqli_num_rows($verify)<1)
			{
			$insert1=mysqli_query($con,"INSERT INTO `disc_tran`(`aid`, `t_id`, `cat`, `prod`,`date`) VALUES ('$admin','$trans_id','$split[0]','$split[1]','$dj')");
		}
			echo mysqli_error($con);

			}else{
			// echo '<br><b>'.$split[0].'-></b>'.$split[1].',';
			if(mysqli_num_rows($verify)<1)
			{
			$insert1=mysqli_query($con,"INSERT INTO `disc_tran`(`aid`, `t_id`, `cat`, `prod`,`date`) VALUES ('$admin','$trans_id','$split[0]','$split[1]','$dj')");
			}
			$prev=$split[0];
			echo mysqli_error($con);

		}
		$verify2=mysqli_query($con,"SELECT category.title as cat,product.item_name as prod,product.id as p_id,product.cat_id as cid FROM `disc_tran` LEFT JOIN category on category.id=disc_tran.cat LEFT JOIN product on product.id=disc_tran.prod WHERE disc_tran.aid='$admin' and disc_tran.t_id='$trans_id' order by disc_tran.cat asc");
}
echo '<div class="col-md-12" style="width:100%;"><div class="row" style="border:1px solid black;"><table class="table table-bordered table-responsive" style="border-collapse: collapse;">
	<thead><tr><th>Category</th><th colspan="20">Products</th>
	';
		while($row=mysqli_fetch_assoc($verify2))
		{
			if($row['cat']==$prev2)
			{
			echo '<td>'.$row["prod"].'&nbsp<i class="fa fa-trash" style="cursor:pointer;" onclick="delete2('.$row["p_id"].','.$row["cid"].')"></i></td>';

			}else{
			echo '<tr><th>'.$row["cat"].'</th><td>'.$row["prod"].'&nbsp<i class="fa fa-trash" style="cursor:pointer;" onclick="delete2('.$row["p_id"].','.$row["cid"].')"></i></td>';
			$prev2=$row["cat"];
		}
		}

		// }
		echo'</tr></thead></table></div></div>';
}
if($_POST['type']=="att4")
{
$item=$_POST['item'];
$split=explode('~', $item);
$cat_id=$split[0];

$admin=$_POST['admin'];

$trans_id=$_SESSION['t_id'];
echo '<div class="col-md-12" style="width:100%;"><div class="row" style="border:1px solid black;"><table class="table table-bordered table-responsive" style="border-collapse: collapse;">
	<thead><tr><th>Category</th><th colspan="20">Products</th>
	';
			$verify=mysqli_query($con,"SELECT * FROM `disc_tran` WHERE aid='$admin' and cat='$cat_id' and prod='$split[1]'");
			if(mysqli_num_rows($verify)>0)
			{
				
			}
		else{
			if($cat_id>0)
			{
			$insert1=mysqli_query($con,"INSERT INTO `disc_tran`(`aid`, `t_id`, `cat`, `prod`,`date`) VALUES ('$admin','$trans_id','$cat_id','$split[1]','$dj')");
		}
		}
			$verify2=mysqli_query($con,"SELECT category.title as cat,product.item_name as prod,product.id as p_id,product.cat_id as cid FROM `disc_tran` LEFT JOIN category on category.id=disc_tran.cat LEFT JOIN product on product.id=disc_tran.prod WHERE disc_tran.aid='$admin' and disc_tran.t_id='$trans_id' order by disc_tran.cat asc");

		while($row=mysqli_fetch_assoc($verify2))
		{
			if($row['cat']==$prev)
			{
			echo '<td>'.$row["prod"].'&nbsp;<i class="fa fa-trash" style="cursor:pointer;" onclick="delete2('.$row["p_id"].','.$row["cid"].')"></i></td>';

			}else{
			echo '<tr><th>'.$row["cat"].'</th><td>'.$row["prod"].'&nbsp;<i class="fa fa-trash" onclick="delete2('.$row["p_id"].','.$row["cid"].')" style="cursor:pointer;"></i></td>';
			$prev=$row["cat"];
		}
		}
		

		
		echo'</tr></thead></table></div></div>';
}

if($type=="delete1")
{
	$did=$_POST['d_id'];
	$delete1=mysqli_query($con,"DELETE FROM `discount` WHERE id='$did'");
}

if($type=="delete2")
{
	$pid=$_POST['p_id'];
	$did=$_POST['did'];
	$trans_id=$_POST['t_id'];
	$aid=$_POST['aid'];

	$delete2=mysqli_query($con,"DELETE FROM `disc_tran` WHERE prod='$pid'");
	$delete1=mysqli_query($con,"DELETE FROM `discount` WHERE disc_id='$did' and pid='$pid'");
echo '<div class="col-md-12" style="width:100%;"><div class="row" style="border:1px solid black;"><table class="table table-bordered table-responsive" style="border-collapse: collapse;">
	<thead><tr><th>Category</th><th colspan="20">Products</th>
	';
		$verify2=mysqli_query($con,"SELECT category.title as cat,product.item_name as prod,product.id as p_id,product.cat_id as cid FROM `disc_tran` LEFT JOIN category on category.id=disc_tran.cat LEFT JOIN product on product.id=disc_tran.prod WHERE disc_tran.aid='$aid' and disc_tran.t_id='$trans_id' order by disc_tran.cat asc");

		while($row=mysqli_fetch_assoc($verify2))
		{
			if($row['cat']==$prev)
			{
			echo '<td>'.$row["prod"].'&nbsp;<i class="fa fa-trash" style="cursor:pointer;" onclick="delete2('.$row["p_id"].','.$row["cid"].')"></i></td>';

			}else{
			echo '<tr><th>'.$row["cat"].'</th><td>'.$row["prod"].'&nbsp;<i class="fa fa-trash" onclick="delete2('.$row["p_id"].','.$row["cid"].')" style="cursor:pointer;"></i></td>';
			$prev=$row["cat"];
		}
		}
		echo'</tr></thead></table></div></div>';
}
if($type=="delete")
{
	$pid=$_POST['p_id'];
	$admin=$_POST['admin'];
	$trans_id=$_POST['tid'];

	$delete2=mysqli_query($con,"DELETE FROM `disc_tran` WHERE prod='$pid'");
	// $delete1=mysqli_query($con,"DELETE FROM `discount` WHERE disc_id='$did' and pid='$pid'");
	echo '<div class="col-md-12" style="width:100%;"><div class="row" style="border:1px solid black;"><table class="table table-bordered table-responsive" style="border-collapse: collapse;">
	<thead><tr><th>Category</th><th colspan="20">Products</th>
	';
		$verify2=mysqli_query($con,"SELECT category.title as cat,product.item_name as prod,product.id as p_id,product.cat_id as cid FROM `disc_tran` LEFT JOIN category on category.id=disc_tran.cat LEFT JOIN product on product.id=disc_tran.prod WHERE disc_tran.aid='$admin' and disc_tran.t_id='$trans_id' order by disc_tran.cat asc");

		while($row=mysqli_fetch_assoc($verify2))
		{
			if($row['cat']==$prev)
			{
			echo '<td>'.$row["prod"].'&nbsp;<i class="fa fa-trash" style="cursor:pointer;" onclick="delete2('.$row["p_id"].','.$row["cid"].')"></i></td>';

			}else{
			echo '<tr><th>'.$row["cat"].'</th><td>'.$row["prod"].'&nbsp;<i class="fa fa-trash" onclick="delete2('.$row["p_id"].','.$row["cid"].')" style="cursor:pointer;"></i></td>';
			$prev=$row["cat"];
		}
		}
		echo'</tr></thead></table></div></div>';
}
if($type=="refresh")
{
	$admin_id=$_POST['admin_id'];
	$query=mysqli_query($con,"SELECT product.*,category.title FROM `product` LEFT JOIN category on category.id=product.cat_id WHERE product.id NOT IN (SELECT prod FROM disc_tran) and product.status='A' and product.aid='$admin_id' ORDER BY product.`id` desc");
                  
                        echo '<select class="form-control" id="item" onchange="pushRules()" onclick="refreshV('.$admin_id.')">
                          <option value="00" selected="selected">Select Design</option>
                          '; 
                         	 while($values=mysqli_fetch_assoc($query)) {
                          echo '<option value="'.$values["cat_id"].'~'.$values["id"].'">'.$values["item_name"].'</option>
          						';} echo '</select>';
}

?>
