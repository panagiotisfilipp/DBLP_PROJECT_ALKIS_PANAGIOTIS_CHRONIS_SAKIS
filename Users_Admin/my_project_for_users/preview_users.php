<!-- Φόρμα διαχείρισης στοιχείων μαθητή -->

<script src="edit_f.js"></script>

<?php
include ('config.php');

$query = "SELECT * FROM users";

$result=$conn->query($query) or die ('Error, query failed check_post');
$i=-1;
// Έλεγχος αν ο πίνακας με τα στοιχεία του μαθητή έχει εγγραφές
if ($result)
{
	while ($row = mysqli_fetch_array($result)) {
		$i++;
		$A_apotelesma[$i]['user_id'] = $row['user_id'];
		$A_apotelesma[$i]['username'] = $row['username'];
		$A_apotelesma[$i]['password'] = $row['password'];
		$A_apotelesma[$i]['email'] = $row['email'];
		
	}
}

echo "<table align='center' border=\"1\"  cellpadding=\"5\"cellspacing=\"1\" style=\"border-collapse: collapse; color:#000000\" bordercolor=\"grey\" width=\"100%\">";

//Εμφάνιση των εγγραφών
if(is_array($A_apotelesma))
  {
	echo "	<tr>
				<td colspan='5' align='center'><strong>Στοιχεία Χρηστών:</strong><br><br></td>
			</tr>
			<tr>
				<th align='left'>Όνομα Χρήστη</th>
                <th align='left'>Κωδικός Χρήστη</th>				
				<th align='left'>Email</th> 
				<th colspan='2'>Επεξεργασία</th>
		    </tr>";
   	foreach($A_apotelesma as $in => $value)
	{
		echo "<tr>
				  <td width='2000px'>".$value['username']."</td>
				   <td width='2000px'>".$value['password']."</td>
				  <td width='2000px'>".$value['email']."</td>
					  
				  <td>
					<img src=\"images/edit.png\" alt=\"Τροποποίηση\" title=\"Τροποποίηση\" style=\"padding:0;margin:0;float:left;\" onclick='users_edit_form(".$value['user_id'].")' onmouseover=\"this.style.cursor='pointer'\" />
				 </td>
				 <td>
					<img src=\"images/delete.png\" alt=\"Διαγραφή\" title=\"Διαγραφή\" style=\"padding:0;margin:0;float:left;\" onclick='users_delete(".$value['user_id'].")' onmouseover=\"this.style.cursor='pointer'\" />
				  </td>
			  </tr>";
	}
  }
 else
	echo "<tr> <th>Δεν βρέθηκαν Στοιχεία.</th></tr>";

echo "</table>";
//echo "<br><input class=\"button\" type='button' value='Εισαγωγή Νέου RSS' onclick='location.href=\"rss_insert_form.php\"'>";

?>

	<br><br><br><br><br><br><br><br><br><br>	 
	 <strong>Τροποποίηση Στοιχείων Χρηστών</strong>
	 <p>Σε αυτή τη φόρμα ο Διαχειριστής έχει τη δυνατότητα να τροποποιήσει τα στοιχεία των Χρηστών.</p>		


