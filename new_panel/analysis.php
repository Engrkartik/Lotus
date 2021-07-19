
<?php
include('include/header.php');
$today=date('d-m-Y');
?>

<div class="page has-sidebar-left height-full">
    <header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon-analytics"></i>
                        Analysis
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
                        <div class="counter-box p-3 gradient  text-white shadow2 r-5">
                            <div class="p-4">
                                <div class="float-right">
                                    <span class="icon icon-analytics s-48" style="color: #fff;"></span>
                                </div>
                                <div class="counter-title" style="color: #fff;">Total Sales</div>
                                <h3 class="sc-counter mt-3" style="color: #fff;"><?php $sales=mysqli_query($con,"SELECT COUNT(*) FROM `manage_order` WHERE status='Confirm' and aid='$admin_id'");
                  echo mysqli_num_rows($sales);?></h3>
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
                </div>
                   <div class="row my-3">                    
                    <div class="col-md-3">
                        <div class="p-3 deep-purple lighten-2 text-white">
                            <div class="p-4">
                                <div class="float-right">
                                    <span class="icon icon-users s-48" style="color: #fff;"></span>
                                </div>
                                <div class="counter-title" style="color: #fff;">Average Order value</div>
                                <h3 class="sc-counter mt-3" style="color: #fff;">760</h3>
                            </div>
                            
                        </div>
                    </div>
                      <div class="col-md-3">
                        <div class="green counter-box r-5 p-3">
                            <div class="p-4">
                                <div class="float-right">
                                    <span class="icon icon-local_mall s-48" style="color: #fff;"></span>
                                </div>
                                <div class="counter-title" style="color: #fff;font-size: 21px;">Today- Confirmed Orders</div>
                                <h3 class="sc-counter mt-3" style="color: #fff;"><?php $sales=mysqli_query($con,"SELECT COUNT(*) FROM `manage_order` WHERE status='Confirm' and aid='$admin_id' and `date`='$today'");
                                  echo mysqli_num_rows($sales);?></h3>
                            </div>
                           
                        </div>
                    </div>
                     <div class="col-md-3">
                        <div class="strawberry counter-box r-5 p-3">
                            <div class="p-4">
                                <div class="float-right">
                                    <span class="icon icon-archive s-48" style="color: #fff;"></span>
                                </div>
                                <div class="counter-title" style="color: #fff;">Most sold Products</div>
                                <h3 class="sc-counter mt-3" style="color: #fff;">530</h3>
                            </div>
                           
                        </div>
                    </div>
                     <div class="col-md-3">
                        <div class="counter-box p-3 gradient  text-white shadow2 r-5">
                            <div class="p-4">
                                <div class="float-right">
                                    <span class="icon icon-analytics s-48" style="color: #fff;"></span>
                                </div>
                                <div class="counter-title" style="color: #fff;">Total Revenue</div>
                                <h3 class="sc-counter mt-3" style="color: #fff;">10<small>%</small></h3>
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
