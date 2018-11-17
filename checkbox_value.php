<?php
include("conf.php");//eisagogi stoixeion basis gia connection

$checked_count = count($_POST['checkbox']);

	
							
							
//pinakas pou krataei tin katastasi ton dimosieuseon an iparxoun i den iparxoun idi sti basi	
$query_check_paper = "SELECT url_id  FROM papers";
$result_id_url=$conn->query($query_check_paper) or die ('Error, query failed check_paper_in_base');
foreach ($_POST['checkbox']  as $j){
	$url_id_post= $_POST['url_id'][$j];
 //elegxos idion dimosieuseon an iparxei esto kai mia stamata opoiadipote eisagogi stin basi
while($row = mysqli_fetch_array($result_id_url)) {
	     $url_id_db=$row["url_id"];
	 
		if($url_id_db==$url_id_post){
			
		echo '<script language="javascript">
		
		alert("Υπάρχουν ήδη ίδιες(α) δημοσίευσεις (η)  στην βάση σας,δεν μπορείτε να προχωρήσετε.Επιλέξτε ξανά!!");history.go(-1);</script>';		
		
	    exit();
	
	   
														}
		
		
	}
	 
	// escape variables for security
$authors_escape = mysqli_real_escape_string($conn, $_POST['authors'][$j]);
$title_escape = mysqli_real_escape_string($conn, $_POST['title'][$j]);
$year_escape = mysqli_real_escape_string($conn, $_POST['year'][$j]);
$type_escape = mysqli_real_escape_string($conn, $_POST['type'][$j]);
$url_id_escape = mysqli_real_escape_string($conn, $_POST['url_id'][$j]);
$url_escape = mysqli_real_escape_string($conn, $_POST['url'][$j]);

$insert_paper_query="INSERT INTO papers (authors, title, year,type,url_id,url)
VALUES ('$authors_escape', '$title_escape', '$year_escape','$type_escape','$url_id_escape','$url_escape')";														
 

	$insert_paper=$conn->query($insert_paper_query) or die('Error_query,failed_insert_paper'); 
	
	

	
	if ($insert_paper)
	{
			echo '<script language="javascript">alert("Η εισαγωγή των δημοσιεύσεων που επιλέξατε, έγινε με επιτυχία!"); document.location="index.php";</script>';
	}
	 else
	 {
		echo '<script language="javascript">alert("Η εισαγωγή των δημοσιεύσεων που επιλέξατε, δεν ήταν επιτυχής.")</script>';
		echo '<script language="javascript"> document.location="index.php"; </script>';
		exit();
	 }

}
$conn->close();
?>
