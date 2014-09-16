<?php
session_start();
require_once('functions.php');
require_once('connection.php');
$user=new User(); 	
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>fitow</title>
<link href="css/login.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/style.css" media="all" />
<script type="text/javascript">
window.history.pushState(data, "Title", "/proprty");
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
</head>
<body>
<div id="prortey_manger">Room Pools</div>
<div class="form">
<?php
$roompool_id=$_REQUEST['roompool_id'];
$s3=mysql_query("select * from wp_room_pool where roompool_id='$roompool_id'")or die(mysql_error());
$s4=mysql_fetch_array($s3);
?>
<form   action=" " method="post" onclick="return vlaid1();">
<p class="contact"><label for="name">Name:</label></p> 
   <input type="text" name="name" value="<?php echo $s4['name'];?>"  required="" id="var1"/>
   
   <p class="contact"><label for="name">Default Pool Availability:</label></p>
 <input type="text" name="pool" value="<?php echo $s4['default_avilability'];?>"  required="" id="var1"/>

   <p class="contact"><label for="name">Poolmembers</label></p>
  <table border="1px" width="300px">
  <tr><td>status</td><td>Roomtype</td></tr>
  <tr>
  <?php 
  $roomtypes=explode(',',$s4['roomtype']);
  $r1=$roomtypes[0];
   $r2=$roomtypes[1];
  $r3=$roomtypes[2];
  ?>
  <td>
  <input type="checkbox" name="roomtype[]" <?php
if($r1==$r1)
{
echo "checked='checked'";
}
?>/></td>
  <td><?php  echo $r1; ?></td>
  </tr>
  <tr><td><input type="checkbox" name="roomtype[]" <?php
if($r2==$r2)
{
echo "checked='checked'";
}
?>/></td>
  <td><?php  echo $r2; ?></td></tr>
  <tr><td><input type="checkbox" name="roomtype[]" <?php
if($r3==$r3)
{
echo "checked='checked'";
}
?>/></td>
  <td><?php  echo $r3; ?></td></tr>
  </table>
  <p class="contact"><label for="name"></label></p>
   <p class="contact"><label for="name"><input class="button" type="submit"  name="SUBMIT" value="SUBMIT"  />
   <input type="reset" class="button" name="Reset" value="RESET"  />
   
   <a href="dashboard.php"><input class="button" type="button" value="Back To DashBoard" /></a>
</label></p>  
   </form>
</div></div>
</body>
</html>
<?php
 if(isset($_POST['SUBMIT']))
 {
 $var1=$_POST['name'];
 $var2=$_POST['pool'];
 $var3=implode(',',$_POST['roomtype']);
 
 //$q="INSERT INTO `wp_room_pool`(name, default_avilability, avilable_roomtype) VALUES ('$var1','$var2','$var2s')";
 $q="UPDATE wp_room_pool SET name='$var1',default_avilability='$var2',roomtype='$var3; WHERE roompool_id='$roompool_id' ";
 $q2=mysql_query($q) or die('MYSQL ERROR');
 if($q2)
 {
 
 header('location:roompools.php');
 }
 
 }
 