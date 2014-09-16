<?php
@session_start();
if(!isset($_SESSION['userName'])) 
{
header('location:login.php');
}
require_once('functions.php');
require_once('connection.php');
$user=new User(); 
$sele=$_SESSION['sele'];
$book_id=$_GET['bookid'];
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
	
	$sele=$_REQUEST['sele'];
	$_SESSION['sele']=$sele;
}
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>fitow</title>
<link href="css/login.css" rel="stylesheet" type="text/css" />
<link href="css/logout.css" rel="stylesheet" type="text/css" />
<link href="css/inclusions.css" rel="stylesheet" type="text/css" />
<link href="css/booking form to content page.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery1.4.2.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.8.2.custom.min.js"></script>
<script type="text/javascript" src="js/login.js"></script>
<script type="text/javascript" src="js/settings.js"></script>
<link href="css/main.css" rel="stylesheet" type="text/css" /></head>

<body>
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
 $user= $_SESSION['id'];
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
</form></div>



<div id="main_content">
<div id="navigation">
<ul>
<li>  <a href="dashboard.php">Dashboard</a></li>
<li> <a href="inventorygrid.php">Inventory</a></li>

<?php
if($_SESSION['role']=='Super Admin'){ ?>

<li><a href="propertymanager.php">Property Manager</a></li>



<li class="active"> <a href="settings.php"> Setting</a></li>
<li> <a href="user.php">User Accounts</a></li>

<li><a href="regions.php">Regions</a></li>
<li><a href="wp_citys.php">Citys</a></li>
<?php } else{?>
<li class="active"> <a href="settings.php"> Forms</a></li>
<li> <a href="user.php">Profile</a></li>
<?php } ?>
</ul>
</div>
<div id="reporting_buttion">
<ul>
<li>Step2</li><li > <a href="wp_createuserforms.php">Create Newform</a></li>
</ul>
</div>
<div id="content">

<div id="booking_form_Confirmation">

<div id="border_booking">
<div id="content_tab">
<form method="post" action="wp_general_insert.php" name="">
<?php 
$genaralsettings=mysql_query("SELECT * FROM wp_general_settings WHERE user_id='$user' and book_id='$book_id'");
$genaral=mysql_fetch_array($genaralsettings);

?>
<div id="booking_content_save_buttion_navigation">
<ul>
<input type="submit" name="SUBMIT" value="Save"  style="float:right; margin-right:50px;" />

<input type="submit" name="cancel" value="cancel" style="float:right; margin-right:0px;"/>
</ul>
</div>
<table width="690" border="1" cellpadding="0px" cellspacing="0px" bordercolor="#c2c2c1" style="border-collapse:collapse; border:#CCC;">
<tr bgcolor="#c5c5c5">
    <td style="width:200px;" ><font color="#666666">&nbsp Settings</font></td>
    <td></td>  <td></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
