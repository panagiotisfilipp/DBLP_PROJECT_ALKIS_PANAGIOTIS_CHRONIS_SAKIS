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
  <title>Εγγεγραμμένος Χρήστης</title>
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
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
  .navbar-custom {
  background-color:#7dc476;}
	

.resp-container {
    position: relative;
    overflow: hidden;
    padding-top: 56.25%;
}

.resp-iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    border: 0;
}



  </style>
</head>
 <body>
     
     <button onclick="topFunction()" id="myBtn" title="Go to top" style="border-radius: 4px;padding: 15px;cursor: pointer;color: white;background-color: #96f5f3;outline: none;border: none;display: none;position: fixed;bottom: 20px;right: 30px;z-index: 99;font-size: 18px;">Top</button>

     
<!--Navbar -->
<?php include ('nav.php');?> 

<div class="container" style="margin-top:50px" >
  <div class="row">
    <div align="center" class="col-sm-12">
	<h4 align="center"><b><u>Οδηγίες Εγγεγραμμένου Χρήστη</b></u></h4><br>
	  <div style="margin-top:12px;">
   <div class="resp-container" >
    <iframe style="border:2px solid grey;" class="resp-iframe" src="https://youtube.com/embed/dgJakwrW6A0 " gesture="media"  allow="encrypted-media" allowfullscreen></iframe>
      </div>
  </div>

<p align="justify">
Με την εγγραφή στον διαδικτυακό τόπο ο χρήστης μπορεί να κάνει login στην εφαρμογή, οπότε και  θα βλέπει πάλι την εισαγωγική οθόνη περιήγησης στην εφαρμογή.<br>

 Η αρχική οθόνη θα περιλαμβάνει ένα λογότυπο, μία μπάρα πλοήγησης και ένα υποσέλιδο. Στην δεξιά πλευρά της σελίδας θα υπάρχει RSS FEED, το οποίο θα περιέχει συνδέσμους με τις τελευταίες αναρτημένες δημοσιεύσεις  άλλων επιστημονικών περιοδικών. Ο χρήστης θα μπορεί πατώντας στους συνδέσμους να τα μεταβεί σε αυτά.  <br>

Η περιήγηση στον ιστότοπο θα γίνεται από μενού επιλογών με χρήση κουμπιών που βρίσκονται στο μενού πλοήγησης.<br>
Οι δυνατότητες που προσφέρονται στον εγγεγραμμένο χρήστη είναι:<br>

Να τροποποιήσει τον κωδικό πρόσβασης του λογαριασμού του (register) και να αποκτήσει τη δική του βάση όπου και θα  αποθηκεύει τα άρθρα του.<br>
Θα χρησιμοποιηθεί κατάλληλη κρυπτογράφηση για λόγους ασφαλείας  του password (κρυπτογράφηση md5).<br>
Η διάρκεια σύνδεση του χρήστη στην εφαρμογή θα είναι συγκεκριμένη (για λόγους ασφαλείας), θα μετρά αντίστροφα και θα εμφανίζεται στην μπάρα πλοήγησης, συγκεκριμένα θα είναι 900 δευτερόλεπτα. Μετά το πέρας αυτού του χρόνου η εφαρμογή αυτομάτως σε κάνει logout.<br>

Οι δυνατότητες που προσφέρονται στον εγγεγραμμένο χρήστη από το μενού πλοήγησης είναι:<br>

Από το μενού «<strong><u>Αρχική</u></strong>» θα έχει την δυνατότητα να αναζητήσει και να εμφανίσει τα άρθρα κάποιου από τα μέλη του προσωπικού του τμήματος Μηχανικών Πληροφορικής του ΑΤΕΙΘ, σελιδοποιημένα ανά πεντάδες, για ευκολότερη προβολή τους.<br>

Τα κριτήρια αναζήτηση που θα έχει στη διάθεσή του είναι τα εξής:<br>

