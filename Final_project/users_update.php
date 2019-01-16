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
$pas_post=$_POST['password'];//trabame timi apo post
//Ερώτημα που φέρνει την επιλεγμένη εγγραφή για τροποποίηση
	$select_query ="SELECT * FROM users WHERE user_id='".$_POST['user_id']."'";
	$result=$conn->query($select_query) or die ('Error, query failed check_post');
	$rows=[];
	
	while($row = mysqli_fetch_array($result)){
	$rows[]=$row;
	
	$user_id=$rows[0]['user_id'];
	$name=$rows[0]['name'];
	$surname=$rows[0]['surname'];
	$username=$rows[0]['username'];
	$password=$rows[0]['password'];
	$email=$rows[0]['email'];
	$role=$rows[0]['role'];
	$register_time=$rows[0]['register_time'];
}
	

	
//Έλεγχος αλλαγής στοιχείων
	if ($_POST['name']==$name && $_POST['surname']==$surname && $_POST['username']==$username && $POST['password']==$password && $_POST['email']==$email && $_POST['role']==$role && $_POST['register_time']==$register_time)
		echo '<script language="javascript">alert_user.on("Δεν έγινε καμία αλλαγή!.");
	    </script>';
	else
	{
$password_post = password_hash($pas_post,PASSWORD_DEFAULT);//hasharisma sto password apo post	
$username_escaped = mysqli_real_escape_string($conn, $_POST['username']);//kano escape xaraktires 
$password_escaped = mysqli_real_escape_string($conn, $password_post);//kano escape xaraktires 
$email_escaped = mysqli_real_escape_string($conn, $_POST['email']);//kano escape xaraktires 	
$role_escaped = mysqli_real_escape_string($conn, $_POST['role']);//kano escape xaraktires 
$name_escaped = mysqli_real_escape_string($conn, $_POST['name']);//kano escape xaraktires
$surname_escaped = mysqli_real_escape_string($conn, $_POST['surname']);//kano escape xaraktires
$register_time_escaped = mysqli_real_escape_string($conn, $_POST['register_time']);//kano escape xaraktires
			
			$update_users_query= " UPDATE users
								SET  username='".$username_escaped."', 
								name='".$name_escaped."',
								surname='".$surname_escaped."',
								password='".$password_escaped."',
								email='".$email_escaped."',
								register_time='".$register_time_escaped."',
	                            role='".$role_escaped."'
								WHERE user_id='".$_POST['user_id']."'";
		
		

		$update_users=$conn->query($update_users_query) or die('Error,query failed_update');
		
		//Μήνυμα ενημέρωσης
		 if ($update_users)
			 echo '<script language="javascript">alert_user.on("Τα στοιχεία του χρήστη τροποποιήθηκαν!"); </script>';
		 else
		 {
			echo '<script language="javascript">alert_user.on("Η τροποποίηση του χρήστη δεν ήταν επιτυχής.")</script>';
			
			exit();
		 }
		

	}

?>
</div>
</body>
</html>