<html>
<meta charset="utf-8"/>

<form action="checkbox_value.php" method="post">
<table border='1' width="120%">
	<tbody>
	<tr>
			<th colspan="6" align="center" >
			<h3>ΔΗΜΟΣΙΕΥΣΕΙΣ-ΑΡΘΡΑ  ΕΡΕΥΝΗΤΗ </h3><br></th>
		</tr>
		<tr>
		    <th>Συγγραφέας</th>
			<th>Τίτλος</th>
			<th>Χρονιά</th>
			<th>Τύπος</th>
			<th>URL</th>
			<th>ΕΠΙΛΟΓΗ</th>
			
			
		</tr>
<?php
       //http://dblp.org/search/publ/api?q=ougiaroglou+Journal+Articles&format=json
        include ('conf.php');//ρυθμίσεις βάσης 
		$search_author=$_POST['search_author'];//metabliti author apo post
		$search_type=$_POST['search_type'];//metabliti type apo post
	    $type_out_ch=array();
		$type_out_ch[0] = urldecode($search_type);//metabliti tipou xoris '%20'
		//echo "metabliti xoris kena:".$type_out_ch[0].'<br>';//elegox metablitis 
		//echo $search_author.'<br>';//elegxos metablitis author
		//echo $search_type.'<br>';//elegxos typou dimosieusis
		
		$url = "http://dblp.org/search/publ/api?q=$search_author+$search_type&format=json"; // path to your JSON file
		//echo $url.'<br>';//elegxos url
        $data = file_get_contents($url); // put the contents of the file into a variable
        $characters = json_decode($data,true); // decode the JSON feed
        $result = array();
	    
		//elegxos iparjis tetoiou typou dimosieusi me basi ta arxeia pou vrethikan
		 echo "<b>Οι Δημοσιευσεις του συγγραφέα που επιλέξατε είναι :</b>". $characters['result']['hits']['@sent'];//minima pou emfanizei to sinolo ton dimosieuseon
		if(($characters['result']['hits']['@sent']==0))//elegxo tin timi tou value tou json
		{
			echo '<script language="javascript">alert("Ο συγκεκριμένος συγγραφέας δεν έχει δημοσιεύσει κείμενο με αυτόν τον τύπο !\nΠροσπαθήστε ξανά!");document.location="index_st.php";</script>'; 
			break;
		}
	
		else
		 foreach ($characters['result']['hits']['hit'] as $theentity) :
		 
		 $length_author = count($theentity['info']['authors']['author']);//mikos pinaka author
?>
        
        <tr>
			
		    <td> <?php 
	          for($i=0;$i<$length_author;$i++){
	           echo $theentity['info']['authors']['author'][$i].',';
	                                           } ?> </td>
            <td> <?php  echo $theentity['info']['title'];?> </td>
			<td> <?php echo $theentity['info']['year']; ?> </td>
			<td> <?php echo $theentity['info']['type']; ?> </td>
		
			<td><a href="<?php echo  $theentity['info']['url']; ?>"><img src="/images/view.png"></a> </td>
			<td> <?php echo "<input type='checkbox' name='check_list[]' value='".$theentity['url']."'<br/>";?> </td>
			
           		 
        </tr>
		
			
			<?php echo"<input type='hidden' name='insupd' value='insert'>"; ?>  
<?php endforeach; ?>

	</tbody>
		<tr>
			<td  align='center' colspan='6'><br>
				<input style="color:red" type='submit' value='ΕΙΣΑΓΩΓΗ ΣΤΗ ΒΑΣΗ' name='submit'/></td>
		</tr>
</table>
</form>
</html>


