

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
    background-color:#7dc476;
  }
video {
  width: 100%;
  height: auto;
}

.row:after {
  content: "";
  clear: both;
  display: table;
}

[class*="col-"] {
  float: left;
  padding: 15px;
  width: 100%;
}

  </style>
</head>
<body>

<button onclick="topFunction()" id="myBtn" title="Go to top" style="border-radius: 4px;padding: 15px;cursor: pointer;color: white;background-color: #96f5f3;outline: none;border: none;display: none;position: fixed;bottom: 20px;right: 30px;z-index: 99;font-size: 18px;">Top</button>


<!--Navbar -->
<?php include('nav.php');?>
<!--Navbar end-->
<div class="container" style="margin-top:70px" >
  <div class="row">
<div align="center" class="col-sm-9">
<p>
<h3><b>Εφαρμογή αναζήτησης και αποθήκευσης Δημοσιεύσεων</b></h3>
<br>

<div style="margin-top:12px;">
  <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop" width="400" >
    <source src="./video/intro.webm" type="video/mp4">
  </video>
  </div>
<br><br>
<div align="justify">Η παρούσα εφαρμογή δίνει την δυνατότητα στο χρήστη να αναζητήσει επιστημονικές δημοσιεύσεις που είναι καταχωρημένες στην βιβλιοθήκη του dblp.uni-trier.de.<br>
Δίνεται η δυνατότητα στο χρήστη που θα εγγραφεί στην υπηρεσία να αναζητήσει, να δημιουργήσει & να διαχειριστεί την προσωπική του βιβλιοθήκη Δημοσιεύσεων.</div>
</p>	
</div>
<div align="center" class="col-sm-3" style="margin-top:20px">

<p><h3><img src="./images/rss_image2.png" width="32px" height="32px"/> RSS Feed</h3><br /><div style="background-color:#68C9A6"><?php include ('rss_show.php'); ?></div></p>
</div> 
</div>
</div>
 </div>


<div class="container" style="margin-top:20px" >
  <div class="row">
    <div align="center" class="col-sm-9">
	  	 
    </div>
 
   </div>
</div>


 <?php include ('footer.php');?> 
  
<!-- Login Form Call -->

<?php include ('modal.php'); ?> 






<div class="text-center">
    
</div>



</body>
</html>
