<?php
if(isset($_POST['submit_password']) && $_POST['email'] && $_POST['password'])
{
  $email=$_POST['email'];
  $pass=$_POST['password'];
 
  include ('config.php');
  
  $pass_new=password_hash($pass,PASSWORD_DEFAULT);
  $query_select="update users set password='$pass_new' where email='$email'";
  
   $select=$conn->query($query_select) or die('Error_in_select');
   if($select=$conn)
   {
      echo '<script language="javascript">alert("Ο κωδικός σας άλλαξε με επιτυχία."); 
     window.location = "http://dblp.click2web.gr";
      </script>';    
     
    }
    else
    {
        echo '<script language="javascript">alert("Η διαδικασία απέτυχε.Προσπαθήστε ξανά."); 
         window.location = "./reset_pass.html";
         </script>';
    }
}
?>