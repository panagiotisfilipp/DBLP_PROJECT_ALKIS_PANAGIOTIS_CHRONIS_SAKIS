<?php
    include('server.php');
	
	$user_id=$_GET['user_id'];
	$url_id=$_GET['url_id'];
	
	
	    
	$del_paper="delete from papers where url_id='$url_id'";
	$del_down="delete from downloads where url_id='$url_id' and user_id='$user_id'";
    if (strpos($url_id, 'MURL#') !== false) {
     echo 'true';
	 if (($conn->query($del_paper) === TRUE) && ($conn->query($del_down) === TRUE)){
	  $message = "Η διαγραφή της δημοσίευσης ήταν επιτυχής!";
				 echo "<script type='text/javascript'>alert('$message');</script>";
		         echo '<script language="javascript"> document.location="index.php"; </script>';
		         exit();
	 }else{
		 $message = "Error: (2B) <br>" . $conn->error;
         echo "<script type='text/javascript'>alert('$message');</script>";}
	 
   }else{
	   echo 'False';
	    $del_downl="delete from downloads where url_id='$url_id' and user_id='$user_id'";
	    if ($conn->query($del_downl) === TRUE){
			$message = "Η διαγραφή της δημοσίευσης ήταν επιτυχής!";
				 echo "<script type='text/javascript'>alert('$message');</script>";
		         echo '<script language="javascript"> document.location="index.php"; </script>';
		         exit();
	 }else{
		 $message = "Error: (2B) <br>" . $conn->error;
         echo "<script type='text/javascript'>alert('$message');</script>";}
		}
	       
	

$conn->close();
?>