<?php
if(isset($_POST['submit_password']) && $_POST['key'] && $_POST['reset'])
{
  $email=$_POST['email'];
  $pass=$_POST['password'];
  //mysql_connect('localhost','root','');
 // mysql_select_db('sample');
  include ('config.php');
  //$select=mysql_query("update user set password='$pass' where email='$email'");
  $query_select="update users set password='$pass' where email='$email'";
   $select=$conn->query($query_select) or die('Error_in_select');
}
?>