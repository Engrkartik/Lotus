
<?php
include('include/header.php');
?>

<style>
    .bg-light1{background-color: #2979ff !important;}
</style>
<script type="text/javascript">
    var back = document.getElementById('back');
    back.style.display = 'none';

</script>

  <!--<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #ccc;">
                        <h3 class="modal-title" id="exampleModalLabel" style=""><label>PRODUCT IMAGES</label></h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="javascript:;" method="POST" onsubmit="upload_img()">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">

                                    <div class="row">
                                        <div class="col-md-12" style="margin-bottom: 12px;">
                                            <label>Upload Images</label>
                                            <input type="file" id="files" name="files[]" class="form-control" multiple="">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <label style="cursor: pointer;"><input type="radio" id="type1" name="gen" value="1" required="required">&nbsp;All Images Belongs to same product</label><br>
                                            <label style="cursor: pointer;"><input type="radio" id="type2" name="gen" value="2" required="required">&nbsp;All Images Belongs to different product</label>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" style="background-color: red;">Close</button>
                            <button class="btn btn-primary">Upload</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>-->

<div class="page has-sidebar-left height-full">
    <header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon-box"></i>
                        Dashboard
                    </h4>
                </div>
            </div>
            
        </div>
    </header>
    <div class="container-fluid relative animatedParent animateOnce">
        <div class="tab-content pb-3" id="v-pills-tabContent">
            <!--Today Tab Start-->
            <div class="tab-pane animated fadeInUpShort show active" id="v-pills-1">
                <div class="row my-3">
                    <div class="col-md-3">
                        <div class="green counter-box r-5 p-3">
                            <div class="p-4">
                                <div class="float-right">
                                    <span class="icon icon-local_mall s-48" style="color: #fff;"></span>
                                </div>
                                <div class="counter-title" style="color: #fff;">Total Products</div>
                                <h3 class="sc-counter mt-3" style="color: #fff;"><?php $prod=mysqli_query($con,"SELECT * FROM `product` WHERE STATUS!='R' AND aid='$admin_id'");
                  echo mysqli_num_rows($prod);?></h3>
                            </div>
                           
                        </div>
                    </div>
                    
                    <div class="col-md-3">
                        <div class="blue1 counter-box r-5 p-3">
                            <div class="p-4">
                                <div class="float-right">
                                    <span class="icon icon-users s-48" style="color: #fff;"></span>
                                </div>
                                <div class="counter-title" style="color: #fff;">Total Customers</div>
                                <h3 class="sc-counter mt-3" style="color: #fff;"><?php $cust=mysqli_query($con,"SELECT * FROM `company_reg` WHERE STATUS!='R' AND aid='$admin_id'");
                  echo mysqli_num_rows($cust);?></h3>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="strawberry counter-box r-5 p-3">
                            <div class="p-4">
                                <div class="float-right">
                                    <span class="icon icon-archive s-48" style="color: #fff;"></span>
                                </div>
                                <div class="counter-title" style="color: #fff;">Total Orders</div>
                                <h3 class="sc-counter mt-3" style="color: #fff;"><?php $orders=mysqli_query($con,"SELECT * FROM `manage_order` WHERE STATUS!='R' AND aid='$admin_id'");echo mysqli_num_rows($orders);?></h3>
                            </div>
                           
                        </div>
                    </div>
                     <div class="col-md-3">
                        <div class="counter-box p-3 gradient  text-white shadow2 r-5">
                            <div class="p-4">
                                <div class="float-right">
                                    <span class="icon icon-comments s-48" style="color: #fff;"></span>
                                </div>
                                <div class="counter-title" style="color: #fff;">Customers Feedbacks</div>
                                <h3 class="sc-counter mt-3" style="color: #fff;"><?php $feedback=mysqli_query($con,"SELECT company_reg.*,feedback.msg,feedback.id as fid,feedback.rating FROM `feedback` LEFT JOIN company_reg on feedback.cid = company_reg.id WHERE company_reg.aid='$admin_id'");echo mysqli_num_rows($feedback);?></h3>
                            </div>
                           
                        </div>
                    </div>
                    
                    
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="white p-5 r-5">
                            <div class="card-title">
                                <h3> Sales Overview</h3>
                            </div>
                            <div class="row my-3">
                                <div class="col-md-3">
                                    <div class="my-3 mt-4">
                                        <h5>Sales <span class="red-text">+203.48</span></h5>
                                        <span class="s-24"><i class="icon-rupee"></i> 2652.07</span>
                                        <p>A short summary of sales report if you want to add here. This could be useful
                                            for quick view.</p>
                                    </div>
                                    <div class="row no-gutters bg-light r-3 p-2 mt-5">
                                        <div class="col-md-6 b-r p-3">
                                                <h5>Net Sales</h5>
                                                <span>2351.08 </span>
                                        </div>
                                        <div class="col-md-6 p-3">
                                            <div class="">
                                                <h5>Costs <span class="amber-text">+87.4</span></h5>
                                                <span><i class="icon-rupee"></i> 900.09</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-9" style="height: 350px">
                                    <canvas data-chart="line" data-dataset="[
                                                            [0, 15, 4, 30, 8, 5, 18],
                                                            [1, 7, 21, 4, 12, 5, 10],
                                                
                                                            ]" data-labels="['A', 'B', 'C', 'D', 'E', 'F']"
                                            data-dataset-options="[
                                                            {   label:'orders',
                                                                fill: true,
                                                                backgroundColor: 'rgba(50,141,255,.2)',
                                                                borderColor: '#328dff',
                                                                pointBorderColor: '#328dff',
                                                                pointBackgroundColor: '#fff',
                                                                pointBorderWidth: 2,
                                                                borderWidth: 1,
                                                                borderJoinStyle: 'miter',
                                                                pointHoverBackgroundColor: '#328dff',
                                                                pointHoverBorderColor: '#328dff',
                                                                pointHoverBorderWidth: 1,
                                                                pointRadius: 3,
                                                                
                                                            },
                                                            {  
                                                                label:'sales',
                                                                fill: false,
                                                                borderDash: [5, 5],
                                                                backgroundColor: 'rgba(87,115,238,.3)',
                                                                borderColor: '#2979ff',
                                                                pointBorderColor: '#2979ff',
                                                                pointBackgroundColor: '#2979ff',
                                                                pointBorderWidth: 2,
                                                
                                                                borderWidth: 1,
                                                                borderJoinStyle: 'miter',
                                                                pointHoverBackgroundColor: '#2979ff',
                                                                pointHoverBorderColor: '#fff',
                                                                pointHoverBorderWidth: 1,
                                                                pointRadius: 3,
                                                                
                                                            }
                                                            ]"
                                            data-options="{
                                                                    maintainAspectRatio: false,
                                                                    legend: {
                                                                        display: true
                                                                    },
                                                        
                                                                    scales: {
                                                                        xAxes: [{
                                                                            display: true,
                                                                            gridLines: {
                                                                                zeroLineColor: '#eee',
                                                                                color: '#eee',
                                                                            
                                                                                borderDash: [5, 5],
                                                                            }
                                                                        }],
                                                                        yAxes: [{
                                                                            display: true,
                                                                            gridLines: {
                                                                                zeroLineColor: '#eee',
                                                                                color: '#eee',
                                                                                borderDash: [5, 5],
                                                                            }
                                                                        }]
                                                        
                                                                    },
                                                                    elements: {
                                                                        line: {
                                                                        
                                                                            tension: 0.4,
                                                                            borderWidth: 1
                                                                        },
                                                                        point: {
                                                                            radius: 2,
                                                                            hitRadius: 10,
                                                                            hoverRadius: 6,
                                                                            borderWidth: 4
                                                                        }
                                                                    }
                                                                }">
                                    </canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row row-eq-height">
                    
                    <!-- orders Report-->
                    <div class="col-md-8">
                        <div class="card my-3 no-b ">
                            <div class="card-header white1 b-0 p-3">
                                <div class="card-handle">
                                    <a data-toggle="collapse" href="#salesCard" aria-expanded="false"
                                       aria-controls="salesCard">
                                        <i class="icon-menu"></i>
                                    </a>
                                </div>
                                <h4 class="card-title" style="color: #fff;">Latest Orders</h4>
                                
                            </div>
                            <div class="collapse show" id="salesCard">
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table table-hover earning-box">
                                            <thead class="bg-light1">
                                            <tr style="color: #fff;">
                                        
                                        <th>ORDER ID</th>
                                        <th>DATE</th>
                                        <th>FIRM NAME</th>
                                        <th>CONTACT NUMBER</th>
                                        <th>QTY</th>
                                        <th>AMOUNT</th>
                                        <th>SUPPLIER REMARK</th>
                                        <th>STATUS</th>
                                       
                    </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                  $query=mysqli_query($con,"SELECT * FROM `manage_order` WHERE aid='$admin_id' order by id desc LIMIT 5");
                  while($row=mysqli_fetch_assoc($query))
                  {
                    $sn++;
                  ?>
                   <tr>
                     
                     <td><?php echo $row['order_id'];?></td>
                     <td><?php echo $row['date'];?></td>
                     <td><?php echo $row['firm_name'];?></td>
                     <td><?php echo $row['mobile'];?></td>
                     <td><?php echo $row['quantity'];?></td>
                     <td><?php echo round($row['amount'],0);?></td>
                     <td id="new_rem"><textarea onfocusout="edit_rem('<?=$sn?>','<?=$row["id"]?>')" rows="2"><?php echo $row['remark'];?></textarea></td>

                     <td>
                      <?php if($row['status']=='Pending')
                                        {
                                    ?>
                                    <div class="dropdown">
                                      <button type="button" class="btn btn-warning waves-effect dropdown-toggel " data-toggle="dropdown" value="PENDING">PENDING&nbsp;<i class="fa fa-arrow-down"></i></button>
                                      <div id="Demo" class="dropdown-menu">
                                        <a class="dropdown-item" onclick="act('Confirm','<?=$row["id"]?>')">CONFIRM</a><br>
                                        <a class="dropdown-item" onclick="act('Hold','<?=$row["id"]?>')">HOLD</a><br>
                                        <a class="dropdown-item" onclick="act('Cancel','<?=$row["id"]?>')">CANCEL</a>

                                      </div>
                                      </div>
                                    <?php 
                                        }elseif($row['status']=='Confirm')
                                        {
                                    ?>
                                    <div class="dropdown">
                                      <button type="button" class="btn btn-primary waves-effect dropdown-toggel" data-toggle="dropdown" value="CONFIRM">CONFIRM&nbsp;<i class="fa fa-arrow-down"></i></button>
                                      <div id="Demo" class="dropdown-menu">
                                        <a class="dropdown-item" onclick="act('Pending','<?=$row["id"]?>')">PENDING</a><br>
                                         <a class="dropdown-item" onclick="act('Hold','<?=$row["id"]?>')">HOLD</a><br>
                                        <a class="dropdown-item" onclick="act('Cancel','<?=$row["id"]?>')">CANCEL</a>

                                      </div>
                                      </div>
                                    <?php 
                                        }elseif($row['status']=='Cancel')
                                        {
                                    ?>
                                    <div class="dropdown">
                                      <button type="button" class="btn btn-danger waves-effect dropdown-toggel" data-toggle="dropdown" value="CANCEL">CANCEL&nbsp;<i class="fa fa-arrow-down"></i></button>
                                      <div id="Demo" class="dropdown-menu">
                                        <a class="dropdown-item" onclick="act('Confirm','<?=$row["id"]?>')">CONFIRM</a><br>
                                         <a class="dropdown-item" onclick="act('Hold','<?=$row["id"]?>')">HOLD</a><br>
                                        <a class="dropdown-item" onclick="act('Pending','<?=$row["id"]?>')">PENDING</a>

                                      </div>
                                      </div>
                                    <?php 
                                        } elseif($row['status']=='Hold')
                                        {
                                    ?>
                                    <div class="dropdown">
                                      <button type="button" class="btn btn-info waves-effect dropdown-toggel" data-toggle="dropdown" value="HOLD">HOLD&nbsp;<i class="fa fa-arrow-down"></i></button>
                                      <div id="Demo" class="dropdown-menu">
                                        <a class="dropdown-item" onclick="act('Confirm','<?=$row["id"]?>')">CONFIRM</a><br>
                                         <a class="dropdown-item" onclick="act('Cancel','<?=$row["id"]?>')">CANCEL</a><br>
                                        <a class="dropdown-item" onclick="act('Pending','<?=$row["id"]?>')">PENDING</a>

                                      </div>
                                      </div>
                                    <?php 
                                        }?>
                    </td>
                    
                                        <td style="display: none;"><?php echo $row['status'];?></td>

                   </tr>
                 <?php }?>

                                            
                                            </tbody>
                                        </table>
                                        <div class="card-body">
                                          <a href="order.php"><button type="submit" class="btn btn-primary btn-lg"><i class="icon-eye mr-2"></i>View All Orders</button></a>
                                      </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                     <!-- Feedback Report-->
                    <div class="col-md-4">
                        <div class="card my-3 no-b ">
                            <div class="card-header white1 b-0 p-3">
                                <div class="card-handle">
                                    <a data-toggle="collapse" href="#salesCard" aria-expanded="false"
                                       aria-controls="salesCard">
                                        <i class="icon-menu"></i>
                                    </a>
                                </div>
                                <h4 class="card-title" style="color: #fff;">Customers Feedback</h4>
                            </div>
                            <div class="collapse show" id="salesCard">
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table table-hover earning-box">
                                            <thead class="bg-light1">
                                            <tr style="color: #fff;">
                                                <th>Firm Name</th>
                                                <th>Rating</th>
                                                <th>Feedback</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                        $fetch_cust = mysqli_query($con,"SELECT company_reg.*,feedback.msg,feedback.id as fid,feedback.rating FROM `feedback` LEFT JOIN company_reg on feedback.cid = company_reg.id WHERE company_reg.aid='$admin_id'");
                          while($row = mysqli_fetch_array($fetch_cust)){
                            $sn++;
                            $rating = $row['rating'];
                      ?>
                                            <tr>
                                                <td>
                                                   <?=$row['FIRM_NAME']?>
                                                </td>
                                                <td><?php
                            for($x=1;$x<=$rating;$x++) {
                                echo '<i id=star class="icon-star-3"></i>';
                            }
                          ?></td>
                           <td><div class="speech-bubble">
                        <div class="arrow bottom right"></div>
                        <?=$row['msg']?>
                      </div></td>
                                </tr>
                                           
                                            </tbody>
                                            <?php } ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Today Tab End-->
           
            
            <!--Yesterday Tab Start-->
        </div>
    </div>
</div>

      
        <?php

include('include/footer.php');
?>
