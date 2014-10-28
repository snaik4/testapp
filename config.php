<?php

$dbhost = "localhost";  // Database Host
$dbuser = "root";       // Database User Name
$dbpassword = "";   // User Password
$dbname = "testapp";       // Database Name

$con=mysql_connect($dbhost,$dbuser,$dbpassword);
mysql_select_db($dbname) or die(mysql_error());
// Check connection
if (!$con)
  {
	  die('Could not connect: ' . mysql_error());
  }
  
?>