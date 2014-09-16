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
 if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
	$sele=$_REQUEST['sele'];
	$_SESSION['sele']=$sele;
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Wotusee</title>

<link href="css/login.css" rel="stylesheet" type="text/css" />
 <link href="css/main.css" rel="stylesheet" type="text/css" />
 <link href="css/logout.css" rel="stylesheet" type="text/css" />
<link href="css/inclusions.css" rel="stylesheet" type="text/css" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js">
</script>

<script>
function kiran(){

	xmlhttp_add_more_child=GetXmlHttpObject();
	if (xmlhttp_add_more_child==null){
	  alert ("Browser does not support HTTP Request");
	  return;
	}
	var uname=document.getElementById('uname').value;
	var url_add_more_child	=  "username.php";
	url_add_more_child = url_add_more_child+"?user="+uname;  
	xmlhttp_add_more_child.onreadystatechange=function(){
		if (xmlhttp_add_more_child.readyState==4 || xmlhttp_add_more_child.readyState=="complete"){
			
			
			document.getElementById("old").innerHTML =xmlhttp_add_more_child.responseText;

                       if(xmlhttp_add_more_child.responseText.length>10){
                     document.getElementById("uname").focus();
}
			
		}
	}
	xmlhttp_add_more_child.open("GET",url_add_more_child,true);
	xmlhttp_add_more_child.send(null);
}

</script>
<script>
function kiran1(){

	xmlhttp_add_more_child=GetXmlHttpObject();
	if (xmlhttp_add_more_child==null){
	  alert ("Browser does not support HTTP Request");
	  return;
	}
	var email=document.getElementById('email').value;
	var url_add_more_child	=  "useremail.php";
	url_add_more_child = url_add_more_child+"?email="+email;  
	xmlhttp_add_more_child.onreadystatechange=function(){
		if (xmlhttp_add_more_child.readyState==4 || xmlhttp_add_more_child.readyState=="complete"){
			
			
			document.getElementById("em").innerHTML =xmlhttp_add_more_child.responseText;
			 if(xmlhttp_add_more_child.responseText.length>10){
                     document.getElementById("email").focus();
}
			
		}
	}
	xmlhttp_add_more_child.open("GET",url_add_more_child,true);
	xmlhttp_add_more_child.send(null);
}

</script>


<script type="text/javascript" src="js/login.js"></script>




<script type="text/javascript" src="js/properties.js"></script>
<script  type="text/javascript">
var xmlhttp_add_more_child;
function AddMoreChildProduct(id){
	
	//ThickBoxOpen_new();
	
		var val_add_more_child_product_str 	=   document.getElementById("count").value;  
		
		var split_add_more_child_product_str =   val_add_more_child_product_str.split(",");
		
		var  val_flag_temp=document.getElementById("count1").value.length;
	        
	
	var val_flag_temp	= 	parseInt(id)+1;
	
	document.getElementById("count").value  += ','+parseInt(val_flag_temp);
	document.getElementById("count1").value  += ','+parseInt(val_flag_temp);
	
	//var js_add_more_child_product_count 	=   "add_more_child_product_count" ; 
	//var val_flag_temp	= 	parseInt(document.getElementById(js_add_more_child_product_count).value);
	//var val_flag_temp	= 	parseInt(val_flag_temp)+1;

	//document.getElementById(js_add_more_child_product_count).value =val_flag_temp;
	xmlhttp_add_more_child=GetXmlHttpObject();
	if (xmlhttp_add_more_child==null){
	  alert ("Browser does not support HTTP Request");
	  return;
	}
	 
	var url_add_more_child	=  "managep.php";
	url_add_more_child = url_add_more_child+"?id="+parseInt(val_flag_temp) ;  
	 
	

	xmlhttp_add_more_child.onreadystatechange=function(){
		if (xmlhttp_add_more_child.readyState==4 || xmlhttp_add_more_child.readyState=="complete"){
			var newdiv = document.createElement('div');

			var ni = document.getElementById('div_add_more_child_product');
			var div_id = 'div_add_more_child_product_'+parseInt(val_flag_temp);
			
			newdiv.setAttribute('id', div_id);
			newdiv.setAttribute('style', '');
			
			newdiv.innerHTML =xmlhttp_add_more_child.responseText;
			
			ni.appendChild(newdiv);
			//Sort_Child_Product_Image();
			//self.parent.tb_remove();
		}
	}
	xmlhttp_add_more_child.open("GET",url_add_more_child,true);
	xmlhttp_add_more_child.send(null);
}
function GetXmlHttpObject(){
 if (window.XMLHttpRequest){
   // code for IE7+, Firefox, Chrome, Opera, Safari
    return new XMLHttpRequest();
   }
 if (window.ActiveXObject){
   // code for IE6, IE5
    return new ActiveXObject("Microsoft.XMLHTTP");
   }
 return null;
}




