function getSelect(str)
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
    document.getElementById("bookinggrid").innerHTML=xmlhttp.responseText;
    }
    else
        {
            alert("There was a problem while using XMLHTTP:\n" + xmlhttp.status);
        }
            }
    }
    xmlhttp.open("GET",str,true);
    xmlhttp.send();

}function bookinggrid(str)
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
    document.getElementById("bookinggrid").innerHTML=xmlhttp.responseText;
    }
	 }
    else
        {
            alert("There was a problem while using XMLHTTP:\n" + xmlhttp.status);
        }
           
    }
    xmlhttp.open("GET","wp_properties_ajax.php?id="+str,true);
    xmlhttp.send();
    subm();
  }	