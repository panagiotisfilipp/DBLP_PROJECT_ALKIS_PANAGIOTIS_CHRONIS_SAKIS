<?php
if(isset($_POST['submit_email']) && $_POST['email'])
{
	$email=$_POST['email'];
  include ('config.php');
  $query_select="select email,password from users where email='".$email."' and role='1'";
  $select=$conn->query($query_select) or die('Error_in_select');
  echo $query_select.'<br>';
  
  if(mysqli_num_rows($select)==1)
  {
    while($row=mysqli_fetch_array($select))
    {
      $email=($row['email']);
      $pass=password_hash($row['password'],PASSWORD_DEFAULT);
    }
	echo $email.'<br>';
	echo $pass;
    $link="<a href='RESET_PASSWORD/reset_pass.php?key=".$email."&reset=".$pass."'>Click To Reset password</a>";
    require_once('phpmail/PHPMailerAutoload.php');
    $mail = new PHPMailer();
    $mail->CharSet =  "utf-8";
    $mail->IsSMTP();
    // enable SMTP authentication
    $mail->SMTPAuth = true;                  
    // GMAIL username
    $mail->Username = "admin@gmail.com";
    // GMAIL password
    $mail->Password = "password";
    $mail->SMTPSecure = "ssl";  
    // sets GMAIL as the SMTP server
    $mail->Host = "smtp.gmail.com";
    // set the SMTP port for the GMAIL server
    $mail->Port = "465";
    $mail->From='admin@gmail.com';
    $mail->FromName='Admin';
    $mail->AddAddress('admin@gmail.com', 'Admin');
    $mail->Subject  =  'Reset Password';
    $mail->IsHTML(true);
    $mail->Body    = 'Click On This Link to Reset Password '.$pass.'';
    if($mail->Send())
    {
      echo "Check Your Email and Click on the link sent to your email";
    }
    else
    {
      echo "Mail Error - >".$mail->ErrorInfo;
    }
  }	
}
?>
