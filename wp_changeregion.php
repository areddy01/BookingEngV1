<?php 
ob_start();
//@session_start();
require_once('functions.php');
require_once('connection.php');
@session_start();
$user=new User();


$id1=$_REQUEST['sid'];
$sql=mysql_query("select * from wp_region where city_id=$id1"); ?>

<select id="place" name="place" >
<option selected="selected">--select place--</option>
<?php
while($row=mysql_fetch_array($sql))
{?>
<option value="<?php echo $row['region_id'];?>"><?php echo $row['region_name'];?></option>
<?php }
 ?>
</select>