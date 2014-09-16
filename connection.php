<?php
//$conn=mysql_connect('localhost','root','') or die('Data base connections failed');
//$conn=mysql_connect('localhost','root','') or die('Data base connections failed');
//$db=mysql_select_db('bookengine',$conn) or die('Data base selection failed sorry');
error_reporting(E_ALL ^ E_NOTICE);

	
		
		$host = "localhost";	
		//$dbusername = "root";
		//$dbpassword = "";
		//$dbname = "fitowengine";
		$dbusername = "wotuseec_wotuser";
		
		$dbpassword = "Q2dJ#bx)B-Z$";
          $dbname = "wotuseec_dev_boutiq";      
		
		class DB_Class 
      {	
		function __construct() 
		{
		global $host,$dbusername,$dbpassword,$dbname;
		if(!($link_id=mysql_pconnect($host,$dbusername,$dbpassword)))
		{
			echo("error connecting to host");
			exit();
		}
		// Select the Database
		if(!mysql_select_db($dbname,$link_id))
		{
			echo("error in selecting the database");
			echo(sprintf("Error : %d %s",mysql_errno($link_id),mysql_error($link_id)));
		}
		return $link_id;
		}
		}
?>