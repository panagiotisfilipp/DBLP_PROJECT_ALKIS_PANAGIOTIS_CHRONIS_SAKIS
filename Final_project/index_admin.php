<?php session_start([
      'cache_limiter' => 'private',
      
   ]); ?>

<?php include ('config.php'); 
//metrao xristes//////
$query = "SELECT * FROM users where role=1";

if ($result=mysqli_query($conn,$query))
  {
 
  $rowcount=mysqli_num_rows($result);
 
  mysqli_free_result($result);
  }
////////////////////metrao sigrammata dblp//
$query_dblp = "SELECT * FROM papers where url_id like 'URL%'";

if ($result_dblp=mysqli_query($conn,$query_dblp))
  {
 
  $count_dblp=mysqli_num_rows($result_dblp);
 
  mysqli_free_result($result_dblp);
  }
  
  ////////////////////metrao sigrammata xristi//
$query_user = "SELECT * FROM papers where url_id like 'MURL%'";

if ($result_user=mysqli_query($conn,$query_user))
  {
 
  $count_paper_user=mysqli_num_rows($result_user);
 
  mysqli_free_result($result_user);
  }
   ////////////////////metrao rss//
$query_rss = "SELECT * FROM posts ";

if ($result_rss=mysqli_query($conn,$query_rss))
  {
 
  $count_rss=mysqli_num_rows($result_rss);
 
  mysqli_free_result($result_rss);
  }
?> 
<!DOCTYPE html>

<html lang="en">

<head>
    <title>Στατιστικά Στοιχεία Διαχειριστή</title>
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
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
  .navbar-custom {
    background-color:#7dc476;
  }
	video {
  width: 100%;
  height: auto;
}

.row:after {
  content: "";
  clear: both;
  display: table;
}

[class*="col-"] {
  float: left;
  padding: 15px;
  width: 100%;
}
  </style>
</head>
<body>

<button onclick="topFunction()" id="myBtn" title="Go to top" style="border-radius: 4px;padding: 15px;cursor: pointer;color: white;background-color: #96f5f3;outline: none;border: none;display: none;position: fixed;bottom: 20px;right: 30px;z-index: 99;font-size: 18px;">Top</button>


<!--Navbar -->
<?php include('nav.php');?>
<!--Navbar end-->
<div class="container" style="margin-top:70px" >
  <div class="row">
<div align="center" class="col-sm-9">
<p>
<h3><b><u>Στατιστικά Στοιχεία Διαχειριστή</u></b></h3>
<br><br>
 <!-- Icon Cards-->
          <div class="row">
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon text-center">
                    <i class="fas fa-users" style='font-size:36px'></i>
                  </div>
                  <div class="mr-6"><?php echo $rowcount;?> Εγγεγραμμένοι Χρήστες!</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#">
                 
                  
                </a>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-warning o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-rss" style='font-size:36px'></i>
                  </div>
                  <div class="mr-6"><?php echo $count_rss;?> Σύνολικά RSS!</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#">
                  
                </a>
              </div>
            </div>
			 <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-success o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-university" style='font-size:36px'></i>
                  </div>
                  <div class="mr-6"><?php echo $count_dblp;?> Δημοσιεύσεις DBLP!</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="./dblp_total_view.php">
                  <span class="float-left">Λεπτομέρειες</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-danger o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-address-book" style='font-size:36px'></i>
                  </div>
                  <div class="mr-6"><?php echo $count_paper_user;?> Δημοσιεύσεις Χρήστών!</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="./user_total_view.php">
                  <span class="float-left">Λεπτομέρειες</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>	
          </div>
		  <div>
		  <form name="edit_rss" method="post" action="maintenance.php" enctype="multipart/form-data">
		  <button type='submit'  class='btn btn-danger'>ΕΚΚΑΘΑΡΙΣΗ ΒΑΣΗΣ</button>
		  </form>
		  </div>
		 <div class="row">
		  <div align="center" class="col-sm-12">
		 <div>
  <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop" width="auto" >
    <source src="https://storage.googleapis.com/coverr-main/mp4/Mt_Baker.mp4" type="video/mp4">
  </video>
  </div>
  </div>
  </div>
		  
		  
</p>	
</div>
<div align="center" class="col-sm-3" style="margin-top:20px">
<p><h3><img src="./images/rss_image2.png" width="32px" height="32px"/> RSS Feed</h3><br /><div style="background-color:#68C9A6"><?php include ('rss_show.php'); ?></div></p>
</div>
 
</div>
</div>
 </div>


<div class="container" style="margin-top:20px" >
  <div class="row">
    <div align="center" class="col-sm-9">
	  	 
    </div>
 
   </div>
</div>


 <?php include ('footer.php');?> 
  
<!-- Login Form Call -->
<?php include ('modal.php'); ?> 
<div class="text-center">
    
</div>



</body>
</html>
