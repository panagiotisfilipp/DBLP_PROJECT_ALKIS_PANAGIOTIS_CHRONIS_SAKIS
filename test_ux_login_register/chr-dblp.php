<?php 
 include('server.php'); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  //	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  //	header("location: login.php");
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

  <title>chr-th-index.php</title>
  
   <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  
  <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css">
  <link rel="stylesheet" href="css/animate.css">
  <link rel="stylesheet" href="css/main.css">
   
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
  
  
 
</head>
<body>

<!--Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark cyan fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">
	  
<!--        <img src="images/webint.jpg" alt="nav-logo" width="80" height="30">-->
		<!--<img src="images/atei-logo.png" alt="nav-logo" width="194" height="40">-->
		<img src="images/logo-1.png" alt="nav-logo" width="194" height="40">
      </a>
    <!--  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4" aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>-->
      <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.html">αρχικη</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.html">η βαση μου</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../index.php">αρθρα συγγραφεων</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="blog.html">εισοδοσ / προσθηκη</a>
          </li>
		  <li class="nav-text" ><a class="nav-link" href="#">    
		  <?php  if (isset($_SESSION['username'])) : ?>
		     	<p  style="color: red;">Καλως ηλθες <strong style="color: red;"><?php echo $_SESSION['username']; ?></strong></p>
		    <?php endif ?></a></li>
		 		
	   
        </ul>
      </div>
    </div>
  </nav>
<!--Navbar end-->

<!--
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      -->
        
<!--  ΑΠΟ ΕΔΩ ΚΑΙ ΚΑΤΩ ΝΑ ΒΑΛΩ ΛΕΙΤΟΥΡΓΙΕΣ ΚΟΥΜΠΙΩΝ  -->	
		
		
		
		
		<?php  if (!isset($_SESSION['username'])) : ?>
		<li class="nav-item">
			<a href="" class="nav-link" data-toggle="modal" data-target="#modal_login">Είσοδος/Εγγραφή</a>
	    </li>		
		<?php endif ?>		
	
	

	<li class="nav-item">
    <!-- logged in user information -->
    <?php  if (isset($_SESSION['username'])) : ?>	
		<li class="nav-item">
			<a href="" class="nav-link" data-toggle="modal" data-target="#modal_papper">Προσθήκη</a>
		</li>
		<li class="nav-item">		
			<a href="index.php?logout='1'" class="nav-link" d  > Logout </a>
		</li>		
    	<!--<p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>-->
    <?php endif ?>
			
	
		
    </ul>
  </div>  
</nav>






<div class="container" style="margin-top:50px" >
  <div class="row">
    <div align="center" class="col-sm-12">
	
<hr class="d-sm-none"><p>
	  <h4><b>Σχετικά με την DBLP              </b></h4>

      <div ><img src="https://dblp.uni-trier.de/img/logo.320x120.png"alt="dblp-logo" width="160" height="60"  /></div>
	  
	  
      <p>
	  
	 <h3><b>Τι είναι η DBLP</b></h3><p>
 
<h5>Η βιβλιογραφία της επιστήμης υπολογιστών dblp (database systems and logic programming) είναι μία  on-line αναφορά για βιβλιογραφικές πληροφορίες σχετικά με μεγάλες δημοσιεύσεις στην επιστήμη των υπολογιστών. Έχει εξελιχθεί από ένα πρώιμο μικρό πειραματικό web server σε μια δημοφιλής υπηρεσία open-data για την κοινότητα της επιστήμης των υπολογιστών. Η αποστολή του dblp είναι να υποστηρίξει τους ερευνητές των υπολογιστών στην καθημερινή τους προσπάθεια, παρέχοντας δωρεάν πρόσβαση σε υψηλής ποιότητας βιβλιογραφικά meta-data και συνδέσεις με τις ηλεκτρονικές εκδόσεις των δημοσιεύσεων.
Χρησιμοποιεί την CompleteSearch engine, που αναπτύχθηκε από την Hannah Bast (Πανεπιστήμιο του Freiburg, πρώην MPII Saarbrücken).
Στην λειτουργικότητα της εφαρμογής μας χρησιμοποιήθηκαν τεχνικές αναζήτησης που πήραμε από το ιστότοπο https://dblp.uni-trier.de και συγκεκριμένα μεθόδους αναζήτησης από:
 https://dblp.uni-trier.de/faq/How+to+use+the+dblp+search.html 
