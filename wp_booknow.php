<?php
 @session_start();
if(!isset($_SESSION['userName'])) 
{
header('location:login.php');
}
// Include config file
//require_once('includes/config.php');
require_once('functions.php');
require_once('connection.php');
$user=new User(); ?>
 <link href="css/main.css" rel="stylesheet" type="text/css" />
  <link href="css/payment.css" rel="stylesheet" type="text/css" />
 <div id="main">
<div id="logo_main">
<div id="logo_image"></div>
<div id="text_image"></div>
</div>
<div id="menu_bar">
<div id="menu_text"></div>
</div>  
 <?php if($_SERVER["REQUEST_METHOD"] == "POST")
 
 {
	 $pid=trim($_POST['pid']);
	 $rid=trim($_POST['rid']);
	  $bf_id=trim($_POST['bf_id']);
	  $room_id=trim($_POST['room_id']);
	 $arrival=trim($_POST['arrival']);
	 $nights=trim($_POST['nights']);
	 $depature=trim($_POST['depature']);
	 $adult=trim($_POST['adult']);
	 $child=trim($_POST['child']);
	 $first=trim($_POST['first']);
	 $last=trim($_POST['last']);
	 $addr=trim($_POST['addr']);
     $city=trim($_POST['city']);
	 $state=trim($_POST['state']);
	 $country=trim($_POST['country']);
	 $postal=trim($_POST['postal']);
	 $phone=trim($_POST['phone']);
		   $email=trim($_POST['email']);
	
	 $request=trim($_POST['request']);

	 //$card=$_POST['card'];
	 
	  //$card_holder=$_POST['card_holder'];

	   //$card_num=$_POST['card_num'];
	
	  //$card_ex=$_POST['card_ex'];
	
	//  $card_year=$_POST['card_year'];

	  // $ccv=$_POST['ccv'];
	 
	 $amount=trim($_POST['totalamount']);
	 $paypal=trim($_POST['paypal']);
	  $orderid=trim($_POST['orderid']);
	 $_SESSION['orderid']= $orderid;
	 
	 $quer="insert into wp_bookinfo values('','$pid','$rid','$room_id','$orderid','$arrival','$depature','$adult','$child','$first','$last','$addr','$city','$state','$postal','$country','$phone','$email','$request','','','','')";
		
		$q1=mysql_query($quer) or die(mysql_error);
	 if($paypal=='directtransfer')
{
	?>
    
	<div id="thank_you_main_div">
<div id="thank_you_heading">Thank you. Your order has ben received</div>
</div>

<div id="thank_table_main_div">




<table width="984" border="1.em" bordercolor="#f2f1ef" height="80px" cellpadding="0" cellspacing="0" style="webkit-border-radius:10px; moz border radius:10px; border-radius:10px; -0-border-radius:10px;">
  <tr>
    <td >&nbsp;&nbsp;&nbsp;<font size="-1"> Order:</font> <br />&nbsp;&nbsp;&nbsp;<font color="#00CC33" size="+1"><b>  <?php echo $orderid;?></b></font></td>
    <td width="150">&nbsp;&nbsp;&nbsp;<font size="-1"> Date: </font> <br />&nbsp;&nbsp;&nbsp;<font color="#00CC33" size="+1"><b><?php echo $ch=Date('M d Y');?></b></font></td>
    <td width="100">&nbsp;&nbsp;&nbsp;<font size="-1"> Total: </font> <br />&nbsp;&nbsp;&nbsp;<font color="#00CC33" size="+1"><b>$<?php echo $amount;?></b></font></td>
    <td width="220">&nbsp;&nbsp;&nbsp;<font size="-1"> Payment method: </font> <br />&nbsp;&nbsp;&nbsp;<font color="#00CC33" size="+1"><b>Direct Bank Transfer</b></font></td>
    
  </tr>
  
</table>
</div>

<div id="make_your_text_div">Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your subscription will be activated immediately –  we will contact you if there is any issue with the transaction.</div>


<div id="our_detales">OUR DETALES</div>
<div id="our_detales_table_main_div">
<table width="984" border="1.em" bordercolor="#f2f1ef" height="80px" cellpadding="0" cellspacing="0" style="webkit-border-radius:10px; moz border radius:10px; border-radius:10px; -0-border-radius:10px;">
  <tr>
    <td>&nbsp;&nbsp;&nbsp;<font size="-1"> Account Name:</font> <br />&nbsp;&nbsp;&nbsp;<font color="#00CC33" size="+1"><b>Ashtanga Yoga Melbourne Pty. Ltd</b></font></td>
    <td width="150">&nbsp;&nbsp;&nbsp;<font size="-1"> Account Number: </font> <br />&nbsp;&nbsp;&nbsp;<font color="#00CC33" size="+1"><b>10678775</b></font></td>
    <td width="100">&nbsp;&nbsp;&nbsp;<font size="-1"> BSB Code: </font> <br />&nbsp;&nbsp;&nbsp;<font color="#00CC33" size="+1"><b>063012</b></font></td>
    <td width="150">&nbsp;&nbsp;&nbsp;<font size="-1"> Bank Name: </font> <br />&nbsp;&nbsp;&nbsp;<font color="#00CC33" size="+1"><b>CBA</b></font></td>
  
  </tr>
  
</table>
</div>

<div id="order_detales_hesding"> Order Details</div>


<table width="984" border="0" style="margin:0px 0px 0px 20px;">

  <tr>
    <td scope="row">&nbsp;<b>Product</b></td>
    <th>&nbsp;<b>Total</b></th>
  </tr>
  </table>
  <hr size="3" color="#f2f1ef" width="984px" style="margin:0px 0px 0px 20px;" />
<div id="product_table">
  
  <table width="984" border="0">
 <tr>
 </tr>
  <tr>
    <td scope="row">&nbsp;<font color="#00CC33" size="+1">Room Booking</font></td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;$<?php echo $amount;?></td>
  </tr>
  
  <tr>
    <th scope="row">&nbsp;</th>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <th scope="row">&nbsp;</th>
    <td>&nbsp;</td>
  </tr>
  
  
  <tr>
    <td scope="row">&nbsp;<b>Cart Subtotal:</b></td>
    <td>&nbsp;$<?php echo $amount;?></td>
  </tr>
  <tr>
    <td scope="row">&nbsp;<b>Order Total:</b></td>
    <td>&nbsp;$<?php echo $amount;?></td>
  </tr>
  <tr>
    <th scope="row">&nbsp;</th>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <th scope="row">&nbsp;</th>
    <td>&nbsp;</td>
  </tr>
  
  <tr>
    <td scope="row">&nbsp;<b>Email:</b></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td scope="row">&nbsp;<?php echo $email;?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <th scope="row">&nbsp;</th>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <th scope="row">&nbsp;</th>
    <td>&nbsp;</td>
  </tr>
  
 </tr>
  <tr>
    <td scope="row">&nbsp;<b>Telephone:</b></td>
    <td>&nbsp;</td>
  </tr>
  </tr>
  <tr>
    <td scope="row">&nbsp;<?php echo $phone;?></td>
    <td>&nbsp;</td>
  </tr>
  </tr>
  <tr>
    <th scope="row">&nbsp;</th>
    <td>&nbsp;</td>
  </tr>
  </tr>
  <tr>
    <th scope="row">&nbsp;</th>
    <td>&nbsp;</td>
  </tr> 
  
  
  <tr>
    <td scope="row">&nbsp;<i><?php echo $first.' '.$last;?></i></td>
    <td>&nbsp;N/C</td>
  </tr> 
  <tr>
    <td scope="row">&nbsp;<i> <?php echo $arrival;?></i></td>
    <td>&nbsp;</td>
  </tr> 
  <tr>
    <td scope="row">&nbsp;<i> <?php echo $depature;?></i></td>
    <td>&nbsp;</td>
  </tr> 
   <tr>
    <td scope="row">&nbsp;<i><?php echo $country;?></i></td>
    <td></td>
  </tr> 
  <tr>
    <td scope="row">&nbsp;<i><?php echo $state;?></i></td>
    <td></td>
  </tr> 
  <tr>
    <td scope="row">&nbsp;<i><?php echo $city;?></i></td>
    <td></td>
  </tr> 
   

</table>
<a href="PropertySelection.php">Go To Selection</a>
</div>



	
<?php }
 else 
	{?>
    <html><head><title>Loading...</title>
    </head>

<body><h2 align="center">Loading...</h2>		
<form class="paypal" name="paypal_form"  action="payments.php" method="post" id="paypal_form">    
	<input type="hidden" name="cmd" value="_xclick" /> 
    <input type="hidden" name="no_note" value="1" />
    <input type="hidden" name="lc" value="UK" />
    <input type="hidden" name="currency_code" value="USD" />
    <input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynow_LG.gif:NonHostedGuest" />
    <input type="hidden" name="first_name" value="<?php echo $first ; ?>"  />
    <input type="hidden" name="last_name" value="<?php echo $last ; ?>"  />
    <input type="hidden" name="payer_email" value="<?php echo $email ; ?>"  />
    <input type="hidden" name="item_number" value="<?php echo $orderid ; ?>" / >
    <input type="hidden" name="item_amount" value="<?php echo $amount ; ?>" / >
    
</form> <script type="text/javascript">

document.forms["paypal_form"].submit();

</script></body></html>
	<?php
	 }
exit;
// Store request params in an array
$request_params = array
					(
					'METHOD' => 'DoDirectPayment', 
					'USER' => $api_username, 
					'PWD' => $api_password, 
					'SIGNATURE' => $api_signature, 
					'VERSION' => $api_version, 
					'PAYMENTACTION' => 'Sale', 					
					'IPADDRESS' => $_SERVER['REMOTE_ADDR'],
					'CREDITCARDTYPE' => $card, 
					'ACCT' => $card_num, 						
					'EXPDATE' =>  $card_ex.$card_year, 			
					'CVV2' => $ccv, 
					'FIRSTNAME' => $first, 
					'LASTNAME' => $last, 
					'STREET' => $addr, 
					'CITY' => $city, 
					'STATE' => $state, 					
					'COUNTRYCODE' => $country, 
					'ZIP' => $postal, 
					'AMT' =>  $amount, 
					'CURRENCYCODE' => 'USD', 
					'DESC' => $request 
					);
					
		echo "<pre>";
		print_r($request_params);			
// Loop through $request_params array to generate the NVP string.
$nvp_string = '';
foreach($request_params as $var=>$val)
{
	$nvp_string .= '&'.$var.'='.urlencode($val);	
}

// Send NVP string to PayPal and store response
$curl = curl_init();
		curl_setopt($curl, CURLOPT_VERBOSE, 1);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($curl, CURLOPT_TIMEOUT, 30);
		curl_setopt($curl, CURLOPT_URL, $api_endpoint);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $nvp_string);

