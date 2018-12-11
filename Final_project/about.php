<?php 
 
session_start();

  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
	unset($_SESSION['success']);
	unset($_SESSION['user_id']);
	unset($_SESSION['role']);
	
  	header("location: index.php");
  }li
?>

<!DOCTYPE html>

<html lang="en">

<head>
    <title>Call for papers</title>
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
<?php include('nav.php');?>
<!--Navbar end-->

<div class="container" style="margin-top:70px" >
  <div class="row">
    <div align="center" class="col-sm-6">
	<div> <img src="./images/alkis3.png" class="rounded-circle" ></img></div> <br>
	  <p>
      <b>Αλκιβιάδης Τζιώρας</b>
      <br>		
      </p>
	  <p align="justify">
		Ο Παναγιώτης Φιλιππάκης είναι προγραμματιστής και μεταπτυχιακός φοιτητής του Τμήματος Μηχανικών Πληροφορικής του ΑΤΕΙ Θεσσαλονίκης στις «Ευφυείς Τεχνολογίες Διαδικτύου». Ειδικεύεται στο Software Developing , Back-End Developing και στην ανάπτυξη δικτυακών εφαρμογών με χρήση τεχνολογιών php, javascript, html. Εργάζεται σαν μόνιμος Αξιωματικός της Πολεμικής Αεροπορίας και κατέχει την θέση του Προϊστάμενου Εκμετάλλευσης στο Τμήμα Πληροφορικής της 350 Πτέρυγας Κατευθυνόμενων Βλημάτων. Έχει ασχοληθεί σε μεγάλο βαθμό με την Διαχείριση Δικτύων (Windows Administrator) και την ασφάλεια αυτών.
		www.linkedin.com/in/panagiotis-filippakis-b761ab95		
     </p>	
    </div>
    <div align="center" class="col-sm-6">
	<div> <img src="./images/panag.png" class="rounded-circle" ></img></div> <br>
	  <p>
      <b>Παναγιώτης Φιλιππάκης</b>
      <br>	
     	 
	  <p align="justify">
		Ο Παναγιώτης Φιλιππάκης είναι προγραμματιστής και μεταπτυχιακός φοιτητής του Τμήματος Μηχανικών Πληροφορικής του ΑΤΕΙ Θεσσαλονίκης στις «Ευφυείς Τεχνολογίες Διαδικτύου». Ειδικεύεται στο Software Developing , Back-End Developing και στην ανάπτυξη δικτυακών εφαρμογών με χρήση τεχνολογιών php, javascript, html. Εργάζεται σαν μόνιμος Αξιωματικός της Πολεμικής Αεροπορίας και κατέχει την θέση του Προϊστάμενου Εκμετάλλευσης στο Τμήμα Πληροφορικής της 350 Πτέρυγας Κατευθυνόμενων Βλημάτων. Έχει ασχοληθεί σε μεγάλο βαθμό με την Διαχείριση Δικτύων (Windows Administrator) και την ασφάλεια αυτών.
				
	</p>
	<p>
	
	
	</p>	
    </div>	
</div>
<div class="row">
<div align="center" class="col-sm-6">
<a href="https://www.linkedin.com/in/panagiotis-filippakis-b761ab95/" > <img src="./images/linkedin1.png"/>LinkedIn</i></a>
</div>
<div align="center" class="col-sm-6">
<a href="https://www.linkedin.com/in/panagiotis-filippakis-b761ab95/" > <img src="./images/linkedin1.png"/>LinkedIn</i></a>
</div>
</div>
<br><br><br>
<div class="row">
    <div align="center" class="col-sm-6">
	<div> <img src="./images/thanos2.png" class="rounded-circle" ></img></div> <br>
	  <p>
      <b>Αθανάσιος Βάσκος</b>
      <br>	
	<p align="justify">
	Ο Αθανάσιος Βάσκος είναι απόφοιτος του Τμήματος Μηχανικών Πληροφορικήςτου Α.Τ.Ε.Ι. Θεσσαλονίκης. Εργάστηκε στα πλαίσια της πρακτικής του άσκησης ως technical support engineer στην εταιρία Lan Communications Ε.Π.Ε.(Lancom). Τώρα εργάζεται στην εταιρία Innovative Secure Technologies Ι.Κ.Ε. (innosec) ως προγραμματιστής ενώ παράλληλα είναι φοιτητής του μεταπτυχιακού προγράμματος σπουδών «Ευφυείς Τεχνολογίες Διαδικτύου» του Τμήματος Μηχανικών Πληροφορικής. Κύρια ενδιαφέροντά του αποτελούν ο προγραμματισμός εφαρμογών, τα δίκτυα υπολογιστών και η διαχείριση συστημάτων.
	</p>
	<p>
	

	</p>
    </p>	 
    </div>
    <div align="center" class="col-sm-6">
	<div> <img src="./images/chronis3.png" class="rounded-circle" ></img></div> <br>
	  <p>
      <b>Κουκάρας Πολυχρόνης</b>
      <br>	
	<p align="justify">
	Ο Πολυχρόνης Κουκάρας είναι Προγραμματιστής-Αναλυτής απόφοιτος του Τμήματος Μηχανικών Πληροφορικής του ΑΤΕΙ Θεσσαλονίκης και σήμερα μεταπτυχιακός φοιτητής του Τμήματος Μηχανικών Πληροφορικής του ΑΤΕΙ Θεσσαλονίκης στις «Ευφυείς Τεχνολογίες Διαδικτύου». 
		Είναι Εκπαιδευτικός της Β'/μια Εκπαίδευση και διδάσκει μαθήματα πληροφορικής και προγραμματισμού. Ασχολείται με Web-Design, διαχείριση σχολικού δικτύου και είναι υπεύθυνος διαχείρισης και υποστήριξης μαθητικού δυναμικού σχολικής μονάδας.
	</p>
	<p>
	
	
	</p>
    </p>	 
    </div>	
	</div>
<div class="row">
<div align="center" class="col-sm-6">
	<a href="https://www.linkedin.com/in/vaskos-athanasios/" > <img src="./images/linkedin1.png"/>LinkedIn</i></a>
</div>
<div align="center" class="col-sm-6">
		<a href="https://www.linkedin.com/in/chronis-koukaras-36978485/" > <img src="./images/linkedin1.png"/>LinkedIn</i></a>
</div>
</div>	
 </div>




 <?php include ('footer.php');?> 
  
 <?php include ('modal.php');?>
               

<div class="text-center">
    
</div>



</body>
</html>
