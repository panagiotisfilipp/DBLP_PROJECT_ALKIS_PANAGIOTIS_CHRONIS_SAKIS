<html>
<meta charset="utf-8"/>

<table border='1'>
	<tbody>
	<tr>
			<th colspan="5" align="center">
			<h3>ΔΗΜΟΣΙΕΥΣΕΙΣ-ΑΡΘΡΑ  ΕΡΕΥΝΗΤΗ</h3><br></th>
		</tr>
		<tr>
		    <th>Συγγραφέας</th>
			<th>Τίτλος</th>
			<th>Χρονιά</th>
			<th>Τύπος</th>
			<th>URL</th>
			
			
		</tr>
<?php 
		$search_string=$_POST['search_string'];
		echo $search_string;
		$url = "http://dblp.org/search/publ/api?q=$search_string&format=json"; // path to your JSON file
        $data = file_get_contents($url); // put the contents of the file into a variable

        $characters = json_decode($data,true); // decode the JSON feed
        $result = array();
		if(!empty($result)){
			
		 foreach ($characters['result']['hits']['hit'] as $theentity) :
		 
		 $length_author = count($theentity['info']['authors']['author']);
	    
	
		
       

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
			
		 
        </tr>
<?php endforeach; 
		}
	else
	{echo "the author does not exist";}
?>
	
	</tbody>
</table>
</html>


