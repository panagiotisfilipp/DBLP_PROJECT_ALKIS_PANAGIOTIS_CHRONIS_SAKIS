<?php
session_start();

if(isset($_POST['logout']))
{
 
 if(session_destroy())
{
header("Location: index.php");
}

} else {if(session_destroy())
{
header("Location: index.php");
}}


?>