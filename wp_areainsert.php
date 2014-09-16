<?php
@session_start();
if(!isset($_SESSION['userName'])) 
{
header('location:login.php');
}
require_once('functions.php');
require_once('connection.php');
$user=new User(); 
if(!isset($_SESSION['userName'])) 
{
header('location:login.php');
}
$user=new User();
$sele=$_SESSION['sele'];
 if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
	$sele=$_REQUEST['sele'];
	$_SESSION['sele']=$sele;
}
 $country=$_POST['country'];
 $region=$_POST['region'];
 $place=$_POST['place'];
 
 
  if(isset($_POST['region'])){
 
                $m=mysql_query("select * from wp_citys where city_name='$region'");
	        $c=mysql_fetch_array($m);
	       if($c['city_name']){
	        echo "<script>
	        	 alert('This Regionis already Exist Choose Another Name')
	        	 location.replace('regions.php')
	        	</script> ";
	        	
	        
	        }else{
     


           $quer="INSERT INTO `wp_citys` VALUES('', '$region', '$country')";
           $qur=mysql_query($quer); 
      
         /* $q=mysql_query("SELECT city_id FROM wp_citys WHERE city_name='$region'");
    
            $f=mysql_fetch_array($q);
                  echo $cityid=$f['city_id'];
                $quer1="INSERT INTO `wp_region` VALUES('', '$place', '$cityid')";
               $qur1=mysql_query($quer1); */
   
             header('location:regions.php');
     }
   // header('location:regions.php');
 }
?>