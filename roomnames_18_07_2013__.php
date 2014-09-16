<?php 
require_once('functions.php');
require_once('connection.php');
$user=new User(); 
$bf_id=$_REQUEST['bf_id'];
$ppro_id=$_REQUEST['ppro_id'];
$bfrid=$_REQUEST['bfrid'];
$avr=$_REQUEST['avr'];
$property=mysql_query("SELECT * FROM wp_properties WHERE ppro_id='$ppro_id'");
$propertyname=mysql_fetch_array($property);
$grid=mysql_query("SELECT * FROM wp_general_settings"); 
$gridsettings=mysql_fetch_array($grid);
$griddays=$gridsettings['Griddaystoshow'];
$property1=mysql_query("SELECT * FROM wp_room_type_details WHERE ppro_id='$ppro_id' and roomid='$bfrid'");
$propertyname1=mysql_fetch_array($property1);?>
<html>
<head>
<style type="text/css">
      body {
        margin: 0;
        padding: 0;
        font-family: Arial, Helvetica, sans-serif;
        background: #000 url(bg-texture.png) repeat;
        color: #dddddd;
      }
      
      h1, h3 {
        margin: 0;
        padding: 0;
        font-weight: normal;
      }
      
      a {
        color: #EB067B;
      }
      
      #container {
        width: 100px;
        margin: 100px auto 0 auto;
        padding: 20px;
        background: #000;
        border: 1px solid #1a1a1a;
      }
      
      /* HOVER STYLES */
      #pop-up {
        display: none;
        position: absolute;
        width: 200px;
        padding: 10px;
        background: #eeeeee;
        color: #000000;
        border: 1px solid #009;
        font-size: 90%;
		-webkit-border-radius:10px;
	moz border radius:10px;
	border-radius:10px;
	-0-border-radius:10px;
      }
    </style>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.0/jquery.min.js"></script>
    <script type="text/javascript">
	
    function doSomething(obj,data,img){
	$('#pop-up').empty();
    //alert(desc);
	  $(function() {
        var moveLeft = 20;
        var moveDown = 10;
        //var description=data+"\n"+desc;
        $('a '+obj.id).hover(function(e) {
          $('#pop-up').show( function(e){
			  			$('#pop-up').empty();
						//$('#pop-up').text("");
						  $('#pop-up').append('<strong>'+data+'</strong>'+'<hr><br><img src="'+img+'"/>');
						
		  });
        }, function() {
           
			$('#pop-up').hide();
			
        });
        
        $('a '+obj.id).mousemove(function(e) {
          $("#pop-up").css('top', e.pageY + moveDown).css('left', e.pageX + moveLeft);
        });
        
      });
	  }
    </script>
<script type="text/javascript">
	
   /*  function doSomething(obj,img){
	$('#pop-up').empty();

	  $(function() {
        var moveLeft = 20;
        var moveDown = 10;
        var description=data+"\n"+desc;
        $('a '+obj.id).hover(function(e) {
          $('#pop-up').show( function(e){
			  			//$('#pop-up').empty();
						  //$('#pop-up').text(description);
				$('#pop-up').append('<img src='+img+'/>');		  
						 
		  });
        }, function() {
           
			$('#pop-up').hide();
			
        });
        
        $('a '+obj.id).mousemove(function(e) {
          $("#pop-up").css('top', e.pageY + moveDown).css('left', e.pageX + moveLeft);
        });
        
      });
	  }*/
	
    </script>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>fitow</title>
<link href="css/login.css" rel="stylesheet" type="text/css" />
  
		<link href="http://static.scripting.com/github/bootstrap2/css/bootstrap.css" rel="stylesheet">
		<script src="http://static.scripting.com/github/bootstrap2/js/jquery.js"></script>
		<script src="http://static.scripting.com/github/bootstrap2/js/bootstrap-transition.js"></script>
		<script src="http://static.scripting.com/github/bootstrap2/js/bootstrap-modal.js"></script>
 
        <style>
 .underline {
    text-decoration:line-through;
}
 </style>
