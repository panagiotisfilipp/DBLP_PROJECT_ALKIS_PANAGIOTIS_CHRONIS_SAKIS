<!-- Διαγραφή χρήστη -->
<script src="edit_f.js"></script>
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
$query_sql ="SELECT * FROM posts WHERE id='".$_GET['p1']."'";

$result = $conn->query($query_sql);




//Διαγράφη του χρήστη
if($result->num_rows>0)
{
		
		$del_query= "DELETE 
						 FROM
							posts
						 WHERE id='".$_GET['p1']."'";
        
		//$delete_id=$conn->query($del_query) or die ('Error, query failed');
		//$del_cat=mysqli_query($conn,$delete_id) or die('Error,query failed_2');	
		
		
			

		 if ($conn->query($del_query)=== TRUE)
			 echo '<script language="javascript">alert_rss.on("Το rss διαγράφηκε με επιτυχία"); </script>';
		 else
		 {
			echo '<script language="javascript">alert_rss.on("Η διαγραφή του rss δεν ήταν επιτυχής.")</script>';
			
			exit();
		 }
}
else
{
	echo '<script language="javascript">alert_rss.on("Ανύπαρκτο rss.")</script>';
	
	exit();
}	
?>
</div>
</body>
</html>