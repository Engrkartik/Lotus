<?php
include('include/header.php');
$today=date('d-m-Y');
?>

<div class="page has-sidebar-left height-full">
  <header class="blue accent-3 relative nav-sticky">
    <div class="container-fluid text-white">
      <div class="row p-t-b-10 ">
        <div class="col">
       <h4><i class="icon-percent"></i> Discounts</h4>
       </div>
      </div>
      
    </div>
</header>
<div class="container-fluid animatedParent animateOnce">
  <div class="tab-content my-3" id="v-pills-tabContent">
    <div class="tab-pane animated fadeInUpShort show active" id="v-pills-all" role="tabpanel" aria-labelledby="v-pills-all-tab">
      <div class="row">
                    <div class="col-md-5">
                  <div class="input-group">
                    <h3 class="card-title"><a href="create_disc.php"><button class="btn btn-primary"> Add Discount</button></a></h3>
                    </div>
                  </div>
                </div>
 <!-- <div class="row my-3">
        <div class="col-md-12">
          <div class="card r-0 shadow">
            <div class="table-responsive">
               <table class="table table-striped table-hover r-0" id="myTable">
                 <thead>
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
                  
                  </table>
                 <table class="table table-hover text-nowrap p-0" style="margin-left: 5px;">
                   <tbody>
                     <?php
                      $chk=mysqli_query($con,"SELECT discount.id,discount.disc_id,COUNT(*) as item,discount.pid,discount.disc_type,discount.disc_name,discount.disc,DATE_FORMAT(discount.from_dt,'%d-%m-%Y') as from_dt,DATE_FORMAT(discount.to_dt,'%d-%m-%Y') as to_dt,discount.status FROM `discount` where discount.aid='$admin_id' group by disc_id order by id desc");

                     while ($row=mysqli_fetch_assoc($chk)) {
    $sn++;
    $logo=$row["disc_type"];
    ?>
   
    <tr>
    <td value="<?=$row['id']?>" id="dd" style="text-align: center;width: 59px;"><?php echo $sn;?></td>
    <td style="text-align: center;width: 220px;"><?php echo $row["disc_name"];?></td>
    <?php if($logo=="P"){ ?>
    <td style="text-align: center;width: 135px;"><?php echo $row["disc"]."(%)"?></td>
    <?php } elseif($logo=="A"){?>
    <td style="text-align: center;width: 135px;"><?php echo $row["disc"]."(₹)"?></td>
  <?php } ?>
    <td style="text-align: center;width: 100px;"><?php echo $row["item"];?></td>
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
        
    </td><td style="text-align: center;width: 150px;"><a class="icon-edit" href="edit_disc.php?disc_name=<?=$row['disc_id']?>"></a>&nbsp;<a class="icon-trash-o" style="cursor:pointer; color: #04a9f4;" onclick="del_disc('<?=$row["disc_name"]?>')"></a>&nbsp;
      <a href="copy_disc.php?disc_name=<?=$row['disc_id']?>" class="icon-clone"></a>

    </td>
  </tr>
<?php }?>
            </tbody>
          </table>
          </div>
        </div>
      </div>
      </div> -->
      <br>
     
 <div class="row">
      <?php
        $chk=mysqli_query($con,"SELECT discount.id,discount.disc_id,COUNT(*) as item,discount.pid,discount.disc_type,discount.disc_name,discount.disc,DATE_FORMAT(discount.from_dt,'%d-%m-%Y') as from_dt,DATE_FORMAT(discount.to_dt,'%d-%m-%Y') as to_dt,discount.status FROM `discount` where discount.aid='$admin_id' group by disc_id");
       
       while ($row=mysqli_fetch_assoc($chk)) {
    $sn++;
    $logo=$row["disc_type"];

    ?>
    <div class="coupon">
          <div class="brand">
                <h2>
                   <?php echo $row["disc_name"];?>
                </h2>
            </div>
             <?php if($logo=="P"){ ?>
            <div class="discount peter-river">
               <?php } else{?>
              <div class="discount alizarin">
              <?php } ?>
           <?php if($logo=="P"){ ?>
    <h1 style="color: #f1c40f;"><?php echo $row["disc"]."(%)"?></h1>
    <?php } elseif($logo=="A"){?>
      <h1 style="color: #f1c40f;"><?php echo $row["disc"]."(₹)"?></h1>
        <?php } ?>
                <div class="type" style="margin-top: 20px;">
                    off
                </div>
            </div>
            <div class="descr">
                <strong>
                    Item Selected: <?php echo $row["item"];?>
                </strong> 
              
            </div>
            <div class="ends">
                <small>
                 <p> From date- <span class="promo"><?php echo $row["from_dt"];?></span></p>
                      <p class="expire">Expires: <?php echo $row["to_dt"];?></p>
                </small>
            </div>
            <div class="midnight-blue">
                
    <a class="icon-edit" href="edit_disc.php?disc_name=<?=$row['disc_id']?>"></a>&nbsp;
      <a class="icon-trash-o" style="cursor:pointer; color: #04a9f4;" onclick="del_disc('<?=$row["disc_name"]?>')"></a>&nbsp;
     <a href="copy_disc.php?disc_name=<?=$row['disc_id']?>" class="icon-clone"></a>
            </div>
  
   <?php 
    if(strtotime($row["from_dt"])<=strtotime($today))
      {
        if(strtotime($row["to_dt"])>=strtotime($today))
        {
        echo "<h3 style='width:100px;color:green;margin-left:20px;'>Active</h3>";
        }
        elseif(strtotime($row["to_dt"])<=strtotime($today))
        {
        echo "<h3 style='width:100px;color:red;margin-left:20px;'>Expired</h3>";
        }
      }elseif(strtotime($row["to_dt"])>=strtotime($today))
      {
        if(strtotime($row["from_dt"])>=strtotime($today))
        {
        echo "<h3 style='width:100px;color:blue;margin-left:20px;'>Upcoming</h3>";
        }
      }
     ?>
    </div>
         <?php } ?>
          </div>
      </div>
    </div>
    </div>
  </div>
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
                            window.location.href="discount.php";
                          }

                        });
                       }
                      }

</script>

<?php
include('include/footer.php');
?>