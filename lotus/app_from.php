<!DOCTYPE html>
<html lang="en">
<head>
  <title>Application From</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<style type="text/css">
  form{
    margin: 5%;
    border:1px solid lightgrey;
    box-shadow: 5px 5px 5px grey;
  }
</style>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="row">
        <div class="col-md-12" style="border: 1px solid black;">
        <p>Logo Part Here</p>
        </div>
      </div>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        
      <div class="row">
        <div class="col-md-12">
          <div class="card-title">
            <h3>APPLY ONLINE</h3>
          </div>
            </div>
          </div>
          <div class="row" style="margin-left: 10px;">
            <div class="col-md-5">
              <label for="name">Full Name</label>
              <input type="text" name="name" class="form-control">
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-5">
              <label for="name">Father's Name</label>
              <input type="text" name="f_name" class="form-control">
            </div>
          </div>
          <div class="row" style="margin-left: 10px;">
            <div class="col-md-5">
              <label for="name">Permanent Address</label>
              <input type="text" name="p_add" class="form-control">
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-5">
              <label for="name">Father's Mobile Number</label>
              <input type="text" name="f_mbno" class="form-control">
            </div>
          </div>
          <div class="row" style="margin-left: 10px;">
            <div class="col-md-5">
              <label for="name">Mobile Number</label>
              <input type="text" name="mbno" class="form-control">
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-5">
              <label for="name">Gender</label><br>
              <select class="form-control" name="gender">
                <option value="male">Male</option>
                <option value="female">Female</option>
              </select>
            </div>
          </div>
          <div class="row" style="margin-left: 10px;">
            <div class="col-md-5">
              <label for="name">Email-Id</label>
              <input type="email" name="email" class="form-control">
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-5">
              <label for="name">Hostel Accomodation Required</label><br>
              <select class="form-control" name="hostel">
                <option value="yes">Yes</option>
                <option value="no">No</option>
              </select>
            </div>
          </div>
          <div class="row" style="margin-left: 10px;">
            <div class="col-md-5">
              <label for="name">Date Of Birth</label>
              <input type="date" name="dob" class="form-control">
            </div>
           
          </div>
           <div class="row" style="margin-left: 10px;">
            <div class="col-md-5">
              <label for="name">Qualification</label>
            </div>
           
          </div>
          <div class="row">
           <table class="table" style="border: 1px solid black;margin: 20px;">
             <thead>
               <tr>
                 <th>Name of Examination</th>
                 <th>Board/University/Institute</th>
                 <th>Year of Passing</th>
                 <th>Marks Obtained (%)</th>
                 <th>Main Subjects</th>
               </tr>
             </thead>
             <tbody>
               <tr>
                 <td>High School</td>
                 <td><input type="text" name="high_board" class="form-control"></td>
                 <td><input type="text" name="high_yrpass" class="form-control"></td>
                 <td><input type="text" name="high_mark" class="form-control"></td>
                 <td><input type="text" name="high_sub" class="form-control"></td>
                 
               </tr>
                <tr>
                 <td>Intermediate (10+2)</td>
                 <td><input type="text" name="int_board" class="form-control"></td>
                 <td><input type="text" name="int_yrpass" class="form-control"></td>
                 <td><input type="text" name="int_mark" class="form-control"></td>
                 <td><input type="text" name="int_sub" class="form-control"></td>
                 
               </tr>
                <tr>
                 <td>Graduation</td>
                 <td><input type="text" name="gr_board" class="form-control"></td>
                 <td><input type="text" name="gr_yrpass" class="form-control"></td>
                 <td><input type="text" name="gr_mark" class="form-control"></td>
                 <td><input type="text" name="gr_sub" class="form-control"></td>
               </tr>
             </tbody>
           </table>
           
          </div>
           <div class="row" style="margin-left: 10px;">
            <div class="col-md-5">
              <label for="name">Examination Details</label>
            </div>
           
          </div>
          <div class="row">
           <table class="table" style="border: 1px solid black;margin: 20px;">
             <tbody>
               <tr>
                 <th>CAT</th>
                 <th>Roll No</th>
                 <td><input type="text" name="cat_roll" class="form-control"></td>
                 <th>Score</th>
                 <td><input type="text" name="cat_score" class="form-control"></td>
                 <th>Percentile</th>
                 <td><input type="text" name="cat_per" class="form-control"></td>
               </tr>
               <tr>
                 <th>MAT</th>
                 <th>Roll No</th>
                 <td><input type="text" class="form-control" name="mat_roll"></td>
                 <th>Score</th>
                 <td><input type="text" class="form-control" name="mat_score"></td>
                 <th>Percentile</th>
                 <td><input type="text" class="form-control" name="mat_per"></td>
               </tr>
               <tr>
                 <th>UPSEE</th>
                 <th>Roll No</th>
                 <td><input type="text" class="form-control" name="upsee_roll"></td>
                 <th>Score</th>
                 <td><input type="text" class="form-control" name="upsee_score"></td>
                 <th>Percentile</th>
                 <td><input type="text" class="form-control" name="upsee_per"></td>
               </tr>
               <tr>
                 <th>Others</th>
                <th>Roll No</th>
                 <td><input type="text" class="form-control" name="oth_roll"></td>
                 <th>Score</th>
                 <td><input type="text" class="form-control" name="oth_score"></td>
                 <th>Percentile</th>
                 <td><input type="text" class="form-control" name="oth_per"></td>
               </tr>
                
             </tbody>
           </table>
           
          </div>
          <div class="row" style="margin-left: 10px;">
            <div class="col-md-5">
              <label for="name">Professional Qualification Experience & Company Name</label>
            </div>
           
          </div>
          <div class="row">
           <table class="table" style="border: 1px solid black;margin: 20px;">
             <thead>
               <tr>
                 <th>Period (In Years)</th>
                 <th>Name of the Company</th>
                 <th>Position</th>
                 <th>Responsibility</th>
               </tr>
             </thead>
             <tbody>
               <tr>
                 <td><input type="text" class="form-control" name="1_period"></td>
                 <td><input type="text" class="form-control" name="1_company"></td>
                 <td><input type="text" class="form-control" name="1_position"></td>
                 <td><input type="text" class="form-control" name="1_resp"></td>
                 
               </tr>
                <tr>
                 <td><input type="text" class="form-control" name="2_period"></td>
                 <td><input type="text" class="form-control" name="2_company"></td>
                 <td><input type="text" class="form-control" name="2_position"></td>
                 <td><input type="text" class="form-control" name="2_resp"></td>
                 
               </tr>
               
             </tbody>
           </table>
           
          </div>
          <div class="row" style="margin-left:10px; ">
            <div class="col-md-12">
              <label>HOW DID YOU FIND OUT ABOUT JAIPURIA SCHOOL OF BUSINESS, GHAZIABAD. PLEASE SPECIFY THE SOURCE.</label>
              <select class="form-control" name="souce">
                 <option value="Facebook/Google">Facebook/Google</option>
                    <option value="Alumni">Alumni</option>
                    <option value="Newspaper">Newspaper</option>
                    <option value="Friend/Relative/Parent">Friend/Relative/Parent</option>
                    <option value="Magazine">Magazine</option>
                    <option value="Website">Website</option>
                    <option value="Coaching/Institute">Coaching/Institute</option>
                    <option value="Other">Other</option>
              </select>
            </div>
          </div>
          <div class="row" style="margin-left:10px; ">
            <div class="col-md-12">
              <label>Declaration</label>
              <p>I hereby declare that the information given in the Application form is true to the best of my knowledge and belief. If any information is found to be wrong, i shall be liable for action. I hold myself responsible for the due and prompt payment of fees.</p>
            </div>
          </div>
          <div class="row" style="margin-left:10px; ">
            <button class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
  </div>
  
</div>
<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{
   require ('phpmailer/PHPMailerAutoload.php');
        $mail = new PHPMailer();
        
        //$mail->SMTPDebug = 1;    
        $mail->IsSMTP();
        $mail->Host = "smtp.gmail.com"; // Your Domain Name
         
        $mail->SMTPAuth = true;
        $mail->Port = 465;
         $mail->Username = "shikharcreation19@gmail.com"; // Your Email IDfleet.lumanauto@gmail.com
        $mail->Password = "gryfbqwfijyiirla"; // Password of your email idLuman@123
        $mail->SMTPSecure = "ssl";
        $mail->From = "shikharcreation19@gmail.com";
        $mail->FromName = "Info Team";
        $mail->AddAddress ("raizadaalka@gmail.com"); // On which email id you want to get the message
        // $mail->AddCC ("");
        
        $mail->IsHTML(true);
         
        $mail->Subject = "Report an issue From :-".$_POST['name']; // This is your subject
         
        
        $mail->Body = "Hello SSS Sybertech";      


        // $attachment = base64_encode(file_get_contents('mail.html'));
              
        $mail->send();
        $chk='1';
        echo $chk;
}
?>
</body>
</html>
