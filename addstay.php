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
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>fitow</title>
<link href="css/login.css" rel="stylesheet" type="text/css" />
<link href="css/logout.css" rel="stylesheet" type="text/css" />
<link href="css/inclusions.css" rel="stylesheet" type="text/css" />
<link href="css/bokkingform.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/properties.js"></script>
<script type="text/javascript" src="js/jquery1.4.2.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.8.2.custom.min.js"></script>
<script type="text/javascript" src="js/login.js"></script>
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
<script type="text/javascript">
      $(document).ready(function(){
          
    
    $("#txtFromDate").datepicker({
       
        minDate: 0,
        maxDate: "+60D",
     
        onSelect: function(selected) {
          $("#txtToDate").datepicker("option","minDate", selected)
        }
      
    });
     
    $("#txtToDate").datepicker({ 
        minDate: 0,
        maxDate:"+60D",
       
        onSelect: function(selected) {
           $("#txtFromDate").datepicker("option","maxDate", selected)
        }
    });  
});
</script>
<script type="text/javascript" src="../demoengine/demoengine.js"></script>
	<link rel="stylesheet" type="text/css" href="../demoengine/demoengine.css">
	<title>jQuery UI Datepicker: Parse and Format Dates</title>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
	<link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/ui-darkness/jquery-ui.css">
</head>
    <body>
    <div id="Propertish_page_css">
<div id="header_propertish">
<div id="proprotish_logo"></div>
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
<form id="selfrm" name="frm" action="" method="post" >
<?php

$result = mysql_query("SELECT * FROM wp_properties")
or die(mysql_error());
?><div id="currenty_managing">
<div id="text_currenty_managing">Currenty Managing</div>
<div id="select_box">

<select id="ddlViewBy" name="sele" onChange="this.form.submit();" class="select_1" >

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
   <option value="<?php echo $row['ppro_id'];?>" <?php echo $select; ?> > <?php echo $row['Name'];?> </option>
  
<?php
 }
 ?>


</select>

</div></div></form></div>
<div id="main_content">

<div id="navigation">
<ul>
<li>  <a href="dashboard.php">Dashboard</a></li>
<li> <a href="#"> Inventory</a></li>

<li>  <a href="propertymanager.php">Property Manager</a></li>

<li>  <a href="inclusions.php">Inclusions</a></li>

<!--<li>  <a href="#">Reporting</a></li>-->

<li class="active"> <a href="settings.php"> Setting</a></li>
<!--<li> <a href="messages.php"> Messages</a></li>-->
<li> <a href="logout.php"> Logout</a></li>



</ul>

</div>

<div id="reporting_buttion">
<ul>
<li class="active"> <a href="#">Booking Forms</a></li>
<!--<li > <a href="#">Channels</a></li>
<li> <a href="#">Pms</a></li>
<li><a href="#"> Account Controls</a></li>
<li><a href="#"> Account</a></li>
<li><a href="#">Users</a></li>-->
</ul>

</div>
<div id="content">
<div id="booking_forms_page_buttion">
<ul>
<li> <a href="bookformstaypay.php">Stay Pays</a></li>
<li> <a href="wp_promotions.php">Promotions</a></li>
<li> <a href="extra.php">Extra</a></li>
<li> <a href="wp_imagesupload.php">Images</a></li>
</ul>

</div>

</div>
  <div id="flip">Booking Form Stay Pays</div>
<div id="panel">This page lists all the Stay Pay deals that you have created. </div>
<form name="myform" method="post" action="staypayadd.php">
<table border="1" cellspacing="0" cellpadding="0" width="60%" height="10%">
    <tr>
        Add/Edit Stay Pay 
    </tr>
    <tr>
        <td>
           Active From  
        </td>
        <td>
             Select Date:<input type="text" name="from" id="txtFromDate"/>
        </td>
    </tr>
    <tr>
        <td>
           Active To 
        </td>
        <td>
            Select Date:<input type="text" name="to" id="txtToDate" />
        </td>
    </tr>
    <tr>
        <td>
          Stay Nights  
        </td>
        <td>
            <input type="text" name="snight" value="0">
        </td>
    </tr>
    <tr>
        <td>
         Free Nights  
        </td>
        <td>
           <input type="text" name="fnight" value="0"> 
        </td>
    </tr>
    <tr>
        <td>
         Max Free Nights   
        </td>
        <td>
            <input type="text" name="mfnight" value="0">
        </td>
    </tr>
    <tr>
        <td></td>
        <td>
            <input type="submit" value="Save" name="save">
            <input type="submit" value="Cancel" name="cancel">
        </td>
    </tr>
</table>
   </form>
    </body>
</html>
