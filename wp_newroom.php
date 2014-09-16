<?php
@session_start();
if(!isset($_SESSION['userName'])) 
{
header('location:login.php');
}
require_once('functions.php');
require_once('connection.php');
$user=new User(); 
$ppro_id=$_GET['id'];
$roomid=$_GET['rid'];
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
	var var5=document.getElementById(var5).value;
	var var6=document.getElementById(var6).value;
	var var7=document.getElementById(var7).value;
	var var8=document.getElementById(var8).value;
	var var9=document.getElementById(var9).value;
	var var10=document.getElementById(var10).value;
	var var11=document.getElementById(var11).value;
	if(var1.lenght<=0)
	{
		alert('please enter name');
		document.getElementById(var1).focus();
		return false;
	}
	/*	if(var2.lenght==0)
	{
		alert('please enter default inclusion');
		document.getElementById(var2).focus();
		return false;
	}
		if(var3.lenght==0)
	{
		alert('please enter default allocation');
		document.getElementById(var3).focus();
		return false;
	}
		if(var4.lenght==0)
	{
		alert('please enter default rate');
		document.getElementById(var4).focus();
		return false;
	}
		if(var5.lenght==0)
	{
		alert('please enter persons include in rate');
		document.getElementById(var5).focus();
		return false;
	}
		if(var6.lenght==0)
	{
		alert('please enter max persons');
		document.getElementById(var6).focus();
		return false;
	}
		if(var7.lenght==0)
	{
		alert('please enter Extra Adult Rate');
		document.getElementById(var7).focus();
		return false;
	}
		if(var8.lenght==0)
	{
		alert('please enter Extra chaild rate');
		document.getElementById(var8).focus();
		return false;
	}
	
		if(var9.lenght==0)
	{
		alert('please enter rack rate');
		document.getElementById(var9).focus();
		return false;
	}
	
		if(var10.lenght==0)
	{
		alert('please enter minimum stay');
		document.getElementById(var10).focus();
		return false;
	}
		if(var11.lenght==0)
	{
		alert('please select type of room');
		document.getElementById(var11).focus();
		return false;
	}*/
	return true;
	}
</script>
<script type="text/javascript">
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
</script>
<link href="css/login.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/style.css" media="all" />
</head>

<body>



<div  id="new">
 ADD ROOM
</div>
<div class="form">
<?php
           //  $vvvv=mysql_query("SELECT * FROM wp_manage_user");?>
<form action="wp_rooms_insert.php" method="post" >
 <!--<p class="contact"><label for="name">Select Owner:</label></p>
  
            <select name="user"  id="user" style="width:400px; height:27px;">
            <option value="">--Please Select Owner--</option>
            <?php
            while($row2 = mysql_fetch_array($vvvv))
              { ?>
            <option value="<?php echo $row2['id'];?>"><?php echo $row2['firstname'];?></option>
             
             <?php } ?>
  </select><br>-->

  <p class="contact"><label for="name">Room Name:</label></p> 
   <input type="text" name="name" value=""  required="" id="var1" style="width:400px; height:27px;"/>
    <input type="hidden" name="uid" value="<?php echo $_SESSION['id'];?>"  required="" id="var1"/>
   
   <p class="contact"><label for="name">Description:</label></p>
 <textarea  style="width:400px; height:100px;" name="Default1" id="var2" required=""></textarea>
  <input type="hidden" name="ppro_id" value="<?php echo $ppro_id;?>" id="var3" required="" />
  
  <p class="contact"><label for="name">Full Rate:</label></p>
   <input type="text" name="rackrate" value="" id="room" required="" />
   
  <p class="contact"><label for="name">Room Rate:</label></p>
   <input type="text" name="rate" value="" id="room" required="" />

 
   <input type="hidden" name="roomid" value="<?php echo $roomid;?>" id="var4" required=""/>
   <p class="contact"><label for="name">Min stay:</label></p> 
   <input type="text" name="minstay" value="" id="var5" required="" /> 

  <!-- <p class="contact"><label for="name">Default Allocation:</label></p> 
   <input type="text" name="allocation" value="" id="allocation" required="" /> -->
  
  <p class="contact"><label for="name">Max Persons:</label></p> 
   <input type="text" name="maxpersons" value="" id="allocation" required="" /> 
   
    <p class="contact"><label for="name">Enter ViewRoom Page URL:</label></p> 
    <textarea  style="width:400px; height:50px;" name="viewroom" id="terms" required=""></textarea>
  
   
   <p class="contact"><label for="terms">Terms And Conditions:</label></p>
 <textarea  style="width:400px; height:100px;" name="t" id="terms" required=""></textarea>
 
  
  
  
       <p class="contact"><label for="name"><input class="button" type="submit"  name="SUBMIT" value="SUBMIT"  />
   <input type="reset" class="button" name="Reset" value="RESET"  />
   
   <a href="dashboard.php"><input class="button" type="button" value="Back To DashBoard" /></a>
</label></p>
</form> </div>

<div style="width:auto; height:150px; float:left;">  
<?php
//include(footer.php); 
?>
</div>
</body>
</html>