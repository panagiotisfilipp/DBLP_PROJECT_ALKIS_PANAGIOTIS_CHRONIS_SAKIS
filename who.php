
﻿<script>

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
   </head>
<body>
   <h2><center>Γράψτε την άποψη σας</h2>

   

     


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
			</form>
</body>

</html>

