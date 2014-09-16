<?php 
ob_start();
@session_start();
require_once('functions.php');
require_once('connection.php');
@session_start();
$user=new User();
	
     /* $query=mysql_query("select * from selects where sid=1");
       while( $result=mysql_fetch_array($query)) // Fetch Array in $row
       {*/
	   if(isset($_REQUEST['data']))
	   {
		   alert('change');
$name=$_REQUEST['data'];
$query=mysql_query("select ppro_id,Name from wp_properties where ppro_id ='$name'");?>
<select id="append" name="last_name"> 
<option value="" selected="selected">--select--</option><?php
       while( $result=mysql_fetch_array($query))
{
        $select1="";
		   if($_POST['last_name'] == $result['ppro_id'])
		   {
			   $select1="selected";
		   }?>
<option value="<?php echo $result['ppro_id'];?>" <?php echo $select1;?>><?php echo $result['Name']; ?></option>
<?php }?>
</select>
<?php } 
 if(isset($_REQUEST['id']))
	   {
$name=$_REQUEST['id'];
$query=mysql_query("select ppro_id,Name from wp_properties where ppro_id ='$name'");?>
<select id="append1" name="last_name" onChange="changeRoom('changeproperty.php?id1='+this.value)"> 
<option value="" selected="selected">--select--</option><?php
       while( $result=mysql_fetch_array($query))
{
	 $select2="";
		   if($_POST['last_name'] == $result['ppro_id'])
		   {
			   $select2="selected";
		   }?>
<option value="<?php echo $result['ppro_id'];?>"<?php echo $select2;?>><?php echo $result['Name']; ?></option>
<?php }?>
</select>
<?php } 
 if(isset($_REQUEST['id1']))
	   {
$name=$_REQUEST['id1'];
$query=mysql_query("select roomid,name from wp_room_type_details where ppro_id='$name'");?>
<select id="append2" name="room"  onChange="changeRoom1('changeproperty.php?roomid='+this.value)"> 
<option value="" selected="selected">--select--</option><?php
       while( $result=mysql_fetch_array($query))
{
	 $select3="";
		   if($_POST['room'] == $result['ppro_id'])
		   {
			   $select3="selected";
		   }?>
<option value="<?php echo $result['roomid'];?>"><?php echo $result['name']; ?></option>
<?php }?>
</select>
<?php }

 if(isset($_REQUEST['roomid']))
	   {
		   $ppid=$_REQUEST['ppid'];
		 
$roomid=$_REQUEST['roomid'];
$query=mysql_query("select room_id,roomname from wp_rooms where roomid ='$roomid'");?>
<select id="append3" name="room_name"> 
<option value="" selected="selected">--select--</option><?php
       while( $result=mysql_fetch_array($query))
{
	 $select2="";
		   if($_POST['room_name'] == $result['room_id'])
		   {
			   $select2="selected";
		   }?>
<option value="<?php echo $result['room_id'];?>"<?php echo $select2;?>><?php echo $result['roomname']; ?></option>
<?php }?>
</select>
<?php }  ?>