<script>
  var dateToday = new Date();

$(function() {
	
    $( "#picker1" ).datepicker({
        showButtonPanel: true,
        minDate: dateToday,
		dateFormat:"mm-dd-yy"
    });
});
$(function() {
    $( "#picker3" ).datepicker({
        showButtonPanel: true,
        minDate: dateToday,
		dateFormat:"mm-dd-yy"
    });
});
  </script>
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css" />
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>fitow</title>
<link href="css/bokkingform1.css" rel="stylesheet" type="text/css" />
<link href="css/main.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="main1">
<div id="logo_main" style="display:none;">
<div id="logo_image"></div>
<div id="text_image"></div>
</div>
<div id="menu_bar" style="display:none;">
<div id="menu_text"><font face="Arial, Helvetica, sans-serif" color="#eceff1" size="-1"><b>HOME >><?php echo $propertyname['Name'];?> >></font> <?php echo $propertyname1['name'];?></b></div>
</div>
<div style="width:1024px;">         
<div id="main_content">
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
<div class="start_date_text">START DATE</div>
<div class="start_button"><h6 style="margin-top:10px; margin-left:20px;"><?php echo $cdate;?></h6></div>
</div>

<?php 
$curntdate=Date("Y-m-d");
$enddate=Date("Y-m-d", strtotime("+$griddays days"));
if($gridsettings['ShowTitle']!='')
 {?>
<?php
 }
$page=$_GET['page'];
 if(!isset($page) || $page <= 0 || $page == "")
{
	$page=1; 					
 }
if($ppro_id!='' && $avr!='')
{
	
	$inventoory_qry="SELECT Distinct newgrid_date FROM `wp_room_inventory_grid_details` 
WHERE newgrid_date>='$curntdate'";
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
      <div style="width:120px; float:left; background:#21678b; width:130px; height:30px; -webkit-border-radius:15px; -moz border-radius:15px; -0-border-radius:15px; border-radius:0px; margin:0px 0px 0px 30px; ">
    <a href="roomnames_18_07_2013.php?page=<?php echo $pre?>&bf_id=<?php echo $bf_id;?>&ppro_id=<?php echo $ppro_id;?>&bfrid=<?php echo $bfrid;?>&avr=<?php echo $avr;?>" style="margin:20px 0px 0px 15px; color:#FFF;"> <b>Previous <?php echo $griddays;?> Days</b></a>
    </div>
          <?php	
	     } 
	     if($page < $totalpages)
	    {
		    $next = (int)$page + 1;?>
            <div style=" background:#21678b; width:130px; height:30px; -webkit-border-radius:15px; -moz border-radius:15px; -0-border-radius:15px; border-radius:0px; float:right;" >
            <a href="roomnames_18_07_2013.php?page=<?php echo $next?>&bf_id=<?php echo $bf_id;?>&ppro_id=<?php echo $ppro_id;?>&bfrid=<?php echo $bfrid;?>&avr=<?php echo $avr;?>" style="margin:20px 0px 0px 30px; color:#FFF;" > <b>Next <?php echo $griddays;?> Days</b></a></div>
       <?php
	    }
	  }  ?>
</div>


 
   




<table width="984" height="70px"   border="1" bordercolor="#fff" cellpadding="0" cellspacing="0">
<tr height="70"> 
 <td width="270" bgcolor="#21678b">&nbsp;<b> <font color="#FFFFFF" face="Verdana, Geneva, sans-serif" ><?php echo $propertyname['Name'];?></font><br /> <font color="#eaf3f7"> &nbsp;&nbsp;<?php echo $propertyname1['name'];?></font></b></td>
<td bgcolor="#c5c5c5" width="50"><font color="#446f85" face="Tahoma, Geneva, sans-serif" size="-1" > FULL RATE</font></td><?php
 $whichrow=0;
