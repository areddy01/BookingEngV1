k<?php 
ob_start();
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
$c=$_POST['cancel'];
     if(isset($_REQUEST['cancel']))
 { 
                          echo "<script>
	        	 alert('Are you want to Cancel')
	        	 location.replace('settings.php')
	        	</script>";  

 }

 if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty( $_POST['sele'] )) 
{
	$sele=$_REQUEST['sele'];
	$_SESSION['sele']=$sele;
}
 function GetVar($var) {
	

			if ($_GET[$var]) { return $_GET[$var]; }

			if ($_POST[$var]) { return $_POST[$var]; }
			
		}
	
$action = GetVar("action");

if ($action == 'genaralsettings') {
	
            
			$Griddaystoshow=$_REQUEST['Griddaystoshow'];
			
			$Firstbookabledayoffset = $_REQUEST['Firstbookabledayoffset'];
			$Daysbookable=$_REQUEST['Daysbookable'];
			$Minimumstaylength=$_REQUEST['Minimumstaylength'];
			$Maximumstaylength =$_REQUEST['Maximumstaylength'];
			$DefaultStayLength= $_REQUEST['DefaultStayLength'] ;
		  $imagesvisible= $_REQUEST['imagesvisible'];
		$Enquireforstopsoldrooms=$_REQUEST['Enquireforstopsoldrooms'];
		$MinimumRate=$_REQUEST['MinimumRate'];
		$Maximumextraquantity=$_REQUEST['Maximumextraquantity'];
		$Paymentdeposit=$_REQUEST['Paymentdeposit'];
		$MaximumRoomQuantity=$_REQUEST['MaximumRoomQuantity'];
		$MinimumArrivalTime=$_REQUEST['MinimumArrivalTime'];
		$MaximumArrivalTime=$_REQUEST['MaximumArrivalTime'];
		$MobileBookingFormLogo=$_REQUEST['MobileBookingFormLogo'];
		$RateParity=$_REQUEST['RateParity'];
		$OrderPropertyGridBy=$_REQUEST['OrderPropertyGridBy'];
		$ShowTitle=$_REQUEST['ShowTitle'];
		$Filterstopsold=$_REQUEST['Filterstopsold'];
		$AmericanExpress=$_REQUEST['AmericanExpress'];
		$ShowStarRating=$_REQUEST['ShowStarRating'];
		$Filterovermaxpersons=$_REQUEST['Filterovermaxpersons'];
		$Barter=$_REQUEST['Barter'];
		$ShowCurrencyDropDown=$_REQUEST['ShowCurrencyDropDown'];
		$Filterenquire=$_REQUEST['Filterenquire'];
	    $DinersClub=$_REQUEST['DinersClub'];
		$ShowMoveGridSection=$_REQUEST['ShowMoveGridSection'];
		$Filterbelowminimumstay=$_REQUEST['Filterbelowminimumstay'];
		$Mastercard=$_REQUEST['Mastercard'];
		$ShowPreviousandNextLinks=$_REQUEST['ShowPreviousandNextLinks'];
		$Filternoavailability=$_REQUEST['Filternoavailability'];
		$Visa=$_REQUEST['Visa'];
		$ShowTermsandConditions=$_REQUEST['ShowTermsandConditions'];
		$Filteroutsidebookablerange=$_REQUEST['Filteroutsidebookablerange'];
		$ShowRackRateColumn=$_REQUEST['ShowRackRateColumn'];
		$Filterabovepooledminstay=$_REQUEST['Filterabovepooledminstay'];
		$ShowPromotionBox=$_REQUEST['ShowPromotionBox'];
		$FilterMinimumandMaximumETA=$_REQUEST['FilterMinimumandMaximumETA'];
		$ShowPersonsIncludedonHover=$_REQUEST['ShowPersonsIncludedonHover'];
		$FilterRulesNotMet=$_REQUEST['FilterRulesNotMet'];
		$ShowExtraChargesonHover=$_REQUEST['ShowExtraChargesonHover'];
		$FilterPropertyGrid=$_REQUEST['FilterPropertyGrid'];
		$ShowHelpButton=$_REQUEST['ShowHelpButton'];
		$ShowRoomQuantityFeature=$_REQUEST['ShowRoomQuantityFeature'];
		$ShowBookingFormTitle=$_REQUEST['ShowBookingFormTitle'];
		$ShowPromotionBoxOnWidget=$_REQUEST['ShowPromotionBoxOnWidget'];
		$ShowCreditCardSurchargeInformation=$_REQUEST['ShowCreditCardSurchargeInformation'];
		$ShowSortOptiononPropertyPage=$_REQUEST['ShowSortOptiononPropertyPage'];
		$ua=$_REQUEST['ua'];
		$DefaultCurrency=$_REQUEST['DefaultCurrency'];
		$search=$_REQUEST['search'];
		echo"<br>";
		$user_id=$_REQUEST['user_id'];
		$bookid=$_REQUEST['book_id'];
		$c=mysql_query("select * from wp_general_settings where user_id='$user_id' and book_id='$bookid'");
		$count=mysql_num_rows($c);
		if($count){
		echo "updatedata";
		$general_insert="UPDATE  wp_general_settings SET Griddaystoshow='$Griddaystoshow',Firstbookabledayoffset='$Firstbookabledayoffset',Daysbookable='	$Daysbookable',Minimumstaylength='$Minimumstaylength',Maximumstaylength=$Maximumstaylength,DefaultStayLength='$DefaultStayLength',imagesvisible='$imagesvisible',Enquireforstopsoldrooms='$Enquireforstopsoldrooms',MinimumRate='$MinimumRate',Maximumextraquantity='$Maximumextraquantity',Paymentdeposit='$Paymentdeposit',MaximumRoomQuantity='$MaximumRoomQuantity',MinimumArrivalTime='$MinimumArrivalTime',MaximumArrivalTime='$MaximumArrivalTime',MobileBookingFormLogo='$MobileBookingFormLogo',RateParity='$RateParity',OrderPropertyGridBy='$OrderPropertyGridBy',ShowTitle='$ShowTitle',Filterstopsold='$Filterstopsold',AmericanExpress='$AmericanExpress',ShowStarRating='$ShowStarRating',Filterovermaxpersons='$Filterovermaxpersons',Barter='$Barter',ShowCurrencyDropDown='$ShowCurrencyDropDown',Filterenquire='$Filterenquire',DinersClub='$DinersClub',ShowMoveGridSection='$ShowMoveGridSection',Filterbelowminimumstay='$Filterbelowminimumstay',Mastercard='$Mastercard',ShowPreviousandNextLinks='$ShowPreviousandNextLinks',Filternoavailability='$Filternoavailability',Visa='$Visa',ShowTermsandConditions='$ShowTermsandConditions',Filteroutsidebookablerange='$Filteroutsidebookablerange',ShowRackRateColumn='$ShowRackRateColumn',Filterabovepooledminstay='$Filterabovepooledminstay',ShowPromotionBox='$ShowPromotionBox',FilterMinimumandMaximumETA='$FilterMinimumandMaximumETA',ShowPersonsIncludedonHover='$ShowPersonsIncludedonHover',FilterRulesNotMet='$FilterRulesNotMet',ShowExtraChargesonHover='$ShowExtraChargesonHover',FilterPropertyGrid='$FilterPropertyGrid',ShowHelpButton='$ShowHelpButton',ShowRoomQuantityFeature='$ShowRoomQuantityFeature',ShowBookingFormTitle='$ShowBookingFormTitle',ShowPromotionBoxOnWidget='$ShowPromotionBoxOnWidget',ShowCreditCardSurchargeInformation='$ShowCreditCardSurchargeInformation',ShowSortOptiononPropertyPage='$ShowSortOptiononPropertyPage',ua='$ua',DefaultCurrency='$DefaultCurrency',flag='$search' where user_id='$user_id' and book_id='$bookid'";
		
		$general_update=mysql_query($general_insert);
		}else{
		$q=mysql_query("insert into wp_general_settings values('','$Griddaystoshow','$Firstbookabledayoffset','$Daysbookable','$Minimumstaylength','$Maximumstaylength','$DefaultStayLength','$imagesvisible','$Enquireforstopsoldrooms','$MinimumRate','$Maximumextraquantity','$Paymentdeposit','$MaximumRoomQuantity','$MinimumArrivalTime','$MaximumArrivalTime','$MobileBookingFormLogo','$RateParity','$OrderPropertyGridBy','$ShowTitle','$Filterstopsold','$AmericanExpress','$ShowStarRating','$Filterovermaxpersons','$Barter','$ShowCurrencyDropDown','$Filterenquire','$DinersClub','$ShowMoveGridSection','$Filterbelowminimumstay','$Mastercard','$ShowPreviousandNextLinks','$Filternoavailability','$Visa','$ShowTermsandConditions','$Filteroutsidebookablerange','$ShowRackRateColumn','$Filterabovepooledminstay','$ShowPromotionBox','$FilterMinimumandMaximumETA','$ShowPersonsIncludedonHover','$FilterRulesNotMet','$ShowExtraChargesonHover','$FilterPropertyGrid','$ShowHelpButton','$ShowRoomQuantityFeature','$ShowBookingFormTitle','$ShowPromotionBoxOnWidget','$ShowCreditCardSurchargeInformation','$ShowSortOptiononPropertyPage','$ua','$DefaultCurrency','$search','$user_id','$bookid')");
		
	}	
		
		
		
		
header('location:settings.php');
}
?>