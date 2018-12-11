
<html>
<meta charset="utf-8"/>
<head>
    <title>Seach for papers results</title>
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
    <h3><b>Αποτελέσματα Αναζήτησης Συγγραμμάτων</b></h3><br />
<div class="table-responsive">
       <table class="table table-striped table-bordered">
	<thead class=thead-dark>
				<th>Τίτλος - Συγγραφείς</th>
				<th>Τύπος</th>
				<th>Έτος</th>
				<th>URL</th>
		
			</thead>
			<tbody>
<?php

            
     
		$search_author=$_POST['search_author'];//metabliti author apo post
		$search_type=$_POST['search_type'];//metabliti type apo post
		$title=$_POST['title'];//ΛΈΞΗ ΚΛΕΙΔΊ
		$year_start=$_POST['year_start'];//etos apo 
		$year_end=$_POST['year_end'];//etos eos ( %7C)
	    $type_out_ch=array();
		$type_out_ch[0] = urldecode($search_type);//metabliti tipou xoris '%20'
		//echo "metabliti xoris kena:".$type_out_ch[0].'<br>';//elegox metablitis 
		//echo $search_author.'<br>';//elegxos metablitis author
		//echo $search_type.'<br>';//elegxos typou dimosieusis
		//http://localhost/MSC_ERG_1/json_from_url.php&q=adamidis
		$title_p=urlencode($title);
		$url = "http://dblp.org/search/publ/api?q=$search_author+$search_type+$title_p+$year_start%7C$year_end&h=30&format=json"; // path to your JSON file
		//echo $url.'<br>';//elegxos url
        $data = file_get_contents($url); // put the contents of the file into a variable 
        $characters = json_decode($data,true); // decode the JSON feed
        $result = array();
       
	    //$array_authors=array();//pinakas poy krata tous authors ana dimosieusi
	    $j=0;//orismos metablitis metrisis ton check boxes
		
		
		
		if(($characters['result']['hits']['@sent']==0))//elegxo tin timi tou value tou json
		{
			echo '<script language="javascript">alert("ΓΙΑ ΤΑ ΚΡΙΤΗΡΙΑ ΠΟΥ ΒΑΛΑΤΕ ΔΕΝ ΥΠΑΡΧΟΥΝ ΑΠΟΤΕΛΕΣΜΑΤΑ!\nΠΡΟΣΠΑΘΗΣΤΕ ΞΑΝΑ!");document.location="index_guest.php";</script>'; 
			
				}

		else
		
			echo "<b>Αν δεν έχετε δημιουργήσει λογαριασμό στην εφαρμογή, μπορείτε δοκιμαστικά να δεἰτε μέχρι 30 δημοσιεύσεις!!!!</b>";
		    echo "</br><br />";
		//orismos metabliton
		 $A_apotelesma=array();//pinakas pou bazoume apotelesmata apo query
		 //$s="<td>ΜΗ ΕΠΙΛΕΓΜΕΝΟ</td>";//orizoume arxiki timi stin metabliti an i basi den exei times
		  //$tdstyle='background-color:white;';//αρχικοποιηση μεταβλητης
	//trabame eggrafes apo basi
		
        
		//$stack=array();
		 foreach ($characters['result']['hits']['hit'] as $theentity) :
		  if (array_key_exists('authors',$theentity['info'])){
			  $s="";  
		 $length_author = count($theentity['info']['authors']['author']);//mikos pinaka author
		
		}
		else
		 $length_author=0;

?>

<tr>
						<td width="500px"><?php  echo "<strong>" . $theentity['info']['title']	."</strong><br />";
						 if($length_author==0){        
                  echo  "<i> UNAVAILABLE </i>"; 
                 }   
	          
	          else if ($length_author==1)
	          {echo "<i>".$theentity['info']['authors']['author'] . "</i>";}
	          
	          else{ 
	          for($i=0;$i<$length_author;$i++){
	           echo "<i>".$theentity['info']['authors']['author'][$i].','."</i>";
			}
		}  ?></td>
	                    <td><?php echo $theentity['info']['type']; ?></td>
                        <td><?php echo $theentity['info']['year']; ?></td>
                        <td><a href="<?php echo $theentity['info']['url']; ?>" target="_blank" class="btn btn-primary"><span class="fab fa-telegram-plane"></span></a></td>
                       					
					
					</tr>
	<!-- ΕΔΩ --> 
		
<?php endforeach; ?>

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



