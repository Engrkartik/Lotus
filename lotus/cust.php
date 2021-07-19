
<?php
include('include/header.php');
?>
 <style type="text/css">

.dropbtn:hover, .dropbtn:focus {
  background-color: #2980B9;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  overflow: auto;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown a:hover {background-color: #ddd;}

.show {display: block;}

    .dropdown-content a:hover {background-color: #ddd;}

.dropdown:click .dropdown-content {display: block;}

.dropdown:click .dropbtn {background-color: blue;}
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
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><a href="cust_detail.php"><button class="btn btn-primary">Add Customer</button></a></h3>

                <div class="card-tools">
                  <div class="input-group" style="width: 160px;">
                    <input type="text" name="table_search" class="form-control float-right" id="myInput" onkeyup="myFunction()" placeholder="Search">

                   <!--  <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div> -->
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-hover text-nowrap" id="myTable">
                  <thead>
                    <tr>
                     <th>S.NO</th>
                                        <th>FIRM NAME</th>
                                        <th>OWNER NAME</th>
                                        <th>BUSINESS TYPE</th>
                                        <!-- <th>GSTIN/UIN NUMBER</th> -->
                                        <th>CONTACT NUMBER</th>
                                        <th>ADDRESS</th>
                                        <th>STATUS</th>
                                        <th>ACTION</th>
                    </tr>
                  </thead>
                  <tbody>
                                    <?php
                                        $query=mysqli_query($con,"SELECT * FROM `company_reg` where `STATUS`!='R' and aid='$admin_id' order by id desc");
                                        while ($row=mysqli_fetch_assoc($query)) {
                                            
                                        $sn++;
                                    ?>
                                    <tr>
                                        <th scope="row"><?php echo $sn;?></th>
                                        <td><?php echo $row['FIRM_NAME'];?></td>
                                        <td><?php echo $row['OWNER_NAME'];?></td>
                <td><?php if($row['BUSINESS']=='W'){echo "Wholesale";}else{echo "Retailer";};?></td>
                                        <!-- <td><?php echo $row['GSTIN_NO'];?></td> -->
                                        <td><?php echo $row['CONTACT_NO'];?></td>
                                        <td><textarea style="width: 100%" rows="4" disabled=""><?php echo $row['ADDRESS'];?></textarea></td>
                                        <td ><?php if($row['STATUS']=='A')
                                        {
                                    ?>
                                    <div class="dropdown">
                                      <button type="button" class="btn btn-primary dropdown-toggel" data-toggle="dropdown">Active&nbsp;<i class="fa fa-angle-down"></i></button>
                                      <div id="Demo" class="dropdown-menu">
                                        <!-- <a class="dropdown-item" onclick="act('P','<?=$row["id"]?>')">PENDING</a><br> -->
                                        <a class="dropdown-item" onclick="act('D','<?=$row["id"]?>')">DEACTIVE</a>

                                      </div>
                                      </div>
                                    <?php 
                                        }
                                        elseif($row['STATUS']=='D')
                                        {
                                        ?>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-danger dropdown-toggel" data-toggle="dropdown">De-active&nbsp;<i class="fa fa-angle-down"></i></button>
                                         <div id="Demo" class="dropdown-menu">
                                        <!-- <a class="dropdown-item" onclick="act('P','<?=$row["id"]?>')">PENDING</a><br> -->
                                        <a class="dropdown-item" onclick="act('A','<?=$row["id"]?>')">ACTIVE</a>

                                      </div>
                                      </div>
                                    <?php }else{?>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-warning waves-effect dropdown-toggel" data-toggle="dropdown">Pending&nbsp;<i class="fa fa-angle-down"></i></button> <div class="dropdown-menu">
                                        <a class="dropdown-item" onclick="act('A','<?=$row["id"]?>')">ACTIVE</a><br>
                                        <a class="dropdown-item" onclick="act('D','<?=$row["id"]?>')">DEACTIVE</a>

                                      </div>
                                      </div>
                                        <?php
                                    }
                                            ?></td>
                                            <td style="display: none;"><?php if($row['STATUS']=='A')
                                        {
                                    ?>
                                   ACTIVE
                                    <?php 
                                        }
                                        elseif($row['STATUS']=='D')
                                        {
                                        ?>
                                    DEACTIVE
                                    <?php }else{?>
                                    
                                       PENDING
                                        <?php
                                    }
                                            ?></td>

                                        <td>
                                            <!-- <div class=""> -->
                                                <a href="edit_cust.php?cust_id=<?=$row['id']?>">&nbsp;<i class="fa fa-edit"></i></a>
                                                <!-- <a href="view_cust.php?id=<?=$row['id']?>">&nbsp;<i class="fa fa-eye"></i></a> -->
                                                <!-- <a href="#">&nbsp;<i class="fa fa-trash" onclick="del('<?=$row["id"]?>')"></i></a> -->

                                            <!-- </div> -->
                                        </td>
                                    
                                    </tr>
                                    <?php }?>
                                </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <script type="text/javascript">
        //clickable

        function myFunction2(tr) {
    document.getElementById("Demo")[tr].classList.toggle("show");

}
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}

        //activate deativate	

 function act(str,c_id) {
       var r = confirm("Are you sure.?");
       var type="Update";
if (r == true) {
 $.ajax({
    type:'POST',
    url:'save_data.php',
    data:{'type':type,'do':str,'c_id':c_id},
    success:function(res) {
        // alert(res);
        window.location.href="cust.php";

    }
 });
}
    }

//delete

        	function del(c_id) {
       var r = confirm("Are you sure.?");
       var type="Del";
if (r == true) {
 $.ajax({
    type:'POST',
    url:'save_data.php',
    data:{'type':type,'c_id':c_id},
    success:function(res) {
        // alert(res);
        window.location.href="cust.php";

    }
 });
}
    }


function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
 for (i = 0; i < tr.length; i++) {
  td = tr[i].getElementsByTagName("td")[0];
 
    if (td) {
        txtValue = td.textContent || td.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          }
    else {    
  td = tr[i].getElementsByTagName("td")[1];
 
    if (td) {
        txtValue = td.textContent || td.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          }else {    
  td = tr[i].getElementsByTagName("td")[3];
 
    if (td) {
        txtValue = td.textContent || td.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          }
    else {
         td = tr[i].getElementsByTagName("td")[4];
 
    if (td) {
        txtValue = td.textContent || td.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          }
    else {
           td = tr[i].getElementsByTagName("td")[6];
 
    if (td) {
        txtValue = td.textContent || td.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          }
    else {
         tr[i].style.display = "none";
         }
       }       
    }
         }
       }       
    }  
}
}
}
}
}
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