<?php 
include('include/header.php');
?>		<!-- Page Title
		============================================= -->
		<section id="page-title" style="height: 10%;">

			<div class="container clearfix" style="text-align: center;">
				<div class="row">
				<div class="col-lg-12">
					<div class="row">
						<?php
						// $id=$_GET['admin_id'];
						$query=mysqli_query($con,"SELECT * FROM category where aid='$admin_id' and status!='D'");
						while ($row=mysqli_fetch_assoc($query)) {
							?>
						<div class="col-md-3">
						<img src="<?php echo "http://34.72.9.224/quickcell/".$row['img']?>" class="responsive"><br>
						<i style="text-align: center;"><b><?php echo $row["title"];?></b></i>
					</div>	
							<?php
						}

						?>
				</div>
				</div>
			</div>
			<!-- Feature Item -->

			<h2 style="text-align: center;border-top: 1px solid grey;"><u>Feature Item</u></h2>
			<div class="row">
				<div class="col-lg-12">
					<div class="row">
					<?php
						// $id=$_GET['admin_id'];
						$query=mysqli_query($con,"SELECT * FROM `feature_product` RIGHT JOIN product ON product.id=feature_product.pro_id RIGHT JOIN product_image ON feature_product.pro_id=product_image.product_id  WHERE product.admin_id='$admin_id' and feature_product.status!='D' and product.feature='Y'");
						while ($row=mysqli_fetch_assoc($query)) {
							?>
						<div class="col-md-3">
						<img src="<?php echo "include/img/".$row['image_url']?>" class="responsive"><br>
						<i style="text-align: center;"><b><?php echo $row["pro_name"];?></b></i>
					</div>	
							<?php
						}

						?>
				</div>
				</div>
			</div>
			</div>

		</section><!-- #page-title end -->

		<!-- Content
		============================================= -->
		<section id="content">
			<div class="content-wrap">
				<div class="container clearfix">

					<div class="row gutter-40 col-mb-80">
						<!-- Post Content
						============================================= -->
						<div class="postcontent col-lg-12">

							<!-- Shop
							============================================= -->
							<div id="shop" class="shop row grid-container gutter-30">
								<?php
								$prod=mysqli_query($con,"SELECT * FROM `product` RIGHT JOIN product_image ON product_image.product_id=product.id WHERE product.admin_id='$admin_id' and product.status!='D'");
								while($row=mysqli_fetch_assoc($prod))
								{
								?>
								<div class="product col-sm-6 col-12">
									<div class="grid-inner">
										<div class="product-image">
											<a href="#"><img src="<?php echo "include/img/shop/".$row['image_url']?>" alt="Checked Short Dress"></a>
											<a href="#"><img src="<?php echo "include/img/shop/".$row['image_url2']?>" alt="Checked Short Dress"></a>
											<div class="sale-flash badge badge-secondary p-2"></div>
											<div class="bg-overlay">
												<div class="bg-overlay-content align-items-end justify-content-between" data-hover-animate="fadeIn" data-hover-speed="400">
													<a href="#" class="btn btn-dark mr-2"><i class="icon-shopping-cart"></i></a>
													<a href="include/ajax/shop-item.html" class="btn btn-dark" data-lightbox="ajax"><i class="icon-line-expand"></i></a>
												</div>
												<div class="bg-overlay-bg bg-transparent"></div>
											</div>
										</div>
										<div class="product-desc">
											<div class="product-title"><h3><a href="#"><?php echo $row['pro_name']."( ".$row['pro_code']." )";?></a></h3> 
												<?php
												$id=$row["id"];
												$chk=mysqli_query($con,"SELECT * FROM add_to_cart where `admin_id`='$admin_id' and `pro_id`='$id'");
												if((mysqli_num_rows($chk))>0){
													?>
													<button id="add_cart[<?=$row['id']?>]" class="btn btn-success" style="float: right;" onclick="add_cart('<?=$row['id']?>','<?=$row['admin_id']?>')">Added</button>
												<?php }else{
												?>
												<button id="add_cart[<?=$row['id']?>]" class="btn btn-warning" style="float: right;" onclick="add_cart('<?=$row['id']?>','<?=$row['admin_id']?>')">Add to Cart</button>
												<?php }
												?>
											</div>
											<div class="product-price"><del><?php echo "Rs.".$row['mrp'];?></del> <ins><?php echo "Rs.".$row['rate'];?></ins></div>
											<div class="product-rating">
												<i class="icon-star3"></i>
												<i class="icon-star3"></i>
												<i class="icon-star3"></i>
												<i class="icon-star3"></i>
												<i class="icon-star-half-full"></i>
											</div>

										</div>
									</div>
								</div>
								<?php
							}
								?>
							</div>	<!-- #shop end -->

						</div><!-- .postcontent end -->

						<!-- Sidebar
						============================================= -->
						
					</div>

				</div>
			</div>
		</section><!-- #content end -->
		
<?php 
include('include/footer.php');
?>
<script type="text/javascript">
	function add_cart(item,admin) {
		// alert(item);
		var type="Insert";
		$.ajax({
			type:'POST',
			url:'add_to_cart.php',
			data:{'item':item,'admin_id':admin,'type':type},
			success:function(res)
			{
				alert(res);
				window.location.href="index.php";
			}
		});
	}
</script>
</html>