<?php 
ob_start();
@session_start();
require_once('functions.php');
require_once('connection.php');
@session_start();
$user=new User();?>
<?php 
$id=$_REQUEST['id'];
$parts = explode("-",$id);
$one=$parts[0];
$two=$parts[1];
$three=$parts[2];
 if($one && $two && $three)
 {
  if($three == '1')
  {
 $vvvv=mysql_query("SELECT * FROM wp_properties where city_id='$two' and region_id='$one'");
   }
   else 
   {
   $vvvv=mysql_query("SELECT distinct wp_properties.ppro_id,wp_properties.Name,wp_manage_mappings.ppro_id,wp_manage_mappings.city_id,wp_manage_mappings.region_id FROM wp_properties left join wp_manage_mappings on wp_properties.ppro_id=wp_manage_mappings.ppro_id where wp_manage_mappings.city_id='$two' and wp_manage_mappings.region_id='$one' and wp_manage_mappings.user_id='$three'");
    
   }
 }
 else
 { 
 if ($two =='1')
 { 
  
  $vvvv=mysql_query("SELECT * FROM wp_properties where city_id='$one'");
  }
  else
  {
   $vvvv=mysql_query("SELECT distinct wp_properties.ppro_id,wp_properties.Name,wp_manage_mappings.ppro_id,wp_manage_mappings.city_id,wp_manage_mappings.region_id FROM wp_properties left join wp_manage_mappings on wp_properties.ppro_id=wp_manage_mappings.ppro_id where wp_manage_mappings.city_id='$one' and wp_manage_mappings.user_id='$two'");
  }
  } 
  ?>       
        
              <select id="select02" name="ppro_id">
               <option selected="selected">--Located Properties--</option>
              <?php
            while($row = mysql_fetch_array($vvvv))
           {
            $r1=$row['ppro_id'];
	       $select="";
            if($sele==$r1)
             {

               $select="selected='selected'";	
	         }
          ?>
           <option value="<?php echo $row['ppro_id'];?>"<?php echo $select; ?> > <?php echo $row['Name'];;?> </option>
  
        <?php } 
        ?>
		</select>