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
                <h5 class="breadcrumbs-title">Food Menu</h5>
              </div>
            </div>
          </div>
        </div>
        <!--breadcrumbs end-->


        <!--start container-->
        <div class="container">
          <div class="divider"></div>
           <form class="formValidate" id="formValidate1" method="post" action="routers/add-item.php" novalidate="novalidate">
            <div class="row">
              <div class="col s12 m4 l3">
                <h4 class="header btn btn-primary" onclick="show_add_item()">Add Item</h4>
              </div>
              <div id="add_item" style="display: none;">
              <table>
                    <thead>
                      <tr>
                        <th data-field="id">Name</th>
                        <th data-field="piece">Piece</th>
                        <th data-field="name">Item Price</th>
                        <th data-field="cat">Category</th>
                        <th data-field="branch">Branch</th>
                      </tr>
                    </thead>

                    <tbody>
                    <?php
                      echo '<tr><td><div class="input-field col s12"><label for="name">Name</label>';
                      echo '<input id="name" name="name" type="text" data-error=".errorTxt01"><div class="errorTxt01"></div></td>';

                      echo '<td><div class="input-field col s12 "><label for="piece" class=""></label>';
                      echo '<select id="piece" name="piece">
                            <option value="F">Full</option>
                            <option value="H">Half</option>';
                      echo '</select></td>';

                      echo '<td><div class="input-field col s12 "><label for="price" class="">Price</label>';
                      echo '<input id="price" name="price" type="text" data-error=".errorTxt02"><div class="errorTxt02"></div></td>';
                      echo '<td><div class="input-field col s12 "><label for="Category" class=""></label>';
                      echo '<select id="category" name="category">';
                            $category = mysqli_query($con, "SELECT * FROM `category` where status='A'");
                                echo '<option selected="true" disabled="disabled">choose..</option>';
                                while($row_cat = mysqli_fetch_array($category))
                                {
                                    echo '<option value="'.$row_cat["id"].'">'.$row_cat['name'].'</option>';
                                }
                      echo '</select></td>';

                      echo '<td><div class="input-field col s12 "><label for="Branch" class=""></label>';
                      echo '<select id="branch" name="branch">';
                            $branch = mysqli_query($con, "SELECT * FROM `branch` where status='A'");
                                echo '<option selected="true" disabled="disabled">choose..</option>';
                                while($row1 = mysqli_fetch_array($branch))
                                {
                                    echo '<option value="'.$row1["id"].'">'.$row1['name'].'</option>';
                                }
                      echo '</select></td>';

                      echo '<td></tr>';
                    ?>
                    </tbody>
              </table>
              </div>
        <div class="input-field col s12" id="add_btn" style="display: none;">
          <button class="btn cyan waves-effect waves-light right" type="submit" name="action">Add<i class="mdi-content-send right"></i></button>
        </div>
        </div>
      </form>   
		  <form class="formValidate" id="formValidate" method="post" action="routers/menu-router.php" novalidate="novalidate">
            <div class="row">
              <div class="col s12 m4 l3">
                <h4 class="header">Food List</h4>
              </div>
              <div>
				<table class="table table-responsive display" cellspacing="0">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Piece</th>
                        <th>Price</th>
                        <th>Category</th>
                        <th>Branch</th>
                        <th>Available</th>
                        <th>Action</th>
                      </tr>
                    </thead>

                    <tbody>
				<?php
				$result = mysqli_query($con, "SELECT * FROM items where status!='R'");
				while($row = mysqli_fetch_array($result))
				{
					echo '<tr><td><div class="input-field"><label for="'.$row["id"].'_name">Name</label>';
					echo '<input style="text-align: center;" value="'.$row["name"].'" id="'.$row["id"].'_name" name="'.$row['id'].'_name" type="text" data-error=".errorTxt'.$row["id"].'"><div class="errorTxt'.$row["id"].'"></div></div></td>';

          echo '<td><div class="input-field"><label for="'.$row["id"].'_piece">Piece</label>';
          echo '<input style="text-align: center;" value="'.$row["piece"].'" id="'.$row["id"].'_piece" name="'.$row['id'].'_piece" type="text" data-error=".errorTxt'.$row["id"].'"><div class="errorTxt'.$row["id"].'"></div></div></td>';		

					echo '<td><div class="input-field"><label for="'.$row["id"].'_price">Price</label>';
          echo '<input style="text-align: center;" value="'.$row["price"].'" id="'.$row["id"].'_price" name="'.$row['id'].'_price" type="number" data-error=".errorTxt'.$row["id"].'"><div class="errorTxt'.$row["id"].'"  onkeydown="javascript: return event.keyCode === 8 ||
            event.keyCode === 46 ? true : !isNaN(Number(event.key))"></div></td>';
          /////////////////////////////////////////category///////////////////////////////////////////////////////
          echo '<td><div class="input-field">';
          echo '<select id="location" name="'.$row['id'].'_cat">';

          $sel_cat = mysqli_query($con,"SELECT * FROM `category` where status='A' and id='".$row['category']."'");
          $f_cat = mysqli_fetch_array($sel_cat);
          $show_cat = $f_cat['name'];
          $cat1=mysqli_query($con,"SELECT * FROM `category` where status='A' and id!='".$row['category']."'");
          echo '<option selected="true" disabled="disabled">'.$show_cat.'</option>';
                while($row3 = mysqli_fetch_array($cat1))
                {
                   echo '<option value="'.$row3["id"].'">'.$row3['name'].'</option>';
                }
          echo '</select></td>';
          ////////////////////////////////////////////branch//////////////////////////////////////////////////////
          echo '<td><div class="input-field">';
          echo '<select id="location" name="'.$row['id'].'_bname">';

          $sel_branch = mysqli_query($con,"SELECT * FROM `branch` where status='A' and id='".$row['branch']."'");
          $f_branch = mysqli_fetch_array($sel_branch);
          $show_b = $f_branch['name'];
          $branch1=mysqli_query($con,"SELECT * FROM `branch` where status='A' and id!='".$row['branch']."'");
          echo '<option selected="true" disabled="disabled">'.$show_b.'</option>';
                while($row2 = mysqli_fetch_array($branch1))
                {
                   echo '<option value="'.$row2["id"].'">'.$row2['name'].'</option>';
                }
          echo '</select></td>';
		  ////////////////////////////////////end branch////////////////////////////////////////////////////			                   
					echo '<td><div class="input-field"><label for="'.$row["id"].'_name"></label>';
					if($row['deleted'] == 0){
						$text1 = 'selected';
						$text2 = '';
					}
					else{
						$text1 = '';
						$text2 = 'selected';						
					}
					echo '<select name="'.$row['id'].'_hide">
                      <option value="1"'.$text1.'>Available</option>
                      <option value="2"'.$text2.'>Not Available</option>
                    </select></td></div>
                    <td><i class="fa fa-trash" style="cursor:pointer;" onclick="del('.$row['id'].',\'admin-page\')"></i></td></tr>';
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
		 	
            <div class="divider"></div>
            
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
			$result = mysqli_query($con, "SELECT * FROM items");
			while($row5 = mysqli_fetch_array($result))
			{
				echo $row5["id"].'_name:{
				required: true,
				minlength: 5,
				maxlength: 20 
				},';
				echo $row5["id"].'_price:{
				required: true,	
				min: 0
				},';				
			}
		echo '},';
		?>},
        messages: {
			<?php
			$result = mysqli_query($con, "SELECT * FROM items");
			while($row5 = mysqli_fetch_array($result))
			{  
				echo $row5["id"].'_name:{
				required: "Ener item name",
				minlength: "Minimum length is 5 characters",
				maxlength: "Maximum length is 20 characters"
				},';
				echo $row5["id"].'_price:{
				required: "Ener price of item",
				min: "Minimum item price is Rs. 0"
				},';				
			}
		echo '},';
		?>
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
				minlength: 3
			},
		price: {
				required: true,
				min: 1
			},
	},
        messages: {
		name: {
				required: "Enter item name",
				minlength: "Minimum length is 3 characters"
			},
		 price: {
				required: "Enter item price",
				minlength: "Minimum item price is Rs.1"
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