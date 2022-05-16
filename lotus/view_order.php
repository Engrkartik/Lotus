
<?php
include('include/header.php');
$oid=$_GET['id'];
$query1 = mysqli_query($con,"SELECT * FROM `manage_order` left JOIN company_reg on company_reg.id = manage_order.cid where manage_order.order_id = '$oid' and aid='$admin_id'");
$row1 = mysqli_fetch_assoc($query1);

        // $id = $row1['id'];
?>
<html>
<head>
  <style type="text/css">
      @media print {
          #printPageButton {
            display: none;
          }
          #updateButton {
            display: none;
          }
        }
        table,th,td{
          border-radius: 1px solid grey;
          box-shadow: 2px 2px #888888;
          margin-left:5px;
          font-style:bold;
          /*box-shadow: 2px solid grey;*/
        }
  </style>
</head>
<body>
    <div class="main-panel">
      <!-- Navbar -->
      <!-- <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top "> -->
        <div class="container-fluid">
          <div class="navbar-wrapper"><br>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4">
                        <img src="<?=$_SESSION['logo_url']?>" style="width: 45%;">
                    </div>
                    <div class="col-md-4">
                    <div class="align-center" style="text-align: center;color: red;font-size:20pt;display:block; font-family: Verdana, Arial, Helvetica, sans-serif;width:100%;font-weight:bold;vertical-align: middle;margin-top: 20px;">ORDER FORM    
                    </div>
                </div>
                    <div class="col-md-4">
                        <?php
                        if ($_SESSION['admin_id']=='2') {
                            
                        }else {
                        ?>
                        <img src="dist/img/nak (1).png" style="width: 50%;float: right;margin-top: 15px;">
                        <?php }?>
                    </div>
                </div>
            </div>
            </div><!--  <hr/><hr/> -->
          <!-- </div> -->
          
          
        </div>
      <!-- </nav> -->
      <!-- End Navbar -->
       <!-- <div class="content"> -->
        <div class="container-fluid">
          <div class="row"> 
            <div class="col-md-12 col-sm-12"> 
              <div class="card" style="width: 100%;">
    
    
