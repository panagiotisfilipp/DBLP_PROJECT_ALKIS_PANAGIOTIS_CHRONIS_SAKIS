<?php include("lock.php"); ?>
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
	$name=$rows[0]['name'];
	$surname=$rows[0]['surname'];
	$username=$rows[0]['username'];
	$password=$rows[0]['password'];
	$email=$rows[0]['email'];
	$role=$rows[0]['role'];
	$register_time=$rows[0]['register_time'];
}
}

?>



<html>
<meta charset="utf-8"/>
<head>
    <title>Διαχείριση Χρηστών</title>
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

<?php include('nav.php'); ?>

<!--forma users-->
<div class="container" style="margin-top:70px" >
  <div class="row">
<div align="center" class="col-sm-12">

<form name="edit_user" method="post" action="users_update.php" enctype="multipart/form-data">
	<h3><b>ΕΠΕΞΕΡΓΑΣΙΑ ΣΤΟΙΧΕΙΩΝ ΧΡΗΣΤΩΝ</h3><br></th>
	<div class="table-responsive">
       <table class="table table-striped table-bordered">
           <tr>
			<th align="right">Όνομα</th>
			<td align='left'>
			<?php echo"<input type='text' size='55' value='".$name."' name='name' >"; ?> 
			</td>
		</tr>
          <tr>
			<th align="right">Επώνυμο</th>
			<td align='left'>
			<?php echo"<input type='text' size='55' value='".$surname."' name='surname' >"; ?> 
			</td>
		</tr>		
		<tr>
			<th align="right">Όνομα Χρήστη:</th>
			<td align='left'>
			<?php echo"<input type='text' size='55' value='".$username."' name='username' >"; ?> 
			</td>
		</tr>
		<tr>
			<th align="right">Κωδικός Χρήστη:</th>
			<td align='left' colspan="2">
				<?php echo"<input type='text' size='65' value='".$password."' name='password' >"; ?> 
			</td>
		</tr>
		
		<tr>
			<th align="right">Email:</th>
			<td align='left' colspan="2">
			<?php echo"<input type='text' size='55' value='".$email."' name='email' >";
           			?> 
			</td>
		</tr>
		
		<tr>
			<th align="right">role:</th>
			<td align='left' colspan="2">
			<?php echo"<input type='text' size='55' value='".$role."' name='role' >";
           			?> 
			</td>
		</tr>
			<tr>
			<th align="right">Ημερ/νια Εγγραφής:</th>
			<td align='left' colspan="2">
			<?php echo"<input type='text' size='55' value='".$register_time."' name='register_time' >";
           			?> 
			</td>
		</tr>
		
	    
		
			<td><?php echo"<input type='hidden' value='".$user_id."' name='user_id'>"; ?></td>
			<td><input type='hidden' name='insupd' value='update'></td>
		
		<tr>
			<td colspan='2' align='center'><br>
				<input class="button" type='button' value='ΑΛΛΑΓΗ' name='submit_button' onclick="checkentryform();" ></td></tr>
	</table>
	<br><br>	
	<strong>Τροποποίηση Χρηστών</strong>
	<p>Σ' αυτή τη φόρμα ο Διαχειριστής μπορεί να τροποποιήσει τα στοιχεία των Χρηστών.<br>Αν το πεδίο ρόλος είναι "1" ο χρήστης είναι απλός,αλλιώς αν είναι "0" είναι διαχειριστής.<br>
       H ημερομηνία γράφεται με το format (yy-mm-dd),π.χ 2019-01-05	</p>

</form>
</div>
 </div>
</div>
</div>
<?php include('footer.php'); ?>
<?php include('modal.php'); ?>
</body>
</html>