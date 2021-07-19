<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="SemiColonWeb" />

	<!-- Stylesheets
	============================================= -->
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Poppins:300,400,500,600,700|PT+Serif:400,400i&display=swap" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="dist/css/bootstrap.css" type="text/css" />
	<link rel="stylesheet" href="dist/css/style1.css" type="text/css" />
	<link rel="stylesheet" href="dist/css/dark.css" type="text/css" />
	<link rel="stylesheet" href="dist/css/font-icons.css" type="text/css" />
	<link rel="stylesheet" href="dist/css/animate.css" type="text/css" />
	<link rel="stylesheet" href="dist/css/magnific-popup.css" type="text/css" />

	<link rel="stylesheet" href="dist/css/custom.css" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<!-- Document Title
	============================================= -->
	<title>SIGN UP|SSS Sybertech</title>

</head>
<style>
body {
  background-image: url('dist/img/login.jpg');
  background-repeat: no-repeat;
  background-size: cover;
}

</style>
<body class="stretched">

	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">

		<!-- Content
		============================================= -->
		<section id="content">
			<div class="content-wrap py-0">

				<div class="section p-0 m-0 h-100 position-absolute"></div>

				<div class="section bg-transparent min-vh-100 p-0 m-0">
					<div class="vertical-middle">
						<div class="container-fluid py-5 mx-auto">
						
							<div class="card mx-auto" style="max-width: 400px; background-color: rgba(255,255,255,0.93);border-radius: 25px;">
								<div class="card-body" style="padding: 5px;">
									<!-- <form action="javascript:;" method="POST" onsubmit="submit()"> -->
										<h3></h3>
										<div class="row" id="1st">
											<div class="col-12 form-group">
											<div class="row">
											<div class="col-12 form-group">
												<label for="login-form-username"><b>Name:</b></label>
												<input type="text" id="name" class="form-control not-dark" required="" />
											</div>
										</div>
										<div class="row">
											<div class="col-12 form-group">
												<label for="login-form-username"><b>Firm Name:</b></label>
												<input type="text" id="firm_name" class="form-control not-dark" required="" />
											</div>
										</div>
										
										<div class="row">
											<div class="col-12 form-group">
												<label for="login-form-username"><b>Firm Address:</b></label>
												<textarea class="form-control not-dark" rows="2" id="address" required=""></textarea>
											</div>

										
										</div>
									</div>
								</div>
										<div class="row" id="next1">
											<div class="col-12 form-group">
											<button type="button" style="float: right;" class="btn btn-primary" onclick="next1('1st','2nd','next2','3rd','4th','next3','next4','next1')">Next&nbsp;</button>
										</div>
									</div>
										<div class="row" id="2nd" style="display: none;">
											<div class="col-12 form-group">
												<label for="login-form-username"><b>Mobile Number</b></label>
												<input type="number" id="mobile" class="form-control not-dark" required="" value="<?=$_SESSION['mobile']?>"/>
											</div>

										
										</div>
										<div class="row" >
											<div class="col-12 form-group"><button id="next2" style="display: none;float: right;" type="button" class="btn btn-primary" onclick="next1('1st','3rd','next3','2nd','4th','next2','next4','next1')">Next&nbsp;</button>
										</div>
									</div>
										<div class="row" id="3rd" style="display: none;">
											<div class="col-12 form-group">
												<label for="login-form-username"><b>Business Type</b></label><br>
												<select class="form-control" style="cursor: pointer;" id="b_type">
													<option selected="" disabled="" value="00">Select Option</option>
													<option value="W" style="cursor: pointer;">Sell To Other Business(B2B)</option>
													<option value="R" style="cursor: pointer;">Sell To End Cutomers(B2C)</option>

												</select>

											</div>
										</div>
										<div class="row" >
											<div class="col-12 form-group">
												<button type="button" class="btn btn-primary" id="next3" style="display: none;float: right;" onclick="next1('1st','4th','next4','2nd','3rd','next2','next3','next1')">Next&nbsp;<i class="fa fa-arrow-right" aria-hidden="true"></i></button>
										</div>
									</div>
										<div class="row" id="4th" style="display: none;">
											<div class="col-12 form-group">
												<label for="login-form-username"><b>Who Can See Your Listed Product ?</b></label><br>
												<select class="form-control" style="cursor: pointer;" id="access">
													<option selected="" disabled="" value="00" >Select Option</option>
													<option value="All" style="cursor: pointer;">Open To All</option>
													<option value="Register" style="cursor: pointer;">Register Customers Only</option>

												</select>

											</div>
										</div>
										<div class="row" id="next4" style="display: none;">
												<div class="col-12 form-group" id="submit">
												<button class="btn btn-success" type="button" id="next4" name="login-form-submit" style="float: right;" onclick="submit()" value="login">Finish</button>
												<!-- <a href="#" class="float-right">Forgot Password?</a> -->
											</div>
										</div> 
									<!-- </form> -->

						
						</div>
					</div>
				</div>

			</div>
		</section><!-- #content end -->

	</div><!-- #wrapper end -->

	<!-- Go To Top
	============================================= -->
	<div id="gotoTop" class="icon-angle-up"></div>

	<!-- JavaScripts
	============================================= -->
	<script src="js/jquery.js"></script>
	<script src="js/plugins.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

	<!-- Footer Scripts
	============================================= -->
	<script src="js/functions.js"></script>
<script type="text/javascript">
	function next1(hide1,show1,show2,hide2,hide3,hide4,hide5,hide6) {
		// var firm_name=document.getElementById('firm_name');
		// var address=document.getElementById('address');
		// var name=document.getElementById('name');
		// if((firm_name.value=="") && (address.value=="") && (name.value==""))
		// {
		// // document.getElementById(hide1).style.display='none';
		// // document.getElementById(show1).style.display='';
		// // document.getElementById(show2).style.display='';
		// // document.getElementById(hide2).style.display='none';
		// // document.getElementById(hide3).style.display='none';
		// // document.getElementById(hide4).style.display='none';
		// // document.getElementById(hide5).style.display='none';
		// // document.getElementById(hide6).style.display='none';
		// // }
		// // else{
		// 	alert("All fields are mandatory");
		// }
		// else{
				document.getElementById(hide1).style.display='none';
		document.getElementById(show1).style.display='';
		document.getElementById(show2).style.display='';
		document.getElementById(hide2).style.display='none';
		document.getElementById(hide3).style.display='none';
		document.getElementById(hide4).style.display='none';
		document.getElementById(hide5).style.display='none';
		document.getElementById(hide6).style.display='none';
		// }



	}
	function submit() {
		var firm_name=document.getElementById('firm_name').value;
		var address=document.getElementById('address').value;
		var name=document.getElementById('name').value;
		var b_type=document.getElementById('b_type').value;
		var access=document.getElementById('access').value;
		var mobile=document.getElementById('mobile').value;

		var type="sign_up";
		$.ajax({
			type:'POST',
			url:'chk_login.php',
			data:{'type':type,'firm_name':firm_name,'address':address,'name':name,'b_type':b_type,'access':access,'mobile':mobile},
			success:function(res){
				// alert(res);
				if(res==1)
				{
					
					window.location.href="index.php";
				}
				
			}
		});

	}
	
	
</script>
</body>
</html>