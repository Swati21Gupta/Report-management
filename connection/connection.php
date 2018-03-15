<?php
ob_start();
$username="root";
$password="";
$hostname="localhost";
$database="user";
$link=mysqli_connect($hostname,$username,$password,$database);
if($link==false)
{
	die("ERROR:COULDNOT CONNECT".mysqli_connect_error());
}
else
{
	//echo"connect succesfully".mysqli_get_host_info($link);
	mysqli_select_db($link,$database);
}

?>