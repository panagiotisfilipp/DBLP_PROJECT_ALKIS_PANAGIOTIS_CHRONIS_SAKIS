<script>
	function checkentryform() {
		var cForm   = document.forms.search_author;
		var errstr  = '';  
		
		
		<!-- search_string: Ελέγχει αν το πεδίο είναι null  -->
		if ( cForm.search_string.value==''){
			errstr = errstr+'Το πεδίο συγγραφέας δεν μπορεί να είναι κενό.\n';
			cForm.search_string.style.backgroundColor="#ff6347";
		}
	
		
		if (errstr.length>0)
			alert(errstr);
		else
		
				
			document.forms.search_author.submit();
	}
</script>


<html>
   <head>
      <title>PUBLICATIONS DATA</title>
   </head>
<body>
   <h1><center>PUBLICATIONS DATA</h1>

   

     


<form name="search_author" method="post" action="json_from_url.php" enctype="multipart/form-data">
	<table align= 'center' border="0" cellspacing="1" style="border-collapse: collapse; color:#000000" bordercolor="#111111" width="40%">
	<th align='center' colspan='2'>ΕΠΙΛΕΞΤΕ ΣΥΓΓΡΑΦΕΑ</th>
	<tr>
            <th align="center" colspan='1'>ΣΥΓΓΡΑΦΕΑΣ(*):</th>
			<td align='left'>
			<?php echo"<select name='search_string';>
			<option>Adamidis</option>
			<option>Diamantaras</option>
			<option>Chatzimisios</option>
			<option>Ilioudis</option>
			<option>salampasis</option>
			<option value='ougiaroglou'>ougiaroglou stefanos</option>
			<option>Karamitopoulos</option>
			<option>Dervos</option>
			<option>Papanikolaou</option>
			<option>Sidiropoulos</option>
			<option>Vozalis</option>
			<option>Goulianas</option>
			<option>Keramopoulos</option>
			<option></option>
			</select>";?> 
			</td>
			
		</tr>
			
		
			</table>
			<table align= 'center' border="0" cellspacing="1" style="border-collapse: collapse; color:#000000" bordercolor="#111111" width="10%">
	<th align='left'><BR><BR>
	<input class="button" type='button' value='OK' name='submit_button' onclick="checkentryform();" >
	</th>
	
	
	</table>
			</form>
</body>
</html>