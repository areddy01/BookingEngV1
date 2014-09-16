<?php
 @session_start();
//require_once('includes/config.php');
require_once('functions.php');
require_once('connection.php');
$user=new User(); 
 $orderno = $_SESSION['orderid'];
    $ppAcc = "pbhaskar@agilesoftech.in";
    $at ="oY0pgoB85rfUeqJkeL19OLss-TbhhLGPh0Or9FrRJpaKXkbbBa5N_Me4ZeK"; //PDT Identity Token
   // $url = "https://www.sandbox.paypal.com/cgi-bin/webscr"; //Test
  $url="https://www.paypal.com/cgi-bin/webscr";
    $tx = $_REQUEST['tx']; //this value is return by PayPal
    $req  = "cmd=_notify-synch";
	$req .= "&tx=$tx&at=$at";
	
//echo $post;
try{
    //Send request to PayPal server using CURL
    $ch = curl_init ($url);
	//echo $ch;
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_TIMEOUT, 30);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,FALSE);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $req);

    $result = curl_exec ($ch); //returned result is key-value pair string
	
    $error = curl_error($ch);
	//echo $result." - ".$error;
}catch(Exception $e){
	echo $e;
}
	
echo "<pre>";
//print_r($result);
if(!$result){
    echo "HTTP ERROR";
}else{
	//echo "hai";
     // parse the data
    $lines = explode("\n", $result);
    $keyarray = array();
    if (strcmp ($lines[0], "SUCCESS") == 0) {
        for ($i=1; $i<count($lines);$i++){
        list($key,$val) = explode("=", $lines[$i]);
        $keyarray[urldecode($key)] = urldecode($val);
    }
    // check the payment_status is Completed
    // check that txn_id has not been previously processed
    // check that receiver_email is your Primary PayPal email
    // check that payment_amount/payment_currency are correct
    // process payment
    //echo "<pre>";
	//print_r($keyarray);
    $firstname = $keyarray['first_name'];
    $lastname = $keyarray['last_name'];
    $itemname = $keyarray['item_name'];
    $amount = $keyarray['payment_gross'];
	$trans_no=$keyarray['txn_id'];
	$status=$keyarray['payment_status'];
    $paymentdate=$keyarray['payment_date'];
	$reciver_email=$keyarray['receiver_email'];?>
    
	


<BODY vLink="#000000" aLink="#000000" link="#000000" bgColor="#ffffff" leftMargin="0" 
topMargin="0" marginheight="0" marginwidth="0">
<TABLE align="center" cellSpacing="0" cellPadding="0" width="600" border="0"><br>
<tr>
<td width="300" align="center">
<a href="PropertySelection.php">Go To Selection</a> 
</td>
</tr>
</table>
<br>
<TABLE id=Table_01 cellSpacing=0 cellPadding=0 width=613 align=center border=0><TBODY>
  <TR>
    <TD width=612 bgColor=#003163 colSpan=13 height=15>&nbsp;</TD>
    <TD><IMG height=15 alt="" src="images/spacer.gif" 
      width=1></TD></TR>
  <TR>
    <TD width=15 bgColor=#003163 height=651 rowSpan=19>&nbsp;</TD>
    <TD width=583 bgColor=#9c8c39 colSpan=11 height=20>&nbsp;</TD>
    <TD width=14 bgColor=#003163 height=651 rowSpan=19>&nbsp;</TD>
    <TD><IMG height=20 alt="" src="images/spacer.gif" 
      width=1></TD></TR>
  <TR>
    <TD width=63 bgColor=#9c8c39 colSpan=2 height=39 rowSpan="2">&nbsp;</TD>
    <TD bgColor=#9c8c39 colSpan=7>
      <P align=center><B><FONT color=#ffffff size=5>Booking Confirmation</FONT></B></P></TD>
    <TD width=65 bgColor=#9c8c39 colSpan=2 height=39 rowSpan="2">&nbsp;</TD>
    <TD><IMG height=26 alt="" src="images/spacer.gif" 
      width=1></TD></TR>
  <TR>
    <TD width=455 bgColor=#9c8c39 colSpan=7 height=13>&nbsp;</TD>
    <TD><IMG height=13 alt="" src="images/spacer.gif" 
      width=1></TD></TR>
  <TR>
    <TD width=583 bgColor=#003163 colSpan=11 height=5><IMG height=5 alt="" 
      src="images/spacer.gif" width=583></TD>
    <TD><IMG height=5 alt="" src="images/spacer.gif" 
      width=1></TD></TR>
  <TR>
    <TD bgColor=#003163 colSpan=7 rowSpan=3><A 
      href="#"><IMG height=239 alt="" 
      src="images/reserve.jpg" width=433 
      border=0></A></TD>
    <TD width=5 bgColor=#003163 height=242 rowSpan=4><IMG height=242 alt="" 
      src="images/spacer.gif" width=5></TD>
    <TD bgColor=#003163 colSpan=3><A href="#"><IMG 
      height=113 alt="" src="images/reserve1.jpg" 
      width=158 border=0></A></TD>
    <TD><IMG height=112 alt="" src="images/spacer.gif" 
      width=1></TD></TR>
  <TR>
    <TD width=158 bgColor=#003163 colSpan=3 height=5><IMG height=5 alt="" 
      src="images/spacer.gif" width=158></TD>
    <TD><IMG height=5 alt="" src="images/spacer.gif" 
      width=1></TD></TR>
  <TR>
    <TD bgColor=#003163 colSpan=3><A href="#"><IMG 
      height=120 alt="" 
      src="images/reserve2.jpg" width=158 
      border=0></A></TD>
    <TD><IMG height=120 alt="" src="images/spacer.gif" 
      width=1></TD></TR>
  <TR>
    <TD width=420 bgColor=#003163 colSpan=7 height=5><IMG height=5 alt="" 
      src="images/spacer.gif" width=420></TD>
    <TD width=158 bgColor=#003163 colSpan=3 height=5><IMG height=5 alt="" 
      src="images/spacer.gif" width=158></TD>
    <TD><IMG height=5 alt="" src="images/spacer.gif" 
      width=1></TD></TR>
  <TR>
    <TD width=583 bgColor=#9c8c39 colSpan=11 height="2"><IMG height=2 alt="" 
      src="images/spacer.gif" width=583></TD>
    <TD><IMG height=2 alt="" src="images/spacer.gif" 
      width=1></TD></TR>
  <TR>
    <TD width=25 bgColor=#ffffe7 height=312 rowSpan=9>&nbsp;</TD>
    <TD bgColor=#ffffe7 colSpan=5>&nbsp;</TD>
    <TD width=221 bgColor=#ffffe7 colSpan=5 height=19>&nbsp;</TD>
    <TD><IMG height=19 alt="" src="images/spacer.gif" 
      width=1></TD></TR>
  <TR>
    <TD align="left" width="532" bgColor="#ffffe7" colSpan="9"><FONT face="Trebuchet MS" color="#333333" size="2">
      Dear <?php echo $firstname."&nbsp;".$lastname;?>,<br><br>
      We are pleased to confirm your lodging reservation and look forward 
      to your visit. Please review the information carefully and contact our 
      reservation department immediately of any changes toll free (***) 
      ***-****:</FONT> <br><br>
      <CENTER>
      <TABLE cellSpacing=0 cellPadding=0 width=478 border=0>
        <TBODY>
        <TR>
          <TD width=209 bgColor=#ffffe7>
            <P 
            style="MARGIN-TOP: 0px; MARGIN-BOTTOM: 0px; LINE-HEIGHT: 100%"><B><FONT 
            face="Trebuchet MS" color="#333333" size="2">Transaction ID:</FONT></B></P>
            <P 
            style="MARGIN-TOP: 0px; MARGIN-BOTTOM: 0px; LINE-HEIGHT: 100%"><B><FONT 
            face="Trebuchet MS" color="#333333" size="2">Guest Name:</FONT></B></P>
            <P 
            style="MARGIN-TOP: 0px; MARGIN-BOTTOM: 0px; LINE-HEIGHT: 100%"><B><FONT 
            face="Trebuchet MS" color="#333333" size="2">Order ID:</FONT></B></P>
            <P 
            style="MARGIN-TOP: 0px; MARGIN-BOTTOM: 0px; LINE-HEIGHT: 100%"><B><FONT 
            face="Trebuchet MS" color="#333333" size="2">Amount:</FONT></B></P>
            
            <P 
            style="MARGIN-TOP: 0px; MARGIN-BOTTOM: 0px; LINE-HEIGHT: 100%"><B><FONT 
            face="Trebuchet MS" color="#333333" size="2">Date:</FONT></B></P>
            <P 
            style="MARGIN-TOP: 0px; MARGIN-BOTTOM: 0px; LINE-HEIGHT: 100%"><B><FONT 
            face="Trebuchet MS" color="#333333" size="2">Status:</FONT></B></P></TD>
          <TD width=265>
            <P 
            style="MARGIN-TOP: 0px; MARGIN-BOTTOM: 0px; LINE-HEIGHT: 100%"><FONT 
            face="Trebuchet MS" color="#333333" size="2"><B><?php echo $trans_no;?></B></FONT><FONT 
            face="Trebuchet MS" color="#9d7529" size="2">&nbsp;</FONT></P>
            <P 
            style="MARGIN-TOP: 0px; MARGIN-BOTTOM: 0px; LINE-HEIGHT: 100%"><B><FONT 
            face="Trebuchet MS" color="#333333" size="2"><?php echo  $firstname."&nbsp;".$lastname;?>&nbsp;</FONT></B></P>
            <P 
            style="MARGIN-TOP: 0px; MARGIN-BOTTOM: 0px; LINE-HEIGHT: 100%"><B><FONT 
            face="Trebuchet MS" color="#333333" size="2"><?php echo $itemname;?>&nbsp;</FONT></B></P>
            
            <P 
            style="MARGIN-TOP: 0px; MARGIN-BOTTOM: 0px; LINE-HEIGHT: 100%"><B><FONT 
            face="Trebuchet MS" color="#333333" size="2"><?php echo $amount;?>&nbsp;</FONT></B></P>
            <P 
            style="MARGIN-TOP: 0px; MARGIN-BOTTOM: 0px; LINE-HEIGHT: 100%"><B><FONT 
            face="Trebuchet MS" color="#333333" size="2"><?php echo $paymentdate;?>&nbsp;</FONT></B></P>
            <P 
            style="MARGIN-TOP: 0px; MARGIN-BOTTOM: 0px; LINE-HEIGHT: 100%"><B><FONT 
            face="Trebuchet MS" color="#333333" size="2"><?php echo $status;?>&nbsp;</FONT></B></P>
            </TD>
        </TR></TBODY>
          </TABLE></CENTER>&nbsp; 
      <P style="MARGIN: 2px 0px 0px"><FONT face="Trebuchet MS" size="2">Please 
      look for another email from our concierge staff seven (7) days prior to 
      your arrival. This email will enable you to make arrangements for airport 
      transfers or car rental, dining, spa treatments, golf times, area 
      activities, etc. prior to your arrival.&nbsp;</FONT> 
      <P style="MARGIN: 10px 0px 0px"><FONT face="Trebuchet MS" size="2">We look 
      forward to welcoming you to Sample Resort and Spa!<BR><BR>Warmest Regards, 
      </FONT>
      <P style="MARGIN: 10px 20px 3px 0px; TEXT-INDENT: 20px"><FONT 
      face="Trebuchet MS" size="2"><BR>*********<BR>Reservations Manager</FONT> 
      <FONT face="Times New Roman" color="#9d7529" size=1><BR></FONT></P></TD>
    <TD width=26 bgColor=#ffffe7 rowSpan=8>&nbsp;</TD>
    <TD><IMG height=220 alt="" src="images/spacer.gif" 
      width=1></TD></TR>
  <TR>
    <TD width=532 bgColor=#003163 colSpan=9 height=1><IMG height=1 alt="" 
      src="images/spacer.gif" width=532></TD>
    <TD><IMG height=1 alt="" src="images/spacer.gif" 
      width=1></TD></TR>
  <TR>
    <TD width=532 bgColor=#ffffe7 colSpan=9 height=15>&nbsp;</TD>
    <TD><IMG height=15 alt="" src="images/spacer.gif" 
      width=1></TD></TR>
  <TR>
    <TD vAlign=top bgColor=#ffffe7 colSpan=2 rowSpan=3>
      <P align=center><IMG src="images/wot.png" width="150"  height="101" align=left border=0></P></TD>
    <TD width=68 bgColor=#ffffe7 colSpan=2 height=9>&nbsp;</TD>
    <TD vAlign=top align=right width=275 bgColor=#ffffe7 colSpan=5 height=32 
    rowSpan="2">
    
      <P align=center><FONT 
      face="Trebuchet MS, Geneva, Arial, Helvetica, SunSans-Regular, sans-serif" 
      size="2">Your transaction has been completed, and a receipt for your purchase has been emailed to you.<br> You may log into your account at <a href='https://www.paypal.com'>www.paypal.com</a> to view details of this transaction.<br></FONT></TD>
    <TD><IMG height=9 alt="" src="images/spacer.gif" 
      width=1></TD></TR>
  <TR>
    <TD width=41 bgColor=#ffffe7 height=48 rowSpan=4>&nbsp;</TD>
    <TD vAlign=top bgColor=#ffffe7 rowSpan=3>&nbsp;</TD>
    <TD><IMG height=23 alt="" src="images/spacer.gif" 
      width=1></TD></TR>
  <TR>
    <TD vAlign=top align=right width=275 bgColor=#ffffe7 colSpan=5 height=25 
    rowSpan=3><FONT face="Times New Roman" size=1>&nbsp;</FONT></TD>
    <TD><IMG height=3 alt="" src="images/spacer.gif" 
      width=1></TD></TR>
  <TR>
    <TD width=189 bgColor=#ffffe7 colSpan=2 height=22 rowSpan="2">&nbsp;</TD>
    <TD><IMG height=6 alt="" src="images/spacer.gif" 
      width=1></TD></TR>
  <TR>
    <TD width=27 bgColor=#ffffe7 height=16>&nbsp;</TD>
    <TD><IMG height=16 alt="" src="images/spacer.gif" 
      width=1></TD></TR>
  <TR>
    <TD width=583 bgColor=#003163 colSpan=11 height=12>&nbsp;</TD>
    <TD><IMG height=12 alt="" src="images/spacer.gif" 
      width=1></TD></TR>
  <TR>
    <TD><IMG height=1 alt="" src="images/spacer.gif" 
      width=15></TD>
    <TD><IMG height=1 alt="" src="images/spacer.gif" 
      width=25></TD>
    <TD><IMG height=1 alt="" src="images/spacer.gif" 
      width=38></TD>
    <TD><IMG height=1 alt="" src="images/spacer.gif" 
      width=151></TD>
    <TD><IMG height=1 alt="" src="images/spacer.gif" 
      width=41></TD>
    <TD><IMG height=1 alt="" src="images/spacer.gif" 
      width=27></TD>
    <TD><IMG height=1 alt="" src="images/spacer.gif" 
      width=80></TD>
    <TD><IMG height=1 alt="" src="images/spacer.gif" 
      width=58></TD>
    <TD><IMG height=1 alt="" src="images/spacer.gif" 
      width=5></TD>
    <TD><IMG height=1 alt="" src="images/spacer.gif" 
      width=93></TD>
    <TD><IMG height=1 alt="" src="images/spacer.gif" 
      width=39></TD>
    <TD><IMG height=1 alt="" src="images/spacer.gif" 
      width=26></TD>
    <TD><IMG height=1 alt="" src="images/spacer.gif" 
      width=14></TD>
    <TD></TD></TR></TBODY></TABLE></BODY></HTML>

	
	
	
	
	
	
	
	
	
	<?php
    /* echo ("<p><h3>Thank you for your purchase!</h3></p>");
    echo ("<b>Payment Details</b><br>\n");
    echo ("<li>Name: $firstname $lastname</li>\n");
    echo ("<li>Item: $itemname</li>\n");
	 echo ("<li>Transaction ID: $trans_no</li>\n");
    echo ("<li>Amount: $amount</li>\n");
	echo ("<li>Date: $paymentdate</li>\n");
	echo ("<li>Status: $status</li>\n");*/
	$order_data=mysql_real_escape_string($itemname);
	 $qry=mysql_query("select ppro_id,roomid,room_id,book_arrival,book_depature,email from wp_bookinfo where order_num='$orderno'");
	$f=mysql_fetch_array($qry);
	$pid=$f['ppro_id'];
	$rid=$f['roomid'];
	$room_id=$f['room_id'];
	$arrival=$f['book_arrival'];
	$depature=$f['book_depature'];
	$payer_mail=$f['email'];
	$grid_data_up="UPDATE wp_room_inventory_grid_details SET  flag='sold'  WHERE  ppro_id='$pid' AND roomid='$rid' and room_id='$room_id' and newgrid_date>='$arrival' and newgrid_date<='$depature'";
	$grid_data_update=mysql_query($grid_data_up);
	$bookingupdate=mysql_query("UPDATE wp_bookinfo SET total_price='$amount',transaction_no='$trans_no',settlement_date='$paymentdate',status='$status' WHERE order_num='$orderno'" );
	//email to admin and user
	$subject = "New Order from ".$firstname. $lastname ." on ".$paymentdate;
	 $to=$payer_mail;
		 $from=$reciver_email;
		
		$body="Dear,<br>you are booking an order on ".$paymentdate."<br>";
		
		$body.=
		"<table width='50%' border='0' cellspacing='1' cellpadding='5'>
  <tr>
    <td colspan='2'>Payment Reciept </td>
  </tr>
  <tr>
    <td width='42%' align='right'>Order Number </td>
    <td width='58%' align='left'>".$orderno."</td>
  </tr>
  <tr>
    <td align='right'>NAME </td>
    <td align='left'>".$firstname. $lastname."</td>
  </tr>
  <tr>
    <td align='right'>Amount</td>
    <td align='left'>".$amount."</td>
  </tr>
  <tr>
    <td align='right'>Transaction reference number </td>
    <td align='left'>".$trans_no."</td>
  </tr>
  <tr>
    <td align='right'>Status</td>
    <td align='left'>".$status."</td>
  </tr>
   
  <tr>
    <td align='right'>Settlement date</td>
    <td align='left'>".$paymentdate."</td>
  </tr>
 
</table>
		";

		   $headers  = "From: ".$from." \r\n";
		   $headers .= "Cc: ".$from."\r\n ";
		   $headers .= "MIME-Version: 1.0\r\n";
		   $headers .= "Content-type: text/html;charset=iso-8859-1\r\n";
		   $headers .= "X-Priority: 1\r\n";
		   $headers .= "X-MSMail-Priority: High\r\n";
		   $headers .= "X-Mailer: Just My Server\r\n";
		
		 //mail($to,$subject,$body,$headers);
              $mail1= mail($to,$subject,$body,$headers);
              $mail2= mail($from,$subject,$body,$headers);

    }
    else if (strcmp ($lines[0], "FAIL") == 0) {
        // log for manual investigation
    }
	}
 
?>

 