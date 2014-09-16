<?php

require_once('functions.php');
require_once('connection.php');
$user=new User();
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>fitow</title>
<link href="css/login.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
  
  <link href="css/main.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="/resources/demos/style.css" />
  <link href="css1/bootstrap.css" rel="stylesheet" type="text/css">
<link href="css1/bootstrap-responsive.css" rel="stylesheet" type="text/css">
<script src="http://code.jquery.com/jquery-1.9.0.min.js"></script>
 <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  <script src="js11/bootstrap.js"></script>
  
  
 <link href="css/bootstrap1.css" rel="stylesheet" type="text/css">
<!--<link href="css/bootstrap-responsive1.css" rel="stylesheet" type="text/css">-->
<link href='http://fonts.googleapis.com/css?family=Sintony' rel='stylesheet' type='text/css'>
<!--<script src="http://code.jquery.com/jquery-1.9.0.min.js"></script>-->
<script src="js1/bootstrap.js"></script>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<!--<link href="http://static.scripting.com/github/bootstrap2/css/bootstrap.css" rel="stylesheet">-->
<script src="http://static.scripting.com/github/bootstrap2/js/jquery.js"></script>
<script src="http://static.scripting.com/github/bootstrap2/js/bootstrap-transition.js"></script>
<script src="http://static.scripting.com/github/bootstrap2/js/bootstrap-modal.js"></script>
<script src="js/bootstrap-tooltip.js"></script>
<script src="js/bootstrap-popover.js"></script>	
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>








  <script>
  
  var dateToday = new Date();


$(function() {
	
	
    $( "#input-xlarge" ).datepicker({
        showButtonPanel: true,
        minDate: dateToday,
		dateFormat:"yy-mm-dd"
    });
});

//$(document).ready(function(){
             $(function() {
							$(".btn").click(function(){            
							var ppro_id=$("#select01").val();
							var arrival=$("#input-xlarge").val();
							var region=$("#region").val();
							var bf_id=$("#bf_id").val();
							var data3=$("#data3").val();
							
							
							
							$.ajax({ 
								type: "POST",
								url: "widget_roomselection.php",
								data: {ppro_id:ppro_id, arrival:arrival,region:region,bf_id:bf_id,data3:data3},
								success: function(response){
							
								$(".row-fluid").replaceWith(response);  
								
								}
								
							});      
							
							});
							
				});

  </script>

	
	
</head>

<body bgcolor="#FFFFFF"><div style="background-color:#000;width:1024px; height:auto; margin:10px 0px 0px 0px;" >

<?php
$result = mysql_query("SELECT *  FROM wp_citys")
or die(mysql_error());
?>
<form class="form-horizontal">
<fieldset> 
       <div class="control-group"> 
          <label class="control-label" for="select01">Region</label>  
            <div class="controls">  
              <select id="region" name="region">
              <?php
while($row1 = mysql_fetch_array($result))
{
  $city_id= $row1['city_id'];
   ?>
   <option value="<?php echo $row1['city_id'];?>"><?php echo $row1['city_name'];?></option>
  
      <?php
       $sqry=mysql_query("SELECT *  FROM wp_region where city_id=$city_id order by region_name")or die(mysql_error());
       
        while($row12 = mysql_fetch_array($sqry))
         {?>
         <option value="<?php echo $row12['region_id'];?>">.....<?php echo $row12['region_name'];?></option>
   <?php }

 } ?>
</select>
 </div> </div>
 <?php $vvvv=mysql_query("SELECT * FROM wp_properties"); ?>  
          <br> 
          <div class="control-group"> 
          <label class="control-label" for="select01">Properties</label>  
            <div class="controls">  
              <select id="select01" name="ppro_id">
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
  
<?php } ?>
</select>
 
 </div>  
          </div>
           
          <div class="control-group">  
            <label class="control-label" for="input01">Arrival</label>  
            <div class="controls">  
             
               <input type="text" id="input-xlarge"   name="arrival"> 
                <input type="hidden" id="bf_id"   name="bf_id" value="<?php echo $bf_id;?>"> 
                 <input type="hidden" id="data3"   name="data3" value="<?php echo $avr;?>"> 
             
            </div>  
          </div> 
          <div class="control-group">
            <div class="controls"> <input type="button" name="search" class="btn" value="Search" >  </div>  
          </div>
        </fieldset>  
</form> 

</div>







</body>

</html>
  