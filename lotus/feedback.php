
<?php
include('include/header.php');
?>
 <style type="text/css">


.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

    .dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: blue;}
/*/////////////////////////////loader/////////////////////////////////////////////////////*/
.no-js #loader { display: none;  }
.js #loader { display: block; position: absolute; left: 100px; top: 0; }
.se-pre-con {
  position: fixed;
  left: 0px;
  top: 0px;
  width: 100%;
  height: 100%;
  z-index: 9999;
  background: url(images/Preloader_2.gif) center no-repeat #fff;
}
/*/////////////////////////////End loader/////////////////////////////////////////////////////*/
  </style>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>
   <div class="se-pre-con"></div>
<div class="row">
          <div class="col-12">
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Feedback</h3>
              </div><br>
               
                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    
                    <div class="input-group-append">
                      <!-- <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button> -->
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card">
              <div class="card-body table-responsive">
                <table class="table table-hover text-nowrap" id="myTable" >
                  <thead>
                    <tr>
                          <th>S.No</th>
                          <th>Firm Name</th>
                          <th>Phone Number</th>
                          <th>Address</th>
                          <th>District</th>
                          <th>State</th>
                          <th>Rating</th>
                          <th>Feedback</th>
                    </tr>
                 </thead>
                      <?php 
                        $fetch_cust = mysqli_query($con,"SELECT company_reg.*,feedback.msg,feedback.id as fid,feedback.rating FROM `feedback` LEFT JOIN company_reg on feedback.cid = company_reg.id where company_reg.aid='$admin_id' and feedback.aid='$admin_id'");
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
                                echo '<img src="images/star.png" />';
                            }
                          ?></td>
                        <!-- <td><?=$row['rating']?></td> -->
                        <td><button class="btn btn-light" data-toggle="modal" data-target="#exampleModal" onclick="fab('<?=$row["fid"]?>')">
                          <!-- <i class="fa fa-comments" aria-hidden="true"></i>-->VIEW</button></td>

                      </tr>
                    </tbody>
                      <?php } ?>
                  </table>
              </div>
              <!-- /////////////////////////////////////////// -->
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

              <!-- /.card-body -->
            </div>
            <!-- /.card -->
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
  ////////////////////////loader///////////////////////////////////////////////////
$(window).load(function() {
    // Animate loader off screen
    $(".se-pre-con").fadeOut("slow");;
  });
  /////////////////////////////////end loader////////////////////////////////////
</script>
<?php
include('include/footer.php');
?>