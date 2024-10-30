<?php
 include 'connect.php';
$id = $_GET['id'];
 $delete = "DELETE FROM train WHERE id='$id'";
 $del = mysqli_query($con,$delete);
 if(!$del) {
    die('wrong');
 }
 else {
    header('location:schedule.php');
 }
?>