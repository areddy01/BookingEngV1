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
<!--
<script type="text/javascript" src="js/properties.js"></script>


<script  type="text/javascript">
function Sort_Child_Product_Image(){
  alert();
 var js_add_more_child_product_str  =  "add_more_child_product_str" ; 
 var val_add_more_child_product_str = document.getElementById(js_add_more_child_product_str).value 
 var split_add_more_child_product_str =   val_add_more_child_product_str.split(",");
 var size_add_more_child_product_str = split_add_more_child_product_str.length;
 
 var js_child_image_path  =  document.getElementById("child_image_path").value;   
 
 
 for(var a=0; a < size_add_more_child_product_str ; a++){
  var val_add_more_child_product_str = split_add_more_child_product_str[a];
  if(val_add_more_child_product_str){
  
   var js_div_style  = 'div_add_more_child_product_style_'+val_add_more_child_product_str;
   
   if(a%2 == '0'){
    document.getElementById(js_div_style).style.backgroundColor = "#FFFFFF" ;
   }else{
    document.getElementById(js_div_style).style.backgroundColor = "#eaf4fd" ;
   }
   
   var js_add_more_inventory_img  = 'add_more_child_product_img_'+val_add_more_child_product_str;
            // alert(js_add_more_inventory_img);   
   if(size_add_more_child_product_str == parseInt(a+1)){   
    
   if((size_add_more_child_product_str-1) == 1 && parseInt(angel) == 1){
     document.getElementById(js_add_more_inventory_img).innerHTML ="<div style='float:left; text-align:right; width:44%;  padding-top:0px;'><img src="+js_child_image_path+"sub_icon_green.png alt='Add' width='14' height='14' onclick='AddMoreChildProduct("+val_add_more_child_product_str+")' title='Add Product'/></div><div style='float:right; text-align:left; width:44%; padding-left:20px; padding-top:5px;'></div>"; 
    }else{
     document.getElementById(js_add_more_inventory_img).innerHTML ="<div style='float:left; text-align:right; width:44%; padding-top: 3px;'><img src='"+js_child_image_path+"sub_icon_red.png' alt='Remove' width='14' height='14' onclick='RemoveMoreChildProduct("+val_add_more_child_product_str+")' title='Remove Product'/></div><div style='float:right; text-align:left; width:44%; padding-top:3px;'><img src='"+js_child_image_path+"sub_icon_green.png' alt='Add' width='14' height='14' onclick='AddMoreChildProduct("+val_add_more_child_product_str+")' title='Add Product'/></div>"; 
    }
     
    
   }else{
    
    document.getElementById(js_add_more_inventory_img).innerHTML = "<div style='float:left; text-align:right; width:44%;padding-bottom:4px;'><img src='"+js_child_image_path+"sub_icon_red.png' alt='Remove' width='14' height='14' onclick='RemoveMoreChildProduct("+val_add_more_child_product_str+")' title='Remove Product'/></div><div style='float:right; text-align:left; width:44%; padding-top: 5px;'></div>";
    
   }
  }
 }
}
</script>
<script  type="text/javascript">

function RemoveMoreChildProduct(id){
 


 var confirm_remove = confirm('Are you sure you want to remove this record?'); 
 if(confirm_remove == true){
 
  
  
  var remove_add_more_div = 'div_add_more_child_product_'+id;
  //alert(remove_add_more_div);
  var child  = document.getElementById(remove_add_more_div);
  
  var parent  = document.getElementById('div_add_more_child_product');
  parent.removeChild(child);
  //alert(parent);
  var js_add_more_child_product_str  =   "count"; 
  var val_add_more_child_product_str  =  document.getElementById(js_add_more_child_product_str).value ; 
   
  var str_remove_val = val_add_more_child_product_str.replace(","+id, "");
  document.getElementById(js_add_more_child_product_str).value = str_remove_val;
Sort_Child_Product_Image();
    
   }
 }
