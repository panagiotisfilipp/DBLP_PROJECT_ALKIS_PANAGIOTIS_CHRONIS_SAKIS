
<!------ Login/Reg  ----->
<!--Modal: Login / Register Form-->

<div class="modal fade" id="modal_login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog cascading-modal" role="document">
        <!--Content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <ul class="nav nav-pills " role="tablist">

                                            <li class="nav-item"><a class="nav-link active" data-toggle="pill" href="#login-form"> Είσοδος <span class="fas fa-user"></span></a></li>
                                            <li class="nav-item"><a class="nav-link" data-toggle="pill" href="#registration-form"> Εγγραφή <span class='fas fa-pencil-alt'></span></a></li>
                                        </ul>
										<button type="button" class="close" data-dismiss="modal">
													<i class="fas fa-times-circle"></i>
										</button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="tab-content">
                                            <div id="login-form" class="container tab-pane active">
                                                <form method="post" action="login.php">
                                                    
													<div class="form-group">
                                                        <label for="name"> Όνομα χρήστη: </label>
                                                        <input type="text" class="form-control" id="name" placeholder="Εισάγετε το όνομα χρήστη" name="name" required>
                                                    </div>												
                                                    
                                                    
                                                    <div class="form-group">
			    <label for="password">Κωδικός</label>
			    <input class="form-control" id="pswd" name="pswd" placeholder="Εισάγετε τον κωδικό χρήστη" required 
			    	data-toggle="password">
			</div>
                               <div style="margin-bottom:12px;"><a href="./reset/reset_pass.html" target="_blank" class="text-danger">Ξεχάσατε τον κωδικό εισόδου;</a></div>                     
                                                    

													<div align="center">
														<input type="submit"   class="btn btn-dark" name="login_user" id="btn_login" value="Είσοδος"/>
													</div>
													
                                                </form>
                                            </div>
                                            <div id="registration-form" class="tab-pane fade">
											    
                                                    
                                                <form  name="pgenerate" method="post" action="register.php" id="register_form">
												<div class="form-group">
                                                        <label for="surname">Επώνυμο:</label>
                                                        <input type="text" class="form-control" id="surname" placeholder="Εισάγετε το επώνυμο σας" name="surname" required>
                                                    </div>
													 
                                                    <div class="form-group">
                                                        <label for="name">Όνομα:</label>
                                                        <input type="text" class="form-control" id="name" placeholder="Εισάγετε το όνομά σας" name="name" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="username"> Όνομα χρήστη:</label>
                                                        <input type="text" class="form-control" id="username" placeholder="Εισάγετε το όνομα χρήστη" name="username" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="email">E-mail:</label>
                                                        <input type="email" class="form-control" id="email" placeholder="Εισάγετε την ηλεκτρονική σας διεύθυνση (email)" name="email" required>
                                                    </div>	
                                                    
                                                    <div class="form-group">
			                                            <label for="password">Κωδικός:</label>
														<!----------------------->
<div class="tax-wrap">
			                                            <input class="form-control" id="password_1" name="password_1" placeholder="Δημιουργία νέου κωδικού" required 
			    	                                       data-toggle="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Πρέπει να έχει 8 χαρακτήρες,να περιέχει τουλάχιστον έναν αριθμό,ένα πεζό και ένα κεφαλαίο χαρακτήρα." required>
														
</div>
<div class="hide-tax alert-info"">
                   <input type="button" value="Παραγωγή Κωδικού" onClick="populateform(this.form.thelength.value)"><br />
				   <input type="hidden" name="thelength" size=3 value="8">
  &nbsp;<i class="fas fa-info-circle" style='font-size:16px'></i> 8 χαρακτήρες, 1 αριθμός , 1 πεζός &amp; 1 κεφαλαίος χαρακτήρας.<br> 
 &nbsp;&nbsp; <b>Υπόδειγμα: Pas1word</b></br>
                  
</div>
			                                        </div>
			                                       <div class="form-group">
			                                            <label for="password">Επαλήθευση Κωδικού:</label>
			                                             <input class="form-control" id="password_2" name="password_2" placeholder="Επαλήθευση νέου κωδικού" required 
			    	                                      data-toggle="password">
			                                       </div>
                                                    
                                                    
					
													<div id="results"></div>
													<div align="center" id="register_div" >
														<input type="submit"  class="btn btn-success" name="reg_user" id="btn_register" value="Εγγραφή" />	
													</div>
													
                                                </form>
												
                                            </div>
                                    
                                        </div>
                                    </div>

                                </div>
	</div>
</div>	

<!-- Modal Change User Pass-->
 
         
<div class="modal fade" id="changepass">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
		<h5 class="modal-title">Αλλαγή Συνθηματικού</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
		<div class="modal-body">
		<form name="frmChange" method="post" action="change_pass.php"
                   onSubmit="return validatePassword()">
           <div class="form-group">
		    
                                <label class="col-sm-4 control-label" style="margin:5px 0px 10px 0px;" for="name">Τρέχων:</label>
                               <!-- <div class="col-sm-10" style="margin-bottom:1px;">-->
                                    <input type="password" class="form-control" name="currentPassword" required placeholder="Τρέχων Συνθηματικό" autofocus data-toggle="password" id="currentPassword">
                                <!--</div>-->
                            </div>
                            
                            <div class="form-group">
                                <label class="control-label col-sm-4" style="margin:5px 0px 10px 0px;" for="name">Νέο:</label>
                            <!--    <div class="col-sm-10" style="margin-bottom:1px;">-->
								<div class="tax-wrap">
                                    <input type="password" class="form-control" name="newPassword" required placeholder="Νέο Συνθηματικό" data-toggle="password" id="newPassword" 
									pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Πρέπει να έχει 8 χαρακτήρες,να περιέχει τουλάχιστον έναν αριθμό,ένα πεζό και ένα κεφαλαίο χαρακτήρα." required>
                              <!--  </div>-->
								<div class="hide-tax alert-info"">
                   <input type="button" value="Παραγωγή Κωδικού" onClick="populateform_change(this.form.thelength.value)"><br />
				   <input type="hidden" name="thelength" size=3 value="8">
  &nbsp;<i class="fas fa-info-circle" style='font-size:16px'></i> 8 χαρακτήρες, 1 αριθμός , 1 πεζός &amp; 1 κεφαλαίος χαρακτήρας.<br> 
 &nbsp;&nbsp; <b>Υπόδειγμα: Pas1word</b>
