<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="assets/img/icon/LOGONEW.png" type="image/x-icon">
    <title>Signup| SSS Sybertech</title>
    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/app.css">
    
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
        .login { 
  position: absolute;
  top: 33%;
  left: 50%;
  margin: -150px 0 0 -150px;
  width:370px;
  height:auto;
  background-color: #fff;
  padding:38px 24px 53px 19px;
  box-shadow: 7px 16px 62px 23px #232121f5;
}
    </style>
    
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
<main>
    <div id="primary" class="p-t-b-100 height-full " style="background: url(assets/img/signup_bg.jpg) no-repeat;background-size: cover;" >
        <div class="container">
                    <div class="login" id="1st">
                    <div class="text-center">
                    <h1>Signup here</h1>
                </div>
                    <br>
                    <div class="text-center">
                        <img src="assets/img/basic/signup_icon.png" alt="">
                        <h2 class="mt-2">Welcome</h2>
                        
                    </div>
                    <br>
                   
                        <div class="form-group">
                        <input type="text" id="name" placeholder="Enter Your Name" name="login-form-username" class="form-control not-dark" required="" />
                           
                        </div>
                        <div class="form-group">
                        <input type="text" id="firm_name" placeholder="Enter Firm Name" name="login-form-username" class="form-control not-dark" required="" />
                       </div>
                       <div class="form-group">
                           <textarea class="form-control not-dark" id="address" placeholder="Enter Firm Address" required=""></textarea>
                       </div>
                    <div class="form-group" id="submit">
                       <button type="button" style="float: right;" class="btn btn-primary" onclick="next1('1st','2nd','next2','3rd','4th','next3','next4','next1')">Next <i class="icon-arrow-right"></i></button>
                        <!-- <a href="#" class="float-right">Forgot Password?</a> -->
                    </div>
                  
                </div>
                 <div class="login" id="2nd" style="display: none;">
                    <div class="text-center">
                        <img src="assets/img/basic/Signup_2nd.png" alt="">
                        <h2 class="mt-2">Signup Details</h2>
                        
                    </div>
                    <br>
                    <label>Mobile Number</label>
                        <div class="form-group">
                        <input type="mobile" id="mobile" class="form-control not-dark" placeholder="Enter Mobile Number" required="" value="<?=$_SESSION['mobile']?>" onkeypress="if(this.value.length==10) return false;" onkeydown="javascript: return event.keyCode === 8 ||event.keyCode === 46 ? true : !isNaN(Number(event.key))"/>
                           
                        </div>
                        
                    <div class="form-group" id="submit">
                      <button id="next2" style="display: none;float: right;" type="button" class="btn btn-primary" onclick="next1('1st','3rd','next3','2nd','4th','next2','next4','next1')">Next <i class="icon-arrow-right"></i></button>
                        <!-- <a href="#" class="float-right">Forgot Password?</a> -->
                    </div>
                  
                </div>
                <div class="login" id="3rd" style="display: none;">
                    <div class="text-center">
                        <img src="assets/img/basic/btype.jpg" alt="">
                        <h2 class="mt-2">Signup Details</h2>
                        
                    </div>
                    <br>
                    <label>Business Type</label>
                        <div class="form-group">
                        <select class="form-control" id="b_type">
                        <option selected="" disabled="" value="00">Select Option</option>
                        <option value="W">Sell To Other Business(B2B)</option>
                        <option value="R">Sell To End Cutomers(B2C)</option>
                       </select>
                           
                        </div>
                        
                    <div class="form-group" id="submit">
                      <button type="button" class="btn btn-primary" id="next3" style="display: none;float: right;" onclick="next1('1st','4th','next4','2nd','3rd','next2','next3','next1')">Next<i class="icon-arrow-right"></i></button>
                        <!-- <a href="#" class="float-right">Forgot Password?</a> -->
                    </div>
                  
                </div>
                  <div class="login" id="4th" style="display: none;">
                    <div class="text-center">
                        <img src="assets/img/basic/signup.gif" alt="" style="height: 290px;">
                        <h2 class="mt-2">Signup Details</h2>
                        
                    </div>
                    <br>
                    <label>Who Can See Your Listed Product ?</label>
                        <div class="form-group">
                         <select class="form-control" id="access">
                        <option selected="" disabled="" value="00">Select Option</option>
                        <option value="All">Open To All</option>
                        <option value="Register">Register Customers Only</option>
                        </select>
                           
                        </div>
                        
                    <div class="form-group" id="next4">
                      <button class="btn btn-success" type="button" id="next4" name="login-form-submit" style="float: right;" onclick="submit()" value="login">Finish</button>
                        <!-- <a href="#" class="float-right">Forgot Password?</a> -->
                    </div>
                  
                </div>
                <!-- old code->
            
    
                </form>
                
                <form action="#4th" id="3rd" style="display: none;">
                    <h3>Sign Up</h3>
                    <br>
                    <h4 style="color: #fff;">Business Type</h4>
                    <br>
                    <label class="form-group">
                        <select class="form-control" style="cursor: pointer;color: #fff;" id="b_type">
                        <option selected="" disabled="" value="00" style="color: #000;">Select Option</option>
                        <option value="W" style="cursor: pointer;color: #000;">Sell To Other Business(B2B)</option>
                        <option value="R" style="cursor: pointer;color: #000;">Sell To End Cutomers(B2C)</option>
                       </select>
                    </label>
                   
                    <div class="row" id="next1">
                    <div class="col-12 form-group">
                        <button type="button" class="btn btn-primary" id="next3" style="display: none;float: right;" onclick="next1('1st','4th','next4','2nd','3rd','next2','next3','next1')">Next<i class="icon-arrow-right"></i></button>
                      </div>
                    </div>
    
                </form>
                <form action="login.php" id="4th" style="display: none;">
                    <h3>Sign Up</h3>
                    <br>
                    <h4 style="color: #fff;">Who Can See Your Listed Product ?</h4>
                    <br>
                    <label class="form-group">
                        <select class="form-control" style="cursor: pointer;color: #fff;" id="access">
                        <option selected="" disabled="" value="00" style="color: #000;">Select Option</option>
                        <option value="All" style="cursor: pointer;color: #000;">Open To All</option>
                        <option value="Register" style="cursor: pointer;color: #000;">Register Customers Only</option>
                        </select>
                        
                    </label>
                   
                    <div class="row" id="next4">
                    <div class="col-12 form-group">
                        <button class="btn btn-success" type="button" id="next4" name="login-form-submit" style="float: right;" onclick="submit()" value="login">Finish</button>
                      </div>
                    </div>
    
                </form>
            </div>-->
        </div>
    </div>
    <!-- #primary -->
