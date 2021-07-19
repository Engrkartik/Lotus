<?php 
include('include/db.php');
$aid=$_POST['aid'];
                      // $fetch=mysqli_query($con,"SELECT * From `product` where feature='Y' order by `id`");
                      if($aid!='2')
                      {
                      $server = 'http://app.ssspltd.com/api/GetProducts' ;
                      $headers = array( "Content-Type: application/json","Connection: close" , "Content-Length: 0");

                         $ch = curl_init();
                          curl_setopt($ch, CURLOPT_URL, $server);
                          curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                          curl_setopt($ch, CURLOPT_TIMEOUT, 100);
                          curl_setopt($ch, CURLOPT_POST, true);
                          curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                          $json_data = curl_exec($ch);
                          //echo $json_data;
                          $user =json_decode($json_data,true);
                          //echo $user;
                          curl_error($ch);
                    
                      echo '<option disabled="true" selected="selected" value="">Select Product</option>';
                      // while($row=mysqli_fetch_assoc($fetch)){
                       foreach($user['Product'] as $kay => $values)
                          {
                            $item=$values['ITEMNAME'];
                            $count=mysqli_query($con,"SELECT * FROM `product` WHERE `item_name`='$item' AND aid='1' and status!='R'");
                            if(mysqli_num_rows($count)>0)
                              {
                   
                              }else{ echo '
                      <option value="'.$values['GSTTYPE'].'~'.$values['MRP'].'~'.$values['SALERATE'].'~'.$values['STOCKQTY'].'~'.$values['GSTPER'].'~'.$values['ITEMNAME'].'~'.$values['QTYRATIO'].'~'.$values['SIZE'].'">'. $values['ITEMNAME'].'</option>
                      ';
                      
                    }
                  }
                }else {
                  $query=mysqli_query($con,"SELECT * FROM `product` WHERE aid='$aid'");
                  echo '<option disabled="true" selected="selected" value="">Select Product</option>';

                  while ($values=mysqli_fetch_assoc($query)) {
                    echo '
                      <option value="INCLUDED~'.$values['mrp'].'~'.$values['sale_price'].'~'.$values['avail_qty'].'~'.$values['tax'].'~'.$values['item_name'].'~'.$values['qtyratio'].'">'. $values['item_name'].'</option>
                      ';
                  }
                }
?>