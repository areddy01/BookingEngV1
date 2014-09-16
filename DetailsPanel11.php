<?php 
require_once('functions.php');
require_once('connection.php');
$user=new User(); 
$bf_id=$_REQUEST['bf_id'];
$bfrid=$_REQUEST['bfrid'];
$ppro_id=$_REQUEST['ppro_id'];
$arr=$_REQUEST['arr'];
$avr=$_REQUEST['avr'];
$roomid1=$_GET['room_id'];
$timezone1 = date_default_timezone_get();
$m= date("m");
$de= date("d");
$y= date("Y");
$date = date('Y-m-d');
$property=mysql_query("SELECT Name FROM wp_properties WHERE ppro_id='$ppro_id'");
$propertyname=mysql_fetch_array($property);
$property1=mysql_query("SELECT * FROM wp_room_type_details WHERE ppro_id='$ppro_id' and roomid='$bfrid'");
$propertyname1=mysql_fetch_array($property1);?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<link href="css/stylesheet_fonts.css" rel="stylesheet" type="text/css" />
<head>
<style>
 .underline {
    text-decoration:line-through;
}
 </style>
<script>
function fnchecked(blnchecked)
{
if(blnchecked)
{
document.getElementById("divcheck").style.display = "";
}
else
{
document.getElementById("divcheck").style.display = "none";
}

}
</script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>fitow</title>
<link href="css/login.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  <link href="css/main.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="/resources/demos/style.css" />
  <script>
  var dateToday = new Date();

$(function() {
    $( "#datepicker1" ).datepicker({
        showButtonPanel: true,
        minDate: dateToday,
		dateFormat:"yy-mm-dd"
    });
});
$(function() {
    $( "#datepicker3" ).datepicker({
        showButtonPanel: true,
        minDate: dateToday,
		dateFormat:"yy-mm-dd"
    });
});
  </script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>fitow</title>
<link href="css/bokkingform1.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" language="javascript">
function log1(str)
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
   document.getElementById("content1").innerHTML=xmlhttp.responseText;
   }
   else
       {
           alert("There was a problem while using XMLHTTP:\n" + xmlhttp.status);
       }
           }
   }
   xmlhttp.open("GET",str,true);
   xmlhttp.send();

}
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}


</script>
<script type="text/javascript" language="javascript">
function validateForm()
{

var x=document.forms["myform"]["first"].value;
if (x==null || x=="")
  {
  alert("First name must be filled out");
  return false;
  }

var last=document.forms["myform"]["last"].value;
if (last==null || last=="")
  {
  alert("last name must be filled out");
  return false;
  }


var mail=document.forms["myform"]["email"].value;
var atpos=mail.indexOf("@");
var dotpos=mail.lastIndexOf(".");
if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
  {
  alert("Not a valid e-mail address");
  return false;
  }
}
</script>
</head>

<body>
<!--<form method="post" name="book" action="wp_booknow.php">-->
<form method="post" name="book" action="">
<div id="main1">
<div id="logo_main" style="display:none;">
<div id="logo_image"></div>
<div id="text_image"></div>
</div>
 <?php $data="SELECT * FROM wp_rooms WHERE ppro_id='$ppro_id' AND roomid='$bfrid' and room_id='$roomid1'";
 $rdetails=mysql_query($data);
$room_details=mysql_fetch_array($rdetails);?>
<div id="Propertish_page_css">

<div id="menu_bar" style="display:none;">
<div id="menu_text"><font face="Arial, Helvetica, sans-serif" color="#eceff1" size="-1"><b>HOME >><?php echo $propertyname['Name'];?> >><?php echo $propertyname1['name'];?>>> <?php echo $room_details['roomname'];?> </font></b></div>
</div>  
<?php 
$cdate=Date("D M d Y");
?>
<div id="buttion_main">
<div class="green_button"></div>
<div class="available_text">AVAILABLE</div>
<div class="yellow_button"></div>
<div class="makeanenquirry_text">MAKE AN ENQUIRY </div>
<div class="white_button"></div>
<div class="sold_text">SOLD</div>
<!--<div class="start_date_text">START DATE</div>
<div class="start_button"><h6 style="margin-top:10px; margin-left:20px;"><?php echo $cdate;?></h6></div>-->
</div>

