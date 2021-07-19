<?php
include 'includes/connect.php';
include 'includes/header.php';
	
if($_SESSION['id']==session_id())
{
	$bid = $_SESSION['branch'];
?>
<!-- START CONTENT -->
<section id="content">
    <!--breadcrumbs start-->
    <div id="breadcrumbs-wrapper">
      <div class="container">
        <div class="row">
          <div class="col s12 m12 l12">
            <!-- <h5 class="breadcrumbs-title">Cashier</h5> -->
          </div>
        </div>
      </div>
    </div>
	<!--start container-->
    <div class="container">
    	<!-- <form class="formValidate" id="formValidate" method="post" action="routers/menu-router.php" novalidate="novalidate"> -->
            <div class="row">
              <div class="col s12 m4 l3">
                <h4 class="header">Bills List</h4>
              </div>
              <div>
				        <table id="data-table-admin" class="table display table-bordered" cellspacing="0">
                    <thead>
                      <tr>
                        <th style="text-align: center;">S.no</th>
                        <th style="text-align: center;">Order Date</th>
                        <th style="text-align: center;">Customer Mobile</th>
                        <th style="text-align: center;">Table No</th>
                        <th style="text-align: center;">Total Item Qty</th>
                        <th style="text-align: center;">Order Status</th>
                        <th style="text-align: center;">Total Bill Amount</th>
                        <th style="text-align: center;">View</th>
                      </tr>
                    </thead>

                    <tbody>
                    <?php
                      $find_o = mysqli_query($con,"SELECT * FROM `orders` WHERE deleted != '0' order by id desc");
                      while($get_o = mysqli_fetch_assoc($find_o)){
                        $sn++;
                    ?>      
                      <tr>
                        <td style="text-align: center;"><?=$sn;?></td>
                        <td style="text-align: center;"><?=date('d-M-Y h:i:s',strtotime($get_o['date']));?></td>
                        <td style="text-align: center;"><?=$get_o['mobile'];?></td>
                        <td style="text-align: center;"><?=$get_o['table_no'];?></td>
                        <td style="text-align: center;"><?=$get_o['items'];?></td>
                        <td style="text-align: center;"><?=$get_o['status'];?></td>
                        <td style="text-align: center;"><?=$get_o['total'];?></td>
                        <td style="text-align: center;"><a href="detail_order.php?id=<?=$get_o['id'];?>"><button class="btn btn-danger"><i class="fa fa-eye" aria-hidden="true"></i></button></a></td>
                      </tr>
                    
                    <?php
                      }
                    ?>
                    </tbody>
				        </table>
              </div>
			        <!-- <div class="input-field col s12">
                <button class="btn cyan waves-effect waves-light right" type="submit" name="action">Modify
                    <i class="mdi-content-send right"></i>
                </button>
              </div> -->
            </div>
		<!-- </form> -->
    </div>
</section><br><br><br><br>
<?php
include 'includes/footer.php';
	}
	else
	{
		if($_SESSION['customer_sid']==session_id())
		{
			header("location:index.php");		
		}
		else{
			header("location:login.php");
		}
	}
?>

