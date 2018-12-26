<link rel="stylesheet" type="text/css" href="mystyle.css">

<html>
  
<body>
   <h2><center>Αναζήτηση Συγγραμμάτων στη βάση της dblp.</h2><br>
   <div style="text-align:justify">
   <p><b>Aναζητήστε δημοσιεύσεις στη βάση της dblp εισάγωντας τιμές στα αντίστοιχα πεδία. Υπάρχει η δυνατότητα επιλογής συγγραφέα από τους καθηγητές του τμήματος πληροφορικής. </b></p>
   <p><b></b></p> 
   <p><b></b></p>   
   </div>
   
 
  <script type="text/javascript">
function start_countdown()
{
 var counter=900;
 
 myVar= setInterval(function()
 { 
  if(counter>=0)
  {
   document.getElementById("countdown").innerHTML=counter+"s";
  }
  if(counter==0)
  {
   $.ajax
   ({
     type:'post',
     url:'logout.php',
     data:{
      logout:"logout"
     },
     success:function(response) 
     {
      window.location="";
     }
   });
   }
   counter--;
 }, 1000)
}
</script>

  
  <style>
  .fakeimg {
      height: 200px;
      background: #aaa;
  }
  </style>
</head>
<body>

<div class="jumbotron text-center" style="margin-bottom:0">
  <h1>My First Bootstrap 4 Page</h1>
  <p>Resize this responsive page to see the effect!</p> 
      <?php  if (isset($_SESSION['username'])) : ?>
		
    	<p style="color: red;">Welcome <strong style="color: red;"><?php echo $_SESSION['username']; ?></strong></p>

    <?php endif ?>
</div>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      
        
	<li class="nav-item">
    <!-- logged in user information -->
    <?php  if (isset($_SESSION['username'])) : ?>	
		<li class="nav-item">
		<a class="nav-link" href="index_lg2.php">Χρήστες</a>
		</li>
		<li><a data-toggle="modal" href="#logout" id="modellink" class="nav-link"><span class="fas fa-power-off" class="label label-info"></span> Αποσύνδεση (<script>start_countdown();</script>
 <span id="countdown"></span> )</a></li>	
    	
    <?php endif ?>
			
	
		
    </ul>
  </div>  
</nav>

