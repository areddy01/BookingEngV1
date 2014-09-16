<?php
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
 if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty( $_POST['sele'] )) 
{
	$sele=$_REQUEST['sele'];
	$_SESSION['sele']=$sele;
} 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>fitow</title>
<link href="css/login.css" rel="stylesheet" type="text/css" />
<link href="css/logout.css" rel="stylesheet" type="text/css" />
<link href="css/inclusions.css" rel="stylesheet" type="text/css" />
<link href="css/mappings.css" rel="stylesheet" type="text/css"  />
<script src="http://code.jquery.com/jquery-1.8.3.min.js" type="text/javascript"></script>
   <script  type="text/javascript" src="js/mappings.js"></script>
   <script type="text/javascript" src="js/jquery.js"></script> 
   <script type="text/javascript" src="js/jquery.validate.js"></script> 
   <script type="text/javascript" src="js/jquery.form.js"></script> 
<script type="text/javascript" src="js/login.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript">
  $('document').ready(function(){

			$('#form2').validate({
                            
                       submitHandler: function(form){
                      $(form).ajaxSubmit({
        target: '#content1'
        
    }); 
			
                    }
                
            })
            $('#form1').validate({
                            
                       submitHandler: function(form){
                      $(form).ajaxSubmit({
        target: '#content1'
        
    }); 
			
                    }
                
            })
            $('#thisForm').validate({
                            
                       submitHandler: function(form){
                      $(form).ajaxSubmit({
        target: '#content1'
        
    }); 
			
                    }
                
            })
						
        });
		
 
</script>
<link href="css/main.css" rel="stylesheet" type="text/css" /></head>

<body>
<div id="Propertish_page_css">
<div id="logo_main">
<div id="logo_image"></div>
<div id="text_image"></div>
</div>
<div id="menu_bar">
<div id="menu_text"></div>
</div> 
       <a href="#" class="login_btn"><span><?php echo $_SESSION['user'] ?></span><div class="triangle"></div></a>          
                <div id="login_box">
                 <div id="tab"></div>
                   <div id="login_box_content"></div>
                     <div id="login_box_content">
                        <form id="login_form" action="logout.php">
                         <input  type="submit" name="logout" value="LOGOUT" />
                        </form>
                    </div>
                </div>
         
       

<form id="selfrm" name="frm" action="" method="post">
<?php
 
$result = mysql_query("SELECT * FROM wp_properties")
or die(mysql_error());
?><div id="currenty_managing">
<div id="text_currenty_managing">Currenty Managing</div>
<div id="select_box">
<select id="select_1" name="sele" onChange="this.form.submit();" >

<?php
while($row = mysql_fetch_array($result))
{
   $r1=$row['ppro_id'];
	$select="";
if($sele==$r1)
{

   $select="selected='selected'";	
	}
?>
   <option value="<?php echo $row['ppro_id'];?>"<?php echo $select; ?> > <?php echo $row['Name'];;?> </option>
  
<?php } ?>
</select>
</div></div>
</form></div>



<div id="main_content">
<div id="navigation">
<ul>
<li>  <a href="dashboard.php">Dashboard</a></li>
<li><a href="#"> Inventary</a></li>

<li><a href="propertymanager.php">Property Manager</a></li>

<li><a href="inclusions.php">Inclusions</a></li>

<!--<li><a href="#">Reporting</a></li>-->

