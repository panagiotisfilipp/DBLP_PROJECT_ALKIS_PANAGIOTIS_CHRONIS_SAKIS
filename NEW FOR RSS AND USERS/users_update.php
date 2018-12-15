<?php
//Σύνδεση με τη Βάση 
include("config.php");

//Ερώτημα που φέρνει την επιλεγμένη εγγραφή για τροποποίηση
	$select_query ="SELECT * FROM users WHERE user_id='".$_POST['user_id']."'";
	$result=$conn->query($select_query) or die ('Error, query failed check_post');
	$rows=[];
	
	while($row = mysqli_fetch_array($result)){
	$rows[]=$row;
	
	$user_id=$rows[0]['user_id'];
	$username=$rows[0]['username'];
	$password=$rows[0]['password'];
	$email=$rows[0]['email'];
	$role=$rows[0]['role'];
}	
	
//Έλεγχος αλλαγής στοιχείων
	if ($_POST['username']==$username && $_POST['password']==$password && $_POST['email']==$email && $_POST['role']==$role)
		echo '<script language="javascript">alert("Δεν έγινε καμία αλλαγή!"); document.location="preview_users.php";</script>';
	else
	{
		
	$username_escaped = mysqli_real_escape_string($conn, $_POST['username']);//kano escape xaraktires 
$password_escaped = mysqli_real_escape_string($conn, $_POST['password']);//kano escape xaraktires 
$email_escaped = mysqli_real_escape_string($conn, $_POST['email']);//kano escape xaraktires 	
$role_escaped = mysqli_real_escape_string($conn, $_POST['role']);//kano escape xaraktires 
			
			$update_users_query= " UPDATE users
								SET  username='".$username_escaped."', 
								password='".$password_escaped."',
								email='".$email_escaped."',
	                            role='".$role_escaped."'
								WHERE user_id='".$_POST['user_id']."'";
		
		

		$update_users=$conn->query($update_users_query) or die('Error,query failed_update');
		
		//Μήνυμα ενημέρωσης
		 if ($update_users)
			 echo '<script language="javascript">alert("Τα στοιχεία του χρήστη τροποποιήθηκαν!"); document.location="preview_users.php";</script>';
		 else
		 {
			echo '<script language="javascript">alert("Η τροποποίηση του χρήστη δεν ήταν επιτυχής.")</script>';
			echo '<script language="javascript"> document.location="preview_users.php"; </script>';
			exit();
		 }
		

	}

?>