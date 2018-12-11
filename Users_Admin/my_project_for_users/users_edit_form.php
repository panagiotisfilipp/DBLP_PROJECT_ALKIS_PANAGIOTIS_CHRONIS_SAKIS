<!-- Φόρμα τροποποίησης στοιχείων χρήστη -->

<script>
	function checkentryform() {
		var cForm   = document.forms.edit_user;
		var errstr  = '';  
		
		<!-- username: Ελέγχει αν το πεδίο είναι null  -->
		if ( cForm.username.value==''){
			errstr = errstr+'Το πεδίο Όνομα Χρήστη δεν μπορεί να είναι κενό.\n';
			cForm.username.style.backgroundColor="#ff6347";
		}
		
		<!-- password: Ελέγχει αν το πεδίο είναι null  -->
		if ( cForm.password.value==''){
			errstr = errstr+'Το πεδίο Κωδικός Χρήστη δεν μπορεί να είναι κενό.\n';
			cForm.password.style.backgroundColor="#ff6347";
		}
		
		
		<!--validate password-->
		var email=cForm.email.value;
		
		 if  (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(cForm.email.value)) {
		 errstr = errstr;}
			 else
				 
             errstr = errstr+'Παρακαλώ εισάγετε ένα έγκυρο e-mail.';
        
                                        
	
		
		if (errstr.length>0)
			alert(errstr);
		else
		
				
			document.forms.edit_user.submit();
	}
</script>


<?php
include ('config.php');


$query_select = "SELECT * FROM users WHERE user_id ='".$_GET['p1']."' ";
$result=$conn->query($query_select) or die ('Error, query failed check_post');

if ($result)
{
	//$num_result=mysqli_num_rows($result);
	$rows=[];
	
	while($row = mysqli_fetch_array($result)){
	$rows[]=$row;
	
	$user_id=$rows[0]['user_id'];
	$username=$rows[0]['username'];
	$password=$rows[0]['password'];
	$email=$rows[0]['email'];
	
}
}

?>

<form name="edit_user" method="post" action="users_update.php" enctype="multipart/form-data">
	<table align= 'center'border="0" cellspacing="1" style="border-collapse: collapse; color:#000000" bordercolor="#111111" width="60%">
		<tr>
			<th colspan="3" align="center">
			<h3>ΕΠΕΞΕΡΓΑΣΙΑ ΣΤΟΙΧΕΙΩΝ ΧΡΗΣΤΩΝ</h3><br></th>
		</tr>
		<tr>
			<th align="right">Όνομα Χρήστη:</th>
			<td align='left'>
			<?php echo"<input type='text' value='".$username."' name='username' >"; ?> 
			</td>
		</tr>
		<tr>
			<th align="right">Κωδικός Χρήστη:</th>
			<td align='left' colspan="2">
				<?php echo"<input type='text' value='".$password."' name='password' >"; ?> 
			</td>
		</tr>
		
		<tr>
			<th align="right">Email:</th>
			<td align='left' colspan="2">
			<?php echo"<input type='text' value='".$email."' name='email' >";
           			?> 
			</td>
		</tr>
		
		
	    
		<tr>
			<td><?php echo"<input type='hidden' value='".$user_id."' name='user_id'>"; ?></td>
			<td><input type='hidden' name='insupd' value='update'></td>
		</tr>
		<tr>
			<td colspan='3' align='center'><br>
				<input class="button" type='button' value='ΑΛΛΑΓΗ' name='submit_button' onclick="checkentryform();" ></td></tr>
	</table>
	<br><br><br><br><br>	
	<strong>Τροποποίηση Χρηστών</strong>
	<p>Σ' αυτή τη φόρμα ο Διαχειριστής μπορεί να τροποποιήσει τα στοιχεία των Χρηστών.</p>

</form>