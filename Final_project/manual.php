<?php 
 
session_start();

  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
	unset($_SESSION['success']);
	unset($_SESSION['user_id']);
	unset($_SESSION['role']);
	
  	header("location: index.php");
  }
?>
<!DOCTYPE html>

<html lang="en">

<head>
<link rel="stylesheet" type="text/css" href="css/mystyle.css">
<!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <style>
table, th, td {
  border: 0px solid black;
}
</style>
  <title>Σχετικά με την εφαρμογή</title>
  <link rel="shortcut icon" type="image/x-icon" href="logo2.ico" />     
	<link rel="stylesheet" type="text/css" href="css/mystyle.css">
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>chr-th-index.php</title>

   <!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="css/main.css">  
    <script src="./js_async_calls/login.js"></script>
    <script src="./js_async_calls/register.js"></script>
	<script src="./js_async_calls/counter.js"></script>
    <script src="./myScript.js"></script>

<style>
  .navbar-custom {
    background-color:#7dc476;
	<!--color:	#fff400;-->
	
  </style>
</head>
<body>
    
<button onclick="topFunction()" id="myBtn" title="Go to top" style="border-radius: 4px;padding: 15px;cursor: pointer;color: white;background-color: #96f5f3;outline: none;border: none;display: none;position: fixed;bottom: 20px;right: 30px;z-index: 99;font-size: 18px;">Top</button>

    
<!--Navbar -->
<?php include ('nav.php'); ?>
<!--Navbar end-->

<!-- table for DBLP API -->
<div class="container" style="margin-top:50px" >
  <div class="row">
    <div align="center" class="col-sm-12">
	
<hr class="d-sm-none"><p><br>

<h4><b>Σχετικά με την εφαρμογή</b></h4>

<table style="width:95%" >

  <tr>
  <td align="justify"><h5><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Στην εφαρμογή υπάρχουν τρεις διαφορετικοί ρόλοι χρηστών (χρήστης επισκέπτης, εγγεγραμμένος χρήστης, διαχειριστής εφαρμογής)  με διαφορετικές λειτουργικότητες, που ανά χρήστη είναι οι παρακάτω:<p></h5></td>
  </tr>
  <tr>
    <td align="center"> <a href="manual_user.php"><b>Α. Επισκέπτης Χρήστης</b></a></td>    
  </tr>
  <tr>
    <td align="center"> <a href="manual_register.php"><b>Β. Εγγεγραμμένος Χρήστης</b></a></td>    
  </tr>
  <tr>
    <td align="center"> <a href="manual_admin.php"><b>Γ. Χρήστης Διαχειριστής</b></a></td>    
  </tr>
 
</table>
  
	<!-- </p> -->
      
      <hr class="d-sm-none">
    </div>
</div>
</div>

<!--Footer -->
<?php include'footer.php'?> 

<?php include ('modal.php');?>


</body>
</html>
