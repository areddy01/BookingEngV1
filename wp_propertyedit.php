<?php
 @session_start();
if(!isset($_SESSION['userName'])) 
{
header('location:login.php');
}
 require_once('functions.php');
require_once('connection.php');
$user=new User(); 
$ppro_id = $_GET['ppro_id'];
$edit_property = mysql_query("SELECT * FROM wp_properties WHERE ppro_id='$ppro_id'")
or die(mysql_error());
$edit = mysql_fetch_array($edit_property);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>fitow</title>
<link href="css/login.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/style.css" media="all" />
</head>
<body>
<div id="content"> 
<div  id="new">
 EDIT PROPERTY</div>
</div>
<!-- Form Code Start -->
<div  class="form">
 <?php
            // $vvvv=mysql_query("SELECT * FROM wp_manage_user");?>
<form id='register'  method='post' name='form' action="wp_update.php">
<input type="hidden" name="ppro_id" value="<?php echo $ppro_id;?>" />
 <!--<p class="contact"><label for="name">Select Owner:</label></p>
  
            <select name="user"  id="user" style="width:400px; height:27px;">
            <option value="">--Please Select Owner--</option>
            <?php
            while($row2 = mysql_fetch_array($vvvv))
              { ?>
            <option <?php if($edit['user_id']==$row2['id']){ ?> selected="selected" <?php }?> value="<?php echo $row2['id'];?>"><?php echo $row2['firstname'];?></option>
             
             <?php } ?>
  </select><br>-->

    <p class="contact"><label for="name">Name:</label></p>
    <input type='text' name='name' id='name' required=" " maxlength="50" value="<?php echo $edit['Name']; ?>" style="width:400px; height:27px;"/>
	
    <p class="contact"><label for="name">Description:</label></p>
   <textarea style="width:400px; height:100px;" name="desc" required=" "  onBlur="checkDs(this.value)"><?php echo $edit['ds'];?></textarea>
    <p class="contact"><label for="name">Features:</label></p>
   <textarea style="width:400px; height:100px;" name="features" required=" "  ><?php echo $edit['features'];?></textarea>
	<p class="contact"><label for="name">Phone:</label></p>
    <input type='text' name='phone' id='username' required=" " maxlength="50" value="<?php echo $edit['phone']; ?>" />
	
     <p class="contact"><label for='fax' >FAX:</label></p>
     <input type='text' name='fax' id='username' required=" " maxlength="50" value="<?php echo $edit['fax']; ?>" />
	 
       <p class="contact"><label for='web' >Web Address:</label></p>
    <input type='text' name='webad' id='username'  maxlength="50"onBlur="checkWb(this.value)" value="<?php echo $edit['webaddr']; ?>"/>

<p class="contact"><label for='addr' >Address1:</label></p>
    <input type='text' name='addr1' id='username'  maxlength="50" required=" "onBlur="checkAd1(this.value)" value="<?php echo $edit['addr1']; ?>"/>
   <td><span id="addrr1"></span></td></tr>

<p class="contact"><label for='addr' >Address2:</label></p>
    <input type='text' name='addr2' id='username' required=" " maxlength="50" onBlur="checkAd2(this.value)" value="<?php echo $edit['addr2']; ?>"/>
   
    <p class="contact"><label for='sub' >Subrub:</label></p>
    <input type='text' name='subr' id='username'  maxlength="50" onBlur="checkSb(this.value)" value="<?php echo $edit['suburb']; ?>"/>
	

 <!-- <p class="contact"><label for='regi'>Region:</label></p>
    <input type='text' name='region' id='username' required=" " maxlength="50" onBlur="checkRg(this.value)" value="<?php echo $edit['region']; ?>"/>
   <span id="rg"></span>-->
    
 
    
   
     <p class="contact"><label for='pst' >Post Code:</label></p>
    <input type='text' name='postcode' id='username' required=" " maxlength="50"onBlur="checkPs(this.value)" value="<?php echo $edit['postcode']; ?>"/>
	<span id="ps"></span>
    
   <p class="contact"><label for='country' >Country:</label></p>
     <select name="country" id="country" onChange="changeCity('changecountry.php?id='+this.value)" style="width:400px; height:27px;">
  
    <?php
	