<table width="984" height="70px"   border="1" bordercolor="#fff" cellpadding="0" cellspacing="0">
<tr height="70"> 
 <td width="270" bgcolor="#21678b">&nbsp;<b> <font color="#FFFFFF" face="Verdana, Geneva, sans-serif" ><?php echo $propertyname['Name'];?></font><br /> <font color="#eaf3f7"> &nbsp;&nbsp;<?php echo $propertyname1['name'];?></font></b></td>
<td bgcolor="#c5c5c5" width="50"><font color="#446f85" face="Tahoma, Geneva, sans-serif" size="-1" > FULL RATE</font></td>
<?php

$grid=mysql_query("SELECT * FROM wp_general_settings"); 
$gridsettings=mysql_fetch_array($grid);
$griddays=$gridsettings['Griddaystoshow'];
//$curntdate=Date("Y-m-d");
//$enddate=Date("Y-m-d", strtotime("+$griddays days"));
$curntdate=Date("Y-m-d");
$enddate=Date("Y-m-d", strtotime("+$griddays days"));
/*$inventoory_qry=mysql_query("SELECT Distinct str_to_date(grid_date, '%d-%m-%Y') FROM `wp_inventory_grid_details` 
WHERE str_to_date(grid_date, '%d-%m-%Y')>='$curntdate' AND str_to_date(grid_date, '%d-%m-%Y')<'$enddate'");*/
 $inventoory_qry=mysql_query("SELECT Distinct newgrid_date FROM `wp_room_inventory_grid_details` 
WHERE newgrid_date>='$curntdate' AND newgrid_date<='$enddate'");
$i=0;
//for($i=0; $i<=$griddays; $i++){ 
while($inventoory_grid_data=mysql_fetch_array($inventoory_qry))
{
	?>
 <td bgcolor="#c5c5c5" width="50">&nbsp;
<!--<font color="#446f85" face="Tahoma, Geneva, sans-serif" size="-1" > -->
<?php
	//$d=$inventoory_grid_data["str_to_date(grid_date, '%d-%m-%Y')"];
	//echo $ch=Date('D-d-M',strtotime($d));
$d=$inventoory_grid_data['newgrid_date'];
	 $ch=Date('D d M',strtotime($d));
echo $ch=strtoupper($ch);	
	
?>
</font></td>
<?php 
}
//}?>
</tr>
<?php
//$data="SELECT * FROM wp_room_type_details WHERE ppro_id='$ppro_id' AND roomid='$bfrid'";

//echo "SELECT * FROM wp_room_inventory_grid_details WHERE ppro_id='$ppro_id' AND roomid='$bfrid'  and room_id='$roomid1' Limit 0,$griddays";
 $bf_qry=mysql_query("SELECT * FROM wp_room_inventory_grid_details WHERE ppro_id='$ppro_id' AND roomid='$bfrid'  and room_id='$roomid1' and newgrid_date>='$curntdate' AND newgrid_date<='$enddate'");

?>
<tr align="center">
<td>
<table border="1" bordercolor="#fff" cellpadding="0" cellspacing="0">
<tr>
  <td width="250" bgcolor="#1c3f52">&nbsp;
  <div id="nbmber"><div id="nbmber_text"> <font color="#FFFFFF" size="2"> <?php echo $room_details['roomname'];?></font></div></div>
  
  <div>
  <div>
  </div>
  <div>
  <div></div>
    </div>
  </div>
  <?php // }?></td>
</tr>

</table>
</td>
<input type="hidden" name="pid" value="<?php echo $room_details['ppro_id'];?>">
<input type="hidden" name="rid" value="<?php echo $room_details['roomid'];?>">
<input type="hidden" name="room_id" value="<?php echo $room_details['room_id'];?>">
<input type="hidden" name="bf_id" value="<?php echo $bf_id;?>"></td>
<td width="83"  bgcolor="#c5c5c5">&nbsp;AUS $ <?php echo $room_details['rackrate'];?></font></td>
<?php

//for($i=0; $i<=$griddays; $i++){
while($bf_data=mysql_fetch_array($bf_qry))
{
	?>
<?php 
if($bf_data['flag']=='sold')
{?>
	 <td bgcolor="#e3e3e3" width="50">
	<font  color="#FFFFFF"><?php echo "SOLD";?></font>
    </td>
    <?php }
	else if($bf_data['newstop_sell']=='sold')
	 {?>
		<td bgcolor="#e3e3e3" width="50"><center>
	<font  color="#FFFFFF"  size="-1"><?php echo "SOLD";?></font></center>
    </td> 
	 <?php } 
	  
	
	else if($bf_data['flag']=='enquiry')
	{?>
    
   <td bgcolor="#b7be00" width="50">
	<font  color="#FFFFFF"><?php  echo $bf_data['newroomrate'];?></font>
   </td>
    <?php }
	else{?>    
    
	<td bgcolor="#15a42e" width="50">
	<font  color="#FFFFFF"><?php  echo $bf_data['newroomrate'];	?></font>
		<?php }
    ?>  </td>
  
	<?php
$i++;
}
 //}?>
</tr></table>
<div id="booking_detiles_main_backgroung">
<div id="main">
<div id="booking_detiles_image" style="background:url(images/big-buttion1.png);">
<div class="booking_detiles_heading">&nbsp;&nbsp;<b>BOOKING DETAILS:</b></div>
</div>
<div id="booking_detiles_content">
<table width="290" border="0" align="left" style="margin:15px 0px 0px 20px;">
  <tr>
    <td scope="row" width="50px">&nbsp;Rooms:</td>
    <td><b> <?php echo $room_details['roomname'];?>
    <input type="hidden" name="room_id" value="<?php echo $room_details['room_id'];?>"  /></b>
<?php
$maxpersons=$room_details['maxpersons'];?></td>
  </tr>
  <tr>
    <td scope="row">&nbsp;<div>Arrival:</div></td>
    <td>&nbsp;<?php
$query="select * from wp_griddateselection";
	 $q1=mysql_query($query);
	  $q2=mysql_fetch_array($q1);?>
     <div> <input id="datepicker3" name="arrival" value="<?php echo $_POST['arrival'];?>" type="text" required=" "></div>
    </td>
  </tr>
 <!-- <tr>
    <td scope="row">Nights:</td>
    <td>&nbsp;<select name="nights" id="night_select" required=" ">
<?php
$room_minstay=$room_details['defaultmin_stay'];
echo $room_minstay;
 $night=mysql_query("SELECT * FROM wp_nights");
while($night_data=mysql_fetch_array($night))
{
	$select1="";
	if($night_data['night']==$room_minstay)
	{
		$select1='selected';
	}
	?>
<option value="<?php echo $night_data['night'];?>" <?php echo $select1;?>><?php echo $night_data['night'];?></option>
<?php
}
?>
</select></td>
  </tr>-->
  <tr>
    <td scope="row">&nbsp;<div>Departure:</div></td>
    <td>&nbsp;<div><input id="datepicker1"  name="depature" value="<?php echo $_POST['depature'];?>" type="text" required=" "></div></td>
  </tr>
  
</table>


<table width="110px" border="0" align="left" style="margin:15px 0px 0px 250px;">
  <tr>
    <td scope="row">&nbsp;Adults:</td>
    <td><div> <select id="adult" name="adult" >
<?php 
for($i=1;$i<=$maxpersons;$i++)
{
	?>
<option value="<?php echo $i;?>"><?php echo $i;?></option>
<?php
}
?>
</select></div></td>
  </tr>
  <tr><td></td><td></td></tr>
  <tr>
    <td scope="row">&nbsp;Children:</td>
    <td><div><select id="child" name="child" ><?php 
for($i=0;$i<=$maxpersons;$i++)
{
	?>
<option value="<?php echo $i;?>"><?php echo $i;?></option>
<?php
}
?></select></div>
    </td>
  </tr>
  </table>
 <!--<table width="370" border="0" align="left" style="margin:15px 0px 0px 250px;">
  <tr>
    <td scope="row">&nbsp;Estimated Arrival/Departure Times</td>
    
  </tr>
  </table>
  <table width="200" border="0" align="left" style="margin:0px 0px 0px 250px;">
  <tr>
    <td scope="row">&nbsp;Arrival:</td>
    <td>
    <select style="width:40px;">
    <option>1</option>
    <option>2</option>
    <option>3</option>
    
    </select>
    <select style="width:40px;">
    <option>00</option>
    <option>01</option>
    <option>02</option>
    
    </select>
    <select style="width:40px;">
    <option>AM</option>
    <option>PM</option>
    
    </select>
    
    </td>
  </tr>
  <tr>
    <td scope="row">&nbsp;Arrival:</td>
    <td>
    <select style="width:40px;">
    <option>10</option>
    <option>10</option>
    <option>10</option>
    
    </select>
    <select style="width:40px;">
    <option>00</option>
    <option>00</option>
    <option>00</option>
    
    </select>
    <select style="width:40px;">
    <option>AM</option>
    <option>PM</option>
   
    
    </select>
    
    
    
    
    
    </td>
  </tr>
  
</table>-->

</div>
<center><input type="image" name="calculation" src="images/contiune-booking-buttion.png" /></center>
</form><br />
<hr size="2" width="1024" color="#21678b" /> 
<form method="post" name="myform" action="wp_booknow.php">
<?php 
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	 $room_id=$_POST['room_id'];
	$arrival=$_POST['arrival'];
	 $depature=$_POST['depature'];
	$ppro_id=$_POST['pid'];
	 $bfrid=$_POST['rid'];
	 $adult=$_POST['adult'];
	 $child=$_POST['child'];
	 $qry=mysql_query("SELECT newroomrate FROM wp_room_inventory_grid_details WHERE ppro_id='$ppro_id' AND roomid='$bfrid'  and room_id='$roomid1' and newgrid_date>='$arrival' AND newgrid_date<='$depature'");
$sum=0;	
  $data=mysql_num_rows($qry);
 while($fetch1=mysql_fetch_array($qry))
 {
		 
	 $sum=$sum+$fetch1["newroomrate"];
	
 }
 $precent_date=getdate(); 
  $_SESSION['orderno'] = "ord_".$precent_date[year].$precent_date[mon].$precent_date[mday].$precent_date[hours].$precent_date[minutes].$precent_date[seconds]; 
  $order=$_SESSION['orderno'] ;

 ?>
 <input type="hidden" name="arrival" value="<?php echo $arrival;?>" />
 <input type="hidden" name="depature" value="<?php echo $depature;?>">
 <input type="hidden" name="totalamount" value="<?php echo $sum;?>" />
 <input type="hidden" name="pid" value="<?php echo $ppro_id;?>">
<input type="hidden" name="rid" value="<?php echo $bfrid;?>">
<input type="hidden" name="room_id" value="<?php echo $room_id;?>">
<input type="hidden" name="bf_id" value="<?php echo $bf_id;?>">
<input type="hidden" name="adult" value="<?php echo $adult;?>">
<input type="hidden" name="child" value="<?php echo $child;?>">
<input type="hidden" name="orderid" value="<?php echo $order;?>">

<div id="gustdetiles_pomentdetiles_main">
<div id="gustdetiles" style="background:url(images/big-buttion1.png);">
<div class="gustdetiles_heading"><strong>GUEST DETAILS:</strong></div>

</div>
<!--<div id="pomentdetiles" style="background:url(images/smaill-buttion.png);">
<div class="pomentdetiles_heading"><strong>PAYMENT DETAILS:</strong></div>
</div>-->
</div>

<div id="gustdetiles_content">
<table width="400px" border="0"style="margin:0px 0px 0px 20px">
   <td scope="row">&nbsp;Room Total:</td>
    <td>$<?php echo $sum;?></td>
    
  </tr>
  <tr>
    <td scope="row">&nbsp;Booking Total:</td>
    <td>$<?php echo $sum;?></td>
  </tr><tr style="width:150px;">
    <td scope="row" width="60px">&nbsp;First Name:</td>
    <td width="220px">&nbsp;<input name="first" type="text"  id="first" style="width:200px;" required></td>
  </tr>
  <tr style="width:150px;">
    <td scope="row" width="60px">&nbsp;Last Name:</td>
    <td>&nbsp;<input name="last" type="text" id="last"   style="width:200px;" required/></td>
  </tr>
  <tr style="width:150px;">
    <td scope="row">&nbsp;Address:</td>
    <td>&nbsp;<input name="addr" type="text"   id="addr" style="width:200px;" required/></td>
  </tr>
  <tr style="width:150px;">
    <td scope="row">&nbsp;City:</td>
    <td>&nbsp;<input name="city" type="text"  id="city" style="width:200px;" required/></td>
  </tr>
  <tr style="width:150px;">
    <td scope="row">&nbsp;State:</td>
    <td>&nbsp;<input name="state" type="text"  id="state" style="width:200px;" required/></td>
  </tr>
  <tr style="width:150px;">
    <td scope="row">&nbsp;Postcode:</td>
    <td>&nbsp;<input name="postal" type="text"   id="postal" style="width:200px;" required/></td>
  </tr>
  <tr style="width:150px;">
    <td scope="row">&nbsp;Country:</td>
    <td>&nbsp;<input name="country" type="text"   id="country" style="width:200px;" required/></td>
  </tr>
  <tr style="width:150px;">
    <td scope="row">&nbsp;Phone:</td>
    <td>&nbsp;<input name="phone" type="text"   id="phone" style="width:200px;" required/></td>
  </tr>
  
  <tr style="width:150px;">
    <td scope="row">&nbsp;Email:</td>
    <td>&nbsp;<input name="email" type="text"  id="email" style="width:200px;" required/></td>
  </tr>
  <tr style="width:150px;">
    <td scope="row">&nbsp;Special
Requests:</td>
    <td>&nbsp;<textarea name="request" rows="5"   cols="20" id="request" style="width:200px;" required>
</textarea></td>
  </tr>
  
  
  
  
  
  
  
  
</table>

<table>
 <tr style="width:150px;">
    <td scope="row">&nbsp;Type Of Payment:</td>
   <td> <input type="radio" name="paypal" value="paypal" />Paypal</td></tr>
   <tr>
   <td   scope="row">&nbsp;</td>
    <td>&nbsp;<input type="radio" name="paypal" value="directtransfer" />Direct Bank Transfer</td>
  </tr>
  
  </table>
<table>
<tr>
<td><input type="checkbox" name="fldcheckbox" id="fldcheckbox"  required="" onclick="fnchecked(this.checked);"/>
I agree with general terms and conditions AND room terms and conditions.
<div id="divcheck" style="display:none;">
<?php 
$q11=mysql_query("select terms from wp_rooms where ppro_id='$ppro_id' and roomid='$bfrid' and room_id='$room_id'");

 $fet=mysql_fetch_array($q11);
echo "<b>".$fet[0]."</b>";?>

</div>
</td></tr></table>

</div>
<!--<div id="pomentdetiles_content">








<table width="400px" border="0"style="margin:0px 0px 0px 20px">  <tr>
    <td scope="row">&nbsp;Room Total:</td>
    <td>$<?php echo $sum;?></td>
  </tr>
  <tr>
    <td scope="row">&nbsp;Booking Total:</td>
    <td>$<?php echo $sum;?></td>
  </tr>
  <tr>
    <td scope="row">&nbsp;Card Type:</td>
    <td>&nbsp;<select name="card" id="card"  style="width: 150px; visibility: visible;">
			<option selected="selected" value="-Select-">-Select-</option>
			<?php 
			$card=mysql_query("SELECT Mastercard,Visa,AmericanExpress FROM wp_general_settings");
			$fd=mysql_fetch_array($card);?>
			<option value="<?php echo $fd['Mastercard'];?>"><?php echo $fd['Mastercard'];?></option>
			<option value="<?php echo $fd['Visa'];?>"><?php echo $fd['Visa'];?></option>
            <option value="<?php echo $fd['AmericanExpress'];?>"><?php echo $fd['AmericanExpress'];?></option>

		</select></td>
  </tr>
  <tr>
    <td scope="row">&nbsp;Card Holder:</td>
    <td>&nbsp;<input name="card_holder"  type="text" id="card_holder"  style="width:200px;" ></td>
  </tr>
  <tr>
    <td scope="row">&nbsp;Card Number:</td>
    <td>&nbsp;<input name="card_num" type="text" id="card_num" style="width:200px;" /></td>
  </tr>
  <tr>
    <td scope="row">&nbsp;Card Expiry:</td>
    <td>&nbsp;<select name="card_ex" id="ctl00_plcBody_CardExpiryMonthDropDownList"   style="width: 50px; visibility: visible;">
			<option value="MM">MM</option>
			<option value="01">01</option>
			<option value="02">02</option>
			<option value="03">03</option>
			<option value="04">04</option>
			<option value="05">05</option>
			<option value="06">06</option>
			<option value="07">07</option>
			<option value="08">08</option>
			<option value="09">09</option>
			<option value="10">10</option>
			<option value="11">11</option>
			<option value="12">12</option>

		</select>
        <select name="card_year" id="ctl00_plcBody_CardExpiryYearDropDownList" style="width: 70px; visibility: visible;">
			<option value="YYYY">YYYY</option>
			<option value="2013">2013</option>
			<option value="2014">2014</option>
			<option value="2015">2015</option>
			<option value="2016">2016</option>
			<option value="2017">2017</option>
			<option value="2018">2018</option>
			<option value="2019">2019</option>
			<option value="2020">2020</option>
			<option value="2021">2021</option>
			<option value="2022">2022</option>
			<option value="2023">2023</option>

		</select>
        
        </td>
  </tr>
  <tr>
    <td scope="row">&nbsp;CCV:</td>
    <td>&nbsp;<input name="ccv"  type="text" id="ccv" /></td>
  </tr>
  
  <tr>
    <td scope="row">&nbsp;Type Of Payment:</td>
   <td> <input type="radio" name="paypal" value="paypal" />Paypal</td></tr>
   <tr>
   <td   scope="row">&nbsp;</td>
    <td>&nbsp;<input type="radio" name="paypal" value="directtransfer" />Bank Transfer</td>
  </tr>
</table>
	
</div>-->


 </div>



<div class="onmouse_booknow">
<!--<div id="ctl00_plcBody_BFGTACAgreePanel">

			<br>
			<div style="padding-left: 25px;">
				<input id="ctl00_plcBody_ConfirmBFGTACCheckBox"   type="checkbox" name="ctl00$plcBody$ConfirmBFGTACCheckBox"><label for="ctl00_plcBody_ConfirmBFGTACCheckBox">I have read and agree to the </label>
				<a id="ctl00_plcBody_ConfirmationViewBFGTACHyperLink" href="javascript:DisplayDetailsPanel('BFGTAC','auto')">The terms and conditions</a>.
				<span id="ctl00_plcBody_ConfirmBFGTACCustomValidator" style="color:Red;visibility:hidden;">*</span>
			</div>
			<div style="margin-left: 18px;">
			</div>
		
	</div>-->
    
    
    
    <div style="padding-left: 25px; float:left; margin:100px 0px 0px 0px;">
			<br>
		<input type="image"  name="booknow" src="images/book-now.png">
        <!--<input type="button" name="booknow" src="images/book-now.png" />-->
			<div id="bookingtext">
<font size="3" color="#FFFFFF">Please note that a 25% deposit will be processed to your card if booking outside 14 days (30 days for houses), the full amount will be processed if booking inside these time frames.</font>
</div><br>
			<br>
            <!--onclick="if (!Page_ClientValidate()){ return false; } this.disabled = true; this.value = 'Processing...';WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;ctl00$plcBody$MakeBookingButton&quot;, &quot;&quot;, true, &quot;BookingDetails&quot;, &quot;&quot;, false, true))" id="ctl00_plcBody_MakeBookingButton"-->
		</div></div>
</div>
<?php }?>
</form>
<script>
$("#night_select").bind('change', function(event){
	var days = $(this).val() * 1;
   var endDate = new Date($('#datepicker3').val());
   endDate.setDate(endDate.getDate() + days);
   
  // var monthname=new Array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
  //var monName = monthname[endDate.getMonth()];
   
   //  $('#datepicker2').val(  endDate.getDate()+ '-' +  monName+ '-' + endDate.getFullYear() );
	   //$('#datepicker2').val(  endDate.getFullYear() + '-' + endDate.getMonth() + 1 + '-' +  endDate.getDate()); 
	   $('#datepicker2').val(  endDate.getMonth() + 1 + '-' +  endDate.getDate()+ '-' + endDate.getFullYear() );
	   //$('#datepicker2').val( endDate.getFullYear()+ '-' + endDate.getMonth()+1 + '-' +  endDate.getDate() );
	   //('#datepicker2').val( endDate.getDate()+ '-' + endDate.getMonth()+1 + '-' +  endDate.getFullYear());
	});
</script>
<script>
$("#child").bind('change', function(event){
	 child = $(this).val();
	//alert(child);
	    adult = $('#adult').val();
	   //alert(adult);

	  maxavilabilty=parseFloat(child) + parseFloat(adult);
	   maxchild=parseFloat(maxavilabilty);
	   alert(maxchild);
	});
	</script>
</body>
</html>