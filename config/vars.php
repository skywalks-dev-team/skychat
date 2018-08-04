<?php

//  global variables
//  update 31-07-2018

$messages = $user = '';
$GLOBALS['user'] = 'something';
$user == $GLOBALS['user'];
 
// messages
if (isset($_SESSION['msg'])) {
	$messages .= $_SESSION['msg'];
	unset($_SESSION['msg']);
}
