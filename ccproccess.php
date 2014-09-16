<?php 
require_once('includes/config.php');
require_once('functions.php');
require_once('connection.php');
$user=new User();
//session_start();
$orderid=session_id();
//Merchant id Details
$merchant = ' 7EH6NFAN3XERQ';
$password = 'M7wiFyd8ccjR26EV'; //M7wiFyd8ccjR26EV

//Credit Card Details with amoun and id
$invoice_id=$_POST['orderid'];
$amount=$_POST['amount'];
$cardname=$_POST['ccname'];
$cardtype=$_POST['cctype'];
//$cardnumber=$_POST['ccnumber'];
$cardnumber=$_POST['ccnumber'];
$expmm=$_POST['edm'];
$expyy=$_POST['edy'];
$cardexp=$expmm."/".$expyy ;
//echo $invoice_id."'".$amount."'".$cardname."'".$cardtype."'".$cardnumber ;

//Conecting with url

$server				= "https://4tknox.au.com/cgi-bin/themerchant.au.com/ecom/external2.pl?";
$request			= "";
$response 			= array();
$is_approved		= false;
$is_default_page	= true;


$post_array 	= array
		(
			"LOGIN" => $merchant.'/'.$password,
			"COMMAND" =>'purchase',
			"AMOUNT" =>$amount,
			"CCNUM" =>$cardnumber,
			"CCEXP" =>$cardexp,
			"COMMENT" =>'St George Bank payment process'
);

reset($post_array);

		while (list ($key, $val) = each($post_array))

		{
			//$request .= $key . "=" . urlencode($val) . "&";
			$request .= $key . "=" . $val . "&";
		}
		
				
		$ch = curl_init($server);

		curl_setopt($ch, CURLOPT_HEADER, 0); // set to 0 to eliminate header info from response

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // Returns response data instead of TRUE(1)

		curl_setopt($ch, CURLOPT_POSTFIELDS, rtrim( $request, "&" )); // use HTTP POST to send form data

		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); // uncomment this line if you get no gateway response. ###


		$content = curl_exec($ch); //execute post and get results
		
		curl_close ($ch);
		
		//print_r($request)."<br>";
		//print_r($content)."<br>";
		echo "<pre>";
		print_r($content);
		//$content = array_values (split (chr(10), $content));
	$content =explode(',', $content);
		//while ($key_value = next ($content))

	foreach($content as $key_value)
		{

			//@list ($key, $value) = split ("=", $key_value);

			@list ($key, $value) = explode("=", $key_value);
			 	echo $response[$key] = $value; 
			
			print_r($response[$key])."<br>";

		}
			//print_r($response)."<br>";
		
		if ($response['status'] == "approved" || $response['status'] == "complete")

		{

			$is_approved = true;

		}

		$is_default_page = false;
		

	
	
$transaction_number	=	$response['txn_ref'];
$result				=	$response["result"];
$card_type			=	$response['card_type'];
$status				=	$response["status"];
$settlement_date	=	$response['settlement_date'];
$card_desc			=	$response['card_desc'];
$bank_ref			=	$response['bank_ref'];
$response_text		=	$response['response_text'];
$response_code		=	$response['response_code'];
$today				=	date("Y-m-d");

echo $transaction_number."--".$card_number."--".$status."--".$settlement_date."--".$account_type."--".$card_expiry."--".$card_desc."--".$total_amount."--".$response_text."--".$receipt;
exit;
	if ($is_approved)
	{
     $str="	update orderdetails set transaction_no='$transaction_number',cc_number='$cardnumber',cc_name='$cardname',cc_type='$card_type',cc_expiry='$cardexp',bank_ref='$bank_ref',total_price='$amount',response_text='$response_text',response_code='$response_code',settlement_date='$settlement_date',status='$status' where cart_id='$cartid'";
	$rs = mysql_query($str);
	
		$subject = "New Order from ".$cardname." on ".$today;
		$to="sales@atouchofpurple.com.au";
		$from=$cardname;
		
		$body="Dear admin,<br>you are receiving an order from ".$cardname." on ".$today."<br>";
		
		$body.=
		"<table width='50%' border='0' cellspacing='1' cellpadding='5'>
  <tr>
    <td colspan='2'>Payment Reciept </td>
  </tr>
  <tr>
    <td width='42%' align='right'>Invoice ID </td>
    <td width='58%' align='left'>".$invoice_id."</td>
  </tr>
  <tr>
    <td align='right'>Card holder name </td>
    <td align='left'>".$cardname."</td>
  </tr>
  <tr>
    <td align='right'>Amount</td>
    <td align='left'>".$amount."</td>
  </tr>
  <tr>
    <td align='right'>Transaction reference number </td>
    <td align='left'>".$response['txn_ref']."</td>
  </tr>
  <tr>
    <td align='right'>Status</td>
    <td align='left'>".$response['status']."</td>
  </tr>
  <tr>
    <td align='right'>Card type </td>
    <td align='left'>".$card_type."</td>
  </tr>
  <tr>
    <td align='right'>Card expairy </td>
    <td align='left'>".$cardexp."</td>
  </tr>
  <tr>
    <td align='right'>Settlement date</td>
    <td align='left'>".$response['settlement_date']."</td>
  </tr>
  <tr>
    <td align='right'>Description</td>
    <td align='left'>".$response['card_desc']."</td>
  </tr>
  <tr>
    <td align='right'>Bank reference number </td>
    <td align='left'>".$response['bank_ref']."</td>
  </tr>
</table>
		";

		   $headers  = "From: $from \n";
		   $headers .= "MIME-Version: 1.0\r\n";
		   $headers .= "Content-type: text/html;charset=iso-8859-1\r\n";
		   $headers .= "X-Priority: 1\r\n";
		   $headers .= "X-MSMail-Priority: High\r\n";
		   $headers .= "X-Mailer: Just My Server\r\n";
		   
		 mail($to,$subject,$body,$headers);
?>
<script>
location.href='orders_mail.php';
</script>
<?php
	} else {
?>
<script>
location.href='http://www.atouchofpurple.com.au/thankyou.php?id=M';
</script>
<?php
	}
?>