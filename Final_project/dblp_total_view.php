<?php 
include('config.php');
include('lock.php');
?>

<html>
<meta charset="utf-8"/>
<head>
    <title>Αναλυτική Εμφάνιση Δημοσιεύσεων DBLP</title>
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
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js>"</script>
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="css/main.css">  
    <script src="./js_async_calls/login.js"></script>
    <script src="./js_async_calls/register.js"></script>
    <script src="./js_async_calls/counter.js"></script>	
    <script src="./myScript.js"></script>
	<script src="edit_f.js"></script>
	
	<script>
	

	
	</script>

<style>
  .navbar-custom {
    background-color:#7dc476;
	<!--color:	#fff400;-->
	
  </style>

</head>
<body>
  

<button onclick="topFunction()" id="myBtn" title="Go to top" style="border-radius: 4px;padding: 15px;cursor: pointer;color: white;background-color: #96f5f3;outline: none;border: none;display: none;position: fixed;bottom: 20px;right: 30px;z-index: 99;font-size: 18px;">Top</button>
<?php include ('nav.php'); ?>
<br><br><br>
     <!-- κωδικας διαχειρισης papers  -->
 <div class="container" style="margin-top:70px" >
   <div class="row">
      <div align="center" class="col-sm-12">
         <h2 align="center" style="margin-bottom:24px">Αναλυτική Εμφάνιση Δημοσιεύσεων DBLP</h2>
          <div class="table-responsive">
           <table class="table table-striped table-bordered">
		
<?php 
          
          		
		
            
          /* Ερώτημα που επιστρέφει το πλήθος εγγραφών στο πίνακα papers */
	     $query_dblp="select * from papers where papers.url_id like  'URL#%' ";
		 
       /* Εκτέλεση του ερωτήματος */

      if ($result_pg=mysqli_query($conn,$query_dblp))
      {
 
       $rowcount=mysqli_num_rows($result_pg);
 
        mysqli_free_result($result_pg);
       }


  /* Ορισμός εγγραφών ανά σελίδα */	
	
	$dis = 5;
	$total_page=ceil($rowcount/$dis);
	$page_cur=(isset($_GET['page']))?$_GET['page']:1;
	$k=($page_cur-1)*$dis;	
		//ερώτημα που μας φέρνει το σύνολο των εγγραφών dblp///		 
	  $query = "SELECT * FROM papers where papers.url_id like  'URL#%' order by type ASC limit $k, $dis"; 
				 
			
	
      $result = mysqli_query($conn, $query);

      if(mysqli_num_rows($result) > 0) {
		   echo "<thead class=thead-dark>
		   <th>A/A</th>
				<th>Τίτλος - Συγγραφέας</th>
				<th>Τύπος</th>
				<th>Έτος</th>
				<th>URL</th>
				
				
			</thead>
			<tbody>";
			$i=0;
        while($row = $result->fetch_assoc()) {
			$i++;
			
?>
					<tr>
					<td><?php echo $i; ?></td>
						<td width="500px"><?php echo "<b>".$row['title']."</b>"."<br />". "<i>" . $row['authors'] . "</i>" ?></td>
	                    <td><?php echo $row['type']; ?></td>
                        <td><?php echo $row['year']; ?></td>
                        <td><a href="<?php echo $row['url']; ?>" target="_blank" class="btn btn-primary"><span class="fab fa-telegram-plane"></span></a></td>
                       						
					</tr>
<?php 
				}
      }
?>
			</tbody>
        </table>  
	 </div>	
	</div>
  </div>
 </div>
	 
	
<!-- Paging -->
<?php 
 //if ($total_page !== 1){
	echo '<div align = "center"><ul class="pagination justify-content-center">';

	//Επιστροφή στην αρχική σελίδα
	if($page_cur>1)
	{
	
   echo '<li class="page-item"><a class=page-link href="./dblp_total_view.php">Αρχική</a></li>';	
	}	
	else
	{
	  
	  echo '<li class="page-item disabled"><a class=page-link href="./dblp_total_view.php">Αρχική</a></li>';
	}
	
	//Προηγούμενη σελίδα όταν γεμίσει η πρώτη σελίδα
	if($page_cur>1)
	{
		echo '<li class="page-item"><a class=page-link href="./dblp_total_view.php?&page='.($page_cur-1).'"><i class="fa fa-arrow-left" style="font-size:20px" aria-hidden="true"></i></a></li>';
	}
	//Προηγούμενη σελίδα στη πρώτη σελίδα
	
	//Αρίθμηση των σελίδων
	
	for($i=1;$i<$total_page;$i++)
	{
		if($page_cur==$i)
		{
	
		echo '<li class="page-item"><a class=page-link href="./dblp_total_view.php">'.$i.'</a></li>';
		}
		else 
		{
		
		echo '<li class="page-item"><a class=page-link href="./dblp_total_view.php?&page='.$i.'">'.$i.'</a></li>';
		}
			
	}
	//if ($total_page == 1){
	echo '<li class="page-item"><a class=page-link href="./dblp_total_view.php?&page='.$i.'">'.$i.'</a></li>';
	//}else {echo '<li class="page-item"><a class=page-link href="./dblp_total_view.php?&page='.$i.'">'.$i.'</a></li>';}
	
	//Επόμενη σελίδα στη τελευταία σελίδα
	if($page_cur<$total_page)
	{
	
		echo '<li class="page-item"><a class=page-link href="./dblp_total_view.php?&page='.($page_cur+1).'"><i class="fa fa-arrow-right" style="font-size:20px" aria-hidden="true"></i></a></li>';
	}
	//Επόμενη σελίδα στη τρέχουσα
	
	
	//Τελευταία σελίδα
	if($page_cur<$total_page)
	{
		
		echo '<li class="page-item"><a class=page-link href="dblp_total_view.php?&page='.($total_page).'">Τελευταία</a></li>';	
	}
	
	else
	{
	
	 echo '<li class="page-item disabled"><a class=page-link href="dblp_total_view.php?&page='.($total_page).'">Τελευταία</a></li>';
	}
		
 echo '</ul></div>';
 //echo'<br>'.'Σελιδοποίηση εγγραφών ανα 5';
 //else{echo <div>Tipota</div>;}?>
 <?php include ('footer.php');?>
 <?php mysqli_close($conn); ?>	 
	  
</body>
</html>

