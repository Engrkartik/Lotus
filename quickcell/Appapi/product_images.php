<?php
include('db.php');

if($_SERVER['REQUEST_METHOD'] == "POST"){
$type=$_POST['type'];
$admin_id=$_POST['admin_id'];

//type=1 is if all the images belongs to one product
//type=2 is if all the images belongs to different products

        // Number of uploaded files
        $num_files = count($_FILES['file']['name']);
        $upload_dir='../images/item';
if($type=='1')
{
    $count=mysqli_query($con,"SELECT * FROM `prod_img` WHERE aid = '$admin_id' order by img_id DESC LIMIT 1");
$fetch=mysqli_fetch_assoc($count);
$row = $fetch['img_id'];
$rows = $row+1;
        /** loop through the array of files ***/
        for($i=0; $i < $num_files;$i++)
        {
            // check if there is a file in the array
            if(!is_uploaded_file($_FILES['file']['tmp_name'][$i]))
            {
                $messages[] = 'No file uploaded';
            }
            else
            {
                // copy the file to the specified dir 
                    $nam=time();
                    $path=$upload_dir.'/'.$name.'_'.$_FILES['file']['name'][$i];
                    $path1='images/item/'.$name.'_'.$_FILES['file']['name'][$i];
                if(@copy($_FILES['file']['tmp_name'][$i],$path))
                {
                    $insert=mysqli_query($con,"INSERT INTO `prod_img`(`img_id`, `img_url`, `date`, `aid`) VALUES ('$rows','$path1','$dj','$admin_id')");
                    if($insert)
                    {
                    $messages[] = $_FILES['file']['name'][$i].' uploaded';
                    }
                }
                else
                {
                    /*** an error message ***/
                    $messages[] = 'Uploading '.$_FILES['file']['name'][$i].' Failed';
                }
            }
        }
        if($insert)
        {
            $prod=mysqli_query($con,"INSERT INTO `product`(`aid`,`img`,`date`,`status`) VALUES('$admin_id','$rows','$dj','D')");
        }
    }elseif($type==2)
    {
           for($i=0; $i < $num_files;$i++)
        {
            $count=mysqli_query($con,"SELECT * FROM `prod_img` WHERE aid = '$admin_id' order by img_id DESC LIMIT 1");
            $fetch=mysqli_fetch_assoc($count);
            $row = $fetch['img_id'];
            $rows = $row+1;
            // check if there is a file in the array
            if(!is_uploaded_file($_FILES['file']['tmp_name'][$i]))
            {
                $messages[] = 'No file uploaded';
            }
            else
            {
                // copy the file to the specified dir 
                    $nam=time();
                    $path=$upload_dir.'/'.$name.'_'.$_FILES['file']['name'][$i];
                    $path1='images/item/'.$name.'_'.$_FILES['file']['name'][$i];
                if(@copy($_FILES['file']['tmp_name'][$i],$path))
                {
                    $insert=mysqli_query($con,"INSERT INTO `prod_img`(`img_id`, `img_url`, `date`, `aid`) VALUES ('$rows','$path1','$dj','$admin_id')");
                    $prod=mysqli_query($con,"INSERT INTO `product`(`aid`,`img`,`date`,`status`) VALUES('$admin_id','$rows','$dj','D')");

                    if($insert)
                    {
                    $messages[] = $_FILES['file']['name'][$i].' uploaded';
                    }
                }
                else
                {
                    /*** an error message ***/
                    $messages[] = 'Uploading '.$_FILES['file']['name'][$i].' Failed';
                }
            }
        }
    }
    if($prod)
    {
         $json = array(
      "status"=>true,
      // "details"=>$data,
      "msg"=>$messages
  );
    }else{
         $json = array(
      "status"=>false,
      // "details"=>$data,
      "msg"=>$messages
  );
    }

        header('Content-Type: application/json');
        echo json_encode($json);
        // echo $admin_id;
    }
?>