</script>
 <script  type="text/javascript">
 var xmlhttp_add_more_child;
function AddMoreChildProduct(id){
	
	//ThickBoxOpen_new();
	
		var val_add_more_child_product_str 	=   document.getElementById("count").value;  
		
		var split_add_more_child_product_str =   val_add_more_child_product_str.split(",");
		
		var  val_flag_temp=document.getElementById("count1").value.length;
	        
	
	var val_flag_temp	= 	parseInt(id)+1;
	
	document.getElementById("count").value  += ','+parseInt(val_flag_temp);
	document.getElementById("count1").value  += ','+parseInt(val_flag_temp);
	
	//var js_add_more_child_product_count 	=   "add_more_child_product_count" ; 
	//var val_flag_temp	= 	parseInt(document.getElementById(js_add_more_child_product_count).value);
	//var val_flag_temp	= 	parseInt(val_flag_temp)+1;

	//document.getElementById(js_add_more_child_product_count).value =val_flag_temp;
	xmlhttp_add_more_child=GetXmlHttpObject();
	if (xmlhttp_add_more_child==null){
	  alert ("Browser does not support HTTP Request");
	  return;
	}
	 
	var url_add_more_child	=  "managep.php";
	url_add_more_child = url_add_more_child+"?id="+parseInt(val_flag_temp) ;  
	 
	

	xmlhttp_add_more_child.onreadystatechange=function(){
		if (xmlhttp_add_more_child.readyState==4 || xmlhttp_add_more_child.readyState=="complete"){
			var newdiv = document.createElement('div');

			var ni = document.getElementById('div_add_more_child_product');
			var div_id = 'div_add_more_child_product_'+parseInt(val_flag_temp);
			
			newdiv.setAttribute('id', div_id);
			newdiv.setAttribute('style', '');
			
			newdiv.innerHTML =xmlhttp_add_more_child.responseText;
			ni.appendChild(newdiv);
			Sort_Child_Product_Image();
			self.parent.tb_remove();
		}
	}
	xmlhttp_add_more_child.open("GET",url_add_more_child,true);
	xmlhttp_add_more_child.send(null);
}
function GetXmlHttpObject(){
 if (window.XMLHttpRequest){
   // code for IE7+, Firefox, Chrome, Opera, Safari
    return new XMLHttpRequest();
   }
 if (window.ActiveXObject){
   // code for IE6, IE5
    return new ActiveXObject("Microsoft.XMLHTTP");
   }
 return null;
}
</script>
<script  type="text/javascript">
function value(){
alert('hai');}

</script>
-->
</head>
<body>


<?php
$result = mysql_query("SELECT *  FROM wp_citys")
or die(mysql_error());
?>            <div id="div_add_more_child_product" >
               <div id="div_add_more_child_product_1">
              <input type="hidden" name="count" id="count" value=",1">
               <input type="hidden" name="count1" id="count1" value="1">
               
              <select id="select_1" name="select_1" onChange="changeP(this.value,1)" style="width:150px; height:27px;">
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
     </select>
    
   <select name="ppro_id_1"  id="ppro_id_1" onChange="changeR(this.value,1)" style="width:150px; height:27px;" >
    <option selected="selected">Property</option>
  </select>

    <select name='roomtype_1' id='roomtype_1' onChange="changeRR(this.value,1)" style="width:150px; height:27px;">
     <option>Roomtype</option>
   </select>
   
 <select name='room_1' id='room_1'style="width:150px; height:27px;" >
     <option>Room</option>
   </select>
  
<img height="14" width="14" title="Add Property" onclick="javascript:AddMoreChildProduct(1)"; alt="Add" src="images/plus.png">
<!--<img height="14" width="14" title="Delete Property" onclick="javascript:RemoveMoreChildProduct(1)"; alt="Add" src="images/minus.png">-->

</div>
</div>
   </body>
   </html>