<?xml version="1.0" encoding="utf-8" ?>
<rss version="2.0">
<meta charset="utf-8"/>
<?php
include("config.php");
echo '<title>MY RSS</title>';
//RETRIVE DETAILS OF RSS
$query = "SELECT title, link, description FROM posts";
$result=$conn->query($query) or die ('Error, query failed check_paper_in_base');
$i=0;
while($row = mysqli_fetch_array($result)){
//$link=$row['link'];
       $i++;	
	    $A_apotelesma[$i]['link'] = $row['link'];
	    $A_apotelesma[$i]['description'] = $row['description'];
}

 foreach($A_apotelesma as $in => $value){
	 $link=$value['link'];
	 $description=$value['description'];
	$rss = new DOMDocument();
	$rss->load($link);
	$feed = array();
	foreach ($rss->getElementsByTagName('item') as $node) {
		$item = array ( 
			'title' => $node->getElementsByTagName('title')->item(0)->nodeValue,
			'desc' => $node->getElementsByTagName('description')->item(0)->nodeValue,
			'link' => $node->getElementsByTagName('link')->item(0)->nodeValue,
			'date' => $node->getElementsByTagName('pubDate')->item(0)->nodeValue,
			);
		array_push($feed, $item);
	}
	echo '<p>'.'<u>'.'<strong>'.$description.'</strong>'.'</u>'.'</p>';
	$limit = 5;
	for($x=0;$x<$limit;$x++) {
		$title = str_replace(' & ', ' &amp; ', $feed[$x]['title']);
		$link = $feed[$x]['link'];
		$description = $feed[$x]['desc'];
		$date = date('l F d, Y', strtotime($feed[$x]['date']));
		echo '<p><strong><a href="'.$link.'" title="'.$title.'">'.$title.'</a></strong><br />';
		echo '<small><em>Posted on '.$date.'</em></small></p>';
		echo '<p>'.$description.'</p>';
	}
}
?>
