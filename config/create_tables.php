<?php

require 'common.php';

//  setting up DB and tables 
//  update 31-07-2018

// define variables and set to empty values

$db = $username = $server = $password = "";
$create_settings_file = fopen("settings.sky", "w");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $db = safe_input($_POST["db_name"]);
  $username = safe_input($_POST["db_user"]);
  $password = safe_input($_POST["db_pass"]);
  $server = safe_input($_POST["server"]);

$server_name = $server."\n";
fwrite($create_settings_file, $server_name);
$db_name = $db."\n";
fwrite($create_settings_file, $db_name);
$db_user = $username."\n";
fwrite($create_settings_file, $db_user);
$db_pass = $password."\n";
fwrite($create_settings_file, $db_pass);
fclose($create_settings_file);	

require 'conn.php';

$sql = "CREATE DATABASE IF NOT EXISTS ".$db_name."";
if ($conn->query($sql) === TRUE) {
    set_msg('Database created successfully','hidden');
} else {
    set_msg("Error creating database: " . $conn->error,'danger');
}
// Create connection
$conn = mysqli_connect($server, $username, $password, $db);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// sql to create table
$sql = "CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
displayname VARCHAR(30) NOT NULL,
username VARCHAR(30) UNIQUE NOT NULL,
email VARCHAR(50),
password VARCHAR(200),
reg_date TIMESTAMP,
created TIMESTAMP,
modified TIMESTAMP
)";

if (mysqli_query($conn, $sql)) {
    set_msg("Table users created successfully",'hidden');
} else {
    set_msg("Error creating table: " . mysqli_error($conn),'danger');
}

$sql = "CREATE TABLE IF NOT EXISTS friends (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
uid INT(6) UNSIGNED NOT NULL,
fid INT(6) UNSIGNED NOT NULL,
created TIMESTAMP,
modified TIMESTAMP
)";

if (mysqli_query($conn, $sql)) {
    set_msg("Table friends created successfully",'hidden');
} else {
    set_msg("Error creating table: " . mysqli_error($conn),'danger');
}

$sql = "CREATE TABLE IF NOT EXISTS blocked (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
uid INT(6) UNSIGNED NOT NULL,
bid INT(6) UNSIGNED NOT NULL,
created TIMESTAMP,
modified TIMESTAMP
)";

if (mysqli_query($conn, $sql)) {
    set_msg("Table blocked created successfully",'hidden');
} else {
    set_msg("Error creating table: " . mysqli_error($conn),'danger');
}

//  setting up admin account and first login redirect 
//  update 1-08-2018

$d1 = new Datetime();
$time = $d1->format('U');
$query = "SELECT * FROM users WHERE id='1' AND email <> '' ";
$result = mysqli_query($conn,$query);
// set_msg($result ,'danger');
if (mysqli_num_rows($result) > 0) {
}
else{
	echo "string";
	$sql = "INSERT INTO users (firstname,lastname,displayname,email,username,password,reg_date,created,modified)
	VALUES ('', '','', '','admin','','',$time,$time)";
	if ($conn->query($sql) === TRUE) {
	    // echo "New record created successfully";
	} else {
	    set_msg("Error: " . $sql . "<br>" . $conn->error,'danger');
	}

// redirect to admin account setup

	?>
		<script type="text/javascript">
			window.location = "/admin_setup.php";
		</script>
	<?php
}
mysqli_close($conn);
}
