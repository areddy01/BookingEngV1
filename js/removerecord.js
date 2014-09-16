
function RemoveMoreChildProduct(id){
 
 alert('ko');
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
    
   
 }


