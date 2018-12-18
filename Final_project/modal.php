 
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
                                                    
                                                    

													<div align="center">
														<input type="submit"   class="btn btn-dark" name="login_user" id="btn_login" value="Είσοδος"/>
													</div>
													
                                                </form>
                                            </div>
                                            <div id="registration-form" class="tab-pane fade">
											    
                                                <form method="post" action="register.php" id="register_form">
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
			    <input class="form-control" id="password_1" name="password_1" placeholder="Δημιουργία νέου κωδικού" required 
			    	data-toggle="password">
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