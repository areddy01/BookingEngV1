<?php
require_once('connection.php');
error_reporting(E_ALL ^ E_NOTICE);
class User
{
	public function __construct() 
	{
	  $db = new DB_Class();
	}
// Login process
	function check_login($username, $password) 
	{

//$pasword = md5($password);
	 $result1 = "SELECT * from wp_manage_user WHERE  username='$username' and password = '$password'";
//$wpdb->get_results("SELECT * FROM wp_users WHERE user_login='$username' and user_pass = '$password' ");
	  $result=mysql_query($result1);
	  $user_data = mysql_fetch_row($result);
	  $no_rows = mysql_num_rows($result);

	  if ($no_rows == 1) 
	  {
  
	   return $user_data;
	  }
	  else
	  {
	  return FALSE;
	}

	}
// Getting single record
	function GetSingleRecord($table,$critfield,$criteria)
	 {
		# returns a single record from $table in $db where $critfield =
			# $criteria. Record is returned as normal associative array
			# useful for avoiding several lines of code just to get one record
		
			$sql = "SELECT * FROM $table WHERE $critfield='".$criteria."'";
			$res=mysql_query($sql);
			if(mysql_num_rows($res)>0)
			{
				$row = mysql_fetch_array($res);		
				return $row;
			}	
		}	
		function GetRecord($table) {
	
			# returns a single record from $table in $db where $critfield =
			# $criteria. Record is returned as normal associative array
			# useful for avoiding several lines of code just to get one record
		
			$sql = "SELECT id,Name FROM $table";
			$res=mysql_query($sql);
			if(mysql_num_rows($res)>0){
				$row = mysql_fetch_array($res);		
				return $row;
			}	
		}	
// Getting session 
//add_action('init', 'myStartSession', 1);
function get_session() 
{
    if(!session_id()) {
        session_start();
    }

return $_SESSION['login'];
}
// Logout 
function user_logout() 
{
$_SESSION['login'] = FALSE;
session_destroy();
}


	}

?>