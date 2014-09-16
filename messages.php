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
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>fitow</title>
<link href="css/login.css" rel="stylesheet" type="text/css" />
<link href="css/logout.css" rel="stylesheet" type="text/css" />
<link href="css/inclusions.css" rel="stylesheet" type="text/css" />
<link href="css/msg.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery1.4.2.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.8.2.custom.min.js"></script>
<script type="text/javascript" src="js/login.js"></script>
<script  type="text/javascript" src="js/messages.js"></script>
<script src="http://code.jquery.com/jquery-1.4.3.min.js" type="text/javascript"></script>
  <script type="text/javascript" src="js/script.js"></script>
</head>
<body>
<div id="Propertish_page_css">
<div id="header_propertish">
<div id="proprotish_logo">   </div>
       <a href="#" class="login_btn"><span><?php echo $_SESSION['user'] ?></span><div class="triangle"></div></a>          
                <div id="login_box">
                 <div id="tab"></div>
                   <div id="login_box_content"></div>
                     <div id="login_box_content">
                        <form id="login_form" action="logout.php">
                         <input  type="submit" name="logout" value="LOGOUT" />
                        </form>
                    </div>
                </div>
         
       
</div>
<form id="selfrm" name="frm" action="" method="post">
<?php
 
$result = mysql_query("SELECT * FROM wp_properties")
or die(mysql_error());
?><div id="currenty_managing">
<div id="text_currenty_managing">Currenty Managing</div>
<div id="select_box">
<select id="select_1" name="sele" onChange="this.form.submit();" >
<?php
while($row = mysql_fetch_array($result))
{
   $r1=$row['ppro_id'];
	$select="";
if($sele==$r1)
{
   $select="selected='selected'";	
	}
?>
   <option value="<?php echo $row['ppro_id'];?>"<?php echo $select; ?> > <?php echo $row['Name'];;?> </option>
  <?php } ?>
</select>
</div></div>
</form></div>
<div id="main_content">
<div id="navigation">
<ul>
<li>  <a href="dashboard.php">Dashboard</a></li>
<li><a href="inventorygrid.php"> Inventary</a></li>
<li><a href="propertymanager.php">Property Manager</a></li>
<li><a href="inclusions.php">Inclusions</a></li>
<!--<li><a href="#">Reporting</a></li>-->
<li> <a href="settings.php"> Setting</a></li>
<!--<li class="active"> <a href="messages.php"> Messsages</a></li>-->
<li> <a href="logout.php"> Logout</a></li>
</ul>
</div>
<div id="reporting_buttion">
</div>
<div id="content1">
<?php
$sql = mysql_query("SELECT * FROM wp_messages");
$c= mysql_query("SELECT * FROM wp_messages where readit='0'");
$r= mysql_num_rows($c);?>
<h3> Message Inbox</h3>
<table width='690' id='table1' border='0' cellspacing="0" >
<tr ><td  colspan="3" align="center" style="background:#0FF"> <div id="myDiv">You have (<?php print $r ?>) Messages</div> </td></tr>
<tr>
<td width="300"><center><strong>Subject</strong></center></td>
<td width="200"><center><strong>Messages</strong></center></td>
<td>&nbsp;</td>
</tr>
<tr><div id="msgdata"></div></tr></table>
   <form    method="POST" action="delete.php">
    <div style=" margin-left:800px; width:100px; ">
   
   Check All <input type="checkbox" id="check_all" value="">
   </div>
     <?php
while($rows=mysql_fetch_array($sql)){
$id=$rows['id'];
if($rows['readit']==0)
{
?>      
 <table>
     <tr> <span>  <div id="toggle">
            <div class="heading" onClick="pluginCall('message_ajax.php?clicked=<?php echo $rows['id'];?>')" style=" background-color:#FFFFBF;">
<span>
        <div style=" width:250px;margin-left:120px; float:left; color:#4287A8">                  
           <?php echo $rows['subject'];?></div>
         <div style="width:350px;">
         <?php echo substr($rows['msg'],0,11);?></div>
    </span></div>
                    

 <div class="content">
                <p>
                 <?php echo $rows['msg'];?>
                </p>
            </div> <div style="widows:25px; float:right;">
        <input type="checkbox" value="<?php echo $rows['id'] ?>" name="data[]" id="data"></div>
 </div></span>
 </tr></table><?php
}
else
{?>
   <span><div id="toggle">
   
    <div class="heading" style=" background-color:#CCC;">
     
   <span>
        <div style=" width:250px;margin-left:120px; float:left">                  
           <?php echo $rows['subject'];?></div>
         <div style="width:350px;">
         <?php echo substr($rows['msg'],0,11);?></div>
    </span>
          
   </div>  
            <div class="content">
                <p>
                 <?php echo $rows['msg'];?>
                </p>
            </div><div style="widows:25px; float:right; margin-right:100px; display:inline; background-color:#CCC;">
        <input type="checkbox" value="<?php echo $rows['id'] ?>" name="data[]" id="data"></div>
                    </div></span>  <?php
}
 }
mysql_close();
?>
         
        <table align="center"><tr> <td><input name="submit" type="submit" value="Delete" id="submit"></td></tr></table>
    </form> 
</div>
</div>
</div>
</body>
</html>
