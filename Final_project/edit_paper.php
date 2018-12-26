<!-- Edit -->
    <div class="modal fade" id="edit<?php echo $a; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">Επεξεργασία Δημοσίευσης</h4></center>
                </div>
                <div class="modal-body">
				<?php
					$edit=mysqli_query($conn,"SELECT p.*, d.notes from papers p, downloads d where p.url_id = d.url_id and p.url_id=$a and d.user_id=$user_id");
               while($erok = $edit->fetch_assoc()) {					

                     $ab     = urlencode($erok['url_id']);
                     $title  = $erok['title'];
                     $author = $erok['authors'];
                     $type   = $erok['type'];   
                     $year   = $erok['year'];
                     $url    = $erok['url'];
                     $notes  = $erok['notes'];}
				?>
				<div class="container-fluid">
				
					
<!-------------------------------------------------------------->     
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
				   
				   <div class="modal-footer">
				     <div align="center">  
				     	  <button type="reset" class="btn btn-danger" data-dismiss="modal"><span class='fa fa-times'></span> Ακύρωση</button>
                          <button type="submit" class="btn btn-success"><span class='fa fa-check'></span> Ενημέρωση</a>
					</div>
				   </div>
				   </form>
        </div>
      </div>
    </div>
   </div>
</div>
           
<!-- /.modal -->