//for($i=0; $i<=$griddays; $i++){ 
while($inventoory_grid_data=mysql_fetch_array($sql1))
{
	$whichrow=$whichrow + 1;
         ?>	

 <td bgcolor="#c5c5c5" width="50" ALIGN="CENTER">&nbsp;<font color="#446f85" face="Tahoma, Geneva, sans-serif" size="-1" > 
<?php
//$d=$inventoory_grid_data["str_to_date(grid_date, '%d-%m-%Y')"];
	//$d=$inventoory_grid_data["newgrid_date"]; 
	//echo $ch=Date('D-d-M',strtotime($d));
	$d=$inventoory_grid_data['newgrid_date'];
	echo $ch=Date('D d M',strtotime($d));
	
?>
</font></td>
<?php
		 if($whichrow == $maxpage)
		  {
			
			break; 
		  }						  
		 }			

?>
</tr>

<?php
 $dquery="SELECT * FROM wp_rooms WHERE ppro_id='$ppro_id' and roomid='$bfrid'";
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

			    

 if($gridsettings['ShowTitle']!='')
 {?>
<?php
 }
$page=$_GET['page'];
 if(!isset($page) || $page <= 0 || $page == "")
{
	$page=1; 					
 }
if($ppro_id!='' && $avr!='')
{
$bf_qry="SELECT * FROM wp_room_inventory_grid_details WHERE ppro_id='$ppro_id' AND roomid='$bfrid' and room_id='$roomid1' and newgrid_date>='$curntdate'";
$sql1= mysql_query($bf_qry) or die(mysql_error());
				
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
    <!--  <div style="width:120px; float:left; background:#960; width:130px; height:30px; -webkit-border-radius:15px; -moz border-radius:15px; -0-border-radius:15px; border-radius:15px; margin:0px 0px 0px 30px; ">
    <a href="roomnames.php?page=<?php echo $pre?>&bf_id=<?php echo $bf_id;?>&ppro_id=<?php echo $ppro_id;?>&bfrid=<?php echo $bfrid;?>&avr=<?php echo $avr;?>" style="margin:20px 0px 0px 15px; color:#FFF;"> <b>Previous <?php echo $griddays;?> </b></a>
    </div>-->
          <?php	
	     } 
	     if($page < $totalpages)
	    {
		    $next = (int)$page + 1;?>
           <!-- <div style=" background:#960; width:130px; height:30px; -webkit-border-radius:15px; -moz border-radius:15px; -0-border-radius:15px; border-radius:15px; float:right;" >
            <a href="roomnames.php?page=<?php echo $next?>&bf_id=<?php echo $bf_id;?>&ppro_id=<?php echo $ppro_id;?>&bfrid=<?php echo $bfrid;?>&avr=<?php echo $avr;?>" style="margin:20px 0px 0px 30px; color:#FFF;" > <b>Next <?php echo $griddays;?> </b></a></div>-->
       <?php
	    }
	  }  ?>
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
  <div id="nbmber"><div id="nbmber_text"><a href="RoomDetails_dump.php?bf_id=<?php echo $bf_id;?>&bfrid=<?php echo $details['roomid'];?>&ppro_id=<?php echo $popup_res['ppro_id'];?>&room_id=<?php echo $roomid1;?>&arr=<?php echo $date;?>&avr=<?php echo $roomcount;?>&rumid=<?php echo $details['roomid'];?>"  class="trigger"> <font color="#FFFFFF"><?php echo $rdata;?></font></a></div></div>
  
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



    <!--<a href="JavaScript:newPopup('RoomDetails_dump.php?bf_id=<?php echo $bf_id;?>&bfrid=<?php echo $details['roomid'];?>&ppro_id=<?php echo $popup_res['ppro_id'];?>&room_id=<?php echo $roomid1;?>&arr=<?php echo $date;?>&room_id=<?php echo $details['room_id'];?>&avr=<?php echo $roomcount;?>&rumid=<?php echo $details['roomid'];?>');">VIEW ROOM</a>-->
