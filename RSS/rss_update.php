<?php
//Σύνδεση με τη Βάση 
include("config.php");

//Ερώτημα που φέρνει την επιλεγμένη εγγραφή για τροποποίηση
	$select_query ="SELECT * FROM posts WHERE id='".$_POST['id']."'";
	$result=$conn->query($select_query) or die ('Error, query failed check_post');
	$rows=[];
	
	while($row = mysqli_fetch_array($result)){
	$rows[]=$row;
	
	$id=$rows[0]['id'];
	$title=$rows[0]['title'];
	$description=$rows[0]['description'];
	$link=$rows[0]['link'];
	
}	
	
//Έλεγχος αλλαγής στοιχείων
	if ($_POST['title']==$title && $_POST['description']==$description && $_POST['link']==$link )
		echo '<script language="javascript">alert("Δεν έγινε καμία αλλαγή!"); document.location="preview_rss.php";</script>';
	else
	{
		
	$title_escaped = mysqli_real_escape_string($conn, $_POST['title']);//kano escape xaraktires pou exoun oi titloi ton dimosieuseon
$description_escaped = mysqli_real_escape_string($conn, $_POST['description']);//kano escape xaraktires pou exoun oi titloi ton dimosieuseon
$link_escaped = mysqli_real_escape_string($conn, $_POST['link']);//kano escape xaraktires pou exoun oi titloi ton dimosieuseon	

			$update_posts_query= " UPDATE posts
								SET  title='".$title_escaped."', 
								description='".$description_escaped."',
								link='".$link_escaped."'
	
								WHERE id='".$_POST['id']."'";
		
		

		$update_posts=$conn->query($update_posts_query) or die('Error,query failed_update');
		
		//Μήνυμα ενημέρωσης
		 if ($update_posts)
			 echo '<script language="javascript">alert("Τα στοιχεία του rss τροποποιήθηκαν!"); document.location="preview_rss.php";</script>';
		 else
		 {
			echo '<script language="javascript">alert("Η τροποποίηση του rss δεν ήταν επιτυχής.")</script>';
			echo '<script language="javascript"> document.location="preview_rss.php"; </script>';
			exit();
		 }
		

	}

?>