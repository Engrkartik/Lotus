<?php
include('include/db.php');
$from_dt=date("d-m-Y", strtotime($_POST['from_dt']));
$to_dt=date("d-m-Y", strtotime($_POST['to_dt']));
$admin_id=$_POST['admin_id'];

 echo '<table class="table table-hover text-nowrap" id="myTable">
                  <thead>
                    <tr>
                                        <th>S.NO</th>
                                        <th>ORDER ID</th>
                                        <th>DATE</th>
                                        <th>FIRM NAME</th>
                                        <th>CONTACT NUMBER</th>
                                        <th>QTY</th>
                                        <th>AMOUNT</th>
                                        <th>SUPPLIER REMARK</th>
                                        <th>STATUS</th>
                                        <th>ACTION</th>
                    </tr>
                  </thead>
                 <tbody>';
                
  $query=mysqli_query($con,"SELECT * FROM `manage_order` WHERE aid='$admin_id' and `date` between '$from_dt' and '$to_dt'");
                  while($row=mysqli_fetch_assoc($query))
                  {
                    $sn++;
       
                   echo '<tr>
                     <td>'.$sn.'</td>
                     <td>'.$row["order_id"].'</td>
                     <td>'.$row["date"].'</td>
                     <td>'.$row["firm_name"].'</td>
                     <td>'.$row["mobile"].'</td>
                     <td>'.$row["quantity"].'</td>
                     <td>'.round($row["amount"],0).'</td>
                     <td id="new_rem"><textarea onfocusout="edit_rem('.$sn.','.$row["id"].')" rows="2">'.$row["remark"].'</textarea></td>

                     <td>
                      ';
                      if($row["status"]=="Pending")
                                        {
                                    echo '
                                    <div class="dropdown">
                                      <button type="button" class="btn btn-warning waves-effect dropdown-toggel " data-toggle="dropdown" value="PENDING">PENDING&nbsp;<i class="fa fa-arrow-down"></i></button>
                                      <div id="Demo" class="dropdown-menu">
                                        <a class="dropdown-item" onclick="act(\'Confirm\','.$row["id"].')">CONFIRM</a><br>
                                        <a class="dropdown-item" onclick="act(\'Hold\','.$row["id"].')">HOLD</a><br>
                                        <a class="dropdown-item" onclick="act(\'Cancel\','.$row["id"].')">CANCEL</a>

                                      </div>
                                      </div>
                                  '; 
                                        }elseif($row["status"]=="Confirm")
                                        {
                                   echo '
                                    <div class="dropdown">
                                      <button type="button" class="btn btn-primary waves-effect dropdown-toggel" data-toggle="dropdown" value="CONFIRM">CONFIRM&nbsp;<i class="fa fa-arrow-down"></i></button>
                                      <div id="Demo" class="dropdown-menu">
                                        <a class="dropdown-item" onclick="act(\'Pending\','.$row["id"].')">PENDING</a><br>
                                         <a class="dropdown-item" onclick="act(\'Hold\','.$row["id"].')">HOLD</a><br>
                                        <a class="dropdown-item" onclick="act(\'Cancel\','.$row["id"].')">CANCEL</a>

                                      </div>
                                      </div>
                                    '; 
                                        }
                                        if($row["status"]=="Cancel")
                                        {
                                   echo '
                                    <div class="dropdown">
                                      <button type="button" class="btn btn-danger waves-effect dropdown-toggel" data-toggle="dropdown" value="CANCEL">CANCEL&nbsp;<i class="fa fa-arrow-down"></i></button>
                                      <div id="Demo" class="dropdown-menu">
                                        <a class="dropdown-item" onclick="act(\'Confirm\','.$row["id"].')">CONFIRM</a><br>
                                         <a class="dropdown-item" onclick="act(\'Hold\','.$row["id"].')">HOLD</a><br>
                                        <a class="dropdown-item" onclick="act(\'Pending\','.$row["id"].')">PENDING</a>

                                      </div>
                                      </div>
                                    '; 
                                         }
                                   elseif($row["status"]=="Hold")
                                        {
                                   echo '
                                    <div class="dropdown">
                                      <button type="button" class="btn btn-info waves-effect dropdown-toggel" data-toggle="dropdown" value="HOLD">HOLD&nbsp;<i class="fa fa-arrow-down"></i></button>
                                      <div id="Demo" class="dropdown-menu">
                                        <a class="dropdown-item" onclick="act(\'Confirm\','.$row["id"].')">CONFIRM</a><br>
                                         <a class="dropdown-item" onclick="act(\'Cancel\','.$row["id"].')">CANCEL</a><br>
                                        <a class="dropdown-item" onclick="act(\'Pending\','.$row["id"].')">PENDING</a>

                                      </div>
                                      </div>
                                    ';
                                        }
                                        echo '
                    </td>
                     <td>
                                            
                                                <a href="view_order.php?id='.$row["order_id"].'"><i class="fa fa-eye"></i></a>&nbsp;
                                                

                                            
                                        </td>
                                        <td style="display: none;">'.$row["status"].'</td>

                   </tr>';
                 }
                 echo '</tbody>
                </table>';
?>