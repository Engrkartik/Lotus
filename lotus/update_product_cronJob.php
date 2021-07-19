<?php 
include('include/db.php');

                      // $fetch=mysqli_query($con,"SELECT * From `product` where feature='Y' order by `id`");
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
                    
                      // while($row=mysqli_fetch_assoc($fetch)){
                       foreach($user['Product'] as $kay => $values)
                          {
                            $item=$values['ITEMNAME'];
                            $sale_price=$values['SALERATE'];
                            $mrp=$values['MRP'];
                            $tax=$values['GSTPER'];
                            $avail_qty=$values['STOCKQTY'];
                            $qty_ratio=$values['QTYRATIO'];
                            $count=mysqli_query($con,"SELECT * FROM `product` WHERE `item_name`='$item' AND aid='1' and status!='R'");
                            $row=mysqli_fetch_assoc($count);
                            $id=$row['id'];
                            if(mysqli_num_rows($count)>0)
                              {
                                echo $item."<br>";
                                // echo "UPDATE `product` SET `sale_price`='$values['SALERATE']',`mrp`='$values['MRP']',`tax`='$values['GSTPER']',`avail_qty`='$values['STOCKQTY']',`qty_ratio`='$values['QTYRATIO']' WHERE `item_name`='$item' AND aid='1' and status!='R'";
                                // echo "UPDATE `product` SET `sale_price`='$sale_price',`mrp`='$mrp',`tax`='$tax',`avail_qty`='$avail_qty',`qty_ratio`='$qty_ratio' WHERE `item_name`='$item' AND aid='1' and status!='R'";
                                $update=mysqli_query($con,"UPDATE `product` SET `sale_price`='$sale_price',`mrp`='$mrp',`tax`='$tax',`avail_qty`='$avail_qty',`qty_ratio`='$qty_ratio',`date`='$dj' WHERE `item_name`='$item' AND aid='1' and status!='R'");
                                echo $id;
                                $chk=mysqli_query($con,"SELECT * FROM `set_details` WHERE pid='$id' AND aid='1'");
                                if (mysqli_num_rows($chk)>1) {
                                    $upd=mysqli_query($con,"UPDATE `set_details` SET `qty`=`qty`,`date`='$dj' WHERE pid='$id' AND aid='1'");
                                } else {
                                    $upd=mysqli_query($con,"UPDATE `set_details` SET `qty`='$qty_ratio',`date`='$dj' WHERE pid='$id' AND aid='1'");
                                }
                                
                              }
                  }
?>