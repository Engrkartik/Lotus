<?php
include 'includes/connect.php';
include 'includes/header.php';

		?>
<style type="text/css">
  .myorder{
  box-shadow: 0 4px 8px 0 lightblue inset;
  border-radius: 20px;
  border:1px solid rgb(49 119 150 / 76%);

  }
</style>
      <!-- START CONTENT -->
      <section id="content">

        <!--breadcrumbs start-->
        <div id="breadcrumbs-wrapper">
          <div class="container">
            <div class="row">
              <div class="col s12 m12 l12">
                <h5 class="breadcrumbs-title">All Orders</h5>
              </div>
            </div>
          </div>
        </div>
        <!--breadcrumbs end-->


        <!--start container-->
        <div class="container">
          <p class="caption">List of <?=$_GET['status']?> orders </p>
          <div class="divider"></div>
          <!--editableTable-->
<div id="work-collections" class="seaction">
             
					<?php
					if(isset($_GET['status'])){
						$status = $_GET['status'];
					}
					else{
						$status = '%';
					}
					$sql = mysqli_query($con, "SELECT orders.*, tables.tables_no as tab FROM orders LEFT JOIN tables on orders.table_no = tables.id WHERE orders.status LIKE '$status' Order by orders.id desc");
					echo '<div class="row">
                <div>
                    <h4 class="header">List</h4>';
					while($row = mysqli_fetch_array($sql))
					{
            $sn=0;
						$status = $row['status'];
						$deleted = $row['deleted'];
						echo '<ul id="issues-collection" class="collection myorder"><li class="collection-item avatar">
                              <i class="mdi-content-content-paste red circle"></i>
                              <span class="collection-header">Order No. '.$row['order_id'].'</span>
                              <p><strong>Date:</strong> '.$row['date'].'</p>                
                              <p><strong>Table No. :</strong> '.$row['tab'].'</p>';               
                              if(empty($_GET['status'])){ echo '<p><strong>Status:</strong> '.ucfirst($row['status']).'</p>';}							  
                              echo '<a href="#" class="secondary-content"></a>
                              </li>';
						$order_id = $row['order_id'];
						// $customer_id = $row['customer_id'];
						$sql1 = mysqli_query($con, "SELECT order_details.*,items.name FROM order_details LEFT JOIN items on order_details.item_id = items.id WHERE order_id = '$order_id'");
						// 	while($row3 = mysqli_fetch_array($sql3))
						// 	{
							echo '<li class="collection-item">
                            <div class="row">
							<p><strong>Name: </strong>'.$row['customer_name'].'</p>
							<p><strong>Address: </strong>'.$row['address'].'</p>
							'.($row['mobile'] == '' ? '' : '<p><strong>Contact: </strong>'.$row['mobile'].'</p>').'	
							'.(!empty($row['description']) ? '<p><strong>Note: </strong>'.$row['description'].'</p>' : '').'								
                            </li>';							
							// }
						while($row1 = mysqli_fetch_array($sql1))
						{
                $sn++;
                $qty1 = $row1['quantity'];
                $price1 = $row1['price'];
                $total1 = $qty1*$price1; 
							// $item_id = $row1['item_id'];
							// $sql2 = mysqli_query($con, "SELECT * FROM items WHERE id = $item_id;");
       //      $sql3 = mysqli_query($con, "SELECT * FROM order_details WHERE order_id = '$order_id' and item_id='$item_id'");
       //      $row3=mysqli_fetch_array($sql3);
							// while($row2 = mysqli_fetch_array($sql2))
							// 	$item_name = $row2['name'];
							echo '<li class="collection-item">
                            <div class="row">
                            <div class="col s4">
                            <p class="collections-title"><strong>#'.$sn.'</strong> '.$row1['name'].'</p>
                            </div>
                            <div class="col s2">
                            <span>'.$row1['quantity'].' Pieces</span>
                            </div>
                            <div class="col s3">
                            <span>Rs. '.$row1['price'].'</span>
                            </div>
                            <div class="col s3">
                            <span><b>'.$total1.'</b></span>
                            </div>
                            </div>
                            </li>';
						}
								echo'<li class="collection-item">
                                        <div class="row">
                                            <div class="col s7">
                                                <p class="collections-title"> GST Amount</p>
                                            </div>
                                            <div class="col s2">
                      <span> </span>
                                            </div>
                                            <div class="col s3">
                                                <span><strong>Rs. '.$row['gst'].'</strong></span>
                                            </div>';
                echo'<li class="collection-item">
                                        <div class="row">
                                            <div class="col s7">
                                                <p class="collections-title"> Total</p>
                                            </div>
                                            <div class="col s2">
											<span> </span>
                                            </div>
                                            <div class="col s3">
                                                <span><strong>Rs. '.$row['total_amt'].'</strong></span>
                                            </div>';										
								// if(!$deleted){
								// echo '<button class="btn btn-primary waves-effect waves-light right submit" type="submit" name="action">Change Status
        //                                       <i class="mdi-content-clear right"></i> 
								// 		</button>
								// 		</form>';
								// }
								echo'</form></div></li></ul>';
					}
					?>
					
                </div>
              </div>
            </div>
        </div>
        <!--end container-->

      </section><br><br><br>
    <?php include 'includes/footer.php';?>
?>