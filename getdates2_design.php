<?php 
require_once('functions.php');
require_once('connection.php');
$user=new User(); 
$bf_id=$_REQUEST['bf_id'];
 $ppro_id=$_REQUEST['data2'];
 $bfrid=$_REQUEST['data3'];
$avr=$_REQUEST['data4'];
$property=mysql_query("SELECT * FROM wp_properties WHERE ppro_id='$ppro_id'");
$propertyname=mysql_fetch_array($property);
$grid=mysql_query("SELECT * FROM wp_general_settings"); 
$gridsettings=mysql_fetch_array($grid);
$griddays=$gridsettings['Griddaystoshow'];
$property1=mysql_query("SELECT * FROM wp_room_type_details WHERE ppro_id='$ppro_id' and roomid='$bfrid'");
$propertyname1=mysql_fetch_array($property1);?>
<?php 
$curntdate=Date("Y-m-d");
$datepic_pic=$_POST['data1'];  
$enddate=Date("Y-m-d", strtotime("+$griddays days"));

$page=$_GET['page'];
 if(!isset($page) || $page <= 0 || $page == "")
{
	$page=1; 					
 }

	
	$inventoory_qry="SELECT Distinct newgrid_date FROM `wp_room_inventory_grid_details` 
WHERE newgrid_date>='$datepic_pic'";
/*echo "SELECT Distinct newgrid_date FROM `wp_room_inventory_grid_details` 
WHERE newgrid_date>='$datepic_pic'";*/
/*$inventoory_qry="SELECT Distinct newgrid_date FROM `wp_room_inventory_grid_details` 
WHERE newgrid_date>='$curntdate'";*/
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
		
		 mysql_data_seek($sql1,($page-1) * $maxpage);
		?>
        <?php
		if($totalpages>1)
		{?>	
		<?php
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


 
   




<table id="main_tbody2" width="984" height="70px"   border="1" bordercolor="#fff" cellpadding="0" cellspacing="0">
<tr height="70"> 
 <td width="270" colspan="2" bgcolor="#21678b">&nbsp;<b> <font color="#FFFFFF" face="Verdana, Geneva, sans-serif" ><?php echo $propertyname['Name'];?></font><br /> <font color="#eaf3f7"> &nbsp;&nbsp;<?php echo $propertyname1['name'];?></font></b></td>
<!--<td bgcolor="#c5c5c5" width="50"><font color="#446f85" face="Tahoma, Geneva, sans-serif" size="-1" > FULL RATE</font></td>--><?php
 $whichrow=0;
//for($i=0; $i<=$griddays; $i++){ 
while($inventoory_grid_data=mysql_fetch_array($sql1))
{
	$whichrow=$whichrow + 1;
         ?>	

 <td bgcolor="#c5c5c5" width="50">&nbsp;<font  face="sintony,sans-serif" size="3px"  > <b>
<?php
//$d=$inventoory_grid_data["str_to_date(grid_date, '%d-%m-%Y')"];
	//$d=$inventoory_grid_data["newgrid_date"]; 
	//echo $ch=Date('D-d-M',strtotime($d));
	$d=$inventoory_grid_data['newgrid_date'];
	 $ch=Date('D d M',strtotime($d));
         echo $ch=strtoupper($ch);
	
?></b>
</font></td>
<?php
		 if($whichrow == $maxpage)
		  {
			
			break; 
		  }						  
		 }			

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
    <a href="roomnames_18_07_2013.php?page=<?php echo $pre?>&bf_id=<?php echo $bf_id;?>&ppro_id=<?php echo $ppro_id;?>&bfrid=<?php echo $bfrid;?>&avr=<?php echo $avr;?>" style="margin:20px 0px 0px 15px; color:#FFF;"> <font color="#FFFFFF" face="Verdana, Geneva, sans-serif" size="1"> <b>Previous <?php echo $griddays;?> Days</b></font></a>
    
   
				</div></td>
				
				
				<td width="50" bgcolor="#21678b" colspan="<?php echo  $span;?>">&nbsp; <font  color="#FFFFFF" face="Verdana, Geneva, sans-serif" size="1" style="padding:0px 0px 0px 12px"><b>FULL RATE</b></font>
				<?php	
				
				if($page < $totalpages)
				{
				$next = (int)$page + 1;?>
				<div style=" background:#21678b; width:120px; height:30px; -webkit-border-radius:15px; -moz border-radius:15px; -0-border-radius:15px; border-radius:0px; float:right; margin:0px 0px 0px 0px;" >
				  <a href="roomnames_18_07_2013.php?page=<?php echo $next?>&bf_id=<?php echo $bf_id;?>&ppro_id=<?php echo $ppro_id;?>&bfrid=<?php echo $bfrid;?>&avr=<?php echo $avr;?>" style="margin:20px 0px 0px 30px; color:#FFF;" ><font color="#FFFFFF" face="Verdana, Geneva, sans-serif" size="1"> <b>Next <?php echo $griddays;?> Days</b></font></a></div></td>
				<?php			
			}
			
		}else{
			
			//$pre = (int)$page - 1;
			?>
			<td colspan="1"></td>
			<td width="50" bgcolor="#21678b" colspan="<?php echo  $span;?>">&nbsp; <font  color="#FFFFFF" face="Verdana, Geneva, sans-serif" size="1" style="padding:0px 0px 0px 12px"><b>FULL RATE</b></font>
			<?php	
			
			//if($page < $totalpages)
			//{
				$next = (int)$page + 1;?>
				<div style=" background:#21678b; width:120px; height:30px; -webkit-border-radius:15px; -moz border-radius:15px; -0-border-radius:15px; border-radius:0px; float:right; margin:0px 0px 0px 0px;" >
				<a href="roomnames_18_07_2013.php?page=<?php echo $next?>&bf_id=<?php echo $bf_id;?>&ppro_id=<?php echo $ppro_id;?>&bfrid=<?php echo $bfrid;?>&avr=<?php echo $avr;?>" style="margin:20px 0px 0px 30px; color:#FFF;" ><font color="#FFFFFF" face="Verdana, Geneva, sans-serif" size="1"> <b>Next <?php echo $griddays;?> Days</b></font></a></div></td>
				
<?php 
			//}
		} 
		
		
} ?>
</div>
 
 