$sql1=mysql_query("select cid,city_id,region_id from wp_properties where ppro_id='$ppro_id'");
$f=mysql_fetch_array($sql1);
$cid=$f['cid'];
$city_id=$f['city_id'];
$region_id=$f['region_id'];
$sql=mysql_query("select * from wp_countrys where cid='$cid'");
$row=mysql_fetch_array($sql);
?>
 <option  selected="selected"><?php echo $row['country_name'];?></option>
<?php $qry=mysql_query("select * from wp_countrys");
  while($ff=mysql_fetch_array($qry))
  {
	  echo '<option value="'.$ff['cid'].'">'.$ff['country_name'].'</option>';
  }
  ?>
  </select>

 <p class="contact"><label for='country' >Region:</label></p>
<select name="city" onChange="changeRegion('wp_changeregion.php?sid='+this.value)" id="state" style="width:400px; height:27px;">
<?php 
    $s=mysql_query("select * from wp_citys where cid='$cid' and city_id='$city_id'");
while($r=mysql_fetch_array($s))
{
?>
 <option  selected="selected"><?php echo $r['city_name'];?></option>
 <?php $cqry=mysql_query("select * from wp_citys where cid='$cid'");
  while($cff=mysql_fetch_array($cqry))
  {
	  echo '<option value="'.$cff['city_id'].'">'.$cff['city_name'].'</option>';
  }
 
}?>
  </select>
  <p class="contact"><label for='regi'>City:</label></p>
  <select name="place" id="place" style="width:400px; height:27px;">
   <?php
    $s=mysql_query("select * from wp_region where city_id='$city_id' and region_id='$region_id'");
while($r=mysql_fetch_array($s))
{
?>
 <option  selected="selected"><?php echo $r['region_name'];?></option>
 <?php $rqry=mysql_query("select * from wp_region where city_id='$city_id'");
  while($rff=mysql_fetch_array($rqry))
  {
	  echo '<option value="'.$rff['region_id'].'">'.$rff['region_name'].'</option>';
  }
}?>
  </select>
	

     <p class="contact"><label for='ggg'>Geographic coordinates:</label></p>
 <input type='text' name='coordinates' id='username' required=" " maxlength="50" onBlur="checkCo(this.value)" value="<?php echo $edit['geographicalcoordinates']; ?>"/>
	<span id="cc"></span>
    
      <p class="contact"><label for='map'>Map Zoom Level:</label></p>
    <input type='text' name='map' id='username' required=" " maxlength="30" onBlur="checkMp(this.value)" value="<?php echo $edit['mapzonelevel']; ?>"/>
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
<select name="rating" id="username" maxlength="50"style="width:400px; height:27px;">

    <option value="1">0</option>

    <option value="2">0.5</option>

    <option value="3">1</option>

</select>
 
  <p class="contact"><label for='map'>Lead Time in Days:</label></p>
    <input type='text' required=" " name='leadtime' id='username'  maxlength="50" onBlur="checkTm(this.value)" value="<?php echo $edit['leadtime']; ?>"/>
	<span id="tt"></span>
    
   <p class="contact"><label for='map'>Availability Value:</label></p>
    <input type='text' required="" name='value' id='username'   maxlength="50" onBlur="checkVl(this.value)" value="<?php echo $edit['availabletime']; ?>"/>
	<span id="vv"></span>
  
         <p class="contact"><label for="name">
         <input type="hidden" name="id" value="<?php echo $edit['id']?>" />
         <input class="button" type="submit"  name="SUBMIT" value="SUBMIT"  />
   <input type="reset" class="button" name="Reset" value="RESET"  />
   
   <a href="dashboard.php"><input class="button" type="button" value="Back To DashBoard" /></a>
</label></p>



</form>
</div>
</div>


</body>
</html>