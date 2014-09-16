<?php

@session_start();
if(!isset($_SESSION['userName'])) 
{
header('location:login.php');
}
require_once('functions.php');
require_once('connection.php');
$user=new User(); 
$sele=$_SESSION['sele'];
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
	
	$sele=$_REQUEST['sele'];
	$_SESSION['sele']=$sele;
}

$id=$_GET['id'];

$sql1=mysql_query("SELECT * FROM wp_room_type_details WHERE ppro_id='$id'") or die(mysql_error());
$uid= $_SESSION['id'];
 ?>
 
	<table width="743px" bgcolor="#fcf7e9"   border="1em"  text-align='left' cellpadding="0" cellspacing="0" bordercolor="#CCCCCC" style="border-collapse:collapse; border:#ccc;">
<tr>
<a href="javascript:void(0);" onClick="newRoom('wp_addroom.php?id=<?php echo $id;?>')">[ADD NEW ROOM TYPE]</a>
</tr>
<tr > 
<td width=400 bgcolor="#faebc4"><b>Name</b></td>
<th colspan='3' bgcolor="#faebc4"><b>Options</b></th>
</tr>
<?php

while($sql2=mysql_fetch_array($sql1))
{
if( $_SESSION['role']=='Super Admin')
 {
	
?>
<tr>
<td><font color="#000000" face="segoe ui" size="2"><?php echo $sql2['name'];?></font></td>
<td><font color="#000000" face="segoe ui" size="2">
<a href="javascript:void(0);" onclick="editRoom('wp_roomedit.php?id=<?php echo $sql2['roomid'] ?> & pid=<?php echo $id;?> & name=<?php echo $sql2['name'];?>')">Edit</a></font></td>
<td><font color="#000000" face="segoe ui" size="2">
<a href="deleteproperty.php?roomid=<?php echo $sql2['roomid'] ?> ">Delete</a></font></b></td>
 <td><font color="#000000" face="segoe ui" size="2"><a href="wp_rooms.php?id=<?php echo $id;?>&rid=<?php echo $sql2['roomid']; ?>">Rooms</a></font></td>
<!--<td><a href=delete.php?id=" . $row['id'] ." onclick=\"return confirm('Are you sure you want to delete?');\">Delete</a></td>";
--></tr>
<?php
 }
else 
{
?>
<tr>
<td><font color="#000000" face="segoe ui" size="2"><?php echo $sql2['name'];?></font></td>
  <?php
  if($sql2['user_id']== $uid)
  {
  ?>
<td><font color="#000000" face="segoe ui" size="2">
<a href="javascript:void(0);" onclick="editRoom('wp_roomedit.php?id=<?php echo $sql2['roomid'] ?> & pid=<?php echo $id;?> & name=<?php echo $sql2['name'];?>')">Edit</a></font></td>
<td><font color="#000000" face="segoe ui" size="2">
<a href="deleteproperty.php?roomid=<?php echo $sql2['roomid'] ?> ">Delete</a></font></b></td>
<?php
}
?>
 <td><font color="#000000" face="segoe ui" size="2"><a href="wp_rooms.php?id=<?php echo $id;?>&rid=<?php echo $sql2['roomid']; ?>">Rooms</a></font></td>
<!--<td><a href=delete.php?id=" . $row['id'] ." onclick=\"return confirm('Are you sure you want to delete?');\">Delete</a></td>";
--></tr>
<?php
}

} ?>

</table>
</html>