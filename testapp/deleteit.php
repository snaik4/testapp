<?php
include('config.php');
$SQLSt = "DELETE FROM test WHERE id = " . $_REQUEST['id'];

mysql_query($SQLSt);

mysql_close($con);

header("Location: index.php");

?>