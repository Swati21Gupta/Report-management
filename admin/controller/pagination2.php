<?php

include"../utilities/connection.php";

$strlimit=$_POST['strlimit'];

$array = array();

$sql = 'SELECT id,name,email,designation,status FROM user limit 7 offset '.$strlimit;

$query = mysqli_query($link,$sql);

while($row=mysqli_fetch_array($query)){
	$array[] = $row;
}

echo json_encode($array);

?>