<td> <input type="hidden" name="action" value="genaralsettings" />
</td>
</tr>
<input type="hidden" name="user_id" value="<?php echo $user;?>" />
<input type="hidden" name="book_id" value="<?php echo $book_id;?>" />
<tr height="30px;">
    <td style="width:140px;"> &nbsp;<font color="#666666">Grid days to show:</font></td>
 <td style="width:80px; margin:0px 0px 0px 7px;">&nbsp;
 <input type="text" name="Griddaystoshow" value="<?php echo $genaral['Griddaystoshow'];?>" style="width:40px; margin:0px 0px 0px 5px;"></td>
    <td style=" width:140px; margin:0px 0px 0px 5px;">&nbsp<font color="#666666">First bookable day offset:</font></td>
   <td style="width:50px; margin:0px 0px 0px 7px;">&nbsp;
   <input type="text" name="Firstbookabledayoffset"  value="<?php echo $genaral['Firstbookabledayoffset'];?>"style="width:35px;"/></td>
    <td>&nbsp<font color="#666666">Days bookable:</font></td>
    <td>&nbsp;<input  type="text" name="Daysbookable" value="<?php echo $genaral['Daysbookable'];?>" style="width:40px;"/></td>
  </tr>
  <tr>
    <td>&nbsp;<font color="#666666">Minimum stay length:</font></td>
    <td>&nbsp;<input type="text" name="Minimumstaylength"  value="<?php echo $genaral['Minimumstaylength'];?>" style="width:40px;"/></td>
    <td>&nbsp;<font color="#666666">Maximum stay length:</font></td>
    <td>&nbsp;<input type="text" name="Maximumstaylength"  value="<?php echo $genaral['Maximumstaylength'];?>"style="width:40px;"/></td>
    <td>&nbsp;<font color="#666666">Default Stay Length</font></td>
    <td>&nbsp;<input type="text" name="DefaultStayLength" value="<?php echo $genaral['DefaultStayLength'];?>"style="width:40px;"/></td>
  </tr>
  <tr>
    <td>&nbsp;<font color="#666666">Number of images visible in carousel:</font></td>
    <td>&nbsp;<input type="text" name="imagesvisible"  value="<?php echo $genaral['imagesvisible'];?>" style="width:40px;"/></td>
    <td>&nbsp;<font color="#666666">Show 'Enquire' for stop sold rooms:</font></td>
    <td>&nbsp;<input type="text" name="Enquireforstopsoldrooms"  value="<?php echo $genaral['Enquireforstopsoldrooms'];?>" style="width:40px;"/></td>
    <td>&nbsp;<font color="#666666">Minimum Rate:</font></td>
    <td>&nbsp;<input type="text" name="MinimumRate" value="<?php echo $genaral['MinimumRate'];?>" style="width:40px;"/></td>
  </tr>
  <tr>
    <td>&nbsp;<font color="#666666">Maximum extra quantity:</font></td>
    <td>&nbsp;<input type="text" name="Maximumextraquantity"  value="<?php echo $genaral['Maximumextraquantity'];?>" style="width:40px;"/></td>
 <td>&nbsp;<font color="#666666">Payment deposit:</font>
    &nbsp;<select name="ctl00$plcBody$PaymentDepositStyleDropDownList" onchange="javascript:setTimeout('__doPostBack(\'ctl00$plcBody$PaymentDepositStyleDropDownList\',\'\')', 0)" id="ctl00_plcBody_PaymentDepositStyleDropDownList" style="width:85px;">
		<option selected="selected" value="no deposit">no deposit</option>
		<option value="percent">percent</option>
		<option value="flat rate">flat rate</option>
		<option value="first night rate">first night rate</option>

	</select></td>
    <td>&nbsp;<input name="Paymentdeposit" type="text" value="0.00" maxlength="6" id="ctl00_plcBody_DepositPercentTextBox" disabled="disabled" style="width:40px;"></td>
