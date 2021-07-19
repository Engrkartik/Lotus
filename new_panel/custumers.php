<?php
include('include/header.php');
$chk=mysqli_query($con,"SELECT * FROM `admin` WHERE id='$admin_id'");
$f_chk=mysqli_fetch_assoc($chk);
?>

<div class="page has-sidebar-left height-full">
    <header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon-group"></i>
                        Customers
                    </h4>
                </div>
            </div>
            <div class="row justify-content-between">
                <ul class="nav nav-material nav-material-white responsive-tab" id="v-pills-tab" role="tablist">
                    <li>
                        <a class="nav-link active" id="v-pills-all-tab" data-toggle="pill" href="custumers.php"
                           role="tab" aria-controls="v-pills-all"><i class="icon icon-people"></i>All Customers</a>
                    </li>
                    <li class="float-right">
                        <a class="nav-link"  href="add_cust.php"><i class="icon icon-user-plus"></i> Add New Customers</a>
                       
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <div class="container-fluid animatedParent animateOnce">
        <div class="tab-content my-3" id="v-pills-tabContent">
            <div class="tab-pane animated fadeInUpShort show active" id="v-pills-all" role="tabpanel" aria-labelledby="v-pills-all-tab">
              <div class="row">
                    <div class="col-md-5">
                  <div class="input-group">
                   
                    <input type="text" name="table_search" class="form-control float-right" id="myInput" placeholder="Search" onkeyup="myFunction3();">
                    
                    <!-- <div class="input-group-append"> -->
                      <!-- <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button> -->
                    </div>
                  </div>
                </div>
                <div class="row my-3">
                    <div class="col-md-12">
                        <div class="card r-0 shadow">
                            <div class="table-responsive">
                                <form>
                                    <table class="table table-striped table-hover r-0" id="myTable">
                                        <thead>
                                        <tr class="no-b">
                                            
                                        <th style="width: 2px;">S.NO</th>
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
                                      <button type="button" class="btn btn-primary dropdown-toggel" data-toggle="dropdown"  <?php
                  if($f_chk['access']=="All")
                  {
                    echo "disabled='true'";
                  }
                  ?> >Active&nbsp;<i class="fa fa-angle-down"></i></button>
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
                                        <button type="button" class="btn btn-danger dropdown-toggel" data-toggle="dropdown" <?php
                  if($f_chk['access']=="All")
                  {
                    echo "disabled='true'";
                  }
                  ?>>De-active&nbsp;<i class="fa fa-angle-down"></i></button>
                                         <div id="Demo" class="dropdown-menu">
                                        <!-- <a class="dropdown-item" onclick="act('P','<?=$row["id"]?>')">PENDING</a><br> -->
                                        <a class="dropdown-item" onclick="act('A','<?=$row["id"]?>')">ACTIVE</a>

                                      </div>
                                      </div>
                                    <?php }else{?>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-warning waves-effect dropdown-toggel" data-toggle="dropdown" <?php
                  if($f_chk['access']=="All")
                  {
                    echo "disabled='true'";
                  }
                  ?>>Pending&nbsp;<i class="fa fa-angle-down"></i></button> <div class="dropdown-menu">
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
                                              <?php
                  if($f_chk['access']!="All")
                  {
                    ?>  <a href="edit_custumer.php?cust_id=<?=$row['id']?>">&nbsp;<i class="icon-pencil"></i></a>
                  <?php }
                  ?>
                                                <!-- <a href="view_cust.php?id=<?=$row['id']?>">&nbsp;<i class="fa fa-eye"></i></a> -->
                                                <!-- <a href="#">&nbsp;<i class="fa fa-trash" onclick="del('<?=$row["id"]?>')"></i></a> -->

                                            <!-- </div> -->
                                        </td>
                                    
                                    </tr>
                                    <?php }?>
                                </tbody>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
    <!--Add New Message Fab Button-->
    <a href="add_cust.php" class="btn-fab btn-fab-md fab-right fab-right-bottom-fixed shadow btn-primary"><i
            class="icon-add"></i></a>
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
        window.location.href="custumers.php";

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
        window.location.href="custumers.php";

    }
 });
}
    }


function myFunction3() {
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
</script>

            <?php
            include('include/footer.php');
            ?>