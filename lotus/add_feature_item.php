
<?php
include('include/header.php');
$type=$_GET['key'];

?>
 <style type="text/css">


.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

    .dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: blue;}
/*/////////////////////////////loader/////////////////////////////////////////////////////*/
.no-js #loader { display: none;  }
.js #loader { display: block; position: absolute; left: 100px; top: 0; }
.se-pre-con {
  position: fixed;
  left: 0px;
  top: 0px;
  width: 100%;
  height: 100%;
  z-index: 9999;
  background: url(images/Preloader_2.gif) center no-repeat #fff;
}
/*/////////////////////////////End loader/////////////////////////////////////////////////////*/
  </style>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>
   <div class="se-pre-con"></div>


<div class="row">
          <div class="col-12">
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title"><?php echo "Add Feature Item";?></h3>
              </div><br>
                

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <!-- <input type="text" name="table_search" class="form-control float-right" id="myInput" onkeyup="myFunction()" placeholder="Search"> -->

                    <div class="input-group-append">
                      <!-- <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button> -->
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card"  >
              <div class="card-body table-responsive p-0" style="width: 50%;margin-left: 10%;"><br>
                <select id="new_id" class="form-control" style="text-align: center;">
                     <option disabled="true" selected="selected">Select Product</option>
                     
                      <?php
                        // $query1=mysqli_query($con,"SELECT * FROM `product` where `aid`='$admin_id'");
                        $query1=mysqli_query($con,"SELECT id, item_name FROM product WHERE id NOT IN (SELECT pid FROM product_order WHERE feature !=0 AND status = 'A') and status='A'");
                        while ($row1=mysqli_fetch_assoc($query1)) {
                          // $item1 = $row1['item_name'];
                      ?>
                      <option value="<?=$row1['id']?>"><?=$row1['item_name']?></option>      

                     <?php }?>
                     </select>
                </div><br>
                  <div class="col-md-12" style="width: 50%;margin-left: 10%;">
                        <div class="form-group ">
                                  <div class=" col-md-6 col-sm-9">
                  <button type="button" class="btn btn-primary" onclick="save_data();">Add</button>
                  <a href="feature.php" ><button type="button" class="btn btn-primary">Back</button></a>
              
                  </div> 
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <script type="text/javascript">
        
function save_data() {
    var new_id=document.getElementById('new_id').value;
    var type='Feature';
    var aid = '<?php echo $admin_id;?>';

    // var res = new_id.split("~");
    // var scode = res[0];
    // var code = res[1];
    // var partyname = res[2];
    // var designcatcode = res[3];

    // alert(new_id);
   $.ajax({

      type:'POST',
      url:'save_section.php',
      // url:'save_feature.php',
      data:{'new_id':new_id,'type':type},
      success:function(res) {
        // alert(res);
        if(res=="Success")
        {
          alert(res);
        window.location.href='feature.php';            
         
      }else{
        alert(res);
      }
      }
    });
  }
   ////////////////////////loader///////////////////////////////////////////////////
$(window).load(function() {
    // Animate loader off screen
    $(".se-pre-con").fadeOut("slow");;
  });
  /////////////////////////////////end loader////////////////////////////////////  
        </script>
<?php
include('include/footer.php');
?>