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

?>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>jQuery UI Accordion - Customize icons</title>
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" />
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css" />
  <script>
  $(function() {
    var icons = {
      header: "ui-icon-circle-arrow-e",
      activeHeader: "ui-icon-circle-arrow-s"
    };
    $( "#accordion" ).accordion({
      icons: icons
    });
    $( "#toggle" ).button().click(function() {
      if ( $( "#accordion" ).accordion( "option", "icons" ) ) {
        $( "#accordion" ).accordion( "option", "icons", null );
      } else {
        $( "#accordion" ).accordion( "option", "icons", icons );
      }
    });
  });
  
  
    </script>
  <script >
    
</script>

<script type="text/javascript" src="jquery-1.9.0.js" ></script>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>


</head>
<body>
<?php
   
 $id=$_GET['ppd'];
 $id1=$_GET['rid'];

$query="select name,defaultallocation,defaultrate,defaultmin_stay,defaultinclusion from wp_room_type_details where 
ppro_id=$id and roomid=$id1";
$q=mysql_query($query);
$row1=mysql_fetch_array($q);

   // echo $row1['inclusion'];
?>
    <form  name="myform"  id="myform" action="popup_update.php">
    <input type="hidden" name="pid" value="<?php echo $id;?>">
      <input type="hidden" name="rid" value="<?php echo $id1;?>">
<div id="accordion">
  <h3>Room Type Info</h3>
  <div>  
       Room Type: <?php echo $row1['name'];?> <br>
       Default Allocation: <?php echo $row1['defaultallocation'];?> <br>
       Default Rate: <?php echo $row1['defaultrate'];?> <br>
       
       Room Inclusions:  <?php echo $row1['defaultinclusion'];?> 
       
  </div>
  <h3>Room Type Settings</h3>
  <div> 
   Default Allocation: <input type="text" name="allocation" value="<?php echo $row1['defaultallocation'];?>">*<br><br>
   Default Rate: <input type="text" name="rate" value="<?php echo $row1['defaultrate'];?>">dollars  *<br><br>
   <input type="hidden" name="min_stay" value="<?php echo $row1['defaultmin_stay'];?>">
   Room Stop Sell on New Days: <input type="checkbox" name="check" value=""><br><br>
   Room Inclusions: <textarea cols="50" rows="4" name="text" ><?php echo $row1['defaultinclusion'];?></textarea><br>
  </div>
</div>
<!--<input type="button" value="Apply Changes" name="changes" id="changes">-->
<button name="changes" id="changes">Apply Changes</button>
<input type="submit" value="Cancel" name="cancel">
 
    </form>
</body>
</html>
<?php
/* if(isset($_POST['submit']))
{
	
    echo $callo=$_POST['allocation'];
    
   echo $crate=$_POST['rate'];
 
   echo  $cmin=$_POST['min_stay'];

  echo $ctext=$_POST['text'];
    $uquery="update wp_room_type_details set defaultallocation='$callo',defaultrate='$crate',defaultmin_stay='$cmin',defaultinclusion='$ctext' where  ppro_id=$id and roomid=$id1";
   $q2=mysql_query($uquery);
    // header('location:select.php');
}
 if(isset($_POST['cancel']))
{
	header('location:inventorygrid.php');
}*/
?>
 
