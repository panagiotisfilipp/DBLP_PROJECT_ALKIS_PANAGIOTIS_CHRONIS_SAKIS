<html>
<meta charset="utf-8"/>
<head>
<link rel="stylesheet" type="text/css" href="mystyle.css">
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
</head>

<form name="paper_display" action="checkbox_value.php" method="post" enctype="multipart/form-data">
<table border='1' width="auto">
	<tbody>
	<tr>
			<th colspan="6" align="center" >
			<h3>ΔΗΜΟΣΙΕΥΣΕΙΣ-ΑΡΘΡΑ  ΕΡΕΥΝΗΤΗ </h3><br></th>
		</tr>
		<tr>
			
		    <th width="4%">ΕΠΙΛΟΓΗ</th>
		    <th width="32%">ΣΥΓΓΡΑΦΕΑΣ</th>
			<th width="60%">ΤΙΤΛΟΣ</th>
			<th width="5%">ΧΡΟΝΙΑ</th>
			<th width="10%">ΤΥΠΟΣ</th>
			<th width="4%">URL</th>
			
			
		</tr>

<?php

            
       //http://dblp.org/search/publ/api?q=ougiaroglou+Journal+Articles&format=json
        include ('conf.php');//ρυθμίσεις βάσης 
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
			echo '<script language="javascript">alert("ΓΙΑ ΤΑ ΚΡΙΤΗΡΙΑ ΠΟΥ ΒΑΛΑΤΕ ΔΕΝ ΥΠΑΡΧΟΥΝ ΑΠΟΤΕΛΕΣΜΑΤΑ!\nΠΡΟΣΠΑΘΗΣΤΕ ΞΑΝΑ!");document.location="index.php";</script>'; 
			
				}

		else
		//orismos metabliton
		 $A_apotelesma=array();//pinakas pou bazoume apotelesmata apo query
		 //$s="<td>ΜΗ ΕΠΙΛΕΓΜΕΝΟ</td>";//orizoume arxiki timi stin metabliti an i basi den exei times
		  //$tdstyle='background-color:white;';//αρχικοποιηση μεταβλητης
	//trabame eggrafes apo basi
		$query_check_paper = "SELECT * FROM papers";
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
			<td><?php echo "<input type='checkbox'  $s  cols='2%' name='checkbox[]' value='". $j++."'<br/>";?> </td>
		    <td><textarea name="authors[]" cols='40%' rows="3" tabindex='-1' readonly><?php
		  //elegxos an iparxei to pedio author ti tha emfanisi ston pinaka
               if($length_author==0){        
                  echo  "UNAVAILABLE"; 
                 }   
	          
	          else if ($length_author==1)
	          {echo $theentity['info']['authors']['author'];}
	          
	          else{ 
	          for($i=0;$i<$length_author;$i++){
	           echo $theentity['info']['authors']['author'][$i].',';
			}
		}
	                                           
	                                           ?></textarea></td>
            <td><?php  echo "<input type='text'  size='80%'  name='title[]' value='".$theentity['info']['title']."' tabindex='-1' readonly>";?></td>
			<td> <?php echo "<input type='text' size='5%' name='year[]' value='".$theentity['info']['year']."' tabindex='-1' readonly>"; ?> </td>
			<td> <?php echo "<input type='text' size='15%'name='type[]' value='".$theentity['info']['type']."' tabindex='-1' readonly>" ; ?> </td>
		
			 <?php echo "<input type='hidden' size='5%' name='url[]' value='<a href=\"".$theentity['info']['url']."'>";?>
			<td><?php echo '<a href='.$theentity['info']['url']. ' target=\"_blank\"><img src=./images/view.png /></a>';?></td>
			
			<td><?php echo "<input type='hidden' name='url_id[]' value='".$theentity['url']."''>"; ?></td>
       		 
        </tr>
			<?php echo"<input type='hidden' name='insupd' value='insert'>"; ?> 
		
<?php endforeach; ?>

	</tbody>
		<tr>
			<td  align='center' colspan='6'><br>
				<input style="color:red" type='submit' value='ΕΙΣΑΓΩΓΗ ΣΤΗ ΒΑΣΗ' name='submit' onclick="return checkentryform();" ></td>
		</tr>
</table>
</form>
</html>



