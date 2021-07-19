<?php 
session_start();
if(time() - $_SESSION['timestamp'] > 900) { //subtract new timestamp from the old one
    
    unset($_SESSION['r_id'], $_SESSION['timestamp']);
    header("Location:login.php"); //redirect to index.php
    // exit;
} else {
    $_SESSION['timestamp'] = time(); //set new timestamp
    include('include/db.php');
$admin_id=$_SESSION['admin_id'];
$query=mysqli_query($con,"SELECT * FROM `admin` WHERE id='$admin_id'");
$row=mysqli_fetch_assoc($query);
}

?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="assets/img/basic/LOGONEW.png" type="image/x-icon">
    <title><?php echo $row['firm_name'];?> | Dashboard</title>
    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/app.css">
    
    <!-- new drag image js --->
    
<!-- end---> 
    
    <style>
        .loader {
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: #F5F8FA;
            z-index: 9998;
            text-align: center;
        }

        .plane-container {
            position: absolute;
            top: 50%;
            left: 50%;
        }
        .GFG{font-size: 18px;}
       ul.sidebar-menu li:hover {
            box-shadow:5px 3px 5px 3px #33B5E5;
            }
             .back_btn {
  display: inline-block;
  border-radius: 4px;
  background-color: #eff4f9;
  border: none;
  color: #0f6fff;
  text-align: center;
  font-size: 23px;
  padding: 0px;
  width: 100px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
  margin-top: 16px;
}

.back_btn span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.back_btn span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  left: -20px;
  transition: 0.5s;
}

.back_btn:hover span {
  padding-left: 25px;
}

.back_btn:hover span:after {
  opacity: 1;
  left: 0;
}
    </style>
    <!-- Js -->
  
    <script>(function(w,d,u){w.readyQ=[];w.bindReadyQ=[];function p(x,y){if(x=="ready"){w.bindReadyQ.push(y);}else{w.readyQ.push(x);}};var a={ready:p,bind:p};w.$=w.jQuery=function(f){if(f===d||f===u){return a}else{p(f)}}})(window,document)</script>
</head>
<body class="light">
<!-- Pre loader -->
<div id="loader" class="loader">
    <div class="plane-container">
        <div class="preloader-wrapper small active">
            <div class="spinner-layer spinner-blue">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
            </div>

            <div class="spinner-layer spinner-red">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
            </div>

            <div class="spinner-layer spinner-yellow">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
            </div>

            <div class="spinner-layer spinner-green">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
            </div>
        </div>
    </div>
</div>