<div class="container" style="margin-top:30px">
  <div class="row">
    <div class="col-sm-12">
      <h2 align="center" style="margin-bottom:14px">Αποθηκευμένες Δημοσιεύσεις</h2>
	  <div align="center" style="margin: 16px 0px 8px 0px">
		    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                   
				  <div class="input-group mb-3">
                     <input type="text" class="form-control" placeholder="Αναζήτηση τίτλου ή συγγραφέα στην βάση..." name="search_p">
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
            
	<div class="table-responsive">
       <table class="table table-striped table-bordered">
		
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
	

		 
		//	if (isset($_POST['search_p']) &&  !$_POST['search_p']==""){
			  
		//if ( isset($_POST['search_p'])  &&  $_POST['search_p']==""){	
            
                  $limit = 3;
                  /*How may adjacent page links should be shown on each side of the current page link.*/
                  $adjacents = 2;
                  $sql = "SELECT COUNT(*) 'total_rows' FROM downloads where user_id=4";
                  $res = mysqli_fetch_object(mysqli_query($conn, $sql));
                  $total_rows = $res->total_rows;
                  $total_pages = ceil($total_rows / $limit);
      
      
      if(isset($_GET['page']) && $_GET['page'] != "") {
        $page = $_GET['page'];
        $offset = $limit * ($page-1);
		$query  ="SELECT p.*, d.notes from papers p, downloads d where p.url_id = d.url_id and d.user_id=$user_id order by title ASC limit $offset, $limit";
      } else {
        $page = 1;
        $offset = 0;
		$query  ="SELECT p.*, d.notes from papers p, downloads d where p.url_id = d.url_id and d.user_id=$user_id order by title ASC limit $offset, $limit";
      }
    
	  $query  ="SELECT p.*, d.notes from papers p, downloads d where p.url_id = d.url_id and d.user_id=$user_id order by title ASC limit $offset, $limit";
      $result = mysqli_query($conn, $query);

      if(mysqli_num_rows($result) > 0) {
		   echo "<thead class=thead-dark>
				<th>Τίτλος - Συγγραφέας</th>
				<th>Τύπος</th>
				<th>Έτος</th>
				<th>URL</th>
				<th>Σημειώσεις</th>
				<th>Ενέργειες</th>
			</thead>
			<tbody>";
        while($row = $result->fetch_assoc()) {
			$a = str_replace("#","-",$row['url_id']); 
					?>
					<tr>
						<td width="500px"><?php echo $row['title'] ."<br />". "<i>" . $row['authors'] . "</i>" ?></td>
	                    <td><?php echo $row['type']; ?></td>
                        <td><?php echo $row['year']; ?></td>
                        <td><a href="<?php echo $row['url']; ?>" target="_blank" class="btn btn-primary"><span class="fab fa-telegram-plane"></span></a></td>
                        <td width="300px"><?php echo $row['notes']; ?></td>						
						<td width="120px">
							<a href="#largeModal<?php echo $a; ?>" title="Επεξεργασία" data-toggle="modal" class="btn btn-warning"><span class="far fa-edit"></span></a>
                            <a href="delete_paper.php?user_id=<?php echo $user_id . "&url_id=" . $a; ?>" title="Διαγραφή" class="btn btn-danger"><span class="far fa-trash-alt"></span></a>
							
							
						</td>
					</tr>
					<?php 
				}// include ('md.php');
      }
      //Here we generates the range of the page numbers which will display.
	  
		
			
	 
	  //-------------------------------------------------------------------
      if($total_pages <= (1+($adjacents * 2))) {
        $start = 1;
        $end   = $total_pages;
      } else {
        if(($page - $adjacents) > 1) { 
          if(($page + $adjacents) < $total_pages) { 
            $start = ($page - $adjacents);            
            $end   = ($page + $adjacents);         
          } else {             
            $start = ($total_pages - (1+($adjacents*2)));  
            $end   = $total_pages;               
          }
        } else {               
          $start = 1;                                
          $end   = (1+($adjacents * 2));             
        }
      }						
		 ?>
		 

		 
			</tbody>
        </table>  
	 </div>	
		 <?php 
		  
		  if($total_pages > 1) { ?>
          <ul class="pagination pagination-sm justify-content-center">
            <!-- Link of the first page -->
            <li class='page-item <?php ($page <= 1 ? print 'disabled' : '')?>'>
              <a class='page-link' href='index_lg.php?page=1'><<</a>
            </li>
            <!-- Link of the previous page -->
            <li class='page-item <?php ($page <= 1 ? print 'disabled' : '')?>'>
              <a class='page-link' href='index_lg.php?page=<?php ($page>1 ? print($page-1) : print 1)?>'><</a>
            </li>
            <!-- Links of the pages with page number -->
            <?php for($i=$start; $i<=$end; $i++) { ?>
            <li class='page-item <?php ($i == $page ? print 'active' : '')?>'>
              <a class='page-link' href='index_lg.php?page=<?php echo $i;?>'><?php echo $i;?></a>
            </li>
            <?php } ?>
            <!-- Link of the next page -->
            <li class='page-item <?php ($page >= $total_pages ? print 'disabled' : '')?>'>
              <a class='page-link' href='index_lg.php?page=<?php ($page < $total_pages ? print($page+1) : print $total_pages)?>'>></a>
            </li>
            <!-- Link of the last page -->
            <li class='page-item <?php ($page >= $total_pages ? print 'disabled' : '')?>'>
              <a class='page-link' href='index_lg.php?page=<?php echo $total_pages;?>'>>>                      
              </a>
            </li>
          </ul>
       <?php } ?>
	  	
<!--<div style='padding: 10px 20px 0px; border-top: dotted 1px #CCC;'>
<strong>Page <?php //echo $page." of ".$total_pages; ?></strong>
</div>-->
       <?php mysqli_close($conn); ?>	
   </div>
 </div>
