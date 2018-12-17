<?php
include ('lock.php');
?>
<!-- Φόρμα εισαγωγής rss -->
<script>
	function checkentryform() {
		var cForm   = document.forms.create_form;
		var errstr  = '';  
		
		<!-- title: Ελέγχει αν το πεδίο είναι null  -->
		if ( cForm.title.value==''){
			errstr = errstr+'Το πεδίο τίτλος δεν μπορεί να είναι κενό.\n';
			cForm.title.style.backgroundColor="#ff6347";
		}
		<!-- description: Ελέγχει αν το πεδίο είναι null  -->
		if ( cForm.description.value==''){
			errstr = errstr+'Το πεδίο περιγραφή δεν μπορεί να είναι κενό.\n';
			cForm.description.style.backgroundColor="#ff6347";
		}
		
		<!-- link: Ελέγχει αν το πεδίο είναι null  -->
		if ( cForm.link.value==''){
			errstr = errstr+'Το πεδίο link δεν μπορεί να είναι κενό.\n';
			cForm.link.style.backgroundColor="#ff6347";
		}

		
		
		if (errstr.length>0)
			alert(errstr);
		else
			document.forms.create_form.submit();
	}
</script>


<html>
<meta charset="utf-8"/>
<head>
    <title>Διαχείριση RSS</title>
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

<?php include('nav.php'); 
include ('config.php');?>

<!--forma rss-->
<div class="container" style="margin-top:70px" >
  <div class="row">
<div align="center" class="col-sm-8">
<form name="create_form" method="post" action="rss_insert.php" enctype="multipart/form-data">
    <h3><b> ΕΙΣΑΓΩΓΗ ΝΕΟΥ RSS</b></h3><br />
<div class="table-responsive">
       
	 <table class="table table-striped table-bordered">

		
		<tr>
			<th align="right">Τἰτλος:</th>
			<td align='left'>
			<?php echo"<input type='text' size='55' value='' name='title'>"; ?> 
			</td>
		</tr>
		<tr>
			<th align="right">Περιγραφή:</th>
			<td align='left'>
			<?php echo"<input type='text' size='55' value='' name='description'>"; ?> 
			</td>
		</tr>
		<tr>
			<th align="right">Link:</th>
			<td align='left'>
			<?php echo"<input type='text' size='55' value='' name='link'>"; ?> 
			</td>
		</tr>
	
		
		
			
			<td><?php echo"<input type='hidden' name='insupd' value='insert'>"; ?>  </td>
		
		<tr>
			<td align='center' colspan='2'><br>
				<input class="button" type='button' value='ΔΗΜΙΟΥΡΓΙΑ' name='submit_button' onclick="checkentryform();" ></td>
		</tr>
		
	</table>

	<br><br>
	<strong>Εισαγωγή RSS</strong>
	<p>Σε αυτή τη φόρμα ο Διαχειριστής έχει τη δυνατότητα να δημιουργήσει νέα rss.</p>
</form>
	 </div>
 </div>
</div>
</div>
<?php include('footer.php'); ?>
<?php include('modal.php'); ?>
</body>
</html>