<?php
$servername = "Localhost";
$username = "hr2_gwam"; 
$password = "gwam"; 
$dbname = "hr2_gwam";

$con =mysqli_connect('Localhost','hr2_gwam','gwam','hr2_gwam');

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
?>