<li  class="active"> <a href="settings.php"> Setting</a></li>
<!--<li> <a href="messages.php"> Messages</a></li>-->
</ul>
</div>
<div id="reporting_buttion">
</div>
<div id="content">
 <form method="POST" action="wp_mapping_insert.php">
        <table border="0" cellspacing="0" cellpadding="0">
            <tr>
                Add Properties
            </tr>
            <tr>
                <td>
                    List of Available Properties:
                </td>
                <td>
                <?php
                   $table = "selects"; // Table Name
                         //$field1 = "sdata"; // Field Nmae
                            // Change the Above Table Name and Field Name.
        
                   $Select = "SELECT * FROM wp_properties where flag=0"; // Select Query.
                   $Q = mysql_query($Select);  // Run Query.
                 ?>    
                <select  name="mySelect" onChange="pluginCal('wp_mapselect.php?ppro_id='+this.value)">
                <option value="" selected="selected">--select--</option>
                <?php
                while($row = mysql_fetch_array($Q)) // Fetch Array in $row
                {?>
                <option value="<?php echo $row['ppro_id'];?>"><?php echo $row['Name']; ?></option> 
                <?php 
                } 
                ?>
               </select> 
                <input type="hidden" name="flg" value="<?php echo $row['flag'];?>">
               </td>
            </tr>
            <tr>
                <td>
                Region:
                </td>
                <td>
                   <?php
                   $table = "wp_region"; // Table Name
                         //$field1 = "sdata"; // Field Nmae
                            // Change the Above Table Name and Field Name.
        
                   $Select = "SELECT * FROM $table"; // Select Query.
                   $Q = mysql_query($Select);  // Run Query.
                 ?>    
                <select  name="region">
                 <option value="" selected="selected">--None--</option>
                <?php
                while($row = mysql_fetch_array($Q)) // Fetch Array in $row
                {?>
                <option value="<?php echo $row['region_name'];?>"><?php echo $row['region_name']; ?>               </option> 
                <?php 
                } 
                ?>
               </select> 
                </td>
            </tr>
            <tr>
                <td>
                Name Override:
                </td>
                <td>
                    <div id="myDiv">
                    <input type="text" />
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                Ordering:
                </td>
                <td>
                 <input type="text" value="0" name="order">
                   </td>
            </tr>
             <tr>
                <td>
                  Featured:
                </td>
                <td>
                  <input type="checkbox" name="check[]" value="featured">
                </td>
            </tr>
             <tr>
                <td>
           
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp; <input type="submit" name="SUBMIT" value="Add"  >
                </td>
            </tr>
           </table>
        </form> 
       
            <?php
              $query1="select * from wp_mapping";
              $q11=mysql_query($query1);?>
             
              <?php while($q2=mysql_fetch_array($q11))
              {
             ?>
                <div id="toggle">
                    <div class="heading">
               <?php  echo $q2['property_name'];
              
             ?>
                    </div>
                    
              <div class="content1">
                  
                 <form name="form" id="form2" method='post' action="wp_mapping_update.php">
        <table width="60%" height="50%" border="1" cellspacing="0" cellpadding="0">
           <tr>
                <td>
                Name Override:
                </td>
                 <td>
                    <input type="hidden" id="hide" class="yy" name="rem" value="<?php echo $q2['ppro_id'];?>">
              
             
                    <input type="text" id="oname" name="oname" value="<?php echo $q2['property_name'];?>">
                 </td>
            </tr>
            <tr>
                <td>
                Region:
                </td>
                <td>
                   <?php
                   $table = "wp_region"; // Table Name
                         //$field1 = "sdata"; // Field Nmae
                            // Change the Above Table Name and Field Name.
        
                   $Select = "SELECT * FROM $table"; // Select Query.
             $Q= mysql_query($Select);  // Run Query.
                 ?>    
                <select name="oregion" id="sele">
                  <option  selected="selected"> <?php echo $q2['region'];?></option> 
                <?php
               while($row = mysql_fetch_array($Q)) // Fetch Array in $row
                {?>
                <option value="<?php echo $row['region_name'];?>"><?php echo $row['region_name']; ?> </option> 
                <?php 
                } 
                ?>
               </select> 
                </td>
            </tr>
            
            <tr>
                <td>
                Ordering:
                </td>
                <td>
                 <input type="text" id="order" value="<?php echo $q2['ordering'];?>" name="order">
                   </td>
            </tr>
             <tr>
                <td>
                  Featured:
                </td>
                <td>
                  <input type="checkbox" id="check" name="check[]" value="featured"
                  <?php
                  $e1=explode(',',$q2['featured']);
                  $e2=$e1[0];
                  if($e2==featured)
                  {
                     echo "checked='checked'";
                  }
                  ?>
                       />  
                   </td>
            </tr></div>
           
             <tr>
                <td>
           
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp; <input type="submit"  name="SUBMIT" value="Update">
                    &nbsp;&nbsp;&nbsp; <input type="button"  name="remove" value="Remove" onClick="javascript:if(confirm('Do you want to delete this record')){location.href='allmappings.php?sid=<?php echo $q2['ppro_id'];?>&mid=<?php echo $q2['mid'];?>&amp;action=del'}">
                     
                </td>
            </tr>
</table></form>
                  
                  
                  
                  <table>
            <tr style="background-color: #c3c3c3">
               <td> Room Mappings: </td>
               <td>
                   
               </td>
            </tr>
            <tr>
                <td>
                    Available RoomTypes: 
                </td>
                <td>
                    
                <?php
                $id1=$q2['ppro_id'];
                $query1="select distinct roomid,name from wp_room_type_details where ppro_id='$id1'";
                $q1=mysql_query($query1);
                $n=  mysql_num_rows($q1);
                 ?>
                  <div id="xyz"></div>
                  <div id="formbox">
                <form method="POST"  id="form1" name="form1" action="wp_mapping_insert.php">    
               <select  name="mySelect1">
                <option value="" selected="selected">--select--</option>
                <?php
                while($row1 = mysql_fetch_array($q1)) // Fetch Array in $row
                {?>
                <option value="<?php echo $row1['roomid'];?>"><?php echo $row1['name']; ?>               </option> 
                <?php 
                } 
                ?>
               </select> 
                      <input type="hidden"  name="radd" value="<?php echo $q2['ppro_id'];?>">
                    <input type="submit" name="add" value="Add">
                 </form> </div>
                </td> 
            </tr></table>
                  
                    Mapped RoomTypes: 
                
                    
                 <?php  
                 $rad=$q2['ppro_id'];
                 $sel="select * from wp_room_mapping where ppro_id='$rad'";
                 $q=mysql_query($sel);?>
                
                    <div>
                 <?php while($row1=mysql_fetch_array($q))
                 { ?>
                      <form method="POST"  id="thisForm" name="thisForm" action="wp_roommap_update.php">   
                    <?php echo $row1['rdata'];?>
                     
                        <div>
                        <input type="hidden" value="<?php echo $row1['addid']?>" name="hide">
                        Name Override: <input type="text" name="over" value="<?php  echo $row1['rdata']; ?>">&nbsp;&nbsp;&nbsp;
                        Ordering:<input type="text" name="order" value="<?php echo $row1['ordering'];?>"></div>
                        <input type="submit" value="Update" name="update">
                        <input type="button" value="Remove" name="remove" onClick="javascript:if(confirm('Do you want to delete this record')){location.href='allmappings.php?rid=<?php echo $row1['addid'];?>&amp;action=del1'}">   <hr>
                     
                            </form>
                            <?php } ?>
                    
                 
</div>

              </div></div>
        <?php }?>
</div>
</div>
</div>
</div>
</body>
</html>
<?php
if($_REQUEST['action']=='del')
      {
           $s_id=$_GET['sid'];
             $m_id=$_GET['mid'];
            $delet="DELETE FROM wp_mapping WHERE mid='$m_id'";

            $s=mysql_query($delet);
             $up1="update wp_properties set flag=0 where ppro_id='$s_id'";
                          mysql_query($up1);
            echo "<script>window.location='allmappings.php';</script>";
      }
          ?>
<?php if($_REQUEST['action']=='del1')
      {
          $s_id1=$_GET['rid'];
            

            $delet="DELETE FROM wp_room_mapping WHERE addid='$s_id1'";

            $s=mysql_query($delet);
                     
             
            echo "<script>window.location='allmappings.php';</script>";
      }
          ?>