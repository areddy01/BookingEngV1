<?php
@session_start();
if(!isset($_SESSION['userName'])) 
{
header('location:login.php');
}
require_once('functions.php');
require_once('connection.php');
$user=new User(); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>fitow</title>
<script type="text/javascript" src="js/jquery1.4.2.js"></script>
<script>
$(document).ready(function(){
$("#register").submit(function()
        {
         alert('Form is submitting');
         return true;
        });
 });
</script>
</head>
<body>
<div  id="new">
 NEW PROPERTY
</div>
<!-- Form Code Start -->
<div  class="form">
 <?php
            // $vvvv=mysql_query("SELECT * FROM wp_manage_user");?>
<form id='register'  method='post'  name='form' action="wp_insert.php">
<!-- <p class="contact"><label for="name">Select Owner:</label></p>
  
            <select name="user"  id="user" style="width:400px; height:27px;">
            <option value="0">--Please Select Owner--</option>
            <?php
            while($row2 = mysql_fetch_array($vvvv))
              { ?>
            <option value="<?php echo $row2['id'];?>"><?php echo $row2['firstname'];?></option>
             
             <?php } ?>
  </select><br>-->
             
    
    <p class="contact"><label for="name">Name:</label></p>
    <input type='text' name='name' id='name' required=" " maxlength="50" style="width:400px; height:27px;"/>
    
     <input type='hidden' name='user_id' id='user_id' value="<?php echo  $_SESSION['id'];?>"  maxlength="50"  />
	
    <p class="contact"><label for="name">Description:</label></p>
   <textarea style="width:400px; height:100px;" name="desc" required=" " ></textarea>
    <p class="contact"><label for="name">Features:</label></p>
   <textarea style="width:400px; height:100px;" name="features" required=" "  ></textarea>
	<p class="contact"><label for="name">Phone:</label></p>
    <input type='text' name='phone' id='username' required=" " maxlength="50" />
	
     <p class="contact"><label for='fax' >FAX:</label></p>
     <input type='text' name='fax' id='username' required=" " maxlength="50" />
	 
       <p class="contact"><label for='web' >Web Address:</label></p>
    <input type='text' name='webad' id='username'  maxlength="50"/>

<p class="contact"><label for='addr' >Address1:</label></p>
    <input type='text' name='addr1' id='username'  maxlength="50" required=" "/>
   <td><span id="addrr1"></span></td></tr>

<p class="contact"><label for='addr' >Address2:</label></p>
    <input type='text' name='addr2' id='username' required=" " maxlength="50" />
   
    <p class="contact"><label for='sub' >Subrub:</label></p>
    <input type='text' name='subr' id='username'  maxlength="50" />
	

  
    
  
     <p class="contact"><label for='pst' >Post Code:</label></p>
    <input type='text' name='postcode' id='username' required=" " maxlength="50" />
	<span id="ps"></span>
  


   <p class="contact"><label for='country' >Country:</label></p>
     

    <select name="country" id="country" onChange="changeCity('changecountry.php?id='+this.value)" style="width:400px; height:27px;">
    <option selected="selected">--Select Country--</option>
    <?php
$sql=mysql_query("select * from wp_countrys ");
while($row=mysql_fetch_array($sql))
{
echo '<option value="'.$row['cid'].'">'.$row['country_name'].'</option>';
 } ?>
  </select>

 <p class="contact"><label for='country' >Region:</label></p>
<select name="city" onChange="changeRegion('wp_changeregion.php?sid='+this.value)" id="state" style="width:400px; height:27px;">
    <option selected="selected">--Select State--</option>
  </select>
  
  <p class="contact"><label for='regi'>City:</label></p>
  <select name="place"  id="place" style="width:400px; height:27px;">
    <option selected="selected">--Select City--</option>
  </select
  <span id="cc"></span>
     <p class="contact"><label for='ggg'>Geographic coordinates:</label></p>
 <input type='text' name='coordinates' id='username' required=" " maxlength="50"/>
	<span id="cc"></span>
    
      <p class="contact"><label for='map'>Map Zoom Level:</label></p>
    <input type='text' name='map' id='username' required=" " maxlength="30"  />
	<span id="mp"></span>
    
   <p class="contact"><label for='acc' >Accodimation Type:</label></p>
    <select name="accodimation" id="username" style="width:400px; height:27px;">

    <option value="1">unspecified</option>

    <option value="2">Hotel</option>

    <option value="3">Resort</option>

    <option value="4">Apartments</option>

</select>
 
   <p class="contact"><label for='rating' >Rating Type:</label></p>
<select name="ratingtype" id="username" style="width:400px; height:27px;">

    <option value="1">none</option>

    <option value="2">Self Rated</option>

    <option value="3">AAA</option>

</select>
 
   <p class="contact"><label for='rating' >Rating:</label></p>
<select name="rating" id="username" maxlength="50" style="width:400px; height:27px;">

    <option value="1">0</option>

    <option value="2">0.5</option>

    <option value="3">1</option>

</select>
 
  <p class="contact"><label for='map'>Lead Time in Days:</label></p>
    <input type='text' required=" " name='ltime' id='username'  maxlength="50"  />
	<span id="tt"></span>
    
   <p class="contact"><label for='map'>Availability Value:</label></p>
 <input type='text' required="" name='value' id='username' />
	<span id="vv"></span>
  
        <p class="contact"><label for="name"><input class="button" type="submit"  name="SUBMIT" value="SUBMIT"  />
   <input type="reset" class="button" name="Reset" value="RESET"  />
   
   <a href="properties.php"><input class="button" type="button" value="Back To Properties" /></a>
</label></p>

</form>
</div>

</body>
</html>