</div>		
				

<!-- Modal Logout-->
         
<div class="modal fade" id="logout">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
		<h5 class="modal-title">Αποσύνδεση</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <div class="modal-body">
          <p><div class="alert alert-danger">Θέλετε σίγουρα να αποσυνδεθείτε <strong><?php echo $_SESSION['username']; ?>?</strong></p>
        </div>
        <div class="modal-footer">
          <a href="logout.php"><button type="button" class="btn btn-danger"><span class="fas fa-sign-out-alt"> </span> NAI</button></a>
          <button type="button" class="btn btn-default" data-dismiss="modal"><span class="fas fa-undo"> </span> OXI</button>
        </div>
      </div>
    </div>
  </div>
</div>  

<!------ Add Paper ----->
<!--Modal: Add Form-->
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
               




<div class="text-center">
    
</div>

<div class="jumbotron text-center" style="margin-bottom:0">
  <p>Footer</p>
</div>


<div class="modal fade" id="largeModal<?php echo $a; ?>" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Επεξεργασία Δημοσίευσης</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  <?php
			   $na = str_replace("-","#",$a);
			   echo $a . "<br />";
			   echo $na;
			   echo "SELECT p.url_id,p.authors,p.title,p.year,p.type,p.url,d.notes from papers p, downloads d where p.url_id = d.url_id and p.url_id like $na and d.user_id=$user_id";
			  $edit=mysqli_query($conn,"SELECT p.*, d.notes from papers p, downloads d where p.url_id = d.url_id and p.url_id like $na and d.user_id=$user_id");
               while($erok = $edit->fetch_assoc()) {					

                     $ab     = urlencode($erok['url_id']);
                     $title  = $erok['title'];
                     $author = $erok['authors'];
                     $type   = $erok['type'];   
                     $year   = $erok['year'];
                     $url    = $erok['url'];
                     $notes  = $erok['notes'];}
				?>
        <h3>Modal Body</h3>
		<form method="POST" action="edit_paper.php?id=<?php echo $erok['user_id']; ?>">       	
                   <div class="input-group mb-3">
					  <div class="input-group-prepend">
                        <span class="input-group-text">Τίτλος:</span>
                       </div>
					    <input type="text" class="form-control" id="title" placeholder="Εισάγετε τίτλο" name="title" required value="<?php echo $title; ?>" >
                   </div>
                   <div class="input-group mb-3">
					  <div class="input-group-prepend">
                        <span class="input-group-text">Συγγραφέας:</span>
                       </div>
					    <input type="text" class="form-control" id="authors" placeholder="Εισάγετε συγγραφέα" name="authors" required value="<?php echo $author; ?>" >
                   </div>
                   <div class="input-group mb-3">
                     <div class="input-group-prepend">
                       <label class="input-group-text" for="inputGroupSelect01">Τύπος Δημοσίευσης:</label>
                     </div>
                      <select class="custom-select" id="inputGroupSelect01">
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
					    <input type="text" class="form-control" id="url" placeholder="Εισάγετε url" name="url" required value="<?php echo $url; ?>">
                    </div>
					<div class="input-group mb-3">
					  <div class="input-group-prepend">
                        <span class="input-group-text">Έτος:</span>
                       </div>
					    <input type="text" class="form-control" id="year" placeholder="Εισάγετε Έτος" name="year" required pattern="[0-9]{4}" value="<?php echo $year; ?>">
                    </div>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">Σχόλια:</span>
                      </div>
                        <textarea class="form-control" rows="4" id="notes" name="notes" value="<?php echo $notes; ?>"></textarea>
                     </div>
				   
				   </form>
      </div>
       <div class="modal-footer">
				     <div align="center">  
				     	  <button type="reset" class="btn btn-danger" data-dismiss="modal"><span class='fa fa-times'></span> Ακύρωση</button>
                          <button type="submit" class="btn btn-success"><span class='fa fa-check'></span> Ενημέρωση</a>
					</div>
				   </div>
    </div>
  </div>
</div>
</body>

</html>