<div id="app">
<aside class="main-sidebar fixed offcanvas shadow" data-toggle='offcanvas'>
    <section class="sidebar">
        <div class="w-80px mt-3 mb-3 ml-3">
           <a href="index.php"><img src="assets/img/basic/LOGONEW.png" alt=""></a>
        </div>
        <div class="relative">
            
            <div class="user-panel p-3 light mb-2">
                <div>
                    <div class="float-left image">
                        <img class="user_avatar" src="assets/img/dummy/u2.png" alt="User Image">
                    </div>
                    <div class="float-left info">
                        <h6 class="font-weight-light mt-2 mb-1"><?php echo $row['firm_name'];?></h6>
                    </div>
                </div>
                <div class="clearfix"></div>
               
            </div>
        </div>
        <ul class="sidebar-menu">
            
            <li class="treeview no-b"><a href="index.php">
                <i class="icon icon-dashboard blue-text s-18"></i>
                <span>Dashboard</span>
            </a>
            </li>
            <li class="treeview"><a href="#">
                <i class="icon icon icon-local_mall blue-text s-18"></i>
                <span>Products</span>
                <i class="icon icon-angle-left s-18 pull-right"></i>
                
            </a>
                <ul class="treeview-menu">
                    <li><a href="products.php"><i class="icon icon-circle-o"></i>All Products</a>
                    </li>
                </ul>
            </li>
            <li class="treeview no-b"><a href="section.php"><i class="icon icon-account_box blue-text s-18"></i>Section</a>
            </li>
            <li class="treeview no-b"><a href="order.php">
                <i class="icon icon-add_shopping_cart blue-text s-18"></i>
                <span>Orders</span>
               
            </a>
                
            </li>
            <li class="treeview no-b"><a href="banner.php">
                <i class="icon icon-picture-o blue-text s-18"></i>
                <span>Banner</span>
               
            </a>
                
            </li>
            <li class="treeview no-b"><a href="custumers.php">
                <i class="icon icon-users blue-text s-18"></i>
                <span>Customer's Details</span>
               
            </a>
                
            </li>
            <li class="treeview no-b"><a href="discount.php">
             <i class="icon icon-percent blue-text s-18"></i>
              
                <span>Discount</span>
               
            </a>
                
            </li>
            <li class="treeview"><a href="category.php"><i class="icon icon-format_list_bulleted blue-text s-18"></i>Category</a>
                
            </li>
            
            <li class="header light mt-3"><strong>Reports</strong></li>
            <li class="treeview ">
                <a href="feedback.php">
                    <i class="icon icon-comments text-blue s-18"></i> <span>Feedback</span>
                </a>
            </li>
            <li class="treeview"><a href="#"><i class="icon icon-settings2 blue-text s-18"></i>Settings<i
                    class="icon icon-angle-left s-18 pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="#" data-toggle="modal" data-target="#exampleModalCenter"><i class="icon icon-rupee text-blue s-18"></i>Shipping Price</a>
                    </li>
                    <li><a href="#" data-toggle="modal" data-target="#exampleModalCenter"><i class="icon icon-payment text-blue s-18"></i>Payment Details</a>
                    </li>
                </ul>
            </li>
            <li class="treeview">
                <a href="analysis.php">
                    <i class="icon icon-analytics text-blue s-18"></i> <span>Analysis</span>
                </a>
            </li>
                <li class="treeview">
                <a href="logout.php">
                    <i class="icon icon-sign-out text-blue s-18"></i> <span>Logout</span>
                </a>
            </li>
                
        </ul>
    </section>
</aside>
<!--Sidebar End-->
<div class="has-sidebar-left">
    <div class="pos-f-t">
    <div class="collapse" id="navbarToggleExternalContent">
        <div class="bg-dark pt-2 pb-2 pl-4 pr-2">
            <div class="search-bar">
                <input class="transparent s-24 text-white b-0 font-weight-lighter w-128 height-50" type="text"
                       placeholder="start typing...">
            </div>
            <a href="#" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-expanded="false"
               aria-label="Toggle navigation" class="paper-nav-toggle paper-nav-white active "><i></i></a>
        </div>
    </div>
</div>
    <div class="sticky">
        <div class="navbar navbar-expand navbar-dark d-flex justify-content-between bd-navbar blue accent-3">
            <div class="relative">
                <a href="#" data-toggle="push-menu" class="paper-nav-toggle pp-nav-toggle">
                    <i></i>
                </a>
            </div>
            <!--Top Menu Start -->
<div class="navbar-custom-menu">
    <ul class="nav navbar-nav">
        <!-- Right Sidebar Toggle Button -->
        <!-- User Account-->
        <li class="dropdown custom-dropdown user user-menu ">
            <a href="#" class="nav-link" data-toggle="dropdown">
                <i class="icon icon-cogs" style="font-size: 37px;"></i>
            </a>
            <div class="dropdown-menu p-4 dropdown-menu-right" style="border: black 2px solid;
    border-radius: 30px;">
                <div class="row box justify-content-between my-4">
                    <div class="col">
                        <a href="profile_update.php">
                            <i class="icon-profile text-blue s-18"></i>
                            <div class="pt-1">Profile Update</div>
                        </a>
                    </div>
                    <div class="col"><a href="register_form.php">
                        <i class="icon-wpforms text-blue s-18"></i>
                        <div class="pt-1">Registration Form</div>
                    </a></div>
                    
                </div>
               
            </div>
        </li>
        <li>
            <button class="back_btn" onclick="goBack()" style="margin-right: 10px;vertical-align:middle; float: right;"><span>Back</span></button>
        </li>
    </ul>