</div>
                            </div></div>
                            
                            <div class="form-group">
                                <label class="control-label col-sm-4"  for="name">Επανάληψη:</label>
                              <!--  <div class="col-sm-10" style="margin-bottom:5px;">-->
                                    <input type="password" class="form-control" name="confirmPassword" required placeholder="Επανάληψη Συνθηματικού" data-toggle="password" id="confirmPassword">
                               <!-- </div>-->
                                <input type="hidden" name="uri" value="<?php  echo $_SERVER['REQUEST_URI']; ?>">
                                
								 <div class="modal-footer">
                                <button type="submit" class="btn btn-primary" name="submit">Αλλαγή</button>
                            </div>
                            </div> 
       </form> </div>
	 
		</div>
		</div>
		</div>


<script src="./js_async_calls/bootstrap-password-toggler.js" type="text/javascript"></script>
<script>
function myFunction_login() {
  var x = document.getElementById("pswd");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>


<script>
function myFunction1() {
  var x = document.getElementById("password_1");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
<script>
function myFunction2() {
  var x = document.getElementById("password_2");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>

<!-- Elegxos gia idia pass -->
<script type="text/javascript">
function validatePassword() {
var currentPassword,newPassword,confirmPassword,output = true;

currentPassword = document.frmChange.currentPassword;
newPassword = document.frmChange.newPassword;
confirmPassword = document.frmChange.confirmPassword;

if(!currentPassword.value) {
	currentPassword.focus();
	document.getElementById("currentPassword").innerHTML = "required";
	output = false;
}
else if(!newPassword.value) {
	newPassword.focus();
	document.getElementById("newPassword").innerHTML = "required";
	output = false;
}
else if(!confirmPassword.value) {
	confirmPassword.focus();
	document.getElementById("confirmPassword").innerHTML = "required";
	output = false;
}
if(newPassword.value != confirmPassword.value) {
	newPassword.value="";
	confirmPassword.value="";
	newPassword.focus();
	document.getElementById("confirmPassword").innerHTML = "not same";
	output = false;
} 	
//validate if password_old and password_new is equal
if(newPassword.value==currentPassword.value){
	newPassword.focus();
	alert( "Ο νέος κωδικός δεν μπορεί να είναι ίδιος με τον τρέχων για λόγους ασφαλείας");
	output = false;
}
return output;
} 
</script> 


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

// Generate a password string
var generatePassword = function(numLc, numUc, numDigits) {
  numLc = numLc || 0;
  numUc = numUc || 1;
  numDigits = numDigits || 1;
  


  var lcLetters = 'abcdefghijklmnopqrstuvwxyz';
  var ucLetters = lcLetters.toUpperCase();
  var numbers = '0123456789';
  

  var getRand = function(values) {
    return values.charAt(Math.floor(Math.random() * values.length));
  }

 
  function shuffle(o){ //v1.0
    for(var j, x, i = o.length; i; j = Math.floor(Math.random() * i), x = o[--i], o[i] = o[j], o[j] = x);
    return o;
  };

  var pass = [];
  for(var i = 0; i < numLc-2; ++i) { pass.push(getRand(lcLetters)) }
  for(var i = 0; i < numUc; ++i) { pass.push(getRand(ucLetters)) }
  for(var i = 0; i < numDigits; ++i) { pass.push(getRand(numbers)) }
  

  return shuffle(pass).join('');
}
function populateform(enterlength){
document.pgenerate.password_1.value=generatePassword(enterlength)
}

//generate for allagi kodikou 
var generatePassword_change = function(numLc, numUc, numDigits) {
  numLc = numLc || 0;
  numUc = numUc || 1;
  numDigits = numDigits || 1;
  


  var lcLetters = 'abcdefghijklmnopqrstuvwxyz';
  var ucLetters = lcLetters.toUpperCase();
  var numbers = '0123456789';
  

  var getRand = function(values) {
    return values.charAt(Math.floor(Math.random() * values.length));
  }

 
  function shuffle(o){ //v1.0
    for(var j, x, i = o.length; i; j = Math.floor(Math.random() * i), x = o[--i], o[i] = o[j], o[j] = x);
    return o;
  };

  var pass = [];
  for(var i = 0; i < numLc-2; ++i) { pass.push(getRand(lcLetters)) }
  for(var i = 0; i < numUc; ++i) { pass.push(getRand(ucLetters)) }
  for(var i = 0; i < numDigits; ++i) { pass.push(getRand(numbers)) }
  

  return shuffle(pass).join('');
}
function populateform_change(enterlength){
document.frmChange.newPassword.value=generatePassword_change(enterlength)
}
</script>