</script>
<script  type="text/javascript">

function RemoveMoreChildProduct(id){
 


 var confirm_remove = confirm('Are you sure you want to remove this record?'); 
 if(confirm_remove == true){
 
  
  
  var remove_add_more_div = 'div_add_more_child_product_'+id;
  //alert(remove_add_more_div);
  var child  = document.getElementById(remove_add_more_div);
  
  var parent  = document.getElementById('div_add_more_child_product');
  parent.removeChild(child);
  //alert(parent);
  var js_add_more_child_product_str  =   "count"; 
  var val_add_more_child_product_str  =  document.getElementById(js_add_more_child_product_str).value ; 
   
  var str_remove_val = val_add_more_child_product_str.replace(","+id, "");
  document.getElementById(js_add_more_child_product_str).value = str_remove_val;
    
   }
 }
</script>
<script type="text/javascript">
function validate(form) {
  var e = form.elements;

  /* Your validation code. */
  
  if(e['pwd'].value != e['cpwd'].value) {
    alert('Your passwords do not match. Please type more carefully.');
    return false;
  }
  return true;
}
function validate1(form) {
  var e = form.elements;

  /* Your validation code. */
  
  if(e['npwd'].value != e['cpwd'].value) {
    alert('Your passwords do not match. Please type more carefully.');
    return false;
  }
  return true;
}
</script>


<script language="javascript">
        function addRow(tableID) {
        //alert();
 
            var table = document.getElementById(tableID);
 
            var rowCount = table.rows.length;
            var row = table.insertRow(rowCount);
 
            var colCount = table.rows[0].cells.length;
 
            for(var i=0; i<colCount; i++) {
 
                var newcell = row.insertCell(i);
 
                newcell.innerHTML = table.rows[0].cells[i].innerHTML;
                //alert(newcell.childNodes);
                switch(newcell.childNodes[0].type) {
                    case "text":
                            newcell.childNodes[0].value = "";
                            break;
                    case "checkbox":
                            newcell.childNodes[0].checked = false;
                            break;
                    case "select-one":
                            newcell.childNodes[0].selectedIndex = 0;
                            break;
                }
            }
        }
 
        function deleteRow(tableID) {
            try {
            var table = document.getElementById(tableID);
            var rowCount = table.rows.length;
 
            for(var i=0; i<rowCount; i++) {
                var row = table.rows[i];
                var chkbox = row.cells[0].childNodes[0];
                if(null != chkbox && true == chkbox.checked) {
                    if(rowCount <= 1) {
                        alert("Cannot delete all the rows.");
                        break;
                    }
                    table.deleteRow(i);
                    rowCount--;
                    i--;
                }
 
 
            }
            }catch(e) {
                alert(e);
            }
        }
 
   
</script>



</head>

<body>
<?php $uid= $_SESSION['id'];
//echo $_SESSION['userName'];
 ?>
<div id="Propertish_page_css">

<div id="logo_main">
<div id="logo_image"></div>
<div id="text_image"></div>
</div>
<div id="menu_bar">
<div id="menu_text"></div>
</div> 
 <a href="#" class="login_btn"><span>Welcome <?php echo $_SESSION['firstname']?></span><div class="triangle"></div></a>
                <div id="login_box">
                    <div id="tab"></div>
                    <div id="login_box_content"></div>
                    <div id="login_box_content">
                        <form id="login_form" action="logout.php">
                         <input  type="submit" name="logout" value="LOGOUT" />
                        </form>
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
<option>Please Select</option>
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
</form>
</div>



<div id="main_content">

<div style=" width:500px; height:40px;  border: 1px solid #ccc;
    background-color: #F7F7F7;
    margin:10px 20px 0px 200px;">
You are here:&nbsp;&nbsp;<span style="
    font-size: 3;
    padding-left: 30px;
    padding-right: 30px;"><a href="dashboard.php"><img src="images/desktop.png" />Dashboard</a></span>&nbsp;&nbsp;<img src="images/ForwardGreen.png" style="vertical-align: middle;" />&nbsp;&nbsp;
    <span style="
    font-size: 3;
    padding-left: 30px;
    padding-right: 30px;"><a href="user.php"><img src="images/PropertyManager.png" style="vertical-align: middle;"/>User Accounts</a></span></div><br />
