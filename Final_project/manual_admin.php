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
  <title>Χρήστης Διαχειριστής</title>
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
    background-color:#7dc476;}

  </style>
</head>
 <body>
     
     <button onclick="topFunction()" id="myBtn" title="Go to top" style="border-radius: 4px;padding: 15px;cursor: pointer;color: white;background-color: #96f5f3;outline: none;border: none;display: none;position: fixed;bottom: 20px;right: 30px;z-index: 99;font-size: 18px;">Top</button>

     
<!--Navbar -->
<?php include ('nav.php');?> 

<!-- table for DBLP API -->
<div class="container" style="margin-top:50px" >
  <div class="row">
    <div align="center" class="col-sm-12">
	



<h4><strong>Γ. Χρήστης Διαχειριστής</strong></h4>
<p align=justify>
Ο λογαριασμός Διαχειριστή είναι ένας χρήστης τα στοιχεία του οποίου (username, password, email) θα είναι ήδη τοποθετημένα από τους δημιουργούς της εφαρμογής.<br>
O συγκεκριμένος χρήστης θα έχει ένα μενού επιλογών ως εξής:<br>

&nbsp;&nbsp;&nbsp;<i class='fas fa-angle-right'></i>&nbsp;Από το μενού <strong><u>«Χρήστες»</u> </strong>θα μπορεί να προβάλει τα στοιχεία των χρηστών, τα οποία θα μπορεί και να επεξεργαστεί.<br>

&nbsp;&nbsp;&nbsp;<i class='fas fa-angle-right'></i>&nbsp;Από το μενού <strong><u>«Διαχείριση </u></strong><strong><u>RSS</u></strong><strong><u>»</u></strong> θα μπορεί να προβάλλει τα αποθηκευμένα RSS της βάσης του. Αυτά θα έχει την δυνατότητα να τα διαχειριστεί, δηλαδή να διαγράψει ,να τροποποιήσει ή να εισάγει ένα νέο RSS.<br>

&nbsp;&nbsp;&nbsp;<i class='fas fa-angle-right'></i>&nbsp;Από το μενού επιλέγοντας <u>«</u><strong><u>Αποσύνδεση</u></strong><strong><u>»</u></strong> o διαχειριστής χρήστης θα εξέρχεται από την εφαρμογή ασφαλώς.<br>

&nbsp;&nbsp;&nbsp;<i class='fas fa-angle-right'></i>&nbsp;Τέλος στο υποσέλιδο της εφαρμογής θα υπάρχουν σύνδεσμοι που οδηγούν σε στατικές σελίδες και παρουσιάζονται πληροφορίες σχετικά με το <strong>Ποιοι Είμαστε (δημιουργοί εφαρμογής)</strong>, <strong>ο </strong><strong>API</strong> <strong>DBLP</strong> που χρησιμοποιεί η εφαρμογή και <strong>οδηγίες για την εφαρμογή</strong>.<br><br>
<i>Προσοχή</i>: Ο κώδικας της εφαρμογής μας είναι προσβάσιμος στο Github στο: <a href="https://github.com/panagiotisfilipp">panagiotisfilipp</a>/DBLP_PROJECT_ALKIS_PANAGIOTIS_CHRONIS_SAKIS, έχουν γίνει από το ξεκίνημα της εφαρμογής κατάλληλα αιτήματα (συνεργατών) μέσω των email που μας έδωσε ο κος Ουγιάρογλου προς τους καθηγητές που επιβλέπουν την εργασία. Από όλα τα αρχεία που υπάρχουν στο GITHUB το αρχείο final_project είναι αυτό που περικλείει τα τελικά αρχεία της εφαρμογής.
</p>
	 
      <hr class="d-sm-none">
    </div>
</div>
</div>

<!--Footer -->
<?php include'footer.php'?> 

<?php include ('modal.php');?>


</body>
</html>
