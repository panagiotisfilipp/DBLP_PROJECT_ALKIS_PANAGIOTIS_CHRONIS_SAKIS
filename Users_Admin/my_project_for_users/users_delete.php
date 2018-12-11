<!-- Διαγραφή χρήστη -->
<script src="edit_f.js"></script>

<?php
//Σύνδεση με τη βάση
include("config.php");
	 
//Έλεγχος  ύπαρξης εγγραφήs στο πίνακα χρηστών
$query_sql ="SELECT * FROM users WHERE user_id='".$_GET['p1']."'";

$result = $conn->query($query_sql);




//Διαγράφη του χρήστη
if($result->num_rows>0)
{
		
		$del_query= "DELETE 
						 FROM
							users
						 WHERE user_id='".$_GET['p1']."'";
        
		//$delete_id=$conn->query($del_query) or die ('Error, query failed');
		//$del_cat=mysqli_query($conn,$delete_id) or die('Error,query failed_2');	
		
		
			

		 if ($conn->query($del_query)=== TRUE)
			 echo '<script language="javascript">alert("Ο χρήστης  διαγράφηκε με επιτυχία"); document.location="preview_users.php";</script>';
		 else
		 {
			echo '<script language="javascript">alert("Η διαγραφή του χρήστη δεν ήταν επιτυχής.")</script>';
			echo '<script language="javascript"> document.location="preview_users.php"; </script>';
			exit();
		 }
}
else
{
	echo '<script language="javascript">alert("Ανύπαρκτος χρήστης.")</script>';
	echo '<script language="javascript"> document.location="preview_users.php"; </script>';
	exit();
}	
?>