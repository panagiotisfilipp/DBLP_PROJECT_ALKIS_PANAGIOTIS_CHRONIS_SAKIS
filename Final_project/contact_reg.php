<?php include('lock.php'); ?>
<!DOCTYPE html>

<html lang="en">

<head>
<link rel="stylesheet" type="text/css" href="css/mystyle.css">
<!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Επικοινωνία</title>
  
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
  .navbar-custom2 {
    background-color:#DBEBC7;
	<!--color:	#fff400;
	
  .navform-mail {
    background-color:#DBEBC7;  -->
  }	
	
  </style>
</head>
<body>


<button onclick="topFunction()" id="myBtn" title="Go to top" style="border-radius: 4px;padding: 15px;cursor: pointer;color: white;background-color: #96f5f3;outline: none;border: none;display: none;position: fixed;bottom: 20px;right: 30px;z-index: 99;font-size: 18px;">Top</button>

 

<!--Navbar -->
<?php include ('nav.php'); ?>
<!--Navbar end-->

        
<!--  ΑΠΟ ΕΔΩ ΚΑΙ ΚΑΤΩ ΝΑ ΒΑΛΩ ΛΕΙΤΟΥΡΓΙΕΣ ΚΟΥΜΠΙΩΝ  -->	
		
		

<div class="container" style="margin-top:70px" >
  <div class="row">
    <div  class="col-sm-12">
        <h3 align="center"><b>Επικοινωνία</b></h3><br />
	  <p>
	      <div class="col-sm-12" style="margin-top:20px">
     <div class="shadow p-3 mb-5 navbar-custom2 rounded"><?php include ('mail.php'); ?></div></p>
</div> 
	      
	      
 
    </p>	 
    </div>
	</div>
 </div>
	


<!--<div class="jumbotron text-center" style="margin-bottom:0">
  <p>Footer</p>
</div>-->

 <?php include ('footer.php');?>

<?php include ('modal.php');?>


               

<div class="text-center">
    
</div>



</body>
</html>
