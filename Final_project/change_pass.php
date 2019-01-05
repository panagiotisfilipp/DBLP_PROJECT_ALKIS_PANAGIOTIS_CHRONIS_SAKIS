<?php

//Κώδικας αλλαγής συνθηματικού από χρήστη
include ('config.php');
include ('lock.php');

$uri = $_POST["uri"];
$curDate = date('Y-m-d');//trexon imerominia

if (count($_POST) > 0) {
    $result = mysqli_query($conn, "SELECT *from users WHERE user_id='" . $_SESSION["user_id"] . "'");
    $row = mysqli_fetch_array($result);
	
	if (password_verify($_POST["currentPassword"] , $row["password"])){//ελεγχος αν κωδικος ειναι ίδιος με βάση
      $new_password = password_hash($_POST["newPassword"],PASSWORD_DEFAULT);// κωδικοποιηση νέου κωδικού
        mysqli_query($conn, "UPDATE users set password='" . $new_password . "',register_time='".$curDate."' WHERE user_id='" . $_SESSION["user_id"] . "'");
        
        echo "<script>
	var request_uri = '<?php echo $uri;?>';
	alert('Ο κωδικός άλλαξε με επιτυχία')</script>"; 
	echo "<script>window.location='".$uri."'
	</script>";
        
    } else
        echo '<script language="javascript">alert("Ο Τρέχων κωδικός είναι λάθος! Προσπαθήστε ξανά."); history.go(-1);</script>';
}
?> 