<td>&nbsp;<font color="#666666">Maximum Room Quantity:</font></td>
<td><input type="text" name="MaximumRoomQuantity" value="<?php echo $genaral['MaximumRoomQuantity'];?>"style="width:40px;"/></td>
</tr>
<tr>
<td>&nbsp;<font color="#666666">Minimum Arrival Time:</font></td>
<td>&nbsp;<select name="MinimumArrivalTime">
<?php 
$arrival=mysql_query("SELECT * FROM wp_arrivaltime");
while($arrivaltime=mysql_fetch_array($arrival))
{?>
<option value="<?php echo $arrivaltime['arivaltime'];?>"><?php echo $arrivaltime['arivaltime'];?></option>
<?php
}
?>
</select>
<select ><option>AM</option><option>PM</option></select></td>
<td>&nbsp;<font color="#666666">Maximum Arrival Time:</font></td>
<td><select name="MaximumArrivalTime">
<?php
$arrival=mysql_query("SELECT * FROM wp_arrivaltime");
while($arrivaltime=mysql_fetch_array($arrival))
{ ?>
<option value="<?php echo $arrivaltime['arivaltime'];?>"><?php echo $arrivaltime['arivaltime'];?></option>
<?php
}
?>
</select>
<select ><option>AM</option><option>PM</option></select></td>
<td>&nbsp;<font color="#666666">Mobile Booking Form Logo:</font></td>
<td><input type="text" name="MobileBookingFormLogo" value="<?php echo $genaral['MobileBookingFormLogo'];?>" style="width:40px;"/></td>
</tr>
<tr>
<td>&nbsp;<font color="#666666">Rate Parity:</font> </td>
<td><input type="text" name="RateParity" value="<?php echo $genaral['RateParity'];?>"  style="width:40px;"/></td>
<td>&nbsp;<font color="#666666">Order Property Grid By:</font></td>
<td><input type="text" name="OrderPropertyGridBy"  value="<?php echo $genaral['OrderPropertyGridBy'];?>" style="width:40px;"/></td>
<td colspan="2"><input type="checkbox" name="search"  value="1"
<?php 
if($genaral['flag']==1)
{
	echo "checked='checked'";
}?>/><font color="#666666">Enable Search Widget</font></td>
</tr></table>
<table width="690px" border="1" cellpadding="0px" cellspacing="0px" bordercolor="#c2c2c1" style="border-collapse:collapse; border:#CCC; margin:10px 0px 0px 23px;">
<tr>
<td>Show/Hide Sections </td><td>Filter Options </td><td>Accepted Credit Cards </td>
</tr>
<tr>
<td>&nbsp;<input type="checkbox" name="ShowTitle"  value="ShowTitle"
<?php 
if($genaral['ShowTitle']==ShowTitle)
{
	echo "checked='checked'";
}?>/><font color="#666666">Show Title</font></td>
<td>&nbsp;<input type="checkbox" name="Filterstopsold"  value="Filterstopsold"
<?php 
if($genaral['Filterstopsold']==Filterstopsold)
{
	echo "checked='checked'";
}?>/><font color="#666666">Filter stop sold</font></td>
<td>&nbsp;<input type="checkbox" name="AmericanExpress"  value="AmericanExpress"
<?php 
if($genaral['AmericanExpress']==AmericanExpress)
{
	echo "checked='checked'";
}?>/>&nbsp <img src="images/bank/american express.png" />&nbsp<font color="#666666">American Express</font></td>
</tr>
<tr>
<td>&nbsp;<input type="checkbox" name="ShowStarRating"  value="ShowStarRating"
<?php 
if($genaral['ShowStarRating']==ShowStarRating)
{
	echo "checked='checked'";
}?>/><font color="#666666">Show Star Rating</font></td>
<td>&nbsp;<input type="checkbox" name="Filterovermaxpersons"  value="Filterovermaxpersons"
<?php 
if($genaral['Filterovermaxpersons']==Filterovermaxpersons)
{
	echo "checked='checked'";
}?>/><font color="#666666">Filter over max persons</font></td>
<td>&nbsp;<input type="checkbox" name=" Barter"  value="Barter"
<?php 
if($genaral['Barter']==Barter)
{
	echo "checked='checked'";
}?>/><font color="#666666">&nbsp; <img src="images/bank/barter.png" />&nbsp;Barter</font></td>
</tr>
<tr>
<td>&nbsp;<input type="checkbox" name="ShowCurrencyDropDown"  value="ShowCurrencyDropDown"
<?php 
if($genaral['ShowCurrencyDropDown']==ShowCurrencyDropDown)
{
	echo "checked='checked'";
}?>/><font color="#666666">Show Currency Drop Down</font></td>
<td>&nbsp;<input type="checkbox" name="Filterenquire"  value="Filterenquire"
<?php 
if($genaral['Filterenquire']==Filterenquire)
{
	echo "checked='checked'";
}?>/><font color="#666666">Filter enquire</font></td>
<td>&nbsp;<input type="checkbox" name=" DinersClub"  value="DinersClub"
<?php 
if($genaral['DinersClub']==DinersClub)
{
	echo "checked='checked'";
}?>/><font color="#666666">&nbsp; <img src="images/bank/dinners club.png" />&nbsp;Diners Club</font></td>
</tr>
<tr>
<td>&nbsp;<input type="checkbox" name="ShowMoveGridSection"  value="ShowMoveGridSection"
<?php 
if($genaral['ShowMoveGridSection']==ShowMoveGridSection)
{
	echo "checked='checked'";
}?>/><font color="#666666">Show Move Grid Section</font></td>
<td>&nbsp;<input type="checkbox" name="Filterbelowminimumstay"  value="Filterbelowminimumstay"
<?php 
if($genaral['Filterbelowminimumstay']==Filterbelowminimumstay)
{
	echo "checked='checked'";
}?>/><font color="#666666">Filter below minimum stay</font></td>
<td>&nbsp;<input type="checkbox" name="Mastercard"  value="Mastercard"
<?php 
if($genaral['Mastercard']==Mastercard)
{
	echo "checked='checked'";
}?>/><font color="#666666">&nbsp; <img src="images/bank/master cord.png" />&nbsp;Mastercard</font></td>
</tr>
<tr>
<td>&nbsp;<input type="checkbox" name="ShowPreviousandNextLinks"  value="ShowPreviousandNextLinks"
<?php 
if($genaral['ShowPreviousandNextLinks']==ShowPreviousandNextLinks)
{
	echo "checked='checked'";
}?>/><font color="#666666">Show Previous and Next Links</font></td>
<td>&nbsp;<input type="checkbox" name="Filternoavailability"  value="Filternoavailability"
<?php 
if($genaral['Filternoavailability']==Filternoavailability)
{
	echo "checked='checked'";
}?>/><font color="#666666">Filter no availability</font></td>
<td>&nbsp;<input type="checkbox" name="Visa"  value="Visa"
<?php 
if($genaral['Visa']==Visa)
{
	echo "checked='checked'";
}?>/>&nbsp; <img src="images/bank/vasa.png" />&nbsp;<font color="#666666"> Visa</font></td>
</tr>
<tr>
<td>&nbsp;<input type="checkbox" name="ShowTermsandConditions"  value="ShowTermsandConditions"
<?php 
if($genaral['ShowTermsandConditions']==ShowTermsandConditions)
{
	echo "checked='checked'";
}?>/><font color="#666666">Show Terms and Conditions</font></td>
<td>&nbsp;<input type="checkbox" name="Filteroutsidebookablerange"  value="Filteroutsidebookablerange"
<?php 
if($genaral['Filteroutsidebookablerange']==Filteroutsidebookablerange)
{
	echo "checked='checked'";
}?>/><font color="#666666">Filter outside bookable range</font></td><td></td>
</tr>
<tr>
<td>&nbsp;<input type="checkbox" name="ShowRackRateColumn"  value="ShowRackRateColumn"
<?php 
if($genaral['ShowRackRateColumn']==ShowRackRateColumn)
{
	echo "checked='checked'";
}?>/><font color="#666666">Show Rack Rate Column</font></td>
<td>&nbsp;<input type="checkbox" name="Filterabovepooledminstay"  value="Filterabovepooledminstay"
<?php 
if($genaral['Filterabovepooledminstay']==Filterabovepooledminstay)
{
	echo "checked='checked'";
}?>/><font color="#666666">Filter above pooled minstay</font></td><td></td>	
</tr>
<tr>
<td>&nbsp;<input type="checkbox" name="ShowPromotionBox"  value="ShowPromotionBox"
<?php 
if($genaral['ShowPromotionBox']==ShowPromotionBox)
{
	echo "checked='checked'";
}?>/><font color="#666666">Show Promotion Box</font></td>
<td>&nbsp;<input type="checkbox" name="FilterMinimumandMaximumETA"  value="FilterMinimumandMaximumETA"
<?php 
if($genaral['FilterMinimumandMaximumETA']==FilterMinimumandMaximumETA)
{
	echo "checked='checked'";
}?>/><font color="#666666">Filter Minimum and Maximum ETA</font></td><td></td>	
</tr>
<tr>
<td>&nbsp;<input type="checkbox" name="ShowPersonsIncludedonHover"  value="ShowPersonsIncludedonHover"
<?php 
if($genaral['ShowPersonsIncludedonHover']==ShowPersonsIncludedonHover)
{
	echo "checked='checked'";
}?>/><font color="#666666">Show Persons Included on Hover</font></td>
<td>&nbsp;<input type="checkbox" name="FilterRulesNotMet"  value="FilterRulesNotMet"
<?php 
if($genaral['FilterRulesNotMet']==FilterRulesNotMet)
{
	echo "checked='checked'";
}?>/><font color="#666666">Filter Rules Not Met</font></td><td></td>
</tr>
<tr>
<td>&nbsp;<input type="checkbox" name="ShowExtraChargesonHover"  value="ShowExtraChargesonHover"
<?php 
if($genaral['ShowExtraChargesonHover']==ShowExtraChargesonHover)
{
	echo "checked='checked'";
}?>/><font color="#666666">Show ExtraCharges on Hover</font></td>
<td>&nbsp;<input type="checkbox" name="FilterPropertyGrid"  value="FilterPropertyGrid"
<?php 
if($genaral['FilterPropertyGrid']==FilterPropertyGrid)
{
	echo "checked='checked'";
}?>/><font color="#666666">Filter Property Grid</font></td><td></td>
</tr>
<tr>
<td>&nbsp;<input type="checkbox" name="ShowHelpButton"  value="ShowHelpButton"
<?php 
if($genaral['ShowHelpButton']==ShowHelpButton)
{
	echo "checked='checked'";
}?>/><font color="#666666">Show Help Button</font></td>
<td></td><td></td>
</tr>
<tr>
<td>&nbsp;<input type="checkbox" name="ShowRoomQuantityFeature"  value="ShowRoomQuantityFeature"
<?php 
if($genaral['ShowRoomQuantityFeature']==ShowRoomQuantityFeature)
{
	echo "checked='checked'";
}?>/><font color="#666666">Show Room Quantity Feature</font></td><td></td><td></td>
</tr>
<tr>
<td>&nbsp;<input type="checkbox" name="ShowBookingFormTitle"  value="ShowBookingFormTitle"
<?php 
if($genaral['ShowBookingFormTitle']==ShowBookingFormTitle)
{
	echo "checked='checked'";
}?>/><font color="#666666">Show Booking Form Title</font></td>
<td></td><td></td></tr>
<tr>
<td>&nbsp;<input type="checkbox" name="ShowPromotionBoxOnWidget"  value="ShowPromotionBoxOnWidget"
<?php 
if($genaral['ShowPromotionBoxOnWidget']==ShowPromotionBoxOnWidget)
{
	echo "checked='checked'";
}?>/><font color="#666666">Show Promotion Box On Widget</font></td><td></td><td></td>
</tr>
<tr>
<td>&nbsp;<input type="checkbox" name="ShowCreditCardSurchargeInformation"  value="ShowCreditCardSurchargeInformation"
<?php 
if($genaral['ShowCreditCardSurchargeInformation']==ShowCreditCardSurchargeInformation)
{
	echo "checked='checked'";
}?>/><font color="#666666">Show Credit Card Surcharge Information</font></td><td></td><td></td>
</tr>
<tr>
<td>&nbsp;<input type="checkbox" name="ShowSortOptiononPropertyPage"  value="ShowSortOptiononPropertyPage"
<?php 
if($genaral['ShowSortOptiononPropertyPage']==ShowSortOptiononPropertyPage)
{
	echo "checked='checked'";
}?>/><font color="#666666">Show Sort Option on Property Page</font></td><td></td><td></td>
</tr>
</table>
<table>
<tr>
<td><font color="#666666">Google Analytics Tracking Code</font></td>
<td><font color="#666666">UA-<input type="text" name="ua" /></font></td>
<td><font color="#666666">Default Currency </font></td>
<td>&nbsp;<select name="DefaultCurrency"  >
<?php
$defaultcurrency=mysql_query("SELECT * FROM  wp_currency_type");

while($currency=mysql_fetch_array($defaultcurrency))
{?>
	<option value="<?php echo $currency['currencycode']; ?>" style="font color:#ccc;">
   <?php echo $currency['defaultcurrency']; ?></option>
	<?php }
 ?></select></td></tr>
 
<tr><td><font color="#666666">Reset to Default Settings</font> </td><td><input type="reset" value="reset" /></td><td></td></tr>
	</table>
</form></div>
</div>
</div>
</div>
</div>
</div>
</body>
</html>