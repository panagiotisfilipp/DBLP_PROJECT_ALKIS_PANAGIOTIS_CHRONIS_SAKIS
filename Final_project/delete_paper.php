<?php
    include('config.php');
	

	$user_id=$_GET['p2'];
	$url_id=$_GET['p1'];
	
	
    $b = str_replace("-","#",$url_id);
	 
	
	//Elegxos dika tou paper
    if (strpos($b, 'MURL#') !== false){
     
	 $del_paper="delete from papers where url_id='".$b."'";
	
	 if ($conn->query($del_paper) === TRUE){
	  $message = "Η διαγραφή της δημοσίευσης ήταν επιτυχής!";
				 echo "<script type='text/javascript'>alert('$message');</script>";
		         echo '<script language="javascript"> document.location="diax_login.php"; </script>';
		         exit();
	 }else{
		 $message = "Error: (2B) <br>" . $conn->error;
         echo "<script type='text/javascript'>alert('$message');</script>";
		  }
	 
		}
		
	else{// Elegxos dblp paper gia pollous
   
         $chk_paper ="Select COUNT(*) from downloads where url_id like \"$b\" GROUP BY user_id";
		 
		 echo $chk_paper;
		 
		 
		 
		 if($result_page=mysqli_query($conn,$chk_paper)){
		 $rowt=mysqli_num_rows($result_page);}
		   mysqli_free_result($result_page);
	      echo "<br>".$rowt;
		  
       if($rowt >1){
		  
	     $del_downl="delete from downloads where url_id='$b' and user_id='$user_id'";
		  echo "<br>".$del_downl;
	    if ($conn->query($del_downl) === TRUE){
			$message = "Η διαγραφή της δημοσίευσης ήταν επιτυχής!";
				 echo "<script type='text/javascript'>alert('$message');</script>";
		         echo '<script language="javascript"> document.location="diax_login.php"; </script>';
		         exit();
	 }else{
		 $message = "Error: (2B) <br>" . $conn->error;
         echo "<script type='text/javascript'>alert('$message');</script>";
		 }
		}
	
		
		if($rowt == 1){
	     $del_paper2="delete from papers where url_id='$b'";
		 echo $del_paper2;
		
	    if ($conn->query($del_paper2) === TRUE){
			$message = "Η διαγραφή της δημοσίευσης ήταν επιτυχής!";
				 echo "<script type='text/javascript'>alert('$message');</script>";
		         echo '<script language="javascript"> document.location="diax_login.php"; </script>';
		         exit();
	 }else{
		 $message = "Error: (2B) <br>" . $conn->error;
         echo "<script type='text/javascript'>alert('$message');</script>";
		 }
		}
	}
 

$conn->close();
?>