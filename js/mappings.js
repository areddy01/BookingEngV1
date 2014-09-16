$(document).ready(function () {
           $(".content1").hide();
            $(".heading").click(function () {
                $(this).next(".content1").slideToggle(100);                
            });
        })
		
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
document.getElementById("myDiv").innerHTML=xmlhttp.responseText;

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
      
 function room()
 {  
     
     this.roomadd.submit();
        alert("hai");
     roomadd('roomadd.php');
 }
function roomadd(strURL)
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
document.getElementById("tdDiv").innerHTML=xmlhttp.responseText;

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

  


function removeOption()
{
var x=document.getElementById("mySelect");
x.remove(x.selectedIndex);
}