$result = curl_exec($curl);
echo $result.'<br /><br />';
curl_close($curl);
//$nvp_response_array=parse_str($result);



$proArray = array();
	while(strlen($result))
	{
		// name
		$keypos= strpos($result,'=');
		$keyval = substr($result,0,$keypos);
		// value
		$valuepos = strpos($result,'&') ? strpos($result,'&'): strlen($result);
		$valval = substr($result,$keypos+1,$valuepos-$keypos-1);
		// decoding the respose
		$proArray[$keyval] = urldecode($valval);
		$result = substr($result,$valuepos+1,strlen($result));
	}


// Parse the API response
//$result_array = NVPToArray($result);
echo '<pre />';
print_r($proArray);
 
	exit;	
 
		
	if($proArray['ACK']=='Success')
	{
		$quer="insert into wp_bookinfo values('','$pid','$rid','$room_id','','$arrival','','$depature','$adult','$child','$first','$last','$addr','$city','$state','$postal','$country','$phone','$email','$request','$amount','$card','$card_holder','$card_num','$card_ex','$card_year','$ccv') ";
		
		$q1=mysql_query($quer) or die(mysql_error);
	
	  
		
	    $grid_data_up="UPDATE wp_room_inventory_grid_details SET  flag='sold'  WHERE  ppro_id='$pid' AND roomid='$rid' and room_id='$room_id' and newgrid_date>='$arrival' and newgrid_date<='$depature'";
	/*echo "UPDATE wp_room_inventory_grid_details SET  flag='sold'  WHERE  ppro_id='$pid' AND roomid='$rid' and room_id='$room_id' and newgrid_date>='$arrival' and newgrid_date<='$depature'";*/
	$grid_data_update=mysql_query($grid_data_up);
	//header('location:roomnames.php?bf_id=&bfrid=$rid&ppro_id=$pid&arr=&avr=&rumid=$rid');

	header('location:propertySelection.php?bf_id='.$bf_id);
	}
	else
	{
		?>
<div style="background-color:#999; size:auto; text-align:center;"><center><h2><?php echo $proArray['L_LONGMESSAGE0'];?>
 </center></h2></div>
 <a href="settings.php"><h4><center>Go Back</center></h4></a>

 <?php
	}
		
 }
 ?>
       