<div id="navigation">
<ul>
<li>  <a href="dashboard.php">Dashboard</a></li>
<li> <a href="inventorygrid.php">Inventory</a></li>

<?php
if($_SESSION['role']=='Super Admin'){ ?>

<li><a href="propertymanager.php">Property Manager</a></li>



<li> <a href="settings.php"> Setting</a></li>
<li class="active"> <a href="user.php">User Accounts</a></li>

<li><a href="regions.php">Regions</a></li>
<li><a href="wp_citys.php">Citys</a></li>
<?php } else{?>
<li><a href="propertysettings.php">Properties</a></li>
<li> <a href="settings.php"> Forms</a></li>
<li class="active"> <a href="user.php">Profile</a></li>
<?php } ?>



</ul>

</div>

<div id="reporting_buttion">
<ul>

<!--<li> <a href="wp_rooms.php">Rooms</a></li>-->
<!--<li><a href="#"> Property PMS</a></li>-->



</ul>

</div>
<?php
if($_SESSION['role']=="Super Admin")
{?>
<div id="content1"> 
<div  id="new">
<a href="javascript:void(0);" onClick="newuser('wp_addnewuser.php')">[ADD NEW USER]</a>
</div>
<table width="743px"   border="1em"  text-align='left' cellpadding="0" cellspacing="0" style="border-collapse:collapse; border:#ccc;">
<tr bgcolor="#faebc4" class="onmouse"> 
<td  width=400><b>Name</b></td>
<th colspan='3'>Role</th>


</tr>
<?php
$re = mysql_query("SELECT distinct user_id FROM wp_manage_mappings where ppro_id='$sele'")
//$re = mysql_query("SELECT user_id FROM wp_properties where ppro_id='$sele'")
or die(mysql_error());
while($data=mysql_fetch_array($re))
{
 $user=$data['user_id'];

$sql=mysql_query("SELECT * FROM wp_manage_user where id='$user'");
$row1 = mysql_fetch_array($sql);

  if($row1['roles']=="Super Admin")
  {
?>
<tr class="act">
<td><font color="#000000" face="segoe ui" size="2"><?php echo $row1['firstname'];?></font></td>
<th><font color="#000000" face="segoe ui" size="2"><?php echo $row1['roles'];?></font></td>
<th><font color="#000000" face="segoe ui" size="2">
<a href="javascript:void(0);" onclick="edituser('wp_edituser.php?uid=<?php echo $row1['id'];?>')">Edit</a></font></td>
</tr>
<?php }else{
?>

<tr class="act">
<td><font color="#000000" face="segoe ui" size="2"><?php echo $row1['firstname'];?></font></td>
<th><font color="#000000" face="segoe ui" size="2"><?php echo $row1['roles'];?></font></td>
<th><font color="#000000" face="segoe ui" size="2">
<a href="javascript:void(0);" onclick="edituser('wp_edituser.php?uid=<?php echo $row1['id'];?>')">Edit</a></font></td>

<th><font color="#000000" face="segoe ui" size="2">
<a href="deleteuser.php?uid=<?php echo $row1['id'];?>">Delete</a></font></td>
</tr>
<?php }}}
else
{ 
?>
<div id="content1"> 
<table width="743px"   border="1em"  text-align='left' cellpadding="0" cellspacing="0" style="border-collapse:collapse; border:#ccc;">
<tr bgcolor="#faebc4" class="onmouse"> 
<td  width=400><b>Name</b></td>
<th colspan='3'>Role</th>

</tr>
<?php
$sql=mysql_query("SELECT * FROM wp_manage_user where id='$uid'");

while($row1 = mysql_fetch_array( $sql))
{
?>
<tr class="act">
<td><font color="#000000" face="segoe ui" size="2"><?php echo $row1['firstname'];?></font></td>
<th><font color="#000000" face="segoe ui" size="2"><?php echo $row1['roles'];?></font></td>
<th><font color="#000000" face="segoe ui" size="2">
<td><font color="#000000" face="segoe ui" size="2">
<a href="javascript:void(0);" onclick="changepwd('wp_changepwd.php?user_id=<?php echo $row1['id'] ?>')">Change Password</a></font></td>

</tr>
<?php }}
?>

</table>
</div>
</div>






</div>




</div>










</div>



</body>
</html>