<table class="ze_tableView" style="font-size: 8pt; font-family: Verdana, Arial, Helvetica, sans-serif; width: 99%; border-collapse: collapse; color: black; border: 1px solid #797474;" cellpadding="2" cellspacing="2" border="1">
                            <tbody>
                                <tr style="height:25px;">
                                    <td style="width: 6%;font-weight:bold; text-align:center;"><div>Firm name<br /></div></td>
                                    <td style="width: 13%; text-align:center;"><div><?=$row1['FIRM_NAME']?><br /></div></td>
                                    <td style="width: 6%;font-weight:bold; text-align:center;"><div>Order No.<br /></div></td>
                                    <td style="width: 10%; text-align:center;"><div><?=$row1['order_id']?><br /></div></td>
                                    <td style="width: 6%;"><div style="text-align:center;font-weight:bold">Mobile1<br /></div></td>
                                    <td style="width: 7%;"><div style="text-align:center;"><?=$row1['mobile']?><br /></div></td>
                                    <td style="width: 7%;"><div style="text-align:center;font-weight:bold">Transport Name<br /></div></td>
                                    <td style="width: 10%;"><div style="text-align:center;"><?=$row1['transport']?><br /></div></td>
                                </tr>
                                <tr style="height:25px;" >
                                    <td style="width:6%;font-weight:bold; text-align:center;" rowspan="2">
                                        <div>
                                            Address
                                        </div>
                                    </td>
                                    <td style="width:13%; text-align:center;" rowspan="2">
                                        <div>
                                            <?=$row1['ADDRESS']?>
                                        </div>
                                    </td>
                                    <td style="width: 6%;font-weight:bold; text-align:center;">
                                        <div>
                                            Date
                                        </div>
                                    </td>
                                    <td style="width: 10%; text-align:center;">
                                        <div>
                                            <?=$row1['date']?>
                                        </div>
                                    </td>
                                    <td style="width: 6%;">
                                        <div style="text-align:center;font-weight:bold">
                                            Mobile2
                                        </div>
                                    </td>
                                    <td style="width: 7%;">
                                        <div style="text-align:center;">
                                            <?=$row1['ALT_NO']?>
                                        </div>
                                    </td>
                                    <td style="width: 7%;"><div style="text-align:center;font-weight:bold">Booking Station<br /></div></td>
                                    <td style="width: 10%;"><div style="text-align:center;"><?=$row1['booking_station']?><br /></div></td>
                                </tr>
                                <tr style="height:25px;">
                                   <!-- 
                                    <td style="width: 150.4px;">
                                        <div>
                                            <?=$cid?>
                                        </div>
                                    </td> -->
                                    <td style="width: 130.4px;font-weight:bold; text-align:center;">
                                        <div>
                                            Business Type
                                        </div>
                                    </td>
                                    <td style="width: 120.4px; text-align:center;" colspan="3">
                                        <div>
                                            <?php if($row1['BUSINESS']=='R'){echo "Retail";}else{ echo "Wholesale";}?>
                                        </div>
                                    </td>

                                    <td style="width: 7%;"><div style="text-align:center;font-weight:bold">Payment Mode<br /></div></td>
                                    <td style="width: 10%;"><div style="text-align:center;"><?=$row1['payment_mode']?><br /></div></td>
                                </tr>
                            </tbody>
                        </table>

                        <table class="ze_tableView" style="font-size: 8pt; font-family: Verdana, Arial, Helvetica, sans-serif; width: 99%; border-collapse: collapse; color: black; border: 0px solid #797474;" cellspacing="2" cellpadding="2" border="1" >
                            <tbody>
                                <tr style="height:25px;">
                                    <td style="width: 9.2%;font-weight:bold; text-align:center;">
                                        <div>
                                            Distt.
                                        </div>
                                    </td>
                                    <td style="width: 20%; text-align:center;">
                                        <div>
                                            <?=$row1['district']?>
                                        </div>
                                    </td>
                                    <td style="width: 69.4px;font-weight:bold; text-align:center;">
                                        <div>
                                            City
                                        </div>
                                    </td>
                                    <td style="width: 9.2%; text-align:center;">
                                        <div>
                                            <?=$row1['city']?>
                                        </div>
                                    </td>
                                    <td style="width: 65px;">
                                        <div style="text-align:center;font-weight:bold">
                                            GST NO.
                                        </div>
                                    </td>
                                    <td style="width: 120px; text-align:center;">
                                        <div style="text-align:center;">
                                            <?=$row1['GSTIN_NO']?>
                                        </div>
                                    </td>

                                    <td style="width: 10.7%;"><div style="text-align:center;font-weight:bold">Agent Name<br /></div></td>
                                    <td style="width: 15.5%;"><div style="text-align:center;"><?=$row1['agent_name']?><br /></div></td>
                                </tr>
                                <tr style="height:25px;">
                                    <td style="width: 9.2%;font-weight:bold; text-align:center;">
                                        <div>
                                            State Name
                                        </div>
                                    </td>
                                    <td style="width: 20%; text-align:center;">
                                        <div>
                                            <?=$row1['STATE']?>
                                        </div>
                                    </td>
                                    <td style="width: 9.2%;font-weight:bold; text-align:center;">
                                        <div>
                                            Pin Code
                                        </div>
                                    </td>
                                    <td style="width: 15%; text-align:center;">
                                        <div>
                                            <?=$row1['PIN_CODE']?>
                                        </div>
                                    </td>
                                    <td style="width: 65px;">
                                        <div style="text-align:center;font-weight:bold">
                                            Email ID
                                        </div>
                                    </td>
                                    <td style="width: 120px;">
                                        <div style="text-align:center;">
                                            <?=$row1['EMAIL_ID']?>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table><br />
                        <table class="ze_tableView table table-responsive" style="font-size: 8pt; font-family: Verdana, Arial, Helvetica, sans-serif; width: 99%; border-collapse: collapse; color: black; border: 1px solid #797474;" cellspacing="2" cellpadding="2" border="1">
                            <thead>
                                <tr style="height:25px;text-align:center">
                                    <th style="font-weight:bold;width:;text-align: center;"><div>S.NO.<br></div></th>
                                    <th style="font-weight:bold;width:2%;text-align: center;"><div>Design No.<br></div></th>
                                    <th style="font-weight:bold;text-align: center;"><div>Size<br></div></th>
                                    <!-- <th style="width: 10%;font-weight:bold"><div>Packing<br /></div></th> -->
                                    <!-- <th style=""><div style="text-align:center;font-weight:bold">Tax<br /></div></th> -->
                                    <th style=""><div style="text-align: center;font-weight:bold">QTY(in pcs)<br></div></th>
                                    <th style="width:;"><div style="text-align:center;font-weight:bold;width: 100%;">Rate(per pcs)<br></div></th>
                                    <th style="width:;"><div style="text-align:center;font-weight:bold">Gross Value<br>(without tax)<br></div></th>
                                    <th style=""><div style="text-align:center;font-weight:bold">Discount<br>(Rs.)<br></div></th>
                                    <th style="width:;"><div style="text-align:center;font-weight:bold">Rate<br>(after discount)<br></div></th>
                                    <th style="width:;"><div style="text-align:center;font-weight:bold">Amount<br>(without tax)<br></div></th>
                                    <th style=""><div style="text-align:center;font-weight:bold">Tax<br>(%)<br></div></th>
                                    <th style=""><div style="text-align:center;font-weight:bold">Tax Amount<br><br></div></th>
                                    <th style="width:10%;"><div style="text-align:center;font-weight:bold">Total Amount<br>(with tax)<br /></div></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 

                                $query = mysqli_query($con,"SELECT * from `detail_order` left JOIN product on product.id=detail_order.design_no where `order_id` = '$oid' and detail_order.`aid`='$admin_id'");
                                while($run = mysqli_fetch_assoc($query)){
                                    $sn++;
                                    $remark = $run['remark'];
                                    $set_id=$run['set_id'];
                                    $set=mysqli_query($con,"SELECT size,color,qty FROM `set_details` WHERE set_id='$set_id' and `aid`='$admin_id'");
                                    $row=mysqli_fetch_assoc($set);
                                    
                            ?>
                                <tr style="height:25px;text-align:center">
                                    <td style="">
                                        <div>
                                            <?php echo $sn ?>
                                        </div>
                                    </td>
                                    <td style="">
                                        <div>
                                            <?php echo $run['item_name']; ?>
                                        </div>
                                    </td>
                                    <td style="">
                                        <div>
                                            <?php echo $row['size']; ?>
                                        </div>
                                    </td>
                                    <td style="">
                                        <div style="text-align:center;">
                                            <?php echo $run['qty']*$run['packing']; ?>
                                        </div>
                                    </td>
                                    <td style="">
                                        <div style="text-align:center;">
                                            <?php echo $run['price']; ?>
                                        </div>
                                    </td>
                                    <td style="">
                                        <div style="text-align:center;">
                                            <?php echo round(($run['price']*($run['qty']*$run['packing'])),2); ?>
                                        </div>
                                    </td>
                                    <td style="">
                                        <div style="text-align:center;">
                                            <?php echo round($run['discount'],2); ?>
                                        </div>
                                    </td>

                                    <td style="">
                                        <div>
                                            <?php echo round(($run['price']-$run['discount']),2); ?>
                                        </div>
                                    </td>

                                    <td style="">
                                        <div>
                                            <?php echo round((($run['price']-$run['discount'])*($run['packing']*$run['qty'])),2); ?>
                                        </div>
                                    </td>

                                    <td style="">
                                        <div>
                                            <?php echo round($run['tax'],2); ?>
                                        </div>
                                    </td>
                                    <td style="">
                                        <div>
                                            <?php echo round(((($run['price']-$run['discount'])*($run['packing']*$run['qty']))*($run['tax']/100)),2); ?>
                                        </div>
                                    </td><td style="">
                                        <div>
                                            <?php echo round(((($run['price']-$run['discount'])*($run['packing']*$run['qty']))+((($run['price']-$run['discount'])*($run['packing']*$run['qty']))*($run['tax']/100))),2);
                                            $t_amt=round(((($run['price']-$run['discount'])*($run['packing']*$run['qty']))+((($run['price']-$run['discount'])*($run['packing']*$run['qty']))*($run['tax']/100))),2)+$t_amt ?>
                                        </div>
                                    </td>
                                </tr>
                            <?php }
                                $total = mysqli_query($con,"SELECT * from `manage_order` where order_id = '$oid'");
                                $show = mysqli_fetch_assoc($total);
                             ?>
                              <tr style="height:25px;text-align:center">
                                    <td style="width: 12%;font-weight:bold">
                                        <div>
                                            Buyer Remarks
                                        </div>
                                    </td>
                                    <td style="width: 40%;">
                                        <div>
                                           <textarea rows="2" style="width: 100%" readonly=""><?php echo $show['buyer_remark']; ?></textarea>
                                        </div>
                                    </td>
                                    <td style="width: 10%;font-weight:bold">
                                        <div style="text-align:center;">
                                            Total
                                        </div>
                                    </td>
                                    <td style="width: 10%;text-align:center;">
                                        <div >
                                           <?php echo $show['quantity']; ?>
                                        </div>
                                    </td>
                                    <td style="width: 8%;" colspan="6">
                                        <div>
                                            
                                        </div>
                                    </td>
                                    <td style="width: 10%;font-weight:bold">
                                        <div style="text-align:center;">
                                            Total<br>(with tax)
                                        </div>
                                    </td>
                                    <td style="width: 8%;">
                                        <div>
                                            <?php echo $t_amt; ?>
                                        </div>
                                    </td>
                                   
                                </tr>
                                <tr style="height:25px;text-align:center">
                                    <td style="width: 12%;font-weight:bold">
                                        <div>
                                            Supplier Remarks
                                        </div>
                                    </td>
                                    <td style="width: 40%;"colspan="1">
                                        <div>
                                            <textarea  name="" id="rem" rows="3" style="width: 100%"><?=$row1['remark']?></textarea>
                                        </div>
                                    </td>
                                    <td style="width: 10%;font-weight:bold" colspan="4">
                                        <div>
                                        </div>
                                    </td>
                                    <td style="width: 10%;font-weight:bold">
                                        <div>
                                        	Status
                                        </div>
                                    </td>
                                    <td style="width: 10%;font-weight:bold" colspan="3">
                                        <div style="text-align: center">
                                             <select id="sts" class="form-control" style="color: green;text-align:center">
                                                <option selected="true" disabled="disabled"><?=$row1['status']?></option>
                                                <?php if($row1['status']!='Pending'){?><option style="text-align:center">Pending</option><?php }if($row1['status']!='Cancel'){?>
                                                <!-- <option style="text-align:center">Dispatch</option> -->
                                                <option style="text-align:center">Cancel</option>
                                            <?php } if($row1['status']!='Confirm'){?>
                                                <option style="text-align:center">Confirm</option>
                                            <?php } if($row1['status']!='Hold'){?>
                                                <option style="text-align:center">Hold</option>
                                            <?php }?>
                                            </select>
                                        </div>
                                    </td>
                                    
                                    <td style="width: 10%;">
                                        <div style="text-align:center;">
                                           <button class="btn btn-warning" id="updateButton" onclick="updata()">Update</button>
                                        </div>
                                    </td>
                                    <td style="width: 8%;">
                                        <div style="text-align:center;font-weight:bold">
                                            <button class="btn btn-info" id="printPageButton" onclick="window.print()">Print</button>
                                        </div>
                                    </td>
                                   
                                </tr>


                            </tbody>
                        </table>
    </div>
</div>
<!-- </div> -->
</div>
</div> 
</div> 
</body>
<script>
    function updata(){
        var rem = document.getElementById('rem').value;
        var sts = document.getElementById('sts').value;
        var sid = '<?php echo $oid; ?>';
        var type = 'status';
        // alert(sid);
        $.ajax({
            type    :   'POST',
            url     :   'update_order.php',
            data    :   {'rem':rem,'sts':sts,'type':type,'sid':sid},
            success:function(res)
            {
                // alert(res);
                if(res==2){
                    alert("Update Successfully");
                    location.href="order.php";
                }
                else{
                    alert("error");
                }
            }
        });
    }
</script>
</html> 
  <?php
// include('include/footer.php');
?>