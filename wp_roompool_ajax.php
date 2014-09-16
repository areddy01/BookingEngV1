<?php
@session_start();
if(!isset($_SESSION['userName'])) 
{
header('location:login.php');
}
require_once('functions.php');
require_once('connection.php');
$user=new User(); 
$id=$_GET['id'];
$sql1=mysql_query("SELECT * FROM wp_room_pool WHERE ppro_id='$id'") or die(mysql_error());
 ?>
	<div  id="new">
<a href="javascript:void(0);" onClick="roompoolAdd('wp_roompooladd.php')">[ADD NEW ROOM POOL]</a>
</div>

<table border="2px" bordercolor="#8CCAE1"><tr>
     <td width="475px"><center>Name</center></td>
     <td width="200px">options</td> </tr>
<?php

while($row1=mysql_fetch_array($sql1))
{
	?>
<tr>
<td><b><font color="#663300"><?php echo $row1['name'];?></font></b></td>
<td><b><font color="#663300"><a href="javascript:void(0);" onclick="roompoolEdit('wp_roompooledit.php?roompool_id=<?php echo $row1['roompool_id']?>');" > Edit</a></font></b></td>
 </tr>
 <?php
}

?>
 </table>

