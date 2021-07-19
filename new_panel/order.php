
<?php
include('include/header.php');
$today=date('Y-m-d'); 
?>

  <div class="page has-sidebar-left height-full">
  <header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon-package"></i>
                        Orders
                    </h4>
                </div>
            </div>
            <div class="row">
                <ul class="nav responsive-tab nav-material nav-material-white">
                    <li>
                        <a class="nav-link active" href="orders.php"><i class="icon icon-list"></i>All Orders</a>
                    </li>
                    
                </ul>
            </div>
        </div>
    </header>

    <div class="container-fluid animatedParent animateOnce my-3">
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #33B5E5;">
        <h3 class="modal-title" id="exampleModalLabel" style="font-size: 20px; font-weight: 600;color: #fff;">Date Filter</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-6">
              <label style="font-size: 18px;">From Date</label>
              <input type="date" class="form-control" id="from_dt" onchange="to_date()">
            </div>
             <div class="col-md-6">
              <label style="font-size: 18px;">To Date</label>
              <input type="date" class="form-control" id="to_dt" max="<?=$today?>" onchange="from_date()">
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="filter_dt()" data-dismiss="modal">Save changes</button>
      </div>
    </div>
  </div>
</div>
        <div class="animated fadeInUpShort">
             <div class="row">
               <div class="col-md-4">
                  <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Date Filter</button>                    
                  </div>
                   <div class="col-md-4">
                      <select class="form-control" id="input2" onchange="myFunction2()">
                        <option style="color: grey;" disabled="" selected="">Status Filter</option>
                        <option value="">All</option>
                        <option value="confirm">Confirm</option>
                        <option value="pending">Pending</option>
                        <option value="hold">Hold</option>
                        <option value="cancel">Cancel</option>

                      </select>
                    </div>
                    <div class="col-md-4">
                  <div class="input-group">
                   
                    <input type="text" name="table_search" class="form-control float-right" id="myInput" onkeyup="myFunction3()" placeholder="Search">

                    <!-- <div class="input-group-append"> -->
                      <!-- <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button> -->
                    </div>
                  </div>
                </div>
                <br>
            <div class="row">
                <div class="col-md-12">
                    <div class="card no-b shadow">
                         
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover" id="myTable">
                                  <thead>
                                    <tr>
                                        <th>S.NO</th>
                                        <th>ORDER ID</th>
                                        <th>DATE</th>
                                        <th>FIRM NAME</th>
                                        <th>CONTACT NUMBER</th>
                                        <th>QTY</th>
                                        <th>AMOUNT</th>
                                        <th>SUPPLIER REMARK</th>
                                        <th>STATUS</th>
                                        <th>ACTION</th>
                                         </tr>
                                       </thead>
                                       <tbody>
                  <?php
                  $query=mysqli_query($con,"SELECT * FROM `manage_order` WHERE aid='$admin_id' order by id desc");
                  while($row=mysqli_fetch_assoc($query))
                  {
                    $sn++;
                  ?>
                   <tr>
                     <td><?php echo $sn;?></td>
                     <td><?php echo $row['order_id'];?></td>
                     <td><?php echo $row['date'];?></td>
                     <td><?php echo $row['firm_name'];?></td>
                     <td><?php echo $row['mobile'];?></td>
                     <td><?php echo $row['quantity'];?></td>
                     <td><?php echo round($row['amount'],0);?></td>
                     <td id="new_rem"><textarea onfocusout="edit_rem('<?=$sn?>','<?=$row["id"]?>')" rows="2"><?php echo $row['remark'];?></textarea></td>

                     <td>
                      <?php if($row['status']=='Pending')
                                        {
                        ?>
                        <div class="dropdown">
                          <button type="button" class="btn btn-warning waves-effect dropdown-toggel " data-toggle="dropdown" value="PENDING">PENDING&nbsp;<i class="fa fa-arrow-down"></i></button>
                          <div id="Demo" class="dropdown-menu">
                            <a class="dropdown-item" onclick="act('Confirm','<?=$row["id"]?>')">CONFIRM</a><br>
                            <a class="dropdown-item" onclick="act('Hold','<?=$row["id"]?>')">HOLD</a><br>
                            <a class="dropdown-item" onclick="act('Cancel','<?=$row["id"]?>')">CANCEL</a>

                          </div>
                          </div>
                        <?php 
                            }elseif($row['status']=='Confirm')
                            {
                        ?>
                        <div class="dropdown">
                          <button type="button" class="btn btn-primary waves-effect dropdown-toggel" data-toggle="dropdown" value="CONFIRM">CONFIRM&nbsp;<i class="fa fa-arrow-down"></i></button>
                          <div id="Demo" class="dropdown-menu">
                            <a class="dropdown-item" onclick="act('Pending','<?=$row["id"]?>')">PENDING</a><br>
                             <a class="dropdown-item" onclick="act('Hold','<?=$row["id"]?>')">HOLD</a><br>
                            <a class="dropdown-item" onclick="act('Cancel','<?=$row["id"]?>')">CANCEL</a>

                          </div>
                          </div>
                        <?php 
                            }elseif($row['status']=='Cancel')
                            {
                        ?>
                        <div class="dropdown">
                          <button type="button" class="btn btn-danger waves-effect dropdown-toggel" data-toggle="dropdown" value="CANCEL">CANCEL&nbsp;<i class="fa fa-arrow-down"></i></button>
                          <div id="Demo" class="dropdown-menu">
                            <a class="dropdown-item" onclick="act('Confirm','<?=$row["id"]?>')">CONFIRM</a><br>
                             <a class="dropdown-item" onclick="act('Hold','<?=$row["id"]?>')">HOLD</a><br>
                            <a class="dropdown-item" onclick="act('Pending','<?=$row["id"]?>')">PENDING</a>

                          </div>
                          </div>
                        <?php 
                            } elseif($row['status']=='Hold')
                            {
                        ?>
                        <div class="dropdown">
                          <button type="button" class="btn btn-info waves-effect dropdown-toggel" data-toggle="dropdown" value="HOLD">HOLD&nbsp;<i class="fa fa-arrow-down"></i></button>
                          <div id="Demo" class="dropdown-menu">
                            <a class="dropdown-item" onclick="act('Confirm','<?=$row["id"]?>')">CONFIRM</a><br>
                             <a class="dropdown-item" onclick="act('Cancel','<?=$row["id"]?>')">CANCEL</a><br>
                            <a class="dropdown-item" onclick="act('Pending','<?=$row["id"]?>')">PENDING</a>

                          </div>
                          </div>
                        <?php 
                            }?>
                    </td>
                     <td>
                      <a href="view_order.php?id=<?=$row['order_id']?>">&nbsp;<i class="icon-eye"></i></a>
                        
                    </td>
                    <td style="display: none;"><?php echo $row['status'];?></td>

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
      </div>
    </div>
  </div>
</div>
   <script type="text/javascript">
       
function myFunction3() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
 for (i = 0; i < tr.length; i++) {
  td = tr[i].getElementsByTagName("td")[1];
 
    if (td) {
        txtValue = td.textContent || td.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          }
           else {    
  td = tr[i].getElementsByTagName("td")[2];
 
    if (td) {
        txtValue = td.textContent || td.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          }
    else {    
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
          else{
           td = tr[i].getElementsByTagName("td")[7];
 
    if (td) {
        txtValue = td.textContent || td.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          }
    else {
           td = tr[i].getElementsByTagName("td")[10];
 
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
}
}
}
}
function myFunction2() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("input2");
  // alert(input);
loader.style.display='';

  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
 for (i = 0; i < tr.length; i++) {
 
           td = tr[i].getElementsByTagName("td")[10];
 
    if (td) {
        txtValue = td.textContent || td.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
          loader.style.display='none';

            tr[i].style.display = "";
          }
    else {
loader.style.display='none';

         tr[i].style.display = "none";
         }
       }       
    }
  }       
    

