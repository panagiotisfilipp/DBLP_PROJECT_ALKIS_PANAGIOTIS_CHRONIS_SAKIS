<?php include('lock.php'); ?>
<!-- Φόρμα τροποποίησης στοιχείων χρήστη -->

<script>
	function checkentryform() {
		var cForm   = document.forms.edit_paper;
		var errstr  = '';  
		
		<!-- title: Ελέγχει αν το πεδίο είναι null  -->
		if ( cForm.title.value==''){
			errstr = errstr+'Το πεδίο τίτλος δεν μπορεί να είναι κενό.\n';
			cForm.title.style.backgroundColor="#ff6347";
		}
		
		<!-- authors: Ελέγχει αν το πεδίο είναι null  -->
		if ( cForm.authors.value==''){
			errstr = errstr+'Το πεδίο Συγγραφείς δεν μπορεί να είναι κενό.\n';
			cForm.authors.style.backgroundColor="#ff6347";
		}
		<!-- year: Ελέγχει αν το πεδίο είναι null  -->
		if ( cForm.year.value==''){
			errstr = errstr+'Το πεδίο year δεν μπορεί να είναι κενό.\n';
			cForm.year.style.backgroundColor="#ff6347";
		}
			<!-- type: Ελέγχει αν το πεδίο είναι null  -->
		if ( cForm.type.value==''){
			errstr = errstr+'Το πεδίο type δεν μπορεί να είναι κενό.\n';
			cForm.type.style.backgroundColor="#ff6347";
		}
		<!-- url: Ελέγχει αν το πεδίο είναι null  -->
		if ( cForm.url.value==''){
			errstr = errstr+'Το πεδίο url δεν μπορεί να είναι κενό.\n';
			cForm.url.style.backgroundColor="#ff6347";
		}
		
		
		
		if (errstr.length>0)
			alert(errstr);
		else
		
				
			document.forms.edit_paper.submit();
	}
</script>


<?php
include ('config.php');

$b = str_replace("-","#",$_GET['p1']);

$q1 = "SELECT * 
FROM papers
WHERE papers.url_id = \"$b\"";



//$query_select = "SELECT  papers.*, downloads.notes from papers , downloads  where  papers.url_id = \"$b\" and downloads.user_id=".$_GET['p2']." ";

$result=$conn->query($q1) or die ("Error description: " . mysqli_error($conn));

if ($result)
{
	//$num_result=mysqli_num_rows($result);
	$rows=[];
	
	while($row = mysqli_fetch_array($result)){
	$rows[]=$row;
	
	//$user_id=$rows[0]['user_id'];
	$url_id=$rows[0]['url_id'];
	$title=$rows[0]['title'];
	$authors=$rows[0]['authors'];
	$year=$rows[0]['year'];
	$type=$rows[0]['type'];
	$url=$rows[0]['url'];
	//$notes=$rows[0]['notes'];
	
}
}

$q2 = "SELECT notes 
FROM downloads
WHERE user_id =". $_GET['p2']."
AND url_id=\"$b\"";



//$query_select = "SELECT  papers.*, downloads.notes from papers , downloads  where  papers.url_id = \"$b\" and downloads.user_id=".$_GET['p2']." ";

$result2=$conn->query($q2) or die ("Error description: " . mysqli_error($conn));

if ($result2)
{
	//$num_result=mysqli_num_rows($result);
	$rows2=[];
	
	while($row2 = mysqli_fetch_array($result2)){
	$rows2[]=$row2;
	
	$notes=$rows2[0]['notes'];
	
}
}

?>

<html>
<meta charset="utf-8"/>
<head>
    <title>Επεξεργασία Δημοσιεύσης</title>
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
    background-color:#7dc476;
	<!--color:	#fff400;-->
	
  </style>

</head>

<body>
   
<button onclick="topFunction()" id="myBtn" title="Go to top" style="border-radius: 4px;padding: 15px;cursor: pointer;color: white;background-color: #96f5f3;outline: none;border: none;display: none;position: fixed;bottom: 20px;right: 30px;z-index: 99;font-size: 18px;">Top</button>

<?php include('nav.php'); ?>

