<?php
	include('conf.php');
	
/*-------------------------------------*/

$url_id =  "MURL#" . (rand());
//$url_id='MURL#24436';
echo $url_id;

$chk_url_id = "SELECT url_id FROM papers";
$chk_url = mysql_query($chk_url_id,$conn) or die(mysql_error());





while($row = mysql_fetch_array($chk_url)) {
	 
		if($row['url_id']==$url_id){
			echo "New Count id";
			$url_id =  "MURL#" . (rand());
			echo "New ID: " . $url_id;
			$sqlj = "INSERT INTO papers (`url_id`,`authors`,`title`, `year`,`type`, `url`) VALUES ( '$url_id' ,'$_POST[authors]','$_POST[title]','$_POST[year]','$_POST[type]','$_POST[url]')";
            $result_id=@mysql_query($sqlj, $conn) or die ('Error, query failed username' . mysql_error());
			header('location:index.html');
		}else {
			$sqlj = "INSERT INTO papers (`url_id`,`authors`,`title`, `year`,`type`, `url`) VALUES ( '$url_id' ,'$_POST[authors]','$_POST[title]','$_POST[year]','$_POST[type]','$_POST[url]')";
			$result_id=@mysql_query($sqlj, $conn) or die ('Error, query failed 1' . mysql_error());
			header('location:index.html');
		} 
}
   
mysql_close($conn);
?>