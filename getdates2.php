<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Booking Grid</title>
<link href="css/bootstrap1.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap-responsive1.css" rel="stylesheet" type="text/css">
</head>

<?php 
require_once('functions.php');
require_once('connection.php');
$user=new User(); 
$bf_id=$_REQUEST['bf_id'];
$datepic_pic=$_REQUEST['data1']; 
 $ppro_id=$_REQUEST['data2'];
 $bfrid=$_REQUEST['data3'];
$avr=$_REQUEST['data4'];
$user_id=$_REQUEST['data5'];
$search=$_REQUEST['search'];

$region=$_REQUEST['region'];
$query="select * from wp_griddateselection where user_id='$user_id'";
 $q1=mysql_query($query);
 $q2=mysql_fetch_array($q1);

 $to=$q2['todate'];
 $bg=mysql_query("SELECT * FROM wp_color");
$bgclr=mysql_fetch_array($bg);
$bgcolor=$bgclr['color'];
 

 $enddat = date('Y-m-d ', strtotime($to));
$property=mysql_query("SELECT * FROM wp_properties WHERE ppro_id='$ppro_id'");
$propertyname=mysql_fetch_array($property);
$grid=mysql_query("SELECT * FROM wp_general_settings"); 
$gridsettings=mysql_fetch_array($grid);
$griddays=$gridsettings['Griddaystoshow'];
$currency=$gridsettings['DefaultCurrency'];
$property1=mysql_query("SELECT * FROM wp_room_type_details WHERE ppro_id='$ppro_id' and roomid='$bfrid'");
$propertyname1=mysql_fetch_array($property1);

$curntdate=Date("Y-m-d");
//$datepic_pic=$_POST['data1'];  
$enddate=Date("Y-m-d", strtotime("+$griddays days"));

$page=$_GET['page'];
 if(!isset($page) || $page <= 0 || $page == "")
{
	$page=1; 					
 }

	
	$inventoory_qry="SELECT Distinct newgrid_date FROM `wp_room_inventory_grid_details` 
WHERE newgrid_date>='$datepic_pic' and newgrid_date<='$enddat' and user_id='$user_id'";

