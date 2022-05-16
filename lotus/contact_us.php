
<?php
include('include/header.php');

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//             $msg = $_POST['msg'];
            // $admin_email = 'kumararpan0501@gmail.com';
//             $admin_email = 'shuklaneeraj16@gmail.com';
//             $subject = "Request";
//             $comment ="You have receved request for Message :";
//             $email = 'kumararpan0501@gmail.com';

            

//             if(mail($admin_email, $subject, $comment, "From:" . $email)){
//               echo "<script>alert('success..')</script>";
//             }

// }
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
                <h3 class="card-title">Contact Us</h3>
              </div><br>
               
               
              </div>
              <!-- /.card-header -->
              <div class="card" >
                <div class="row">
                  <div class="col-md-6"></div>
                </div>
                <div class="row" style="margin-left: 5px;">
                  <div class="col-md-6">
                    <label>SSS Syber Tech Pvt. Ltd.</label><br>
                    <h5> Office No: 914, 9th floor, I-Thum Tower-A, Sector-62, Noida-201309</h5>
                    <h5>(+91) - 9873316638</h5>
                    <h5>info@ssssybertech.com</h5>
                    <h5>www.ssssybertech.com</h5>
                  </div>
                </div>
                <div class="row" style="margin-left: 5px;">
              <div class="card-body table-responsive">
               
                  <label>Message</label>
                  <textarea rows="10" placeholder="Submit Your query" class="form-control" id="msg"></textarea><br>
                  <button class="btn btn-primary form-control" onclick="send()">Send</button>
                <!-- </form> -->
              </div>
              </div>
              <!-- /////////////////////////////////////////// -->
             
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>

<script type="text/javascript">

  ////////////////////////loader///////////////////////////////////////////////////
$(window).load(function() {
    // Animate loader off screen
    $(".se-pre-con").fadeOut("slow");
  });
  /////////////////////////////////end loader////////////////////////////////////
  function send(){
    // alert("heelo");
    $(".se-pre-con").fadeIn("slow");
    var msg = document.getElementById('msg').value;
     
      $.ajax({
      type:'POST',
      url: 'sendmail.php',
      data: {'msg':msg},
      success:function(res){
        $(".se-pre-con").fadeOut("slow");
        alert("mail sent successfully..");
        window.history.back();
        // document.getElementById('discount').value=res;
      }
    });
  }
</script>
<?php
include('include/footer.php');
?>