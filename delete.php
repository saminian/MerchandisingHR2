<?php
 include 'connect.php';
$id = $_GET['id'];
 $delete = "DELETE FROM adtask WHERE id='$id'";
 $del = mysqli_query($con,$delete);
 if(!$del) {
    die('wrong');
 }
 else {
    header('location:task.php');
 }
?>
