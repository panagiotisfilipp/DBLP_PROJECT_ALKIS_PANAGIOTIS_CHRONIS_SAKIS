<?php
if(isset($_POST['submit_email']) && $_POST['email'])
{
	$email=$_POST['email'];
  include ('config.php');
  $query_select="select email,password from users where email='".$email."' and role='1'";
  $select=$conn->query($query_select) or die('Error_in_select');
 
  
  if(mysqli_num_rows($select)==1)
  {
    while($row=mysqli_fetch_array($select))
    {
      $email=($row['email']);
      $pass=($row['password']);
    }

    $link="<a href='http://dblp.click2web.gr/reset/reset_pass.php?key=".$email."&reset=".$pass."'>Πατήστε για επαναφορά κωδικού.</a>";
    
    $link2="http://dblp.click2web.gr/reset/reset_pass.php?key=".$email."&reset=".$pass."";
  
    require_once('phpmail/PHPMailerAutoload.php');
    $mail = new PHPMailer();
    $mail->CharSet =  "utf-8";
    $mail->IsSMTP();
    // enable SMTP authentication
    $mail->SMTPAuth = true;                  
    // GMAIL username
    $mail->Username = "info@dblp.click2web.gr";
    // GMAIL password
    $mail->Password = "dblp2018";
    $mail->SMTPSecure = "ssl";  
    // sets GMAIL as the SMTP server
    $mail->Host = "dblp.click2web.gr";
    // set the SMTP port for the GMAIL server
    $mail->Port = "465";
    $mail->From='info@dblp.click2web.gr';
    $mail->FromName='Admin';
    $mail->AddAddress($email, 'Admin');
    $mail->Subject  =  'Reset Password';
    $mail->IsHTML(true);
    $mail->Body    = 'Πατήστε στον παρακάτω σύνδεσμο για να επαναφέρετε τον κωδικό σας.<br>'.$link.'<br> ή αντιγράψτε το παρακάτω σύνδεσμο στον browser σας.<br>'. $link2 .'' ;
    if($mail->Send())
    {
      echo '<script language="javascript">alert("Ελέγξτε το email σας και πατήστε στο σύνδεσμο που σας εστάλη."); 
      window.close();
      </script>';    
     
    }
    else
    {
        echo '<script language="javascript">alert("Λανθασμένο email."); 
        history.go(-1);</script>';
    }
  }	
}
?>
