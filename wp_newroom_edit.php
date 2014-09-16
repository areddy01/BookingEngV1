<?php
@session_start();
if(!isset($_SESSION['userName'])) 
{
header('location:login.php');
}
require_once('functions.php');
require_once('connection.php');
$user=new User(); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<script type="text/javascript" >
function vlaid1()
{
	var var1=document.getElementById(var1).value;
	var var2=document.getElementById(var2).value;
	var var3=document.getElementById(var3).value;
	var var4=document.getElementById(var4).value;
	
	if(var1.lenght<=0)
	{
		alert('please enter name');
		document.getElementById(var1).focus();
		return false;
	}
	
	return true;
	}
</script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/login.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/style.css" media="all" />
<title>Fitow room types</title>
</head>
<body>

<div  id="new">
 EDIT ROOM
</div>
<div class="form">
<form   action="wp_roomupdate.php" method="post">
<?php
$ppro_id=$_GET['ppd']; 
$id=$_GET['id'];
$name=$_GET['name'];
$sele=$_SESSION['sele'];

             $vvvv=mysql_query("SELECT * FROM wp_manage_user");
$sql1=mysql_query("select * from wp_rooms where room_id='$id' and roomname='$name' and ppro_id='$ppro_id' ");
$sql2=mysql_fetch_array($sql1) ;

?>
 <!--<p class="contact"><label for="name">Select Owner:</label></p>
  
            <select name="user"  id="user" style="width:400px; height:27px;">
            <option value="">--Please Select Owner--</option>
            <?php
            while($row2 = mysql_fetch_array($vvvv))
              { ?>
            <option <?php if($sql2['user_id']==$row2['id']){ ?> selected="selected" <?php }?> value="<?php echo $row2['id'];?>"><?php echo $row2['firstname'];?></option>
             
             <?php } ?>
  </select><br>-->
 <p class="contact"><label for="name">Room Name:</label></p> 
   <input type="text" name="name" value="<?php  echo $sql2['roomname']; ?>"  required="" id="var1" style="width:400px; height:27px;"/>
   
   <p class="contact"><label for="name">Description:</label></p>
 <textarea  style="width:400px; height:100px;" name="Default1" id="var2" required=""><?php echo $sql2['roomdes']; ?></textarea>
 <input type="hidden" name="ppro_id" value="<?php echo $sql2['ppro_id'];?>" id="var3" required="" />

 <input type="hidden" name="room_id" value="<?php echo $sql2['room_id'];?>" id="var3" required="" />
   <input type="hidden" name="roomid" value="<?php echo $sql2['roomid'];?>" id="var4" required=""/> 
    <input type="hidden" name="userid" value="<?php echo $sql2['user_id'];?>" id="var4" required=""/>
    <p class="contact"><label for="name">Full Rate:</label></p>
   <input type="text" name="rackrate" value="<?php echo $sql2['rackrate'];?>" id="room" required="" />
   
    <p class="contact"><label for="name">Room Rate:</label></p>
   <input type="text" name="rate" value="<?php echo $sql2['roomrate'];?>" id="room" required="" />
   
   <p class="contact"><label for="name">Min stay:</label></p> 
   <input type="text" name="minstay" value="<?php echo $sql2['minstay'];?>" id="var5" required="" /> 

<!--<p class="contact"><label for="name">Default Allocation:</label></p> 
   <input type="text" name="allocation" value="<?php echo $sql2['newdefaultallocation'];?>" id="allocation" required="" /> -->
 <p class="contact"><label for="name">Max Persons:</label></p> 
   <input type="text" name="maxpersons" value="<?php echo $sql2['maxpersons'];?>" id="allocation" required="" /> 
   
    <p class="contact"><label for="name">Enter ViewRoom Page URL:</label></p> 
    <textarea  style="width:400px; height:50px;" name="viewroom" id="terms"><?php echo $sql2['link'];?></textarea>
    
   
   <p class="contact"><label for="terms">Terms And Conditions:</label></p>
 <textarea  style="width:400px; height:100px;" name="t" id="terms" required=""><?php echo $sql2['terms'];?></textarea><br><br>
 <span>
<input type="checkbox" name="show" <?php if($sql2['showroom']=='show'){?> checked="checked"<?php } ?> value="show"/>
<label for="name">Showing room on Grid:</label></span><br><br>
 
 
   
    <input class="button" type="submit"  name="SUBMIT" value="SUBMIT"  />
   <input type="reset" class="button" name="Reset" value="RESET"  />
   
   <a href="dashboard.php"><input class="button" type="button" value="Back To DashBoard" /></a>
</label></p>
</form>
</div>         

<div style="width:auto; height:150px; float:left;">  
<?php
//include(footer.php); 
?></div>

</body>
</html>