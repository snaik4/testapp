<?php
include('config.php');

$SQLsts = "SELECT * FROM test where id=".$_GET['id'];
$result = mysql_query($SQLsts);
$row = mysql_fetch_array($result)

?>

<html>

<head>
<title>
Test Work
</title>

<style>

</style>



</head>
<body>
<h2>
Sample Menu App
</h2>



          
            
          <form action="updateit.php" method="post" enctype="multipart/form-data" >
          <input type="hidden" name="id" value="<?php echo $row['id'];?>">
          item name:<input type="text" name="itemname" value="<?php echo $row['itemname'];?>" >
          category:<input type="text" name="itemcategory"  value="<?php echo $row['itemcategory'];?>" >
          serves:  <select name="status"  value="<?php echo $row['status'];?>" >
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                          </select>
          price:<input type="text" name="itemprice"  value=" <?php echo $row['itemprice'];?>" >
          
          <input type="submit" value+"submit">
          
          
          </form>
            

</body>

</html>