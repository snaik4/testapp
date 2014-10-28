<?php 
	
	session_start();
	if ($_SESSION['user'] == "") {
		
		header("Location: login.php");
	}
	
	include '../config.php';
	
	
$SQLsts1 = "SELECT * FROM property WHERE id=" . $_REQUEST['id'];
$result1 = mysql_query($SQLsts1);
$row1 = mysql_fetch_array($result1);
	
	$file_exts = array("jpg", "bmp", "jpeg", "gif", "png");
$upload_exts = end(explode(".", $_FILES["image"]["name"]));
if ((($_FILES["image"]["type"] == "image/gif")
|| ($_FILES["image"]["type"] == "image/jpeg")
|| ($_FILES["image"]["type"] == "image/png")
|| ($_FILES["image"]["type"] == "image/pjpeg"))
&& ($_FILES["image"]["size"] < 2000000000000000000)
&& in_array($upload_exts, $file_exts))
{
if ($_FILES["image"]["error"] > 0)
{
echo "Return Code: " . $_FILES["image"]["error"] . "<br>";
}
else
{

// Enter your path to upload file here
if (file_exists("images/" .
$_FILES["image"]["name"]))
{
echo "<div class='error'>"."(".$_FILES["image"]["name"].")".
" already exists. "."</div>";
}
else
{
move_uploaded_file($_FILES["image"]["tmp_name"],
"images/" . $_FILES["image"]["name"]);
echo "<div class='sucess'>"."Stored in: " .
"images/" . $_FILES["image"]["name"]."</div>";
$SQLSt = "UPDATE property SET 
	propertyname = '". $_REQUEST['propertyname'] . "', 
	type = '" . $_REQUEST['type'] . "', 
	streetaddress = '" . $_REQUEST['streetaddress'] . "',
	 city = '". $_REQUEST['city'] . "', 
	 statecityzip = '". $_REQUEST['statecityzip'] . "', 
	zip = '". $_REQUEST['zip'] . "', 

	 county = '" . $_REQUEST['county'] . "',
	 	 yearbuilt = '". $_REQUEST['yearbuilt'] . "', 
		 units = '". $_REQUEST['units'] . "', 
		 gla = '". $_REQUEST['gla'] . "', 
		 lotsize = '". $_REQUEST['lotsize'] . "', 
		 askingprice = '". $_REQUEST['askingprice'] . "', 
		 priceperunit = '". $_REQUEST['priceperunit'] . "', 
		 pricepersqfoot	 = '". $_REQUEST['pricepersqfoot'] . "', 
		 vacancy = '". $_REQUEST['vacancy'] . "', 
		 assesedvalue = '". $_REQUEST['assesedvalue'] . "', 
	 
	 
	status = '" . $_REQUEST['status'] . "', 
	stage = '" . $_REQUEST['stage'] . "',
	 image = '" . $_FILES["image"]["name"] . "',
	 map = '". $_REQUEST['map'] . "', 
	feed = '" . $_REQUEST['feed'] . "', 
	documents = '" . $_REQUEST['documents'] . "',
photos = '" . $_REQUEST['photos'] . "',
task = '" . $_REQUEST['task'] . "',
added = '" . $_SESSION['user'] . "'
	  WHERE id= " . $_GET['id'];


echo $SQLSt;
		
	mysql_query($SQLSt);
$id=$_GET['id'];
if(isset($_FILES['files'])){
    $errors= array();
	foreach($_FILES['files']['tmp_name'] as $key => $tmp_name )	{
		$file_name = $key.$_FILES['files']['name'][$key];
		$file_size =$_FILES['files']['size'][$key];
		$file_tmp =$_FILES['files']['tmp_name'][$key];
		$file_type=$_FILES['files']['type'][$key];	
        if($file_size > 2097152){
			$errors[]='File size must be less than 2 MB';
        }		
		if($file_size!=0){
        $SQLSt2="INSERT into gallery (`id`,`file_name`,`file_size`,`file_type`) VALUES('$id','$file_name','$file_size','$file_type'); ";
        $desired_dir="user_data";
        if(empty($errors)==true){
            if(is_dir($desired_dir)==false){
                mkdir("$desired_dir", 0700);		// Create directory if it does not exist
            								}
            if(is_dir("$desired_dir/".$file_name)==false){
                move_uploaded_file($file_tmp,"user_data/".$file_name);
            											}
														else{									//rename the file if another one exist
                $new_dir="user_data/".$file_name.time();
                 rename($file_tmp,$new_dir) ;				
            												}
            mysql_query($SQLSt2);			
        						}
								else{
                print_r($errors);
        							}}
    				}
	if(empty($error)){
		echo "Success";
	}
}





if(isset($_FILES['docs'])){
    $errors= array();
	foreach($_FILES['docs']['tmp_name'] as $key => $tmp_name ){
		$doc_name = $key.$_FILES['docs']['name'][$key];
		$doc_size =$_FILES['docs']['size'][$key];
		$doc_tmp =$_FILES['docs']['tmp_name'][$key];
		$doc_type=$_FILES['docs']['type'][$key];	
												if($doc_size > 200000000000000){
													$errors[]='File size must be less than 2 MB';
												}		
												
												if($doc_size!=0){
        $SQLSt2="INSERT into documents (`id`,`doc_name`,`doc_size`,`doc_type`) VALUES('$id','$doc_name','$doc_size','$doc_type'); ";
        $desired_dir="documents";
													if(empty($errors)==true){
												if(is_dir($desired_dir)==false){
													mkdir("$desired_dir", 0700);		// Create directory if it does not exist
												}
												if(is_dir("$desired_dir/".$doc_name)==false){
													move_uploaded_file($doc_tmp,"documents/".$doc_name);
												}else{									//rename the file if another one exist
													$new_dir="user_data/".$doc_name.time();
													 rename($doc_tmp,$new_dir) ;				
												}
																mysql_query($SQLSt2);			
															}else{
																		print_r($errors);
																}
						}
    }
	if(empty($error)){
		echo "Success";
	}
}












}
}
}
else
{
echo "<div class='error'>Invalid file</div>";

$SQLSt = "UPDATE property SET 
	propertyname = '". $_REQUEST['propertyname'] . "', 
	type = '" . $_REQUEST['type'] . "', 
	streetaddress = '" . $_REQUEST['streetaddress'] . "',
	 city = '". $_REQUEST['city'] . "', 
	 statecityzip = '". $_REQUEST['statecityzip'] . "', 
	zip = '". $_REQUEST['zip'] . "', 

	 county = '" . $_REQUEST['county'] . "',
	 	 yearbuilt = '". $_REQUEST['yearbuilt'] . "', 
		 units = '". $_REQUEST['units'] . "', 
		 gla = '". $_REQUEST['gla'] . "', 
		 lotsize = '". $_REQUEST['lotsize'] . "', 
		 askingprice = '". $_REQUEST['askingprice'] . "', 
		 priceperunit = '". $_REQUEST['priceperunit'] . "', 
		 pricepersqfoot	 = '". $_REQUEST['pricepersqfoot'] . "', 
		 vacancy = '". $_REQUEST['vacancy'] . "', 
		 assesedvalue = '". $_REQUEST['assesedvalue'] . "', 
	 
	 
	status = '" . $_REQUEST['status'] . "', 
	stage = '" . $_REQUEST['stage'] . "',
	 image = '" . $row1["image"] . "',
	 map = '". $_REQUEST['map'] . "', 
	feed = '" . $_REQUEST['feed'] . "', 
	documents = '" . $_REQUEST['documents'] . "',
photos = '" . $_REQUEST['photos'] . "',
task = '" . $_REQUEST['task'] . "',
added = '" . $_SESSION['user'] . "'
	  WHERE id= " . $_GET['id'];


echo $SQLSt;
		
	mysql_query($SQLSt);

$id=$_GET['id'];

if(isset($_FILES['files'])){
    $errors= array();
	foreach($_FILES['files']['tmp_name'] as $key => $tmp_name ){
		$file_name = $key.$_FILES['files']['name'][$key];
		$file_size =$_FILES['files']['size'][$key];
		$file_tmp =$_FILES['files']['tmp_name'][$key];
		$file_type=$_FILES['files']['type'][$key];	
        if($file_size > 2097152){
			$errors[]='File size must be less than 2 MB';
        }		if($file_size!=0){
        $SQLSt2="INSERT into gallery (`id`,`file_name`,`file_size`,`file_type`) VALUES('$id','$file_name','$file_size','$file_type'); ";
        $desired_dir="user_data";
        if(empty($errors)==true){
            if(is_dir($desired_dir)==false){
                mkdir("$desired_dir", 0700);		// Create directory if it does not exist
            }
            if(is_dir("$desired_dir/".$file_name)==false){
                move_uploaded_file($file_tmp,"user_data/".$file_name);
            }else{									//rename the file if another one exist
                $new_dir="user_data/".$file_name.time();
                 rename($file_tmp,$new_dir) ;				
            }
            mysql_query($SQLSt2);			
        }else{
                print_r($errors);
        }}
    }
	if(empty($error)){
		echo "Success";
	}
}





if(isset($_FILES['docs'])){
    $errors= array();
	foreach($_FILES['docs']['tmp_name'] as $key => $tmp_name ){
		$doc_name = $key.$_FILES['docs']['name'][$key];
		$doc_size =$_FILES['docs']['size'][$key];
		$doc_tmp =$_FILES['docs']['tmp_name'][$key];
		$doc_type=$_FILES['docs']['type'][$key];	
												if($doc_size > 200000000000000){
													$errors[]='File size must be less than 2 MB';
												}		
												
												if($doc_size!=0){
        $SQLSt2="INSERT into documents (`id`,`doc_name`,`doc_size`,`doc_type`) VALUES('$id','$doc_name','$doc_size','$doc_type'); ";
        $desired_dir="documents";
													if(empty($errors)==true){
												if(is_dir($desired_dir)==false){
													mkdir("$desired_dir", 0700);		// Create directory if it does not exist
												}
												if(is_dir("$desired_dir/".$doc_name)==false){
													move_uploaded_file($doc_tmp,"documents/".$doc_name);
												}else{									//rename the file if another one exist
													$new_dir="user_data/".$doc_name.time();
													 rename($doc_tmp,$new_dir) ;				
												}
																mysql_query($SQLSt2);			
															}else{
																		print_r($errors);
																}
						}
    }
	if(empty($error)){
		echo "Success";
	}
}










}

	
	
	
	




	
	$sri=$_GET["id"];
	$url = "../property_view.php?id=$sri";

	header('Location:'.$url);
mysql_close($con);

?>