<?php
session_start();
ob_start();
// 	skywalks.inc common functions

//  function for setting messages 
//  update 31-07-2018
 
function set_msg($msg,$mode){
	if ($mode == "success") {
		$class = "alert alert-success alert-dismissible";
	}
	elseif ($mode == "info") {
		$class = "alert alert-info alert-dismissible";
	}
	elseif ($mode == "warning") {
		$class = "alert alert-warning alert-dismissible";
	}
	elseif ($mode == "hidden") {
		$class = "alert alert-hidden alert-dismissible";
	}
	else{
		$class = "alert alert-danger alert-dismissible";	
	}
$response ='
	<div class="'.$class.'">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong>'.$msg.'</strong>
	</div>';
	if (!isset($_SESSION['msg'])) {
		$_SESSION['msg'] = '';
	}
	$_SESSION['msg'] .= $response;
}

function safe_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
function get_Db(){
	$i = array();
	$file = fopen("settings.sky","r") or die("Unable to open file!");
	$credentials = fread($file,filesize("settings.sky"));

	$i = explode("\n", $credentials);
	fclose($file);
	$Db = safe_input( $i[1]);
}