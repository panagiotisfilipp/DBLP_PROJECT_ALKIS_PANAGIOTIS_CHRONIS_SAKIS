<?php
if($_GET['key'] && $_GET['reset'])
{
  $email=$_GET['key'];
  $pass=$_GET['reset'];
  //mysql_connect('localhost','root','');
  include ('config.php');
  //mysql_select_db('sample');
  $query_select="select email,password from users where email='$email' and password='$pass'";
  $select= mysqli_query($conn,$query_select);
 // echo $select;
   //if($select= mysqli_query($conn,$query_select))
     
  if(mysqli_num_rows($select)==1)
  
  {

    ?>
    <head>
    <!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	<script>
//Pop up gia endixi password
$(document).ready(function() {
	
$('.hide-tax').hide();	
	
  $(".tax-wrap input").focus(function() {
      $('.hide-tax').show('slow');       
      //return false;
    });
    
  
 $('.tax-wrap input').blur(function(){
    if( !$(this).val() ) {
          $('.hide-tax').hide('slow');
    }
});

  
  
});//end
</script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    </head>
    <body style="background-color:#7dc476;">
    <div class="container" style="margin-top:70px" >
  <div class="row">
<div align="center" class="col-sm-12">

<h2><b>Εισαγωγή νέου Κωδικού</b></h2>
<br>

<form method="post" action="submit_new.php" onSubmit="return validatePassword()" name="frmChange">
    <input type="hidden" name="email" value="<?php echo $email;?>">
   <div class="form-group">
                                <label class="control-label col-sm-4" style="margin:5px 0px 10px 0px;" for="name">Νέο:</label>
                                <div class="col-sm-10" style="margin-bottom:1px;">
								<div class="tax-wrap">
     <input type="password" class="form-control" name="password" required placeholder="Νέο Συνθηματικό" data-toggle="password" id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Πρέπει να έχει 8 χαρακτήρες,να περιέχει τουλάχιστον έναν αριθμό,ένα πεζό και ένα κεφαλαίο χαρακτήρα." required>
      </div>
	  <div class="hide-tax alert-info"">

  &nbsp;<i class="fas fa-info-circle" style='font-size:16px'></i> 8 χαρακτήρες, 1 αριθμός , 1 πεζός &amp; 1 κεφαλαίος χαρακτήρας.<br> 
 &nbsp;&nbsp; <b>Υπόδειγμα: Pas1word</b>
</div>
    </div>
  
  <div class="form-group">
                                <label class="control-label col-sm-4"  for="name">Επανάληψη:</label>
                                <div class="col-sm-10" style="margin-bottom:5px;">
     <input type="password" class="form-control" name="confirmPassword" required placeholder="Επανάληψη" data-toggle="password" id="confirmPassword">
    </div>
    </div>
    <div>
    <input type="submit" name="submit_password" value="Υποβολή"></div>
    </form>
</div>
</div>
</div>
    
</body>    
    
    
    
    <?php
  }
}
?>

<script src="../js_async_calls/bootstrap-password-toggler.js" type="text/javascript"></script>

<!-- Elegxos gia idia pass -->
<script type="text/javascript">
function validatePassword() {
var password,confirmPassword,output = true;


password = document.frmChange.password;
confirmPassword = document.frmChange.confirmPassword;

if(!password.value) {
	password.focus();
	document.getElementById("password").innerHTML = "required";
	output = false;
}
else if(!confirmPassword.value) {
	confirmPassword.focus();
	document.getElementById("confirmPassword").innerHTML = "required";
	output = false;
}
if(password.value != confirmPassword.value) {
	password.value="";
	confirmPassword.value="";
	password.focus();
	alert('Οι κωδικοί που έχετε εισάγει δεν είναι ίδιοι.');
	document.getElementById("confirmPassword").innerHTML = "not same";
	output = false;
} 	
return output;
} 
</script>