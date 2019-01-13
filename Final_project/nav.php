<script src="bootstrap-password-toggler.min.js"></script>

<nav class="navbar sticky-top  navbar-expand-sm  navbar-dark  navbar-custom">  
	   
<!-- Toggler/collapsibe Button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapse_target">
       <span class="navbar-toggler-icon"></span>
    </button>
<!--</button>-->
    <div class="collapse navbar-collapse" id="collapse_target">
	  
        <a class="navbar-brand" href="index.php">
		   <img src="images/logo2.png" alt="nav-logo"></a>
      
	 
        <ul class="navbar-nav ">
          
	<?php  if (!isset($_SESSION['username'])) { ?>	
	     <li class="nav-item active">
            <a class="nav-link"   href="index.php">  <i class="fa fa-home" aria-hidden="true"></i> Αρχική</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link"   href="index_guest.php">  <i class="fas fa-database"aria-hidden="true"></i> Αναζήτηση Δημοσιεύσεων</a>
          </li>
          		<li class="nav-item">
            <a class="nav-link"   href="contact_guest.php">  <i class="fa fa-envelope" aria-hidden="true"></i> Επικοινωνία</a>
          </li>
		  <li class="nav-item">
		     <a class="nav-link "  href='#' onclick="javascript:confirmUXtest();"> <i class="far fa-list-alt" aria-hidden="true"></i> Η γνώμη σας μετράει!</a>
          </li>
          	
	<?php }   ?>		  
		  <?php  if (isset($_SESSION['username'])&& $_SESSION['role']=='1' ) { ?>
		   <li class="nav-item active">
            <a class="nav-link"   href="index_reg.php">  <i class="fa fa-home" aria-hidden="true"></i> Αρχική</a>
          </li>
          <li class="nav-item ">
		   <a class="nav-link"   href="index_login.php">  <i class="fas fa-database"aria-hidden="true"></i> Αναζήτηση Δημοσιεύσεων</a>
		   </li>
            <a class="nav-link"   href="diax_login.php">  <i class="fas fa-database"aria-hidden="true"></i> Διαχείριση Δημοσιεύσεων</a>
          </li>
		   	 
	  
          <li class="nav-item">
            <a class="nav-link"   href="contact_reg.php">  <i class="fa fa-envelope" aria-hidden="true"></i> Επικοινωνία</a>
          </li>
		  <li class="nav-item">
            <a class="nav-link "  href='#' onclick="javascript:confirmUXtest();"> <i class="far fa-list-alt" aria-hidden="true"></i> Η γνώμη σας μετράει!</a>
          </li>
          <?php }?>
		  <?php  if (isset($_SESSION['username'])&& $_SESSION['role']=='0' ) { ?>
		  <li class="nav-item active">
            <a class="nav-link"   href="index_admin.php">  <i class="fa fa-home" aria-hidden="true"></i> Αρχική</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link"   href="preview_users.php">  <i class="fas fa-database"aria-hidden="true"></i> Διαχείριση Χρηστών</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link"   href="preview_rss.php">  <i class="fas fa-database"aria-hidden="true"></i> Διαχείριση RSS</a>
          </li>	
		<?php }?>
			
		<script language="javascript">
		function confirmUXtest() {
		var answer = confirm('Καλά θα ήταν να έχετε ολοκληρώσει την πλοήγησή σας στην εφαρμογή μας και μετά να απαντήσετε στην έρευνά μας. Επιθυμείτε να συνεχίσετε;');
		if (answer) {
			window.open('https://docs.google.com/forms/d/e/1FAIpQLSec-DAe02tg6NQ2qRYV0DSDO_qFO6J7NmUBD3ngYE8MBI3RrQ/viewform','_blank'); 
		} else {
			return false;
		}
		}
		</script>
	
	
	<?php  if (!isset($_SESSION['username'])) { ?>
		<li class="nav-item">
			<a href="./log_reg_modal.php" class="nav-link" data-toggle="modal" data-target="#modal_login"><i class="fas fa-user"></i>  Είσοδος/Εγγραφή</a>
	    </li>		
	<?php }else{ ?>
		<li><a data-toggle="modal" href="#logout" id="modellink" class="nav-link"><span class="fas fa-power-off" class="label label-info"></span> Αποσύνδεση (<script>start_countdown();</script>
			<span id="countdown"></span> )</a>
		</li>
				
	<?php  }?>
        </ul>
    </div>
	<?php  if (isset($_SESSION['username'])&& $_SESSION['role']=='1' ) { ?>
	<ul class="navbar-nav "  style="margin-right:300px">
	<div class="collapse navbar-collapse" id="collapse_target">	
	<!-- Dropdown -->
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" style="color: white !important;" href="#" id="navbardrop" data-toggle="dropdown">
       <i class="fas fa-user"></i> <?php echo $_SESSION['username']; ?>
      </a>
      <div class="dropdown-menu">
       <a data-target="#changepass" href="" data-toggle="modal" >Aλλαγή Συνθηματικού</a>
      </div>
    </li> </div></ul><?php }?>
    
    <?php  if (isset($_SESSION['username'])&& $_SESSION['role']=='0' ) { ?>
	<ul class="navbar-nav "  style="margin-right:300px">
	<div class="collapse navbar-collapse" id="collapse_target">	
	<!-- Dropdown -->
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" style="color: white !important;" href="#" id="navbardrop" data-toggle="dropdown">
       <i class="fas fa-user"></i> <?php echo $_SESSION['username']; ?>
      </a>
      <div class="dropdown-menu">
       <a data-target="#changepass" href="" data-toggle="modal" >Aλλαγή Συνθηματικού</a>
      </div>
    </li> </div></ul><?php }?>
	
	
</nav>	
<!-- Modal Logout-->
         
<div class="modal fade" id="logout">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
		<h5 class="modal-title">Αποσύνδεση</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <div class="modal-body">
          <p><div class="alert alert-danger">Θέλετε σίγουρα να αποσυνδεθείτε <strong><?php echo $_SESSION['username']; ?>?</strong></div></p>
        </div>
        <div class="modal-footer">
          <a href="logout.php"><button type="button" class="btn btn-danger"><span class="fas fa-sign-out-alt"> </span> NAI</button></a>
          <button type="button" class="btn btn-default" data-dismiss="modal"><span class="fas fa-undo"> </span> OXI</button>
        </div>
      </div>
    </div>
  </div>
</div>  