function act(str,o_id) {
       var r = confirm("Are you sure.?");
       var type="Order";
       // alert(str);
if (r == true) {
 $.ajax({
    type:'POST',
    url:'save_data.php',
    data:{'type':type,'do':str,'o_id':o_id},
    success:function(res) {
        // alert(res);
        window.location.href="order.php";

    }
 });
}
    }

function edit_rem(td,oid) {
  var table=document.getElementById('myTable');
  var myCells = table.rows.item(td).cells;
  var rem=myCells['7'].firstChild.value;
  var type="rem";
loader.style.display='';
  // alert(rem);
  $.ajax({
    type:'POST',
    url:'del_disc.php',
    data:{'oid':oid,'rem':rem,'type':type},
    success:function(res) {
      // alert(res);
loader.style.display='none';

    }
  });
}


  function filter_dt() {
    var from_dt=document.getElementById('from_dt').value;
    var to_dt=document.getElementById('to_dt').value;
    var admin_id='<?=$admin_id?>';
    // alert(from_dt);
    $.ajax({
      type:'POST',
      url:'filter_order.php',
      data:{'from_dt':from_dt,'to_dt':to_dt,'admin_id':admin_id},
      success:function(res) {
        $('#myTable').html(res);
      }
    });
  }
  function to_date() {
  document.getElementById('to_dt').min=document.getElementById('from_dt').value;
}
 function from_date() {
  document.getElementById('from_dt').max=document.getElementById('to_dt').value;
}

</script>
<?php
include('include/footer.php');
?>