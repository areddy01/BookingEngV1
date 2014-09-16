<?php 
include('config.php');
?>
<html>
    <head>
   <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
   <script type="text/javascript" src="js/script.js"></script>
   <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js">
</script>
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
    </head>
    <body>
  <div id="flip">Booking Form Rooms</div>
<div id="panel">This page will allow you to set stay pays, promotions, extras, rules and images specific to each mapped room on the current booking form. </div>
<table border="1" cellpadding="0" cellspacing="0" width="80%" height="10%">
   
        <?php 
        $query="select distinct s.sdata, r.rdata,r.rid from selects s,roomtypes1 r where s.sid=r.sid";
        $q=  mysql_query($query);?>
        <tr>
            <td>
               <center>Property</center> 
            </td>
            <td>
               <center>Room</center> 
            </td>
            <td>
                <center>Options</center>
            </td>
        </tr>
        <?php while($row=mysql_fetch_array($q))
        { ?>
          <form method="post" action="staypays.php">
            <tr>
              <td>
            <?php echo $row['sdata'];?>
            </td>
           <td>
           <input type="hidden" name="rdata" value="<?php  echo $row['rdata'];?>">
           <input type="hidden" name="rid" value="<?php echo $row['rid'];?>">
               
           <?php  echo $row['rdata'];?>
           
            </td>
            <td>
                <input type="submit" name="Staypays" value="Stay Pays" onClick="location.href='staypays.php?data=<?php  echo $row['rdata'];?>& rid=<?php echo $row['rid'];?>'"> |  <input type="submit" name="Promotions" value="Promotions" onClick="location.href='promotions.php?rid=<?php echo $row['rid'];?>'"> | <input type="submit" name="Extras" value="Extras" onClick="location.href='extras.php?rid=<?php echo $row['rid'];?>'"> | <input type="submit" name="Bookingrules" value="Booking Rules" onClick="location.href='dashboard.php'"> |  <input type="submit" name="Images" value="Images" onClick="location.href='staypays.php?rid=<?php echo $row['rid'];?>'">

            </td>
             </form>
           
       <?php  }      
        ?>
        </tr> 
</table>    
</body>
</html>