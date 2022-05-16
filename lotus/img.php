<?php
include('include/header.php');
?>
<input type="file" id="image_to_upload"/>
<script type="text/javascript">
	// $.noConflict();	
	formdata = new FormData();		
	$("#image_to_upload").on("change", function() {
		var file = this.files[0];
		if (formdata) {
			formdata.append("image", file);
			console.log(file);
			// jQuery.ajax({
			// 	url: "destination_ajax_file.php",
			// 	type: "POST",
			// 	data: formdata,
			// 	processData: false,
			// 	contentType: false,
			// 	success:function(){}
			// });
		}						
	});	
</script>