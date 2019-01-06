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
include("config.php");//eisagogi stoixeion basis gia connection

$checked_count = count($_POST['checkbox']);
$user=$_POST['user_id'];
//echo $user;
								
//pinakas pou krataei tin katastasi ton dimosieuseon an iparxoun i den iparxoun idi sti basi	
$query_empty = "SELECT *  FROM papers";
//$result=$conn->query($query_empty) or die('Error_query,failed_count');
if ($result=mysqli_query($conn,$query_empty))
  {
  // Return the number of rows in result set
  $rowcount=mysqli_num_rows($result);
  }
//echo $rowcount;
if($rowcount==0)//keni basi stin arxi
{
	foreach ($_POST['checkbox']  as $j){
	
 
	 
	// escape variables for security
$authors_escape = mysqli_real_escape_string($conn, $_POST['authors'][$j]);
$title_escape = mysqli_real_escape_string($conn, $_POST['title'][$j]);
$year_escape = mysqli_real_escape_string($conn, $_POST['year'][$j]);
$type_escape = mysqli_real_escape_string($conn, $_POST['type'][$j]);
$url_id_escape = mysqli_real_escape_string($conn, $_POST['url_id'][$j]);
$url_escape = mysqli_real_escape_string($conn, $_POST['url'][$j]);

$insert_paper_query_keno="INSERT INTO papers (authors, title, year,type,url_id,url)
VALUES ('$authors_escape', '$title_escape', '$year_escape','$type_escape','$url_id_escape','$url_escape')";														
 

	$insert_paper_keno=$conn->query($insert_paper_query_keno) or die('Error_query,failed_insert_paper_keno');

 $insert_keno = "INSERT INTO downloads (url_id,user_id) values ('$url_id_escape','$user') ";
$insert_download_keno=$conn->query($insert_keno) or die('Error_query,failed_insert_download_keno'); 
	
}
if ($insert_paper_keno && $insert_download_keno)
	{
			echo '<script language="javascript">alert_paper_dblp.on("Η εισαγωγή των δημοσιεύσεων που επιλέξατε, έγινε με επιτυχία!"); </script>';
	}
	 else
	 {
		echo '<script language="javascript">alert_paper_dblp.on("Η εισαγωγή των δημοσιεύσεων που επιλέξατε, δεν ήταν επιτυχής.")</script>';
		//echo '<script language="javascript"> document.location="index_login.php"; </script>';
		exit();
	 }	
}

//an iparxoun idi dimosieuseis	
	
	
	
$query_check_paper = "SELECT url_id  FROM papers";
$result_id_url=$conn->query($query_check_paper) or die ('Error, query failed check_paper_in_base');
//εισαγωγή url_id απο ερώτημα σε πίνακα
$paper_list= array(); //pinakas ton paper
while($row_result=mysqli_fetch_assoc($result_id_url))
{
    $paper_list[]=$row_result['url_id'];
		
}
//echo "times tou pinaka: paper_list".'<br/>';
//print_r($paper_list);
//echo '<br/>';

$check_box=array();//pinakas checkbox
//////////////////////////eisagogi url_id apo checkbox se array
foreach ($_POST['checkbox']  as $j){
$url_id_post= $_POST['url_id'][$j];
array_push($check_box,"$url_id_post");
}

//echo '<br/>'."times tou pinaka: checkbox".'<br/>';
//print_r($check_box);
///////////////////////////ALKIS KODIKAS//////

$stack_in = array(); // pinakas pou gemizei me yparxouses sthn basi (ara grafei sto downloads)
$stack_out = array(); // pinakas pou gemizei me  MH yparxouses sthn basi (ara grafei kai stous dyo)

foreach ($check_box as $val_1) {
   
  foreach ($paper_list as $value_2) {
	  
	 $res = in_array($val_1,$paper_list,false);//ελέγχει την ύπαρξη των ποσταρισμένων τιμών στην βάση-επιστρέφει true or false
  
     if ($res == TRUE){
         array_push($stack_in,$val_1);
		
		 break;
	 }else{
		 array_push($stack_out,$val_1);
		 break; 
	 }	 
 
}
}
//echo "<br /><br />"."Insert to Download_stack_in ";
//print_r($stack_in);

