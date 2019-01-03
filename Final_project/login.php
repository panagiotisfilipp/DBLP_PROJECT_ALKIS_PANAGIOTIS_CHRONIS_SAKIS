<?php
ob_start();
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
include ('config.php');


// ... 
// LOGIN USER
if (isset($_POST['name'])) {

  $username = mysqli_real_escape_string($conn, $_POST['name']);
  $password = mysqli_real_escape_string($conn, $_POST['pswd']);

  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	$query = "SELECT * FROM users WHERE username='$username'";
  	$results = mysqli_query($conn, $query);
	$row=mysqli_fetch_array($results,MYSQLI_ASSOC);
  	if (mysqli_num_rows($results) == 1 &&password_verify($password , $row["password"] )) {
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "Logged_in";
	  $_SESSION['user_id'] = $row["user_id"];
	  $_SESSION['role'] = $row["role"];
	  //$response_array = 'success';
	  //echo $response_array;
	  
	  if ($_SESSION['role'] == "0"){
  	     header('location: index_admin.php');}
  	  if ($_SESSION['role'] == "1"){ 
  	      header('location: index_reg.php');}
  	      
  	      
  	}else {
		
		$_SESSION['success'] = "Error";

		    echo '<script language="javascript">alert("Wrong username/password combination"); document.location="index.php";</script>';
			exit();
  	}
  }
}
ob_end_flush();
?>