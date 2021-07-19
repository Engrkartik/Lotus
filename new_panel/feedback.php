<?php
include('include/header.php');
?>
<style>
  
</style>

<div class="page has-sidebar-left height-full">
    <header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon-comments"></i>
                        Feedbacks
                    </h4>
                </div>
            </div>
           
        </div>
    </header>
    <div class="container-fluid animatedParent animateOnce">
        <div class="tab-content my-3" id="v-pills-tabContent">
            <div class="tab-pane animated fadeInUpShort show active" id="v-pills-all" role="tabpanel" aria-labelledby="v-pills-all-tab">
                <div class="row my-3">
                    <div class="col-md-12">
                        <div class="card r-0 shadow">
                            <div class="table-responsive">
                                <form>
                                    <table class="table table-striped table-hover r-0">
                                        <thead>
                                        <tr class="no-b">
                                            
                                            <th style="width: 2px;">S.NO</th>
                                            <th>Firm Name</th>
                          <th>Phone Number</th>
                          <th>Address</th>
                          <th>District</th>
                          <th>State</th>
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
                    <tbody>
                      <tr>
                        
                        <td><?=$sn?></td>
                        <td><?=$row['FIRM_NAME']?></td>
                        <td><?=$row['CONTACT_NO']?></td>
                        <td><?=$row['ADDRESS']?></td>
                        <td><?=$row['DISTRICT']?></td>
                        <td><?=$row['STATE']?></td>
                        <td><?php
                            for($x=1;$x<=$rating;$x++) {
                                echo '<i id=star class="icon-star-3"></i>';
                            }
                          ?></td>
                        <!-- <td><?=$row['rating']?></td> -->
                      <td><div class="speech-bubble">
                        <div class="arrow bottom right"></div>
                        <?=$row['msg']?>
                      </div></td>
                        
                        <!--<td><button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#exampleModal" onclick="fab('<?=$row["fid"]?>')"><i class="icon-eye"></i><-- <i class="fa fa-comments" aria-hidden="true"></i>->VIEW</button></td>-->

                      </tr>
                    </tbody>
                      <?php } ?>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header" style="background: lightgrey">
                        <h5 class="modal-title" id="exampleModalLabel">Customer Feedback</h5>
                        <div id="rat" style="float: right;"></div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                       <div class="col-md-12">
                        <div class="row" style="color: seagreen" id="att"></div>
                       </div>
                      </div>
                      <div class="modal-footer" style="background: lightgrey">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                      </div>
                    </div>
                  </div>
                </div>
        </div>
    </div>
        
    
<script type="text/javascript">

       function fab(td){
    var type= "modal";
    // alert(td);
    $.ajax({
            type:'POST',
            url: 'getdata.php',
            data:{'id':td,'type':type},
            success: function (output) {
            // alert(output);
            $('#att').html(output);
            //now its working
            },
            error: function(output){
            alert("fail");
            }
        });

  }
</script>

 <?php
  include('include/footer.php');
   ?>