</main>

<div class="control-sidebar-bg shadow white fixed"></div>
</div>
<!--/#app -->
<script src="assets/js/app.js"></script>


<script>(function($,d){$.each(readyQ,function(i,f){$(f)});$.each(bindReadyQ,function(i,f){$(d).bind("ready",f)})})(jQuery,document)</script>
<script>
   function next1(hide1,show1,show2,hide2,hide3,hide4,hide5,hide6) {
        // var firm_name=document.getElementById('firm_name');
        // var address=document.getElementById('address');
        // var name=document.getElementById('name');
        // if((firm_name.value=="") && (address.value=="") && (name.value==""))
        // {
        // // document.getElementById(hide1).style.display='none';
        // // document.getElementById(show1).style.display='';
        // // document.getElementById(show2).style.display='';
        // // document.getElementById(hide2).style.display='none';
        // // document.getElementById(hide3).style.display='none';
        // // document.getElementById(hide4).style.display='none';
        // // document.getElementById(hide5).style.display='none';
        // // document.getElementById(hide6).style.display='none';
        // // }
        // // else{
        //  alert("All fields are mandatory");
        // }
        // else{
                document.getElementById(hide1).style.display='none';
        document.getElementById(show1).style.display='';
        document.getElementById(show2).style.display='';
        document.getElementById(hide2).style.display='none';
        document.getElementById(hide3).style.display='none';
        document.getElementById(hide4).style.display='none';
        document.getElementById(hide5).style.display='none';
        document.getElementById(hide6).style.display='none';
        // }



    }
    function submit() {
        var firm_name=document.getElementById('firm_name').value;
        var address=document.getElementById('address').value;
        var name=document.getElementById('name').value;
        var b_type=document.getElementById('b_type').value;
        var access=document.getElementById('access').value;
        var mobile=document.getElementById('mobile').value;

        var type="sign_up";
        $.ajax({
            type:'POST',
            url:'chk_login.php',
            data:{'type':type,'firm_name':firm_name,'address':address,'name':name,'b_type':b_type,'access':access,'mobile':mobile},
            success:function(res){
                // alert(res);
                if(res==1)
                {
                    
                    window.location.href="index.php";
                }
                
                // alert(res);
                window.location.href="login.php";
          
            }
        });

    }
    
</script>
</body>

</html>