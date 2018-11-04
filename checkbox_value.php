<?php
include("conf.php");//eisagogi stoixeion basis gia connection

$checked_count = count($_POST['checkbox']);

	
							
							
//pinakas pou krataei tin katastasi ton dimosieuseon an iparxoun i den iparxoun idi sti basi	
$query_check_paper = "SELECT url_id  FROM papers";
$result_id_url=$conn->query($query_check_paper, $conn) or die ('Error, query failed check_paper_in_base');
foreach ($_POST['checkbox']  as $j){
	$url_id_post= $_POST['url_id'][$j];
 //elegxos idion dimosieuseon an iparxei esto kai mia stamata opoiadipote eisagogi stin basi
while($row = mysqli_fetch_array($result_id_url)) {
	     $url_id_db=$row["url_id"];
	 
		if($url_id_db==$url_id_post){
			
		echo '<script language="javascript">
		
		alert("Υπάρχουν ήδη ίδιες(α) δημοσίευσεις (η)  στην βάση σας,δεν μπορείτε να προχωρήσετε.Επιλέξτε ξανά!!")</script>';		
		echo '<script language="javascript"> document.location="index.php";</script>';
	    exit();
	
	   
														}
		
		
	}
	 
	$insert_paper_query= " INSERT INTO papers
					           SET 
							authors='".$_POST['authors'][$j]."',
							title='".$_POST['title'][$j]."',
							year='".$_POST['year'][$j]."',
							type='".$_POST['type'][$j]."',
							url_id= '".$_POST['url_id'][$j]."',
							url='".$_POST['url'][$j]."'";														
 

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
mysql_close($conn);
?>
