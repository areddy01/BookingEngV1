<?php 
ob_start();
@session_start();
require_once('functions.php');
require_once('connection.php');
@session_start();
$user=new User();?>
	
<?php

$id=$_REQUEST['id'];

$sql=mysql_query("select * from wp_citys where cid=$id "); ?>

<select id="state" name="city"  style="width:400px; height:27px;">

<?php
while($row=mysql_fetch_array($sql))
{
 $city_id=$row['city_id'];
 ?>
<option value="<?php echo $row['city_id'];?>"><?php echo $row['city_name'];?></option>
<?php
 } ?>
</select>


/*
<select id="state" name="city" onChange="changeRegion('wp_changeregion.php?sid='+this.value)">
<option selected="selected">select State</option>
<?php
while($row=mysql_fetch_array($sql))
{
 $city_id=$row['city_id'];
 ?>
<option value="<?php echo $row['city_id'];?>"><?php echo $row['city_name'];?></option>
<?php
 $sqry=mysql_query("SELECT *  FROM wp_region where city_id=$city_id order by region_name")or die(mysql_error());
       
           while($row12 = mysql_fetch_array($sqry))
            {?>
              <option value="<?php echo $row12['region_id'];?>">.....<?php echo $row12['region_name'];?></option>
      <?php }

 } ?>
</select>
*/
