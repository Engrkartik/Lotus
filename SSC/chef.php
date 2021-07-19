<?php
include 'includes/connect.php';
include 'includes/header.php';


	if($_SESSION['id']==session_id())
	{
		?>

  

  <!-- //////////////////////////////////////////////////////////////////////////// -->

  <!-- START MAIN -->
  

      <!-- //////////////////////////////////////////////////////////////////////////// -->

      <!-- START CONTENT -->
      <section id="content">

        <!--breadcrumbs start-->
        <div id="breadcrumbs-wrapper">
          <div class="container">
            <div class="row">
              <div class="col s12 m12 l12">
                <h5 class="breadcrumbs-title">Chef's</h5>
              </div>
            </div>
          </div>
        </div>
        <!--breadcrumbs end-->


        <!--start container-->
        <div class="container">
          <div class="divider"></div>
        <form class="formValidate" id="formValidate1" method="post" action="routers/add-chef.php" novalidate="novalidate">
            <div class="row">
              <div class="col s12 m4 l3">
                <h4 class="header btn btn-primary" onclick="show_add_item()">Add Chef</h4>
              </div>
              <div id="add_item" style="display: none;">
              <table class="table-responsive" >
                    <thead>
                      <tr>
                        <th data-field="name" style="text-align: center;vertical-align: middle;" >Name</th>
                        <th data-field="phone_no" style="text-align: center;vertical-align: middle;" >Phone Number</th>
                        <th data-field="branch" style="text-align: center;vertical-align: middle;" >Branch</th>
                        <th data-field="chef" style="text-align: center;">Chef Id</th>
                        <th data-field="password" style="text-align: center;vertical-align: middle;" >Password</th>
                      </tr>
                     
                    </thead>

                    <tbody>
        	<tr><td><div class="input-field col s12"><label for="name">Name</label>
          <input id="name" name="name" type="text" data-error=".errorTxt01"><div class="errorTxt01"></div></td> 
          <td><div class="input-field col s12"><label for="phone_no">Phone Number</label>
          <input id="phone_no" name="phone_no" type="number" data-error=".errorTxt02" onKeyPress="if(this.value.length==10) return false;" onfocusout="if(this.value.length<10) {alert('Invalid Number'); document.getElementById('phone_no').focus();}">
          <div class="errorTxt02"></div></td>
          <td><div class="input-field col s12"><label for="branch"></label>
            <select id="branch" name="branch" data-error=".errorTxt03">
                <option value="00" selected="selected" disabled="">Select Branch</option>
              <?php
              $query=mysqli_query($con,"SELECT * FROM branch where status='A'");
              while($row=mysqli_fetch_assoc($query))
              {
                ?>
                <option value="<?=$row['id']?>"><?php echo $row['name'];?></option>
              <?php }
              ?>
            </select>
          <div class="errorTxt03"></div></td>
          <td><div class="input-field col s12"><label for="chef_id">Chef Id</label>
          <input id="chef_id" name="chef_id" type="text" data-error=".errorTxt04"><div class="errorTxt04"></div></td>
          <td><div class="input-field col s12"><label for="password">Password</label>
          <input id="password" name="password" type="text" data-error=".errorTxt05"><div class="errorTxt05"></div></td>

          </tr>
                    </tbody>
			</table>
              </div>
	        <div class="input-field col s12" id="add_btn" style="display: none;">
	                              <button class="btn cyan waves-effect waves-light right" type="submit" name="action">Add
	                                <i class="mdi-content-send right"></i>
	                              </button>
	                            </div>
	            </div>
      </form>   
		 
		 	<form class="formValidate" id="formValidate" method="post" novalidate="novalidate">
            <div class="row">
              <div class="col s12 m4 l3">
                <h4 class="header">chef's List</h4>
              </div>
              <div>
				  <table class="table-responsive" cellspacing="0">
                    <thead>
                      <tr>
                        <th  style="vertical-align: middle;text-align: center;">#</th>
                        <th  style="vertical-align: middle;text-align: center;">Name</th>
                        <th  style="vertical-align: middle;text-align: center;">Phone Number</th>
                        <th  style="vertical-align: middle;text-align: center;">Branch Name</th>
                        <th  style="vertical-align: middle;text-align: center;">Chef's Id</th>
                        <th  style="vertical-align: middle;text-align: center;">Password</th>
                        <th  style="vertical-align: middle;text-align: center;">Status</th>
                        <th  style="vertical-align: middle;text-align: center;">Action</th>
                      </tr>
                    </thead>

                    <tbody>
            				<?php
            				$result = mysqli_query($con, "SELECT users.*,branch.name as b_name FROM `users` LEFT JOIN branch on branch.id=users.branch where users.status!='R' and users.role='Chef'");
            				while($row = mysqli_fetch_array($result))
            				{
                      $sn++;
                        echo '<tr><td>'.$sn.'</td><td>'.$row["name"].'</td>';
                      echo '<td>'.$row["contact"].'</td>';        
                       echo '<td>'.$row["b_name"].'</td>';
                       echo '<td>'.$row["username"].'</td>';                   
                       echo '<td>'.$row["password"].'</td>';  
                       
                      echo '<td>'.($row['status']=='A'?'Active':'De-Active').'</td>
                      <td><i class="fa fa-trash" style="cursor:pointer;" onclick="del('.$row['id'].',\'chef\')"></i></td></tr>';
                    }
            				// 	echo '<tr><td>'.$sn.'</td><td><div class="input-field col s12"><label for="'.$row["id"].'_name"></label>';
            				// 	echo '<input value="'.$row["name"].'" id="'.$row["id"].'_name" name="'.$row['id'].'_name" type="text" data-error=".errorTxt'.$row["id"].'"><div class="errorTxt'.$row["id"].'"></div></td>';
                //       echo '<td><div class="input-field col s12"><label for="'.$row["id"].'_location"></label>';
                //       echo '<input value="'.$row["contact"].'" id="'.$row["id"].'_location" name="'.$row['id'].'_location" type="number" data-error=".errorTxt'.$row["id"].'"><div class="errorTxt'.$row["id"].'"></div></td>';			   
                //        echo '<td><div class="input-field col s12"><label for="'.$row["id"].'_fromtime"></label>';
                //       echo '<input value="'.$row["b_name"].'" id="'.$row["id"].'_fromtime" name="'.$row['id'].'_fromtime" type="text" data-error=".errorTxt'.$row["id"].'"><div class="errorTxt'.$row["id"].'"></div></td>';
                //        echo '<td><div class="input-field col s12"><label for="'.$row["id"].'_totime"></label>';
                //       echo '<input value="'.$row["username"].'" id="'.$row["id"].'_totime" name="'.$row['id'].'_totime" type="text" data-error=".errorTxt'.$row["id"].'"><div class="errorTxt'.$row["id"].'"></div></td>';                   
                //        echo '<td><div class="input-field col s12"><label for="'.$row["id"].'_stdate"></label>';
                //       echo '<input value="'.$row["password"].'" id="'.$row["id"].'_stdate" name="'.$row['id'].'_stdate" type="text" data-error=".errorTxt'.$row["id"].'"><div class="errorTxt'.$row["id"].'"></div></td>';  
                       
            				// 	echo '<td>';
            				// if($row['status'] == 'A'){
                //         $text1 = 'selected';
                //         $text2 = '';
                //       }
                //       else{
                //         $text1 = '';
                //         $text2 = 'selected';            
                //       }
            				// 	echo '<select name="'.$row['id'].'_hide">
                //                   <option value="1"'.$text1.'>Active</option>
                //                   <option value="2"'.$text2.'>De-Active</option>
                //                 </select></td></tr>';
            				// }
            				?>
                    </tbody>
</table>
              </div>
			  <div class="input-field col s12">
                              <button class="btn cyan waves-effect waves-light right" type="submit" name="action">Modify
                                <i class="mdi-content-send right"></i>
                              </button>
                            </div>
            </div>
			</form>
            <div class="divider"></div>
            
         </div>
       </section><br><br><br>
  <!-- START FOOTER -->
  <?php include 'includes/footer.php';?>
    <!-- END FOOTER -->



    <!-- ================================================
    Scripts
    ================================================ -->
       
    <script type="text/javascript">
    $("#formValidate1").validate({

        rules: {
		name: {
				required: true,
				minlength: 2
			},
      phone_no: {
        required: true
      },
      chef_id: {
        required: true
      },
      password: {
        required: true
      },
      branch: {
        required: true
      },
		
	},
        messages: {
		name: {
				required: "Enter item name",
				minlength: "Minimum length is 2 characters"
			},
      phone_no: {
        required: "Enter Phone Number",
      },
      chef_id: {
        required: "Enter chef Id"
      },
      password: {
        required: "Create Password"
        
      },
      branch: {
        required: "Select Branch"
        
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

    function show_add_item() {
      if(document.getElementById('add_item').style.display=='')
      {
       document.getElementById('add_item').style.display='none';
       document.getElementById('add_btn').style.display='none';
      }else{
        document.getElementById('add_item').style.display='';
        document.getElementById('add_btn').style.display='';
      }
    }
    </script>

<?php
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