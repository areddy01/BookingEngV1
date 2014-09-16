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
<html>
<head>
<script type="text/javascript" src="js/properties.js"></script>
 <script language="javascript">
        function addRow(tableID) {
        //alert();
 
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

<input type="button" value="Add" onclick="addRow('dataTable')" />
 
    <input type="button" value="Delete" onclick="deleteRow('dataTable')" />
 
    <table id="dataTable" width="750px" border="1">
        <tr>
            <td><INPUT type="checkbox" name="chk"/></td><td>
<?php
$result = mysql_query("SELECT *  FROM wp_citys")
or die(mysql_error());
?>
              <select id="select01" name="region[]" onChange="changeP('onchangeproperties.php?id='+this.value)">
              <option selected="selected">Region</option>
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
             <option value="<?php echo $row12['region_id'];?>-<?php echo $row1['city_id'];?>">.....<?php echo $row12['region_name'];?></option>
          <?php }

       } ?>
     </select></td><td>
    
   <select name="ppro_id[]"  id="ppro_id" onChange="changeR('onchangeproperties.php?ppro_id='+this.value)" >
    <option selected="selected">Property</option>
  </select></td>

    <td><select name='roomtype[]' id='roomtype'onChange="changeRR('onchangeproperties.php?roomtype='+this.value)">
     <option>Roomtype</option>
   </select></td>
   
   <td> <select name='room[]' id='room' >
     <option>Room</option>
   </select></td></tr></table>
   </body>
   </html>