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

<?php
include ('config.php');



?>	
<form name="create_form" method="post" action="rss_insert.php" enctype="multipart/form-data">
	<table align= 'center' border="0" cellspacing="1" style="border-collapse: collapse; color:#000000" bordercolor="#111111" width="60%">
		<tr>
			<th colspan='2'><h3> ΕΙΣΑΓΩΓΗ ΝΕΟΥ RSS </h3><br></th>
		</tr>
		<tr>
			<th align="right">Τἰτλος:</th>
			<td align='left'>
			<?php echo"<input type='text' value='' name='title' >"; ?> 
			</td>
		</tr>
		<tr>
			<th align="right">Περιγραφή:</th>
			<td align='left'>
			<?php echo"<input type='text' value='' name='description' >"; ?> 
			</td>
		</tr>
		<tr>
			<th align="right">Link:</th>
			<td align='left'>
			<?php echo"<input type='text' value='' name='link' >"; ?> 
			</td>
		</tr>
	
		
		<tr>
			
			<td><?php echo"<input type='hidden' name='insupd' value='insert'>"; ?>  </td>
		</tr>
		<tr>
			<td align='center' colspan='2'><br>
				<input class="button" type='button' value='ΔΗΜΙΟΥΡΓΙΑ' name='submit_button' onclick="checkentryform();" ></td>
		</tr>
	</table>
	<br><br><br><br><br>
	<strong>Εισαγωγή RSS</strong>
	<p>Σε αυτή τη φόρμα ο Διαχειριστής έχει τη δυνατότητα να δημιουργήσει επιπλέον rss.</p>
</form>