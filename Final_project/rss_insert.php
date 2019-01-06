<!-- Εισαγωγή rss -->
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

include("config.php");

function getExtension($str) {
			 $i = strrpos($str,".");
			 if (!$i) { return ""; }
			 $l = strlen($str) - $i;
			 $ext = substr($str,$i+1,$l);
			 return $ext;	}


/* Ελέγχος διαθεσιμότητας Κωδικού χρήστη */
$check_username_query = "SELECT link FROM posts";
$check_username=$conn->query($check_username_query) or die ('Error, query failed check_paper_in_base');
while($same = mysqli_fetch_row($check_username)) {
	if ($same[0] == $_POST["link"]){
		echo '<script language="javascript">alert_rss.on("Υπάρχει ήδη rss με αυτό το LINk.")</script>';		
		
	exit();
	}
}

if($_POST['insupd']=='insert'){
$title_escaped = mysqli_real_escape_string($conn, $_POST['title']);//kano escape xaraktires pou exoun oi titloi ton dimosieuseon
$description_escaped = mysqli_real_escape_string($conn, $_POST['description']);//kano escape xaraktires pou exoun oi titloi ton dimosieuseon
$link_escaped = mysqli_real_escape_string($conn, $_POST['link']);//kano escape xaraktires pou exoun oi titloi ton dimosieuseon


//eisagogi ton dimosieuseon pou stalthikan apo tin proigoumeni forma	 
	$insert_rss_query= " INSERT INTO posts ( title, description,link)
         VALUES ('$title_escaped', '$description_escaped','$link_escaped')";
					          
					      													
 

	$insert_rss=$conn->query($insert_rss_query) or die('Error_query,failed_insert_paper'); 
	
	
	
	if ($insert_rss)
	{
		

			echo '<script language="javascript">alert_rss.on("Η εγγραφή νέου rss ολοκληρώθηκε!");</script>';
	}
	 else
	 {
		echo '<script language="javascript">alert_rss.on("Η εισαγωγή rss δεν ήταν επιτυχής.")</script>';
		
		exit();
	 }	
}
?>
</div>
</body>
</html>