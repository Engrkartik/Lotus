@section('header')
<!DOCTYPE html>
<html>
<head>
	<title>SSSPayroll</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="{{asset('public/css/custom.css')}}">
</head>
<body>
	
<div class="header">
  <div class="col-md-12">
    <div class="row">
      <div class="col-md-12">  
      <img src="public/img/LOGONEW.png">
      </div>
    </div>
  </div>
@show
</div>
<div class="content content-wrapper">	
@section('content')
<h1>Body Part</h1>
@show
</div>
<div class="footer">
  <footer class="main-footer">
    <strong>Copyright &copy; 2020-2021 <a href="http://ssssybertech.com/">SSS Syber Tech Pvt. Ltd</a>.</strong>
    All rights reserved.
  </footer>
</div>
</body>
</html>