<?php include('config.php');
$updatesql = "UPDATE test SET itemname=
'". $_REQUEST['itemname'] . "', 
itemcategory = '" . $_REQUEST['itemcategory'] . "',
status = '" . $_REQUEST['status'] . "',
itemprice = '" . $_REQUEST['itemprice'] . "'
	  WHERE id= " . $_REQUEST['id'];
	  
	  echo $updatesql;
	  
	 mysql_query($updatesql);
	  mysql_close($con);
	  $url = "index.php";
header('Location:'.$url);


?>