<!-- Φόρμα τροποποίησης στοιχείων χρήστη -->

<script>
	function checkentryform() {
		var cForm   = document.forms.edit_user;
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
		
				
			document.forms.edit_user.submit();
	}
</script>


<?php
include ('config.php');


$query_select = "SELECT * FROM posts WHERE id ='".$_GET['p1']."' ";
$result=$conn->query($query_select) or die ('Error, query failed check_post');

if ($result)
{
	//$num_result=mysqli_num_rows($result);
	$rows=[];
	
	while($row = mysqli_fetch_array($result)){
	$rows[]=$row;
	
	$id=$rows[0]['id'];
	$title=$rows[0]['title'];
	$description=$rows[0]['description'];
	$link=$rows[0]['link'];
	
}
}

?>

<form name="edit_user" method="post" action="rss_update.php" enctype="multipart/form-data">
	<table align= 'center'border="0" cellspacing="1" style="border-collapse: collapse; color:#000000" bordercolor="#111111" width="60%">
		<tr>
			<th colspan="3" align="center">
			<h3>ΕΠΕΞΕΡΓΑΣΙΑ ΣΤΟΙΧΕΙΩΝ RSS</h3><br></th>
		</tr>
		<tr>
			<th align="right">Τἰτλος:</th>
			<td align='left'>
			<?php echo"<input type='text' value='".$title."' name='title' >"; ?> 
			</td>
		</tr>
		<tr>
			<th align="right">Περιγραφή:</th>
			<td align='left' colspan="2">
				<?php echo"<input type='text' value='".$description."' name='description' >"; ?> 
			</td>
		</tr>
		
		<tr>
			<th align="right">Link:</th>
			<td align='left' colspan="2">
			<?php echo"<input type='text' value='".$link."' name='link' >"; ?> 
			</td>
		</tr>
		
		
	    
		<tr>
			<td><?php echo"<input type='hidden' value='".$id."' name='id'>"; ?></td>
			<td><input type='hidden' name='insupd' value='update'></td>
		</tr>
		<tr>
			<td colspan='3' align='center'><br>
				<input class="button" type='button' value='ΑΛΛΑΓΗ' name='submit_button' onclick="checkentryform();" ></td></tr>
	</table>
	<br><br><br><br><br>	
	<strong>Τροποποίηση RSS</strong>
	<p>Σ' αυτή τη φόρμα ο Διαχειριστής μπορεί να τροποποιήσει τα στοιχεία του RSS.</p>

</form>