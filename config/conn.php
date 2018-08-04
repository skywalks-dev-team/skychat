<?php

$i = array();
$file = fopen("settings.sky","r") or die("Unable to open file!");
$credentials = fread($file,filesize("settings.sky"));

$i = explode("\n", $credentials);

fclose($file);
// print_r($i);

$servername = safe_input( $i[0]);
$db = safe_input($i[1]);
$username = safe_input( $i[2]);
$password = safe_input( $i[3]);

// echo $servername;
// echo $username;
// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
else{
	set_msg('Connected successfully','hidden');
?>
	<script type="text/javascript">
		window.location = "/admin_setup.php";
	</script>
<?php
}

//  connection to database
//  created 31-07-2018
 
