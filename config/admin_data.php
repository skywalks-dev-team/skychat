<?php
require 'common.php';
$pass = $mail = $d_name = $f_name = $l_name = "";
// $create_settings_file = fopen("settings.sky", "w");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $pass = safe_input($_POST["pass"]);
  $pass = md5($pass);
  $mail = safe_input($_POST["mail"]);
  $d_name = safe_input($_POST["d_name"]);
  $f_name = safe_input($_POST["f_name"]);
  $l_name = safe_input($_POST["l_name"]);


  require 'conn.php';

  // $db = get_Db();
  // echo $db;

  $conn = mysqli_connect($servername, $username, $password, $db);
	// Check connection
	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}
  $sql = "UPDATE users SET lastname = '$l_name',firstname = '$f_name',email = '$mail',displayname = '$d_name' , password = '$pass' WHERE id=1";

	if ($conn->query($sql) === TRUE) {
	    set_msg("user data updated successfully",'success');
	} else {
	    echo "Error updating record: " . $conn->error;
	}

	$conn->close();
}