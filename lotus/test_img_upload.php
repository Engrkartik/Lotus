<html>
<head>
<style>body {
font-family: Arial;
font-size: 14px;
}
.bgColor {
max-width: 440px;
height:150px;
background-color: #fff4be;
border-radius: 4px;
}
.bgColor label{
font-weight: bold;
color: #A0A0A0;
}
#targetLayer{
float:left;
width:150px;
height:150px;
text-align:center;
line-height:150px;
font-weight: bold;
color: #C0C0C0;
background-color: #F0E8E0;
border-bottom-left-radius: 4px;
border-top-left-radius: 4px;
}
#uploadFormLayer{
	float:left;
	padding: 20px;
}
.btnSubmit {
	background-color: #696969;
    padding: 5px 30px;
    border: #696969 1px solid;
    border-radius: 4px;
    color: #FFFFFF;
    margin-top: 10px;
}
.inputFile {
	padding: 5px;
	background-color: #FFFFFF;
	border:#F0E8E0 1px solid;
	border-radius: 4px;
}
.image-preview {	
width:150px;
height:150px;
border-bottom-left-radius: 4px;
border-top-left-radius: 4px;
}
 </style>
<title>PHP AJAX Image Upload</title>
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script type="text/javascript">

$(document).ready(function (e) {
	$("#uploadForm").on('submit',(function(e) {
		e.preventDefault();
		$.ajax({
        	url: "img_upload.php",
			type: "POST",
			data:  new FormData(this),
			contentType: false,
    	    cache: false,
			processData:false,
			success: function(data)
		    {
			$("#targetLayer").html(data);
		    },
		  	error: function() 
	    	{
	    	} 	        
	   });
	}));
});
</script>
</head>
<body>
<div class="bgColor">
<form id="uploadForm" action="img_upload.php" method="post">
<div id="targetLayer">No Image</div>
<div id="uploadFormLayer">
<input name="userImage" type="file" class="inputFile" /><br/>
<input type="submit" value="Submit" class="btnSubmit" />
</form>
</div>
</div>
</body>
</html>