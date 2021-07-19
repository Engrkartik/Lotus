
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
                          <th>Issue Image</th>
                          <th>Date</th>
                          
                    </tr>
                 </thead>
                      <?php 
                        $fetch_cust = mysqli_query($con,"SELECT report_issue.*,company_reg.FIRM_NAME,company_reg.OWNER_NAME,issue_img.img_url FROM `report_issue` LEFT JOIN company_reg ON company_reg.id=report_issue.c_id LEFT JOIN issue_img ON issue_img.img_id=report_issue.img_id WHERE report_issue.aid='$admin_id' and company_reg.id=issue_img.cid order by report_issue.id desc");
                          while($row = mysqli_fetch_array($fetch_cust)){
                            $sn++;
                            
                      ?>
                    <tbody>
                      <tr>
                        <td><?=$sn?></td>
                        <td><?=$row['FIRM_NAME']?></td>
                        <td><?=$row['OWNER_NAME']?></td>
                        <td><?=$row['issue_type']?></td>
                        <td><textarea class="form-control" rows="2" readonly=""><?=$row['issue']?></textarea></td>
                        <td style="width: 20%;"><img src="<?=$row['img_url']?>" onclick="imagezoom('<?=$row['img_id']?>')" id="<?=$row['img_id']?>" style="width: 30%;height: 50px;"></td>
                        <td><?php $time = strtotime($row['date']);
                        $newformat = date('d-m-Y',$time);
                        echo $newformat;
                        ?>
                          
                        </td>
                      </tr>
                    </tbody>
                      <?php } ?>
                  </table>
              </div>
                          <div id="imagezoom" class="modal1">
  <span class="close1 close">&times;</span>
  <img class="modal-content1" id="img01">
  <div id="caption1"></div>
</div>
              <!-- /////////////////////////////////////////// -->
          
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
<script type="text/javascript">
  
 function imagezoom(img_id) {
  // body...
var modal = document.getElementById("imagezoom");
// alert(img_id);
// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById(img_id);
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
  modal.style.display = "none";
}
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