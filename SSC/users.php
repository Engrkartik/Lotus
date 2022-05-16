<?php
include 'includes/connect.php';
include 'includes/header.php';


	if($_SESSION['id']==session_id())
	{
		?>
      <!-- START CONTENT -->
      <section id="content">

        <!--breadcrumbs start-->
        <div id="breadcrumbs-wrapper">
          <div class="container">
            <div class="row">
              <div class="col s12 m12 l12">
                <h5 class="breadcrumbs-title">User List</h5>
              </div>
            </div>
          </div>
        </div>
        <!--breadcrumbs end-->


        <!--start container-->
        <div class="container">
          <p class="caption">Enable, Disable or Verify Users.</p>
          <div class="divider"></div>
          <!--editableTable-->
          <div id="editableTable" class="section">
		  <form class="formValidate" id="formValidate1" method="post" action="routers/user-router.php" novalidate="novalidate" >
            <div class="row">
              <div class="col s12 m4 l3">
                <h4 class="header">List of users</h4>
              </div>
              <div>
<table>
                    <thead>
                      <tr>
                        <th data-field="name">Name</th>
                        <th data-field="price">Email</th>
                        <th data-field="price">Contact</th>
                        <th data-field="price">Address</th>	
                        <th data-field="price">Role</th>
                        <th data-field="price">Verified</th>
                        <th data-field="price">Enable</th>
                        <th data-field="price">Action</th>						
                      </tr>
                    </thead>

                    <tbody>
				<?php
				$result = mysqli_query($con, "SELECT * FROM users where status!='R'");
				while($row = mysqli_fetch_array($result))
				{
          echo '<tr><td>'.$row["name"].'</td>';
          echo '<td>'.$row["email"].'</td>';
          echo '<td>'.$row["contact"].'</td>';   
          echo '<td>'.$row["address"].'</td>';                
          echo '<td>'.$row['role'].'</td>';
          echo '<td>'.($row['verified']=='1'?'Verified':'Not Verified').'</td>';  
          echo '<td>'.($row['deleted']=='1' ? 'Disable' : 'Enable').'</td>';
          echo '<td><i class="fa fa-trash" style="cursor:pointer;" onclick="del('.$row['id'].',\'users\')"></i></td>';
					// echo '<tr><td>'.$row["name"].'</td>';
					// echo '<td>'.$row["email"].'</td>';
					// echo '<td>'.$row["contact"].'</td>';   
					// echo '<td>'.$row["address"].'</td>';      					
					// echo '<td><select name="'.$row['id'].'_role" >
     //                  <option value="Administrator"'.($row['role']=='Administrator' ? 'selected' : '').'>Administrator</option>
     //                  <option value="Chef"'.($row['role']=='Chef' ? 'selected' : '').'>Chef</option>
     //                  <option value="Waiter"'.($row['role']=='Waiter' ? 'selected' : '').'>Waiter</option>
     //                  <option value="Cashier"'.($row['role']=='Cashier' ? 'selected' : '').'>Cashier</option>
     //                </select></td>';
					// echo '<td><select name="'.$row['id'].'_verified">
     //                  <option value="1"'.($row['verified'] ? 'selected' : '').'>Verified</option>
     //                  <option value="0"'.(!$row['verified'] ? 'selected' : '').'>Not Verified</option>
     //                </select></td>';	
					// echo '<td><select name="'.$row['id'].'_deleted">
     //                  <option value="1"'.($row['deleted'] ? 'selected' : '').'>Disable</option>
     //                  <option value="0"'.(!$row['deleted'] ? 'selected' : '').'>Enable</option>
     //                </select></td>';
					$key = $row['id'];
					$sql = mysqli_query($con,"SELECT * from wallet WHERE customer_id = $key;");
					if($row1 = mysqli_fetch_array($sql)){
						$wallet_id = $row1['id'];
						$sql1 = mysqli_query($con,"SELECT * from wallet_details WHERE wallet_id = $wallet_id;");
						if($row2 = mysqli_fetch_array($sql1)){
							$balance = $row2['balance'];
						}
					}
					// echo '<td><label for="balance">Balance</label><input id="balance" name="'.$row['id'].'_balance" value="'.$balance.'" type="number" data-error=".errorTxt01"><div class="errorTxt01"></div></td>';
          echo '</tr>'; 					
				}
				?>
                    </tbody>
</table>
              </div>
			 <!--  <div class="input-field col s12">
                              <button class="btn cyan waves-effect waves-light right" type="submit" name="action">Modify
                                <i class="mdi-content-send right"></i>
                              </button>
                            </div> -->
            </div>
			</form>
		  <!-- <form class="formValidate" id="formValidate" method="post" action="routers/add-users.php" novalidate="novalidate">
            <div class="row">
              <div class="col s12 m4 l3">
                <h4 class="header">Add User</h4>
              </div>
              <div>
            <table>
                    <thead>
                      <tr>
                        <th data-field="name">Username</th>
                        <th data-field="name">Password</th>							
                        <th data-field="name">Name</th>
                        <th data-field="price">Email</th>
                        <th data-field="price">Phone number</th>
                        <th data-field="price">Address</th>	
                        <th data-field="price">Role</th>
                        <th data-field="price">Verified</th>
                        <th data-field="price">Enable</th>		
                      </tr>
                    </thead>

                    <tbody>
            				<?php
            					echo '<tr><td><label for="username">Username</label><input id="username" name="username" type="text" data-error=".errorTxt02"><div class="errorTxt02"></div></td>';   									
            					echo '<td><label for="password">Password</label><input id="password" name="password" type="password" data-error=".errorTxt03"><div class="errorTxt03"></div></td>';   									
            					echo '<td><label for="name">Name</label><input id="name" name="name" type="text" data-error=".errorTxt04"><div class="errorTxt04"></div></td>';
            					echo '<td><label for="email">Email</label><input id="email" name="email" type="email"></td>';
            					echo '<td><label for="contact">Phone number</label><input id="contact" name="contact" type="number" data-error=".errorTxt05"><div class="errorTxt05"></div></td>';   
            					echo '<td><label for="address">Address</label><input id="address" name="address" type="text" data-error=".errorTxt06"><div class="errorTxt06"></div></td>';   
            					echo '<td><select name="role">
                                  <option value="Administrator">Administrator</option>
                                  <option value="Customer" selected>Customer</option>
                                </select></td>';
            					echo '<td><select name="verified">
                                  <option value="1">Verified</option>
                                  <option value="0" selected>Not Verified</option>
                                </select></td>';	
            					echo '<td><select name="deleted">
                                  <option value="1">Disable</option>
                                  <option value="0" selected>Enable</option>
                                </select></td></tr>';					
            				?>
                                </tbody>
            </table>
              </div>
  			  <div class="input-field col s12">
                                <button class="btn cyan waves-effect waves-light right" type="submit" name="action">Add
                                  <i class="mdi-content-send right"></i>
                                </button>
                              </div>
              </div>
			</form>	 -->		
            <div class="divider"></div>
            
          </div>
        </div>
        </div>
        <!--end container-->

      </section><br><br><br>
      <!-- END CONTENT -->
   <?php
   include 'includes/footer.php';
   ?>

    <!-- ================================================
    Scripts
    ================================================ -->
    
    
    <!-- jQuery Library -->
    
    <script type="text/javascript" src="js/custom-script.js">
    $("#formValidate").validate({
        rules: {
            username: {
                required: true,
                minlength: 5,
            },
            password: {
                required: true,
                minlength: 5,
            },
            name: {
                required: true,
                minlength: 5,
			},
            contact: {
                required: true,
                minlength: 4,
			},
            address: {
                minlength: 10,
			},		
            balance: {
                required: true,
			},				
		},
        messages: {
           username:{
                required: "Enter a username",
                minlength: "Enter at least 5 characters"
            },	
           password:{
                required: "Provide a prove",
                minlength: "Password must be atleast 5 characters long",
            },	
           name:{
                required: "Please provide CVV number",
                minlength: "Enter at least 5 characters",		
            },	
           contact:{
                required: "Please provide card number",
                minlength: "Enter at least 4 digits",
            },	
           address:{
                minlength: "Address must be atleast 10 characters long",		
            },		
           balance:{
                required: "Please provide a balance.",		
            },				
		},
        errorElement : 'div',
        errorPlacement: function(error, element) {
          var placement = $(element).data('error');
          if (placement) {
            $(placement).append(error)
          } else {
            error.insertAfter(element);
          }
        }
     }); 

    </script>
   
    

<?php }
?>