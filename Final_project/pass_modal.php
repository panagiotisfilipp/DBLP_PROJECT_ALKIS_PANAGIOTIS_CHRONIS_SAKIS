<?php
session_start();
$_SESSION["user_id"] = "16";
include ('config.php');

if (count($_POST) > 0) {
    $result = mysqli_query($conn, "SELECT *from users WHERE user_id='" . $_SESSION["userId"] . "'");
    $row = mysqli_fetch_array($result);
	
	if (password_verify($_POST["currentPassword"] , $row["password"])){//ελεγχος αν κωδικος ειναι ίδιος με βάση
      $new_password = password_hash($_POST["newPassword"],PASSWORD_DEFAULT);// κωδικοποιηση νέου κωδικού
        mysqli_query($conn, "UPDATE users set password='" . $new_password . "' WHERE user_id='" . $_SESSION["userId"] . "'");
        $message = "Password Changed";
    } else
        $message = "Current Password is not correct";
}
?>

<!-- Modal Change User Pass-->
          
<div class="modal fade" id="changepass">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
		<h5 class="modal-title">Αλλαγή Συνθηματικού</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
		<div class="modal-body">
		<form name="frmChange" method="post" action=""
                   onSubmit="return validatePassword()">
           <div class="form-group">
		    
                                <label class="col-sm-4 control-label" style="margin:5px 0px 10px 0px;" for="name">Τρέχων:(<?php echo $_SESSION["user_id"];?>)</label>
                                <div class="col-sm-10" style="margin-bottom:1px;">
                                    <input type="password" class="form-control" name="currentPassword" required placeholder="Τρέχων Συνθηματικό" autofocus data-toggle="password" id="currentPassword">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="control-label col-sm-4" style="margin:5px 0px 10px 0px;" for="name">Νέο:</label>
                                <div class="col-sm-10" style="margin-bottom:1px;">
                                    <input type="password" class="form-control" name="newPassword" required placeholder="Νέο Συνθηματικό" data-toggle="password" id="newPassword">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="control-label col-sm-4"  for="name">Επανάληψη:</label>
                                <div class="col-sm-10" style="margin-bottom:5px;">
                                    <input type="password" class="form-control" name="confirmPassword" required placeholder="Επανάληψη Συνθηματικού" data-toggle="password" id="confirmPassword">
                                </div>
								 <div class="modal-footer">
                                <button type="submit" class="btn btn-primary" name="submit">Αλλαγή</button>
                            </div>
                            </div> 
         </form> 
		 </div>
	   <div class="message"><?php if(isset($message)) { echo $message; } ?></div>
		</div>
		</div>
		</div>
		
<script>
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
return output;
}
//$2y$10$b.0i5Tb0UtP/1SzeFen/WOkehr2hliaybaOzpJdaY.f2VXUkKXRee
</script>		
