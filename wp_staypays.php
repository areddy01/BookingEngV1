<html>
    <head>
    <link rel="stylesheet" type="text/css" href="msg.css" />
   <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
   <script src="http://code.jquery.com/jquery-1.8.3.min.js" type="text/javascript"></script>
   <script src="mappings.js" type="text/javascript"></script>
   <script type="text/javascript" src="js/jquery.js"></script> 
   <script type="text/javascript" src="js/jquery.validate.js"></script> 
   <script type="text/javascript" src="js/jquery.form.js"></script> 
  </head>
   <body><?php
include('config.php');
//if(isset($_POST['Staypays']))
 //{
   //$ar1=$_REQUEST['hide'];
   $ar1=$_REQUEST['rid'];
   $data=$_REQUEST['rdata'];
  
   ?>
<div>Room Type StayPay for: <?php echo $data;?></div>
 <?php $q="select * from staypays";
     $q1=mysql_query($q);
	 $rid=mysql_query("select * from staypays_add where rid='$ar1'");
	 $num=mysql_num_rows($rid);
	?>
 <form method="POST" action="insertstay.php">
 <?php
 if($num==0)
 {
	
	 ?>
         <select  name="mySelect" onChange="pluginCal('stayselect.php?id='+this.value)">
      <option value="" selected="selected">--select--</option><?php
       while($row = mysql_fetch_array($q1)) // Fetch Array in $row
       {
         ?>
       
       <option value="<?php echo $row['id'];?>">
           <?php echo "Active from".$row['fromdate'].","; ?>
               <?php echo "Active to".$row['todate'].","; ?>
                   <?php echo "Stay night".$row['snight'].","; ?>
                       <?php echo "free night".$row['fnight'].","; ?>
                           <?php echo "Maximum free night".$row['mfnight']; ?>
       </option>            
          <?php 
                } 
                ?>  
       </select>
       <?php
 }
 else{
	     $qry=mysql_query("select * from staypays where id not in(select id from staypays_add where rid='$ar1')");
		
	 ?>
     <select  name="mySelect" onChange="pluginCal('stayselect.php?id='+this.value)">
      <option value="" selected="selected">--select--</option><?php
       while( $result=mysql_fetch_array($qry)) // Fetch Array in $row
       {
         ?>
       
       <option value="<?php echo $result['id'];?>">
           <?php echo "Active from".$result['fromdate'].","; ?>
               <?php echo "Active to".$result['todate'].","; ?>
                   <?php echo "Stay night".$result['snight'].","; ?>
                       <?php echo "free night".$result['fnight'].","; ?>
                           <?php echo "Maximum free night".$result['mfnight']; ?>
       </option>            
          <?php 
                } 
                ?>  
       </select>
<?php
 }?>
 <input type="text" name="ar1" value="<?php echo $ar1;?>">
       
                <input type="submit" name="Attach" value="Attach"  > </form>
    
     <table  border="1" cellpadding="0" cellspacing="0" width="80%" height="10%">
         <tr>
            <td>
               <center>Active From </center> 
            </td>
            <td>
               <center>Active To </center> 
            </td>
            <td>
                <center>Stay Nights </center>
            </td>
             <td>
                <center>Free Nights  </center>
            </td>
             <td>
                <center>Max Free Nights </center>
            </td>
              <td>
                <center>Options</center>
            </td>
        </tr>
     
    <?php  
     $q="select * from staypays_add where rid='$ar1'";
     $q1=mysql_query($q) or die(mysql_error());
    while($row=mysql_fetch_array($q1))
     {?>
         <tr>
              <td>
            <?php  echo $row['fromdate']." &nbsp 12.0.0 AM";?>
            </td>
             <td>
            <?php  echo $row['todate']."&nbsp 12.0.0 AM";?>
            </td>
            <td><?php echo $row['snight'];?></td>
           <td><?php echo $row['fnight'];?></td>
           <td><?php echo $row['mfnight'];?></td>
           <td><a href="javascript:if(confirm('Do you want to delete this record')){location.href='staypays.php?id=<?php echo $row['id'];?>&amp;action=del1'}">Remove</a> </td>
   <?php }    
     ?></tr></table>



<?php 
if($_REQUEST['action']=='del1')
      {
           $s_id=$_GET['id'];

            $delet="DELETE FROM staypays_add WHERE id='$s_id'";

            $s=mysql_query($delet);
             
            echo "<script>window.location='staypays.php';</script>";
      }
?>
