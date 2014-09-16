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
 if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
	$sele=$_REQUEST['sele'];
	$_SESSION['sele']=$sele;
}
?>
<html>
    <head>
   <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
   <script type="text/javascript" src="js/script.js"></script>
   <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js">
</script>
<script> 
$(document).ready(function(){
  $("#flip").click(function(){
    $("#panel").slideToggle("slow");
  });
});
</script>
 
<style type="text/css"> 
#panel,#flip
{
padding:5px;
text-align:center;
background-color:#e5eecc;
border:solid 1px #c3c3c3;
}
#panel
{
padding:50px;
display:none;
}
</style>
    </head>
    <body>
  <div id="flip">Booking Form Rooms</div>
<div id="panel">This page will allow you to set stay pays, promotions, extras, rules and images specific to each mapped room on the current booking form. </div>
<table border="1" cellpadding="0" cellspacing="0" width="80%" height="10%">
   
        <?php 
        $query="select distinct s.name, r.name,r.roomid from wp_properties s,wp_room_type_details r where s.ppro_id=r.ppro_id";
        $q=  mysql_query($query);?>
        <tr>
            <td>
               <center>Property</center> 
            </td>
            <td>
               <center>Room</center> 
            </td>
            <td>
                <center>Options</center>
            </td>
        </tr>
        <?php while($row=mysql_fetch_array($q))
        { ?>
        <form name="myform" method="post" action="staypays.php">     
            <tr>
              <td>
            <?php echo $row['name'];?>
            </td>
           <td>
                <input type="hidden" value="<?php echo $row['name'];?>" name="hide">
           <?php  echo $row['name'];?>
           
            </td>
            <td>
                <input type="submit" name="Staypays" value="Stay Pays"> |  <input type="submit" name="Promotions" value="Promotions"> | <input type="submit" name="Extras" value="Extras"> | <input type="submit" name="Bookingrules" value="Booking Rules"> |  <input type="submit" name="Images" value="Images">

            </td>
            
       <?php  }      
        ?>
        </tr> </form>
</table>    
</body>
</html>