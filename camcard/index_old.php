<?php 
if (extension_loaded('newrelic')) { // Ensure PHP agent is available
	newrelic_disable_autorum();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Business Card</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js" integrity="sha384-BLiI7JTZm+JWlgKa0M0kGRpJbF2J8q+qreVrKBC47e3K6BW78kGLrCkeRX6I9RoK" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
   <style>
#business_image {
  width: 26px;
  height: 26px;
  position:absolute;
left:-9999px;
  opacity: 0;
  filter: alpha(opacity=0); /* IE 5-7 */
}
.ui-autocomplete{z-index:9999 !important;}
body.modal-open {
    overflow: hidden;
    position:fixed;
    width: 100%;
}
.form-group {
    margin-bottom: 1rem;
    float: left;
    width: 100%;
}
 .modal-open .modal{overflow:hidden}
 </style>
 <script>
	function selectImage(){
		document.getElementById("business_image").click();
	  }
 </script>
</head> 
<body>
	<div class="container">
	   <h2>Upload Business Card</h2>
	   <a href='bulk.php' class='btn btn-primary'>Upload multiple business card</a>
	   <span class='center-block'>OR</span>
		<form role="form" id="frmBusinessCard" action="upload.php" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<img id="img" src="./Flat-Camera-Icon.png" onclick="selectImage()" alt="Scan Business Card" class="img-thumbnail" style='border:0px;' alt="Scan Image"/>
				<input type="file" name="business_image" id='business_image' onchange="fileSelected();" accept="image/*" capture>
				<span>File size should be less than 1.5MB</span>
			</div>
			<!--<button type="submit" class="btn btn-primary">Submit</button>-->
		</form>
		<h4 id='loading' style='display:none'>loading..</h4>
		<div id="message"></div>
	</div>
	<!-- Modal -->
	<div id="companyModal" class="modal fade" role="dialog">
		<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title">Select Or Add Company</h4>
		  </div>
		  <div class="modal-body">
			<div class="row">
				<div class="col-lg-12 mrg5T form-horizontal">
					<div class="form-group">
						<label class="col-lg-3">Company:</label>
						<div class="col-lg-9">
							<input type="text"  name="selected_company" id="selected_company" class="form-control"/>
						</div>						
					</div>	
					<!--
					<div class="form-group">
						<label class="col-lg-2">New Company:</label>
						<div class="col-lg-10"><input type="text" name="new_company" id="new_company" class="form-control"/></div>
					</div>-->
					<div class="form-group">
						<label class="col-lg-3"></label>
						<div class="col-lg-10">
							<button type="button" class='btn btn-primary' onclick="addCompany();">Submit</button>
						</div>
					</div>
				</div>				
			</div>
		 </div>
		 <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
		  </div>
		</div>
	  </div>
	</div>
	<div id="myModal" class="modal fade" role="dialog">
	  <div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title">Add Contact <button type="button" class='btn btn-primary pull-right' style='margin-right:5px' onclick="addButton();">Add</button></h4>
			
		  </div>
		  <div class="modal-body"> 
				<div class="row">
					<div class="col-lg-12" id='panelB' style='overflow:auto;'>
						<form id="frm_contact" class="form-horizontal">
							<div class="form-group">
								<label class="col-lg-2">First Name:</label>
								<div class="col-lg-10">
									<input type="text" name="first_name" id="first_name" class="form-control"/>
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-2">Last Name:</label>
								<div class="col-lg-10">
									<input type="text" name="last_name" id="last_name" class="form-control"/>
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-2">Job Title:</label>
								<div class="col-lg-10">
									<input type="text" name="job_title" id="job_title" class="form-control"/>
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-2">Email:</label>
								<div class="col-lg-10">
									<input type="text" name="email" id="email" class="form-control"/>
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-2">Phone Number:</label>
								<div class="col-lg-10">
									<input type="text" name="phone_number" id="phone_number" class="form-control"/>
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-2">Mobile Number:</label>
								<div class="col-lg-10">
									<input type="text" name="mobile_number" id="mobile_number" class="form-control"/>
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-2">Address:</label>
								<div class="col-lg-10">
									<input type="text" name="address" id="address" class="form-control"/>
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-2">Company:</label>
								<div class="col-lg-10">
									<input type="text" name="company" id="company" class="form-control"/>
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-2">Notes:</label>
								<div class="col-lg-10">
									<input type="text" name="note" id="note" class="form-control"/>
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-2"></label>
								<div class="col-lg-10">
									<input type="hidden" name="image_url" value="" id="image_url" />
									<input type="hidden" name="company_id" value="0" id="company_id" />
									<button type="button" class='btn btn-primary' onclick="addButton();">Add</button>
								</div>
							</div>
						</form>
					</div>
				</div>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
		  </div>
		</div>
	  </div>
	</div>
	<script>
		function fileSelected(){
			jQuery("#frmBusinessCard").submit();
		}
		
		function changeLetter(str){
			str = str.toLowerCase().replace(/\b[a-z]/g, function(letter) {
				return letter.toUpperCase();
			});
			return str;
		}
		
		function modalScroll(){
			_h = jQuery(window).height();
			_h = _h - 190;
			jQuery("#myModal").find('.modal-body').find("#panelB").css('height',_h+'px');
		}
		jQuery(window).resize(function(){
			modalScroll();
		})
		function addCompany(){
			/*
			if(jQuery("#selected_company").val()!="" && jQuery("#new_company").val()==""){
				companyID = jQuery("#selected_company").val();
				companyName = jQuery("#selected_company>option:selected").text();
			} else {
				companyID = 0;
				companyName = jQuery("#new_company").val();
			}
			jQuery("#company_id").val(companyID);*/
			if(jQuery("#selected_company").val()==""){
				alert("Please enter company name");
			} else {
				jQuery("#company").val(jQuery("#selected_company").val());
				jQuery("#companyModal").modal('hide');
				runInterval();
			}
		}
		function addButton(){
			var frm = jQuery("#frm_contact").serializeArray();
			jQuery.ajax({
				type:'POST',
				url:'http://backyard.synpat.com/camcard/contact_scan_camcard',
				data:frm,
				cache:false,
				success:function(d){
					if(d>0){
						alert("Contact Added");
						jQuery("#myModal").modal('hide');
						jQuery("#image_url,#selected_company").val('');
						jQuery("#image_url").val(0);
						jQuery("#frm_contact").get(0).reset();
						window.location = window.location.href;
					} else {
						alert("Oops! Something went wrong");
						window.location = window.location.href;
					}					
				},error:function(){
					alert("Oops! Something went wrong");
					window.location = window.location.href;
				}
			});
		}		
		_statusProcess = 0;
		jQuery(document).ready(function(){
			jQuery("#first_name,#last_name").on('keydown',function(e){
				jQuery(this).val(changeLetter(jQuery(this).val()));
			});
			jQuery("#frmBusinessCard").on("submit",function(e){
				e.preventDefault();
				jQuery("#message").empty();
				jQuery('#loading').show();
				var sendOCRAjax = jQuery.ajax({
					url: "upload.php", 
					type: "POST",  
					data: new FormData(this), 
					contentType: false,       
					cache: false,            
					processData:false
				}).done(function(data,textStatus,jqXHR){
					_d = jQuery.parseJSON(data);
					if(typeof _d.size!="undefined" && _d.size>0 && typeof _d.file_name!="undefined" && _d.file_name!="" && typeof _d.file_url!="undefined" && _d.file_url!=""){
						_statusProcess = 1;
						jQuery("#image_url").val(_d.show_url);
						jQuery.ajax({
							url: "send.php", 
							type: "POST",             
							data: _d, 							 
							cache: false
						}).done(function(data,textStatus,jqXHR){
							jQuery('#loading').hide();
							jQuery.ajax({
								url:'file_create.php',
								type:'POST',
								data:{string_file:data},
								cache:false
							}).done(function(data,textStatus,jqXHR){
								showFileData(data);
							});
						});
					}	else {
						_statusProcess = 2;
					}				
				});
				sendOCRAjax.then(function(){
					enableAutoSuggestCompany();
					jQuery("#companyModal").modal('show');
				});
			});
		});
		function enableAutoSuggestCompany(){
			jQuery( "#selected_company" ).autocomplete({
			  source: "http://backyard.synpat.com/camcard/search_company",
			  minLength: 2,
			  select: function( event, ui ) {
				  console.log(ui);
				  jQuery("#company_id").val(ui.item.id);
				  jQuery("#company").val(ui.item.value);
				  console.log( "Selected: " + ui.item.value + " aka " + ui.item.id );
			  }
			});
		}
		var _checkInterval;
		function showFileData(d){
			try{
				_d = jQuery.parseJSON(d);
				_companyList = [];
				if(_d.card_data.length>0){
					_string = "";			
					for(i=0;i<_d.card_data.length;i++){
						_nameA = _d.card_data[i].n;
						  _tel = _d.card_data[i].tel;
						_email = _d.card_data[i].email;	
						  _org = _d.card_data[i].org;
						  _adr = _d.card_data[i].adr;
						  _cellPhone = "";
						 _firstName = "";
						 _lastName = "";
						if(_nameA.length>0){
							for(j=0;j<_nameA.length;j++){
								_firstName =_nameA[j].FirstName; _lastName=_nameA[j].LastName;
							}
						}
						jQuery("#first_name").val(_firstName);
						jQuery("#last_name").val(_lastName);
						if(_tel.length>0){
							if(_tel.length==1){
								jQuery("#phone_number").val(_tel[0].Value);
							}
							if(_tel.length>1){
								jQuery("#phone_number").val(_tel[0].Value);
								jQuery("#mobile_number").val(_tel[1].Value);
							}
						}						
						if(_email.length>0){
							jQuery("#email").val(_email[0].Value);
						}
						if(_org.length>0){
							jQuery("#company").val(_org[0].Name);
						}
						if(_adr.length>0){
							_string = ""
							for(j=0;j<_adr.length;j++){
								_string +=_adr[j].StreetAddress+', '+_adr[j].Locality+', '+_adr[j].Region+', '+_adr[j].PostalCode+', '+_adr[j].Country;
								if(j<_adr.length-1){
									_string +=', ';
								}
							}
							jQuery("#address").val(_string);
						}
					}
					/*jQuery("#selected_company").html("<option value=''>-- Select Company --</option>");
					jQuery.each(_d.company_list,function(i,company){
						jQuery("#selected_company").append('<option value="'+company.id+'">'+company.company_name+'</option>');
					});*/					
					if(jQuery("#company").val()=="" || jQuery("#company_id").val()==""){
						enableAutoSuggestCompany();
						jQuery("#companyModal").modal('show');
					}					
				} else {
					_statusProcess = 2;
				}
			}catch(err){
				console.log(err);
				_statusProcess = 2;
			}			
		}
		function runInterval(){
			_checkInterval = setInterval(function(){
				if(_statusProcess==1){
					clearInterval(_checkInterval);
					modalScroll()
					jQuery("#myModal").modal('show');
				} else if(_statusProcess==2){
					alert("OCR file blank");
					clearInterval(_checkInterval);
					window.location = window.location.href;
				}
			},1000);
		}
	</script>
</body>
</html>