<?php 
include('include/header.php');
?>		<!-- Page Title
		============================================= -->
		<section id="page-title" style="height: 1%;">

			<div class="container">
				<h1>Cart</h1>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="index">Home</a></li>
					<!-- <li class="breadcrumb-item"><a href="#">Shop</a></li> -->
					<li class="breadcrumb-item active" aria-current="page">Cart</li>
				</ol>
			</div>

		</section><!-- #page-title end -->

		<!-- Content
		============================================= -->
		<section id="content">
			<div class="content-wrap">
				<div class="container">

					<div class="table-responsive mb-5">
						<table class="table cart">
							<thead>
								<tr>
									<th class="cart-product-remove">&nbsp;</th>
									<th class="cart-product-thumbnail">&nbsp;</th>
									<th class="cart-product-name">Product</th>
									<th class="cart-product-price">Unit Price</th>
									<th class="cart-product-quantity">Quantity</th>
									<th class="cart-product-subtotal">Total</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$query=mysqli_query($con,"SELECT add_to_cart.*,product.pro_code,product.pro_name,product.gst,product.new_amt,product_image.image_url,product_image.image_url2,IF((product.disc_type='P') ,(product.rate-(product.rate*(product.disc/100))),(product.rate-product.disc)) AS rate  FROM add_to_cart RIGHT JOIN product on product.id=add_to_cart.pro_id RIGHT JOIN product_image ON product_image.product_id=product.id where add_to_cart.`admin_id`='$admin_id' and add_to_cart.status!='D'");
								while($row=mysqli_fetch_assoc($query)){
								?>
								<tr class="cart_item">
									<td class="cart-product-remove">
										<button class="remove btn" title="Remove this item"><i class="icon-trash2" onclick="del('<?=$row['id']?>')"></i></button>
									</td>

									<td class="cart-product-thumbnail">
										<a href="#"><img width="64" height="64" src="<?php echo "include/img/shop/".$row['image_url']?>" alt="<?php echo "include/img/shop/".$row['image_url2']?>"></a>
									</td>

									<td class="cart-product-name">
										<a href="#"><?php echo $row['pro_name']."( ".$row['pro_code']." )";?></a>
									</td>

									<td class="cart-product-price">
										<span class="amount"><?php echo $row['rate'];?></span>
									</td>

									<td class="cart-product-quantity">
										<div class="quantity">
											<input type="button" value="-" onclick="qty('M','<?=$row["id"]?>')" class="minus">
											<input type="text" name="quantity" value="<?=$row['qty']?>" class="qty" />
											<input type="button" value="+" class="plus" onclick="qty('P','<?=$row["id"]?>')">
										</div>
									</td>

									<td class="cart-product-subtotal">
										<span class="amount"><?php echo $row['rate']*$row['qty']+(($row['rate']*$row['qty'])*$row['gst']/100)."(incl. tax of ".$row['gst']."% )";
										$amt=$amt+($row['rate']*$row['qty']+(($row['rate']*$row['qty'])*$row['gst']/100))?></span>
									</td>
								</tr>
								<?php }?>
								<tr class="cart_item">
									<td colspan="6">
										<div class="row">
											<div class="col-lg-4 col-4 p-0">
												
											</div>
											<div class="col-lg-8 col-8 p-0">
												<a href="checkout" class="button button-3d mt-0 float-right">Proceed to Checkout</a>
											</div>
										</div>
									</td>
								</tr>
							</tbody>

						</table>
					</div>

					<div class="row col-mb-30">

						<div class="col-lg-6">
							<h4>Cart Totals</h4>

							<div class="table-responsive">
								<table class="table cart">
									<tbody>
										<tr class="cart_item">
											<td class="cart-product-name">
												<strong>Cart Subtotal</strong>
											</td>

											<td class="cart-product-name">
												<span class="amount"><?php echo $amt;?></span>
											</td>
										</tr>
										<?php 

											$fetchship = mysqli_query($con,"SELECT * FROM `admin` LEFT JOIN shipping on shipping.aid = admin.id WHERE admin.id = '$admin_id' ");
											$getship = mysqli_fetch_assoc($fetchship);
											$ship = $getship['shipping'];
											$shipping_type = $getship['shipping_type'];
											if($ship == 'on'){
										?>
										<tr class="cart_item">
											<td class="cart-product-name">
												<strong>Shipping</strong>
											</td>

											<td class="cart-product-name">
												<span class="amount"><?=$shipping_type?></span>
											</td>
											<?php if($shipping_type != 'FREE SHIPPING'){ ?>
												<td class="cart-product-name">
													<span class="amount"><?=$getship['amount']?></span>
												</td>
											<?php } ?>
										</tr>
										<?php } ?>
										<tr class="cart_item">
											<td class="cart-product-name">
												<strong>Total</strong>
											</td>

											<td class="cart-product-name">
												<span class="amount color lead"><strong><?php echo $amt;?></strong></span>
											</td>
										</tr>
									</tbody>

								</table>
							</div>
						</div>
					</div>

				</div>
			</div>
		</section><!-- #content end -->

		<?php 
include('include/footer.php');
?>	
<script type="text/javascript">
	function qty(str,item) {
		// alert(item);
		var type="Update";
		$.ajax({
			type:'POST',
			url:'add_to_cart.php',
			data:{'t_id':str,'item':item,'type':type},
			success:function(res)
			{
				// alert(res);
				window.location.href="cart";
			}
		});
	}

	function del(str) {
		// alert(admin);
		var type="Delete";
		$.ajax({
			type:'POST',
			url:'add_to_cart.php',
			data:{'t_id':str,'type':type},
			success:function(res)
			{
				window.location.href="cart";
			}
		});
	}
</script>
</html>