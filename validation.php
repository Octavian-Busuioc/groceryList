<?php

session_start();


$con = mysqli_connect('localhost', "root", '');

mysqli_select_db($con, 'grocerylist');

$name = $_POST['user'];
$pass = $_POST['password'];
$pass = md5($pass);

$s = "SELECT * FROM users WHERE name='$name' && password='$pass'";

$result = mysqli_query($con, $s);

$num = mysqli_num_rows($result);

if($num == 1) {
    $_SESSION['username'] = $name;
    header('location:homepage.php');
} else {
    header('location:login.php');
}



?>