<!-- Φόρμα διαχείρισης στοιχείων μαθητή -->

<script src="edit_f.js"></script>

<?php
include ('config.php');

$query = "SELECT * FROM posts";

$result=$conn->query($query) or die ('Error, query failed check_post');
$i=-1;
// Έλεγχος αν ο πίνακας με τα στοιχεία του μαθητή έχει εγγραφές
if ($result)
{
	while ($row = mysqli_fetch_array($result)) {
		$i++;
		$A_apotelesma[$i]['id'] = $row['id'];
		$A_apotelesma[$i]['title'] = $row['title'];
		$A_apotelesma[$i]['description'] = $row['description'];
		$A_apotelesma[$i]['link'] = $row['link'];
		
	}
}

echo "<table align='center' border=\"1\"  cellpadding=\"5\"cellspacing=\"1\" style=\"border-collapse: collapse; color:#000000\" bordercolor=\"grey\" width=\"100%\">";

//Εμφάνιση των εγγραφών
if(is_array($A_apotelesma))
  {
	echo "	<tr>
				<td colspan='5' align='center'><strong>Στοιχεία RSS:</strong><br><br></td>
			</tr>
			<tr>
				<th align='left'>Τίτλος</th>
                <th align='left'>Περιγραφή</th>				
				<th align='left'>Link</th> 
				<th colspan='2'>Επεξεργασία</th>
		    </tr>";
   	foreach($A_apotelesma as $in => $value)
	{
		echo "<tr>
				  <td width='2000px'>".$value['title']."</td>
				   <td width='2000px'>".$value['description']."</td>
				  <td width='2000px'>".$value['link']."</td>
					  
				  <td>
					<img src=\"images/edit.png\" alt=\"Τροποποίηση\" title=\"Τροποποίηση\" style=\"padding:0;margin:0;float:left;\" onclick='rss_edit_form(".$value['id'].")' onmouseover=\"this.style.cursor='pointer'\" />
				 </td>
				 <td>
					<img src=\"images/delete.png\" alt=\"Διαγραφή\" title=\"Διαγραφή\" style=\"padding:0;margin:0;float:left;\" onclick='rss_delete(".$value['id'].")' onmouseover=\"this.style.cursor='pointer'\" />
				  </td>
			  </tr>";
	}
  }
 else
	echo "<tr> <th>Δεν βρέθηκαν Στοιχεία.</th></tr>";

echo "</table>";
echo "<br><input class=\"button\" type='button' value='Εισαγωγή Νέου RSS' onclick='location.href=\"rss_insert_form.php\"'>";

?>

	<br><br><br><br><br><br><br><br><br><br>	 
	 <strong>Τροποποίηση Στοιχείων RSS</strong>
	 <p>Σε αυτή τη φόρμα ο Διαχειριστής έχει τη δυνατότητα να τροποποιήσει τα στοιχεία του RSS.</p>		


