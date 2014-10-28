<?php
include('config.php');

$nameofitem = $_REQUEST['itemname'];
$itemcategory = $_REQUEST['itemcategory'];
$status = $_REQUEST['status'];
$price = $_REQUEST['itemprice'];
$SQL = "INSERT INTO test (itemname, itemcategory, status,itemprice)VALUES ('" 
.$nameofitem. "','" 
 .$itemcategory. "','"  
 .$status. "','" 
 .$price. "')";
echo $SQL;
$concheck = mysql_query($SQL);

if ($concheck == TRUE){
	echo "field updated";
	
	$url = "index.php";

	header('Location:'.$url);
	
}else{
echo "wtf error";	
	
}


?>