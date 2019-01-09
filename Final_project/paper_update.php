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
//Σύνδεση με τη Βάση 
include("config.php");


if (strpos($_POST['url_id'], 'M') === 0 ){
	
//Ερώτημα που φέρνει την επιλεγμένη εγγραφή για τροποποίηση δικό μας paper
$qm = "SELECT * 
FROM papers
WHERE papers.url_id = '".$_POST['url_id']."'";

$result=$conn->query($qm) or die ("Error description: " . mysqli_error($conn));

if ($result)
{
	
	$rows=[];
	
	while($row = mysqli_fetch_array($result)){
	$rows[]=$row;
	
	$url_id=$rows[0]['url_id'];
	$title=$rows[0]['title'];
	$authors=$rows[0]['authors'];
	$year=$rows[0]['year'];
	$type=$rows[0]['type'];
	$url=$rows[0]['url'];

}
}

	$select_m ="SELECT notes FROM downloads WHERE user_id='".$_POST['user_id']."' AND url_id='".$_POST['url_id']."'";
	$resultm=$conn->query($select_m) or die ('Error, query failed check_post');
	$rowsm=[];
	
	while($rowm = mysqli_fetch_array($resultm)){
	$rowsm[]=$rowm;
	
	$notes=$rowsm[0]['notes'];
	
}
//Έλεγχος αλλαγής στοιχείων
	if ($_POST['notes']==$notes && $_POST['title']==$title && $_POST['authors']==$authors && $_POST['year']==$year && $_POST['type']==$type && $_POST['url']==$url)
		echo '<script language="javascript">alert_paper.on("Δεν έγινε καμία αλλαγή!"); </script>';
	else
	{
		
	$notes_escapedm = mysqli_real_escape_string($conn, $_POST['notes']);//kano escape xaraktires pou exoun oi titloi ton dimosieuseon	

			$update_notes_m= " UPDATE downloads
			                     SET  notes='".$notes_escapedm."'
								WHERE user_id='".$_POST['user_id']."' AND url_id='".$_POST['url_id']."'";


		$update_notes_m=$conn->query($update_notes_m) or die('Error,query failed_update');
		
		//update paper
		$title_esc_m = mysqli_real_escape_string($conn, $_POST['title']);
		$authors_esc_m = mysqli_real_escape_string($conn, $_POST['authors']);
		$year_esc_m = mysqli_real_escape_string($conn, $_POST['year']);
		$url_esc_m = mysqli_real_escape_string($conn, $_POST['url']);
		
		$update_papers_m= " UPDATE papers
			                     SET  title='".$title_esc_m."',
								      authors='".$authors_esc_m."',
									  year='".$year_esc_m."',
								 	  url='".$url_esc_m."',
									  type='". $_POST['type']."'
								WHERE url_id='".$_POST['url_id']."'";


		$update_query_m=$conn->query($update_papers_m) or die('Error,query failed_update');
		
		//Μήνυμα ενημέρωσης
		 if ($update_notes_m && $update_query_m)
			 echo '<script language="javascript">alert_paper.on("Τα Στοιχεία του Συγγράμματος τροποποιήθηκαν!");</script>';
		 else
		 {
			echo '<script language="javascript">alert_paper.on("Η τροποποίηση των Στοιχείων του Συγγράμματος δεν ήταν επιτυχής.");</script>';
			
			exit();
		 }
		

	}	
	

}

else{
//Ερώτημα που φέρνει την επιλεγμένη εγγραφή για τροποποίηση dblp
	$select_query ="SELECT notes FROM downloads WHERE user_id='".$_POST['user_id']."' AND url_id='".$_POST['url_id']."'";
	$result=$conn->query($select_query) or die ('Error, query failed check_post');
	$rows=[];
	
	while($row = mysqli_fetch_array($result)){
	$rows[]=$row;
	
	$notes=$rows[0]['notes'];
	
}
//Έλεγχος αλλαγής στοιχείων
	if ($_POST['notes']==$notes)
		echo '<script language="javascript">alert_paper.on("Δεν έγινε καμία αλλαγή!");</script>';
	else
	{
		
	$notes_escaped = mysqli_real_escape_string($conn, $_POST['notes']);//kano escape xaraktires pou exoun oi titloi ton dimosieuseon	

			$update_notes_query= " UPDATE downloads
			                     SET  notes='".$notes_escaped."'
								WHERE user_id='".$_POST['user_id']."' AND url_id='".$_POST['url_id']."'";

		$update_notes=$conn->query($update_notes_query) or die('Error,query failed_update');
		
		//Μήνυμα ενημέρωσης
		 if ($update_notes)
			 echo '<script language="javascript">alert_paper.on("Τα Σχόλια του Συγγράμματος τροποποιήθηκαν!");</script>';
		 else
		 {
			echo '<script language="javascript">alert_paper.on("Η τροποποίηση των Σχολίων του Συγγράμματος δεν ήταν επιτυχής.")</script>';
			
			exit();
		 }
		

	}
}//telos else
	
	
$conn->close();
?>
</div>
</body>
</html>