<?php
include('include/db.php');
if($_POST['type']=="update"){
// $priority=$_POST['priority'];
$slider=$_POST['slider'];
$admin=$_POST['admin'];
$loc=$_POST['loc'];

    $insert=mysqli_query($con,"INSERT INTO `banner`(`aid`, `title`, `img`, `date`, `status`, `remark`) VALUES ('$admin','$slider','$loc','$dj','A','3')");
      if($insert)
      {
        echo "Success";
      }else{
        echo mysqli_error($con);
      }

}
else{


$get = mysqli_query($con,"SELECT * FROM `banner` WHERE title = 'Video Banner' and status = 'A'");
$fetch_count = mysqli_num_rows($get);

  if($fetch_count<1){

 $countfiles = count($_FILES['file']['name']);
 $target_dir = "videos/";

 $maxsize = 104857600; // 5MB

for($index = 0;$index < $countfiles;$index++){

      $nam=time();
      $filename = $nam."_".$_FILES['file']['name'][$index];
       // $name = $_FILES['file']['name'];
      $target_file = $target_dir.$filename;
       // echo $target_file;
       // Select file type
       $videoFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

       // Valid file extensions
       $extensions_arr = array("mp4","avi","3gp","mov","mpeg");

       // Check extension
       if( in_array($videoFileType,$extensions_arr) ){
 
          // Check file size
          // if(($_FILES['file']['size'] >= $maxsize) || ($_FILES["file"]["size"] == 0)) {
          //   echo "File too large. File must be less than 5MB.";
          // }else{
            // Upload
            if(move_uploaded_file($_FILES['file']['tmp_name'][$index],$target_file)){
              // Insert record
              
              echo  $target_file;
            }
            
          // }
       }
       // else{
       //    echo "Invalid file extension.";
       // }
    }
  }
  else{
      echo 0;
    }
}
?>
 