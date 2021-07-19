<?php
include 'includes/connect.php';
include 'includes/header.php';

	$id = $_GET['id'];
  $main_q=mysqli_query($con,"SELECT * FROM `orders` WHERE id='$id'");
  $run=mysqli_fetch_assoc($main_q);
?>
<style type="text/css">
  th,td{
    text-align: center;
  }
</style>
<!-- <h1><?=$bid;?></h1> -->
<!-- START CONTENT -->
<section id="content">
    <!--breadcrumbs start-->
    <div id="breadcrumbs-wrapper">
      <div class="container">
        <div class="row">
          <div class="col s12 m12 l12">
            <!-- <h5 class="breadcrumbs-title">Cashier</h5> -->
          </div>
        </div>
      </div>
    </div>
	<!--start container-->
    <div class="container">
    	<form class="from-group table-responsive" style="border:1px solid black;margin-top: 2%;width: 100%;" id="myfrm">
        <!-- <b style="text-align: center;">SSS CREATIONS</b> -->
        <div class="row">
          <div class="col-md-12">
            <div class="row">
              <!-- <div class="col-md-4"></div> -->
              <div class="col-md-12">
              <img src="images/materialize-logo.png" style="width: 40%;background-color: #A82128;margin-right: auto;
              margin-left: auto;display: block;">
              </div>
              <!-- <div class="col-md-4"></div> -->
            </div>
            <div class="row">
              <div class="col-md-12">
                <h6 style="text-align: center;"><b>SANJAY SUPER COLLECTION RESTAURANT</b></h6>  
                <p style="font-size: 11px;text-align: center;margin:2px;"><i>UDAKISHANGANJ THANA CHOWK,</i></p>
                <p style="font-size: 11px;text-align: center;margin:2px;"><i> PO-UDAKISHANGANJ, DIST. MADHEPURA,</i></p>
                <p style="font-size: 11px;text-align: center;margin:2px;"><i> BIHARIGANJ, BIHAR-852220</i></p>
                <p style="font-size: 11px;text-align: center;margin:2px;"><i> PH NO. : +91 95702 44377</i></p>
                <p style="font-size: 11px;text-align: center;margin:2px;"><i> GST NO. : 10CFLPK3436C3ZX</i></p>
              </div>
            </div>
             <div class="row">
              <div class="col-md-12">
                <h6 style="text-align: center;"><b>TAX INVOICE</b></h6>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <table class="table" style="border:1px solid lightgrey;">
                  <thead>
                    <tr>
                      <th>Bill No</th>
                      <td><?php echo $id;?></td>
                      <th></th>
                      <td></td>
                    </tr>
                    <tr>
                      <th>Table No.</th>
                      <td><?php echo $run['table_no'];?></td>
                      <th>Date</th>
                      <td><?php echo date("d-M-Y h:i:s", strtotime($run['date']));?></td>
                    </tr>
                  </thead>
                </table>
                 <!--  <span>Bill No. : <strong><?php echo $id;?></strong></span>
                              <p><strong>Table No. :</strong><?php echo $run['table_no'];?></p>
                              <p><strong>Date:</strong> <?php echo $run['date'];?></p> -->
              </div>
            </div>
           
            <div class="row" >
              <div class="col-md-12">
                <table class="table table-responsive" style="border:1px solid lightgrey;">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Description</th>
                      <th>Qty</th>
                      <th>Rate</th>
                      <th>Amount</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $query=mysqli_query($con,"SELECT orders.*,order_details.*,items.name FROM `order_details` LEFT JOIN orders ON orders.id=order_details.order_id LEFT JOIN items on items.id=order_details.item_id WHERE order_details.order_id='$id'");
                    while ($row=mysqli_fetch_assoc($query)) {
                      $sn++;
                      $total=$total+($row['quantity']*$row['price']);
                    ?>
                    <tr>
                      <td><?=$sn?></td>
                      <td><?=$row['name']?></td>
                      <td><?=$row['quantity']?></td>
                      <td><?=$row['price']?></td>
                      <td><?php echo round(($row['quantity']*$row['price']),2);?></td>
                    </tr>
                  <?php }?>
                    <tr>
                      <th colspan="4">Total Amount</th>
                      <th style="text-align: right;"><?='Rs. '.round($total,0).'.00'?></th>
                    </tr>
                    <tr>
                      <th colspan="4">CGST @ 9%</th>
                      <th style="text-align: right;"><?php echo round(($total*0.09)/2,2);?></th>
                    </tr>
                    <tr>
                      <th colspan="4">SGST @ 9%</th>
                      <th  style="text-align: right;"><?php echo round(($total*0.09)/2,2);?></th>
                    </tr>
                    <tr>
                      <th colspan="4">Net Amount</th>
                      <th style="text-align: right;"><?php echo 'Rs. '.round($total+($total*0.09),0).'.00';?></th>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
    	</form>
      <?php
      if($run['status']=='cooked')
                  {
                    $dis='';
                  }else{

                    $dis='disabled=""';
                  }
      ?>
      <br>
      <p style="top: 70px;position:;" id="butt">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" class="btn btn-primary" onclick="myPrint('myfrm')" value="Print" <?=$dis?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" class="btn btn-info" onclick="window.history.back();" value="Back"></p>
    </div>
</section><br><br><br><br>
<?php
include 'includes/footer.php';
	
	
?>
<script type="text/javascript">
  function myPrint(myfrm) {
    var printdata = document.getElementById(myfrm);
    newwin = window.open("");
    newwin.document.write(printdata.outerHTML);
    newwin.print();
    newwin.close();
        }
</script>

