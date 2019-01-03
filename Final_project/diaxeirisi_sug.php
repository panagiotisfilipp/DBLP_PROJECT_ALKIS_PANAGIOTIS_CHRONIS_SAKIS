<?php 
include('config.php');

?>

<html>
<meta charset="utf-8"/>
<head>
    <title>Διαχείριση Δημοσιεύσεων</title>
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
	
	$(document).ready(function() {
    $('#example').DataTable({
    "search": false});
	
	
});
	
	</script>

<style>
  .navbar-custom {
    background-color:#7dc476;
	<!--color:	#fff400;-->
	
  </style>

</head>
<body>
  

<button onclick="topFunction()" id="myBtn" title="Go to top" style="border-radius: 4px;padding: 15px;cursor: pointer;color: white;background-color: #96f5f3;outline: none;border: none;display: none;position: fixed;bottom: 20px;right: 30px;z-index: 99;font-size: 18px;">Top</button>
<!-- κωδικας διαχειρισης papers  -->
 <div class="col-sm-12">
      <h2 align="center" style="margin-bottom:14px">Διαχείριση Δημοσιεύσεων</h2>
	  <div align="center" style="margin: 16px 0px 8px 0px">
		    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                   
				  <div class="input-group mb-3">
                     <input type="text" class="form-control" placeholder="Αναζήτηση τίτλου ή συγγραφέα ή έτος στην βάση..." name="search_p">
                    <div class="input-group-append">
                     <button class="btn btn-info" type="submit"><span class="fas fa-search"></span> Αναζήτηση</button>
                    </div>
                 </div>
				  
    </form>
        </div>
         <div align="center" style="margin: 20px 0px 20px 0px;">
		 <a href="#modal_paper" data-toggle="modal" data-target="#modal_papper" class="btn btn-success" role="button"><span class="fas fa-file-export"></span> Προσθήκη Νέας Δημοσίευσης</a>
		</div>
		
	</div>
 
<!-- Εμφάνιση Δημοσιεύσεων -->
 <div class="table-responsive">
       <table class="table table-striped table-bordered" id="example">
		
       <?php 
          
           $getuserid = "SELECT user_id from users where username like '" . $_SESSION['username'] . "'";

           //Find user id
           $resultuid = $conn->query($getuserid);
	       if ($resultuid->num_rows > 0) {
              while($row2 = $resultuid->fetch_assoc()) {
                 $user_id = $row2["user_id"];	
           }
           }else {
             echo "No such user id";
           }
	

		 
			
		
            
                 /* Ερώτημα που επιστρέφει το πλήθος εγγραφών στο πίνακα αναθέσεων */
	     $query="select * from downloads where user_id=$user_id";
	//	 echo "Qry ".$query;
/* Εκτέλεση του ερωτήματος */

if ($result_pg=mysqli_query($conn,$query))
  {
 
  $rowcount=mysqli_num_rows($result_pg);
 
  mysqli_free_result($result_pg);
  }


/* Ορισμός εγγραφών ανά σελίδα */	
	
	$dis = 5;
	
	$total_page=ceil($rowcount/$dis);
	$page_cur=(isset($_GET['page']))?$_GET['page']:1;
	$k=($page_cur-1)*$dis;	
				 
	
//Periptoseis search

if (isset($_POST['search_p']) &&  !$_POST['search_p']==""){
			$query  ="SELECT p.*, d.notes from papers p, downloads d where p.url_id = d.url_id and d.user_id=$user_id 
			 and (p.title like \"%".$_POST['search_p']."%\" OR p.authors like \"%".$_POST['search_p']."%\" OR p.year like \"%".$_POST['search_p']."%\") order by type ASC limit $k, $dis";
			
			}
			 else {
				 $query  ="SELECT p.*, d.notes from papers p, downloads d where p.url_id = d.url_id and d.user_id=$user_id order by type ASC limit $k, $dis";} 	
				 
				 
				 
			
	
      $result = mysqli_query($conn, $query);

      if(mysqli_num_rows($result) > 0) {
		   echo "<thead class=thead-dark>
				<th>Τίτλος - Συγγραφέας</th>
				<th>Τύπος</th>
				<th>Έτος</th>
				<th>URL</th>
				<th>Σημειώσεις</th>
				<th colspan=2>Ενέργειες</th>
			</thead>
			<tbody>";
        while($row = $result->fetch_assoc()) {
			$a = str_replace("#","-",$row['url_id']); 
					?>
					<tr>
						<td width="500px"><?php echo "<b>".$row['title']."</b>"."<br />". "<i>" . $row['authors'] . "</i>" ?></td>
	                    <td><?php echo $row['type']; ?></td>
                        <td><?php echo $row['year']; ?></td>
                        <td><a href="<?php echo $row['url']; ?>" target="_blank" class="btn btn-primary"><span class="fab fa-telegram-plane"></span></a></td>
                        <td width="300px"><?php echo $row['notes']; ?></td>						
						
						 <td class='col-sm-0'>
					     	 <button type="submit" class="btn btn-warning" onclick="paper_edit_form('<?php echo $a; ?>','<?php echo $user_id; ?>')" onmouseover="this.style.cursor='pointer'"><i class="fa fas fa-edit aria-hidden='true'"></i></button></td>
						 <td class='col-sm-0'>
							 <button type="submit" class="btn btn-danger" onclick="delete_paper('<?php echo $a; ?>','<?php echo $user_id; ?>')" onmouseover="this.style.cursor='pointer'"><i class="far fa-trash-alt aria-hidden='true'"></i></button>
			
						</td>
					</tr>
					<?php 
				}
      }
    
     
		 ?>
		 

		 
			</tbody>
        </table>  
	 </div>	
<!-- Paging -->
<?php 
 //if ($total_page !== 1){
	echo '<div align = "center"><ul class="pagination justify-content-center">';

	//Επιστροφή στην αρχική σελίδα
	if($page_cur>1)
	{
	
   echo '<li class="page-item"><a class=page-link href="./diax_login.php">Αρχική</a></li>';	
	}	
	else
	{
	  
	  echo '<li class="page-item disabled"><a class=page-link href="./diax_login.php">Αρχική</a></li>';
	}
	
	//Προηγούμενη σελίδα όταν γεμίσει η πρώτη σελίδα
	if($page_cur>1)
	{
		echo '<li class="page-item"><a class=page-link href="./diax_login.php?&page='.($page_cur-1).'"><i class="fa fa-arrow-left" aria-hidden="true"></i></a></li>';
	}
	//Προηγούμενη σελίδα στη πρώτη σελίδα
	
	//Αρίθμηση των σελίδων
	
	for($i=1;$i<$total_page;$i++)
	{
		if($page_cur==$i)
		{
	
		echo '<li class="page-item"><a class=page-link href="./diax_login.php">'.$i.'</a></li>';
		}
		else 
		{
		
		echo '<li class="page-item"><a class=page-link href="./diax_login.php?&page='.$i.'">'.$i.'</a></li>';
		}
			
	}
	//if ($total_page == 1){
	echo '<li class="page-item"><a class=page-link href="./diax_login.php?&page='.$i.'">'.$i.'</a></li>';
	//}else {echo '<li class="page-item"><a class=page-link href="./diax_login.php?&page='.$i.'">'.$i.'</a></li>';}
	
	//Επόμενη σελίδα στη τελευταία σελίδα
	if($page_cur<$total_page)
	{
	
		echo '<li class="page-item"><a class=page-link href="./diax_login.php?&page='.($page_cur+1).'"><i class="fa fa-arrow-right" aria-hidden="true"></i></a></li>';
	}
	//Επόμενη σελίδα στη τρέχουσα
	
	
	//Τελευταία σελίδα
	if($page_cur<$total_page)
	{
		
		echo '<li class="page-item"><a class=page-link href="diax_login.php?&page='.($total_page).'">Τελευταία</a></li>';	
	}
	
	else
	{
	
	 echo '<li class="page-item disabled"><a class=page-link href="diax_login.php?&page='.($total_page).'">Τελευταία</a></li>';
	}
		
 echo '</ul></div>';
 
 //else{echo <div>Tipota</div>;}?>
	
 
       <?php mysqli_close($conn); ?>	 
   
 

<!------ Add Paper ----->
<!--Modal: Add Form-->
<meta charset="utf-8"/>
<div class="modal fade" id="modal_papper" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
    <div class="modal-dialog cascading-modal" role="document">
        <!--Content-->
        <div class="modal-content">
              <div class="modal-header">
		          <h5 class="modal-title">Προσθήκη Δημοσίευσης</h5>
                   <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
                <div class="modal-body">
				 <div class="container-fluid">
				  <form method="POST" action="insert_paper.php" id="frmCheckUsername">
                    
				   <div class="input-group mb-3">
					  <div class="input-group-prepend">
                        <span class="input-group-text">Τίτλος:</span>
                       </div>
					    <input type="text" class="form-control" id="title" placeholder="Εισάγετε τίτλο" name="title" required >
                   </div>
                   <div class="input-group mb-3">
					  <div class="input-group-prepend">
                        <span class="input-group-text">Συγγραφέας:</span>
                       </div>
					    <input type="text" class="form-control" id="authors" placeholder="Εισάγετε συγγραφέα" name="authors" required >
                   </div>
                   <div class="input-group mb-3">
                     <div class="input-group-prepend">
                       <label class="input-group-text" for="inputGroupSelect01">Τύπος Δημοσίευσης:</label>
                     </div>
                      <select class="custom-select" id="inputGroupSelect01" name="type">
                         <option value="Journal Articles">Αρθρα εφημερίδας</option>
					     <option value="Conference and Workshop Papers">Έγγραφα συνεδρίων και εργαστηρίων</option>
					     <option value="Informal Publications">Άτυπες Δημοσιεύσεις</option>
					     <option value="Editorship">Σύνταξη</option>
					     <option value="Parts in Books or Collections">Μέρη σε βιβλία ή συλλογές</option>
					     <option value="Books and Theses">Βιβλία και Διατριβές</option>
                      </select>
                    </div>
				   
                    <div class="input-group mb-3">
					  <div class="input-group-prepend">
                        <span class="input-group-text">Σύνδεσμος:</span>
                       </div>
					    <input type="text" class="form-control" id="url" placeholder="Εισάγετε url" name="url" required >
                    </div>
					<div class="input-group mb-3">
					  <div class="input-group-prepend">
                        <span class="input-group-text">Έτος:</span>
                       </div>
					    <input type="text" class="form-control" id="year" placeholder="Εισάγετε Έτος" name="year" required pattern="[0-9]{4}">
                    </div>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">Σχόλια:</span>
                      </div>
                        <textarea class="form-control" rows="4" id="notes" name="notes"></textarea>
                     </div>
				   
				   <div class="modal-footer">
				     <div align="center">  
				     	  <button type="reset" class="btn btn-danger" data-dismiss="modal"><span class='fa fa-times'></span> Ακύρωση</button>
                          <button type="submit" class="btn btn-success"><span class='fa fa-check'></span>  Αποθήκευση</a>
					</div>
				   </div>
				   </form>
				</div>
			</div>	
		</div>
	</div>	
</div>
<!--   -->
</body>
</html>
