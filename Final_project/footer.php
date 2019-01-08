 <!DOCTYPE html>
<html>
<head>
    <title>Call for papers</title>
	<link rel="shortcut icon" type="image/x-icon" href="logo2.ico" />     
	<link rel="stylesheet" type="text/css" href="css/mystyle.css">
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	

  
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="css/main.css">  
 

<style>
  .navbar-custom {
    background-color:#7dc476;
	<!--color:	#fff400;-->
	
  </style>
</head>
<body>
 <footer>
    <section class="footer-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <ul>
                <?php  if (isset($_SESSION['username'])&& $_SESSION['role']=='1' ) { ?>
		           <li><a href="index_reg.php">Αρχική Σελίδα</a></li>
				     <li class="hidden">/</li>
					<li><a href="about.php">Ποιοι είμαστε</a></li>
                     <li class="hidden">/</li>
					 <li><a href="dblp.php">Το DBLP API</a></li>
					<li class="hidden">/</li>
                     <li><a href="manual_register.php">Οδηγίες για την Εφαρμογή</a></li>
				   
				   
				   <?php 
				   } ?>
		  
		       <?php  if (isset($_SESSION['username'])&& $_SESSION['role']=='0' ) { ?>
		           <li><a href="index_admin.php">Αρχική Σελίδα</a></li>
				    <li class="hidden">/</li>
					<li><a href="about.php">Ποιοι είμαστε</a></li>
					<li class="hidden">/</li>
                    <li><a href="dblp.php">Το DBLP API</a></li>
					<li class="hidden">/</li>
					<li><a href="manual_admin.php">Οδηγίες για την Εφαρμογή</a></li> 
				   <?php } ?>
		    
			<?php  if (!isset($_SESSION['username'])) { ?>
		   <li><a href="index.php">Αρχική Σελίδα</a></li> 
		    <li class="hidden">/</li>
              <li><a href="about.php">Ποιοι είμαστε</a></li>
              <li class="hidden">/</li>
              <li><a href="dblp.php">Το DBLP API</a></li>
              <li class="hidden">/</li>
		       <li><a href="manual_user.php">Οδηγίες για την Εφαρμογή</a></li> 
		   
		 <?php  } ?>
              
             
           
            </ul>
          </div>

		  <div class="col-md-12">
            <p>(C) All Rights Reserved <span>/</span> Designed and Developed by <a href="about.php" target="_blank">Four of us</a><br>
            Copyright 2018 ΑΤΕΙΘ.-ΤΜΗΜΑ Π.Μ.Σ. Ευφυείς Τεχνολογίες Διαδικτύου
		  </div>
        </div>
      </div>
      <!-- /.container -->
    </section>
  </footer>
</body>
</html>
 
 
 
 
 
 
 
 
 