</div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #33B5E5;">
        <h3 class="modal-title" id="exampleModalCenterTitle" style="color: #fff;"><label> SETTINGS</label></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <div class="col-md-12">
        <br>
        <div class="row"> 
          <div class="col-md-6">
            <label style="font-weight: 600; font-size: 24px;">Shipping Price</label>
            <label class="switch">
            <input type="checkbox" data-toggle="toggle" id="Shipping" onchange="show_shipping()" <?php if($row['shipping']=='on'){echo "checked='checked'";}?> >
            <span class="slider round"></span></label>

          </div>
        </div><br>
        <div class="row" id="shipping_opt" style="display: none; margin-top: 31px;">
          <div class="col-md-12">
            <?php
            $up=mysqli_query($con,"SELECT * FROM `shipping` ORDER BY id DESC LIMIT 1");
            $rows=mysqli_fetch_assoc($up);
            ?>
            <label class="GFG"><input type="radio" name="chk[]" onclick="show_min_max('','none')" id="price_acc_order" value="price_acc_order" <?php if($rows['shipping_type']=='PRICE ACCORDING TO ORDER PRICE'){echo "checked='checked'";}?> >&nbsp;PRICE ACCORDING TO ORDER PRICE</label>&nbsp;&nbsp;
            <div class="row" id="min_max" style="display: none;">
              <div class="col-md-6">
                <label class="col-md-6 ">Min<input type="number" class=" form-control" id="min"  value="<?=$row['min']?>"></label>
                <label class="col-md-6 ">Max<input type="number" class="form-control" id="max"  value="<?=$row['max']?>"></label>
              </div>
            </div>
            <label class="GFG"><input type="radio" name="chk[]" onclick="show_min_max('none','none')" id="free_ship" value="FREE SHIPPING" <?php if($rows['shipping_type']=='FREE SHIPPING'){echo "checked='checked'";}?> >&nbsp;FREE SHIPPING</label>&nbsp;&nbsp;
            <label class="GFG"><input type="radio" name="chk[]" onclick="show_min_max('none','')" id="fixed" value="fixed_shipping" <?php if($rows['shipping_type']=='FIXED PRICE'){echo "checked='checked'";}?> >&nbsp;FIXED SHIPPING</label>
            <div class="row" id="fixed_shipping" style="display: none;">
              <div class="col-md-6">
                <label>Shipping<input type="number" class=" form-control" id="price" value="<?=$row['amount']?>"></label>
              </div>
            </div>
          </div>
        </div><br>
          <div class="row"> 
          <div class="col-md-6">
            <label style="font-weight: 600; font-size: 24px;">Payment Details</label>
            <label class="switch">
            <input type="checkbox" data-toggle="toggle" id="Payment" <?php if($row['payment_det']=='on'){echo "checked='checked'";}?>>
            <span class="slider round"></span></label>

          </div>
        </div><br>
        
       </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" style="background-color: red;">Close</button>
        <button type="button" class="btn btn-primary" onclick="setting()" data-dismiss="modal">Save changes</button>
      </div>
    </div>
  </div>
</div>
</div>
<script type="text/javascript">
    window.onload=show_shipping();
function show_shipping() {
    // alert("Hello");
    if($("#Shipping").is(":checked"))
    {
    document.getElementById('shipping_opt').style.display='';
    }else
    {
    document.getElementById('shipping_opt').style.display='none';
    }
}
function show_min_max(str,str2) {
    document.getElementById('min_max').style.display=str;
    document.getElementById('fixed_shipping').style.display=str2;
}
function setting() {
    var Shipping,Payment,result,ship_type;
    var Ship=document.getElementById('Shipping');
    var Pay=document.getElementById('Payment');
    if(document.getElementById('price_acc_order').checked)
    {
        result=(document.getElementById('min').value)+'~'+(document.getElementById('max').value);
        ship_type='price';

    }else if(document.getElementById('free_ship').checked)
    {
        result=document.getElementById('free_ship').value;
        ship_type='free';

    }else if(document.getElementById('fixed').checked)
    {
        result=document.getElementById('price').value;
        ship_type='fixed';

    }
    var type="setting";
    if(Ship.checked)
    {
        Shipping='on';
    }else
    {
        Shipping='off';
    }
    if(Pay.checked)
    {
        Payment='on';
    }else
    {
        Payment='off';
    }
    // alert(result);
    $.ajax({
        type:'POST',
        url:'setting.php',
        data:{'Payment':Payment,'Shipping':Shipping,'type':type,'result':result,'ship_type':ship_type},
        success:function(res) {
            alert(res);
        }
    });
}
function goBack() {
  window.history.back();
}
</script>