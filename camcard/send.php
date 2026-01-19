<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
if (extension_loaded('newrelic')) { // Ensure PHP agent is available
	newrelic_disable_autorum();
}
if(isset($_POST['file_name']) && $_POST['file_name']!=""){
	$ch = curl_init();
	/*json=>1 in json_format*/
	$data['upfile'] = new CurlFile(realpath($_POST['file_url']),'image/jpg',$_POST['file_name']);
	curl_setopt($ch, CURLOPT_URL,'http://bcr2.intsig.net/BCRService/BCR_VCF2?PIN=&user=uzi@synpat.com&pass=6PEY3KKYQLCD9WRG&json=0&lang=524287&size='.$_POST['size']);
	curl_setopt($ch, CURLOPT_POST, 1);
	//CURLOPT_SAFE_UPLOAD defaulted to true in 5.6.0
	//So next line is required as of php >= 5.6.0 
	curl_setopt($ch, CURLOPT_SAFE_UPLOAD, false);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_exec($ch);	
}

?>