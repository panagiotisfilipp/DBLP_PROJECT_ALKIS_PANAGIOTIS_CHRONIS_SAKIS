<?php
	include('conf.php');
	
/*-------------------------------------*/

$url_id =  "MURL#" . (rand());
//$url_id='MURL#24436';
echo $url_id;

$chk_url_id = "SELECT url_id FROM papers";
$chk_url = $conn->query($chk_url_id);

if ($chk_url->num_rows > 0) {

   while($row = $chk_url->fetch_assoc()) {
	  
	if($row["url_id"]==$url_id){
			
			echo "New Count id";
			$url_id =  "MURL#" . (rand());
			echo "New ID: " . $url_id;
			$sqlj = "INSERT INTO papers (`url_id`,`authors`,`title`, `year`,`type`, `url`) VALUES ( '$url_id' ,'$_POST[authors]','$_POST[title]','$_POST[year]','$_POST[type]','$_POST[url]')";
            $result_id=$conn->query($sqlj) or die("Connection failed: " . $conn->connect_error);
			echo "<div class=\"alert alert-success\">
    <strong>Success!</strong> This alert box could indicate a successful or positive action.
  </div>";
			header('location:index.html');
			
	}else{
			$sqlj = "INSERT INTO papers (`url_id`,`authors`,`title`, `year`,`type`, `url`) VALUES ( '$url_id' ,'$_POST[authors]','$_POST[title]','$_POST[year]','$_POST[type]','$_POST[url]')";
			$result_id=$conn->query($sqlj) or die("Connection failed: " . $conn->connect_error);
			echo "<div class=\"alert alert-success\">
    <strong>Success!</strong> This alert box could indicate a successful or positive action.
  </div>";
			header('location:index.html');
		} 	
}		
}else{
			$sqlj = "INSERT INTO papers (`url_id`,`authors`,`title`, `year`,`type`, `url`) VALUES ( '$url_id' ,'$_POST[authors]','$_POST[title]','$_POST[year]','$_POST[type]','$_POST[url]')";
			$result_id=$conn->query($sqlj) or die("Connection failed: " . $conn->connect_error);
			echo "<div class=\"alert alert-success\">
    <strong>Success!</strong> This alert box could indicate a successful or positive action.
  </div>";
			header('location:index.html');
		} 
   
$conn->close();
?>