<?php 
include('include/header.php');
?>			<!-- Page Title
		============================================= -->
		<section id="page-title">

			<div class="container clearfix">
				<h1>Checkout</h1>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="index">Home</a></li>
					<li class="breadcrumb-item active" aria-current="page">Checkout</li>
				</ol>
			</div>

		</section><!-- #page-title end -->

		<!-- Content
		============================================= -->
		<section id="content">
			<div class="content-wrap">
				<div class="container clearfix">

					<div class="row col-mb-30 gutter-50 mb-4">
						<div class="col-md-6">
							<div class="card">
								<div class="card-body">
									Returning customer? <a href="login-register.html">Click here to login</a>
								</div>
							</div>
						</div>
						
					</div>

					<div class="row col-mb-50 gutter-50" >
						<div class="col-lg-6" id="old_add">
							<h3>Select a delivery address</h3>
							<?php 
							$query=mysqli_query($con,"SELECT * FROM `billing_address` WHERE admin_id='$admin_id'");
							while($row=mysqli_fetch_assoc($query))
							{
							?>
							<input type="radio" name="opt" id="address" value="<?=$row['id']?>" <?php if($row['id']=='1'){ echo 'checked';}?>>&nbsp;&nbsp;<?php echo $row['first_name']." ".$row['last_name']."<br>".$row['address']." ".$row['city']." ".$row['state']."-".$row['pin_code']."<br>Mob No. : ".$row['contact_no']."<br>Email-Id : ".$row['email']."<br>";}?>
							<br><br><button type="button" class="btn btn-info" onclick="chk_add()">Add a new address</button>
						</div>
						<div class="col-lg-6" id="add_new" style="display:none;">
							<h3>Shipping Address</h3>
							<form id="billing-form" name="billing-form" class="row mb-0" action="#" method="post">

								<div class="col-md-6 form-group">
									<label for="billing-form-name">First Name:</label>
									<input type="text" id="billing-form-name" name="billing-form-name" value="" class="sm-form-control" />
								</div>

								<div class="col-md-6 form-group">
									<label for="billing-form-lname">Last Name:</label>
									<input type="text" id="billing-form-lname" name="billing-form-lname" value="" class="sm-form-control" />
								</div>

								<div class="w-100"></div>

								<div class="col-12 form-group">
									<label for="billing-form-address">Address:</label>
									<input type="text" id="billing-form-address" name="billing-form-address" value="" class="sm-form-control" />
								</div>

								<div class="col-12 form-group">
									<input type="text" id="billing-form-address2" name="billing-form-adress" value="" class="sm-form-control" />
								</div>

								<div class="col-12 form-group">
									<label for="billing-form-city">City / Town</label>
									<input type="text" id="billing-form-city" name="billing-form-city" value="" class="sm-form-control" />
								</div>

								<div class="col-12 form-group">
									<label for="billing-form-state">State</label>
									<input type="text" id="billing-form-state" name="billing-form-state" value="" class="sm-form-control" />
								</div>

								<div class="col-12 form-group">
									<label for="billing-form-city">Pin Code</label>
									<input type="text" id="billing-form-pin" name="billing-form-pin" value="" class="sm-form-control" />
								</div>

								<div class="col-md-6 form-group">
									<label for="billing-form-email">Email Address:</label>
									<input type="email" id="billing-form-email" name="billing-form-email" value="" class="sm-form-control" />
								</div>

								<div class="col-md-6 form-group">
									<label for="billing-form-phone">Phone:</label>
									<input type="text" id="billing-form-phone" name="billing-form-phone" value="" class="sm-form-control" />
								</div>

							</form>
							<button class="btn btn-primary" type="button" onclick="sub_add('<?=$admin_id?>')">Save</button>
							<a href="checkout"><button class="btn btn-info" type="button">Back</button></a>
						</div>

						

						<div class="w-100"></div>

						<div class="col-lg-6">
							<h4>Your Orders</h4>

							<div class="table-responsive">
								<table class="table cart" id="myTable">
									<thead>
										<tr>
											<th class="cart-product-thumbnail">&nbsp;</th>
											<th colspan="2" class="cart-product-name">Product</th>
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
											<td style="display: none;"><?=$row['pro_id']?></td>
									<td class="cart-product-remove">
										<button class="remove btn" title="Remove this item"><i class="icon-trash2" onclick="del('<?=$row['id']?>')"></i></button>
									</td>

									<td class="cart-product-thumbnail">
										<a href="#"><img width="64" height="64" src="<?php echo "include/img/shop/".$row['image_url']?>" alt="<?php echo "include/img/shop/".$row['image_url2']?>"></a>
									</td>

									<td class="cart-product-name">
										<?php echo $row['pro_name']."( ".$row['pro_code']." )";?>
									</td>


									<td>
											<?php echo $row['qty'];?>
									</td>

									<td>
										<?php echo $row['rate']*$row['qty']+(($row['rate']*$row['qty'])*$row['gst']/100);
										$amt=$amt+($row['rate']*$row['qty']+(($row['rate']*$row['qty'])*$row['gst']/100));?>
									</td>
								</tr>
								<?php }?>
									</tbody>

								</table>
							</div>
						</div>

						<div class="col-lg-6">
							<h4>Cart Totals</h4>

							<div class="table-responsive">
								<table class="table cart">
									<tbody>
										<tr class="cart_item">
											<td class="border-top-0 cart-product-name">
												<strong>Cart Subtotal</strong>
											</td>

											<td class="border-top-0 cart-product-name">
												<span class="amount"><?php echo $amt;?></span>
											</td>
										</tr>
										<tr class="cart_item">
											<td class="cart-product-name">
												<strong>Shipping</strong>
											</td>

											<td class="cart-product-name">
												<span class="amount">Free Delivery</span>
											</td>
										</tr>
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
							<?php 
								$fetchpay = mysqli_query($con,"SELECT * FROM `admin` WHERE id = '$admin_id'");
								$getpay = mysqli_fetch_assoc($fetchpay);
								$payment_det = $getpay['payment_det'];
								$pay_type = $getpay['payment_type'];
								if($payment_det=='off'){
							?>
							<div class="accordion clearfix" id="payment_mode">
								<div class="accordion-header">
									<div class="accordion-title">
									<h4>Payment Mode</h4>
										
										<input type="text" name="payment" id="payment" value="<?=$pay_type?>" readonly style="background-color: lightgrey; text-align: center;">

									</div>
								</div>
								
							</div>
							<?php } ?>
							<button class="button button-3d float-right" onclick="save_data()">Place Order</button>
						</div>
					</div>
				</div>
			</div>
		</section><!-- #content end -->

		<!-- Footer
		============================================= -->
	<?php 
