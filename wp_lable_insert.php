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

