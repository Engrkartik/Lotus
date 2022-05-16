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
                <h5 class="breadcrumbs-title">Branch</h5>
              </div>
            </div>
          </div>
        </div>
        <!--breadcrumbs end-->


        <!--start container-->
        <div class="container">
          <div class="divider"></div>
           <form class="formValidate" id="formValidate1" method="post" action="routers/add-branch.php" novalidate="novalidate">
            <div class="row">
              <div class="col s12 m4 l3">
                <h4 class="header btn btn-primary" onclick="show_add_item()">Add Branch</h4>
              </div>
              <div id="add_item" style="display: none;">
              <table class="table-responsive">
                    <thead>
                      <tr>
                        <th data-field="name" style="text-align: center;vertical-align: middle;" rowspan="2">Branch Name</th>
                        <th data-field="location" style="text-align: center;vertical-align: middle;" rowspan="2">Location</th>
                        <th data-field="time" colspan="2" style="text-align: center;">Timings</th>
                        <th data-field="st_date" style="text-align: center;vertical-align: middle;" rowspan="2">Start Date</th>
                        <th data-field="total_table" style="text-align: center;vertical-align: middle;" rowspan="2">Total Tables</th>
                      </tr>
                      <tr>
                        <!-- <th colspan="1"></th> -->
                        <th data-filed="from_time" style="text-align: center;">Start Time</th>
                        <th data-filed="to_time" style="text-align: center;">Closing Time</th>
                        <!-- <th colspan="2"></th> -->

                      </tr>
                    </thead>

                    <tbody>
        <?php
          echo '<tr><td><div class="input-field col s12"><label for="name">Name</label>';
          echo '<input id="name" name="name" type="text" data-error=".errorTxt01"><div class="errorTxt01"></div></td>';  
          echo '<td><div class="input-field col s12"><label for="name">Location</label>';
          echo '<input id="location" name="location" type="text" data-error=".errorTxt02"><div class="errorTxt02"></div></td>';
          echo '<td><div class="input-field col s12"><label for="name"></label>';
          echo '<input id="from_time" name="from_time" type="time" data-error=".errorTxt03"><div class="errorTxt03"></div></td>';
          echo '<td><div class="input-field col s12"><label for="name"></label>';
          echo '<input id="to_time" name="to_time" type="time" data-error=".errorTxt04"><div class="errorTxt04"></div></td>';
          echo '<td><div class="input-field col s12"><label for="name"></label>';
          echo '<input id="st_date" name="st_date" type="date" data-error=".errorTxt05"><div class="errorTxt05"></div></td>';
          echo '<td><div class="input-field col s12"><label for="total_table">Total Tables</label>';
          echo '<input id="total_table" name="total_table" type="number" data-error=".errorTxt06"><div class="errorTxt06"></div></td>';
          echo '</tr>';
        ?>
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
      <form class="formValidate" id="formValidate" method="post" action="routers/update-branch.php" novalidate="novalidate">
		  <!-- <form class="formValidate" id="formValidate" method="post" novalidate="novalidate"> -->
            <div class="row">
              <div class="col s12 m4 l3">
                <h4 class="header">Branch List</h4>
              </div>
              <div>
				<table class="table-responsive display" cellspacing="0">
                    <thead>
                      <tr>
                        <th rowspan="2" style="vertical-align: middle;text-align: center;">#</th>
                        <th rowspan="2" style="vertical-align: middle;text-align: center;">Branch Name</th>
                        <th rowspan="2" style="vertical-align: middle;text-align: center;">Location</th>
                        <th colspan="2" style="text-align: center;">Timing</th>
                        <th rowspan="2" style="vertical-align: middle;text-align: center;">Start Date</th>
                        <th rowspan="2" style="vertical-align: middle;text-align: center;">Total Tables</th>
                        <th rowspan="2" style="vertical-align: middle;text-align: center;">No.Of Waiter</th>
                        <th rowspan="2" style="vertical-align: middle;text-align: center;">No.Of Chef's</th>
                        <th rowspan="2" style="vertical-align: middle;text-align: center;">Status</th>
                        <th rowspan="2" style="vertical-align: middle;text-align: center;">Action</th>
                      </tr>
                      <tr>
                        <th>Start Time</th>
                        <th>Closing Time</th>
                      </tr>
                    </thead>

                    <tbody>
				<?php
				$result = mysqli_query($con, "SELECT * FROM branch where status!='R'");
				while($row = mysqli_fetch_array($result))
				{
          $id=$row['id'];
          $q1=mysqli_query($con,"SELECT * FROM `users` WHERE role='Chef' and status='A' and branch='$id'");
          $q2=mysqli_query($con,"SELECT * FROM `users` WHERE role='Waiter' and status='A' and branch='$id'");
          $sn++;
					echo '<tr><td>'.$sn.'</td><td><div class="input-field col s12"><label for="'.$row["id"].'_name"></label>';
					echo '<input value="'.$row["name"].'" id="'.$row["id"].'_name" name="'.$row['id'].'_name" type="text" data-error=".errorTxt'.$row["id"].'"><div class="errorTxt'.$row["id"].'"></div></td>';
          echo '<td><div class="input-field col s12"><label for="'.$row["id"].'_location"></label>';
          echo '<input value="'.$row["location"].'" id="'.$row["id"].'_location" name="'.$row['id'].'_location" type="text" data-error=".errorTxt'.$row["id"].'"><div class="errorTxt'.$row["id"].'"></div></td>';			   
           echo '<td><div class="input-field col s12"><label for="'.$row["id"].'_fromtime"></label>';
          echo '<input value="'.$row["from_time"].'" id="'.$row["id"].'_fromtime" name="'.$row['id'].'_fromtime" type="time" data-error=".errorTxt'.$row["id"].'"><div class="errorTxt'.$row["id"].'"></div></td>';
           echo '<td><div class="input-field col s12"><label for="'.$row["id"].'_totime"></label>';
          echo '<input value="'.$row["to_time"].'" id="'.$row["id"].'_totime" name="'.$row['id'].'_totime" type="time" data-error=".errorTxt'.$row["id"].'"><div class="errorTxt'.$row["id"].'"></div></td>';                   
           echo '<td><div class="input-field col s12"><label for="'.$row["id"].'_stdate"></label>';
          echo '<input value="'.$row["start_date"].'" id="'.$row["id"].'_stdate" name="'.$row['id'].'_stdate" type="date" data-error=".errorTxt'.$row["id"].'"><div class="errorTxt'.$row["id"].'"></div></td>';  
           echo '<td><div class="input-field col s12"><label for="'.$row["id"].'_totaltable"></label>';
          echo '<input value="'.$row["no_of_tables"].'" id="'.$row["id"].'_totaltable" name="'.$row['id'].'_totaltable" type="number" data-error=".errorTxt'.$row["id"].'"><div class="errorTxt'.$row["id"].'"></div></td>';  
           echo '<td><div class="input-field col s12"><label for="'.$row["id"].'_totalwaiter"></label>';
          echo '<input value="'.mysqli_num_rows($q2).'" id="'.$row["id"].'_totalwaiter" name="'.$row['id'].'_totalwaiter" type="number" data-error=".errorTxt'.$row["id"].'"><div class="errorTxt'.$row["id"].'"></div></td>';  
           echo '<td><div class="input-field col s12"><label for="'.$row["id"].'_totalchef"></label>';
          echo '<input value="'.mysqli_num_rows($q1).'" id="'.$row["id"].'_totalchef" name="'.$row['id'].'_totalchef" type="number" data-error=".errorTxt'.$row["id"].'"><div class="errorTxt'.$row["id"].'"></div></td>';  
					echo '<td>';
				if($row['status'] == 'A'){
            $text1 = 'selected';
            $text2 = '';
          }
          else{
            $text1 = '';
            $text2 = 'selected';            
          }
					echo '<select name="'.$row['id'].'_hide">
                      <option value="1"'.$text1.'>Active</option>
                      <option value="2"'.$text2.'>De-Active</option>
                    </select></td>
                    <td><i class="fa fa-trash" style="cursor:pointer;" onclick="del('.$row['id'].',\'branch\')"></i></td></tr>';
				}
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
		 	
           <!--  <div class="divider"></div> -->
            
         </div>
       </section><br><br><br>
  <!-- START FOOTER -->
  <?php include 'includes/footer.php';?>
    <!-- END FOOTER -->



    <!-- ================================================
    Scripts
    ================================================ -->
    
    

	    <script type="text/javascript">
    $("#formValidate").validate({
        rules: {
			<?php
			$result = mysqli_query($con, "SELECT * FROM branch where status!='R'");
			while($row = mysqli_fetch_array($result))
			{?>
				<?=$row["id"]?>_name:{
				required: true,
				minlength: 5
				},
				<?=$row["id"]?>_location:{
				required: true,	
				min: 0
				},
				<?=$row["id"]?>_fromtime:{
        required: true
        },
        <?=$row["id"]?>_totime:{
        required: true
        },
				<?=$row["id"]?>_stdate:{
        required: true
        },
				<?=$row["id"]?>_totaltable:{
        required: true, 
        min: 1
        },
				<?=$row["id"]?>_totalchef:{
        required: true
        },
				<?=$row["id"]?>_totalwaiter:{
        required: true
        },
			<?php }?>
    },
		
        messages: {
			<?php
			$result = mysqli_query($con, "SELECT * FROM branch where status!='R'");
			while($row = mysqli_fetch_array($result))
			{  ?>
				<?=$row["id"]?>_name:{
				required: "Enter item name",
				minlength: "Minimum length is 3 characters",
				},
				<?=$row["id"]?>_location:{
        required: "Enter Location name",
        min: 0
        },
				<?=$row["id"]?>_fromtime:{
        required: "Enter Start Time",
        },   
         <?=$row["id"]?>_totime:{
        required: "Enter Closing Time",
        },
				<?=$row["id"]?>_stdate:{
        required: "Enter Start Date",
        },
				<?=$row["id"]?>_totaltable:{
        required: "Enter Total Tables",
        min: "Minimum tables is 1"
        },
				<?=$row["id"]?>_totalchef:{
        required: "Enter Total Chef",
        },
				<?=$row["id"]?>_totalwaiter:{
       required: "Enter Total Waiter",
        },
      <?php }?>
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
    <script type="text/javascript">
    $("#formValidate1").validate({

        rules: {
		name: {
				required: true,
				minlength: 2
			},
      location: {
        required: true,
        minlength: 2
      },
      from_time: {
        required: true
      },
      to_time: {
        required: true
      },
      st_date: {
        required: true
      },
      total_table: {
        required: true,
        minlength: 1
      },
		
	},
        messages: {
		name: {
				required: "Enter item name",
				minlength: "Minimum length is 2 characters"
			},
      location: {
        required: "Enter Location",
        minlength: "Minimum length is 2 characters"
      },
      from_time: {
        required: "Select Starting Time"
      },
      to_time: {
        required: "Select Closing Time"
        
      },
      st_date: {
        required: "Select Opening Date"
        
      },
      total_table: {
        required: "Enter Total Tables",
        minlength: "Minimum table is 1"
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