</tr>
<?php
 $dquery="SELECT * FROM wp_rooms WHERE ppro_id='$ppro_id' and roomid='$bfrid'";
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
$url=$details['link'];
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

			    

 
echo $page=$_GET['page'];


$bf_qry="SELECT * FROM wp_room_inventory_grid_details WHERE ppro_id='$ppro_id' AND roomid='$bfrid' and room_id='$roomid1' and newgrid_date>='$datepic_pic'";
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
  
  <div id="book_now_buttion">
  <div id="viewroom_text">
  <?php $days=mysql_query("SELECT newstop_sell FROM `wp_room_inventory_grid_details` 
WHERE newgrid_date>='$curntdate'and  room_id='$roomid1' and newstop_sell='sold'");

$no_stopsell=mysql_num_rows($days);

/*if($no_stopsell)
{ 
echo "<b>Not Avilable</b>";}
else{*/?>
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


<a href='<?php echo $url;?>' target="_blank">VIEW ROOM</a>



<!--<a href='RoomDetails_dump.php?bf_id=<?php echo $bf_id;?>&bfrid=<?php echo $details['roomid'];?>&ppro_id=<?php echo $popup_res['ppro_id'];?>&room_id=<?php echo $roomid1;?>&arr=<?php echo $date;?>&room_id=<?php echo $details['room_id'];?>&avr=<?php echo $roomcount;?>&rumid=<?php echo $details['roomid'];?>' target="_parent">VIEW ROOM</a>-->
    </div>
  <div id="booh_buttion_11">
  <div id="booknow_text"><a href='DetailsPanel1.php?bf_id=<?php echo $bf_id;?>&bfrid=<?php echo $details['roomid'];?>&ppro_id=<?php echo $details['ppro_id'];?>&room_id=<?php echo $roomid1;?>&arr=<?php echo $date;?>&avr=<?php echo $roomcount;?>&minstay=<?php echo$details['minstay'];?>'"><img src="images/book-now-bu.png"></a></div>
  
  </div>
  </div>
  <?php // }?></td>
</tr>

</table>
</td>
<td width="83"  bgcolor="#c5c5c5">&nbsp;<b>AUS $<?php echo $fullrate;?></b></td>
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
	 <td bgcolor="#e3e3e3" width="50"><center>
	<font  color="#FFFFFF"  size="-1"><?php echo "SOLD";?></font></center>
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
<a href="RoomDetails_dump.php?bf_id=<?php echo $bf_id;?>&bfrid=<?php echo $details['roomid'];?>&ppro_id=<?php echo $popup_res['ppro_id'];?>&room_id=<?php echo $roomid1;?>&arr=<?php echo $date;?>&avr=<?php echo $roomcount;?>&rumid=<?php echo $details['roomid'];?>"><font  color="#FFFFFF"><?php  echo $bf_data['newroomrate'];?></font></a>
<!--<font  color="#FFFFFF"><?php  echo $bf_data['newroomrate'];?> </font>-->
</td>
    <?php }
	else{?>    
    
		<td bgcolor="#15a42e" width="50">
	<a href="RoomDetails_dump.php?bf_id=<?php echo $bf_id;?>&bfrid=<?php echo $details['roomid'];?>&ppro_id=<?php echo $popup_res['ppro_id'];?>&room_id=<?php echo $roomid1;?>&arr=<?php echo $date;?>&avr=<?php echo $roomcount;?>&rumid=<?php echo $details['roomid'];?>" class="trigger<?php echo $outindex.$index; ?>" onMouseOver="doSomething(this,'<?php echo $rdata;?>','<?php echo $img;?>')"><font  color="#FFFFFF" ><?php  echo $bf_data['newroomrate'];?></font></a>
    	
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

}


?>
</tr></table></div>




 