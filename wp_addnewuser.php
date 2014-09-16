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
<link href="css/login.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/style.css" media="all" />


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
<form id="signupForm"  method='post'  name='form' action="wp_userinsert.php" onsubmit="return validate(this);">
<p class="contact"><label for="name">FirstName:</label></p>
    <input type='text' name='fname' id='fname' required=" " maxlength="50"  />
    <p class="contact"><label for="name">LastName:</label></p>
    <input type='text' name='lname' id='lname' required=" " maxlength="50"  />
    <p class="contact"><label for="name">UserName:</label></p>
    <input type='text' name='uname' id='uname' required=" " maxlength="50" onkeypress="kiran()" /><h5 style="color:#F00;" id="old"></h5>
    <p class="contact"><label for="name">Password:</label></p>
    <input type='password' name='pwd' id='pwd' required=" " maxlength="50"  />
    <p class="contact"><label for="name">ConformPassword:</label></p>
    <input type='password' name='cpwd' id='cpwd' required=" " maxlength="50"  />
    <p class="contact"><label for="name">Role:</label></p>
    <!--<input type='text' name='role' id='name' required=" " maxlength="50"  />-->
    <select name='role' id='name' required=" " >
     <option>Super Admin</option>
    <option>User</option></select>
    <p class="contact"><label for="name">Email:</label></p>
    <input type='text' name='email' id='email' required=" " maxlength="50" onkeypress="kiran1()" /><h5 style="color:#F00;" id="em"></h5>
     <p class="contact"><label for="name">Manage Propertys:</label></p>
     <div id="manage" style="width:850px;">
     <?php include('manageproperties1.php');?>
     </div>
    
     <p class="contact"><label for="name"><input class="button" type="submit"  name="SUBMIT" value="SUBMIT"  />
     </label></p></form>
</div>


</body>
</html>