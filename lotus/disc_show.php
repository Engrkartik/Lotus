<?php
include('include/header.php');
$today=date('d-m-Y');
?>
<style>
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
            <div class="card">
              <div class="card-header" style="position: fixed;width: 100%;margin-top: -25px;">
                <h3 class="card-title"><a href="discount.php"><button class="btn btn-primary"> Add Discount</button></a></h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                  
                  </div>
                </div>
              </div>

             <!--  <div class="card">
                <div class="row">
                  <div class="col-md-12">
                    
                  </div>
                </div>
              </div> -->
              <!-- /.card-header -->
              <!-- <div class="card"> -->
              <!-- <div class="card-body table-responsive p-0"> -->
                <table class="table table-hover table-responsive text-nowrap p-0" id="myTable">
                
                   <thead style="position: fixed;width: 100%;margin-top: 25px;background-color: lightgrey;">
                    <tr>
                      <th rowspan="2" style="vertical-align: middle;width: 50px;text-align: center;border-left: 1px solid black;border-right: 1px solid black;">S.No</th>
                      <th rowspan="2" style="vertical-align: middle;width: 180px;text-align: center;border-left: 1px solid black;border-right: 1px solid black;">Name</th>
                      <th rowspan="2" style="vertical-align: middle;width: 110px;text-align: center;border-left: 1px solid black;border-right: 1px solid black;">Discount</th>
                      <th  style="vertical-align: middle;width: 30px;text-align: center;border-left: 1px solid black;border-right: 1px solid black;">Total Item</th>
                      <th colspan="2" style="text-align:center;width: 430px;text-align: center;border-left: 1px solid black;border-right: 1px solid black;">Validate</th>
                      <th rowspan="2" style="vertical-align: middle;width: 120px;text-align: center;border-left: 1px solid black;border-right: 1px solid black;">Status</th>
                      <th rowspan="2" style="vertical-align: middle;width: 100px;text-align: center;border-left: 1px solid black;">Action</th>

                    </tr>
                    <tr>
                      <th style="text-align: center;">Selected</th>
                      <th style="width: 30px;text-align: center;border-left: 1px solid black;border-right: 1px solid black;">From Date</th>
                      <th style="width: 100px;text-align: center;border-left: 1px solid black;border-right: 1px solid black;">To Date</th>
                    </tr>
                   </thead>
                  
                 <!-- </table>
                 <table class="table table-hover text-nowrap p-0" style="margin-top: 83px;margin-left: 5px;"> -->
                   <tbody>
  <tr><td colspan="8"></td></tr>
  <tr><td colspan="8"></td></tr>
  <tr><td colspan="8"></td></tr>
  <tr><td colspan="8"></td></tr>
  <tr><td colspan="8"></td></tr>
  <tr><td colspan="8"></td></tr>
    
                     <?php
                      $chk=mysqli_query($con,"SELECT discount.id,discount.disc_id,discount.pid,discount.disc_type,discount.disc_name,discount.disc,DATE_FORMAT(discount.from_dt,'%d-%m-%Y') as from_dt,DATE_FORMAT(discount.to_dt,'%d-%m-%Y') as to_dt,discount.status FROM `discount` where discount.aid='$admin_id' group by disc_id order by id desc");

                     while ($row=mysqli_fetch_assoc($chk)) {
    $sn++;
    $logo=$row["disc_type"];

    $disc_id = $row['disc_id'];
    $itemC=mysqli_query($con,"SELECT COUNT(*) as item FROM `discount` LEFT JOIN product ON product.id=discount.pid WHERE discount.`disc_id` = '$disc_id' AND product.status!='R' and discount.aid='$admin_id'");
    $run=mysqli_fetch_assoc($itemC);
    ?>
   
    <tr>
    <td value="<?=$row['id']?>" id="dd" style="text-align: center;width: 59px;"><?php echo $sn;?></td>
    <td style="text-align: center;width: 220px;"><?php echo $row["disc_name"];?></td>
    <?php if($logo=="P"){ ?>
    <td style="text-align: center;width: 135px;"><?php echo ($row["disc"]*100)."(%)"?></td>
    <?php } elseif($logo=="A"){?>
    <td style="text-align: center;width: 135px;"><?php echo $row["disc"]."(₹)"?></td>
  <?php } ?>
    <td style="text-align: center;width: 100px;"><?php echo $run["item"];?></td>
    <td style="text-align: center;width: 130px;"><?php echo $row["from_dt"];?></td>
    <td style="text-align: center;width: 150px;"><?php echo $row["to_dt"];?></td>
    <td style="text-align: center;width: 150px;">
    <?php
    if(strtotime($row["from_dt"])<=strtotime($today))
      {
        if(strtotime($row["to_dt"])>=strtotime($today))
        {
        echo "<label style='width:100px;color:blue;'>Active</label>";
        }
        elseif(strtotime($row["to_dt"])<=strtotime($today))
        {
        echo "<label style='width:100px;color:red;'>Expire</label>";
        }
      }elseif(strtotime($row["to_dt"])>=strtotime($today))
      {
        if(strtotime($row["from_dt"])>=strtotime($today))
        {
        echo "<label style='width:100px;color:brown;'>Upcoming</label>";
        }
      }
        ?>
        
    </td><td style="text-align: center;width: 150px;"><a class="fa fa-edit" href="edit_disc.php?disc_name=<?=$row['disc_id']?>"></a>&nbsp;<a class="fa fa-trash" style="cursor:pointer;" onclick="del_disc('<?=$row["disc_name"]?>')"></a>&nbsp;
      <a href="copy_disc.php?disc_name=<?=$row['disc_id']?>" class="fa fa-clone"></a>

    </td>
  </tr>
<?php }?>
                   </tbody>
                </table>
              </div>
              </div>
              <!-- /.card-body -->
            </div>
        <script type="text/javascript">
          function show_disc(id) {
            var pre=document.getElementById('preview');
            var type="show";
                  $.ajax({
                    type:'POST',
                    url:'add_disc.php',
                    data:{'id':id,'type':type},
                    success:function(res)
                    {
                      pre.style.display='none';
                      $('#myTable').html(res);
                    }
                  });
                }

                function del_disc(id) {
                       var r=confirm("You are no longer to access this slab");
                       var type="del";
                       var admin='<?php echo $admin_id?>';
                       // alert(r);
                       if(r==true)
                       {
                        $.ajax({
                          type:'POST',
                          url:'del_disc.php',
                          data:{'id':id,'type':type,'admin':admin},
                          success:function(res) {
                            alert(res);
                            window.location.href="disc_show.php";
                          }

                        });
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