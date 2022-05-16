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
                <h5 class="breadcrumbs-title">Category</h5>
              </div>
            </div>
          </div>
        </div>
        <!--breadcrumbs end-->


        <!--start container-->
        <div class="container">
          <div class="divider"></div>
           <form class="formValidate" id="formValidate1" method="post" action="routers/add-cat.php" novalidate="novalidate">
            <div class="row">
              <div class="col s12 m4 l3">
                <h4 class="header btn btn-primary" onclick="show_add_item()">Add Category</h4>
              </div>

              <div id="add_item" style="display: none;">
              <table class="table table-bordered" >
                <thead>
                  <tr>
                    <th data-field="name" style="text-align: center;vertical-align: middle;" rowspan="2">Category Name</th>
                    <th data-field="name" style="text-align: center;vertical-align: middle;" rowspan="2">Branch Name</th>      
                    </thead>

                    <tbody>
        <?php

          echo '<tr><td><div class="input-field col s12"><label for="name">Name</label>';
          echo '<input id="name" name="name" type="text" data-error=".errorTxt01"><div class="errorTxt01"></div></td>'; 

          echo '<td><div class="input-field col s12"><label for="name"></label>';
          echo '<select id="location" name="location">';
          $branch = mysqli_query($con, "SELECT * FROM `branch` where status='A'");
                  echo '<option selected="true" disabled="disabled">choose..</option>';
                      while($row1 = mysqli_fetch_array($branch))
                      {
                  echo '<option value="'.$row1["id"].'">'.$row1['name'].'</option>';
               }
               echo '  </select></td>';

          // echo '<input id="location" name="location" type="text" data-error=".errorTxt02"><div class="errorTxt02"></div></td>';
            
          echo '</tr>';
        ?>
        </tbody>
      </table>
              </div>
              <div class="input-field col s12" id="add_btn" style="display: none;">
                <button class="btn cyan waves-effect waves-light right" type="submit" onclick="addval()" name="action">Add
                <i class="mdi-content-send right"></i></button>
              </div>
            </div>
      </form>   
		  <form class="formValidate" id="formValidate" method="post" action="routers/cat_update.php" novalidate="novalidate">
            <div class="row">
              <div class="col s12 m4 l3">
                <h4 class="header">Category List</h4>
              </div>
              <div>
				      <table id="data-table-admin" class="table display table-bordered" cellspacing="0">
                    <thead>
                      <tr>
                        <th>S.no</th>
                        <th>Category Name</th>
                        <th>Branch Name</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>

                    <tbody>
              			<?php
              				$result = mysqli_query($con, "SELECT category.*, branch.name as bname FROM `category` left JOIN branch on category.bid = branch.id where category.status!='R'");
              				while($row = mysqli_fetch_array($result))
              				{
                        	$sn++;
              					echo '<tr><td>'.$sn.'</td>';

              					echo '<td><div class="input-field col s12"><label for="'.$row["id"].'_name">Name</label>
              					<input value="'.$row["name"].'" id="'.$row["id"].'_name" name="'.$row['id'].'_name" type="text" data-error=".errorTxt'.$row["id"].'"><div class="errorTxt'.$row["id"].'"></div></td>';

                        		// echo '<td><div class="input-field col s12"><label for="'.$row["id"].'_name">Location</label>
                        		// <input value="'.$row["bname"].'" id="'.$row["id"].'_bname" name="'.$row['id'].'_bname" type="text" data-error=".errorTxt'.$row["id"].'"><div class="errorTxt'.$row["id"].'"></div></td>';    
                        echo '<td><div class="input-field col s12">';
              					echo '<select id="location" name="'.$row['id'].'_bname">';

						            $branch1=mysqli_query($con,"SELECT * FROM `branch` where status='A' and id!='".$row['bid']."'");
						            echo '<option selected="true" disabled="disabled">'.$row["bname"].'</option>';
  						            while($row2 = mysqli_fetch_array($branch1))
  						            {
  						               echo '<option value="'.$row2["id"].'">'.$row2['name'].'</option>';
  						            }
						            echo '</select></td>';

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
	                                    <option value="A"'.$text1.'>Active</option>
	                                    <option style="color: red" value="D"'.$text2.'>De-Active</option>
	                                  </select></td>
	                                  <td><i class="fa fa-trash" style="cursor:pointer;" onclick="del('.$row["id"].',\'category\')"></i></td></tr>';
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
       </section><br><br><br><br>
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
			$result = mysqli_query($con, "SELECT * FROM category");
			while($row = mysqli_fetch_array($result))
			{
				echo $row["id"].'_name:{
				required: true,
				minlength: 5,
				maxlength: 30 
				},';
				echo $row["id"].'_price:{
				required: true,	
				min: 0
				},';				
			}
		echo '},';
		?>
        messages: {
			<?php
			$result = mysqli_query($con, "SELECT * FROM items");
			while($row = mysqli_fetch_array($result))
			{  
				echo $row["id"].'_name:{
				required: "Ener item name",
				minlength: "Minimum length is 5 characters",
				maxlength: "Maximum length is 20 characters"
				},';
								
			}
		echo '},';
		?>
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
				minlength: 3
			},
		
	},
        messages: {
		name: {
				required: "Enter item name",
				minlength: "Minimum length is 3 characters"
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
    function addval(){
      var cat = document.getElementById('name').length.value;
      // var nameLenght = element.name.value.lenght;
      alert(cat);
    
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