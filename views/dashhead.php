<?php
error_reporting(0);
session_start();
if($_SESSION["username"]=='')
{
  header("Location:../");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>dashboard</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
  <!-- Bootstrap core CSS-->
  <link href="../asserts/css/userstyle.css" rel="stylesheet">
  <link href="../asserts/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="../asserts/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->


  <!-- Custom styles for this template-->
  <link href="../asserts/css/sb-admin.css" rel="stylesheet">
  <link href="../asserts/css/changepass.css" rel="stylesheet">
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
 

</head>


