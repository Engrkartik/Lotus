<?php
include('include/header.php');
$oid=$_GET['id'];
$query1 = mysqli_query($con,"SELECT * FROM `manage_order` left JOIN company_reg on company_reg.id = manage_order.cid where manage_order.order_id = '$oid'");
$row1 = mysqli_fetch_assoc($query1);
                                    
 // $id = $row1['id'];
?>
  <div class="page has-sidebar-left height-full">
    <header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon-package"></i>
                        Order Summary
                    </h4>
                </div>
            </div>
        </div>
    </header>
    <div class="container-fluid animatedParent animateOnce">
        <div class="tab-content my-3" id="v-pills-tabContent">
            <h1 style="text-align: center; color: red; font-weight: 900;">Order Placed</h1>
            <div class="tab-pane animated fadeInUpShort show active" id="v-pills-all" role="tabpanel" aria-labelledby="v-pills-all-tab">
        <div class="container-fluid">
          <div class="row"> 
            <div class="col-md-12 col-sm-12"> 
              <div class="card" style="width: 100%;">
    
<div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 padding">
     <div class="card">
         <div class="card-header p-4">
             <div class="float-right">
                 <h3 class="mb-0">Invoice <?=$row1['order_id']?></h3>
                 <h5><?=$row1['date']?></h5>
             </div>
         </div>
         <div class="card-body">
             <div class="row mb-4">
                 <div class="col-sm-6">
                     <h5 class="mb-3">From:</h5>
                     <h3 class="text-dark mb-1"><?=$row1['FIRM_NAME']?></h3>
                     <div><?=$row1['ADDRESS']?></div>
                     <div>Email: <?=$row1['EMAIL_ID']?></div>
                     <div>Phone: <?=$row1['mobile']?></div>
                 </div>
                 <div class="col-sm-6">
                     <h5 class="mb-3">To:</h5>
                     <h3 class="text-dark mb-1"><?=$row1['FIRM_NAME']?></h3>
                     <div><?=$row1['ADDRESS']?></div>
                     <div>Email: <?=$row1['EMAIL_ID']?></div>
                     <div>Phone: <?=$row1['mobile']?></div>
                 </div>
             </div>
             <div class="table-responsive-sm">
                 <table class="table table-striped">
                     <thead>
                         <tr>
                             <th class="center">S.No</th>
                             <th>Item</th>
                             <th class="right">Price</th>
                             <th class="center">Qty</th>
                             <th class="right">Total</th>
                         </tr>
                     </thead>
                     <tbody>
                         <tr>
                             <td class="center"><?php echo $sn ?></td>
                             <td class="left strong"><?php echo $run['item_name']; ?></td>
                             <td class="right"><?php echo $run['price']; ?></td>
                             <td class="center"><?php echo $run['qty']*$run['packing']; ?></td>
                             <td class="right">$15,000</td>
                         </tr>
                         
                     </tbody>
                 </table>
             </div>
             <div class="row">
                 <div class="col-lg-4 col-sm-5">
                 </div>
                 <div class="col-lg-4 col-sm-5 ml-auto">
                     <table class="table table-clear">
                         <tbody>
                             <tr>
                                 <td class="left">
                                     <strong class="text-dark">Subtotal</strong>
                                 </td>
                                 <td class="right">$28,809,00</td>
                             </tr>
                             <tr>
                                 <td class="left">
                                     <strong class="text-dark">Discount (20%)</strong>
                                 </td>
                                 <td class="right">$5,761,00</td>
                             </tr>
                             <tr>
                                 <td class="left">
                                     <strong class="text-dark">VAT (10%)</strong>
                                 </td>
                                 <td class="right">$2,304,00</td>
                             </tr>
                             <tr>
                                 <td class="left">
                                     <strong class="text-dark">Total</strong> </td>
                                 <td class="right">
                                     <strong class="text-dark">$20,744,00</strong>
                                 </td>
                             </tr>
                         </tbody>
                     </table>
                 </div>
             </div>
         </div>
         
     </div>
 </div>
    </div>
</div>
</div>
</div> 
</div>
</div>
</div>
</div>

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
 
  <?php
include('include/footer.php');
?>