include('include/footer.php');
?>	
<script type="text/javascript">
		

	function del(str) {
		// alert(admin);
		var type="Delete";
		$.ajax({
			type:'POST',
			url:'add_to_cart.php',
			data:{'t_id':str,'type':type},
			success:function(res)
			{
				window.location.href="checkout";
			}
		});
	}
	function sub_add(str)
	{
		alert("Hello");
		var type="Address";
		var f_name=document.getElementById('billing-form-name').value;
		var l_name=document.getElementById('billing-form-lname').value;
		var address=document.getElementById('billing-form-address').value;
		var address2=document.getElementById('billing-form-address2').value;
		var city=document.getElementById('billing-form-city').value;
		var state=document.getElementById('billing-form-state').value;
		var pin=document.getElementById('billing-form-pin').value;
		var phone=document.getElementById('billing-form-phone').value;
		var email=document.getElementById('billing-form-email').value;
		alert(email);
		$.ajax({
			type:'POST',
			url:'submit_data.php',
			data:{'f_name':f_name,'l_name':l_name,'address':address,'address2':address2,'city':city,'state':state,'pin':pin,'phone':phone,'email':email,'type':type,'admin_id':str},
			success:function(res)
			{
				alert(res);
				window.location.href="checkout";
			}
		});
	}
	function chk_add() {
		// alert("Hello");
		var old_add=document.getElementById('old_add');
		var new_add=document.getElementById('add_new');
		
		old_add.style.display="none";
		new_add.style.display="";

	}

	function save_data() {
		// alert("Hello");
		var type="order";
		var tableInfo=tableToJson(document.getElementById('myTable'));
       var mydata = (JSON.stringify(tableInfo));
       var address = $( 'input[name=opt]:checked' ).val();
       var payment = $( 'input[name=payment]:checked' ).val();
       var admin_id='<?php echo $admin_id;?>';
       // alert(mydata);
       $.ajax({
       	type:'POST',
       	url:'submit_data.php',
       	data:{'mydata':mydata,'address':address,'payment':payment,'type':type,'admin_id':admin_id},
       	success:function(res) {
       		$.alert({
    title: 'Success',
    content: 'Happy Shopping',
    close: function () {
    	location.href="index";
        }
});
       		// window.location.href="index.php";
       	}
       });
	}
	function tableToJson(table) {
		var result = [];
       var i;
       for (i = 1; i < table.rows.length; i++) {
         var myCells = table.rows.item(i).cells;
          var resu = {};
        resu["pro_id"] = myCells['0'].firstChild.data.trimLeft().trimRight();
        resu["qty"]= myCells['4'].firstChild.data.trimLeft().trimRight();
        resu["amount"]= myCells['5'].firstChild.data.trimLeft().trimRight();
        result.push(resu);  
        }
        
     return result;
   }
</script>
</html>