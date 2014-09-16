<?php
@session_start();
if(!isset($_SESSION['userName'])) 
{
header('location:login.php');
}
require_once('functions.php');
require_once('connection.php');
$user=new User(); 
$id=$_REQUEST['id'];
?>


<div id="div_add_more_child_product_<?php echo $id; ?>">
<?php
$result = mysql_query("SELECT *  FROM wp_citys")
or die(mysql_error());
?>

              <select id="select_<?php echo $id;?>" name="select_<?php echo $id;?>" onChange="changeP(this.value,<?php  echo $id;?>)" style="width:150px; height:27px;">
              <option selected="selected">Region</option>
              <?php
         while($row1 = mysql_fetch_array($result))
        {
         $city_id= $row1['city_id'];
          ?>
          <option value="<?php echo $row1['city_id'];?>"><?php echo $row1['city_name'];?></option>
  
          <?php
           $sqry=mysql_query("SELECT *  FROM wp_region where city_id=$city_id order by region_name")or die(mysql_error());
       
             while($row12 = mysql_fetch_array($sqry))
             {?>
             <option value="<?php echo $row12['region_id'];?>-<?php echo $row1['city_id'];?>">.....<?php echo $row12['region_name'];?></option>
          <?php }

       } ?>
     </select>
    
   <select name="ppro_id_<?php echo $id;?>"  id="ppro_id_<?php echo $id;?>" onChange="changeR(this.value,<?php  echo $id;?>)"  style="width:150px; height:27px;">
    <option selected="selected">Property</option>
  </select>

    <select name='roomtype_<?php echo $id;?>' id='roomtype_<?php echo $id;?>'onChange="changeRR(this.value,<?php  echo $id;?>)" style="width:150px; height:27px;">
     <option>Roomtype</option>
   </select>
   
 <select name='room_<?php echo $id;?>' id='room_<?php echo $id;?>' style="width:150px; height:27px;">
     <option>Room</option>
   </select>
<img height="14" width="14" title="Add Property" onclick="AddMoreChildProduct(<?php echo $id;?>)" alt="Add" src="images/plus.png">
<img height="14" width="14" title="Delete Property" onclick="RemoveMoreChildProduct(<?php echo $id;?>)" alt="Add" src="images/minus.png">

</div>
   </body>
   </html>