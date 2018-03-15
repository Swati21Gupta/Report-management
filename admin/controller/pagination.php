<?php

include"../utilities/connection.php";

$date=$_POST['date'];
$from=$date.' 00:00:00';
$to=$date.' 23:59:59';
$strlimit = $_POST['strlimit'];
// $strlimit2 = $_POST['strlimit2'];

$array = array();

// if($date!=""){
	$sql = 'SELECT u1.id,u1.name, p.projectname, r1.description, r1.reportdate FROM report r1 INNER JOIN user u1 ON r1.userid=u1.id INNER JOIN project p on r1.reporttitle=p.id where reportdate between"'.$from.'" and "'.$to.'"limit 5 offset '.$strlimit;
// }
// else{
// 	$sql = 'SELECT id,name,email,designation,status FROM user limit 7 offset '.$strlimit2;
// }

$query = mysqli_query($link,$sql);

while($row=mysqli_fetch_array($query)){
	$array[] = $row;
}

echo json_encode($array);

?>
