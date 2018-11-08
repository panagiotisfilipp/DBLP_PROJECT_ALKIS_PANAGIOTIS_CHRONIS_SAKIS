<script>
	function checkentryform() {
		var cForm   = document.forms.search_author;
		var errstr  = '';  
		
		
		<!-- search_author: Ελέγχει αν το πεδίο είναι null  -->
		if ( cForm.search_author.value==''){
			errstr = errstr+'Το πεδίο συγγραφέας δεν μπορεί να είναι κενό.\n';
			cForm.search_author.style.backgroundColor="#ff6347";
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
			<?php echo"<select name='search_author';>
			<option value='adamidis'>ΑΔΑΜΙΔΗΣ ΠΑΝΑΓΙΩΤΗΣ</option>
			<option value='diamantaras'>ΔΙΑΜΑΝΤΑΡΑΣ ΚΩΣΤΑΝΤΙΝΟΣ</option>
			<option value='chatzimisios'>ΧΑΤΖΗΜΙΣΙΟΣ ΠΕΡΙΚΛΗΣ</option>
			<option value='ilioudis'>ΙΛΙΟΥΔΗΣ ΧΡΗΣΤΟΣ</option>
			<option value='salampasis'>ΣΑΛΑΜΠΑΣΗΣ ΜΙΧΑΛΗΣ</option>
			<option value='ougiaroglou'>ΟΥΓΙΑΡΟΓΛΟΥ ΣΤΕΦΑΝΟΣ</option>
			<option value='karamitopoulos'>ΚΑΡΑΜΙΤΟΠΟΥΛΟΣ ΛΕΩΝΙΔΑΣ</option>
			<option value='dervos'>ΔΕΡΒΟΣ ΔΗΜΗΤΡΙΟΣ</option>
			<option value='papanikolaou'>ΠΑΠΑΝΙΚΟΛΑΟΥ ΑΛΕΞΑΝΔΡΟΣ</option>
			<option value='sidiropoulos'>ΣΙΔΗΡΟΠΟΥΛΟΣ ΑΝΤΩΝΗΣ</option>
			<option value='vozalis'>ΒΟΖΑΛΗΣ ΜΑΝΩΛΗΣ</option>
			<option value='goulianas'>ΓΟΥΛΙΑΝΑΣ ΚΩΣΤΑΝΤΙΝΟΣ</option>
			<option value='keramopoulos'>ΚΕΡΑΜΟΠΟΥΛΟΣ ΕΥΚΛΕΙΔΗΣ</option>
			<option></option>
			</select>";?> 
			</td>
			
		</tr>
			<tr>
            <th align="center" colspan='1'>ΤΥΠΟΣ ΔΗΜΟΣΙΕΥΣΗΣ(*):</th>
			<td align='left'>
			<?php echo"<select name='search_type';>
			<option value='Journal%20Articles'>Αρθρα εφημερίδας</option>
			<option value='Conference%20and%20Workshop%20Papers'>Έγγραφα συνεδρίων και εργαστηρίων</option>
			<option value='Informal%20Publications'>Άτυπες Δημοσιεύσεις</option>
			<option value='Editorship'>Σύνταξη</option>
			<option value='Parts%20in%20Books%20or%20Collections'>Μέρη σε βιβλία ή συλλογές</option>
			<option value='Books%20and%20Theses'>Βιβλία και Διατριβές</option>
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