<!--forma rss-->
<div class="container" style="margin-top:70px" >
  <div class="row">
<div align="center" class="col-sm-12">

<form name="edit_paper" method="post" action="paper_update.php" enctype="multipart/form-data">
<h3><b>ΕΠΕΞΕΡΓΑΣΙΑ ΔΗΜΟΣΙΕΥΣΗΣ</h3><br></th>
	<div class="table-responsive">
       <table class="table table-striped table-bordered">
	   
		
		<tr>
			<th align="right">Τἰτλος:</th>
			<td align='left'>
			<?php
			if (strpos($b, 'M') === 0 ) {
   		       echo"<input type='text'  size='55' value='".$title."' name='title'>";
          	 }
			else{
			   echo"<input type='text'  size='55' value='".$title."' name='title' tabindex='-1' readonly style='background-color:grey;'>"; 
				}?> 
			</td>
		</tr>
		<tr>
			<th align="right">Συγγραφείς:</th>
			<td align='left' colspan="2">
			<?php
			if (strpos($b, 'M') === 0 ) {
   		       echo"<input type='text'  size='55' value='".$authors."' name='authors'>";
          	 }
			else{
			   echo"<input type='text'  size='55' value='".$authors."' name='authors' tabindex='-1' readonly style='background-color:grey;'>"; 
				}?> 
			</td>
		</tr>
		
		<tr>
			<th align="right">Τύπος:</th>
			<td align='left' colspan="2">
			<?php 
			if (strpos($b, 'M') === 0 ) {
   		        echo"<select name='type';>
			<option>Journal Articles</option>
			<option>Conference and Workshop Papers</option>
			<option>Informal Publications</option>
			<option>Editorship</option>
			<option>Parts in Books or Collections</option>
			<option>Books and Theses</option>
			<option selected></option>
			<option value='".$type."' selected>$type</option>
			</select>";
				
          	 }
			else{
				
				echo"<select name='type' style='background-color:grey;'>
			
			<option value='".$type."' selected>$type</option>
			</select>";
			  
			}
			
			?> 
			</td>
		</tr>
		<tr>
			<th align="right">Σύνδεσμος:</th>
			<td align='left' colspan="2">
			<?php
			if (strpos($b, 'M') === 0 ) {
   		       echo"<input type='text'  size='55' value='".$url."' name='url'>";
          	 }
			else{
			   echo"<input type='text'  size='55' value='".$url."' name='url' tabindex='-1' readonly style='background-color:grey;'>"; 
				}?> 
			
			</td>
		</tr>
		<tr>
			<th align="right">Έτος:</th>
			<td align='left' colspan="2">
			 <?php
			if (strpos($b, 'M') === 0 ) {
   		       echo"<input type='text'  size='55' value='".$year."' name='year'>";
          	 }
			else{
			   echo"<input type='text'  size='55' value='".$year."' name='year' tabindex='-1' readonly style='background-color:grey;'>"; 
				}?> 

			</td>
		</tr>
		<tr>
			<th align="right">Σχόλια:</th>
			<td align='left' colspan="2">
			
			<?php echo"<textarea value='".$notes."' name = 'notes' rows = '5' cols = '54'>$notes</textarea>"; ?>
			</td>
		</tr>
		
		
		
	    
		
			<td><?php echo"<input type='hidden' value='".$b."' name='url_id'>"; ?>
			<?php echo"<input type='hidden' value='".$_GET['p2']."' name='user_id'>"; ?></td>
			<td><input type='hidden' name='insupd' value='update'></td>
		
		<tr>
			<td colspan='2' align='center'><br>
				<input class="button" type='button' value='ΑΛΛΑΓΗ' name='submit_button' onclick="checkentryform();" ></td>
		</tr>
	</table>
	
	<br><br>	
	<strong>Τροποποίηση Δημοσιεύσης</strong>
	<p>Σ' αυτή τη φόρμα ο Χρήστης μπορεί να τροποποιήσει τα στοιχεία της Δημοσιεύσης.</p>

</form>

  </div>
 </div>
</div>
</div>
<?php include('footer.php'); ?>
<?php include('modal.php'); ?>
</body>
</html>