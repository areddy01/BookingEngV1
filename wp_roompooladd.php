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
<div  id="new">
 NEW PROPERTY
</div>
<div  class="form">

<form   action=" " method="post" onclick="return vlaid1();">
<p class="contact"><label for="name">Name:</label></p> 
   <input type="text" name="name"required="" id="var1"/>
   
   <p class="contact"><label for="name">Default Pool Availability:</label></p>
 <input type="text" name="pool" required="" id="var1"/>

   <p class="contact"><label for="name">Copy Availability from existing room?</label></p>
    <select name="avilable_roomtype">
    <option value="">-No-</option>
    <option value="4 Bedroom Penthouse 5nts+">4 Bedroom Penthouse 5nts+</option>
    </select>
<p class="contact"><label for="name">&nbsp;&nbsp;</label></p>
  <p class="contact"><label for="name">&nbsp;&nbsp;</label></p>
   <p class="contact"><label for="name"><input class="button" type="submit"  name="SUBMIT" value="SUBMIT"  />
   <input type="reset" class="button" name="Reset" value="RESET"  />
   
   <a href="dashboard.php"><input class="button" type="button" value="Back To DashBoard" /></a>
</label></p>  
   </form>
</div>
</body>
</html>
<?php
 if(isset($_POST['SUBMIT']))
 {
 $var1=$_POST['name'];
 $var2=$_POST['pool'];
 $var3=$_POST['avilable_roomtype'];
 
 $q="INSERT INTO `wp_room_pool`(name, default_avilability, avilable_roomtype,roomtype) VALUES ('$var1','$var2','$var2s','1 bedroom Penthouse,2 bedroom Penthouse,2 bedroom Penthouse')";
 //$q="UPDATE wp_room_pool SET name='$var1',default_avilability='$var2',roomtype='$var3; WHERE roompool_id='$roompool_id' ";
 $q2=mysql_query($q) or die('MYSQL ERROR');
 if($q2)
 {
 
 header('location:roompools.php');
 }
 
 }
 