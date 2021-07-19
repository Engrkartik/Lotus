
<?php
include 'includes/connect.php';
include 'includes/header.php';

  if($_SESSION['id']==session_id())
  {
    ?>

  <style type="text/css">
	th,td {
		    font-size: 19px !important; 
	}
  /* Toggle this class - hide and show the popup */
.tooltiptext1 .show {
  visibility: visible;
  -webkit-animation: fadeIn 1s;
  animation: fadeIn 1s;
}
span { 
    display:block;
    width:150px;
    height: 2px;
    word-wrap:break-word;
}
</style>

  <!-- //////////////////////////////////////////////////////////////////////////// -->

  <!-- START MAIN -->
  

      <!-- //////////////////////////////////////////////////////////////////////////// -->

     <section id="content">

        <!--breadcrumbs start-->
        <div id="breadcrumbs-wrapper">
          <div class="container">
            <div class="row">
              <div class="col s12 m12 l12">
                <h2 class="breadcrumbs-title" style="text-align: center;background-color: #a821289e"><b>Order's</b></h2>
              </div>
            </div>
          </div>
        </div>
        <!--breadcrumbs end-->


        <!--start container-->
      <div class="container">

      <div class="divider"></div>
     
      <div class="row">
        <div class="col-md-12">
        <div class="card-row" style="margin-top: 10px;">
        <?php
        $query=mysqli_query($con,"SELECT users.name as uname,items.name as name,order_details.quantity as qty,order_details.remark,order_details.order_id as order_id,tables.tables_no as table_no,orders.date as `date`,order_details.id as id,orders.description as description,order_details.status as status FROM `orders` LEFT JOIN order_details on order_details.order_id=orders.order_id LEFT JOIN items ON items.id=order_details.item_id LEFT JOIN tables on orders.table_no = tables.id LEFT JOIN users on orders.waiter_id = users.id WHERE (order_details.status='Pending' or order_details.status='Preparing') Order by order_details.id asc");
        while ($row=mysqli_fetch_array($query)) {
          
        ?>
      <div class="column">
        <?php
                  if($row['status']=='Preparing')
                  {
                    $class1='background-color:lightblue';

                  }elseif($row['status']=='Pending'){
                    $class1='background-color:lightyellow';
                    
                  }
                  ?>
        <div class="card1 card_<?=$row['id']?>" style="<?=$class1?>">
          <div class="card-header card_<?=$row['id']?>">
            <b><?php $sn++; echo $sn;?></b><br>
            <h5><b>Table No:</b> <?php echo $row['table_no'];?></h5>
            <h6><b>Order No:</b> <?php echo $row['order_id'];?></h6>
            <h6><b>Waiter:</b> <?php echo $row['uname'];?></h6>
          </div>
          <div class="card-body">
           
              <div class="row">
                <div class="col-md-12">
                  <table class="table-responsive">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Item</th>
                  <th>Qty</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>#</td>
                  <td><?php echo $row['name'];?></td>
                  <td><?php echo $row['qty'];?></td>
                </tr>
              </tbody>
            </table>
                </div>
              </div>
            
              <?php if(!empty($row['remark'])){?>
              <div class="row1">
                <div class="col-md-12">
                  <!-- <span class="tooltip1">Cooking Instruction &nbsp;<i class="fa fa-angle-double-right" aria-hidden="true"></i> -->
                  <span class="popup" onclick="myFunction(<?=$row['id']?>)"><input type="text" name="" style="text-align: center;" value="<?php echo $row['remark'];?>" readonly>
                    <!-- <i class="fa fa-angle-double-right" aria-hidden="true"></i> -->
                    <!-- <p class="tooltiptext1"><?php echo$row['remark']?></p> -->
                  <p class="popuptext" id="myPopup_<?=$row['id']?>"><?php echo $row['remark'];?></p>
                </span>
                </div>
              </div>
            <?php $style='margin-top: 00px;margin-bottom:20px;';
            } else{$style='margin-top: 00px;';}?>
              <div class="row" style="<?=$style?>">
                <div class="col-md-12">
                  <?php
                  if($row['status']=='Preparing')
                  {
                    $class='btn-info';

                  }else{
                    $class='btn-warning';
                  }
                  ?>
                  <button class="btn <?=$class?> form-control" style="bottom: 0;" type="button" id="card-btn_<?=$row['id']?>" onclick="change_status(this.id,'card_<?=$row['id']?>',this.value,'<?=$row['order_id']?>')" value="<?=$row['status']?>"><?php echo $row['status'];?>
                    <!-- <i class="fa fa-arrow-right" aria-hidden="true"></i> -->
                  </button>
                </div>
              </div>
           
          </div>
        </div>
      </div>  
      <?php }?>
      </div>
            <div class="divider"></div>
            
          </div>
  
    </div>
    
</div>

       </section><br><br><br>
          <!-- START FOOTER -->
          <?php include 'includes/footer.php';?>
            <!-- END FOOTER -->



        <!-- ================================================
        Scripts
        ================================================ -->
        
    

      <script type="text/javascript">
// When the user clicks on div, open the popup
function myFunction(td) {
  var popup = document.getElementById("myPopup_"+td);
  popup.classList.toggle("show");
}
      // 	function repeat()
      // 	{
      // 	setTimeout(function(){
      // 		console.log('Hello');
      // 		// $("#container .col-md-12").hide().fadeIn('fast');
      // 	}, 3000);
      // }
      var time=5000;
      var auto_refresh = setInterval(
function () {
    repeat();
}, time);

      function repeat() {
      	$.ajax({
      		Type:'POST',
      		url:'routers/refresh-chef.php',
      		success:function(res)
      		{
      			// alert(res);
      			$('.card-row').html(res);
      		}
      	});
      }
        function change_status(id,card_id,val,o_id) {
          // alert(o_id);
      if(val=='Pending')
      {
        var status;
        var msg=confirm('Are You Sure..!!!');
        if(msg==true)
        {
          var split=card_id.split('_');
          // console.log(split[1]);
          var idd=split[1];
          var st='Preparing';
          $.ajax({
            type:'POST',
            data:{'id':idd,'st':st,'o_id':o_id},
            url:'routers/chef_status.php',
            success:function(res) {
              // alert(res);
              // alert(res);
              if(res==1)
              {
              document.getElementById(id).innerHTML='Preparing';
              document.getElementById(id).value='Preparing';
              document.getElementById(id).classList.remove("btn-warning");
              document.getElementById(id).classList.add("btn-info");
              $('.'+card_id).css("background", "lightblue");
            }
            }
          });
          
    }
      }else if(val=='Preparing'){
        var msg=confirm('Are You Sure..!!!');
        if(msg==true)
        {
          var split=card_id.split('_');
          // console.log(split[1]);
          var idd=split[1];
          var st='Cooked';
          $.ajax({
            type:'POST',
            data:{'id':idd,'st':st,'o_id':o_id},
            url:'routers/chef_status.php',
            success:function(res) {
              // alert(res);
              if(res==1)
              {
              document.getElementById(id).innerHTML='Cooked';
              document.getElementById(id).value='Cooked';
              document.getElementById(id).classList.remove("btn-info");
              document.getElementById(id).classList.add("btn-success");
              $('.'+card_id).css("background", "lightgreen");
              time=5000;
              // setTimeout(function(){$('.'+card_id).remove(); }, 5000);
            }
      }
    });
    }
  }
}
      </script>

  <?php } else{
        echo '<script type="text/javascript">document.getElementById("loader-wrapper").style.display="none"</script>';
        header('location:login.php');}?>