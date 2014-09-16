<html><head>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script><script type="text/javascript" src="js/char.js"></script>
<style>
.imgClass { 
    background-image:url(images/save-buttion.png);
    background-position:  0px 0px;
    background-repeat: no-repeat;
    width: 104px;
    height: 44px;
    border: 0px;

}
</style>
</head>

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
?>

<?php
$id=$_GET['id'];?>
<input type="hidden" name="ppd" value="<?php echo $id;?>">
<?php

$sql1=mysql_query("SELECT * FROM wp_channel WHERE ppro_id='$id'") or die(mysql_error());

 while($sql2=mysql_fetch_array($sql1))
{
	//echo $sql2['chaneldata'];
?>
<form method="post" action="wp_inclusions_update.php">
 <div id="inclusions_state_content_333">
    <div id="agovev3_background_2_22">
 
       <div class="agovev3_heading"><?php echo $sql2['chaneldata'];?>
             </div>

       </div>
       <?php 
	   $cid=$sql2['chanel_id'];
	  $sql3=mysql_query("SELECT * from wp_room_type_details WHERE chanel_id ='$cid'");
	  
	   ?>
      
      <div id="form_2">
      <div id="main_div_2">
         <?php 
		 while($rdata=  mysql_fetch_array($sql3))
  		 { 
   		   ?> 
          <div class="name_iniusoinc_inu">
      
    <?php   echo $rdata['name']; 
	          $id1=$rdata['roomid'];
			  $text=$rdata['description']?>
     </div>
     <input type="hidden" name="channelid[]" value="<?php echo $sql2['chanel_id'];?>"/>
    <input type="hidden" name="new_quantity[]" value="<?php echo $rdata['roomid'];?>"/>
      <textarea name="text[]" id="text" tabindex="1" class="textarea_2" style="width:300px;height:100px;"><?php echo $rdata['description'];?></textarea>
      <div class="name_iniusoinc_2_2" id="counter" >0 of 255 characters</div>               
      </div>    
        <?php } ?> 
                <div id="save_buttion">
<input type="submit"  name="SUBMIT" value="Save" class="imgClass"/>
</div> 
         <div id="inclusion_1"></div>  </div>   
 
    </div>
    </form>
	<?php 
    }
	 ?>
	
    
    
    
