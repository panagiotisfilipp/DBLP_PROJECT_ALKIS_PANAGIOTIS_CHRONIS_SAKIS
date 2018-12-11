<?php
$servername = "localhost";
$username = "alkibiad_dblp";
$password = "dblp2018";
$dbname = "alkibiad_dblp";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);

}
?>