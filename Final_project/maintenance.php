<!-- Εκκαθάριση βάσης -->

<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="alert.css">
<script src="alert.js"></script>
</head>
<body>
<div id="dialogoverlay"></div>
<div id="dialogbox">
  <div>
    <div id="dialogboxhead"></div>
    <div id="dialogboxbody"></div>
    <div id="dialogboxfoot"></div>
  </div>



<?php
//Σύνδεση με τη βάση
include("config.php");
	 
//Έλεγχος  ύπαρξης εγγραφήs στο πίνακα χρηστών
$query_sql ="DELETE  FROM papers WHERE papers.url_id NOT IN (SELECT url_id from downloads)";


		 if ($conn->query($query_sql)=== TRUE)
			 echo '<script language="javascript">alert_main.on("Εργασίες συντήρησης βάσης ολοκληρώθηκαν.!!!");</script>';
		 else
		 {
			echo '<script language="javascript">alert_main.on("Εργασίες συντήρησης βάσης δεν ήταν επιτυχείς.!!!");</script>';
			
			exit();
		 }
	
?>
</div>
</body>
</html>





