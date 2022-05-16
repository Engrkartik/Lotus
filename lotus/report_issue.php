
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
                <h3 class="card-title">Issues Report</h3>
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
              <div class="card" style="margin-left: 5px;">
              <div class="card-body table-responsive">
                <table class="table table-hover text-nowrap" id="myTable" >
                  <thead>
                    <tr>
                          <th>S.No</th>
                          <th>Firm Name</th>
                          <th>Customer Name</th>
                          <th>Issue Type</th>
                          <th>Issue</th>
                          <th>Date</th>
                          <th>Issue Image</th>

                          
                    </tr>
                 </thead>
                      <?php 
                        $fetch_cust = mysqli_query($con,"SELECT report_issue.*,company_reg.FIRM_NAME,company_reg.OWNER_NAME FROM `report_issue` LEFT JOIN company_reg ON company_reg.id=report_issue.c_id  WHERE report_issue.aid='$admin_id' order by report_issue.id DESC");
                          while($row = mysqli_fetch_array($fetch_cust)){
                            $sn++;
                            
                      ?>
                    <tbody>
                      <tr>
                        <td><?=$sn?></td>
                        <td><?=$row['FIRM_NAME']?></td>
                        <td><?=$row['OWNER_NAME']?></td>
                        <td><?php
                        $type=json_decode($row['issue_type']);
                        for ($i=0; $i <sizeof($type) ; $i++) { 
                          echo $type[$i]."<br>";
                        }
                        ?></td>
                        
                        <td><textarea class="form-control" rows="2" readonly=""><?=$row['issue']?></textarea></td>
                        <td><?php $time = strtotime($row['date']);
                        $newformat = date('d-m-Y',$time);
                        echo $newformat;
                        ?>
                          
                        </td>
                        <td><button class="btn btn-primary" type="button" data-toggle="modal" data-target="#exampleModal_<?=$row['id']?>">View Images</button>
                       
                        </td>
                        
                      </tr>
  <div class="modal fade" id="exampleModal_<?=$row['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Issue Images</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
        <?php
          $img_id=$row['img_id'];
          $fetch_cust2 = mysqli_query($con,"SELECT issue_img.* From issue_img where issue_img.img_id='$img_id' and aid='$admin_id'");
          while($run=mysqli_fetch_assoc($fetch_cust2))
          {
            ?>
            <div class="col-md-2" style="border: 1px solid lightgray;margin:5px;box-shadow:5px 5px 5px 5px lightgray;">
            <a href="#" data-toggle="modal" data-target="#exampleModal2" onclick="modal_value('exampleModal2_<?=$run['id']?>','<?=$run['img_url']?>')"><img src="<?=$run['img_url']?>" id="<?=$run['id']?>" style="width: 100%;height: 100%;"></a>
            </div>          
          <?php  }?>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- modal2 -->


                    </tbody>
                      <?php } ?>
                  </table>
              </div>

              <!-- /////////////////////////////////////////// -->
          
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
  <!-- <div id="imagezoom" class="modal1">
  <span class="close1 close" style="color:white !important;">&times;</span>
  <img class="modal-content1" id="img01">
  <div id="caption1"></div>
</div> -->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
          <img id="img_show" src="" style="width: 100%;height: 100%;">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>
        </div>
<script type="text/javascript">


  function modal_value(modal1,value) {
    // console.log(value);
    // var data=JSON.parse(value);
    document.getElementById('img_show').src=value;
    // document.getElementById('chng').id=modal;
  }

  ////////////////////////loader///////////////////////////////////////////////////

  /////////////////////////////////end loader////////////////////////////////////
</script>
<?php
include('include/footer.php');
?>