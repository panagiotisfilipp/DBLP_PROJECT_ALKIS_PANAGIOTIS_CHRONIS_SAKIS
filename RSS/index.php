	
			<?php 
			include ('config.php');
			?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>ΕΦΑΡΜΟΓΗ RSS</title>
		<meta name="keywords" content="" />
		<meta name="description" content="" />
		
		<link href="default.css" rel="stylesheet" type="text/css" media="all" />
	</head>
	<body>
	
		<div id="wrapper">
			<div id="header">
				<div id="logo">
					<h1><font color="#3399CC">Σύστημα</font><font color="#9EC630"> Διαχείρισης</font>
					<font color="#BFBFBF">RSS</font> 		
 					
				</div>				
					<div id="menu">
						<ul>
							
							<?php			
												
							echo "<li><a href=\"index.php\"><span>Αρχική</span></a></li>";
							echo "<li><a href=\"preview_rss.php\"><span>Διαχείριση RSS</span></a></li>";
							echo "<li><a href=\"rss show.php\"><span>Προβολή RSS</span></a></li>";
							
						
					?>	  		
						</ul>
					</div>
			</div>
			<div id="page" align="jystify">
				<div id="content" align="jystify">
				<br>						
					<h2 align="center">Σύστημα Διαχείρισης (RSS)</h2>
					<p><img src="images/pa2.jpg" width="700" height="350" alt=""/></p>
					<p>Η εφαρμογή υποστηρίζει ένα <strong>διαδραστικό σύστημα διαχείρισης RSS</strong>					
					που επιτρέπει στους χρήστες να παρακολουθούν τα rss.Επίσης 
					 δίνει την δυνατότητα στους Διαχειριστές να διαχειρίζονται τα RSS.
					</p>
						
					
					
				</div>
									
							
							
					</div>
				</div>
			</div>
			
		</div>
	</body>
</html>
