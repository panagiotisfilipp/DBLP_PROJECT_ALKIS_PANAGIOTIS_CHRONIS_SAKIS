<?php
include ('lock.php');
?>

<script>

	function checkentryform() {
		var cForm   = document.forms.who_are_we;
		var errstr  = '';  
		
		
		<!-- author: Ελέγχει αν το πεδίο είναι null  
		if ( cForm.author.value==''){
			errstr = errstr+'Το πεδίο όνομα δεν μπορεί να είναι κενό.\n';
			cForm.author.style.backgroundColor="#ff6347";
		}
	    <!-- email: Ελέγχει αν το πεδίο είναι null  
		if ( cForm.email.value==''){
			errstr = errstr+'Το πεδίο email δεν μπορεί να είναι κενό.\n';
			cForm.email.style.backgroundColor="#ff6347";
		}
		
		<!-- comment: Ελέγχει αν το πεδίο είναι null  
		if ( cForm.comment.value==''){
			errstr = errstr+'Το πεδίο σχόλιο δεν μπορεί να είναι κενό.\n';
			cForm.comment.style.backgroundColor="#ff6347";
		}
		
		if (errstr.length>0)
			alert(errstr);
		else
		
				
			document.forms.who_are_we.submit();
	}
</script>


<html>
   <head>
      <title>Γράψτε την άποψη σας</title>
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
<!--Navbar end-->

<script>
(function() {
  "use strict";
  window.addEventListener("load", function() {
    var form = document.getElementById("form-validation");
    form.addEventListener("submit", function(event) {
      if (form.checkValidity() == false) {
        event.preventDefault();
        event.stopPropagation();
      }
      form.classList.add("was-validated");
    }, false);
  }, false);
}());
</script>

<div class="container" style="margin-top:70px" >
  <div class="row">
<div align="center" class="col-sm-12">

<h3><b>Επικοινωνία</b></h3>
<br>
<div class="shadow p-3 mb-5 bg-white rounded">
<form class="container" id="validation" style="margin-top:70px" action="mail_handler.php">
  <div class="row">
      
    <div class="col-sm-12">
      <label for="validation1">Ονοματεπώνυμο:</label>
      <input type="text" class="form-control" id="validation6" placeholder="First name" required>
    </div>
    <div class="col-sm-12">
      <label for="validation2">Last name</label>
      <input type="text" class="form-control" id="validation7" placeholder="Last name" value="Doe" required>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6 mb-3">
      <label for="validation3">email(*):</label>
      <input type="text" class="form-control" id="validation8" placeholder="City" required>
      <div class="invalid-feedback">
        Enter city.
      </div>
    </div>
    <div class="col-md-3 mb-3">
      <label for="validation4">State</label>
      <input type="text" class="form-control" id="validation9" placeholder="State" required>
      <div class="invalid-feedback">
        Enter state.
      </div>
    </div>
    <div class="col-md-3 mb-3">
      <label for="validation5">Zip</label>
      <input type="text" class="form-control" id="validation10" placeholder="Zip" required>
      <div class="invalid-feedback">
        Enter zip code.
      </div>
    </div>
  </div>
  <button class="btn btn-dark btn-md" type="submit">Submit</button>
</form></div>
  </div>
</div>
</div>
<!--
<form name="who_are_we" method="post" action="mail_handler.php" enctype="multipart/form-data">
	<table align= 'center' border="0" cellspacing="1" style="border-collapse: collapse; color:#000000" bordercolor="#111111" width="40%">
	<th align='justify' colspan='3'>Σεβόμαστε τα προσωπικά σας δεδομένα και δεν κοινοποιούμε το email σας.
	Παρακαλούμε σχολιάστε με πεζούς ελληνικούς χαρακτήρες κι όχι με greeklish.
	<br>Τα πεδία με (*) είναι υποχρεωτικά.</th>
	<tr><td><br><br></td></tr>
	<tr>
            <br><th align="left" colspan='1'>Όνομα(*):</th>
			<td align='left'>
			<input type='text'  name='author' size='30' aria-required='true'>
			</td>
			
		</tr>
			<tr>
            <th align="left" colspan='1'>email(*):</th>
			<td align='left'>
			<input type='text'  name='email'  size='30' aria-required='true'>  
			</td>
			
		</tr>
		<tr>
			<th align="left" colspan='1'>Ιστοσελίδα:</th>
			<td align='left' colspan='1'>
			<input type='text'  name='url' size='30'>
			</td>
		</tr>
			<tr>
			<th align="left" colspan='1'>Σχόλιο(*):</th>
			<td align='left' colspan='1'>
		    <textarea  name='comment' cols='45' rows='8' aria-required='true'></textarea> 
			</td>
		</tr>
		
		
			</table>
			<table align= 'center' border="0" cellspacing="1" style="border-collapse: collapse; color:#000000" bordercolor="#111111" width="10%">
	<th align='left'><BR><BR>
	<input class="button" type='submit' value='Υποβολή σχολίου' name='submit' onclick="checkentryform();" >
	</th>
	
	
	</table>
			</form>-->
			
			
 <?php include ('footer.php');?> 
  
<!-- Login Form Call -->

<?php include ('modal.php'); ?> 






<div class="text-center">
    
</div>
</body>

</html>

