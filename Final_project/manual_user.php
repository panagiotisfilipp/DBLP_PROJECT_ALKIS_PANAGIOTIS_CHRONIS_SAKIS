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
  <title>Επισκέπτης Χρήστης</title>
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

<div align=left>
<i class="fas fa-long-arrow-alt-right"></i><a href="manual_register.php"><strong>&nbsp;&nbsp;Β. Εγγεγραμμένος Χρήστης</strong></a><br>
<i class="fas fa-long-arrow-alt-right"></i><a href="manual_admin.php"><strong>&nbsp;&nbsp;Γ. Χρήστης Διαχειριστής</strong></a>
<hr><p>
</div>	

<h4><b>Α. Επισκέπτης Χρήστης</b></h4><br>
<p align="justify">

Με την είσοδο στον διαδικτυακό τόπο ο χρήστης θα βλέπει την εισαγωγική οθόνη περιήγησης στην εφαρμογή.<br>

Η αρχική οθόνη θα περιλαμβάνει ένα λογότυπο, ένα μενού πλοήγησης και ένα
υποσέλιδο που περιέχει ενημερωτικά στοιχεία. Στην δεξιά πλευρά της σελίδας
θα υπάρχει RSS FEED , το οποίο θα περιέχει συνδέσμους με τα
τελευταία αναρτημένα συγγράμματα  άλλων
επιστημονικών περιοδικών. Ο χρήστης θα
μπορεί πατώντας στους συνδέσμους να τα
μεταβεί σε αυτά.  Η
περιήγηση στον ιστότοπο θα γίνεται από
μενού επιλογών με χρήση κουμπιών που
βρίσκονται στο μενού πλοήγησης.<br />
Ο επισκέπτης χρήστης από το μενού «Αρχική» θα έχει την δυνατότητα να αναζητήσει και να εμφανίσει τα άρθρα κάποιου από τα μέλη του προσωπικού του τμήματος
	Μηχανικών Πληροφορικής του ΑΤΕΙΘ, σελιδοποιημένα ανά δεκάδες, για 	ευκολότερη προβολή τους.<br />
Τα
κριτήρια αναζήτηση που θα έχει στη
διάθεσή του είναι τα εξής:<br />

&nbsp;&nbsp;&nbsp;<i class='fas fa-angle-right'></i>&nbsp;Αναζήτηση ονόματος μέλους- συγγραφέα άρθρου<br />
&nbsp;&nbsp;&nbsp;<i class='fas fa-angle-right'></i>&nbsp;Αναζήτηση ονόματος μέλους- συγγραφέα άρθρου<br>
&nbsp;&nbsp;&nbsp;<i class='fas fa-angle-right'></i>&nbsp;Αναζήτηση κατηγορίας συγγράμματος- τύπου Δημοσίευσης<br>
&nbsp;&nbsp;&nbsp;<i class='fas fa-angle-right'></i>&nbsp;Αναζήτηση με βάση κάποια λέξη κλειδί <br>
&nbsp;&nbsp;&nbsp;<i class='fas fa-angle-right'></i>&nbsp;Αναζήτηση με βάση χρονική περίοδο (από Έτος και	μετά)<br>
&nbsp;&nbsp;&nbsp;<i class='fas fa-angle-right'></i>&nbsp;Αναζήτηση με βάση χρονική περίοδο (έως το έτος)<br>
&nbsp;&nbsp;&nbsp;<i class='fas fa-angle-right'></i>&nbsp;Αναζήτηση με βάση χρονική περίοδο (από Έτος – έως Έτος)<br> 

</p>
<p align="justify">
Επίσης
υπάρχει η δυνατότητα συνδυασμού των
παραπάνω κριτηρίων με ανάλογα αποτελέσματα.
Π.χ. αν δεν βάλουμε κανένα όνομα μέλους
προσωπικού του τμήματος Μηχανικών
Πληροφορικής του ΑΤΕΙΘ και χρησιμοποιήσουμε
κάποιο από τα υπόλοιπα κριτήρια, τότε
το API
θα μας εμφανίσει μέχρι 30 αποτελέσματα
 οποιουδήποτε συγγραφέα γνωρίζει
που δεν είναι μέλος του προσωπικού του
τμήματος Μηχανικών Πληροφορικής του
ΑΤΕΙΘ. <br />Αν ο χρήστης δεν καθορίσει τύπο
δημοσίευσης, αλλά μόνο λέξη κλειδί τότε
το API
θα επιστέψει τα πρώτα 30 αποτελέσματα
που θα ανακτήσει με βάση την λέξη κλειδί
και ασχέτως τον τύπο δημοσίευσης. Αν με
βάση τα κριτήρια που ορίσει ο χρήστης
δεν υπάρχουν κατάλληλες εγγραφές στο
API
DBLP
θα εμφανίζεται κατάλληλο μήνυμα που θα
ενημερώνει το χρήστη για μη ύπαρξη
τέτοιων συγγραμμάτων. <br />Τα
στοιχεία που θα παρουσιάζονται στον
χρήστη από την αναζήτηση θα είναι:
Συγγραφείς, Τίτλος, Έτος Δημοσίευσης,
Τύπος Δημοσίευσης, URL
συγγράμματος (εικονίδιο που πατώνταςτο
θα μας πηγαίνει στο αντίστοιχο paper
του API).<br />
Από
	το κουμπί «Είσοδος/Εγγραφή»
	ο επισκέπτης χρήστης εισάγοντας
	username,password
	και email
	 μπορεί να κάνει εγγραφεί σαν νέος
	χρήστης, από όπου και θα αποκτά δικαιώματα
	για όλες τις υπόλοιπες  λειτουργίες
	της εφαρμογής.
<BR><BR>
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
