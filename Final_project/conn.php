<?php
 
//MySQLi Procedural
$conn = mysqli_connect('localhost','alkibiad_doc_mas','123_at_456!','alkibiad_doc_hist2018');
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
mysqli_set_charset($conn,"utf8");
?>