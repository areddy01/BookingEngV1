 
 
 function changeProperty(strURL)
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
 function propertyChange(strURL)
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
function changeRoom(strURL)
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
 

		

  function display()
  {
	  var table=document.getElementById("dataTable");
      var dpt=document.getElementById("DropDownList1");
      var dpt1=document.getElementById("append");
      //alert(dpt.options[dpt.selectedIndex].value);
      //   document.getElementById("TextBox1").value =dpt.options[dpt.selectedIndex].value;
	  var row=table.insertRow(0);
      var cell1=row.insertCell(0);
      var cell2=row.insertCell(1);
      cell1.innerHTML=dpt.options[dpt.selectedIndex].value;
      cell2.innerHTML=dpt1.options[dpt.selectedIndex].value;
   }
	 
   function display1()
   {
	  var table=document.getElementById("dataTable1");
      var dpt1=document.getElementById("mySelect1");
      var dpt1=document.getElementById("append1");
      var dpt2=document.getElementById("append2");
      
      //   document.getElementById("TextBox1").value =dpt.options[dpt.selectedIndex].value;
	  var row=table.insertRow(0);
      var cell1=row.insertCell(0);
      var cell2=row.insertCell(1);
      var cell3=row.insertCell(2);
      cell1.innerHTML=dpt.options[dpt.selectedIndex].value;
      cell2.innerHTML=dpt1.options[dpt.selectedIndex].value;
      cell3.innerHTML=dpt2.options[dpt.selectedIndex].value;

     }
	 
	
     function addRow(tableID) {
            var table = document.getElementById(tableID);
     		var dpt=document.getElementById("DropDownList1");
            var dpt1=document.getElementById("append");
 
            var rowCount = table.rows.length;
            var row = table.insertRow(rowCount);
 
            var cell1 = row.insertCell(0);
            var element1 = document.createElement("input");
            element1.type = "checkbox";
            element1.name="chkbox[]";
            cell1.appendChild(element1);
 
            var cell2 = row.insertCell(1);
            var element3 = document.createElement("input");
            element3.type = "text";
            element3.name = "txtbox[]";
			element3.value=dpt.options[dpt.selectedIndex].value;
            cell2.appendChild(element3);
 
            var cell3 = row.insertCell(2);
            var element2 = document.createElement("input");
            element2.type = "text";
            element2.name = "txtbox1[]";
			element2.value=dpt1.options[dpt1.selectedIndex].value;
            cell3.appendChild(element2);
			
			var input = document.createElement("input");
			input.setAttribute("type", "hidden");
			input.setAttribute("name", "tet[]");
			input.setAttribute("value",dpt.options[dpt.selectedIndex].value );
			document.getElementById("mydiv").appendChild(input);
 
 			var input = document.createElement("input");
			input.setAttribute("type", "hidden");
			input.setAttribute("name", "tet1[]");
			input.setAttribute("value", dpt1.options[dpt1.selectedIndex].value);
			document.getElementById("mydiv").appendChild(input);
		
        }
		
		     function addRow1(tableID) {
 
            var table = document.getElementById(tableID);
			
            var dp=document.getElementById("mySelect1");
            var dp1=document.getElementById("append1");
            var dp2=document.getElementById("append2");
			
            var rowCount = table.rows.length;
            var row = table.insertRow(rowCount);
 
            var cell1 = row.insertCell(0);
            var element1 = document.createElement("input");
            element1.type = "checkbox";
            element1.name="chkbox[]";
            cell1.appendChild(element1);
 
            var cell2 = row.insertCell(1);
            var element3 = document.createElement("input");
            element3.type = "text";
            element3.name = "txtbox[]";
			element3.value=dp.options[dp.selectedIndex].value;
            cell2.appendChild(element3);
 
            var cell3 = row.insertCell(2);
            var element2 = document.createElement("input");
            element2.type = "text";
            element2.name = "txtbox[]";
			element2.value=dp1.options[dp1.selectedIndex].value;
            cell3.appendChild(element2);
			
			  var cell4= row.insertCell(3);
            var element4 = document.createElement("input");
            element4.type = "text";
            element4.name = "txtbox[]";
			element4.value=dp2.options[dp2.selectedIndex].value;
            cell4.appendChild(element4);
 
 
        }
 function changeCity(strURL)
{
aler('hai');
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

document.getElementById("city").innerHTML=xmlhttp.responseText;

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
		
function changeRoom1(strURL)
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

document.getElementById("append3").innerHTML=xmlhttp.responseText;

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
 