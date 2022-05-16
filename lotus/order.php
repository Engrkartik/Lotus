
<?php
include('include/header.php');
$today=date('Y-m-d');
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
.dropdown-item{
  cursor: pointer;
}
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
   <div class="se-pre-con" id="load"></div>

   
<div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                </h3>

                <div class="card-tools">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="row">
                  <div class="col-md-3">
                  <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Date Filter</button>
                    
                  </div>
                   <div class="col-md-4">
                      <select class="form-control" id="input2" onchange="myFunction2()">
                        <option style="color: grey;" disabled="" selected="">Filter</option>
                        <option value="">All</option>
                        <option value="confirm">Confirm</option>
                        <option value="pending">Pending</option>
                        <option value="hold">Hold</option>
                        <option value="cancel">Cancel</option>

                      </select>
                    </div>
                    <div class="col-md-3">
                  <div class="input-group" style="width: 160px;margin-right: 20px;">
                   
                    <input type="text" name="table_search" class="form-control float-right" id="myInput" onkeyup="myFunction()" placeholder="Search">

                    <!-- <div class="input-group-append"> -->
                      <!-- <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button> -->
                    </div>
                  </div>
                </div>
                </div>
                 </div>
                </div> 
              </div>
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: lightpink;">
        <h5 class="modal-title" id="exampleModalLabel" >Date Filter</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-6">
              <label>From Date</label>
              <input type="date" class="form-control" id="from_dt" onchange="to_date()">
                 <img src="images/cal.png" style="float: right;position: relative;margin-top: -25px;">
            </div>
             <div class="col-md-6">
              <label>To Date</label>
              <input type="date" class="form-control" id="to_dt" max="<?=$today?>" onchange="from_date()">
               <img src="images/cal.png" style="float: right;position: relative;margin-top: -25px;">
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer" style="background-color: lightpink;">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="filter_dt()" data-dismiss="modal">Save changes</button>
      </div>
    </div>
  </div>
</div>
              <!-- /.card-header -->
              <div class="card-body table-responsive">
                <table class="table table-hover text-nowrap" id="myTable">
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
                     <td><?php echo round($row['amount'],2);?></td>
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
                                            <!-- <div class=""> -->
                                                <a href="view_order.php?id=<?=$row['order_id']?>"><i class="fa fa-eye"></i></a>&nbsp;
                                                

                                            <!-- </div> -->
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
        <script type="text/javascript">
        var loader=document.getElementById('load');

function myFunction() {
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
  ////////////////////////loader///////////////////////////////////////////////////
$(window).load(function() {
    // Animate loader off screen
    $(".se-pre-con").fadeOut("slow");;
  });
  /////////////////////////////////end loader////////////////////////////////////

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