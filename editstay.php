<?php
@session_start();
require_once('functions.php');
require_once('connection.php');
$user=new User(); 
if(!isset($_SESSION['userName'])) 
{
header('location:login.php');
}
$user=new User();
$sele=$_SESSION['sele'];
 if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
	$sele=$_REQUEST['sele'];
	$_SESSION['sele']=$sele;
}
?>
  
<script> 
$(document).ready(function(){
  $("#flip").click(function(){
    $("#panel").slideToggle("slow");
  });
});
</script>
 
<style type="text/css"> 
#panel,#flip
{
padding:5px;
text-align:center;
background-color:#e5eecc;
border:solid 1px #c3c3c3;
}
#panel
{
padding:50px;
display:none;
}
</style>
<script type="text/javascript">
      $(document).ready(function(){
          
    
    $("#txtFromDate").datepicker({
       
        minDate: 0,
        maxDate: "+60D",
     
        onSelect: function(selected) {
          $("#txtToDate").datepicker("option","minDate", selected)
        }
      
    });
     
    $("#txtToDate").datepicker({ 
        minDate: 0,
        maxDate:"+60D",
       
        onSelect: function(selected) {
           $("#txtFromDate").datepicker("option","maxDate", selected)
        }
    });  
});
</script>


        <?php

$id=$_GET['id'];
$q="select * from wp_staypays where id='$id'";
$q1=mysql_query($q);
$row=mysql_fetch_array($q1);

?>
 <div> 
<form action="insert.php" method="POST" name="myform">
<table border="1" cellspacing="0" cellpadding="0" width="60%" height="10%">
    <tr>
        Add/Edit Stay Pay 
    </tr>
    <tr>
        <input type="hidden" name="id" value="<?php echo $row['id'];?>" />
        <td>
           Active From  
        </td>
        <td>
             Select Date:<input type="text" name="from" value="<?php echo $row['fromdate'];?>" id="txtFromDate"/>
        </td>
    </tr>
    <tr>
        <td>
           Active To 
        </td>
        <td>
            Select Date:<input type="text" name="to" value="<?php echo $row['todate'];?>" id="txtToDate" />
        </td>
    </tr>
    <tr>
        <td>
          Stay Nights  
        </td>
        <td>
            <input type="text" name="snight" value="<?php echo $row['snight'];?>">
        </td>
    </tr>
    <tr>
        <td>
         Free Nights  
        </td>
        <td>
           <input type="text" name="fnight" value="<?php echo $row['fnight'];?>"> 
        </td>
    </tr>
    <tr>
        <td>
         Max Free Nights   
        </td>
        <td>
            <input type="text" name="mfnight" value="<?php echo $row['mfnight'];?>">
        </td>
    </tr>
    <tr>
        <td></td>
        <td>
            <input type="submit" value="Save" name="save">
            <input type="submit" value="Cancel" name="cancel">
        </td>
    </tr>
</table>
     <div style="background-color: #CCF">Booking Form: The Fitow Collection
      <?php 
      $qu="select * from wp_properties";
       $q1=mysql_query($qu);
       while($row=mysql_fetch_array($q1))
       {?>
       

        <div>Property:<?php echo $row['Name'];
            $id=$row['ppro_id'];
			
            $qu1="select roomid,name from wp_room_type_details where ppro_id='$id'";
            $q2=mysql_query($qu1);
            $qu2="select * from wp_mapping where ppro_id='$id'";
              $q3=mysql_query($qu2);
            $q4=mysql_fetch_array($q3);
            //echo "<br>".$q4['featured'];
            ?>
            <table border="2">  <tr>
            <?php
			while($row1=mysql_fetch_array($q2))
            {?>
              <div>
                <td>
                    <input type="checkbox" name="check" value="featured"
                            <?php if($q4['featured']==featured)
                            {
                            echo "checked='checked'";
                            }?> /></td><td><?php echo $row1['name'];?></td>
            <?php } ?></div></tr></table>
        </div>
           <hr  width="100%"/>
      <?php  } ?>
      
    </div>
</form>
 
</div>
