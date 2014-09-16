<?php 
ob_start();
@session_start();
require_once('functions.php');
require_once('connection.php');
@session_start();
if(!isset($_SESSION['userName'])) 
{
header('location:login.php');
}
$user=new User();

	
$sele=$_SESSION['sele'];
if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['sele']!='') 
{
	$sele=$_POST['sele'];
	$_SESSION['sele']=$sele;
}

?><head>
<link href="http://static.scripting.com/github/bootstrap2/css/bootstrap.css" rel="stylesheet">
		<script src="http://static.scripting.com/github/bootstrap2/js/jquery.js"></script>
		<script src="http://static.scripting.com/github/bootstrap2/js/bootstrap-transition.js"></script>
		<script src="http://static.scripting.com/github/bootstrap2/js/bootstrap-modal.js"></script>
 
        <style>
 .underline {
    text-decoration:line-through;
}
 </style>
 

<form action="griddata.php" method="post">
 <?php 
 $uid= $_SESSION['id'];
 $query="select * from wp_griddateselection where user_id='$uid'";
 $q1=mysql_query($query);
 $q2=mysql_fetch_array($q1);
 $from=$q2['fromdate']; 
 $to=$q2['todate'];
 $ran=$q2['date_range'];
$start = date('Y-m-d ', strtotime($from));
 $end = date('Y-m-d ', strtotime($to));
$m= date("m");
$de= date("d");
$y= date("Y");
?>
<table border="1" id="mytable">
<tr>
   <th>
        Room <br>
Rate Package(s)
    </th> 
<?php
$init_date = strtotime($start);
$dst_date = strtotime($end);
$offset = $dst_date-$init_date;
$dates = floor($offset/60/60/24) + 1;
for ($i = 0; $i < $dates; $i++)
{
	echo "<th>";
$newdate = date("Y-M-d", mktime(12,0,0,date("m", strtotime($start)),
(date("d", strtotime($start)) + $i), date("Y", strtotime($start))));
echo $newdate ."<br>";
//echo '<input type="hidden" name="dt[]" value='.$newdate .' />';
echo "</th>";
}
?>


<?php
 ?>

</tr>
<?php
$id=$_GET['id'];?>

<?php 
$query="select  * from wp_room_type_details where ppro_id='$id' and user_id='$uid'";
echo "select  * from wp_room_type_details where ppro_id='$id' and user_id='$uid'";
$q=mysql_query($query) or die(mysql_error());?>
   	<?php while($row = mysql_fetch_array($q)) 
        {
			 $rid=$row['roomid'];?>
          <tr>
            <td>
               <a href="popup.php?id1='<?php echo $row['roomid'];?>'&id='<?php echo $id;?>'">
                  <img src="images/icon.png" alt="Room Type Control Panel"></a>  
                  <input type="hidden" name="roomid1[]" value="<?php echo $rid;?>" />
                  <input type="hidden" name="ppro_id1" value="<?php echo $id;?>">
			  <?php echo $row['name'];
           echo "<br>"."<hr>";
		  echo "</td>";
    for($i=0;$i < $dates; $i++){?>
     <td>
   <?php
      $newdate = date("d-m-Y", mktime(12,0,0,date("m", strtotime($start)),
(date("d", strtotime($start)) + $i), date("Y", strtotime($start))));

	echo '<input type="hidden" name="dt[]" value='.$newdate .' />';
	echo '<input type="hidden" name="range" value='.$dates .' />';
	$inventory_qry=mysql_query("SELECT * FROM `wp_inventory_grid_details` WHERE ppro_id='$id' AND roomid='$rid' AND grid_date='$newdate'");
	$inventory_count=mysql_num_rows($inventory_qry);
	$inventory_data=mysql_fetch_array($inventory_qry);
	$qu="select * from wp_griddateselection";
	$sq=mysql_query($qu) or die(mysql_error());
	$fet=mysql_fetch_array($sq);
	//echo $fet['min_stay'];
	if($inventory_count!=0)
	{
		if($fet['rates']=='rates')
		{
	?>
        <input type="text" name="rate[]" style="width:25px;" value="<?php echo $inventory_data['roomrate'];?>">
		<?php
		}
		 if($fet['availability']=='Availability')
		{?>
          <input type="text" name="avil[]" style="width:25px;" value="<?php echo $inventory_data['roomavilability'];?>" />
         <?php
		  }
		?>
       <!--   <input type="text"  name="room[]" style="width:25px;" value="<?php echo $inventory_data['stop_sell'];?>">-->
  <?php 
  	if($fet['min_stay']=='minstay')
 	{
	  ?>
      				<input type="text" name="min[]" style="width:25px;" value="<?php echo $inventory_data['min_room_stay'];?>">
        <?php 
	}
	if($fet['stop_sell']=='stopsell')
	{
				?>
       <a href="#"  onClick="btnClick()"><img src="images/ok.png" alt="Room Type Control Panel"></a>
<?php
	}
 }
	else
   {
	
      if($fet['rates']=='rates')
	  {?>
    
        <input type="text" name="rate[]" style="width:25px;" value="<?php echo $row['defaultrate'];?>">
		<?php
	  }
      if($fet['availability']=='Availability')
	  {?>
         <input type="text" name="avil[]" style="width:25px;" value="<?php echo $row['defaultallocation'];?>"/><?php } ?>
   <!--  <input type="text" name="room[]"   style="width:25px;"  value="<?php echo $row['setstop'];?>" />
       --> 
    <?php if($fet['min_stay']=='minstay')
 	{?>
      	<input type="text" name="min[]" style="width:25px;" value="<?php echo $row['defaultmin_stay'];?>">
     <?php 
	 } 
     if($fet['stop_sell']=='stopsell')
	{?>
       <a href="#"  onClick="btnClick()"><img src="images/ok.png" alt="Room Type Control Panel"></a>
	<?php }?>
     <?php 
	 } ?>
     </td>
	 <?php
	  }
		}
		echo " </tr>";
		echo "select  * from wp_room_type_details where ppro_id='$id' and user_id='$uid'";
			 ?>
    

</table>
</td>
<input type="submit" name="submit" value="Submit" /></form>
	
 