$sql1= mysql_query($inventoory_qry) or die(mysql_error());
				
				$no_of_row = mysql_num_rows($sql1);
				if($no_of_row)		
	        {	
			
		$maxpage=$griddays;
		
		
		$totalpages=ceil($no_of_row / (float)$maxpage);
		
		if($page > $totalpages)
		{
			$page=1; 
		}
		}
		
		@ mysql_data_seek($sql1,($page-1) * $maxpage);
		
		if($totalpages>1)
		{	
		
	     if($page > 1)
	     {
		    $pre = (int)$page - 1;
          ?>
      <!--<div style="width:120px; float:left; background:#21678b; width:130px; height:30px; -webkit-border-radius:15px; -moz border-radius:15px; -0-border-radius:15px; border-radius:0px; margin:0px 0px 0px 30px; ">
    <a href="roomnames_18_07_2013.php?page=<?php echo $pre?>&bf_id=<?php echo $bf_id;?>&ppro_id=<?php echo $ppro_id;?>&bfrid=<?php echo $bfrid;?>&avr=<?php echo $avr;?>" style="margin:20px 0px 0px 15px; color:#FFF;"> <b>Previous <?php echo $griddays;?> Days</b></a>
    </div>-->
          <?php	
	     } 
	     if($page < $totalpages)
	    {
		    $next = (int)$page + 1;?>
            <!--<div style=" background:#21678b; width:130px; height:30px; -webkit-border-radius:15px; -moz border-radius:15px; -0-border-radius:15px; border-radius:0px; float:right;" >
            <a href="roomnames_18_07_2013.php?page=<?php echo $next?>&bf_id=<?php echo $bf_id;?>&ppro_id=<?php echo $ppro_id;?>&bfrid=<?php echo $bfrid;?>&avr=<?php echo $avr;?>" style="margin:20px 0px 0px 30px; color:#FFF;" > <b>Next <?php echo $griddays;?> Days</b></a></div>-->
       <?php
	    }
	    ?>
</div>

<?php
 if($search){
 ?>
 
 <div class="row-fluid">


<div class="span12"><div class="container">



<div class="span11" style="background:#1f5771;">


<form class="form-horizontal">  
        <fieldset>  
         <br>
          <div class="control-group">  
            <label class="control-label" for="input01" style="color:#FFF;">Region</label>  
            <div class="controls">  
              <select id="select01" name="region" onChange="changePP('changeprpty.php?id='+this.value)">
              <option selected="selected">--Select destination--</option>
              <?php
         while($row1 = mysql_fetch_array($result))
        {
         $city_id= $row1['city_id'];
          ?>
          <option value="<?php echo $row1['city_id'];?>-<?php echo $user_id;?>"><?php echo $row1['city_name'];?></option>
  
          <?php
           $sqry=mysql_query("SELECT *  FROM wp_region where city_id=$city_id order by region_name")or die(mysql_error());
       
             while($row12 = mysql_fetch_array($sqry))
             {?>
            <option value="<?php echo $row12['region_id'];?>-<?php echo $row1['city_id'];?>-<?php echo $user_id;?>">.....<?php echo $row12['region_name'];?></option>
          <?php }

       } ?>
     </select>
    </div> </div>
    <div class="control-group">  
            <label class="control-label" for="select01" style="color:#FFF;">Property</label>  
            <div class="controls">  
            <select name="ppro_id"  id="select02" >
    <option selected="selected">--Select Property--</option>
  </select>
            
          </div>  
          </div>
           
          <div class="control-group">  
            <label class="control-label" for="select01" style="color:#FFF;">Arrival</label>  
            <div class="controls"> 
             
               <input type="text" id="input-xlarge"   name="arrival"> 
                <input type="hidden" id="bf_id"   name="bf_id" value="<?php echo $bf_id;?>"> 
                 <input type="hidden" id="data3"   name="data3" value="search"> 
                   <input type="hidden" id="slot" value="slot">
             
            </div>  
          </div> 
          <div class="control-group">
            <div class="controls"> <input type="button" name="search" class="btn" value="Search" >  </div>  
          </div>
        </fieldset>  
</form> 


</div>
 
 
 
<?php 
 }?>
   




<table id="main_tbody2" width="984" height="70px"   border="1" bordercolor="#fff" cellpadding="0" cellspacing="0">
<tr height="70"> 
 <td width="270" colspan="2" bgcolor="#21678b">&nbsp;<b> <font color="#FFFFFF" face="Verdana, Geneva, sans-serif" ><?php echo $propertyname['Name'];?></font><br /> <font color="#eaf3f7"> &nbsp;&nbsp;<?php echo $propertyname1['name'];?></font></b></td>
<!--<td bgcolor="#c5c5c5" width="50"><font color="#446f85" face="Tahoma, Geneva, sans-serif" size="-1" > FULL RATE</font></td>-->
<?php
 $whichrow=0;
  $flage=0;
//for($i=0; $i<=$griddays; $i++){ 

while($inventoory_grid_data=mysql_fetch_array($sql1))
{
	$whichrow=$whichrow + 1;
         ?>	

 <td bgcolor="#c5c5c5" width="50">&nbsp;<font color="" face="Tahoma, Geneva, sans-serif" size="-1" > 
<?php

	$d=$inventoory_grid_data['newgrid_date'];
	 $ch=Date('D d M',strtotime($d));
	echo $ch=strtoupper($ch);
	if($flage==0){
											$prev1=Date("Y-m-d",strtotime($d."-".$griddays."day"));
											$book=Date("Y-m-d",strtotime($d));}
?>
</font></td>
<?php
		 if($whichrow == $maxpage)
		  {
			
			break; 
		  }
		  $flage=$flage+1;							  
		 }			
 $temp=Date("Y-m-d",strtotime($d."+ 1 day"));
?>
</tr>
<tr height="20"> 
   <?php
   $span=$griddays+1;
   ?>
 

 <div><?php
		if($totalpages>1)
		{ 
			if($page > 1)
			{
				$pre = (int)$page - 1; ?>
				<td colspan="1"> <div style="width:120px;  float:right; background:#21678b; width:130px; height:30px; -webkit-border-radius:15px; -moz border-radius:15px; -0-border-radius:15px; border-radius:0px; margin:0px 0px 0px 30px; ">
    <a href="getdates2.php?page=<?php echo $pre?>&bf_id=<?php echo $bf_id;?>&data2=<?php echo $ppro_id;?>&data3=<?php echo $bfrid;?>&data4=<?php echo $avr;?>&data1=<?php echo $datepic_pic;?>&data5=<?php echo $user_id;?>&search=<?php echo search;?>" style="margin:20px 0px 0px 15px; color:#FFF;"> <font color="#FFFFFF" face="Verdana, Geneva, sans-serif" size="1"> <b>Previous <?php echo $griddays;?> Days</b></font></a>
    
   
				</div></td>
				
				
				<td width="50" bgcolor="#21678b" colspan="<?php echo  $span;?>">&nbsp; <font  color="#FFFFFF" face="Verdana, Geneva, sans-serif" size="1"><b>FULL RATE</b></font>
				<?php	
				
				if($page < $totalpages)
				{
				$next = (int)$page + 1;?>
				<div style=" background:#21678b; width:120px; height:30px; -webkit-border-radius:15px; -moz border-radius:15px; -0-border-radius:15px; border-radius:0px; float:right; margin:0px 0px 0px 0px;" >
				  <a href="getdates2.php?page=<?php echo $next?>&bf_id=<?php echo $bf_id;?>&data2=<?php echo $ppro_id;?>&data3=<?php echo $bfrid;?>&data4=<?php echo $avr;?>&data1=<?php echo $datepic_pic;?>&data5=<?php echo $user_id;?>&search=<?php echo search;?>" style="margin:20px 0px 0px 30px; color:#FFF;" ><font color="#FFFFFF" face="Verdana, Geneva, sans-serif" size="1"> <b>Next <?php echo $griddays;?> Days</b></font></a></div></td>
				<?php			
			}
			
		}else{
			
			//$pre = (int)$page - 1;
			?>
			<td colspan="1"></td>
			<td width="50" bgcolor="#21678b" colspan="<?php echo  $span;?>">&nbsp; <font  color="#FFFFFF" face="Verdana, Geneva, sans-serif" size="1"><b>FULL RATE</b></font>
			<?php	
			
			//if($page < $totalpages)
			//{
				$next = (int)$page + 1;?>
				<div style=" background:#21678b; width:120px; height:30px; -webkit-border-radius:15px; -moz border-radius:15px; -0-border-radius:15px; border-radius:0px; float:right; margin:0px 0px 0px 0px;" >
				<a href="getdates2.php?page=<?php echo $next?>&bf_id=<?php echo $bf_id;?>&data2=<?php echo $ppro_id;?>&data3=<?php echo $bfrid;?>&data4=<?php echo $avr;?>&data1=<?php echo $datepic_pic;?>&data5=<?php echo $user_id;?>&search=<?php echo search;?>" style="margin:20px 0px 0px 30px; color:#FFF;" ><font color="#FFFFFF" face="Verdana, Geneva, sans-serif" size="1"> <b>Next <?php echo $griddays;?> Days</b></font></a></div></td>
				
<?php 
			//}
		} 
		
		
} ?>
</div>
 
 

</tr>
<?php
if($user_id=='1'){
									$m="select firstname from wp_manage_user where id='1'";
									}else{
						  $m="select room_id from wp_manage_mappings where user_id='$user_id' and ppro_id='$ppro_id' and roomid='$bfrid'";
									 }
						 $map=mysql_query($m);
									while($row=mysql_fetch_array($map)){
									 $rrmd=$row['room_id'];
$query="SELECT * FROM wp_rooms WHERE ppro_id='$ppro_id' and roomid='$bfrid' and showroom='show'";
if($user_id=='1'){
 $dquery=$query;
 }else{
  $dquery=$query." and room_id='$rrmd'";
 }
 if($room_id){
 $dquery=$query." and room_id='$room_id'";
 }
 //$dquery="SELECT * FROM wp_rooms WHERE ppro_id='$ppro_id' and roomid='$bfrid'";
 //echo "SELECT * FROM wp_rooms WHERE ppro_id='$ppro_id' and roomid='$bfrid'";
$rproperties=mysql_query($dquery);
$outindex=0;
while($details=mysql_fetch_array($rproperties))
{
//$rdetails=mysql_query("SELECT * FROM wp_rooms WHERE ppro_id='$ppro_id' and and roomid='$bfrid'");
//$roomcount=mysql_num_rows($rdetails);
//$roomdetails=mysql_fetch_array($rdetails);
$room_id=$details['roomid'];
$roomid1=$details['room_id'];
$rdata=$details['roomname'];
$des=$details['roomdes'];
$fullrate=$details['rackrate'];
 $rackrate=$details['roomrate'];
$roomdata=$roomdetails['defaultinclusion'];
$q1=mysql_query("SELECT * FROM wp_room_inventory_grid_details WHERE ppro_id='$ppro_id' AND roomid='$bfrid' and room_id='$roomid1'");
$rate=mysql_fetch_array($q1);
$nights=$rate['newroomrate'];
$night=($nights*5);
$img_q1="select img_id from  wp_imginfo  where  ppro_id='$ppro_id' and roomid='$room_id' and room_id='$roomid1'";
$r1=mysql_query($img_q1);
$res=mysql_fetch_array($r1);


 $imgid=$res['img_id'];

			    

 
 $page=$_GET['page'];
 


$bf_qry="SELECT * FROM wp_room_inventory_grid_details WHERE ppro_id='$ppro_id' AND roomid='$bfrid' and room_id='$roomid1' and newgrid_date>='$datepic_pic' and newgrid_date<='$enddat' and user_id='$user_id'";
$sql1= mysql_query($bf_qry) or die(mysql_error());

				 $no_of_row = mysql_num_rows($sql1);
				
		
		?>
        
</div>


<?php 
$popup_query=mysql_query("SELECT * FROM wp_properties WHERE ppro_id='$ppro_id'");
$popup_res=mysql_fetch_array($popup_query);
$popup_des=$popup_res['ds'];
$popup_featured=$popup_res['features'];?>
<tr align="center">
<td>
<table border="1" bordercolor="#fff" cellpadding="0" cellspacing="0">
<tr>
  <td width="250" bgcolor="#1c3f52">&nbsp;
  <div id="nbmber"><div id="nbmber_text">
  <a href="RoomDetails_dump.php?bf_id=<?php echo $bf_id;?>&bfrid=<?php echo $details['roomid'];?>&ppro_id=<?php echo $popup_res['ppro_id'];?>&room_id=<?php echo $roomid1;?>&arr=<?php echo $date;?>&avr=<?php echo $roomcount;?>&rumid=<?php echo $details['roomid'];?>"  class="trigger"> <font color="#FFFFFF" size="2"><?php echo $rdata;?></font></a>
<!-- <font color="#FFFFFF" size="2"><?php echo $rdata;?> -->
</div></div>
  
  <div id="book_now_buttion" style="margin:0px 0px 0px 95px">
  <div id="viewroom_text">
  
  <?php
   $days=mysql_query("SELECT newstop_sell,flag FROM `wp_room_inventory_grid_details` 
WHERE newgrid_date>='$datepic_pic' and newgrid_date<='$enddat' and user_id='$user_id' and  room_id='$roomid1' and newstop_sell='sold'");

$no_stopsell=mysql_num_rows($days);
$bb=mysql_fetch_array($days);

/*if($no_stopsell)
{ 
echo "<b>Not Avilable</b>";}
else{*/
?>
<!--
	<a href='RoomDetails_dump.php?bf_id=<?php echo $bf_id;?>&bfrid=<?php echo $details['roomid'];?>&ppro_id=<?php echo $popup_res['ppro_id'];?>&room_id=<?php echo $roomid1;?>&arr=<?php echo $date;?>&room_id=<?php echo $details['room_id'];?>&avr=<?php echo $roomcount;?>&rumid=<?php echo $details['roomid'];?>' target="_blank">VIEW ROOM</a>nnnnnnnnnnnnnnnnn-->
    <script type="text/javascript">
// Popup window code

/*function newPopup(url) {
	popupWindow = window.open(
		url,'popUpWindow','height=700,width=800,left=10,top=10,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes')
}*/
function newPopup(url )
{
  var win=window.open(url, '_blank');
  win.focus();
}
</script>

<script type="text/javascript">
    if (top.location!= self.location){
        top.location = self.location
    }
</script>
    <!--<a href="JavaScript:newPopup('RoomDetails_dump.php?bf_id=<?php echo $bf_id;?>&bfrid=<?php echo $details['roomid'];?>&ppro_id=<?php echo $popup_res['ppro_id'];?>&room_id=<?php echo $roomid1;?>&arr=<?php echo $date;?>&room_id=<?php echo $details['room_id'];?>&avr=<?php echo $roomcount;?>&rumid=<?php echo $details['roomid'];?>');">VIEW ROOM</a>-->
<a href='RoomDetails_dump.php?bf_id=<?php echo $bf_id;?>&bfrid=<?php echo $details['roomid'];?>&ppro_id=<?php echo $popup_res['ppro_id'];?>&room_id=<?php echo $roomid1;?>&arr=<?php echo $date;?>&room_id=<?php echo $details['room_id'];?>&avr=<?php echo $roomcount;?>&rumid=<?php echo $details['roomid'];?>' target="_parent">VIEW ROOM</a>
    </div>
  <div id="booh_buttion_11">
  <?php
  if($bb['newstop_sell']=='sold'||$bb['flag']=='enquiry'||$bb['flag']=='sold'){ ?>
<div id="booknow_text"><a href='' target="_blank"><img src="images/book-now-bu.png"></a></div>
<?php }else{ ?>
  <div id="booknow_text"><a href='DetailsPanel1.php?bf_id=<?php echo $bf_id;?>&bfrid=<?php echo $details['roomid'];?>&ppro_id=<?php echo $details['ppro_id'];?>&room_id=<?php echo $roomid1;?>&arr=<?php echo $date;?>&avr=<?php echo $avr;?>&minstay=<?php echo$details['minstay'];?>&book=<?php echo $book;?>&user_id=<?php echo $user_id;?>&region=<?php echo $region;?>'"><img src="images/book-now-bu.png"></a></div>
  <?php } ?>
  </div>
  </div>
 </td>
</tr>

</table>
</td>
<td width="83"  bgcolor="#c5c5c5">&nbsp;<b><?php echo $currency;?><?php echo $fullrate;?></b></td>
<?php
$which=0;
$index=0;
while($bf_data=mysql_fetch_array($sql1))
{
	
 $q2="select * from  wp_images where img_id='$imgid'";
 $r2=mysql_query($q2);
$res1=mysql_fetch_array($r2);
	      // $img_id=$res1['img_id'];
				 //$title=$res1['img_name'];
			 $img=$res1['thumb_img'];
	
	
	$which=$which + 1;
	
	?>
<!--<td width="30" bgcolor="#80E693"><?php echo $bf_data['newroomrate'];?></td>-->
<?php 
if($bf_data['flag']=='sold')
{?>
	 <td bgcolor="#e3e3e3" width="53px" height="61px"><center>
	<font  color="#FFFFFF"  size="-1"><?php echo "SOLD";?></font></center>
    </td>
    <?php }
	 else if($bf_data['newstop_sell']=='sold')
	 {?>
		<td bgcolor="#e3e3e3" width="53px" height="61px"><center>
	<font  color="#FFFFFF"  size="-1"><?php echo "SOLD";?></font></center>
    </td> 
	 <?php } 
	else if($bf_data['flag']=='enquiry')
	{?>
    
   <td bgcolor="#b7be00" width="53px" height="61px">
<a href="RoomDetails_dump.php?bf_id=<?php echo $bf_id;?>&bfrid=<?php echo $details['roomid'];?>&ppro_id=<?php echo $popup_res['ppro_id'];?>&room_id=<?php echo $roomid1;?>&arr=<?php echo $date;?>&avr=<?php echo $roomcount;?>&rumid=<?php echo $details['roomid'];?>"><font  color="#FFFFFF"><strong><?php  echo $bf_data['newroomrate'];?></strong></font></a>
<!--<font  color="#FFFFFF"><?php  echo $bf_data['newroomrate'];?> </font>-->
</td>
    <?php }
	else{?>    
    
		<td bgcolor="#<?php echo $bgcolor;?>" width="53px" height="61px">
	<a href="RoomDetails_dump.php?bf_id=<?php echo $bf_id;?>&bfrid=<?php echo $details['roomid'];?>&ppro_id=<?php echo $popup_res['ppro_id'];?>&room_id=<?php echo $roomid1;?>&arr=<?php echo $date;?>&avr=<?php echo $roomcount;?>&rumid=<?php echo $details['roomid'];?>" class="trigger<?php echo $outindex.$index; ?>" onMouseOver="doSomething(this,'<?php echo $rdata;?>','<?php echo $img;?>')"><font  color="#FFFFFF" ><strong><?php  echo $bf_data['newroomrate'];?></strong></font></a>
    	
   <!-- <font  color="#FFFFFF" ><?php  echo $bf_data['newroomrate'];?></font>-->
	<?php 	}
    ?> 
    </td>
    
	<?php

		 if($which == $maxpage)
		  {
			
			
			break; 
		  }						  
		  $index++;
		 }			
$outindex++;
}

}}


?>
</tr></table></div>




 