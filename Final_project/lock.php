<?php
include('config.php');
session_start();
$user_check=$_SESSION['username'];

$ses_sql="select username from users where username='$user_check' ";
$result = $conn->query($ses_sql);
$row = $result->fetch_object();

$login_session=$row->username;


if(!isset($login_session))
{
header("Location: index.php");
}
?>