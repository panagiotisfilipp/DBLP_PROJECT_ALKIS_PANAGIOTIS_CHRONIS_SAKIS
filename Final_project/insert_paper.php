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
include('lock.php');
/*-------------------------------------*/


$url_id = "MURL#" . (rand());
	

//DB SQL
$chk_url_id = "SELECT url_id FROM papers WHERE url_id like'" . $url_id . "'";
$getuserid = "SELECT user_id from users where username like '" . $_SESSION['username'] . "'";

$sql_pape = "INSERT INTO papers (`url_id`,`authors`,`title`, `year`,`type`, `url`) VALUES ( '$url_id' ,'$_POST[authors]','$_POST[title]','$_POST[year]','$_POST[type]','$_POST[url]')";

//---------------------



//Find user id
    $resultuid = $conn->query($getuserid);
	if ($resultuid->num_rows > 0) {
       while($row = $resultuid->fetch_assoc()) {
         $user_id = $row["user_id"];	
         }
    } else {
        echo "No such user id";
	  //  exit;
	}
	
	$temp = $_POST['notes'];
	$notes = htmlspecialchars($temp, ENT_QUOTES);
	
    $result = $conn->query($chk_url_id);

	
	
        if($result->num_rows > 0) {
             			
              
			   $url_id = "MURL#" . (rand());
			  
			   $sql_pape = "INSERT INTO papers (`url_id`,`authors`,`title`, `year`,`type`, `url`) VALUES ( '$url_id' ,'$_POST[authors]','$_POST[title]','$_POST[year]','$_POST[type]','$_POST[url]')";
			   $sql_down = "INSERT INTO downloads (`url_id`,`user_id`,`notes`) VALUES ( '$url_id' ,'$user_id','$notes')";
			   if (($conn->query($sql_pape) === TRUE) && ($conn->query($sql_down) === TRUE)){
			    			                   
			     $message = "Η εισαγωγή νέας δημοσίευσης ήταν επιτυχής!";
				 echo "<script type='text/javascript'>alert_paper.on('$message');</script>";
		       
		         exit();
               } else {
				 $message = "Error: (2B)" . $sql_down . "<br>" . $conn->error;
                 echo "<script type='text/javascript'>alert_paper.on('$message');</script>";}
			   
        }else{
			
		
		    $sql_pape = "INSERT INTO papers (`url_id`,`authors`,`title`, `year`,`type`, `url`) VALUES ( '$url_id' ,'$_POST[authors]','$_POST[title]','$_POST[year]','$_POST[type]','$_POST[url]')";
			$sql_down = "INSERT INTO downloads (`url_id`,`user_id`,`notes`) VALUES ( '$url_id' ,'$user_id','$notes')";
			if (($conn->query($sql_pape) === TRUE) && ($conn->query($sql_down) === TRUE)){
			    			                   
			     $message = "Η εισαγωγή νέας δημοσίευσης ήταν επιτυχής!";
				 echo "<script type='text/javascript'>alert_paper.on('$message');</script>";
		        
		         exit();
               } else {
				 $message = "Error: (2B)" . $sql_down . "<br>" . $conn->error;
                 echo "<script type='text/javascript'>alert_paper.on('$message');</script>";}
		}	
		
$conn->close();
?>
</div>
</body>
</html>