
<!DOCTYPE HTML>
<!--
/*
 * jQuery File Upload Plugin Demo 8.0
 * https://github.com/blueimp/jQuery-File-Upload
 *
 * Copyright 2010, Sebastian Tschan
 * https://blueimp.net
 *
 * Licensed under the MIT license:
 * http://www.opensource.org/licenses/MIT
 */
-->
<html lang="en">
<head>
<style>

    </title><style>
     
        a { color: #0068D2; cursor: pointer; }
        a:link, a:visited { text-decoration: none; color: #0068D2; }
        a:hover, a:active { text-decoration: underline; color: #0068D2; }
        body { font: 12px/18px "Lucida Grande", "Lucida Sans Unicode", sans-serif; }

        #contacts-table { border-collapse: collapse; }
        #contacts-table, #contacts-table th, #contacts-table td { padding: 8px 16px; text-align: left; border: 0px solid #B9BABE; }
        #contacts-table th { font-weight: bold; font-size: 14px; color: #29344B; }
        #contacts-table td { color: #000; }
        #contacts-table tr:nth-child(2n) { background: #E8EDFF; }

        #contacts-form { padding: 10px; }
        .text input, .button input { padding: 5px; margin: 0; border: 1px solid #ccc; -moz-border-radius: 2px; -webkit-border-radius: 2px; border-radius: 2px; }
        #contacts-form .item { margin: 3px 0; }
        #contacts-form label, #contacts-form .field { display: inline-block; color: #0C0B07; }
        #contacts-form label { width: 110px; font-weight: bold; text-align: right; color: #666; }
        #contacts-form .text input { width: 176px; padding: 3px; }
        #contacts-form .button { display: inline-block; }
        #contacts-form .button-wrapper { padding-left: 113px; }
        .button input { padding: 4px 8px; color: #343434; background-color: #fdfdfd; background: -moz-linear-gradient(#fdfdfd, #e1e1e1); background: -webkit-gradient(linear, 0 0, 0 100%, from(#fdfdfd), to(#e1e1e1)); }
        .button-default input { font-weight: bold; color: #fff; background-color: #7ca0c7; background: -moz-linear-gradient(#acc6e1, #7ca0c7); background: -webkit-gradient(linear, 0 0, 0 100%, from(#acc6e1), to(#7ca0c7)); border-color: #5b80b2; }
   
</style>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
   <script src="http://code.jquery.com/jquery-1.8.3.min.js" type="text/javascript"></script>

 <script type="text/javascript">
   function pluginCal(strURL)
{

var xmlhttp;
if (window.XMLHttpRequest)
{// code for IE7+, Firefox, Chrome, Opera, Safari
xmlhttp=new XMLHttpRequest();
}
else
{// code for IE6, IE5
xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
}
xmlhttp.onreadystatechange=function()
{
if (xmlhttp.readyState == 4 )
{
if(xmlhttp.status == 200)
{
	
document.getElementById("append").innerHTML=xmlhttp.responseText;

}
else
{
alert("There was a problem while using XMLHTTP:\n" + xmlhttp.statusText);
}
}
}
xmlhttp.open("GET",strURL,true);
xmlhttp.send();
}
 function pluginCal2(strURL)
{

var xmlhttp;
if (window.XMLHttpRequest)
{// code for IE7+, Firefox, Chrome, Opera, Safari
xmlhttp=new XMLHttpRequest();
}
else
{// code for IE6, IE5
xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
}
xmlhttp.onreadystatechange=function()
{
if (xmlhttp.readyState == 4 )
{
if(xmlhttp.status == 200)
{
	
document.getElementById("append2").innerHTML=xmlhttp.responseText;

}
else
{
alert("There was a problem while using XMLHTTP:\n" + xmlhttp.statusText);
}
}
}
xmlhttp.open("GET",strURL,true);
xmlhttp.send();
}
 function pluginCal1(strURL)
{

var xmlhttp;
if (window.XMLHttpRequest)
{// code for IE7+, Firefox, Chrome, Opera, Safari
xmlhttp=new XMLHttpRequest();
}
else
{// code for IE6, IE5
xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
}
xmlhttp.onreadystatechange=function()
{
if (xmlhttp.readyState == 4 )
{
if(xmlhttp.status == 200)
{
	
document.getElementById("append1").innerHTML=xmlhttp.responseText;

}
else
{
alert("There was a problem while using XMLHTTP:\n" + xmlhttp.statusText);
}
}
}
xmlhttp.open("GET",strURL,true);
xmlhttp.send();
}
</script>
</head>
<body>
<h1></h1>

   
<table  border="2">
<form id="contacts-form">

<tr><td><label>Property Mappings</label></td></tr>
<?php 
include('config.php');
$query=mysql_query("select * from selects");?>
<tr><td><label>BookingForm:</label><select name="first_name" onChange="pluginCal('changeproperty.php?data='+this.value)">
      <option value="" selected="selected">--select--</option>
	  <?php
       while( $result=mysql_fetch_array($query)) // Fetch Array in $row
       {
		   
         ?>
       
       <option value="<?php echo $result['sdata'];?>"><?php echo $result['sdata'];?>
           
       </option>          
          <?php 
                } 
                ?>  

</select></td></tr>
<tr><td><label>Property:</label><select id="append" name="last_name"> 
<option value="" selected="selected">--select--</option>

             
           
</select><input id="contacts-op-discard" type="button" value="Discard"></input>
<input id="contacts-op-save" type="submit" value="Add Mappings"><input type="hidden" value="0" name="id_entry"></input></td></tr> 
</form>
<tr><td>
<table id="contacts-table">
<tbody></tbody>
<tr id="entry-3"></tr>
<tr id="entry-4"></tr>
</table></td>
</tr>
<tr><th>Booking Form</th><th>Property</th><th>Options</th></tr>
<form id="contacts-form1">


<tr><td><label>Room Type Mappings</label></td></tr>

<?php 
include('config.php');
$query=mysql_query("select * from selects");?>
<tr><td><label>BookingForm:</label><select  name="first_name1" onChange="pluginCal1('changeproperty.php?id='+this.value)">
      <option value="" selected="selected">--select--</option>
	  <?php
       while( $result=mysql_fetch_array($query)) // Fetch Array in $row
       {
		   
         ?>
       
       <option value="<?php echo $result['sdata'];?>"><?php echo $result['sdata'];?>
           
       </option>          
          <?php 
                } 
                ?>  

</select></td></tr>
<tr><td><label>Property:</label><select id="append1"  name="last_name1" onChange="pluginCal2('changeproperty.php?id1='+this.value)">
<option value="" selected="selected">--select--</option>

             
</select></td></tr>
<tr><td></select></td></tr>
<tr><td><label>Room Type:</label>
<select  name="room" id="append2"> 
<option value="" selected="selected">--select--</option>

      
           
               
</select>
<input id="contacts-op-discard" type="button" value="Discard"></input>
<input type="submit" name="SUBMIT2" value="Add Mapping"></td></tr>
<tr><th>Booking Form</th><th>Property</th><th>Room Type</th><th>Options</th></tr>
<tr><td>
<table id="contacts-table1">
<tbody></tbody>
<tr id="entry-3"></tr>
<tr id="entry-4"></tr>
</table></td>
</tr>
<tr><td><input type="submit" name="SUBMIT" value="SAVE"></td></tr>
</form>

</table>
<script>
     
        var Contacts = {
            index: window.localStorage.getItem("Contacts:index"),
            $table: document.getElementById("contacts-table"),
            $form: document.getElementById("contacts-form"),
            $button_save: document.getElementById("contacts-op-save"),
            $button_discard: document.getElementById("contacts-op-discard"),

            init: function() {
                // initialize storage index
                if (!Contacts.index) {
                    window.localStorage.setItem("Contacts:index", Contacts.index = 1);
                }

                // initialize form
                Contacts.$form.reset();
                Contacts.$button_discard.addEventListener("click", function(event) {
                    Contacts.$form.reset();
                    Contacts.$form.id_entry.value = 0;
                }, true);
                Contacts.$form.addEventListener("submit", function(event) {
                    var entry = {
                        id: parseInt(this.id_entry.value),
                        first_name: this.first_name.value,
                        last_name: this.last_name.value
                        
                    };
                    if (entry.id == 0) { // add
                        Contacts.storeAdd(entry);
                        Contacts.tableAdd(entry);
                    }
                    else { // edit
                        Contacts.storeEdit(entry);
                        Contacts.tableEdit(entry);
                    }

                    this.reset();
                    this.id_entry.value = 0;
                    event.preventDefault();
                }, true);

                // initialize table
                if (window.localStorage.length - 1) {
                    var contacts_list = [], i, key;
                    for (i = 0; i < window.localStorage.length; i++) {
                        key = window.localStorage.key(i);
                        if (/Contacts:\d+/.test(key)) {
                            contacts_list.push(JSON.parse(window.localStorage.getItem(key)));
                        }
                    }

                    if (contacts_list.length) {
                        contacts_list
                            .sort(function(a, b) {
                                return a.id < b.id ? -1 : (a.id > b.id ? 1 : 0);
                            })
                            .forEach(Contacts.tableAdd);
                    }
                }
                Contacts.$table.addEventListener("click", function(event) {
                    var op = event.target.getAttribute("data-op");
                    if (/edit|remove/.test(op)) {
                        var entry = JSON.parse(window.localStorage.getItem("Contacts:"+ event.target.getAttribute("data-id")));
                        if (op == "edit") {
                            Contacts.$form.first_name.value = entry.first_name;
                            Contacts.$form.last_name.value = entry.last_name;
                          
                            Contacts.$form.id_entry.value = entry.id;
                        }
                        else if (op == "remove") {
                            if (confirm('Are you sure you want to remove "'+ entry.first_name +' '+ entry.last_name +'" from your contacts?')) {
                                Contacts.storeRemove(entry);
                                Contacts.tableRemove(entry);
                            }
                        }
                        event.preventDefault();
                    }
                }, true);
            },

            storeAdd: function(entry) {
                entry.id = Contacts.index;
                window.localStorage.setItem("Contacts:index", ++Contacts.index);
                window.localStorage.setItem("Contacts:"+ entry.id, JSON.stringify(entry));
            },
            storeEdit: function(entry) {
                window.localStorage.setItem("Contacts:"+ entry.id, JSON.stringify(entry));
            },
            storeRemove: function(entry) {
                window.localStorage.removeItem("Contacts:"+ entry.id);
            },

            tableAdd: function(entry) {
                var $tr = document.createElement("tr"), $td, key;
                for (key in entry) {
                    if (entry.hasOwnProperty(key)) {
                        $td = document.createElement("td");
                        $td.appendChild(document.createTextNode(entry[key]));
                        $tr.appendChild($td);
                    }
                }
                $td = document.createElement("td");
                $td.innerHTML = '<a data-op="edit" data-id="'+ entry.id +'"></a>  <a data-op="remove" data-id="'+ entry.id +'">Delete</a>';
                $tr.appendChild($td);
                $tr.setAttribute("id", "entry-"+ entry.id);
                Contacts.$table.appendChild($tr);
            },
            tableEdit: function(entry) {
                var $tr = document.getElementById("entry-"+ entry.id), $td, key;
                $tr.innerHTML = "";
                for (key in entry) {
                    if (entry.hasOwnProperty(key)) {
                        $td = document.createElement("td");
                        $td.appendChild(document.createTextNode(entry[key]));
                        $tr.appendChild($td);
                    }
                }
                $td = document.createElement("td");
                $td.innerHTML = '<a data-op="edit" data-id="'+ entry.id +'">Edit</a> | <a data-op="remove" data-id="'+ entry.id +'">Remove</a>';
                $tr.appendChild($td);
            },
        tableRemove: function(entry) {
                Contacts.$table.removeChild(document.getElementById("entry-"+ entry.id));
            }
        };
        Contacts.init();
   
    </script>
    <script>
	
     
        var Contacts = {
            index: window.localStorage.getItem("Contacts:index"),
            $table: document.getElementById("contacts-table1"),
            $form: document.getElementById("contacts-form1"),
            $button_save: document.getElementById("contacts-op-save"),
            $button_discard: document.getElementById("contacts-op-discard"),

            init: function() {
                // initialize storage index
                if (!Contacts.index) {
                    window.localStorage.setItem("Contacts:index", Contacts.index = 1);
                }

                // initialize form
                Contacts.$form.reset();
                Contacts.$button_discard.addEventListener("click", function(event) {
                    Contacts.$form.reset();
                    Contacts.$form.id_entry1.value = 0;
                }, true);
                Contacts.$form.addEventListener("submit", function(event) {
                    var entry = {
                        id: parseInt(this.id_entry1.value),
                        first_name1: this.first_name1.value,
                        last_name1: this.last_name1.value,
                        room: this.room.value
                    };
                    if (entry.id == 0) { // add
                        Contacts.storeAdd(entry);
                        Contacts.tableAdd(entry);
                    }
                    else { // edit
                        Contacts.storeEdit(entry);
                        Contacts.tableEdit(entry);
                    }

                    this.reset();
                    this.id_entry1.value = 0;
                    event.preventDefault();
                }, true);

                // initialize table
                if (window.localStorage.length - 1) {
                    var contacts_list = [], i, key;
                    for (i = 0; i < window.localStorage.length; i++) {
                        key = window.localStorage.key(i);
                        if (/Contacts:\d+/.test(key)) {
                            contacts_list.push(JSON.parse(window.localStorage.getItem(key)));
                        }
                    }

                    if (contacts_list.length) {
                        contacts_list
                            .sort(function(a, b) {
                                return a.id < b.id ? -1 : (a.id > b.id ? 1 : 0);
                            })
                            .forEach(Contacts.tableAdd);
                    }
                }
                Contacts.$table.addEventListener("click", function(event) {
                    var op = event.target.getAttribute("data-op");
                    if (/edit|remove/.test(op)) {
                        var entry = JSON.parse(window.localStorage.getItem("Contacts:"+ event.target.getAttribute("data-id")));
                        if (op == "edit") {
                            Contacts.$form.first_name1.value = entry.first_name1;
                            Contacts.$form.last_name1.value = entry.last_name1;
                            Contacts.$form.room.value = entry.room;
                            Contacts.$form.id_entry1.value = entry.id;
                        }
                        else if (op == "remove") {
                            if (confirm('Are you sure you want to remove "'+ entry.first_name1 +' '+ entry.last_name1 +'" from your contacts?')) {
                                Contacts.storeRemove(entry);
                                Contacts.tableRemove(entry);
                            }
                        }
                        event.preventDefault();
                    }
                }, true);
            },

            storeAdd: function(entry) {
                entry.id = Contacts.index;
                window.localStorage.setItem("Contacts:index", ++Contacts.index);
                window.localStorage.setItem("Contacts:"+ entry.id, JSON.stringify(entry));
            },
            storeEdit: function(entry) {
                window.localStorage.setItem("Contacts:"+ entry.id, JSON.stringify(entry));
            },
            storeRemove: function(entry) {
                window.localStorage.removeItem("Contacts:"+ entry.id);
            },

            tableAdd: function(entry) {
                var $tr = document.createElement("tr"), $td, key;
                for (key in entry) {
                    if (entry.hasOwnProperty(key)) {
                        $td = document.createElement("td");
                        $td.appendChild(document.createTextNode(entry[key]));
                        $tr.appendChild($td);
                    }
                }
                $td = document.createElement("td");
                $td.innerHTML = ' <a data-op="remove" data-id="'+ entry.id +'">Delete</a>';
                $tr.appendChild($td);
                $tr.setAttribute("id", "entry-"+ entry.id);
                Contacts.$table.appendChild($tr);
            },
            tableEdit: function(entry) {
                var $tr = document.getElementById("entry-"+ entry.id), $td, key;
                $tr.innerHTML = "";
                for (key in entry) {
                    if (entry.hasOwnProperty(key)) {
                        $td = document.createElement("td");
                        $td.appendChild(document.createTextNode(entry[key]));
                        $tr.appendChild($td);
                    }
                }
                $td = document.createElement("td");
                $td.innerHTML = '<a data-op="edit" data-id="'+ entry.id +'">Edit</a> | <a data-op="remove" data-id="'+ entry.id +'">Remove</a>';
                $tr.appendChild($td);
            },
        tableRemove: function(entry) {
                Contacts.$table.removeChild(document.getElementById("entry-"+ entry.id));
            }
        };
        Contacts.init();</script>
</body> 
</html>