και λειτουργίας του API από:
https://dblp.uni-trier.de/faq/How+to+use+the+dblp+search+API.html</h5>

	  
	  
	  
	  
	  
	  
	 </p>
      
      <hr class="d-sm-none">
    </div>
</div>
</div>






<!--<div class="jumbotron text-center" style="margin-bottom:0">
  <p>Footer</p>
</div>-->

 <!-- Footer -->
  <footer>
    <section class="footer-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <ul>
              <li><a href="index.html">Αρχική Σελίδα</a></li>
              <li class="hidden">/</li>
              <li><a href="about.html">Ποιοι ήμαστε</a></li>
              <li class="hidden">/</li>
              <li><a href="mystories.html">Το DBLP API</a></li>
              <li class="hidden">/</li>
              <li><a href="destinations.html">Οδηγίες για την Εφαρμογή</a></li>
              <li class="hidden">/</li>
        <!--      <li><a href="gallery.html">Gallery</a></li>
              <li class="hidden">/</li>
              <li><a href="contact.html">Contact</a></li>-->
            </ul>
          </div>
          <div class="col-md-12">
            <p>(C) All Rights Reserved <a href="#" target="_blank">Μ_102 Fantastic 4</a> <span>/</span> Designed and Developed by <a href="#" target="_blank">Four of us</a></p>
            <p>Copyright 2018 ΑΤΕΙΘ.    -  ΤΜΗΜΑ Π.Μ.Σ. Ευφυείς Τεχνολογίες Διαδικτύου
		  </div>
        </div>
      </div>
      <!-- /.container -->
    </section>
	
  </footer>

 <!-- Return to Top -->
 
  <a href="javascript:" id="return-to-top"><i class="fa fa-arrow-up" aria-hidden="true"></i></a>


  <!--<a href="javascript:" id="return-to-top"><i class="fa fa-long-arrow-up" aria-hidden="true"></i></a>-->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.js"></script>
  <!-- Custom JavaScript -->
  <script src="js/animate.js"></script>
  <script src="js/custom.js"></script>
  <script>
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox();
    });
  </script>







<!------ Login/Reg  ----->
<!--Modal: Login / Register Form-->
<div class="modal fade" id="modal_login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog cascading-modal" role="document">
        <!--Content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <ul class="nav nav-pills " role="tablist">

                                            <li class="nav-item"><a class="nav-link active" data-toggle="pill" href="#login-form"> Login <span class="fas fa-user"></span></a></li>
                                            <li class="nav-item"><a class="nav-link" data-toggle="pill" href="#registration-form">Register<span class='fas fa-pencil-alt'></span></a></li>
                                        </ul>
										<button type="button" class="close" data-dismiss="modal">
													<i class="fas fa-times-circle"></i>
										</button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="tab-content">
                                            <div id="login-form" class="container tab-pane active">
                                                <form method="post" action="index.php">
                                                    <?php include('errors.php'); ?>
													<div class="form-group">
                                                        <label for="name">Username:</label>
                                                        <input type="text" class="form-control" id="name" placeholder="Enter your username" name="name" ">
                                                    </div>												
                                                    <div class="form-group">
                                                        <label for="password">Password:</label>
                                                        <input type="password" class="form-control" id="pswd" placeholder="Enter your password" name="pswd">
                                                    </div>													
                                                    <div class="checkbox">
                                                        <label><input type="checkbox" name="remember"> Remember me</label>
                                                    </div>
													<div align="center">
                                                    <button type="submit" class="btn btn-dark" name="login_user">Login</button>
													</div>
                                                </form>
                                            </div>
                                            <div id="registration-form" class="tab-pane fade">
											    <?php include('errors.php'); ?>
                                                <form method="post" action="index.php">
                                                    <div class="form-group">
                                                        <label for="username">Username:</label>
                                                        <input type="text" class="form-control" id="username" placeholder="Enter your name" name="username" value="<?php echo $username; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="email">E-mail:</label>
                                                        <input type="email" class="form-control" id="email" placeholder="Enter your email" name="email" value="<?php echo $email; ?>">
                                                    </div>	
													<div class="form-group">
                                                        <label for="password_1">Password:</label>
                                                        <input type="password" class="form-control" id="password_1" placeholder="New password"  name="password_1">
                                                    </div>
                                                    <div class="form-group">													
                                                        <label for="password_2">Password:</label>
                                                        <input type="password" class="form-control" id="password_2" placeholder="New password" name="password_2">
                                                    </div>
													<div align="center">
														<button type="submit" class="btn btn-success" name="reg_user">Register</button>	
													</div>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
