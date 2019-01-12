<?php 
include('lock.php');
?>
<script src="edit_f.js"></script>

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

<div class="container" style="margin-top:70px" >
  <div class="row">
<div align="center" class="col-sm-12">
    <h3><b>Διαχείριση Χρηστών</b></h3><br />
<div class="table-responsive">
       <table class="table table-striped table-bordered">
	<thead class=thead-dark>
	             <th>Όνομα</th>
				 <th>Επώνυμο</th>
				<th>Όνομα Χρήστη</th>
				<th>Email</th>
				<th>Ημερ/νια Εγγραφής</th>
				<th colspan="2">Ενέργειες</th>
		
			</thead>
			<tbody>
<?php
include ('config.php');

$query = "SELECT * FROM users";

$result=$conn->query($query) or die ('Error, query failed check_post');
$i=-1;
// Έλεγχος αν ο πίνακας με τα στοιχεία του χρήστη έχει εγγραφές
if ($result)
{
	while ($row = mysqli_fetch_array($result)) {
		$i++;
		$A_apotelesma[$i]['user_id'] = $row['user_id'];
		$A_apotelesma[$i]['username'] = $row['username'];
		$A_apotelesma[$i]['name'] = $row['name'];
		$A_apotelesma[$i]['surname'] = $row['surname'];
		$A_apotelesma[$i]['email'] = $row['email'];
		$A_apotelesma[$i]['register_time'] = $row['register_time'];
	}
}



//Εμφάνιση των εγγραφών
if(is_array($A_apotelesma))
  {

   	foreach($A_apotelesma as $in => $value)
	{
		echo "<tr class='info'>
		          <td>".$value['name']."</td>
				   <td>".$value['surname']."</td>
				  <td>".$value['username']."</td>
				  <td>".$value['email']."</td>
					<td>".$value['register_time']."</td>  
				  <td>
				  <button type=submit class=btn btn-warning \" onclick='users_edit_form(".$value['user_id'].")' onmouseover=\"this.style.cursor='pointer'\"><i class=\"fas fa-edit\" aria-hidden=true></i></button>
				  
				
				 </td>
				 <td>
				    <button type=submit class=\"btn btn-danger\" \" onclick='users_delete(".$value['user_id'].")' onmouseover=\"this.style.cursor='pointer'\"><i class=\"far fa-trash-alt\" aria-hidden=true></i></button>
				 
					
				  </td>
			  </tr>";
	}
  }
 else
	echo "<tr> <th>Δεν βρέθηκαν Στοιχεία για χρήστες.</th></tr>";

echo "</table>";
//echo "<br><input class=\"button\" type='button' value='Εισαγωγή Νέου RSS' onclick='location.href=\"rss_insert_form.php\"'>";

?>

	<br><br>	 
	 <strong>Τροποποίηση Στοιχείων Χρηστών</strong>
	 <p>Σε αυτή τη φόρμα ο Διαχειριστής έχει τη δυνατότητα να τροποποιήσει τα στοιχεία των Χρηστών.</p>		

</tbody>
		
</table>
  </div>
 </div>
</div>
</div>
<?php include('footer.php'); ?>
<?php include('modal.php'); ?>
</body>
</html>
