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
 <title>DBLP API</title>
 	<link rel="shortcut icon" type="image/x-icon" href="logo2.ico" />     
	<link rel="stylesheet" type="text/css" href="css/mystyle.css">
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
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
<?php include('nav.php');?>

<!-- table for DBLP API -->
<div class="container" style="margin-top:50px" >
  <div class="row">
    <div align="center" class="col-sm-12">
	
<hr class="d-sm-none"><p><br>

<h4><b>Σχετικά με την DBLP</b></h4>

<table style="width:95%" >
  <tr>
    <td align="center"><img src="https://dblp.uni-trier.de/img/logo.320x120.png" alt="dblp-logo" width="320" height="120"/></td>
  </tr>
  <tr>
    <td align="center"><h3><b><br>Τι είναι η DBLP</b></h3><p></td>
  </tr>
  <tr>
    <td align="justify"><h5><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Η βιβλιογραφία της επιστήμης υπολογιστών dblp (database systems and logic programming) είναι μία  on-line αναφορά για βιβλιογραφικές πληροφορίες σχετικά με μεγάλες δημοσιεύσεις στην επιστήμη των υπολογιστών. Έχει εξελιχθεί από ένα πρώιμο μικρό πειραματικό web server σε μια δημοφιλής υπηρεσία open-data για την κοινότητα της επιστήμης των υπολογιστών. Η αποστολή του dblp είναι να υποστηρίξει τους ερευνητές των υπολογιστών στην καθημερινή τους προσπάθεια, παρέχοντας δωρεάν πρόσβαση σε υψηλής ποιότητας βιβλιογραφικά meta-data και συνδέσεις με τις ηλεκτρονικές εκδόσεις των δημοσιεύσεων.
Χρησιμοποιεί την CompleteSearch engine, που αναπτύχθηκε από την Hannah Bast (Πανεπιστήμιο του Freiburg, πρώην MPII Saarbrücken).
<p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Στην λειτουργικότητα της εφαρμογής μας χρησιμοποιήθηκαν τεχνικές αναζήτησης που πήραμε από το ιστότοπο: <a href="https://dblp.uni-trier.de">https://dblp.uni-trier.de</a><br> 
και συγκεκριμένα μεθόδους αναζήτησης από: <a href="https://dblp.uni-trier.de/faq/How+to+use+the+dblp+search.html">https://dblp.uni-trier.de/faq/How+to+use+the+dblp+search.html </a><br>
και λειτουργίας του API από: <a href="https://dblp.uni-trier.de/faq/How+to+use+the+dblp+search+API.html">https://dblp.uni-trier.de/faq/How+to+use+the+dblp+search+API.html</a></h5></td>
  </tr>

</table>
  
	<!-- </p> -->
      
      <hr class="d-sm-none">
    </div>
</div>
</div>





 <!-- Footer -->
 <?php include ('footer.php');?> 
 <?php include ('modal.php');?>

               

<div class="text-center">
    
</div>



</body>
</html>
