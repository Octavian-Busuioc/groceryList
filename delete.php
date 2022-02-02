<?php

include 'config.php';
$ID = $_GET['id'];
mysqli_query($con, "DELETE FROM `list` WHERE id=$ID");

header('location:homepage.php');


?>