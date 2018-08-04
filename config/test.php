<?php
$i = array();
$file = fopen("settings.sky","r") or die("Unable to open file!");
$credentials = fread($file,filesize("settings.sky"));

$i = explode("\n", $credentials);

fclose($file);
echo $k;
print_r($i);