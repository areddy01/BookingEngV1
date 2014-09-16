<?php 
ob_start();
@session_start();
require_once('functions.php');
require_once('connection.php');
@session_start();
$user=new User();?>
<?php 
$id=$_REQUEST['regionid'];
$dynaminid=$_REQUEST['id'];
$ppro_id=$_REQUEST['ppro_id'];
$roomid=$_REQUEST['roomtype'];
if($id){
$parts = explode("-",$id);
$one=$parts[0];
$two=$parts[1];
//$three=$parts[2];
 if($one && $two )
 {
 
 $vvvv=mysql_query("SELECT * FROM wp_properties where city_id='$two' and region_id='$one'");
  
 }
 else
 { 
  
  $vvvv=mysql_query("SELECT * FROM wp_properties where city_id='$one'");
 
  } 
  ?>       
        
              <select id="ppro_id_<?php echo $dynaminid;?>" name="ppro_id_<?php echo $dynaminid;?>" onChange="changeR(this.value,<?php echo $dynaminid;?>)" style="width:150px; height:27px;">
              <option>--Pick a Property--</option>
              <?php
            while($row = mysql_fetch_array($vvvv))
           {
           
          ?>
           <option value="<?php echo $row['ppro_id'];?>" > <?php echo $row['Name'];?> </option>
  
        <?php } 
        ?>
		</select>
		<?php } ?>
		<?php
		if($ppro_id)
		{
		$rommtype=mysql_query("SELECT roomid,name,ppro_id FROM wp_room_type_details WHERE ppro_id='$ppro_id'");
		
		
		?>
		<select id="roomtype_<?php echo $dynaminid;?>" name="roomtype_<?php echo $dynaminid;?>" onChange="changeRR(this.value,<?php echo $dynaminid;?>)" style="width:150px; height:27px;">
              <option>--Pick a Roomtype--</option>
              <?php
            while($row1 = mysql_fetch_array($rommtype))
           {
            
          ?>
           <option value="<?php echo $row1['roomid'];?>"> <?php echo $row1['name'];?> </option>
  
        <?php } 
        ?>
		</select>
		
		<?php
		}
		?>
		
		<?php
		if($roomid)
		{
		$room=mysql_query("SELECT room_id,roomname FROM wp_rooms WHERE roomid='$roomid'");
		
		
		?>
		<select id="room_<?php echo $dynaminid;?>" name="room_<?php echo $dynaminid;?>" style="width:150px; height:27px;">
              <option>--Pick a Room--</option>
              <?php
            while($row11 = mysql_fetch_array($room))
           {
           
          ?>
           <option value="<?php echo $row11['room_id'];?>" > <?php echo $row11['roomname'];?> </option>
  
        <?php } 
        ?>
		</select>
		
		<?php
		}
		?>
		