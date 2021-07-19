<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sign up</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">SignUp </button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Sign up</h4>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12">

          <label class="span">Mobile Number</label>&nbsp;<label style="color: red;">*</label>
          <input type="Number" id="m_no" class="form-control">

          <label class="span">Full Name</label>&nbsp;<label style="color: red;">*</label>
          <input type="text" id="f_name" class="form-control">

          <label class="span">Alternate Mobile Number</label>&nbsp;<label style="color: lightgrey;"><i>(OPTIONAL)</i></label>
          <input type="Number" id="alt_m_no" class="form-control">


          <label class="span">Email-Id</label>&nbsp;<label style="color: lightgrey;"><i>(OPTIONAL)</i></label>
          <input type="email" id="email" class="form-control">

            </div>

          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" onclick="submit()">Submit</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
<script type="text/javascript">
  function submit() {
    var m_no=document.getElementById('m_no').value;
    var f_name=document.getElementById('f_name').value;
    var alt_m_no=document.getElementById('alt_m_no').value;
    var email=document.getElementById('email').value;
    alert(m_no);
  }
</script>
</body>
</html>
