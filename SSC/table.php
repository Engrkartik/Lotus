<?php
include 'includes/connect.php';
include 'includes/header.php';
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
                <h5 class="breadcrumbs-title">Table</h5>
              </div>
            </div>
          </div>
        </div>
        <!--breadcrumbs end-->


        <!--start container-->
        <div class="container">
          <div class="divider"></div>
        <form class="formValidate" id="formValidate1" method="post" action="routers/add-table.php" novalidate="novalidate">
            <div class="row">
              <div class="col s12 m4 l3">
                <h4 class="header btn btn-primary" onclick="show_add_item()">Add Table</h4>
              </div>
              <div id="add_item" style="display: none;">
              <table class="table display table-bordered" >
                    <thead>
                      <tr>
                        <th data-field="number" style="text-align: center;vertical-align: middle;" >Table Number</th>
                        <th data-field="sitting" style="text-align: center;vertical-align: middle;" >No.of Sitting</th>
                        <th data-field="branch" style="text-align: center;vertical-align: middle;" >Branch</th>
                      </tr>
                     
                    </thead>

                    <tbody>
        	<tr><td><div class="input-field col s12"><label for="name">Table Number</label>
          <input id="table_no" name="table_no" type="text" data-error=".errorTxt01"><div class="errorTxt01"></div></td> 
          <td><div class="input-field col s12"><label for="phone_no">No.of Sitting</label>
          <input id="no_of_sitting" name="no_of_sitting" type="number" data-error=".errorTxt02">
          <div class="errorTxt02"></div></td>
          <td><div class="input-field col s12">
            <label for="branch"></label>
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
                <h4 class="header">Table List</h4>
              </div>
              <div>
				  <table class="table display table-bordered" cellspacing="0">
                    <thead>
                      <tr>
                        <th  style="vertical-align: middle;text-align: center;">#</th>
                        <th  style="vertical-align: middle;text-align: center;">Table Number</th>
                        <th  style="vertical-align: middle;text-align: center;">No.Of Sitting</th>
                        <th  style="vertical-align: middle;text-align: center;">Branch Name</th>
                        <th  style="vertical-align: middle;text-align: center;">Status</th>
                        <th  style="vertical-align: middle;text-align: center;">Action</th>
                      </tr>
                    </thead>

                    <tbody>
            				<?php
            				$result = mysqli_query($con, "SELECT tables.*,branch.name as b_name FROM `tables` LEFT JOIN branch on branch.id=tables.branch where tables.status!='delete'");
            				while($row = mysqli_fetch_array($result))
            				{
                      $sn++;
                      if($row['status']=='empty'){
                        $style= 'style="background-color:lightgreen;"';
                      }elseif($row['status']=='occupied'){
                       $style= 'style="background-color:lightgrey;"';}else{
                        $style='';
                       }
            					echo '<tr '.$style.'><td>'.$sn.'</td><td><div class="input-field col s12"><label for="'.$row["id"].'_name"></label>';
            					echo '<input value="'.$row["tables_no"].'" id="'.$row["id"].'_name" name="'.$row['id'].'_name" type="text" data-error=".errorTxt'.$row["id"].'"><div class="errorTxt'.$row["id"].'"></div></td>';
                      echo '<td><div class="input-field col s12"><label for="'.$row["id"].'_location"></label>';
                      echo '<input value="'.$row["sitting"].'" id="'.$row["id"].'_location" name="'.$row['id'].'_location" type="number" data-error=".errorTxt'.$row["id"].'"><div class="errorTxt'.$row["id"].'"></div></td>';			   
                       echo '<td><div class="input-field col s12"><label for="'.$row["id"].'_fromtime"></label>';
                      echo '<input value="'.$row["b_name"].'" id="'.$row["id"].'_fromtime" name="'.$row['id'].'_fromtime" type="text" data-error=".errorTxt'.$row["id"].'"><div class="errorTxt'.$row["id"].'"></div></td>
                      <td><b>'.ucfirst($row['status']).'</b></td>
                      <td><i class="fa fa-trash" style="cursor:pointer;" onclick="del('.$row['id'].',\'table\')"></i></td>';
            					echo '</tr>';
            				}?>
                    </tbody>
      </table>
              </div>
			  <div class=" input-field col s12">
            <button class="btn cyan waves-effect waves-light right" type="submit" name="action">Modify
              <i class="mdi-content-send right"></i>
            </button>
          </div>
            </div>
			</form>
          
            
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
		table_no: {
				required: true,
				minlength: 1
			},
      no_of_sitting: {
        required: true
      },
      branch: {
        required: true
      },
		
	},
        messages: {
		table_no: {
				required: "Enter Table Number",
				minlength: "Minimum length is 2 characters"
			},
      no_of_sitting: {
        required: "Enter Number Of Sitting",
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
