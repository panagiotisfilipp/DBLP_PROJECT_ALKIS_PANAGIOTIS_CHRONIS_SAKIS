<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
include ('config.php');


// REGISTER USER
if (isset($_POST['username'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $password_1 = mysqli_real_escape_string($conn, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($conn, $_POST['password_2']);
   $name=mysqli_real_escape_string($conn, $_POST['name']);
   $surname=mysqli_real_escape_string($conn, $_POST['surname']);
   $register_time=date('Y-m-d');//eisagogi xronou register tou xristi
  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($conn, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }
$response_array = 'error';
  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = password_hash($password_1,PASSWORD_DEFAULT);//encrypt the password before saving in the database

  	$query = "INSERT INTO users (username, email, password,name,surname,register_time) 
  			  VALUES('$username', '$email', '$password','$name','$surname','$register_time')";			  
  	mysqli_query($conn, $query);
  	$query = "SELECT * FROM users WHERE username='$username'";
  	$results = mysqli_query($conn, $query);
	$row=mysqli_fetch_array($results,MYSQLI_ASSOC);	
  	$_SESSION['username'] = $username;
  	  $_SESSION['success'] = "Logged_in";
	  $_SESSION['user_id'] = $row["user_id"];
	  $_SESSION['role'] = $row["role"];
	  $response_array = 'success';
  	  	header("location: index.php");

  }else
  {
	  
	
	  echo '<script language="javascript">alert("Σφάλμα κατά την εισαγωγή, δοκιμάστε ξανά!"); document.location="index.php";</script>';
	  
  	  		  
  }
  //echo $response_array;

}

?>