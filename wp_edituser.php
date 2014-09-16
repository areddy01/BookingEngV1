<?php
@session_start();
if(!isset($_SESSION['userName'])) 
{
header('location:login.php');
}
require_once('functions.php');
require_once('connection.php');
$user=new User();
$user_id=$_REQUEST['uid'] ;
$sql=mysql_query("SELECT * FROM wp_manage_user where id='$user_id'");
$data=mysql_fetch_array($sql);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>fitow</title>
<link href="css/login.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/style.css" media="all" />
<script type="text/javascript" src="http://ajax.googleapis.com/
ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript" src="js/properties.js"></script>
<script type="text/javascript" src="js/properties.js"></script>
<script language="javascript">
        function addRow(tableID) {
        alert();
 
            var table = document.getElementById(tableID);
 
            var rowCount = table.rows.length;
            var row = table.insertRow(rowCount);
 
            var colCount = table.rows[0].cells.length;
 
            for(var i=0; i<colCount; i++) {
 
                var newcell = row.insertCell(i);
 
                newcell.innerHTML = table.rows[0].cells[i].innerHTML;
                //alert(newcell.childNodes);
                switch(newcell.childNodes[0].type) {
                    case "text":
                            newcell.childNodes[0].value = "";
                            break;
                    case "checkbox":
                            newcell.childNodes[0].checked = false;
                            break;
                    case "select-one":
                            newcell.childNodes[0].selectedIndex = 0;
                            break;
                }
            }
        }
 
        function deleteRow(tableID) {
            try {
            var table = document.getElementById(tableID);
            var rowCount = table.rows.length;
 
            for(var i=0; i<rowCount; i++) {
                var row = table.rows[i];
                var chkbox = row.cells[0].childNodes[0];
                if(null != chkbox && true == chkbox.checked) {
                    if(rowCount <= 1) {
                        alert("Cannot delete all the rows.");
                        break;
                    }
                    table.deleteRow(i);
                    rowCount--;
                    i--;
                }
 
 
            }
            }catch(e) {
                alert(e);
            }
        }
 
    </script




</head>
<body>
<div  id="new">
 NEW USER
</div>
<!-- Form Code Start -->

<div  class="form">
<form id="signupForm"  method='post'  name='form' action="wp_userupdate.php" onsubmit="return validate(this);">
<p class="contact"><label for="name">FirstName:</label></p>
<input type='hidden' name='user' id='user' required=" " maxlength="50" value="<?php echo $user_id;?>" />
    <input type='text' name='fname' id='fname' required=" " maxlength="50" value="<?php echo $data['firstname'];?>" />
    <p class="contact"><label for="name">LastName:</label></p>
    <input type='text' name='lname' id='lname' required=" " maxlength="50" value="<?php echo $data['lastname'];?>" />
    <p class="contact"><label for="name">UserName:</label></p>
    <input type='text' name='uname' id='uname' required=" " maxlength="50"  value="<?php echo $data['username'];?>"/>
    <p class="contact"><label for="name">New Password:</label></p>
    <input type='password' name='pwd' id='pwd' required=" " maxlength="50"  />
    <p class="contact"><label for="name">ConformPassword:</label></p>
    <input type='password' name='cpwd' id='cpwd' required=" " maxlength="50"  />
    <p class="contact"><label for="name">Role:</label></p>
    <!--<input type='text' name='role' id='name' required=" " maxlength="50"  />-->
    <select name='role' id='name' required=" ">
     <option <?php if($data['roles']=="Super Admin"){?> selected="selected" <?php } ?> >Super Admin</option>
    <option <?php if($data['roles']=="User"){?> selected="selected" <?php } ?>>User</option></select>
    <p class="contact"><label for="name">Email:</label></p>
    <input type='text' name='email' id='email' required=" " maxlength="50" value="<?php echo $data['email'];?>" />
     <p class="contact"><label for="name">Manage Propertys:</label></p>
     <div id="manage" style="width:850px;">
      <div id="div_add_more_child_product" >
     <?php

     /*$qry=mysql_query("SELECT wp_properties.ppro_id,wp_properties.Name, wp_properties.region_id,wp_properties.city_id,wp_room_type_details.roomid,wp_room_type_details.name,wp_rooms.room_id,wp_rooms.roomname FROM wp_properties
LEFT JOIN wp_room_type_details ON wp_room_type_details.ppro_id = wp_properties.ppro_id
LEFT JOIN wp_rooms ON wp_rooms.ppro_id = wp_room_type_details.ppro_id where wp_properties.user_id='$user_id' and wp_room_type_details.user_id='$user_id' and  wp_rooms.user_id='$user_id'");*/
$qry=mysql_query("select * from wp_manage_mappings where user_id='$user_id'");
$cnt=mysql_num_rows($qry);
 for($i=1;$i<=$cnt;$i++)
 {
 
if($i==$cnt)
 {
 $varible.=$i;
 }
 else
 {
  $varible.=$i.',';
 }
}

  ?>
               <input type="hidden" name="count" id="count" value="<?php echo $varible;?>">
          <input type="hidden" name="count1" id="count1" value="<?php echo $varible;?>">
             
