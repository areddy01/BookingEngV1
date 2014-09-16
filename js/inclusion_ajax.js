function getInclusion(str)
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
    document.getElementById("content").innerHTML=xmlhttp.responseText;
    }
    else
        {
            //alert("There was a problem while using XMLHTTP:\n" + xmlhttp.status);
        }
            }
    }
    xmlhttp.open("GET",str,true);
    xmlhttp.send();

}
function pluginCall(strURL)
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
				document.getElementById("content").innerHTML=xmlhttp.responseText;

			}
		}
	else
	{
	//alert("There was a problem while using XMLHTTP:\n" + xmlhttp.statusText);
	}
}

xmlhttp.open("GET",strURL,true);
xmlhttp.send();
inclusion1();
}
function inclusion1()
{
	document.frm.submit();
}
function load()
{
		
var e=document.getElementById("ddlViewBy");
var strUser = e.options[e.selectedIndex].value;

getInclusion("wp_inclusions_ajax.php?id="+strUser);

}
