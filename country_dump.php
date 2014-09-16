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
<title>Untitled Document</title>
<link href="css/wiotif.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="http://ajax.googleapis.com/
ajax/libs/jquery/1.4.2/jquery.min.js"></script>

<script type="text/javascript" src="js/properties.js"></script>
<script type="text/javascript">
function changeCity(strURL)
{

var xmlhttp;
if (window.XMLHttpRequest)
{// code for IE7+, Firefox, Chrome, Opera, Safari
xmlhttp=new XMLHttpRequest();
}
else
{// code for IE6, IE5
xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
}
xmlhttp.onreadystatechange=function()
{
if (xmlhttp.readyState == 4 )

{
if(xmlhttp.status == 200)
{

document.getElementById("state").innerHTML=xmlhttp.responseText;

}
else
{
alert("There was a problem while using XMLHTTP:\n" + xmlhttp.statusText);
}
}
}
xmlhttp.open("GET",strURL,true);
xmlhttp.send();
}
</script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css" />
  <script>
  
  var dateToday = new Date();

$(function() {
    $( "#datepicker1" ).datepicker({
        showButtonPanel: true,
        minDate: dateToday,
		dateFormat:"d-M-yy",
		gotoCurrent: true}).datepicker('setDate',"0");
		
   
});
//$('td').click(function() {
  // $(this).css('backgroundColor', '#000');
//});

  </script>
  <script type="text/javascript">
  $('td').click(function() {
   $(this).css('backgroundColor', '#000');
});
</script>

</script>
</head>

<body>
<div id="main">
<div id="header_propertish">
<div id="proprotish_logo"></div>
<div id="round_content">
<div id="Where_do_you_want_heading"> <font color="#ea5d1f">Where do you want to stay?</font></div>

<form name="" action="wp_search_property.php" method="post">
<div id="scrooling_left_main_content">
<p class="contact"><label for='country' >Country:</label></p>
    <select name="country" multiple="multiple" class="country" 
    onChange="changeCity('changecountry.php?id='+this.value)" style="width:250px; height:380px;">
    <option selected="selected">--Select Country--</option>
    <?php
$sql=mysql_query("select * from wp_countrys ");
while($row=mysql_fetch_array($sql))
{?>
<option value="<?php echo $row['cid'];?>"><?php echo $row['country_name'];?></option>
<?php } ?>
  </select>
</div>
<div id="next_buttion"></div>




<div id="scrooling_right_main_content">

 <p class="contact"><label for='country' >City:</label></p>
<select name="city" multiple="multple" class="state" style="width:250px; height:380px;">
    <option selected="selected">--Select State--</option>
  </select>

</div>




<div id="border"></div>
<div id="buttions_main_div">
<div id="buttions_div_left">
<div class="why_heading">When?</div>
<input id="datepicker1" type="text" name="picker"  value="" style="width:150px; height:40px; margin:0px 0px 0px 30px;" />

</div>
<div id="buttions_div_middle">
<div class="wh0_heading">Who?</div>
<input type="textbox" value="" style="width:150px; height:40px; margin:0px 0px 0px 30px;" name="child" />

</div>
<div id="buttions_div_right">
<input type="submit" name="submit" value="SEARCH" style="width:130px; height:40px; background:#011f73; color:#fff; font-size:20px; margin:40px 0px 0px 30px; -webkit-border-radius:15px;
	-moz border-radius:15px;
	-o- border-radius:15px;
	border-radius:15px;
	float:left;
	border:#fff 2px double;" />


</div>


</div>
</form>

</div>









</div>


</div>

</div>



</body>
</html>