<?php  $i=1;
while($row=mysql_fetch_array($qry)){
$region=$row['region_id'];
$city=$row['city_id'];
 $ppro_id=$row['ppro_id'];

 $roomid=$row['roomid'];

 $room_id=$row['room_id'];



$result = mysql_query("SELECT *  FROM wp_citys")
or die(mysql_error());
?>           
               <div id="div_add_more_child_product_<?php echo $i;?>">
             
              <select id="select_<?php echo $i;?>" name="select_<?php echo $i;?>" onChange="changeP(this.value,<?php echo $i;?>)" style="width:150px; height:27px;">
              <option selected="selected">Region</option>
              <?php
              
         while($row1 = mysql_fetch_array($result))
        {
         $city_id= $row1['city_id'];
          ?>
          <option <?php  if($row['city_id']==$row1['city_id']){?> selected="selected" <?php } ?> value="<?php echo $row1['city_id'];?>"><?php echo $row1['city_name'];?></option>
  
          <?php
           $sqry=mysql_query("SELECT *  FROM wp_region where city_id=$city_id order by region_name")or die(mysql_error());
       
             while($row12 = mysql_fetch_array($sqry))
             {?>
             <option <?php if($row['region_id']==$row12['region_id']){?> selected="selected" <?php } ?> value="<?php echo $row12['region_id'];?>-<?php echo $row1['city_id'];?>">.....<?php echo $row12['region_name'];?></option>
          <?php }

       } ?>
     </select>
    
   <select name="ppro_id_<?php echo $i;?>"  id="ppro_id_<?php echo $i;?>" onChange="changeR(this.value,<?php echo $i;?>)" style="width:150px; height:27px;" >
    
<?php 

 $vvvv=mysql_query("SELECT ppro_id,Name FROM wp_properties where ppro_id='$ppro_id'");
$rr=mysql_fetch_array($vvvv);
?>
<option value="<?php echo $rr['ppro_id'];?>" selected="selected" ><?php echo $rr['Name'];?></option>
  </select>
 <?php 

 $vvv=mysql_query("SELECT roomid,name FROM wp_room_type_details where roomid='$roomid'");
$r=mysql_fetch_array($vvv);
?>
    <select name='roomtype_<?php echo $i;?>' id='roomtype_<?php echo $i;?>' onChange="changeRR(this.value,<?php echo $i;?>)" style="width:150px; height:27px;">
     <option value="<?php echo $r['roomid'];?>" selected="selected" ><?php echo $r['name'];?></option>
   </select>
  <?php 

 $vv=mysql_query("SELECT room_id,roomname FROM wp_rooms where room_id='$room_id'");
$rdata=mysql_fetch_array($vv);
?>
 <select name='room_<?php echo $i;?>' id='room_<?php echo $i;?>'style="width:150px; height:27px;" >
     <option value="<?php echo $rdata['room_id'];?>" selected="selected" ><?php echo $rdata['roomname'];?></option>
   </select>
  
<img height="14" width="14" title="Add Property" onclick="javascript:AddMoreChildProduct(<?php echo $i;?>)"; alt="Add" src="images/plus.png">
<img height="14" width="14" title="Delete Property" onclick="javascript:RemoveMoreChildProduct(<?php echo $i;?>)"; alt="Add" src="images/minus.png">

</div>


<?php
    $i++;
     } ?>
     </div></div>
    
     <p class="contact"><label for="name"><input class="button" type="submit"  name="UPDATE" value="UPDATE"  />
     </label></p>
     </form>
</div>


</body>
</html>