//echo "<br /><br />"."Insert to Both_stack_out ";
//print_r($stack_out);

if($stack_in){
///εισαγωγή τιμών στον πίνακα downloads της βάσης ////////////////
$DataArr_downloads = array();
    foreach($stack_in as $row){
	$url_id_esc = mysqli_real_escape_string($conn, $row);	
        $fieldVal1 = $url_id_esc;
        $fieldVal2 =$user ;
        
 
        $DataArr_downloads[] = "('$fieldVal1', '$fieldVal2')";
    }
 
    $insert_download_1 = "INSERT INTO downloads (url_id,user_id ) values ";
    $insert_download_1 .= implode(',', $DataArr_downloads);
	//echo $insert_download_1;
 
    mysqli_query($conn, $insert_download_1);
	 if($insert_download_1)
	{
		echo'<script language="javascript">alert_paper_dblp.on("Η εισαγωγή των δημοσιεύσεων που επιλέξατε, έγινε με επιτυχία!");</script>';
	}
	 else
	 {
		echo '<script language="javascript">alert_paper_dblp.on("Η εισαγωγή των δημοσιεύσεων που επιλέξατε, δεν ήταν επιτυχής.")</script>';
		//echo '<script language="javascript"> document.location="index_login.php"; </script>';
		exit();
	 }	
}

if($stack_out){
///εισαγωγή τιμών στους πίνακες papers,downloads της βάσης ////////////////
$DataArr_papers_missed = array();
$check=array();//pinakas pou krataei tis times ton checkbox
foreach($_POST['checkbox'] as $pp)
{
	$url_id_escape = mysqli_real_escape_string($conn, $_POST['url_id'][$pp]);
	$bool_1=in_array($url_id_escape,$stack_out,false);
	 if ($bool_1 == TRUE){
	 array_push($check,$pp);}

}

	
	
    foreach($check as $j){
	$authors_escape = mysqli_real_escape_string($conn, $_POST['authors'][$j]);
    $title_escape = mysqli_real_escape_string($conn, $_POST['title'][$j]);
    $year_escape = mysqli_real_escape_string($conn, $_POST['year'][$j]);
    $type_escape = mysqli_real_escape_string($conn, $_POST['type'][$j]);
    $url_id_escape = mysqli_real_escape_string($conn, $_POST['url_id'][$j]);
    $url_escape = mysqli_real_escape_string($conn, $_POST['url'][$j]);
        
 
        $DataArr_papers_missed[] = "('$authors_escape', '$title_escape', '$year_escape','$type_escape','$url_id_escape','$url_escape')";
    }


    $insert_paper = "INSERT INTO papers (authors, title, year,type,url_id,url) values ";
    $insert_paper .= implode(',', $DataArr_papers_missed);
	//echo $insert_paper;
 
    mysqli_query($conn, $insert_paper);


	if($insert_paper)
	{
	///εισαγωγή τιμών στον πίνακα downloads της βάσης ////////////////
    $DataArr_downloads_1 = array();
    foreach($stack_out as $row_1){
	$url_id_esc = mysqli_real_escape_string($conn, $row_1);	
        $fieldVal1 = $url_id_esc;
        $fieldVal2 =$user ;
        
 
        $DataArr_downloads_1[] = "('$fieldVal1', '$fieldVal2')";
    }
 
    $insert_download_2 = "INSERT INTO downloads (url_id,user_id ) values ";
    $insert_download_2 .= implode(',', $DataArr_downloads_1);
	//echo $insert_download_2;
 
    mysqli_query($conn, $insert_download_2);	
}
if ($insert_paper ||$insert_download_2)
	{
			echo '<script language="javascript">alert_paper_dblp.on("Η εισαγωγή των δημοσιεύσεων που επιλέξατε, έγινε με επιτυχία!"); </script>';
	}
	else
	 {
		echo '<script language="javascript">alert_paper_dblp.on("Η εισαγωγή των δημοσιεύσεων που επιλέξατε, δεν ήταν επιτυχής.")</script>';
		//echo '<script language="javascript"> document.location="index_login.php"; </script>';
		exit();
	 }
}

///minimata ejodou

$conn->close();
?>
</div>
</body>
</html>
