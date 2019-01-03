<?php
 
//MySQLi Procedural
$conn = mysqli_connect('localhost','xxxxxx','xxxxxxx','xxxxxxx');
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
mysqli_set_charset($conn,"utf8");
?>
