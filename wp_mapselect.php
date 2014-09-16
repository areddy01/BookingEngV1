<?php
@session_start();
if(!isset($_SESSION['userName'])) 
{
header('location:login.php');
}
require_once('functions.php');
require_once('connection.php');
$user=new User();
if(!isset($_SESSION['userName'])) 
{
header('location:login.php');
}
$user=new User();
$sele=$_SESSION['sele'];
 if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty( $_POST['sele'] )) 
{
	$sele=$_REQUEST['sele'];
	$_SESSION['sele']=$sele;
} 

$id=$_GET['ppro_id'];

$query="select Name from wp_properties where ppro_id='$id'";
$q=mysql_query($query);
$res=mysql_fetch_row($q);

//$res=mysql_fetch_row($q);

?>
<input type="text" name="pname" value="<?php echo $res[0]?>">
