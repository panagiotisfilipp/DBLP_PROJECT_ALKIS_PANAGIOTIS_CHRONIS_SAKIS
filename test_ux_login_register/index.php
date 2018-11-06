<?php 
 include('server.php'); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  //	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  //	header("location: login.php");
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap 4 Website Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  

       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-show-password/1.0.3/bootstrap-show-password.min.js"></script>
  
  
  
<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
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
        <a href="" class="nav-link" data-toggle="modal" data-target="#modal_login">Είσοδος/Εγγραφή</a>
	</li>
	<li class="nav-item">
        <a href="" class="nav-link" data-toggle="modal" data-target="#modal_papper">Προσθήκη</a>
	</li>

		<li>
		<div align="center"> 


    <!-- logged in user information -->
    <?php  if (isset($_SESSION['username'])) : ?>
		
		<button type="submit" class="btn btn-danger" ><a href="index.php?logout='1'" class="nav-link" d  > Logout </a></button>
    	<!--<p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>-->
    <?php endif ?>
		</div>	
		</li>
		
    </ul>
  </div>  
</nav>

<div class="container" style="margin-top:30px">
  <div class="row">
    <div class="col-sm-4">
      <h2>About Me</h2>
      <h5>Photo of me:</h5>
      <div class="fakeimg">Fake Image</div>
      <p>Some text about me in culpa qui officia deserunt mollit anim..</p>
      <h3>Some Links</h3>
      <p>Lorem ipsum dolor sit ame.</p>
      <ul class="nav nav-pills flex-column">
        <li class="nav-item">
          <a class="nav-link active" href="#">Active</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#">Disabled</a>
        </li>
      </ul>
      <hr class="d-sm-none">
    </div>
    <div class="col-sm-8">
      <h2>TITLE HEADING</h2>
      <h5>Title description, Dec 7, 2017</h5>
      <div class="fakeimg">Fake Image</div>
      <p>Some text..</p>
      <p>Sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
      <br>
      <h2>TITLE HEADING</h2>
      <h5>Title description, Sep 2, 2017</h5>
      <div class="fakeimg">Fake Image</div>
      <p>Some text..</p>
      <p>Sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
    </div>
  </div>
</div>

<div class="jumbotron text-center" style="margin-bottom:0">
  <p>Footer</p>
</div>

<!------ Login/Reg  ----->
<!--Modal: Login / Register Form-->
<div class="modal fade" id="modal_login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog cascading-modal" role="document">
        <!--Content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">
                                            <span class="glyphicon glyphicon-remove"></span>
                                        </button>
                                        <ul class="nav nav-tabs">
                                            <li class="active"><a data-toggle="tab" href="#login-form"> Login <span class="glyphicon glyphicon-user"></span></a></li>
                                            <li><a data-toggle="tab" href="#registration-form"> Register <span class="glyphicon glyphicon-pencil"></span></a></li>
                                        </ul>
                                    </div>
                                    <div class="modal-body">
                                        <div class="tab-content">
                                            <div id="login-form" class="tab-pane fade in active">
                                                <form method="post" action="index.php">
                                                    <?php include('errors.php'); ?>
													<div class="form-group">
                                                        <label for="name">Username:</label>
                                                        <input type="text" class="form-control" id="name" placeholder="Enter your username" name="name" ">
                                                    </div>												
                                                    <div class="form-group">
                                                        <label for="password">Password:</label>
                                                        <input type="password" class="form-control" id="pswd" placeholder="Enter your password" name="pswd">
                                                    </div>													
                                                    <div class="checkbox">
                                                        <label><input type="checkbox" name="remember"> Remember me</label>
                                                    </div>
                                                    <button type="submit" class="btn btn-default" name="login_user">Login</button>
                                                </form>
                                            </div>
                                            <div id="registration-form" class="tab-pane fade">
											    <?php include('errors.php'); ?>
                                                <form method="post" action="index.php">
                                                    <div class="form-group">
                                                        <label for="username">Username:</label>
                                                        <input type="text" class="form-control" id="username" placeholder="Enter your name" name="username" value="<?php echo $username; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="email">E-mail:</label>
                                                        <input type="email" class="form-control" id="email" placeholder="Enter your email" name="email" value="<?php echo $email; ?>">
                                                    </div>	
													<div class="form-group">
                                                        <label for="password_1">Password:</label>
                                                        <input type="password" class="form-control" id="password_1" placeholder="New password"  name="password_1">
                                                    </div>
                                                    <div class="form-group">													
                                                        <label for="password_2">Password:</label>
                                                        <input type="password" class="form-control" id="password_2" placeholder="New password" name="password_2">
                                                    </div>
													<button type="submit" class="btn btn-default" name="reg_user">Register</button>	
                                                </form>
                                            </div>

                                        </div>
                                    </div>
<!--                                    <div class="modal-footer">-->
<!--                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
<!--                                    </div>-->
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
                    <center><h4 class="modal-title">Προσθήκη Νέας Δημοσίευσης</h4></center>
                </div>
                <div class="modal-body">
				<div class="container-fluid">
				<form method="POST" action="addnew.php" id="frmCheckUsername">
				    <div class="panel panel-body form">
            	
    <div class="row form-group">
        <div class="col-sm-12">
            <div class="input-group input-group-sm">
                <span class="input-group-addon"><i class="glyphicon glyphicon-education"></i> Τίτλος</span>
                <input name="title" class="form-control" type="text" id="title" required placeholder="Τίτλος" title="">
            </div>
        </div></div>
        <div class="row form-group">
        <div class="col-sm-12">
            <div class="input-group input-group-sm">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i> Συγγραφέας</span>
                <input type="text" class="form-control" placeholder="Συγγραφέας" title="authors" id="authors"  name="authors" required>
            </div>
        </div>
    </div>
    <div class="row form-group">
        <div class="col-sm-12">
            <div class="input-group input-group-sm">
                <span class="input-group-addon"><i class="glyphicon glyphicon-briefcase"></i> Τύπος Δημοσίευσης</span>
                <select name="type" style="height:30px">
					<option value="Journal Articles">Αρθρα εφημερίδας</option>
					<option value="Conference and Workshop Papers">Έγγραφα συνεδρίων και εργαστηρίων</option>
					<option value="Informal Publications">Άτυπες Δημοσιεύσεις</option>
					<option value="Editorship">Σύνταξη</option>
					<option value="Parts in Books or Collections">Μέρη σε βιβλία ή συλλογές</option>
					<option value="Books and Theses">Βιβλία και Διατριβές</option>
				</select>
            </div>
        </div> 
    </div>
    
    <div class="row form-group">
     <div class="col-sm-9">
            <div class="input-group input-group-sm">
                <span class="input-group-addon"><i class="glyphicon glyphicon-cloud-download"></i></span>
                <input type="text" class="form-control" placeholder="URL" title="url" name="url">
            </div>
        </div>
        
        <div class="col-sm-3">
            <div class="input-group input-group-sm">
                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                <input type="text" class="form-control" placeholder="Έτος" title="Έτος" name="year" minlength="4" maxlength="4">
            </div>
        </div>
    </div>
   
</div>

                  <div align="center">  <button type="reset" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Ακύρωση</button>
                    <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Αποθήκευση</a></div>
			
				</form>
                </div>
                
               
            </div>
        </div>
    </div>
        </div>
	</div>
</div>	
               

<div class="text-center">
    
</div>



</body>
</html>
