<?php

include 'config.php';
$ID = $_GET['id'];
mysqli_query($con, "DELETE FROM `notes` WHERE id=$ID");

header('location:notes.php');


?>