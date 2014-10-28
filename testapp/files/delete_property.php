<?php

session_start();
if ($_SESSION['user'] == "") {
	
	header("Location: login.php");
}

include '../config.php';

$SQLSt = "DELETE FROM property WHERE id = " . $_REQUEST['id'];

mysql_query($SQLSt);

mysql_close($con);

header("Location: ../propertylist.php");

?>