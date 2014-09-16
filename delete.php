<?php
require_once('functions.php');
require_once('connection.php');
$user=new User();
if(isset($_POST['submit'])) {
	$id_array = $_POST['data']; // return array
	$id_count = count($_POST['data']); // count array
	
	for($i=0; $i < $id_count; $i++) {
		$id = $id_array[$i];
		$query = mysql_query("DELETE FROM `wp_messages` WHERE `id` = '$id'");
		if(!$query) { die(mysql_error()); }
		else
		{
			echo "<script>alert('successs');</script>";
		}
	}
	header("Location: messages.php"); // redirent after deleting
}
?>