<!--<a href='RoomDetails_dump.php?bf_id=<?php echo $bf_id;?>&bfrid=<?php echo $details['roomid'];?>&ppro_id=<?php echo $popup_res['ppro_id'];?>&room_id=<?php echo $roomid1;?>&arr=<?php echo $date;?>&room_id=<?php echo $details['room_id'];?>&avr=<?php echo $roomcount;?>&rumid=<?php echo $details['roomid'];?>' target="_parent">VIEW ROOM</a>-->
<a href='<?php echo $url;?>' target="_blank">VIEW ROOM</a> </div>
  <div id="booh_buttion_11">
  <div id="booknow_text"><a href='DetailsPanel1.php?bf_id=<?php echo $bf_id;?>&bfrid=<?php echo $details['roomid'];?>&ppro_id=<?php echo $details['ppro_id'];?>&room_id=<?php echo $roomid1;?>&arr=<?php echo $date;?>&avr=<?php echo $roomcount;?>&minstay=<?php echo$details['minstay'];?>'"><img src="images/book-now-bu.png"></a></div>
  
  </div>
  </div>
  <?php // }?></td>
</tr>

</table>
</td>
<td width="83"  bgcolor="#c5c5c5">&nbsp;AUS $<?php echo $fullrate;?></td>
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
 </td>
    <?php }
	else{?>    
    
		<td bgcolor="#15a42e" width="50">
	<a href="RoomDetails_dump.php?bf_id=<?php echo $bf_id;?>&bfrid=<?php echo $details['roomid'];?>&ppro_id=<?php echo $popup_res['ppro_id'];?>&room_id=<?php echo $roomid1;?>&arr=<?php echo $date;?>&avr=<?php echo $roomcount;?>&rumid=<?php echo $details['roomid'];?>" class="trigger<?php echo $outindex.$index; ?>" onMouseOver=""><font  color="#FFFFFF" ><?php  echo $bf_data['newroomrate'];?></font></a>	
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

}
?>
</tr></table></div>
<!--
<table>
<tr bgcolor="#21678b" height="20">
<tr  height="20">
<!--<td id="menu_text">
<td width="1024"><h2><?php echo $propertyname['Name'];?></h2></td>

</tr>
<tr>
<td><font family="400 14px/1.8em, Arial, sans-serif" color="#757575" size="-1"><?php echo  $propertyname['addr1'];?></font></td>
</tr>
<tr>
<td><font family="400 14px/1.8em, Arial, sans-serif" color="#757575" size="-1"><?php echo  $propertyname['addr2'];?></font></td>
</tr>
<tr>
<td><font family="400 14px/1.8em, Arial, sans-serif" color="#757575" size="-1"><?php echo  $propertyname['ds'];?></font></td>
</tr>
</table>
--></div></div>
<!-- Button to trigger modal -->

 
<!-- Modal -->
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel"><?php echo $rdata;?></h3>
  </div>
  <div class="modal-body">
 	<h3 id="myModalLabel"> Description:</h3><hr>
    <p><?php echo $popup_des;?></p>
    <h3 id="myModalLabel">Features:</h3><hr> 
    <p><?php echo $popup_featured;?></p>
    <h3 id="myModalLabel">Enquiry Form:</h3><hr>
    <p>
    <table>
    <tr><td>Name:</td><td><input type="text" name="bname"></td></tr>
    <tr><td>mail_id:</td><td><input type="text" name="bmail"></td></tr>
    <tr><td>Phone Number:</td><td><input type="text" name="bphone"></td></tr>
    <tr><td>check_in_date:</td><td><input type="text" name="bindate"></td></tr>
    <tr><td>check_out_date:</td><td><input type="text" name="boutdate"></td></tr>
    <tr><td> Your Message:</td><td><textarea rows="4" cols="5"></textarea></td></tr>
     <tr><td> </td><td><center><input type="submit" name="send" value="send"></center></td></tr></table></p>
    
  </div>
  <div class="modal-footer">
   <!-- <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    <button class="btn btn-primary">Save changes</button>-->
  </div>
</div>		


 <div id="pop-up">

 </div> 
 
 
</body></html>