<!--                                    <div class="modal-footer">-->
<!--                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
<!--                                    </div>-->
                                </div>
	</div>
</div>	


<!------ Add Paper ----->
<!--Modal: Add Form-->
<div class="modal fade" id="modal_papper" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
    <div class="modal-dialog cascading-modal" role="document">
        <!--Content-->
        <div class="modal-content">
 
        
                <div class="modal-header">
                    <center><h4 class="modal-title">Προσθήκη Νέας Δημοσίευσης</h4></center>
                </div>
                <div class="modal-body">
				<div class="container-fluid">
				<form method="POST" action="addnew.php" id="frmCheckUsername">
				    <div class="panel panel-body form">
            	
    <div class="row form-group">
        <div class="col-sm-12">
            <div class="input-group input-group-sm">
                <span class="input-group-addon"><i class="glyphicon glyphicon-education"></i> Τίτλος</span>
                <input name="title" class="form-control" type="text" id="title" required placeholder="Τίτλος" title="">
            </div>
        </div></div>
        <div class="row form-group">
        <div class="col-sm-12">
            <div class="input-group input-group-sm">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i> Συγγραφέας</span>
                <input type="text" class="form-control" placeholder="Συγγραφέας" title="authors" id="authors"  name="authors" required>
            </div>
        </div>
    </div>
    <div class="row form-group">
        <div class="col-sm-12">
            <div class="input-group input-group-sm">
                <span class="input-group-addon"><i class="glyphicon glyphicon-briefcase"></i> Τύπος Δημοσίευσης</span>
                <select name="type" style="height:30px">
					<option value="Journal Articles">Αρθρα εφημερίδας</option>
					<option value="Conference and Workshop Papers">Έγγραφα συνεδρίων και εργαστηρίων</option>
					<option value="Informal Publications">Άτυπες Δημοσιεύσεις</option>
					<option value="Editorship">Σύνταξη</option>
					<option value="Parts in Books or Collections">Μέρη σε βιβλία ή συλλογές</option>
					<option value="Books and Theses">Βιβλία και Διατριβές</option>
				</select>
            </div>
        </div> 
    </div>
    
    <div class="row form-group">
     <div class="col-sm-9">
            <div class="input-group input-group-sm">
                <span class="input-group-addon"><i class="glyphicon glyphicon-cloud-download"></i></span>
                <input type="text" class="form-control" placeholder="URL" title="url" name="url">
            </div>
        </div>
        
        <div class="col-sm-3">
            <div class="input-group input-group-sm">
                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                <input type="text" class="form-control" placeholder="Έτος" title="Έτος" name="year" minlength="4" maxlength="4">
            </div>
        </div>
    </div>
   
</div>

                  <div align="center">  <button type="reset" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Ακύρωση</button>
                    <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Αποθήκευση</a></div>
			
				</form>
                </div>
                
               
            </div>
        </div>
    </div>
        </div>
	</div>
</div>	
               

<div class="text-center">
    
</div>



</body>
</html>
