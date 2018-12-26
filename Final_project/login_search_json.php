<?php 
include ('lock.php');
?>

<!--elexoume an o xristis exei epilejei kapoio chechbox kai emfanizoume katalilo minima-->
<script>
	function checkentryform() {
	var chks = document.getElementsByName('checkbox[]');
    var hasChecked = false;
    for (var i = 0; i < chks.length; i++)
             {
              if (chks[i].checked)
                 {
                  hasChecked = true;
                 break;
                  }
              }
              if (hasChecked == false)
                  {
	               alert("Παρακαλώ επιλέξτε τουλάχιστον μια δημοσίευση.!!");
	              return false;
                   }
return true;
}
</script>



<!---->
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
    <script src="./js_async_calls/counter.js"></script>		
    <script src="./myScript.js"></script>

<style>
  .navbar-custom {
    background-color:#7dc476;}

.navbar-custom2 {
    background-color:#DBEBC7;}
.button2 { position: fixed; bottom: 0px; left: 50px; }
	
  </style>

</head>
<body>
    
    

<button onclick="topFunction()" id="myBtn" title="Go to top" style="border-radius: 4px;padding: 15px;cursor: pointer;color: white;background-color: #96f5f3;outline: none;border: none;display: none;position: fixed;bottom: 20px;right: 30px;z-index: 99;font-size: 18px;">Top</button>

<?php include('nav.php');
 include ('config.php');//ρυθμίσεις βάσης ?>

<div class="container" style="margin-top:70px" >
  <div class="row">
<div align="center" class="col-sm-12">
    
<form name="paper_display" method="post" action="checkbox_value.php" enctype="multipart/form-data">
    <h3><b>Αποτελέσματα Αναζήτησης Συγγραμμάτων</b></h3><br />
     <div class="shadow p-3 mb-5 navbar-custom2 rounded">
<div class="table-responsive">
       <table class="table table-striped table-bordered">
	<thead class=thead-dark>
	            <th width='1%'>Επιλογή</th>
				<th>Τίτλος - Συγγραφείς</th>
				
				<th>Τύπος</th>
				<th>Έτος</th>
				<th>URL</th>
		
			</thead>
			<tbody>

<?php
//sessions//

        
        
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
		$url = "http://dblp.org/search/publ/api?q=$search_author+$search_type+$title_p+$year_start%7C$year_end&h=1000&format=json"; // path to your JSON file
		//echo $url.'<br>';//elegxos url
        $data = file_get_contents($url); // put the contents of the file into a variable 
        $characters = json_decode($data,true); // decode the JSON feed
        $result = array();
       
	    //$array_authors=array();//pinakas poy krata tous authors ana dimosieusi
	    $j=0;//orismos metablitis metrisis ton check boxes
		
		 echo "<b>Οι Δημοσιευσεις του συγγραφέα που εμφανίσατε είναι :</b>". $characters['result']['hits']['@sent'].'<br>';//minima pou emfanizei to sinolo ton dimosieuseon
		
		if(($characters['result']['hits']['@sent']==0))//elegxo tin timi tou value tou json
		{
			echo '<script language="javascript">alert("ΓΙΑ ΤΑ ΚΡΙΤΗΡΙΑ ΠΟΥ ΒΑΛΑΤΕ ΔΕΝ ΥΠΑΡΧΟΥΝ ΑΠΟΤΕΛΕΣΜΑΤΑ!\nΠΡΟΣΠΑΘΗΣΤΕ ΞΑΝΑ!");document.location="index_login.php";</script>'; 
			
				}

		else
		//orismos metabliton
		 $A_apotelesma=array();//pinakas pou bazoume apotelesmata apo query
		 //$s="<td>ΜΗ ΕΠΙΛΕΓΜΕΝΟ</td>";//orizoume arxiki timi stin metabliti an i basi den exei times
		  //$tdstyle='background-color:white;';//αρχικοποιηση μεταβλητης
	//trabame eggrafes apo basi
		$query_check_paper = "SELECT * FROM downloads where user_id='".$_SESSION['user_id']."'";
        $result_id_url=$conn->query($query_check_paper) or die ('Error, query failed check_paper_in_base');
		//$stack=array();
		 foreach ($characters['result']['hits']['hit'] as $theentity) :
		  if (array_key_exists('authors',$theentity['info'])){
			  $s="";  
		 $length_author = count($theentity['info']['authors']['author']);//mikos pinaka author
		     
		}
		else
		 $length_author=0;
		 
		////elegxos iparjis dimosieusis stin basi
		 $url_id_json=$theentity['url'];//anathesi timis se metabliti tou url pou diabazei apo api
		$i=-1;//ΟΡΙΣΜΟΣ ΜΕΤΑΒΛΗΤΗΣ ΜΕΤΡΗΣΗΣ
		//ελεγχος δημοσιευσεων της βασης μας σε σχεση με τα αρχεια που διαβαζει απο json
		if($result_id_url){
	
		while($row = mysqli_fetch_array($result_id_url)){
	    $i++;	
	    $A_apotelesma[$i]['url_id'] = $row['url_id'];
	
                                                         }
	
	   $database_array=array();//dilosi pinaka pou bazoume ta apotelesmata toy erotimatos tis database
	 foreach($A_apotelesma as $in => $value){
		
		array_push($database_array,$value['url_id']);//βαζω τις τιμες του ερωτήματος στον πινακα
	
		if(in_array( $url_id_json,$database_array))//ελέγχω αν υπάρχουν οι τιμες του json στον πίνακα με τιμές βάσης
		 
		 //$tdstyle='background-color:#f2b9c5;';
		  $s="disabled";//απενεργοποιειται το checkbox
		else
		 //$tdstyle='background-color:white;';
	     $s=" ";//ενεργοποιειται το checkbox
	 }
	}
	
	
	
?>

   
			<tr>
			<td align='center'><?php echo "<input type='checkbox'  $s  name='checkbox[]' value='". $j++."'<br/>";?> </td>
		    <td><?php 
		       
		      echo "<input type='hidden'  size='150%'  name='title[]' value='".$theentity['info']['title']."' tabindex='-1' readonly>"; echo "<b>".$theentity['info']['title'] . "</b><br>"; ?>
		      <?php 
			     $syn = "";
			    if($length_author==0){        
                 
                 
                  $syn = "UNAVAILABLE";
                 }   
	          
	          else if ($length_author==1)
	          {  
	           
	              $syn = $theentity['info']['authors']['author'];
	          }
	          
	          else{ 
	             
	          for($i=0;$i<$length_author;$i++){
	         
	           $syn .= $theentity['info']['authors']['author'][$i].',';
			}
		}
	             echo "<i>" . $syn . "</i>";                              
	                               ?>
		 </td>
			<td style="display:none" ><textarea name="authors[]" cols='40%' rows="3" tabindex='-1'  readonly style="display:none">
          <?php 
			    
			    if($length_author==0){        
                 
                 
                 echo "UNAVAILABLE";
                 }   
	          
	          else if ($length_author==1)
	          {  
	           
	              echo $theentity['info']['authors']['author'];
	          }
	          
	          else{ 
	             
	          for($i=0;$i<$length_author;$i++){
	         
	           echo $theentity['info']['authors']['author'][$i].',';
			}
		}
	                                       
	                               ?>
			</textarea></td>
            <td> <?php echo "<input type='hidden' size='15%'name='type[]' value='".$theentity['info']['type']."' tabindex='-1' readonly>"; 
            echo $theentity['info']['type']; ?> </td>
			<td> <?php echo "<input type='hidden' size='5%' name='year[]' value='".$theentity['info']['year']."' tabindex='-1' readonly>"; 
			     echo $theentity['info']['year'];?> </td>
			
		
			 <?php echo "<input type='hidden' size='5%' name='url[]' value='".$theentity['info']['url']."'>";?>
			 <td><?php echo '<a href='.$theentity['info']['url']. ' target=\"_blank\" class="btn btn-primary"><span class="fab fa-telegram-plane"></span></a>';?></td>
			
			
			<?php echo "<input type='hidden' name='url_id[]' value='".$theentity['url']."''>"; ?>
       		 
        </tr>
			<?php echo"<input type='hidden' name='insupd' value='insert'>"; ?> 
		<?php echo"<input type='hidden' value='".$_SESSION['user_id']."' name='user_id' tabindex='-1' readonly >"; ?>
<?php endforeach; ?>

	</tbody>
		
			<td  align='center' colspan='5'><br>
				<button type="submit" class="button2 btn btn-warning" onclick="return checkentryform();"><i class="fas fa-database"aria-hidden="true"></i> <b>ΕΙΣΑΓΩΓΗ ΣΤΗ ΒΑΣΗ</b></button>
			
				
			</td>
		
</table>
</form>
  </div>
 </div>
</div>
</div>
<?php include('footer.php'); ?>
<?php include('modal.php'); ?>
</body>

</html>



