<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="alert.css">
<script src="alert.js"></script>
</head>
<body>
<div id="dialogoverlay"></div>
<div id="dialogbox">
  <div>
    <div id="dialogboxhead"></div>
    <div id="dialogboxbody"></div>
    <div id="dialogboxfoot"></div>
  </div>
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
				 echo "<script type='text/javascript'>alert_paper.on('$message');</script>";
		         
		         exit();
	 }else{
		 $message = "Η διαγραφή της δημοσίευσης δεν ήταν επιτυχής" . $conn->error;
         echo "<script type='text/javascript'>alert_paper.on('$message');</script>";
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
				 echo "<script type='text/javascript'>alert_paper.on('$message');</script>";
		         
		         exit();
	 }else{
		 $message = "Η διαγραφή της δημοσίευσης δεν ήταν επιτυχής" . $conn->error;
         echo "<script type='text/javascript'>alert_paper.on('$message');</script>";
		 }
		}
	
		
		if($rowt == 1){
	     $del_paper2="delete from papers where url_id='$b'";
		 echo $del_paper2;
		
	    if ($conn->query($del_paper2) === TRUE){
			$message = "Η διαγραφή της δημοσίευσης ήταν επιτυχής!";
				 echo "<script type='text/javascript'>alert_paper.on('$message');</script>";
		        
		         exit();
	 }else{
		 $message = "Η διαγραφή της δημοσίευσης δεν ήταν επιτυχής " . $conn->error;
         echo "<script type='text/javascript'>alert_paper.on('$message');</script>";
		 }
		}
	}
 

$conn->close();
?>
</div>
</body>
</html>