&nbsp;&nbsp;&nbsp;<i class='fas fa-angle-right'></i>&nbsp;Αναζήτηση ονόματος μέλους-συγγραφέα άρθρου<br>
&nbsp;&nbsp;&nbsp;<i class='fas fa-angle-right'></i>&nbsp;Αναζήτηση κατηγορίας συγγράμματος- τύπου Δημοσίευσης<br>
&nbsp;&nbsp;&nbsp;<i class='fas fa-angle-right'></i>&nbsp;Αναζήτηση με βάση κάποια λέξη κλειδί<br>
&nbsp;&nbsp;&nbsp;<i class='fas fa-angle-right'></i>&nbsp;Αναζήτηση με βάση χρονική περίοδο (από Έτος και μετά)<br>
&nbsp;&nbsp;&nbsp;<i class='fas fa-angle-right'></i>&nbsp;Αναζήτηση με βάση χρονική περίοδο (έως το έτος)<br>
&nbsp;&nbsp;&nbsp;<i class='fas fa-angle-right'></i>&nbsp;Αναζήτηση με βάση χρονική περίοδο (από Έτος – έως Έτος)
<br>
Εννοείτε πως υπάρχει η δυνατότητα συνδυασμού των παραπάνω κριτηρίων με ανάλογα αποτελέσματα. Π.χ. αν δεν βάλουμε κανένα όνομα μέλους προσωπικού του τμήματος Μηχανικών Πληροφορικής του ΑΤΕΙΘ και χρησιμοποιήσουμε κάποιο από τα υπόλοιπα κριτήρια, τότε το API θα μας εμφανίσει  το μέγιστο 1000 αποτελέσματα (περιορισμός API) οποιουδήποτε συγγραφέα  γνωρίζει που δεν είναι μέλος του προσωπικού του τμήματος Μηχανικών Πληροφορικής του ΑΤΕΙΘ. Αν ο χρήστης δεν καθορίσει τύπο δημοσίευσης, αλλά μόνο λέξη κλειδί τότε το API θα επιστέψει τα πρώτα 1000 αποτελέσματα που θα ανακτήσει με βάση την λέξη κλειδί και ασχέτως τον τύπο δημοσίευσης. Αν με βάση τα κριτήρια που ορίσει ο χρήστης δεν υπάρχουν κατάλληλες εγγραφές στο API DBLP θα εμφανίζεται κατάλληλο μήνυμα που θα ενημερώνει το χρήστη για μη ύπαρξη τέτοιων Δημοσιεύσεων.<br>
Τα στοιχεία που θα παρουσιάζονται στον χρήστη από την αναζήτηση θα είναι: Συγγραφέας, Τίτλος, Έτος Δημοσίευσης, Τύπος Δημοσίευσης, URL συγγράμματος (εικονίδιο που πατώντας  το θα μας πηγαίνει στο αντίστοιχο paper). Από την παρούσα σελίδα ο εγγεγραμμένος χρήστης μπορεί να επιλέξει τα άρθρα που θέλει επιλέγοντας τα αντίστοιχα <strong>check</strong> <strong>box</strong> και πατώντας το κουμπί εισαγωγή, εισάγει τα επιλεγμένα άρθρα στην βάση της εφαρμογής. Σε νεότερη αναζήτηση άρθρων θα εμφανίζονται τα αποτελέσματα όπως και πριν αλλά αυτά που έχει ήδη στην βάση του δεν θα  μπορεί να τα επιλέξει για εισαγωγή, μιας και τα <strong>check</strong> <strong>box</strong> θα είναι <strong>απενεργοποιημένα</strong>. Αυτό γίνεται έτσι ώστε να μην επιτρέπουμε στον χρήστη να  έχει διπλές εγγραφές στη βάση δεδομένων. <br>

Από το μενού «<strong><u>Διαχείριση Δημοσιεύσεων</u></strong>» θα μπορεί να κάνει μία επισκόπηση των άρθρων που έχει αποθηκευμένα στη βάση του, σελιδοποιημένα ανά δεκάδες, για ευκολότερη προβολή τους. Τα στοιχεία που θα παρουσιάζονται στον χρήστη  θα είναι: Συγγραφέας, Τίτλος, Έτος Δημοσίευσης, Τύπος Δημοσίευσης, URL δημοσιεύσης (εικονίδιο που πατώντας  το θα μας πηγαίνει στο αντίστοιχο paper). Επίσης θα έχει τη δυνατότητα να κάνει γρήγορη αναζήτηση κάποιου συγκεκριμένου άρθρου που έχει ήδη αποθηκεύσει στην βάση είτε στον τίτλο ,είτε στον συγγραφέα. Θα μπορεί να επεξεργαστεί κάποιο άρθρο (που το έχει ήδη στην βάση του), να διαγράψει κάποιο ή κάποια άρθρα από την προσωπική του βάση. Ακόμη του δίνεται η δυνατότητα  να προσθέσει χειροκίνητα κάποιο καινούργιο άρθρο στην βάση του, εισάγοντας τα απαραίτητα στοιχεία (π.χ ένα άρθρο που βρήκε από άλλη μηχανή αναζήτησης. Επίσης κατά την επεξεργασία ενός άρθρου υπάρχει η δυνατότητα να προσθέσει σημειώσεις σε μορφή ελεύθερου κειμένου, όπως π.χ (σημείωση για abstract ή conclusion).<br>
Από το μενού επιλέγοντας «<strong><u>Αποσύνδεση</u></strong><strong>» </strong>o εγγεγραμμένος χρήστης εξέρχεται από την εφαρμογή ασφαλώς.<br>
<br>
<strong><i>Διευκρινίσεις:</i></strong> Η εφαρμογή θα λειτουργεί για όλους τους γνωστούς περιηγητές. Η εφαρμογή θα εμφανίζεται σωστά σε όλα τα είδη υπολογιστή, όπως Σταθερό υπολογιστή, Laptop, Κινητό, Tablet, με ανάλογη μορφοποίηση λόγω διαστάσεων συσκευής.</p>
 <hr class="d-sm-none">
    </div>
</div>
</div>
<!--Footer -->
<?php include'footer.php'?> 

<?php include ('modal.php');?>



</body>
</html>
