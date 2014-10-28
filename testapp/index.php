<?php
include('config.php');

$SQLsts = "SELECT * FROM test";
$result = mysql_query($SQLsts);

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



                <table >
                    <tr>
                        <td>
                           ITEM NAME
                        </td>
                        <td >
                            CATEGORY
                        </td>
                        <td>
                            SERVES
                        </td>
                        <td>
                           PRICE
                        </td>
                        <td>
                           ACTION
                        </td>
                    </tr>
<?php
while($row = mysql_fetch_array($result)){?>
                    <tr>
                        <td >
                            <?php echo $row['itemname'];?>
                        </td>
                        <td>
                           <?php echo $row['itemcategory'];?>
                        </td>
                        <td>
                            <?php echo $row['status'];?>
                        </td>
                        <td>
                            <?php echo $row['itemprice'];?>
                        </td>
                        <td>
                            <a href="edit.php?id=<?php echo $row['id'];?>">edit</a> | <a href="deleteit.php?id=<?php echo $row['id'];?>">Delete</a>
                        </td>
                    </tr>
  <?php                  
     }
?>              
                </table>
          
            
          <form action="addit.php" method="post" enctype="multipart/form-data" >
          item name:<input type="text" name="itemname">
          category:<input type="text" name="itemcategory">
          serves:  <select name="status">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                          </select>
          price:<input type="text" name="itemprice">
          
          <input type="submit" value+"submit">
          
          
          </form>
            

</body>

</html>